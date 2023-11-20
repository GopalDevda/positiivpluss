<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<style>
.custom_animate #box7_list {
    position: absolute;
    left: 15px;
    top: 15px;
  
    width: 10px;
    height: 10px;
    padding: 0;
  
    background-color: #222;
  
    z-index: 1;
    transition: 0.5s ease-in-out;
    overflow: hidden;
  }
.mysub-btn{
    background: #EDFEB6;
    border: 1px solid #a4bd50 !important;
    color: #262626;
    transition: 0.5s;
}
.custom_animate .act > #box7_list {
    left: 46px;
    top: 0px;  
    width: auto;
    height: 40px;
    padding: 5px 12px;  
    background-color: #262626;
    border-radius: 30px;  
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
  }     

.custom_animate #box8_list {
    position: absolute;
    left: 15px;
    top: 15px;
  
    width: 10px;
    height: 10px;
    padding: 0;
  
    background-color: #222;
  
    z-index: 1;
    transition: 0.5s ease-in-out;
    overflow: hidden;
  }

.custom_animate .act > #box8_list {
    left: 46px;
    top: 0px;  
    width: auto;
    height: 40px;
    padding: 5px 12px;  
    background-color: #262626;
    border-radius: 30px;  
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
  }     

.custom_animate #box9_list {
    position: absolute;
    left: 15px;
    top: 15px;
  
    width: 10px;
    height: 10px;
    padding: 0;
  
    background-color: #222;
  
    z-index: 1;
    transition: 0.5s ease-in-out;
    overflow: hidden;
  }

.custom_animate .act > #box9_list {
    left: 46px;
    top: 0px;  
    width: auto;
    height: 40px;
    padding: 5px 12px;  
    background-color: #262626;
    border-radius: 30px;  
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
  }     
.custom_animate #box10_list {
    position: absolute;
    left: 15px;
    top: 15px;
  
    width: 10px;
    height: 10px;
    padding: 0;
  
    background-color: #222;
  
    z-index: 1;
    transition: 0.5s ease-in-out;
    overflow: hidden;
  }

.custom_animate .act > #box10_list {
    left: 46px;
    top: 0px;  
    width: auto;
    height: 40px;
    padding: 5px 12px;  
    background-color: #262626;
    border-radius: 30px;  
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
  }     
.custom_animate #box11_list {
    position: absolute;
    left: 15px;
    top: 15px;
  
    width: 10px;
    height: 10px;
    padding: 0;
  
    background-color: #222;
  
    z-index: 1;
    transition: 0.5s ease-in-out;
    overflow: hidden;
  }

.custom_animate .act > #box11_list {
    left: 46px;
    top: 0px;  
    width: auto;
    height: 40px;
    padding: 5px 12px;  
    background-color: #262626;
    border-radius: 30px;  
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
  }     

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  

        <div class="main-content-wrap sidenav-open d-flex flex-column custom_page company_page">

            <!-- ============ Body content start ============= -->

            <div class="main-content category_body">

                <div class="breadcrumb">

                    <h1>Products</h1>

<!--                     <ul></ul>

                        <li><a href="">dummy</a></li>

                        <li>dummy</li>

                    </ul> -->

                </div>

                <div class="separator-breadcrumb border-top"></div>



                <div class="row">

                    <div class="col-lg-12 col-md-12">

                    <div class="category_page_header">

                            <div class="cph_inner">

                                <div class="cph_left">

                                    <span><img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $assessment[0]['image'];?>" alt=""></span>

                                </div>

                                <div class="cph_right">

                                    <div class="cph_title"><?php echo $assessment[0]['title'];?></div>

                                    <div class="cph_short_desc">

                                        <?php echo $assessment[0]['description'];?>

                                    </div>

                                    <div class="cph_status">

                                        <div class="cph_status_left d-flex">

                                            <div class="cph_score_icon">

                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_score.png">

                                            </div>

                                            <div class="cph_score_content">

                                                <div class="cph_score_label">Module Completed</div>

                                                <div class="cph_score_result"><?php echo $completed_module_count; ?> Out of 4</div>

                                            </div>

                                        </div>

                                        <div class="cph_status_right d-flex">

                                            <div class="cph_score_icon">

                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_complete.png">

                                            </div>

                                            <div class="cph_score_content">

                                                <div class="cph_score_label">Total Footprint</div>

                                                <div class="cph_score_result">

<?php 

    if($total_product_footprint<1000) {

        echo (number_format($total_product_footprint,2,".","."))." kgs CO2e";

    } 

    else {

        echo (number_format($total_product_footprint/1000,2,".","."))." tonnes CO2e";

    }

?>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <img src="dist-assets/custom_img/custom_img/map.png" alt="" class="cph_map">

                        </div>

                    </div>

                </div>



<?php 

    // if($supp_assess) {

        if(!$supp_assess || $supp_assess['is_submit']==0) {

?>

                <div class="row mt-2">

                    <div class="col-sm-12">

                        

                        <div id="tab1c">                            

                            <div class="step_body">

                                <div class="step_form">                              

                                    <div class="indicators d-flex text-light">

                                        <div class="rounded-circle bg-secondary"><span><i class="material-icons">view_in_ar</i></span></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">opacity</i></span></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">precision_manufacturing</i></span></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">local_shipping</i></span></div>

<!--                                         <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">assignment_late</i></span></div> -->

                                        <hr>

                                    </div>

                                </div>   

                                <div class="position-relative">

<!--                                    <form  class="stepped" action="<?php echo base_url() ?>/brand/productAssessmentSubmit" method="post" id="welcome_frm">

<input type="hidden" name="assessment_id" value="<?php echo $supp_assess?$supp_assess['id']:'0' ?>" />

                                        <div class="steps step_1">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Welcome to the Product Carbon Footprint Calculator</div>

                                                <div class="form_title_sub">

                                                    First, please tell us about your collections / product

                                                </div>

                                            </div>

                                        </div>

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">Name or type of product</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">

                                                    <select class="form-control" id="exampleFormControlSelect1" name="country_id">

                                                        <option value="-1">Select Location</option>

                                            <?php 

                                                if($country) {

                                                    foreach($country as $c) {

                                                        $check_country="";

                                                if($ghg_assessment) {

                                                    if($c['id']==$ghg_assessment[0]['country_id']) {

                                                        $check_country="selected";

                                                    }

                                                }

                                            ?>

                                                <option value='<?= $c['id'] ?>' <?= $check_country ?>><?= $c['name'] ?></option>

                                            <?php

                                                    }

                                                }

                                            ?>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">How many products are produced</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field">

                                                    <select class="form-control" id="no_of_employee" name="no_of_employee">

                                                        <option>Select number of employees</option>

                                        <?php

                                            for($i=1;$i<=50;$i++) {

                                                $check_emp = "";

                                                if($ghg_assessment) {

                                                    if($ghg_assessment[0]['no_of_employee']==$i) {

                                                        $check_emp="selected";

                                                    }

                                                }

                                        ?>

                                        <option value="<?= $i ?>" <?= $check_emp ?>><?= $i ?></option>

                                        <?php                                                        

                                        }

                                        ?>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">

                                                    Carbon footprint calculations are typically based on annual emissions from the previous 12 months.

                                                    If you would like to calculate your carbon footprint for a different period use the calendar boxes below (optional):

                                                    <i class="fa fa-info-circle info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                                </label>

                                                

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                            <?php 

                                                $new_date_from="";

                                                $new_date_to="";

                                                if($ghg_assessment) {

                                                    $new_date_from = date('m/d/Y',strtotime($ghg_assessment[0]['date_from']));

                                                    $new_date_to = date('m/d/Y',strtotime($ghg_assessment[0]['date_to']));

                                                }

                                            ?>

                                                    <div class="stc_left"><input id="date_from" name="date_from" value="<?= $new_date_from ?>" /></div>

                                                    <div class="stc_center">to</div>

                                                    <div class="stc_right"><input id="date_to" name="date_to" value="<?= $new_date_to ?>" /></div>

                                                </div>

                                            </div>

                                        </div>

                                        <br>

                                        <div class="step_form_bottom_line">

                                            Next, select the appropriate tab above to calculate the part of your product LCA you are most interested in, e.g. raw materials.

                                            Or, visit each of the tabs above to calculate the full carbon footprint for your product.<br><br> 

                                            Following your calculation, you can offset / neutralise your emissions through one of our climate-friendly projects.

                                        </div>

                                        <div class="step_form_btns text-right">

                                            <button type="submit" class="btnNext btn btn-outline-success">Next</button>

                                        </div>

                                    </div> 

                                    </form> -->

                                    <form  class="stepped" action="<?php echo base_url() ?>/brand/productBuildingAssessmentSubmit" method="post" id="building_frm">

            <input type="hidden" name="ghg_id" value="21" />

            <input type="hidden" name="ghg_assessment_id" id="ghg_assessment_id" value="<?php echo $ghg_assessment_id; ?>" />

                                        <div class="steps step_2">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Raw material carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    Select the raw materials or ingredients used to create the final product.
                                                    Enter the quantity as per the selected units and period of assessment
                                                    <!--If you don't have access to your utility bills, press the Estimate button -->

                                                    <!--to estimate your building's carbon footprint based on the number of employees (20)-->

                                                </div>                                                                                               

                                            </div>

                                        </div>

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">Materials</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        Quantity

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        Unit

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="step_label">

                                                Supplier Location

                                            </div>

                                        </div>

    <input type="hidden" name="factor[]" value="<?php //echo $gf['id']; ?>" />

    <input type="hidden" name="emission_factor[]" value="<?php // echo $gf['emission_factor']; ?>" />

<?php 

    $no_of_building_factors=0;

    $total_building_footprint = 0;

    $row_check=0;

    if($ghg_assessment_detail) {

        foreach($ghg_assessment_detail as $key=>$gad) {

            if($gad['ghg_id']==21) {

                $no_of_building_factors++;

                $row_check++;

?>



                                        <div class="step_inner append_row" id="fact_div_1">

                                            <div class="theme_field step_label">

                                                <select class="form-control label_select" id="exampleFormControlSelect1" name="prod_factor[]" onchange="setUnit(this)">

<option value="0">Select Material</option>

<?php

$product_factor="";

$prod_fact_unit = "";

if($ghg_factor) {

                foreach($ghg_factor as $gf) {

                    if($gf['ghg_id']==21) {

                        $ghg_qty = "";

                        $slt_status="";

                        if($gf['id']== $gad['factor_id'] ) {

                            $total_building_footprint = $total_building_footprint + ($gad['estimate']);

                            $slt_status="selected";

                        }

        //             $check_factor=false;

        // foreach($ghg_assessment_detail as $gad2) {

        //     if($gad2['ghg_id']==21) {

        //         if($gf['id']==$gad2['factor_id'] && $gad2['id']!=$gad['id']) {

        //             $check_factor=true;

        //             break;

        //         }

        //     }

        // }

        // if(!$check_factor) {

            $product_factor.='<option value="'.$gf['id'].'" '.$slt_status.'>'.$gf['factor_name'].'</option>';

        // }

            if($slt_status) {

                $prod_fact_unit= '<option value="0">Select Unit</option>';

                if($gf['unit_name']==$gad['unit']) {

                    $prod_fact_unit.='<option selected>'.$gf['unit_name'].'</option>';

                }

                else {

                    $prod_fact_unit.='<option>'.$gf['unit_name'].'</option>';

                }

                if($sub_units) {

                    foreach($sub_units as $sub_unit) {

                        if($sub_unit['unit_id']==$gf['factor_unit']) {

                            if($gad['unit']==$sub_unit['sub_unit_name']) {

                            $prod_fact_unit.='<option value="'.$sub_unit['id'].'" selected>'.$sub_unit['sub_unit_name'].'</option>';

                            }

                            else {

                                $prod_fact_unit.='<option value="'.$sub_unit['id'].'">'.$sub_unit['sub_unit_name'].'</option>';

                            }

                        }

                    }

                }

            }

?>

<?php 

            }

        }

    }

?>

                        <?php echo $product_factor; ?>                                                       

                                                </select>

                                            </div>







                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        <input type="number" placeholder="Enter number" name="qty[]" value="<?php  echo $gad['quantity'] ?>">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" name="unit[]">
<option value="0">Select Unit</option>
                                <?php echo $prod_fact_unit; ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>



<div class="step_field" style="width:30%;">

    <div class="theme_field">

        <div class="stc_left" style="width:100%;">

            <input type="text" class="form-control" id="autocomplete_<?php echo $gad['id']; ?>" name="supplier_location[]" value="<?php  echo $gad['supplier_location'] ?>" />       

        </div>

    </div>

</div>

<script>

      var input = document.getElementById('autocomplete_'+'<?php echo $gad['id']; ?>');

      var trip_from = new google.maps.places.Autocomplete(input);    

</script>



                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>

                                            <button class="remove_factor_block btn btn-danger" style="<?php echo $row_check>1?'':'visibility:hidden'; ?>"><i class="fa fa-trash"></i></button>

<?php

if($row_check>1) {

?>

<!-- <button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button> -->

<?php

}

?>

                                            &nbsp;

                                        </div>

<?php                

            }            

        }

    }

    if($no_of_building_factors==0) {

?>

                                        <div class="step_inner append_row" id="fact_div_1">

                                            <div class="theme_field step_label">

                                                <select class="form-control label_select" id="exampleFormControlSelect1" name="prod_factor[]" onchange="setUnit(this)">

<option value="0">Select Material</option>

<?php

$product_factor="";

if($ghg_factor) {

                foreach($ghg_factor as $gf) {

                    if($gf['ghg_id']==21) {

                        $ghg_qty = "";

                        $product_factor.='<option value="'.$gf['id'].'">'.$gf['factor_name'].'</option>';

?>

<?php 

            }

        }

    }

?>

                        <?php echo $product_factor; ?>                                                       

                                                </select>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        <input type="number" placeholder="Enter number" name="qty[]">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" name="unit[]">

<!--                                 <option><?php if($ghg_factor) echo $ghg_factor[0]['unit_name']; ?></option> -->

                                    <option value="0">Select Unit</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

<div class="step_field" style="width:30%;">

    <div class="theme_field">

        <div class="stc_left" style="width:100%;">

            <input type="text" class="form-control" id="supplier_autocomplete" name="supplier_location[]" value=' ' />       

        </div>

    </div>

</div>

                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>&nbsp;

                                            <button class="btn btn-danger" style="visibility: hidden;"><i class="fa fa-trash"></i></button>

                                        </div>

<?php

    }

?>

                        <span class="factorDiv"></span>                                        

<!--                                         <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">What percentage of your raw material normally goes to waste</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div> 

                                            <div class="step_field">

                                                <div class="theme_field step_three_column column_shor">

                                                    <div class="stc_left">

                                                        <input type="number">

                                                    </div>                                                    

                                                </div>

                                            </div>

                                        </div>    -->

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_building_footprint()">    

                                            </div>                                            

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="building_footprint">
 Estimate Emissions is
<?php 

    if($total_building_footprint<1000) {

        echo (number_format($total_building_footprint,4))." kgs ";

    } 

    else {

        echo ($total_building_footprint/1000)." tonnes ";

    }

?>          

                                                 <!--CO2e:	Estimate of building's footprlint-->
                                                 
                                                 of the <?php echo $supp_assess['cp_name']; ?>
                                                 </span>

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="reset_building_footprint()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="building_footprint_estimation">

                            <?php 

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==21) {

                                    $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id'] && $gd['ghg_id']==21) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>
	Estimate Emissions of 

<?php 

    if($gd['estimate']<1000) {

        echo (number_format($gd['estimate'],4))." kgs ";

    } 

    else {

        echo ($gd['estimate']/1000)." tonnes ";

    }

?>
<!--CO2e of -->
                                </span> 
    <?php 

        echo $gd['quantity']." ".$gd['unit']." of ".$gf['factor_name'];

    ?> used as Raw Material

                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor('<?php echo $gd['id'] ?>','<?php echo $gf['id'] ?>','<?php echo $gd['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

                            </div>

                            <?php

                                        }

                                    }

                                }

                            ?>

                            <?php 

                                    }

                                }

                            }

                            ?>

                        </div>

                                        </div>                                    

                                        <div class="step_form_btns text-right">

                                            <button type="button" class="btnNext btn btn-outline-success" onclick="getRawMaterialForManufacturing2('<?php echo $ghg_assessment_id ?>')">Next</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>                                                                                

                                    </div>  

                                    </form>

<!-- Packaging Start -->



                                    <form  class="stepped" action="<?php echo  base_url() ?>/brand/productManufacturing2AssessmentSubmit" method="post" id="manufacturing2_frm">

            <input type="hidden" id="manuf2_ghg_assessment_id" name="ghg_assessment_id" value="<?php echo $ghg_assessment_id ?>" />

            <input type="hidden" id="mf2_ghg_id" name="ghg_id" value="24" />

                                        <div class="steps step_5">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>     

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Packaging carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    You can enter details for all packaging process etc directly for the product

                                                    <br>

                                                    Enter your usage of each type of fuel, and press the Calculate button

                                                </div>

                                            </div>

                                        </div> 

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">Materials</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        Quantity

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        Unit

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="step_label">

                                                Supplier Location

                                            </div>

                                        </div>

            <?php

                $total_manufacturing2_footprint = 0;

                if($ghg_factor) {

                    foreach($ghg_factor as $gf) {

                        if($gf['ghg_id']==24) {

                        $ghg_qty = "";

                        if($ghg_assessment_detail) {

                            foreach($ghg_assessment_detail as $gd) {

                                if($gf['id']==$gd['factor_id']) {

                                    $ghg_qty = $gd['quantity'];

                                    $total_manufacturing2_footprint = $total_manufacturing2_footprint + ($gd['quantity']*$gf['emission_factor']);

                                }

                            }

                        }

            ?>

<!--     <input type="hidden" name="manuf2_factor[]" value="<?php echo $gf['id']; ?>" />

    <input type="hidden" name="manuf2_emission_factor[]" value="<?php echo $gf['emission_factor']; ?>" />

                                       <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

                                        <?= $gf['factor_name'] ?>

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                    <input type="number" class="mr-2" name="manuf2_qty[]" value="<?= $ghg_qty ?>" id="manufacturing2_factor_qty_<?php echo $gf['id'] ?>">

                                                    <select class="form-control" id="exampleFormControlSelect1" name="manuf2_unit[]">

                                                        <option>

                                                <?= $gf['factor_unit'] ?>                                                            

                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>            -->

            <?php

                        }

                    }

                }

            ?>                                 

                                <span id="manufacturing2Div"></span>

<!--                                         <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">What percentage of your raw material normally goes to waste</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div> 

                                            <div class="step_field">

                                                <div class="theme_field step_three_column column_shor">

                                                    <div class="stc_left">

                                                    <select class="form-control" id="waste_product" name="waste_product">

                                                        <option value="0">Select Waste</option>

                                                        <option value="landfill">Landfill</option>

                                                        <option value="incarnated">Incarnated</option>

                                                        <option value="composted">Composted</option>

                                                        <option value="recycled">Recycled</option>

                                                    </select>

                                                    </div>                                                    

                                                </div>

                                            </div>

                                        </div>    -->

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_manufacturing2_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="manufacturing2_footprint">

<?php

    if($tot_manufacturing2_footprint<1000) {

        echo ($tot_manufacturing2_footprint)." kgs ";

    } 

    else {

        echo ($tot_manufacturing2_footprint/1000)." tonnes ";

    }

?>

     

 </span>                                                 

                                                CO2e : 	Estimate Emissions of Packaging.
<!--Estimate of manufacturing2's footprint-->

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="resetManufacturing2()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="manufacturing2_footprint_estimation">

                            <?php 

                            // if($ghg_factor) {

                            //     foreach($ghg_factor as $gf) {

                            //         if($gf['ghg_id']==24) {

                            //         $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gd['ghg_id']==24) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>

<?php 

    if($gd['estimate']<1) {

        echo ($gd['estimate'])." kgs ";

    } 

    else {

        echo ($gd['estimate']/1000)." tonnes ";

    }

?>

                                </span> CO2e :	Estimate Emissions of   

    <?php 

        echo $gd['quantity']." ".$gd['unit']." of ".$gd['factor_name'];

    ?> used for packaging
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturing2Factor('<?php echo $gd['id'] ?>','<?php echo $gd['id'] ?>','<?php echo $gd['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

                            </div>

                            <?php

                                        }

                                    }

                                }

                            ?>

                            <?php 

                            //         }

                            //     }

                            // }

                            ?>

                        </div>

                                        </div>                          

                                        <div class="step_form_btns text-right">

                                            <button type="button" class="btnNext btn btn-outline-success" onclick="getRawMaterialForManufacturing('<?php echo $ghg_assessment_id ?>')">Next</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>

                                    </div>  

                                    </form>



<!-- Packaging End -->



<!-- Manufacturing Start -->




                                    <form  class="stepped" action="<?php echo  base_url() ?>/brand/productManufacturingAssessmentSubmit" method="post" id="manufacturing_frm">

            <input type="hidden" id="manuf_ghg_assessment_id" name="ghg_assessment_id" value="<?php echo $ghg_assessment_id ?>" />

            <input type="hidden" id="mf_ghg_id" name="ghg_id" value="23" />

                                        <div class="steps step_4">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                               <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div> 
                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Manufacturing carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    You can enter details for all manufacturing process etc directly for the product

                                                    <br>

                                                    Enter your usage of each type of fuel, and press the Calculate button

                                                </div>

                                            </div>

                                        </div> 

                                        <div class="step_inner">                                            

                                            <div class="step_label" style="width:25%">

                                                <label for="inp1">

                                                    Add Process

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field" style="width:75%">

                                            </div>

                                        </div>

                                        <div class="step_inner">                                            

<!--                                             <div class="step_label" style="width:25%">

                                                <label for="inp1">

                                                    Add Process

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                 -->        

                                            <div class="step_field" style="width:100%">

                                            <div class="theme_field d-flex">

<select class="form-control" name="process_name[]" onchange="setUnitProcess(this)">
    <option value="0">Select Process</option>    
<?php 
    if($manufacturing_process_detail) {
        foreach($manufacturing_process_detail as $process) {
?>
            <option value="<?php echo $process['id']; ?>"><?php echo $process['process_name']; ?></option>
<?php            
        }
    }
?>
</select>
<input type="number" class="mr-2" name="material_qty[]" value="" id="" placeholder="Enter Material Quantity"  style="height:32px" />
<select class="form-control" name="process_material_unit[]" style="width:105px;" id="">
    <option value="0">Select Unit</option>
  
</select>
<!--                                                     <input type="text" class="mr-2" name="process_name[]" value="" id="" placeholder="Process Name"  style="height:32px" /> -->
<!-- 
                                                    <input type="number" class="mr-2" name="electricity_consumption[]" value="" id="" placeholder="Electricity Consumption" style="height:32px" /> -->

<!--                                                     <select class="form-control" id="electricity_consumption_unit" name="electricity_consumption_unit[]" style="width:50%">

                                                        <option value="kwh">Kwh</option>

                                                    </select> -->

<!--                                                     <input type="number" class="mr-2" name="water_consumption[]" value="" id="" placeholder="Water Consumption" style="height:32px" /> -->

<!--                                                     <select class="form-control" id="water_consumption_unit" name="water_consumption_unit[]" style="width:50%">

                                                        <option value="litres">Litres</option>

                                                    </select> -->
<!--Box Removed 24-01-2022 start-->

<!--Box Removed 25-01-2022 start-->
                                                   
                                                   <span aria-hidden="true" style="display:none;"> <select id="process_raw_material" name="process_raw_material[0][]" multiple class="process_raw_material" style="border-radius: 0px">

                                            <option value="0">         

                                    Raw Material                                 

                                            </option>

                                                    </select></span>
                                    <!--Box Removed 24-01-2022 end-->
                                                                        <!--Box Removed 25-01-2022 end-->

                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreProcess()"><span aria-hidden="true">+</span></button>

                                            &nbsp;<button class="btn btn-danger" style="visibility: hidden;"><i class="fa fa-trash"></i></button>

                                                </div>

                                            </div>

                                            &nbsp;

                                        </div>

                        <span class="processDiv"></span>

            <?php

                $total_manufacturing_footprint = 0;

                if($ghg_factor) {

                    foreach($ghg_factor as $gf) {

                        if($gf['ghg_id']==23) {

                        $ghg_qty = "";

                        if($ghg_assessment_detail) {

                            foreach($ghg_assessment_detail as $gd) {

                                if($gf['id']==$gd['factor_id']) {

                                    $ghg_qty = $gd['quantity'];

                                    $total_manufacturing_footprint = $total_manufacturing_footprint + ($gd['quantity']*$gf['emission_factor']);

                                }

                            }

                        }

            ?>

    <input type="hidden" name="manuf_factor[]" value="<?php echo $gf['id']; ?>" />

    <input type="hidden" name="manuf_emission_factor[]" value="<?php echo $gf['emission_factor']; ?>" />

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

                                        <?= $gf['factor_name'] ?>

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                    <input type="number" class="mr-2" name="manuf_qty[]" value="<?= $ghg_qty ?>" id="manufacturing_factor_qty_<?php echo $gf['id'] ?>">

                                                    <select class="form-control" id="exampleFormControlSelect1" name="manuf_unit[]">

                                                        <option>

                                                <?= $gf['factor_unit'] ?>                                                            

                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>            -->

            <?php

                        }

                    }

                }

            ?>                                

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_manufacturing_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="manufacturing_footprint">

<?php echo number_format($tot_manufacturing_footprint,2); ?>

    

</span>                                                

                                                Kgs: Estimate Emissions of Manufacturing done

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="resetManufacturing()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="manufacturing_footprint_estimation">

                            <?php 

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==23) {

                                    $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                            ?>

<!--                            <div class="alert alert-success custom_alert" role="alert">

                                <span>

                                    <?php echo $gf['emission_factor']*$gd['quantity']; ?>

                                </span> tonnes:

    <?php 

        echo $gd['quantity']." ".$gf['factor_unit']." of ".$gf['factor_name'];

    ?>

                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor('<?php echo $gd['id'] ?>','<?php echo $gf['id'] ?>')"><span aria-hidden="true">×</span></button> -->

                            </div>

                            <?php

                                        }

                                    }

                                }

                            ?>

                            <?php 

                                    }

                                }

                            }

                            ?>

                            <?php 

                                if($supplier_manufacturing_process) {

                                    foreach($supplier_manufacturing_process as $smp) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>

                    <?php echo $smp['estimate']; ?> 

                                </span> Kgs:

    <?php 

        echo "Estimate Emissions for process ".$smp['process_name'];

    ?>

                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor('<?php echo $smp['id'] ?>','<?php echo $smp['ghg_id'] ?>','<?php echo $smp['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

                            </div>

                            <?php

                                    }

                                }

                            ?>

                        </div>

                                        </div>                          

                            <div class="step_form_btns text-right">

                                <button type="button" class="btnNext btn btn-outline-success" onclick="getRawMaterial('<?php echo $ghg_assessment_id ?>')">Next</button>

<!--                                 <div id="tab2">next</div> -->

                            </div>

                                    </div>

                                    </form>





<!-- Manufacturing End  -->





                                    <form  class="stepped" action="<?php echo base_url() ?>/brand/productTransportAssessmentSubmit" method="post" id="transport_frm">

            <input type="hidden" name="ghg_assessment_id" id="trans_ghg_assessment_id" value="<?php echo $ghg_assessment_id ?>" />

            <input type="hidden" name="ghg_id" value="22" />

<input type="hidden" name="transportation_way" id="transportation_way" value="land" />

<input type="hidden" name="transportation_by" id="transportation_by" value="" />

<input type="hidden" name="transportation_from" id="transportation_from" value="" />

<input type="hidden" name="transportation_to" id="transportation_to" value="" />

<input type="hidden" name="inner_transportation_from" id="inner_transportation_from" value="" />

<input type="hidden" name="inner_transportation_to" id="inner_transportation_to" value="" />

<input type="hidden" name="local_transportation_from_by" id="local_transportation_from_by"  value="" />

<input type="hidden" name="local_transportation_to_by" id="local_transportation_to_by" value="" />

<input type="hidden" name="transport_emission" id="transport_emission" value="0" />

            <div class="row" id="map"></div>

                                     <div class="steps step_3">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                               <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div> 

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Transportation carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    You can enter details for up to 5 vehicles

                                                </div>

                                            </div>

                                        </div> 

                                        <div class="step_inner">                                            

                                            <div class="step_label">

            <label for="inp1">Location From</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Type of Transport"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

            <select class="form-control" id="autocomplete" name="trip_from">

                <option value="0">Select Location From</option>

            </select>

                                            </div>

                                        </div>

                                    </div>

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                <label for="inp1">Location To</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Type of Transport"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

            <input type="text" class="form-control" id="autocomplete1" name="trip_to" value=' ' />          

                                            </div>

                                        </div>

                                    </div>



                                        <div class="step_inner">                                            

                                            <div class="step_label admin_btn">

        <input type="button" class="btn btn-primary" value="Submit" onclick="submit_data()" />          

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">



                                            </div>

                                        </div>

                                    </div>





<!-- Transport Start -->





  <div class="row" id="trip_div" style="display:none;margin-top:50px;border-radius: 15px">

    <div class="col-md-12" style="margin:10px;">

  <!-- 19-01-2022<h4>We carbon neutralize your full trip - for free!</h4>-->

  <p>Choose the main method of transportation for this trip. It helps us make accurate calculations.</p>

  <br>

  <!-- Nav pills -->

  <ul class="nav nav-pills" role="tablist">

    <li class="nav-item">

      <a class="nav-link active" data-toggle="pill" href="#home" id="bus">

        <span>

          <i class="fa fa-bus" aria-hidden="true"></i>

        </span>&nbsp;&nbsp;

      Land

    </a>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="pill" href="#menu1" id="rail">

        <span><i class="fa fa-train" aria-hidden="true"></i>

        </span>&nbsp;&nbsp;

      Rail</a>

    </li>

<!--     <li class="nav-item">

      <a class="nav-link" data-toggle="pill" href="#menu2">

        <span><i class="fa fa-car" aria-hidden="true"></i>

        </span>&nbsp;&nbsp;

      Car</a>

    </li> -->

    <li class="nav-item">

      <a class="nav-link" data-toggle="pill" href="#air_tab" id="air">

      <span>

        <i class="fa fa-plane" aria-hidden="true"></i>

      </span>&nbsp;&nbsp;

      Air</a>

    </li>

  </ul>



  <!-- Tab panes -->

  <div class="tab-content">

    <div id="home" class="container tab-pane active"><br>

<!--      <div class="row" style="margin-bottom: 10px;">

        <div class="col-md-12">

          <h5>

            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;

          Departing from <span id="departing_bus_station"></span></h5>          

        </div>

      </div>

      <div class="row">

        <div class="col-md-8">

          <p>

            <span>

              <i class="fa fa-male" aria-hidden="true"></i>              

            </span>&nbsp;&nbsp;

            Walking 0.2 km

          </p>          

        </div>

        <div class="col-md-4" style="text-align: right;">

          <div class="row">

            <div class="col-md-10">

              <p>0 kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="demo"></i>            

              </span>              

            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-md-8">

          <div class="row">

        <div class="col-md-3">

          <p>        

            <span>

              <i class="fa fa-bus" aria-hidden="true"></i>

            </span>&nbsp;&nbsp;

          Bus from

          </p>

  </div>

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="departure_bus_station" onchange="find_distance_between_bus_station()">

                <option>Select Bus Station</option>

              </select>

          </div>          

        </div>

        <div class="col-md-1"><p>to</p></div>

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="arrival_bus_station" onchange="find_distance_between_bus_station()">

                <option>Select Bus Station</option>

              </select>

          </div>          

        </div>          

        </div>

      </div>

      <div class="col-md-4" style="text-align:right;">

        <p>0 kg</p>

      </div>

      </div>

      <div class="row">

        <div class="col-md-8">

          <div class="row">

            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  Driving

                </p>

            </div>

            <div class="col-md-4">

              <select class="form-control">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p>1.3 km</p>

            </div>

          </div>

        </div>

        <div class="col-md-4" style="text-align: right">

          <p>0 kg</p>

        </div>

      </div>

      <div class="row" style="margin-top: 10px;">

        <div class="col-md-8">

          <h5>

            <span>

              <i class="fa fa-building" aria-hidden="true"></i>              

            </span>&nbsp;&nbsp;

            Arriving at <span id="arriving_bus_station"> Bhopal</span>

          </h5>          

        </div>

        <div class="col-md-4" style="text-align:right;">

          <p>0 kg</p>

        </div>

      </div>

      <hr/>

        <div class="row">

          <div class="form-check">

            <input type="checkbox" class="form-check-input" id="exampleCheck1">

            <label class="form-check-label" for="exampleCheck1">

              <h6>Round trip</h6>

              <p>Uncheck if your journey continues on another booking</p>

            </label>

          </div>          

        </div>

      <hr/>

      <div class="row">

        <div class="col-md-12">

          <p>We will remove 51 kg of CO₂ to make your entire trip Net Zero, for free!</p>

        </div>        

        <div class="col-md-12">

          <h5><a href="#">Hide carbon calculation</a></h5>

        </div>

      </div>

      <div class="row">

        <div class="col-md-12">

            <p>Distance: <span id="bus_station_distance"></span></p>

        </div>

      </div> -->





      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">

        <div class="col-md-12">

          <h5>

            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;

          Departing from <span id="departing_bus_station"></span></h5>          

        </div>

      </div>

<!--      <div class="row">

        <div class="col-md-9">

          <div class="row">

            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="bus_transfer_departure_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="bus_departure_transfer_spn">Driving</span>

                </p>

            </div>

            <div class="col-md-4">

              <select class="form-control" id="bus_departure_transfer">

                <option value="car" data-title="Driving" data-icon="fa fa-car">car</option>

                <option value="rail" data-title="Train" data-icon="fa fa-train">rail</option>

                <option value="bus" data-title="Bus" data-icon="fa fa-bus">bus</option>

                <option value="bike" data-title="Cycling" data-icon="fa fa-bicycle">bike</option>

                <option value="walk" data-title="Walking" data-icon="fa fa-male">walk</option>

              </select>              

            </div>

            <div class="col-md-3">

              <select class="form-control" id="bus_transfer_departure_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_bus_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="bus_departure_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <i id="bus_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          

            </div>

          </div>

        </div>

      </div> -->

      <div class="row" style="margin-top:10px;">

        <div class="col-md-9">

          <div class="row">

<!--        <div class="col-md-3">

          <p>        

            <span>

              <i id="land_icon" class="fa fa-bus" aria-hidden="true"></i>

            </span>&nbsp;&nbsp;

            <span id="land_span">Vehicle</span>

          </p>

        </div> -->
            <input type="hidden" id="vehicle_for_land" value="" />
            <div class="col-md-3 custom_animate">
                    <p>  
                      <div class="custom_animate">
                        <div id="box7">      
                          <div class="change_label">Change?</div>    
                          <span id="btn7"><i class="fa fa-car" id="land_icon" aria-hidden="true"></i>
                          </span>&nbsp;&nbsp;

                          <span id="land_span">Driving</span>
                         
                          <ul id="box7_list">
                            <?php 
                                if($land_vehicle) {
                                    foreach($land_vehicle as $lv) {
                            ?>
                                <li class="list-item">
                                    <a class="list-item-link" onclick="getVehicleFactorForLand('<?php echo $lv['id'] ?>','<?php echo $lv['icon']; ?>','<?php echo $lv['title']; ?>')">
                                        <img src="<?php echo base_url() ?>/public/brand/assets//custom_img/<?php echo $lv['vehicle_image']; ?>">
                                    </a>
                                </li>
                            <?php            
                                    }
                                }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </p>


            </div>

<!--        <div class="col-md-4">

          <div class="form-group">


              <select class="form-control" id="vehicle_for_land" onchange="getVehicleFactorForLand(this)">

                <option value="0">Select Vehicle</option>

<?php 

    if($land_vehicle) {

        foreach($land_vehicle as $lv) {

?>

            <option value="<?php echo $lv['id']; ?>" data-nm="<?php echo $lv['vehicle_name']; ?>"><?php echo $lv['vehicle_name']; ?></option>

<?php            

        }

    }

?>

              </select>

          </div>          

        </div> -->

<!--         <div class="col-md-1"><p>to</p></div> -->

<!--         <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="arrival_bus_station" onchange="find_distance_between_bus_station()">

                <option>Select Bus Station</option>

              </select>

          </div>          

        </div>           -->

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" name="factor_1" id="land_vehicle" onchange="find_emission_for_land_vehicle()">

                <option value="0">Select Factor</option>

              </select>

          </div>          

        </div>          

        </div>

      </div>

      <div class="col-md-3" style="text-align:right;">

        <div class="row">

          <div class="col-md-10">

            <p><span id="bus_distance_emission">0</span> kg</p>            

          </div>

          <div class="col-md-2">

            <span>

              <i id="bus_riding_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

            </span>                          

          </div>

        </div>

      </div>

      </div>

<!--      <div class="row">

        <div class="col-md-6">

          <div class="form-group">

              <label>From</label>

              <select class="form-control" id="departure_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>

        <div class="col-md-6">

          <div class="form-group">

              <label>To</label>

              <select class="form-control" id="arrival_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>

      </div> -->

<!--      <div class="row">

        <div class="col-md-9">

          <div class="row">

            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="bus_transfer_arrival_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="bus_arrival_transfer_spn">Driving</span>

                </p>

            </div>

            <div class="col-md-4">

              <select class="form-control" id="bus_arrival_transfer">

                <option data-title="Driving" data-icon="fa fa-car">car</option>

                <option data-title="Train" data-icon="fa fa-train">rail</option>

                <option data-title="Bus" data-icon="fa fa-bus">bus</option>

                <option data-title="Cycling" data-icon="fa fa-bicycle">bike</option>

                <option data-title="Walking" data-icon="fa fa-male">walk</option>

              </select>              

            </div>

            <div class="col-md-3">

              <select class="form-control" id="bus_transfer_arrival_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_arrival_bus_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="bus_arrival_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="bus_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                        

            </div>

          </div>

        </div>

      </div> -->

      <div class="row" style="margin-top: 10px;">

        <div class="col-md-9">

          <h5>

            <span>

              <i class="fa fa-building" aria-hidden="true"></i>              

            </span>&nbsp;&nbsp;

            Arriving at <span id="arriving_bus_station"></span>

          </h5>          

        </div>

<!--        <div class="col-md-3" style="text-align:right;">

          <div class="row">

            <div class="col-md-10">

              <p><span id="bus_hotel_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="bus_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                                      

            </div>

          </div>

        </div> -->

      </div>

      <hr/>

<!--         <div class="row">

          <div class="form-check">

            <input type="checkbox" class="form-check-input" id="bus_round_trip" checked="checked">

            <label class="form-check-label" for="exampleCheck1">

              <h6>Round trip</h6>

              <p>Uncheck if your journey continues on another booking</p>

            </label>

          </div>          

        </div>

      <hr/> -->

      <div class="row">

        <div class="col-md-12">

          <!-- 19-01-2022<p>We will remove <span id="total_emission_bus"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>-->

        </div>        

        <div class="col-md-12">

          <h5><a href="#">Hide carbon calculation</a></h5>

        </div>

      </div>

      <div class="row">

        <div class="col-md-12">

            <p>Total Distance: <span id="bus_station_distance"></span></p>

        </div>

      </div>





    </div>

    <div id="menu1" class="container tab-pane fade"><br>

      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">

        <div class="col-md-12">

          <h5>

            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;

          Departing from <span id="departing_rail_station"></span></h5>          

        </div>

      </div>

      <div class="row">

        <div class="col-md-9">

          <div class="row">

<!--            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="rail_transfer_departure_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="rail_departure_transfer_spn">Driving</span>

                </p>

            </div> -->
<input type="hidden" id="vehicle_for_rail" value="" />
            <div class="col-md-3 custom_animate">
                    <p>  
                      <div class="custom_animate">
                        <div id="box8">      
                          <div class="change_label">Change?</div>    
                          <span id="btn8"><i class="fa fa-car" id="rail_transfer_departure_icon" aria-hidden="true"></i>
                          </span>&nbsp;&nbsp;

                          <span id="rail_departure_transfer_spn">Driving</span>
                         
                          <ul id="box8_list">
                            <?php 
                                if($land_vehicle) {
                                    foreach($land_vehicle as $lv) {
                            ?>
                                <li class="list-item">
                                    <a class="list-item-link" onclick="getVehicleFactorForRail('<?php echo $lv['id'] ?>','<?php echo $lv['icon']; ?>','<?php echo $lv['title']; ?>')">
                                        <img src="<?php echo base_url() ?>/public/brand/assets//custom_img/<?php echo $lv['vehicle_image']; ?>">
                                    </a>
                                </li>
                            <?php            
                                    }
                                }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </p>


            </div>

<!--            <div class="col-md-4">



            <select class="form-control" id="vehicle_for_rail" onchange="getVehicleFactorForRail(this)">



                <option value="0">Select Vehicle</option>

<?php 

    if($land_vehicle) {

        foreach($land_vehicle as $lv) {

?>

            <option value="<?php echo $lv['id']; ?>" data-title="<?php echo $lv['vehicle_name']; ?>"><?php echo $lv['vehicle_name']; ?></option>

<?php            

        }

    }

?>



              </select>              

            </div> -->

            <div class="col-md-3">

<!--               <select class="form-control" id="rail_transfer_departure_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>               -->

              <select class="form-control" name="factor_2"id="rail_departure_transfer">

                <option value="0">Select Factor</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_rail_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="rail_departure_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <i id="rail_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          

            </div>

          </div>

        </div>

      </div>

      <div class="row" style="margin-top:10px;">

        <div class="col-md-9">

          <div class="row">

        <div class="col-md-3">

          <p>        

            <span>

              <i class="fa fa-bus" aria-hidden="true"></i>

            </span>&nbsp;&nbsp;

            Train From

          </p>

        </div>

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="departure_rail_station" onchange="find_distance_between_rail_station()">

                <option>Select Rail Station</option>

              </select>

          </div>          

        </div>

        <div class="col-md-1"><p>to</p></div>

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="arrival_rail_station" onchange="find_distance_between_rail_station()">

                <option>Select Rail Station</option>

              </select>

          </div>          

        </div>          

        </div>

      </div>

      <div class="col-md-3" style="text-align:right;">

        <div class="row">

          <div class="col-md-10">

            <p><span id="rail_distance_emission">0</span> kg</p>            

          </div>

          <div class="col-md-2">

            <span>

              <i id="rail_riding_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

            </span>                          

          </div>

        </div>

      </div>

      </div>

      <div class="row">

        <div class="col-md-9">

          <div class="row">

<!--            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="rail_transfer_arrival_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="rail_arrival_transfer_spn">Driving</span>

                </p>

            </div> -->
<input type="hidden" id="vehicle_for_rail_arrival" value="" />
            <div class="col-md-3 custom_animate">
                    <p>  
                      <div class="custom_animate">
                        <div id="box9">      
                          <div class="change_label">Change?</div>    
                          <span id="btn9"><i class="fa fa-car" id="rail_transfer_arrival_icon" aria-hidden="true"></i>
                          </span>&nbsp;&nbsp;

                          <span id="rail_arrival_transfer_spn">Driving</span>
                         
                          <ul id="box9_list">
                            <?php 
                                if($land_vehicle) {
                                    foreach($land_vehicle as $lv) {
                            ?>
                                <li class="list-item">
                                    <a class="list-item-link" onclick="getVehicleFactorForRailArrival('<?php echo $lv['id'] ?>','<?php echo $lv['icon']; ?>','<?php echo $lv['title']; ?>')">
                                        <img src="<?php echo base_url() ?>/public/brand/assets//custom_img/<?php echo $lv['vehicle_image']; ?>">
                                    </a>
                                </li>
                            <?php            
                                    }
                                }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </p>


            </div>

<!--            <div class="col-md-4">


            <select class="form-control" id="vehicle_for_rail_arrival" onchange="getVehicleFactorForRailArrival(this)">



                <option value="0">Select Vehicle</option>

<?php 

    if($land_vehicle) {

        foreach($land_vehicle as $lv) {

?>

            <option value="<?php echo $lv['id']; ?>" data-title="<?php echo $lv['vehicle_name']; ?>"><?php echo $lv['vehicle_name']; ?></option>

<?php            

        }

    }

?>



              </select>              

            </div> -->

            <div class="col-md-3">

<!--               <select class="form-control" id="rail_transfer_arrival_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>               -->

              <select class="form-control" name="factor_3"id="rail_arrival_transfer">

                <option value="0">Select Factor</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_arrival_rail_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="rail_arrival_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="rail_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                        

            </div>

          </div>

        </div>

      </div>

      <div class="row" style="margin-top: 10px;">

        <div class="col-md-9">

          <h5>

            <span>

              <i class="fa fa-building" aria-hidden="true"></i>              

            </span>&nbsp;&nbsp;

            Arriving at <span id="arriving_rail_station"></span>

          </h5>          

        </div>

        <div class="col-md-3" style="text-align:right;">

          <div class="row">

            <div class="col-md-10">

              <p><span id="rail_hotel_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="rail_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                                      

            </div>

          </div>

        </div>

      </div>

      <hr/>

<!--         <div class="row">

          <div class="form-check">

            <input type="checkbox" class="form-check-input" id="rail_round_trip">

            <label class="form-check-label" for="exampleCheck1">

              <h6>Round trip</h6>

              <p>Uncheck if your journey continues on another booking</p>

            </label>

          </div>          

        </div> -->

<!--       <hr/> -->

      <div class="row">

        <!--<div class="col-md-12">-->

        <!--  <p>We will remove <span id="total_emission_rail"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>-->

        <!--</div>        -->

        <div class="col-md-12">

          <h5><a href="#">Hide carbon calculation</a></h5>

        </div>

      </div>

      <div class="row">

        <div class="col-md-12">

            <p>Distance: <span id="rail_station_distance"></span></p>

        </div>

      </div>





    </div>

    <div id="menu2" class="container tab-pane fade"><br>

      <h3>Menu 2</h3>

      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>

    </div>

    <div id="air_tab" class="container tab-pane fade">

      <div class="row" style="margin-bottom: 10px;margin-top: 10px;">

        <div class="col-md-12">

          <h5>

            <span><i class="fa fa-home" aria-hidden="true"></i></span>&nbsp;&nbsp;

          Departing from <span id="departing_airport"></span></h5>          

        </div>

      </div>

      <div class="row">

        <div class="col-md-9">

          <div class="row">

<!--            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="transfer_departure_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="airport_departure_transfer_spn">Driving</span>

                </p>

            </div> -->
            <input type="hidden" id="vehicle_for_airport" value="" />
            <div class="col-md-3 custom_animate">
                    <p>  
                      <div class="custom_animate">
                        <div id="box10">      
                          <div class="change_label">Change?</div>    
                          <span id="btn10"><i class="fa fa-car" id="transfer_departure_icon" aria-hidden="true"></i>
                          </span>&nbsp;&nbsp;

                          <span id="airport_departure_transfer_spn">Driving</span>
                         
                          <ul id="box10_list">
                            <?php 
                                if($land_vehicle) {
                                    foreach($land_vehicle as $lv) {
                            ?>
                                <li class="list-item">
                                    <a class="list-item-link" onclick="getVehicleFactorForAirport('<?php echo $lv['id'] ?>','<?php echo $lv['icon']; ?>','<?php echo $lv['title']; ?>')">
                                        <img src="<?php echo base_url() ?>/public/brand/assets//custom_img/<?php echo $lv['vehicle_image']; ?>">
                                    </a>
                                </li>
                            <?php            
                                    }
                                }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </p>


            </div>

<!--            <div class="col-md-4">

            <select class="form-control" id="vehicle_for_airport" onchange="getVehicleFactorForAirport(this)">



                <option value="0">Select Vehicle</option>

<?php 

    if($land_vehicle) {

        foreach($land_vehicle as $lv) {

?>

            <option value="<?php echo $lv['id']; ?>" data-title="<?php echo $lv['vehicle_name']; ?>"><?php echo $lv['vehicle_name']; ?></option>

<?php            

        }

    }

?>



              </select>              

            </div> -->

            <div class="col-md-3">

<!--               <select class="form-control" id="airport_transfer_departure_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>               -->

              <select class="form-control" name="factor_4"id="airport_departure_transfer">

                <option value="0">Select Factor</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_airport_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="airport_departure_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <i id="airport_departure_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>                          

            </div>

          </div>

        </div>

      </div>

      <div class="row" style="margin-top:10px;">

        <div class="col-md-9">

          <div class="row">

        <div class="col-md-3">

          <p>        

            <span>

              <i class="fa fa-bus" aria-hidden="true"></i>

            </span>&nbsp;&nbsp;

            Flying

          </p>

        </div>

<!--        <div class="col-md-3">

          <div class="form-group">

              <select class="form-control" id="flying_class" name="trip_class" onchange="find_air_distance()">

                <option value="economy">economy</option>

                <option value="premium">premium</option>

                <option value="business">business</option>

                <option value="first">first</option>

              </select>

          </div>          

        </div> -->

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="departure_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>

        <div class="col-md-1"><p>to</p></div>

        <div class="col-md-4">

          <div class="form-group">

              <select class="form-control" id="arrival_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>          

        </div>

      </div>

      <div class="col-md-3" style="text-align:right;">

        <div class="row">

          <div class="col-md-10">

            <p><span id="airport_distance_emission">0</span> kg</p>            

          </div>

          <div class="col-md-2">

            <span>

              <i id="airport_flying_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

            </span>                          

          </div>

        </div>

      </div>

      </div>

<!--      <div class="row">

        <div class="col-md-6">

          <div class="form-group">

              <label>From</label>

              <select class="form-control" id="departure_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>

        <div class="col-md-6">

          <div class="form-group">

              <label>To</label>

              <select class="form-control" id="arrival_airport" onchange="find_air_distance()">

                <option>Select Airport</option>

              </select>

          </div>          

        </div>

      </div> -->

      <div class="row">

        <div class="col-md-9">

          <div class="row">

<!--            <div class="col-md-3">

              <p>        

                <span><i class="fa fa-car" id="transfer_arrival_icon" aria-hidden="true"></i>

                </span>&nbsp;&nbsp;

                  <span id="airport_arrival_transfer_spn">Driving</span>

                </p>

            </div> -->
            <input type="hidden" id="vehicle_for_airport_arrival" value="" />
            <div class="col-md-3 custom_animate">
                    <p>  
                      <div class="custom_animate">
                        <div id="box11">      
                          <div class="change_label">Change?</div>    
                          <span id="btn11"><i class="fa fa-car" id="transfer_arrival_icon" aria-hidden="true"></i>
                          </span>&nbsp;&nbsp;

                          <span id="airport_arrival_transfer_spn">Driving</span>
                         
                          <ul id="box11_list">
                            <?php 
                                if($land_vehicle) {
                                    foreach($land_vehicle as $lv) {
                            ?>
                                <li class="list-item">
                                    <a class="list-item-link" onclick="getVehicleFactorForAirportArrival('<?php echo $lv['id'] ?>','<?php echo $lv['icon']; ?>','<?php echo $lv['title']; ?>')">
                                        <img src="<?php echo base_url() ?>/public/brand/assets//custom_img/<?php echo $lv['vehicle_image']; ?>">
                                    </a>
                                </li>
                            <?php            
                                    }
                                }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </p>


            </div>

<!--            <div class="col-md-4">

            <select class="form-control" id="vehicle_for_airport_arrival" onchange="getVehicleFactorForAirportArrival(this)">



                <option value="0">Select Vehicle</option>

<?php 

    if($land_vehicle) {

        foreach($land_vehicle as $lv) {

?>

            <option value="<?php echo $lv['id']; ?>" data-title="<?php echo $lv['vehicle_name']; ?>"><?php echo $lv['vehicle_name']; ?></option>

<?php            

        }

    }

?>



              </select>              

            </div> -->

            <div class="col-md-3">

<!--               <select class="form-control" id="airport_transfer_arrival_fuel">

                <option>petrol</option>

                <option>diesel</option>

                <option>hybrid</option>

                <option>electric</option>

              </select>               -->

              <select class="form-control" name="factor_5"id="airport_arrival_transfer">

                <option value="0">Select Factor</option>

              </select>              

            </div>

            <div class="col-md-2">

              <p><span id="location_arrival_airport_distance">0</span> km</p>

            </div>

          </div>

        </div>

        <div class="col-md-3" style="text-align: right">

          <div class="row">

            <div class="col-md-10">

              <p><span id="airport_arrival_distane_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="airport_arrival_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                        

            </div>

          </div>

        </div>

      </div>

      <div class="row" style="margin-top: 10px;">

        <div class="col-md-9">

          <h5>

            <span>

              <i class="fa fa-building" aria-hidden="true"></i>              

            </span>&nbsp;&nbsp;

            Arriving at <span id="arriving_airport"></span>

          </h5>          

        </div>

        <div class="col-md-3" style="text-align:right;">

          <div class="row">

            <div class="col-md-10">

              <p><span id="airport_hotel_emission">0</span> kg</p>              

            </div>

            <div class="col-md-2">

              <span>

                <i id="airport_hotel_tooltip" class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" data-html="true"></i>            

              </span>                                                      

            </div>

          </div>

        </div>

      </div>

      <hr/>

<!--         <div class="row">

          <div class="form-check">

            <input type="checkbox" class="form-check-input" id="airport_round_trip"  name="trip_status" value="1">

            <label class="form-check-label" for="exampleCheck1">

              <h6>Round trip</h6>

              <p>Uncheck if your journey continues on another booking</p>

            </label>

          </div>          

        </div>

      <hr/> -->

      <div class="row">

        <div class="col-md-12">

            <!--<p>19-01-2022We will remove <span id="total_emission_airport"></span> kg of CO₂ to make your entire trip Net Zero, for free!</p>-->

        </div>        

        <div class="col-md-12">

          <h5><a href="#">Hide carbon calculation</a></h5>

        </div>

      </div>

      <div class="row">

        <div class="col-md-12">

            <p>Distance: <span id="airport_distance"></span></p>

        </div>

      </div>

    </div>

  </div>

    </div>

  </div>





<!-- Transport End -->









<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">Transport Type</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Type of Transport"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                <select class="form-control" id="transport_type" name="transport_type">

                                    <option value="0">Select Transport Type</option>

                                    <option value="inward_transport">Inward Transport</option>

                                    <option value="process_transport">Process Transport</option>

                                    <option value="outward_transport">Outward Transport</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div> -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">Mileage</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Distance covered by particular vehicles"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                    <input type="text" class="mr-2" name="mileage" id="mileage">

                                                    <select class="form-control" id="exampleFormControlSelect1">

                                                        <option>km</option>

                                                        <option>miles</option>                                                        

                                                    </select>

                                                </div>

                                            </div>

                                        </div> -->

<!--                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">Choose vehicle</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Type of vehicle .... year ........ & model to identity .... efficiency"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field">

                                                    <select class="form-control" id="vehicle" name="vehicle" onchange="getYearByTransport(this)">

                            <option value="0">Select Vehicle</option>

                            <?php 

                                if($comp_vehicle) {

                                    foreach($comp_vehicle as $cv) {

                            ?>

                            <option value="<?php echo $cv['vid']; ?>"><?php echo $cv['vehicle_name']; ?></option>

                            <?php                                        

                                    }

                                }

                            ?>                                     

                                                    </select>

                                                </div>

                                            </div>

                                        </div> -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">                                                

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">                                                    

                                                    <select class="form-control" id="vehicle_info_1" name="vehicle_info_1" onchange="getTypeOfTransportation(this)">

                                                        <option value="0">Select year</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div> -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">                                                

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">                                                    

                                                    <select class="form-control" id="vehicle_info_2" name="vehicle_info_2" onchange="getModelOfTransportation(this)">

                                                        <option value="0">select type</option>                                                      

                                                    </select>

                                                </div>

                                            </div>

                                        </div>  -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">                                                

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">                                                    

                                                    <select class="form-control" id="vehicle_info_3" name="vehicle_info_3" onchange="getGhgFactorOfTransportation(this)">

                                                        <option value="0">select Model</option>                                                      

                                                    </select>

                                                </div>

                                            </div>

                                        </div>  -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">                                                

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">    -->                                                

<!--         <select class="form-control" id="vehicle_info_3" name="vehicle_info_3" onchange="getEfficiencyOfCompanyVehicle(this)">

            <option value="0">Select model</option>                                                      

        </select> -->

<!--<select class="form-control" id="transport_factor" name="transport_factor">

    <option value="0"></option>

</select>



                                                </div>

                                            </div>

                                        </div> -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">                                                

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">                                                    

                                                    <select class="form-control" id="vehicle_info_4" name="vehicle_info_4" onchange="getEfficiencyOfCompanyVehicle(this)">

                                                        <option>Select derivative</option>                                                      

                                                    </select>

                                                </div>

                                            </div>

                                        </div> -->

<!--                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">Or enter efficiency</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Efficiency average of the particular vehicle"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                    <input type="number" class="mr-2" name="efficiency" id="efficiency" onkeyup="resetVehicle()">

                                                    <select class="form-control mr-2" id="exampleFormControlSelect1">

                                                        <option>g/km</option>

                                                        <option>L/100km</option>   

                                                        <option>mpg UK</option>                                                       

                                                        <option>mpg US</option>                                                 

                                                    </select>

<select class="form-control" id="transport_factor" name="transport_factor">

    <option value="0">Select Factor</option>

<?php 

    if($ghg_factor) {

        foreach($ghg_factor as $gf) {

            if($gf['ghg_id']==22) {

?>

<option value="<?php echo $gf['id']; ?>"><?php echo $gf['factor_name']; ?></option>

<?php                

            }

        }

    }

?>                                           

</select>

                                                </div> 

                                            </div>

                                        </div>  -->


                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_transport_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="transport_footprint">

<?php 

    if($tot_transport_footprint<1000) {

        echo ($tot_transport_footprint)." kgs ";

    } 

    else {

        echo ($tot_transport_footprint/1000)." tonnes ";

    }

?>

                                                </span> 
                                                
                                                
                                                CO2e :
                                             
Estimate Emissions of Transportation of Material from <span id="transportation_from"></span> <span id="trip_from"></span>
                                        	<span id="arriving_airport"></span> </h5>
<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="resetTransportFootprint()"><span aria-hidden="true">×</span></button> -->

                                            </div> 

                                            <div id="transport_footprint_estimation">

                            <?php 

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gd['ghg_id']==22) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>

    <?php 

        if($gd['estimate']<1000) {

            echo $gd['estimate']." kgs ";

        } 

        else {

            echo ($gd['estimate']/1000)." tonnes ";

        }

    ?>

                                </span> CO2e :	Estimate Emissions of 4120 Transportation of <?php echo $gd['id']; ?>Material

    <?php 

        echo 'from '.$gd['transportation_from'].' to '.$gd['transportation_to'];

    ?> via LAND/RAIL/AIR/SEA
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeTransportFactor('<?php echo $gd['id'] ?>','<?php echo $gd['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

                            </div>

                            <?php

                                        }

                                    }

                                }

                            ?>

                        </div>                                             

                                        </div>                          

                                        <div class="step_form_btns text-right">

                                            <button type="button" class="btnNext btn btn-outline-success" onclick="submitProductFootprint()">Submit</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>

                                    </div>  

                                    </form>

<!--                                    <form  class="stepped" action="<?php echo  base_url() ?>/brand/productManufacturing3AssessmentSubmit" method="post" id="manufacturing3_frm">

            <input type="hidden" id="manuf3_ghg_assessment_id" name="ghg_assessment_id" value="<?php echo $ghg_assessment_id; ?>" />

            <input type="hidden" id="mf3_ghg_id" name="ghg_id" value="25" />

                                        <div class="steps step_6">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-car" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">End of Life</div>

                                                <div class="form_title_sub">

                                                    You can enter details for all manufacturing process etc directly for the product

                                                    <br>

                                                    Enter your usage of each type of fuel, and press the Calculate button

                                                </div>

                                            </div>

                                        </div> 

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

                        Service Period of the product 

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

<select class="form-control" name="service_period" id="service_period">

    <option value="0">Select Service Period</option>

<?php 

    for($i=1;$i<=25;$i++) {

        $slt="";

        if($ghg_assessment_detail) {

            foreach($ghg_assessment_detail as $gad) {

                if($gad['ghg_id']==25) {

                    if($gad['product_service_period']==$i) {

                        $slt="selected";

                    }

                }

            }

        }

?>

    <option value="<?php echo $i; ?>" <?php echo $slt; ?>><?php echo $i; ?></option>

<?php        

    }

?>

</select>

                                                </div>

                                            </div>

                                        </div>            

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

        What percentage of waste in the raw material

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

<?php

$waste_mater_per = 1;

        if($ghg_assessment_detail) {

            foreach($ghg_assessment_detail as $gad) {

                if($gad['ghg_id']==25) {

                    $waste_mater_per = $gad['waste_raw_material_per'];

                    }

                }

            }

?>

<input type="number" name="per_raw_material" id="per_raw_material" max="100" min="1" value="<?php echo $waste_mater_per; ?>" />

                                                </div>

                                            </div>

                                        </div>            

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

        What happens with the final products end of life 

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                    <div class="theme_field step_three_column column_shor">

<div class="stc_left">

    <select class="form-control" name="waste_prod" id="waste_prod">

        <option value="0">Select Waste</option>

<?php 

    if($ghg_factor) {

        foreach($ghg_factor as $gf) {

            $slt="";

            if($gf['ghg_id']==25) {

                if($ghg_assessment_detail) {

                    foreach($ghg_assessment_detail as $gad) {

                        if($gad['ghg_id']==25) {

                            if($gad['waste_product']==$gf['id']) {

                                $slt="selected";

                            }

                        }

                    }

                }

?>

<option value="<?php echo $gf['id']; ?>" <?php echo $slt; ?>><?php echo $gf['factor_name']; ?></option>

<?php                

            }

        }

    }

?>                                           

    </select>    

</div>



                    </div>

                                            </div>

                                        </div>            

                                         <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_manufacturing3_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="manufacturing3_footprint">

<?php 

    if($tot_manufacturing3_footprint<1000) {

        echo $tot_manufacturing3_footprint." kgs ";

    }

    else {

        echo ($tot_manufacturing3_footprint/1000)." tonnes ";

    }

?>

                                                </span> CO2e : Estimate of End of Life's footprint



                                            </div>

                                            <div id="manufacturing3_footprint_estimation">



                        </div>

                                        </div>                           

                                        <div class="step_form_btns text-right">

                                            <button type="button" class="btnNext btn btn-outline-success" id="submit_btn" onclick="submitProductFootprint()" 

                        <?php echo $tot_manufacturing3_footprint?'':'disabled=disabled' ?>>Submit</button>

                                        </div>

                                    </div>                                

                                    </form> -->

                                </div>

                            </div>

                            <div class="step_form_btns text-right">

                                <button type="button" class="btnPrev btn btn-outline-success">Previous</button>

<!--                                 <button type="button" class="btnNext btn btn-outline-success">Next</button> -->

<!--                                 <div id="tab2">next</div> -->

                            </div>

                        </div>

                            

                        

                        

                    </div>

                </div>



<?php            

        }

    else {

?>                

                <div class="" id="tab2c">

                    <div class="col-sm-12">

<?php 

    if($supp_assess['is_verify']==0) {

?>

                        <div class="confirm_box">

                            <div class="cb_single">

                                <div class="cb_left"><span>

<?php 

    if(session()->get('supplier_info')) {

        echo session()->get('supplier_info')['brand_name'];

    }

?>                                                                        

                                </span></div>

                                <div class="cb_right">

                                    <div class="admin_btn" data-toggle="modal" data-target="#confirmModal">

                                        <input type="button" value="Verify" onclick="verifyProductFootprint('<?php echo $supp_assess['id']; ?>')">    

                                    </div>

                                </div>

                            </div>
<div class="modal fade custom_modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered" role="document">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Confirmation </h5>

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                    </div>

<div class="modal-body" id="confirm_modal_bdy">

                                        <span id="confirm_modal_spn"></span>

                                        <a id="go_to_upload_doc" class="btn btn-primary upload_doc" href="<?php base_url() ?>/supplier/document" class="btn">Upload Document</a>

                                    
                                    </div>
                                    
                                    <div class="modal-body" id="thank">

                                        <h6>Thank you for submission, Your assessment is under verification</h6>

                                        <button class="btn btn-primary">Company</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                            <div class="cb_single mt-2">

                                <div class="cb_left">

<?php 

    echo $supp_assess['date_from'].' - '.$supp_assess['date_to'];

?>                                                                        

                                </div>

                                <div class="cb_right">

                                    <div class="undo" id="tab1"><u onclick="undoProductFootprint('<?php echo $supp_assess['id']; ?>')">Undo</u></div>

                                </div>

                            </div>

                        </div>

<?php        

    }

?>


<?php 

    if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==0) {

?>



                        <div class="confirm_box">

                            <div class="cb_single">

                                <div class="cb_left"><span>

<?php 

    if(session()->get('supplier_info')) {

        echo session()->get('supplier_info')['brand_name'];

    }

?>                                    

                                </span></div>

                                <div class="cb_right">

                                    <div class="admin_btn" data-toggle="modal" data-target="#">

<!--                                         <input type="button" value="Verify" onclick="verifyCompanyFootprint()">     -->

                                    </div>

                                </div>

                            </div>

                            <div class="cb_single mt-2">

                                <div class="cb_left">

<?php 

    echo $supp_assess['date_from'].' - '.$supp_assess['date_to'];

?>                                    

<p></p>

<p>Your assessment is under verification</p>

                                </div>

                                <div class="cb_right">

                                    <div class="undo" id="tab1">

<!--                                     <u onclick="undoCompanyFootprint()">Undo</u> -->

                                    </div>

                                </div>

                            </div>

                        </div>

<?php        

    }

?>

<?php 

    if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==1) {

?>

                        <div class="accordion custom_accordion round_accordion" id="accordionRightIcon" style="display:none;">

                            <div class="card custom_tab">

                                <div class="card-header header-elements-inline">

                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

                                        <a class="text-default" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="true"><span></span>

<?php 

    if(session()->get('supplier_info')) {

        echo session()->get('supplier_info')['brand_name'];

    }

?>

                                        </a>

<!--                                         <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i> -->

                                    </h6>

                                </div> 

                                <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="">

                                    <div class="card-body">

                                        <div class="custom_tab">

                                            <ul class="nav nav-pills" id="myPillTab" role="tablist">

                                                <li class="nav-item"><a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#Result" role="tab" aria-controls="homePIll" aria-selected="false">Result</a></li>

                                                <li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Target" role="tab" aria-controls="profilePIll" aria-selected="false">Target</a></li>

                                                <li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Offset" role="tab" aria-controls="contactPIll" aria-selected="true">Offset</a></li>

                                            </ul> 

                                            <div class="tab-content" id="myPillTabContent">

                                                <div class="tab-pane fade active show" id="Result" role="tabpanel" aria-labelledby="home-icon-pill">



<!-- <div class="row">

    <div class="col-md-6" style="border-right: solid 1px black;">

    <h3>Ghg Category(In percentage(%))</h3>

    <div id="ghgCategoryPie" style="height: 300px;"></div>        

    </div>

    <div class="col-md-6">

    <h3>Top in each Ghg(In percentage(%))</h3>

    <div id="topStagePie" style="height: 300px;"></div>        

    </div>

</div> -->

                                                </div>

                                                <div class="tab-pane fade show" id="Target" role="tabpanel" aria-labelledby="home-icon-pill">

                                                <div class="accordion_table">

                                                     <div class="table-responsive">

                                                        <table class="table">

                                                                <thead>

                                                                    <tr>

                                                                        <th scope="col">Category</th>

                                                                        <th scope="col">Sub Category</th>

<!--                                                                         <th scope="col">Status</th>    

                                                                        <th scope="col">Document</th> -->

                                                                        <th scope="col">Status</th>

                                                                        <th scope="col">Remark</th>    

<!--                                                                         <th scope="col" class="float-right">Action</th> -->                                                                                                                             

                                                                    </tr>

                                                                </thead>

                                                                <tbody>

<?php

    if($ghg) {

        foreach($ghg as $g) {

            if($ghg_assessment_detail) {

                foreach($ghg_assessment_detail as $gad) {

                    if($gad['ghg_id']==$g['id']) {

?>

                        <tr>                                                      

                            <td>

<?php echo $g['ghg_name']; ?>                                

                            </td>

                            <td>

<?php 

    if($ghg_factor) {

        foreach($ghg_factor as $gf) {

            if($gf['id']==$gad['factor_id']) {

?>

<?php echo $gf['factor_name']; ?>

<?php

            }

        }

    }

?>                                

                            </td>

                            <td>

<?php 

    if($degree) {

        foreach($degree as $deg) {

            if($deg['id']==$gad['degree_id']) {

                $cls="";

                if($deg['id']==1) {

                    $cls="status_bg high_bg";

                }

                if($deg['id']==5) {

                    $cls="status_bg low_bg";                    

                }

                if($deg['id']==6) {

                    $cls="status_bg good_bg";                    

                }

                if($deg['id']==7) {

                    $cls="status_bg exc_bg";                    

                }

                if($deg['id']==4) {

                    

                }

?>

                <div class="<?php echo $cls; ?>">

                    <?php echo $deg['name']; ?>

                </div>

<?php

            }

        }

    }

?>                                

                            </td>

                            <td>

            <?php echo $gad['remark']; ?>                                

                            </td>    

<!--                            <td class="doc_action">                                            

                                <a href="" data-toggle="modal" data-target="#docEditePopup">

                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                </a>&nbsp;&nbsp;

                                <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                </a>

                            </td>      -->                                                                  

                        </tr>

<?php                        

                    }

                }

            }

        }

    }

?>

<!--                                                                    <tr>                                                            

                                                                        <td>Category name 1</td>

                                                                        <td>Sub Cat name 1</td>

                                                                        <td><div class="status_bg high_bg">High</div></td>   

                                                                        <td>Document here</td>  

                                                                        <td>Remark here</td>    

                                                                        <td class="doc_action"d><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>                                                                      

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 2</td>

                                                                        <td>Sub Cat name 2</td>

                                                                        <td><div class="status_bg medium_bg">Medium</div></td>  

                                                                        <td>Document here</td>

                                                                        <td>Remark here</td>  

                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 3</td>

                                                                        <td>Sub Cat name 3</td>

                                                                        <td><div class="status_bg low_bg">Low</div></td> 

                                                                        <td>Document here</td> 

                                                                        <td>Remark here</td> 

                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 4</td>

                                                                        <td>Sub Cat name 4</td>

                                                                        <td><div class="status_bg low_bg">Low</div></td> 

                                                                        <td>Document here</td> 

                                                                        <td>Remark here</td> 

                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 5</td>

                                                                        <td>Sub Cat name 5</td>

                                                                        <td><div class="status_bg low_bg">Low</div></td> 

                                                                        <td>Document here</td> 

                                                                        <td>Remark here</td>                                                             

                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td> 

                                                                        <div class="modal fade custom_modal action_modal create_modal doc_create" id="docEditePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                                                                            <div class="modal-dialog modal-dialog-centered" role="document">

                                                                                <div class="modal-content">

                                                                                    <div class="modal-header">

                                                                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Edit Document</h5>

                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                                                                    </div>

                                                                                    <div class="modal-body">

                                                                                        <div class="create_doc_form">

                                                                                            <div class="theme_field">

                                                                                                <div class="d-flex">

                                                                                                    <div class="form_6">

                                                                                                        <div class="theme_form_label">

                                                                                                            Document Name

                                                                                                        </div>

                                                                                                        <div class="form-group">

                                                                                                            <input type="text" value="Name typed here">

                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div class="form_center"></div>

                                                                                                    <div class="form_6 doc_top_margin">

                                                                                                        <div class="theme_form_label">

                                                                                                            Type

                                                                                                        </div>

                                                                                                        <div class="form-group">

                                                                                                            <input type="text" value="Typed here">

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                            <div class="doc_upload">

                                                                                                <input type="file" class="form-control" id="customFile">

                                                                                            </div>

                                                                                            <div class="admin_btn mt-4">

                                                                                                <input type="button" value="Update">    

                                                                                            </div>

                                                                                        </div>

                                                                                        

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div> 



                                                                        <div class="modal fade custom_modal action_modal create_modal doc_create" id="docDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" style="padding-right: 17px; display: block;">

                                                                            <div class="modal-dialog modal-dialog-centered" role="document">

                                                                                <div class="modal-content">

                                                                                    <div class="modal-header">

                                                                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Delete Document</h5>

                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                                                                    </div>

                                                                                    <div class="modal-body">

                                                                                        <div class="doc_delete">

                                                                                            Are you sure you want to delete this document ?

                                                                                            <div class="admin_btn mt-4">

                                                                                                <input type="button" value="Yes">    

                                                                                            </div>

                                                                                        </div>

                                                                                        

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>                                                                         

                                                                    </tr> -->

                                                                </tbody>

                                                            </table>

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="tab-pane fade show" id="Offset" role="tabpanel" aria-labelledby="home-icon-pill">

                                                    <div class="offset_inner">

                                                        <div class="offset_title">

                                                            Carbon ....... Projects

                                                        </div>

                                                        <div class="">

                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 

                                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 

                                                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.

                                                        </div>

<?php 

    if($offset) {

        foreach($offset as $key=>$os) {

            if($key%3==0) {

                if($key!=0) {

?>

                </div>

<?php                    

                }

?>

            <div class="row mt-3">

<?php

            }

?>            

            <div class="col-md-4 col-sm-6">

                <div class="offset_single">

                    <img src="<?php echo base_url() ?>/public/uploads/offset/<?php echo $os['photo'] ?>">

                    <div class="os_title">

                    <?php echo $os['name']; ?>                        

                    </div>

                    <div>

                    <?php echo $os['description']; ?>                        

                    </div>

                    <div class="admin_btn btn_black mt-3">

                        <input type="button" value="Buy">    

                    </div>

                </div>

            </div>



<?php



        }

    }

?>

<!--                                                        <div class="row mt-3">

                                                            <div class="col-md-4 col-sm-6">

                                                                <div class="offset_single">

                                                                    <img src="dist-assets/custom_img/offset_1.jpg">

                                                                    <div class="os_title">Renewable Energy</div>

                                                                    <div>

                                                                        The transition from fossil-based energy production to renewable needs 

                                                                        acceleration, and we support projects that verifiably reduce and 

                                                                        offset emissions through clean energy alternatives.

                                                                    </div>

                                                                    <div class="admin_btn btn_black mt-3">

                                                                        <input type="button" value="Buy">    

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-4 col-sm-6 custom_margin_top_3">

                                                                <div class="offset_single">

                                                                    <img src="dist-assets/custom_img/offset_2.jpg">

                                                                    <div class="os_title">Community Projects</div>

                                                                    <div>

                                                                        Community-focused projects help to address carbon emissions while 

                                                                        supporting the local communities through solutions like improved 

                                                                        cooking technology, improved access to weter, and economic development.

                                                                    </div>

                                                                    <div class="admin_btn btn_black mt-3">

                                                                        <input type="button" value="Buy">    

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-4 col-sm-6 custom_margin_top_2">

                                                                <div class="offset_single">

                                                                    <img src="dist-assets/custom_img/offset_3.jpg">

                                                                    <div class="os_title">Nature-based Solutions</div>

                                                                    <div>

                                                                        Nature has a time-tested ability to absorb and store carbon within the 

                                                                        natural carbon cycle. Nature-based solutions include projects focused 

                                                                        on reforestation and afforestation.

                                                                    </div>

                                                                    <div class="admin_btn btn_black mt-3">

                                                                        <input type="button" value="Buy">    

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div> -->

                                                    </div>

                                                </div>

                                            </div>

                                        </div>                                        

                                    </div>

                                </div>

                            </div>                            

                        </div>

<?php        

    }

?>

                    </div>

                </div>
<hr>
<?php        

    if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==1) { 

?>
    <div class="row">
    <div class="col-md-6">

        <div class="card mb-4">

            <div class="card-body">

                <div class="card-title">Ghg(In percentage(%))</div>

                <div id="ghgCategoryPie" style="height: 300px;"></div>       
                

            </div>

        </div>

    </div>
    <div class="col-md-6">

            <div class="card mb-4">

                <div class="card-body">

                    <div class="card-title">Ghg Category(In percentage(%))</div>

                    <div id="topStagePie" style="height: 300px;"></div>        

                </div>

            </div>

        </div>
    </div>

   
    <div class="row">
    <div class="col-md-12">

        <div class="card mb-4">

            <div class="card-body table_bg_color">

                <div class="card-title">Top in each stage</div>

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th scope="col">#</th>

                                <th scope="col">Scope</th>

                                <th scope="col">Ghg</th>

                                <th scope="col">Factor</th>

                                <th scope="col">Amount</th>    

                                                                                                  

                            </tr>

                        </thead>
                        
                        <div class="table_border"> </div>

                        <tbody>

<?php 

    if($top_in_each_stage) {

        $i=1;

        foreach($top_in_each_stage as $ties) {

?>

<tr>

<td><?php echo $i++; ?></td>

<td><?php echo $ties['ghg_category_name']; ?></td>

<td><?php echo $ties['ghg_name']; ?></td>

<td><?php echo $ties['factor_name']; ?></td>

<td>

    <?php 

        if($ties['value']<1000) {
$u= number_format($ties['value'],2,".",".");
            echo ($u)." kgs CO2e";

        } 

        else {

            echo ($ties['value']/1000)." tonnes CO2e";

        }

    ?>

        

</td>

</tr>

<?php            

        }

    }

?>                    

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
    </div>

        

    

<?php

    }

    }

// }

?>                

            </div>

        </div>



<!-- step form start-->

<script>

    document.addEventListener("DOMContentLoaded", () => {

     class MultiStep {

      constructor(formId) {

       let myForm = document.querySelector(formId),

        steps = myForm.querySelectorAll(".steps"),

        btnPrev = myForm.querySelector(".btnPrev"),

        btnNext = myForm.querySelectorAll(".btnNext"),

        indicators = myForm.querySelectorAll(".rounded-circle"),

        inputClasses = ".form-control",

        currentTab = 0;

    

       // we'll need 4 different functions to do this

       showTab(currentTab);

    

       function showTab(n) {

        steps[n].classList.add("active");

        if (n == 0) {

         btnPrev.classList.add("hidden");

         btnPrev.classList.remove("show");

        } else {

         btnPrev.classList.add("show");

         btnPrev.classList.remove("hidden");

        }

        if (n == steps.length - 1) {

         btnNext.textContent = "Submit";

        } else {

         btnNext.textContent = "Next";

        }

        showIndicators(n);

       }

    

       function showIndicators(n) {

        for (let i = 0; i < indicators.length; i++) {

         indicators[i].classList.replace("bg-warning", "bg-success");

        }

        indicators[n].className += " bg-warning";

       }

    

       function clickerBtn(n) {

        if (n == 1 && !validateForm()) return false;

        steps[currentTab].classList.remove("active");

        currentTab = currentTab + n;

        if (currentTab >= steps.length) {

            myForm.submit();

            return false;

        }

        showTab(currentTab);

       }

    // Do whatever validation you want

       function validateForm() {

        let input = steps[currentTab].querySelectorAll(inputClasses),

         valid = true;

        for (let i = 0; i < input.length; i++) {

         if (input[i].value == "") {

          if (!input[i].classList.contains("invalid")) {

           input[i].classList.add("invalid");

          }

          valid = false;

         }

         if (!input[i].value == "") {

          if (input[i].classList.contains("invalid")) {

           input[i].classList.remove("invalid");

          }

         }

        }

        return valid;

       }

       btnPrev.addEventListener("click", () => {

        clickerBtn(-1);

       });

       for(var i=0;i<=btnNext.length;i++) {

           btnNext[i].addEventListener("click", () => {

            clickerBtn(1);

            });

        }

      }

     }

     let MS = new MultiStep("#tab1c");

    });

</script>

<!-- step form end-->





<div class="modal fade custom_modal action_modal create_modal " id="creatPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Create</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        </div>

                        <div class="modal-body">

                            <div class="create_form">

                                <div class="theme_field">

                                    <div class="d-flex">

                                        <div class="form_6">

                                            <div class="theme_form_label">

                                                Categories

                                            </div>

                                            <div class="form-group">

                                                <select class="form-control" id="exampleFormControlSelect1">

                                                    <option>Category name 1</option>

                                                    <option>Category name 2</option>

                                                    <option>Category name 3</option>

                                                    <option>Category name 4</option>

                                                    <option>Category name 5</option>

                                                    

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form_center">Or</div>

                                        <div class="form_6">

                                            <div class="theme_form_label">

                                                Goals

                                            </div>

                                            <div class="form-group">

                                                <select class="form-control" id="exampleFormControlSelect1">

                                                    <option>Goal 1</option>

                                                    <option>Goal 2</option>

                                                    <option>Goal 3</option>

                                                    <option>Goal 4</option>

                                                    <option>Goal 5</option>

                                                    

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="theme_field">

                                    <div class="theme_form_label mt-3">Suggestions</div>

                                    <div class="q_radio_btn">

                                        <label class="radio radio-primary">

                                            <input type="radio" name="radio" value="0">

                                            <span>

                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum i

                                            </span>

                                            <span class="checkmark"></span>

                                        </label>

                                        <label class="radio radio-primary">

                                            <input type="radio" name="radio" value="0">

                                            <span>

                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy

                                            </span>

                                            <span class="checkmark"></span>

                                        </label>

                                        <label class="radio radio-primary">

                                            <input type="radio" name="radio" value="0">

                                            <span>

                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum i

                                            </span>

                                            <span class="checkmark"></span>

                                        </label>

                                    </div>

                                </div>

                                <div class="theme_field">

                                    <div class="theme_form_label mt-3">

                                        Description 

                                        <img class="icon_info" src="dist-assets/custom_img/icon_info.png">

                                        <div class="info_msg">

                                            Description information here 

                                        </div>

                                    </div>

                                    <textarea class="custom_area" placeholder="Type here...">                                                    </textarea>

                                </div>

                                <div class="theme_field">

                                    <div class="theme_form_label mt-3">Select Due Date</div>

                                    <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input id="datepicker" data-type="datepicker" data-guid="03321e1d-5d0f-ea2a-4153-80015e634f02" data-datepicker="true" class="form-control" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button></span></div>

                                </div>

                            </div>

                            <div class="admin_btn mt-4">

                                <input type="button" value="Yes">    

                            </div>

                        </div>

                    </div>

                </div>

            </div>



<script>

    $(document).ready(function(){

        $( "#date_from" ).datepicker();

        $("#date_to").datepicker();

    });    

</script>



    <!--world map start-->

    <script src="https://www.amcharts.com/lib/4/core.js"></script>

    <script src="https://www.amcharts.com/lib/4/maps.js"></script>

    <script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>

    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!--world map end-->



<?php include("include/footer.php"); ?>

<script>

    var j = jQuery.noConflict();

j(document).ready(function(){

  // j('#tab2c, #tab3c').hide();

		j('#tab1').click(function(){

		j('#tab1c').show();						  

		j('#tab2c, #tab3c').hide();					  

		});

		

		j('#tab2').click(function(){

		j('#tab2c').show();						  

		j('#tab1c, #tab3c').hide();						  

		});

		

		j('#tab3').click(function(){

		j('#tab3c').show();						  

		j('#tab1c, #tab2c').hide();						  

        });

}); 

</script>



<!-- tooltip start -->

<script>

    $(document).ready(function(){

//    $('[data-toggle="tooltip"]').tooltip();   

    });

</script>   

<!-- tooltip end --> 



<!-- Datepicker start -->

<script>

        $("#welcome_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                $("#ghg_assessment_id").val(response);

                $("#flg_ghg_assessment_id").val(response);

                $("#trans_ghg_assessment_id").val(response);

                $("#manuf_ghg_assessment_id").val(response);

                $("#manuf2_ghg_assessment_id").val(response);

                $("#manuf3_ghg_assessment_id").val(response);

                // $("#server-results").html(response);

            });

        });



        $("#building_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#transport_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#manufacturing_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#manufacturing2_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#manufacturing3_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                // alert('ok');

                location.reload();

                // $("#server-results").html(response);

            });

        });

</script>



<script>

    function addMoreFactor() {

//      prod_factor = '<?php // echo $product_factor ?>';

//      $('.factorDiv').append('<div class="step_inner append_row"><div class="theme_field step_label"><select class="form-control label_select" id="exampleFormControlSelect1" name="prod_factor[]">'+prod_factor+'</select></div><div class="step_field"><div class="theme_field step_three_column"><div class="stc_left"><input type="number" placeholder="Enter number" name="qty[]" value=""></div><div class="stc_center"></div><div class="stc_right"><select class="form-control" id="exampleFormControlSelect1" name="unit[]"><option></option></select></div></div></div><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div>');

            event.preventDefault(); //prevent default action 

            var post_url = "<?php echo base_url() ?>/brand/getProductFactor"; //get form action url

            var request_method = "POST"; //get form GET/POST method

            var form_data = $("#building_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                rand_num = rs.rand_num;

                $('.factorDiv').append(rs.res);

                var input = document.getElementById('autocomplete_'+rand_num);

                var trip_from = new google.maps.places.Autocomplete(input);

            });

    }



    $(document).on('click','.remove_factor_block',function(){

        $(this).closest('.step_inner').remove();

    });



    function setUnit(ele) {

        var ele_id = $(ele).val();

        var obj1 = $(ele).parent();

        var obj2 = $(obj1).parent();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getUnit/"+ele_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $(obj2).find("select[name='unit[]']").html(data);

            },

            error: function(xhr, status, error){

                // alert('error');

            }



        });

    }
    
    function setUnitProcess(ele) {

        var ele_id = $(ele).val();

        var obj1 = $(ele).parent();

        var obj2 = $(obj1).parent();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getUnitProcess/"+ele_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $(obj2).find("select[name='process_material_unit[]']").html(data);

            },

            error: function(xhr, status, error){

                // alert('error');

            }



        });

    }



    function calculate_building_footprint() {

        no_of_emp = $("#no_of_employee").val();

        event.preventDefault(); //prevent default action 

        var post_url = "<?php echo base_url() ?>/brand/getBuildingFootprint"; //get form action url

        var request_method = "POST"; //get form GET/POST method

        var form_data = $("#building_frm").serialize(); //Encode form elements for submission

            

        $.ajax({

            url : post_url,

            type: request_method,

            data : form_data

        }).done(function(response){ 

            $("#building_footprint").html(response+" tonnes: Estimate of building's footprint")

        });

    }



        function calculate_manufacturing_footprint() {

            var total_footprint=0;

            var emp = $("#no_of_employee").val();

            var qty = $("input[name='manuf_qty[]']").map(function(){

               return $(this).val();

            }).get();

            var emission_factor = $("input[name='manuf_emission_factor[]']").map(function(){

               return $(this).val();

            }).get();



            for(var i=0;i<qty.length;i++) {

                if(qty[i]) {

                    total_footprint = total_footprint + ( qty[i] * emission_factor[i]);

                }

            }

            $("#manufacturing_footprint").html(total_footprint+" tonnes: Estimate of manufacturing's footprint ");

            // $("#no_of_emp").html(emp);

        }



        function calculate_manufacturing2_footprint() {

            var total_footprint=0;

            var emp = $("#no_of_employee").val();

            var qty = $("input[name='manuf2_qty[]']").map(function(){

               return $(this).val();

            }).get();

            var emission_factor = $("input[name='manuf2_emission_factor[]']").map(function(){

               return $(this).val();

            }).get();



            for(var i=0;i<qty.length;i++) {

                if(qty[i]) {

                    total_footprint = total_footprint + ( qty[i] * emission_factor[i]);

                }

            }

            $("#manufacturing2_footprint").html(total_footprint);

            // $("#no_of_emp").html(emp);

        }



        function calculate_manufacturing3_footprint() {

            var total_footprint=0;

            var emp = $("#no_of_employee").val();

            var qty = $("input[name='manuf3_qty[]']").map(function(){

               return $(this).val();

            }).get();

            var emission_factor = $("input[name='manuf3_emission_factor[]']").map(function(){

               return $(this).val();

            }).get();



            for(var i=0;i<qty.length;i++) {

                if(qty[i]) {

                    total_footprint = total_footprint + ( qty[i] * emission_factor[i]);

                }

            }

            $("#manufacturing3_footprint").html(total_footprint+" tonnes: Estimate of manufacturing3's footprint ");

            // $("#no_of_emp").html(emp);

        }



        function cal_and_add_to_manufacturing_footprint() {

            event.preventDefault(); //prevent default action 

            var post_url = $("#manufacturing_frm").attr("action"); //get form action url

            var request_method = $("#manufacturing_frm").attr("method"); //get form GET/POST method

            var form_data = $("#manufacturing_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                $("#manufacturing_footprint_estimation").html(rs.res);

                $("#manufacturing_footprint").html(rs.tot);

                // alert('ok');

                // $("#server-results").html(response);

            });

            // calculate_manufacturing_footprint();

        }



    function removeManufacturingFactor(id,ghg_factor_id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeManufacturingFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                $("#manufacturing_footprint_estimation").html(rs.res);

                $("#manufacturing_footprint").html(rs.tot);

                $("#manufacturing_factor_qty_"+ghg_factor_id).val("");

                // calculate_manufacturing_footprint();

            },

            error: function(xhr, status, error){

            }



        });

    }        

    function cal_and_add_to_manufacturing2_footprint() {

            // var waste_product = $("#waste_product").val();

            //     $("#waste_product").css("border-color","");

            // if(waste_product=="0") {

            //     $("#waste_product").css("border-color","red");

            //     $("#waste_product").focus();

            //     return;                

            // }

            var post_url = $("#manufacturing2_frm").attr("action"); //get form action url

            var request_method = $("#manufacturing2_frm").attr("method"); //get form GET/POST method

            var form_data = $("#manufacturing2_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                $("#manufacturing2_footprint_estimation").html(rs.res);

                rs_conversion = "";

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";                    

                }

                $("#manufacturing2_footprint").html(rs_conversion);

               // alert('ok');

                // $("#server-results").html(response);

            });

            // calculate_manufacturing2_footprint();        

    }



    function removeManufacturing2Factor(id,ghg_factor_id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeManufacturing2Factor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                $("#manufacturing2_footprint_estimation").html(rs.res);

                $("#manufacturing2_factor_qty_"+ghg_factor_id).val("");

                rs_conversion = "";

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#manufacturing2_footprint").html(rs_conversion);

                // calculate_manufacturing2_footprint();

            },

            error: function(xhr, status, error){

            }



        });

    }        



    function cal_and_add_to_manufacturing3_footprint() {

            var service_period = $("#service_period").val();

            var per_raw_material = $("#per_raw_material").val();

            var waste_prod = $("#waste_prod").val();

            $("#service_period").css("border-color","");

            $("#per_raw_material").css("border-color","");

            $("#waste_prod").css("border-color","");

            if(service_period=="0") {

                $("#service_period").css("border-color","red");

                $("#service_period").focus();

                return;                

            }

            if(per_raw_material=="0") {

                $("#per_raw_material").css("border-color","red");

                $("#per_raw_material").focus();

                return;                

            }

            if(waste_prod=="0") {

                $("#waste_prod").css("border-color","red");

                $("#waste_prod").focus();

                return;                

            }

            var post_url = $("#manufacturing3_frm").attr("action"); //get form action url

            var request_method = $("#manufacturing3_frm").attr("method"); //get form GET/POST method

            var form_data = $("#manufacturing3_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs_conversion = "";

                if(response<1000) {

                    rs_conversion = response+" kgs ";

                }

                else {

                    rs_conversion = (response/1000)+" tonnes ";

                }

                $("#manufacturing3_footprint").html(rs_conversion);

                $("#submit_btn").prop('disabled', false);

            });

            // calculate_manufacturing3_footprint();                

    }



    function removeManufacturing3Factor(id,ghg_factor_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeManufacturing3Factor/"+id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#manufacturing3_footprint_estimation").html(data);

                $("#manufacturing3_factor_qty_"+ghg_factor_id).val("");

                calculate_manufacturing3_footprint();

            },

            error: function(xhr, status, error){

            }



        });

    }        



    function removeTransportFactor(id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeTransportFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                rs_conversion = "";

                if(rs.tot) {

                    rs_conversion = rs.tot+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#transport_footprint").html(rs.tot);

                $("#transport_footprint_estimation").html(rs.res);

            },

            error: function(xhr, status, error){

            }



        });

    }    



    function cal_and_add_to_transport_footprint() {

            var mileage = $("#mileage").val();

            var efficiency = $("#efficiency").val();

            var transport_type = $("#transport_type").val();

            var transport_factor = $("#transport_factor").val();

            var vehicle = $("#vehicle").val();

            var vehicle_info_1 = $("#vehicle_info_1").val();

            var vehicle_info_2 = $("#vehicle_info_2").val();

            var vehicle_info_3 = $("#vehicle_info_3").val();

            $("#mileage").css("border-color","");

            $("#efficiency").css("border-color","");

            $("#transport_type").css("border-color","");

            $("#transport_factor").css("border-color","");

            $("#vehicle").css("border-color","");

            $("#vehicle_info_1").css("border-color","");

            $("#vehicle_info_2").css("border-color","");

            $("#vehicle_info_3").css("border-color","");

            if(transport_type==0) {

                $("#transport_type").css("border-color","red");

                $("#transport_type").focus();

                return;

            }

            if(mileage=="") {

                $("#mileage").css("border-color","red");

                $("#mileage").focus();

                return;

            }

            // if(efficiency<=0) {

            //     $("#efficiency").css("border-color","red");

            //     $("#efficiency").focus();

            //     return;

            // }

            if(vehicle==0) {

                $("#vehicle").css("border-color","red");

                $("#vehicle").focus();

                return;

            }            

            if(vehicle_info_1==0) {

                $("#vehicle_info_1").css("border-color","red");

                $("#vehicle_info_1").focus();

                return;

            }            

            if(vehicle_info_2==0) {

                $("#vehicle_info_2").css("border-color","red");

                $("#vehicle_info_2").focus();

                return;

            }            

            if(vehicle_info_3==0) {

                $("#vehicle_info_3").css("border-color","red");

                $("#vehicle_info_3").focus();

                return;

            }            

            if(transport_factor==0) {

                $("#transport_factor").css("border-color","red");

                $("#transport_factor").focus();

                return;

            }            

            var post_url = $("#transport_frm").attr("action"); //get form action url

            var request_method = $("#transport_frm").attr("method"); //get form GET/POST method

            var form_data = $("#transport_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                rs_conversion = "";

                if(rs.tot) {

                    rs_conversion = rs.tot+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#transport_footprint").html(rs_conversion);

                $("#transport_footprint_estimation").html(rs.res);

               // alert('ok');

                // $("#server-results").html(response);

            });

            calculate_building_footprint();

    }



    function resetTransportFootprint() {

      var supplier_assessment_id = $("#trans_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllTransportFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#transport_footprint_estimation").html('');

                $("#transport_frm input[type='number']").val('');

                $("#transport_frm input[type='text']").val('');

                $("#transport_footprint").html('0');

                $("#no_of_emp").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function removeBuildingFactor(id,ghg_factor_id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeProductBuildingFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                $("#building_footprint_estimation").html(rs.res);

                $("#building_factor_qty_"+ghg_factor_id).val("");

                rs_conversion = "";

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#building_footprint").html(rs_conversion+" CO2e : Estimate of building's footprint")

                // calculate_building_footprint();

            },

            error: function(xhr, status, error){

            }



        });

    }    



    function reset_building_footprint() {

      var supplier_assessment_id = $("#ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllProductBuildingFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#building_footprint_estimation").html('');

                $("#building_frm input[type='number']").val('');

                $("#building_frm input").prop("disabled", false);

                $("#building_frm select").prop("disabled", false);        

                $("#building_footprint").html('0');

                $("#no_of_emp").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }    

    function submitProductFootprint() {

      var supplier_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

            url : "<?php echo base_url()?>/brand/submitProductFootprint"+"/"+supplier_assessment_id,

            type: "GET",

            // dataType: "JSON",

            success: function(data){

                location.reload();

            },

            error: function(xhr, status, error){

            }

        });

    }



    function undoProductFootprint(supplier_assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/undoProductFootprint"+"/"+supplier_assessment_id,

            type: "GET",

            // dataType: "JSON",

            success: function(data){

                location.reload();

            },

            error: function(xhr, status, error){

            }

        });

    }



    function verifyProductFootprint(supplier_assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/verifyProductFootprint"+"/"+supplier_assessment_id,

            type: "GET",

            // dataType: "JSON",

            success: function(data){

                     
          if(data!="") {

              $('#confirm_modal_spn').html('<p>'+data+'</p>');
              
              $("#thank").hide();

          }

          else {

              $('#confirm_modal_spn').html('<p>You have connected all the documents, Your assessment is under verification</p>');

              $("#go_to_upload_doc").hide();

              $("#thank").show();
              location.reload();

          }
          
          
              
            },

            error: function(xhr, status, error){

            }

        });        

    }



    function cal_and_add_to_building_footprint() {

            var post_url = $("#building_frm").attr("action"); //get form action url

            var request_method = $("#building_frm").attr("method"); //get form GET/POST method

            var form_data = $("#building_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                // alert(rs.tot);

                $("#building_footprint_estimation").html(rs.res);

                rs_conversion = "";

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#building_footprint").html(rs_conversion+" CO2e : Estimate of building's footprint");

            });

            // calculate_building_footprint();

    }



    function getYearByTransport(that) {

      vehicle = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getYearByTransport/"+vehicle,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#vehicle_info_1").html(data);

                $("#vehicle_info_2").html('<option value="0">Select Type</option>');

                $("#vehicle_info_3").html('<option value="0">Select Model</option>');

                $("#transport_factor").html('<option value="0"></option>');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function getTypeOfTransportation(that) {

      vehicle = $("#vehicle").val();

      year = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getTypeOfTransportation",

            type: "POST",

            data : { "vehicle":vehicle,"year":year },

            // dataType: "JSON",

            success: function(data){

                $("#vehicle_info_2").html(data);

                $("#vehicle_info_3").html('<option value="0">Select Model</option>');

                $("#transport_factor").html('<option value="0"></option>');

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getModelOfTransportation(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getModelOfTransportation",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type },

            // dataType: "JSON",

            success: function(data){

                $("#vehicle_info_3").html(data);

                $("#transport_factor").html('<option value="0"></option>');

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getDerivativeOfCompanyVehicle(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $("#vehicle_info_2").val();

      model = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getDerivativeOfCompanyVehicle",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type,"model":model },

            // dataType: "JSON",

            success: function(data){

                $("#vehicle_info_4").html(data);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getEfficiencyOfCompanyVehicle(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $("#vehicle_info_2").val();

      model = $("#vehicle_info_3").val();

      // derivative = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getEfficiencyOfCompanyVehicle",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type,"model":model },

            // dataType: "JSON",

            success: function(data){

                $("#efficiency").val(data);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getGhgFactorOfTransportation(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $("#vehicle_info_2").val();

      model = $("#vehicle_info_3").val();

      // derivative = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getGhgFactorOfTransportation",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type,"model":model },

            // dataType: "JSON",

            success: function(data){

                $("#transport_factor").html(data);

                // $("#company_vehicle_factor").prop('disabled', true);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getRawMaterial(assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/getRawMaterial/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                // $("#raw_material").html(rs.raw_material);

                $("#autocomplete").html(rs.supplier_location);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function resetManufacturing() {

      var supplier_assessment_id = $("#manuf_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllManufacturingFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#manufacturing_footprint_estimation").html('');

                $("#manufacturing_frm input[type='text']").val('');

                $("#manufacturing_frm input[type='number']").val('');

                $("#manufacturing_footprint").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function resetManufacturing2() {

      var supplier_assessment_id = $("#manuf2_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllManufacturing2Factor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#manufacturing2_footprint_estimation").html('');

                $("#manufacturing2_frm input[type='number']").val('');

                $("#manufacturing2_footprint").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function resetManufacturing3() {

      var supplier_assessment_id = $("#manuf3_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllManufacturing3Factor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#manufacturing3_footprint_estimation").html('');

                $("#manufacturing3_frm select").val('0');

                $("#manufacturing3_footprint").html('');

                $("#submit_btn").prop("disabled","true");

            },

            error: function(xhr, status, error){

            }



        });

    }    



    function resetVehicle() {

        $("#vehicle").val("0");

        $("#vehicle_info_1").html("<option value='0'>Select year</option>");

        // $("#vehicle_info_1").val("0");

        $("#vehicle_info_2").html("<option value='0'>Select type</option>");

        // $("#vehicle_info_2").val("0");

        $("#vehicle_info_3").html("<option value='0'>Select model</option>");

        // $("#vehicle_info_3").val("0");

    }



    function addMoreProcess() {

      // prod_factor = '<?php // echo $product_factor ?>';

      assessment_id = '<?php echo $ghg_assessment_id ?>';

      $.ajax({

            url : "<?php echo base_url()?>/brand/getRawMaterialForManufacturing/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){
                rs =   JSON.parse(data);
                process_count++;
// plus button 24-01-2022
       $('.processDiv').append('<div class="step_inner"><div class=" step_field" style="width:100%"><div class="theme_field d-flex"><select class="form-control" name="process_name[]" onchange="setUnitProcess(this)">'+rs.process+'</select><input type="number" class="mr-2" name="material_qty[]" value="" id="" placeholder="Enter Material Quantity"  style="height:32px" /><select class="form-control" name="process_material_unit[]" style="width:105px;">'+rs.unit+'</select><select  class="form-control" id="exampleFormControlSelect1" name="process_raw_material['+process_count+'][]" multiple class="process_raw_material" style="display:none;border-radius:0px;">'+rs.res+'</select><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreProcess()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div>&nbsp;</div>');
//   $('.processDiv').append('<div class="step_inner"><div class=" step_field" style="width:100%"><div class="theme_field d-flex"><select class="form-control" name="process_name[]" onchange="setUnitProcess(this)">'+rs.process+'</select><input type="number" class="mr-2" name="material_qty[]" value="" id="" placeholder="Enter Material Quantity"  style="height:32px" /><select class="form-control" name="process_material_unit[]" style="width:105px;">'+rs.unit+'</select><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreProcess()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div>&nbsp;</div>');

            },

            error: function(xhr, status, error){

            }

        });

      // $('.processDiv').append('<div class="step_inner"><div class="step_label" style="width:25%"><label for="inp1"></label></div><div class=" step_field" style="width:75%"><div class="theme_field d-flex"><input type="text" class="mr-2" name="process_name[]" value="" id="" placeholder="Enter Process Name" /><input type="number" class="mr-2" name="electricity_consumption[]" value="" id="" placeholder="Electricity Consumption" /><input type="number" class="mr-2" name="water_consumption[]" value="" id="" placeholder="Water Consumption" /><select class="form-control" id="exampleFormControlSelect1" name="process_raw_material[]">'+process_raw_material+'</select><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreProcess()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div>&nbsp;</div>');

            // event.preventDefault(); //prevent default action 

            // var post_url = "<?php echo base_url() ?>/brand/getProductFactor"; //get form action url

            // var request_method = "POST"; //get form GET/POST method

            // var form_data = $("#building_frm").serialize(); //Encode form elements for submission

            

            // $.ajax({

            //     url : post_url,

            //     type: request_method,

            //     data : form_data

            // }).done(function(response){ 

            //     // alert('testing');

            //     $('.factorDiv').append(response);

            // });

    }



    function getRawMaterialForManufacturing(assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/getRawMaterialForManufacturing/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){
                rs = JSON.parse(data);
                $("#process_raw_material").html(rs.res);
                $("#process_material_unit").html(rs.unit);
            },

            error: function(xhr, status, error){

            }

        });

    }



    function getRawMaterialForManufacturing2(assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/getRawMaterialForManufacturing2/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){
                // console.log(data);
                $("#manufacturing2Div").html(data);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function setUnitForManufacturing2(ele) {

        var ele_id = $(ele).val();

        var obj1 = $(ele).parent();

        var obj2 = $(obj1).parent();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getUnit/"+ele_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $(obj2).find("select[name='manuf2_unit[]']").html(data);

            },

            error: function(xhr, status, error){

                // alert('error');

            }



        });

    }    

</script>



<?php // include("include/footer.php"); ?>



<script>

    $(document).ready(function(){

  var echartElemPie = document.getElementById("echartPie");

  if (echartElemPie) {

    console.log(echartElemPie);

    var echartPie = echarts.init(echartElemPie);

    echartPie.setOption({

      color: ["#6e58c5","#999A99","#7f933f", "#262626", "#DFC496"],

      tooltip: {

        show: true,

        backgroundColor: "black",

      },

      series: [

        {

          name: "ESG Overview",

          type: "pie",

          radius: "45%",

          center: ["50%", "50%"],

          data: <?php echo json_encode($stages);?>,

          itemStyle: {

            emphasis: {

              shadowBlur: 10,

              shadowOffsetX: 0,

              shadowColor: "rgba(0, 0, 0, 0.5)",

            },

          },

        },

      ],

    });

    $(window).on("resize", function () {

      setTimeout(function () {

       echartPie.resize();

      }, 500);

    });

  }        



  var topStageElemPie = document.getElementById("topStagePie");

  if (topStageElemPie) {

    console.log(topStageElemPie);

    var topStagePie = echarts.init(topStageElemPie);

    topStagePie.setOption({

      color: ["#999A99","#7f933f", "#262626", "#DFC496"],

      tooltip: {

        show: true,

        backgroundColor: "black",

      },

      series: [

        {

          name: "ESG Overview",

          type: "pie",

          radius: "45%",

          center: ["50%", "50%"],

          data: <?php echo json_encode($category_name);?>,

          itemStyle: {

            emphasis: {

              shadowBlur: 10,

              shadowOffsetX: 0,

              shadowColor: "rgba(0, 0, 0, 0.5)",

            },

          },

        },

      ],

    });

    $(window).on("resize", function () {

      setTimeout(function () {

       topStagePie.resize();

      }, 500);

    });

  }        



  var echartElemBar = document.getElementById("ghgCategoryPie");

  // if (ghgCategoryElemPie) {

  //   console.log(ghgCategoryElemPie);

  //   var ghgCategoryPie = echarts.init(ghgCategoryElemPie);

  //   ghgCategoryPie.setOption({

  //     color: ["#C39A4A", "#575757", "#DFC496"],

  //     tooltip: {

  //       show: true,

  //       backgroundColor: "black",

  //     },

  //     series: [

  //       {

  //         name: "ESG Overview",

  //         type: "pie",

  //         radius: "45%",

  //         center: ["50%", "50%"],

  //         data: <?php echo json_encode($category_footprint);?>,

  //         itemStyle: {

  //           emphasis: {

  //             shadowBlur: 10,

  //             shadowOffsetX: 0,

  //             shadowColor: "rgba(0, 0, 0, 0.5)",

  //           },

  //         },

  //       },

  //     ],

  //   });

  //   $(window).on("resize", function () {

  //     setTimeout(function () {

  //      ghgCategoryPie.resize();

  //     }, 500);

  //   });

  // }        





  if (echartElemBar) {

    var echartBar = echarts.init(echartElemBar);

    echartBar.setOption({

      legend: {

        borderRadius: 0,

        orient: "horizontal",

        x: "right",

        data: ["Co2e"],

      },

      grid: {

        left: "8px",

        right: "8px",

        bottom: "0",

        containLabel: true,

      },

      tooltip: {

        show: true,

        backgroundColor: "black",

      },

      xAxis: [

        {

          type: "category",

          data: <?php echo json_encode($ghg_name);?>,

          axisTick: {

            alignWithLabel: true,

          },

          splitLine: {

            show: false,

          },

          axisLine: {

            show: true,

          },

        },

      ],

      yAxis: [

        {

          type: "value",

          axisLabel: {

            formatter: "{value}",

          },

          min: 0,

          max: 100,

          interval: 20,

          axisLine: {

            show: false,

          },

          splitLine: {

            show: true,

            interval: "auto",

          },

        },

      ],

      series: [

        {

          name: "Co2e",

          data: <?php echo json_encode($ghg_val);?>,

          label: {

            show: false,

            color: "#0168c1",

          },

          type: "bar",

          barGap: 0,

          color: "#defe73",

          smooth: true,

          itemStyle: {

            emphasis: {

              shadowBlur: 10,

              shadowOffsetX: 0,

              shadowOffsetY: -2,

              shadowColor: "rgba(0, 0, 0, 0.3)",

            },

          },

        },

      ],

    });

    $(window).on("resize", function () {

      setTimeout(function () {

        echartBar.resize();

      }, 500);

    });

  }



    });

</script>



<script>

    function addMoreFactorForManufacturing2() {

            event.preventDefault(); //prevent default action 

            var post_url = "<?php echo base_url() ?>/brand/addMoreFactorForManufacturing2"; //get form action url

            var request_method = "POST"; //get form GET/POST method

            var form_data = $("#manufacturing2_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 
                rs=JSON.parse(response);
                rand_num = rs.rand_num;
                $('#manufacturing2Div').append(rs.res);
                var input = document.getElementById('manufacturing_autocomplete_'+rand_num);
                var trip_from = new google.maps.places.Autocomplete(input);
            });

    }

    $(document).on('click','.remove_factor_block_for_manufacturing2',function(){

        $(this).closest('.step_inner').remove();

        process_count--;

    });        



    var process_count = 0;

</script>



<script>

    var input = document.getElementById('supplier_autocomplete');

    var trip_from = new google.maps.places.Autocomplete(input);

    var input = document.getElementById('autocomplete1');

    var trip_from = new google.maps.places.Autocomplete(input);


    var input = document.getElementById('manufacturing_autocomplete');

    var trip_from = new google.maps.places.Autocomplete(input);
</script>





    <script>

        function submit_data() {

            $("#trip_div").show();

            $("#bus_station_distance").html("");

            $("#rail_station_distance").html("");

            $("#airport_distance").html("");

            $("#departure_airport").html("<option value='0'>Select Airport</option>");

            $("#arrival_airport").html("<option value='0'>Select Airport</option>");

            $("#departure_bus_station").html("<option value='0'>Select Bus From</option>");

            $("#arrival_bus_station").html("<option value='0'>Select Bus To</option>");

            $("#departure_rail_station").html("<option value='0'>Select Train From</option>");

            $("#arrival_rail_station").html("<option value='0'>Select Train To</option>");

            $("#bus").addClass('active');

            $("#rail").removeClass('active');

            $("#air").removeClass('active');

            $("#home").addClass('active show');

            $("#menu1").removeClass('active show');

            $("#menu2").removeClass('active show');

            $("#air_tab").removeClass('active show');


            var trip_from = $("#autocomplete").val();

            var trip_to = $("#autocomplete1").val();

            $("#transportation_from").val(trip_from);

            $("#transportation_to").val(trip_to);

            var post_url = '<?php echo base_url(); ?>'+'/brand/find_airport'; //get form action url

            var request_method = $("#transport_frm").attr("method"); //get form GET/POST method

            var form_data = $("#transport_frm").serialize(); //Encode form elements for submission            

            departing_from = $("#autocomplete").val();

            arriving_at = $("#autocomplete1").val();

            $("#departing_bus_station").html(departing_from);

            $("#arriving_bus_station").html(arriving_at);

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);



var map;

var service;

var infowindow;



// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);



  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['bus_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    var opt = "<option value='0'>Select Bus From</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";

      }

    }

    $("#departure_bus_station").html(opt);



// places To



// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);



  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['bus_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    console.log(results);

    var opt = "<option value='0'>Select Bus To</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";

      }

    }

    $("#arrival_bus_station").html(opt);

    nights = $("#nights").val();

    people = $("#people").val();

    tooltip_text = "<p>Hotel 31 kg<br/>";

    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

    tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";

    tooltip_text+= "<p></p>";

    tooltip_text+= "<p>Meal 3 kg<br/>";

    tooltip_text+= "3 meals a day x 3<br/>";

    tooltip_text+= ""+people+" people x "+people+"<br/>";

    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

    tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";

    tooltip_text+= "<p></p>";

    tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";

    $('#bus_hotel_tooltip').attr('data-original-title', tooltip_text);

    $("#bus_hotel_emission").html(((31*nights)+(3*3*nights*people)));

  }

}



  }

}













// var map;

// var service;

// var infowindow;



// // function initialize() {

//   var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);



//   map = new google.maps.Map(document.getElementById('map'), {

//       center: pyrmont,

//       zoom: 15

//     });



//   var request = {

//     location: pyrmont,

//     radius: '50000',

//     type: ['bus_station']

//   };



//   service = new google.maps.places.PlacesService(map);

//   service.nearbySearch(request, callback);

// // }



// function callback(results, status) {

//   alert('in callback');

//   if (status == google.maps.places.PlacesServiceStatus.OK) {

//     alert('success');

//     console.log(results);

//     alert(results[0].place_id);

// var request = {

//   placeId: results[0].place_id,

//   fields: ['name', 'rating', 'formatted_phone_number', 'geometry']

// };



// service = new google.maps.places.PlacesService(map);

// service.getDetails(request, callback);



// function callback(place, status) {

//   alert('place');

//   if (status == google.maps.places.PlacesServiceStatus.OK) {

//     console.log("----------------");

//     console.log(place);

//     alert(place.geometry.location.lat());

//     alert(place.geometry.location.lng());

//     // createMarker(place);

//   }

// }



//     // for (var i = 0; i < results.length; i++) {

//     //   createMarker(results[i]);

//     // }

//   }

// }



            });

      }





    </script>

    <script>

/*      $(document).ready(function(){

        $( "#autocomplete" ).change(function() {

          var autocomplete1 = $("#autocomplete1").val();

          if(autocomplete1) {

            $("#trip_div").show();

            var post_url = $("#flight_frm").attr("action"); //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                console.log(rs);

            });





          }

          else {

          }

        });        



        $( "#autocomplete1" ).change(function() {

          var test = $("#autocomplete1").val();

          alert(test);

          var autocomplete = $("#autocomplete").val();

          if(autocomplete) {

            $("#trip_div").show();

            var post_url = $("#flight_frm").attr("action"); //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);





var map;

var service;

var infowindow;



// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);



  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['bus_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  alert('in callback');

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    var opt = "<option>Select Train From</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"'>"+results[i].name+"</option>";

      }

    }

    $("#departure_train_station").html(opt);



// places To



// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);



  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['bus_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  alert('in callback');

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    console.log(results);

    var opt = "<option>Select Train From</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"'>"+results[i].name+"</option>";

      }

    }

    $("#arrival_train_station").html(opt);

  }

}



  }

}









            });

          }

          else {

          }

        });        

      });      

*/



    $(document).ready(function(){

      $("#rail").click(function(){

            // alert('testing');

            $("#transportation_way").val("rail");

            $("#transportation_by").val("train");

            $("#inner_transportation_from").val($('#departure_rail_station').find('option:selected').attr('data-nm'));

            $("#inner_transportation_to").val($('#arrival_rail_station').find('option:selected').attr('data-nm'));

            $("#local_transportation_from_by").val($('#rail_departure_transfer').find('option:selected').attr('data-title'));

            $("#local_transportation_to_by").val($('#rail_arrival_transfer').find('option:selected').attr('data-title'));

            transport_emission = $("#total_emission_rail").html();

            $("#transport_emission").val(transport_emission);

            var post_url = '<?php echo base_url(); ?>/brand/find_airport'; //get form action url

            var request_method = $("#transport_frm").attr("method"); //get form GET/POST method

            var form_data = $("#transport_frm").serialize(); //Encode form elements for submission            

            departing_from = $("#autocomplete").val();

            arriving_at = $("#autocomplete1").val();

            $("#departing_rail_station").html(departing_from);

            $("#arriving_rail_station").html(arriving_at);

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

var map;

var service;

var infowindow;

// alert(rs.latitudeFrom);

// alert(rs.longitudeFrom);

// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeFrom,rs.longitudeFrom);

  console.log(pyrmont);

  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['train_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  // alert('testing');

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    console.log(results);

    var opt = "<option value='0'>Select Train From</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";

      }

    }

    $("#departure_rail_station").html(opt);



// places To



// function initialize() {

  var pyrmont = new google.maps.LatLng(rs.latitudeTo,rs.longitudeTo);



  map = new google.maps.Map(document.getElementById('map'), {

      center: pyrmont,

      zoom: 15

    });



  var request = {

    location: pyrmont,

    radius: '50000',

    type: ['train_station']

  };



  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);

// }



function callback(results, status) {

  if (status == google.maps.places.PlacesServiceStatus.OK) {

    console.log(results);

    var opt = "<option value='0'>Select Train To</option>";

    if(results) {

      for(i=0;i<results.length;i++) {

        opt+="<option value='"+results[i].place_id+"' data-nm='"+results[i].name+"'>"+results[i].name+"</option>";

      }

    }

    $("#arrival_rail_station").html(opt);

  }

  else {

    $("#arrival_rail_station").html(opt);

  }

    nights = $("#nights").val();

    people = $("#people").val();

    tooltip_text = "<p>Hotel 31 kg<br/>";

    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

    tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";

    tooltip_text+= "<p></p>";

    tooltip_text+= "<p>Meal 3 kg<br/>";

    tooltip_text+= "3 meals a day x 3<br/>";

    tooltip_text+= ""+people+" people x "+people+"<br/>";

    tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

    tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";

    tooltip_text+= "<p></p>";

    tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";

    $('#rail_hotel_tooltip').attr('data-original-title', tooltip_text);

    $("#rail_hotel_emission").html(((31*nights)+(3*3*nights*people)));

}



  }

}



});





      });





      $("#air").click(function(){



            $("#transportation_way").val("air");            

            $("#transportation_by").val("flight");

            $("#inner_transportation_from").val($('#departure_airport').find('option:selected').attr('data-nm'));

            $("#inner_transportation_to").val($('#arrival_airport').find('option:selected').attr('data-nm'));

            $("#local_transportation_from_by").val($('#airport_departure_transfer').find('option:selected').attr('data-title'));

            $("#local_transportation_to_by").val($('#airport_arrival_transfer').find('option:selected').attr('data-title'));

            transport_emission = $("#total_emission_airport").html();

            $("#transport_emission").val(transport_emission);

            var post_url = '<?php echo base_url(); ?>/brand/getAirportByLocation'; //get form action url

            var request_method = $("#transport_frm").attr("method"); //get form GET/POST method

            var form_data = $("#transport_frm").serialize(); //Encode form elements for submission            

            departing_from = $("#autocomplete").val();

            arriving_at = $("#autocomplete1").val();

            $("#departing_airport").html(departing_from);

            $("#arriving_airport").html(arriving_at);

            nights = $("#nights").val();

            people = $("#people").val();

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                opt = "<option value='0'>Select Airport</option>";

                if(rs.airports_from) {

                  for(i=0;i<rs.airports_from.length;i++) {

                    // alert(rs.airports_from[i].name);

                    opt+="<option value='"+rs.airports_from[i].code+"' data-nm='"+rs.airports_from[i].name+"'>"+rs.airports_from[i].name+"</option>";

                  }

                }

                $("#departure_airport").html(opt);

                opt = "<option value='0'>Select Airport</option>";

                if(rs.airports_to) {

                  for(i=0;i<rs.airports_to.length;i++) {

                    // alert(rs.airports_from[i].name);

                    opt+="<option value='"+rs.airports_to[i].code+"' data-nm='"+rs.airports_to[i].name+"'>"+rs.airports_to[i].name+"</option>";

                  }

                }

                $("#arrival_airport").html(opt);

                tooltip_text = "<p>Hotel 31 kg<br/>";

                tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

                tooltip_text+= "Hotel subtotal "+(31*nights)+" kg</p>";

                tooltip_text+= "<p></p>";

                tooltip_text+= "<p>Meal 3 kg<br/>";

                tooltip_text+= "3 meals a day x 3<br/>";

                tooltip_text+= ""+people+" people x "+people+"<br/>";

                tooltip_text+= ""+nights+" nights x "+nights+"<br/>";

                tooltip_text+= "Meals subtotal "+(3*3*nights*people)+"</p>";

                tooltip_text+= "<p></p>";

                tooltip_text+= "<p>Stay subtotal "+((31*nights)+(3*3*nights*people))+" kg</p>";

                $('#airport_hotel_tooltip').attr('data-original-title', tooltip_text);

                $("#airport_hotel_emission").html(((31*nights)+(3*3*nights*people)));

            });





      });



      $("#bus").click(function(){

            $("#transportation_way").val("land");

            $("#transportation_by").val($('#land_vehicle').find('option:selected').attr('data-nm'));        

            $("#inner_transportation_from").val("");

            $("#inner_transportation_to").val("");

            $("#local_transportation_from_by").val("");

            $("#local_transportation_to_by").val("");        

            transport_emission = $("#total_emission_bus").html();

            $("#transport_emission").val(transport_emission);

      });



      $("#airport_arrival_transfer").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');

        airport_arrival_transfer = $("#airport_arrival_transfer").val();

        var transfer_title = $("#vehicle_for_airport_arrival").find(':selected').data('title');

        var transfer_icon = $("#airport_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#vehicle_for_airport_arrival").val();

        $("#local_transportation_to_by").val(transfer_title);

        // if(transfer_title=="Driving") {

        //   $("#airport_transfer_arrival_fuel").show();

        //   $("#airport_transfer_arrival_fuel").parent().show();

        // }

        // else {

        //   $("#airport_transfer_arrival_fuel").hide();

        //   $("#airport_transfer_arrival_fuel").parent().hide();

        // }

        $("#airport_arrival_transfer_spn").html(transfer_title);

        // $("#transfer_arrival_icon").removeClass();

        // $("#transfer_arrival_icon").addClass(transfer_icon);

        if(to && arrival_airport_name) {

            ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_arrival_fuel},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                // if(transfer_title=="Driving") {

                //   tooltip_inner_text+=" "+airport_transfer_arrival_fuel;

                // }

                // if(transfer_title=="Train") {

                //   tooltip_inner_text+=" ride";

                // }

                // if(transfer_title=="Bus") {

                //     tooltip_inner_text+=" ride";

                // }

                // if($('#airport_round_trip').is(":checked")){

                //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                //   $("#airport_distance").html(rs.distance);

                //   $("#airport_arrival_distane_emission").html(rs.emission*2);

                //   $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

                // }

                // else if($('#airport_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_arrival_distane_emission").html(rs.emission);

                  $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

                // }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);                

            $("#transport_emission").val(tot);

              }

            });          

        }

      });



      $("#airport_departure_transfer").change(function(){

        from = $("#autocomplete").val();

        departure_airport_name = $("#departure_airport").find(':selected').data('nm');

        airport_departure_transfer = $("#airport_departure_transfer").val();

        var transfer_title = $("#vehicle_for_airport").find(':selected').data('title');

        // var transfer_icon = $("#airport_departure_transfer").find(':selected').data('icon');

        airport_transfer_departure_fuel = $("#vehicle_for_airport").val();

        $("#local_transportation_from_by").val(transfer_title);

        // if(transfer_title=="Driving") {

        //   $("#airport_transfer_departure_fuel").show();

        //   $("#airport_transfer_departure_fuel").parent().show();

        // }

        // else {

        //   $("#airport_transfer_departure_fuel").hide();

        //   $("#airport_transfer_departure_fuel").parent().hide();

        // }

        // $("#airport_departure_transfer_spn").html(transfer_title);

        // $("#transfer_departure_icon").removeClass();

        // $("#transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {

            ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel:airport_transfer_departure_fuel},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                // if(transfer_title=="Driving") {

                //   tooltip_inner_text+=" "+airport_transfer_departure_fuel

                // }

                // if(transfer_title=="Train") {

                //   tooltip_inner_text+=" ride";

                // }

                // if(transfer_title=="Bus") {

                //     tooltip_inner_text+=" ride";

                // }

                // if($('#airport_round_trip').is(":checked")){

                // tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                //   $("#airport_distance").html(rs.distance);

                //   $("#airport_departure_distane_emission").html(rs.emission*2);

                //   $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

                // }

                // else if($('#airport_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_departure_distane_emission").html(rs.emission);

                  $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

                // }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

              }

            });          

        }

      });



      $('#airport_round_trip').click(function(){

        departure_code = $("#departure_airport").val();

        arrival_code = $("#arrival_airport").val();

        flying_class = $("#flying_class").val();

        from = $("#autocomplete").val();

        to = $("#autocomplete1").val();

        departure_airport_name = $("#departure_airport").find(':selected').data('nm');

        arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');

        airport_departure_transfer = $("#airport_departure_transfer").val();

        airport_arrival_transfer = $("#airport_arrival_transfer").val();

        airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();

        airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();

        var departure_transfer_title = $("#airport_departure_transfer").find(':selected').data('title');                

        var arrival_transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');                

        if($(this).is(":checked")){

          if(departure_code && arrival_code) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_air_distance',

              type: 'post',

              data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_distance_emission").html(rs.emission*2);

                $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }



                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_departure_distane_emission").html(rs.emission*2);

                $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_arrival_distane_emission").html(rs.emission*2);

                $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

        else if($(this).is(":not(:checked)")){

          if(departure_code && arrival_code) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_air_distance',

              type: 'post',

              data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_distance_emission").html(rs.emission);

                $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_departure_distane_emission").html(rs.emission);

                $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#airport_distance").html(rs.distance);

                $("#airport_arrival_distane_emission").html(rs.emission);

                $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

      });



// For Bus station Start



      $("#bus_arrival_transfer").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');

        airport_arrival_transfer = $("#bus_arrival_transfer").val();

        var transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');

        var transfer_icon = $("#bus_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();

        if(transfer_title=="Driving") {

          $("#bus_transfer_arrival_fuel").show();

          $("#bus_transfer_arrival_fuel").parent().show();

        }

        else {

          $("#bus_transfer_arrival_fuel").hide();

          $("#bus_transfer_arrival_fuel").parent().hide();

        }

        $("#bus_arrival_transfer_spn").html(transfer_title);

        $("#bus_transfer_arrival_icon").removeClass();

        $("#bus_transfer_arrival_icon").addClass(transfer_icon);

        if(to && arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                if(transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel;

                }

                if(transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                if($('#bus_round_trip').is(":checked")){

                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#bus_station_distance").html(rs.distance);

                  $("#bus_arrival_distane_emission").html(rs.emission*2);

                  $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#bus_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#bus_station_distance").html(rs.distance);

                  $("#bus_arrival_distane_emission").html(rs.emission);

                  $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });          

        }

      });



      $("#bus_departure_transfer").change(function(){

        from = $("#autocomplete").val();

        departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');

        airport_departure_transfer = $("#bus_departure_transfer").val();

        var transfer_title = $("#bus_departure_transfer").find(':selected').data('title');

        var transfer_icon = $("#bus_departure_transfer").find(':selected').data('icon');

        airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();

        if(transfer_title=="Driving") {

          $("#bus_transfer_departure_fuel").show();

          $("#bus_transfer_departure_fuel").parent().show();

        }

        else {

          $("#bus_transfer_departure_fuel").hide();

          $("#bus_transfer_departure_fuel").parent().hide();

        }

        $("#bus_departure_transfer_spn").html(transfer_title);

        $("#bus_transfer_departure_icon").removeClass();

        $("#bus_transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                if(transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                if($('#bus_round_trip').is(":checked")){

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#bus_station_distance").html(rs.distance);

                  $("#bus_departure_distane_emission").html(rs.emission*2);

                  $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#bus_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#bus_station_distance").html(rs.distance);

                  $("#bus_departure_distane_emission").html(rs.emission);

                  $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });          

        }

      });



      $('#bus_round_trip').click(function(){

        departure_code = $("#departure_bus_station").val();

        arrival_code = $("#arrival_bus_station").val();

        // flying_class = $("#flying_class").val();

        from = $("#autocomplete").val();

        to = $("#autocomplete1").val();

        departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');

        arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');

        airport_departure_transfer = $("#bus_departure_transfer").val();

        airport_arrival_transfer = $("#bus_arrival_transfer").val();

        airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();

        airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();

        var departure_transfer_title = $("#bus_departure_transfer").find(':selected').data('title');                

        var arrival_transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');                

        if($(this).is(":checked")){

          if(departure_code && arrival_code) {

            // $.ajax({

            //   url: '<?php echo base_url() ?>/brand/find_air_distance',

            //   type: 'post',

            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

            //   success: function(response){

            //     rs = JSON.parse(response);

            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //     $("#airport_distance").html(rs.distance);

            //     $("#airport_distance_emission").html(rs.emission*2);

            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            //   }

            // });



    var lat_from = "";

    var long_from = "";

    var lat_to = "";

    var long_to = "";

    var request = {

      placeId: departure_code,

      fields: ['geometry']

    };



    service = new google.maps.places.PlacesService(map);

    service.getDetails(request, callback);



    function callback(place, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {

        lat_from = place.geometry.location.lat();

        long_from = place.geometry.location.lng();

        // alert(lat_from);

        // alert(long_from);

        var request = {

          placeId: arrival_code,

          fields: ['geometry']

        };



        service = new google.maps.places.PlacesService(map);

        service.getDetails(request, callback);



        function callback(place, status) {

          if (status == google.maps.places.PlacesServiceStatus.OK) {

            lat_to = place.geometry.location.lat();

            long_to = place.geometry.location.lng();

            $.ajax({

               url: '<?php echo base_url() ?>/brand/find_distance',

               type: 'post',

               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

               success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_distance_emission").html(rs.emission*2);

                $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

               }

            });

          }

        }

      }

    }





          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }



                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_departure_distane_emission").html(rs.emission*2);

                $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_arrival_distane_emission").html(rs.emission*2);

                $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

        else if($(this).is(":not(:checked)")){

          if(departure_code && arrival_code) {

            // $.ajax({

            //   url: '<?php echo base_url() ?>/brand/find_air_distance',

            //   type: 'post',

            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

            //   success: function(response){

            //     rs = JSON.parse(response);

            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";

            //     $("#airport_distance").html(rs.distance);

            //     $("#airport_distance_emission").html(rs.emission);

            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            //   }

            // });



    var lat_from = "";

    var long_from = "";

    var lat_to = "";

    var long_to = "";

    var request = {

      placeId: departure_code,

      fields: ['geometry']

    };



    service = new google.maps.places.PlacesService(map);

    service.getDetails(request, callback);



    function callback(place, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {

        lat_from = place.geometry.location.lat();

        long_from = place.geometry.location.lng();

        // alert(lat_from);

        // alert(long_from);

        var request = {

          placeId: arrival_code,

          fields: ['geometry']

        };



        service = new google.maps.places.PlacesService(map);

        service.getDetails(request, callback);



        function callback(place, status) {

          if (status == google.maps.places.PlacesServiceStatus.OK) {

            lat_to = place.geometry.location.lat();

            long_to = place.geometry.location.lng();

            $.ajax({

               url: '<?php echo base_url() ?>/brand/find_distance',

               type: 'post',

               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

               success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Bus ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_distance_emission").html(rs.emission);

                $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

                // console.log(rs);

                // $("#bus_station_distance").html(response);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

               }

            });

          }

        }

      }

    }





          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_departure_distane_emission").html(rs.emission);

                $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#bus_station_distance").html(rs.distance);

                $("#bus_arrival_distane_emission").html(rs.emission);

                $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

      });







// For Bus station End





// For Train station Start



      $("#rail_arrival_transfer").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');

        airport_arrival_transfer = $("#rail_arrival_transfer").val();

        var transfer_title = $("#vehicle_for_rail_arrival").find(':selected').data('title');

        var transfer_icon = $("#rail_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#vehicle_for_rail_arrival").val();



        $("#local_transportation_to_by").val(transfer_title);

        // if(transfer_title=="Driving") {

        //   $("#rail_transfer_arrival_fuel").show();

        //   $("#rail_transfer_arrival_fuel").parent().show();

        // }

        // else {

        //   $("#rail_transfer_arrival_fuel").hide();

        //   $("#rail_transfer_arrival_fuel").parent().hide();

        // }

        // $("#rail_arrival_transfer_spn").html(transfer_title);

        // $("#rail_transfer_arrival_icon").removeClass();

        // $("#rail_transfer_arrival_icon").addClass(transfer_icon);

        if(to && arrival_airport_name) {

            ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_arrival_fuel},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                // if(transfer_title=="Driving") {

                //   tooltip_inner_text+=" "+airport_transfer_arrival_fuel;

                // }

                // if(transfer_title=="Train") {

                //   tooltip_inner_text+=" ride";

                // }

                // if(transfer_title=="Bus") {

                //     tooltip_inner_text+=" ride";

                // }

                // if($('#rail_round_trip').is(":checked")){

                //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                //   $("#rail_station_distance").html(rs.distance);

                //   $("#rail_arrival_distane_emission").html(rs.emission*2);

                //   $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

                // }

                // else if($('#rail_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_arrival_distane_emission").html(rs.emission);

                  $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

                // }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

              }

            });          

        }

      });



      $("#rail_departure_transfer").change(function(){

        from = $("#autocomplete").val();

        departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');

        airport_departure_transfer = $("#rail_departure_transfer").val();

        var transfer_title = $("#vehicle_for_rail").find(':selected').data('title');

        var transfer_icon = $("#rail_departure_transfer").find(':selected').data('icon');

        airport_transfer_departure_fuel = $("#vehicle_for_rail").val();

        $("#local_transportation_from_by").val(transfer_title);

        // if(transfer_title=="Driving") {

        //   $("#rail_transfer_departure_fuel").show();

        //   $("#rail_transfer_departure_fuel").parent().show();

        // }

        // else {

        //   $("#rail_transfer_departure_fuel").hide();

        //   $("#rail_transfer_departure_fuel").parent().hide();

        // }

        // $("#rail_departure_transfer_spn").html(transfer_title);

        // $("#rail_transfer_departure_icon").removeClass();

        // $("#rail_transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {

            ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_departure_fuel },

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = transfer_title;

                // if(transfer_title=="Driving") {

                //   tooltip_inner_text+=" "+airport_transfer_departure_fuel

                // }

                // if(transfer_title=="Train") {

                //   tooltip_inner_text+=" ride";

                // }

                // if(transfer_title=="Bus") {

                //     tooltip_inner_text+=" ride";

                // }

                // if($('#rail_round_trip').is(":checked")){

                // tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                //   $("#rail_station_distance").html(rs.distance);

                //   $("#rail_departure_distane_emission").html(rs.emission*2);

                //   $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

                // }

                // else if($('#rail_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_departure_distane_emission").html(rs.emission);

                  $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

                // }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

              }

            });          

        }

      });



      $('#rail_round_trip').click(function(){

        departure_code = $("#departure_rail_station").val();

        arrival_code = $("#arrival_rail_station").val();

        // flying_class = $("#flying_class").val();

        from = $("#autocomplete").val();

        to = $("#autocomplete1").val();

        departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');

        arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');

        airport_departure_transfer = $("#rail_departure_transfer").val();

        airport_arrival_transfer = $("#rail_arrival_transfer").val();

        airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();

        airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();

        var departure_transfer_title = $("#rail_departure_transfer").find(':selected').data('title');                

        var arrival_transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');                

        if($(this).is(":checked")){

          if(departure_code && arrival_code) {

            // $.ajax({

            //   url: '<?php echo base_url() ?>/brand/find_air_distance',

            //   type: 'post',

            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

            //   success: function(response){

            //     rs = JSON.parse(response);

            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //     $("#airport_distance").html(rs.distance);

            //     $("#airport_distance_emission").html(rs.emission*2);

            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            //   }

            // });



    var lat_from = "";

    var long_from = "";

    var lat_to = "";

    var long_to = "";

    var request = {

      placeId: departure_code,

      fields: ['geometry']

    };



    service = new google.maps.places.PlacesService(map);

    service.getDetails(request, callback);



    function callback(place, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {

        lat_from = place.geometry.location.lat();

        long_from = place.geometry.location.lng();

        // alert(lat_from);

        // alert(long_from);

        var request = {

          placeId: arrival_code,

          fields: ['geometry']

        };



        service = new google.maps.places.PlacesService(map);

        service.getDetails(request, callback);



        function callback(place, status) {

          if (status == google.maps.places.PlacesServiceStatus.OK) {

            lat_to = place.geometry.location.lat();

            long_to = place.geometry.location.lng();

            $.ajax({

               url: '<?php echo base_url() ?>/brand/find_distance',

               type: 'post',

               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

               success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Train ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_distance_emission").html(rs.emission*2);

                $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

               }

            });

          }

        }

      }

    }





          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }



                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_departure_distane_emission").html(rs.emission*2);

                $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_arrival_distane_emission").html(rs.emission*2);

                $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

        else if($(this).is(":not(:checked)")){

          if(departure_code && arrival_code) {

            // $.ajax({

            //   url: '<?php echo base_url() ?>/brand/find_air_distance',

            //   type: 'post',

            //   data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class},

            //   success: function(response){

            //     rs = JSON.parse(response);

            //     tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";

            //     $("#airport_distance").html(rs.distance);

            //     $("#airport_distance_emission").html(rs.emission);

            //     $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            //   }

            // });



    var lat_from = "";

    var long_from = "";

    var lat_to = "";

    var long_to = "";

    var request = {

      placeId: departure_code,

      fields: ['geometry']

    };



    service = new google.maps.places.PlacesService(map);

    service.getDetails(request, callback);



    function callback(place, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {

        lat_from = place.geometry.location.lat();

        long_from = place.geometry.location.lng();

        // alert(lat_from);

        // alert(long_from);

        var request = {

          placeId: arrival_code,

          fields: ['geometry']

        };



        service = new google.maps.places.PlacesService(map);

        service.getDetails(request, callback);



        function callback(place, status) {

          if (status == google.maps.places.PlacesServiceStatus.OK) {

            lat_to = place.geometry.location.lat();

            long_to = place.geometry.location.lng();

            $.ajax({

               url: '<?php echo base_url() ?>/brand/find_distance',

               type: 'post',

               data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

               success: function(response){

                rs = JSON.parse(response);

                tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_distance_emission").html(rs.emission);

                $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

                // console.log(rs);

                // $("#bus_station_distance").html(response);

               }

            });

          }

        }

      }

    }





          }

          if(departure_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:from,departure_airport_name: departure_airport_name,airport_departure_transfer: airport_departure_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = departure_transfer_title;

                if(departure_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_departure_fuel

                }

                if(departure_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(departure_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+departure_transfer_title+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_departure_distane_emission").html(rs.emission);

                $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

          if(arrival_airport_name) {

            $.ajax({

              url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

              type: 'post',

              data: {from:to,departure_airport_name: arrival_airport_name,airport_departure_transfer: airport_arrival_transfer},

              success: function(response){

                rs = JSON.parse(response);

                tooltip_inner_text = arrival_transfer_title;

                if(arrival_transfer_title=="Driving") {

                  tooltip_inner_text+=" "+airport_transfer_arrival_fuel

                }

                if(arrival_transfer_title=="Train") {

                  tooltip_inner_text+=" ride";

                }

                if(arrival_transfer_title=="Bus") {

                    tooltip_inner_text+=" ride";

                }

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                $("#rail_station_distance").html(rs.distance);

                $("#rail_arrival_distane_emission").html(rs.emission);

                $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

      });







// For Rail station End





    });



  function find_distance_between_bus_station() {

    departure = $("#departure_bus_station").val();

    arrival = $("#arrival_bus_station").val();

      from = $("#autocomplete").val();

      to = $("#autocomplete1").val();

      departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');

      // alert(departure_airport_name);

      arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');

      airport_departure_transfer = $("#bus_departure_transfer").val();

      airport_arrival_transfer = $("#bus_arrival_transfer").val();

      var arrival_transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');

      var departure_transfer_title = $("#bus_departure_transfer").find(':selected').data('title');

      airport_transfer_departure_fuel = $("#bus_transfer_departure_fuel").val();

      airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();

    if(departure && arrival) {

      var lat_from = "";

      var long_from = "";

      var lat_to = "";

      var long_to = "";

      var request = {

        placeId: departure,

        fields: ['geometry']

      };



      service = new google.maps.places.PlacesService(map);

      service.getDetails(request, callback);



      function callback(place, status) {

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          lat_from = place.geometry.location.lat();

          long_from = place.geometry.location.lng();

          var request = {

            placeId: arrival,

            fields: ['geometry']

          };



          service = new google.maps.places.PlacesService(map);

          service.getDetails(request, callback);



          function callback(place, status) {

            if (status == google.maps.places.PlacesServiceStatus.OK) {

              lat_to = place.geometry.location.lat();

              long_to = place.geometry.location.lng();

              $.ajax({

                 url: '<?php echo base_url() ?>/brand/find_distance',

                 type: 'post',

                 data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

                 success: function(response){

                  // $("#bus_station_distance").html(response);



            rs = JSON.parse(response);

            if($('#bus_round_trip').is(":checked")){

              tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#bus_station_distance").html(rs.distance);

              $("#bus_distance_emission").html(rs.emission*2);

              $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

            }

            else if($('#bus_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>Bus ride"+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#bus_station_distance").html(rs.distance);

              $("#bus_distance_emission").html(rs.emission);

              $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

            }

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);





                 }

              });

            }

          }

        }

      }

    }

    if(departure_airport_name) {

        // alert('testing');

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

          type: 'post',

          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer},

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = departure_transfer_title;

            if(departure_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(departure_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(departure_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            if($('#bus_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_bus_distance").html(rs.distance);

              $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#bus_departure_distane_emission").html(rs.emission*2);

            }

            else if($('#bus_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_bus_distance").html(rs.distance);

              $('#bus_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#bus_departure_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);



          }

        });        

    }



      if(arrival_airport_name) {

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance',

          type: 'post',

          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer},

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = arrival_transfer_title;

            if(arrival_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(arrival_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(arrival_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            if($('#bus_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_arrival_bus_distance").html(rs.distance);

              $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#bus_arrival_distane_emission").html(rs.emission*2);

            }

            else if($('#bus_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_arrival_bus_distance").html(rs.distance);

              $('#bus_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#bus_arrival_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#bus_departure_distane_emission").html();

            airport_distance_emission = $("#bus_distance_emission").html();

            airport_arrival_distane_emission = $("#bus_arrival_distane_emission").html();

            // airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

          }

        });        

      }



  }



  function find_distance_between_rail_station() {

    departure = $("#departure_rail_station").val();

    arrival = $("#arrival_rail_station").val();

      from = $("#autocomplete").val();

      to = $("#autocomplete1").val();

      departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');

      arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');

      $("#inner_transportation_from").val(departure_airport_name);

      $("#inner_transportation_to").val(arrival_airport_name);

      airport_departure_transfer = $("#rail_departure_transfer").val();

      airport_arrival_transfer = $("#rail_arrival_transfer").val();

      var arrival_transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');

      var departure_transfer_title = $("#rail_departure_transfer").find(':selected').data('title');

      airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();

      airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();

    if(departure && arrival) {

      var lat_from = "";

      var long_from = "";

      var lat_to = "";

      var long_to = "";

      var request = {

        placeId: departure,

        fields: ['geometry']

      };



      service = new google.maps.places.PlacesService(map);

      service.getDetails(request, callback);



      function callback(place, status) {

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          lat_from = place.geometry.location.lat();

          long_from = place.geometry.location.lng();

          var request = {

            placeId: arrival,

            fields: ['geometry']

          };



          service = new google.maps.places.PlacesService(map);

          service.getDetails(request, callback);



          function callback(place, status) {

            if (status == google.maps.places.PlacesServiceStatus.OK) {

              lat_to = place.geometry.location.lat();

              long_to = place.geometry.location.lng();

              ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

              $.ajax({

                 url: '<?php echo base_url() ?>/brand/find_rail_distance_for_product',

                 type: 'post',

                 data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to,ghg_assessment_id: ghg_assessment_id},

                 success: function(response){

                  // $("#bus_station_distance").html(response);



            rs = JSON.parse(response);

            // if($('#rail_round_trip').is(":checked")){

            //   tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#rail_station_distance").html(rs.distance);

            //   $("#rail_distance_emission").html(rs.emission*2);

            //   $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            // }

            // else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#rail_station_distance").html(rs.distance);

              $("#rail_distance_emission").html(rs.emission);

              $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            // }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);



                 }

              });

            }

          }

        }

      }

    }

    if(departure_airport_name) {

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

          type: 'post',

          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_departure_fuel},

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = departure_transfer_title;

            if(departure_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(departure_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(departure_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            // if($('#rail_round_trip').is(":checked")){

            //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#location_rail_distance").html(rs.distance);

            //   $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

            //   $("#rail_departure_distane_emission").html(rs.emission*2);

            // }

            // else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_rail_distance").html(rs.distance);

              $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_departure_distane_emission").html(rs.emission);

            // }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

          }

        });        

    }



      if(arrival_airport_name) {

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

          type: 'post',

          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel:  airport_transfer_arrival_fuel},

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = arrival_transfer_title;

            if(arrival_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(arrival_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(arrival_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            // if($('#rail_round_trip').is(":checked")){

            //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#location_arrival_rail_distance").html(rs.distance);

            //   $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

            //   $("#rail_arrival_distane_emission").html(rs.emission*2);

            // }

            // else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_arrival_rail_distance").html(rs.distance);

              $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_arrival_distane_emission").html(rs.emission);

            // }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            // airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);            

            $("#transport_emission").val(tot);

          }

        });        

      }



  }



    function find_air_distance() {

      departure_code = $("#departure_airport").val();

      arrival_code = $("#arrival_airport").val();

      from = $("#autocomplete").val();

      to = $("#autocomplete1").val();

      // flying_class = $("#flying_class").val();

      departure_airport_name = $("#departure_airport").find(':selected').data('nm');

      arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');

      $("#inner_transportation_from").val(departure_airport_name);

      $("#inner_transportation_to").val(arrival_airport_name);

      airport_departure_transfer = $("#airport_departure_transfer").val();

      airport_arrival_transfer = $("#airport_arrival_transfer").val();

      var arrival_transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');

      var departure_transfer_title = $("#airport_departure_transfer").find(':selected').data('title');

      airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();

      airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();

      if(departure_airport_name) {

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

          type: 'post',

          data: {departure_airport_name:departure_airport_name,from: from,airport_departure_transfer: airport_departure_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_departure_fuel},

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = departure_transfer_title;

            if(departure_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(departure_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(departure_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            // if($('#airport_round_trip').is(":checked")){

            //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#location_airport_distance").html(rs.distance);

            //   $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

            //   $("#airport_departure_distane_emission").html(rs.emission*2);

            // }

            // else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_airport_distance").html(rs.distance);

              $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_departure_distane_emission").html(rs.emission);

            // }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

          }

        });        

      }

      if(arrival_airport_name) {

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_location_and_airport_distance_for_product',

          type: 'post',

          data: {departure_airport_name:arrival_airport_name,from: to,airport_departure_transfer: airport_arrival_transfer,ghg_assessment_id: ghg_assessment_id,airport_transfer_departure_fuel: airport_transfer_arrival_fuel },

          success: function(response){

            rs = JSON.parse(response);

            tooltip_inner_text = arrival_transfer_title;

            if(arrival_transfer_title=="Driving") {

              tooltip_inner_text+=" "+airport_transfer_departure_fuel

            }

            if(arrival_transfer_title=="Train") {

              tooltip_inner_text+=" ride";

            }

            if(arrival_transfer_title=="Bus") {

              tooltip_inner_text+=" ride";

            }

            // if($('#airport_round_trip').is(":checked")){

            //   tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#location_arrival_airport_distance").html(rs.distance);

            //   $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

            //   $("#airport_arrival_distane_emission").html(rs.emission*2);

            // }

            // else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_arrival_airport_distance").html(rs.distance);

              $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_arrival_distane_emission").html(rs.emission);

            // }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

          }

        });        

      }

      if(departure_code && arrival_code) {

        // alert(departure_code);

        // alert(arrival_code);

        // airport_departure_transfer = $("#airport_departure_transfer").val();

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_air_distance_for_product',

          type: 'post',

          data: {departure_code:departure_code,arrival_code: arrival_code,airport_departure_transfer: airport_departure_transfer,ghg_assessment_id:ghg_assessment_id},

          success: function(response){

            rs = JSON.parse(response);

            // if($('#airport_round_trip').is(":checked")){

            //   tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

            //   $("#airport_distance").html(rs.distance);

            //   $("#airport_distance_emission").html(rs.emission*2);

            //   $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            // }

            // else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>Flying "+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#airport_distance").html(rs.distance);

              $("#airport_distance_emission").html(rs.emission);

              $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            // }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            // airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

          }

        });

      }

    }



    function change_location_to() {

        location_from = $("#autocomplete").val();

        location_to = $("#autocomplete1").val();

        $("#departing_bus_station").html(location_from);

        $("#arriving_bus_station").html(location_to);

        $("#trip_div").show();

    }



    function find_emission_for_land_vehicle() {

        location_from = $("#autocomplete").val();

        location_to = $("#autocomplete1").val();

        vehicle = $("#land_vehicle").val();

        vehicle_for_land = $("#vehicle_for_land").val();

        vehicle_name = $('#vehicle_for_land').find('option:selected').attr('data-nm');

        $("#transportation_by").val(vehicle_name);

        ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_emission_for_land_vehicle',

          type: 'post',

          data: {location_from: location_from,location_to: location_to,ghg_assessment_id:ghg_assessment_id,vehicle: vehicle, vehicle_for_land: vehicle_for_land},

          success: function(response){

            rs = JSON.parse(response);

              tooltip_text = "<p>Flying "+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#bus_distance_emission").html(rs.emission);

              $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

            airport_distance_emission = $("#bus_distance_emission").html();

            tot = parseFloat(airport_distance_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

            $("#transport_emission").val(tot);

          }

        });

    }



    function getVehicleFactorForRail(vehicle_id,vehicle_icon,vehicle_title) {
          $("#vehicle_for_rail").val(vehicle_id);
          document.getElementById("box8").classList.toggle("act");
          $("#box8 i").attr("class",vehicle_icon);
          $("#rail_departure_transfer_spn").html(vehicle_title);
        // var transfer_title = $("#vehicle_for_rail").find(':selected').data('title');

        // $("#rail_departure_transfer_spn").html(transfer_title);

        // if(transfer_title=="Motobikes") {

        //     $("#rail_transfer_departure_icon").removeClass();

        //     $("#rail_transfer_departure_icon").addClass("fa fa-bicycle");

        // }

        // if(transfer_title=="Cars" || transfer_title=="Vans") {

        //     $("#rail_transfer_departure_icon").removeClass();

        //     $("#rail_transfer_departure_icon").addClass("fa fa-car");

        // }

        // if(transfer_title=="Heavy Goods Vehicles" || transfer_title=="Heavy Goods Vehicles Refrigerated") {

        //     $("#rail_transfer_departure_icon").removeClass();

        //     $("#rail_transfer_departure_icon").addClass("fa fa-bus");

        // }

        // vehicle_id = $(that).val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/getVehicleFactor',

          type: 'post',

          data: {vehicle_id: vehicle_id},

          success: function(response){

            rs = JSON.parse(response);

            $("#rail_departure_transfer").html(rs.res);

          }

        });

    }



    function getVehicleFactorForRailArrival(vehicle_id,vehicle_icon,vehicle_title) {
          $("#vehicle_for_rail_arrival").val(vehicle_id);
          document.getElementById("box9").classList.toggle("act");
          $("#box9 i").attr("class",vehicle_icon);
          $("#rail_arrival_transfer_spn").html(vehicle_title);
        // var transfer_title = $("#vehicle_for_rail_arrival").find(':selected').data('title');

        // $("#rail_arrival_transfer_spn").html(transfer_title);

        // if(transfer_title=="Motobikes") {

        //     $("#rail_transfer_arrival_icon").removeClass();

        //     $("#rail_transfer_arrival_icon").addClass("fa fa-bicycle");

        // }

        // if(transfer_title=="Cars" || transfer_title=="Vans") {

        //     $("#rail_transfer_arrival_icon").removeClass();

        //     $("#rail_transfer_arrival_icon").addClass("fa fa-car");

        // }

        // if(transfer_title=="Heavy Goods Vehicles" || transfer_title=="Heavy Goods Vehicles Refrigerated") {

        //     $("#rail_transfer_arrival_icon").removeClass();

        //     $("#rail_transfer_arrival_icon").addClass("fa fa-bus");

        // }

        // vehicle_id = $(that).val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/getVehicleFactor',

          type: 'post',

          data: {vehicle_id: vehicle_id},

          success: function(response){

            rs = JSON.parse(response);

            $("#rail_arrival_transfer").html(rs.res);

          }

        });

    }



    function getVehicleFactorForAirport(vehicle_id,vehicle_icon,vehicle_title) {
          $("#vehicle_for_airport").val(vehicle_id);
          document.getElementById("box10").classList.toggle("act");
          $("#box10 i").attr("class",vehicle_icon);
          $("#airport_departure_transfer_spn").html(vehicle_title);
        // var transfer_title = $("#vehicle_for_airport").find(':selected').data('title');

        // $("#airport_departure_transfer_spn").html(transfer_title);

        // if(transfer_title=="Motobikes") {

        //     $("#transfer_departure_icon").removeClass();

        //     $("#transfer_departure_icon").addClass("fa fa-bicycle");

        // }

        // if(transfer_title=="Cars" || transfer_title=="Vans") {

        //     $("#transfer_departure_icon").removeClass();

        //     $("#transfer_departure_icon").addClass("fa fa-car");

        // }

        // if(transfer_title=="Heavy Goods Vehicles" || transfer_title=="Heavy Goods Vehicles Refrigerated") {

        //     $("#transfer_departure_icon").removeClass();

        //     $("#transfer_departure_icon").addClass("fa fa-bus");

        // }

        // vehicle_id = $(that).val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/getVehicleFactor',

          type: 'post',

          data: {vehicle_id: vehicle_id},

          success: function(response){

            rs = JSON.parse(response);

            $("#airport_departure_transfer").html(rs.res);

          }

        });

    }



    function getVehicleFactorForAirportArrival(vehicle_id,vehicle_icon,vehicle_title) {
          $("#vehicle_for_airport_arrival").val(vehicle_id);
          document.getElementById("box11").classList.toggle("act");
          $("#box11 i").attr("class",vehicle_icon);
          $("#airport_arrival_transfer").html(vehicle_title);
        // var transfer_title = $("#vehicle_for_airport_arrival").find(':selected').data('title');

        // $("#airport_arrival_transfer_spn").html(transfer_title);

        // if(transfer_title=="Motobikes") {

        //     $("#transfer_arrival_icon").removeClass();

        //     $("#transfer_arrival_icon").addClass("fa fa-bicycle");

        // }

        // if(transfer_title=="Cars" || transfer_title=="Vans") {

        //     $("#transfer_arrival_icon").removeClass();

        //     $("#transfer_arrival_icon").addClass("fa fa-car");

        // }

        // if(transfer_title=="Heavy Goods Vehicles" || transfer_title=="Heavy Goods Vehicles Refrigerated") {

        //     $("#transfer_arrival_icon").removeClass();

        //     $("#transfer_arrival_icon").addClass("fa fa-bus");

        // }

        // vehicle_id = $(that).val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/getVehicleFactor',

          type: 'post',

          data: {vehicle_id: vehicle_id},

          success: function(response){

            rs = JSON.parse(response);

            $("#airport_arrival_transfer").html(rs.res);

          }

        });

    }



    function getVehicleFactorForLand(vehicle_id,vehicle_icon,vehicle_title) {
          $("#vehicle_for_land").val(vehicle_id);
          document.getElementById("box7").classList.toggle("act");
          $("#box7 i").attr("class",vehicle_icon);
          $("#land_span").html(vehicle_title);
        // var transfer_title = $("#vehicle_for_land").find(':selected').data('nm');

        // $("#land_span").html(transfer_title);

        // if(transfer_title=="Motobikes") {

        //     $("land_icon").removeClass();

        //     $("#land_icon").addClass("fa fa-bicycle");

        // }

        // if(transfer_title=="Cars" || transfer_title=="Vans") {

        //     $("#land_icon").removeClass();

        //     $("#land_icon").addClass("fa fa-car");

        // }

        // if(transfer_title=="Heavy Goods Vehicles" || transfer_title=="Heavy Goods Vehicles Refrigerated") {

        //     $("#land_icon").removeClass();

        //     $("#land_icon").addClass("fa fa-bus");

        // }

        // vehicle_id = $(that).val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/getVehicleFactor',

          type: 'post',

          data: {vehicle_id: vehicle_id},

          success: function(response){

            rs = JSON.parse(response);

            $("#land_vehicle").html(rs.res);

          }

        });

    }

    </script>

    <script>
        document.getElementById("btn7").addEventListener("click", function () {
          document.getElementById("box7").classList.toggle("act");
        });        
        document.getElementById("btn8").addEventListener("click", function () {
          document.getElementById("box8").classList.toggle("act");
        });        
        document.getElementById("btn9").addEventListener("click", function () {
          document.getElementById("box9").classList.toggle("act");
        });        
        document.getElementById("btn10").addEventListener("click", function () {
          document.getElementById("box10").classList.toggle("act");
        });        
        document.getElementById("btn11").addEventListener("click", function () {
          document.getElementById("box11").classList.toggle("act");
        });        
    </script>