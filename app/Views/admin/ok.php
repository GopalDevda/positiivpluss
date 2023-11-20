

<?php 
include('include/he.php'); 

//  include('front/include/site_header.php');
 ?>
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

                <div class="title mb-3 text-center">Please wait link is generating</div>

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
                    <img src="https://positiveplus.io/public/utopiic/assets/images/logo_new.png" style="width: 207px;margin-bottom: 30px;">
                        <p style="text-align: center;">Link has been created successfully</p>

                        <p style="text-align: center;">Your Link  is :</p>

                        

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
                                        <h5 class="modal-title golden">Copy the link</h5>
                                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                        </div>                            
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: center;">

                                           Link has been created successfully.
                                           

                        
<?php 


$csrf=$_GET['csrf_token'];
$plan=$_GET['plan_id'];

?><!DOCTYPE html>

<input type="text" value="<?php echo base_url() ?>/home/signup?csrf_token=<?php echo $csrf; ?>&plan_id=<?php echo $plan;?>" id="myInput" disabled>
<button class="join_btn btn_link golden_btn mt-2" onclick="myFunction()" style="border: 0;">Copy text</button>

<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

                                        <div style="display: contents;">
                                             <?php echo '<a class="join_btn btn_link golden_btn mt-2" href='.base_url().'/home/signup?csrf_token='.$csrf.'&plan_id='.$plan.'" >Go to Link</a>';?>
                                
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

