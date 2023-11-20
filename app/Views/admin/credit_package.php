<?php

use App\Models\Data_electricityModel;
?>
<?php include('include/header.php'); ?>
<?php include('include/menu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Credit Package</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#" onclick="addSite()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Credit Package</a> </li>
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
                            <h3 class="card-title">Credit Package</h3>
                        </div>
                        <?php if (!empty($list)) { ?>
                            <table class="table table-bordered table-hover" id="datatables">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Plan</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $s = 1;
                                    //  print_r($supplier);
                                    // echo "<pre>";print_r($list);die;
                                    if ($list) {
                                        foreach ($list as $d) {
                                    ?>
                                            <tr>
                                                <td><?= $s ?></td>
                                                <td><?= $d['min_credit'] . ' - ' . $d['max_credit'] ?></td>
                                                <td><?= $d['price'] ?></td>
                                                <td><?= $d['description'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary"><i class="fa fa-edit" data-id="<?= $d['id']; ?>" data-max-edit="<?= $d['max_credit']; ?>" data-min-edit="<?= $d['min_credit']; ?>" data-price="<?= $d['price']; ?>" data-description="<?= $d['description']; ?>" onclick="plan_edit($(this))"></i></a>
                                                    <a onclick="plan_delete(<?= $d['id'] ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php $s++;
                                        } ?>
                                </tbody>
                            </table>
                    <?php }
                                } ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="vehicle-add-form" action="<?php echo base_url(); ?>/Credit_package/insert">
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Credit Package</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="package_plan">Minimum Credit</label>
                                <input class="form-control" type="number" name="min_credit">
                                <!-- <select name="package_plan" class="form-control" id="package_plan">
                                    <option value="0">select from list</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="0">Custom Plan</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="package_plan">Maximum Credit</label>
                                <input class="form-control" type="text" name="max_credit">
                                <!-- <select name="package_plan" class="form-control" id="package_plan">
                                    <option value="0">select from list</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="0">Custom Plan</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="price">Per Company Price</label>
                                <input type="text" required="required" class="form-control" placeholder="Enter Price" name="price" id="price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url("Credit_package/Edit_package"); ?>">
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Credit Package</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <input type="hidden" name="id" id="e_id">
                            <div class="form-group">
                                <label for="package_plan">Minimum Credit</label>
                                <input class="form-control" type="number" name="min_credit" id="edit_min">
                                <!-- <select name="package_plan" class="form-control" id="package_plan">
                                    <option value="0">select from list</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="0">Custom Plan</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="package_plan">Maximum Credit</label>
                                <input class="form-control" type="text" name="max_credit" id="edit_max">
                                <!-- <select name="package_plan" class="form-control" id="package_plan">
                                    <option value="0">select from list</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="0">Custom Plan</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label for="price">Credit Package</label>
                                <input type="text" required="required" class="form-control" placeholder="Enter Price" name="price" id="e_price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="e_description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="docDeletePopup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Delete Credit Package</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="<?= base_url("Credit_package/package_delete"); ?>">
                        <div class="card-body">
                            <input type="hidden" name="id" id="statuschanfge">
                            <div class="row">
                                <p>Are you sure you want to delete this Site?</p>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
</div>

<script type="text/javascript">
    function addSite() {
        $('#modal-add').modal('show');
    }

    function plan_edit(that) {
        $('#edit_min').val(that.data('min-edit'));
        $('#edit_max').val(that.data('max-edit'));
        $('#e_price').val(that.data('price'));
        $('#e_description').val(that.data('description'));
        $('#e_id').val(that.data('id'));
        $('#modal-edit').modal('show');
    }

    function plan_delete(that) {
        $('#docDeletePopup').modal('show');
        $('#statuschanfge').val(that);
    }
</script>
<script type="text/javascript">
    function getsubindustryDivAjax(id = 1) {
        $.ajax({
            url: "<?php echo base_url() ?>/assessment/getsubindustryByindustry/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $('#subindustryDiv').html(data);
            },
        });
    }
</script>
<?php include('include/footer.php'); ?>