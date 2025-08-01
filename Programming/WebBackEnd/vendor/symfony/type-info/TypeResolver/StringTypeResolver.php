<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\TypeInfo\TypeResolver;

use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprArrayNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprFalseNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprFloatNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprIntegerNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprNullNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprStringNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprTrueNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstFetchNode;
use PHPStan\PhpDocParser\Ast\Type\ArrayShapeNode;
use PHPStan\PhpDocParser\Ast\Type\ArrayTypeNode;
use PHPStan\PhpDocParser\Ast\Type\CallableTypeNode;
use PHPStan\PhpDocParser\Ast\Type\ConstTypeNode;
use PHPStan\PhpDocParser\Ast\Type\GenericTypeNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\IntersectionTypeNode;
use PHPStan\PhpDocParser\Ast\Type\NullableTypeNode;
use PHPStan\PhpDocParser\Ast\Type\ObjectShapeNode;
use PHPStan\PhpDocParser\Ast\Type\ThisTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\PhpDocParser\Ast\Type\UnionTypeNode;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\TokenIterator;
use PHPStan\PhpDocParser\Parser\TypeParser;
use PHPStan\PhpDocParser\ParserConfig;
use Symfony\Component\TypeInfo\Exception\InvalidArgumentException;
use Symfony\Component\TypeInfo\Exception\UnsupportedException;
use Symfony\Component\TypeInfo\Type;
use Symfony\Component\TypeInfo\Type\BackedEnumType;
use Symfony\Component\TypeInfo\Type\BuiltinType;
use Symfony\Component\TypeInfo\Type\CollectionType;
use Symfony\Component\TypeInfo\Type\GenericType;
use Symfony\Component\TypeInfo\TypeContext\TypeContext;
use Symfony\Component\TypeInfo\TypeIdentifier;

/**
 * Resolves type for a given string.
 *
 * @author Mathias Arlaud <mathias.arlaud@gmail.com>
 * @author Baptiste Leduc <baptiste.leduc@gmail.com>
 */
final class StringTypeResolver implements TypeResolverInterface
{
    /**
     * @var array<string, bool>
     */
    private static array $classExistCache = [];

    private readonly Lexer $lexer;
    private readonly TypeParser $parser;

    public function __construct(?Lexer $lexer = null, ?TypeParser $parser = null)
    {
        if (class_exists(ParserConfig::class)) {
            $this->lexer = $lexer ?? new Lexer(new ParserConfig([]));
            $this->parser = $parser ?? new TypeParser($config = new ParserConfig([]), new ConstExprParser($config));
        } else {
            $this->lexer = $lexer ?? new Lexer();
            $this->parser = $parser ?? new TypeParser(new ConstExprParser());
        }
    }

    public function resolve(mixed $subject, ?TypeContext $typeContext = null): Type
    {
        if ($subject instanceof \Stringable) {
            $subject = (string) $subject;
        } elseif (!\is_string($subject)) {
            throw new UnsupportedException(\sprintf('Expected subject to be a "string", "%s" given.', get_debug_type($subject)), $subject);
        }

        try {
            $tokens = new TokenIterator($this->lexer->tokenize($subject));
            $node = $this->parser->parse($tokens);

            return $this->getTypeFromNode($node, $typeContext);
        } catch (\DomainException $e) {
            throw new UnsupportedException(\sprintf('Cannot resolve "%s".', $subject), $subject, previous: $e);
        }
    }

    private function getTypeFromNode(TypeNode $node, ?TypeContext $typeContext): Type
    {
        $typeIsCollectionObject = fn (Type $type): bool => $type->isIdentifiedBy(\Traversable::class) || $type->isIdentifiedBy(\ArrayAccess::class);

        if ($node instanceof CallableTypeNode) {
            return Type::callable();
        }

        if ($node instanceof ArrayTypeNode) {
            return Type::list($this->getTypeFromNode($node->type, $typeContext));
        }

        if ($node instanceof ArrayShapeNode) {
            $shape = [];
            foreach ($node->items as $item) {
                $shape[(string) $item->keyName] = [
                    'type' => $this->getTypeFromNode($item->valueType, $typeContext),
                    'optional' => $item->optional,
                ];
            }

            return Type::arrayShape(
                $shape,
                $node->sealed,
                $node->unsealedType?->keyType ? $this->getTypeFromNode($node->unsealedType->keyType, $typeContext) : null,
                $node->unsealedType?->valueType ? $this->getTypeFromNode($node->unsealedType->valueType, $typeContext) : null,
            );
        }

        if ($node instanceof ObjectShapeNode) {
            return Type::object();
        }

        if ($node instanceof ThisTypeNode) {
            if (null === $typeContext) {
                throw new InvalidArgumentException(\sprintf('A "%s" must be provided to resolve "$this".', TypeContext::class));
            }

            return Type::object($typeContext->getCalledClass());
        }

        if ($node instanceof ConstTypeNode) {
            if ($node->constExpr instanceof ConstFetchNode) {
                $className = match (strtolower($node->constExpr->className)) {
                    'self' => $typeContext->getDeclaringClass(),
                    'static' => $typeContext->getCalledClass(),
                    'parent' => $typeContext->getParentClass(),
                    default => $node->constExpr->className,
                };

                if (!class_exists($className)) {
                    return Type::mixed();
                }

                $types = [];

                foreach ((new \ReflectionClass($className))->getReflectionConstants() as $const) {
                    if (preg_match('/^'.str_replace('\*', '.*', preg_quote($node->constExpr->name, '/')).'$/', $const->getName())) {
                        $types[] = Type::fromValue($const->getValue());
                    }
                }

                return CollectionType::mergeCollectionValueTypes($types);
            }

            return match ($node->constExpr::class) {
                ConstExprArrayNode::class => Type::array(),
                ConstExprFalseNode::class => Type::false(),
                ConstExprFloatNode::class => Type::float(),
                ConstExprIntegerNode::class => Type::int(),
                ConstExprNullNode::class => Type::null(),
                ConstExprStringNode::class => Type::string(),
                ConstExprTrueNode::class => Type::true(),
                default => throw new \DomainException(\sprintf('Unhandled "%s" constant expression.', $node->constExpr::class)),
            };
        }

        if ($node instanceof IdentifierTypeNode) {
            $type = match ($node->name) {
                'bool', 'boolean' => Type::bool(),
                'true' => Type::true(),
                'false' => Type::false(),
                'int', 'integer', 'positive-int', 'negative-int', 'non-positive-int', 'non-negative-int', 'non-zero-int' => Type::int(),
                'float', 'double' => Type::float(),
                'string',
                'class-string',
                'trait-string',
                'interface-string',
                'callable-string',
                'numeric-string',
                'lowercase-string',
                'non-empty-lowercase-string',
                'non-empty-string',
                'non-falsy-string',
                'truthy-string',
                'literal-string',
                'html-escaped-string' => Type::string(),
                'resource' => Type::resource(),
                'object' => Type::object(),
                'callable' => Type::callable(),
                'array', 'non-empty-array' => Type::array(),
                'list', 'non-empty-list' => Type::list(),
                'iterable' => Type::iterable(),
                'mixed' => Type::mixed(),
                'null' => Type::null(),
                'array-key' => Type::arrayKey(),
                'scalar' => Type::union(Type::int(), Type::float(), Type::string(), Type::bool()),
                'number' => Type::union(Type::int(), Type::float()),
                'numeric' => Type::union(Type::int(), Type::float(), Type::string()),
                'self' => $typeContext ? Type::object($typeContext->getDeclaringClass()) : throw new InvalidArgumentException(\sprintf('A "%s" must be provided to resolve "self".', TypeContext::class)),
                'static' => $typeContext ? Type::object($typeContext->getCalledClass()) : throw new InvalidArgumentException(\sprintf('A "%s" must be provided to resolve "static".', TypeContext::class)),
                'parent' => $typeContext ? Type::object($typeContext->getParentClass()) : throw new InvalidArgumentException(\sprintf('A "%s" must be provided to resolve "parent".', TypeContext::class)),
                'void' => Type::void(),
                'never', 'never-return', 'never-returns', 'no-return' => Type::never(),
                default => $this->resolveCustomIdentifier($node->name, $typeContext),
            };

            if ($typeIsCollectionObject($type)) {
                return Type::collection($type);
            }

            return $type;
        }

        if ($node instanceof NullableTypeNode) {
            return Type::nullable($this->getTypeFromNode($node->type, $typeContext));
        }

        if ($node instanceof GenericTypeNode) {
            if ($node->type instanceof IdentifierTypeNode && 'value-of' === $node->type->name) {
                $type = $this->getTypeFromNode($node->genericTypes[0], $typeContext);
                if ($type instanceof BackedEnumType) {
                    return $type->getBackingType();
                }

                if ($type instanceof CollectionType) {
                    return $type->getCollectionValueType();
                }

                throw new \DomainException(\sprintf('"%s" is not a valid type for "value-of".', $node->genericTypes[0]));
            }

            if ($node->type instanceof IdentifierTypeNode && 'key-of' === $node->type->name) {
                $type = $this->getTypeFromNode($node->genericTypes[0], $typeContext);
                if ($type instanceof CollectionType) {
                    return $type->getCollectionKeyType();
                }

                throw new \DomainException(\sprintf('"%s" is not a valid type for "key-of".', $node->genericTypes[0]));
            }

            $type = $this->getTypeFromNode($node->type, $typeContext);

            // handle integer ranges as simple integers
            if ($type->isIdentifiedBy(TypeIdentifier::INT)) {
                return $type;
            }

            $variableTypes = array_map(fn (TypeNode $t): Type => $this->getTypeFromNode($t, $typeContext), $node->genericTypes);

            if ($type instanceof CollectionType) {
                $asList = $type->isList();
                $keyType = $type->getCollectionKeyType();
                $type = $type->getWrappedType();

                if ($type instanceof GenericType) {
                    $type = $type->getWrappedType();
                }

                if (1 === \count($variableTypes)) {
                    return new CollectionType(Type::generic($type, $keyType, $variableTypes[0]), $asList);
                } elseif (2 === \count($variableTypes)) {
                    return Type::collection($type, $variableTypes[1], $variableTypes[0], $asList);
                }
            }

            if ($typeIsCollectionObject($type)) {
                return match (\count($variableTypes)) {
                    1 => Type::collection($type, $variableTypes[0]),
                    2 => Type::collection($type, $variableTypes[1], $variableTypes[0]),
                    default => Type::collection($type),
                };
            }

            if ($type instanceof BuiltinType && TypeIdentifier::ARRAY !== $type->getTypeIdentifier() && TypeIdentifier::ITERABLE !== $type->getTypeIdentifier()) {
                return $type;
            }

            return Type::generic($type, ...$variableTypes);
        }

        if ($node instanceof UnionTypeNode) {
            $types = [];

            foreach ($node->types as $nodeType) {
                $type = $this->getTypeFromNode($nodeType, $typeContext);

                if ($type instanceof BuiltinType && TypeIdentifier::MIXED === $type->getTypeIdentifier()) {
                    return Type::mixed();
                }

                $types[] = $type;
            }

            return Type::union(...$types);
        }

        if ($node instanceof IntersectionTypeNode) {
            return Type::intersection(...array_map(fn (TypeNode $t): Type => $this->getTypeFromNode($t, $typeContext), $node->types));
        }

        throw new \DomainException(\sprintf('Unhandled "%s" node.', $node::class));
    }

    private function resolveCustomIdentifier(string $identifier, ?TypeContext $typeContext): Type
    {
        $className = $typeContext ? $typeContext->normalize($identifier) : $identifier;

        if (!isset(self::$classExistCache[$className])) {
            self::$classExistCache[$className] = false;

            if (class_exists($className) || interface_exists($className)) {
                self::$classExistCache[$className] = true;
            } else {
                try {
                    new \ReflectionClass($className);
                    self::$classExistCache[$className] = true;
                } catch (\Throwable) {
                }
            }
        }

        if (self::$classExistCache[$className]) {
            if (is_subclass_of($className, \UnitEnum::class)) {
                return Type::enum($className);
            }

            return Type::object($className);
        }

        if (isset($typeContext?->templates[$identifier])) {
            return Type::template($identifier, $typeContext->templates[$identifier]);
        }

        if (isset($typeContext?->typeAliases[$identifier])) {
            return $typeContext->typeAliases[$identifier];
        }

        throw new \DomainException(\sprintf('Unhandled "%s" identifier.', $identifier));
    }
}
