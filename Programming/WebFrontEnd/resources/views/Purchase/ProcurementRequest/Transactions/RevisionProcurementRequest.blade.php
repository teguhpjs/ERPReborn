@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduk')
@include('Purchase.ProcurementRequest.Functions.PopUp.popUpPrRevision')
@include('Purchase.ProcurementRequest.Functions.PopUp.SearchProcReq')
@include('getFunction.getProject')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Procurement Request Revision</label>
        </div>
      </div>
      @include('Purchase.ProcurementRequest.Functions.Menu.MenuPr')
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('ProcurementRequest.update', $var_recordID) }}" id="FormSubmitProcReqRevision">
          @csrf
          @method('PUT')
          <input id="var_recordID" style="border-radius:0;" name="var_recordID" value="{{ $var_recordID }}" class="form-control" type="hidden">
          <input id="siteCodePrRevAfter" style="border-radius:0;" name="siteCodePrRevAfter" class="form-control" type="hidden" value="{{$dataProcReqRevision['entities']['combinedBudgetSection_RefID']}}">
          
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Procurement Request
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Purchase.ProcurementRequest.Functions.Header.HeaderProcReqRevision')
                </div>
              </div>
            </div>
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        File Attachment
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card-body table-responsive p-0" style="width:100%;">
                            <table class="table table-head-fixed text-nowrap">
                              <div class="form-group input_fields_wrap">
                                <div class="input-group control-group" style="width:100%;">
                                  <!-- <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames"> -->
                                  <input id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                  <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" class="form-control filenames_1" value="" readonly="true">&nbsp;

                                  <div class="input-group-btn">
                                    <button style="background-color:#e9ecef;border:1px solid #ced4da;" class="btn btn-sm add_field_button" type="button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="15" alt=""> Add</button>
                                  </div>
                                </div>
                              </div>

                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <label class="card-title">
                          Budget Details
                        </label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                          </button>
                        </div>
                      </div>
                      @include('getFunction.BOQ3')
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Detail Transaction Request & Balance
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>


                    <div class="card-body table-responsive p-0" id="detailTransAvail">
                      <table class="table table-head-fixed text-nowrap" style="text-align: center;">
                        <thead>
                          <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Uom</th>
                            <th>Unit Price</th>
                            <th>Currency</th>
                            <th>Total</th>
                            <th>Remark</th>
                            <th>Balance</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td>
                            <div class="input-group">
                              &nbsp;<input id="putProductId" style="border-radius:0;width:100px;" class="form-control" readonly>
                              <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="#"><i id="product_id2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input id="qtyCek" style="border-radius:0;width:100px;" type="text" class="form-control ChangeQty quantity" autocomplete="off" value="0">
                            <span id="putQtybyId"></span>
                            <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td>
                            <input id="putUom" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input id="priceCek" style="border-radius:0;width:100px;" type="text" class="form-control ChangePrice" value="0" autocomplete="off">
                            <input id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td>
                            <input id="putCurrency" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input id="totalProcReqDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <textarea id="putRemark" rows="1" cols="30" class="form-control"></textarea>
                            <input id="putRemark2" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td>
                            <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <!-- Untuk Validari -->
                            <input id="statusEditProcReqRevision" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                            <input id="recordIDDetail" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                            <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                            <input id="ValidatePrice" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                          </td>
                        </tbody>
                      </table>
                      <div style="padding-right:10px;">
                        <a class="btn btn-default btn-sm float-right CancelDetailProcurementRequest" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Procurement Request List Cart"> Cancel
                        </a>
                        <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                          <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Procurement Request List"> Add
                        </a>
                      </div>
                      <br><br><br>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Procurement Request List (Cart)
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" id="detailProcurementRequestList">
                      <table class="table table-head-fixed text-nowrap TableProcurementRequest">
                        <thead>
                          <tr>
                            <th>&nbsp;Action</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Uom</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Currency</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a onclick="CancelProcurementRequest();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                  </a>
                  <button class="btn btn-default btn-sm float-right" type="submit" id="submitPR" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Procurement Request"> Submit
                  </button>

                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')

@include('Purchase.ProcurementRequest.Functions.Footer.FooterProcurementRequestRevision')
@endsection