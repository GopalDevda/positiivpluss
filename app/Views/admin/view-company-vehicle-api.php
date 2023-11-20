<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Api Company Vehicle Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addCompanyVehicle()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Api Company Vehicle Detail</a> </li>

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

                <h3 class="card-title">Api Company Vehicle Details List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr>
      <th>#</th>
      <th>Vehicle </th>
      <th>Year</th>
      <th>Type</th>
      <th>Model</th>
      <th>Ghg Factor</th>
      <th>Efficiency</th>
<!--       <th>Derivative</th>
      <th>Efficiency</th>
      <th>Emission Factor</th> -->
      <th>Action</th>
    </tr>

    </thead>

    <tbody>

    <?php $s=1;
    
    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>
        <td><?php echo $d['vehicle_name'] ?></td>
        <td><?php echo $d['year'];?></td>
        <td><?php echo $d['type'];?></td>
        <td><?php echo $d['model'] ?></td>
        <td><?php echo $d['factor_name'] ?></td>
        <td><?php echo $d['efficiency'];?></td>
<!--         <td><?php echo $d['derivative'];?></td>
        <td><?php echo $d['efficiency'];?></td>
        <td><?php echo $d['emission_factor'];?></td> -->
        <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editCompanyVehicle(this)" data-vehicle='<?php echo $d['vehicle'];?>' data-number='<?php echo $d['id'];?>' data-year='<?php echo $d['year']; ?>' data-type='<?php echo $d['type']; ?>' data-model='<?php echo $d['model']; ?>' data-derivative='<?php echo $d['derivative']; ?>' data-efficiency='<?php echo $d['efficiency']; ?>' data-emission_factor='<?php echo $d['emission_factor']; ?>' data-factor='<?php echo $d['name']; ?>'data-ghg_factor='<?php echo $d['ghg_factor_id']; ?>' ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/apimaster/deleteApiCompanyVehicle/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
        </td>
      </tr>

    <?php $s++;}?>

</tbody>

    </table>

  <?php } ?>

            </div>

          </div>

        </div>



      </div><!-- /.container-fluid -->

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
              <form method="post" name="company-vehicle-form" id="company-vehicle-form" action="<?php echo base_url();?>/apimaster/editApiCompanyVehicle">
              <input type="hidden" name="id" id="company_vehicle_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Api Company Vehicle Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Vehicle</label>
                    <select name="vehicle" id="vehicle" required="required" class="form-control">
                        <option value="">Select Vehicle </option>
            <?php 
            
              if($vehicle) {
                foreach($vehicle as $v) {
            ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['vehicle_name']; ?></option>
            <?php
                }
              }
            ?>                                                                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Year" name="year" id="year">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Type" name="type" id="type">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Model</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Model" name="model" id="model">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Factor</label>
                    <select name="ghg_factor" id="ghg_factorr" required="required" class="form-control">
                        <option value="">Select Ghg Factor </option>
            <?php 
              if($ghg_factor) {
                foreach($ghg_factor as $v) {
            ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['factor_name']; ?></option>
            <?php
                }
              }
            ?>                                                                        
                    </select>
                  </div>
<!--                   <div class="form-group">
                    <label for="exampleInputEmail1">Derivative</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Derivative" name="derivative" id="derivative">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Efficiency</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Efficiency" name="efficiency" id="efficiency">
                  </div> 
<!--                   <div class="form-group">
                    <label for="exampleInputEmail1">Emission Factor</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Emission Factor" name="emission_factor" id="emission_factor">
                  </div> -->
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form method="post" name="company-vehicle-add-form" id="company-vehicle-add-form" action="<?php echo base_url();?>/apimaster/addApiCompanyVehicle">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Api Company Vehicle Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Vehicle</label>
                    <select name="vehicle" id="vehicle" required="required" class="form-control">
                        <option value="">Select Vehicle </option>                  
          <?php 
          
            if($vehicle) {
              foreach($vehicle as $v) {
          ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['vehicle_name']; ?></option>
          <?php
              }
            }
          ?>                                                                              
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Year" name="year" id="year">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Type" name="type" id="type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Model</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Model" name="model" id="model">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Factor</label>
                    <select name="ghg_factor" id="ghg_factor"required="required" class="form-control">
                        <option value="">Select Ghg Factor </option>                  
          <?php 
            if($ghg_factor) {
              foreach($ghg_factor as $v) {
          ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['factor_name']; ?></option>
          <?php
              }
            }
          ?>                                                                              
                    </select>
                  </div>
<!--                   <div class="form-group">
                    <label for="exampleInputEmail1">Derivative</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Derivative" name="derivative" id="derivative">
                  </div> -->
                   <div class="form-group">
                    <label for="exampleInputEmail1">Efficiency</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Efficiency" name="efficiency" id="efficiency">
                  </div> 
<!--                   <div class="form-group">
                    <label for="exampleInputEmail1">Emission Factor</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Emission Factor" name="emission_factor" id="emission_factor">
                  </div> -->
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

<script type="text/javascript">

   function editCompanyVehicle(that) {
        var num = $(that).attr('data-number');
        var vehicle = $(that).attr('data-vehicle');
        var year = $(that).attr('data-year');
        var type = $(that).attr('data-type');
        var model = $(that).attr('data-model');
        var ghg_factor = $(that).attr('data-ghg_factor');
        //  alert(ghg_factor);
        // var derivative = $(that).attr('data-derivative');
        var efficiency = $(that).attr('data-efficiency');
        // var emission_factor = $(that).attr('data-emission_factor');
        $('#company_vehicle_id').val(num);
        $('#vehicle').val(vehicle);
        $('#year').val(year);
        $('#type').val(type);
        $('#model').val(model);
        $('#ghg_factorr').val(ghg_factor);
        // $('#derivative').val(derivative);
        $('#efficiency').val(efficiency);
        // $('#emission_factor').val(emission_factor);
        $('#modal-edit').modal('show');
    }

    function addCompanyVehicle() {
        $('#modal-add').modal('show');
    }

</script>

<?php include('include/footer.php');?>



