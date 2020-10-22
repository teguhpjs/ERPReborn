<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSRequest extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }


        public function APIAuthentication_SetLogin()
            {
            //---Core---
            $varJSONData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                'teguh.pratama', 
                'teguhpratama789'
                );
            var_dump($varJSONData);
            }


        public function APIGateway_GetSessionData()
            {
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzI0NjMzNH0.BN3z4YZ9X34VKFtsmOC1Mz2oyE6yGsgg1ZH5bCz5ge4';
            //---Core---
            $varJSONData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'environment.general.session.getData', 
                'latest', 
                [
                ]
                );
            var_dump($varJSONData);
            }


        public function APIGateway_SetLoginBranchAndUserRole()
            {
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzI0NjMzNH0.BN3z4YZ9X34VKFtsmOC1Mz2oyE6yGsgg1ZH5bCz5ge4';
            $varBranchID = 11000000000004;
            $varUserRoleID = 95000000000007;
            //---Core---
            $varJSONData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLoginBranchAndUserRole', 
                'latest', 
                [
                    'branchID' => $varBranchID,
                    'userRoleID' => $varUserRoleID
                ]
                );
            var_dump($varJSONData);            
            }


        public function APIGateway_SetLogout()
            {
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzM2MzAzOX0.Qph3uHblVfbprJwNwJwDm4TVI2LRP8y192NY8l73Hvg';
            //---Core---
            $varJSONData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLogout', 
                'latest'
                );
            var_dump($varJSONData);            
            }


        public function APIGateway_getDataListCountry()
            {
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzI0NjMzNH0.BN3z4YZ9X34VKFtsmOC1Mz2oyE6yGsgg1ZH5bCz5ge4';
            //---Core---
            $varJSONData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountry', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => '*',
                    'sort' => null,
                    'filter' => '"InternationalName" ILIKE \'%nesia%\'',
                    'paging' => null
                    ]
                ]
                );
            var_dump($varJSONData);            
            
            }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

        public function SendRequest()
            {
            $varUserSession=000000;
            $varDataArray = [
                'System' => [],
                'Data' => []
                ];

            $x = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                $varUserSession, 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'),                  
                $varDataArray
                );
            echo "<br>Tunggu data masuk<br>";
            var_dump($x);
            echo "<br>Finish";
            }
        }
    }