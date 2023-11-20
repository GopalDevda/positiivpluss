<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<?= $this->endSection();?>

<?= $this->section('content') ?>
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Report</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
               </div>
            </div>
         </div>
		<div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
			<div class="mb-1 breadcrumb-right">
				<div class="dropdown">
					<a href="<?php echo base_url('brand/report_page') ?>" class="btn btn-primary waves-effect">
					<i class="fa-solid fa-plus"></i> Create Report
					</a>
				</div>
			</div>
		</div>
      </div>
      <?php 
         $session = session();
         if($session->get('success')){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('success');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <?php 
         $session = session();
         if($session->get('error')){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('error');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <div class="content-body">
         <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Type</th>
                           <th>Address</th>
                           <th>Country</th>
                           <th>Picture</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
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

<?= $this->endSection(); ?>

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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>

    var input = document.getElementById('company_address');

    var company_address = new google.maps.places.Autocomplete(input);    

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

    

  

    

function showBoundary(that) {

    var boundary_id = $(that).val();

    // alert(boundary_id);

     if(boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {

             $.ajax({

        url : "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/"+boundary_id,

        type: "POST",

        //dataType: "JSON",

        success: function(data){

            $("#subboundary_id").html(data);

        },

        error: function(xhr, status, error){

            $('#indicatorDiv').html('<option value="">No data found </option>');

        }        

    });

        } 

        $.ajax({

        url : "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/"+boundary_id,

        type: "POST",

        //dataType: "JSON",

        success: function(data){

           $("#indicator").html(data);

        },

        error: function(xhr, status, error){

             $('#indicator').html('<option value="">No data found </option>');

        }        

    });

   

}

    

    

</script> 

