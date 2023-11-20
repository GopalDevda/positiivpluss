<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Automotion List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
             
<li class="breadcrumb-item active px-2">
              <?php if($boundary_subBoundary['current_status'] == '3'){?>
<form  method="post" action="<?php echo base_url() ?>/Automotion/update_status" enctype="multipart/form-data">
   <input type="hidden" name="status_id" value="<?php echo $id; ?>"> 

 <button type="submit" class="btn btn-success">connect</button>  

</form>
<?php 
}?>
<?php if($boundary_subBoundary['current_status'] == '2'){?>

<!-- <form class="form" method="post" action="<?php echo base_url() ?>/Automotion/update_status" enctype="multipart/form-data"> -->
   <input type="hidden" name="statusid" value="<?php echo $id; ?>"> 

 <button class="btn btn-warning"  onclick="onn(<?php echo $id; ?>)">Awaited</button>  
<!-- </form> -->


<?php 
}?>
</li>
         <li class="breadcrumb-item active"><a href="#" onclick="data_view()" class='btn btn-primary'><i class="fa fa-solid fa-info"></i></a></li> 
              <li class="breadcrumb-item active"><a href="<?php echo base_url()?>/Automotion/electricity/<?php echo $electricity_id;?>"  class='btn btn-primary'>Back</a> </li>     

              <li class="breadcrumb-item active"><a href="#" onclick="addVehicle()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Automotion</a> </li>
              <li class="breadcrumb-item active"><a href="#" onclick="addVehic()" class='btn btn-primary'><i class="fa fa-plus"></i>Import</a> </li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          
          <section class="content">
            <div class="container-fluid">
              <?php
              if($session->get('success')){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $session->get('success');?>
              </div>
              <?php } ?>
              <?php
              if($session->get('error')){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $session->get('error');?>
              </div>
              <?php } ?>
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Automotion</h3>
                    </div>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Bill Name</th>
                          <th>Consumed Unit in KWH</th>
                          <th>Demand Load</th>
                          <th>Bill Date</th>
                          <th>Sanction Load</th>
                          <th>Power factor</th>
                          <th>Bill Pdf</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        foreach($data_fetch as $d){?>
                        <tr>
                          <td><?php echo $s; ?></td>
                          <td><?php echo $d['bill_no']; ?></td>
                          <td><?php echo $d['consume_unit']; ?></td>
                          <td><?php echo $d['demand_load']; ?></td>                          
                          <td><?php echo $d['bill_date']; ?></td>
                          <td><?php echo $d['senstion']; ?></td>
                          <td><?php echo $d['power_load']; ?></td>
                          <td><a href="javascript:void(0);" NAME="My Window Name" title="Bill" 
                onClick="window.open('<?php echo base_url('public/uploads/pdfElectricity/'.$d['pdf_file'])?>','Ratting','width=750,height=650,0,status=0,scrollbars=1');">pdf</a></td>

                          <td>.
                            <a class="btn btn-danger" href="<?php echo base_url()?>/Automotion/billdelete/<?php echo $d['id'];?>"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-primary" data-id="<?php echo $d['id']; ?>" onclick="bill_view(this)" ><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                        <?php $s++;}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" name="vehicle-form" id="vehicle-form" action="<?php echo base_url();?>/master/editVehicle">
                <input type="hidden" name="id" id="vehicle_id" value="" required="required">
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Update Vehicle</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Footprint</label>
                        <select class="form-control" id="footprint" name="footprint" required="required">
                          <option value="">Select Footprint</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vehicle Name</label>
                        <input type="text" required="required" class="form-control"  placeholder="Enter Vehicle Name" name="vehicle_name" id="vehicle_name">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1"> Select Industry </label>
                        <select name="industry_idd" id="industry_idd" required="required" class="form-control" onchange="getsubindustryDivAjax(this.value);">
                          <option value="">Select Industry   </option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1"> Select Sub industry </label>
                        <select name="sub_industry_name" id="subindustryy" required="required" class="form-control" >
                          <option value="">Select Sub industry </option>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" name="vehicle-add-form" id="vehicle-add-form" action="<?php echo base_url();?>/Automotion/insertAutomotion" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Automotion</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="card-body">
                      <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Frequency</label>
                            <!-- <input type="date" required="required" class="form-control"  placeholder="Enter Period date" name="period_date" id="period_date"> -->
                            <select class="form-control" name="frequency" id="frequency_id">
                              <option value="">Select from list</option>
                              <option value="1">Monthly</option>
                              <option value="2">Bimonthly</option>
                              <option value="3">Quarterly</option>
                              <option value="6">Half yearly</option>
                              <option value="12">Yearly</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Period</label><br>
                           <!--  <input type="date" required="required" class="form-control"  placeholder="Enter Period date" name="to_date" id="period_date"> -->
                           <select class="select2 form-control" id="testbox_monthyly" name="monthly_name[]" multiple onchange="Monthly(value)">
                              <option>Select from list</option>
                              <!-- <option value="0">Monthly</option> -->
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Financial year</label><br>
                           <select class="form-control" id="year" name="year" >
                              <option>Select Year</option>
                              <option value="2010-2011">2010-2011</option>
                              <option value="2011-2012">2011-2012</option>
                              <option value="2012-2013">2012-2013</option>
                              <option value="2013-2014">2013-2014</option>
                              <option value="2014-2015">2014-2015</option>
                              <option value="2015-2016">2015-2016</option>
                              <option value="2016-2017">2016-2017</option>
                              <option value="2017-2018">2017-2018</option>
                              <option value="2018-2019">2018-2019</option>
                              <option value="2019-2020">2019-2020</option>
                              <option value="2020-2021">2020-2021</option>
                              <option value="2021-2022">2021-2022</option>
                              <option value="2022-2023">2022-2023</option>
                              <option value="2023-2024">2023-2024</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="exampleInputEmail1">Bill Generation Date</label>
                          <input type="date" required="required" class="form-control"  placeholder="Enter Bill Generation Date" name="bill_date" id="period_date">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Amount(IN currency)</label>
                        <input type="text" required="required" class="form-control"  placeholder="Enter Amount" name="amount" id="amount">
                      </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">  Sanction Load </label>
                        <input type="text" required="required" class="form-control"  placeholder="Enter Sanction Load" name="senstion" id="period_date">
                      </div>
                        </div>
                       <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleInputEmail1"> Consumed Unit in KWH  </label>
                        <input type="text" required="required" class="form-control"  placeholder="Enter Consumed Unit in KWH" name="consume_unit" id="period_date">
                      </div>
                        </div>
                       
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Demand Load </label>
                        <input type="text"  class="form-control"  placeholder="Enter Demand Load" name="demand_load" id="period_date">
                      </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Power factor </label>
                        <input type="text"  class="form-control"  placeholder="Enter Power factor " name="power_load" id="period_date">
                      </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Upload PDF</label>
                        <input type="file"  class="form-control"  placeholder="Enter Amount" name="pdfFile" id="amount" accept="application/pdf" />
                        
                      </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-data_view">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
               <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Boundary</th>
                          <th>Sub-Boundary</th>
                          <?php if(!($boundary_subBoundary['sub_site'] == 0)){?>
                          <th>Sub-Site</th>
                        <?php
                      }?>
                          <th>Type</th>
                          <th>Provider(EB)</th>
                          <th>Holder name</th>
                          <th><?php if($boundary_subBoundary['kn_no']){
                             echo 'KN No.';

                             } if($boundary_subBoundary['consumer_no']){
                             echo 'Consumer No.';

                             } if($boundary_subBoundary['account_no']){
                             echo 'Account No';

                             } if($boundary_subBoundary['mobile_no']){
                             echo 'Mobile No';

                             } if($boundary_subBoundary['service_no']){
                             echo 'Service No';

                             } if($boundary_subBoundary['ca_no']){
                             echo 'CA No';
                             } 
                             ?></th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Concent Form</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td>1</td>
                          <td>
                           <?php foreach($boundary_item as $bb){ ?>
                            <?php if($bb['id'] == $boundary_subBoundary['boundary_id']){
                            echo $bb['item_name'];
                            }?>
                            <?php
                          }?>

                           </td>
                          <td>
                           <?php foreach($sub_boundary_item as $bb){ ?>
                            <?php if($bb['id'] == $boundary_subBoundary['subboundary_id']){
                            echo $bb['cp_name'];
                            }?>
                            <?php
                          }?>
                           </td>
                         <?php if(!($boundary_subBoundary['sub_site'] == 0)){?> 
                           <td>
                           <?php foreach($sub_site as $bb){ ?>
                            <?php if($bb['id'] == $boundary_subBoundary['sub_site']){
                            echo $bb['sub_site_name'];
                            }?>
                            <?php
                          }?>
                           </td>
                           <?php
                      }?>

                           <td>
                          <?php echo  $boundary_subBoundary['board_type']; ?>
                           </td>

                           <td>
                           <?php foreach($electricity_board as $bb){ ?>
                            <?php if($bb['id'] == $boundary_subBoundary['provider_type']){
                            echo $bb['name_discom'];
                            }?>
                            <?php
                          }?>
                           </td>
                           <td>
                          <?php echo $boundary_subBoundary['conHolderName'];?>
                           </td> 
                           <td>
                            <?php if($boundary_subBoundary['kn_no']){
                             echo $boundary_subBoundary['kn_no'];

                             } if($boundary_subBoundary['consumer_no']){
                             echo $boundary_subBoundary['consumer_no'];

                             } if($boundary_subBoundary['account_no']){
                             echo $boundary_subBoundary['account_no'];

                             } if($boundary_subBoundary['mobile_no']){
                             echo $boundary_subBoundary['mobile_no'];

                             } if($boundary_subBoundary['service_no']){
                             echo $boundary_subBoundary['service_no'];

                             } if($boundary_subBoundary['ca_no']){
                             echo $boundary_subBoundary['ca_no'];
                             } 
                             ?>
                          
                           </td> 
                           <td>
                          <?php echo $boundary_subBoundary['username'];?>
                           </td> 
                           <td>
                          <?php echo $boundary_subBoundary['password'];?>
                           </td> 
                           <td><a href="javascript:void(0);" NAME="My Window Name" title="Consern Form" 
                onClick="window.open('<?php echo base_url()?>/public/consent_form/<?php echo $boundary_subBoundary['consent_form_file']; ?>','Ratting','width=750,height=650,0,status=0,scrollbars=1');">Show</a>
               
                         
                           </td>

                          </tr>

                      </tbody>
                    </table>


            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-a">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?php echo base_url('Automotion/importCsvToDb');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idee" value="<?php echo $id; ?>">
                <div class="form-group mb-3">
                  <div class="mb-3">
                    <input type="file" name="file" class="form-control" id="file">
                  </div>
                </div>
                <div class="d-grid">
                  <input type="submit" name="submit" value="Upload" class="btn btn-dark" />
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Change Status</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Automotion/update_status" enctype="multipart/form-data">
       <input type="hidden" name="statusid" id="statuschanfge"> 
               <div class="row">
                <!--   <input type="hidden" id="del_electricity_id" name="electricity_id" /> -->
                     <p>Are you sure you want to change status  ?</p>
               </div>
               
         
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
         </div>
         </form>
        </div>
      </div>
   </div>
</div>
        <div class="modal fade" id="modal-bill_view">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="billDataView"></div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>

        <script type="text/javascript">
        function editVehicle(that) {
        var num = $(that).attr('data-number');
        var vehicle = $(that).attr('data-vehicle_name');
        var foot_id = $(that).attr('data-foot_id');
        var industry_ids = $(that).attr('data-industry_id');
        var subindustry = $(that).attr('data-subindustry');
        
        $('#vehicle_id').val(num);
        $('#vehicle_name').val(vehicle);
        $("#footprint").val(foot_id);
        $("#industry_idd").val(industry_ids);
        $("#subindustryy").val(subindustry);
        $('#modal-edit').modal('show');
        }
        function addVehicle() {
        $('#modal-add').modal('show');
        }
        function addVehic() {
        $('#modal-a').modal('show');
        }
        function data_view() {
        $('#modal-data_view').modal('show');
        }
        
        </script>
        <script type="text/javascript">

function Monthly(value)
      {        

        var i = $("#testbox_monthyly").val();     
        var att = i.length;
        var limit = $('#frequency_id').val();
        if (att > limit) $('.select2-selection__choice__remove:last').click();
      
      }
        </script>
        <script type="text/javascript">

function bill_view(that)
      {        

        var id = $(that).attr('data-id');
         $.ajax({
        url : "<?php echo base_url()?>/Automotion/bill_data_view/"+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
        $('#modal-bill_view').modal('show');

        $('#billDataView').html(data);
        },
        });

      
      }
        </script>

        <script type="text/javascript">

        $(document).ready(function() {

        $('#frequency_id').change(function(event){

        // $('#testbox option').removeAttr("selected");
        // $('#testbox').prop('selected', false);
         // $('#testbox option:selected').prop('unselected',true);
         // $('#testbox option:selected').removeClass('selected');
          $('#testbox option').prop('selected', false);
          




        });
    });
    </script>

       <script type="text/javascript">
   

    $(document).ready(function() {

      var last_valid_selection = null;

      $('#testbox').change(function(event) {
       // alert($(this).val());
var frequency =  $('#frequency_id').val();

if(frequency == 1){
  
   

  if ($(this).val().length >= 1) {
          $('#testbox option').prop('selected', false);

          // alert('You can only choose 5!');
          $(this).val(last_valid_selection);
        } else 
        {
          last_valid_selection = $(this).val();
        }
 }

 if(frequency == 2){

   if ($(this).val().length > 2) {
          // alert('You can only choose 5!');
          $(this).val(last_valid_selection);
        } else {
          last_valid_selection = $(this).val();
        }
 }

 if(frequency == 3){
  if ($(this).val().length > 5) {
          // alert('You can only choose 5!');
          $(this).val(last_valid_selection);
        } else {
          last_valid_selection = $(this).val();
        }
 }

 if(frequency == 4){
  if ($(this).val().length > 12) {
          // alert('You can only choose 5!');
          $(this).val(last_valid_selection);
        } else {
          last_valid_selection = $(this).val();
        }
 }
       
      });
    });
    </script>

<script type="text/javascript">
  function onn(that) {

        $('#docDeletePopup').modal('show');
        $('#statuschanfge').val(that);

    }
</script>

        <script type="text/javascript">
        function getsubindustryDivAjax(id=1){
        $.ajax({
        url : "<?php echo base_url()?>/assessment/getsubindustryByindustry/"+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
        $('#subindustryDiv').html(data);
        },
        });
        }
        </script>
        <?php include('include/footer.php');?>