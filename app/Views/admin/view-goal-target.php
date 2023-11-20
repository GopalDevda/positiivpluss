<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Target Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addSdgTarget()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Target</a> </li>

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

                <h3 class="card-title">Target List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Sdg</th><th>Target Name </th><th>Action</th></tr>

    </thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['sdg_name'];?></td>
        <td><?php echo $d['target_name'] ?></td>
           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editSdgTarget(this)" data-target_name='<?php echo $d['target_name'];?>' data-number='<?php echo $d['id'];?>' data-sdg_id='<?php echo $d['sdg_id']; ?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteSdgTarget/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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



              <form method="post" name="target-form" id="target-form" action="<?php echo base_url();?>/master/editSdgTarget">



              <input type="hidden" name="id" id="target_id" value="" required="required">



            <div class="modal-body">







            <div class="card card-primary">



              <div class="card-header">



                <h3 class="card-title">Update Target</h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



                <div class="card-body">
                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Sdg</label>

                    <select name="sdg_id" id="sdg_id" required="required" class="form-control">

                        <option value="">Select Sdg </option>

                        <?php 

                          if($sdg) {

                            foreach($sdg as $cat) {

                        ?>

                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['sdg_name'] ?></option>

                        <?php

                            }

                          }

                        ?>

                    </select>

                  </div>


                  <div class="form-group">



                    <label for="exampleInputEmail1">Target Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Target Name" name="target_name" id="target_name">



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
             <form method="post" name="target-form" id="target-form" action="<?php echo base_url();?>/master/addSdgTarget">

            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Target</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Sdg</label>
                    <select name="sdg_id" required="required" class="form-control">
                        <option value="">Select Sdg </option>
                        <?php 
                          if($sdg) {
                            foreach($sdg as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['sdg_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ghg_name">Target Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Target Name" name="target_name">
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

   function editSdgTarget(that) {
        var num = $(that).attr('data-number');
        var name = $(that).attr('data-target_name');
        var sdg_id = $(that).attr('data-sdg_id');
        $('#target_id').val(num);
        $('#sdg_id').val(sdg_id);
        $('#target_name').val(name);
        $('#modal-edit').modal('show');
    }

    function addSdgTarget() {
        $('#modal-add').modal('show');
    }

</script>

<?php include('include/footer.php');?>



