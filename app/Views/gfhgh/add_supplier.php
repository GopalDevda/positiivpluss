<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<!-- select2 css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
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
<!-- add building modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Supplier</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Suppliers_Model/createSupplier" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Supplier Name</label>
                        <input type="text" placeholder="Enter Supplier Name" name="name" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country </label>
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
                        <label class="form-label" for="email-id-column">Supplier Code</label>
                        <input type="number" placeholder="Enter Supplier Code" name="supplier_code" required="" class="form-control">
                     </div>
                  </div>
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control select2" name="state_id" id="state_id" required="">
                           <option value="">Select State</option>
                           
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Supplier Type</label>
                        <select class="form-control select2" name="supplier_type" required="">
                           <option value="">Select Supplier Type</option>
                           <?php
                           if($type) {
                           foreach($type as $t) {
                           ?>
                           <option value="<?php echo $t['id']; ?>" ><?php echo $t['type_name']; ?></option>
                           <?php } } ?>
                           
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Supplier Address</label>
                        <input type="text" class="form-control" name="supplier_address" id="" placeholder="Supplier Address" required />
                     </div>
                  </div>
                  
                  
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Supplier Industry</label>
                        <input type="text" placeholder="Enter Supplier Industry" name="supplier_industry" required="" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12 d-none">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Pincode</label>
                        <input type="number" placeholder="Enter Pincode" name="add_pincode" value="456010" required="" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Email</label>
                        <input type="email" placeholder="Enter Email" name="add_email"  required="" class="form-control">
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
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Supplier</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Suppliers_Model/editSupplier" enctype="multipart/form-data">
               <input type="hidden" name="supplier_id" id="supplier_id">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Supplier Name</label>
                        <input type="text" placeholder="Enter Supplier Name" name="name" id="name" required=""  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Country </label>
                        <select class="form-control select2" id="country_idd" name="country_idd" onclick="add(this)" readonly>
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
                        <label class="form-label" for="email-id-column">Supplier Code</label>
                        <input type="number" placeholder="Enter Supplier Code" name="supplier_code" id="supplier_code" required="" class="form-control">
                     </div>
                  </div>
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">State/Union Territory</label>
                        <select class="form-control select2" name="state_id" id="state_idd" readonly>
                           <option value="">Select State</option>
                           <?php
                           if($stateee) {
                           foreach($stateee as $t) {
                           ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                           <?php }} ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Supplier Type</label>
                        <select class="form-control select2" name="supplier_type" id="supplier_type" required="">
                           <option value="">Select Supplier Type</option>
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
                        <label class="form-label" for="city-column">Supplier Address</label>
                        <input type="text" class="form-control" name="supplier_address" id="supplier_address" placeholder="Supplier Address" required />
                     </div>
                  </div>
                  
                  
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Supplier Industry</label>
                        <input type="text" placeholder="Enter Supplier Industry" name="supplier_industry" id="supplier_industry" required="" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12 d-none">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Pincode</label>
                        <input type="number" placeholder="Enter Pincode" name="edit_pincode" id="edit_pincode" required="" class="form-control">
                     </div>
                  </div>
                   <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Email</label>
                        <input type="email" placeholder="Enter Email" name="edit_email" id="edit_email"  required="" class="form-control">
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
<!-- edit building modal -->
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
            <form class="form" action="<?php echo base_url() ?>/Suppliers_Model/deleteSupplier" method="post" enctype="multipart/form-data">
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
               <h2 class="content-header-title float-start mb-0">Supplier List</h2>
               <div class="breadcrumb-wrapper">
               </div>
            </div>
         </div>
      </div>
      <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
         <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
               <button type="button" class="btn btn-primary waves-effect" id="hhhh">
               <i class="fa-solid fa-plus"></i> Add Supplier
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
            
            <div class="card-body card-datatable table-responsive pt-0">
               <table class="table table-bordered" id="example">
                  <thead class="table-light">
                     <tr>
                        <th>#</th>
                        <th>Supplier Name</th>
                        <th>Supplier Code</th>
                        <th>Supplier Type</th>
                        <th>Supplier Address</th>
                        <th>State/Union Territory</th>
                        <th>Country</th>
                        <th>Supplier Industry</th>
                        <!-- <th>Pincode</th> -->
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no=1;
                     foreach($list as $company){?>
                     <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $company['name']; ?></td>
                        <td><?php echo $company['supplier_code']; ?></td>
                        <td>
                           <?php foreach($type as $state){?>
                           <?php if($company['supplier_type'] == $state['id']){?>
                           <?php echo $state['type_name']; ?>
                           
                           <?php
                           } }?>
                           
                        </td>
                        <td><?php echo $company['supplier_address']; ?></td>
                        <td>
                           <?php foreach($stateee as $state){?>
                           <?php if($company['state'] == $state['id']){?>
                           <?php echo $state['name']; ?>
                           
                           <?php
                           } }?>
                        </td>
                        <td><?php foreach($country as $countrya){?>
                           <?php if($company['country'] == $countrya['id']){?>
                           <?php echo $countrya['name']; ?>
                           
                           <?php
                           } }?>
                        </td>
                        <td><?php echo $company['supplier_industry']; ?></td>
                        <!-- <td><?php echo $company['pincode']; ?></td> -->
                        
                        <td>
                           <div class="dropdown">
                              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                              <!--<i data-feather="more-vertical"></i>-->
                              <i class="fa-solid fa-ellipsis-vertical"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docEditePopup" data-name="<?php echo $company['name']; ?>"
                                    data-code="<?php echo $company['supplier_code']; ?>" data-type="<?php echo $company['supplier_type']; ?>" data-address="<?php echo $company['supplier_address'] ?>" data-country_id="<?php echo $company['country'] ?>" data-state="<?php echo $company['state'] ?>" data-supplier_industry="<?php echo $company['supplier_industry'] ?>"  data-number="<?php echo $company['id']; ?>" data-pincode="<?php echo $company['pincode']; ?>"data-email="<?php echo $company['email']; ?>" onclick="editCompany(this)">
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
                     <?php
                     }?>
                     
                  </tbody>
               </table>
            </div>
            
         </div>
         <!-- list and filter end -->
      </section>
      <!-- Dashboard Ecommerce ends -->
   </div>
</div>
<div class="modal fade" id="modal-a">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo base_url('Brand/importCsvToDb');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idee" value="">
            <div class="form-group mb-3">
               <div class="mb-3">
                  <input type="file" name="file" class="form-control" id="file">
               </div>
            </div>
            <div class="d-grid">
               <input type="submit" name="submit" value="Upload" class="btn btn-dark"/>
            </div>
         </form>
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
'<option value="">Select State</option>');
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
$('#hhhh').on('click', function() {
var input = document.getElementById("keyword");
var autocomplete = new google.maps.places.Autocomplete(input);
$('#default').modal('show');
});
});
</script>
<script>
function deleteCompany(that)
{
var id = $(that).attr("data-number");
$("#del_company_id").val(id);
$("#docDeletePopup").modal('show');
}
function editCompany(that) {
var id = $(that).attr("data-number");
var name = $(that).attr("data-name");
var code = $(that).attr("data-code");
var type = $(that).attr("data-type");
var pincode = $(that).attr("data-pincode");
var address = $(that).attr("data-address");
var country_id = $(that).attr("data-country_id");
var state = $(that).attr("data-state");
var email = $(that).attr("data-email");
// var input = document.getElementById("supplier_address");
// var autocomplete = new google.maps.places.Autocomplete(input);
var supplier_industry = $(that).attr("data-supplier_industry");
$("#supplier_id").val(id);
$("#name").val(name);
$("#supplier_code").val(code);
$("#supplier_address").val(address);
$("#supplier_type").val(type);
// $("#company_pin").val(pin);
$("#country_idd").val(country_id);
$("#state_idd").val(state);
$("#edit_pincode").val(pincode);
$('select').select2();
$("#supplier_industry").val(supplier_industry);
$("#edit_email").val(email);
$('#docEditePopup').modal('show');
}
</script>
<?= $this->endSection() ?>