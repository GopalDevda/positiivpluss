<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<?php    $db = \Config\Database::connect();
header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
  header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">

<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css')?>">

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<!-- add building modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Site</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/brand/createCompany" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Site Name</label>
                        <input type="text" placeholder="Enter Site Name" name="company_name" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country</label>
                        <select class="form-control select2" id="country_id" name="country_idd" onclick="add(this)">
                           <option value="">Select Country</option>
                           <?php
                              if($country) {
                              foreach($country as $t) {
                              ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                           <?php }} ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Site Type</label>
                        <select class="form-control select2" name="company_type" required="">
                           <option value="">Select Site Type</option>
                           <?php
                              if($type) {
                              foreach($type as $t) {
                              ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name']; ?></option>
                           <?php } } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control select2" name="state_id" id="state_id" required="">
                           <option value="">Select the State</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label">Property Type</label>
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input
                                 class="form-check-input"
                                 type="radio"
                                 name="lease_owned"
                                 id="inlineRadio1"
                                 value="Lease" />
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
                        <!-- <label class="form-label" for="city-column">Lease or Owned</label>
                           <input type="text" id="lease_owned" class="form-control" name="lease_owned" placeholder="Enter Lease or Owned" required /> -->
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Site Address</label>
                        <input type="text" class="form-control" name="company_address" id=""  placeholder="Enter Address" required />
                     
                     </div>
                  </div>
                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Pincode</label>
                        <input type="number" class="form-control" name="pincode"   placeholder="Enter Pincode" required />
                     
                     </div>
                  </div>  -->
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Total Workforce</label>
                        <input type="number" placeholder="Enter Total Employees" name="total_employees"  class="form-control">
                     </div>
                  </div>
                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Branch code </label>
                        <input type="text" placeholder="Enter Branch code" name="branch_code" required="" class="form-control">
                     </div>
                     </div> -->
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Site Area</label>
                     <div class="input-group mb-3">
                        <input type="number" placeholder="Enter Site Area" name="building_size"  class="form-control">
                        <div class="input-group-text p-0" style="width:150px;">
                           <?php
                              $db = \Config\Database::connect();
                              $query = $db->query("select id,unit_name from unit where type=2 and status =2");
                              $unit = $query->getResultArray();
                              ?>
                           <select class="form-select shadow-none bg-light border-0" name="unit_id" required="">
                              <option>Select Unit</option>
                              <?php   foreach($unit as $key=>$uni) {?>
                              <option value="<?php echo $uni['id']; ?>" <?= '23'==$uni['id'] ?'selected':''?>> <?php echo $uni['unit_name']; ?></option>
                              <?php } ?>
                           </select>
                        </div>
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
<!-- end building modal --> 
<div class="modal fade text-start" id="defau" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Site</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/brand/electricity" enctype="multipart/form-data">
               <input type="hidden" value="" id="ideee" name="ideee">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Electricity Board</label>
                        <select class="form-control" name="ed">
                           <option value="">Electricity Board</option>
                           <option value="rob">DHBVN</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12" id="r" style="display:none;">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Username</label>
                        <input type="text" placeholder="Enter Username Name" name="username" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12" id="rr" style="display:none;">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Password</label>
                        <input type="text" placeholder="Enter Password" name="password" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="mb-3" id="rrr" style="display:none;">
                     <input  type="checkbox" class="uuuu" id="privacypolicy" >
                     <!--<label class="custom-control-label" for="privacypolicy">I agree to the Terms and Conditions and Privacy Policy</label>-->
                     <label class="custom-control-label" for="privacypolicy">
                     &nbsp;&nbsp;I agree to the
                     <a href="#" target="_blank" style="text-decoration: underline;">Terms of Service</a> and
                     <a href="#" target="_blank" style="text-decoration: underline;">Privacy Policy</a>.
                     </label>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light uuuu4" disabled>Submit</button>
         <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- edit building modal -->
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Site</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/brand/editCompany" enctype="multipart/form-data">
               <input type="hidden" name="company_id" id="company_id">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Site Name</label>
                        <input type="text" placeholder="Enter Site Name" name="company_name" id="company_name" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country </label>
                        <select class="form-control select2" id="country_idd" name="country_idd" onclick="add(this)">
                           <option value="">Select Country</option>
                           <?php
                              if($country) {
                              foreach($country as $t) {
                              ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                           <?php }} ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Site Type</label>
                        <select class="form-control select2" name="company_type" id="company_type" required="">
                           <option value="">Select Site Type</option>
                           <?php
                              if($type) {
                              foreach($type as $t) {
                              ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name']; ?></option>
                           <?php } } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control select2" name="state_id" id="state_iddd" required="">
                           <option value="">Select the State</option>
                          
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label">Property Type</label>
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="lease_owned" id="inlineRadio11" value="Lease"/>
                              <label class="form-check-label" for="inlineRadio11">Lease</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="lease_owned" id="inlineRadio22" value="Owned"/>
                              <label class="form-check-label" for="inlineRadio22">Owned</label>
                           </div>
                        </div>
                        <!-- <label class="form-label" for="city-column">Lease or Owned</label>
                           <input type="text" id="lease_owned" class="form-control" name="lease_owned" placeholder="Enter Lease or Owned" required /> -->
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Site Address</label>
                        <input type="text" class="form-control" name="company_address" id="company_address" placeholder="Enter Address" required />
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Total Workforce</label>
                        <input type="number" placeholder="Enter Total Employees" name="total_employees" id="total_employees" class="form-control">
                     </div>
                  </div>
                  <!-- <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Branch code </label>
                        <input type="text" placeholder="Enter Branch code" name="branch_code" required="" class="form-control">
                     </div>
                     </div> -->
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Site Area</label>
                     <div class="input-group mb-3">
                        <input type="text" placeholder="Enter Site Area" name="building_size" id="building_size"  class="form-control">
                        <div class="input-group-text p-0" >
                           <?php
                              $db = \Config\Database::connect();
                              $query = $db->query("select id,unit_name from unit where type=2 and status =2");
                              $unit = $query->getResultArray();
                              ?>
                           <select class="form-select shadow-none bg-light border-0" name="unit_id" id="unit_iddd">
                              <option value="0">Select Unit</option>
                              <?php   foreach($unit as $key=>$uni) {?>
                              <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                              <?php } ?>
                           </select>
                        </div>
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
<!-- end edit building modal -->
<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Delete Building</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" action="<?php echo base_url() ?>/brand/deleteCompany" method="post" enctype="multipart/form-data">
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
<!-- end delete modal -->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Site List</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
               </div>
            </div>
         </div>
        
         <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
               <div class="dropdown">
                  <button id="hhhh" class="btn btn-primary waves-effect"></i> Add Sites
                  </button>

                  <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#modal-a">
                  <i class="fa fa-plus"></i> Import
                  </button> 

                  

               </div>
            </div>
         </div>
      </div>

                        
                    
      <?php
         $session = session();
         if($session->get('success')){?>
         
        <script type="text/javaScript">
       
        var id = '<?=  $session->get('success')?>';
         toastr.success(id, "Success", {

closeButton: !0,

tapToDismiss: !1,

progressBar: !0,

})
         </script>
      <?php } ?>
      <?php
         $session = session();
         if($session->get('error')){?>
      <script type="text/javaScript">
       
       var id = '<?=  $session->get('error')?>';
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
               <div class="card-body card-datatable table-responsive pt-2 pb-5">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr >
                           <th  style="font-size: 13px;">ID</th>
                           <th style="font-size: 13px;">Site Name</th>
                           <th style="font-size: 13px;">Site Type</th>
                           <th style="font-size: 13px;">Address</th>
                           <th style="font-size: 13px;">State/Union Territory</th>
                           <th style="font-size: 13px;">Country</th>
                           <th style="font-size: 13px;">Sub-site</th>
                           <th style="font-size: 13px;">Action</th>
                        </tr>
                     </thead>
                   
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
                              <input
                                 type="text"
                                 class="form-control dt-full-name"
                                 id="basic-icon-default-fullname"
                                 placeholder="John Doe"
                                 name="user-fullname"
                                 />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-uname">Username</label>
                              <input
                                 type="text"
                                 id="basic-icon-default-uname"
                                 class="form-control dt-uname"
                                 placeholder="Web Developer"
                                 name="user-name"
                                 />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-email">Email</label>
                              <input
                                 type="text"
                                 id="basic-icon-default-email"
                                 class="form-control dt-email"
                                 placeholder="john.doe@example.com"
                                 name="user-email"
                                 />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-contact">Contact</label>
                              <input
                                 type="text"
                                 id="basic-icon-default-contact"
                                 class="form-control dt-contact"
                                 placeholder="+1 (609) 933-44-22"
                                 name="user-contact"
                                 />
                           </div>
                           <div class="mb-1">
                              <label class="form-label" for="basic-icon-default-company">Company</label>
                              <input
                                 type="text"
                                 id="basic-icon-default-company"
                                 class="form-control dt-contact"
                                 placeholder="PIXINVENT"
                                 name="user-company"
                                 />
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
   <div class="modal fade text-start" id="modal-a" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel1">Upload site list</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form class="form" action="<?php echo base_url() ?>/brand/importCsvToDb" method="post" enctype="multipart/form-data">
                  <div class="row d-none">
                     <!--<input type="file" name="file" class="form-control" id="image">-->
                     <label style="color: #c6c6ce;">* Upload an excel spreadsheet here in CSV format</label>
                  </div>
                  <br>
                  <!-- <div class="input-group custom-file-button">
                     <label class="input-group-text" for="review-image" role="button">Choose_file</label>
                     <label for="review-image" class="form-control" id="review-image-label" role="button">Select The File</label>
                     <input type="file" class="d-none" id="review-image" name="file" >
                  </div> -->
                  <div class="input-group custom-file-button">
                     <input type="file" class="form-control" id="review-image" name="file" >
                  </div>
                  <label  style="color: #c6c6ce;">* Upload an excel spreadsheet here in CSV format</label>
                  <div class="modal-footer p-0 pt-1">

                      <a href="https://positiivplus.io/public/sample-Template/Sample template.csv"  classdownload="Template"><button  type="button" 
                        class="btn btn-primary waves-effect"><i class="fa fa-download"></i> Csv Template </button></a>

                     <button type="submit" name="submit"  class="btn btn-primary ms-auto waves-effect waves-float waves-light">Submit</button>
                     <!--<button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>-->
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>
   $(document).ready(function(){
   $('input[class="uuuu"]').click(function(){
   if($(this).prop("checked") == true){
   
   $('.uuuu4').removeAttr('disabled');
   console.log("Checkbox is checked.");
   }
   else if($(this).prop("checked") == false){
   $('.uuuu4').attr('disabled','disabled');
   console.log("Checkbox is unchecked.");
   }
   });
   });
</script>



</script>
<script type="text/javascript">
   $("document").ready(function() {
   $('#hhhh').on('click', function() {
   
    var input = document.getElementById("keyword");
   var autocomplete = new google.maps.places.Autocomplete(input);

        $('#default').modal('show');
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
   url: "<?= base_url('/Supplier/country_city/')?>/" + tId,
   type: "GET",
   dataType: "json",
   success: function(data) {
   $('select[name="state_id"]').empty();
   $('select[name="state_id"]').append(
   '<option value="">Select the State</option>');
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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "ajax": {
            // url: "http://positiivplus.io/brand/get_items/",
            url: "<?php echo base_url()?>/brand/get_items",
            type : 'GET'
        },
        success: function(data){
            console.log(data.result);
        },
    });
});
</script>
// <script>
//   $(document).ready(function() {
//   $('#example').DataTable( {
//     "aLengthMenu": [[100, 500, 1000, -1], [100, 500,1000, "All"]],
//     "pageLength": 100
//     } );
//   });
// </script>
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
   $('.company_pin').keypress (function(){
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
   function editCompany(that) {
   var id = $(that).attr("data-number");
   var name = $(that).attr("data-name");
   var type = $(that).attr("data-type");
   var address = $(that).attr("data-address");
   // var pin = $(that).attr("data-pin");
   var country_id = $(that).attr("data-country_id");
   var state = $(that).attr("data-state");
   var no_of_employee = $(that).attr("data-no_of_employee");
   var building_size = $(that).attr("data-building_size");
   var unit_id = $(that).attr("data-unit-id");
   // alert(state);
   var lease_ownedd = $(that).attr("data-lease_owned");
   //  var input = document.getElementById("company_address");
   // var autocomplete = new google.maps.places.Autocomplete(input);
   $("#company_id").val(id);
   $("#company_name").val(name);
   
   $("#company_type").val(type);
   var inputs = document.getElementById('site_address');
   var trip_froms = new google.maps.places.Autocomplete(inputs);
   
   if(lease_ownedd == 'Lease'){
   $("#inlineRadio11").prop("checked", true);
   }
   if(lease_ownedd == 'Owned'){
   $("#inlineRadio22").prop("checked", true);
   
   }
   // $("#inlineRadio11").val(lease_ownedd);
   // $("#inlineRadio22").val(lease_ownedd);
   
    $("#company_address").val(address);
   // $("#departure").val(address);
   
   $("#state_iddd").val(state);
   // $("#company_pin").val(pin);
   $('#country_idd').val(country_id);
   $("#total_employees").val(no_of_employee);
   $("#building_size").val(building_size);
   $("#unit_iddd").val(unit_id);
   
    $.ajax({
   url: "<?= base_url('/Supplier/country_city/')?>/" + country_id,
   type: "GET",
   dataType: "json",
   success: function(data) {
   $('select[id="state_iddd"]').empty();
   $('select[id="state_iddd"]').append(
   '<option value="">Select the State</option>');
   $.each(data, function(key, value) {
      var state_id = value.id;
      if(state_id == state){
   $('select[id="state_iddd"]').append('<option selected value="' +
      value.id + '">' + value.name +
   '</option>');
   
}else{
   $('select[id="state_iddd"]').append('<option value="' +
      value.id + '">' + value.name +
   '</option>');
}
   })
   
   }
   })


   $('#docEditePopup').modal('show');

   $('select').select2();
   
   }
   
   function deleteCompany(that) 
   {
   var id = $(that).attr("data-number");
   $("#del_company_id").val(id);
   $("#docDeletePopup").modal('show');
   }
   
   function addSub(that) 
   {
   var id = $(that).attr("data-number");
   var site = $(that).attr("data-nu");
   $("#id").val(id);
   $("#idd").val(site);
   $("#defaulttt").modal('show');
   }
   
   function dele(that)
   {
   var id = $(that).attr("data-id");
   $("#defau").modal('show');
   $('#ideee').val(id);
   }
</script>
<script>
   function setAssessment(assessment_id,date_from,date_to) {
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
   url: "<?php echo base_url()?>/brand/compareWorkplace",
   data: ({workplaces : workplaces }),
   success: function(data){
   rs = JSON.parse(data);
   var color_arr = ["#C39A4A","#828282","blue","brown","orange"];
   var workplace_name = "";
   var building = "";
   var building_rh_bar_value = "";
   var company_vehicle = "";
   var company_vehicle_rh_bar_value ="";
   var flight = "";
   var flight_rh_bar_value ="";
   var mobile_fuel = "";
   var mobile_fuel_rh_bar_value ="";
   if(rs.workplace_name) {
   for (var i = 0; i < rs.workplace_name.length; i++) {
   if (rs.workplace_name[i]) {
   workplace_name+="<span><span style='background:"+color_arr[i]+"'></span>"+rs.workplace_name[i]+"</span>";
   }
   }
   }
   if(rs.building) {
   for (var i = 0; i < rs.building.length; i++) {
   var building_per = 0;
   if(rs.total_building_footprint && rs.total_building_footprint!=0.00) {
   building_per = Math.round((rs.building[i]*100)/rs.total_building_footprint);
   }
   if (rs.building[i]) {
   building+='<div class="progress-bar" role="progressbar" style="width: '+building_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   building_rh_bar_value+='<span>'+rs.building[i]+' tonne CO2e</span><br>';
   }
   else {
   building+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   building_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.company_vehicle) {
   for (var i = 0; i < rs.company_vehicle.length; i++) {
   var company_vehicle_per = 0;
   if(rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint!=0.00) {
   company_vehicle_per = Math.floor((rs.company_vehicle[i]*100)/rs.total_company_vehicle_footprint);
   }
   if (rs.company_vehicle[i]) {
   company_vehicle+='<div class="progress-bar" role="progressbar" style="width: '+company_vehicle_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   company_vehicle_rh_bar_value+='<span>'+rs.company_vehicle[i]+' tonne CO2e</span><br>';
   }
   else {
   company_vehicle+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   company_vehicle_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.flight) {
   for (var i = 0; i < rs.flight.length; i++) {
   var flight_per = 0;
   if(rs.total_flight_footprint && rs.total_flight_footprint!=0.00) {
   flight_per = Math.floor((rs.flight[i]*100)/rs.total_flight_footprint);
   }
   if (rs.flight[i]) {
   flight+='<div class="progress-bar" role="progressbar" style="width: '+flight_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   flight_rh_bar_value+='<span>'+rs.flight[i]+' tonne CO2e</span><br>';
   }
   else {
   flight+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   flight_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.mobile_fuel) {
   for (var i = 0; i < rs.mobile_fuel.length; i++) {
   var mobile_fuel_per = 0;
   if(rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint!=0.00) {
   mobile_fuel_per = Math.floor((rs.mobile_fuel[i]*100)/rs.total_mobile_fuel_footprint);
   }
   if (rs.mobile_fuel[i]) {
   mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: '+mobile_fuel_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   mobile_fuel_rh_bar_value+='<span>'+rs.mobile_fuel[i]+' tonne CO2e</span><br>';
   }
   else {
   mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   mobile_fuel_rh_bar_value+='<span>0 tonne CO2e</span><br>';
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