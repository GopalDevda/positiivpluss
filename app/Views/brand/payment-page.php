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
                  <h2 class="content-header-title float-start mb-0">Payment</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
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
   <!-- basic custom options -->
   <div class="row">
      <!-- custom option radio -->
      <div class="col-md-6">
          <div class="col-lg-12">
             <div class="card">
                <div class="card-header">
                   <h4 class="card-title">Subscription</h4>
                </div>
                <div class="card-body">
                   <div class="row custom-options-checkable g-1">
                      
                          <div class="col-md-6">
                            <small class="mb-2">Register User</small>
                            <h2 class="mb-2 fw-bolder">3</h2>
                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light">Manage User</button>
                          </div>
                          <div class="col-md-6">
                            <small class="mb-2">Renewal Date</small>
                            <h2 class="mb-2 fw-bolder">03 jun 2022</h2>
                          </div>
                      
                      <hr class="mt-2">
                      <button type="button" class="btn btn-outline-danger waves-effect">Cancel Subscription</button>
                   </div>
                </div>
             </div>
          </div>
          <!-- custom option checkbox -->
          <div class="col-lg-12">
             <div class="card">
                <div class="card-header">
                   <h4 class="card-title">Payment Detail</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        <div class="col-md-12">
                            <p class="mb-0">You are on the annual billing plan Rs.2000
                             charged on jun 03,2022</p>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-1">Payment Method</p>
                            <h4 class="mb-1 fw-bolder">Credit Card</h4>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Change Billing Preferences</button>
                        </div>
                    </div>
                </div>
             </div>
          </div>
      </div>
   
   
    <div class="col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Billing Contact</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        <div class="col-md-12">
                            <p class="mb-0">Name</p>
                            <h4 class="mb-1 fw-bolder">Gaurva Sharma</h4>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0">Email</p>
                            <h4 class="mb-1 fw-bolder">abc@gmail.com</h4>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0">Company Name</p>
                            <h4 class="mb-1 fw-bolder">xyz</h4>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0">Billing Address</p>
                            <h4 class="mb-1 fw-bolder">Ujjain</h4>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Update Billing Contact</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- checkbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Billing History</h4>
                </div>
                <div class="card-body">
                    <div class="row custom-options-checkable g-1">
                        <div class="col-md-12">
                            <p class="mb-1">Next Change</p>
                            <h6 class="mb-1 fw-bolder">3 june 2022</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <!-- / custom options with icons -->
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

