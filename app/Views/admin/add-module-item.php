<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Module Item Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Module Item </li>
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
                <h3 class="card-title">Add New Module Item </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frm-industry" id="module_item" method="post" action="<?php echo base_url();?>/module/addModuleItemSubmit" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Module</label>
                    <select name="module_id" id="module_id" required="required" class="form-control">
                        <option value="">Select Module</option>
                        <?php 
                          if($module) {
                            foreach($module as $mod) {
                        ?>
                          <option value="<?php echo $mod["id"] ?>"><?php echo $mod["module_name"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input type="text"  class="form-control" id="item_name" required="required" name="name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text"  class="form-control" id="item_link" required="required" name="link">
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Icon</label>

                    <div class="input-group">

                      <div class="custom-file">

                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file" required="required">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>

                      </div>

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

