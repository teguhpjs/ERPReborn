<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\create\supplyChain\setOrderPickingDetail\v1  |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\create\supplyChain\setOrderPickingDetail\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setOrderPickingDetail                                                                                        |
    | ▪ Description : Menangani API transaction.create.supplyChain.setOrderPickingDetail Version 1                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setOrderPickingDetail extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-10                                                                                           |
        | ▪ Creation Date   : 2024-01-10                                                                                           |
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
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-11                                                                                           |
        | ▪ Creation Date   : 2024-01-10                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Create Order Picking Detail Data (version 1)');

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataCreate(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_SupplyChain\TblOrderPickingDetail())->setDataInsert(
                                    $varUserSession,

                                    null,
                                    null,
                                    null,
                                    null,
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                        $varUserSession
                                        )
                                    )['branchID'],
                                    (\App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID(
                                        $varUserSession,
                                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                            $varUserSession
                                            )
                                        )['branchID'],
                                        'Env.System.BaseCurrency.ID'
                                        )
                                    ),

                                    $varData['entities']['orderPicking_RefID'],
                                    $varData['entities']['orderPickingRequisitionDetail_RefID'],
                                    $varData['entities']['quantity'],
                                    $varData['entities']['quantityUnit_RefID'],
                                    $varData['entities']['productUnitPriceCurrency_RefID'],
                                    $varData['entities']['productUnitPriceCurrencyValue'],
                                    $varData['entities']['productUnitPriceCurrencyExchangeRate'],
                                    $varData['entities']['productUnitPriceDiscountCurrency_RefID'],
                                    $varData['entities']['productUnitPriceDiscountCurrencyeValue'],
                                    $varData['entities']['productUnitPriceDiscountCurrencyExchangeRate'],
                                    $varData['entities']['remarks']
                                    )
                                )
                            ))
                            {
                            throw new \Exception();
                            }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                                );
                        }

                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
                                );
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }