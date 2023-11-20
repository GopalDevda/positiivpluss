<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css') ?>">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- add Assessment modal -->

<!-- demo three -->
<div class="modal fade" id="demo-three" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
        <div class="modal-content">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="modal-header bg-transparent">
                        <h4 class="modal-title" id="myModalLabel1">Add OnSite</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- <h5>Add OnSite</h5> -->
                    <div class="modal-body pb-1 px-sm-1 mx-50">
                        <div class="bs-stepper-content shadow-none p-0">
                            <form class="form" method="post" id="assessment_submit" action="<?php echo base_url() ?>/OnSite/create" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">OnSite</label>
                                            <select name="onsite" class="form-control select2" onchange="OnSite(value);">
                                                <option value="">Select form list</option>
                                                <option value="Single">Single</option>
                                                <option value="Multiple">Multiple</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" id="supplier_hide">
                                        <div class="mb-1">
                                            <label class="form-label" for="last-name-column">Select Supplier</label>
                                            <select class="form-control select2" id="subboundary_id" name="supplier" onchange="OnSitesuppliersingle(value)">
                                                <option value="">Select form list</option>

                                                <?php if (!empty($suppliersType)) foreach ($suppliersType as $indi) echo '<option value="' . $indi['id'] . '">' . $indi['name'] . '</option>'; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" id="Supplier_Type" style="display: none;">
                                        <div class="mb-1">
                                            <label class="form-label" for="last-name-column">Select Supplier Type</label>
                                            <select class="form-control select2" id="supplier_Type" name="supplier1" onchange="OnSitesuppliermulti(value)">
                                                <option value="0">Select Supplier Type</option>
                                                <?php foreach ($supplier_type as $key => $v) { ?>
                                                    <option value="<?= $v['id'] ?>"><?= $v['type_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Select Assessment</label>
                                            <select class="form-control select2" id="supplierAassessment" name="assessment" required>
                                                <option value="0">Select Assessment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" id="AssignId">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Assigned to</label>
                                            <!-- id_select2_example -->
                                            <select id="" style="width: 200px;" class="form-control select2" name="assigned_to" required='required'>
                                                <option value="0">Select Assigned to </option>
                                                <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                                <?php if (!empty($employee_details)) {
                                                    foreach ($employee_details as $empd) {
                                                        if ($empd['id'] == session()->supplier_info['supplier_id']) {
                                                        } else { ?>

                                                            <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $empd['id'] ?>">

                                                                <?php echo $empd['supplier_name'];

                                                                echo "(Auditor)";

                                                                ?>
                                                            </option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Comment</label><span style="color: red;font-size:20px;">*</span>
                                            <textarea placeholder="" class="form-control" name="comment" id="comment" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Due Date</label>
                                            <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Priority</label>
                                            <select class="form-control select2" name="priority" required="required">
                                                <option value="Low">Low</option>
                                                <option value="medium">medium</option>
                                                <option value="High">High</option>
                                                <option value="Critical">Critical</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-1">
                                    <!-- <button type="reset" class="btn btn-outline-secondary waves-effect me-2">Reset</button> -->
                                    <button class="btn btn-primary" style="float: right;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>
</div>
<!-- /demo-->
<!-- edit Assessment modal -->
<div class="modal fade text-start" id="default-edit" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit Assessment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?php echo base_url() ?>/Controlwork/control_assessment_update" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Boundary</label>
                                <input type="hidden" name='id' value="" id="editassessmentid">
                                <input type="text" class='form-control' id='edit_boundary' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="last-name-column">Select Supplier</label>
                                <input type="text" class='form-control' id='edit_sub_boundary' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Select Assessment</label>
                                <input type="text" class='form-control' id='edit_indicator' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Assigned to</label>
                                <select class="form-control select2" name="assigned_to" id='edit_assigned_to' required='required'>
                                    <option value="0">Select Assigned to </option>
                                    <?php if (!empty($employee_details)) {
                                        foreach ($employee_details as $empd) {
                                            if ($empd['id'] == session()->supplier_info['supplier_id']) { ?>
                                                <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                            <?php } else { ?>
                                                <option value="<?= $empd['id'] ?>"><?= $empd['supplier_name'] ?></option>
                                    <?php
                                            }
                                        }
                                    } ?>
                                    <!--<option value="Sales">Self</option>-->
                                    <!--<option value="Govind">Govind</option>-->
                                    <!--<option value="Nisha">Nisha</option>-->
                                    <!--<option value="Vedika">Vedika</option>-->
                                    <!--<option value="Charu">Charu</option>-->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Frequency</label>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline mt-1">
                                        <input class="form-check-input " type="radio" name="frequency" id="edit_assessment_radio" value="" checked />
                                        <label class="form-check-label edit_assessment_radio" for="edit-inlineRadio1"></label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio2" value="Half yearly" />
                           <label class="form-check-label" for="edit-inlineRadio2">Half yearly</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio3" value="Quarterly" />
                           <label class="form-check-label" for="edit-inlineRadio3">Quarterly</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio4" value="Monthly" />
                           <label class="form-check-label" for="edit-inlineRadio4">Monthly</label>
                        </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Comment</label>
                                <textarea placeholder="" class="form-control" name="comment" id="edit-comment" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Due Date</label>
                                <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="edit-due_date" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Priority</label>
                                <select class="form-control " id='edit_priority' name="priority">
                                    <option value="1">Low</option>
                                    <option value="2">Mediun </option>
                                    <option value="3">High</option>
                                    <option value="Critical">Critical</option>

                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Delete OnSite</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo base_url() ?>/OnSite/Delete" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="del_onsite_id" name="id" />
                        <p>Are you sure you want to delete this OnSite ?</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                <!-- <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- end delete modal -->
<!-- end edit Assessment modal -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">


        <?php
        $session = session();
        if ($session->get('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                <strong>Success!</strong> <?php echo $session->get('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php
        $session = session();
        if ($session->get('error')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                <strong>Success!</strong> <?php echo $session->get('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="content-body">

            <section id="basic-horizontal-layouts">


            </section>
            <!-- Dashboard Ecommerce Starts -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"></h2>
                            <div class="breadcrumb-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <?php
                            // if ($roleAllow) {
                            //     if ($roleAllow['add'] == 1) { 
                            ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#demo-three">
                                <i class="fa-solid fa-plus"></i> Add OnSite
                            </button>
                            <?php
                            // }
                            // } 
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <section class="app-user-list">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body card-datatable table-responsive pt-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item me-3">
                                <a class="nav-link active" id="home-tab1" data-bs-toggle="tab" href="#home1" aria-controls="home1" role="tab" aria-selected="true"> Pending & Ongoing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab1" data-bs-toggle="tab" href="#profile1" aria-controls="profile1" role="tab" aria-selected="false">Completed</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" aria-labelledby="home-tab1" role="tabpanel">
                                <table class="table table-bordered" id="example">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>OnSite</th>
                                            <th>Supplier</th>
                                            <th>Assessment</th>
                                            <th>Assigned</th>
                                            <th>Comment</th>
                                            <th>Due Date</th>
                                            <th>Created Date</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($list as $key => $v) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $v['onsite'] ?></td>
                                                <td><?php if ($v['onsite'] == "Multiple") {
                                                        foreach ($supplier_type as $value) {
                                                            if ($v['supplier'] == $value['id']) {
                                                                echo $value['type_name'];
                                                                break;
                                                            }
                                                        }
                                                    } else {
                                                        foreach ($suppliersType as $value) {
                                                            if ($v['supplier'] == $value['id']) {
                                                                echo $value['name'];
                                                                break;
                                                            }
                                                        }
                                                    }
                                                    $v['supplier'] ?></td>
                                                <td><?= $v['assessment'] ?></td>
                                                <td><?php
                                                    foreach ($supplier as $value) {
                                                        if ($value['id'] == $v['assigned_to']) {
                                                            echo $value['supplier_name'];

                                                            break;
                                                        }
                                                    }
                                                    echo '(Auditor)';

                                                    ?>
                                                </td>
                                                <td><?= $v['comment'] ?></td>
                                                <td><?= $v['due_date'] ?></td>
                                                <td><?= $v['created_at'] ?></td>
                                                <td><?= $v['priority'] ?></td>
                                                <td>
                                                    <?php if ($role == 15) { ?>
                                                        <a class="dropdown-item" href="<?= base_url('OnSite/assessmentreport_check/') . '/' . $v['id'] ?>">
                                                            <i class="fa solid fa-plus me-50"></i>
                                                        </a>
                                                    <?php    } else {
                                                    ?>
                                                        <?php if ($v['supplier_id'] == $v['assigned_to']) { ?>
                                                            <a class="dropdown-item" href="<?= base_url('OnSite/assessmentreport_check/') . '/' . $v['id'] ?>">
                                                                <i class="fa solid fa-plus me-50"></i>
                                                            </a>
                                                        <?php
                                                        } ?>
                                                        <a class="dropdown-item" onclick="delete_site(<?= $v['id'] ?>);">
                                                            <i class="fa solid fa-trash me-50"></i>
                                                        <?php  }
                                                        ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="profile1" aria-labelledby="profile-tab1" role="tabpanel">
                                <table class="table table-bordered" id="example">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>

                                            <th>Boundary</th>
                                            <th>SubBoundary</th>
                                            <th>Assign from</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Assigned</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($final_data)) {
                                            foreach ($final_data as $key => $row) {



                                        ?>
                                                <tr>
                                                    <td><?= ++$key;
                                                        if ($row['boundary'] == '43') {
                                                            echo ' <span class="badge rounded-pill badge-light-primary">multiple</span>';
                                                        } else { ?>

                                                            <span class="badge rounded-pill badge-light-primary"><?php echo $row['uniq_spl'] ?></span>
                                                        <?php
                                                        } ?>
                                                    </td>

                                                    <td><?php
                                                        if (!empty($boundary_item)) {
                                                            foreach ($boundary_item as $dd) {
                                                                echo $dd['id'] == $row['boundary'] ? $dd['item_name'] : '';
                                                            }
                                                        } ?></td>
                                                    <td><?php
                                                        if ($row['boundary'] != '43') {
                                                            if (!empty($sub_boundary_item)) {
                                                                foreach ($sub_boundary_item as $dsd) {

                                                                    echo $dsd['id'] == $row['sub_boundary'] ? $dsd['cp_name'] : '';
                                                                }
                                                            }
                                                        } else {
                                                            if (!empty($type)) {
                                                                foreach ($type as $dsda) {

                                                                    echo $dsda['id'] == $row['sub_boundary'] ? $dsda['type_name'] : '';
                                                                }
                                                            }
                                                        } ?></td>
                                                    <td>
                                                        <div class="media">
                                                            <?php
                                                            if (!empty($supplier)) {
                                                                foreach ($supplier as $dsd) {
                                                                    if ($dsd['id'] == $row['supplier_id']) {
                                                            ?>
                                                                        <div class="media-aside align-self-center">
                                                                            <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                                                <span class="b-avatar-img">
                                                                                    <?php if ($dsd['image']) { ?>
                                                                                        <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image'];  ?>" alt="avatar">
                                                                                    <?php } else { ?>
                                                                                        <img src="<?= base_url("/") ?>/public/profilimg/download.png" alt="avatar">
                                                                                    <?php } ?></span><!---->
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                                                <?= $dsd['id'] == $row['supplier_id'] ? $dsd['supplier_name'] : ''; ?>
                                                                            </a>
                                                                            <small class="text-muted">
                                                                                <?php
                                                                                if ($dsd['role'] == 10) {
                                                                                    echo "Admin";
                                                                                } elseif ($dsd['role'] == 11) {
                                                                                    echo "Manager";
                                                                                } elseif ($dsd['role'] == 0) {
                                                                                    echo "Owner";
                                                                                } elseif ($dsd['role'] == 12) {
                                                                                    echo "Employee";
                                                                                } else {
                                                                                    echo "Supplier";
                                                                                }
                                                                                ?></small>
                                                                        </div>
                                                            <?php }
                                                                }
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <?= $row['start_date']; ?> to <?= $row['due_date'] ?>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-primary">Complete</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <span class="badge badge-light-danger">Pending</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-success">Success</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php
                                                        if ($row['boundary'] == '43') {
                                                            echo '<span class="badge rounded-pill badge-light-primary">multiple</span>';
                                                        } else { ?>
                                                            <div class="media">
                                                                <?php
                                                                if (!empty($supplier)) {
                                                                    foreach ($supplier as $dsd) {
                                                                        if ($dsd['id'] == $row['assigned_to']) { ?>
                                                                            <div class="media-aside align-self-center">
                                                                                <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                                                    <span class="b-avatar-img">
                                                                                        <?php if ($dsd['image']) { ?>
                                                                                            <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image'];  ?>" alt="avatar">
                                                                                        <?php } else { ?>
                                                                                            <img src="<?= base_url("/") ?>/public/profilimg/download.png" alt="avatar">
                                                                                        <?php } ?>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                                                    <?= $dsd['id'] == $row['assigned_to'] ? $dsd['supplier_name'] : ''; ?>
                                                                                </a>
                                                                                <small class="text-muted">
                                                                                    <?php
                                                                                    if ($dsd['role'] == 10) {
                                                                                        echo "Admin";
                                                                                    } elseif ($dsd['role'] == 11) {
                                                                                        echo "Manager";
                                                                                    } elseif ($dsd['role'] == 12) {
                                                                                        echo "Employee";
                                                                                    } else {
                                                                                        echo "Supplier";
                                                                                    }
                                                                                    ?></small>
                                                                            </div>
                                                                <?php }
                                                                    }
                                                                } ?>
                                                            </div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <?php if ($row['frequency'] == 'Yearly') {
                                                                if ($row['complete'] == 12) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } elseif ($row['frequency'] == 'Quarterly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 3) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 6) {
                                                                    $com = 2; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } elseif ($com == 9) {
                                                                    $com = 3; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                                <?php } elseif ($com == 12) {
                                                                    $com = 4; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                                <?php }
                                                            } elseif ($row['frequency'] == 'Monthly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 1) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 2) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } elseif ($com == 3) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                                <?php } elseif ($com == 4) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                                <?php } elseif ($com == 5) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;5&nbsp;</span>
                                                                <?php } elseif ($com == 6) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;6&nbsp;</span>
                                                                <?php } elseif ($com == 7) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;7&nbsp;</span>
                                                                <?php } elseif ($com == 8) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;8&nbsp;</span>
                                                                <?php } elseif ($com == 9) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;9&nbsp;</span>
                                                                <?php } elseif ($com == 10) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;10&nbsp;</span>
                                                                <?php } elseif ($com == 11) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;11&nbsp;</span>
                                                                <?php } elseif ($com == 12) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;12&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } elseif ($row['frequency'] == 'Half yearly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 6) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 12) {
                                                                    $com = 2; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <?= $row['due_date'] ?>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-primary">This session is complete</span>
                                                            <div><?= $row['completed_at']; ?>
                                                            </div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php
                                                                $start = $row['complete'];
                                                                $date1 = $row['start_date'];
                                                                $date2 = date("Y-m-d");
                                                                if ($start == 0) {
                                                                ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>/<?= $row['indicator']; ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Start</span>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_view') ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-eye me-50"></i>
                                                                        <span>View Result</span>
                                                                    </a>
                                                                    <?php

                                                                }
                                                                if ($roleAllow) {
                                                                    if ($roleAllow['edit'] == 1) { ?>
                                                                        <a class="dropdown-item edit-model-button" href="#" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-indicator="<?= $row['indicator'] ?>" data-comment="<?= $row['comment'] ?>" data-frequency="<?= $row['frequency'] ?>" data-assigned_to="<?= $row['assigned_to'] ?>" data-sub_boundary="<?= $row['sub_boundary'] ?>" data-due_date="<?= $row['due_date'] ?>" data-priority="<?= $row['priority'] ?>" data-boundary="<?= $row['boundary'] ?>">
                                                                            <i data-feather="edit-2" class="me-50"></i>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                    <?php }
                                                                }
                                                                if ($roleAllow) {
                                                                    if ($roleAllow['delete'] == 1) { ?>
                                                                        <a class="dropdown-item" href="<?= base_url('Controlwork/deleteAssessment') . "/" . $row['id']; ?>" onclick="return confirm('Are you show delete this?');">
                                                                            <i data-feather="trash" class="me-50"></i>
                                                                            <span>Delete</span>
                                                                        </a>
                                                                <?php }
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter end -->
            </section>
            <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js') ?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/nouislider.min.js') ?>"></script>
<script>
    $(function() {
        $('#example').DataTable();
    })

    function delete_site(id) {
        // if (confirm('Are you sure you delete this')) location.href = '<?= site_url('OnSite/Delete/') ?>' + id;
        $('#del_onsite_id').val(id)
        $('#docDeletePopup').modal('show');
    }

    function OnSite(val) {
        var $select = $('#subboundary_id');
        if (val == 'Multiple') {
            // $select.removeClass('js-example-basic-single').addClass('js-example-basic-multiple');
            // $select.prop('multiple', true);
            $('#Supplier_Type').show();
            $('#supplier_hide').hide();
        } else {
            $('#Supplier_Type').hide();
            $('#supplier_hide').show();
            // $select.removeClass('js-example-basic-multiple').addClass('js-example-basic-single');
            // $select.prop('multiple', false);
        }
        // $select.select2({
        //     placeholder: "Select a Supplier",
        //     allowClear: true
        // });
        //  $('#subboundary_id').removeAttr('multiple');
        // else $('#subboundary_id').attr('multiple', 'multiple');
    }

    function OnSitesuppliersingle(value) {
        $.ajax({
            type: "get",
            url: "<?= site_url('OnSite/completesupplier/') ?>",
            data: {
                singledata: value,
            },
            // dataType: "JSON",

            success: function(response) {
                $("#supplierAassessment").html(response);

            }
        });

    }

    function OnSitesuppliermulti(value) {
        $.ajax({
            type: "get",
            url: "<?= site_url('OnSite/completesupplier/') ?>",
            data: {
                multidata: value,
            },
            // dataType: "JSON",

            success: function(response) {
                $("#supplierAassessment").html(response);
            }
        });

    }
</script>
<?= $this->endSection() ?>