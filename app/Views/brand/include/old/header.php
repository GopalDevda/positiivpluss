<!DOCTYPE html>

<html lang="en" dir="">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

     <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Utopiic</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />

    <link href="<?php echo base_url('public/brand/assets/'); ?>/css/themes/lite-purple.min.css" rel="stylesheet" />

    <link href="<?php echo base_url('public/brand/assets/'); ?>/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />

    <link href="<?php echo base_url('public/brand/assets/'); ?>/css/themes/custom_style.css?v=3" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/admin/assets/'); ?>/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
 
    
    <!-- datepicker start -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- datepicker end -->


    <!-- datepicker start -->

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- datepicker end -->

<!--      <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/jquery-3.3.1.min.js"></script>

    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/bootstrap.bundle.min.js"></script> -->

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>
<style>
    .cs_icon {
    width: 31px;
    border-radius: 50%;}
    
</style>
</head>

<body class="text-left">

    <div class="app-admin-wrap layout-sidebar-large">

    <div class="custom_top_header">

            <div class="right_menu">

                <!--<a href="account.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Account">-->
                <a href="<?php echo base_url(); ?>/brand/account">

                    <div class="icon_account"> 

                        <i class="i-Gear custom_setting_icon"></i>

                    </div>

                </a>

            </div>



<!--document comment start-->
            <!--<div class="right_menu">-->

                <!--<a href="document.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Document">  -->
            <!--    <a href="<?php echo base_url(); ?>/supplier/document"> -->

            <!--        <div class="icon_document">             -->

            <!--            <i class="i-Safe-Box text-muted header-icon"></i>-->

            <!--        </div>-->

            <!--    </a>-->

            <!--</div>-->





<!--document comment end-->
            <div class="right_menu">
                  
                <!--<a href="notification.php" data-toggle="tooltip" data-placement="top" title="" data-original-title="Notification">  -->
                <a href="<?php echo base_url(); ?>/brand/notification">            

                    <div class="icon_noti">                        

                        <i class="i-Bell text-muted header-icon"></i>

                    </div>   

                </a> 

            </div>


        </div>

        <div class="main-header">

          

            <div class="header-part-left">

                <div class="menu-toggle">

                    <div></div>

                    <div></div>

                    <div></div>

                </div>

                <div class="dropdown top_icons">

                  <a href="#" data-item="Home"> <i class="i-Home-2 text-muted header-icon active"></i></a>

                  <a href="#" data-item="Tool"> <i class="i-Flag-2 text-muted header-icon"></i></a>

                  <a href="mailto: abc@example.com"> <i class="i-Email text-muted header-icon"></i></a>

                  <!-- <a href="#"> <i class="i-Safe-Box text-muted header-icon"></i></a> -->

                </div>

            </div>

            

            <!-- <div style="margin: auto"></div> -->

            <div class="header-part-right">

               

                              

              

                <!-- Notificaiton -->

                <a href="report.php">                

                     <i class="i-Spell-Check-ABC text-muted header-icon"></i>

                </a>

                <a href="<?php echo base_url() ?>/supplier/document">                

                    <i class="i-Safe-Box text-muted header-icon"></i>

                </a>

                <a href="notification.php">                

                    <div class="badge-top-container">

                        <span class="badge badge-primary">3</span>

                        <i class="i-Bell text-muted header-icon"></i>

                    </div>   

                </a>                

                <!-- Notificaiton End -->

                <!-- User avatar dropdown -->

                

                <div class="dropdown">

                    <div class="user col align-self-end">

                            <i class="i-Gear custom_setting_icon" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">                            

                                <a class="dropdown-item" href="account.php">Account settings</a>                            

                                <a class="dropdown-item" href="">Sign out</a>

                            </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="side-content-wrap">

            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">

               <ul class="navigation-left" data-parent="Home">

                     <li>

                        <div class="logo">

                        <img src="dist-assets/custom_img/logo_new.png" alt="">

                        </div>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="#">

                        <span class="nav-text"><i class="material-icons">zoom_in</i>Overview</span></a>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="#">

                        <span class="nav-text"><i class="material-icons">groups</i> Team</span></a>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="#">

                        <span class="nav-text"><i class="material-icons">adjust</i> Target</span></a>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="#">

                        <span class="nav-text"><i class="material-icons">inventory_2</i> Product</span></a>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="#">

                        <span class="nav-text"><i class="material-icons">transfer_within_a_station</i> Supplier</span></a>

                    </li>

                   

               </ul>

                <ul class="navigation-left" data-parent="Tool" >

                    <li>

                        <div class="logo">

                        <img src="dist-assets/custom_img/logo_new.png" alt="">

                    </div>

                    </li>

                    <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="dashboard.php">

                        <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>

                        <span class="nav-text">Dashboard</span></a>

                    </li>

                    <span class="cm_span menu_border_top">

                        <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                            <img src="dist-assets/custom_img/custom_img/assisment.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Assessment</span></a>

                        </li>

                        <li class="nav-item no_line active"><a class="nav-item-hold" href="base.php">

                            <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                            

                            <img src="dist-assets/custom_img/custom_img/base.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Base</span></a>

                        </li>

                        <li class="nav-item no_line"><a class="nav-item-hold" href="advanced.php">

                            <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                            <img src="dist-assets/custom_img/custom_img/advance.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Advanced</span></a>

                        </li>

                    </span>

                    <!--<li class="nav-item"><a class="nav-item-hold" href="esg.php">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">ESG</span></a>

                    </li>    

                    <li class="nav-item"><a class="nav-item-hold" href="sdg.php">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">SDG</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-item-hold" href="ghg.php">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">GHG</span></a>

                    </li>-->

                    <span class="cm_span menu_border_top">

                        <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                            <img src="dist-assets/custom_img/custom_img/footprint.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Footprints</span></a>

                        </li>

                        <li class="nav-item no_line"><a class="nav-item-hold" href="company.php">

                            <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                            <img src="dist-assets/custom_img/custom_img/company.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Company</span></a>

                        </li>

                        <li class="nav-item no_line"><a class="nav-item-hold" href="products.php">

                            <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                            <img src="dist-assets/custom_img/custom_img/products.png" class="nav-icon-img" alt="">

                            <span class="nav-text">Products</span></a>

                        </li>

                    </span>

                    <span class="cm_span menu_border_top menu_border_bottom">

                    <li class="nav-item custom_menu_label" data-item="apps"><a class="nav-item-hold" href="">

                        <img src="dist-assets/custom_img/custom_img/disclouser.png" class="nav-icon-img" alt="">

                        <span class="nav-text">Disclosures</span></a>

                    </li>

                    <li class="nav-item no_line"><a class="nav-item-hold" href="general.php">

                        <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i>

                        <span class="nav-text">General</span></a>

                    </li>

                    <li class="nav-item no_line"><a class="nav-item-hold" href="sector.php">

                        <!-- <i class="nav-icon fa fa-file-text-o" aria-hidden="true"></i> -->

                        <img src="dist-assets/custom_img/custom_img/sector.png" class="nav-icon-img" alt="">

                        <span class="nav-text">Sector</span></a>

                    </li>

                    </span>

                    <!--<li class="nav-item"><a class="nav-item-hold" href="targets.php">

                        <i class="nav-icon fa fa-dot-circle-o" aria-hidden="true"></i>

                        <span class="nav-text">Targets</span></a>

                    </li>-->

                    <!-- <li class="nav-item main_menu custom_menu_label"><a class="nav-item-hold" href="report.php">

                        <i class="nav-icon fa fa-check-square-o" aria-hidden="true"></i>

                        <span class="nav-text">Reports</span></a>

                    </li> -->

                    <div class="view_plan">

                        <p>Welcome User</p>

                        Your Plan : <b>XYZ</b>

                        <div class="admin_btn mt-3" data-toggle="modal" data-target="#planModalCenter">

                            <input type="button" value="Upgrade">    

                        </div>

                    </div>

                    

                </ul>

            </div>

            

            <div class="sidebar-overlay"></div>

        </div>