<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- add employee modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Employee</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <!--  -->
         <div class="modal-body">
            <form method="post" action="<?php echo base_url() ?>/workforces/createemployee" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Emp Id</label>
                        <input type="text" class="form-control" placeholder="Enter Emp Id" name="Emp_Id" required="" maxlength="20">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Employee Name</label>
                        <input type="text" class="form-control" placeholder="Enter Emp Name" name="emp_name" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter Email Address" name="email_address" id="email_address" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Contact Number</label>
                        <input type="number" class="form-control" placeholder="Enter Contact Number" name="contact_number" id="contact_number" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Access Type</label>
                        <select name="role_id" id="supplier_role_id" required="required" class="form-control">
                           <option value="">Select Access Type</option>
                           <?php
                           if ($role) {

                              // print_r($role);
                              // die;
                              foreach ($role as $rol) {

                                 if (session()->supplier_info['role'] == 0) {
                           ?>
                                    <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                                    <?php
                                 } elseif (session()->supplier_info['role'] == 10) {
                                    if ($rol["id"] == 10) {
                                    } else {
                                    ?>
                                       <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                                    <?php
                                    }
                                 } elseif (session()->supplier_info['role'] == 11) {
                                    if ($rol["id"] == 10 || $rol["id"] == 11) {
                                    } else {
                                    ?>
                                       <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                           <?php
                                    }
                                 }
                              }
                           }


                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Position Name</label>
                        <input type="text" class="form-control" placeholder="Enter Position" name="pos_name" required="">
                     </div>
                  </div>


                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Company Department</label>
                        <select name="department_namee" id="employee_roleid" required="required" class="form-control">
                           <option value="">Select Company Department</option>
                           <option value="IT">IT</option>
                           <option value="Accounting and Finance">Accounting and Finance</option>
                           <option value="Human Resources">HR Department</option>
                           <option value="Marketing">Marketing</option>
                           <option value="Production">Production</option>
                           <option value="Research and Development (R&D)">Research and Development (R&D)</option>
                           <option class="yyyyy">Other</option>
                        </select>
                        <!-- <input type="text" name="department_name" id="custom" style="display: none;"> -->
                     </div>
                  </div>
                  <div class="col-md-6 col-12" id="custom" style="display: none;">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Cutom Department</label>
                        <input type="text" class="form-control" placeholder="Enter Department" name="department_name">
                     </div>
                  </div>
               </div>
               <!-- <p class="yyyyy">rrrrrrrr</p> -->
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
               </div>
            </form>
         </div>

      </div>
   </div>
</div>

<!-- end employee modal -->

<!-- edit employee modal -->
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Employee</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/workforces/editemployee" enctype="multipart/form-data">
               <div class="row">
                  <input type="hidden" id="emp_table_id" name="emp_table_id" />
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Emp Id</label>
                        <input type="text" class="form-control" placeholder="Enter employee Id" id="employee_emp_id" name="employee_emp_id" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Employee Name</label>
                        <input type="text" class="form-control" placeholder="Enter employee name" id="employee_name" name="employee_name" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter Email Address" id="employee_email" name="employee_email" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Contact Number</label>
                        <input type="number" class="form-control" placeholder="Enter Contact Number" id="employee_phone_no" name="employee_phone_no" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Access Type</label>
                        <select name="role_id" id="employee_role_access_id" required="required" class="form-control">
                           <option value="">Select Role</option>
                           <?php
                           if ($role) {


                              foreach ($role as $rol) {

                                 if (session()->supplier_info['role'] == 0) {
                           ?>
                                    <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                                    <?php
                                 } elseif (session()->supplier_info['role'] == 10) {
                                    if ($rol["id"] == 10) {
                                    } else {
                                    ?>
                                       <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                                    <?php
                                    }
                                 } elseif (session()->supplier_info['role'] == 11) {
                                    if ($rol["id"] == 10 || $rol["id"] == 11) {
                                    } else {
                                    ?>
                                       <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                           <?php
                                    }
                                 }
                              }
                           }


                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Position Name</label>
                        <input type="text" class="form-control" placeholder="Enter Position" id="employee_pos_name" name="employee_pos_name" required="">
                     </div>
                  </div>

                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Company Department</label>
                        <select name="department_name" id="department_name" required="required" class="form-control">
                           <option value="">Select Company Department</option>
                           <option value="IT">IT</option>
                           <option value="Accounting and Finance">Accounting and Finance</option>
                           <option value="Human Resources">HR Department</option>
                           <option value="Marketing">Marketing</option>
                           <option value="Production">Production</option>
                           <option value="Research and Development (R&D)">Research and Development (R&D)</option>

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
<!-- end edit employee modal -->

<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Delete Employee</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/workforces/deleteemployee" enctype="multipart/form-data">
               <input type="hidden" id="del_employee_id" name="employee_table_id" />
               <h5>Are you sure you want to delete this Employee Permanently ?</h5>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Yes</button>
         </div>
         </form>
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
                  <h2 class="content-header-title float-start mb-0">Workforce</h2>
                  <div class="breadcrumb-wrapper">

                  </div>
               </div>
            </div>
         </div>
         <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
               <div class="dropdown">
                  <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
                     <!-- <button type="button" class="btn btn-primary waves-effect" > -->
                     <i class="fa-solid fa-plus"></i> Add Employee
                  </button>
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
         <!-- Dashboard Ecommerce Starts -->
         <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">

               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Emp Id</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Role</th>
                           <th>Assign By</th>
                           <th>Profile</th>
                           <th>Training</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        if ($employee_details) {
                           $no = 1;
                           foreach ($employee_details as $company_emp) {
                        ?>
                              <tr>
                                 <td>
                                    <?php echo $no++; ?>
                                 </td>
                                 <td>
                                    <?php echo $company_emp['employee_id']; ?>
                                 </td>
                                 <td>
                                    <?php echo $company_emp['name']; ?>
                                 </td>
                                 <td>
                                    <?php echo $company_emp['email']; ?>
                                 </td>
                                 <td>
                                    <?php echo $company_emp['phone_no']; ?>
                                 </td>
                                 <td>
                                    <?php
                                    if ($role) {


                                       foreach ($role as $rol) {
                                          if ($rol['id'] == $company_emp['role_id']) {


                                             echo $rol["supplier_role_name"];
                                          }
                                       }
                                    }



                                    ?>
                                 </td>
                                 <td>
                                    <?php
                                    foreach ($assign_by as $row) {
                                       if ($row['id'] == $company_emp['supplier_info']) {
                                    ?>
                                          <div class="media-body">
                                             <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self"><?php echo $row['supplier_name']; ?></a>
                                             <small class="text-muted">
                                                <?php if ($row['role'] == 0) {
                                                   echo 'Owner';
                                                } elseif ($row['role'] == 10) {
                                                   echo 'Admin';
                                                } elseif ($row['role'] == 11) {
                                                   echo 'Manager';
                                                } ?>
                                             </small>
                                          </div>
                                    <?php
                                       }
                                    }
                                    ?>

                                 </td>


                                 <td>
                                    <div class="<?php echo $company_emp['profile_status'] == 0 ? 'doc_deactive' : 'doc_active' ?> badge badge-light-danger">
                                       <?php
                                       if ($company_emp['profile_status'] == 0) {
                                          echo 'In-complete';
                                       } else {
                                          echo 'complete';
                                       }
                                       ?>

                                    </div>
                                 </td>
                                 <td>
                                    <div class="tooltip56 <?php echo $company_emp['training_taken'] == 0 ? 'doc_deactive' : 'doc_active' ?>">

                                       <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="1. Health &#10004;
                        2. Safety  &#x2714;
                        3. Diversity &#x2718;
                        4. Human Rights   &#x2718;
                        5. Gender Equality &#10008;
                        6. Company Policies &#10008;">
                                          <?php
                                          if ($company_emp['training_taken'] == 0) {
                                             echo 'In-Complete';
                                          } else {
                                             $company_total = '6';
                                             echo $company_emp['training_taken'] . ' / ' . $company_total;
                                          }
                                          ?>
                                       </button>

                                    </div>
                                 </td>
                                 <td>
                                    <div class="dropdown">
                                       <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                          <i data-feather="more-vertical"></i>
                                       </button>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docEditePopup" data-emp_table_id="<?php echo $company_emp['id']; ?>" data-name="<?php echo $company_emp['name']; ?>" data-email="<?php echo $company_emp['email']; ?>" data-employeename="<?php echo $company_emp['pos_name']; ?>" data-department="<?php echo $company_emp['department']; ?>" data-empid="<?php echo $company_emp['employee_id']; ?>" data-phone_no="<?php echo $company_emp['phone_no']; ?>" data-roleid="<?php echo $company_emp['role_id']; ?>" onclick="editemployee(this)">
                                             <i data-feather="edit-2" class="me-50"></i>
                                             <span>Edit</span>
                                          </a>
                                          <a class="dropdown-item" href="#" href="" data-toggle="modal" data-target="#docDeletePopup" data-number="<?php echo $company_emp['id']; ?>" onclick="deleteemployee_id(this)">
                                             <i data-feather="trash" class="me-50"></i>
                                             <span>Delete</span>
                                          </a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                        <?php
                           }
                        }
                        ?>
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
<?= $this->endSection() ?>


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
<script>
   $(document).ready(function() {
      $('#example').DataTable();
   });
</script>

<script>
   $(document).ready(function() {
      $('select[name="department_name"]').on('change', function() {

         var catId = $(this).val();
         if (catId == 'Other') {


            $("#custom").show();
         } else {

            $("#custom").hide();

         }



      })
   });
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
      var roleid = $(that).attr("data-roleid");
      var employeename = $(that).attr("data-employeename");
      var department = $(that).attr("data-department");


      $("#emp_table_id").val(emp_table_id);
      $("#employee_emp_id").val(empid);
      $("#employee_name").val(name);
      $("#employee_phone_no").val(phone_no);
      $("#employee_email").val(email);
      $("#employee_role_access_id").val(roleid);
      $("#employee_pos_name").val(employeename);
      $("#department_name").val(department);

      $('#docEditePopup').modal('show');
   }



   function dtttisabledbuttokn(that) {
      // alert('xjkzdbf');
      $("#disabledbutton").prop('disabled', true);
   }


   function deleteemployee_id(that) {
      var id = $(that).attr("data-number");
      // alert(id);
      $("#del_employee_id").val(id);
      $("#docDeletePopup").modal('show');
   }
</script>

<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>