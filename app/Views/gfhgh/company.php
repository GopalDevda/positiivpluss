<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<style>

    .company_page .indicators div {

    width: 25% !important;

    text-align: center;

}

.label_select {
    max-width: 247px;
}

.custom_animate #rail_btn {
    width: 40px;
    height: 40px;
    background-color: #edfeb6;
    border: 1px solid #a4bd50 !important;
    transition: 0.5s;
    border-radius: 100%;
    font-size: 18px;
    color: #262626;
    cursor: pointer;
    z-index: 2;
    display: grid;
    place-content: center;
}

.custom_animate #rail_box {
    position: relative;
    display: flex;
    align-items: center;
}

.custom_animate #rail_list {
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

.custom_animate #box4_list {
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
  
.custom_animate .act > #box4_list {
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

/*.custom_animate #box5 {
    position: relative;  
    display: flex;
    align-items: center;
  }

 .custom_animate #btn5 {
    width: 40px;
    height: 40px;  
    background-color: #edfeb6;
    border: 1px solid #a4bd50 !important;
    transition: 0.5s;
    border-radius: 100%; 
    font-size: 18px;
    color: #262626;  
    cursor: pointer;
    z-index: 2;  
    display: grid;
    place-content: center;
  }

.custom_animate #btn5:hover {
    box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
    border: 1px solid #defe73 !important;
    transition: 0.5s;
    background: #defe73;
    color: #262626;
  }
*/
.custom_animate #box5_list {
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

.custom_animate .act > #box5_list {
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

/*
.custom_animate #box6 {
    position: relative;  
    display: flex;
    align-items: center;
  }

 .custom_animate #btn6 {
    width: 40px;
    height: 40px;  
    background-color: #edfeb6;
    border: 1px solid #a4bd50 !important;
    transition: 0.5s;
    border-radius: 100%; 
    font-size: 18px;
    color: #262626;  
    cursor: pointer;
    z-index: 2;  
    display: grid;
    place-content: center;
  }

.custom_animate #btn6:hover {
    box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
    border: 1px solid #defe73 !important;
    transition: 0.5s;
    background: #defe73;
    color: #262626;
  }
*/
.custom_animate #box6_list {
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

.custom_animate .act > #box6_list {
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

        <div class="main-content-wrap sidenav-open d-flex flex-column custom_page company_page">

            <!-- ============ Body content start ============= -->

            <div class="main-content category_body">

                <div class="breadcrumb">

                    <h1>Building</h1>

<!--                     <ul></ul>

                        <li><a href="">dummy</a></li>

                        <li>dummy</li>

                    </ul> -->

                </div>

                <div class="separator-breadcrumb border-top"></div>



                <div class="row">



                <input type="hidden" name="assessment_id" value="<?php //echo $assessment_id['assessment_id'];?>" >

                    <div class="col-lg-12 col-md-12">

                        <div class="category_page_header">

                            <div class="cph_inner">

                                <div class="cph_left">

                                    <img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $assessment[0]['image'];?>">

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

                                                <div class="cph_score_result"><?php echo $completed_module_count ?> Out of 4</div>

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

    if($total_company_footprint<1000) {

        echo (number_format($total_company_footprint,2,".","."))." kgs CO2e";

    }

    else {

        echo (number_format($total_company_footprint/1000,2,".","."))." tonnes CO2e";

    }

?>

                            </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>





<?php 

    // if($supp_assess) {

        if(!$supp_assess || $supp_assess['is_submit']==0) {

        // if($no_of_company<$no_of_entry) {

?>



                <div class="row mt-2">

                    <div class="col-sm-12">

                        <div id="tab1c">                            

                            <div class="step_body">

                                <div class="step_form">                              

                                    <div class="indicators d-flex text-light">

<!--                                         <div class="rounded-circle bg-secondary"><span><i class="material-icons">volunteer_activism</i></span></div> -->

                                        <div class="rounded-circle bg-secondary"><span><i class="material-icons">apartment</i></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">water_drop</i></span></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span class=""><i class="material-icons">fastfood</i></span></div>

                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">phone_iphone</i></span></div>

                                        <hr>

                                    </div>

                                </div>   

                                <div class="position-relative">

<!--                                    <form class="stepped" action="<?php echo base_url() ?>/brand/companyAssessmentSubmit" method="post" id="welcome_frm">

                        <input type="hidden" name="company_id" value="<?php echo $supp_assess?$supp_assess['id']:'0' ?>" />

                                    <div class="steps step_1">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Welcome to the Business Carbon Footprint Calculator</div>

                                                <div class="form_title_sub">

                                                    First, please tell us where your business is based

                                                </div>

                                            </div>

                                        </div>

                                        <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">Name or location of office</label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field">

                                                    <select class="form-control" id="country_id" name="country_id">

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

                                                <option value='<?= $c['id'] ?>' <?php echo $check_country; ?>><?= $c['name'] ?></option>

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

                                                <label for="inp1">How many employees do you have?</label>

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

                                        <option value="<?= $i ?>" <?php echo $check_emp; ?>><?= $i ?></option>

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

                                                    <div class="stc_left"><input id="date_from" name="date_from" value="<?php echo $new_date_from; ?>" /></div>

                                                    <div class="stc_center">to</div>

                                                    <div class="stc_right"><input id="date_to" name="date_to" value="<?php echo $new_date_to; ?>" /></div>

                                                </div>

                                            </div>

                                        </div>

                                        <br>

                                        <div class="step_form_bottom_line">

                                            Next, select the appropriate tab above to calculate the part of your business emissions you are most interested in, e.g. your flights.

                                            Or, visit each of the tabs above to calculate the full carbon footprint for your business.<br><br> 

                                            Following your calculation, you can offset / neutralise your emissions through one of our climate-friendly projects.

                                        </div>

                                        <div class="step_form_btns text-right">

                                            <button type="submit" class="btnNext btn btn-outline-success">Next</button>

                                        </div>

                                    </div>  

                                    </form> -->

                                    <form class="stepped" action="<?php echo base_url() ?>/brand/buildingAssessmentSubmit" method="post" id="building_frm">

            <input type="hidden" name="ghg_id" value="17" />

            <input type="hidden" name="ghg_assessment_id" id="ghg_assessment_id" value="<?php echo $ghg_assessment_id; ?>" />

                                    <div class="steps step_2">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Building carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    Electricity and Heating used by an organisation at sites owned/controlled by them. Also Air conditioning from chilled water within a centralized energy plant and underground pipes distribution.

                                                </div>

                                                <div class="admin_btn btn_black">

<!--                                                     <input type="button" value="Estimate Building's Footprint" onclick="myFunction()"> -->    

                                                </div>                                                

                                            </div>

                                        </div>               

                            <?php 

                            // $total_building_footprint = 0;

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==17) {

                                    $ghg_qty = "";

                                    $unit_nm = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                                            $ghg_qty = $gd['quantity'];

                                            $unit_nm = $gd['unit'];

                                            // $total_building_footprint = $total_building_footprint + ($gd['quantity']*$gf['emission_factor']);

                                        }

                                    }

                                }

                            ?>

    <input type="hidden" name="factor[]" value="<?php echo $gf['id']; ?>" />

    <input type="hidden" name="emission_factor[]" value="<?php echo $gf['emission_factor']; ?>" />

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">

                                            <?= $gf['factor_name'] ?>

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        <input type="number" placeholder="Enter number" name="qty[]" value="<?= $ghg_qty ?>" id="building_factor_qty_<?php echo $gf['id'] ?>">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" id="exampleFormControlSelect1" name="unit[]">

<option value="0">Select Unit</option>

<?php 

    if($unit_nm==$gf['unit_name']) {

?>

<option selected><?php echo $gf['unit_name'] ?></option>

<?php

    }

    else {

?>

<option><?php echo $gf['unit_name'] ?></option>

<?php

    }

?>

<?php 

    if($sub_units) {

        foreach($sub_units as $sub_unit) {

            if($sub_unit['unit_id']==$gf['factor_unit']) {

                if($unit_nm==$sub_unit['sub_unit_name']) {

?>

<option value="<?php echo $sub_unit['id']; ?>" selected><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

                else {

?>

<option value="<?php echo $sub_unit['id']; ?>"><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

?>

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

                            <?php

                                }

                                }

                            }

                            ?>                                        

                                        <div class="step_inner">

                                            <div class="step_label"> 

                                                <label for="inp1">What percentage of your employees normally work from home? </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div> 

                                            <div class="step_field">

                                                <div class="theme_field step_three_column column_shor">

                                                    <div class="stc_left">

                                                        <input type="number">

                                                    </div>                                                    

                                                </div>

                                            </div>

                                        </div>   

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_building_footprint()">    

                                            </div>                                            

                                            <div class="alert alert-success custom_alert" role="alert">

<span id="building_footprint">

    <?php 

    if($tot_building_footprint<1000) {

        echo ($tot_building_footprint)." Kgs ";

    }

    else {

        echo ($tot_building_footprint/1000)." tonnes ";

    } 

    ?>                                              

</span> 
<!--CO2e :   Estimate of building's footprint <span id="no_of_emp">-->

Estimate Emissions of the <?php 

 echo $supp_assess['cp_name']; 
        
        
?>
    
</span>

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="reset_building_footprint()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="building_footprint_estimation">

                            <?php 

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==17) {

                                    $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>
Estimate Emissions of
        <?php 

        if($gd['estimate']<1000) {

            echo ($gd['estimate'])." kgs";

        } 

        else {

            echo ($gd['estimate']/1000)." tonnes";

        }

        ?>

                                </span> CO2e 
<!--$gd['quantity']." "-->
    <?php 

        echo $gd['unit']." of ".$gf['factor_name'];

    ?>
	   used in Carbon footprint
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

                                            <button type="button" class="btnNext btn btn-outline-success">Next</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>                                                                                

                                    </div>

                                    </form>
                                    <!--Water Consumption -->
                                      <form class="stepped" action="<?php echo base_url() ?>/brand/waterAssessmentSubmit" method="post" id="flight_frmm">

            <input type="hidden" name="ghg_id" value="28" />

            <input type="hidden" name="ghg_assessment_id" id="ghg_assessment_id" value="<?php echo $ghg_assessment_id; ?>" />

                                    <div class="steps step_2">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>    

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Water </div>

                                                <div class="form_title_sub">

                                                   Enter details of the Water delivered for Office purposes and through the mains supply network, also mention the amount of Water returned into the sewage system through mains drains.
                                                </div>

                                                <div class="admin_btn btn_black">

<!--                                                     <input type="button" value="Estimate Building's Footprint" onclick="myFunction()"> -->    

                                                </div>                                                

                                            </div>

                                        </div>               

                           

<?php 
                            // $total_building_footprint = 0;
  $db = \Config\Database::connect();
  $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=0) and ( gf.country_id=0)");        

        $water = $query->getResultArray();
       
  
               

                            if($water) {

                                 foreach($water as $wat){

                                    if($wat['ghg_id']==28) {

                                    $ghg_qty = "";

                                    $unit_nm = "";

                                if($ghg_assessment_detail1) {

                                    foreach($ghg_assessment_detail1 as $gdl) {

                                        if($wat['id']==$gdl['factor_id']) {

                                            $ghg_qty = $gdl['quantity'];

                                            $unit_nm = $gdl['unit'];

                                            // $total_building_footprint = $total_building_footprint + ($gdl['quantity']*$gf['emission_factor']);

                                        }

                                    }

                                }

                            ?>

    <input type="hidden" name="factor[]" value="<?php echo $wat['id']; ?>" />

    <input type="hidden" name="emission_factor[]" value="<?php echo $wat['emission_factor']; ?>" />

                                        <div class="step_inner">

                                            <div class="step_label">

                                                <label for="inp1">

                                            <?= $wat['factor_name'] ?>

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>

                                            <div class="step_field">

                                                <div class="theme_field step_three_column">

                                                    <div class="stc_left">

                                                        <input type="number" placeholder="Enter number" name="qty[]" value="<?= $ghg_qty ?>" id="building_factor_qty_<?php echo $wat['id'] ?>">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" id="exampleFormControlSelect1" name="unit[]">

<option value="0">Select Unit</option>

<?php 

    if($unit_nm==$wat['unit_name']) {

?>

<option selected><?php echo $wat['unit_name'] ?></option>

<?php

    }

    else {

?>

<option><?php echo $wat['unit_name'] ?></option>

<?php

    }

?>

<?php 

    if($sub_units) {
        
           echo '<pre>';

        

      

        foreach($sub_units as $sub_unit) {

            if($sub_unit['unit_id']==$wat['factor_unit']) {
// print_r($sub_units);
                if($unit_nm==$wat['unit_name']) {

?>

<option value="<?php echo $sub_unit['id']; ?>" selected><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

                else {

?>

<option value="<?php echo $sub_unit['id']; ?>"><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

?>

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

                            <?php

                                }

                                }

                            }

                            ?>                                        

                                          

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Water Footprint" onclick="cal_and_add_to_water_footprint()">    

                                            </div>                                            

                                            <div class="alert alert-success custom_alert" role="alert">

<span id="building_water_footprint">

    <?php 

    if($tot_WATER_footprint<1000) {

        echo (number_format($tot_WATER_footprint,2))." Kgs ";

    }

    else {

        echo number_format(($tot_WATER_footprint/1000),2)." tonnes ";

    } 

    ?>                                              

</span> 
<!--CO2e :   Estimate of building's footprint <span id="no_of_emp">-->

Estimate Emissions of the <?php 

echo "Total Water."
//  echo $supp_assess['cp_name']; 
        
        
?>
    
</span>

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="reset_building_footprint()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="building_water_estimation">

                            <?php 

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==28) {

                                    $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>
Estimate Emissions of
        <?php 

        if($gd['estimate']<1000) {

            echo ($gd['estimate'])." kgs";

        } 

        else {

            echo ($gd['estimate']/1000)." tonnes";

        }

        ?>

                                </span> CO2e 
<!--$gd['quantity']." "-->
    <?php 

        echo $gd['unit']." of ".$gf['factor_name'];

    ?>
	   used in Carbon footprint
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

                                            <button type="button" class="btnNext btn btn-outline-success">Next</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>                                                                                

                                    </div>

                                    </form>
                                    

                                   

                                    <form class="stepped" action="<?php echo base_url() ?>/brand/companyConsumableAssessmentSubmit" method="post" id="company_consumable_frm">

                <?php 

                // $old_vehicle_mileage = "";

                // $old_vehicle = "";

                // $old_vehicle_info_1 = "";

                // $old_vehicle_info_2 = "";

                // $old_vehicle_info_3 = "";

                // $old_vehicle_info_4 = "";

                // $old_vehicle_efficience = "";

                if($ghg_assessment_detail) {

                    foreach($ghg_assessment_detail as $gd) {

                        if($gd['ghg_id']==19) {

                        // $old_vehicle_mileage = $gd['vehicle_mileage'];

                        // $old_vehicle = $gd['vehicle'];

                        // $old_vehicle_info_1 = $gd['vehicle_info_1'];

                        // $old_vehicle_info_2 = $gd['vehicle_info_2'];

                        // $old_vehicle_info_3 = $gd['vehicle_info_3'];

                        // $old_vehicle_info_4 = $gd['vehicle_info_4'];

                        // $old_vehicle_efficience = $gd['vehicle_efficience'];

                        }

                    }

                }

                ?>

            <input type="hidden" name="ghg_assessment_id" id="cv_ghg_assessment_id" value="<?php echo $ghg_assessment_id; ?>" />

            <input type="hidden" name="ghg_id" value="29" />

                                    <div class="steps step_4">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                              <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>  

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Consumables</div>

                                                <div class="form_title_sub">
Enter details of the Consumables ie Food provided by the organization to be consumed by the employees (e.g. canteens), paper consumed for printing, and documentation purposes, and plastic and plastic products used in the office.
<!--Travel in Cars ,Vans, Trucks and Motorcycles owned or controlled by the reporting organisation. This does not include vehicles owned by employees that are used for business purposes.-->
                                                    <!--You can enter details for up to 5 cars or vans                                                   -->

                                                </div>

                                            </div>

                                        </div> 

                                        
<div class="row" style="margin-top:10px;">

    <div class="col-md-12 class_flight">

      <form id="flight_frm" action="<?php echo base_url(); ?>/brand/findG_airport" method="post" id="consum_frm">
        <div class="step_inner">
            <div class="step_label">
                <label for="inp1">Select Consumption</label>
                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
            </div>
            <div class="step_label">
                <label for="inp1">Consumption Sub Category</label>
                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
            </div>
            <div class="step_label">
                <label for="inp1">Quantity</label>
                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
            </div>
            <div class="step_label">
                <label for="inp1">Unit</label>
                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
            </div>
        </div>
        <div class="step_inner append_row">
            <div class="theme_field step_label">
                <select class="form-control label_select" name="consumption_id[]" id="exampleFormControlSelect1" onchange="getConsSub(this)">
                    <option value="">Select Consumption</option>
                    <?php 
                        foreach($cons as $con){
                    ?>
                    <option value="<?php echo $con['id'] ?>"><?php echo $con['consumption_name'] ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="theme_field step_label">
                <select class="form-control label_select" id="sub_consm" name="sub_cons[]" onchange="setUnitCons(this)">
                    <option value="">Select Consumption Sub Category</option>
              </select>
            </div>
            <div class="theme_field step_label">
                <input type="number" name="qty[]" class="form-control label_select">
            </div>
            <div class="theme_field step_label">
                <select class="form-control label_select" id="cons_unit" name="cons_unit[]">
                    <option value="">Select Unit</option>
                </select>
            </div>
            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more"><span aria-hidden="true" onclick="addMoreConsum()">+</span></button>
        </div>
        <span class="consumDiv"></span>
        <!--<div class="admin_btn mt-3">-->
        <!--  <input type="button" value="Submit"/>          -->
        <!--</div>                    -->
      </form>      

    </div>

  </div>
                                        

                                       

                                       

                                      

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

                                                    <input type="number" class="mr-2" name="efficiency" value="" id="efficiency" onkeyup="resetVehicle()">

                                                    <select class="form-control mr-2" id="exampleFormControlSelect1">

                                                        <option>g/km</option>

                                                        <option>L/100km</option>   

                                                        <option>mpg UK</option>                                                       

                                                        <option>mpg US</option>                                                 

                                                    </select>

<select class="form-control" id="company_vehicle_factor" name="company_vehicle_factor">

    <option value="0">Select Factor</option>

<?php 

    if($ghg_factor) {

        foreach($ghg_factor as $gf) {

            if($gf['ghg_id']==19) {

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

                                        </div>   -->                                       

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Consumables Footprint" onclick="cal_and_add_to_company_consumable_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="consumable_footprint">

<?php 

    if($tot_company_vehicle_footprint<1000) {

        echo ($tot_company_vehicle_footprint)." kgs ";

    } 

    else {

        echo (($tot_company_vehicle_footprint)/1000)." tonnes ";

    }

?>                                                    

                                                </span> CO2e : Estimate of Company Consumable Footprint
                                                <!--Estimate Emissions of Type-Model-Vehicle.(Small-Petrol-Car)-->
                                                <!--Estimate of Company Vehicle Footprint-->

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="resetCompanyVehicleFootprint()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="company_consumable_footprint_estimation">

                            <?php 

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gd['ghg_id']==29) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>

<?php 

    if($gd['estimate']<1000) {

        echo ($gd['estimate'])." kgs ";

    } 

    else {

        echo ($gd['estimate']/1000)." tonnes ";

    }

?>

                                </span> CO2e :

    <?php 
        
    $db = \Config\Database::connect();  
$query = $db->query("SELECT sub_category FROM `Consumption_Sub_Category` WHERE `id`=".$gd['consumption_sub_id']."");

        $ava = $query->getResultArray(); 
        foreach($ava as $s){
            
            
        

echo 'Estimate Emissions of '.$s['sub_category'];
}
    ?>

                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeCompanyVehicleFactor('<?php echo $gd['id'] ?>','<?php echo $gd['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

                            </div>

                            <?php

                                        }

                                    }

                                }

                            ?>

                        </div>                                             

                                        </div>                          

                                        <div class="step_form_btns text-right">

                                            <button type="button" class="btnNext btn btn-outline-success">Next</button>

<!--                                             <div id="tab2">next</div> -->

                                        </div>

                                    </div>

                                    </form>

                                    <form class="stepped" action="<?php echo base_url() ?>/brand/mobileFuelSubmit" method="post" id="mobile_fuel_frm">

            <input type="hidden" id="mf_ghg_assessment_id" name="ghg_assessment_id"  value="<?php echo $ghg_assessment_id; ?>" />

            <input type="hidden" id="mf_ghg_id" name="ghg_id" value="20" />

                                    <div class="steps step_5">

                                        <div class="row sfb">

                                            <div class="col-sm-1">

                                                <div class="step_form_img">

                                                    <i class="fa fa-calculator" aria-hidden="true"></i>

                                                </div>   

                                            </div>

                                            <div class="col-sm-11 spt_right">

                                                <div class="form_big_title">Mobile fuel carbon footprint calculator</div>

                                                <div class="form_title_sub">

                                                    <!--You can enter details for all Generator, mobile ......, logistics etc directly-->

Combustion of fuels in owned or controlled stationary equipment such as boilers, furnaces, burners, turbines, heaters, incinerators, engines, flares, etc.


                                                    <br>

                                                    <!--Enter your usage of each type of fuel, and press the Calculate button-->

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

                                        </div>

                    <?php 

                    $total_mobile_fuel_footprint=0;

/*                    if($ghg_factor) {

                        foreach($ghg_factor as $gf) {

                            if($gf['ghg_id']==20) {

                                $ghg_qty = "";

                                $unit_nm = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                                            $ghg_qty = $gd['quantity'];

$total_mobile_fuel_footprint = $total_mobile_fuel_footprint + ($gd['estimate']);

$unit_nm = $gd['unit'];

                                        }

                                    }

                                }

                    ?>

    <input type="hidden" name="mf_factor[]" value="<?php echo $gf['id']; ?>" />

    <input type="hidden" name="mf_emission_factor[]" value="<?php echo $gf['emission_factor']; ?>" />

                    <div class="step_inner">                                            

                                            <div class="step_label">

                                                <label for="inp1">

                                            <?= $gf['factor_name'] ?>

                                                </label>

                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                            </div>                                        

                                            <div class="step_field">

                                            <div class="theme_field d-flex">

                                                    <input type="number" class="mr-2" name="mf_qty[]" value="<?= $ghg_qty ?>" id="mobile_fuel_factor_qty_<?php echo $gf['id'] ?>">

                                                    <select class="form-control" id="exampleFormControlSelect1" name="mf_unit[]">

<option value="0">Select Unit</option>

<?php 

    if($gf['unit_name']==$unit_nm) {

?>

<option selected><?php echo $gf['unit_name']; ?></option>

<?php

    }

    else {

?>

<option><?php echo $gf['unit_name']; ?></option>

<?php

    }

?>

<?php 

    if($sub_units) {

        foreach($sub_units as $sub_unit) {

            if($sub_unit['unit_id']==$gf['factor_unit']) {

                if($sub_unit['sub_unit_name']==$unit_nm) {

?>

<option value="<?php echo $sub_unit['id'] ?>" selected><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

                else {

?>

<option value="<?php echo $sub_unit['id'] ?>"><?php echo $sub_unit['sub_unit_name']; ?></option>

<?php

                }

?>

<?php                

            }

        }

    }

?>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                    <?php

                            }

                        }

                    } */

                    ?>                      

<!-- Mobile Fuel New View Start -->
<?php 

    $no_of_building_factors=0;

    $total_building_footprint = 0;

    $row_check=0;

    if($ghg_assessment_detail) {

        foreach($ghg_assessment_detail as $key=>$gad) {

            if($gad['ghg_id']==20) {

                $no_of_building_factors++;

                $row_check++;

?>



                                        <div class="step_inner append_row" id="fact_div_1">

                                            <div class="theme_field step_label">

                                                <select class="form-control label_select" id="exampleFormControlSelect1" name="mf_factor[]" onchange="setUnit(this)">

<option value="0">Select Material</option>

<?php

$product_factor="";

$prod_fact_unit = "";

if($ghg_factor) {

                foreach($ghg_factor as $gf) {

                    if($gf['ghg_id']==20) {

                        $ghg_qty = "";

                        $slt_status="";

                        if($gf['id']== $gad['factor_id'] ) {

                            $total_mobile_fuel_footprint = $total_mobile_fuel_footprint + ($gad['estimate']);

                            $slt_status="selected";

                        }

            $product_factor.='<option value="'.$gf['id'].'" '.$slt_status.'>'.$gf['factor_name'].'</option>';


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

                                                        <input type="number" placeholder="Enter number" name="mf_qty[]" value="<?php  echo $gad['quantity'] ?>">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" name="mf_unit[]">
<!-- <option value="0">Select Unit</option> -->
                                <?php echo $prod_fact_unit; ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>

                                            <button class="remove_factor_block btn btn-danger" style="<?php echo $row_check>1?'':'visibility:hidden'; ?>"><i class="fa fa-trash"></i></button>

<?php

if($row_check>1) {

?>


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

                                                <select class="form-control label_select" id="exampleFormControlSelect1" name="mf_factor[]" onchange="setUnit(this)">

<option value="0">Select Material</option>

<?php

$product_factor="";

if($ghg_factor) {

                foreach($ghg_factor as $gf) {

                    if($gf['ghg_id']==20) {

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

                                                        <input type="number" placeholder="Enter number" name="mf_qty[]">

                                                    </div>

                                                    <div class="stc_center"></div>

                                                    <div class="stc_right">

                                                        <select class="form-control" name="mf_unit[]">

                                    <option value="0">Select Unit</option>

                                                        </select>

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

<!-- Mobile Fuel New View End -->

                                        <div class="sf_center_desc">

                                            <div class="admin_btn btn_black">

                                                <input type="button" value="Calculate & Add To Footprint" onclick="cal_and_add_to_mobile_fuel_footprint()">    

                                            </div> 

                                            <div class="alert alert-success custom_alert" role="alert">

                                                <span id="mobile_fuel_footprint">
	Estimate Emissions of 
<?php 

    if($total_mobile_fuel_footprint<1000) {

        echo ($total_mobile_fuel_footprint)." kgs ";

    } 

    else {

        echo ($total_mobile_fuel_footprint/1000)." tonnes ";

    }


?>CO2e


                                                 <!--CO2e : Estimate of mobile fuel's footprint-->
                                                 </span>

<!--                                                 <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="resetMobileFuel()"><span aria-hidden="true">×</span></button> -->

                                            </div>

                                            <div id="mobile_fuel_footprint_estimation">

                            <?php 

                            if($ghg_factor) {

                                foreach($ghg_factor as $gf) {

                                    if($gf['ghg_id']==20) {

                                    $ghg_qty = "";

                                if($ghg_assessment_detail) {

                                    foreach($ghg_assessment_detail as $gd) {

                                        if($gf['id']==$gd['factor_id']) {

                            ?>

                            <div class="alert alert-success custom_alert" role="alert">

                                <span>
	
<?php 

    if($gd['estimate']<1000) {

        echo ($gd['estimate'])." kgs ";

    } 

    else {

        echo ($gd['estimate']/1000)." tonnes ";

    }

?>

                                </span> CO2e :
	Estimate Emissions of 

    <?php 

        echo $gd['quantity']." ".$gd['unit']." of ".$gf['factor_name'];

    ?>

                                <button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeMobileFuelFactor('<?php echo $gd['id'] ?>','<?php echo $gf['id'] ?>','<?php echo $gd['supplier_assessment_id'] ?>')"><span aria-hidden="true">×</span></button>

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

                                <button type="button" class="btnNext btn btn-outline-success" onclick="submitCompanyFootprint()">Submit</button>

<!--                                 <div id="tab2">next</div> -->

                            </div>

                                    </div>                                

                                    </form>

                                </div>

                            </div>

                            <div class="step_form_btns text-right">

                                <button type="button" class="btnPrev btn btn-outline-success">Previous</button>

                                <button type="button" class="btnNext btn btn-outline-success" style="display:none;">Next</button>

<!--                                 <div id="tab2">next</div> -->

                            </div>

                        </div>

                            

                        

                        

                    </div>

                </div>

<?php            

         }

    if($supp_assess) {

?>



                <div class="" id="tab2c">

                    <div class="col-sm-12">

<?php 

    if($supp_assess['is_submit']==1 && $supp_assess['is_verify']==0) {

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
                                        <input type="button" value="Verify" onclick="verifyCompanyFootprint('<?php echo $supp_assess['id']; ?>')">    

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

                                    <div class="undo" id="tab1"><u onclick="undoCompanyFootprint('<?php echo $supp_assess['id']; ?>')">Undo</u></div>

                                </div>

                            </div>

                        </div>

<?php        

    }

?>


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



                        <div class="accordion custom_accordion" id="accordionRightIcon" style="display:none;">

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

                                <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="padding-top:10px">

                                    <div class="card-body" style="padding:10px !important">

                                        <div class="custom_tab">

                                            <ul class="nav nav-pills" id="myPillTab" role="tablist">

                                                <li class="nav-item"><a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#Result" role="tab" aria-controls="homePIll" aria-selected="false">Result</a></li>

                                                <li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Target" role="tab" aria-controls="profilePIll" aria-selected="false">Target</a></li>

                                                <li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Offset" role="tab" aria-controls="contactPIll" aria-selected="true">Offset</a></li>

                                            </ul> 

                                            <div class="tab-content" id="myPillTabContent">

                                                <div class="tab-pane fade active show" id="Result" role="tabpanel" aria-labelledby="home-icon-pill">

<!-- <div class="row">

    <div class="col-md-12">

    <h3>Ghg(In percentage(%))</h3>

    <div id="ghgCategoryPie" style="height: 300px;"></div>        

    </div>

</div>

<hr/> -->

<!-- <div class="row">

    <div class="col-md-7" style="border-right: solid 1px black;">

        <div class="table-responsive">

            <h3>Top in each stage</h3>

            <table class="table">

                <thead>

                    <tr>

                        <th scope="col">Scope</th>

                        <th scope="col">Ghg</th>

                        <th scope="col">Factor</th>

                        <th scope="col">Amount</th>    

                                                                                          

                    </tr>

                </thead>

                <tbody>

<?php 

    if($top_in_each_stage) {

        foreach($top_in_each_stage as $ties) {

?>

<tr>

<td><?php echo $ties['ghg_category_name']; ?></td>

<td><?php echo $ties['ghg_name']; ?></td>

<td><?php echo $ties['factor_name']; ?></td>

<td><?php echo number_format($ties['value'],2).' tonnes'; ?></td>

</tr>

<?php            

        }

    }

?>                    

                </tbody>

            </table>

        </div>

    </div>

    <div class="col-md-5">

        <h3>Ghg Category(In percentage(%))</h3>

        <div id="topStagePie" style="height: 300px;"></div>                

    </div>

</div> -->

<!-- <div>

    <h3>Top in each Ghg(In percentage(%))</h3>

    <div id="topStagePie" style="height: 300px;"></div>

</div>

<hr/>

<div>

    <h3>Ghg Category(In percentage(%))</h3>

    <div id="ghgCategoryPie" style="height: 300px;"></div>

</div>                                                 -->

</div>

                                                <div class="tab-pane fade show" id="Target" role="tabpanel" aria-labelledby="home-icon-pill">

                                                <div class="accordion_table">

                                                        <div class="table-responsive">

                                                        <table class="table">

                                                                <thead>

                                                                    <tr>

                                                                        <th scope="col">Category</th>

                                                                        <th scope="col">Sub Category</th>

                                                                        <th scope="col">Status</th>

                                                                        <th scope="col">Remark</th>    

<!--                                                                         <th scope="col" class="float-right">Action</th>        -->                                                                                                                      

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

                            </td>               -->                                                         

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

                                                                        <td>Remark here</td>    

                                                                        <td class="doc_action">                                                                            

                                                                            <a href="" data-toggle="modal" data-target="#docEditePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                                                            </a>&nbsp;&nbsp;

                                                                            <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                                                            </a>

                                                                        </td>                                                                        

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 2</td>

                                                                        <td>Sub Cat name 2</td>

                                                                        <td>Remark here</td>  

                                                                        <td class="doc_action">                                                                            

                                                                            <a href="" data-toggle="modal" data-target="#docEditePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                                                            </a>&nbsp;&nbsp;

                                                                            <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 3</td>

                                                                        <td>Sub Cat name 3</td>

                                                                        <td>Remark here</td> 

                                                                        <td class="doc_action">                                                                            

                                                                            <a href="" data-toggle="modal" data-target="#docEditePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                                                            </a>&nbsp;&nbsp;

                                                                            <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 4</td>

                                                                        <td>Sub Cat name 4</td>

                                                                        <td>Remark here</td> 

                                                                        <td class="doc_action">                                                                            

                                                                            <a href="" data-toggle="modal" data-target="#docEditePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                                                            </a>&nbsp;&nbsp;

                                                                            <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                    <tr>                                                            

                                                                        <td>Category name 5</td>

                                                                        <td>Sub Cat name 5</td>

                                                                        <td>Remark here</td>                                                             

                                                                        <td class="doc_action">                                                                            

                                                                            <a href="" data-toggle="modal" data-target="#docEditePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">

                                                                            </a>&nbsp;&nbsp;

                                                                            <a href="" data-toggle="modal" data-target="#docDeletePopup">

                                                                                <img src="<?php echo base_url();?>public/brand/assets//custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">

                                                                            </a>

                                                                        </td> 

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

<?php        

    }

// }

?>

<hr/>

<?php 

    if($supp_assess) {

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
 
                echo (number_format($ties['value'],2,".","."))." kgs CO2e";

            } 

            else {

                echo (number_format($ties['value']/1000,2,".","."))." tonnes CO2e";

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

?>

<!-- step form start-->





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

//        alert('test');

        clickerBtn(1);

       });

       }

      }

     }

     let MS = new MultiStep("#tab1c");

    });

</script>

<!-- step form end-->

<script>

    $(document).ready(function(){

        $( "#date_from" ).datepicker();

        $("#date_to").datepicker();

        $('[data-toggle="tooltip"]').tooltip();   

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

//                alert('ok');

                $("#ghg_assessment_id").val(response);

                $("#flg_ghg_assessment_id").val(response);

                $("#cv_ghg_assessment_id").val(response);

                $("#mf_ghg_assessment_id").val(response);

                // $("#server-results").html(response);

            });

        });



        $("#building_frm").submit(function(event){

            // alert('test');

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

//                alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#flight_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

//                alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#company_vehicle_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

//                alert('ok');

                // $("#server-results").html(response);

            });

        });



        $("#mobile_fuel_frm").submit(function(event){

            event.preventDefault(); //prevent default action 

            var post_url = $(this).attr("action"); //get form action url

            var request_method = $(this).attr("method"); //get form GET/POST method

            var form_data = $(this).serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

//                alert('ok');

                location.reload();

                // $("#server-results").html(response);

            });

        });



        function calculate_building_footprint() {

            var total_footprint=0;

            var emp = $("#no_of_employee").val();

            var qty = $("input[name='qty[]']").map(function(){

               return $(this).val();

            }).get();

            var emission_factor = $("input[name='emission_factor[]']").map(function(){

               return $(this).val();

            }).get();



            for(var i=0;i<qty.length;i++) {

                if(qty[i]) {

                    total_footprint = total_footprint + ( qty[i] * emission_factor[i]);

                }

            }

            $("#building_footprint").html(total_footprint.toFixed(2));

            // $("#no_of_emp").html(" for "+emp+" employees");

        }



        function calculate_mobile_fuel_footprint() {

            var total_footprint=0;

            var emp = $("#no_of_employee").val();

            var qty = $("input[name='mf_qty[]']").map(function(){

               return $(this).val();

            }).get();

            var emission_factor = $("input[name='mf_emission_factor[]']").map(function(){

               return $(this).val();

            }).get();



            for(var i=0;i<qty.length;i++) {

                if(qty[i]) {

                    total_footprint = total_footprint + ( qty[i] * emission_factor[i]);

                }

            }

            $("#mobile_fuel_footprint").html(total_footprint.toFixed(2)+" tonnes: Estimate of mobile fuel's footprint");

            // $("#no_of_emp").html(emp);

        }



</script>

<script>

    function myFunction() {

        var no_of_emp = $("#no_of_employee").val();

        var country_id = $("#country_id").val();

        var assessment_id = '<?php echo $ghg_assessment_id ?>';

        $("#building_frm input").prop("disabled", true);

        $("#building_frm select").prop("disabled", true);

      $.ajax({

            url : "<?php echo base_url()?>/brand/getCountryEmissionFactor/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                $("#building_footprint").html((rs.estimate));

                $("#no_of_emp").html("for "+rs.emp+" employees");

                $("#building_footprint_estimation").html('');

                $("#building_frm input[type='number']").val('');

            },

            error: function(xhr, status, error){

//                alert('error');

            }



        });

    }


function cal_and_add_to_water_footprint() {

            var post_url = $("#flight_frmm").attr("action"); //get form action url

            var request_method = $("#flight_frmm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frmm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(data){ 

                rs = JSON.parse(data);

                $("#building_water_estimation").html(rs.res);

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs"

                    $("#building_water_footprint").html(rs_conversion);                    

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes"

                    $("#building_water_footprint").html(rs_conversion);

                }

            });

            // calculate_building_footprint();

    }
    function cal_and_add_to_building_footprint() {

            var post_url = $("#building_frm").attr("action"); //get form action url

            var request_method = $("#building_frm").attr("method"); //get form GET/POST method

            var form_data = $("#building_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(data){ 

                rs = JSON.parse(data);

                $("#building_footprint_estimation").html(rs.res);

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs"

                    $("#building_footprint").html(rs_conversion);                    

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes"

                    $("#building_footprint").html(rs_conversion);

                }

            });

            // calculate_building_footprint();

    }



    function removeBuildingFactor(id,ghg_factor_id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeBuildingFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                $("#building_footprint_estimation").html(rs.res);

                $("#building_factor_qty_"+ghg_factor_id).val("");

                if(rs.tot) {

                    if(rs.tot<1000) {

                        rs_conversion = (rs.tot)+" kgs";

                        $("#building_footprint").html(rs_conversion);                    

                    }

                    else {

                        rs_conversion = (rs.tot/1000)+" tonnes";

                        $("#building_footprint").html(rs_conversion);

                    }

                }

                else {

                    rs_conversion = "0 kg";

                    $("#building_footprint").html(rs_conversion);                    

                }

                // calculate_building_footprint();

            },

            error: function(xhr, status, error){

            }



        });

    }



    function cal_and_add_to_mobile_fuel_footprint() {

            var post_url = $("#mobile_fuel_frm").attr("action"); //get form action url

            var request_method = $("#mobile_fuel_frm").attr("method"); //get form GET/POST method

            var form_data = $("#mobile_fuel_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                $("#mobile_fuel_footprint_estimation").html(rs.res);

                if(rs.tot<1000) {

                    rs_conversion = (rs.tot)+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#mobile_fuel_footprint").html(rs_conversion+" CO2e : Estimate of mobile fuel's footprint");

               // alert('ok');

                // $("#server-results").html(response);

            });

            // calculate_mobile_fuel_footprint();        

    }



    function removeMobileFuelFactor(id,ghg_factor_id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeMobileFuelFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(response){

                rs = JSON.parse(response);

                $("#mobile_fuel_footprint_estimation").html(rs.res);

                $("#mobile_fuel_factor_qty_"+ghg_factor_id).val("");

                rs_conversion = "";

                if(rs.tot) {

                    if(rs.tot<1000) {

                        rs_conversion = (rs.tot)+" kgs ";

                    }

                    else {

                        rs_conversion = (rs.tot/1000)+" tonnes ";

                    }

                }

                else {

                        rs_conversion = "0 kg ";                    

                }

                $("#mobile_fuel_footprint").html(rs_conversion+" CO2e : Estimate of mobile fuel's footprint");

                // calculate_mobile_fuel_footprint();

            },

            error: function(xhr, status, error){

            }



        });        

    }



    function reset_building_footprint() {

      var supplier_assessment_id = $("#ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllBuildingFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#building_footprint_estimation").html('');

                $("#building_frm input[type='number']").val('');

                $("#building_frm input").prop("disabled", false);

                $("#building_frm select").prop("disabled", false);        

                $("#building_footprint").html('');

                $("#no_of_emp").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function removeCompanyVehicleFactor(id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeCompanyVehicleFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                rs_conversion = "";

                if(rs.tot) {

                    if(rs.tot<1000) {

                        rs_conversion = rs.tot+" kgs ";

                    }

                    else {

                        rs_conversion = (rs.tot/1000)+" tonnes ";

                    }

                }

                else {

                        rs_conversion = "0 kg ";                    

                }

                $("#company_vehicle_footprint").html(rs_conversion);

                $("#consumable_footprint").html(rs.res);

            },

            error: function(xhr, status, error){

            }



        });

    }    



    function cal_and_add_to_company_vehicle_footprint() {

            var mileage = $("#mileage").val();

            var vehicle = $("#vehicle").val();


            var vehicle_info_1 = $("#vehicle_info_1").val();

            var vehicle_info_2 = $("#vehicle_info_2").val();

            var efficiency = $("#efficiency").val();

            var company_vehicle_factor = $("#company_vehicle_factor").val();

            $("#mileage").css("border-color","");

            $("#vehicle").css("border-color","");

            $("#vehicle_info_1").css("border-color","");

            $("#vehicle_info_2").css("border-color","");

            if(mileage=="") {

                $("#mileage").css("border-color","red");

                $("#mileage").focus();

                return;

            }

            if(vehicle=="0") {

                $("#vehicle").css("border-color","red");

                $("#vehicle").focus();

                return;

            }

            if(vehicle_info_1=="0") {

                $("#vehicle_info_1").css("border-color","red");

                $("#vehicle_info_1").focus();

                return;

            }

            if(vehicle_info_2=="0") {

                $("#vehicle_info_2").css("border-color","red");

                $("#vehicle_info_2").focus();

                return;

            }

            // if(efficiency<=0) {

            //     $("#efficiency").css("border-color","red");

            //     $("#efficiency").focus();

            //     return;

            // }

            if(company_vehicle_factor=="0") {

                $("#company_vehicle_factor").css("border-color","red");

                $("#company_vehicle_factor").focus();

                return;

            }

            var post_url = $("#company_vehicle_frm").attr("action"); //get form action url

            var request_method = $("#company_vehicle_frm").attr("method"); //get form GET/POST method

            var form_data = $("#company_vehicle_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                rs_conversion = "";

                if(rs.tot) {

                    if(rs.tot<1000) {

                        rs_conversion = rs.tot+" kgs ";

                    }

                    else {

                        rs_conversion = (rs.tot/1000)+" tonnes ";

                    }

                }

                else {

                        rs_conversion = "0 kg ";                    

                }

                $("#company_vehicle_footprint").html(rs_conversion);

                $("#company_vehicle_footprint_estimation").html(rs.res);

               // alert('ok');

                // $("#server-results").html(response);

            });

            // calculate_building_footprint();

    }



    function resetCompanyVehicleFootprint() {

      var supplier_assessment_id = $("#cv_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllCompanyVehicleFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#company_vehicle_footprint_estimation").html('');

                $("#company_vehicle_frm input[type='number']").val('');

                $("#company_vehicle_frm input[type='text']").val('');

                $("#company_vehicle_footprint").html('0');

                $("#no_of_emp").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function cal_and_add_to_flight_footprint() {

            var trip_from = $("#trip_from").val();

            var trip_to = $("#trip_to").val();

            var trip_count = $("#trip_count").val();

            $("#trip_from").css("border-color","");

            // $("#trip_from").css("color","");

            $("#trip_to").css("border-color","");

            // $("#trip_to").css("color","");

            $("#trip_count").css("border-color","");

            // $("#trip_count").css("color","");

            if(trip_from=="") {

                $("#trip_from").css("border-color","red");

                // $("#trip_from").css("color","red");

                $("#trip_from").focus();

                return;

            }

            if(trip_to=="") {

                $("#trip_to").css("border-color","red");

                // $("#trip_to").css("color","red");

                $("#trip_to").focus();

                return;

            }

            if(trip_count<=0) {

                $("#trip_count").css("border-color","red");

                // $("#trip_count").css("color","red");

                $("#trip_count").focus();

                return;

            }

            var post_url = $("#flight_frm").attr("action"); //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission

            

            $.ajax({

                url : post_url,

                type: request_method,

                data : form_data

            }).done(function(response){ 

                rs = JSON.parse(response);

                rs_conversion = "";

                if(rs.tot) {

                    if(rs.tot<1000) {

                        rs_conversion = rs.tot+" kgs ";                    

                    }

                    else {

                        rs_conversion = (rs.tot/1000)+" tonnes ";                    

                    }

                }

                else {

                        rs_conversion = "0 kgs ";                                        

                }

                $("#flight_footprint").html(rs_conversion);

                $("#flight_footprint_estimation").html(rs.res);

               // alert('ok');

                // $("#server-results").html(response);

            });

            // calculate_building_footprint();

    }



    function removeFlightFactor(id,assessment_id) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeFlightFactor/"+id+"/"+assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                rs = JSON.parse(data);

                rs_conversion = "";

                if(rs.tot<1000) {

                    rs_conversion = rs.tot+" kgs ";

                }

                else {

                    rs_conversion = (rs.tot/1000)+" tonnes ";

                }

                $("#flight_footprint").html(rs_conversion);

                $("#flight_footprint_estimation").html(rs.res);

            },

            error: function(xhr, status, error){

            }



        });

    }    



    function getYearByCompanyVehicle(that) {

      vehicle = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getYearByCompanyVehicle/"+vehicle,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#vehicle_info_1").html(data);

                $("#vehicle_info_2").html('<option value="0">Select Type</option>');

                $("#vehicle_info_3").html('<option value="0">Select Model</option>');

                $("#company_vehicle_factor").html('<option value="0"></option>');

                // $("#company_vehicle_factor").prop('disabled', false);

            },

            error: function(xhr, status, error){

            }



        });

    }



    function getTypeOfCompanyVehicle(that) {

      vehicle = $("#vehicle").val();

      year = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getTypeOfCompanyVehicle",

            type: "POST",

            data : { "vehicle":vehicle,"year":year },

            // dataType: "JSON",

            success: function(data){

                $("#vehicle_info_2").html(data);

                $("#vehicle_info_3").html('<option value="0">Select Model</option>');

                $("#company_vehicle_factor").html('<option value="0"></option>');

                // $("#company_vehicle_factor").prop('disabled', false);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function getModelOfCompanyVehicle(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getModelOfCompanyVehicle",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type },

            // dataType: "JSON",

            success: function(data){

                $("#vehicle_info_3").html(data);

                $("#company_vehicle_factor").html('<option value="0"></option>');

                // $("#company_vehicle_factor").prop('disabled', false);

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



    function getGhgFactorOfCompanyVehicle(that) {

      vehicle = $("#vehicle").val();

      year = $("#vehicle_info_1").val();

      type = $("#vehicle_info_2").val();

      model = $("#vehicle_info_3").val();

      // derivative = $(that).val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/getGhgFactorOfCompanyVehicle",

            type: "POST",

            data : { "vehicle":vehicle,"year":year,"type":type,"model":model },

            // dataType: "JSON",

            success: function(data){

                $("#company_vehicle_factor").html(data);

                // $("#company_vehicle_factor").prop('disabled', true);

            },

            error: function(xhr, status, error){

            }

        });

    }



    function submitCompanyFootprint() {

      var supplier_assessment_id = $("#mf_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/submitCompanyFootprint"+"/"+supplier_assessment_id,

            type: "GET",

            // dataType: "JSON",

            success: function(data){

                location.reload();

            },

            error: function(xhr, status, error){

            }

        });

    }



    function undoCompanyFootprint(assessment_id=0) {

      $.ajax({

            url : "<?php echo base_url()?>/brand/undoCompanyFootprint"+"/"+assessment_id,

            type: "GET",

            // dataType: "JSON",

            success: function(data){

                location.reload();

            },

            error: function(xhr, status, error){

            }

        });

    }



    function verifyCompanyFootprint(assessment_id=0) {

     $.ajax({

            url : "<?php echo base_url()?>/brand/verifyCompanyFootprint"+"/"+assessment_id,

            type: "POST",

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
          
                // 

            },

            error: function(xhr, status, error){

            }

        });        

    }

</script>



<script>

      var input = document.getElementById('trip_from');

      var trip_from = new google.maps.places.Autocomplete(input);



      var input1 = document.getElementById('trip_to');

      var trip_to = new google.maps.places.Autocomplete(input1);

    

</script>



<script>

    function resetFlight() {

      var supplier_assessment_id = $("#flg_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllFlightFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#flight_footprint_estimation").html('');

                $("#flight_frm input[type='number']").val('');

                $("#flight_frm input[type='text']").val('');

                $("#flight_footprint").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function resetMobileFuel() {

      var supplier_assessment_id = $("#mf_ghg_assessment_id").val();

      $.ajax({

            url : "<?php echo base_url()?>/brand/removeAllMobileFuelFactor"+"/"+supplier_assessment_id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                $("#mobile_fuel_footprint_estimation").html('');

                $("#mobile_fuel_frm input[type='number']").val('');

                $("#mobile_fuel_footprint").html('');

            },

            error: function(xhr, status, error){

            }



        });

    }



    function resetVehicle() {

        $("#vehicle").val("0");

        $("#vehicle_info_1").val("0");

        $("#vehicle_info_2").val("0");

        $("#vehicle_info_3").val("0");

    }

</script>

<!-- Datepicker End -->

<script>

    $(document).ready(function(){

  var echartElemPie = document.getElementById("echartPie");

  if (echartElemPie) {

    console.log(echartElemPie);

    var echartPie = echarts.init(echartElemPie);

    echartPie.setOption({

      color: ["#ea6e6e","#defe73", "#575757", "#DFC496"],

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

      color: ["#ea6e6e","#999A99", "#575757"],

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

        data: ["CO2e"],

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

          name: "CO2e",

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

      var input = document.getElementById('autocomplete');

      var autocomplete = new google.maps.places.Autocomplete(input);



      var input1 = document.getElementById('autocomplete1');

      var autocomplete1 = new google.maps.places.Autocomplete(input1);



    </script>

<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- <script

      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&callback=initMap&libraries=places&v=weekly"

      async

    ></script> -->



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

            var post_url = '<?php echo base_url(); ?>'+'/brand/find_airport'; //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            

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



            var post_url = '<?php echo base_url(); ?>/brand/find_airport'; //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            

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





            var post_url = '<?php echo base_url(); ?>/brand/getAirportByLocation'; //get form action url

            var request_method = $("#flight_frm").attr("method"); //get form GET/POST method

            var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            

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



      $("#airport_transfer_arrival_fuel").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');

        airport_arrival_transfer = $("#airport_arrival_transfer").val();

        var transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');

        var transfer_icon = $("#airport_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();

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
            airport_arrival_transfer = $("#airport_transfer_arrival_fuel").val();
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

                if($('#airport_round_trip').is(":checked")){

                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_arrival_distane_emission").html(rs.emission*2);

                  $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#airport_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_arrival_distane_emission").html(rs.emission);

                  $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);                

              }

            });          

        }

      });



      $("#airport_transfer_departure_fuel").change(function(){

        from = $("#autocomplete").val();

        departure_airport_name = $("#departure_airport").find(':selected').data('nm');

        airport_departure_transfer = $("#airport_departure_transfer").val();

        var transfer_title = $("#airport_departure_transfer").find(':selected').data('title');

        var transfer_icon = $("#airport_departure_transfer").find(':selected').data('icon');

        airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();

        // if(transfer_title=="Driving") {

        //   $("#airport_transfer_departure_fuel").show();

        //   $("#airport_transfer_departure_fuel").parent().show();

        // }

        // else {

        //   $("#airport_transfer_departure_fuel").hide();

        //   $("#airport_transfer_departure_fuel").parent().hide();

        // }

        $("#airport_departure_transfer_spn").html(transfer_title);

        // $("#transfer_departure_icon").removeClass();

        // $("#transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {
            airport_departure_transfer = $("#airport_transfer_departure_fuel").val()
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

                if($('#airport_round_trip').is(":checked")){

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_departure_distane_emission").html(rs.emission*2);

                  $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#airport_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#airport_distance").html(rs.distance);

                  $("#airport_departure_distane_emission").html(rs.emission);

                  $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

      });



// For Bus station Start



      $("#bus_transfer_arrival_fuel").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');

        airport_arrival_transfer = $("#bus_arrival_transfer").val();

        var transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');

        var transfer_icon = $("#bus_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();

        // if(transfer_title=="Driving") {

        //   $("#bus_transfer_arrival_fuel").show();

        //   $("#bus_transfer_arrival_fuel").parent().show();

        // }

        // else {

        //   $("#bus_transfer_arrival_fuel").hide();

        //   $("#bus_transfer_arrival_fuel").parent().hide();

        // }

        $("#bus_arrival_transfer_spn").html(transfer_title);

        // $("#bus_transfer_arrival_icon").removeClass();

        // $("#bus_transfer_arrival_icon").addClass(transfer_icon);

        if(to && arrival_airport_name) {
            airport_arrival_transfer = $("#bus_transfer_arrival_fuel").val();
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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });          

        }

      });



      $("#land_vehicle").change(function(){

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

        // $("#bus_departure_transfer_spn").html(transfer_title);

        // $("#bus_transfer_departure_icon").removeClass();

        // $("#bus_transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {
            airport_departure_transfer = $("#land_vehicle").val();
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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });

          }

        }

      });







// For Bus station End





// For Train station Start



      $("#rail_transfer_arrival_fuel").change(function(){

        to = $("#autocomplete1").val();

        arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');

        airport_arrival_transfer = $("#rail_arrival_transfer").val();

        var transfer_title = $("#rail_arrival_transfer").find(':selected').data('title');

        var transfer_icon = $("#rail_arrival_transfer").find(':selected').data('icon');

        airport_transfer_arrival_fuel = $("#rail_transfer_arrival_fuel").val();

        // if(transfer_title=="Driving") {

        //   $("#rail_transfer_arrival_fuel").show();

        //   $("#rail_transfer_arrival_fuel").parent().show();

        // }

        // else {

        //   $("#rail_transfer_arrival_fuel").hide();

        //   $("#rail_transfer_arrival_fuel").parent().hide();

        // }

        $("#rail_arrival_transfer_spn").html(transfer_title);

        // $("#rail_transfer_arrival_icon").removeClass();

        // $("#rail_transfer_arrival_icon").addClass(transfer_icon);

        if(to && arrival_airport_name) {
            airport_arrival_transfer = $("#rail_transfer_arrival_fuel").val();
            airport_arrival_transfer = $("#rail_transfer_arrival_fuel").val();
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

                if($('#rail_round_trip').is(":checked")){

                  tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_arrival_distane_emission").html(rs.emission*2);

                  $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#rail_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_arrival_distane_emission").html(rs.emission);

                  $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

              }

            });          

        }

      });



      $("#rail_transfer_departure_fuel").change(function(){

        from = $("#autocomplete").val();

        departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');

        airport_departure_transfer = $("#rail_departure_transfer").val();

        var transfer_title = $("#rail_departure_transfer").find(':selected').data('title');

        var transfer_icon = $("#rail_departure_transfer").find(':selected').data('icon');

        airport_transfer_departure_fuel = $("#rail_transfer_departure_fuel").val();

        // if(transfer_title=="Driving") {

        //   $("#rail_transfer_departure_fuel").show();

        //   $("#rail_transfer_departure_fuel").parent().show();

        // }

        // else {

        //   $("#rail_transfer_departure_fuel").hide();

        //   $("#rail_transfer_departure_fuel").parent().hide();

        // }

        $("#rail_departure_transfer_spn").html(transfer_title);

        // $("#rail_transfer_departure_icon").removeClass();

        // $("#rail_transfer_departure_icon").addClass(transfer_icon);

        if(from && departure_airport_name) {
            airport_departure_transfer = $("#rail_transfer_departure_fuel").val();
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

                if($('#rail_round_trip').is(":checked")){

                tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_departure_distane_emission").html(rs.emission*2);

                  $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

                }

                else if($('#rail_round_trip').is(":not(:checked)")){

                  tooltip_text = "<p>Train ride "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

                  $("#rail_station_distance").html(rs.distance);

                  $("#rail_departure_distane_emission").html(rs.emission);

                  $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

                }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

        airport_departure_transfer = $("#land_vehicle").val();        

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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_bus").html(tot);

            $("#total_emission_flight").val(tot);



          }

        });        

    }



      if(arrival_airport_name) {
        airport_arrival_transfer = $("#bus_transfer_arrival_fuel").val();
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

            airport_hotel_emission = $("#bus_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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

              $.ajax({

                 url: '<?php echo base_url() ?>/brand/find_distance',

                 type: 'post',

                 data: {lat_from:lat_from,long_from: long_from,lat_to: lat_to,long_to: long_to},

                 success: function(response){

                  // $("#bus_station_distance").html(response);



            rs = JSON.parse(response);

            if($('#rail_round_trip').is(":checked")){

              tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#rail_station_distance").html(rs.distance);

              $("#rail_distance_emission").html(rs.emission*2);

              $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            }

            else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>Train ride "+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#rail_station_distance").html(rs.distance);

              $("#rail_distance_emission").html(rs.emission);

              $('#rail_riding_tooltip').attr('data-original-title', tooltip_text);

            }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

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
        airport_departure_transfer = $("#rail_transfer_departure_fuel").val();
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

            if($('#rail_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_rail_distance").html(rs.distance);

              $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_departure_distane_emission").html(rs.emission*2);

            }

            else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_rail_distance").html(rs.distance);

              $('#rail_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_departure_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);

          }

        });        

    }



      if(arrival_airport_name) {
        airport_arrival_transfer = $("#rail_transfer_arrival_fuel").val();
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

            if($('#rail_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_arrival_rail_distance").html(rs.distance);

              $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_arrival_distane_emission").html(rs.emission*2);

            }

            else if($('#rail_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_arrival_rail_distance").html(rs.distance);

              $('#rail_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#rail_arrival_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#rail_departure_distane_emission").html();

            airport_distance_emission = $("#rail_distance_emission").html();

            airport_arrival_distane_emission = $("#rail_arrival_distane_emission").html();

            airport_hotel_emission = $("#rail_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_rail").html(tot);

            $("#total_emission_flight").val(tot);            

          }

        });        

      }



  }



    function find_air_distance() {

      departure_code = $("#departure_airport").val();

      arrival_code = $("#arrival_airport").val();

      from = $("#autocomplete").val();

      to = $("#autocomplete1").val();

      flying_class = $("#flying_class").val();

      departure_airport_name = $("#departure_airport").find(':selected').data('nm');

      arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');

      airport_departure_transfer = $("#airport_departure_transfer").val();

      airport_arrival_transfer = $("#airport_arrival_transfer").val();

      var arrival_transfer_title = $("#airport_arrival_transfer").find(':selected').data('title');

      var departure_transfer_title = $("#airport_departure_transfer").find(':selected').data('title');

      airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();

      airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();

      if(departure_airport_name) {
        airport_departure_transfer = $("#airport_transfer_departure_fuel").val();
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

            if($('#airport_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_airport_distance").html(rs.distance);

              $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_departure_distane_emission").html(rs.emission*2);

            }

            else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_airport_distance").html(rs.distance);

              $('#airport_departure_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_departure_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);



          }

        });        

      }

      if(arrival_airport_name) {
        airport_arrival_transfer = $("#airport_transfer_arrival_fuel").val();
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

            if($('#airport_round_trip').is(":checked")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#location_arrival_airport_distance").html(rs.distance);

              $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_arrival_distane_emission").html(rs.emission*2);

            }

            else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>"+tooltip_inner_text+" "+rs.distance+" km<br/>"+rs.emission+" kg</p>";

              $("#location_arrival_airport_distance").html(rs.distance);

              $('#airport_arrival_tooltip').attr('data-original-title', tooltip_text);

              $("#airport_arrival_distane_emission").html(rs.emission);

            }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

          }

        });        

      }

      if(departure_code && arrival_code) {

        // alert(departure_code);

        // alert(arrival_code);

        // airport_departure_transfer = $("#airport_departure_transfer").val();

        $.ajax({

          url: '<?php echo base_url() ?>/brand/find_air_distance',

          type: 'post',

          data: {departure_code:departure_code,arrival_code: arrival_code,flying_class: flying_class,airport_departure_transfer: airport_departure_transfer},

          success: function(response){

            rs = JSON.parse(response);

            if($('#airport_round_trip').is(":checked")){

              tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p><p>Round Trip x 2</p><p>Subtotal "+(rs.emission*2)+"</p>";

              $("#airport_distance").html(rs.distance);

              $("#airport_distance_emission").html(rs.emission*2);

              $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            }

            else if($('#airport_round_trip').is(":not(:checked)")){

              tooltip_text = "<p>Flying "+flying_class+" "+rs.distance+"<br/>"+rs.emission+" kg</p>";

              $("#airport_distance").html(rs.distance);

              $("#airport_distance_emission").html(rs.emission);

              $('#airport_flying_tooltip').attr('data-original-title', tooltip_text);

            }

            airport_departure_distane_emission = $("#airport_departure_distane_emission").html();

            airport_distance_emission = $("#airport_distance_emission").html();

            airport_arrival_distane_emission = $("#airport_arrival_distane_emission").html();

            airport_hotel_emission = $("#airport_hotel_emission").html();

            tot = parseFloat(airport_departure_distane_emission) + parseFloat(airport_distance_emission) + parseFloat(airport_arrival_distane_emission) + parseFloat(airport_hotel_emission);

            $("#total_emission_airport").html(tot);

            $("#total_emission_flight").val(tot);

          }

        });

      }

    }

    function getVehicleFactorForLand(vehicle_id,append_reference,field_icon,field_reference,text_for_field,text_field_reference) {
      document.getElementById(field_reference).classList.toggle("act");
      $("#"+field_reference+" i").attr("class",field_icon);
      $("#"+text_field_reference).html(text_for_field);
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

            $("#"+append_reference).html(rs.res);

          }

        });

    }

    function find_emission_for_land_vehicle(that,vehicle_reference) {

        // location_from = $("#autocomplete").val();

        // location_to = $("#autocomplete1").val();

        // vehicle = $(that).val();

        // vehicle_for_land = $("#vehicle_for_land").val();

        // vehicle_name = $('#vehicle_for_land').find('option:selected').attr('data-nm');

        // $("#transportation_by").val(vehicle_name);

        // ghg_assessment_id = '<?php echo $ghg_assessment_id; ?>';

        // $.ajax({

        //   url: '<?php echo base_url() ?>/brand/find_emission_for_land_vehicle',

        //   type: 'post',

        //   data: {location_from: location_from,location_to: location_to,ghg_assessment_id:ghg_assessment_id,vehicle: vehicle, vehicle_for_land: vehicle_for_land},

        //   success: function(response){

        //     rs = JSON.parse(response);

        //       tooltip_text = "<p>Flying "+rs.distance+"<br/>"+rs.emission+" kg</p>";

        //       $("#bus_distance_emission").html(rs.emission);

        //       $('#bus_riding_tooltip').attr('data-original-title', tooltip_text);

        //     airport_distance_emission = $("#bus_distance_emission").html();

        //     tot = parseFloat(airport_distance_emission);

        //     $("#total_emission_bus").html(tot);

        //     $("#total_emission_flight").val(tot);

        //     $("#transport_emission").val(tot);

        //   }

        // });

    } 

</script>

<!-- animation start -->
<script>
document.getElementById("btn").addEventListener("click", function () {
  document.getElementById("box").classList.toggle("act");
});  
document.getElementById("btn2").addEventListener("click", function () {
  document.getElementById("box2").classList.toggle("act");
});
document.getElementById("btn3").addEventListener("click", function () {
  document.getElementById("box3").classList.toggle("act");
});
document.getElementById("btn4").addEventListener("click", function () {
  document.getElementById("box4").classList.toggle("act");
});
document.getElementById("btn5").addEventListener("click", function () {
  document.getElementById("box5").classList.toggle("act");
});
document.getElementById("btn6").addEventListener("click", function () {
  document.getElementById("box6").classList.toggle("act");
});
document.getElementById("rail_btn").addEventListener("click", function () {
  document.getElementById("rail_box").classList.toggle("act");
});  


    function addMoreFactor() {
            event.preventDefault(); //prevent default action 
            var post_url = "<?php echo base_url() ?>/brand/getProductFactorForMobileFuel"; //get form action url
            var request_method = "POST"; //get form GET/POST method
            var form_data = $("#mobile_fuel_frm").serialize(); //Encode form elements for submission
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
                $('.factorDiv').append(rs.res);
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
            url : "<?php echo base_url()?>/brand/getUnitForMobileFuel/"+ele_id,
            type: "GET",
            success: function(data){
                $(obj2).find("select[name='mf_unit[]']").html(data);
            },
            error: function(xhr, status, error){
                // alert('error');
            }
        });
    }
    
    function setUnitCons(ele) {
        var ele_id = $(ele).val();
        var obj1 = $(ele).parent();
        var obj2 = $(obj1).parent();
      $.ajax({
            url : "<?php echo base_url()?>/brand/getUnitCons/"+ele_id,
            type: "GET",
            //dataType: "JSON",
            success: function(data){
                $(obj2).find("select[name='cons_unit[]']").html(data);
                //$(obj2).find('option:selected').attr("cons_unit");
            },
            error: function(xhr, status, error){
                // alert('error');
            }
        });

    }
    
//     function setUnitCons(s) {
//       var consmsub_id = s[s.selectedIndex].value;
//       $.ajax({
//               url : 'https://positiivplus.io/brand/getUnitCons',
//               type: 'POST',
//               data : { consmsub_id: consmsub_id}
//       }).done(function(response){ 
//         console.log(response);
// 		$("#cons_unit").html(response);
//       });
//     }
    function getConsSub(ele) {
        var ele_id = $(ele).val();
        var obj1 = $(ele).parent();
        var obj2 = $(obj1).parent();
      $.ajax({
            url : "<?php echo base_url()?>/brand/getConsSubCat/"+ele_id,
            type: "GET",
            //dataType: "JSON",
            success: function(data){
                $(obj2).find("select[name='sub_cons[]']").html(data);
                //$(obj2).find('option:selected').attr("cons_unit");
            },
            error: function(xhr, status, error){
                // alert('error');
            }
        });

    }
    
//     function getConsSub(s) {
//       var consm_id = s[s.selectedIndex].value;
//       $.ajax({
//               url : 'https://positiivplus.io/brand/getConsSubCat',
//               type: 'POST',
//               data : { consm_id: consm_id}
//       }).done(function(response){ 
//         console.log(response);
// 		$("#sub_consm").html(response);
//       });
//     }

function addMoreConsum() {
//      prod_factor = '<?php // echo $product_factor ?>';
//      $('.factorDiv').append('<div class="step_inner append_row"><div class="theme_field step_label"><select class="form-control label_select" id="exampleFormControlSelect1" name="prod_factor[]">'+prod_factor+'</select></div><div class="step_field"><div class="theme_field step_three_column"><div class="stc_left"><input type="number" placeholder="Enter number" name="qty[]" value=""></div><div class="stc_center"></div><div class="stc_right"><select class="form-control" id="exampleFormControlSelect1" name="unit[]"><option></option></select></div></div></div><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div>');
            event.preventDefault(); //prevent default action 
            var post_url = "<?php echo base_url() ?>/brand/getConsum"; //get form action url
            var request_method = "POST"; //get form GET/POST method
            var form_data = $("#consum_frm").serialize(); //Encode form elements for submission
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
                rand_num = rs.rand_num;
                $('.consumDiv').append(rs.res);
            });

    }
$(document).on('click','.remove_consm_block',function(){

        $(this).closest('.step_inner').remove();

    });
    v
       function cal_and_add_to_company_consumable_footprint() {
            var post_url = $("#company_consumable_frm").attr("action"); //get form action url
            var request_method = $("#company_consumable_frm").attr("method"); //get form GET/POST method
            var form_data = $("#company_consumable_frm").serialize(); //Encode form elements for submission

            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ 
                rs = JSON.parse(response);
                console.log(rs);
                
                $("#company_consumable_footprint_estimation").html(rs.res);
                rs_conversion = "";
                if(rs.tot<1000) {
                    rs_conversion = (rs.tot)+" kgs ";
                }
                else {
                    rs_conversion = (rs.tot/1000)+" tonnes ";
                }
                $("#consumable_footprint").html(rs_conversion+" CO2e : Estimate of building's footprint");
            });
            // calculate_building_footprint();
        }
</script>
<!-- animation end -->