<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Brand Details - Positiivplus</title>
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/vendors/css/vendors.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/vendors/css/forms/select/select2.min.css'); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/bootstrap-extended.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/colors.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/components.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/themes/dark-layout.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/themes/bordered-layout.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/themes/semi-dark-layout.min.css');?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/core/menu/menu-types/vertical-menu.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/plugins/forms/form-validation.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/css/pages/authentication.css');?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/assets/css/style.css');?>">
    <!-- END: Custom CSS-->
    <!--select2 style-->
    <style>
        .select2-container--classic .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #262626!important;
            color: #FFF!important;
        }
        .select2-container--classic .select2-results__option--highlighted, .select2-container--default .select2-results__option--highlighted {
            background-color: rgb(222 254 115 / 49%)!important;
            color: #000!important;
        }
        .select2-container--classic.select2-container--open .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #222!important;
            outline: 0;
        }
    </style>
    <!--end select2 style-->
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page" style="background-color: #262626;">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-cover">
            <div class="auth-inner row m-0">
              
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-6 p-0">
                <div class="w-100 d-lg-flex"><img class="img-fluid" src="<?php echo base_url('public/utopiic/assets/app-assets/images/banner/companyBg.jpg')?>" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <div class="text-center login_logo">
                    <img class="" src="<?php echo base_url('public/utopiic/assets/app-assets/images/logo/logo1.png')?>" alt="">
                    <h2 class="card-title step_title">Welcome</h2>
                    <p class="card-text mb-2 q_title">SIGNUP TO CONTINUE</p>
                  </div>
                  <?php  $session = session();  if($session->get('success')){?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                    <strong>Success!</strong> <?php echo $session->get('success');?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php } ?>
                  <?php  $session = session();  if($session->get('error')){?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                    <strong>ERROR!</strong> <?php echo $session->get('error');?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php } ?>
                  
                  <form id="myform"  class="auth-login-form mt-2" method="POST" action="<?php echo base_url();?>/supplier/signupStepSubmit"  autocomplete="off">
                    <input type="hidden" name="supplier_id" value="<?php echo $supplier['supplier_id'];?>" id='supplier_id'>
                    
                    <input type="hidden" name="plan_id" value="<?php echo $plan_id;?>" id='supplier_id'>
                    <div class="mb-1">
                      <label class="form-label login-label" for="name">Company Name</label>
                      <input type="text" name="brand_name" id="name" class="form-control"  placeholder="Enter your company name" >
                    </div>
                      <div class="row">
                    
                    <div class="col-md-6 mb-1">
                      <div class="field">
                        <label class="form-label login-label" for="name"> Select Industry Category Name</label>
                        <select name="industry_category" required="required" id="industry_category" class="form-control">
                          <option value="">Select Industry category Name </option>
                          <?php if(!empty($industry_category)){
                          foreach($industry_category as $i){?>
                          <option value="<?php echo $i['id'];?>"><?php echo $i['industry_category_name'];?></option>
                          <?php }
                          }?>
                        </select>
                        <span id="industryError" style="color: red;font-size: 10px;"></span>
                      </div></div> 

                      <div class="col-md-6 mb-1">
                      <div class="field">
                        <label class="form-label login-label" for="name"> Select Industry  Name</label>
                        <select name="industry_id" required="required" id="industry_id" class="form-control">
                          <option value="">Select Industry Name </option>
                         
                        </select>
                        <span id="industryError" style="color: red;font-size: 10px;"></span>
                      </div></div></div>

                      <div class="row">
                        <div class="col-md-6 mb-1">
                          <div class="field">
                            <label class="form-label login-label" for="name"> Select Country</label>
                            <select name="country"  id="country" class="form-control" >
                              <option value="">Select Country </option>
                              <?php if(!empty($country)){
                              foreach($country as $i){?>
                              <option value="<?php echo $i['id'];?>"><?php echo $i['name'];?></option>
                              <?php }
                              }?>
                            </select>
                            <span id="countryError" style="color: red;font-size: 10px;"></span>
                          </div>
                        </div>
                        <div class="col-md-6 mb-1">
                          <div class="field">
                            <label class="form-label login-label" for="name">State/Union Territory</label>
                            <select name="state"  id="state_id" class="form-control">
                              <option value="">Select State </option>
                             
                            </select>
                            <span id="countryError" style="color: red;font-size: 10px;"></span>
                          </div>
                        </div>
                      </div>
                      
                        
                     <div class="mb-2 col-md-12">
                          <div class="field">
                            <label class="form-label login-label" for="name"> Enter Register address</label>
                            
                            <input type="text" name="register_address" id="name" class="form-control"  placeholder="Enter Register address" >
                          </div>
                      </div>

                     <!--  <div class="col-md-6 mb-1">
                          <div class="field">
                            <label class="form-label login-label" for="name"> Enter Website</label>
                            
                            <input type="text" name="website" id="name" class="form-control"  placeholder="Enter Website" >
                          </div>
                      </div> -->
                       

                      <!-- <div class="mb-2 col-md-12">
                        <div class="mb-1">
                          <label class="form-label login-label" for="name"> Description</label>
                          <textarea class="form-control" name="description" id="name" placeholder="Enter Description"></textarea>
                        </div>
                      </div> -->
                      
                      <div class="text-center">
                        <button type="submit"class="btn btn-primary w-50 fw-bolder" tabindex="4">Next</button>
                      </div>
                    </form>
                  </div>
                </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/vendors/js/vendors.min.js');?>"></script>
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js');?>"></script>
    <!--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/core/app-menu.min.js');?>"></script>
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/core/app.min.js');?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/scripts/pages/auth-login.js');?>"></script>
    <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/scripts/forms/form-select2.min.js'); ?>"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
     
      $('#industry_category').on( "change", function() {
    var sId =  $(this).val();
    $.ajax({
                              
                              url: "<?= base_url('Supplier/industry_category')?>/" + sId,
                              
                              type: "GET",
                              
                              dataType: "json",
                              
                              success: function(data) {
                              
                              // alert('uhuh');
                              
                              
                              $('#industry_id').empty();
                              
                              $('#industry_id').append(
                              
                              '<option value="">Select Industry Name</option>');
                              
                              $.each(data, function(key, value) {
                              
                              $('#industry_id').append('<option value="' +
                                 
                                 value.id + '">' + value.industry_name +
                                 
                              '</option>');
                              
                              })
                              }
                              
                              
                              
                              })
      });
    </script>
    <script type="text/javascript">
     
      $('#country').on( "change", function() {
    var sId =  $(this).val();
    $.ajax({
                              
                              url: "<?= base_url('Supplier/country_state')?>/" + sId,
                              
                              type: "GET",
                              
                              dataType: "json",
                              
                              success: function(data) {
                              
                              // alert('uhuh');
                              
                              $('#state_id').empty();
                              
                              $('#state_id').append(
                              
                              '<option value="">Select State</option>');
                              
                              $.each(data, function(key, value) {
                              
                              $('#state_id').append('<option value="' +
                                 
                                 value.id + '">' + value.name +
                                 
                              '</option>');
                              
                              })
                              
                              }
                              
                              
                              
                              })
      });
    </script>


<script>
// just for the demos, avoids form submit

$( "#myform" ).validate({
  rules: {
    description: {
      required: false,
      minlength:10
    },
    website: {
      required: false,
      
    },
    brand_name: {
      required: true,
      minlength:3,
      maxlength:50,
     
    },
    industry_id: {
      required: true,
    },
    country: {
      required: true,
  
    }
  },
  messages: {
    brand_name: {
      required: 'Please enter your Company name'
    },
    description: {
      minlength: 'Please enter your description atleast 10 words',
    },
    
    industry_id: {
     required: 'Please Select Your  country',
    },
    country: {
      required: 'Please Select Your  country'
    }
  },
  submitHandler: function(form) {
   form.submit();
}
});
</script>
    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
    
  </body>
  <!-- END: Body-->

</html>