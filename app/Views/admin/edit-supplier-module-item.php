<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier Module Item Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier Module Item </li>
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
                <h3 class="card-title">Edit Module Item </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="supplier-module-item" id="module_item" method="post" action="<?php echo base_url();?>/SupplierModule/updateSupplierModuleItem" enctype="multipart/form-data">
                <input type="hidden" id="supplier_module_item_id" name="id" value="<?php echo $supplier_module_item['id'] ?>" />
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Supplier Module</label>
                    <select name="supplier_module_id" id="supplier_module_id" required="required" class="form-control">
                        <option value="">Select Supplier Module</option>
                        <?php 
                          if($supplier_module) {
                            foreach($supplier_module as $mod) {
                        ?>
                          <option value="<?php echo $mod["id"] ?>" <?php echo $mod['id']==$supplier_module_item['supplier_module_id']?"selected":"" ?>><?php echo $mod["supplier_module_name"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input type="text"  class="form-control" id="item_name" required="required" name="name" value="<?php echo $supplier_module_item["item_name"] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text"  class="form-control" id="item_link" required="required" name="link" value="<?php echo $supplier_module_item["link"] ?>">
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Icon</label>
                    <input type="text"  class="form-control" id="icon" required="required" name="icon" value="<?php echo $supplier_module_item["icon"] ?>">

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
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
<?php include('include/footer.php');?>

