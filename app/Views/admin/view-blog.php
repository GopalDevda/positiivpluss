<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blog Management</h1>
        </div>
        <!-- /.col -->
        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/blog/addBlog" class='btn btn-primary'><i class="fa fa-plus"></i> Add Blog</a> </li>
          </ol>
        </div>
        <!-- /.col --> 
        
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container-fluid --> 
    
  </div>
  
  <!-- /.content-header --> 
  
  <!-- Main content -->
  
  <section class="content">
    <div class="container-fluid">
      <?php 

if($session->get('success')){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $session->get('success');?> </div>
      <?php } ?>
      <?php 

if($session->get('error')){?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $session->get('error');?> </div>
      <?php } ?>
      <div class="row"> 
        
        <!-- left column -->
        
        <div class="col-md-12"> 
          
          <!-- general form elements -->
          
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Blog List</h3>
            </div>
            <?php 



    if(!empty($list)){?>
            <table class="table table-bordered table-hover" id="datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>Heading</th>
                  <th>Url</th>
                  <th>Report</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $s=1;



    foreach($list as $d){?>
                <tr>
                  <td><?php echo $s;?></td>
                  <td><?php echo $d['type'];?></td>
                  <td><?php echo $d['heading'];?></td>
                  <td><?php echo $d['url'];?></td>
                  <td><?php echo $d['report'];?></td>
                  <td><img class="img-thumbnail" src="<?= base_url() ?>/public/uploads/blog/<?php echo $d['image'];?>" style="width: 50px;"></td>
                  <td><?php echo $d['description'];?></td>
                  <td><a class="btn btn-primary" href="<?php echo base_url()?>/blog/editBlog/<?php echo $d['id'];?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger" href="<?php echo base_url()?>/blog/deleteBlog/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php $s++;}?>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid --> 
    
  </section>
</div>
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <form method="post" name="module-form" id="module-form" action="<?php echo base_url();?>/module/editModule" enctype='multipart/form-data'>
        <input type="hidden" name="id" id="module_id" value="" required>
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Module</h3>
            </div>
            
            <!-- /.card-header --> 
            
            <!-- form start -->
            
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Module Name</label>
                <input type="text" required class="form-control"  placeholder="Enter Module Name" name="name" id="module_name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Module Link</label>
                <input type="text" required class="form-control"  placeholder="Enter Module Link" name="link" id="module_link">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Module Icon</label>
                <input type="text" required class="form-control"  placeholder="Enter Module Icon" name="icon" id="module_icon">
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



   function editSdg(that) {



        var num = $(that).attr('data-number');



        // alert(num);



        var name = $(that).attr('data-name');



        var link = $(that).attr('data-link');



        var icon = $(that).attr('data-icon');



        $('#module_id').val(num);



        $('#module_name').val(name);



        $("#module_link").val(link);



        $("#module_icon").val(icon);



        $('#modal-edit').modal('show');



    }



</script>
<?php include('include/footer.php');?>
