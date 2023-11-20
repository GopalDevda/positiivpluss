<?php include('include/header.php'); ?>

<?php include('include/menu.php'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Assessment Management</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Industry </li>

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

      if ($session->get('success')) { ?>

        <div class="alert alert-success alert-dismissible">

          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <?php echo $session->get('success'); ?>

        </div>

      <?php } ?>

      <?php

      if ($session->get('error')) { ?>

        <div class="alert alert-danger alert-dismissible">

          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <?php echo $session->get('error'); ?>

        </div>

      <?php } ?>



      <div class="row">

        <!-- left column -->

        <div class="col-md-12">

          <!-- general form elements -->

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Add New Assessment </h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form name="frm-industry" id="industry" method="post" action="<?php echo base_url(); ?>/AddvanceMasterController/updateAdvanceAssessment" enctype="multipart/form-data">

              <input type="hidden" id="assessment_id" name="id" value="<?php echo $assessment['id'] ?>" />

              <div class="card-body">



                <div class="form-group">

                  <label for="exampleInputEmail1">Name</label>

                  <input type="text" class="form-control" id="assessment_name" required="required" name="name" value="<?php echo $assessment['assessment_name'] ?>">

                </div>





                <div class="form-group">



                  <label for="exampleInputEmail1">Type</label>



                  <select name="type" id="type" required="required" class="form-control">



                    <option value="">Select Type</option>



                    <option value="Survey" <?= $assessment["type"] == 'Survey' ? 'selected' : '' ?>>Survey</option>


                    <option value="Checklist" <?= $assessment["type"] == 'Checklist' ? 'selected' : '' ?>>Checklist </option>


                    <option value="Inception" <?= $assessment["type"] == 'Inception' ? 'selected' : '' ?>>Inception </option>



                  </select>



                </div>



                <div class="form-group">

                  <label for="exampleInputEmail1">Weight Percentage</label>

                  <input type="text" class="form-control" id="assessment_weight_percentage" required="required" name="weight_percentage" value="<?php echo $assessment['weight_percentage'] ?>">

                </div>


                <!-- <div class="form-group">



                    <label for="exampleInputEmail1"> Select Indicator Category</label>



                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">



                        <option value="">Select Indicator Category </option>



                        <?php if (!empty($indicator_category)) {



                          foreach ($indicator_category as $r) { ?>



                        <option value="<?php echo $r['id']; ?>" <?= $r["id"] == $rs->indicator_category_id ? 'selected' : '' ?>   ><?php echo $r['indicator_category_name']; ?></option>



                       <?php  }
                        } ?>



                    </select>



                  </div> -->


                <!-- <div class="form-group">

                  <label for="exampleInputEmail1"> Select Indicator Category</label>

                  <select name="indicator_id" id="indicatorDiv" required="required" class="form-control">

                    <option value="">Select Indicator </option>

                    <?php

                    if (!empty($indicator)) {

                      foreach ($indicator as $indi) {

                    ?>

                        <option value="<?php echo $indi["id"] ?>" <?= $indi["id"] == $rs->indicator_id ? 'selected' : '' ?>>

                          <?php echo $indi["indicator_name"] ?>

                        </option>

                    <?php

                      }
                    }

                    ?>

                  </select>

                </div> -->

                <div class="form-group">
                  <label for="exampleInputEmail1"> Select Boundaries </label>
                  <select name="boundary" id="boundry" required="required" class="form-control">
                    <option value="">Select Boundaries </option>

                    <?php foreach ($boundary_item as $boundary_id) { ?>
                      <option value="<?php echo $boundary_id['id']; ?>" <?= $boundary_id["id"] ==  $assessment['boundary'] ? 'selected' : '' ?>> <?php echo $boundary_id['item_name'];  ?></option>

                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Description</label>

                  <textarea class="form-control" id="assessment_description" required="required" name="description"><?php echo $assessment['description'] ?></textarea>

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



                  <img src="<?php echo base_url() ?>/public/uploads/assessment/<?php echo $assessment['image'] ?>" id="imgDiv" style="width: 100px;">



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
<script type="text/javascript">
  function getIndicatorAjax(id = 1) {



    $.ajax({



      url: "<?php echo base_url() ?>/master/getIndicatorByIndicatorCategorymaster/" + id,



      type: "POST",



      //dataType: "JSON",



      success: function(data) {



        $('#indicatorDiv').html(data);



      },



    });



  }
</script>
<?php include('include/footer.php'); ?>