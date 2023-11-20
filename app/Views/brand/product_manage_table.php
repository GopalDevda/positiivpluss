<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css');?>">
<?= $this->endSection();?>
<?= $this->section('content') ?>
<!-- add product modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" action="<?php echo base_url(); ?>/brand/createProduct" method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Name</label>
                        <input type="text" id="first-name-column" class="form-control" placeholder="Enter product name" name="product_name" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Type</label>
                        <select class="form-control select2" name="product_type" required="">
                           <option value="">Select Type</option>
                           <?php
                           if($type) {
                           
                           foreach($type as $t) { ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name'] ?></option>
                           <?php
                           }
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Collection</label>
                        <input type="text" id="city-column" class="form-control" placeholder="Enter product collection" name="product_collection" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Weight/Unit</label>
                     <div class="input-group">
                        <input type="number" min="0" id="email-id-column" class="form-control" name="weight" placeholder="Enter Product Weight" required="">
                        <div class="input-group-text p-0" style="width:150px;">
                           <?php
                           $db = \Config\Database::connect();
                           $query = $db->query("select id,unit_name from unit where type=3 order By unit_name Asc");
                           $unit = $query->getResultArray();
                           ?>
                           <select class="form-select shadow-none bg-light border-0" name="unit_id" required="">
                              <option value="0">Select Unit</option>
                              <?php   foreach($unit as $key=>$uni) {?>
                              <option <?php if($uni['id'] == '26'){echo 'selected';}?> value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                              <?php } ?>
                           </select>
                           
                           
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Product Code </label>
                        <input class="form-control" type="text" placeholder="Enter Product Code" name="product_sku" required="">
                     </div>
                  </div>
                  <!--<div class="col-md-6 col-12 d-none">-->
                  <!--   <div class="mb-1">-->
                  <!--      <label class="form-label" for="email-id-column">Product Image </label>-->
                  <!--      <input type="file" id="email-id-column" class="form-control" name="product_image" placeholder="Enter " required="">-->
                  <!--   </div>-->
                  <!--</div>-->
                  <div class="col-md-6 col-12 ">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Product Image </label>
                        <!-- <label for="review-image" class="form-control" id="review-image-label" role="button">Upload file</label> -->
                        <input type="file" class="form-control" id="review-image"  name="product_image"  required="">
                     </div>
                  </div>
                  
                  
                  
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Turnover Contribution- %</label>
                        <input type="number" id="" min="0" class="form-control" name="turnover_contribution" placeholder="Enter Turnover Contribution- %" required>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Product Life</label>
                     <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" placeholder="Enter product life" name="life" required>
                        <div class="input-group-text p-0" style="width:150px;">
                           <select class="form-select shadow-none bg-light border-0" name="lifeunit_id">
                              <option value="0">Select Unit</option>
                              <option value="Day" selected>Day</option>
                              <option value="Month">Month</option>
                              <option value="Year">Year</option>
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
</div>
<!-- end product modal -->
<!-- edit product modal -->
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" action="<?php echo base_url() ?>/brand/editProduct" method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Name</label>
                        <input type="text" class="form-control" placeholder="Enter product name" name="product_name" id="product_name" required="">
                     </div>
                     <input type="hidden" id="product_id" name="product_id" />
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Type</label>
                        <select class="form-control select2" name="product_type" id="product_type" required="">
                           <option value="">Select Type</option>
                           <?php
                           if($type) {
                           
                           foreach($type as $t) {
                           
                           ?>
                           <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name'] ?></option>
                           <?php
                           }
                           
                           }
                           
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Collection</label>
                        <input type="text" class="form-control" placeholder="Enter product collection" name="product_collection" id="product_collection" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Weight/Unit</label>
                     <div class="input-group">
                        <input type="number" class="form-control" min="0" name="weight" id="weight" placeholder="Enter Product Weight" required="">
                        <div class="input-group-text p-0" style="width:150px;">
                           <?php
                           $db = \Config\Database::connect();
                           $query = $db->query("select id,unit_name from unit where type=3 order By unit_name Asc");
                           $unit = $query->getResultArray();
                           ?>
                           <select class="form-select shadow-none bg-light border-0" name="unit_id" id="unit_id" required="">
                              <option value="0">Select Unit</option>
                              <?php   foreach($unit as $key=>$uni) {?>
                              <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="company-column">Product Code </label>
                        <input class="form-control" type="text" placeholder="Enter Product Code" name="product_sku" id="product_sku" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Product Image </label>
                        <input type="file"  class="form-control" name="product_image" placeholder="Enter">
                        <input type="hidden" id="prod_image" class="form-control" name="product_image_i" placeholder="Enter">
                        <img  id="prod_image_show"  width="50" height="50">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="email-id-column">Turnover Contribution- %</label>
                        <input type="number" id="turnover_contribution" class="form-control" name="turnover_contribution" placeholder="Enter Turnover Contribution- %">
                     </div>
                  </div>
                  
                  
                  <div class="col-md-6 col-12">
                     <label class="form-label" for="email-id-column">Product Life </label>
                     <div class="input-group mb-3">
                        
                        <input type="number" class="form-control" name="product_lifse" id="product_life" placeholder="Enter Product Life">
                        <div class="input-group-text p-0" style="width:150px;">
                           
                           <select class="form-select shadow-none bg-light border-0" id="lifeunit_id" name="lifeunit_id">
                              <option value="0">Select Unit</option>
                              <option value="Day">Day</option>
                              <option value="Month">Month</option>
                              
                              <option value="Year">Year</option>
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
</div>
<!-- end edit product modal -->
<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel1">Delete Product</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form class="form" action="<?php echo base_url() ?>/brand/deleteProduct"
            method="post" enctype="multipart/form-data">
            <div class="row">
               <input type="hidden" id="del_product_id" name="product_id" />
               <p>Are you sure you want to delete this Product ?</p>
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
<div class="app-content content ">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
<div class="content-header row">
   <div class="content-header-left col-md-6 col-12 mb-2">
      <div class="row breadcrumbs-top">
         <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Product List</h2>
            <div class="breadcrumb-wrapper">
            </div>
         </div>
      </div>
   </div>
   <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
      <div class="mb-1 breadcrumb-right">
         <div class="dropdown">
            <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
            <i class="fa-solid fa-plus"></i> Add Product
            </button>
            <button class="dt-button create-new btn btn-primary" tabindex="0" type="button"><span>Compare</span></button>
         </div>
      </div>
   </div>
</div>
<?php
$session = session();
if($session->get('success')){?>
<script type="text/javascript">
                  var id = '<?php echo $session->get('success'); ?>';
                  
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
<script type="text/javascript">
                  var id = '<?php echo $session->get('error'); ?>';
                  
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
            <table class="table-bordered table" id="example">
               <thead class="table-light">
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Collection</th>
                     <th>Product Code</th>
                     <th>Images</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  if($list) {
                  $i=1;
                  foreach($list as $product) {
                  ?>
                  <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $product['cp_name']; ?></td>
                     <td><?php echo $product['type_name']; ?></td>
                     <td><?php echo $product['cp_collection'] ?></td>
                     <td><?php echo $product['cp_sku'] ?></td>
                     
                     <td>
                        <?php if($product['cp_image']== Null){ ?>
                        <img class="img-thumbnail" src="<?php echo base_url()."/public/uploads/notfound.jpg" ?>" alt="" width="80" height="80">
                        <?php }else{ ?>
                        <img class="img-thumbnail" src="<?php echo base_url()."/public/uploads/product/".$product['cp_image']; ?>" alt="" width="80" height="80">
                        <?php } ?>
                     </td>
                     <td>
                        <div class="dropdown">
                           <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                           <i data-feather="more-vertical"></i>
                           </button>
                           <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docEditePopup" data-number="<?php echo $product['id']; ?>" data-name="<?php echo $product['cp_name']; ?>" data-type="<?php echo $product['cp_type_id']; ?>" data-collection="<?php echo $product['cp_collection'] ?>" data-unit="<?php echo $product['lifeunit_id'] ?>" data-sku="<?php echo $product['cp_sku']; ?>" data-prod_image="<?php echo $product['cp_image']; ?>" data-weight="<?php echo $product['weight']; ?>" data-unit-id="<?php echo $product['unit_id']; ?>" data-turnover="<?php echo $product['turnover_contribution']; ?>" data-p-life="<?php echo $product['product_life']; ?>" onclick="editProduct(this)">
                                 <i data-feather="edit-2" class="me-50"></i>
                                 <span>Edit</span>
                              </a>
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docDeletePopup" data-number="<?php echo $product['id']; ?>" onclick="deleteProduct(this)">
                                 <i data-feather="trash" class="me-50"></i>
                                 <span>Delete</span>
                              </a>
                           </div>
                        </div>
                     </td>
                  </tr>
                  <?php  $i++;}
                  } ?>
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
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
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
$('.product_unit').keypress(function () {
var regExp = /[a-z]/i;
$('.product_unit').on('keydown keyup', function (e) {
var value = String.fromCharCode(e.which) || e.key;
// No letters
if (regExp.test(value)) {
e.preventDefault();
return false;
}
});
});
function editProduct(that) {
var num = $(that).attr("data-number");
var name = $(that).attr("data-name");
var type = $(that).attr("data-type");
var collection = $(that).attr("data-collection");
var unit = $(that).attr("data-unit");
var sku = $(that).attr("data-sku");
var product_image = $(that).attr("data-prod_image");
var weight = $(that).attr("data-weight");
var unit_id = $(that).attr("data-unit-id");
var turnover = $(that).attr("data-turnover");
var plife = $(that).attr("data-p-life");
// alert(plife);
var img_path = '<?php echo base_url().'/public/uploads/product/' ?>' + product_image;
// alert(img_path);

$("#product_id").val(num);
$("#product_name").val(name);
$("#product_type").val(type);
$("#product_collection").val(collection);
$("#lifeunit_id").val(unit);
$("#product_sku").val(sku);
$("#weight").val(weight);
$("#unit_id").val(unit_id);
$("#turnover_contribution").val(turnover);
$("#product_life").val(plife);
$("#prod_image").attr('src', img_path);
$("#prod_image_show").attr('src', img_path);
$('select').select2();
$("#docEditePopup").modal('show');
}
function deleteProduct(that) {
var id = $(that).attr("data-number");
$("#del_product_id").val(id);
$("#docDeletePopup").modal('show');
}
</script>
<script >
function setAssessment(assessment_id, date_from, date_to) {
$("#assessment_id").val(assessment_id);
$("#date_from").val(date_from);
$("#date_to").val(date_to);
}
function compareProduct() {
var products = new Array();
var prod_info = $('input[name="product_info"]');
for (var i = 0; i < prod_info.length; i++) {
if (prod_info[i].checked) {
products.push(prod_info[i].value);
}
}
$.ajax({
type: "POST",
url: "<?php echo base_url()?>/brand/compareProduct",
data: ({
products: products
}),
success: function (data) {
rs = JSON.parse(data);
var color_arr = ["#262626", "#999A99", "blue", "brown", "orange"];
var product_name = "";
var raw_material = "";
var raw_material_rh_bar_value = "";
var transportation = "";
var transportation_rh_bar_value = "";
var manufacturing = "";
var manufacturing_rh_bar_value = "";
var packaging = "";
var packaging_rh_bar_value = "";
var life = "";
var life_rh_bar_value = "";
if (rs.product_name) {
for (var i = 0; i < rs.product_name.length; i++) {
if (rs.product_name[i]) {
product_name += "<span><span style='background:" + color_arr[i] + "'></span>" + rs.product_name[i] + "</span>";
}
}
}
if (rs.raw_material) {
for (var i = 0; i < rs.raw_material.length; i++) {
var raw_material_per = 0;
if (rs.total_raw_material_footprint && rs.total_raw_material_footprint != 0.00) {
raw_material_per = Math.round((rs.raw_material[i] * 100) / rs.total_raw_material_footprint);
}
if (rs.raw_material[i]) {
raw_material += '<div class="progress-bar" role="progressbar" style="width: ' + raw_material_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
raw_material_rh_bar_value += '<span>' + rs.raw_material[i] + ' tonne CO2e</span><br>';
} else {
raw_material += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
raw_material_rh_bar_value += '<span>0 tonne CO2e</span><br>';
}
}
}
if (rs.transportation) {
for (var i = 0; i < rs.transportation.length; i++) {
var transportation_per = 0;
if (rs.total_transportation_footprint && rs.total_transportation_footprint != 0.00) {
transportation_per = Math.floor((rs.transportation[i] * 100) / rs.total_transportation_footprint);
}
if (rs.transportation[i]) {
transportation += '<div class="progress-bar" role="progressbar" style="width: ' + transportation_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
transportation_rh_bar_value += '<span>' + rs.transportation[i] + ' tonne CO2e</span><br>';
} else {
transportation += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
transportation_rh_bar_value += '<span>0 tonne CO2e</span><br>';
}
}
}
if (rs.manufacturing) {
for (var i = 0; i < rs.manufacturing.length; i++) {
var manufacturing_per = 0;
if (rs.total_manufacturing_footprint && rs.total_manufacturing_footprint != 0.00) {
manufacturing_per = Math.floor((rs.manufacturing[i] * 100) / rs.total_manufacturing_footprint);
}
if (rs.manufacturing[i]) {
manufacturing += '<div class="progress-bar" role="progressbar" style="width: ' + manufacturing_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
manufacturing_rh_bar_value += '<span>' + rs.manufacturing[i] + ' tonne CO2e</span><br>';
} else {
manufacturing += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
manufacturing_rh_bar_value += '<span>0 tonne CO2e</span><br>';
}
}
}
if (rs.packaging) {
for (var i = 0; i < rs.packaging.length; i++) {
var packaging_per = 0;
if (rs.total_packaging_footprint && rs.total_packaging_footprint != 0.00) {
packaging_per = Math.floor((rs.packaging[i] * 100) / rs.total_packaging_footprint);
}
if (rs.packaging[i]) {
packaging += '<div class="progress-bar" role="progressbar" style="width: ' + packaging_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
packaging_rh_bar_value += '<span>' + rs.packaging[i] + ' tonne CO2e</span><br>';
} else {
packaging += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
packaging_rh_bar_value += '<span>0 tonne CO2e</span><br>';
}
}
}
if (rs.end_of_life) {
for (var i = 0; i < rs.end_of_life.length; i++) {
var life_per = 0;
if (rs.total_life_footprint && rs.total_life_footprint != 0.00) {
life_per = Math.floor((rs.end_of_life[i] * 100) / rs.total_life_footprint);
}
if (rs.end_of_life[i]) {
life += '<div class="progress-bar" role="progressbar" style="width: ' + life_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
life_rh_bar_value += '<span>' + rs.end_of_life[i] + ' tonne CO2e</span><br>';
} else {
life += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
life_rh_bar_value += '<span>0 tonne CO2e</span><br>';
}
}
}
$("#show_product").html(product_name);
$("#raw_material_progress").html(raw_material);
$("#raw_material_rh_bar_value").html(raw_material_rh_bar_value);
$("#transportation_progress").html(transportation);
$("#transportation_rh_bar_value").html(transportation_rh_bar_value);
$("#manufacturing_progress").html(manufacturing);
$("#manufacturing_rh_bar_value").html(manufacturing_rh_bar_value);
$("#packaging_progress").html(packaging);
$("#packaging_rh_bar_value").html(packaging_rh_bar_value);
$("#life_progress").html(life);
$("#life_rh_bar_value").html(life_rh_bar_value);
$("#docComparePopup").modal('show');
}
});
}
</script>
<?= $this->endSection() ?>