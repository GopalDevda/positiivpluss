<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<!-- select2 css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>

<script src="https://user.positiivplus.io/public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://user.positiivplus.io/public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
<link rel="stylesheet" type="text/css" href="https://user.positiivplus.io/public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css">


<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
   .pac-container {
      z-index: 10000 !important;
   }
</style>
<!-- add site_sub modal -->

<div class="modal fade text-start" id="defaulttt" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Sub-Site</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/brand/sub_site" enctype="multipart/form-data">

               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Site Name</label>

                        <?php foreach ($subsite as $site) { ?>
                           <input type="hidden" placeholder="" name="site_id" id="idd" value="<?php echo $site['id']; ?>" class="form-control">

                           <input type="text" placeholder="" name="site_idd" id="id" value="<?php echo $site['cp_name']; ?>" class="form-control" disabled>

                        <?php
                        } ?>


                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Sub-Site Name</label><span id="nameError" style="color: red;"></span>
                        <input type="text" placeholder="Enter Sub-Site Name" name="sub_site" id="sub_site_name" required="" class="form-control">
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country</label>
                        <select class="form-control select2" id="country_id" name="country" onclick="add(this)" disabled>
                           <option value="">Select Country</option>
                           <?php

                           foreach ($country as $t) {
                           ?>
                              <?php foreach ($subsite as $site) { ?>
                                 <?php if ($site['country_id'] == $t['id']) { ?>
                                    <option value="<?php echo $t['id']; ?>" selected><?php echo $t['name']; ?> </option>


                           <?php }
                              }
                           } ?>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Sub-Site Location</label>
                        <input type="text" class="form-control" name="company_address" id="" placeholder="Enter Sub-Site location" required />
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control select2" name="state_id" id="state_idd" disabled>
                           <option value="">Select State</option>
                           <?php

                           foreach ($stateee as $t) {
                           ?>
                              <?php foreach ($subsite as $site) { ?>
                                 <?php if ($site['state_id'] == $t['id']) { ?>
                                    <option value="<?php echo $t['id']; ?>" selected><?php echo $t['name']; ?></option>
                           <?php }
                              }
                           } ?>
                        </select>
                     </div>
                  </div>
                  <!-- <div class="col-md-6 col-12">
                    <label class="form-label" for="email-id-column">Sub-Site Area</label>
                    <div class="input-group">
                    
                    <input type="number" placeholder="Enter Sub-Site Area" name="building_size" required="" class="form-control">
                    <div class="input-group-text p-0" style="width:150px;">
                        <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("select id,unit_name from unit where status=2");
                        $unit = $query->getResultArray();
                        ?>
                        <select class="form-select shadow-none bg-light border-0" name="unit_id" required="">
                            <option value="0">Select Unit</option>
                            <?php foreach ($unit as $key => $uni) { ?>
                            <option value="<?php echo $uni['id']; ?>" <?= '23' == $uni['id'] ? 'selected' : '' ?>> <?php echo $uni['unit_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
                  </div> -->
                  <!--<div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Sub-Site Type</label>
                        <select class="form-control select2" name="company_type" required="">
                           <option value="">Select Sub-Site Type</option>
                           <?php
                           if ($type) {
                              foreach ($type as $t) {
                           ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name']; ?></option>
                           <?php }
                           } ?>
                        </select>
                     </div>
                  </div> -->

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Site Address</label>
                        <?php foreach ($subsite as $site) { ?>
                           <input type="text" class="form-control" value="<?php echo $site['cp_address']; ?>" name="company_addresss" placeholder="Enter Site Address" disabled />
                        <?php }  ?>

                     </div>
                  </div>

                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label">Property Type</label>
                      <div class="demo-inline-spacing">
                        <div class="form-check form-check-inline mt-1">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="lease_owned"
                            id="inlineRadio1"
                            value="Lease"
                            
                          />
                          <label class="form-check-label" for="inlineRadio1">Lease</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="lease_owned"
                            
                            id="inlineRadio2"
                            value="Owned"
                          />
                          <label class="form-check-label" for="inlineRadio2">Owned</label>
                        </div>
                      </div>
                         <label class="form-label" for="city-column">Lease or Owned</label>
                        <input type="text" id="lease_owned" class="form-control" name="lease_owned" placeholder="Enter Lease or Owned" required /> 
                     </div>
                  </div> -->






                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Branch code </label>
                        <input type="text" placeholder="Enter Branch code" name="branch_code" required="" class="form-control">
                     </div>
                  </div> -->



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
<!-- end site_sub modal -->

<!-- edit sub-site modal -->
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Sub-Site</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/brand/Edit_sub_site" enctype="multipart/form-data">

               <input type="hidden" placeholder="" name="id" id="company_id" class="form-control">

               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Site Name</label>

                        <?php foreach ($subsite as $site) { ?>
                           <input type="hidden" placeholder="" name="site_id" id="idd" value="<?php echo $site['id']; ?>" class="form-control">

                           <input type="text" placeholder="" name="site_idd" id="id" value="<?php echo $site['cp_name']; ?>" class="form-control" disabled>

                        <?php
                        } ?>


                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Sub-Site Name</label>
                        <input type="text" placeholder="Enter Sub-Site Name" name="sub_site" id="sub_site_id" required="" class="form-control">
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country</label>
                        <select class="form-control" id="country_id" name="country" onclick="add(this)" disabled>
                           <option value="">Select Country</option>
                           <?php

                           foreach ($country as $t) {
                           ?>
                              <?php foreach ($subsite as $site) { ?>
                                 <?php if ($site['country_id'] == $t['id']) { ?>
                                    <option value="<?php echo $t['id']; ?>" selected><?php echo $t['name']; ?> </option>


                           <?php }
                              }
                           } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Sub-Site Location</label>
                        <input type="text" class="form-control" name="company_address" id="Address_id" placeholder="Enter Sub-Site Location" required />
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control " name="state_id" id="state_idd" required="" disabled>
                           <?php

                           foreach ($stateee as $t) {
                           ?>
                              <?php foreach ($subsite as $site) { ?>
                                 <?php if ($site['state_id'] == $t['id']) { ?>
                                    <option value="<?php echo $t['id']; ?>" selected><?php echo $t['name']; ?></option>
                           <?php }
                              }
                           } ?>
                        </select>
                     </div>
                  </div>
                  <!--  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Sub-Site Type</label>
                        <select class="form-control select2" name="company_type" id="type_id" required="">
                           <option value="">Select Sub-Site Type</option>
                           <?php
                           if ($type) {
                              foreach ($type as $t) {
                           ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name']; ?></option>
                           <?php }
                           } ?>
                        </select>
                     </div>
                  </div> -->
                  <!--  <div class="col-md-6 col-12">
                    <label class="form-label" for="email-id-column">Sub-Site Area</label>
                    <div class="input-group ">
                    
                    <input type="text" placeholder="Enter Sub-Site Area" name="building_size" id="sub-area" required="" class="form-control">
                    <div class="input-group-text p-0" style="width:150px;">
                        <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("select id,unit_name from unit where status=2");
                        $unit = $query->getResultArray();
                        ?>
                        <select class="form-select shadow-none bg-light border-0" name="unit_id" id="unit_id" required="">
                            <option value="0">Select Unit</option>
                            <?php foreach ($unit as $key => $uni) { ?>
                            <option value="<?php echo $uni['id']; ?>" <?= '23' == $uni['id'] ? 'selected' : '' ?>> <?php echo $uni['unit_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
                  </div> -->
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Site Address</label>
                        <?php foreach ($subsite as $site) { ?>
                           <input type="text" class="form-control" value="<?php echo $site['cp_address']; ?>" name="company_addresss" placeholder="Enter Site Address" disabled />
                        <?php }  ?>
                     </div>
                  </div>
                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label">Property Type</label>
                      <div class="demo-inline-spacing">
                        <div class="form-check form-check-inline mt-1">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="lease_owned"
                            id="inlineRadio11"
                            value="Lease"
                            
                          />
                          <label class="form-check-label" for="inlineRadio11">Lease</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="lease_owned"
                            
                            id="inlineRadio22"
                            value="Owned"
                          />
                          <label class="form-check-label" for="inlineRadio22">Owned</label>
                        </div>
                      </div>
                       <label class="form-label" for="city-column">Lease or Owned</label>
                        <input type="text" id="lease_owned" class="form-control" name="lease_owned" placeholder="Enter Lease or Owned" required /> 
                     </div>
                  </div> -->






                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Branch code </label>
                        <input type="text" placeholder="Enter Branch code" name="branch_code" required="" class="form-control">
                     </div>
                  </div> -->



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

<!-- end edit sub-site modal -->

<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Delete Building</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" action="<?php echo base_url() ?>/brand/sub_site_delete" method="post" enctype="multipart/form-data">
               <div class="row">
                  <input type="hidden" id="del_company_id" name="company_id" />
                  <p>Are you sure you want to delete this Company ?</p>
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

</div>

<!-- end delete modal -->

<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">

                  <h2 class="content-header-title float-start mb-0">Sub-Site List</h2>
                  <div class="breadcrumb-wrapper">

                  </div>
               </div>
            </div>
         </div>
         <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">


               <div class="dropdown">
                  <a href="<?php echo base_url('brand/company_manage') ?>" class="btn btn-primary">Back</a>
                  <button type="button" class="btn btn-primary waves-effect" id="sub_site_pop">
                     <i class="fa-solid fa-plus"></i> Add Sub-Sites
                  </button>




               </div>
            </div>
         </div>

      </div>
      <?php
      $session = session();
      if ($session->get('success')) { ?>
         <script type="text/javaScript">

            var id = '<?= $session->get('success') ?>';
        toastr.success(id, "Success", {

closeButton: !0,

tapToDismiss: !1,

progressBar: !0,

})
        </script>
      <?php } ?>
      <?php
      $session = session();
      if ($session->get('error')) { ?>
         <script type="text/javaScript">

            var id = '<?= $session->get('error') ?>';
        toastr.error(id, "Error", {

closeButton: !0,

tapToDismiss: !1,

progressBar: !0,

})
        </script>
      <?php } ?>
      <div class="content-body">
         <!-- Dashboard Ecommerce Starts -->
         <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">

               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>S No</th>
                           <th>Site Name</th>
                           <th>Sub Site Name</th>
                           <th>Sub Site Location</th>
                           <th>Site Address</th>
                           <th>State/Union Territory</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        if ($sub_site) {
                           $no = 1;
                           foreach ($sub_site as $company) {
                        ?>
                              <tr>
                                 <td><?php echo $no; ?></td>

                                 <?php foreach ($list as $b) { ?>
                                    <?php if ($b['id'] == $company['site_id']) { ?>

                                       <td><?php echo $b['cp_name']; ?></td>



                                 <?php
                                    }
                                 } ?>
                                 <td><?php echo $company['sub_site_name']; ?></td>

                                 <td><?php echo $company['sub_site_address']; ?></td>
                                 <?php foreach ($subsite as $i) { ?>
                                    <td><?php echo $i['cp_address']; ?></td>

                                 <?php
                                 } ?>

                                 <?php foreach ($stateee as $state_id) { ?>
                                    <?php foreach ($subsite as $i) { ?>
                                       <?php if ($state_id['id'] == $i['state_id']) { ?>
                                          <td><?php echo $state_id['name'] ?></td>
                                       <?php }
                                       ?>
                                 <?php
                                    }
                                 } ?>


                                 <td>
                                    <div class="dropdown">
                                       <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                          <!--<i data-feather="more-vertical"></i>-->
                                          <i class="fa-solid fa-ellipsis-vertical"></i>
                                       </button>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docEditePopup" data-name="<?php echo $company['sub_site_name']; ?>" data-type="<?php echo $company['sub_site_type']; ?>" data-address="<?php echo $company['sub_site_address'] ?>" data-state="<?php echo $company['state'] ?>" data-number="<?php echo $company['id']; ?>" data-country="<?php echo $company['country']; ?>" data-lease="<?php echo $company['property_type']; ?>" data-unit="<?php echo $company['sub_site_area']; ?>" data-unit_id="<?php echo $company['unit_id']; ?>" onclick="editCompany(this)">
                                             <i data-feather="edit-2" class="me-50"></i>
                                             <span>Edit</span>
                                          </a>
                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docDeletePopup" data-number="<?php echo $company['id']; ?>" onclick="deleteCompany(this)">
                                             <i data-feather="trash" class="me-50"></i>
                                             <span>Delete</span>
                                          </a>




                                       </div>
                                    </div>
                                 </td>
                              </tr>
                        <?php $no++;
                           }
                        } ?>
                     </tbody>
                  </table>
               </div>
               <!-- Modal to add new user starts-->

               <!-- Modal to add new user Ends-->
            </div>
            <!-- list and filter end -->
         </section>
         <!-- Dashboard Ecommerce ends -->
      </div>
   </div>


   <?= $this->endSection() ?>


   <?= $this->section('script') ?>
   <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

   <script>
      $(document).ready(function() {
         $('input[class="uuuu"]').click(function() {
            if ($(this).prop("checked") == true) {

               $('.uuuu4').removeAttr('disabled');
               console.log("Checkbox is checked.");
            } else if ($(this).prop("checked") == false) {
               $('.uuuu4').attr('disabled', 'disabled');
               console.log("Checkbox is unchecked.");
            }
         });
      });
   </script>


   <script type="text/javascript">
      $("document").ready(function() {
         $('select[name="country_idd"]').on('change', function() {
            var tId = $(this).val();
            // alert(tId);
            if (tId) {
               $.ajax({
                  url: "<?= base_url('/Supplier/country_city/') ?>/" + tId,
                  type: "GET",
                  dataType: "json",
                  success: function(data) {
                     $('select[name="state_id"]').empty();
                     $('select[name="state_id"]').append(
                        '<option value="">Open this select menu</option>');
                     $.each(data, function(key, value) {
                        $('select[name="state_id"]').append('<option value="' +
                           value.id + '">' + value.name +
                           '</option>');
                     })
                  }

               })
            }
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $('#sub_site_name').on('keyup', function() {
            var subSiteName = $(this).val();
            $.ajax({
               url: '<?php echo base_url() ?>/brand/checkSubsiteExists',
               type: 'post',
               data: {
                  sub_site: subSiteName
               },
               dataType: 'json',
               success: function(response) {
                  if (response.exists) {
                     // Show error message
                     $('#nameError').text("sub-site already exists.");
                     $('#submitBtn').prop('disabled', true);
                  } else {
                     $('#submitBtn').prop('disabled', false);
                  }

               },
               error: function() {
                  alert('Error occurred while checking the name.');
               }
            });
         });
         $('#sub_site_name').focus(function() {
            $('#nameError').text('');

         });
      });
   </script>

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
   <!-- select2 -->
   <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
   <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>

   <script>
      $(document).ready(function() {
         $('#example').DataTable();
      });
   </script>
   <!-- END: Page Vendor JS-->

   <script>
      $(document).ready(function() {
         $('select[name="ed"]').on('change', function() {
            var sId = $(this).val();
            $('#r').show();
            $('#rr').show();
            $('#rrr').show();
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $('#sub_site_pop').on('click', function() {
            var input = document.getElementById("supplier_address");
            var autocomplete = new google.maps.places.Autocomplete(input);
            $('#defaulttt').modal('show');
         });
      });
   </script>

   <script>
      const btn = document.querySelector('#btn');
      const radioButtons = document.querySelectorAll('input[name="lease_owned"]');
      btn.addEventListener("click", () => {
         let selectedSize;
         for (const radioButton of radioButtons) {
            if (radioButton.checked) {
               selectedSize = radioButton.value;
               break;
            }
         }
         // show the output:
         output.innerText = selectedSize ? `You selected ${selectedSize}` : `You haven't selected any size`;
      });
   </script>

   <script>
      function editCompany(that) {

         var id = $(that).attr("data-number");

         var name = $(that).attr("data-name");

         var type = $(that).attr("data-type");

         var address = $(that).attr("data-address");

         var country_id = $(that).attr("data-country");
         var state = $(that).attr("data-state");

         var unit_id = $(that).attr("data-unit");
         var unit = $(that).attr("data-unit_id");

         var lease_ownedd = $(that).attr("data-lease");


         $("#company_id").val(id);

         $("#sub_site_id").val(name);

         $("#type_id").val(type);

         if (lease_ownedd == 'Lease') {
            $("#inlineRadio11").prop("checked", true);
         }
         if (lease_ownedd == 'Owned') {
            $("#inlineRadio22").prop("checked", true);

         }

         $("#Address_id").val(address);

         $("#country_idd").val(country_id);
         $("#state_idd").val(state);
         $("#sub-area").val(unit_id);
         $("#unit_id").val(unit);

         $('#docEditePopup').modal('show');

      }



      function deleteCompany(that) {

         var id = $(that).attr("data-number");

         $("#del_company_id").val(id);

         $("#docDeletePopup").modal('show');

      }

      function addSub(that) {

         var id = $(that).attr("data-number");
         var site = $(that).attr("data-nu");

         $("#id").val(id);
         $("#idd").val(site);

         $("#defaulttt").modal('show');

      }

      function dele(that) {
         var id = $(that).attr("data-id");
         $("#defau").modal('show');
         $('#ideee').val(id);




      }
   </script>



   <script>
      function setAssessment(assessment_id, date_from, date_to) {

         $("#assessment_id").val(assessment_id);

         $("#date_from").val(date_from);

         $("#date_to").val(date_to);

      }





      function compareWorkplace() {

         var workplaces = new Array();

         var workplace_info = $('input[name="workplace_info"]');

         for (var i = 0; i < workplace_info.length; i++) {

            if (workplace_info[i].checked) {

               workplaces.push(workplace_info[i].value);

            }

         }

         $.ajax({

            type: "POST",

            url: "<?php echo base_url() ?>/brand/compareWorkplace",

            data: ({
               workplaces: workplaces
            }),

            success: function(data) {

               rs = JSON.parse(data);

               var color_arr = ["#C39A4A", "#828282", "blue", "brown", "orange"];

               var workplace_name = "";

               var building = "";

               var building_rh_bar_value = "";

               var company_vehicle = "";

               var company_vehicle_rh_bar_value = "";

               var flight = "";

               var flight_rh_bar_value = "";

               var mobile_fuel = "";

               var mobile_fuel_rh_bar_value = "";

               if (rs.workplace_name) {

                  for (var i = 0; i < rs.workplace_name.length; i++) {

                     if (rs.workplace_name[i]) {

                        workplace_name += "<span><span style='background:" + color_arr[i] + "'></span>" + rs.workplace_name[i] + "</span>";

                     }

                  }

               }

               if (rs.building) {

                  for (var i = 0; i < rs.building.length; i++) {

                     var building_per = 0;

                     if (rs.total_building_footprint && rs.total_building_footprint != 0.00) {

                        building_per = Math.round((rs.building[i] * 100) / rs.total_building_footprint);

                     }

                     if (rs.building[i]) {

                        building += '<div class="progress-bar" role="progressbar" style="width: ' + building_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';

                        building_rh_bar_value += '<span>' + rs.building[i] + ' tonne CO2e</span><br>';

                     } else {

                        building += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';

                        building_rh_bar_value += '<span>0 tonne CO2e</span><br>';

                     }

                  }

               }

               if (rs.company_vehicle) {

                  for (var i = 0; i < rs.company_vehicle.length; i++) {

                     var company_vehicle_per = 0;

                     if (rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint != 0.00) {

                        company_vehicle_per = Math.floor((rs.company_vehicle[i] * 100) / rs.total_company_vehicle_footprint);

                     }

                     if (rs.company_vehicle[i]) {

                        company_vehicle += '<div class="progress-bar" role="progressbar" style="width: ' + company_vehicle_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';

                        company_vehicle_rh_bar_value += '<span>' + rs.company_vehicle[i] + ' tonne CO2e</span><br>';

                     } else {

                        company_vehicle += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';

                        company_vehicle_rh_bar_value += '<span>0 tonne CO2e</span><br>';

                     }

                  }

               }

               if (rs.flight) {

                  for (var i = 0; i < rs.flight.length; i++) {

                     var flight_per = 0;

                     if (rs.total_flight_footprint && rs.total_flight_footprint != 0.00) {

                        flight_per = Math.floor((rs.flight[i] * 100) / rs.total_flight_footprint);

                     }

                     if (rs.flight[i]) {

                        flight += '<div class="progress-bar" role="progressbar" style="width: ' + flight_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';

                        flight_rh_bar_value += '<span>' + rs.flight[i] + ' tonne CO2e</span><br>';

                     } else {

                        flight += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';

                        flight_rh_bar_value += '<span>0 tonne CO2e</span><br>';

                     }

                  }

               }

               if (rs.mobile_fuel) {

                  for (var i = 0; i < rs.mobile_fuel.length; i++) {

                     var mobile_fuel_per = 0;

                     if (rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint != 0.00) {

                        mobile_fuel_per = Math.floor((rs.mobile_fuel[i] * 100) / rs.total_mobile_fuel_footprint);

                     }

                     if (rs.mobile_fuel[i]) {

                        mobile_fuel += '<div class="progress-bar" role="progressbar" style="width: ' + mobile_fuel_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';

                        mobile_fuel_rh_bar_value += '<span>' + rs.mobile_fuel[i] + ' tonne CO2e</span><br>';

                     } else {

                        mobile_fuel += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';

                        mobile_fuel_rh_bar_value += '<span>0 tonne CO2e</span><br>';

                     }

                  }

               }

               $("#show_workplace").html(workplace_name);

               $("#building_progress").html(building);

               $("#building_rh_bar_value").html(building_rh_bar_value);

               $("#flight_progress").html(flight);

               $("#flight_rh_bar_value").html(flight_rh_bar_value);

               $("#company_vehicle_progress").html(company_vehicle);

               $("#company_vehicle_rh_bar_value").html(company_vehicle_rh_bar_value);

               $("#mobile_fuel_progress").html(mobile_fuel);

               $("#mobile_fuel_rh_bar_value").html(mobile_fuel_rh_bar_value);

               $("#docComparePopup").modal('show');

            }

         });

      }
   </script>

   <?= $this->endSection() ?>