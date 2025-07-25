<?php

namespace App\Services\Process\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class AdvanceRequestService
{
    public function getDetail($advanceRequestID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $advanceRequestID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ],
            false
        );
    }

    public function create(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $data           = $request->storeData;
        $detailItems    = json_decode($data['advanceRequestDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setAdvance',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ"                    => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"          => $fileID,
                    "requesterWorkerJobsPosition_RefID"     => (int) $data['requester_id'],
                    "beneficiaryWorkerJobsPosition_RefID"   => (int) $data['beneficiary_id'],
                    "beneficiaryBankAccount_RefID"          => (int) $data['bank_account_id'],
                    "internalNotes"                         => null,
                    "remarks"                               => $data['var_remark'],
                    "additionalData"                        => [
                        "itemList"                          => [
                            "items"                         => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['advanceRequestDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            $careerRefID,
            $sessionToken, 
            'transaction.update.finance.setAdvance', 
            'latest',
            [
            'recordID' => (int) $data['advanceRequestID'],
            'entities' => [
                'documentDateTimeTZ'                    => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'          => $fileID,
                'requesterWorkerJobsPosition_RefID'     => (int) $data['requester_id'],
                'beneficiaryWorkerJobsPosition_RefID'   => (int) $data['beneficiary_id'],
                'beneficiaryBankAccount_RefID'          => (int) $data['bank_account_id'],
                'internalNotes'                         => null, 
                'remarks'                               => $data['var_remark'],
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}
