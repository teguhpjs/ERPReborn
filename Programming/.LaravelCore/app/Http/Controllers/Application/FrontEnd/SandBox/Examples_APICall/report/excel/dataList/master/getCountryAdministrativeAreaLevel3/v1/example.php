<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\excel\dataList\master                 |
|                 \getCountryAdministrativeAreaLevel3\v1                                                                           |
| ▪ API Key     : report.excel.dataList.master.getCountryAdministrativeAreaLevel3                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\excel\dataList\master\getCountryAdministrativeAreaLevel3\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.excel.dataList.master.getCountryAdministrativeAreaLevel3.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.excel.dataList.master.getCountryAdministrativeAreaLevel3.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-22                                                                                           |
        | ▪ Creation Date   : 2022-07-22                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayDownloadExcel(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.excel.dataList.master.getCountryAdministrativeAreaLevel3', 
                'latest', 
                [
                'outputFileName' => 'Data List - Country Administrative Area Level 3.xlsx',
                'parameter' => [
                    'countryAdministrativeAreaLevel2_RefID' => 22000000000001
                    ]
                ]
                );
            }
        }
    }