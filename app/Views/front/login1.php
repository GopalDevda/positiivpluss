<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>

<div class="page step login m-0">

<div class="left_content right_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="step_content">                    
                    <div class="step_title"><br>Welcome</div>               
                    
                    <div class="single_q">
                        <div class="q_title">
                            Sign in to continue
                        </div>
                        <form class="single_radio line_break" action="#">                            
                            <div class="single_q">                                
                                <div class="field">
                                    <input type="text" name="u-name" placeholder="Username or Email">
                                </div>
                            </div>
                            <div class="single_q">                                
                                <div class="field">
                                    <input type="password" name="password" placeholder="Password">
                                    <div class="forgot_pass">
                                        <a href="forgot_password.php">Forgot Password?</a> 
                                    </div>
                                </div>
                            </div>
                            <div class="single_q">
                                <div class="form_field join_btn btn_link">
                                    <input type="button" value="Login">
                                </div>
                            </div> 
                        </form>
                    </div>
                    <div class="login_bottom_line">
                        Don't have an account? <a href="q_start.php">Create</a>
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php include('include/site_footer.php'); ?> 