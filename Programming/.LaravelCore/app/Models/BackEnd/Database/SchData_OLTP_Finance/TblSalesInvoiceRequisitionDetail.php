<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblSalesInvoiceRequisitionDetail                                                                             |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblSalesInvoiceRequisitionDetail                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblSalesInvoiceRequisitionDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-13                                                                                           |
        | ▪ Creation Date   : 2023-11-13                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            parent::__construct(__CLASS__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-22                                                                                           |
        | ▪ Creation Date   : 2023-11-13                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysDataValidityStartDateTimeTZ ► System Data Validity Start DateTimeTZ                                |
        |      ▪ (string) varSysDataValidityFinishDateTimeTZ ► System Validity Finish DateTimeTZ                                   |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varSalesInvoiceRequisition_RefID ► Sales Invoice Requisition Reference ID                                |
        |      ▪ (int)    varSalesOrderDetail_RefID ► Sales Order Detail Reference ID                                              |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceCurrency_RefID ► Product Unit Price Currency Reference ID                             |
        |      ▪ (float)  varProductUnitPriceCurrencyValue ► Product Unit Price Currency Value                                     |
        |      ▪ (float)  varProductUnitPriceCurrencyExchangeRate ► Product Unit Price Currency Exchange Rate                      |
        |      ▪ (int)    varProductUnitPriceDiscountCurrency_RefID ► Product Unit Price Discount Currency Reference ID            |
        |      ▪ (float)  varProductUnitPriceDiscountCurrencyValue ► Product Unit Price Discount Currency Value                    |
        |      ▪ (float)  varProductUnitPriceDiscountCurrencyExchangeRate ► Product Unit Price Discount Currency Exchange Rate     |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varSalesInvoiceRequisition_RefID = null, int $varSalesOrderDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceCurrency_RefID = null, float $varProductUnitPriceCurrencyValue = null, float $varProductUnitPriceCurrencyExchangeRate = null, int $varProductUnitPriceDiscountCurrency_RefID = null, float $varProductUnitPriceDiscountCurrencyValue = null, float $varProductUnitPriceDiscountCurrencyExchangeRate = null, string $varRemarks = null
            )
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varSalesInvoiceRequisition_RefID, 'bigint'],
                            [$varSalesOrderDetail_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceCurrencyValue, 'numeric'],
                            [$varProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceDiscountCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceDiscountCurrencyValue, 'numeric'],
                            [$varProductUnitPriceDiscountCurrencyExchangeRate, 'numeric'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-22                                                                                           |
        | ▪ Creation Date   : 2023-11-13                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysDataValidityStartDateTimeTZ ► System Data Validity Start DateTimeTZ                                |
        |      ▪ (string) varSysDataValidityFinishDateTimeTZ ► System Validity Finish DateTimeTZ                                   |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varSalesInvoiceRequisition_RefID ► Sales Invoice Requisition Reference ID                                |
        |      ▪ (int)    varSalesOrderDetail_RefID ► Sales Order Detail Reference ID                                              |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceCurrency_RefID ► Product Unit Price Currency Reference ID                             |
        |      ▪ (float)  varProductUnitPriceCurrencyValue ► Product Unit Price Currency Value                                     |
        |      ▪ (float)  varProductUnitPriceCurrencyExchangeRate ► Product Unit Price Currency Exchange Rate                      |
        |      ▪ (int)    varProductUnitPriceDiscountCurrency_RefID ► Product Unit Price Discount Currency Reference ID            |
        |      ▪ (float)  varProductUnitPriceDiscountCurrencyValue ► Product Unit Price Discount Currency Value                    |
        |      ▪ (float)  varProductUnitPriceDiscountCurrencyExchangeRate ► Product Unit Price Discount Currency Exchange Rate     |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varSalesInvoiceRequisition_RefID = null, int $varSalesOrderDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceCurrency_RefID = null, float $varProductUnitPriceCurrencyValue = null, float $varProductUnitPriceCurrencyExchangeRate = null, int $varProductUnitPriceDiscountCurrency_RefID = null, float $varProductUnitPriceDiscountCurrencyValue = null, float $varProductUnitPriceDiscountCurrencyExchangeRate = null, string $varRemarks = null
            )
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSysID, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varSalesInvoiceRequisition_RefID, 'bigint'],
                            [$varSalesOrderDetail_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceCurrencyValue, 'numeric'],
                            [$varProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceDiscountCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceDiscountCurrencyValue, 'numeric'],
                            [$varProductUnitPriceDiscountCurrencyExchangeRate, 'numeric'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }