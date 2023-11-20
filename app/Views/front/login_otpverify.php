<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>OTP  - Positiivplus</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- END: Custom CSS-->

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
                <div class="w-100 d-lg-flex"><img class="img-fluid" src="<?php echo base_url('public/utopiic/assets/app-assets/images/banner/otpBg.jpg')?>" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <div class="text-center login_logo">
                        <img class="" src="<?php echo base_url('public/utopiic/assets/app-assets/images/logo/logo1.png')?>" alt="">
                        <h2 class="card-title step_title">Welcome</h2>
                        <!-- <p class="text-center mb-3">Enter the verification code generated on your email in <?= $email ?>.</p> -->
                    </div>
                    <div class="mini-logo text-center my-3">
                        <h4 class="card-title mt-3">Login Otp Verification</h4>
                      

                    </div>
                      <!-- <div id="timer" class="alert alert-success" style="display: none;"></div> -->

                   <!--  <?php  $session = session();  if($session->get('success')){?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                        <strong>Success!</strong> <?php echo $session->get('success');?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?> -->
                    
                   <!--  <?php  $session = session();  if($session->get('error')){?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                        <strong>ERROR!</strong> <?php echo $session->get('error');?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?> -->
                    <form id="myform"  class="auth-login-form" method="POST" action="<?php echo base_url();?>/SupplierAuth/login_otpverify"  autocomplete="off">
                      <div class="row">
                      <div class="input-group input-group-merge col-6">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" class="form-control" name="otp" id="otp" placeholder="verification code">
                      </div>
                      <input type="hidden" class="form-control" name="plan_id" value="<?php echo $plan_id; ?>" placeholder="Enter The Verification Code">
                      <input type="hidden" class="form-control" name="supplier_id" value="<?php echo $supplier_id; ?>" placeholder="verification code">



                      <div class="text-center mt-2">
                        <button type="submit"class="btn btn-primary w-20 fw-bolder" tabindex="4">VERIFY</button>
                       <!--  <button class="btn btn-info w-20 fw-bolder resend_otp" id="timer"  data-email="<?php echo $email; ?>" data-id="<?php echo $plan_id; ?>" tabindex="4">Resend otp</button> -->
                      </div>
                     
                    </div>
                    </form>
                </div>
               </div> 
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->

    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
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


<!-- <script type="text/javascript">
  var seconds = 1000 * 60; //1000 = 1 second in JS


var timer;

//When a key is pressed in the text area, update the timer using myFunction

function myFunction() {

  // $(".resend_otp").html('disabled');

   if(seconds == 60000)
     timer = setInterval(myFunction, 1000)
   seconds -= 1000;
   document.getElementById("timer").innerHTML = '' + seconds/1000;
   if (seconds <= 0) {
       clearInterval(timer);
       window.reload();
   }
} //If seconds are equal or greater than 0, countdown until 1 minute has passed
//Else, clear the timer and alert user of how many words they type per minute

document.getElementById("timer").innerHTML= "Resend Otp";


</script> -->

<script>
// just for the demos, avoids form submit
$(document).ready(function() {
    $('.resend_otp').click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var email = $(this).data("email");
       
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/SupplierAuth/resend_otp",
            data: { id:id,
                email:email,
           },
                success: function(response) {
                

                  if(response == 1){

                    setTimeout(location.reload.bind(location), 40);
                    // alert('otp has been Resend Successfully');
                  }
                  if(response == 0){
                    alert('Press again Resend OTP');
                    }

                
            }

        })
    });
});
</script>
<script>

$( "#myform" ).validate({
  rules: {
    
    otp: {
      required: true,
      minlength:4,
      maxlength:6,
       digits: true
    },
   
  },
  messages: {

    otp: {
      required: 'Please enter your number',
      minlength: 'Please enter 4 digits',
      maxlength: 'Please enter 10 digits',
     
    },
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