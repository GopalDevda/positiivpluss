<?php include('include/header.php'); ?>

<!-- include('include/site_header.php'); -->
<style type="text/css">
    .golden_btn {
       background: #c39a4a;
        color: white;
        padding: 10px 20px;
        margin-top: 22px !important;
        display: inline-block;
    }
    .golden_btn:hover{
        color: #fff;
    }
    .shadow-sm {
        box-shadow: 0 .125rem 1.25rem rgba(0,0,0,.075)!important;
    }

</style>
<div class="page terms">

<div class="section_one">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="title mb-3 text-center">Subscription Status</div>

                <!-- <div class="didot text-center mb-4">

                </div> -->

            </div>

        </div>

    </div>

</div>



</div>





<div class="page">

    

<div class="plan_page">

    <div class="container">

        <div class="row">

            <div class="col-md-6 offset-md-3 shadow-sm p-5" style="display: none;">

                <div class="text-center" style="text-align: center;">
                    <img src="https://positiivplus.io/public/utopiic/assets/images/logo_new.png" style="width: 207px;margin-bottom: 30px;">
                        <p style="text-align: center;">Your subscription has been successfully done</p>

                        <p style="text-align: center;">Your subscription id is :</p>

                        <h3 style="text-align: center;"><strong><?php echo $supplier[0]['stripe_subscription_id'];?></strong> </h3>

                        

                          <!-- <a class="join_btn btn_link golden_btn mt-2" href="<?php echo base_url(); ?>/supplier/baseAssessment">Go To Dashboard</a> -->
                          <a class="join_btn btn_link golden_btn mt-2" href="<?php echo base_url(); ?>/home/user_login">Go To Login</a>

                        
                </div>

            </div>

        </div>


                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-md short_popup">
                                    <div class="modal-content">                        
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h5 class="modal-title golden">Subscription Status</h5>
                                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                        </div>                            
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: center;">

                                           Thank you for completing the Onboarding!! Dashboard details will be shared on the registered email ID within 24 -48 hours. 
                                           For any further details contact us at info@utopiic.com
                                           

                        
                                        <div class=" join_btn btn_link golden_btn mt-2">
                                            <a style="text-transform: inherit;background: none;color: #fff;" href="https://www.utopiic.com/">Okay</a>
                                        </div>  

                                        </div>   
                                    </div>
                                </div>
                            </div>       

    </div>
</div>
<br><br><br><br><br><br><br>
</div>
<?php 
// include('include/site_footer.php');
?> 
<script type="text/javascript">
$(function (){
        $("#myModal").modal("show");
});
$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})
</script>

