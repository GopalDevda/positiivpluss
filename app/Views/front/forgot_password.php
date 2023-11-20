
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
  <p id="ttttt" value=""></p>
<div class="page step login forgot m-0">

<div class="left_content right_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="step_content">                    
                    <div class="step_title"><br>Forgot Password</div>  
                    <!-- <p class="rohittt"></p>    -->
        <div class="alert alert-success alert-dismissible fade show rohittt" style="display:none;" role="alert" style="padding: 0.71rem 1rem">
            <strong>Success!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         <div class="alert alert-danger alert-dismissible fade show errorr" style="display:none;" role="alert" style="padding: 0.71rem 1rem">
            <strong>Error!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>            
                    
                    <div class="single_q">
                        <div class="q_title">
                            Please enter your registerd email address, We will send you new password.
                        </div>
                        <!-- <form class="single_radio line_break" action="<?php echo base_url() ?>/Supplier/forgot_password2">  -->
                        <!-- <input type="text" name="id" id="id" value="">                            -->
                            <div class="single_q" id="hide">                                
                                <div class="field">
                                    <input type="email" name="email" id="email" placeholder="Registerd Email">
                                </div>
                            </div> 
<!--                        <input type="email" name="email" id="email" value="<?php $user_id; ?>" placeholder="Registerd Email">
 -->
                            <div class="single_q" id="show" style="display:none;">                                
                                <div class="field">
                                    <input type="text" name="otp" id="otp" placeholder="Enter Otp">
                                    <input type="hidden" name="otp" class="emailsss" id="emailss" placeholder="Enter Otp">
                                </div>
                            </div>  
                            <div class="single_q" id="chide" style="display:none;">                                
                                <div class="field">
                                    <input type="password" name="password" id="password" placeholder="enter Password">
                                    <input type="hidden" name="password" class="jjj" id="yyyy" value="" placeholder="enter Password">

                                </div>
                            </div> 
                            

                            <div class="single_q" id="fhide" style="display:none;">                                
                                <div class="field">
                                    <input type="password" name="cpassword" id="cpassword" placeholder="confirm Password">
                                </div>
                            </div>                           
                            <div class="single_q">
                                <div class="form_field join_btn btn_link golden_btn">
                                 <button class="btn-btn-primary"  id="rohit">Submit</button>   
                                 <button class="btn-btn-primary" id="aaa" style="display:none;">Submit</button>   
                                 <button class="btn-btn-primary" id="btns" style="display:none;">Resend Otp</button>   
                                    <!-- <input type="button" value="Submit" data-toggle="modal" data-target="#myModal2"> -->
                                 <button class="btn-btn-primary" id="confirm" style="display:none;">Submit</button>   

                                </div>
                                <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">                                            
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="done">
                                                    <img src="assets/images/done.gif">
                                                </div>
                                                <div class="done_msg">All Done. Please check your email</div>
                                                We have sent a new password to your registered email.
                                            </div>                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>                            
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <!-- </form> -->
                    </div>
                    <div class="login_bottom_line">
                        Return to <a href="<?php echo base_url() ?>/home/user_login">Login</a>
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>
</div>

</div>



    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- END: Page JS-->

    
   <script type="text/javascript">

$(document).ready(function() {

    $('#rohit').click(function(){

      var email = $("#email").val(); 
      
       $('#show').show(); 
       $('#aaa').show(); 
       $('#btns').show(); 
       $('#hide').hide(); 
        $('#rohit').hide();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Supplier/forgot_password2",
            data: { 

                email:email,
           },
                
                success: function(response) {
                  $("#emailss").val(response);

                    $('.rohittt').show(); 
                    $(".rohittt").text('OTP send successfully');
            
       
            }    
    
    });

    });

 });



</script>


 <script type="text/javascript">

$(document).ready(function() {

    $('#aaa').click(function(){
      var email = $("#email").val(); 

      var otp = $("#otp").val(); 
      
   // alert(otp);   


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Supplier/otpverify",
            data: { 
                email:email,

                otp:otp,
           },
                
                success: function(response) {
                  
       // alert(response);
       $('#yyyy').val(response); 
      $('#show').hide(); 
       $('#aaa').hide(); 
       $('#btns').hide();        
       $('#confirm').show();
       $('#chide').show();
       $('#fhide').show();
            }    
    
    });

    });

 });
</script>



<script type="text/javascript">

$(document).ready(function() {

    $('#btns').click(function(){
      var email = $(".emailsss").val(); 

      var otp = $("#otp").val(); 
      // alert(email);
      $('#show').show(); 
       $('#aaa').show(); 
       $('#btns').show(); 
       $('#hide').hide(); 
        $('#rohit').hide();
   // alert(otp);   


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Supplier/resendotp",
            data: { 
                email:email,
                otp:otp,
           },
                
                success: function(response) {

                    $('.rohittt').show(); 
                    $(".rohittt").text('OTP Resend successfully');
            
       
            }    
    
    });

    });

 });
</script>
 <script type="text/javascript">

$(document).ready(function() {

    $('#confirm').click(function(){

      var pass = $("#password").val(); 
      var cpass = $("#cpassword").val();
      var id  = $(".jjj").val();
      // alert(id);
      
      


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Supplier/confirm_password",
            data: { 

                pass:pass,
                cpass:cpass,
                id,id

           },
                
                success: function(response) {
            
      
               $(".rohittt").show(); 
                $(".rohittt").text("password Update successfully");

            }    
    
    });

    });

 });
</script>
  </body>
  

</html>