  <?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Us</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Contact Us page
              </h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php  echo base_url().'/cms/cmsupdate/'.$cms[0]['id']; ?>" method="post">
            <div class="card-body pad">
                <input type="hidden" id="id" name="id" value="<?php echo $cms[0]['id'];?>" />
              <div class="form-group">

                    <label for="exampleInputEmail1">Title of the page *</label>

                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Conatct us" required="required" name="title" value="<?php echo $cms[0]['title'];?>">

                  </div>
              <div class="mb-3">
                    <label for="exampleInputEmail1">Content of the Page*</label>
                <textarea class="textarea" placeholder="Place some text here" name="description" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo $cms[0]['description'];?></textarea>
              </div>
             
            </div>
            <div class="card-footer">

                  <button type="submit" class="btn btn-light">Cancle</button>

                

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
          </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->



  </div>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
<?php include('include/footer.php');?>