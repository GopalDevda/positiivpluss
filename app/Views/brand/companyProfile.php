<?php

use App\Models\SupplierModel;
?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/page-profile.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-validation.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/maps/leaflet.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/maps/map-leaflet.min.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css'); ?>">
<!-- Map Css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/brand/assets/app-assets/css/app-logistics-fleet.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/brand/assets/app-assets/css/mapbox-gl.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/brand/assets/app-assets/css/perfect-scrollbar.css'); ?>">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/css/buttons.dataTables.min.css'); ?>">

<style>
    .fixed-height-table {
        overflow-y: auto;
        height: 570px;
    }

    .testing {
        background: #fff;
        padding: 20px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .x-scrolll div {
        height: 80px !important;
        white-space: nowrap;
        overflow-x: scroll !important;
    }

    .container {
        height: 273px !important;
        padding: 0 !important;
    }

    #ratio-chart .apexcharts-menu-icon {
        display: none;
    }

    .table-container {
        height: 300px;
        /* Adjust the height as needed */
        overflow-y: auto;
    }

    /* .page-content{
        height: 80vh;
    } */
</style>

<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .box-container {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .box {
        width: 100px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        position: relative;
    }

    .box-number {
        position: absolute;
        left: -40px;
        background-color: white;
        padding: 2px 5px;
        font-size: 13px;
        font-weight: bold;
    }

    /* NPS colors */
    .box:nth-child(1) {
        background-color: #48a33e;
        font-size: 13px;
    }

    /* Promoter Color */
    .box:nth-child(2) {
        background-color: #87c546;
        font-size: 13px;
    }

    /* Passive Color */
    .box:nth-child(3) {
        background-color: #e7e7e9;
        font-size: 13px;
    }

    /* Detractor Color */
    .box:nth-child(4) {
        background-color: #e6e6e8;
        font-size: 13px;
    }

    .box:nth-child(5) {
        background-color: #ffd700;
        font-size: 13px;
    }

    .box:nth-child(6) {
        background-color: #fdaf18;
        font-size: 13px;
    }

    .box:nth-child(7) {
        background-color: #f88d20;
        font-size: 13px;
    }

    .box:nth-child(8) {
        background-color: #f36622;
        font-size: 13px;
    }

    .box:nth-child(9) {
        background-color: #f04024;
        font-size: 13px;
    }

    .box:nth-child(10) {
        background-color: #d51820;
        font-size: 13px;
    }

    .box:nth-child(11) {
        background-color: #b11820;
        font-size: 13px;
    }

    .mapboxgl-canvas {
        width: 90% !important;
        height: 100% !important;
    }

    .map {
        position: absolute;
        left: 33.3333%;
        width: 66.6666%;
        top: 0;
        bottom: 0;
    }

    .listings {
        height: 100%;
        overflow: auto;
        padding-bottom: 60px;
    }

    .listings .item {
        border-bottom: 1px solid #eee;
        padding: 10px;
        text-decoration: none;
    }

    .listings .item:last-child {
        border-bottom: none;
    }

    .listings .item .title {
        display: block;
        color: #00853e;
        font-weight: 700;
    }

    .listings .item .title small {
        font-weight: 400;
    }

    .listings .item.active .title,
    .listings .item .title:hover {
        color: #8cc63f;
    }

    .listings .item.active {
        background-color: #f8f8f8;
    }

    /* ::-webkit-scrollbar {
width: 3px;
height: 3px;
border-left: 0;
background: rgba(0, 0, 0, 0.1);
} */
    ::-webkit-scrollbar-track {
        background: none;
    }

    /* ::-webkit-scrollbar-thumb {
background: #00853e;
border-radius: 0;
} */
    /* Marker tweaks */
    .mapboxgl-popup-close-button {
        display: none;
    }

    .mapboxgl-popup-content {
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
        padding: 0;
        width: 180px;
    }

    .mapboxgl-popup-content h3 {
        background: #91c949;
        color: #fff;
        margin: 0;
        padding: 10px;
        border-radius: 3px 3px 0 0;
        font-weight: 700;
        margin-top: -15px;
    }

    .mapboxgl-popup-content h4 {
        margin: 0;
        padding: 10px;
        font-weight: 400;
    }

    .mapboxgl-popup-content div {
        padding: 10px;
    }

    .mapboxgl-popup-anchor-top>.mapboxgl-popup-content {
        margin-top: 15px;
    }

    .mapboxgl-popup-anchor-top>.mapboxgl-popup-tip {
        border-bottom-color: #91c949;
    }
</style>

<!-- Map Css -->
<style type="text/css">
    #append_search {
        position: absolute;
        z-index: 1;
    }

    .container {
        height: 240px;
    }

    #map {
        width: 100%;
        height: 100%;
        border: 1px solid blue;
    }

    #mapp {
        width: 100%;
        height: 370px !important;
        border: 1px solid blue;
    }

    #data,
    #allData {
        display: none;
    }

    .apexcharts-legend.apexcharts-align-center.position-right {
        display: none;
    }
</style>

<style>
    .locked-element {
        filter: blur(5px);
        position: relative;
    }
</style>

<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- BEGIN: Content-->
<div class="app-content content ">

    <div class="page-content card-body card-datatable table-responsive pt-0">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-header row">
            <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">


                    <div style="margin-right: -37pc;">
                        <a href="<?php echo base_url('market_place') ?>" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>


        <section class="card">
            <div class=" card-body row">
                <div class="col-md-2">
                    <h5 class="mb-1">Company Name</h5>
                    <!--<h5 class="mb-1">Country</h5>-->
                    <h5 class="mb-1">Industry Category</h5>
                    <h5 class="mb-1">Industry</h5>
                    <h5 class="mb-1">Website</h5>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-1 fw-normal"><?= $company_data[0]['company_name'] ?></h6>
                    <!--<h6 class="mb-1 fw-normal">Algeria</h6>-->
                    <h6 class="mb-1 fw-normal">.. </h6>
                    <h6 class="mb-1 fw-normal"> <?= $company_data[0]['principal_bussiness_activity_as_per_cin'] ?></h6>
                    <h6 class="mb-1 fw-normal"></h6>
                    <?php if ($company_data[0]['company_web']) { ?>
                        <a href="<?= $company_data[0]['company_web']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                <i class="fa-solid fa-globe" style="font-size:17px"></i>
                            </button></a>
                    <?php
                    } ?>

                    <?php $socials = json_decode($company_profile['socials']);
                    ?>
                    <?php if ($socials) {
                        foreach ($socials as $key => $value) { ?>
                            <?php if ($key == 0) { ?>
                                <a href="http://<?= $value; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                        <i class="fa-brands fa-facebook" style="font-size:17px"></i>
                                    </button></a><?php
                                                } ?>
                        <?php
                        } ?>
                        <?php if ($company_profile['twiter']) { ?>
                            <a href="http://<?= $company_profile['twiter']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary">
                                    <i class="fa-brands fa-twitter" style="font-size:17px"></i>
                                </button></a>
                        <?php
                        } ?>
                        <?php if ($company_profile['link']) { ?>
                            <a href="http://<?= $company_profile['link']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                    <i class="fa-brands fa-linkedin" style="font-size:17px"></i>
                                </button></a>
                        <?php
                        } ?>



                        <?php if ($company_profile['company_mobile']) { ?>
                            <a href="tel://<?= $company_profile['company_mobile']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                    <i class="fa-solid fa-phone" style="font-size:17px"></i>
                                </button></a>
                        <?php
                        } ?> <?php if ($company_profile['company_email']) { ?>
                            <a href="mailto:<?= $company_profile['company_email']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                    <i class="fa-solid fa-envelope" style="font-size:17px"></i>
                                </button></a>
                    <?php
                                }
                            } ?>
                </div>
                <div class="col-md-6 text-end">
                    <?php if ($company_data[0]['company_logo'] && ($company_data[0]['company_logo'] != 'https:/Images/default-com-logo.svg')) { ?>
                        <img src="<?= $company_data[0]['company_logo'] ?>" id="account-upload-img" class="round" alt="profile image" width="100" />
                    <?php
                    } else { ?>
                        <img src="https://img.freepik.com/premium-vector/abstract-logo-company-made-with-color_341269-925.jpg?w=360" id="account-upload-img" class="round" alt="profile image" height="100" width="100" />
                    <?php
                    } ?>

                    <!-- <a type="button" class="btn btn-primary waves-effect waves-float waves-light" href="<?php echo base_url('/supplier/quickStart') ?>">Edit</a>
                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Share</button> -->
                </div>
                <div class="dropdown text-end">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <!-- <li><a type="button" class="btn btn-primary waves-effect waves-float waves-light" href="<?php echo base_url('/supplier/quickStart') ?>">Edit</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo base_url('/supplier/quickStart') ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Verify</a></li>
                        <li><a class="dropdown-item" href="#">Network</a></li>
                        <li><a class="dropdown-item" href="#">Share</a></li>
                    </ul>
                </div>
        </section>
        <section>
            <div class="row">
                <!-- static location  -->
                <div class="col-md-4">
                    <div class="card" style="height: 160px;">
                        <div class="card-body"><b>Location Address</b>
                            <hr> <?= $company_data[0]['registered_office_address'] ?>
                        </div>
                    </div><!-- pie chart -->
                    <div class="card" style="height: 160px;">
                        <div class="card-body">
                            <!-- <canvas id="myChart" height="219"></canvas> --><b>Classification</b>
                            <hr><?= $company_data[0]['principal_bussiness_activity_as_per_cin'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="margin-bottom: 8px!important;">Location</h4>
                            <div class="container">
                                <!-- <center><h1>Access Google Maps API in PHP</h1></center> -->

                                <?php $allData = json_encode($countryRohit, true);
                                echo '<div id="allData">' . $allData . '</div>'; ?>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <ul class="nav nav-tabs x-scrolll" role="tablist">
            <div class="d-flex">
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general-tabs" aria-controls="general-tabs" role="tab" aria-selected="true">General</a>
                </li>
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="ownership-tab" data-bs-toggle="tab" href="#ownership-tabs" aria-controls="ownership-tabs" role="tab" aria-selected="true">Ownership</a>
                </li>
                <!-- <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="" data-bs-toggle="tab" href="#" aria-controls="" role="tab" aria-selected="true">Boundaries</a>
                </li> -->
                <!-- <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="" data-bs-toggle="tab" href="#" aria-controls="" role="tab" aria-selected="true">ESG Baseline</a>
                </li> -->
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="finan-per" data-bs-toggle="tab" href="#finan-per1" aria-controls="finan-per1" role="tab" aria-selected="true">Financials</a>
                </li>
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="legal-health" data-bs-toggle="tab" href="#legal-health1" aria-controls="legal-health1" role="tab" aria-selected="true">Legal Health</a>
                </li>
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="compliance-delays" data-bs-toggle="tab" href="#compliance-delays1" aria-controls="compliance-delays1" role="tab" aria-selected="true">Compliances</a>
                </li>
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="media-update" data-bs-toggle="tab" href="#media-update1" aria-controls="media-update1" role="tab" aria-selected="true">Social Sentiment</a>
                </li>
                <!-- <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="" data-bs-toggle="tab" href="#" aria-controls="" role="tab" aria-selected="true">Environmental</a>
                </li>
                <li class="nav-item me-3" onclick="add_active($(this))">
                    <a class="nav-link" id="" data-bs-toggle="tab" href="#" aria-controls="" role="tab" aria-selected="true">3rd Party Ratings</a>
                </li> -->
            </div>
        </ul>
        <div class="content-wrapper container-xxl p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="general-tabs" aria-labelledby="general-tab" role="tabpanel">
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <div class="row no-b-m text-center">
                                    <div class="col-md-6"><b> Company Type</b></div>
                                    <div class="col-md-6"><b> Paid Capital</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['company_class'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['paidup_capital'] ?></div>
                                    <div class="col-md-6 mt-2"><b> Authorized Capital</b></div>
                                    <div class="col-md-6 mt-2"><b> CIN number</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['authorized_cap'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['corporate_identification_number'] ?></div>
                                    <div class="col-md-6 mt-2"><b> Registration Id</b></div>
                                    <div class="col-md-6 mt-2"><b> Date of Registration</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['registrar_of_companies'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['date_of_registration'] ?></div>
                                    <div class="col-md-6 mt-2"><b> GST No</b></div>
                                    <div class="col-md-6 mt-2"><b> PAN No</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['gst_no'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['pan_no'] ?></div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="tab-pane" id="ownership-tabs" aria-labelledby="ownership-tab" role="tabpanel">
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <div class="row no-b-m text-center">
                                    <div class="col-md-4"><b> DIN No.</b></div>
                                    <div class="col-md-4"><b> Director Name</b></div>
                                    <div class="col-md-4"><b> Designation</b></div>
                                    <?php foreach ($company_data as $directname) { ?>
                                        <div class="col-md-4 mt-2"><?= $directname['din_no'];  ?></div>
                                        <div class="col-md-4 mt-2"><?= $directname['director_name'];  ?></div>
                                        <div class="col-md-4 mt-2"><?= $directname['desgination'];  ?></div>
                                    <?php
                                    } ?>
                                    <!-- <div class="col-md-6"><?= $company_data[0]['paidup_capital'] ?></div> -->

                                    <!-- <div class="col-md-6 mt-2"><b> Authorized Capital</b></div>
                                    <div class="col-md-6 mt-2"><b> CIN number</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['authorized_cap'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['corporate_identification_number'] ?></div>
                                    <div class="col-md-6 mt-2"><b> Registration Id</b></div>
                                    <div class="col-md-6 mt-2"><b> Date of Registration</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['registrar_of_companies'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['date_of_registration'] ?></div>
                                    <div class="col-md-6 mt-2"><b> GST No</b></div>
                                    <div class="col-md-6 mt-2"><b> PAN No</b></div>
                                    <div class="col-md-6"><?= $company_data[0]['gst_no'] ?></div>
                                    <div class="col-md-6"><?= $company_data[0]['pan_no'] ?></div> -->
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="tab-pane" id="finan-per1" aria-labelledby="finan-per" role="tabpanel">
                    <div class="row">
                        <!-- Basic Tabs starts -->
                        <div class="col-xl-8 col-lg-12">
                            <div class="blur">
                                <div class="" style="right: 1%;left: 26%;top: 72%;z-index: 9;position: absolute;">
                                    <div class="text-center" style="border-radius:5px;width: 34%;background-color: aliceblue;  text-align: center!important;">
                                        <p class="testing" style="box-shadow: 100px; width: 100%;">Unlock Corporate
                                            Financials including Standalone and Consolidated balance sheet, Profit &
                                            loss Statements, Ratio’s, Related party transactions, etc.</p>
                                    </div>
                                    <div>
                                        <button class="ms-4 btn btn-light" data-bs-toggle="modal" data-bs-target="#marketplacemodel">View Information</button>
                                    </div>
                                </div>
                                <div class="card locked-element">
                                    <div class="card-header">
                                        <h4 class="card-title">Financial Perfomance</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active " style="margin-left: 13px;/* padding: 17px; */" id="balance-tab" data-bs-toggle="tab" href="#balance" aria-controls="balance" role="tab" aria-selected="true">Balance sheet</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="cash-tab" data-bs-toggle="tab" href="#cash" aria-controls="cash" role="tab" aria-selected="false">Cash Flow</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="ratio-tab" data-bs-toggle="tab" href="#ratio" aria-controls="ratio" role="tab" aria-selected="false">Ratio
                                                    Analysis</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="height: 490px;">
                                            <!-- balance tab -->
                                            <div class="tab-pane active" id="balance" aria-labelledby="balance-tab" role="tabpanel">
                                                <div class="mt-2 mb-1">
                                                    <h5>Asset & Liability Breakup</h4>
                                                        <span class="card-subtitle text-muted">Asset are in Blue &
                                                            Liabilities are in Green</span>
                                                </div>
                                                <div id="balance-chart" class="locked-element"></div>
                                            </div>
                                            <!-- cash tab -->
                                            <div class="tab-pane" id="cash" aria-labelledby="cash-tab" role="tabpanel">
                                                <div class="mt-2 mb-1">
                                                    <h5>Cash Flow Statement : Comparision Graphs</h4>
                                                        <span class="card-subtitle text-muted">Operating Investment &
                                                            Financing Activities</span>
                                                </div>
                                                <div id="cash-chart"></div>
                                            </div>
                                            <!-- ratio tab -->
                                            <div class="tab-pane" id="ratio" aria-labelledby="ratio-tab" role="tabpanel">
                                                <div class="mt-2 mb-1">
                                                    <h5>Ratio Analysis : Comparision Graphs</h4>
                                                        <span class="card-subtitle text-muted">Return on Capital
                                                            Employed
                                                            Return on Equity</span>
                                                </div>
                                                <div id="ratio-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Tabs ends -->
                        <div class="col-md-4 locked-element">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h4 class="card-title">Legal Health</h4> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive fixed-height-table" id="balanceTable">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="card-title">Balance Sheet</h4>
                                            </div>
                                            <div class="col-4">
                                                <!-- Add the select box for years here -->
                                                <div class="form-group mb-1">
                                                    <!-- <label for="yearSelect">Select Year:</label> -->
                                                    <select class="form-control" id="yearSelect">
                                                        <option value="2017">2017-18</option>
                                                        <option value="2018">2018-19</option>
                                                        <option value="2018">2019-20</option>
                                                        <option value="2018">2020-21</option>
                                                        <option value="2018">2021-22</option>
                                                        <!-- Add more years as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Element Name</th>
                                                    <th>2017-18</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Net Worth</h6>
                                                    </td>
                                                    <td>
                                                        <p>219.17</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Borrowings</h6>
                                                    </td>
                                                    <td>
                                                        <p>219.171,143.66</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold"> Other Non-Current Liabilities</h6>
                                                    </td>
                                                    <td>
                                                        <p>41.28</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Current liabilities and provisions</h6>
                                                    </td>
                                                    <td>
                                                        <p>497.92</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Deferred tax liability/(asset) </h6>
                                                    </td>
                                                    <td>
                                                        <p>-132.40</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Total Equity and Liabilities</h6>
                                                    </td>
                                                    <td>
                                                        <p>1,902.03</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Tangible assets</h6>
                                                    </td>
                                                    <td>
                                                        <p>60.94</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Capital WIP and Others</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Intangible assets</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold"> Investments</h6>
                                                    </td>
                                                    <td>
                                                        <p>2.92</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Loans and advances</h6>
                                                    </td>
                                                    <td>
                                                        <p>129.49</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Inventory</h6>
                                                    </td>
                                                    <td>
                                                        <p>662.60</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold"> Trade Receivables</h6>
                                                    </td>
                                                    <td>
                                                        <p>884.45</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold"> Cash and bank balance</h6>
                                                    </td>
                                                    <td>
                                                        <p>26.11</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Other Assets</h6>
                                                    </td>
                                                    <td>
                                                        <p>3.12</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Total Assets</h6>
                                                    </td>
                                                    <td>
                                                        <p>1,902.03</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Current Liabilities</h6>
                                                    </td>
                                                    <td>
                                                        <p>1,587.96</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Current Assets</h6>
                                                    </td>
                                                    <td>
                                                        <p>1,620.86</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Working Capital</h6>
                                                    </td>
                                                    <td>
                                                        <p>32.90</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive fixed-height-table" id="cashTable" style="display: none;">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="card-title">Cash Flow</h4>
                                            </div>
                                            <div class="col-4">
                                                <!-- Add the select box for years here -->
                                                <div class="form-group mb-1">
                                                    <!-- <label for="yearSelect">Select Year:</label> -->
                                                    <select class="form-control" id="yearSelect">
                                                        <option value="2017">2017-18</option>
                                                        <option value="2018">2018-19</option>
                                                        <option value="2018">2019-20</option>
                                                        <option value="2018">2020-21</option>
                                                        <option value="2018">2021-22</option>
                                                        <!-- Add more years as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Element Name</th>
                                                    <th>2017-18</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Operating Activities </h6>
                                                    </td>
                                                    <td>
                                                        <p>29.80</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Investing Activities</h6>
                                                    </td>
                                                    <td>
                                                        <p>-0.66</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Financing Activities</h6>
                                                    </td>
                                                    <td>
                                                        <p>-9.84</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Effect of Exchange Rate </h6>
                                                    </td>
                                                    <td>
                                                        <p>0.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Cash and Cash Equivalent at End</h6>
                                                    </td>
                                                    <td>
                                                        <p>26.11</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive fixed-height-table" id="ratioTable" style="display: none;">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="card-title">Ratio Analysis</h4>
                                            </div>
                                            <div class="col-4">
                                                <!-- Add the select box for years here -->
                                                <div class="form-group mb-1">
                                                    <!-- <label for="yearSelect">Select Year:</label> -->
                                                    <select class="form-control" id="yearSelect">
                                                        <option value="2017">2017-18</option>
                                                        <option value="2018">2018-19</option>
                                                        <option value="2018">2019-20</option>
                                                        <option value="2018">2020-21</option>
                                                        <option value="2018">2021-22</option>
                                                        <!-- Add more years as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Element Name</th>
                                                    <th>2017-18</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Operative Revenue growth (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>24.22</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">EBITDA growth (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>(54.67)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">EPS growth (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>(174.29)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">EBITDA margin (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>2.83</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">PAT margin (%) </h6>
                                                    </td>
                                                    <td>
                                                        <p>(1.45)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Return on capital employed (RoCE) (%) </h6>
                                                    </td>
                                                    <td>
                                                        <p>20.59</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Return on equity (RoE) (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>(10.97)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Return on Assets (RoA) (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>(1.26)</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Avg. Inventory holding Days</h6>
                                                    </td>
                                                    <td>
                                                        <p>306.34</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Avg. Debtors Outstanding days</h6>
                                                    </td>
                                                    <td>
                                                        <p>153.47</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Avg. Trade Payable Days</h6>
                                                    </td>
                                                    <td>
                                                        <p>84.90</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Avg. Cash Conversion Cycle</h6>
                                                    </td>
                                                    <td>
                                                        <p>374.90</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Quick Ratio</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.60</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Current ratio</h6>
                                                    </td>
                                                    <td>
                                                        <p>1.02</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Leverage (TOL/TNW)</h6>
                                                    </td>
                                                    <td>
                                                        <p>7.07</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Net debt-equity</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.24</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Interest coverage</h6>
                                                    </td>
                                                    <td>
                                                        <p>1.10</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Capital Employed Turnover</h6>
                                                    </td>
                                                    <td>
                                                        <p>9.08</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Asset Turnover</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.96</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Inventory Turnover</h6>
                                                    </td>
                                                    <td>
                                                        <p>1.19</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Receivables Turnover</h6>
                                                    </td>
                                                    <td>
                                                        <p>2.38</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Working Capital Turnover</h6>
                                                    </td>
                                                    <td>
                                                        <p>773.55</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Operating Cash Margin (OCF/Sales)(%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>1.81</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold"> Free Cash Flow/OCF (%)</h6>
                                                    </td>
                                                    <td>
                                                        <p>97.18</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Cash Generating Power</h6>
                                                    </td>
                                                    <td>
                                                        <p>1.54</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Short-Term Debt Coverage Ratio</h6>
                                                    </td>
                                                    <td>
                                                        <p>0.03</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Capital Expenditure Coverage Ratio</h6>
                                                    </td>
                                                    <td>
                                                        <p>35.48</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fw-bold">Contingent Liability to Total Asset </h6>
                                                    </td>
                                                    <td>
                                                        <p>0</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="compliance-delays1" aria-labelledby="compliance-delays" role="tabpanel">
                    <div class="row">
                        <!-- Compliance & Delays  -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header d-flex justify-content-between pb-1">
                                            <div class="card-title mb-0">
                                                <h4>Compliance & Delays</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="fw-bold pt-1">GST Compliance</h6>
                                                </div>
                                                <div class="col-4">
                                                    <!-- Add the select box for years here -->
                                                    <div class="form-group mb-1">
                                                        <!-- <label for="yearSelect">Select Year:</label> -->
                                                        <select class="form-control" id="yearSelect">
                                                            <option value="2017">2017-18</option>
                                                            <option value="2018">2018-19</option>
                                                            <option value="2018">2019-20</option>
                                                            <option value="2018">2020-21</option>
                                                            <option value="2018">2021-22</option>
                                                            <!-- Add more years as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-container">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>GSTIN</th>
                                                            <th>State</th>
                                                            <th>Nov-2022</th>
                                                            <th>Dec-2022</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">06AABCO1997L1Z0</h6>
                                                            </td>
                                                            <td>
                                                                <p>Haryana</p>
                                                            </td>
                                                            <td>
                                                                <p>Delayed File (20) days</p>
                                                            </td>
                                                            <td>
                                                                <p>Delayed File (22) days</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">27AABCO1997L1ZW</h6>
                                                            </td>
                                                            <td>
                                                                <p>Maharashtra</p>
                                                            </td>
                                                            <td>
                                                                <p>Filed</p>
                                                            </td>
                                                            <td>
                                                                <p>Filed</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- score  -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header d-flex justify-content-between pb-1">
                                            <div class="card-title mb-0">
                                                <h4>Score(from risk report)</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="fw-bold pt-1">PIOTROSKI’S FSCORE</h6>
                                                </div>
                                                <div class="col-4">
                                                    <!-- Add the select box for years here -->
                                                    <div class="form-group mb-1">
                                                        <!-- <label for="yearSelect">Select Year:</label> -->
                                                        <select class="form-control" id="yearSelect">
                                                            <option value="2017">2017-18</option>
                                                            <option value="2018">2018-19</option>
                                                            <option value="2018">2019-20</option>
                                                            <option value="2018">2020-21</option>
                                                            <option value="2018">2021-22</option>
                                                            <!-- Add more years as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-container">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Test Name</th>
                                                            <th>2017 - 2018</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Profitability Strength</h6>
                                                            </td>
                                                            <td>
                                                                <p>2</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Leverage & Liquidity Strength</h6>
                                                            </td>
                                                            <td>
                                                                <p>2</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Operating Efficiency</h6>
                                                            </td>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Overall Financials Strength Test
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <p>5</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table><!-- Add a note with flag icon -->
                                                <div class="note bg-light-success">
                                                    <p class="text-dark fw-bold p-1"><i class="fas fa-flag pe-1" style="color: red;padding-right: 3px;"></i>Piotroski F-Score
                                                        is a number between 0 - 9 which is used to assess strength of
                                                        company's financial position. F-Score in the range of 8-9 is
                                                        considered to be High Performer, range of 3-7 as Moderate
                                                        Performer & 0-2 consider as Weak Performer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- MCA Annual Compliances  -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="fw-bold pt-1">MCA Annual Compliances</h6>
                                                </div>
                                                <div class="col-4">
                                                    <!-- Add the select box for years here -->
                                                    <div class="form-group mb-1">
                                                        <!-- <label for="yearSelect">Select Year:</label> -->
                                                        <select class="form-control" id="yearSelect">
                                                            <option value="2017">2017-18</option>
                                                            <option value="2018">2018-19</option>
                                                            <option value="2018">2019-20</option>
                                                            <option value="2018">2020-21</option>
                                                            <option value="2018">2021-22</option>
                                                            <!-- Add more years as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-container">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Annual Compliance 2</th>
                                                            <th>2017-2018 </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Annual Returns </h6>
                                                            </td>
                                                            <td>
                                                                <p>Delayed File (52 days)</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Audited Balance Sheet</h6>
                                                            </td>
                                                            <td>
                                                                <p>Delayed File (52 days) </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Other widely accepted Traditional Models  -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="fw-bold pt-1">Other widely accepted Traditional Models
                                                    </h6>
                                                </div>
                                                <div class="col-4">
                                                    <!-- Add the select box for years here -->
                                                    <div class="form-group mb-1">
                                                        <!-- <label for="yearSelect">Select Year:</label> -->
                                                        <select class="form-control" id="yearSelect">
                                                            <option value="2017">2017-18</option>
                                                            <option value="2018">2018-19</option>
                                                            <option value="2018">2019-20</option>
                                                            <option value="2018">2020-21</option>
                                                            <option value="2018">2021-22</option>
                                                            <!-- Add more years as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-container">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Test Name</th>
                                                            <th>2017-2018 </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Beneish's M-Score (Profit
                                                                    Manipulation Test)</h6>
                                                            </td>
                                                            <td>
                                                                <p>-2.93</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Altman Z-Score (Financial Distress
                                                                    Test)</h6>
                                                            </td>
                                                            <td>
                                                                <p>0.67</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="fw-bold">Montier's C-Score (Window Dressing
                                                                    Test)</h6>
                                                            </td>
                                                            <td>
                                                                <p>2</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table><!-- Add a note with flag icon -->
                                                <div class="note bg-light-success">
                                                    <p class="text-dark fw-bold p-1"><i class="fas fa-flag pe-1" style="color: red;padding-right: 3px;"></i>The Beneish model
                                                        is a statistical model that uses financial ratios to check if it
                                                        is likely (high probability) that the reported earnings of the
                                                        company have been manipulated. If M-Score is less than -2.22 ,
                                                        the company is unlikely to be a manipulator and if the M-Score
                                                        is greater than -2.22, then the company is likely to be a
                                                        manipulator.</p>
                                                </div><!-- Add a note with flag icon -->
                                                <div class="note bg-light-success">
                                                    <p class="text-dark fw-bold p-1"><i class="fas fa-flag pe-1" style="color: red;"></i>The Altman Z Score is used to
                                                        predict the chance of a business organization to move into
                                                        bankruptcy.If the value is > 2.99, then there is no Financial
                                                        distress, if the value is <= 2.00 and>= 1.23 then it is said to
                                                            have Moderate Financial distress, and if the value is < 1.23 then it is said to have Higher Financial distress.</p>
                                                </div><!-- Add a note with flag icon -->
                                                <div class="note bg-light-success">
                                                    <p class="text-dark fw-bold p-1"><i class="fas fa-flag pe-1" style="color: red;"></i>Montier's C-Score is used to
                                                        determine whether a company is cooking the books.If a company
                                                        scores 0 there is no evidence of earnings manipulation whilst 6
                                                        suggests there is lots of evidence.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2nd part  -->
                <div class="tab-pane" id="media-update1" aria-labelledby="media-update" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="card-title mb-0">
                                                <h5 class="mb-0">Sentiment Score</h5>
                                            </div>
                                        </div>
                                        <div class="card-body pb-5" style="height: 558px;">
                                            <div class=" container">
                                                <ul class="box-container">
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">10</span>
                                                        5 <br> (33.3%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">9</span>
                                                        5 <br> (27.8%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">8</span>
                                                        1 <br> (5.6%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">7</span>
                                                        1 <br> (5.6%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">6</span>
                                                        3 <br> (16.7%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">5</span>
                                                        1 <br> (5.6%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">4</span>
                                                        0 <br> (0%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">3</span>
                                                        0 <br> (0%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">2</span>
                                                        0 <br> (0%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">1</span>
                                                        1 <br> (5.6%)
                                                    </li>
                                                    <li class="box text-white fw-normal text-center">
                                                        <span class="box-number text-dark">0</span>
                                                        0 <br> (0%)
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="card-title mb-0">
                                                <h5 class="mb-0">Media Update</h5>
                                            </div>
                                        </div>
                                        <div class="card-body" style="height: 40rem;">
                                            <div class="mt-75">
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/1029B/production/_130230266_gettyimages-1399128410.jpg.webp" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">Climate change:
                                                                China's green power surge offers hope on warming</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">A boom in wind and solar energy in
                                                            China may curb emissions faster than expected, a report
                                                            says.</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://cdn-sustainability.aboutamazon.com/dims4/default/fdd9d05/2147483647/strip/true/crop/1678x677+161+0/resize/2880x1162!/format/webp/quality/90/?url=https%3A%2F%2Famazon-k1-prod-sustainability.s3.amazonaws.com%2Fbrightspot%2F69%2F6d%2F5e920f74448b8f96e4ad330c2b78%2Fsustainability-hero-image-wide.jpg" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">Driving Climate
                                                                Solutions - Amazon Sustainability</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">We aim to reach net-zero carbon
                                                            emissions by 2040 by scaling solutions across our operations
                                                            and collaborating with partners to broaden our impact.</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://www.designboom.com/wp-content/uploads/2019/07/francis-kere-xylem-pavilion-tippet-rise-art-center-montana-designboom-818.jpg" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">CO2 emissions from
                                                                buildings and construction hit new high, leaving sector
                                                                off track to decarbonize by 2050: UN</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">In 2021, investments in building
                                                            energy efficiency increased by 16% to USD 237 billion, but
                                                            growth in floor space outpaced efficiency.</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://etimg.etb2bimg.com/photo/86721560.cms" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">Electricity charges
                                                                revised in Kerala, to go up by 6.6 per cent</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">According to the revised slabs,
                                                            those who consume between 51 to 100 units in a month will
                                                            have to bear an additional Rs 22.50,.</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://etimg.etb2bimg.com/photo/65303997.cms" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">UK's Ofgem to raise
                                                                energy safeguard tariff level due to higher wholesale
                                                                costs</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">The safeguard tariff was introduced
                                                            last April and is designed to stop energy.</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <a href="#" class="me-2">
                                                        <img class="rounded" src="https://etimg.etb2bimg.com/photo/64870863.cms" width="100" height="70" alt="Recent Post Pic">
                                                    </a>
                                                    <div class="blog-info">
                                                        <h6 class="blog-recent-post-title">
                                                            <a href="#" class="text-body-heading">Climate change: Fossil
                                                                fuel emissions from electricity set to fall - report</a>
                                                        </h6>
                                                        <div class="text-muted mb-0">Rise in wind and solar energy means
                                                            that use of coal, oil and gas may have peaked for energy
                                                            production.</div>
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
                <!-- 3rd part  -->
                <div class="tab-pane" id="legal-health1" aria-labelledby="legal-health" role="tabpanel">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <!-- legal health  -->
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header">
                                            <h4 class="card-title">Legal Health</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Courts</th>
                                                        <th>Case Type</th>
                                                        <th>Open Cases (0)</th>
                                                        <th>Disposed Cases (1)</th>
                                                        <th>Unknown Cases (0)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bold">Supreme Court</h6>
                                                        </td>
                                                        <td>
                                                            <p>Criminal (0)</p>
                                                            <p>Civil (0)</p>
                                                            <p>Unclassified (0)</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bold">High Court</h6>
                                                        </td>
                                                        <td>
                                                            <p>Criminal (0)</p>
                                                            <p>Civil (0)</p>
                                                            <p>Unclassified (0)</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bold">District Court</h6>
                                                        </td>
                                                        <td>
                                                            <p>Criminal (0)</p>
                                                            <p>Civil (0)</p>
                                                            <p>Unclassified (0)</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bold">Tribunals</h6>
                                                        </td>
                                                        <td>
                                                            <p>Criminal (0)</p>
                                                            <p>Civil (1)</p>
                                                            <p>Unclassified (0)</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>1</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fw-bold">Others</h6>
                                                        </td>
                                                        <td>
                                                            <p>Criminal (0)</p>
                                                            <p>Civil (0)</p>
                                                            <p>Unclassified (0)</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>0</p>
                                                            <p>0</p>
                                                            <p>0</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- open case  -->
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header">
                                            <h4 class="card-title">Open Cases</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Case No</th>
                                                        <th>Court</th>
                                                        <th>Petitioner</th>
                                                        <th>Respondent</th>
                                                        <th>Type (Name)</th>
                                                        <th>Order Link</th>
                                                        <th>Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td> BHANOT</td>
                                                        <td> (C S)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SeCeQhSC2ij%2bfHxjsMW0DhgWyaf5xMHiUi%2fe6VtiBn8ssUy3Zml%2bOwIJVmFm6iJbbgzqE%2fT8EbD5P4%2fBrZvrmW6054YRI4%2bQv1dkri3iINh2CIvSmi5oPNpks67uGCMTdlAOzA6YMEwtycfeqWfdamWPHK2ct%2fLdM63OvPSNqsoQagaheybUUfA%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S A1 INDUSTRIAL SUPPLIERS</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEsByvw1MX5aMgh4PjGzvOL4HesApWQCqAozgTmSUTIUX%2bvQNh63UblYLvprTMvY%2bBbijscABEMNt2lJNkf7ioCP3LykeZNUU8%2bYipR%2bR3vXVGd9y%2bixdLZPGUaDluwsj6IUuVqsiLq6g%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td> SAI GANESH ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEsByvw1MX5aMgh4PjGzvOL4HesApWQCqAozgTmSUTIUX%2bvQNh63UblYLvprTMvY%2bBbijscABEMNt2lJNkf7ioCP3LykeZNUU8%2bYipR%2bR3vXVGd9y%2bixdLZPGUaDluwsj6IUuVqsiLq6g%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td>.A.ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEQ%2f0zxDph19HYL4mRWOJ9qv8ScGA9OiisfADVw5Ks4UrHG941hvPMSyHKBCQnecqWVBzMxZHAqv%2b1HW%2bwtn0rf0%2f8c35M8JrR3itjEhHpFF0ltOylYM00Dm6YnTCaxC4HMlFVLlmZLBw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td> ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGE6seqo1TAFFTeaWnCw4O82W3GVGGHxQsyMk71J8Q9%2bXnz4SwvAsVGdBukGsA63NY8hfBa9n9tRIkGld9rGEbJ3ByjWl2%2bcj3ydLECtI6Spz1WyY0VToZmiWVWt0GRDe7T7K9Ksn9vug%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S BHAGWATI BEAUTY CENTRE</td>
                                                        <td> (C S)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SeCeQhSC2ij%2bfHxjsMW0DhgWyaf5xMHiUi%2fe6VtiBn8sbny5QLIYp%2fQhQkw14pYGS6Vt36xrly54WlsLYrIzXwtm7WNAdWtuzrepVNFLQkeB7qx0fws8w8w0Esw7UCa%2fy3PdOFWxyitkvTivohwifESZ49qzxouOKnsaHjwwbNd9BsmEyTvD5Pw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S PADMA ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbFm1Xo4q0Pm7K%2b2CZQOuQMBTiY08HlbVs0oC2uZCcxBVj4DGtqccK1hhvrUTZQd0I1qM1Ee5cfhJHmAVwzkVo9iDRsCBU9nm8wDlGcoAd1b3k8DxVB9QO6nUPi7N9%2bLZAn1rX1h%2bMk4Yg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td> ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbFeDanpObRigcEkP6rd3Mru2UmstqbgOxvo2E9f3G7ThdolLCWJMQBA1eCqoaBxRxBtGq%2f%2b84pximcrRiS%2bff8TKm3m%2fuRN65osmW8QIT8nFmlE99Jgiml6wm9a8IP17jVrVkb6RCERBg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S TEJAS TRADERS</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEZoBvJb6KVYV6fGIC9jHslOyHwl44bO2ozLJbX96qNM%2fclEkFXscSdantY%2bLi71Az8AK9FysJtO0PuAop4%2fTwPc58T61GyQoDRs0xwOe%2f5%2fOHCsb3eE%2bwq2CrYa4IrMT7xWF6YqfMR%2bg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S CHARU MARKETING AND CO</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGZ5HtHyqElfDbhvWmCY0w4nuVrHkWSSpHQoNoyUzmycVaD%2bejGOUAts%2ftDu%2fBtX%2fEaV4cLUFWx7ZtStqgtiQkgY1L740O6cwlJdC6RqRdy0HZFSZ9PoYZyBslFBFNzo6YwPHnhdzzIOA%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT.LTD.</td>
                                                        <td> WORLD</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbG%2fELVa4DCy%2fK1x79m%2bmnH002W3H3zYNpoZUmXL2cI1Nyluuyxsu0TRw84vXLI8wJ54C%2baVvDnmhZq2IlONBesVQ0c802XHz%2ba4mO8COW0a9PreLzpRcTYRIdx0a2Kvh1IECULPK%2fUMqQ%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS PVT.LTD.</td>
                                                        <td>/S NEEL MARKETING</td>
                                                        <td> (C S)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SeCeQhSC2ij%2bfHxjsMW0DhgWyaf5xMHiUi%2fe6VtiBn8tAn%2bTLCOcbHzQ3TaIPxiNs3flqkJNOBUCpBa3rapcTOeFpfkYrfMxA3ZcsiXwiZikFAXDiNEkDG7C7fSGY0lsiIBJeMatZ%2fLx4lIEcozXPOh3ykpS06%2b%2bA15AE5n7I9FrEX5FcWjBh2Q%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS</td>
                                                        <td> TRADERS</td>
                                                        <td> (C S)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SeCeQhSC2ij%2bfHxjsMW0DhgWyaf5xMHiUi%2fe6VtiBn8vbeTpJFD2ZxORw8%2f2kAXxfL5p509MhyfVgmLtOxRZTWspP%2b1ZiJ9nfgoUTjqZmnDwHwGlrVrCtjO1jGCUpvOT7CYwcL5LLdVV2wd6%2fxhWA3GN8n%2fF2W2SyqUvROtvc4OSC%2bE%2b1UGhTkw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXYGLOW COSMETICS</td>
                                                        <td>/S SIDDHIR AGENCY</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbHxC4iT%2b%2b6PqBcQFrGMsRbz6aqQR3Of2CAcGIEx3FRF%2bmvLcxQXB04MY09lIqzFBuGXDolbnJfh%2fPBeTPtx2NNsLFabHBICfcgq2VUCJlsuBNNOfTP82%2bvH0RCECc479oHuqLERcKzHng%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> COSMETICS PVT.LTD.</td>
                                                        <td> COSMETIC WORLD</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbG6ipUqlfFJYjceJayAmFEX%2bUZnHWbN%2bJID0EhipRGnFv9JSJX49%2b5TmlNY1wN9l8ttc2Mzuv2%2fytEy%2b3NP6g64gYAhuTawe6noaOsZAWcwVgt6%2fUMzrY5yGfF4pXbGVjgc1ntc3X5Tvw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> COSMETICS PVT.LTD.</td>
                                                        <td> FOOD AND BEVERAGE</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbHVO1X%2fH8z%2fgQu%2bEhFRikSIcCiD%2blDqqgRODyjpBeaHOu2mh9fe5CjPAESKOyLrDcoS8RyWg4%2fQALjMpm8JhY0pl%2bFBpO3U1T7jLj%2bVIQnWNaWXHP0%2fSmtiKZfKm8AqNMleWfWVrAvJmg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> COSMETICS PVT.LTD.</td>
                                                        <td> LAXMI SALES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEQ08HMMfV5x%2b5bSJa%2bZ7RZHPXnAsdGshdttfjKqd87iHNN%2fJ22GKr4c%2b8zjFsPT66cbwUWNkaNNRm87JewLc5SQei1hPspBBmdK%2bD9Ba4IFBsnFFOy90XyZxkYXUi%2bkNdLw5cx5U43Ig%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> COSMETICS PVT.LTD.</td>
                                                        <td> TRADERS</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbFxc9KV12pkuzx%2bKK51xCBQ6EAlCf3FYiDcdSHBBbMc%2bHYzt1cQQmRaj3FzzPhwNWXdIYKft46KRov9f3%2br9ln7dXRDFmN1crAOdiloyvynBEQiWWbfuOZfozU4zEQN2I1NlLWCewckFg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Disposed case  -->
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header">
                                            <h4 class="card-title">Disposed Cases</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Case No</th>
                                                        <th>Court</th>
                                                        <th>Petitioner</th>
                                                        <th>Respondent</th>
                                                        <th>Type (Name)</th>
                                                        <th>Order Link</th>
                                                        <th>Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> KUMAR</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td> (EXE)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SaOyZeR3MSQ4daaQYtTMGsTdAIqIc1qE6PeX5xdN76SVTHtK31Go1L2h6P9dW1DJwu5Te2SuJSAAX6h541AmgfK%2fZhf9HfWagmSa3s1InvNNQ4kAEVwUjVHOSsdHSekcfGi8ySEGg%2bjxv%2fzN4v8vwLWKuljTCWiXSHpJxkHWJM59WTNQn6IRxBw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> COSMETICS PVT.LTD.</td>
                                                        <td> AGENCIES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbFLnBQmwRtmBhi4fHR33JtE7QchEDRvn0UuYJCQkOzA8pJyw%2f%2bkw42XzaemMVNZ9EK8BmTmxfPAcEOjVlu9POBecMttK6QaoVuYcWM2gFXDDB08Bjy5nfg2%2boJU6ZwEUXQMNElZ4BAIJg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td>/S OXY GLOW COSMETICS</td>
                                                        <td>/S HARI OM ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbFlSKUeswgdzKs85jPCQ0PzCTejkQotZ1%2fl8MyPikryE%2b4cJ7b7yv1d6J0NhXA8mTkJCamnz3OV2q4XSNyyHX99kOcJx0mBgqOmJY%2btJydKJJxZDDPGhVQ1DAjyx%2bwolRABSZnllsItwA%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td> ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGIZpjpx0Rw4Fsr%2bLguX7jQldQ5hXZwPK9LySUG0iICDaym5MR7JKttF9tJak3DVxQwcCJPenXZUCUePisSDRQ3uX2SXYWZ62%2fcsymd7KCqb0wUf25z93wDJRHhkRIhraQjogvIP9%2bIEw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td>/S BHAGYODAY ENTERPRISES</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGiqPcPJWLQ7UXpzO1MoizAdprzRbLAdJarniOoF0vB5jy3oCWtJebchT1wVcEim8h4zQoAkYrMVWeVXKJkk%2fZqgtFykIdGEW9Vd0w%2f2cAPdiAMDxT%2bGVRCFjcMJRmqDOsp8VpTmMwVEg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td>/S BEAUTY WORLD</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEJM9Tkun5PLyz9TOixitZNc%2bR14g92TeYQ%2fW7PvYrOXjyExtSQluGHdA14EV8I%2fj6iVIvpAroVVqVGMaFLw1GeM4s11qP4Lu3D1EuN6PKEgY003JfxeXuXXNzzGpUltxSGC9vfO08HiQ%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETICS PVT LTD</td>
                                                        <td></td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbG%2bjlRwZX4RK%2bqoqgVOeTZGuSC8MI%2f2aod8yi1jdM2VpWqa0WLp%2bUQaOoFbA9u27jalGt%2fxGxI8AoPZ05QITosPGEJi0%2bf%2bU4A19KUloFizQmp%2bsT3Nxe6eVhzLC297dxNNKWeiuW6NeA%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> AVANTILAL SHAH POA HOLDER OF BHARATIBEN R.SHAH PROPRIETOR
                                                            OF BHAGYODAY ENTERPRISE</td>
                                                        <td>/S.OXY GLOW COSMETICS PVT.LTD.</td>
                                                        <td> (CR EN)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2STq7q3iYvnNEiPKv5d4CGh0ZkSl3lTqlLhtiW6pCPYsbEh%2bVOhdGNBXr2M6xAlk%2bjoFjnpRamrTxtyor%2bC2gfhEQYywHyScWn89GsV%2fzEDaC6jl9PSJB%2fpbtkuiWvHqLp7orRSnX6ccaHehdbowKuMqvV0hEhw6Xe3NofNp5XR7z9qjKPJF8csg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> SINGHA</td>
                                                        <td> GLOW COSMETIC PVT LTD</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGFe3sxJIZJOuJDSzRigwR2WNs23eUEcGpd0LtQEVteTMrL3AN1Gt0hWtrAK%2buRj%2fssLZIbxhJ9INSjYjbjhDMCEnCoYGndgTyeqby3%2f5HzoqwU%2bnQthAMJbp9ujpRrOIeVsqDQrA%2fyGg%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETIC PVT LTD</td>
                                                        <td> SINGHA</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbGh5%2f4VknbZPRERZHFQcgKkA8hsAK3uTT9EDeUJRWWddZ0q9wkw6MnEfH3w5Jc9vAf0uedVJDXae9WCNo9uKbW%2bVmsIjOiQ1hge356RHSG5pa%2f7rO0V7bZJkVQDijCnSnPsO7B%2fKjEAXw%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> Court</td>
                                                        <td> GLOW COSMETIC PVT LTD</td>
                                                        <td> TRADERS</td>
                                                        <td> (NACT)</td>
                                                        <td>a
                                                            href="https://www.instafinancials.com/legal-case-report.aspx?link=Qxh%2fBx65diwC82b1J4n%2fZZdLXPt1lA6e0KblzUGNxEaxxBo427wOfjkhF7HvDO2SywDxJOew7orBP5LqH0zGC3YbJeh3gYBLble3GXiNLbEqU7lVnLTWuKWJEWcGGqsTIRWFGFkgvmJZbatbKleJW5DmF9FnyX60vj3C4EJDjepJP3wSBfenmhVGtXwqOFD41iFCxgRF98EQz5upQgA%2bzdH%2bwMwHht8AaUxBEffJ2VCAxcusxsin8Q%3d%3d"
                                                            class="text-dark fw-bolder">Click</a></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Cases where status is Unknown -->
                            <div class="card">
                                <div class="blur">
                                    <span class="fa fa-lock ms-2 mt-2" style="z-index: 1;position: absolute;"></span>
                                    <div class="card locked-element">
                                        <div class="card-header">
                                            <h4 class="card-title">Cases where status is Unknown</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Case No</th>
                                                        <th>Court</th>
                                                        <th>Petitioner</th>
                                                        <th>Respondent</th>
                                                        <th>Type (Name)</th>
                                                        <th>Order Link</th>
                                                        <th>Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Note and table rows container -->
                                                    <tr>
                                                        <td colspan="7" class="p-0">
                                                            <!-- No Cases Available note -->
                                                            <div class="note bg-light-success text-center">
                                                                <p class="text-dark fw-bold p-1">No Cases Available</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Table rows go here -->
                                                </tbody>
                                            </table>
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
<div class="tab-pane" id="Boundaries" aria-labelledby="Boundaries-tab1" role="tabpanel" style="display:none;">
    <section class="card overflow-hidden">
        <!-- Map Menu Wrapper -->
        <div class="row">
            <!-- Map Menu Button when screen is < md -->
            <div class="flex-shrink-0 position-fixed m-4 d-md-none w-auto zindex-1">
                <button class="btn btn-label-white border border-2 zindex-2 p-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-logistics-fleet-sidebar"><i class="ti ti-menu-2"></i></button>
            </div>
            <!-- Map Menu -->
            <div class="app-logistics-fleet-sidebar col-md-5 h-100" id="app-logistics-fleet-sidebar">
                <div class="card-header border-0   d-flex justify-content-between">
                    <h5 class="mb-0 card-title">Site</h5>
                    <!-- Sidebar close button -->
                    <i class="ti ti-x ti-xs cursor-pointer close-sidebar d-md-none btn btn-label-secondary p-0" data-bs-toggle="sidebar" data-overlay data-target="#app-logistics-fleet-sidebar"></i>
                </div>
                <!-- Sidebar when screen < md -->
                <div class="card-body p-2 pt-0 logistics-fleet-sidebar-body">
                    <!-- Menu Accordion -->

                </div>
            </div>
            <!-- Mapbox Map container -->
            <div class="col-md-7 h-100 map-container">
                <!-- Map -->
                <div class="row">
                    <div class="col-md-11 pt-1  form-group">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="fa-solid fa-location-dot"></i></span>
                            <input type="search" class="form-control" id="address_search" onkeyup="address_search($(this).val())" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
                            <span class="input-group-text cursor-pointer"> <i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="append_search" class="col-md-6 pb-2">
                    </div>
                </div>
                <div id="mapp" class="mt-1">
                </div>
                <div id='listings' class='listings'></div>
            </div>
        </div>
    </section>
    <!-- <section> -->

</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marketplacemodel">
    Launch demo modal
</button> -->
<!-- Modal -->
<div class="modal fade" id="marketplacemodel" tabindex="-1" aria-labelledby="marketplacemodelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="marketplacemodelLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                View Plan
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/brand/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/jszip.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('public/brand/js/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/mapbox-gl.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/app-ecommerce-product-list.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/page-profile.min.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js'); ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js'); ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-repeater.min.js'); ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/extensions/ext-component-toastr.min.js'); ?>">
</script>
<script src="<?php echo base_url('public/brand/js/googlemap.js?features=default'); ?>"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc&callback=loadMap"> -->
</script>
<script>
    function add_active(that) {
        that.parent().find('li .active').removeClass('active');
        that.find('a').addClass('active');
    }

    function view_product(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('brand/get_product') ?>/" + id,
            // data: "data",
            dataType: "json",
            success: function(r) {
                // console.log(r);
                $('#p_name').text(r.cp_name);
                $('#p_type').text(r.type_name);
                $('#p_coll').text(r.cp_collection);
                $('#p_weight').text(r.weight);
                $('#p_unit').text(r.unit_name);
                $('#p_code').text(r.cp_sku);
                $('#p_turn').text(r.turnover_contribution);
                $('#p_life').text(r.product_life);
                $('#p_life_unit').text(r.lifeunit_id);
                $('#default').modal('show');
            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc&callback=initMap&v=weekly" defer></script>
<script>
    function initMap() {

        center = {
            lat: <?= $latitude; ?>,
            lng: <?= $longitude; ?>
        };
        zoom = 14;
        var mapp = new google.maps.Map(document.getElementById("map"), {
            zoom,
            center,
            gestureHandling: "none",
            zoomControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            fullscreenControl: false,
        });
        var allData = JSON.parse(document.getElementById('allData').innerHTML);

        function showAllColleges(allData) {
            var infoWind = new google.maps.InfoWindow;
            Array.prototype.forEach.call(allData, function(data) {
                var content = document.createElement('div');
                var strong = document.createElement('strong');
                console.log(data)
                strong.textContent = data.name;
                content.appendChild(strong);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data.lat, data.lng),
                    map: mapp
                });
                console.log(marker);
                marker.addListener('mouseover', function() {
                    infoWind.setContent(content);
                    infoWind.open(map, marker);
                })
            })
        }
        <?php if ($lat_lng) {
            foreach ($lat_lng as $lat_lng_id) { ?>
                var map_lng = '<?= $lat_lng_id->lng ?>';
                var map_lat = '<?= $lat_lng_id->lat ?>';
                new google.maps.Marker({
                    position: new google.maps.LatLng(map_lat, map_lng),
                    map: map
                });
        <?php
            }
        }
        ?>
        var allData = JSON.parse(document.getElementById('allData').innerHTML);
        showAllColleges(allData)
    }
    window.initMap = initMap;
</script>
<!-- maps  custom -->
<script>
    let table = $('#example').DataTable({

    });
    $('#ProductCategory').change(function() {
        table.search($(this).val()).draw();
    })
    let old_html = $('#accordionExample').html()

    function address_search(that) {
        $.ajax({
            type: "get",
            url: "<?= site_url('brand/address_search') ?>",
            data: {
                search: that,
            },
            success: function(response) {
                if (!response) {
                    $('#accordionExample').html(old_html);
                    return false;
                }
                response = JSON.parse(response)
                let len = response.length,
                    i = 0,
                    html = '';
                while (i < len) {
                    html += `  <div class="accordion-item mt-1">
<h2 class="accordion-header" id="headingTwo` + response[i]['id'] + `">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo` +
                        response[i]['id'] + `" aria-expanded="false" aria-controls="collapseTwo` + response[i][
                            'id'
                        ] + `">
` + response[i]['cp_name'] + `
</button>
</h2>
<div id="collapseTwo` + response[i]['id'] + `" onclick="change_location('` + response[i]['cp_address'] +
                        `')" class="accordion-collapse collapse" aria-labelledby="headingTwo` + response[i][
                            'id'
                        ] + `" data-bs-parent="#accordionExample">
<div class="accordion-body">
` + response[i]['cp_address'] + `
</div>
</div>
</div>
</div>`;
                    i++;
                }
                $('#accordionExample').html(html);
            }
        });
    }
</script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc&callback=loadMap"> -->
</script>
<!-- Map -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
</script>
<!-- Map -->
<!-- pie-charts -->
<script>
    function supplier_val(that, id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('Suppliers_Model/test_view') ?>",
            data: {
                id: id
            },
            // dataType: "dataType",
            success: function(response) {
                // console.log(response);
                $('#flush-collapseOne' + id).html(response);
            }
        });
    }
</script>
<script>
    function getData(companyName) {
        // alert(companyName);
        $.ajax({
            type: "get",
            url: "<?= site_url('Qualitative_assessment/get_data_api') ?>",
            data: {
                name: companyName
            },
            // dataType: "dataType",
            success: function(response) {
                var name = response.companyName;
                $('#companyname').html(name);
            }
        });
    }
</script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Permanent", "Non Permanent"],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $p_per; ?>, <?php echo $n_per; ?>],
                data1: ["Total:<?php echo $difable; ?>", "Total:<?php echo $difableNo; ?>"],
                data2: ["Differently Abled:<?php echo $parmanent; ?>",
                    "Differently Abled:<?php echo $Nonparmanent; ?>"
                ],
                backgroundColor: [
                    'rgb(219, 252, 106)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)'
                ],
                borderColor: [
                    'rgb(219, 252, 106)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data1) {
                        return data1['datasets'][0]['data1'][tooltipItem['index']];
                    },
                    afterLabel: function(tooltipItem, data2) {
                        return data2['datasets'][0]['data2'][tooltipItem['index']];
                    },
                },
                backgroundColor: '#000000c9',
                titleFontSize: 14,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 14,
                displayColors: false
            }
        }
    });
</script>
<script>
    function uniq_spl(that, id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Suppliers_Model/test_view') ?>",
            data: {
                uniq_spl: that.val(),
                id: id
            },
            success: function(response) {
                $('#flush-collapseOne' + id).html(response);
            }
        });
    }
</script>
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#ebcf34",
                series2: "#5ceb34",
                series3: "#346beb",
                bg: "#ffffff00"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };

        function s(e, t) {
            for (var a = 0, o = []; a < e;) {
                var r = "w" + (a + 1).toString(),
                    s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
                o.push({
                    x: r,
                    y: s
                }), a++
            }
            return o
        }
        if (e.length) {
            new Date;
            e.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
        var i = document.querySelector("#line-area-chart"),
            n = {
                chart: {
                    height: 400,
                    type: "area",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !1,
                    curve: "straight"
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                colors: [r.series3, r.series2, r.series1],
                series: [{
                    name: "Visits",
                    data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
                }, {
                    name: "Clicks",
                    data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                }, {
                    name: "Sales",
                    data: [20, 40, 30, 70, 40, 60, 50, 140, 120, 100, 140, 180, 220]
                }],
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12",
                        "16/12", "17/12", "18/12", "19/12", "20/12"
                    ]
                },
                fill: {
                    opacity: 1,
                    type: "solid"
                },
                tooltip: {
                    shared: !1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-charts-two"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "45%",
                        colors: {
                            backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [a.series1, a.series2, a.series3],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Male",
                    data: [<?= $male_total_bod[0]; ?>, <?= $male_total_key[0]; ?>]
                }, {
                    name: "Female",
                    data: [<?= $femal_total_bod[0]; ?>, <?= $femal_total_key[0]; ?>]
                }, {
                    name: "Others",
                    data: [<?= $other_total_bod[0]; ?>, <?= $other_total_key[0]; ?>]
                }, ],
                xaxis: {
                    categories: ["BOD", "KMP"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
        var p = document.querySelector("#scatter-chart"),
            c = {
                chart: {
                    height: 400,
                    type: "scatter",
                    zoom: {
                        enabled: !0,
                        type: "xy"
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
                series: [{
                    name: "Angular",
                    data: [
                        [5.4, 170],
                        [5.4, 100],
                        [6.3, 170],
                        [5.7, 140],
                        [5.9, 130],
                        [7, 150],
                        [8, 120],
                        [9, 170],
                        [10, 190],
                        [11, 220],
                        [12, 170],
                        [13, 230]
                    ]
                }, {
                    name: "Vue",
                    data: [
                        [14, 220],
                        [15, 280],
                        [16, 230],
                        [18, 320],
                        [17.5, 280],
                        [19, 250],
                        [20, 350],
                        [20.5, 320],
                        [20, 320],
                        [19, 280],
                        [17, 280],
                        [22, 300],
                        [18, 120]
                    ]
                }, {
                    name: "React",
                    data: [
                        [14, 290],
                        [13, 190],
                        [20, 220],
                        [21, 350],
                        [21.5, 290],
                        [22, 220],
                        [23, 140],
                        [19, 400],
                        [20, 200],
                        [22, 90],
                        [20, 120]
                    ]
                }],
                xaxis: {
                    tickAmount: 10,
                    labels: {
                        formatter: function(e) {
                            return parseFloat(e).toFixed(1)
                        }
                    }
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof p && null !== p && new ApexCharts(p, c).render();
        var h = document.querySelector("#line-chart"),
            m = {
                chart: {
                    height: 400,
                    type: "line",
                    zoom: {
                        enabled: !1
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }],
                markers: {
                    strokeWidth: 7,
                    strokeOpacity: 1,
                    strokeColors: [window.colors.solid.white],
                    colors: [window.colors.solid.warning]
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "straight"
                },
                colors: [window.colors.solid.warning],
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -20
                    }
                },
                tooltip: {
                    custom: function(e) {
                        return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e
                            .dataPointIndex
                        ] + "%</span></div>"
                    }
                },
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12",
                        "16/12", "17/12", "18/12", "19/12", "20/12", "21/12"
                    ]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof h && null !== h && new ApexCharts(h, m).render();
        var f = document.querySelector("#bar-chart"),
            w = {
                chart: {
                    height: 400,
                    type: "bar",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !0,
                        barHeight: "30%",
                        endingShape: "rounded"
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    padding: {
                        top: -15,
                        bottom: -10
                    }
                },
                colors: window.colors.solid.info,
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    data: [700, 350, 480, 600, 210, 550, 150]
                }],
                xaxis: {
                    categories: ["MON, 11", "THU, 14", "FRI, 15", "MON, 18", "WED, 20", "FRI, 21", "MON, 23"]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof f && null !== f && new ApexCharts(f, w).render();
        var g = document.querySelector("#candlestick-chart"),
            u = {
                chart: {
                    height: 400,
                    type: "candlestick",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [{
                        x: new Date(15387786e5),
                        y: [150, 170, 50, 100]
                    }, {
                        x: new Date(15387804e5),
                        y: [200, 400, 170, 330]
                    }, {
                        x: new Date(15387822e5),
                        y: [330, 340, 250, 280]
                    }, {
                        x: new Date(1538784e6),
                        y: [300, 330, 200, 320]
                    }, {
                        x: new Date(15387858e5),
                        y: [320, 450, 280, 350]
                    }, {
                        x: new Date(15387876e5),
                        y: [300, 350, 80, 250]
                    }, {
                        x: new Date(15387894e5),
                        y: [200, 330, 170, 300]
                    }, {
                        x: new Date(15387912e5),
                        y: [200, 220, 70, 130]
                    }, {
                        x: new Date(1538793e6),
                        y: [220, 270, 180, 250]
                    }, {
                        x: new Date(15387948e5),
                        y: [200, 250, 80, 100]
                    }, {
                        x: new Date(15387966e5),
                        y: [150, 170, 50, 120]
                    }, {
                        x: new Date(15387984e5),
                        y: [110, 450, 10, 420]
                    }, {
                        x: new Date(15388002e5),
                        y: [400, 480, 300, 320]
                    }, {
                        x: new Date(1538802e6),
                        y: [380, 480, 350, 450]
                    }]
                }],
                xaxis: {
                    type: "datetime"
                },
                yaxis: {
                    tooltip: {
                        enabled: !0
                    },
                    opposite: t
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -23
                    }
                },
                plotOptions: {
                    candlestick: {
                        colors: {
                            upward: window.colors.solid.success,
                            downward: window.colors.solid.danger
                        }
                    },
                    bar: {
                        columnWidth: "40%"
                    }
                }
            };
        void 0 !== typeof g && null !== g && new ApexCharts(g, u).render();
        var x = document.querySelector("#heatmap-chart"),
            y = {
                chart: {
                    height: 350,
                    type: "heatmap",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    heatmap: {
                        enableShades: !1,
                        colorScale: {
                            ranges: [{
                                from: 0,
                                to: 10,
                                name: "0-10",
                                color: "#b9b3f8"
                            }, {
                                from: 11,
                                to: 20,
                                name: "10-20",
                                color: "#aba4f6"
                            }, {
                                from: 21,
                                to: 30,
                                name: "20-30",
                                color: "#9d95f5"
                            }, {
                                from: 31,
                                to: 40,
                                name: "30-40",
                                color: "#8f85f3"
                            }, {
                                from: 41,
                                to: 50,
                                name: "40-50",
                                color: "#8176f2"
                            }, {
                                from: 51,
                                to: 60,
                                name: "50-60",
                                color: "#7367f0"
                            }]
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                grid: {
                    padding: {
                        top: -25
                    }
                },
                series: [{
                    name: "SUN",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "MON",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "TUE",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "WED",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "THU",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "FRI",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "SAT",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }],
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                }
            };
        void 0 !== typeof x && null !== x && new ApexCharts(x, y).render();
        var b = document.querySelector("#radialbar-chart"),
            S = {
                chart: {
                    height: 350,
                    type: "radialBar"
                },
                colors: [o.series1, o.series2, o.series4],
                plotOptions: {
                    radialBar: {
                        size: 185,
                        hollow: {
                            size: "25%"
                        },
                        track: {
                            margin: 15
                        },
                        dataLabels: {
                            name: {
                                fontSize: "2rem",
                                fontFamily: "Montserrat"
                            },
                            value: {
                                fontSize: "1rem",
                                fontFamily: "Montserrat"
                            },
                            total: {
                                show: !0,
                                fontSize: "1rem",
                                label: "Comments",
                                formatter: function(e) {
                                    return "80%"
                                }
                            }
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -35,
                        bottom: -30
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                stroke: {
                    lineCap: "round"
                },
                series: [80, 50, 35],
                labels: ["Comments", "Replies", "Shares"]
            };
        void 0 !== typeof b && null !== b && new ApexCharts(b, S).render();
        var v = document.querySelector("#radar-chart"),
            k = {
                chart: {
                    height: 400,
                    type: "radar",
                    toolbar: {
                        show: !1
                    },
                    parentHeightOffset: 0,
                    dropShadow: {
                        enabled: !1,
                        blur: 8,
                        left: 1,
                        top: 1,
                        opacity: .2
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                yaxis: {
                    show: !1
                },
                series: [{
                    name: "iPhone 11",
                    data: [41, 64, 81, 60, 42, 42, 33, 23]
                }, {
                    name: "Samsung s20",
                    data: [65, 46, 42, 25, 58, 63, 76, 43]
                }],
                colors: [o.series1, o.series3],
                xaxis: {
                    categories: ["Battery", "Brand", "Camera", "Memory", "Storage", "Display", "OS", "Price"]
                },
                fill: {
                    opacity: [1, .8]
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                markers: {
                    size: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: -20
                    }
                }
            };
        void 0 !== typeof v && null !== v && new ApexCharts(v, k).render();
        var O = document.querySelector("#donut-chart"),
            D = {
                chart: {
                    height: 350,
                    type: "donut"
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                labels: ["dtdfgy", "Networking", "Hiring", "R&D"],
                series: [85, 16, 50, 50],
                colors: [o.series1, o.series5, o.series3, o.series2],
                dataLabels: {
                    enabled: !0,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: !0,
                                name: {
                                    fontSize: "2rem",
                                    fontFamily: "Montserrat"
                                },
                                value: {
                                    fontSize: "1rem",
                                    fontFamily: "Montserrat",
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                total: {
                                    show: !0,
                                    fontSize: "1.5rem",
                                    label: "Operational",
                                    formatter: function(e) {
                                        return "31%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                }, {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: !0,
                                        name: {
                                            fontSize: "1.5rem"
                                        },
                                        value: {
                                            fontSize: "1rem"
                                        },
                                        total: {
                                            fontSize: "1.5rem"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof O && null !== O && new ApexCharts(O, D).render()
    }));
</script>
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#4de2eb",
                series2: "#ffb6c1",
                series3: "#e8b99b",
                bg: "#ffffff00"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };

        function s(e, t) {
            for (var a = 0, o = []; a < e;) {
                var r = "w" + (a + 1).toString(),
                    s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
                o.push({
                    x: r,
                    y: s
                }), a++
            }
            return o
        }
        if (e.length) {
            new Date;
            e.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
        var i = document.querySelector("#line-area-chart"),
            n = {
                chart: {
                    height: 400,
                    type: "area",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !1,
                    curve: "straight"
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                colors: [r.series3, r.series2, r.series1],
                series: [{
                    name: "Visits",
                    data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
                }, {
                    name: "Clicks",
                    data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                }, {
                    name: "Sales",
                    data: [20, 40, 30, 70, 40, 60, 50, 140, 120, 100, 140, 180, 220]
                }],
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12",
                        "16/12", "17/12", "18/12", "19/12", "20/12"
                    ]
                },
                fill: {
                    opacity: 1,
                    type: "solid"
                },
                tooltip: {
                    shared: !1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-charts"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "45%",
                        colors: {
                            backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [a.series1, a.series2, a.series3],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Male",
                    data: [<?= $emp_male_total; ?>, <?= $wor_male_total; ?>]
                }, {
                    name: "Female",
                    data: [<?= $emp_femal_total; ?>, <?= $wor_femal_total; ?>]
                }, {
                    name: "Others",
                    data: [<?= $emp_other_total; ?>, <?= $wor_other_total; ?>]
                }, ],
                xaxis: {
                    categories: ["Employees", "Workers"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
        var p = document.querySelector("#scatter-chart"),
            c = {
                chart: {
                    height: 400,
                    type: "scatter",
                    zoom: {
                        enabled: !0,
                        type: "xy"
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
                series: [{
                    name: "Angular",
                    data: [
                        [5.4, 170],
                        [5.4, 100],
                        [6.3, 170],
                        [5.7, 140],
                        [5.9, 130],
                        [7, 150],
                        [8, 120],
                        [9, 170],
                        [10, 190],
                        [11, 220],
                        [12, 170],
                        [13, 230]
                    ]
                }, {
                    name: "Vue",
                    data: [
                        [14, 220],
                        [15, 280],
                        [16, 230],
                        [18, 320],
                        [17.5, 280],
                        [19, 250],
                        [20, 350],
                        [20.5, 320],
                        [20, 320],
                        [19, 280],
                        [17, 280],
                        [22, 300],
                        [18, 120]
                    ]
                }, {
                    name: "React",
                    data: [
                        [14, 290],
                        [13, 190],
                        [20, 220],
                        [21, 350],
                        [21.5, 290],
                        [22, 220],
                        [23, 140],
                        [19, 400],
                        [20, 200],
                        [22, 90],
                        [20, 120]
                    ]
                }],
                xaxis: {
                    tickAmount: 10,
                    labels: {
                        formatter: function(e) {
                            return parseFloat(e).toFixed(1)
                        }
                    }
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof p && null !== p && new ApexCharts(p, c).render();
        var h = document.querySelector("#line-chart"),
            m = {
                chart: {
                    height: 400,
                    type: "line",
                    zoom: {
                        enabled: !1
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }],
                markers: {
                    strokeWidth: 7,
                    strokeOpacity: 1,
                    strokeColors: [window.colors.solid.white],
                    colors: [window.colors.solid.warning]
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "straight"
                },
                colors: [window.colors.solid.warning],
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -20
                    }
                },
                tooltip: {
                    custom: function(e) {
                        return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e
                            .dataPointIndex
                        ] + "%</span></div>"
                    }
                },
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12",
                        "16/12", "17/12", "18/12", "19/12", "20/12", "21/12"
                    ]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof h && null !== h && new ApexCharts(h, m).render();
        var f = document.querySelector("#bar-chart"),
            w = {
                chart: {
                    height: 400,
                    type: "bar",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !0,
                        barHeight: "30%",
                        endingShape: "rounded"
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    padding: {
                        top: -15,
                        bottom: -10
                    }
                },
                colors: window.colors.solid.info,
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    data: [700, 350, 480, 600, 210, 550, 150]
                }],
                xaxis: {
                    categories: ["MON, 11", "THU, 14", "FRI, 15", "MON, 18", "WED, 20", "FRI, 21", "MON, 23"]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof f && null !== f && new ApexCharts(f, w).render();
        var g = document.querySelector("#candlestick-chart"),
            u = {
                chart: {
                    height: 400,
                    type: "candlestick",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [{
                        x: new Date(15387786e5),
                        y: [150, 170, 50, 100]
                    }, {
                        x: new Date(15387804e5),
                        y: [200, 400, 170, 330]
                    }, {
                        x: new Date(15387822e5),
                        y: [330, 340, 250, 280]
                    }, {
                        x: new Date(1538784e6),
                        y: [300, 330, 200, 320]
                    }, {
                        x: new Date(15387858e5),
                        y: [320, 450, 280, 350]
                    }, {
                        x: new Date(15387876e5),
                        y: [300, 350, 80, 250]
                    }, {
                        x: new Date(15387894e5),
                        y: [200, 330, 170, 300]
                    }, {
                        x: new Date(15387912e5),
                        y: [200, 220, 70, 130]
                    }, {
                        x: new Date(1538793e6),
                        y: [220, 270, 180, 250]
                    }, {
                        x: new Date(15387948e5),
                        y: [200, 250, 80, 100]
                    }, {
                        x: new Date(15387966e5),
                        y: [150, 170, 50, 120]
                    }, {
                        x: new Date(15387984e5),
                        y: [110, 450, 10, 420]
                    }, {
                        x: new Date(15388002e5),
                        y: [400, 480, 300, 320]
                    }, {
                        x: new Date(1538802e6),
                        y: [380, 480, 350, 450]
                    }]
                }],
                xaxis: {
                    type: "datetime"
                },
                yaxis: {
                    tooltip: {
                        enabled: !0
                    },
                    opposite: t
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -23
                    }
                },
                plotOptions: {
                    candlestick: {
                        colors: {
                            upward: window.colors.solid.success,
                            downward: window.colors.solid.danger
                        }
                    },
                    bar: {
                        columnWidth: "40%"
                    }
                }
            };
        void 0 !== typeof g && null !== g && new ApexCharts(g, u).render();
        var x = document.querySelector("#heatmap-chart"),
            y = {
                chart: {
                    height: 350,
                    type: "heatmap",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    heatmap: {
                        enableShades: !1,
                        colorScale: {
                            ranges: [{
                                from: 0,
                                to: 10,
                                name: "0-10",
                                color: "#b9b3f8"
                            }, {
                                from: 11,
                                to: 20,
                                name: "10-20",
                                color: "#aba4f6"
                            }, {
                                from: 21,
                                to: 30,
                                name: "20-30",
                                color: "#9d95f5"
                            }, {
                                from: 31,
                                to: 40,
                                name: "30-40",
                                color: "#8f85f3"
                            }, {
                                from: 41,
                                to: 50,
                                name: "40-50",
                                color: "#8176f2"
                            }, {
                                from: 51,
                                to: 60,
                                name: "50-60",
                                color: "#7367f0"
                            }]
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                grid: {
                    padding: {
                        top: -25
                    }
                },
                series: [{
                    name: "SUN",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "MON",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "TUE",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "WED",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "THU",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "FRI",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "SAT",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }],
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                }
            };
        void 0 !== typeof x && null !== x && new ApexCharts(x, y).render();
        var b = document.querySelector("#radialbar-chart"),
            S = {
                chart: {
                    height: 350,
                    type: "radialBar"
                },
                colors: [o.series1, o.series2, o.series4],
                plotOptions: {
                    radialBar: {
                        size: 185,
                        hollow: {
                            size: "25%"
                        },
                        track: {
                            margin: 15
                        },
                        dataLabels: {
                            name: {
                                fontSize: "2rem",
                                fontFamily: "Montserrat"
                            },
                            value: {
                                fontSize: "1rem",
                                fontFamily: "Montserrat"
                            },
                            total: {
                                show: !0,
                                fontSize: "1rem",
                                label: "Comments",
                                formatter: function(e) {
                                    return "80%"
                                }
                            }
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -35,
                        bottom: -30
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                stroke: {
                    lineCap: "round"
                },
                series: [80, 50, 35],
                labels: ["Comments", "Replies", "Shares"]
            };
        void 0 !== typeof b && null !== b && new ApexCharts(b, S).render();
        var v = document.querySelector("#radar-chart"),
            k = {
                chart: {
                    height: 400,
                    type: "radar",
                    toolbar: {
                        show: !1
                    },
                    parentHeightOffset: 0,
                    dropShadow: {
                        enabled: !1,
                        blur: 8,
                        left: 1,
                        top: 1,
                        opacity: .2
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                yaxis: {
                    show: !1
                },
                series: [{
                    name: "iPhone 11",
                    data: [41, 64, 81, 60, 42, 42, 33, 23]
                }, {
                    name: "Samsung s20",
                    data: [65, 46, 42, 25, 58, 63, 76, 43]
                }],
                colors: [o.series1, o.series3],
                xaxis: {
                    categories: ["Battery", "Brand", "Camera", "Memory", "Storage", "Display", "OS", "Price"]
                },
                fill: {
                    opacity: [1, .8]
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                markers: {
                    size: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: -20
                    }
                }
            };
        void 0 !== typeof v && null !== v && new ApexCharts(v, k).render();
        var O = document.querySelector("#donut-chart"),
            D = {
                chart: {
                    height: 350,
                    type: "donut"
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                labels: ["dtdfgy", "Networking", "Hiring", "R&D"],
                series: [85, 16, 50, 50],
                colors: [o.series1, o.series5, o.series3, o.series2],
                dataLabels: {
                    enabled: !0,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: !0,
                                name: {
                                    fontSize: "2rem",
                                    fontFamily: "Montserrat"
                                },
                                value: {
                                    fontSize: "1rem",
                                    fontFamily: "Montserrat",
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                total: {
                                    show: !0,
                                    fontSize: "1.5rem",
                                    label: "Operational",
                                    formatter: function(e) {
                                        return "31%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                }, {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: !0,
                                        name: {
                                            fontSize: "1.5rem"
                                        },
                                        value: {
                                            fontSize: "1rem"
                                        },
                                        total: {
                                            fontSize: "1.5rem"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof O && null !== O && new ApexCharts(O, D).render()
    }));
</script><!-- end chart  -->
<!--world map start-->
<script>
    var options = {
        series: [{
                name: 'Operating Activities',
                data: [30, 120, 40, 25, 30]
            },
            {
                name: 'Investing Activities',
                data: [-5, -50, -15, 6, -20]
            },
            {
                name: 'Financing Activities',
                data: [-10, -80, -35, 10, -35]
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
        },
        xaxis: {
            categories: ['2017-18', '2018-19', '2019-20', '2020-21', '2021-22'],
        },
        fill: {
            opacity: 1,
        },
        colors: ['#045372', '#127ea9', '#4dacd1'],
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: false, // Disable data labels
                },
                horizontal: false, // Disable horizontal lines
            }
        },
        options: {
            plugins: {
                datalabels: {
                    display: false
                }
            },
        },
        grid: {
            show: false, // Disable grid lines
        },
        legend: {
            position: 'right',
            offsetY: 0,
            offsetX: 0,
        },
    };
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<script>
    $(function() {
        t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#4de2eb",
                series2: "#ffb6c1",
                series3: "#e8b99b",
                bg: "#ffffff00"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };
        var l = document.querySelector("#industry1"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "10%",
                        colors: {
                            backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [a.series1, o.series2],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Percentage",
                    data: [30.64.toFixed(2), 35.42.toFixed(2), 6.88.toFixed(2)],
                }],
                xaxis: {
                    categories: ["Environment", "Governance", "Social"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
        var l = document.querySelector("#industry2"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "10%",
                        colors: {
                            // backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                // colors: [a.series1],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Avg Percentage",
                    data: [10.213333333333.toFixed(2), 11.806666666667.toFixed(2), 2.2933333333333.toFixed(
                        2)]
                }],
                xaxis: {
                    categories: ["Environment", "Governance", "Social"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    })
</script>
<!-- bar chart 1 -->
<!-- 1 -->
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#867df2",
                series2: "#d2b0ff",
                series3: "#e2e2f2",
                bg: "#f8d3ff"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };
        var i = document.querySelector("#line-area-chart"),
            n = {
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-chart1"),
            d = {
                chart: {
                    height: 258,
                    parentHeightOffset: 0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "32%",
                        startingShape: "rounded",
                        borderRadius: 7,
                        distributed: !0,
                        dataLabels: {
                            position: "top"
                        }
                    }
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
                dataLabels: {
                    enabled: !0,
                    offsetX: !1,
                    style: {
                        fontSize: "10px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    data: t
                }],
                colors: [a.series3, a.series3, a.series3, a.series3, a.series3, a.series2, a.series3, a.series3,
                    a.series3, a.series3, a.series3, a.series3
                ],
                dataLabels: {
                    enabled: !0,
                    offsetY: !1,
                    style: {
                        fontSize: "15px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    name: "Sales",
                    data: [1, 55, 10, 20, 50, 89, 80, 20, 50, 99, 2, 100],
                }],
                legend: {
                    show: !1
                },
                tooltip: {
                    enabled: !1
                },
                xaxis: {
                    categories: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb",
                        "Mar"
                    ],
                    axisBorder: {
                        show: !0,
                        color: l
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        style: {
                            colors: i,
                            fontSize: "13px",
                            fontFamily: "Public Sans"
                        }
                    }
                },
                fill: {
                    opacity: [1, .85]
                },
                yaxis: {
                    labels: {
                        offsetX: -15,
                        style: {
                            fontSize: "13px",
                            colors: i,
                            fontFamily: "Public Sans"
                        },
                        min: 0,
                        max: 6e4,
                        tickAmount: 6
                    }
                },
                responsive: [{
                    breakpoint: 1441,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "41%"
                            }
                        }
                    }
                }, {
                    breakpoint: 590,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "61%",
                                borderRadius: 5
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1
                            }
                        },
                        grid: {
                            padding: {
                                right: 0,
                                left: -20
                            }
                        },
                        dataLabels: {
                            style: {
                                fontSize: "12px",
                                fontWeight: "400"
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    }));
</script>
<script>
    var options = {
        series: [{
                name: 'Assets',
                data: [300, 400]
            },
            {
                name: 'Liabilities',
                data: [-150, -200]
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: false
        },
        xaxis: {
            categories: ['2017-18', '2018-19'],
        },
        fill: {
            opacity: 1,
            colors: ['#045372', '#127ea9']
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                dataLabels: {
                    position: 'top',
                    enabled: false,
                },
                endingShape: 'rounded',
                stacked: true, // Enable stacking
            }
        },
        options: {
            chart: {
                toolbar: {
                    show: false
                }
            }
        },
        grid: {
            show: false
        },
        legend: {
            position: 'top',
            offsetY: 0,
            offsetX: 0,
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                return val + 'K';
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + 'K';
                }
            }
        },
        xaxis: {
            categories: ['2017-18', '2018-19'],
        },
        yaxis: {
            title: {
                text: 'Amount (in K)',
            },
            labels: {
                formatter: function(val) {
                    return val + 'K';
                }
            }
        },
        tooltip: {
            shared: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 'auto'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#balance-chart1"), options);
    chart.render();
</script>
<!-- cash chart -->
<script>
    var options = {
        series: [{
                name: 'Operating Activities',
                data: [30, 120, 40, 25, 30],
                dataLabels: {
                    enabled: false,
                },
            },
            {
                name: 'Investing Activities',
                data: [-5, -50, -15, 6, -20],
                dataLabels: {
                    enabled: false,
                },
            },
            {
                name: 'Financing Activities',
                data: [-10, -80, -35, 10, -35],
                dataLabels: {
                    enabled: false,
                },
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: false
        },
        xaxis: {
            categories: ['2017-18', '2018-19', '2019-20', '2020-21', '2021-22'],
        },
        fill: {
            opacity: 1,
        },
        colors: ['#045372', '#127ea9', '#4dacd1'],
        plotOptions: {
            bar: {
                horizontal: false, // Disable horizontal lines
            }
        },
        options: {
            chart: {
                toolbar: {
                    show: false, // Disable toolbar
                },
            },
        },
        grid: {
            show: false, // Disable grid lines
        },
        legend: {
            position: 'top',
            offsetY: 0,
            offsetX: 0,
        },
    };
    var chart = new ApexCharts(document.querySelector("#cash-chart"), options);
    chart.render();
</script>
<script>
    var options = {
        series: [{
                name: 'Assets',
                group: 'budget',
                data: [400, 50, 41, 67, 20]
            },
            {
                name: 'Investments',
                group: 'actual',
                data: [480, 500, 400, 60, 25]
            },
            {
                name: 'Loans and Advances',
                group: 'budget',
                data: [1000, 360, 20, 800, 130]
            },
            {
                name: 'Inventory',
                group: 'actual',
                data: [100, 400, 250, 135, 120]
            },
            {
                name: 'Trade Receivables',
                group: 'budget',
                data: [1500, 36, 200, 8, 100]
            },
            {
                name: 'Cash and bank balance',
                group: 'budget',
                data: [13, 360, 200, 800, 130]
            },
            {
                name: 'Other Assets',
                group: 'budget',
                data: [130, 36, 20, 80, 13]
            },
            {
                name: 'Net Wort',
                group: 'budget',
                data: []
            },
            {
                name: 'Borrowings',
                group: 'budget',
                data: []
            },
            {
                name: 'Other Non-Current Liabilities',
                group: 'budget',
                data: []
            },
            {
                name: 'Current liabilities and provisions',
                group: 'budget',
                data: []
            },
            {
                name: 'Deferred tax liability/(asset) ',
                group: 'budget',
                data: []
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: false
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        plotOptions: {
            bar: {
                horizontal: false
            }
        },
        xaxis: {
            categories: ['2017-18', '2018-19', '2019-20', '2020-21', '2021-22'],
        },
        fill: {
            opacity: 1
        },
        // Custom color palette with only 4 colors
        colors: ['#000099', '#0000cc', '#1a1aff', '#4d79ff', '#66a3ff', '#99bbff', '#b3d9ff', '#206020', '#39ac39',
            '#79d279', '#9fdf9f', '#d9f2d9'
        ],
        legend: {
            position: 'bottom',
            horizontalAlign: 'left'
        },
        tooltip: {
            enabled: false // Disable tooltips
        },
        dataLabels: {
            enabled: false // Disable data labels inside the bars
        }
    };
    var chart = new ApexCharts(document.querySelector("#balance-chart"), options);
    chart.render();
</script>
<!-- ratio chart  -->
<script>
    var options = {
        series: [{
                name: ' Return on capital employed (RoCE) (%)',
                data: [30, 120, 20, 25, 10]
            },
            {
                name: 'Return on equity (RoE) (%) ',
                data: [-25, -160, -15, 25, 5]
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: false
        },
        xaxis: {
            categories: ['2017-18', '2018-19', '2019-20', '2020-21', '2021-22'],
        },
        fill: {
            opacity: 1,
        },
        colors: ['#045372', '#127ea9', '#4dacd1'],
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: false, // Disable data labels
                },
                horizontal: false, // Disable horizontal lines
            }
        },
        options: {
            plugins: {
                datalabels: {
                    display: false
                }
            },
        },
        grid: {
            show: false, // Disable grid lines
        },
        legend: {
            position: 'top',
            offsetY: 0,
            offsetX: 0,
        },
    };
    var chart = new ApexCharts(document.querySelector("#ratio-chart"), options);
    chart.render();
</script>
<script>
    var options = {
        series: [{
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            },
            {
                data: [1]
            }
        ],
        chart: {
            type: 'bar',
            height: 370,
            width: 250,
            stacked: true,
        },
        xaxis: {
            categories: ['2011 Q1'], // Replace with appropriate categories
            labels: {
                show: false
            }
        },
        yaxis: {
            min: 0,
            max: 10, // Set the maximum value to 10
            labels: {
                show: true,
                formatter: function(value) {
                    return value.toFixed(0);
                }
            }
        },
        fill: {
            opacity: 1
        },
        colors: [
            '#ba212a', '#d51821', '#f04024', '#f26622', '#f88d20',
            '#ffd703', '#FF4500', '#f8f9f9', '#f8f9f9', '#8cc74e', '#0066cc' // Add one more color here
        ],
        legend: {
            show: false
        },
        tooltip: {
            enabled: false
        },
        plotOptions: {
            bar: {
                columnWidth: '50%', // Adjust the width of the bar
                dataLabels: {
                    position: 'top', // Display data labels at the top of the bars
                    style: {
                        colors: ['#ffffff'], // Set text color to white for data labels
                    }
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#chart-container"), options);
    chart.render();
</script>
<!-- data table changes  -->
<script>
    // Add JavaScript to toggle between Balance, Cash Flow, and Ratio Analysis tables
    $(document).ready(function() {
        // Listen for changes in the tab selection
        $('.nav-tabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
            // Check which tab is active and toggle table visibility accordingly
            var tabId = $(this).attr('href');
            if (tabId === "#balance") {
                $('#balanceTable').show();
                $('#cashTable').hide();
                $('#ratioTable').hide();
            } else if (tabId === "#cash") {
                $('#balanceTable').hide();
                $('#cashTable').show();
                $('#ratioTable').hide();
            } else if (tabId === "#ratio") {
                $('#balanceTable').hide();
                $('#cashTable').hide();
                $('#ratioTable').show();
            }
        });
        // Listen for changes in the select box for Cash Flow
        $('#yearSelect').change(function() {
            var selectedYear = $(this).val();
            // Update the "Selected Year" value in the Cash Flow table
            $('#selectedYearValueCash').text(selectedYear);
            // Update the "Selected Year" value in the Ratio Analysis table
            $('#selectedYearValueRatio').text(selectedYear);
        });
    });
</script>
<!-- 2 -->
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#867df2",
                series2: "#d2b0ff",
                series3: "#e2e2f2",
                bg: "#f8d3ff"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };
        var i = document.querySelector("#line-area-chart"),
            n = {
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-chart2"),
            d = {
                chart: {
                    height: 258,
                    parentHeightOffset: 0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "32%",
                        startingShape: "rounded",
                        borderRadius: 7,
                        distributed: !0,
                        dataLabels: {
                            position: "top"
                        }
                    }
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
                dataLabels: {
                    enabled: !0,
                    offsetX: !1,
                    style: {
                        fontSize: "10px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    data: t
                }],
                colors: [a.series3, a.series3, a.series3, a.series3, a.series3, a.series2, a.series3, a.series3,
                    a.series3, a.series3, a.series3, a.series3
                ],
                dataLabels: {
                    enabled: !0,
                    offsetY: !1,
                    style: {
                        fontSize: "15px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    name: "Sales",
                    data: [1, 55, 10, 20, 50, 89, 80, 20, 50, 99, 2, 100],
                }],
                legend: {
                    show: !1
                },
                tooltip: {
                    enabled: !1
                },
                xaxis: {
                    categories: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb",
                        "Mar"
                    ],
                    axisBorder: {
                        show: !0,
                        color: l
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        style: {
                            colors: i,
                            fontSize: "13px",
                            fontFamily: "Public Sans"
                        }
                    }
                },
                fill: {
                    opacity: [1, .85]
                },
                yaxis: {
                    labels: {
                        offsetX: -15,
                        style: {
                            fontSize: "13px",
                            colors: i,
                            fontFamily: "Public Sans"
                        },
                        min: 0,
                        max: 6e4,
                        tickAmount: 6
                    }
                },
                responsive: [{
                    breakpoint: 1441,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "41%"
                            }
                        }
                    }
                }, {
                    breakpoint: 590,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "61%",
                                borderRadius: 5
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1
                            }
                        },
                        grid: {
                            padding: {
                                right: 0,
                                left: -20
                            }
                        },
                        dataLabels: {
                            style: {
                                fontSize: "12px",
                                fontWeight: "400"
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    }));
</script>
<!-- 3 -->
<script>
    var options = {
        series: [{
                name: ' Return on capital employed (RoCE) (%)',
                data: [30, 120, 20, 25, 10]
            },
            {
                name: 'Return on equity (RoE) (%) ',
                data: [-25, -160, -15, 25, 5]
            }
        ],
        chart: {
            type: 'bar',
            height: 350,
        },
        xaxis: {
            categories: ['2017-18', '2018-19', '2019-20', '2020-21', '2021-22'],
        },
        fill: {
            opacity: 1,
        },
        colors: ['#045372', '#127ea9', '#4dacd1'],
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: false, // Disable data labels
                },
                horizontal: false, // Disable horizontal lines
            }
        },
        options: {
            plugins: {
                datalabels: {
                    display: false
                }
            },
        },
        grid: {
            show: false, // Disable grid lines
        },
        legend: {
            position: 'right',
            offsetY: 0,
            offsetX: 0,
        },
    };
    var chart = new ApexCharts(document.querySelector("#ratio-chart"), options);
    chart.render();
</script>
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#867df2",
                series2: "#d2b0ff",
                series3: "#e2e2f2",
                bg: "#f8d3ff"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };
        var i = document.querySelector("#line-area-chart"),
            n = {
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-chart3"),
            d = {
                chart: {
                    height: 258,
                    parentHeightOffset: 0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "32%",
                        startingShape: "rounded",
                        borderRadius: 7,
                        distributed: !0,
                        dataLabels: {
                            position: "top"
                        }
                    }
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: -10,
                        right: -10
                    }
                },
                dataLabels: {
                    enabled: !0,
                    offsetX: !1,
                    style: {
                        fontSize: "10px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    data: t
                }],
                colors: [a.series3, a.series3, a.series3, a.series3, a.series3, a.series2, a.series3, a.series3,
                    a.series3, a.series3, a.series3, a.series3
                ],
                dataLabels: {
                    enabled: !0,
                    offsetY: !1,
                    style: {
                        fontSize: "15px",
                        colors: [n],
                        fontWeight: "600",
                        fontFamily: "Public Sans"
                    }
                },
                series: [{
                    name: "Sales",
                    data: [1, 55, 10, 20, 50, 89, 80, 20, 50, 99, 2, 100],
                }],
                legend: {
                    show: !1
                },
                tooltip: {
                    enabled: !1
                },
                xaxis: {
                    categories: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb",
                        "Mar"
                    ],
                    axisBorder: {
                        show: !0,
                        color: l
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        style: {
                            colors: i,
                            fontSize: "13px",
                            fontFamily: "Public Sans"
                        }
                    }
                },
                fill: {
                    opacity: [1, .85]
                },
                yaxis: {
                    labels: {
                        offsetX: -15,
                        style: {
                            fontSize: "13px",
                            colors: i,
                            fontFamily: "Public Sans"
                        },
                        min: 0,
                        max: 6e4,
                        tickAmount: 6
                    }
                },
                responsive: [{
                    breakpoint: 1441,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "41%"
                            }
                        }
                    }
                }, {
                    breakpoint: 590,
                    options: {
                        plotOptions: {
                            bar: {
                                columnWidth: "61%",
                                borderRadius: 5
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1
                            }
                        },
                        grid: {
                            padding: {
                                right: 0,
                                left: -20
                            }
                        },
                        dataLabels: {
                            style: {
                                fontSize: "12px",
                                fontWeight: "400"
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    }));
</script>
<script>
    $(function() {
        t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#4de2eb",
                series2: "#ffb6c1",
                series3: "#e8b99b",
                bg: "#ffffff00"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };
        var l = document.querySelector("#column-chart-kips"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "10%",
                        colors: {
                            backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [a.series1, o.series2],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Percentage",
                    data: [20, 40, 50],
                }],
                xaxis: {
                    categories: ["Environment", "Governance",
                        "Social"
                    ]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
        var l = document.querySelector("#column-chart-kips1"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "10%",
                        colors: {
                            // backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                // colors: [a.series1],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Avg Percentage",
                    data: [10, 20, 20]
                }],
                xaxis: {
                    categories: ["Environment", "Governance", "Social"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    })
</script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/brand/assets/assets/js/worldmap.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/maps/leaflet.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/maps/map-leaflet.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max = 10;
        var cnt = 1;
        $(".add-textbox").on("click", function(e) {
            e.preventDefault();
            if (cnt < max) {
                cnt++;
                $(".textbox-wrapper").append(
                    '<div class="input-group mt-1"><input type="text" class="form-control" placeholder="Button on right" aria-describedby="button-addon2"><button type="button" class="btn btn-danger remove-textbox waves-effect"><i class="fa fa-trash"></i></button><div>'
                );
            }
        });
        $(".textbox-wrapper").on("click", ".remove-textbox", function(e) {
            e.preventDefault();
            $(this).parents(".input-group").remove();
            cnt--;
        });
    });
</script>
<script>
    function access(num, id) {
        if (num == 1) toastr.info('Profile Successfully Public');
        else toastr.info('Profile Successfully Privated');
        $.ajax({
            type: "post",
            url: "<?= site_url('Suppliers_Model/accessifier') ?>",
            data: {
                num: num,
                id: id
            },
            success: function(response) {}
        });
    }
</script>
<?= $this->endSection() ?>
<script>
    var input = document.getElementById('company_address');
    var company_address = new google.maps.places.Autocomplete(input);
</script>
<script>
    $('.company_pin').keypress(function() {
        var regExp = /[a-z]/i;
        $('.company_pin').on('keydown keyup', function(e) {
            var value = String.fromCharCode(e.which) || e.key;
            if (regExp.test(value)) {
                e.preventDefault();
                return false;
            }
        });
    });

    function deleteCompany(that) {
        var id = $(that).attr("data-number");
        $("#del_company_id").val(id);
        $("#docDeletePopup").modal('show');
    }
</script>
<script>
    function setAssessment(assessment_id, date_from, date_to) {
        $("#assessment_id").val(assessment_id);
        $("#date_from").val(date_from);
        $("#date_to").val(date_to);
    }

    function compareWorkplace() {
        var workplaces = new Array();
        var workplace_info = $('input[name="workplace_info"]');
        for (var i = 0; i < workplace_info.length; i++) {
            if (workplace_info[i].checked) {
                workplaces.push(workplace_info[i].value);
            }
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>/brand/compareWorkplace",
            data: ({
                workplaces: workplaces
            }),
            success: function(data) {
                rs = JSON.parse(data);
                var color_arr = ["#C39A4A", "#828282", "blue", "brown", "orange"];
                var workplace_name = building = building_rh_bar_value = company_vehicle =
                    company_vehicle_rh_bar_value = flight = flight_rh_bar_value = mobile_fuel =
                    mobile_fuel_rh_bar_value = "";
                if (rs.workplace_name)
                    for (var i = 0; i < rs.workplace_name.length; i++)
                        if (rs.workplace_name[i]) workplace_name += "<span><span style='background:" +
                            color_arr[i] + "'></span>" + rs.workplace_name[i] + "</span>";
                if (rs.building)
                    for (var i = 0; i < rs.building.length; i++) {
                        var building_per = 0;
                        if (rs.total_building_footprint && rs.total_building_footprint != 0.00) building_per =
                            Math.round((rs.building[i] * 100) / rs.total_building_footprint);
                        if (rs.building[i]) {
                            building += '<div class="progress-bar" role="progressbar" style="width: ' +
                                building_per + '%;background:' + color_arr[i] +
                                '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            building_rh_bar_value += '<span>' + rs.building[i] + ' tonne CO2e</span><br>';
                        } else {
                            building +=
                                '<div class="progress-bar" role="progressbar" style="width: 0%;background:' +
                                color_arr[i] +
                                '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            building_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                        }
                    }
                if (rs.company_vehicle) {
                    for (var i = 0; i < rs.company_vehicle.length; i++) {
                        var company_vehicle_per = 0;
                        if (rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint != 0.00) {
                            company_vehicle_per = Math.floor((rs.company_vehicle[i] * 100) / rs
                                .total_company_vehicle_footprint);
                        }
                        if (rs.company_vehicle[i]) {
                            company_vehicle += '<div class="progress-bar" role="progressbar" style="width: ' +
                                company_vehicle_per + '%;background:' + color_arr[i] +
                                '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            company_vehicle_rh_bar_value += '<span>' + rs.company_vehicle[i] +
                                ' tonne CO2e</span><br>';
                        } else {
                            company_vehicle +=
                                '<div class="progress-bar" role="progressbar" style="width: 0%;background:' +
                                color_arr[i] +
                                '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            company_vehicle_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                        }
                    }
                }
                if (rs.flight) {
                    for (var i = 0; i < rs.flight.length; i++) {
                        var flight_per = 0;
                        if (rs.total_flight_footprint && rs.total_flight_footprint != 0.00) {
                            flight_per = Math.floor((rs.flight[i] * 100) / rs.total_flight_footprint);
                        }
                        if (rs.flight[i]) {
                            flight += '<div class="progress-bar" role="progressbar" style="width: ' +
                                flight_per + '%;background:' + color_arr[i] +
                                '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            flight_rh_bar_value += '<span>' + rs.flight[i] + ' tonne CO2e</span><br>';
                        } else {
                            flight +=
                                '<div class="progress-bar" role="progressbar" style="width: 0%;background:' +
                                color_arr[i] +
                                '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            flight_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                        }
                    }
                }
                if (rs.mobile_fuel) {
                    for (var i = 0; i < rs.mobile_fuel.length; i++) {
                        var mobile_fuel_per = 0;
                        if (rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint != 0.00) {
                            mobile_fuel_per = Math.floor((rs.mobile_fuel[i] * 100) / rs
                                .total_mobile_fuel_footprint);
                        }
                        if (rs.mobile_fuel[i]) {
                            mobile_fuel += '<div class="progress-bar" role="progressbar" style="width: ' +
                                mobile_fuel_per + '%;background:' + color_arr[i] +
                                '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            mobile_fuel_rh_bar_value += '<span>' + rs.mobile_fuel[i] + ' tonne CO2e</span><br>';
                        } else {
                            mobile_fuel +=
                                '<div class="progress-bar" role="progressbar" style="width: 0%;background:' +
                                color_arr[i] +
                                '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            mobile_fuel_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                        }
                    }
                }
                $("#show_workplace").html(workplace_name);
                $("#building_progress").html(building);
                $("#building_rh_bar_value").html(building_rh_bar_value);
                $("#flight_progress").html(flight);
                $("#flight_rh_bar_value").html(flight_rh_bar_value);
                $("#company_vehicle_progress").html(company_vehicle);
                $("#company_vehicle_rh_bar_value").html(company_vehicle_rh_bar_value);
                $("#mobile_fuel_progress").html(mobile_fuel);
                $("#mobile_fuel_rh_bar_value").html(mobile_fuel_rh_bar_value);
                $("#docComparePopup").modal('show');
            }
        });
    }
    $(".selector").datepicker({
        duration: "slow"
    }); // Getter
    var duration = $(".selector").datepicker("option", "duration");
    $(".selector").datepicker("option", "duration", "slow");
</script>