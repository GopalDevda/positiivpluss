<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<!-- add Assessment modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Footprint</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Quantitative/control_footprints_submit" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Boundary</label>
                        <select name="boundary" id="boundary" class="form-control select2" required="required " onchange="showBoundary(this);">

                           <option value="0">Select Boundaries </option>
                           <?php
                           if (!empty($boundary_item))
                              foreach ($boundary_item as $dd) { ?>
                              <option value="<?php echo $dd['id']; ?>"><?php echo $dd['item_name']; ?></option>
                           <?php } ?>

                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Select Sub Boundary</label>
                        <select class="form-control select2" id="subboundary_id" name="sub_boundary" onchange="getQuestionByIndicatorAjax(this);">
                           <option value="0">Select Sub Boundary</option>
                           <?php
                           if (!empty($indicator)) {
                              foreach ($indicator as $indi) {
                           ?>
                                 <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                           <?php }
                           } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Select Ghg_category</label>
                        <select class="form-control select2" id="indicator" name="ghg[]" multiple="multiple">
                           <option value="0">Select Ghg_category</option>
                           <?php
                           if (!empty($ghg_name)) {
                              foreach ($ghg_name as $ghg) {
                           ?>
                                 <option value="<?php echo $ghg['id'] ?>"><?php echo $ghg['ghg_name'] ?></option>
                           <?php
                              }
                           }
                           ?>

                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Assigned to</label>
                        <select class="form-control select2" name="assigned_to" id="id_select2_example" required='required'>
                           <option value="0">Select Assigned to </option>
                           <?php if (!empty($employee_details)) {
                              foreach ($employee_details as $empd) {
                                 if ($empd['id'] == session()->supplier_info['supplier_id']) {
                           ?>
                                    <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                    <?php } else {
                                    if ($empd['image']) { ?>

                                       <option data-img_src="<?php echo site_url() . "public/profilimg/" . $empd['image'] ?>" value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?>
                                       <?php } else { ?>
                                       <option data-img_src="<?php echo site_url() . "public/profilimg/defaultimage.jpg" ?>" value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?>

                                       <?php }
                                    if ($empd['role'] == 10) {
                                       echo "Admin";
                                    } elseif ($empd['role'] == 11) {
                                       echo "Manager";
                                    } elseif ($empd['role'] == 0) {
                                       echo "Owner";
                                    } elseif ($empd['role'] == 12) {
                                       echo "Emploee";
                                    } else {
                                       echo "Supplier";
                                    }
                                       ?>

                                       </option>
                              <?php
                                 }
                              }
                           }
                              ?>
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
                        <select class="form-control select2" id="repeating" name="repeating">
                           <option value="1">one-time</option>
                           <option value="2">recurring</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 col-12" style='display:none;' id='frequency'>
                     <div class="mb-1">
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio1" value="Yearly" checked />
                              <label class="form-check-label" for="inlineRadio1">Yearly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio2" value="Half yearly" />
                              <label class="form-check-label" for="inlineRadio2">Half yearly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio3" value="Quarterly" />
                              <label class="form-check-label" for="inlineRadio3">Quarterly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio4" value="Monthly" />
                              <label class="form-check-label" for="inlineRadio4">Monthly</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Comment</label>
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
                        <select class="form-control select2" class="" name="priority">
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
            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- end Assessment modal -->
<!-- edit footprint -->
<div class="modal fade text-start" id="default-edit" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit footprint</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Quantitative/control_footprint_update" enctype="multipart/form-data">
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
                        <label class="form-label" for="last-name-column">Select Sub Boundary</label>
                        <input type="text" class='form-control' id='edit_sub_boundary' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Select Ghg</label>
                        <input type="text" class='form-control' id='edit_ghg' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Assigned to</label>
                        <select class="form-control select2" name="assigned_to" id='edit_assigned_to ' required='required'>
                           <option value="0">Select Assigned to </option>
                           <?php if (!empty($employee_details)) {
                              foreach ($employee_details as $empd) {
                                 if ($empd['id'] == session()->supplier_info['supplier_id']) {
                           ?>
                                    <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                 <?php } else { ?>
                                    <option value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?></option>
                           <?php
                                 }
                              }
                           }
                           ?>
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
<!-- end -->
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Footprints</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
               </div>
            </div>
         </div>
      </div>
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
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Indicators</h4>
                     </div>
                     <div class="card-body">
                        <div id="echartBar1" style="height: 300px;"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="row">
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color"><?= $total_footprint; ?></h3>
                                 <span class="text-white">Total</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                    <i class="fa-brands fa-affiliatetheme"></i> </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color">0</h3>
                                 <span class="text-white">Scope 1</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                    <i class="fa-brands fa-product-hunt"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color">0</h3>
                                 <span class="text-white">Scope 2</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                    <i class="fa-solid fa-location-dot"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color">0</h3>
                                 <span class="text-white">Scope 3</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                    <i class="fa-solid fa-users"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
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
                     if ($roleAllow) {
                        if ($roleAllow['add'] == 1) { ?>
                           <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
                              <i class="fa-solid fa-plus"></i> Add
                           </button>
                     <?php }
                     } ?>

                  </div>
               </div>
            </div>
         </div>
         <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <!-- <th>Boundary</th> -->
                           <th>SubBoundary</th>
                           <th>Assign from</th>
                           <!-- <th>Duration</th> -->
                           <th>Status</th>
                           <th>Assigned</th>
                           <th>Date and Time</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($control_footprints as $key => $row) { ?>
                           <tr>
                              <td><?= ++$key; ?>
                                 <span class="badge rounded-pill badge-light-primary"><?php echo $row['uniq_spl'] ?></span>
                              </td>
                              <td><?php
                                    if (!empty($ghg)) {
                                       foreach ($ghg as $dd) {
                                          echo $dd['id'] == $row['ghg'] ? $dd['ghg_name'] : '';
                                       }
                                    }
                                    ?>
                              </td>
                              <!-- <td><?php
                                       if (!empty($boundary_item)) {
                                          foreach ($boundary_item as $dd) {
                                             echo $dd['id'] == $row['boundary'] ? $dd['item_name'] : '';
                                          }
                                       } ?>
                               </td> -->
                              <td><?php
                                    if (!empty($sub_boundary_item)) {
                                       foreach ($sub_boundary_item as $dsd) {

                                          echo $dsd['id'] == $row['sub_boundary'] ? $dsd['cp_name'] : '';
                                       }
                                    } ?>
                              </td>

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
                                                         <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image']; ?>" alt="avatar">
                                                      <?php } else { ?>
                                                         <img src="<?= base_url("/") ?>/public/profilimg/defaultimage.jpg" alt="avatar">
                                                      <?php } ?>
                                                   </span><!---->
                                                </a>
                                             </div>
                                             <div class="media-body">
                                                <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                   <?= $dsd['id'] == $row['supplier_id'] ? $dsd['supplier_name'] : ''; ?>
                                                </a>
                                                <small class="text-muted"><?php
                                                                           if ($dsd['role'] == 10) {
                                                                              echo "( Admin )";
                                                                           } elseif ($dsd['role'] == 11) {
                                                                              echo "( Manager )";
                                                                           } elseif ($dsd['role'] == 0) {
                                                                              echo "( Owner )";
                                                                           } elseif ($dsd['role'] == 12) {
                                                                              echo "( Emploee )";
                                                                           } else {
                                                                              echo "( Supplier )";
                                                                           }
                                                                           ?></small>
                                             </div>
                                    <?php }
                                       }
                                    } ?>
                                 </div>
                              </td>
                              <!-- <td>
                              <?php
                              $start = $row['complete'];
                              $date1 = $row['start_date'];
                              $date2 = date("Y-m-d");
                              if ($start % 2 == 0 && $date1 <= $date2) {
                              ?>
                              <?= $row['start_date']; ?> to <?= $row['due_date'] ?>
                              <?php } else { ?>
                              <span class="badge badge-light-primary">Complete</span>
                              <?php } ?>
                           </td> -->
                              <td>
                                 <?php
                                 $start = $row['complete'];
                                 $date1 = $row['start_date'];
                                 $date2 = date("Y-m-d");
                                 if ($start % 2 == 0 && $date1 <= $date2) {
                                 ?>
                                    <span class="badge badge-light-danger">Pending</span>
                                 <?php } else { ?>
                                    <span class="badge badge-light-success">Success</span>
                                 <?php } ?>
                              </td>
                              <td>
                                 <div class="media">
                                    <?php
                                    if (!empty($supplier)) {
                                       foreach ($supplier as $dsd) {
                                          if ($dsd['id'] == $row['assigned_to']) {
                                    ?>
                                             <div class="media-aside align-self-center">
                                                <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                   <span class="b-avatar-img">
                                                      <!-- <img src="<?= base_url("/") ?>/public/uploads/owner/john.jpg" alt="avatar"> -->
                                                      <?php if ($dsd['image']) { ?>
                                                         <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image']; ?>" alt="avatar">
                                                      <?php } else { ?>
                                                         <!-- <p>hello</p> -->
                                                         <img src="<?= base_url("/") ?>/public/profilimg/defaultimage.jpg" alt="avatar">
                                                      <?php } ?>
                                                   </span><!---->
                                                </a>
                                             </div>
                                             <div class="media-body">
                                                <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                   <?= $dsd['id'] == $row['assigned_to'] ? $dsd['supplier_name'] : ''; ?>
                                                </a>
                                                <small class="text-muted"><?php
                                                                           if ($dsd['role'] == 10) {
                                                                              echo "Admin";
                                                                           } elseif ($dsd['role'] == 11) {
                                                                              echo "Manager";
                                                                           } elseif ($dsd['role'] == 12) {
                                                                              echo "Emploee";
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
                                 <div>
                                    <?php if ($row['frequency'] == 'Yearly') {
                                       if ($row['complete'] % 2 == 0) { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php } ?>
                                    <?php } elseif ($row['frequency'] == 'Quarterly') { ?>
                                       <?php $com = number_format($row['complete'] / 2);
                                       if ($com >= 1) {
                                       ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php }
                                       if ($com >= 2) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php }
                                       if ($com >= 3) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                       <?php }
                                       if ($com >= 4) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                       <?php } ?>
                                    <?php } elseif ($row['frequency'] == 'Monthly') { ?>
                                       <?php $com = number_format($row['complete'] / 2);
                                       if ($com >= 1) {
                                       ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php }
                                       if ($com >= 2) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php }
                                       if ($com >= 3) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                       <?php }
                                       if ($com >= 4) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                       <?php }
                                       if ($com >= 5) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;5&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;5&nbsp;</span>
                                       <?php }
                                       if ($com >= 6) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;6&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;6&nbsp;</span>
                                       <?php }
                                       if ($com >= 7) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;7&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;7&nbsp;</span>
                                       <?php }
                                       if ($com >= 8) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;8&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;8&nbsp;</span>
                                       <?php }
                                       if ($com >= 9) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;9&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;9&nbsp;</span>
                                       <?php }
                                       if ($com >= 10) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;10&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;10&nbsp;</span>
                                       <?php }
                                       if ($com >= 11) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;11&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;11&nbsp;</span>
                                       <?php }
                                       if ($com >= 12) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;12&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;12&nbsp;</span>
                                       <?php } ?>
                                    <?php } elseif ($row['frequency'] == 'Half yearly') { ?>
                                       <?php $com = number_format($row['complete'] / 2);
                                       if ($com >= 1) {
                                       ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                       <?php }
                                       if ($com >= 3) { ?>
                                          <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php } else { ?>
                                          <span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                       <?php } ?>
                                    <?php } ?>
                                 </div>
                                 <?php
                                 $start = $row['complete'];
                                 $date1 = $row['start_date'];
                                 $date2 = date("Y-m-d");
                                 if ($start % 2 == 0 && $date1 <= $date2) {
                                 ?>
                                    <?= $row['due_date'] ?>
                                 <?php } else { ?>
                                    <span class="badge badge-light-primary">This session is complete</span>
                                    <div>next start date
                                       <?php
                                       if ($row['frequency'] == 'Yearly') {
                                          echo date('Y-m-d', strtotime($row['start_date'] . ' + 12 months'));
                                       } elseif ($row['frequency'] == 'Half yearly') {
                                          echo date('Y-m-d', strtotime($row['start_date'] . ' + 6 months'));
                                       } elseif ($row['frequency'] == 'Monthly') {
                                          echo date('Y-m-d', strtotime($row['start_date'] . ' + 1 months'));
                                       } elseif ($row['frequency'] == 'Quarterly') {
                                          echo date('Y-m-d', strtotime($row['start_date'] . ' + 4 months'));
                                       }
                                       ?>
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
                                       if ($start % 2 == 0 && $date1 <= $date2) {
                                       ?>
                                          <a class="dropdown-item" href="<?php echo base_url('Quantitative/start_footprint') ?>/<?= $row['id']; ?>">
                                             <i class="fa solid fa-play me-50"></i>
                                             <span>Start</span>
                                          </a>
                                          <?php
                                       } else {
                                          if ($roleAllow) {
                                             if ($roleAllow['view'] == 1) { ?>
                                                <a class="dropdown-item" href="<?php echo base_url('Quantitative/footprint_report') ?>/<?= $row['id']; ?>">
                                                   <i class="fa solid fa-eye me-50"></i>
                                                   <span>View Result</span>
                                                </a>
                                             <?php }
                                          }
                                       }
                                       if ($roleAllow) {
                                          if ($roleAllow['edit'] == 1) { ?>
                                             <a class="dropdown-item edit-model-button" href="#" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-ghg="<?= $row['ghg'] ?>" data-comment="<?= $row['comment'] ?>" data-frequency="<?= $row['frequency'] ?>" data-assigned_to="<?= $row['assigned_to'] ?>" data-sub_boundary="<?= $row['sub_boundary'] ?>" data-due_date="<?= $row['due_date'] ?>" data-priority="<?= $row['priority'] ?>" data-boundary="<?= $row['boundary'] ?>">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                             </a>
                                          <?php }
                                       }
                                       if ($roleAllow) {
                                          if ($roleAllow['delete'] == 1) { ?>
                                             <a class="dropdown-item" href="<?= base_url('Quantitative/deleteFootprint') . "/" . $row['id']; ?>" onclick="return confirm('Are you show delete this?');">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                             </a>
                                       <?php }
                                       } ?>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        <?php } ?>
                        <!-- <tr>
                            <td>2</td>
                            <td>Name</td>
                            <td>Building</td>
                            <td>Head office</td>
                            <td>01-02-2022 to 30-04-2022</td>
                            <td><span class="badge badge-light-success">Success</span></td>
                            <td>minal</td>
                            <td>22-03-2022</td>
                            <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                      <i class="fa solid fa-play me-50"></i>
                                      <span>Start</span>
                                    </a>
                                    <?php
                                    if ($roleAllow) {
                                       if ($roleAllow['view'] == 1) { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('Quantitative/footprint_report') ?>">
                                      <i class="fa solid fa-eye me-50"></i>
                                      <span>View Result</span>
                                    </a>
                                    <?php }
                                    } ?>
                                    <a class="dropdown-item" href="#">
                                      <i data-feather="edit-2" class="me-50"></i>
                                      <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                      <i data-feather="trash" class="me-50"></i>
                                      <span>Delete</span>
                                    </a>
                                  </div>
                                </div>
                            </td>
                        </tr> -->
                     </tbody>
                  </table>
               </div>
               <!-- Modal to add new user starts-->
               <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                  <div class="modal-dialog">
                     <form class="add-new-user modal-content pt-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                           <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                              <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" name="user-fullname" />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-uname">Username</label>
                              <input type="text" id="basic-icon-default-uname" class="form-control dt-uname" placeholder="Web Developer" name="user-name" />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-email">Email</label>
                              <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" name="user-email" />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-contact">Contact</label>
                              <input type="text" id="basic-icon-default-contact" class="form-control dt-contact" placeholder="+1 (609) 933-44-22" name="user-contact" />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-company">Company</label>
                              <input type="text" id="basic-icon-default-company" class="form-control dt-contact" placeholder="PIXINVENT" name="user-company" />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="country">Country</label>
                              <select id="country" class="select2 form-select">
                                 <option value="Australia">USA</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Canada">Canada</option>
                                 <option value="China">China</option>
                                 <option value="France">France</option>
                                 <option value="Germany">Germany</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Korea">Korea, Republic of</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Russia">Russian Federation</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="United States">United States</option>
                              </select>
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="user-role">User Role</label>
                              <select id="user-role" class="select2 form-select">
                                 <option value="subscriber">Subscriber</option>
                                 <option value="editor">Editor</option>
                                 <option value="maintainer">Maintainer</option>
                                 <option value="author">Author</option>
                                 <option value="admin">Admin</option>
                              </select>
                           </div>
                           <div class="mb-2">
                              <label class="form-label" for="user-plan">Select Plan</label>
                              <select id="user-plan" class="select2 form-select">
                                 <option value="basic">Basic</option>
                                 <option value="enterprise">Enterprise</option>
                                 <option value="company">Company</option>
                                 <option value="team">Team</option>
                              </select>
                           </div>
                           <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                           <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- Modal to add new user Ends-->
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
<script>
   $(document).ready(function() {
      $('#example').DataTable();
   });
</script>
<!-- END: Page Vendor JS-->

<!-- barchart script-->
<script>
   $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();

      var echartElemBar = document.getElementById("echartBar1");

      if (echartElemBar) {
         var echartBar = echarts.init(echartElemBar);
         echartBar.setOption({
            legend: {
               borderRadius: 0,
               orient: "horizontal",
               x: "right",
               data: ["KgCo2e"],
            },
            grid: {
               left: "8px",
               right: "8px",
               bottom: "0",
               containLabel: true,
            },
            tooltip: {
               show: true,
               backgroundColor: "rgba(0, 0, 0, .8)",
            },
            xAxis: [{
               type: "category",
               data: [
                  "Scope 1",
                  "Scope 2",
                  "Scope 3",
               ],
               axisTick: {
                  alignWithLabel: true,
               },
               splitLine: {
                  show: false,
               },
               axisLine: {
                  show: true,
               },
            }, ],
            yAxis: [{
               type: "value",
               axisLabel: {
                  formatter: "{value}",
               },
               min: 0,
               max: 100000,
               interval: 25000,
               axisLine: {
                  show: false,
               },
               splitLine: {
                  show: true,
                  interval: "auto",
               },
            }, ],
            series: [{
               name: "KgCo2e",
               data: [
                  0000,

               ],
               label: {
                  show: false,
                  color: "#639",
               },
               type: "bar",
               color: "#defe73",
               smooth: true,
               itemStyle: {
                  emphasis: {
                     shadowBlur: 10,
                     shadowOffsetX: 0,
                     shadowOffsetY: -2,
                     shadowColor: "rgba(0, 0, 0, 0.3)",
                  },
               },
            }, ],
         });
         $(window).on("resize", function() {
            setTimeout(function() {
               echartBar.resize();
            }, 500);
         });
      } // Chart in Dashboard version 1

   });
</script>
<!-- end barchart script -->
<script type="text/javascript">
   function custom_template(obj) {
      var data = $(obj.element).data();
      var text = $(obj.element).text();
      if (data && data['img_src']) {
         if (data['img_src']) {
            img_src = data['img_src'];
         }
         // else{
         //    // img_src = <?= base_url("/") ?>/public/profilimg/defaultimage.jpg?>
         //    // img src= <?= base_url("/") ?>/public/profilimg/defaultimage.jpg" alt="avatar">;
         // }
         // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
         template = $("<div class='media'><div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'> <img src=" + img_src + "></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>" + text + "</a></div> ");
         return template;
      }
   }
   var options = {
      'templateSelection': custom_template,
      'templateResult': custom_template,
   }
   $('#id_select2_example').select2(options);
   $('.select2-container--default .select2-selection--single').css({
      'height': '40px'
   });
</script>
<!-- Show Bounday script-->
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

         url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,

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
<!-- end Show Bounday script -->

<script>
   $(document).ready(function() {
      // alert('ygygy');
      $('#repeating').on('change', function() {
         var ok = $(this).val();
         // alert('ygygy');
         if (ok == 2) {
            $('#frequency').show();
         } else {
            $('#frequency').hide();
         }
      });
   });
</script>

<script>
   $(document).ready(function() {
      $('.edit-model-button').on('click', function() {
         id = $(this).attr("data-id");
         boundary = $(this).attr("data-boundary");
         sub_boundary = $(this).attr("data-sub_boundary");
         ghg = $(this).attr("data-ghg");
         assigned_to = $(this).attr("data-assigned_to");
         frequency = $(this).attr("data-frequency");
         comment = $(this).attr("data-comment");
         due_date = $(this).attr("data-due_date");
         priority = $(this).attr("data-priority");
         //  alert(boundary + "/" + sub_boundary + "/" + ghg);
         $.ajax({
            url: "<?= base_url('Quantitative/findDetails') ?>" + "/" + boundary + "/" + sub_boundary + "/" + ghg,
            method: "GET",
            success: function(ok) {
               // alert('ok');
               $('#edit_boundary').val(ok.boundary);
               $('#edit_sub_boundary').val(ok.sub_boundary);
               $('#edit_ghg').val(ok.ghg);

            }
         });

         $("#edit_priority").val(priority);
         $("#edit-comment").html(comment);
         $("#edit-due_date").val(due_date);
         $('#editassessmentid').val(id);
         $('#edit_assigned_to').val(assigned_to);
         if (frequency == '') {
            $('.edit_assessment_radio').html('one-time');
         } else {
            $('.edit_assessment_radio').html(frequency);
         }
         $('#edit_assessment_radio').val(frequency);
         $('#default-edit').modal('show');
      });
   });
</script>


<?= $this->endSection() ?>

<script>
   var input = document.getElementById('company_address');

   var company_address = new google.maps.places.Autocomplete(input);
</script>

<script>
   $('.company_pin').keypress(function() {

      var regExp = /[a-z]/i;

      $('.company_pin').on('keydown keyup', function(e) {

         var value = String.fromCharCode(e.which) || e.key;

         // No letters

         if (regExp.test(value)) {

            e.preventDefault();

            return false;

         }

      });

   });

   function editemployee(that) {

      var emp_table_id = $(that).attr("data-emp_table_id");

      var empid = $(that).attr("data-empid");

      var name = $(that).attr("data-name");

      var phone_no = $(that).attr("data-phone_no");

      var email = $(that).attr("data-email");



      $("#emp_table_id").val(emp_table_id);

      $("#employee_emp_id").val(empid);

      $("#employee_name").val(name);

      $("#employee_phone_no").val(phone_no);

      $("#employee_email").val(email);



      $('#docEditePopup').modal('show');

   }



   function deleteemployee_id(that) {

      var id = $(that).attr("data-number");

      // alert(id);

      $("#del_employee_id").val(id);

      $("#docDeletePopup").modal('show');

   }
</script>