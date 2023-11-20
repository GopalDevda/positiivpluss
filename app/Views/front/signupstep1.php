<!DOCTYPE html>

<html lang="en">

<head>

  <title>UTOPIIC</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo base_url('public/utopiic/assets/');?>/icon/icon.jpg">

  <link rel="stylesheet" href="<?php echo base_url('public/utopiic/assets/'); ?>/css/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">

    .step_title {

        color: #c39a4a;

    }

</style>

<body style="background-color:black;">



<div class="page step login m-0">



<div class="left_content right_content" style="background-color:black ;">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="step_content">                    
                    <div class="login_logo">
                        <a href="index.php"><img src="<?php echo base_url();?>/public/utopiic/assets/images/logo_new.png"></a>
                    </div>
                    <div class="step_title"><br>Welcome</div>               

                    

                    <div class="single_q">

                        <div class="q_title">

                            Signup to continue
                        
                        </div>

                        <form name="singup-frm" class="single_radio line_break" action="<?php echo base_url();?>/supplier/signupStepSubmit" method="post"> 


                        <input type="text" name="supplier_id" value="<?php echo $supplier['supplier_id'];?>" id='supplier_id'>

                            <div class="single_q">                                

                                <div class="field d-flex">

                                    <input type="text" name="brand_name" id="name" required="required" placeholder="Enter your brand name" class="mr-2">

                                    <span id="nameError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div>

                            <div class="single_q">                                

                                <div class="field">

                                <select name="industry_id" required="required" id="industry_id" class="form-control">

                                    <option value="">Select Industry Name </option>

                                <?php if(!empty($industry)){

                                    foreach($industry as $i){?>

                                        <option value="<?php echo $i['id'];?>"><?php echo $i['industry_name'];?></option>

                                    <?php }

                                 }?>                                

                                </select>

                                <span id="industryError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div>

                            <div class="single_q">                                

                                <div class="field">

<!--                                 <input type="text" name="country" required="required" placeholder="Enter country Name" id="country"> -->
                        <select name="country" required="required" id="country" class="form-control">

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

<!--                            <div class="single_q">                                

                                <div class="field">

                                <input type="text" name="state" id="state" required="required" placeholder="Enter State Name">

                                <span id="stateError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div>

                            <div class="single_q">                                

                                <div class="field">

                                <input type="text" name="city" id="city" required="required" placeholder="Enter City Name">

                                <span id="cityError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div> -->

                            <div class="single_q">                                

                                <div class="field">

                                <input type="text" name="website" id="website" required="required" placeholder="Please Enter Website">

                                <span id="websiteError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div>

                            <div class="single_q">                                

                                <div class="field">

                                <input type="text" name="description" id="description" placeholder="Please Enter Description">

                                <span id="descError" style="color: red;font-size: 10px;"></span>

                                </div>

                            </div>                            

                                                       

                            

                            <div class="single_q">

                                <div class="form_field join_btn btn_link golden_btn mt-2">
                                <input type="submit" name="submit" value="Next">
                                </div>

                            </div> 

                        </form>

                    </div>

                    <div class="login_bottom_line text-white">

                        Already have an account? <a href="login.php">Login</a>

                    </div>

                                       

                </div>

            </div>

        </div>

    </div>

</div>



</div>



<script type="text/javascript">

$(document).ready(function() {

    $('#submit').click(function(){

      var name = $("#name").val();  

      var industry_id = $("#industry_id").val();  

      var country = $("#country").val();  

      var state = $("#state").val();  

      var city = $("#city").val();  

      var web = $("#website").val();  

      if(name==''){

        $("#name").css("border-color", "red"); 

        $("#nameError").html('*Please Enter Brand Name');       

        return false;

      }

      if(industry_id==''){

        $("#industry_id").css("border-color", "red"); 

        $("#industry_idError").html('*Please Selecr Industry ');       

         return false;

      }   

      if(country==''){

        $("#country").css("border-color", "red"); 

        $("#countryError").html('*Please Enter Country Name');       

         return false;

      }

      if(state==''){

        $("#state").css("border-color", "red"); 

        $("#stateError").html('*Please Enter State Name');       

        return false;

      }

      if(city==''){

        $("#city").css("border-color", "red"); 

        $("#cityError").html('*Please Enter City Name');       

        return false;

      }

      if(web==''){

        $("#website").css("border-color", "red"); 

        $("#websiteError").html('*Please Enter Website ');       

        return false;

      }

    });

 });