<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Offset Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addOffset()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Offset</a> </li>

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

                <h3 class="card-title">Offset List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Name</th><th>Description</th><th>Price</th><th>Photo</th><th>Action</th></tr>

    </thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>
        <td><?php echo $d['name'] ?></td>
        <td><?php echo $d['description'] ?></td>
        <td><?php echo $d['price'] ?></td>
        <td><img src="<?php echo base_url();?>/public/uploads/offset/<?php echo $d['photo'];?>" style="width: 100px;"></td>
        <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editOffset(this)" data-name='<?php echo $d['name'];?>' data-number='<?php echo $d['id'];?>' data-description='<?php echo $d['description'];?>' data-photo='<?php echo base_url();?>/public/uploads/offset/<?php echo $d['photo'];?>' data-price='<?php echo $d['price'];?>' ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteOffset/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
              <form method="post" name="offset-form" id="offset-form" action="<?php echo base_url();?>/master/editOffset" enctype='multipart/form-data'>
              <input type="hidden" name="id" id="offset_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Offset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Offset Name" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="description" required="required" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Offset Price" name="price" id="price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo" id="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                      
                    </div>
                  </div>
                  <div class="form-group">
                    <img id="imgDiv" style="width: 100px;">
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
              <form method="post" name="offset-add-form" id="offset-add-form" action="<?php echo base_url();?>/master/addOffset" enctype='multipart/form-data'>
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Offset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Offset Name" name="name" id="offset_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="offset_description" required="required" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" required="required" class="form-control"  placeholder="Enter Offset Price" name="price" id="offset_price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo" id="offset_photo" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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

<script type="text/javascript">

   function editOffset(that) {
        var num = $(that).attr('data-number');
        var name = $(that).attr('data-name');
        var description = $(that).attr('data-description');
        var price = $(that).attr('data-price');
        var photo = $(that).attr('data-photo');
        $('#offset_id').val(num);
        $('#name').val(name);
        $('#description').val(description);
        $('#price').val(price);
        $('#imgDiv').attr('src',photo);
        $('#modal-edit').modal('show');
    }

    function addOffset() {
        $('#modal-add').modal('show');
    }

</script>

<?php include('include/footer.php');?>



