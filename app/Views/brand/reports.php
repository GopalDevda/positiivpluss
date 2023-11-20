<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css"  />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="main-content-wrap sidenav-open d-flex flex-column custom_page report_page">

            <!-- ============ Body content start ============= -->

        <div class="main-content category_body">

            <div class="breadcrumb">

                <h1>Report</h1>

<!--                 <ul>

                    <li><a href="">dummy</a></li>

                    <li>dummy</li>

                </ul> -->

            </div>

            <div class="dropdown report_option">

                <div class="user col align-self-end">

                    <div class="report_option_lable" href="" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</div>                        

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(-114px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">                            

                        <a class="dropdown-item" data-toggle="modal" data-target="#addToWebsite">Add to Website</a>                            

                        <a class="dropdown-item" data-toggle="modal" data-target="#addToMedia">Add to Social Media</a>

                        <a class="dropdown-item" data-toggle="modal" data-target="#addToPrint">Add to Print</a>

                    </div>

                </div>

            </div>

            <div class="separator-breadcrumb border-top"></div>

                <div class="row">

                    <div class="col-md-12 custom_rl">

                        <div class="card text-left custom_tab">

                            <div class="tab-content report_body" id="myPillTabContent">                                

                                <div class="modal fade custom_modal get_code_modal" id="addToWebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Get Code</h5>

                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                            </div>

                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col-lg-12">

                                                        <div class="get_code_body">

                                                            You can select theme mode (Optional)

                                                            <div class="theme_select_btn">

                                                                <div class="btn_light float-left">Light</div>

                                                                <label class="switch float-left">

                                                                <input type="checkbox" id="toggle_btn" onclick="myFunction()">

                                                                <span class="slider round"></span>

                                                                </label>

                                                                <div class="btn_dark">Dark</div>

                                                            </div>

                                                            <div class="copy_url" onclick="copyFunction()">

                                                                <!--<img src="dist-assets/custom_img/icon_copy.png">--> Copy URL

                                                            </div>

                                                            <textarea class="custom_area mt-4" id="color_change"><iframe src="https://bigsolution.co.in/admin/brand_white_theme" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>

                                                            </textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="modal fade custom_modal action_modal" id="addToMedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Social Media</h5>

                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                            </div>

                                            <div class="modal-body">

                                                Please click any one to sharing

                                                <div class="social_btns">

                                                

                                                    <div class="social_btn_single"data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small">

                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                                                    </div>

                                                    <div class="social_btn_single">

                                                        <i class="fa fa-twitter" aria-hidden="true"></i>

                                                    </div>

                                                    <div class="social_btn_single">

                                                        <i class="fa fa-linkedin" aria-hidden="true"></i>

                                                    </div>

                                                    <div class="social_btn_single">

                                                        <i class="fa fa-youtube" aria-hidden="true"></i>

                                                    </div>

                                                </div>

                                                <!--<div class="admin_btn mt-4">

                                                    <input type="button" value="Yes">    

                                                </div>-->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="modal fade custom_modal action_modal" id="addToPrint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Download for Print</h5>

                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                            </div>

                                            <div class="modal-body">                                                        

                                                <div class="download_images">

                                                    <div class="di_single">

                                                        <div class="di_img">

<img src="<?php echo base_url() ?>/public/brand/assets/custom_img/custom_img/header_logo.png">

                                                        </div>

                                                        <div class="admin_btn black_btn">

                                                            <input type="button" value="Download">    

                                                        </div>

                                                    </div>   

                                                    <div class="di_single">

                                                        <div class="di_img">

<img src="<?php echo base_url() ?>/public/brand/assets/custom_img/custom_img/header_logo.png">

                                                        </div>

                                                        <div class="admin_btn black_btn">

                                                            <input type="button" value="Download">    

                                                        </div>

                                                    </div> 

                                                    <div class="di_single">

                                                        <div class="di_img">

<img src="<?php echo base_url() ?>/public/brand/assets/custom_img/custom_img/header_logo.png">

                                                        </div>

                                                        <div class="admin_btn black_btn">

                                                            <input type="button" value="Download">    

                                                        </div>

                                                    </div>                                                          

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="report_header">

                                    <div class="rh_inner">

                                        <div class="rh_left">

                                            <div class="d-flex">

                                                <!-- <div class="rh_img">

                                                    <img src="dist-assets/custom_img/1.jpg">

                                                </div> -->

                                                <div class="rh_name">

                                                    Utopiic Travels

                                                </div>

                                            </div>

                                            <h4> Hospitility</h4>

                                            <h4> India</h4>

                                            <!-- <div class="rh_score">

                                                <div class="rh_score_value line_width">6.8</div>

                                                <div class="rh_score_label">Score</div>

                                            </div> -->

                                                                                                

                                        </div>

                                        <div class="rh_right text-right">

                                            <div class="report_status_logo">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/report_logo.png">

<p class="<?php echo $level?strtolower($level['level_name']):''; ?> report_status"><?php echo $level?$level['level_name']:''; ?></p>

<!--                                                 <p class="positive report_status">Positive</p>

                                                <p class="green report_status">Green</p> -->

                                            </div>                                            

                                        </div>

                                        </div>

                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, provident voluptatum ut fugiat culpa ipsam natus voluptates enim vero consequuntur itaque reiciendis in cum quibusdam labore omnis blanditiis ullam iste.</p>

                                        <div class="rh_bar">

                                            <div class="bar_single">

                                                <div class="rh_bar_label line_width">Your Company</div>                                                        

                                                <div class="progress">                                                            

                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $level?$level['level_per']:''; ?>%"  aria-valuenow="<?php echo $level?$level['level_per']:''; ?>" aria-valuemin="0" aria-valuemax="100"></div>                                                            

                                                </div>

<div class="rh_bar_value"><?php echo $level?$level['level_per']:''; ?>%</div>

                                            </div>

                                            

                                            <!-- <div class="bar_single range_bar">

                                                <div class="rh_bar_label line_width">Your Level</div>                                                        

                                                <div class="report_range_slider">                                                            

                                                    <div class="progress-bar" role="progressbar" style="width: 30%"  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>                                                             -->

                                                    <!-- <input id="ex13" type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]'/> -->

                                            

                                                <!-- </div> -->

                                                <!-- <div class="rh_bar_value">30%</div> -->

                                            <!-- </div> --> 

                                            <div class="bar_single risk_bar_wrapper">

                                                <div class="rh_bar_label line_width">Your Risk</div>                                                        

                                                <div class="risk_bar">                                                            

                                                    <ul>

<li class="high_bg <?php echo $level?(($level['level_per']>=0 && $level['level_per']<=20)?'active':''):''; ?>"><a href="javascript:;">Higher</a></li>

<li class="medium_bg <?php echo $level?(($level['level_per']>=21 && $level['level_per']<=40)?'active':''):''; ?>"><a href="javascript:;">Medium</a></li>

<li class="low_bg <?php echo $level?(($level['level_per']>=41 && $level['level_per']<=60)?'active':''):''; ?>"><a href="javascript:;">Low</a></li>

<li class="good_bg <?php echo $level?(($level['level_per']>=61 && $level['level_per']<=80)?'active':''):''; ?>"><a href="javascript:;">Good</a></li>

<li class="exc_bg <?php echo $level?(($level['level_per']>=81 && $level['level_per']<=100)?'active':''):''; ?>"><a href="javascript:;">Excellent</a></li>

                                                    </ul>

                                                </div>

                                                <!-- <div class="rh_bar_value">85%</div> -->

                                            </div>                                                         

                                        </div>

<!-- Report Start -->

<div class="row">

<!-- Indicator Category Start -->
    <div class="col-md-6">
<?php 
    if($indicator_category_marks_per) {
        foreach($indicator_category_marks_per as $per) {
?>
    <div class="col-md-12" style="margin:10px;">
        <div class="d-flex">

        <div class="rh_sub_cat_icon">

        <img src="https://positiveplus.io/public/brand/dist-assets/custom_img/category_icon.png">

        </div>

        <div class="rh_sub_cat_name line_width" style="font-size:15px;font-weight:bold;">
<?php  echo $per['indicator_category']; ?>
        <!-- Economics  -->
            <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>

        </div>                                                                        

        </div>

        <div class="rh_sub_cat_right">
            <div class="rhsc_scrore_label" style="color:white;font-size:15px;">
<?php echo round($per['marks_per']); ?> /100
            </div>
        </div>

    </div>
<?php            
        }
    }
?>

    </div>
<!-- Indicator Category End -->

<!-- Ghg Category Start -->
    <div class="col-md-6">

<?php 
    if($ghg_cat_arr) {
        foreach($ghg_cat_arr as $ghg_category) {
?>
    <div class="col-md-12" style="margin:10px;">
        <div class="d-flex">

        <div class="rh_sub_cat_icon">

        <img src="https://positiveplus.io/public/brand/dist-assets/custom_img/category_icon.png">

        </div>

        <div class="rh_sub_cat_name line_width" style="font-size:15px;font-weight:bold;">
<?php  echo $ghg_category['ghg_category_name']; ?>
        <!-- Economics  -->
            <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>

        </div>                                                                        

        </div>

        <div class="rh_sub_cat_right">
            <div class="rhsc_scrore_label" style="color:white;font-size:15px;">
<?php echo number_format($ghg_category['total_emission'],5); ?> kgs CO2e
            </div>
        </div>

    </div>
<?php            
        }
    }
?>




    </div>

<!-- Ghg Category Start -->

</div>

<!-- Report End -->


                                </div>

                                <div class="report_body mt-3">

                                    <div class="rh_q_report">

                                        <div class="accordion custom_accordion round_accordion" id="accordionRightIcon">

                                            <div class="card">

                                                <div class="card-header header-elements-inline">

                                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

                                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="false">

                                                            <div class="d-flex">

                                                                <div class="rh_sub_cat_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/category_icon.png">

                                                                </div>

                                                                <div class="rh_sub_cat_name line_width">

                                                                    Environment

                                                                    <!-- Economics  -->

                                                                    <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                                                </div>                                                                        

                                                            </div>

                                                            <div class="rh_sub_cat_right">

                                                                <div class="rhsc_scrore_label">

                                                                    100/20

                                                                </div>

                                                                

                                                            </div>

                                                        </a>

                                                    </h6>

                                                </div>

                                                <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon">

                                                    <div class="card-body">

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_supply_chain.png">Supply Chain

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 25%"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">25%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg active"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_water.png">Water

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 85%"  aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">85%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg active"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_energy.png">Energy

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 40%"  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">40%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg active"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>                                                      

                                                        

                                                    </div>

                                                </div> 

                                            </div>

                                            <div class="card">

                                                <div class="card-header header-elements-inline">

                                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

                                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-2" aria-expanded="false">

                                                            <div class="d-flex">

                                                                <div class="rh_sub_cat_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/category_icon.png">

                                                                </div>

                                                                <div class="rh_sub_cat_name line_width">

                                                                    Social

                                                                    <!-- Economics  -->

                                                                    <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>

                                                                </div>                                                                        

                                                            </div>

                                                            <div class="rh_sub_cat_right">

                                                                <div class="rhsc_scrore_label">

                                                                    100/65

                                                                </div>                                                                

                                                            </div>                                                        </a>

                                                    </h6>

                                                </div>

                                                <div class="collapse" id="accordion-item-icons-2" data-parent="#accordionRightIcon">

                                                    <div class="card-body">

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_supply_chain.png"> Supply Chain

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 25%"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">25%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg active"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_water.png">Water

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 85%"  aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">85%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg active"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>

                                                        <div class="rh_bar m-0 inner_sections">

                                                            <div class="bar_single">                                                                

                                                                <div class="rh_bar_label line_width">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/short_energy.png">Energy

                                                                </div>                                                        

                                                                <div class="progress">                                                            

                                                                    <div class="progress-bar" role="progressbar" style="width: 40%"  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>                                                                                                                                                                                                                    

                                                                </div>

                                                                <div class="rh_bar_percent">40%</div>

                                                            </div>

                                                            <div class="bar_single risk_bar_wrapper">

                                                                <div class="inner_icon">

<img src="<?php echo base_url() ?>/public/brand/dist-assets/custom_img/goal_new_1.png">

                                                                </div>                                                        

                                                                <div class="risk_bar">                                                            

                                                                    <ul>

                                                                        <li class="high_bg"><a href="javascript:;">Higher</a></li>

                                                                        <li class="medium_bg"><a href="javascript:;">Medium</a></li>

                                                                        <li class="low_bg active"><a href="javascript:;">Low</a></li>

                                                                        <li class="good_bg"><a href="javascript:;">Good</a></li>

                                                                        <li class="exc_bg"><a href="javascript:;">Excellent</a></li>

                                                                    </ul>

                                                                </div>                                                                

                                                            </div>                                                                                                                 

                                                        </div>                                                      

                                                        

                                                    </div>

                                                </div> 

                                            </div>                                                  

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>                

            </div>            

        </div>

    </div>



<!-- color change by toggle btn start -->        

<script>        

    var toggle = document.getElementById('toggle_btn')

    let isToggle = true;



    function myFunction() {

        var textArea = document.getElementById('color_change')

        isToggle = !isToggle

        if (isToggle) {

            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `

        } else {

            console.log("ok ok")

            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_black_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `

        }

    }

</script>

<!-- color change by toggle btn end -->    



<!-- tooltip start -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" ></script>

<script>

    $(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();   

    });



    // range slider

    $("#ex13").slider({

        ticks: [0, 100, 200],

        ticks_labels: ['$0', '$100', '$200'],

        ticks_snap_bounds: 30

    }); 



</script>   

<!-- tooltip end --> 

<?php include("include/footer.php"); ?> 