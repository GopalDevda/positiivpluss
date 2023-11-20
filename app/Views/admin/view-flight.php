<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Flight Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#" onclick="addFlight()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Flight Detail</a> </li>
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

                <h3 class="card-title">Flight Details List</h3>

              </div>
    <?php 

    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Flight Class </th><th>From Distance</th><th>To Distance</th><th>Ghg FActor</th><th>Action</th></tr>

    </thead>

    <tbody>

    <?php $s=1;

    foreach($list as $d){?>

      <tr>
        <td><?php echo $s;?></td>

        <td><?php echo $d['flight_class'] ?></td>

        <td><?php echo $d['from_distance'];?></td>

        <td><?php echo $d['to_distance'];?></td>

        <td><?php echo $d['factor_name'];?></td>

        <!-- <td><?php //echo $d['emission_factor'];?></td> -->

        <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editFlight(this)" data-flight_class='<?php echo $d['flight_class'];?>' data-number='<?php echo $d['id'];?>' data-from_distance='<?php echo $d['from_distance']; ?>' data-to_distance='<?php echo $d['to_distance']; ?>' data-ghg_factor_id='<?php echo $d['ghg_factor_id']; ?>'><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteFlight/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

              <form method="post" name="flight-form" id="flight-form" action="<?php echo base_url();?>/master/editFlight">

              <input type="hidden" name="id" id="flight_id" value="" required="required">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Flight Details</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Flight Class</label>

                    <select name="flight_class" id="flight_class" required="required" class="form-control">

                        <option value="">Select Flight class </option>

                        <option value="economy">Economy class </option>
                        
                        <option value="business">Business class </option>
                        
                        <option value="average">Average class </option>
                        
                        <!-- <option value="first">First class </option> 

                        <option value="economy">Average (unknown class) </option> -->                                                                          

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">From Distance</label>

                    <input type="number" required="required" class="form-control"  placeholder="Enter From Distance" name="from_distance" id="from_distance">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">To Distance</label>

                    <input type="number" required="required" class="form-control"  placeholder="Enter To Distance" name="to_distance" id="to_distance">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Ghg Factor</label>

                    <select name="ghg_factor_id" id="ghg_factor_id" required="required" class="form-control">

                        <option value="">--Select Ghg Factor--</option>

                        <?php 
                          if($factor_list){
                            foreach($factor_list as $fl){
                              echo "<option value=".$fl['ghg_factor_id'].">".$fl['factor_name']."</option>";
                            }
                          }
                        ?>                                                                          

                    </select>

                  </div>

                 <!--  <div class="form-group">

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

              <form method="post" name="flight-add-form" id="flight-add-form" action="<?php echo base_url();?>/master/addFlight">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Flight Details</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Flight Class</label>

                    <select name="flight_class" id="flight_class" required="required" class="form-control">

                        <option value="">Select Flight class </option>

                        <option value="economy">Economy class </option>

                        <!--<option value="premium">Premium class </option>-->

                        <!--<option value="business">Business class </option>-->
                        
                        <option value="business">Business class </option>
                        
                        <option value="average">Average class </option>

                       <!--  <option value="first">First class </option> 

                        <option value="economy">Average (unknown class) </option> -->                                                                          

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">From Distance</label>

                    <input type="number" required="required" class="form-control"  placeholder="Enter From Distance" name="from_distance" id="from_distance">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">To Distance</label>

                    <input type="number" required="required" class="form-control"  placeholder="Enter To Distance" name="to_distance" id="to_distance">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Ghg Factor</label>

                    <select name="ghg_factor_id" id="ghg_factor_id" required="required" class="form-control">

                        <option value="">--Select Ghg Factor--</option>

                        <?php 
                          if($factor_list){
                            foreach($factor_list as $fl){
                              echo "<option value=".$fl['ghg_factor_id'].">".$fl['factor_name']."</option>";
                            }
                          }
                        ?>                                                                          

                    </select>

                  </div>

                  <!-- <div class="form-group">

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



   function editFlight(that) {

        var num = $(that).attr('data-number');

        var flight_class = $(that).attr('data-flight_class');

        var from_distance = $(that).attr('data-from_distance');

        var to_distance = $(that).attr('data-to_distance');

        // var emission_factor = $(that).attr('data-emission_factor');

        var ghg_factor_id = $(that).attr('data-ghg_factor_id');

        $('#flight_id').val(num);

        $('#flight_class').val(flight_class);

        $('#from_distance').val(from_distance);

        $('#to_distance').val(to_distance);

        // $('#emission_factor').val(emission_factor);

        $('#ghg_factor_id').val(ghg_factor_id);

        $('#modal-edit').modal('show');

    }



    function addFlight() {

        $('#modal-add').modal('show');

    }



</script>



<?php include('include/footer.php');?>







