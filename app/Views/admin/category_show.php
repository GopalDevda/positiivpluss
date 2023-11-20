<?php include('include/header.php'); ?>

<?php include('include/menu.php'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Unit Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- start safal code for add category -->
            <li class="breadcrumb-item active"><a href="#" onclick="addCategory()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Category</a> </li>
            <!-- end safal code for add category -->
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

          <?= $session->get('success'); ?>

        </div>

      <?php } ?>

      <?php

      if ($session->get('error')) { ?>

        <div class="alert alert-danger alert-dismissible">

          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <?= $session->get('error'); ?>

        </div>

      <?php } ?>



      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
              </h3>
            </div>
            <?php
            // print_r($list);

            if (!empty($list)) { ?>

              <table class="table table-bordered table-hover" id="datatables">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php $s = 1;
                // print_r($list);
                // die;
                foreach ($list as $d) { ?>
                  <tr>
                    <td><?= $s; ?></td>
                    <td><?= $d['category_name']; ?></td>
                    <td>
                      <a class="btn btn-primary" href="javascript:void(0);" onclick="editFunction($(this));" data-ind_name='<?= $d['category_name']; ?>' data-number='<?= $d['id']; ?>'><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger" href="<?= base_url() ?>/Master/delete_category/<?= $d['id']; ?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php $s++;
                } ?>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>
<?php include('include/footer.php'); ?>
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="sdg-form" id="sdf-form" action="<?= base_url(); ?>/Master/update_category">
        <input type="hidden" name="id" id="id" value="" required="required">
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Category Name</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="up_cat">Category Name </p1></label>
                <input type="text" class="form-control" id="up_cat" placeholder="Enter Category Name" required="required" name="up_cat">
              </div>
            </div>
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

<!-- start safal code for unit category -->
<div class="modal fade" id="unitcategorymodal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="unitcategory-form" id="unitcategory-form" action="<?php echo base_url(); ?>/master/addUnitCategory">
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="unit_name">Category Name</label>
                <input type="text" required="required" class="form-control" placeholder="Enter Category Name" name="unitcategory_name">
                <input type="hidden" name="url" value="Master/add_category">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- end safal code for unit category -->
<script type="text/javascript">
  function editFunction(that) {
    $('#id').val($(that).data("number"));
    $('#up_cat').val($(that).data("ind_name"));
    $("#modal-edit").modal("show");
    // console.log(cat_name);
  }

  function addCategory() {
    $('#unitcategorymodal-add').modal('show');
  }
  // function getIndustryAjax(id = 1) {
  //   $.ajax({
  //     url: "<?= base_url() ?>/SubSubIndustry/getIndustryByIndustryCategory/" + id,
  //     type: "POST",
  //     //dataType: "JSON",
  //     success: function(data) {
  //       $('#IndustryDiv').html(data);
  //     },
  //     error: function(xhr, status, error) {
  //       $('#IndustryDiv').html('<option value="">Select Industry </option>');
  //     }
  //   });
  // }
</script>