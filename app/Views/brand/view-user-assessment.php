<?php
use App\Models\BrandQualitativeAnswerModel;
use App\Models\Supplier_assessment;
use App\Models\SupplierModel;
use App\Models\Control_assessment;

?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css') ?>">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- add Assessment modal -->
<style>
    .multiselect {
        width: auto;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
    }

    .range-bar {
        width: 300px;
        position: relative;
    }

    input[type="range"] {
        width: 160%;
        height: 10px;
    }

    #tooltip {
        position: absolute;
        top: -30px;
        left: 0;
        width: 30px;
        height: 30px;
        background-color: #f1f1f1;
        color: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bs-stepper .bs-stepper-header .step.active .step-trigger.wizard .bs-stepper-label .bs-stepper-title {
        position: relative !important;
        color: #000 !important;
        background: #defe73 !important;
        border-radius: 50px !important;
        padding: 8px 30px 8px 30px !important;
    }

    .bs-stepper .bs-stepper-header .step .step-trigger.wizard .bs-stepper-label .bs-stepper-title {
        color: #6E6B7B;
        font-weight: 450 !important;
        background: #ebebeb;
        padding: 8px 30px 8px 30px;
        border-radius: 50px;
    }

    .nav-tabs .nav-link.gopal-nav.active {
        position: relative;
        color: #000;
        background: #defe73;
        border-radius: 0px;
        padding: 10px 30px 10px 30px;
        font-weight: 900;
        font-size: 14px;
    }

    .nav-tabs .nav-link.gopal-nav {
        font-size: 14px;
    }

    .nav-vertical .nav.nav-tabs .nav-item .nav-link.active:after {
        display: none !important;
    }

    .scrollable {
        height: 280px;
        overflow-y: scroll;
    }

    /* Scrollbar Styling */
    .scrollable::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    .scrollable::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    .scrollable::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #defe73;
    }
</style>

<!-- demo -->
<!-- demo2-->
<div class="modal fade" id="demo2" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl two-factor-auth-sms">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title" id="myModalLabel1">Add Assessment</h4> -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Step 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Step 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false">Step 3</a>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                    <div class="modal-body pb-1 px-sm-2 mx-50">
                        <div class="row mt-1">
                            <div class="col-md-1">
                                <p>Energy</p>
                            </div>
                            <div class="col-md-9">
                                <div class="range-bar">
                                    <input type="range" min="0" max="100" value="50" id="range-slider-energy" oninput="updateTooltipEnergy(this.value)">
                                    <span id="tooltip-energy">50</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control total_number" placeholder="30" readonly="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-1">
                                <p>Water</p>
                            </div>
                            <div class="col-md-9">
                                <div class="range-bar">
                                    <input type="range" min="0" max="100" value="50" id="range-slider-water" oninput="updateTooltipWater(this.value)">
                                    <span id="tooltip-water">50</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control total_number" placeholder="30" readonly="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-1">
                                <p>Waste</p>
                            </div>
                            <div class="col-md-9">
                                <div class="range-bar">
                                    <input type="range" min="0" max="100" value="50" id="range-slider-waste" oninput="updateTooltipWaste(this.value)">
                                    <span id="tooltip-waste">50</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control total_number" placeholder="30" readonly="">
                            </div>
                            <div class="col-md-2 ms-auto mt-3 mb-2">
                                <input type="number" class="form-control total_number" placeholder="30" readonly="">
                            </div>
                        </div>


                        <div class="modal-footer pe-0">
                            <button class="btn btn-primary btn-prev">
                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>

                            <!--   <button class="btn btn-primary float-end">
                     <span class="me-50">Next</span>
                     <i data-feather="chevron-right"></i>
                     </button> -->
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                    <p>
                        Dragée jujubes caramels tootsie roll gummies gummies icing bonbon. Candy jujubes cake cotton candy.
                        Jelly-o lollipop oat cake marshmallow fruitcake candy canes toffee. Jelly oat cake pudding jelly beans
                        brownie lemon drops ice cream halvah muffin. Brownie candy tiramisu macaroon tootsie roll danish.
                    </p>
                    <p>
                        Croissant pie cheesecake sweet roll. Gummi bears cotton candy tart jelly-o caramels apple pie jelly
                        danish marshmallow. Icing caramels lollipop topping. Bear claw powder sesame snaps.
                    </p>
                </div>
                <div class="tab-pane" id="disabled" aria-labelledby="disabled-tab" role="tabpanel">
                    <p>
                        Chocolate croissant cupcake croissant jelly donut. Cheesecake toffee apple pie chocolate bar biscuit
                        tart croissant. Lemon drops danish cookie. Oat cake macaroon icing tart lollipop cookie sweet bear claw.
                    </p>
                </div>
                <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                    <p>
                        Gingerbread cake cheesecake lollipop topping bonbon chocolate sesame snaps. Dessert macaroon bonbon
                        carrot cake biscuit. Lollipop lemon drops cake gingerbread liquorice. Sweet gummies dragée. Donut bear
                        claw pie halvah oat cake cotton candy sweet roll. Cotton candy sweet roll donut ice cream.
                    </p>
                    <p>
                        Halvah bonbon topping halvah ice cream cake candy. Wafer gummi bears chocolate cake topping powder.
                        Sweet marzipan cheesecake jelly-o powder wafer lemon drops lollipop cotton candy.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / demo2-->
<!-- demo three -->
<div class="modal fade" id="demo-three" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
        <div class="modal-content">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="modal-header bg-transparent">
                        <div class="bs-stepper-header p-0">
                            <div class="step me-1" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger wizard">
                                    <span class="bs-stepper-label m-0">
                                        <span class="bs-stepper-title">Step 1</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step me-1" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger wizard">
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Step 2</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step me-1" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
                                <button type="button" class="step-trigger wizard">
                                    <span class="bs-stepper-label">

                                        <span class="bs-stepper-title">Step 3</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-1 px-sm-1 mx-50">
                        <div class="bs-stepper-content shadow-none p-0">
                            <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                                <form class="form" method="post" id="assessment_submit" action="<?php echo base_url() ?>/Controlwork/control_assessment_submit" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Boundary</label>
                                                <select name="boundary" id="boundary" class="form-control select2" required="required" onchange="showBoundary(this);">
                                                    <option value="">Select Boundary </option>
                                                    <?php
                                                    if (!empty($boundary_item))
                                                        foreach ($boundary_item as $dd) {
                                                            if ($dd['id'] == 43) { ?>
                                                            <option value="<?php echo $dd['id']; ?>"><?php echo $dd['item_name']; ?></option>
                                                    <?php }
                                                        } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12" id="subboundary_hide">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Select Sub Boundary</label>
                                                <select class="form-control select2" id="subboundary_id" name="sub_boundary" required="required">
                                                    <option value="0">Select Sub Boundary</option>
                                                    <?php
                                                    if (!empty($indicator)) {
                                                        foreach ($indicator as $indi) {
                                                    ?>
                                                            <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12" id="Supplier_Type" style="display: none;">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Select Supplier Type</label>
                                                <select class="form-control select2" id="supplier_Type" name="supplier_Type" onchange="getQuestionByIndicatorAjax(this);" required="required">
                                                    <option value="0">Select Supplier Type</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Select Assessment</label>
                                                <select class="form-control select2" id="indicator" name="indicator[]" required="required" multiple>
                                                    <option value="0">Select Assessment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12" id="AssignId">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Assigned to</label>
                                                <!-- id_select2_example -->
                                                <select id="" style="width: 200px;" class="form-control select2" name="assigned_to" required='required'>
                                                    <option value="0">Select Assigned to </option>
                                                    <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                                    <?php if (!empty($employee_details)) { ?>

                                                        <?php foreach ($employee_details as $empd) {
                                                            //   
                                                        ?><?php
                                                            if ($empd['id'] == session()->supplier_info['supplier_id']) {
                                                            ?>
                                                    <?php } else { ?>

                                                        <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $empd['id'] ?>">

                                                            <?php echo $empd['supplier_name'] ?>

                                                            <?php
                                                                if ($empd['role'] == 10) {
                                                                    echo "( Admin )";
                                                                } elseif ($empd['role'] == 11) {
                                                                    echo "( Manager )";
                                                                } elseif ($empd['role'] == 0) {
                                                                    echo "( Admin )";
                                                                } elseif ($empd['role'] == 12) {
                                                                    echo "( Employee )";
                                                                } else {
                                                                    echo "( Supplier )";
                                                                }
                                                            ?>
                                                        </option>
                                            <?php
                                                            }
                                                        }
                                                    }
                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Frequency</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="form-check form-check-inline mt-1">
                                                        <input class="form-check-input" type="radio" name="frequency" id="inlineRadio1" value="Yearly" checked />
                                                        <label class="form-check-label" for="inlineRadio1">Yearly</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                        <input class="form-check-input" type="radio" name="frequency" id="inlineRadio2" value="Half yearly" />
                                                        <label class="form-check-label" for="inlineRadio2">Half yearly</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                        <input class="form-check-input" type="radio" name="frequency" id="inlineRadio3" value="Quarterly" />
                                                        <label class="form-check-label" for="inlineRadio3">Quarterly</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mt-1">
                                                        <input class="form-check-input" type="radio" name="frequency" id="inlineRadio4" value="Monthly" />
                                                        <label class="form-check-label" for="inlineRadio4">Monthly</label>
                                                    </div>
                                                    <!-- <div class="form-check form-check-inline mt-1">
                                                        <input class="form-check-input" type="radio" name="frequency" id="inlineRadio4" value="Monthly" />
                                                        <label class="form-check-label" for="inlineRadio4">Weekly</label>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Comment</label><span style="color: red;font-size:20px;">*</span>
                                                <textarea placeholder="" class="form-control" name="comment" id="comment" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Due Date</label>
                                                <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="city-column">Priority</label>
                                                <select class="form-control select2" class="" name="priority" required="required">
                                                    <option value="1">Low</option>
                                                    <option value="2">medium</option>
                                                    <option value="3">High</option>
                                                    <option value="Critical">Critical</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between pb-1">
                                        <!-- <button type="reset" class="btn btn-outline-secondary waves-effect me-2">Reset</button> -->
                                        <button class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="modal-footer pe-0">
                                    <div class="d-flex justify-content-between">
                                        <!-- <button class="btn btn-outline-secondary btn-prev" disabled>
                              <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button> -->

                                    </div>
                                </div>
                            </div>
                            <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                                <div class="modal-body pb-1 p-0 mx-50">
                                    <!-- <form class="form" method="post" action="<?php echo base_url() ?>/Controlwork/control_assessment_submit" enctype="multipart/form-data"> -->
                                    <div class="scrollable">
                                        <div class="nav-vertical">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                        <p id="SideIndicator"></p>
                                                        <!--  <li class="nav-item">
                                          <a class="nav-link active"
                                             id="baseVerticalLeft-tab1"
                                             data-bs-toggle="tab"
                                             aria-controls="tabVerticalLeft1"
                                             href="#tabVerticalLeft1"
                                             role="tab"
                                          aria-selected="true">Energy</a>
                                       </li> -->
                                                        <!-- <li class="nav-item">
                                          <a
                                             class="nav-link"
                                             id="baseVerticalLeft-tab2"
                                             data-bs-toggle="tab"
                                             aria-controls="tabVerticalLeft2"
                                             href="#tabVerticalLeft2"
                                             role="tab"
                                             aria-selected="false"
                                          >Water</a>
                                       </li> -->
                                                        <!--  <li class="nav-item">
                                          <a
                                             class="nav-link"
                                             id="baseVerticalLeft-tab3"
                                             data-bs-toggle="tab"
                                             aria-controls="tabVerticalLeft3"
                                             href="#tabVerticalLeft3"
                                             role="tab"
                                             aria-selected="false">Waste
                                          </a>
                                       </li> -->
                                                    </ul>
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="tab-content">
                                                        <div id="question_assessment"></div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="" id="Control_id" value="">
                                    </form>
                                    <div class="modal-footer pe-0">
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev me-2">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" onclick="step3(this)">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
                                <div class="modal-body pb-1 p-1 mx-50">
                                    <div id="rangediv"></div>


                                </div>
                                <div class="modal-footer pe-0">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev me-2">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next" id="step3Disabled" onclick="step3_complete(this)">
                                            <span class="align-middle d-sm-inline-block d-none">Create</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>
</div>
<!-- /demo-->
<!-- edit Assessment modal -->
<div class="modal fade text-start" id="default-edit" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit Assessment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?php echo base_url() ?>/Controlwork/control_assessment_update" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Boundary</label>
                                <input type="hidden" name='id' value="" id="editassessmentid">
                                <input type="text" class='form-control' id='edit_boundary' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="last-name-column">Select Sub Boundary</label>
                                <input type="text" class='form-control' id='edit_sub_boundary' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Select Assessment</label>
                                <input type="text" class='form-control' id='edit_indicator' readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Assigned to</label>
                                <select class="form-control select2" name="assigned_to" id='edit_assigned_to' required='required'>
                                    <option value="0">Select Assigned to </option>
                                    <?php if (!empty($employee_details)) {
                                        foreach ($employee_details as $empd) {
                                            if ($empd['id'] == session()->supplier_info['supplier_id']) {
                                    ?>
                                                <option value="<?= session()->supplier_info['supplier_id'] ?>">Self</option>
                                            <?php } else { ?>
                                                <option value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <!--<option value="Sales">Self</option>-->
                                    <!--<option value="Govind">Govind</option>-->
                                    <!--<option value="Nisha">Nisha</option>-->
                                    <!--<option value="Vedika">Vedika</option>-->
                                    <!--<option value="Charu">Charu</option>-->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Frequency</label>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline mt-1">
                                        <input class="form-check-input " type="radio" name="frequency" id="edit_assessment_radio" value="" checked />
                                        <label class="form-check-label edit_assessment_radio" for="edit-inlineRadio1"></label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio2" value="Half yearly" />
                           <label class="form-check-label" for="edit-inlineRadio2">Half yearly</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio3" value="Quarterly" />
                           <label class="form-check-label" for="edit-inlineRadio3">Quarterly</label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                           <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio4" value="Monthly" />
                           <label class="form-check-label" for="edit-inlineRadio4">Monthly</label>
                        </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Comment</label>
                                <textarea placeholder="" class="form-control" name="comment" id="edit-comment" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Due Date</label>
                                <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="edit-due_date" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Priority</label>
                                <select class="form-control " id='edit_priority' name="priority">
                                    <option value="1">Low</option>
                                    <option value="2">Mediun </option>
                                    <option value="3">High</option>
                                    <option value="Critical">Critical</option>

                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Delete Assessment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo base_url() ?>/Controlwork/delete_assessment" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="del_assessment_id" name="del_assessment" />
                        <p>Are you sure you want to delete this Assessment ?</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                <!-- <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- end delete modal -->
<!-- end edit Assessment modal -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Assessment</h2>
                        <div class="breadcrumb-wrapper">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $session = session();
        if ($session->get('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                <strong>Success!</strong> <?php echo $session->get('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php
        $session = session();
        if ($session->get('error')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                <strong>Success!</strong> <?php echo $session->get('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="content-body">

            <section id="basic-horizontal-layouts">


                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Assessment</h4>
                            </div>
                            <div class="card-body">
                                <div id="echartBar1" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="card myblock">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75 font_color"><?= $pfSuccess; ?></h3>
                                            <span class="text-white">Success</span>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i class="fa-brands fa-affiliatetheme"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card myblock">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75 font_color"><?= $total_assessment; ?></h3>
                                            <span class="text-white">Total</span>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i class="fa-brands fa-product-hunt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card myblock">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75 font_color"><?= $pfFail; ?></h3>
                                            <span class="text-white">Failed</span>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card myblock">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75 font_color"><?= $total_assessment - ($pfSuccess + $pfFail); ?></h3>
                                            <span class="text-white">Pending</span>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i class="fa-solid fa-users"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Ecommerce Starts -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"></h2>
                            <div class="breadcrumb-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <?php
                            if ($roleAllow) {
                                if ($roleAllow['add'] == 1) { ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#demo-three">
                                        <i class="fa-solid fa-plus"></i> Add Assessment
                                    </button>
                            <?php }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
            <section class="app-user-list">
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body card-datatable table-responsive pt-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item me-3">
                                <a class="nav-link active" id="home-tab1" data-bs-toggle="tab" href="#home1" aria-controls="home1" role="tab" aria-selected="true"> Pending & Ongoing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab1" data-bs-toggle="tab" href="#profile1" aria-controls="profile1" role="tab" aria-selected="false">Completed</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" aria-labelledby="home-tab1" role="tabpanel">
                                <table class="table table-bordered" id="example">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>

                                            <th>Boundary</th>
                                            <th>SubBoundary</th>
                                            <th>Assign from</th>
                                            <th>progress</th>
                                            <!-- <th>Status</th> -->
                                            <th>Assigned</th>
                                            <th>Due Date</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($control_assessment_pending as $key => $row) {
                                            $ab = $row['boundary'] == "43";
                                            $db = \Config\Database::connect();
                                            $BrandQualitativeAnswerModel = new BrandQualitativeAnswerModel();
                                            $resume_assessment = $BrandQualitativeAnswerModel->where('control_assesment_id', $row['id'])->findAll();
                                            $model = new SupplierModel();
                                            $s_model = new Supplier_assessment();
                                            $m_d = $model->select('id,supplier_name')->where('id', $row['assigned_to'])->first();
                                            $sub_name = $s_model->select('cp_name')->where('id', $row['sub_boundary'])->first()['cp_name'];
                                            $control_ass = new Control_assessment();
                                            $sumper = 0;

                                            $supp_spl = $row['supplier_uniq'];
                                            $spd = $control_ass->where('status', 1)->where('supplier_uniq', $row['supplier_uniq'])->groupBy('addsupplier_id')->findAll();
                                            $tot_sup = count($spd);

                                            $freq = $row['frequency'];
                                            //  print_r($freq);
                                            if ($freq == 'Monthly') {
                                                $queCount = 12;
                                            } else if ($freq == 'Quarterly') {
                                                $queCount = 4;
                                            } else if ($freq == 'Half yearly') {
                                                $queCount = 2;
                                            } else if ($freq == 'Yearly') {
                                                $queCount = 1;
                                            }
                                            $per = $control_ass->where('status', 1)->where('supplier_uniq', $row['supplier_uniq'])->findAll();
                                            foreach ($per as $l) {
                                                $sumper += $l['per_overall'];
                                            }


                                            $totacount = $sumper / ($tot_sup * $queCount * 100) * 100;




                                        ?>
                                            <tr>
                                                <td><?php
                                                    echo ++$key;
                                                    if ($ab)
                                                        echo '<span class="badge rounded-pill badge-light-primary">Multiple</span>';
                                                    else
                                                        echo $row['uniq_spl']; ?>
                                                </td>

                                                <td><?php
                                                    if (!empty($boundary_item)) {
                                                        foreach ($boundary_item as $dd) {
                                                            echo $dd['id'] == $row['boundary'] ? $dd['item_name'] : '';
                                                        }
                                                    } ?></td>
                                                <td><?php
                                                    if ($row['boundary'] != '43') {
                                                        if (!empty($sub_boundary_item)) {
                                                            foreach ($sub_boundary_item as $dsd) {

                                                                echo $dsd['id'] == $row['sub_boundary'] ? $dsd['cp_name'] : '';
                                                            }
                                                        }
                                                    } else {
                                                        if (!empty($type)) {
                                                            foreach ($type as $dsda) {

                                                                echo $dsda['id'] == $row['sub_boundary'] ? $dsda['type_name'] : '';
                                                            }
                                                        }
                                                    } ?></td>
                                                <td>
                                                    <div class="media">
                                                        <?php
                                                        if (!empty($supplier)) {
                                                            foreach ($supplier as $dsd) {
                                                                if ($dsd['id'] == $row['supplier_id']) {
                                                        ?>
                                                                    <div class="media-aside align-self-center">
                                                                        <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                                            <span class="b-avatar-img">
                                                                                <?php if ($dsd['image']) { ?>
                                                                                    <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image'];  ?>" alt="avatar">
                                                                                <?php } else { ?>
                                                                                    <img src="<?= base_url("/") ?>/public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar">
                                                                                <?php } ?></span><!---->

                                                                        </a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                                            <?= $dsd['id'] == $row['supplier_id'] ? $dsd['supplier_name'] : ''; ?>
                                                                        </a>
                                                                        <small class="text-muted"><?php
                                                                                                    if ($dsd['role'] == 10) {
                                                                                                        echo "Admin";
                                                                                                    } elseif ($dsd['role'] == 11) {
                                                                                                        echo "Manager";
                                                                                                    } elseif ($dsd['role'] == 0) {
                                                                                                        echo "Admin";
                                                                                                    } elseif ($dsd['role'] == 12) {
                                                                                                        echo "Employee";
                                                                                                    }

                                                                                                    ?></small>
                                                                    </div>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!-- <?php
                                                            $start = $row['complete'];
                                                            $date1 = $row['start_date'];
                                                            $date2 = date("Y-m-d");
                                                            if (($start % 2 == 0 && $date1 <= $date2) || $row['copy'] == 1) {
                                                            ?>
                                                        <?= $row['start_date']; ?> to <?= $row['due_date'] ?>
                                                    <?php } else { ?>
                                                        <span class="badge badge-light-primary">Complete</span>
                                                    <?php } ?> -->



                                                    <div class="progress" role="progressbar" data-toggle="tooltip" title="<?= number_format($totacount, 2) ?>%" aria-valuenow="25" aria-valuemin="100" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: <?= number_format($totacount, 2) ?>%"></div>
                                                    </div>
                                                    <p><?= number_format($totacount, 2) ?>%</p>

                                                </td>

                                                <!-- <td>
                                                    <?php
                                                    $start = $row['complete'];
                                                    $date1 = $row['start_date'];
                                                    $date2 = date("Y-m-d");
                                                    if (($start % 2 == 0 && $date1 <= $date2) || $row['copy'] == 1) {
                                                    ?>
                                                        <span class="badge badge-light-danger">Pending</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-light-success">Success</span>
                                                    <?php } ?>
                                                </td> -->
                                                <td>
                                                    <span class="badge rounded-pill badge-light-primary">Multiple</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php if ($row['frequency'] == 'Yearly') {
                                                            if ($row['complete'] != 12) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                            <?php } else { ?>
                                                                <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                            <?php } ?>
                                                        <?php } elseif ($row['frequency'] == 'Quarterly') { ?>
                                                            <?php $com = $row['complete'];
                                                            if (!($com > 0)) {  ?><span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                            <?php }
                                                            if (!($com > 4)) {  ?><span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                            <?php }
                                                            if (!($com > 8)) {  ?><span class='bg-warning' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                            <?php }
                                                            if ($com != 12) { ?> <span class='bg-warning' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                            <?php }
                                                        } elseif ($row['frequency'] == 'Monthly') { ?>
                                                            <?php $com = $row['complete'];
                                                            if ($com < 1) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                            <?php }
                                                            if ($com < 2) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                            <?php }
                                                            if ($com < 3) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                            <?php }
                                                            if ($com < 4) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                            <?php }
                                                            if ($com < 5) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;5&nbsp;</span>
                                                            <?php }
                                                            if ($com < 6) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;6&nbsp;</span>
                                                            <?php }
                                                            if ($com < 7) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;7&nbsp;</span>
                                                            <?php }
                                                            if ($com < 8) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;8&nbsp;</span>
                                                            <?php }
                                                            if ($com < 9) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;9&nbsp;</span>
                                                            <?php }
                                                            if ($com < 10) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;10&nbsp;</span>
                                                            <?php }
                                                            if ($com < 11) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;11&nbsp;</span>
                                                            <?php }
                                                            if ($com < 12) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;12&nbsp;</span>
                                                            <?php }  ?>
                                                        <?php } elseif ($row['frequency'] == 'Half yearly') { ?>
                                                            <?php $com = $row['complete'];
                                                            if ($com < 1) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                            <?php }
                                                            if ($com < 7) { ?>
                                                                <span class='bg-warning' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <?php
                                                    $start = $row['complete'];
                                                    // echo $start;die;

                                                    $date1 = $row['start_date'];
                                                    $date2 = date("Y-m-d");
                                                    if (($start % 2 == 0 && $date1 <= $date2) || $row['copy'] == 1) {
                                                    ?>
                                                        <?= $row['due_date'] ?>
                                                    <?php } else { ?>
                                                        <span class="badge badge-light-primary">This session is complete</span>
                                                        <div>next start date
                                                            <?php
                                                            if ($row['frequency'] == 'Yearly') {
                                                                echo date('Y-m-d', strtotime($row['start_date'] . ' + 12 months'));
                                                            } elseif ($row['frequency'] == 'Half yearly') {
                                                                echo date('Y-m-d', strtotime($row['start_date'] . ' + 6 months'));
                                                            } elseif ($row['frequency'] == 'Monthly') {
                                                                echo date('Y-m-d', strtotime($row['start_date'] . ' + 1 months'));
                                                            } elseif ($row['frequency'] == 'Quarterly') {
                                                                echo date('Y-m-d', strtotime($row['start_date'] . ' + 4 months'));
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php
                                                    } ?>
                                                </td>
                                                <td><?= $row['start_date']; ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <?php
                                                            // if (!$resume_assessment) {
                                                            //  $start = $row['complete'];
                                                            //   $date1 = $row['start_date'];
                                                            //   $date2 = date("Y-m-d");
                                                            //   if ($start != 12) {
                                                            ?>
                                                            <?php
                                                            // }
                                                            //}
                                                            ?>
                                                            <?php if ($ab) { ?>
                                                                <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_view') ?>/<?= $row['id']; ?>">
                                                                    <i class="fa solid fa-eye me-50"></i>
                                                                    <span>View</span>
                                                                </a>
                                                                <a class="dropdown-item" onclick="delete_assessment(<?= $row['id']; ?>)">
                                                                    <i class="fa solid fa-trash me-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            <?php } else { ?>
                                                                <?php if ($resume_assessment) { ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>/<?= $row['id']; ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Resume</span>
                                                                    </a>
                                                                <?php
                                                                } else { ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>/<?= $row['id']; ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Start</span>
                                                                    </a>

                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Update</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="#" onclick="assessment_delete(<?= $row['id']; ?>)">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                            <?php }
                                                            } ?>

                                                            <?php if ($roleAllow) {
                                                                if ($roleAllow['edit'] == 1) { ?>
                                                                    <a class="dropdown-item edit-model-button" href="#" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-indicator="<?= $row['indicator'] ?>" data-comment="<?= $row['comment'] ?>" data-frequency="<?= $row['frequency'] ?>" data-assigned_to="<?= $row['assigned_to'] ?>" data-sub_boundary="<?= $row['sub_boundary'] ?>" data-due_date="<?= $row['due_date'] ?>" data-priority="<?= $row['priority'] ?>" data-boundary="<?= $row['boundary'] ?>">
                                                                        <i data-feather="edit-2" class="me-50"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                <?php }
                                                            }
                                                            if ($roleAllow) {
                                                                if ($roleAllow['delete'] == 1) { ?>
                                                                    <a class="dropdown-item" href="<?= base_url('Controlwork/deleteAssessment') . "/" . $row['id']; ?>" onclick="return confirm('Are you show delete this?');">
                                                                        <i data-feather="trash" class="me-50"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                            <?php }
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!--  <td></td>
                                       <td>Name</td>
                                       <td>Building</td>
                                       <td>Head office</td>
                                       <td>ok</td>
                                       <td>01-02-2022 to 30-04-2022</td>
                                       <td><span class="badge badge-light-success">Success</span></td>
                                       <td>minal</td>
                                       <td>22-03-2022</td> -->
                                        <!-- <td> -->
                                        <!-- <div class="dropdown"> -->
                                        <!-- <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                       <i data-feather="more-vertical"></i>
                                       </button> -->
                                        <!-- <div class="dropdown-menu dropdown-menu-end"> -->
                                        <!--<a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>">-->
                                        <!--  <i class="fa solid fa-play me-50"></i>-->
                                        <!--  <span>Start</span>-->
                                        <!--</a>-->
                                        <!-- // <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_report') ?>"> -->
                                        <!--  <i class="fa solid fa-eye me-50"></i>
                                       <span>View Result</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                       <i data-feather="edit-2" class="me-50"></i>
                                       <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                       <i data-feather="trash" class="me-50"></i>
                                       <span>Delete</span>
                                    </a>
                                 </div>
                                    </div>
                                 </td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="profile1" aria-labelledby="profile-tab1" role="tabpanel">
                                <table class="table table-bordered" id="example">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>

                                            <th>Boundary</th>
                                            <th>SubBoundary</th>
                                            <th>Assign from</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Assigned</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($final_data) {
                                            foreach ($final_data as $key => $row) {



                                        ?>
                                                <tr>
                                                    <td><?= ++$key;
                                                        if ($row['boundary'] == '43') {
                                                            echo ' <span class="badge rounded-pill badge-light-primary">multiple</span>';
                                                        } else { ?>

                                                            <span class="badge rounded-pill badge-light-primary"><?php echo $row['uniq_spl'] ?></span>
                                                        <?php
                                                        } ?>
                                                    </td>

                                                    <td><?php
                                                        if (!empty($boundary_item)) {
                                                            foreach ($boundary_item as $dd) {
                                                                echo $dd['id'] == $row['boundary'] ? $dd['item_name'] : '';
                                                            }
                                                        } ?></td>
                                                    <td><?php
                                                        if ($row['boundary'] != '43') {
                                                            if (!empty($sub_boundary_item)) {
                                                                foreach ($sub_boundary_item as $dsd) {

                                                                    echo $dsd['id'] == $row['sub_boundary'] ? $dsd['cp_name'] : '';
                                                                }
                                                            }
                                                        } else {
                                                            if (!empty($type)) {
                                                                foreach ($type as $dsda) {

                                                                    echo $dsda['id'] == $row['sub_boundary'] ? $dsda['type_name'] : '';
                                                                }
                                                            }
                                                        } ?></td>
                                                    <td>
                                                        <div class="media">
                                                            <?php
                                                            if (!empty($supplier)) {
                                                                foreach ($supplier as $dsd) {
                                                                    if ($dsd['id'] == $row['supplier_id']) {
                                                            ?>
                                                                        <div class="media-aside align-self-center">
                                                                            <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                                                <span class="b-avatar-img">
                                                                                    <?php if ($dsd['image']) { ?>
                                                                                        <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image'];  ?>" alt="avatar">
                                                                                    <?php } else { ?>
                                                                                        <img src="<?= base_url("/") ?>/public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar">
                                                                                    <?php } ?></span><!---->
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                                                <?= $dsd['id'] == $row['supplier_id'] ? $dsd['supplier_name'] : ''; ?>
                                                                            </a>
                                                                            <small class="text-muted">
                                                                                <?php
                                                                                if ($dsd['role'] == 10) {
                                                                                    echo "Admin";
                                                                                } elseif ($dsd['role'] == 11) {
                                                                                    echo "Manager";
                                                                                } elseif ($dsd['role'] == 0) {
                                                                                    echo "Admin";
                                                                                } elseif ($dsd['role'] == 12) {
                                                                                    echo "Employee";
                                                                                } else {
                                                                                    echo "Supplier";
                                                                                }
                                                                                ?></small>
                                                                        </div>
                                                            <?php }
                                                                }
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <?= $row['start_date']; ?> to <?= $row['due_date'] ?>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-primary">Complete</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <span class="badge badge-light-danger">Pending</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-success">Success</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php
                                                        if ($row['boundary'] == '43') {
                                                            echo '<span class="badge rounded-pill badge-light-primary">multiple</span>';
                                                        } else { ?>
                                                            <div class="media">
                                                                <?php
                                                                if (!empty($supplier)) {
                                                                    foreach ($supplier as $dsd) {
                                                                        if ($dsd['id'] == $row['assigned_to']) { ?>
                                                                            <div class="media-aside align-self-center">
                                                                                <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                                                    <span class="b-avatar-img">
                                                                                        <?php if ($dsd['image']) { ?>
                                                                                            <img src="<?= base_url("/") ?>/public/profilimg/<?= $dsd['image'];  ?>" alt="avatar">
                                                                                        <?php } else { ?>
                                                                                            <img src="<?= base_url("/") ?>/public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar">
                                                                                        <?php } ?>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                                                                                    <?= $dsd['id'] == $row['assigned_to'] ? $dsd['supplier_name'] : ''; ?>
                                                                                </a>
                                                                                <small class="text-muted">
                                                                                    <?php
                                                                                    if ($dsd['role'] == 10) {
                                                                                        echo "Admin";
                                                                                    } elseif ($dsd['role'] == 11) {
                                                                                        echo "Manager";
                                                                                    } elseif ($dsd['role'] == 12) {
                                                                                        echo "Employee";
                                                                                    } else {
                                                                                        echo "Supplier";
                                                                                    }
                                                                                    ?></small>
                                                                            </div>
                                                                <?php }
                                                                    }
                                                                } ?>
                                                            </div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <?php if ($row['frequency'] == 'Yearly') {
                                                                if ($row['complete'] == 12) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } elseif ($row['frequency'] == 'Quarterly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 3) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 6) {
                                                                    $com = 2; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } elseif ($com == 9) {
                                                                    $com = 3; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                                <?php } elseif ($com == 12) {
                                                                    $com = 4; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                                <?php }
                                                            } elseif ($row['frequency'] == 'Monthly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 1) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 2) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } elseif ($com == 3) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;3&nbsp;</span>
                                                                <?php } elseif ($com == 4) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;4&nbsp;</span>
                                                                <?php } elseif ($com == 5) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;5&nbsp;</span>
                                                                <?php } elseif ($com == 6) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;6&nbsp;</span>
                                                                <?php } elseif ($com == 7) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;7&nbsp;</span>
                                                                <?php } elseif ($com == 8) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;8&nbsp;</span>
                                                                <?php } elseif ($com == 9) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;9&nbsp;</span>
                                                                <?php } elseif ($com == 10) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;10&nbsp;</span>
                                                                <?php } elseif ($com == 11) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;11&nbsp;</span>
                                                                <?php } elseif ($com == 12) { ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;12&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } elseif ($row['frequency'] == 'Half yearly') { ?>
                                                                <?php $com = $row['complete'];
                                                                if ($com == 6) {
                                                                    $com = 1; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;1&nbsp;</span>
                                                                <?php } elseif ($com == 12) {
                                                                    $com = 2; ?>
                                                                    <span class='bg-success' style='border-radius:100%;'>&nbsp;2&nbsp;</span>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                        <?php
                                                        $start = $row['complete'];
                                                        $date1 = $row['start_date'];
                                                        $date2 = date("Y-m-d");
                                                        if ($start == 0) {
                                                        ?>
                                                            <?= $row['due_date'] ?>
                                                        <?php } else { ?>
                                                            <span class="badge badge-light-primary">This session is complete</span>
                                                            <div><?= $row['completed_at']; ?>
                                                                <!-- <?php
                                                                        if ($row['frequency'] == 'Yearly') {
                                                                            echo date('Y-m-d', strtotime($row['start_date'] . ' + 12 months'));
                                                                        } elseif ($row['frequency'] == 'Half yearly') {
                                                                            echo date('Y-m-d', strtotime($row['start_date'] . ' + 6 months'));
                                                                        } elseif ($row['frequency'] == 'Monthly') {
                                                                            echo date('Y-m-d', strtotime($row['start_date'] . ' + 1 months'));
                                                                        } elseif ($row['frequency'] == 'Quarterly') {
                                                                            echo date('Y-m-d', strtotime($row['start_date'] . ' + 4 months'));
                                                                        }
                                                                        ?> -->
                                                            </div>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php
                                                                $start = $row['complete'];
                                                                $date1 = $row['start_date'];
                                                                $date2 = date("Y-m-d");
                                                                if ($start == 0) {
                                                                ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>/<?= $row['indicator']; ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-play me-50"></i>
                                                                        <span>Start</span>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_view') ?>/<?= $row['id']; ?>">
                                                                        <i class="fa solid fa-eye me-50"></i>
                                                                        <span>View Result</span>
                                                                    </a>
                                                                    <?php

                                                                }
                                                                if ($roleAllow) {
                                                                    if ($roleAllow['edit'] == 1) { ?>
                                                                        <a class="dropdown-item edit-model-button" href="#" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-indicator="<?= $row['indicator'] ?>" data-comment="<?= $row['comment'] ?>" data-frequency="<?= $row['frequency'] ?>" data-assigned_to="<?= $row['assigned_to'] ?>" data-sub_boundary="<?= $row['sub_boundary'] ?>" data-due_date="<?= $row['due_date'] ?>" data-priority="<?= $row['priority'] ?>" data-boundary="<?= $row['boundary'] ?>">
                                                                            <i data-feather="edit-2" class="me-50"></i>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                    <?php }
                                                                }
                                                                if ($roleAllow) {
                                                                    if ($roleAllow['delete'] == 1) { ?>
                                                                        <a class="dropdown-item" href="<?= base_url('Controlwork/deleteAssessment') . "/" . $row['id']; ?>" onclick="return confirm('Are you show delete this?');">
                                                                            <i data-feather="trash" class="me-50"></i>
                                                                            <span>Delete</span>
                                                                        </a>
                                                                <?php }
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                        <!--  <td></td>
                                             <td>Name</td>
                                             <td>Building</td>
                                             <td>Head office</td>
                                             <td>ok</td>
                                             <td>01-02-2022 to 30-04-2022</td>
                                             <td><span class="badge badge-light-success">Success</span></td>
                                             <td>minal</td>
                                             <td>22-03-2022</td> -->
                                        <!-- <td> -->
                                        <!-- <div class="dropdown"> -->
                                        <!-- <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                             <i data-feather="more-vertical"></i>
                                             </button> -->
                                        <!-- <div class="dropdown-menu dropdown-menu-end"> -->
                                        <!--<a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>">-->
                                        <!--  <i class="fa solid fa-play me-50"></i>-->
                                        <!--  <span>Start</span>-->
                                        <!--</a>-->
                                        <!-- // <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_report') ?>"> -->
                                        <!--  <i class="fa solid fa-eye me-50"></i>
                                             <span>View Result</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <i data-feather="edit-2" class="me-50"></i>
                                             <span>Edit</span>
                                          </a>
                                          <a class="dropdown-item" href="#">
                                             <i data-feather="trash" class="me-50"></i>
                                             <span>Delete</span>
                                          </a>
                                       </div>
                                    </div>
                                    </td>  </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter end -->
            </section>
            <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js') ?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/nouislider.min.js') ?>"></script>
<script>
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("due_date").setAttribute("min", today);
</script>
<script>
    function updateTooltipEnergy(value) {
        var tooltip = document.getElementById("tooltip-energy");
        tooltip.innerText = value;
        // Position the tooltip based on the value
        var rangeSlider = document.getElementById("range-slider-energy");
        var min = rangeSlider.min || 0;
        var max = rangeSlider.max || 100;
        var percent = ((value - min) / (max - min)) * 100;
        var tooltipWidth = tooltip.offsetWidth;
        var rangeBarWidth = rangeSlider.offsetWidth;
        var tooltipOffset = (percent / 100) * (rangeBarWidth - tooltipWidth);
        tooltip.style.left = tooltipOffset + "px";
    }
    // Initialize the tooltip
    updateTooltipEnergy(50);
</script>
<script>
    function updateTooltipWater(value) {
        var tooltip = document.getElementById("tooltip-water");
        tooltip.innerText = value;
        // Position the tooltip based on the value
        var rangeSlider = document.getElementById("range-slider-water");
        var min = rangeSlider.min || 0;
        var max = rangeSlider.max || 100;
        var percent = ((value - min) / (max - min)) * 100;
        var tooltipWidth = tooltip.offsetWidth;
        var rangeBarWidth = rangeSlider.offsetWidth;
        var tooltipOffset = (percent / 100) * (rangeBarWidth - tooltipWidth);
        tooltip.style.left = tooltipOffset + "px";
    }
    // Initialize the tooltip
    updateTooltipWater(50);
</script>
<script>
    function updateTooltipWaste(value) {
        var tooltip = document.getElementById("tooltip-waste");
        tooltip.innerText = value;
        // Position the tooltip based on the value
        var rangeSlider = document.getElementById("range-slider-waste");
        var min = rangeSlider.min || 0;
        var max = rangeSlider.max || 100;
        var percent = ((value - min) / (max - min)) * 100;
        var tooltipWidth = tooltip.offsetWidth;
        var rangeBarWidth = rangeSlider.offsetWidth;
        var tooltipOffset = (percent / 100) * (rangeBarWidth - tooltipWidth);
        tooltip.style.left = tooltipOffset + "px";
    }
    // Initialize the tooltip
    updateTooltipWaste(50);
</script>
<script>
    $((function() {
        var t = new bootstrap.Modal(document.getElementById("demo")),
            o = new bootstrap.Modal(document.getElementById("demo1")),
            n = new bootstrap.Modal(document.getElementById("demo2"));
        document.getElementById("nextdemo").onclick = function() {
            t.hide();
            o.show();
        };
        document.getElementById("nextdemo1").onclick = function() {
            o.hide();
            n.show();
        };
    }));
</script>
<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

<!-- <script type="text/javascript">
function step3_complete(that)
{


var id = $("#Control_id").val();
// alert(id);
$.ajax({
url : "<?php echo base_url() ?>/Controlwork/Step3_complate/"+id,
method: "POST",
success: function(res)
{
$("#demo-three").modal('hide');
toastr.success("👋 Assessment successfully saved", "Success", {
                               closeButton: !0,
                               tapToDismiss: !1,
                                progressBar: !0,
                                })


}
});
}
</script> -->
<script type="text/javascript">
    function step3_complete(that) {

        let failedValue = $("#failedtb").val();
        let weightagelength = $(".textInputcvxbvg").length;
        let weightageValuePer = new Object();
        let weightageVal = null;
        let weightageId = null;
        for (let i = 0; i < weightagelength; i++) {
            weightageId = $(".textInputcvxbvg").eq(i).data('id');
            weightageVal = $(".textInputcvxbvg").eq(i).val().replace(' %', '');
            weightageValuePer[weightageId] = weightageVal;
        }

        var id = $("#Control_id").val();
        // alert(id);
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/Step3_complate/" + id,
            method: "POST",
            data: {
                weightagePer: weightageValuePer,
                failedVal: failedValue
            },
            success: function(res) {

                $("#demo-three").modal('hide');
                location.reload();

                toastr.success("👋 Assessment successfully saved", "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })


            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#assessment_submit').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Controlwork/control_assessment_submit'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    if (res.error) {
                        toastr.warning("👋 Please Complete  your profile", "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                    var id = res.success;
                    var d = res.d;
                    var control_id = res.control_id;
                    $("#SideIndicator").html(id);
                    $("#question_assessment").html(d);
                    $("#Control_id").val(control_id);
                    let g = $('.gopal-nav'),
                        len = g.length;
                    for (let i = 0; i < len; i++) {
                        let a = g.eq(i);
                        $.ajax({
                            type: "post",
                            url: "<?= site_url('Controlwork/ug') ?>/" + a.data("indi") + "/" + a.data("id"),
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
                    // let g = $('.gopal-nav');
                    // let len = g.length;
                    // for (let i = len; i >= 0; i--) {
                    //     g.eq(i).click();
                    // }

                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#deleteassessment').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Controlwork/deleteAssessment'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                // dataType: "json",
                success: function(res) {
                    if (res.error) {
                        toastr.success("👋 Please Complete  your profile", "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }




                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- END: Page Vendor JS-->
<!-- barchart script-->
<script>
    function delete_assessment(id) {
        $("#del_assessment_id").val(id);
        $("#docDeletePopup").modal('show');

    }
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var echartElemBar = document.getElementById("echartBar1");
        if (echartElemBar) {
            var echartBar = echarts.init(echartElemBar);
            echartBar.setOption({
                legend: {
                    borderRadius: 0,
                    orient: "horizontal",
                    x: "right",
                    data: ["KgCo2e"],
                },
                grid: {
                    left: "8px",
                    right: "8px",
                    bottom: "0",
                    containLabel: true,
                },
                tooltip: {
                    show: true,
                    backgroundColor: "rgba(0, 0, 0, .8)",
                },
                xAxis: [{
                    type: "category",
                    data: [
                        "Success",
                        "Pending",
                        "Failed",
                        "Total",
                    ],
                    axisTick: {
                        alignWithLabel: true,
                    },
                    splitLine: {
                        show: false,
                    },
                    axisLine: {
                        show: true,
                    },
                }, ],
                yAxis: [{
                    type: "value",
                    axisLabel: {
                        formatter: "{value}",
                    },
                    min: 0,
                    max: 100,
                    interval: 25,
                    axisLine: {
                        show: false,
                    },
                    splitLine: {
                        show: true,
                        interval: "auto",
                    },
                }, ],
                series: [{

                    data: [
                        <?= $pfSuccess; ?>,
                        <?= $total_assessment - ($pfSuccess + $pfFail); ?>,
                        <?= $pfFail ?>,
                        <?= $total_assessment; ?>,
                    ],
                    label: {
                        show: false,
                        color: "#639",
                    },
                    type: "bar",
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
                }, ],
            });
            $(window).on("resize", function() {
                setTimeout(function() {
                    echartBar.resize();
                }, 500);
            });
        } // Chart in Dashboard version 1
    });
</script>
<script type="text/javascript">
    function custom_template(obj) {
        var data = $(obj.element).data();
        var text = $(obj.element).text();
        if (data && data['img_src']) {
            img_src = data['img_src'];
            // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
            template = $("<div class='media'> <div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'><img src='https://user.positiivplus.io/public/uploads/owner/john.jpg' alt='avatar'></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>" + text + "</a></div> ");
            return template;
        }
    }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({
        'height': '40px'
    });
</script>
<!-- end barchart script -->
<!-- Show Bounday script-->
<script>
    function showBoundary(that) {
        var boundary_id = $(that).val();
        if (boundary_id == 43) {
            $("#subboundary_hide").hide();
            $("#Supplier_Type").show();
            $("#AssignId").hide();
        } else {
            $("#subboundary_hide").show();
            $("#Supplier_Type").hide();
            $("#AssignId").show();
        }
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_id").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/getIndicatorByboundary/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                var supplier = data.supplier;
                var site = data.site;
                if (supplier) {
                    $("#supplier_Type").html(supplier);
                }
                $("#indicator").html(site);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<!-- end Show Bounday script -->
<script>
    var input = document.getElementById('company_address');
    var company_address = new google.maps.places.Autocomplete(input);
</script>
<script>
    $('.company_pin').keypress(function() {
        var regExp = /[a-z]/i;
        $('.company_pin').on('keydown keyup', function(e) {
            var value = String.fromCharCode(e.which) || e.key;
            // No letters
            if (regExp.test(value)) {
                e.preventDefault();
                return false;
            }
        });
    });

    function editemployee(that) {
        var emp_table_id = $(that).attr("data-emp_table_id");
        var empid = $(that).attr("data-empid");
        var name = $(that).attr("data-name");
        var phone_no = $(that).attr("data-phone_no");
        var email = $(that).attr("data-email");
        $("#emp_table_id").val(emp_table_id);
        $("#employee_emp_id").val(empid);
        $("#employee_name").val(name);
        $("#employee_phone_no").val(phone_no);
        $("#employee_email").val(email);
        $('#docEditePopup').modal('show');
    }

    function deleteemployee_id(that) {
        var id = $(that).attr("data-number");
        // alert(id);
        $("#del_employee_id").val(id);
        $("#docDeletePopup").modal('show');
    }

    function indicatorQuestion(that) {

        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/AssessmentQuestion/",
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#question_assessment").html(data);
            }
        });
    }
    // function Question_check(that)
    // {
    // var indicator_id = $(that).attr("data-indicator");
    // var question = $(that).attr("data-question");
    // var answer = $(that).attr("data-answer");
    // var control_id = $(that).attr("data-control");
    // $.ajax({
    // url : "<?php echo base_url() ?>/Controlwork/AssessmentQuestionCheck/"+indicator_id+"/"+question+"/"+answer+"/"+control_id,
    // type: "POST",
    // //dataType: "JSON",
    // success: function(data){
    // }
    // });
    // }
    function step3(that) {
        var id = $("#Control_id").val();
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/weaitage_indicator/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#rangediv").html(data);
            }
        });
    }
</script>
<script type="text/javascript">
    let arr = [];

    function indicatorQuestion(that) {
        let targets = $('.gopal-nav');
        for (let i = 0; i < targets.length; i++) {
            targets.eq(i).removeClass("active");
            targets.eq(i).attr("aria-selected", "false");
        }
        $(that).addClass("active");
        $(that).attr("aria-selected", "true");
        var id = $(that).attr("data-id");
        var idi = $(that).attr("data-indi");
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/AssessmentQuestion/" + idi + "/" + id,
            type: "get",
            //dataType: "JSON",
            success: function(data) {
                $("#question_assessment").html(data);
                let targets = $('.gopal-navv');
                for (let i = 0; i < targets.length; i++) {
                    for (j in arr) {
                        if (arr[j] == targets.eq(i).attr('id')) {
                            targets.eq(i).prop('checked', true);
                        }
                    }
                }
            }
        });
    }

    function Question_check(that) {
        let id = $(that).attr('id');
        // console.log(arr);
        if ($.inArray(id, arr) != -1)
            for (let i = 0; i < arr.length; i++) {
                if (arr[i] == id)
                    arr.pop(i);
            } else
                arr[arr.length] = id;
        var indicator_id = $(that).attr("data-indicator"),
            question = $(that).attr("data-question"),
            answer = $(that).attr("data-answer"),
            control_id = $(that).attr("data-control");
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/AssessmentQuestionCheck/" + indicator_id + "/" + question + "/" + answer + "/" + control_id,
            type: "POST",
            success: function(data) {}
        });
    }
</script>
<script>
    function lim(that) {
        // alert(that);
        let targets = $(".gopal"),
            value = 0,
            target
        for (let i = 0; i < targets.length; i++) {
            value += parseInt(targets.eq(i).val());
        }
        for (let i = 0; i < targets.length; i++) {
            target = targets.eq(i);
            // alert(target);
            target.parent().parent().find(".textInput").text(target.val() + '' + (100 - value));
            if (target.val() != 0) {
                target.attr("max", (parseInt(target.val()) + (100 - value)))
            } else {
                target.attr("max", (100 - value));
            }
        }
    }
</script>
<script type="text/javascript">
    function assessment_delete(that) {
        $('#del_assessment_id').val(that);
        $('#docDeletePopup').modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        $('.edit-model-button').on('click', function() {
            id = $(this).attr("data-id");
            boundary = $(this).attr("data-boundary");
            sub_boundary = $(this).attr("data-sub_boundary");
            indicator = $(this).attr("data-indicator");
            assigned_to = $(this).attr("data-assigned_to");
            frequency = $(this).attr("data-frequency");
            comment = $(this).attr("data-comment");
            due_date = $(this).attr("data-due_date");
            priority = $(this).attr("data-priority");
            // alert(boundary + "/" + sub_boundary + "/" + indicator);
            $.ajax({
                url: "<?= base_url('Controlwork/findDetails') ?>" + "/" + boundary + "/" + sub_boundary + "/" + indicator,
                method: "GET",
                success: function(ok) {
                    // alert('ok');
                    $('#edit_boundary').val(ok.boundary);
                    $('#edit_sub_boundary').val(ok.sub_boundary);
                    $('#edit_indicator').val(ok.indicator);
                }
            });
            $("#edit_priority").val(priority);
            $("#edit-comment").html(comment);
            $("#edit-due_date").val(due_date);
            $('#editassessmentid').val(id);
            $('#edit_assigned_to').val(assigned_to);
            $('.edit_assessment_radio').html(frequency);
            $('#edit_assessment_radio').val(frequency);
            $('#default-edit').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>
