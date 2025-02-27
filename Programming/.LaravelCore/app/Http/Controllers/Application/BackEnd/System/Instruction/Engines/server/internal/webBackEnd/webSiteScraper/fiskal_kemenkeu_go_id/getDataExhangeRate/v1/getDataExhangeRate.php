<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper    |
|                \fiskal_kemenkeu_go_id\getDataExhangeRate\v1                                                                      | 
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper\fiskal_kemenkeu_go_id\getDataExhangeRate\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getDataExhangeRate                                                                                           |
    | ▪ Description : Menangani API instruction.server.internal.webBackEnd.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate |
    |                 Version 1                                                                                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getDataExhangeRate extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-02                                                                                           |
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-02                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create Blood Aglutinogen Type Data (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try{
                        $varDate = 
                            explode('-', $varData['entities']['date'])[2].
                            '-'.
                            explode('-', $varData['entities']['date'])[1].
                            '-'.
                            explode('-', $varData['entities']['date'])[0];
                        $varURL = 'https://fiskal.kemenkeu.go.id/informasi-publik/kurs-pajak?date='.$varDate;
                        $ch = curl_init($varURL);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        $varResponse = curl_exec($ch);
                        curl_close($ch);

                        $varData=null;
                        $varResponse = (explode('<!-- FOOTER -->', (explode('<h1 class="jumbo-header">Kurs Pajak</h1>', $varResponse))[1]))[0];
                        $varData['KMK']['Number'] = (string) explode('</strong></p>', explode('<p><strong>', (explode('Tanggal Berlaku:', $varResponse))[0])[1])[0];
                        $varData['KMK']['StartDateTimeTZ'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('-', trim(explode('</i>', explode('<i> Tanggal Berlaku:', $varResponse)[1])[0]))[0])).' 00:00:00 +07';
                        $varData['KMK']['FinishDateTimeTZ'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('-', trim(explode('</i>', explode('<i> Tanggal Berlaku:', $varResponse)[1])[0]))[1])).' 23:59:59 +07';
                        $varResponse = explode('<tr>', explode('</tbody>', explode('<tbody>', (explode('<div class="table-responsive">', $varResponse))[1])[1])[0]);

                        for($i=0; $i!=25; $i++)
                            {
                            $varISOCode = explode(')</td>', explode('(', explode('<td', $varResponse[$i+1])[2])[1])[0];
                            $varExchangeRate = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', explode('<td', $varResponse[$i+1])[3])[1])[0])[1])), 2, '.', '');
                            $varData['ExchangeRate'][$varISOCode] = number_format((float) $varExchangeRate * (strcmp($varISOCode, 'JPY')==0 ? (1/100) : 1), 2, '.', '');
                            }
                                            
                        $varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession,
                                $varData
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Data Retrieval Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }