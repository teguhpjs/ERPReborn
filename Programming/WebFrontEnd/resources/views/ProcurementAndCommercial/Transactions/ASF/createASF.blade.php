@extends('Partials.app')
  @section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('ProcurementAndCommercial.Transactions.ASF.managerName')
    @include('ProcurementAndCommercial.Transactions.ASF.currency')
    @include('ProcurementAndCommercial.Transactions.ASF.finance')
    @include('ProcurementAndCommercial.Transactions.ASF.searchArf')

    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Create Advance Request</a>                
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
            <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
            <form method="post" action="" enctype="multipart/form-data">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <label class="card-title">
                          File Attachment & Create New ASF
                        </label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">                                               
                            <div class="input-group control-group increment" >
                              <input required="" type="file" name="filename[]" class="form-control">
                              <div class="input-group-btn"> 
                                <button class="btn btn-outline-primary btn-sm fileInputMultiAsf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                              </div>
                            </div>
                            <div class="clone hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input required="" type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-outline-secondary btn-sm remove-attachment" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>
                          </div>   
                        </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Requester</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Manager Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="managerAsfUid" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text">
                                      <a href="#"><i data-toggle="modal" data-target="#myManagerAsf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="managerAsfName" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Currency</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyAsfCode" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text">
                                      <a href="#"><i data-toggle="modal" data-target="#myCurrencyAsf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>PIC Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Finance Receiving Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="financeAsfUid" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text">
                                      <a href="#"><i data-toggle="modal" data-target="#myFinanceAsf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="financeAsfName" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Remark</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                  </div>
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <button type="reset" class="btn btn-outline-danger btn-sm float-right">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      Reset
                    </button>
                    <a class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#searchArf">
                      <i class="fas fa-gift" style="color:grey;" aria-hidden="true">Search ARF</i>
                      
                    </a>
                      </div>
                      </div>
                      </div>

                    </div>                                        
                  </div>
                </div>
              </div>
            </form>
              <!--|-------------------------------------------------------------------------|
                  |                            End Advance Request                          |
                  |-------------------------------------------------------------------------|
                  |-------------------------------------------------------------------------|
                  |                        Edit Create & ARF Chart                          |
                  |-------------------------------------------------------------------------|-->
              
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <label class="card-title">
                          ARF Detail
                        </label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>

                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                            <th>No</th>
                          <th>Action</th>                          
                          <th>No Trans</th>
                          <th>Work Id</th>
                          <th>Work Name</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>Unit</th>
                          <th>Unit Price</th>
                          <th>QTY</th>
                          <th>Total Price</th>
                          <th>Description</th>
                          <th>Available</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td>1</td>
                          <td>
                            <a class="btn btn-outline-secondary btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>1</td>
                          <td>
                            <a class="btn btn-outline-secondary btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>

                          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <label class="card-title">
                          Detail ASF & Balance
                        </label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">                      
                          <div class="col-md-6">
                            <div class="form-group">
                              <table>
                                <tr>
                                  <td><label>ARF Number</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>                              
                                </tr>
                                <tr>
                                  <td><label>ARF Date</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>                              
                                </tr>
                                <tr>
                                  <td><label>Project Code</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Site Code</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>CFS Code</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>                                                            
                                </tr>                            
                              </table>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <table>
                              <tr>
                                  <td><label>Total ARF</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Total ASF</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Balance</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                              </table>                                                                                             
                            </div>                    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <label class="card-title">
                          Detail ASF & Balance
                        </label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>

                      <div class="card-body">
                        <div class="row">                      
                          <div class="col-md-6">
                            <div class="form-group">
                              <table>
                                <tr>
                                  <td><label>QTY</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Price</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Total</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                      
                          <div class="col-md-6">
                            <div class="form-group">
                              <table>
                                <tr>
                                  <td><label>QTY</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Price</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Total</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                    </div>
                                  </td>
                                  <td>
                                  <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <button type="reset" class="btn btn-outline-danger btn-sm float-right">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        Cancel Add
                      </button>
                      <button type="submit" class="btn btn-outline-success btn-sm float-right">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        Add to List(Cart)
                      </button>
                  </div>
                </form>
                <br><br><br>
              
              <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->


                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                    <label class="card-title">Amount Due to Company Cart</label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>

                  <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                        <th>No</th>
                          <th>Action</th>                          
                          <th>No Trans</th>
                          <th>Work Id</th>
                          <th>Work Name</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>Unit</th>
                          <th>Unit Price</th>
                          <th>QTY</th>
                          <th>Total Price</th>
                          <th>Description</th>
                          <th>Available</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td>1</td>
                          <td>
                            
                            <a class="btn btn-outline-secondary btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>1</td>
                          <td>
                            
                            <a class="btn btn-outline-secondary btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>

              <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                    <label class="card-title">Expense Claim Cart</label>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus btn-sm"></i>
                          </button>
                        </div>
                      </div>

                  <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table id="editableAsf" class="table table-head-fixed text-nowrap table-striped">
                    <thead>
                        <tr>
                        <th>No</th>
                          <th>No Trans</th>
                          <th>Work ID</th>
                          <th>Work Name</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>Unit</th>
                          <th>Unit Price</th>
                          <th>QTY</th>
                          <th>Total Price</th>
                          <th>Description</th>
                          <th>CSF Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td>1</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>2</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>3</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>4</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>5</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td>6</td>                          
                          
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>11</td>
                          <td>11</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>
              <button type="reset" class="btn btn-outline-danger btn-sm float-right">
                <i class="fa fa-times" aria-hidden="true"></i>
                Cancel ASF List (Cart)
              </button>
              <button type="submit" class="btn btn-outline-primary btn-sm float-right">
                <i class="fa fa-save" aria-hidden="true"></i>
                Add ASF List(Cart)
              </button>
            </div>
          </div>  
        </div>  
      </section>
    </div>
    @include('Partials.footer')
    <script type="text/javascript">
      $(document).ready(function() {
        $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
        });
        $("body").on("click",".btn-secondary",function(){ 
          $(this).parents(".control-group").remove();
        });
      });
    </script>    

    <!-- EDITABLE -->
    
    <script type="text/javascript">
        $(document).ready(function(){
        
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('#editableAsf').Tabledit({
            url:'{{ route("ASF.editableAsf") }}',
            editButton: true,
            deleteButton: true,
            buttons: {
              edit: {
                class: 'btn btn-outline-secondary',
                html: '<i class="fa fa-pen"></i>&nbsp;',
                action: 'edit'
              },
              delete: {
                class: 'btn btn-outline-secondary',
                html: '<i class="fa fa-trash"></i>&nbsp;',
                action: 'delete'
              },
              save: {
                class: 'btn btn-sm btn-success',
                html: 'Save'
              },
              restore: {
                class: 'btn btn-sm btn-warning',
                html: 'Restore',
                action: 'restore'
              },
              confirm: {
                class: 'btn btn-sm btn-secondary',
                html: 'Confirm'
              }
            },
            columns: {
              identifier: [0, 'id'],
              editable: [[1, 'nickname'], [2, 'firstname'], [3, 'lastname']]
            },
            restoreButton:false,
              onSuccess:function(data, textStatus, jqXHR)
              {
                if(data.action == 'delete')
                {
                  $('#'+data.id).remove();
                }
              }
          });
        });  
    </script>
  @endsection