         <div class="row">

            <div class="col-md-12">

                <div class="price_choose_title">

                    Pricing for <span class="golden"><?php echo $company[0]['company_size'];?></span>

                </div>  

                <div class="price_currency" hidden>

                    <div class="form-group">

                        <select class="form-control" id="exampleFormControlSelect1">

                          <option>$</option>

                          <option>€</option>

                          <option>₹</option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

        <div class="row plan_box">



<?php 

if(!empty($list)){

    foreach($list as $r){?>

            <div class="col-md-4">

                <div class="plan_single_inner">

                    <div class="plan_type_title"><?php echo $r['plan_name'];?></div>
                    <div class="plan_type_sub">Fulfill your client's request</div>
                    <div class="py">
                       Rs. <?php echo number_format($r['plan_price'],2);?>/- <span>&nbsp;<?php echo $r['plan_validity'];?> subscription</span>
                    </div>

                    <div class="py_points">
<?php 
    if($r["description"]) {
        foreach(json_decode($r["description"]) as $desc) {
?>
<div class="py_point">
    <?php echo $desc;?>
</div>
<?php            
        }
    }
?>


                    </div>

                    <div class="join_btn mt-3">
<?php if($supplier['supplier_id']!='undefined'){?>
    <a href="<?php echo base_url()?>/supplier/subscribe/<?php echo $supplier['supplier_id'];?>/<?php echo $r['id'];?>">Select Plan</a>
<?php }else{?>
    <a href="<?php echo base_url()?>/home/signup">Select Plan</a>
<?php }?>
                    </div>

                </div>

            </div>

            <?php } }?>

           

            

        </div>

