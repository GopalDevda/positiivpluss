<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">FAq</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>/cms/faqquestion" class='btn btn-primary'><i class="fa fa-plus"></i> Add Faq</a></li>
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
              <h3 class="card-title">Faq List</h3>
            </div>
            <?php 
              // print_r($list);die;
              if(!empty($list)){?>
            <table class="table table-bordered table-hover" id="datatables">
              <tr>
                <th>#</th>
                <th>Faq Category Name</th>
                <th>Title </th>
                <th>Description </th>
                <th>Action</th>
              </tr>
              <?php $s=1;
                foreach($list as $d){?>
              <tr>
                <td><?php echo $s;?></td>
                <td><?php echo $d['faq_category_id'];?></td>
                <td><?php echo $d['title'];?></td>
                <td><?php echo $d['description'];?></td>
                <td>
                 
                  <a class="btn btn-primary"href="<?php echo base_url()?>/cms/editfaq/<?php echo $d['id'];?>" data-name='<?php echo $d['id'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>

                  <a class="btn btn-danger" href="<?php echo base_url()?>/cms/deletefaq/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php $s++;}?>
            </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
     <!--  <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/cms/updatefaq" enctype='multipart/form-data'>
        <input type="hidden" name="id" id="cat_id" value="" required="required">
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Faq</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
            
                <input type="hidden" class="form-control" id="cat_name" placeholder="Enter Industry Category Name" required="required" name="category_name" >
              </div>
              <label for="exampleInputEmail1">Faq Category</label>
                  <select name="faq_category_id" id="faq_category_id"  class="form-control">
                        <option value="">Select Faq Cateory</option>
                        <?php if(!empty($faq_category)){
                          foreach($faq_category as $r){?>
                        <option value="<?php echo $r['id'];?>"><?php echo $r['faq_category_name'];?></option>
                       <?php  }   }?>
                    </select>
              <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" class="form-control" id="cat_name" placeholder="Enter Industry Category Name" required="required" name="title" value="<?php echo $d['title'];?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" id="cat_name" placeholder="Enter Industry Category Name" required="required" name="description" value="<?php echo $d['description'];?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
  function editfaq(that) {
  
       var num = $(that).attr('data-number');
  
       //alert(num);
  
       var name = $(that).attr('data-name');
  
       var img = $(that).attr('data-img');
  
       $('#cat_id').val(num);
  
       $('#cat_name').val(name);
  
       $('#modal-edit').modal('show');
  
   }
  
</script>