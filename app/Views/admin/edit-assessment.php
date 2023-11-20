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
              <h3 class="card-title">Edit Assessment </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form name="frm-industry" id="industry" method="post" action="<?php echo base_url(); ?>/master/updateAssessment" enctype="multipart/form-data">
              <input type="hidden" id="assessment_id" name="id" value="<?php echo $assessment['id'] ?>" />
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="assessment_name" required="required" name="name" value="<?php echo $assessment['assessment_name'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="assessment_title" required="required" name="title" value="<?php echo $assessment["title"] ?>">
                </div>
                <!-- start safal code -->
                <div class="form-group"> <label for="exampleInputEmail1"> Select Indicator Category</label> <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(value);">

                    <?php if (!empty($indicator_category)) {
                      foreach ($indicator_category as $r) {
                    ?>
                        <option value="<?= $r['id']; ?>" <?= ($r['id'] == $assessment["indicator_category_id"]) ? 'selected' : '' ?>>
                          <?php echo $r['indicator_category_name'] ?> </option>
                    <?php }
                    } ?>
                  </select> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Industry </label>
                  <select name="industry_id" id="industry_id" required="required" class="form-control">
                    <option value="">Select Industry </option>
                    <option value="0">All</option>
                    <?php if (!empty($industry)) {
                      foreach ($industry as $r) { ?>
                        <option value="<?php echo $r['id']; ?>" <?= ($r['id'] == $assessment["industry_id"]) ? 'selected' : '' ?>><?php echo $r['industry_name']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Location </label>
                  <select name="location_id" id="location_id" required="required" class="form-control">
                    <option value="">Select Location </option>
                    <option value="0">All</option>
                    <?php if ($country) {
                      foreach ($country as $c) { ?>
                        <option value="<?php echo $c['id'] ?>" <?= ($c['id'] == $assessment["location_id"]) ? 'selected' : '' ?>><?php echo $c['name'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Company Size </label>
                  <select name="company_size" id="company_id" required="required" class="form-control">
                    <option value="">Select Size </option>
                    <option value="0">All</option>
                    <?php if ($company) {
                      foreach ($company as $c) { ?>
                        <option value="<?php echo $c['id'] ?>" <?= ($c['id'] == $assessment["company_size"]) ? 'selected' : '' ?>><?php echo $c['company_size'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form_6">
                  <div class="theme_form_label"> <label for="exampleInputEmail1">Boundary </label></div>
                  <div class="form-group">
                    <select name="boundary" id="boundary" class="form-control" required="required ">
                      <option value="">Select Boundary </option>
                      <?php if (!empty($boundary_item)) foreach ($boundary_item as $dd) { ?>
                        <option value="<?php echo $dd['id']; ?>" <?= ($dd['id'] == $assessment["boundary"]) ? 'selected' : '' ?>><?php echo $dd['item_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group"> <label for="exampleInputEmail1"> Select Indicator </label> <select name="indicator_id" id="indicatorDiv" required="required" class="form-control">
<?php if (!empty($indicator)) {
  foreach ($indicator as $s) { ?>
<option value="<?php echo $s['id']; ?>" <?= ($s['id'] == $assessment["indicator_id"]) ? 'selected' : '' ?>>
<?php echo $s['indicator_name'] ?> </option>
<?php }
} ?>
</select> </div> -->
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
<?php include('include/footer.php'); ?>

<script type="text/javascript">
  function getIndicatorAjax(id) {
    $.ajax({
      url: "<?php echo base_url() ?>/assessment/getIndicatorByIndicatorCategory/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var dat = data.succss;
        $('#indicatorDiv').html(dat);
      },
    });
  }
</script>