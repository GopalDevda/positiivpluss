<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Indicator Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Indicators  </li>
            </ol>
          </div><!-- /.col -->
     </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
                <h3 class="card-title">Add New Indicator </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="indicator" id="indicator" method="post" action="<?php echo base_url();?>/master/updateIndicator" enctype='multipart/form-data'>
              <input type="hidden" id="indicator_id" name="id" value="<?= $list->id ?>" />
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Indicator Category</label>
                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control">
                        <option value="">Select Indicator Cateory</option>
                        <?php if(!empty($indicator_category)){
                          foreach($indicator_category as $r){?>
                        <option value="<?php echo $r['id'];?>" <?= $list->indicator_category_id==$r['id']?"selected":"" ?>><?php echo $r['indicator_category_name'];?></option>
                     <?php  }
                        }?>
                    </select>
                  </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Indicator Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Indicator Name" required="required" name="name" value="<?= $list->indicator_name ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description Name" required="required" name="description" value="<?= $list->description ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 100%;">Select Icon</label>
                    <input type="file"  id="image" name="file" style="width: 100%;">
<img src="<?php echo base_url();?>/public/uploads/sdg/<?php echo $list->image;?>" style="width: 70px;padding-top: 10px;">
                  </div>

<div class="form-group">
<label for="exampleInputEmail1">Select SDGs</label>
</div>
<?php if(!empty($sdg)){
  foreach($sdg as $r){?>
  <div class="col-md-3" style="float: left;">
    <input type="checkbox" name="sdg_id[]"  value="<?php echo $r['id']?>" 

    <?php 

      if(!empty($indicator_sdg)) {

        foreach($indicator_sdg as $isdg) {

          if($isdg["sdg_id"]==$r["id"]) {

            echo "checked";

          }

        }

      }

    ?>

    /> <?php echo $r['sdg_name']?>



  </div>



<?php } } ?>                



                 



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