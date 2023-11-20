<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login Page - Positiivplus</title>
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/utopiic/assets/app-assets/vendors/css/vendors.min.css');?>">
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

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page" style="background-color: #262626;">
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
                <div class="w-100 d-lg-flex"><img class="img-fluid" src="<?php echo base_url('public/utopiic/assets/app-assets/images/banner/signupBg.jpg')?>" alt="Login V2"/></div>
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
      
                  <form id="myform"  class="auth-login-form mt-2" method="POST" action="<?php echo base_url();?>/SupplierAuth/signuppp"  autocomplete="off">
                    <div class="mb-1">
                      <label class="form-label login-label" for="name">Full Name</label>
                      <input class="form-control" id="" type="text" placeholder="Enter your full name" name="name" id="name" >
                    </div>
                    <div class="mb-1">
                      <label class="form-label login-label" for="email">Email</label>
                      <input type="hidden" name="plan_id"value="<?php echo $_GET['plan_id']; ?>" >
                      <input type="hidden" name="csrf_token"value="<?php echo $_GET['csrf_token']; ?>" >
                      <input class="form-control" type="email" id="email" name="email"  placeholder="Enter your email address"  >
                    </div>
                    
                    <div class="mb-1">
                      <label class="form-label login-label" for="mobile">Mobile Number</label>
                      <input class="form-control" name="mobile" id="mobile" required="required" placeholder="Enter your mobile number" maxlength="10"/>
                    </div>
                    <div class="row"> 
                    <div class="mb-1 col-md-6">
                      <div class="d-flex justify-content-between">
                        <label class="form-label login-label" for="password">Password</label>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge"  type="password" name="password"  id="password" placeholder="Enter Password" minlength="8"/><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>
                    <div class="mb-1 col-md-6">
                      <div class="d-flex justify-content-between">
                        <label class="form-label login-label" for="confirm_password">Confirm Password</label>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="confirm_password" type="password" name="confirm_password" placeholder="Enter Confirm Password" aria-describedby="login-password" tabindex="2"/><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>
                    </div>
                    <div class="mb-1 my-2">
                      <div class="form-check">
                        <input class="form-check-input" id="remember-me" type="checkbox" name="checkbox" tabindex="3"/>
                        <label class="form-check-label" for="remember-me"> I Agree to the <a href="<?php echo base_url(''); ?>/PrivacyPolicy" target="_blank"><b>Privacy policy</b></a> And <a href="<?php echo base_url(''); ?>/TermsCondtions"><b>Terms</b></a> Of Use</label>
                      </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"class="btn btn-primary w-50 fw-bolder" tabindex="4">Next</button>
                    </div>
                  </form>
                  
                  <p class="text-center mt-2"><span>Already have an account?</span><a href="<?php echo base_url() ?>/home/user_login"><span>&nbsp;<b>Login</b></span></a></p>
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
    <!-- END: Page JS-->
<script>
// just for the demos, avoids form submit

$( "#myform" ).validate({
  rules: {
    name: {
      required: true,
      minlength:5
    },
    email: {
      required: true,
      email:true
    },
    mobile: {
      required: true,
      minlength:10,
      maxlength:10,
       digits: true
    },
    password: {
      required: true,
      minlength:4
    },
    confirm_password: {
      required: true,
      minlength:4,
      equalTo:'#password'
    },
    checkbox: {
      required: true
    }
  },
  messages: {
    name: {
      required: 'Please enter your name'
    },
    email: {
      required: 'Please enter your email',
      minlength: 'Please enter valid email'
    },
    number: {
      required: 'Please enter your number',
      minlength: 'Please enter 10 digits',
      maxlength: 'Please enter 10 digits',
     
    },
    password: {
      required: 'Please enter your password',
      minlength: "password must be 4 latter or digits"
    },
    confirm_password: {
      required: 'Please enter your confirm password',
      minlength: 'confirmb password must be 4 latter or digits',
      equalTo: 'password not match'
    },
    checkbox: {
      required: 'Please confirm over policy'
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