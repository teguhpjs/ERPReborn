@extends('Partials.app')
@section('main')

<!-- Log Transaction css -->
<link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/log-transaction.min.css') }}">

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="text-center" style="width: 100%;">
                                    <h3 style="text-transform: uppercase; font-weight: bold;">
                                        Revision History for {{ $documentName }} : {{ $documentNumber }}
                                    </h3>
                                </div>
                                <div class="d-flex" style="flex-direction: column; justify-content: center;">
                                    <form id="showDocumentForm" method="POST" action="{{ route($urlPage) }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="businessDocumentType_Name" value="<?= $documentName; ?>" />
                                        <input type="hidden" name="businessDocument_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
                                        <input type="hidden" name="businessDocumentNumber" value="<?= $documentNumber; ?>" />
                                        <input type="hidden" name="businessDocumentTypeName" value="<?= $documentName; ?>" />
                                        <input type="hidden" name="formDocumentNumber_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
                                        <button type="submit" class="btn btn-default btn-sm" style="border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="container">
                                <div class="wrapper-budget card-body table-responsive p-0 table-height">
                                    <table class="table table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        @if ($i === 0)
                                                            <th colspan="5" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;" class="text-center">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th colspan="4" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataHeader))
                                                <tr>
                                                    <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">DO Number</th>
                                                    <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">Requester</th>
                                                    <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;">Delivery From</th>
                                                    <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;">Delivery To</th>
                                                    <th class="text-center" rowspan="2" style="vertical-align: middle;width: 250px; min-width: 250px; max-width: 250px; position: sticky; background-color: white; left: 500px; z-index: 10;">Remark</th>

                                                    @for($i = 1; $i < count($dataHeader); $i++)
                                                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Requester</th>
                                                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Delivery From</th>
                                                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Delivery To</th>
                                                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Remark</th>
                                                    @endfor
                                                </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 250px; min-width: 250px; max-width: 250px; position: sticky; background-color: white; left: 500px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['content']['remarks']; ?></td>

                                                @if(sizeof($dataHeader))
                                                    @foreach(array_slice($dataHeader, 0, count($dataHeader) - 1) as $dataHeaders)
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['requesterWorkerName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['beneficiaryWorkerName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['beneficiaryWorkerName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;width: 250px; min-width: 250px; max-width: 250px;">{{ $dataHeaders['content']['remarks'] ?? '-' }}</td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card">
                            <div id="container">
                                <div class="wrapper-budget card-body table-responsive p-0 table-height">
                                    <table class="table table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        @if ($i === 0)
                                                            <th class="text-center" colspan="5" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th class="text-center" colspan="2" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataDetail))
                                            <tr>
                                                <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 0px;z-index: 10;">Product Code</th>
                                                <th class="text-center" rowspan="2" style="vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 125px;z-index: 10;">Product Name</th>
                                                <th class="text-center" rowspan="2" style="vertical-align: middle;width: 40px;min-width: 40px;max-width: 40px;left: 250px;z-index: 10;">UOM</th>
                                                <th class="text-center" rowspan="2" style="vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;left: 290px;z-index: 10;">Qty</th>
                                                <th class="text-center" rowspan="2" style="vertical-align: middle;width: 250px;min-width: 250px;max-width: 250px;left: 370px;z-index: 10;">Note</th>

                                                @for($i = 1; $i < count($dataDetail[0]); $i++)
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Qty</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Note</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++) 
                                                    <tr>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 0px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 125px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 40px;min-width: 40px;max-width: 40px;position: sticky;background-color: white;left: 250px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 80px;min-width: 80px;max-width: 80px;position: sticky;background-color: white;left: 290px;z-index: 10;">{{ number_format($dataDetail[$i][count($dataDetail[$i]) - 1]['content']['quantity'], 2) }}</td>
                                                        <td style="padding: 8px;width: 250px;min-width: 250px;max-width: 250px;position: sticky;background-color: white;left: 370px;z-index: 10;">{{ $dataDetail[$i][count($dataDetail[$i]) - 1]['content']['remarks'] }}</td>

                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['quantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ $dataDetail[$i][$n]['content']['remarks'] }}</td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection