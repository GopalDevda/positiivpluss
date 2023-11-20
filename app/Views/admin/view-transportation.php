<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Transportation Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addCompanyVehicle()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Transportation Detail</a> </li>

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

                <h3 class="card-title">Transportation Details List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr>
      <th>#</th>
      <th>Footprint</th>
      <th>Vehicle </th>
      <th>Year</th>
      <th>Type</th>
      <th>Model</th>
      <th>From Distance</th>
      <th>To Distance</th>
      <th>Ghg Factor</th>
      <th>Action</th>
    </tr>

    </thead>

    <tbody>

    <?php $s=1;
    foreach($list as $d){
    ?>

      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['footprint_name']; ?></td>
        <td><?php echo $d['vehicle_name'] ?></td>
        <td><?php echo $d['year'];?></td>
        <td><?php echo $d['type'];?></td>
        <td><?php echo $d['model'] ?></td>
        <td><?php echo $d['from_distance']; ?></td>
        <td><?php echo $d['to_distance']; ?></td>
        <td><?php echo $d['factor_name'] ?></td>
        <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editCompanyVehicle(this)" data-vehicle='<?php echo $d['vehicle_id'];?>' data-number='<?php echo $d['id'];?>' data-year='<?php echo $d['year']; ?>' data-type='<?php echo $d['type']; ?>' data-model='<?php echo $d['model']; ?>' data-ghg_factor='<?php echo $d['ghg_factor_id']; ?>' data-from_distance='<?php echo $d['from_distance']; ?>' data-to_distance='<?php echo $d['to_distance']; ?>' data-footprint_id="<?php echo $d['footprint_id'] ?>" ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteTransportation/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
              <form method="post" name="company-vehicle-form" id="company-vehicle-form" action="<?php echo base_url();?>/master/editTransportation">
              <input type="hidden" name="id" id="company_vehicle_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Transportation Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="footprint_id">Select Footprint</label>
                    <select id="footprint_id" name="footprint" required="required" class="form-control" onchange="getVehicleByFootprintForEdit(this)">
                      <option value="">Select Footprint</option>
<?php 
  if($footprint) {
    foreach($footprint as $foot) {
?>
      <option value="<?php echo $foot['id']; ?>"><?php echo $foot['footprint_name']; ?></option>
<?php      
    }
  }
?>                      
                    </select>
                  </div>
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
                    <label for="exampleInputEmail1">From Distance</label>
                    <input type="number" class="form-control"  placeholder="Enter From Distance" name="from_distance" id="from_distance">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">To Distance</label>
                    <input type="number" class="form-control"  placeholder="Enter To Distance" name="to_distance" id="to_distance">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Factor</label>
                    <select name="ghg_factor" id="ghg_factor" required="required" class="form-control">
                        <option value="">Select Ghg Factor </option>         
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form method="post" name="company-vehicle-add-form" id="company-vehicle-add-form" action="<?php echo base_url();?>/master/addTransportation">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Transportation Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Footprint</label>
                    <select class="form-control" required="required" onchange="getVehicleByFootprint(this)" name="footprint_id">
                      <option value="">Select Fooprint</option>
<?php 
  if($footprint) {
    foreach($footprint as $foot) {
?>
      <option value="<?php echo $foot['id']; ?>"><?php echo $foot['footprint_name']; ?></option>
<?php      
    }
  }
?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Vehicle</label>
                    <select name="vehicle" id="vehicle_id" required="required" class="form-control">
                        <option value="">Select Vehicle </option>   
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
                    <label for="exampleInputEmail1">From Distance</label>
                    <input type="number" class="form-control"  placeholder="Enter From Distance" name="from_distance">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">To Distance</label>
                    <input type="number" class="form-control"  placeholder="Enter To Distance" name="to_distance">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Factor</label>
                    <select name="ghg_factor" required="required" class="form-control" id="ghg_factor_id">
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
        var from_distance = $(that).attr("data-from_distance");
        var to_distance = $(that).attr("data-to_distance");
        var footprint_id = $(that).attr("data-footprint_id");
        // var derivative = $(that).attr('data-derivative');
        // var efficiency = $(that).attr('data-efficiency');
        // var emission_factor = $(that).attr('data-emission_factor');
        $('#company_vehicle_id').val(num);
        $('#vehicle').val(vehicle);
        $('#year').val(year);
        $('#type').val(type);
        $('#model').val(model);
        $("#from_distance").val(from_distance);
        $("#to_distance").val(to_distance);
        // $('#ghg_factor').val(ghg_factor);
        $("#footprint_id").val(footprint_id);
        $.ajax({
              url : "<?php echo base_url()?>/master/getVehicleByFootprint",
              type: "POST",
              data: {footprint_id:footprint_id},
              success: function(data){
                rs = JSON.parse(data);
                $("#vehicle").html(rs.vehicle_data);
                $("#ghg_factor").html(rs.ghg_factor_data);
                $("#vehicle").val(vehicle);
                $("#ghg_factor").val(ghg_factor);
              },
              error: function(xhr, status, error){
                $("#vehicle").html('<option value="">Select Vehicle</option>');
                $("#ghg_factor").html('<option value="">Select Ghg Factor</option>');
              }
          });
        // $('#derivative').val(derivative);
        // $('#efficiency').val(efficiency);
        // $('#emission_factor').val(emission_factor);
        $('#modal-edit').modal('show');
    }

    function addCompanyVehicle() {
        $('#modal-add').modal('show');
    }

    function getVehicleByFootprint(that) {
      footprint_id = $(that).val();
      $.ajax({
            url : "<?php echo base_url()?>/master/getVehicleByFootprint",
            type: "POST",
            data: {footprint_id:footprint_id},
            success: function(data){
              rs = JSON.parse(data);
              $("#vehicle_id").html(rs.vehicle_data);
              $("#ghg_factor_id").html(rs.ghg_factor_data);
            },
            error: function(xhr, status, error){
              $("#vehicle_id").html('<option value="">Select Vehicle</option>');
            }
        });
    }

    function getVehicleByFootprintForEdit(that) {
      footprint_id = $(that).val();
      $.ajax({
            url : "<?php echo base_url()?>/master/getVehicleByFootprint",
            type: "POST",
            data: {footprint_id:footprint_id},
            success: function(data){
              rs = JSON.parse(data);
              $("#vehicle").html(rs.vehicle_data);
              $("#ghg_factor").html(rs.ghg_factor_data);
            },
            error: function(xhr, status, error){
              $("#vehicle_id").html('<option value="">Select Vehicle</option>');
            }
        });
    }

</script>

<?php include('include/footer.php');?>



