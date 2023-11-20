<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Add API Category </h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
            <a href="<?php echo base_url();?>/Api/apiDashboard" class="btn btn-primary btn-sm">Add Api</a>
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Category </li>

            </ol>
               
          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    

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


    <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add New API Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->



              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/api/addapiCategory" enctype='multipart/form-data'>

<input type="hidden" name="id" id="sdg_id1" value="" >

                <div class="card-body">
                  
                  <div class="form-group">

                    <label for="API_category">API Category Name</label>

                    <input type="text" required="required" class="form-control" id="API_category" placeholder="EnterCategory Name" name="API_category" >

                  </div>
                

                </div>

                <!-- /.card-body -->



                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              </form>

            </div>

            <!-- /.card -->



          



           

          </div>



     <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">APIs Category List</h3>

              </div>

              

<div class="card-body">

    <?php 

   // print_r($Category);

    if(!empty($Category)){?>

    <table class="table table-bordered table-hover" id="datatables">

   <thead><tr><th>#</th><th>API Category  Name</th> <th>Action</th></tr></thead>

    <?php $s=1;

    foreach($Category as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['category_name'];?></td>

        

        <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editApiCategory(this);" data-name='<?php echo $d['category_name'];?>' data-number='<?php echo $d['id'];?>'><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/api/deleteApiCategory/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

        </td>

      </tr>

    <?php $s++; }?>

    </table>

  <?php } ?>

</div>



            </div>

          </div>

        </div>



      </div><!-- /.container-fluid -->

    </section>



  </div>

<?php include('include/footer.php');?>

      <div class="modal fade" id="modal-edit">

        <div class="modal-dialog">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/api/editApiCategory" enctype='multipart/form-data'>

<input type="hidden" name="id" id="category_id" value="" required="required">

            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update API Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">API Category Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter API Category Name" name="category_name" id="category_name_id">

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

   function editApiCategory(that) {

        var num = $(that).attr('data-number');

        // alert(num);

        var name = $(that).attr('data-name');

        $('#category_id').val(num);

        $('#category_name_id').val(name);

        $('#modal-edit').modal('show');

    }

</script>