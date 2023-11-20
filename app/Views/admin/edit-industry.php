<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Industry Management</h1>

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

                <h3 class="card-title">Edit Industry </h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="industry" id="industry" method="post" action="<?php echo base_url();?>/master/updateIndustry">
              <input type="hidden" id="industry_id" name="id" value="<?= $list->id ?>" />
                <div class="card-body">



                  <div class="form-group">

                    <label for="exampleInputEmail1">Industry Category</label>

                    <select name="industry_category_id" id="industry_category_id" required="required" class="form-control">

                        <option value="">Select Industry Cateory</option>

                        <?php if(!empty($industry_category)){

                          foreach($industry_category as $r){?>

                        <option value="<?php echo $r['id'];?>" <?= $list->industry_category_id==$r['id']?"selected":"" ?>><?php echo $r['industry_category_name'];?></option>

                       <?php  }

                        }?>

                    </select>

                  </div>



                  <div class="form-group">

                    <label for="exampleInputEmail1">Industry Name</label>

                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Industry Name" required="required" name="name" value="<?= $list->industry_name ?>">

                  </div>

                

<div class="form-group">

<label for="exampleInputEmail1">Select SDGs</label>

</div>

<?php if(!empty($sdg)){

  foreach($sdg as $r){?>

  <div class="col-md-3" style="float: left;">

    <input type="checkbox" name="sdg_id[]"  value="<?php echo $r['id']?>" 
    <?php 
      if(!empty($industry_sdg)) {
        foreach($industry_sdg as $isdg) {
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