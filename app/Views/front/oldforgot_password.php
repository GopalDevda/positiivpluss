<?php include('include/header.php'); ?>

<?php include('include/site_header.php'); ?>



<div class="page step login forgot m-0">



<div class="left_content right_content">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="step_content">                    

                    <div class="step_title"><br>Forgot Password</div>               

                    

                    <div class="single_q">

                        <div class="q_title">

                            Please enter your registerd email address, We will send you new password.

                        </div>

                        <form class="single_radio line_break" action="#">                            

                            <div class="single_q">                                

                                <div class="field">

                                    <input type="email" name="email" placeholder="Registerd Email">

                                </div>

                            </div>                            

                            <div class="single_q">

                                <div class="form_field join_btn btn_link">

                                    <input type="button" value="Submit" data-toggle="modal" data-target="#myModal2">

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

                        </form>

                    </div>

                    <div class="login_bottom_line">

                        Don't have an account? <a href="get_started.php">Create</a>

                    </div>

                                       

                </div>

            </div>

        </div>

    </div>

</div>



</div>



<?php include('include/site_footer.php'); ?> 