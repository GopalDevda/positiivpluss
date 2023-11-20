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
              <li class="breadcrumb-item active">User Management  </li>
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
                <h3 class="card-title">Edit User </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frm-user" id="user" method="post" action="<?php echo base_url();?>/module/updateUser" enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="id" value="<?php echo $user['id'] ?>" />
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">User Role</label>
                    <select name="role_id" id="role_id" required="required" class="form-control">
                      <option value="">Select Role</option>
                      <?php 
                        if($module_role) {
                          foreach($module_role as $role) {
                      ?>
                        <option value="<?php echo $role['id'] ?>" <?php echo $role['id']==$user['user_role']?'selected':'' ?>><?php echo $role['role_name'] ?></option>
                      <?php
                          }
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"  class="form-control" id="user_name" required="required" name="name" value="<?php echo $user['name'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text"  class="form-control" id="user_email" required="required" name="email" value="<?php echo $user["email"] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" id="user_address" required="required" name="address"><?php echo $user['address'] ?></textarea>
                  </div>                           

                  <div class="form-group">
                    <label for="exampleInputEmail1">Zipcode</label>
                    <input type="text"  class="form-control" id="user_zipcode" required="required" name="zipcode" value="<?php echo $user['zipcode'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text"  class="form-control" id="user_phone" required="required" name="phone" value="<?php echo $user['phone'] ?>">
                  </div>


                  <div class="form-group">

                    <label for="exampleInputFile">Icon</label>

                    <div class="input-group">

                      <div class="custom-file">

                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>

                      </div>

                  </div>

                <div class="form-group">

                   <img src="<?php echo base_url() ?>/public/uploads/user/<?php echo $user['profile_pic'] ?>" id="imgDiv" style="width: 100px;">

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

