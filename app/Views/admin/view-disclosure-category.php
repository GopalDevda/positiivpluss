<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Disclosure Category Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active"><a href="#" onclick="addDisclosureCategory()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Category</a> </li>
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
                <h3 class="card-title">Module List</h3>
              </div>
        
    <?php 

    if(!empty($list)){?>
    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr><th>#</th><th>Category Name </th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php $s=1;

    foreach($list as $d){?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['disclosure_category_name'];?></td>
           <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editDisclosureCategory(this)" data-name='<?php echo $d['disclosure_category_name'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteDisclosureCategory/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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

              <form method="post" name="disclosure-category-form" id="disclosure-category-form" action="<?php echo base_url();?>/master/editDisclosureCategory">

              <input type="hidden" name="id" id="disclosure_category_id" value="" required="required">

            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Category Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter Category Name" name="name" id="disclosure_category_name">

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

              <form method="post" name="disclosure-category-form" id="disclosure-category-form" action="<?php echo base_url();?>/master/addDisclosureCategory">


            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Disclosure Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Category Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter Category Name" name="name" id="disclosure_category_name">

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

   function editDisclosureCategory(that) {

        var num = $(that).attr('data-number');

        // alert(num);

        var name = $(that).attr('data-name');

        $('#disclosure_category_id').val(num);

        $('#disclosure_category_name').val(name);

        $('#modal-edit').modal('show');

    }

    function addDisclosureCategory() {
        $('#modal-add').modal('show');
    }

</script>

<?php include('include/footer.php');?>

