<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User </li>
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
                <h3 class="card-title">Add New User </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frm-industry" id="module_item" method="post" action="<?php echo base_url();?>/module/addUserSubmit" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Role</label>
                    <select name="role_id" id="role_id" required="required" class="form-control">
                        <option value="">Select Role</option>
                        <?php 
                          if($role) {
                            foreach($role as $r) {
                        ?>
                          <option value="<?php echo $r["id"] ?>"><?php echo $r["role_name"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"  class="form-control" id="user_name" required="required" name="name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email"  class="form-control" id="user_email" required="required" name="email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" id="address" required="required" name="address"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Zipcode</label>
                    <input type="text"  class="form-control" id="zipcode" required="required" name="zipcode">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text"  class="form-control" id="phone" required="required" name="phone">
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Profile Picture</label>

                    <div class="input-group">

                      <div class="custom-file">

                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file" required="required">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>

                      </div>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password"  class="form-control" id="user_password" required="required" name="password">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password"  class="form-control" id="user_confirm_password" required="required" name="confirm_password">
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

