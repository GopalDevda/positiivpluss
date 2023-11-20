<?php include('include/header.php'); ?>

<?php include('include/menu.php'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Advanced Assessment Management</h1>

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

              <h3 class="card-title">Add Advanced New Assessment </h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form name="frm-industry" id="industry" method="post" action="<?php echo base_url(); ?>/AddvanceMasterController/addAdvancedAssessmentSubmit" enctype="multipart/form-data">

              <div class="card-body">

                <div class="form-group">

                  <label for="exampleInputEmail1">Name</label>

                  <input type="text" class="form-control" id="assessment_name" required="required" name="name">

                </div>

                <div class="form-group">



                  <label for="exampleInputEmail1">Type</label>



                  <select name="type" id="type" required="required" class="form-control">



                    <option value="">Select Type</option>



                    <option value="Survey">Survey</option>


                    <option value="Checklist">Checklist </option>


                    <option value="Inception">Inception </option>



                  </select>



                </div>



                <div class="form-group">



                  <label for="exampleInputEmail1">Select Industry </label>



                  <select name="industry_id" id="industry_id" required="required" class="form-control">



                    <option value="">Select Industry </option>

                    <option value="0">All</option>



                    <?php if (!empty($industry)) {



                      foreach ($industry as $r) { ?>



                        <option value="<?php echo $r['id']; ?>"><?php echo $r['industry_name']; ?></option>



                    <?php  }
                    } ?>

                  </select>
                </div>

                <!-- <div class="form-group">
                  <label for="exampleInputEmail1"> Select Indicator Category</label>
                  <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">
                    <option value="">Select Indicator Category </option>
                    <?php if (!empty($indicator_category)) {
                      foreach ($indicator_category as $r) { ?>
                        <option value="<?php echo $r['id']; ?>"><?php echo $r['indicator_category_name']; ?></option>
                    <?php  }
                    } ?>
                  </select>
                </div> -->



                <!-- <div class="form-group">
                  <label for="exampleInputEmail1"> Select Indicator </label>
                  <select name="indicator_id" id="indicatorDiv" required="required" class="form-control">
                    <option value="">Select Indicator </option>
                  </select>
                </div> -->

                <div class="form-group">
                  <label for="exampleInputEmail1"> Select Boundaries </label>
                  <select name="boundary" id="boundry" required="required" class="form-control">
                    <option value="">Select Boundaries </option>

                    <?php foreach ($boundary_item as $boundary_id) { ?>
                      <option value="<?php echo $boundary_id['id'];  ?>"> <?php echo $boundary_id['item_name'];  ?></option>

                    <?php } ?>
                  </select>
                </div>


                <div class="form-group">



                  <label for="exampleInputEmail1">Select Location </label>



                  <select name="location_id" id="location_id" required="required" class="form-control">



                    <option value="">Select Location </option>

                    <option value="0">All</option>



                    <?php

                    if ($country) {

                      foreach ($country as $c) {

                    ?>

                        <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>

                    <?php

                      }
                    }

                    ?>



                  </select>



                </div>



                <div class="form-group">



                  <label for="exampleInputEmail1">Select Company Size </label>



                  <select name="company_size" id="company_id" required="required" class="form-control">



                    <option value="">Select Size </option>

                    <option value="0">All</option>



                    <?php

                    if ($company) {

                      foreach ($company as $c) {

                    ?>

                        <option value="<?php echo $c['id'] ?>"><?php echo $c['company_size'] ?></option>

                    <?php

                      }
                    }

                    ?>



                  </select>



                </div>










                <!-- <div class="form-group">

                  <label for="exampleInputEmail1">Weight Percentage</label>

                  <input type="text" class="form-control" id="assessment_weight_percentage" required="required" name="weight_percentage">

                </div> -->



                <div class="form-group">

                  <label for="exampleInputEmail1">Description</label>

                  <textarea class="form-control" id="assessment_description" required="required" name="description"></textarea>

                </div>



                <div class="form-group">



                  <label for="exampleInputFile">Icon</label>



                  <div class="input-group">



                    <div class="custom-file">



                      <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file" required="required">



                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>



                    </div>



                  </div>



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

<?php include('include/footer.php'); ?>



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
<script>
  function showBoundary(that) {
    var boundary_id = $(that).val();
    // alert(boundary_id);
    if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
      $.ajax({
        url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {
          $("#subboundary_id").html(data);
        },
        error: function(xhr, status, error) {
          $('#indicatorDiv').html('<option value="">No data found </option>');
        }
      });
    }
    $.ajax({
      url: "<?php echo base_url() ?>/Controlwork/getIndicatorByboundary/" + boundary_id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {
        $("#indicator").html(data);
      },
      error: function(xhr, status, error) {
        $('#indicator').html('<option value="">No data found </option>');
      }
    });

  }
</script>