<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Indicator Category Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Indicator Category </li>

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

          <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add New Indicator Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="from" id="form" method="post" action="<?php echo base_url();?>/master/addindicatorcategory" enctype='multipart/form-data'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Indicator Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Indicator Category Name" required="required" name="category_name">
                  </div>
                  
                    <div class="form-group">

                    <label for="exampleInputEmail1">Description </label>

                    <textarea class="form-control" required="required" name="description" id="exampleInputEmail1"></textarea>
                   
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 100%;">Select Icon</label>
                    <input type="file"  id="image" required="required" name="file" >
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
                <h3 class="card-title">Indicator Category List</h3>
              </div>
              
    <?php 

   // print_r($sdg);

    if(!empty($list)){?>
    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr><th>#</th><th>Name</th><th>Description</th><th>Icon</th><th>Action</th></tr>
    </thead>
    <?php $s=1;
    foreach($list as $d){?>
      <tr>
          <td><?php echo $s;?></td><td><?php echo $d['indicator_category_name'];?></td>
          <td><?php echo $d['description'];?></td>
        <td><img src="<?php echo base_url();?>/public/uploads/sdg/<?php echo $d['image'];?>" style="width: 100px;"></td>
           <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editSdg(this);" data-description='<?php echo $d['description'];?>'data-name='<?php echo $d['indicator_category_name'];?>' data-number='<?php echo $d['id'];?>' data-img='<?php echo base_url();?>/public/uploads/sdg/<?php echo $d['image'];?>'><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteindicatorcategory/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php $s++;}?>
    </table>
  <?php } ?>
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

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/editIndicatorCategory" enctype='multipart/form-data'>

            <input type="hidden" name="id" id="cat_id" value="" required="required">
            <div class="modal-body">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Industry Category</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Industry Category Name</label>
                    <input type="text" class="form-control" id="cat_name" placeholder="Enter Industry Category Name" required="required" name="category_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" required="required" name="description" id="cat_description"></textarea>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 100%;">Select Icon</label>
                    <input type="file"  id="image"  name="file" style="width: 100%;">
                    <img src="" id="imgDiv" style="padding-top: 10px;" />
                  </div>

                </div>
             
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
   function editSdg(that) {
        var num = $(that).attr('data-number');
        //alert(num);
        var description = $(that).attr('data-description');
        var name = $(that).attr('data-name');
        var img = $(that).attr('data-img');
        $('#cat_id').val(num);
        $('#cat_name').val(name);
        $('#cat_description').val(description);
        $('#imgDiv').attr('src',img);
        $('#modal-edit').modal('show');
    }
</script>