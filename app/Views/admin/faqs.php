<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FAQ's</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo base_url();?>/cms/viewfaqs" class='btn btn-primary'><i class="fa fa-view"></i> View Faq</a> </li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                FAQ
              </h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo base_url();?>/cms/addfaqquestion" method="post">
            <div class="card-body pad">        
                  <div class="form-group">
                    <label for="exampleInputEmail1">Faq Category</label>
                    <select name="faq_category_id" id="faq_category_id" required="required" class="form-control">
                        <option value="">Select Faq Cateory</option>
                        <?php if(!empty($faq_category)){
                          foreach($faq_category as $r){?>
                        <option value="<?php echo $r['id'];?>"><?php echo $r['faq_category_name'];?></option>
                       <?php  }   }?>
                    </select>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Heading*</label>

                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" required="required" name="title" >

                  </div>
              <div class="mb-3">
                    <label for="exampleInputEmail1">Description*</label>
                <textarea class="form-control" placeholder="Place some text here" name="description" required="required"></textarea>
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
 <!--  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script> -->
<?php include('include/footer.php');?>