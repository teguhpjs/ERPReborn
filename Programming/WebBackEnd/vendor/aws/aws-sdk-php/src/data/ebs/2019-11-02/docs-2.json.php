<?php
// This file was auto-generated from sdk-root/src/data/ebs/2019-11-02/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>You can use the Amazon Elastic Block Store (Amazon EBS) direct APIs to create EBS snapshots, write data directly to your snapshots, read data on your snapshots, and identify the differences or changes between two snapshots. If you’re an independent software vendor (ISV) who offers backup services for Amazon EBS, the EBS direct APIs make it more efficient and cost-effective to track incremental changes on your EBS volumes through snapshots. This can be done without having to create new volumes from snapshots, and then use Amazon Elastic Compute Cloud (Amazon EC2) instances to compare the differences.</p> <p>You can create incremental snapshots directly from data on-premises into EBS volumes and the cloud to use for quick disaster recovery. With the ability to write and read snapshots, you can write your on-premises data to an EBS snapshot during a disaster. Then after recovery, you can restore it back to AWS or on-premises from the snapshot. You no longer need to build and maintain complex mechanisms to copy data to and from Amazon EBS.</p> <p>This API reference provides detailed information about the actions, data types, parameters, and errors of the EBS direct APIs. For more information about the elements that make up the EBS direct APIs, and examples of how to use them effectively, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-accessing-snapshot.html">Accessing the Contents of an EBS Snapshot</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>. For more information about the supported AWS Regions, endpoints, and service quotas for the EBS direct APIs, see <a href="https://docs.aws.amazon.com/general/latest/gr/ebs-service.html">Amazon Elastic Block Store Endpoints and Quotas</a> in the <i>AWS General Reference</i>.</p>', 'operations' => [ 'CompleteSnapshot' => '<p>Seals and completes the snapshot after all of the required blocks of data have been written to it. Completing the snapshot changes the status to <code>completed</code>. You cannot write new blocks to a snapshot after it has been completed.</p>', 'GetSnapshotBlock' => '<p>Returns the data in a block in an Amazon Elastic Block Store snapshot.</p>', 'ListChangedBlocks' => '<p>Returns information about the blocks that are different between two Amazon Elastic Block Store snapshots of the same volume/snapshot lineage.</p>', 'ListSnapshotBlocks' => '<p>Returns information about the blocks in an Amazon Elastic Block Store snapshot.</p>', 'PutSnapshotBlock' => '<p>Writes a block of data to a snapshot. If the specified block contains data, the existing data is overwritten. The target snapshot must be in the <code>pending</code> state.</p> <p>Data written to a snapshot must be aligned with 512-byte sectors.</p>', 'StartSnapshot' => '<p>Creates a new Amazon EBS snapshot. The new snapshot enters the <code>pending</code> state after the request completes. </p> <p>After creating the snapshot, use <a href="https://docs.aws.amazon.com/ebs/latest/APIReference/API_PutSnapshotBlock.html"> PutSnapshotBlock</a> to write blocks of data to the snapshot.</p>', ], 'shapes' => [ 'AccessDeniedException' => [ 'base' => '<p>You do not have sufficient access to perform this action.</p>', 'refs' => [], ], 'AccessDeniedExceptionReason' => [ 'base' => NULL, 'refs' => [ 'AccessDeniedException$Reason' => '<p>The reason for the exception.</p>', ], ], 'Block' => [ 'base' => '<p>A block of data in an Amazon Elastic Block Store snapshot.</p>', 'refs' => [ 'Blocks$member' => NULL, ], ], 'BlockData' => [ 'base' => NULL, 'refs' => [ 'GetSnapshotBlockResponse$BlockData' => '<p>The data content of the block.</p>', 'PutSnapshotBlockRequest$BlockData' => '<p>The data to write to the block.</p> <p>The block data is not signed as part of the Signature Version 4 signing process. As a result, you must generate and provide a Base64-encoded SHA256 checksum for the block data using the <b>x-amz-Checksum</b> header. Also, you must specify the checksum algorithm using the <b>x-amz-Checksum-Algorithm</b> header. The checksum that you provide is part of the Signature Version 4 signing process. It is validated against a checksum generated by Amazon EBS to ensure the validity and authenticity of the data. If the checksums do not correspond, the request fails. For more information, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-accessing-snapshot.html#ebsapis-using-checksums"> Using checksums with the EBS direct APIs</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>.</p>', ], ], 'BlockIndex' => [ 'base' => NULL, 'refs' => [ 'Block$BlockIndex' => '<p>The block index.</p>', 'ChangedBlock$BlockIndex' => '<p>The block index.</p>', 'GetSnapshotBlockRequest$BlockIndex' => '<p>The block index of the block from which to get data.</p> <p>Obtain the <code>BlockIndex</code> by running the <code>ListChangedBlocks</code> or <code>ListSnapshotBlocks</code> operations.</p>', 'ListChangedBlocksRequest$StartingBlockIndex' => '<p>The block index from which the comparison should start.</p> <p>The list in the response will start from this block index or the next valid block index in the snapshots.</p>', 'ListSnapshotBlocksRequest$StartingBlockIndex' => '<p>The block index from which the list should start. The list in the response will start from this block index or the next valid block index in the snapshot.</p>', 'PutSnapshotBlockRequest$BlockIndex' => '<p>The block index of the block in which to write the data. A block index is a logical index in units of <code>512</code> KiB blocks. To identify the block index, divide the logical offset of the data in the logical volume by the block size (logical offset of data/<code>524288</code>). The logical offset of the data must be <code>512</code> KiB aligned.</p>', ], ], 'BlockSize' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksResponse$BlockSize' => '<p>The size of the block.</p>', 'ListSnapshotBlocksResponse$BlockSize' => '<p>The size of the block.</p>', 'StartSnapshotResponse$BlockSize' => '<p>The size of the blocks in the snapshot, in bytes.</p>', ], ], 'BlockToken' => [ 'base' => NULL, 'refs' => [ 'Block$BlockToken' => '<p>The block token for the block index.</p>', 'ChangedBlock$FirstBlockToken' => '<p>The block token for the block index of the <code>FirstSnapshotId</code> specified in the <code>ListChangedBlocks</code> operation. This value is absent if the first snapshot does not have the changed block that is on the second snapshot.</p>', 'ChangedBlock$SecondBlockToken' => '<p>The block token for the block index of the <code>SecondSnapshotId</code> specified in the <code>ListChangedBlocks</code> operation.</p>', 'GetSnapshotBlockRequest$BlockToken' => '<p>The block token of the block from which to get data.</p> <p>Obtain the <code>BlockToken</code> by running the <code>ListChangedBlocks</code> or <code>ListSnapshotBlocks</code> operations.</p>', ], ], 'Blocks' => [ 'base' => NULL, 'refs' => [ 'ListSnapshotBlocksResponse$Blocks' => '<p>An array of objects containing information about the blocks.</p>', ], ], 'Boolean' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$Encrypted' => '<p>Indicates whether to encrypt the snapshot. To create an encrypted snapshot, specify <code>true</code>. To create an unencrypted snapshot, omit this parameter.</p> <p>If you specify a value for <b>ParentSnapshotId</b>, omit this parameter.</p> <p>If you specify <code>true</code>, the snapshot is encrypted using the CMK specified using the <b>KmsKeyArn</b> parameter. If no value is specified for <b>KmsKeyArn</b>, the default CMK for your account is used. If no default CMK has been specified for your account, the AWS managed CMK is used. To set a default CMK for your account, use <a href="https://docs.aws.amazon.com/AWSEC2/latest/APIReference/API_ModifyEbsDefaultKmsKeyId.html"> ModifyEbsDefaultKmsKeyId</a>.</p> <p>If your account is enabled for encryption by default, you cannot set this parameter to <code>false</code>. In this case, you can omit this parameter.</p> <p>For more information, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-accessing-snapshot.html#ebsapis-using-encryption"> Using encryption</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>.</p>', ], ], 'ChangedBlock' => [ 'base' => '<p>A block of data in an Amazon Elastic Block Store snapshot that is different from another snapshot of the same volume/snapshot lineage.</p>', 'refs' => [ 'ChangedBlocks$member' => NULL, ], ], 'ChangedBlocks' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksResponse$ChangedBlocks' => '<p>An array of objects containing information about the changed blocks.</p>', ], ], 'ChangedBlocksCount' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotRequest$ChangedBlocksCount' => '<p>The number of blocks that were written to the snapshot.</p>', ], ], 'Checksum' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotRequest$Checksum' => '<p>An aggregated Base-64 SHA256 checksum based on the checksums of each written block.</p> <p>To generate the aggregated checksum using the linear aggregation method, arrange the checksums for each written block in ascending order of their block index, concatenate them to form a single string, and then generate the checksum on the entire string using the SHA256 algorithm.</p>', 'GetSnapshotBlockResponse$Checksum' => '<p>The checksum generated for the block, which is Base64 encoded.</p>', 'PutSnapshotBlockRequest$Checksum' => '<p>A Base64-encoded SHA256 checksum of the data. Only SHA256 checksums are supported.</p>', 'PutSnapshotBlockResponse$Checksum' => '<p>The SHA256 checksum generated for the block data by Amazon EBS.</p>', ], ], 'ChecksumAggregationMethod' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotRequest$ChecksumAggregationMethod' => '<p>The aggregation method used to generate the checksum. Currently, the only supported aggregation method is <code>LINEAR</code>.</p>', ], ], 'ChecksumAlgorithm' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotRequest$ChecksumAlgorithm' => '<p>The algorithm used to generate the checksum. Currently, the only supported algorithm is <code>SHA256</code>.</p>', 'GetSnapshotBlockResponse$ChecksumAlgorithm' => '<p>The algorithm used to generate the checksum for the block, such as SHA256.</p>', 'PutSnapshotBlockRequest$ChecksumAlgorithm' => '<p>The algorithm used to generate the checksum. Currently, the only supported algorithm is <code>SHA256</code>.</p>', 'PutSnapshotBlockResponse$ChecksumAlgorithm' => '<p>The algorithm used by Amazon EBS to generate the checksum.</p>', ], ], 'CompleteSnapshotRequest' => [ 'base' => NULL, 'refs' => [], ], 'CompleteSnapshotResponse' => [ 'base' => NULL, 'refs' => [], ], 'ConcurrentLimitExceededException' => [ 'base' => '<p>You have reached the limit for concurrent API requests. For more information, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-accessing-snapshot.html#ebsapi-performance">Optimizing performance of the EBS direct APIs</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>.</p>', 'refs' => [], ], 'ConflictException' => [ 'base' => '<p>The request uses the same client token as a previous, but non-identical request.</p>', 'refs' => [], ], 'DataLength' => [ 'base' => NULL, 'refs' => [ 'GetSnapshotBlockResponse$DataLength' => '<p>The size of the data in the block.</p>', 'PutSnapshotBlockRequest$DataLength' => '<p>The size of the data to write to the block, in bytes. Currently, the only supported size is <code>524288</code>.</p> <p>Valid values: <code>524288</code> </p>', ], ], 'Description' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$Description' => '<p>A description for the snapshot.</p>', 'StartSnapshotResponse$Description' => '<p>The description of the snapshot.</p>', ], ], 'ErrorMessage' => [ 'base' => NULL, 'refs' => [ 'AccessDeniedException$Message' => NULL, 'ConcurrentLimitExceededException$Message' => NULL, 'ConflictException$Message' => NULL, 'InternalServerException$Message' => NULL, 'RequestThrottledException$Message' => NULL, 'ResourceNotFoundException$Message' => NULL, 'ServiceQuotaExceededException$Message' => NULL, 'ValidationException$Message' => NULL, ], ], 'GetSnapshotBlockRequest' => [ 'base' => NULL, 'refs' => [], ], 'GetSnapshotBlockResponse' => [ 'base' => NULL, 'refs' => [], ], 'IdempotencyToken' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$ClientToken' => '<p>A unique, case-sensitive identifier that you provide to ensure the idempotency of the request. Idempotency ensures that an API request completes only once. With an idempotent request, if the original request completes successfully. The subsequent retries with the same client token return the result from the original successful request and they have no additional effect.</p> <p>If you do not specify a client token, one is automatically generated by the AWS SDK.</p> <p>For more information, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ebs-direct-api-idempotency.html"> Idempotency for StartSnapshot API</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>.</p>', ], ], 'InternalServerException' => [ 'base' => '<p>An internal error has occurred.</p>', 'refs' => [], ], 'KmsKeyArn' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$KmsKeyArn' => '<p>The Amazon Resource Name (ARN) of the AWS Key Management Service (AWS KMS) customer master key (CMK) to be used to encrypt the snapshot. If you do not specify a CMK, the default AWS managed CMK is used.</p> <p>If you specify a <b>ParentSnapshotId</b>, omit this parameter; the snapshot will be encrypted using the same CMK that was used to encrypt the parent snapshot.</p> <p>If <b>Encrypted</b> is set to <code>true</code>, you must specify a CMK ARN. </p>', 'StartSnapshotResponse$KmsKeyArn' => '<p>The Amazon Resource Name (ARN) of the AWS Key Management Service (AWS KMS) customer master key (CMK) used to encrypt the snapshot.</p>', ], ], 'ListChangedBlocksRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListChangedBlocksResponse' => [ 'base' => NULL, 'refs' => [], ], 'ListSnapshotBlocksRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListSnapshotBlocksResponse' => [ 'base' => NULL, 'refs' => [], ], 'MaxResults' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksRequest$MaxResults' => '<p>The number of results to return.</p>', 'ListSnapshotBlocksRequest$MaxResults' => '<p>The number of results to return.</p>', ], ], 'OwnerId' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotResponse$OwnerId' => '<p>The AWS account ID of the snapshot owner.</p>', ], ], 'PageToken' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksRequest$NextToken' => '<p>The token to request the next page of results.</p>', 'ListChangedBlocksResponse$NextToken' => '<p>The token to use to retrieve the next page of results. This value is null when there are no more results to return.</p>', 'ListSnapshotBlocksRequest$NextToken' => '<p>The token to request the next page of results.</p>', 'ListSnapshotBlocksResponse$NextToken' => '<p>The token to use to retrieve the next page of results. This value is null when there are no more results to return.</p>', ], ], 'Progress' => [ 'base' => NULL, 'refs' => [ 'PutSnapshotBlockRequest$Progress' => '<p>The progress of the write process, as a percentage.</p>', ], ], 'PutSnapshotBlockRequest' => [ 'base' => NULL, 'refs' => [], ], 'PutSnapshotBlockResponse' => [ 'base' => NULL, 'refs' => [], ], 'RequestThrottledException' => [ 'base' => '<p>The number of API requests has exceed the maximum allowed API request throttling limit.</p>', 'refs' => [], ], 'RequestThrottledExceptionReason' => [ 'base' => NULL, 'refs' => [ 'RequestThrottledException$Reason' => '<p>The reason for the exception.</p>', ], ], 'ResourceNotFoundException' => [ 'base' => '<p>The specified resource does not exist.</p>', 'refs' => [], ], 'ResourceNotFoundExceptionReason' => [ 'base' => NULL, 'refs' => [ 'ResourceNotFoundException$Reason' => '<p>The reason for the exception.</p>', ], ], 'ServiceQuotaExceededException' => [ 'base' => '<p>Your current service quotas do not allow you to perform this action.</p>', 'refs' => [], ], 'ServiceQuotaExceededExceptionReason' => [ 'base' => NULL, 'refs' => [ 'ServiceQuotaExceededException$Reason' => '<p>The reason for the exception.</p>', ], ], 'SnapshotId' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotRequest$SnapshotId' => '<p>The ID of the snapshot.</p>', 'GetSnapshotBlockRequest$SnapshotId' => '<p>The ID of the snapshot containing the block from which to get data.</p>', 'ListChangedBlocksRequest$FirstSnapshotId' => '<p>The ID of the first snapshot to use for the comparison.</p> <important> <p>The <code>FirstSnapshotID</code> parameter must be specified with a <code>SecondSnapshotId</code> parameter; otherwise, an error occurs.</p> </important>', 'ListChangedBlocksRequest$SecondSnapshotId' => '<p>The ID of the second snapshot to use for the comparison.</p> <important> <p>The <code>SecondSnapshotId</code> parameter must be specified with a <code>FirstSnapshotID</code> parameter; otherwise, an error occurs.</p> </important>', 'ListSnapshotBlocksRequest$SnapshotId' => '<p>The ID of the snapshot from which to get block indexes and block tokens.</p>', 'PutSnapshotBlockRequest$SnapshotId' => '<p>The ID of the snapshot.</p>', 'StartSnapshotRequest$ParentSnapshotId' => '<p>The ID of the parent snapshot. If there is no parent snapshot, or if you are creating the first snapshot for an on-premises volume, omit this parameter.</p> <p>If your account is enabled for encryption by default, you cannot use an unencrypted snapshot as a parent snapshot. You must first create an encrypted copy of the parent snapshot using <a href="https://docs.aws.amazon.com/AWSEC2/latest/APIReference/API_CopySnapshot.html">CopySnapshot</a>.</p>', 'StartSnapshotResponse$SnapshotId' => '<p>The ID of the snapshot.</p>', 'StartSnapshotResponse$ParentSnapshotId' => '<p>The ID of the parent snapshot.</p>', ], ], 'StartSnapshotRequest' => [ 'base' => NULL, 'refs' => [], ], 'StartSnapshotResponse' => [ 'base' => NULL, 'refs' => [], ], 'Status' => [ 'base' => NULL, 'refs' => [ 'CompleteSnapshotResponse$Status' => '<p>The status of the snapshot.</p>', 'StartSnapshotResponse$Status' => '<p>The status of the snapshot.</p>', ], ], 'Tag' => [ 'base' => '<p>Describes a tag.</p>', 'refs' => [ 'Tags$member' => NULL, ], ], 'TagKey' => [ 'base' => NULL, 'refs' => [ 'Tag$Key' => '<p>The key of the tag.</p>', ], ], 'TagValue' => [ 'base' => NULL, 'refs' => [ 'Tag$Value' => '<p>The value of the tag.</p>', ], ], 'Tags' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$Tags' => '<p>The tags to apply to the snapshot.</p>', 'StartSnapshotResponse$Tags' => '<p>The tags applied to the snapshot. You can specify up to 50 tags per snapshot. For more information, see <a href="https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/Using_Tags.html"> Tagging your Amazon EC2 resources</a> in the <i>Amazon Elastic Compute Cloud User Guide</i>.</p>', ], ], 'TimeStamp' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksResponse$ExpiryTime' => '<p>The time when the <code>BlockToken</code> expires.</p>', 'ListSnapshotBlocksResponse$ExpiryTime' => '<p>The time when the <code>BlockToken</code> expires.</p>', 'StartSnapshotResponse$StartTime' => '<p>The timestamp when the snapshot was created.</p>', ], ], 'Timeout' => [ 'base' => NULL, 'refs' => [ 'StartSnapshotRequest$Timeout' => '<p>The amount of time (in minutes) after which the snapshot is automatically cancelled if:</p> <ul> <li> <p>No blocks are written to the snapshot.</p> </li> <li> <p>The snapshot is not completed after writing the last block of data.</p> </li> </ul> <p>If no value is specified, the timeout defaults to <code>60</code> minutes.</p>', ], ], 'ValidationException' => [ 'base' => '<p>The input fails to satisfy the constraints of the EBS direct APIs.</p>', 'refs' => [], ], 'ValidationExceptionReason' => [ 'base' => NULL, 'refs' => [ 'ValidationException$Reason' => '<p>The reason for the validation exception.</p>', ], ], 'VolumeSize' => [ 'base' => NULL, 'refs' => [ 'ListChangedBlocksResponse$VolumeSize' => '<p>The size of the volume in GB.</p>', 'ListSnapshotBlocksResponse$VolumeSize' => '<p>The size of the volume in GB.</p>', 'StartSnapshotRequest$VolumeSize' => '<p>The size of the volume, in GiB. The maximum size is <code>16384</code> GiB (16 TiB).</p>', 'StartSnapshotResponse$VolumeSize' => '<p>The size of the volume, in GiB.</p>', ], ], ],];