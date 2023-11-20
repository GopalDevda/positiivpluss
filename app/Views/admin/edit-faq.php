<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Update Faq</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Faq </li>
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Faq </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form name="faq" id="faq" method="post" action="<?php echo base_url();?>/cms/updatefaq">
              <input type="hidden" id="faq_id" name="id" value="<?= $list->id ?>" />
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">FAq Category</label>
                  <select name="faq_category_id" id="faq_category_id" required="required" class="form-control">
                    <option value="">Select Indicator Cateory</option>
                    <?php if(!empty($faq_category)){
                          foreach($faq_category as $r){?>
                        <option value="<?php echo $r['id'];?>" <?= $list->faq_category_id==$r['id']?"selected":"" ?>><?php echo $r['faq_category_name'];?></option>
                       <?php  }   }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Indicator Name" required="required" name="title" value="<?= $list->title ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea  class="form-control" id="exampleInputEmail1" placeholder="Description" required="required" name="description"><?= $list->description ?></textarea>
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
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
<?php include('include/footer.php');?>