<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <title>UTOPIIC</title>
      <link rel="apple-touch-icon" href="">
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/utopiic/assets/');?>/icon/icon.jpg">
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
   <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static "  style="background-color:#262626;"data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
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
                     <div class="d-none d-lg-flex col-lg-7 p-0">
                        <div class="w-100 d-lg-flex"><img class="img-fluid" src="<?php echo base_url('public/utopiic/assets/app-assets/images/banner/login_bg.jpg')?>" alt="Login V2"/></div>
                     </div>
                     <!-- /Left Text-->
                     <!-- Login-->
                     <div class="d-flex col-lg-5 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                           <div class="text-center login_logo">
                              <img class="" src="<?php echo base_url('public/utopiic/assets/app-assets/images/logo/logo1.png')?>" alt="">
                              <h2 class="card-title step_title">Welcome</h2>
                              <p class="card-text mb-2 q_title">SIGN IN TO CONTINUE</p>
                           </div>
                           <?php
                           $session = Session();
                           if($session->get('error')){?>
                           <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo $session->get('error');?>
                           </div>
                           <?php } ?>
                           <?php
                           $session = session();
                           
                           
                           if($session->get('success')){?>
                           <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                              <strong>Success!</strong> <?php echo $session->get('success');?>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                           <?php } ?>
                           
                           <form class="auth-login-form mt-2" action="<?php echo base_url();?>/SupplierAuth/login" method="POST" autocomplete="off">
                              <div class="mb-1">
                                 <label class="form-label login-label" for="login-email">Email</label>
                                 <input class="form-control" id="login-email" type="text" name="login-email" placeholder="abc@example.com" aria-describedby="login-email" autofocus="" tabindex="1"/>
                              </div>
                              <div class="mb-1">
                                 <div class="d-flex justify-content-between">
                                    <label class="form-label login-label" for="login-password">Password</label>
                                    <a href="<?php echo base_url();?>/Supplier/forgot_password"><small>Forgot Password?</small></a>
                                 </div>
                                 <div class="input-group input-group-merge form-password-toggle">
                                    <input class="form-control form-control-merge" id="login-password" type="password" name="login-password" placeholder="············" aria-describedby="login-password" tabindex="2"/><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                 </div>
                              </div>
                              <div class="mb-1">
                                 <div class="form-check">
                                    <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3"/>
                                    <label class="form-check-label" for="remember-me"> Remember Me</label>
                                 </div>
                              </div>
                              <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
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
      <!-- BEGIN Vendor JS-->
      <!-- BEGIN: Page Vendor JS-->
      <script src="<?php echo base_url('public/utopiic/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js');?>"></script>
      <!-- END: Page Vendor JS-->
      <!-- BEGIN: Theme JS-->
      <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/core/app-menu.min.js');?>"></script>
      <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/core/app.min.js');?>"></script>
      <!-- END: Theme JS-->
      <!-- BEGIN: Page JS-->
      <script src="<?php echo base_url('public/utopiic/assets/app-assets/js/scripts/pages/auth-login.js');?>"></script>
      <!-- END: Page JS-->
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