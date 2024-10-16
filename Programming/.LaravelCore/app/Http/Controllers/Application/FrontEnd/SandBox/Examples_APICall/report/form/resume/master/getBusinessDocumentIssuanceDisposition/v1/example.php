<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\master                    |
|                 \getBusinessDocumentIssuanceDisposition\v1                                                                       |
| ▪ API Key     : report.form.resume.master.getBusinessDocumentIssuanceDisposition                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\master\getBusinessDocumentIssuanceDisposition\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.master.getBusinessDocumentIssuanceDisposition.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.master.getBusinessDocumentIssuanceDisposition.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-20                                                                                           |
        | ▪ Creation Date   : 2023-06-20                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.resume.master.getBusinessDocumentIssuanceDisposition', 
                'latest',
                [
                'parameter' => [
                    'recordID' => 164000000000196,
                    'dataFilter' => [
                        'businessDocumentNumber' => 'Adv/QDC/2023/000126',
                        'businessDocumentType_RefID' => NULL,
                        'combinedBudget_RefID' => NULL
/*                        
                        'businessDocumentNumber' => 'Adv/QDC/2023/000098',
                        'businessDocumentType_RefID' => 77000000000057,
                        'combinedBudget_RefID' => 46000000000033
 */
                        ]                            
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }