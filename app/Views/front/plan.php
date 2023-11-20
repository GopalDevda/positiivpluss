<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>

<div class="page">
    
<div class="plan_page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title mb-3 text-center">
                    <?php 
                        if($list) {
                            echo $list[0]['title'];
                        }
                    ?>
                </div>
                <div class="didot text-center">
                    <?php 
                    if($list) {
                        echo $list[0]['description'];
                    }
                    ?>
                </div>
                <div class="size_title">Select Company Size</div>
                <div class="select_plan">
<?php if(!empty($plan)){
    $s=1;
    foreach($plan as $p){ ?>
        <div class="plan_single">
            <div class="plan_radio">
                <input type="radio" id="plan-<?php echo $s;?>" name="customRadio" value="plan-1" onclick="getplan(<?php echo $p['id'];?>,<?php echo $supplier['supplier_id'];?>);">
                <label for="plan-<?php echo $s;?>">
                <span><?php echo $p['company_size'];?></span>
                </label>
            </div>
        </div>
<?php $s++;} }?>             
               </div>
            </div>
        </div>
       
<span id="sizeDiv"> </span>
    </div>
</div>
<br><br>
</div>
<?php include('include/site_footer.php'); ?> 
<script>
function getplan(id,supplier){
    $.ajax({url: "<?php echo base_url();?>/home/getPlanByCompanySize/"+id+"/"+supplier, success: function(result){
           $("#sizeDiv").html(result);  
    }});
}
</script>