<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Hotel Stay Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addHotelStay()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Hotel Stay Detail</a> </li>

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

                <h3 class="card-title">Hotel Stay Details List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr>
      <th>#</th>
      <th>Country</th>
      <th>No of person</th>
      <th>No of night</th>
      <th>Emission</th>
      <th>Action</th>
    </tr>

    </thead>

    <tbody>

    <?php $s=1;
    foreach($list as $d){
    ?>

      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['name']; ?></td>
        <td><?php echo $d['no_of_person'] ?></td>
        <td><?php echo $d['no_of_night'];?></td>
        <td><?php echo $d['emission'];?></td>
        <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editHotelStay(this)" data-country='<?php echo $d['country_id'];?>' data-number='<?php echo $d['id'];?>' data-no_of_person='<?php echo $d['no_of_person']; ?>' data-no_of_night='<?php echo $d['no_of_night']; ?>' data-emission='<?php echo $d['emission']; ?>'><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteHotelStay/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
              <form method="post" name="company-vehicle-form" id="hotel-stay-form" action="<?php echo base_url();?>/master/editHotelStay">
              <input type="hidden" name="id" id="hotel_stay_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Hotel Stay Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="country">Select Country</label>
                    <select id="country" name="country" required="required" class="form-control">
                      <option value="">Select Country</option>
<?php 
  if($countries) {
    foreach($countries as $country) {
?>
      <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
<?php      
    }
  }
?>                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No of person</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter no of person" name="no_of_person" id="no_of_person" value="1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No of night</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter no of night" name="no_of_night" id="no_of_night">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emission</label>
                    <input type="text" class="form-control"  placeholder="Enter Emission" name="emission" id="emission">
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
              <form method="post" name="company-vehicle-add-form" id="hotel-stay-add-form" action="<?php echo base_url();?>/master/addHotelStay">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Hotel Stay Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Country</label>
                    <select class="form-control" required="required" name="country_id" id="country_id">
                      <option value="">Select Country</option>
<?php 
  if($countries) {
    foreach($countries as $country) {
?>
      <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
<?php      
    }
  }
?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No of person</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter no of person" name="no_of_person" value="1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No of night</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter no of night" name="no_of_night" value="1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emission</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Emission" name="emission">
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

   function editHotelStay(that) {
        var num = $(that).attr('data-number');
        var country = $(that).attr('data-country');
        var no_of_person = $(that).attr('data-no_of_person');
        var no_of_night = $(that).attr('data-no_of_night');
        var emission = $(that).attr('data-emission');
        $('#hotel_stay_id').val(num);
        $('#country').val(country);
        $('#no_of_person').val(no_of_person);
        $('#no_of_night').val(no_of_night);
        $('#emission').val(emission);
        $('#modal-edit').modal('show');
    }

    function addHotelStay() {
        $('#modal-add').modal('show');
    }

</script>

<?php include('include/footer.php');?>

<script>
  $(document).ready(function(){   
    // Initialize select2
    // $("#country_id").select2();
  });  
</script>


