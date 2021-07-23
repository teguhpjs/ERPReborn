<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblRotateLog_FileUploadStagingAreaDetail                                                                     |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► TblRotateLog_FileUploadStagingAreaDetail                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblRotateLog_FileUploadStagingAreaDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
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
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation (Optional)                                                 |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefID ► RotateLog_FileUploadStagingArea Reference ID (Mandatory)      |
        |      ▪ (int)    varFileIndex ► File Index (Mandatory)                                                                    |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (string) varFileLastModifiedDateTimeTZ ► File Last Modified DateTimeTZ (Mandatory)                                |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, 
            int $varRotateLog_FileUploadStagingArea_RefID, int $varFileIndex, string $varFileName, int $varFileSize, string $varFileMIME, string $varFileExtension, string $varFileLastModifiedDateTimeTZ, int $varFileLastModifiedUnixTimestamp)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.Func_TblRotateLog_FileUploadStagingAreaDetail_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [null, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varRotateLog_FileUploadStagingArea_RefID, 'bigint'],
                        [$varFileIndex, 'smallint'],
                        [$varFileName, 'character varying'],
                        [$varFileSize, 'bigint'],
                        [$varFileMIME, 'character varying'],
                        [$varFileExtension, 'character varying'],
                        [$varFileLastModifiedDateTimeTZ, 'character varying'],
                        [$varFileLastModifiedUnixTimestamp, 'bigint']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }

?>