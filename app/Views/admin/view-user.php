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
              
              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/module/addUser" class='btn btn-primary'><i class="fa fa-plus"></i> Add User</a> </li>
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
                <h3 class="card-title">Users List</h3>
              </div>
        
    <?php 

    if(!empty($list)){?>
    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr>
      <th>#</th>
      <th>Name </th>
      <th>Email </th>
      <th>Role</th>
      <th>Address </th>
      <th>Zipcode </th>
      <th>Phone</th>
      <th>Profile Pic</th>
      <th>Action</th></tr>
    </thead>
    <tbody>
    <?php $s=1;

    foreach($list as $d){?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['name'];?></td>
        <td><?php echo $d['email'];?></td>
        <td><?php echo $d['role_name'];?></td>
        <td><?php echo $d['address'] ?></td>
        <td><?php echo $d['zipcode'] ?></td>
        <td><?php echo $d['phone'] ?></td>
        <td>
          <img src="<?php echo base_url();?>/public/uploads/user/<?php echo $d['profile_pic'];?>" style="width: 100px;">          
        </td>       
           <td>
          <a class="btn btn-primary" href="<?php echo base_url() ?>/module/editUser/<?php echo $d['id'] ?>" onclick="" ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/module/deleteUser/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
<?php include('include/footer.php');?>

