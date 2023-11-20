<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>
<div class="page terms">
<div class="section_one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title mb-3 text-center">Purchase Status</div>
                <div class="didot text-center mb-4">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
  <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-md short_popup">
                                    <div class="modal-content">                        
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h5 class="modal-title golden">Purchase Status</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>                            
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: center;">

                                            Your Purchase process has been cancelled 

                                        <div class=" form_field join_btn btn_link golden_btn mt-2">
                                            <!-- <a style="text-transform: inherit;background: none;color: #fff;" href="<?php echo base_url();?>/home/signup">Go to Signup</a> -->
                                        </div>  

                                        </div>   
                                    </div>
                                </div>
                            </div>       
<script type="text/javascript">
$(function (){
        $("#myModal").modal("show");
});
</script>
