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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


</head>

<style type="text/css">

    .step_title {

        color: #c39a4a;

    }
.single_radio label{color: red !important;}
</style>

<body style="background-color: black;">



<div class="page step login m-0">



<div class="left_content right_content" style="background-color: black;">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="step_content">                    
                    <div class="login_logo">
                        <a href="index.php"><img src="<?php echo base_url();?>/public/utopiic/assets/images/logo_positive_short.png"></a>
                    </div>
                    <div class="step_title"><br>Welcome</div>               

                    

                    <div class="single_q">

                        <div class="q_title">

                            Signup to continue

                        </div>

                        <form name="singup-frm" id="singup_frm" class="single_radio line_break" action="<?php echo base_url();?>/SupplierAuth/signuppp" method="post">                            

                              <div class="single_q">                                

                                <div class="field d-flex">

                                    <input type="text" placeholder="Enter your full name" name="name" id="name" required="required" maxlength="20" minlength="5">

                                </div>
                                    <span id="nameError" style="color: red;font-size: 10px;"></span>

                            </div>

                            <div class="single_q">                                

                                <div class="field">

<input type="hidden" name="plan_id"value="<?php echo $_GET['plan_id']; ?>" >
                                    <input type="email" name="email" required="required" placeholder="Enter your email address"  id="email">

                                </div>
                                    <span id="emailError" style="color: red;font-size: 10px;"></span>

                            </div>

                            <div class="single_q">                                

                                <div class="field">
                                    <input type="text" name="mobile" id="mobile" required="required" placeholder="Enter your mobile number" maxlength="10">

                                </div>
                                    <span id="mobileError" style="color: red;font-size: 10px;"></span>

                            </div>

                            <div class="single_q">                                

                                <div class="field d-flex form_two_column">
                                    <input type="password" name="password" id="password" required="required" placeholder="Enter Password" minlength="8" class="mr-2">
                                    <div>
                                    </div>

                                    <input type="password" name="cpassword" id="cpassword" required="required" placeholder="Enter Confirm Password" class="ml-2">
                                    <div>
                                    </div>

                                </div>
                                                                        
                            </div>

<div class="single_q">                                
    <span id="passwordError" style="color: red;font-size: 10px;"></span><br>
    <span id="cpasswordError" style="color: red;font-size: 10px;"></span>
</div>
                             <div class="single_q">                                
                                <div class="field">
                                     <div class="custom-control custom_check">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="terms_changed(this)" checked="checked">
                                        <label class="custom-control-label" for="customCheck2">
                                            I agree to the <a href="<?php echo base_url(''); ?>/PrivacyPolicy">privacy policy</a> and <a href="<?php echo base_url(''); ?>/TermsCondtions">terms</a> of use
                                        </label>
                                      </div>
                                </div>
                            </div>                          
<div class="single_q">                                
    <span id="chkError" style="color: red;font-size: 10px;"></span><br>
</div>

                            

                            <div class="single_q">

                                <div class="form_field join_btn btn_link golden_btn mt-2">

                                <input type="submit" value="Next" name="submit" id="submit" required="required">

                                </div>

                            </div> 

                        </form>

                    </div>

                    <div class="login_bottom_line text-white">

                        Already have an account? <a href="<?php echo base_url() ?>/home/user_login">Login</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
function terms_changed(termsCheckBox){
    if(termsCheckBox.checked){
        document.getElementById("submit").disabled = false;
        $("#chkError").html('');  

    } else{
        document.getElementById("submit").disabled = true;
        $("#chkError").html('*Please accept Terms & Conditions');  
    }
}

$(document).ready(function() {
    $('#name').keypress (function(){
        $("#nameError").html('');  
    });

    $('#email').keypress (function(){
        $("#emailError").html('');  
    });

    $('#mobile').keypress (function(){
        var regExp = /[a-z]/i;
          $('#mobile').on('keydown keyup', function(e) {
            var value = String.fromCharCode(e.which) || e.key;

            // No letters
            if (regExp.test(value)) {
              e.preventDefault();
              return false;
            }
          });
        $("#mobileError").html('');  
    });

    $('#password').keypress (function(){
        $("#passwordError").html('');  
    });

    $('#cpassword').keypress (function(){
        $("#cpasswordError").html('');  
    });
                jQuery.validator.addMethod(
                  "regex",
                   function(value, element, regexp) {
                       if (regexp.constructor != RegExp)
                          regexp = new RegExp(regexp);
                       else if (regexp.global)
                          regexp.lastIndex = 0;
                          return this.optional(element) || regexp.test(value);
                   },"erreur expression reguliere"
                );

                $("#singup_frm").validate({
                rules: {
                    name: {
                        required: true,
                        "regex": /^[A-Za-z]+$/
                    },
                    email: {
                         required: true,
                         "regex": /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/
                    },
                    mobile: {
                         required: true,
                         maxlength : 10,
                         "regex": /^\d*(?:\.\d{1,2})?$/
                    },
                     password : {
                     minlength : 8
                    },
                    cpassword : {
                        minlength : 8,
                        equalTo : "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Please provide a name",
                        regex: "please enter correct name"
                    },
                    email: {
                        required: "Please provide a email",
                        regex: "please enter correct email"
                    },
                    mobile: {
                        required: "Please provide a Mobile Number",
                        maxlength: "Mobile Number should not be grater than 10 digits",
                        regex: "please enter correct Mobile Number"
                    },                  
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    },
                    cpassword: {
                        required: "Please provide a conform password",
                        equalTo: "Password & Confirm Password Not Match!" 
                    }
                },
                 errorPlacement: function(error, element) 
                {
                    if ( element.is("#name") ) 
                    {
                        error.appendTo($('#nameError'));
                    }
                    if ( element.is("#email") ) 
                    {
                        error.appendTo($('#emailError'));
                    }
                    if ( element.is("#mobile") ) 
                    {
                        error.appendTo($('#mobileError'));
                    }
                    if ( element.is("#password") ) 
                    {
                        error.appendTo($('#passwordError'));
                    }
                    if ( element.is("#cpassword") ) 
                    {
                        error.appendTo($('#cpasswordError'));
                    }
                 },
                submitHandler: function(form) {
                    form.submit();
                }
                
            });

    // $('#submit').click(function(){

    //   var name = $("#name").val();  

    //   var mobile = $("#mobile").val();  

    //   var email = $("#email").val();  

    //   var password = $("#password").val();  

    //   var cpassword = $("#cpassword").val();  

    //   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    //   var filter = /^\d*(?:\.\d{1,2})?$/;

    //   if(name==''){

    //     $("#name").css("border-color", "red"); 

    //     $("#nameError").html('*Please Enter Name');       

    //     return false;

    //   }

    //   if(email==''){

    //     $("#email").css("border-color", "red"); 

    //     $("#emailError").html('*Please Enter Email');       

    //      return false;

    //   }else{

    //     if(!emailReg.test(email)) {

    //         $("#email").css("border-color", "red"); 

    //             $("#emailError").html('*Please enter a valid email address');       

    //             return false;

    //         }

    //   }   

    //   if(mobile==''){

    //     $("#mobile").css("border-color", "red"); 

    //     $("#mobileError").html('*Please Enter Mobile Number');       

    //      return false;

    //   }

    //   if(mobile!=''){

    //         if(mobile.length!=10){

    //             $("#mobile").css("border-color", "red"); 

    //             $("#mobileError").html('*Mobile Nunber Should be 10 digit.');   

    //             return false;

    //         }

    //         if (!filter.test(mobile)) {

    //             $("#mobile").css("border-color", "red"); 

    //             $("#mobileError").html('*Mobile number is not valid.');   

    //             return false;

    //         }

    //   }

    //   if(password==''){

    //     $("#password").css("border-color", "red"); 

    //     $("#passwordError").html('*Please Enter Password');       

    //     return false;

    //   }else{

    //         if(password.length<8){

    //             $("#password").css("border-color", "red"); 

    //             $("#passwordError").html('*Password length should be 8 digit');   

    //             return false;

    //         }

    //  }      

    //   if(cpassword==''){

    //     $("#cpassword").css("border-color", "red"); 

    //     $("#cpasswordError").html('*Please Enter Confirm Password');       

    //     return false;

    //   }

    //   if(password!=cpassword){

    //     $("#password").css("border-color", "red"); 

    //     $("#cpassword").css("border-color", "red"); 

    //     $("#cpasswordError").html('*Password & Confirm Password Not Match!');       

    //     return false;

    //   }

    // });

 });

</script>



<script>

window.addEventListener("DOMContentLoaded",() => {

    let range2 = new RollCounterRange("#range2"),

        range3 = new RollCounterRange("#range3");

        range4 = new RollCounterRange("#range4");

        range5 = new RollCounterRange("#range5");

        range6 = new RollCounterRange("#range6");

        range7 = new RollCounterRange("#range7");

});



class RollCounterRange {

    constructor(id) {

        this.el = document.querySelector(id);

        this.srValue = null;

        this.fill = null;

        this.digitCols = null;

        this.lastDigits = "";

        this.rollDuration = 0; // the transition duration from CSS will override this

        this.trans09 = false;



        if (this.el) {

            this.buildSlider();

            this.el.addEventListener("input",this.changeValue.bind(this));

        }

    }

    buildSlider() {

        // create a div to contain the <input>

        let rangeWrap = document.createElement("div");

        rangeWrap.className = "range";

        this.el.parentElement.insertBefore(rangeWrap,this.el);



        // create another div to contain the <input> and fill

        let rangeInput = document.createElement("span");

        rangeInput.className = "range__input";

        rangeWrap.appendChild(rangeInput);



        // range fill, place the <input> and fill inside container <span>

        let rangeFill = document.createElement("span");

        rangeFill.className = "range__input-fill";

        rangeInput.appendChild(this.el);

        rangeInput.appendChild(rangeFill);



        // create the counter

        let counter = document.createElement("span");

        counter.className = "range__counter";

        rangeWrap.appendChild(counter);



        // screen reader value

        let srValue = document.createElement("span");

        srValue.className = "range__counter-sr";

        srValue.textContent = "0";

        counter.appendChild(srValue);



        // column for each digit

        for (let D of this.el.max.split("")) {

            let digitCol = document.createElement("span");

            digitCol.className = "range__counter-column";

            digitCol.setAttribute("aria-hidden","true");

            counter.appendChild(digitCol);



            // digits (blank, 0–9, fake 0)

            for (let d = 0; d <= 11; ++d) {

                let digit = document.createElement("span");

                digit.className = "range__counter-digit";



                if (d > 0)

                    digit.textContent = d == 11 ? 0 : `${d - 1}`;



                digitCol.appendChild(digit);

            }

        }



        this.srValue = srValue;

        this.fill = rangeFill;

        this.digitCols = counter.querySelectorAll(".range__counter-column");

        this.lastDigits = this.el.value;



        while (this.lastDigits.length < this.digitCols.length)

            this.lastDigits = " " + this.lastDigits;



        this.changeValue();



        // use the transition duration from CSS

        let colCS = window.getComputedStyle(this.digitCols[0]),

            transDur = colCS.getPropertyValue("transition-duration"),

            msLabelPos = transDur.indexOf("ms"),

            sLabelPos = transDur.indexOf("s");



        if (msLabelPos > -1)

            this.rollDuration = transDur.substr(0,msLabelPos);

        else if (sLabelPos > -1)

            this.rollDuration = transDur.substr(0,sLabelPos) * 1e3;

    }

    changeValue() {

        // keep the value within range

        if (+this.el.value > this.el.max)

            this.el.value = this.el.max;



        else if (+this.el.value < this.el.min)

            this.el.value = this.el.min;



        // update the screen reader value

        if (this.srValue)

            this.srValue.textContent = this.el.value;



        // width of fill

        if (this.fill) {

            let pct = this.el.value / this.el.max,

                fillWidth = pct * 100,

                thumbEm = 1 - pct;



            this.fill.style.width = `calc(${fillWidth}% + ${thumbEm}em)`;

        }

        

        if (this.digitCols) {

            let rangeVal = this.el.value;



            // add blanks at the start if needed

            while (rangeVal.length < this.digitCols.length)

                rangeVal = " " + rangeVal;



            // get the differences between current and last digits

            let diffsFromLast = [];

            if (this.lastDigits) {

                rangeVal.split("").forEach((r,i) => {

                    let diff = +r - this.lastDigits[i];

                    diffsFromLast.push(diff);

                });

            }



            // roll the digits

            this.trans09 = false;

            rangeVal.split("").forEach((e,i) => {

                let digitH = 1.5,

                    over9 = false,

                    under0 = false,

                    transY = e === " " ? 0 : (-digitH * (+e + 1)),

                    col = this.digitCols[i];



                // start handling the 9-to-0 or 0-to-9 transition

                if (e == 0 && diffsFromLast[i] == -9) {

                    transY = -digitH * 11;

                    over9 = true;



                } else if (e == 9 && diffsFromLast[i] == 9) {

                    transY = 0;

                    under0 = true;

                }



                col.style.transform = `translateY(${transY}em)`;

                col.firstChild.textContent = "";



                // finish the transition

                if (over9 || under0) {

                    this.trans09 = true;

                    // add a temporary 9

                    if (under0)

                        col.firstChild.textContent = e;



                    setTimeout(() => {

                        if (this.trans09) {

                            let pauseClass = "range__counter-column--pause",

                                transYAgain = -digitH * (over9 ? 1 : 10);



                            col.classList.add(pauseClass);

                            col.style.transform = `translateY(${transYAgain}em)`;

                            void col.offsetHeight;

                            col.classList.remove(pauseClass);



                            // remove the 9

                            if (under0)

                                col.firstChild.textContent = "";

                        }



                    },this.rollDuration);

                }

            });

            this.lastDigits = rangeVal;

        }

    }

}

</script>



</body>

</html>