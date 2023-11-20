<?php
use App\Models\UserNotification;
use App\Models\SupplierModel;
?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css');?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css');?>">
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-validation.css');?>">
            <link rel="stylesheet" type="text/css"
                href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css');?>">
                <link rel="stylesheet" href="<?php echo base_url('public/brand/assets/assets/css/al-range-slider.css')?>" />
                <style>
                .js-al-range-slider__input {
                display:none;
                }
                
                .al-range-slider__grid-tick {
                background:#f8f8f8!important;
                }
                .al-range-slider__grid-mark{
                display:none;
                }
                .al-range-slider__bar{ background: linear-gradient(90deg,#defe73,#90b70d);
                border-radius: 1em;
                box-shadow: inset 0 0 .2em var(--color_secondary),0 0 .2em #161d31;
                height: 100%;
                left: 0;
                position: absolute;
                top: 0;
                width: 0;
                z-index: 1;}
                .al-range-slider__knob:hover, .al-range-slider__knob_active{
                
                
                border-color: #161d31;
                box-shadow: inset 0 0 0.2em 0.1em var(--color_surface),0 0 0.4em 0.1em var(--color_primary);
                }
                
                </style>
                <?= $this->endSection();?>
                <?= $this->section('content') ?>
                <div class="app-content content">
                    
                    <div class="content-overlay"></div>
                    <div class="header-navbar-shadow"></div>
                    <div class="content-wrapper container-xxl p-0">
                        <div class="content-header row">
                            <div class="content-header-left col-md-6 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                        <h2 class="content-header-title float-start mb-0">Quick Start</h2>
                                        <div class="breadcrumb-wrapper">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $session = session();
                        if($session->get('success')){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                            <strong>Success!</strong> <?php echo $session->get('success');?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>
                        <?php
                        $session = session();
                        if($session->get('error')){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
                            <strong>Warning!</strong> <?php echo $session->get('error');?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>
                        <div class="alert alert-success alert-dismissible fade show div" style="display:none;" role="alert" style="padding: 0.71rem 1rem">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show rohit" style="display:none;" role="alert" style="padding: 0.71rem 1rem">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="content-body">
                            <!-- Accordion with margin start -->
                            <section id="accordion-with-margin">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Steps</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="accordion accordion-margin" id="accordionMargin">
                                                    <?php
                                                    if($all['role'] == 0 || $all['role'] == 10){?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingMarginOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#accordionMarginOne"
                                                        aria-expanded="false" aria-controls="accordionMarginOne">
                                                        Complete Company Profile
                                                        <span
                                                            class="ms-auto me-2"><?php if($total_page <=3){echo $total_page.'/'. $c ;}else {?><i
                                                            class="fa fa-check" aria-hidden="true"></i><?php  } ?>
                                                        </span>
                                                        </button>
                                                        </h2>
                                                        <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                            aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                            <div class="accordion-body">
                                                                <section class="horizontal-wizard">
                                                                    <div class="bs-stepper horizontal-wizard-example">
                                                                        <?php if($total_page != 4){?>
                                                                        
                                                                        <div class="bs-stepper-header" role="tablist">
                                                                            <div class="step" data-target="#account-details" role="tab"
                                                                                id="account-details-trigger">
                                                                                <button type="button" class="step-trigger">
                                                                                <span class="bs-stepper-box">1</span>
                                                                                <span class="bs-stepper-label">
                                                                                    <span class="bs-stepper-title">Basic Info
                                                                                    </span>
                                                                                    <span class="bs-stepper-subtitle">Setup Basic
                                                                                    info</span>
                                                                                </span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="line">
                                                                                <i data-feather="chevron-right"
                                                                                class="font-medium-2"></i>
                                                                            </div>
                                                                            <div class="step" data-target="#personal-info" role="tab"
                                                                                id="personal-info-trigger">
                                                                                <button type="button" class="step-trigger">
                                                                                <span class="bs-stepper-box">2</span>
                                                                                <span class="bs-stepper-label">
                                                                                    <span class="bs-stepper-title">Social
                                                                                    Info</span>
                                                                                    <span class="bs-stepper-subtitle">Setup Social
                                                                                    Info</span>
                                                                                </span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="line">
                                                                                <i data-feather="chevron-right"
                                                                                class="font-medium-2"></i>
                                                                            </div>
                                                                            <div class="step" data-target="#address-step" role="tab"
                                                                                id="address-step-trigger">
                                                                                <button type="button" class="step-trigger">
                                                                                <span class="bs-stepper-box">3</span>
                                                                                <span class="bs-stepper-label">
                                                                                    <span class="bs-stepper-title">Activity Info</span>
                                                                                    <span class="bs-stepper-subtitle">Setup Activity
                                                                                    Info</span>
                                                                                </span>
                                                                                </button>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        }else{?>
                                                                        <div class="alert alert-success" role="alert">
                                                                            <div class="alert-body text-center"><strong>Profile Complete</strong></div>
                                                                        </div>
                                                                        
                                                                        <?php
                                                                        }?>
                                                                        
                                                                        <div class="bs-stepper-content">
                                                                            <div id="account-details" class="content" role="tabpanel"
                                                                                aria-labelledby="account-details-trigger">
                                                                                <div class="content-header">
                                                                                    <h5 class="mb-0">Basic Info</h5>
                                                                                    <small class="text-muted">Enter  Company's basic information
                                                                                    .</small>
                                                                                </div>
                                                                                <form id='first' method='post' action="<?= base_url('/Supplier/supplierUpdate')?>">
                                                                                    <div class="row">
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <input type="hidden" name='supplier' id="supplier"  value='1'>
                                                                                            <input type="hidden" name='id'
                                                                                            value='<?= session()->supplier_info['supplier_id']?>'>
                                                                                            <label class="form-label"
                                                                                            for="username">Company Name </label>
                                                                                            <input type="text" name="brand_name"
                                                                                            id="brand_name" class="form-control"
                                                                                            placeholder="Enter Company Name"
                                                                                            value="<?= $all['brand_name']?>" />
                                                                                        </div>
                                                                                        <?php
                                                                                        $supplier_model = new SupplierModel();
                                                                                        $session = session();
                                                                                        $sid = session()->supplier_info['supplier_id'];
                                                                                        $okk = $supplier_model->where('id', $sid)->first();
                                                                                        $role = $okk['role'];
                                                                                        $countrya = $okk['country_id'];
                                                                                        ?>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">Country</label>
                                                                                            <select  class="form-control select2" id="countray" name='countray' required="">
                                                                                                <option value="">Select Country</option>
                                                                                                <?php foreach($country as $jjjj){?>
                                                                                                
                                                                                                
                                                                                                <option <?php if($jjjj['id'] == $countrya){ echo 'selected="selected"'; } ?> value="<?php echo $jjjj['id'] ?>"><?php echo$jjjj['name'] ?> </option>
                                                                                                
                                                                                                
                                                                                                <?php
                                                                                                } ?>
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label" for="email">
                                                                                            Industry Category</label>
                                                                                            <select class="form-control select2"
                                                                                                id="ind_cate" name='ind_cate'>
                                                                                                <option value="">Select Industry </option>
                                                                                                <option value="<?= $industry_cate['id']?>" selected><?= $industry_cate['industry_category_name']?>
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <?php
                                                                                        
                                                                                        $supplier_model = new SupplierModel();
                                                                                        $session = session();
                                                                                        $sid = session()->supplier_info['supplier_id'];
                                                                                        $okk = $supplier_model->where('id', $sid)->first();
                                                                                        $role = $okk['role'];
                                                                                        $statse = $okk['state_id'];
                                                                                        ?>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">State</label>
                                                                                            <select  class="form-control select2"
                                                                                                id="state" name='statee' required="">
                                                                                                <option value="">Select state</option>
                                                                                                <?php foreach($state as $jjjj){?>
                                                                                                
                                                                                                
                                                                                                <option <?php if($jjjj['id'] == $statse){ echo 'selected="selected"'; } ?> value="<?php echo $jjjj['id'] ?>"><?php echo$jjjj['name'] ?> </option>
                                                                                                
                                                                                                
                                                                                                <?php
                                                                                                } ?>
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">Industry</label>
                                                                                            <select class="form-control select2"
                                                                                                name='ind' id='ind'>
                                                                                                <option value="<?= $industry['id']?>"
                                                                                                    selected>
                                                                                                    <?= $industry['industry_name']?>
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">Address</label>
                                                                                            <input type="text" name="address"
                                                                                            id="address" class="form-control"
                                                                                            placeholder="" required
                                                                                            value="<?= $all['address']?>" />
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">Size</label>
                                                                                            <select class="form-control select2"
                                                                                                required name='size'>
                                                                                                <option value="">Select Size</option>
                                                                                                <option value="1" selected>
                                                                                                <?= $size['company_size']?></option>
                                                                                            </select>
                                                                                        </div>
                                                                                        
                                                                                        <!--  <div class="mb-1">
                                                                                            
                                                                                            <label class="form-label" for="first-name-column">Location From</label>
                                                                                            <input type="text" id="addquick" class="form-control" placeholder="Enter Departure" name="addquick" required>
                                                                                        </div> -->
                                                                                        
                                                                                        
                                                                                        <!-- <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="email">Pincode</label>
                                                                                            <input type="text" name="pincode"
                                                                                            id="pincode" class="form-control"
                                                                                            placeholder="Enter Pincode" required
                                                                                            value="<?= $all['zipcode']?>"/>
                                                                                        </div> -->
                                                                                        <!--<div class="col-md-6 col-12">-->
                                                                                        <!--    <label class="form-label" for="turnover">Turnover</label>-->
                                                                                        <!--    <div class="input-group mb-3">-->
                                                                                        <!--    <input type="number" name="turnover"id="turnover" class="form-control" required value="<?= $all['turnover']?>"placeholder="" >-->
                                                                                        <!--        <div class="input-group-text p-0">-->
                                                                                        <!--            <select class="form-select shadow-none bg-light border-0" name="turnover_unit" id="turnover_unit">-->
                                                                                        <!--                <option value="USD">USD</option>-->
                                                                                        <!--                <option value="INR">INR</option>-->
                                                                                        <!--            </select>-->
                                                                                        <!--        </div>-->
                                                                                        <!--    </div>-->
                                                                                        <!--</div>-->
                                                                                        <!-- <div class="mb-4 col-md-12">
                                                                                            <button class="btn btn-primary float-end" type='submit'>Submit</button>
                                                                                        </div> -->
                                                                                        <!-- <p class="aa">aaa</p> -->
                                                                                    </div>
                                                                                    <div class="col-md-6 col-12">
                                                                                        <label class="form-label" for="turnover">Turnover</label>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="number" name="turnover"id="turnover" class="form-control" required value="<?= $all['turnover']?>"placeholder="" >
                                                                                            <div class="input-group-text p-0">
                                                                                                <select class="form-select shadow-none bg-light border-0" name="turnover_unit" id="turnover_unit">
                                                                                                    <option value="USD">USD</option>
                                                                                                    <option value="INR">INR</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                                <div class="d-flex justify-content-between">
                                                                                    <button class="btn btn-outline-secondary btn-prev"
                                                                                    disabled>
                                                                                    <i data-feather="arrow-left"
                                                                                    class="align-middle me-sm-25 me-0"></i>
                                                                                    <span
                                                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                    class="btn btn-primary btn-next" id='firstbtn'>
                                                                                    <span
                                                                                    class="align-middle d-sm-inline-block d-none">Next</span>
                                                                                    <i data-feather="arrow-right"
                                                                                    class="align-middle ms-sm-25 ms-0"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            $session = session();
                                                                            if($session->get('success')){?>
                                                                            <div class="alert alert-success alert-dismissible fade show"
                                                                                role="alert" style="padding: 0.71rem 1rem">
                                                                                <strong>Success!</strong>
                                                                                <?php echo $session->get('success');?>
                                                                                <button type="button" class="btn-close"
                                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                                            </div>
                                                                            <?php } ?>
                                                                            <?php
                                                                            $session = session();
                                                                            if($session->get('error')){?>
                                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                                role="alert" style="padding: 0.71rem 1rem">
                                                                                <strong>Warning!</strong>
                                                                                <?php echo $session->get('error');?>
                                                                                <button type="button" class="btn-close"
                                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                                            </div>
                                                                            <?php } ?>
                                                                            <div id="personal-info" class="content" role="tabpanel"
                                                                                aria-labelledby="personal-info-trigger">
                                                                                <div class="content-header">
                                                                                    <h5 class="mb-0">Social Info</h5>
                                                                                    <small>Enter Company's social information</small>
                                                                                </div>
                                                                                <form method='post'
                                                                                    action="<?= base_url('/Supplier/supplierUpdate2')?>">
                                                                                    <div class="row">
                                                                                        <!-- <div class="mb-1 col-md-6"> -->
                                                                                        <input type="hidden" name='id'
                                                                                        value='<?= session()->supplier_info['supplier_id']?>'>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="language">Mission Statement</label>
                                                                                            <textarea class="form-control" required id="mission" placeholder="Enter the mission statement of the company"
                                                                                            name='mission'><?= $all['mission']?></textarea>
                                                                                        </div>
                                                                                        
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="last-name">Description</label>
                                                                                            <textarea class="form-control" required  name='description' id="description"  placeholder="    Enter the Description of the company"> <?= $all['description']?> </textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label" for="first-name">Company Website</label>
                                                                                            <input type="text" name="website" required id="website" value="<?= $all['website']?>"
                                                                                            class="form-control" placeholder="Enter the Company Website" />
                                                                                        </div>
                                                                                        <div class="mb-1 col-md-6">
                                                                                            <label class="form-label"
                                                                                            for="country">Social media</label>
                                                                                            <div class="textbox-wrapper">
                                                                                                <?php
                                                                                                $count = [];
                                                                                                
                                                                                                $count = json_decode($all['socials']);
                                                                                                
                                                                                                if($count > 0  ){
                                                                                                
                                                                                                foreach(json_decode($all['socials']) as $key => $social):
                                                                                                
                                                                                                if($key == 0):
                                                                                                
                                                                                                ?>
                                                                                                <div class="input-group">
                                                                                                    <input type="text" class="form-control" id="socials" value='<?= $social;?>'  required
                                                                                                    name='socials[]' placeholder="Enter the Company's social media account" aria-describedby="button-addon2">
                                                                                                    <button type="button" class="btn btn-primary add-textbox waves-effect">
                                                                                                    <i class="fa fa-plus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <?php else:?>
                                                                                                <div class="input-group mt-1"><input
                                                                                                    type="text" required
                                                                                                    name="socials[]" id="socials"
                                                                                                    value='<?= $social;?>'
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter the Company's social media account"
                                                                                                    aria-describedby="button-addon2"><button
                                                                                                    type="button"
                                                                                                    class="btn btn-danger remove-textbox waves-effect">
                                                                                                    <i
                                                                                                    class="fa fa-trash"></i></button>
                                                                                                </div>
                                                                                                <?php
                                                                                                endif;
                                                                                                
                                                                                                endforeach; }
                                                                                                
                                                                                                else{ ?>
                                                                                                <div class="input-group">
                                                                                                    <input type="text"
                                                                                                    class="form-control" value=''
                                                                                                    required name='socials[]' id="socials1"
                                                                                                    placeholder="Enter the Company's social media account"
                                                                                                    aria-describedby="button-addon2">
                                                                                                    <button type="button"
                                                                                                    class="btn btn-primary add-textbox waves-effect"><i
                                                                                                    class="fa fa-plus"></i></button>
                                                                                                </div>
                                                                                                <?php }?>
                                                                                            </div>
                                                                                            <!-- <div class="mb-4 col-md-12">
                                                                                                <button class="btn btn-primary float-end"
                                                                                                
                                                                                                type='submit'>Submit</button>
                                                                                                
                                                                                            </div> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                                <div class="d-flex justify-content-between">
                                                                                    <button class="btn btn-primary btn-prev">
                                                                                    <i data-feather="arrow-left"
                                                                                    class="align-middle me-sm-25 me-0"></i>
                                                                                    <span
                                                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                    </button>
                                                                                    <button type="submit" id="Secondbtn" class="btn btn-primary btn-next ">
                                                                                    <span
                                                                                    class="align-middle d-sm-inline-block d-none">Next</span>
                                                                                    <i data-feather="arrow-right"
                                                                                    class="align-middle ms-sm-25 ms-0"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- step 3 start -->
                                                                            <div id="address-step" class="content" role="tabpanel" aria-labelledby="address-step-trigger">
                                                                                <!-- Q.1 -->
                                                                                <div class="content-header">
                                                                                    <h5 class="mb-0 text-black">
                                                                                    1. Select the list of
                                                                                    business activites accounting for 90% of the
                                                                                    Turnover.
                                                                                    </h5>
                                                                                </div>
                                                                                <!-- Add more repeater -->
                                                                                <div class="col-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <form class="invoice-repeater" method='post'  action="<?= base_url('/Supplier/supplierSubsidiaryUpdate')?>">
                                                                                                <div data-repeater-list="invoice">
                                                                                                    <?php
                                                                                                    $count = [];
                                                                                                    $per = json_decode($all['percentage']);
                                                                                                    $act = json_decode($all['activities']);
                                                                                                    $count = $per;
                                                                                                    if($count > 0  ){
                                                                                                    foreach($per as $key => $row):
                                                                                                    ?>
                                                                                                    <div data-repeater-item>
                                                                                                        <div class="row d-flex align-items-end">
                                                                                                            <div class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label class="form-label" for="itemname">Industry</label>
                                                                                                                    <select class="form-control select2" name='ind_cate'>
                                                                                                                        <option value="">Select Industry</option>
                                                                                                                        <option value="<?= $industry_cate['id']?>"
                                                                                                                            selected><?= $industry_cate['industry_category_name']?>
                                                                                                                        </option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label class="form-label" for="itemcost">Sub Industry</label>
                                                                                                                    <select class="form-control select2" name='ind'>
                                                                                                                        <option value="<?= $industry['id']?>" selected>
                                                                                                                        <?= $industry['industry_name']?></option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label class="form-label" for="itemquantity">Activities</label>
                                                                                                                    <select class="form-control select2"
                                                                                                                        required
                                                                                                                        name='activities'
                                                                                                                        id='ind'>
                                                                                                                        <?php foreach($activities as $row):
                                                                                                                        if ($row['id'] == $act[$key]):?>
                                                                                                                        <option
                                                                                                                            value="<?= $row['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $row['subsubindustry']?>
                                                                                                                        </option>
                                                                                                                        <?php else: ?>
                                                                                                                        <option
                                                                                                                            value="<?= $row['id']?>">
                                                                                                                            <?= $row['subsubindustry']?>
                                                                                                                        </option>
                                                                                                                        <?php
                                                                                                                        endif;
                                                                                                                        endforeach;?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3 col-12"
                                                                                                                style='display:none;'>
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="itemquantity">Activities</label>
                                                                                                                    <select
                                                                                                                        class="form-control select2"
                                                                                                                        name='indk'
                                                                                                                        id='ind'>
                                                                                                                        <?php foreach($activities as $row):?>
                                                                                                                        <option
                                                                                                                            value="<?= $row['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $row['subsubindustry']?>
                                                                                                                        </option>
                                                                                                                        <?php endforeach;?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-2 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="staticprice">Holding Percentage</label>
                                                                                                                    <input type="text"
                                                                                                                    class="form-control"
                                                                                                                    required
                                                                                                                    name='percentage'
                                                                                                                    id=""
                                                                                                                    value="<?= $per[$key] ;?>" />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-1 col-12 mb-50">
                                                                                                                <div class="mb-1">
                                                                                                                    <button
                                                                                                                    class="btn btn-outline-danger text-nowrap px-1"
                                                                                                                    data-repeater-delete
                                                                                                                    type="button">
                                                                                                                    <i data-feather="x"
                                                                                                                    class="me-25"></i>
                                                                                                                    <!--<span>Delete</span>-->
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <hr />
                                                                                                    </div>
                                                                                                    <?php endforeach;
                                                                                                    }
                                                                                                    else{
                                                                                                    ?><div data-repeater-item>
                                                                                                        <div  class="row d-flex align-items-end">
                                                                                                            <div class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="itemname">Industry</label>
                                                                                                                    <select
                                                                                                                        class="form-control select2"
                                                                                                                        required
                                                                                                                        name='ind_cate'>
                                                                                                                        <option
                                                                                                                            value="">
                                                                                                                            Select
                                                                                                                            Industry
                                                                                                                        </option>
                                                                                                                        <option
                                                                                                                            value="<?= $industry_cate['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $industry_cate['industry_category_name']?>
                                                                                                                        </option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                        for="itemcost">Sub
                                                                                                                    Industry</label>
                                                                                                                    <select
                                                                                                                        class="form-control select2"
                                                                                                                        required
                                                                                                                        name='ind'>
                                                                                                                        <option
                                                                                                                            value="<?= $industry['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $industry['industry_name']?>
                                                                                                                        </option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="itemquantity">Activities</label>
                                                                                                                    <select
                                                                                                                        class="form-control select2"
                                                                                                                        required
                                                                                                                        name='activities'
                                                                                                                        id='ind'>
                                                                                                                        <?php foreach($activities as $row):?>
                                                                                                                        <option
                                                                                                                            value="<?= $row['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $row['subsubindustry']?>
                                                                                                                        </option>
                                                                                                                        <?php endforeach;?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-3 col-12"
                                                                                                                style='display:none;'>
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="itemquantity">Activities</label>
                                                                                                                    <select
                                                                                                                        class="form-control select2"
                                                                                                                        name='indk'
                                                                                                                        id='ind'>
                                                                                                                        <?php foreach($activities as $row):?>
                                                                                                                        <option
                                                                                                                            value="<?= $row['id']?>"
                                                                                                                            selected>
                                                                                                                            <?= $row['subsubindustry']?>
                                                                                                                        </option>
                                                                                                                        <?php endforeach;?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-2 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label
                                                                                                                        class="form-label"
                                                                                                                    for="staticprice">Percentage(Unit)</label>
                                                                                                                    <input type="text"
                                                                                                                    class="form-control"
                                                                                                                    required
                                                                                                                    name='percentage'
                                                                                                                    id=""
                                                                                                                    value="" />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-1 col-12 mb-50">
                                                                                                                <div class="mb-1">
                                                                                                                    <button
                                                                                                                    class="btn btn-outline-danger text-nowrap px-1"
                                                                                                                    data-repeater-delete
                                                                                                                    type="button">
                                                                                                                    <i data-feather="x"
                                                                                                                    class="me-25"></i>
                                                                                                                    <!--<span>Delete</span>-->
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <hr />
                                                                                                    </div>
                                                                                                    <?php }?>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col-12 d-flex justify-content-between">
                                                                                                        <button
                                                                                                        class="btn btn-icon btn-primary"
                                                                                                        type="button"
                                                                                                        data-repeater-create>
                                                                                                        <i data-feather="plus"
                                                                                                        class="me-25"></i>
                                                                                                        <span>Add New</span>
                                                                                                        </button>
                                                                                                        <!-- <button
                                                                                                        class="btn btn-primary float-end">Submit</button> -->
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- </form> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--  repeater -->
                                                                                    <hr>
                                                                                    <!-- Q.2 -->
                                                                                    <div class="content-header">
                                                                                        <h5 class="mb-0 text-black">2. Select the Country where the business expanded ! </h5>
                                                                                    </div>
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="basic"></div>
                                                                                            
                                                                                            <?php
                                                                                            $cidjk= json_decode($all['multiple_country']);
                                                                                            if(empty($cidjk)){
                                                                                            $cidjk=array();
                                                                                            }
                                                                                            ?>
                                                                                            <select name="llll[]" class="form-control select2"  multiple>
                                                                                                
                                                                                                <option>country</option>
                                                                                                <?php foreach ($country as $key => $value) {
                                                                                                if(in_array($value['id'],$cidjk)){
                                                                                                ?>
                                                                                                <option  selected value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                                                <?php
                                                                                                }else{ ?>
                                                                                                <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                                                <?php } }?>
                                                                                                
                                                                                                
                                                                                            </select>
                                                                                            
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <!--  <h5>Map</h5> -->
                                                                                            <div id="world_map">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    <hr>
                                                                                    <!-- Q.3 -->
                                                                                    <div class="content-header">
                                                                                        <h5 class="mb-0 text-black">3. Name of the
                                                                                        subsidiary, franchise, Joint Venture,
                                                                                        Associates, Investments. </h5>
                                                                                    </div>
                                                                                    <!-- Add more repeater2 -->
                                                                                    <div class="col-12">
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                
                                                                                                <div data-repeater-list="invoice">
                                                                                                    <?php
                                                                                                    if($ssd_data):
                                                                                                    $name = json_decode($ssd_data['name']);
                                                                                                    $address = json_decode($ssd_data['address']);
                                                                                                    $percentage = json_decode($ssd_data['percentage']);
                                                                                                    $sub_industry = json_decode($ssd_data['sub_industry']);
                                                                                                    $industry = json_decode($ssd_data['industry']);
                                                                                                    foreach($name as $key => $row):
                                                                                                    ?>
                                                                                                    <div data-repeater-item>
                                                                                                        <div class="row d-flex align-items-end">
                                                                                                            <div class="col-md-2 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label class="form-label" for="itemname">Name</label>
                                                                                                                    <input type="text" class="form-control" id="itemname" name="name" value="<?= $row?>"required aria-describedby="itemname"placeholder="" />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-2 col-12">
                                                                                                                <div class="mb-1">
                                                                                                                    <label class="form-label" for="itemcost">Location</label>
                                                                                                                    <input type="text" class="form-control" id="itemcost" name='address' value="<?= $address[$key]?>"required
                                                                                                                aria-describedby="itemcost" placeholder="" /></div></div>
                                                                                                                <div class="col-md-2 col-12">
                                                                                                                    <div class="mb-1">
                                                                                                                        <label class="form-label" for="itemquantity">Industry</label>
                                                                                                                        <select class="form-control select2 industry_name" required name="industry_namev" id='ok'>
                                                                                                                            <option value="">Select Industry </option>
                                                                                                                            <?php foreach($ind_cate as $row):
                                                                                                                            if($row['id'] == $industry[$key]):
                                                                                                                            ?>
                                                                                                                            <option value="<?= $row['id']?>"selected>
                                                                                                                                <?= $row['industry_category_name']?>
                                                                                                                            </option>
                                                                                                                            <?php
                                                                                                                            else:
                                                                                                                            ?>
                                                                                                                            <option value="<?= $row['id']?>"><?= $row['industry_category_name']?></option>
                                                                                                                            <?php
                                                                                                                            endif;
                                                                                                                            endforeach;?>
                                                                                                                        </select>
                                                                                                                    </div></div>
                                                                                                                    <div class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="staticprice">Sub Industry</label>
                                                                                                                            <select class="form-control select2 sub_industry_name" required name='sub_industry' id='ok'>
                                                                                                                                <option value=""> Select Sub Industry</option>
                                                                                                                                <?php
                                                                                                                                $data = $ind->where('industry_category_id',$industry[$key])->findAll();
                                                                                                                                foreach($data as $row):
                                                                                                                                if($row['id'] == $sub_industry[$key]):
                                                                                                                                ?>
                                                                                                                                <option value="<?= $row['id']?>" selected><?= $row['industry_name']?></option>
                                                                                                                                <?php else:?>
                                                                                                                                <option value="<?= $row['id']?>">
                                                                                                                                <?= $row['industry_name']?></option>
                                                                                                                                <?php endif;
                                                                                                                                endforeach;?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-2 col-12" style='display:none;'>
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="staticprice">Sub Industry</label>
                                                                                                                            <select class="form-control select2 sub_industry_name" name='sub_industryokokokokokok' id='ok'>
                                                                                                                                <option value=""> Select Sub Industry</option>
                                                                                                                                <!-- <option value="1">1</option> -->
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label
                                                                                                                                class="form-label"
                                                                                                                            for="staticprice">Holding Percentage</label>
                                                                                                                            <input type="text"
                                                                                                                            class="form-control"
                                                                                                                            id="" required
                                                                                                                            name='percentage'
                                                                                                                            value="<?= $percentage[$key]?>" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-2 col-12 mb-50">
                                                                                                                        <div class="mb-1">
                                                                                                                            <button
                                                                                                                            class="btn btn-outline-danger text-nowrap px-1"
                                                                                                                            data-repeater-delete
                                                                                                                            type="button">
                                                                                                                            <i data-feather="x"
                                                                                                                            class="me-25"></i>
                                                                                                                            <span>Delete</span>
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <?php
                                                                                                            endforeach;
                                                                                                            else:
                                                                                                            ?>
                                                                                                            <div data-repeater-item>
                                                                                                                <div class="row d-flex align-items-end">
                                                                                                                    <div class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="itemname">Name</label>
                                                                                                                            <input type="text" class="form-control" id="itemname" name="name" required aria-describedby="itemname"
                                                                                                                            placeholder="" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="itemcost">Location</label>
                                                                                                                            <input type="text" class="form-control" id="itemcost" name='address' required aria-describedby="itemcost"
                                                                                                                            placeholder="" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="itemquantity">Industry</label>
                                                                                                                            <select class="form-control select2 industry_name" required name="industry_name" id='ok'>
                                                                                                                                <option value="">Select Industry </option>
                                                                                                                                <?php foreach($ind_cate as $row):?>
                                                                                                                                <option value="<?= $row['id']?>"><?= $row['industry_category_name']?></option>
                                                                                                                                <?php endforeach;?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="staticprice">Sub Industry</label>
                                                                                                                            <select class="form-control select2 sub_industry_name" required name='sub_industry' id='ok'>
                                                                                                                                <option value="">  Select Sub Industry</option>
                                                                                                                                <!-- <option value="1">1</option> -->
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-2 col-12" style='display:none;'>
                                                                                                                        <div class="mb-1">
                                                                                                                            <label class="form-label" for="staticprice">Sub Industry</label>
                                                                                                                            <select class="form-control select2 sub_industry_name" name='sub_industryokokokokokok'
                                                                                                                                id='ok'>
                                                                                                                                <option
                                                                                                                                    value="">
                                                                                                                                    Select Sub
                                                                                                                                    Industry
                                                                                                                                </option>
                                                                                                                                <!-- <option value="1">1</option> -->
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-2 col-12">
                                                                                                                        <div class="mb-1">
                                                                                                                            <label
                                                                                                                                class="form-label"
                                                                                                                            for="staticprice">Percentage</label>
                                                                                                                            <input type="text"
                                                                                                                            class="form-control"
                                                                                                                            id="" required
                                                                                                                            name='percentage'
                                                                                                                            value="" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-2 col-12 mb-50">
                                                                                                                        <div class="mb-1">
                                                                                                                            <button
                                                                                                                            class="btn btn-outline-danger text-nowrap px-1"
                                                                                                                            data-repeater-delete
                                                                                                                            type="button">
                                                                                                                            <i data-feather="x"
                                                                                                                            class="me-25"></i>
                                                                                                                            <span>Delete</span>
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <hr />
                                                                                                            </div>
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 d-flex justify-content-between">
                                                                                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                                                                                <i data-feather="plus" class="me-25"></i>
                                                                                                                <span>Add New</span>
                                                                                                                </button>
                                                                                                                <!-- <button class="btn btn-primary float-end">Submit</button> -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--  repeater -->
                                                                                            <div class="d-flex justify-content-between">
                                                                                                <button class="btn btn-primary btn-prev">
                                                                                                <i data-feather="arrow-left"
                                                                                                class="align-middle me-sm-25 me-0"></i>
                                                                                                <span
                                                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                                </button>
                                                                                                <button class="btn btn-primary btn-next">
                                                                                                <span
                                                                                                class="align-middle d-sm-inline-block d-none" onclick="getNext()">Next</span>
                                                                                                <i data-feather="arrow-right"
                                                                                                class="align-middle ms-sm-25 ms-0"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } else{?>
                                                            <?php
                                                            
                                                            $supplier_model = new SupplierModel();
                                                            $session = session();
                                                            $sid = session()->supplier_info['supplier_id'];
                                                            $ok = $supplier_model->where('id', $sid)->first();
                                                            $role = $ok['role'];
                                                            
                                                            ?>
                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingMarginOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#accordionMarginOne"
                                                                aria-expanded="false" aria-controls="accordionMarginOne">
                                                                Complete Profile
                                                                <span class="ms-auto me-2"><?php if($total_page <=3){echo $total_page.'/'. $c ;}else {?><i
                                                                    class="fa fa-check" aria-hidden="true"></i><?php  } ?>
                                                                </span>
                                                                </button>
                                                                </h2>
                                                                <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                                    aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                                    <div class="accordion-body">
                                                                        <section class="horizontal-wizard">
                                                                            <div class="bs-stepper horizontal-wizard-example">
                                                                                <div class="bs-stepper-header" role="tablist">
                                                                                    <div class="step" data-target="#account-details" role="tab"
                                                                                        id="account-details-trigger">
                                                                                        <button type="button" class="step-trigger">
                                                                                        <span class="bs-stepper-box">1</span>
                                                                                        <span class="bs-stepper-label">
                                                                                            <span class="bs-stepper-title">Profile
                                                                                            Details</span>
                                                                                            <span class="bs-stepper-subtitle">Setup Profile
                                                                                            Details</span>
                                                                                        </span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="line">
                                                                                        <i data-feather="chevron-right"
                                                                                        class="font-medium-2"></i>
                                                                                    </div>
                                                                                    <div class="step" data-target="#personal-info" role="tab"
                                                                                        id="personal-info-trigger">
                                                                                        <button type="button" class="step-trigger">
                                                                                        <span class="bs-stepper-box">2</span>
                                                                                        <span class="bs-stepper-label">
                                                                                            <span class="bs-stepper-title">Address
                                                                                            Details</span>
                                                                                            <span class="bs-stepper-subtitle">Add Address
                                                                                            Details</span>
                                                                                        </span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="line">
                                                                                        <i data-feather="chevron-right"
                                                                                        class="font-medium-2"></i>
                                                                                    </div>
                                                                                    <div class="step" data-target="#address-step" role="tab"
                                                                                        id="address-step-trigger">
                                                                                        <button type="button" class="step-trigger">
                                                                                        <span class="bs-stepper-box">3</span>
                                                                                        <span class="bs-stepper-label">
                                                                                            <span class="bs-stepper-title">Personal
                                                                                            Information</span>
                                                                                            <span class="bs-stepper-subtitle">Add Personal
                                                                                            Information</span>
                                                                                        </span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="bs-stepper-content">
                                                                                    <div id="account-details" class="content" role="tabpanel"
                                                                                        aria-labelledby="account-details-trigger">
                                                                                        <div class="content-header">
                                                                                            <h5 class="mb-0">Personal Details</h5>
                                                                                            <small class="text-muted">Enter Your Personal
                                                                                            Details.</small>
                                                                                        </div>
                                                                                        <form id='first' method='post'
                                                                                            action="<?= base_url('/Supplier/supplierSubsidiaryUpdate')?>">
                                                                                            <div class="row">
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <input type="hidden" name='id'
                                                                                                    value='<?= session()->supplier_info['supplier_id']?>'>
                                                                                                    <label class="form-label" for="username">
                                                                                                    Name </label>
                                                                                                    <input type="text" name="name" id="first_name"
                                                                                                    class="form-control" placeholder=""
                                                                                                    value="<?= $all['supplier_name']?>"
                                                                                                    required />
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label" for="">Last
                                                                                                    Name</label>
                                                                                                    <input type="text" name="last_name" id="last_name"
                                                                                                    class="form-control" placeholder=""
                                                                                                    required
                                                                                                    value="<?= $all['last_name']?>" />
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label"
                                                                                                    for="">Email</label>
                                                                                                    <input type="text" name="email" id=""
                                                                                                    class="form-control" placeholder=""
                                                                                                    required value="<?= $all['email']?>" readonly />
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label"
                                                                                                    for="">Mobile</label>
                                                                                                    <input type="text" name="mobile" id=""
                                                                                                    class="form-control" placeholder=""
                                                                                                    required value="<?= $all['mobile']?>" readonly/>
                                                                                                </div>
                                                                                                <!-- <div class="mb-4 col-md-12">
                                                                                                    <button class="btn btn-primary float-end"
                                                                                                    type='submit'>Submit</button>
                                                                                                </div> -->
                                                                                            </div>
                                                                                        </form>
                                                                                        <div class="d-flex justify-content-between">
                                                                                            <button class="btn btn-outline-secondary btn-prev"
                                                                                            disabled>
                                                                                            <i data-feather="arrow-left"
                                                                                            class="align-middle me-sm-25 me-0"></i>
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                            </button>
                                                                                            <button class="btn btn-primary btn-next"
                                                                                            id='firstbtn'>
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Next</span>
                                                                                            <i data-feather="arrow-right"
                                                                                            class="align-middle ms-sm-25 ms-0"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="personal-info" class="content" role="tabpanel"
                                                                                        aria-labelledby="personal-info-trigger">
                                                                                        <div class="content-header">
                                                                                            <h5 class="mb-0">Address Details</h5>
                                                                                            <small>Enter Your Address Details.</small>
                                                                                        </div>
                                                                                        <form method='post'
                                                                                            action="">
                                                                                            <div class="row">
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <input type="hidden" name='id'
                                                                                                    value='<?= session()->supplier_info['supplier_id']?>'>
                                                                                                    <label class="form-label"
                                                                                                    for="first-name">Country</label>
                                                                                                    <select disabled id="country_man"  class="select2 form-select" readonly>
                                                                                                        <option value="">Select Country</option>
                                                                                                        <?php
                                                                                                        foreach($country as $count){
                                                                                                        ?>
                                                                                                        <option value="<?php echo $count['id'];?>"<?= '101'==$count['id'] ?'selected':''?>>
                                                                                                        <?php echo $count['name'];?></option>
                                                                                                        <?php } ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label"
                                                                                                    for="state">State</label>
                                                                                                    <select  id="state_man" class="select2 form-select"
                                                                                                        required>
                                                                                                        <option value="">Select State</option>
                                                                                                        <?php foreach($state as $coun){ ?>
                                                                                                        <option value="<?php echo $coun['id'];?>" <?= $ok['state_id']==$coun['id'] ?'selected':''?>><?php echo $coun['name'];?></option>
                                                                                                        <?php } ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label"
                                                                                                    for="first-name">Address</label>
                                                                                                    <input value="<?= $all['address']?>" type="text" class="form-control"
                                                                                                    id="address_man" name="address"
                                                                                                    placeholder="Your Address" required>
                                                                                                </div>
                                                                                                <div class="mb-1 col-md-6">
                                                                                                    <label class="form-label"
                                                                                                    for="last-name">Zip Code</label>
                                                                                                    <input type="text" value="<?= $all['zipcode']?>"
                                                                                                    class="form-control account-zip-code"
                                                                                                    id="zipcode_man" name="zipCode"
                                                                                                    placeholder="Code" maxlength="6"
                                                                                                    required>
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                        </form>
                                                                                        <div class="d-flex justify-content-between">
                                                                                            <button class="btn btn-primary btn-prev">
                                                                                            <i data-feather="arrow-left"
                                                                                            class="align-middle me-sm-25 me-0"></i>
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                            </button>
                                                                                            <button class="btn btn-primary btn-next" id="Secondbtn">
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Next</span>
                                                                                            <i data-feather="arrow-right"
                                                                                            class="align-middle ms-sm-25 ms-0"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    <div id="address-step" class="content" role="tabpanel"
                                                                                        aria-labelledby="address-step-trigger">
                                                                                        <!-- Q.1 -->
                                                                                        <div class="content-header">
                                                                                            <h5 class="mb-0 text-black">Enter Your Personal
                                                                                            Information.</h5>
                                                                                        </div>
                                                                                        <!-- Add more repeater -->
                                                                                        <div class="col-12">
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <form class="" method='post'
                                                                                                        action="<?= base_url('/Supplier/supplierUpdate3')?>">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 col-sm-12 mb-1">
                                                                                                                <label class="form-label"
                                                                                                                for="accountOrganization">Bio</label>
                                                                                                                <input type="text" value="<?= $all['bio']?>" id="bio_man"
                                                                                                                class="form-control">
                                                                                                            </div>
                                                                                                            <div class="col-12 col-sm-6 mb-1">
                                                                                                                <label class="form-label"
                                                                                                                    for="accountOrganization">
                                                                                                                Date of birth</label>
                                                                                                                <input  value="<?= $all['age']?>" id="date_man" type="date"
                                                                                                                class="form-control"
                                                                                                                id="accountFirstName"
                                                                                                                name="firstName"
                                                                                                                placeholder="John" value=""
                                                                                                                data-msg="" required>
                                                                                                            </div>
                                                                                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                                                                <label class="form-label"
                                                                                                                for="accountOrganization">Website</label>
                                                                                                                <input  value="<?= $all['website']?>" id="website_man" type="text"
                                                                                                                class="form-control"
                                                                                                                id="accountWebsiteName"
                                                                                                                name="Website"
                                                                                                                placeholder="John"
                                                                                                                required="required">
                                                                                                            </div> -->
                                                                                                            <!-- <div class="mb-4 col-md-12">
                                                                                                                <button
                                                                                                                class="btn btn-primary float-end"
                                                                                                                type='submit'>Submit</button>
                                                                                                            </div> -->
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--  repeater -->
                                                                                        <div class="d-flex justify-content-between">
                                                                                            <button class="btn btn-primary btn-prev">
                                                                                            <i data-feather="arrow-left"
                                                                                            class="align-middle me-sm-25 me-0"></i>
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Previous</span>
                                                                                            </button>
                                                                                            <button class="btn btn-primary rohittt">
                                                                                            <span
                                                                                            class="align-middle d-sm-inline-block d-none">Next</span>
                                                                                            <i data-feather="arrow-right"
                                                                                            class="align-middle ms-sm-25 ms-0"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <?php }?>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingMarginTwo">
                                                            <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo"
                                                            aria-expanded="false" aria-controls="accordionMarginTwo">
                                                            Add Or Update Company Policies
                                                            <span
                                                                class="ms-auto me-2"><?php if($total_document == 0){
                                                                echo $total_document.'/'. $b ;
                                                                }else {?><i
                                                            class="fa fa-check" aria-hidden="true"></i><?php  }  ?></span>
                                                            </button>
                                                            </h2>
                                                            <div id="accordionMarginTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                                <div class="accordion-body">
                                                                    <?php if($total_document != $b){?>
                                                                    
                                                                    <a href="<?= base_url('/brand/approve_policy');?>" class='btn btn-primary'>Add Policy</a>
                                                                    <?php }else {?>
                                                                    <div class="alert alert-success" role="alert">
                                                                        <div class="alert-body text-center"><strong>All Set</strong></div>
                                                                    </div>
                                                                    <?php  }  ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                        
                                                        $supplier_model = new SupplierModel();
                                                        $sidrole = session()->supplier_info['supplier_id'];
                                                        $okrole = $supplier_model->where('id', $sidrole)->first();
                                                        $rolerole = $okrole['role'];
                                                        
                                                        if($rolerole == 0 || $rolerole == 10 || $rolerole == 11){ ?>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingMarginThree">
                                                            <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#accordionMarginThree"
                                                            aria-expanded="false" aria-controls="accordionMarginThree">
                                                            Add Workforce
                                                            <span class="ms-auto me-2"><?php ;if($employee_details == 0){ ?>
                                                                <?php  echo "0/1"; }else{
                                                                ?> <i class="fa fa-check"
                                                            aria-hidden="true"></i><?php }?></span>
                                                            </button>
                                                            </h2>
                                                            <div id="accordionMarginThree" class="accordion-collapse collapse"
                                                                aria-labelledby="headingMarginThree" data-bs-parent="#accordionMargin">
                                                                <div class="accordion-body">
                                                                    <?php  if($employee_details == 0){ ?>
                                                                    <div class='mb-2'>
                                                                        Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly
                                                                        jelly macaroon icing jelly beans
                                                                        soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar
                                                                        plum. Dessert jelly-o sweet
                                                                        muffin chocolate candy pie tootsie roll marzipan. Carrot cake
                                                                        marshmallow pastry. Bonbon biscuit
                                                                        pastry topping toffee dessert gummies. Topping apple pie pie
                                                                        croissant cotton candy dessert tiramisu.
                                                                    </div>
                                                                    <a href="<?= base_url('/workforces/employee');?>"
                                                                    class='btn btn-primary'>Add User</a>
                                                                    <?php }else { ?>
                                                                    <div class="alert alert-success" role="alert">
                                                                        <div class="alert-body text-center"><strong>All Done</strong></div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } else ?>
                                                    </div>
                                                    <!-- Add edit policy -->
                                                    <div class="modal fade text-start" id="defaultt" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel1">Edit Policy</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form" name="doc-form" method="post" action="<?php echo base_url()?>/Brand/updatePolicy" enctype='multipart/form-data'>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="first-name-column">Policy Name</label>
                                                                                    <input type="text" placeholder="Enter Company Name" name="company_name" id='company_name' required="" maxlength = "20" class="form-control">
                                                                                    <input type="hidden" id='p_e_id' name='id'>
                                                                                    <input type="hidden" id='p_e_versions' name='versions'>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="last-name-column">Policy Details</label>
                                                                                    <textarea name="policy_details" id="policy_details" class='editor'></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end edit policy -->
                                                    <?= $this->endSection() ?>
                                                    <?= $this->section('script') ?>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js');?>">
                                                    </script>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js');?>">
                                                    </script>
                                                    <script
                                                    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js');?>">
                                                    </script>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js');?>"></script>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js');?>">
                                                    </script>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-repeater.min.js');?>"></script>
                                                    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/auth-register.min.js');?>"></script>
                                                    <script src="<?php echo base_url('public/brand/assets/assets/js/al-range-slider.js')?>"></script>
                                                    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                                                    <!-- <script>
                                                    jQuery.validator.setDefaults({
                                                    debug: true,
                                                    success: "valid"
                                                    });
                                                    $( "#step" ).validate({
                                                    rules: {
                                                    name: {
                                                    required: true,
                                                    maxlength:200
                                                    }
                                                    },
                                                    messages: {
                                                    name: {
                                                    required: "Please enter name",
                                                    maxlength: 'Maximum character length 200'
                                                    }
                                                    },
                                                    submitHandler:function(form){
                                                    form.submit();
                                                    }
                                                    });
                                                    </script> -->
                                                    <script>
                                                    $('.basic').alRangeSlider();
                                                    const options = {
                                                    range: {
                                                    min: -100,
                                                    max: 100,
                                                    step: 1
                                                    },
                                                    initialSelectedValues: {
                                                    from: -50,
                                                    to: 50
                                                    },
                                                    grid: {
                                                    minTicksStep: 1,
                                                    marksStep: 5
                                                    },
                                                    theme: "dark",
                                                    };
                                                    $('.js-example-class').alRangeSlider(options);
                                                    const options2 = {
                                                    orientation: "vertical"
                                                    };
                                                    $('.vertical').alRangeSlider(options2);
                                                    </script>
                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                    var max = 10;
                                                    var cnt = 1;
                                                    $(".add-textbox").on("click", function(e) {
                                                    e.preventDefault();
                                                    if (cnt < max) {
                                                    cnt++;
                                                    $(".textbox-wrapper").append(
                                                    '<div class="input-group mt-1"><input type="text" name="socials[]" id="socials" class="form-control" placeholder="Button on right" aria-describedby="button-addon2"><button type="button" class="btn btn-danger remove-textbox waves-effect"><i class="fa fa-trash"></i></button></div>'
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
                                                    $(document).ready( function(){
                                                    
                                                    $('.edit-policy').on('click', function(){
                                                    var id= $(this).attr('data-id');
                                                    // alert(id);
                                                    $.ajax({
                                                    url: "<?= base_url('/Brand/editPolicy/')?>/" + id,
                                                    method: "GEt",
                                                    success: function(result) {
                                                    // alert(result.id);
                                                    $('#company_name').val(result.policy_name);
                                                    $('#policy_details').html(result.policy_details);
                                                    $('#p_e_id').val(result.id);
                                                    $('#p_e_versions').val(result.versions);
                                                    }
                                                    });
                                                    });
                                                    });
                                                    </script>
                                                    <script type="text/javascript">
                                                    $("document").ready(function() {
                                                    $('select[name="countray"]').on('change', function() {
                                                    var sId = $(this).val();
                                                    // alert(sId);
                                                    $.ajax({
                                                    url: "<?= base_url('/Supplier/country_city/')?>/" + sId,
                                                    type: "GET",
                                                    dataType: "json",
                                                    success: function(data) {
                                                    $('select[name="statee"]').empty();
                                                    $('select[name="statee"]').append(
                                                    '<option value="">Select state</option>');
                                                    $.each(data, function(key, value) {
                                                    $('select[name="statee"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                                                    })
                                                    
                                                    }
                                                    })
                                                    
                                                    });
                                                    });
                                                    </script>
                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                    $('.industry_name').on('change', function() {
                                                    var sId = $(this).val();
                                                    // alert(sId);
                                                    // var del = $(this).closest('tr').find('#id').val();
                                                    if (sId) {
                                                    $.ajax({
                                                    url: "<?= base_url('Supplier/subIndustry')?>/" + sId,
                                                    type: "GET",
                                                    dataType: "json",
                                                    success: function(data) {
                                                    // alert('uhuh');
                                                    $('.sub_industry_name').empty();
                                                    $('.sub_industry_name').append(
                                                    '<option value="">Open this select menu</option>');
                                                    $.each(data, function(key, value) {
                                                    $('.sub_industry_name').append('<option value="' +
                                                        value.id + '">' + value.industry_name +
                                                    '</option>');
                                                    })
                                                    }
                                                    })
                                                    }
                                                    });
                                                    });
                                                    </script>
                                                    <!-- count  -->
                                                    <script>
                                                    $(document).ready(function() {
                                                    loadcart();
                                                    $.ajaxSetup({
                                                    headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    }
                                                    });
                                                    function loadcart() {
                                                    $.ajax({
                                                    method: "GET",
                                                    url: "<?= base_url('/Supplier/supplierUpdate')?>",
                                                    success: function(response) {
                                                    $('.car-count').html('');
                                                    $('.cart-count').html(response.count);
                                                    }
                                                    });
                                                    }
                                                    });
                                                    </script>
                                                    <script>
                                                    CKEDITOR.replace( 'policy_details' );
                                                    </script>
                                                    <!-- end count -->
                                                    <!-- <script>
                                                    $(document).ready( function () {
                                                    $('#firstbtn').on('click', function () {
                                                    });
                                                    });
                                                    </script> -->
                                                    <!--world map start-->
                                                    <script src="https://www.amcharts.com/lib/4/core.js"></script>
                                                    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
                                                    <script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
                                                    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
                                                    <script type="text/javascript" src="<?php echo base_url('public/brand/assets/assets/js/worldmap.js')?>"></script>
                                                    <!--world map end-->
                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                    $('#firstbtn').on('click', function(e) {
                                                    // alert('pp');
                                                    //   $('.uploadBtn').val('Uploading ...');
                                                    //     $('.uploadBtn').prop('Disabled');
                                                    e.preventDefault();
                                                    // alert('ppp');
                                                    var f = $('#first_name').val();
                                                    var l = $('#last_name').val();
                                                    var a = $('#brand_name').val();
                                                    var a = $('#brand_name').val();
                                                    var b = $('#address').val();
                                                    var c = $('#ind_cate').val();
                                                    var d = $('#ind').val();
                                                    var e = $('#turnover').val();
                                                    var turnover_unit = $('#turnover_unit').val();
                                                    var country = $('#countray').val();
                                                    // alert(country);
                                                    var state = $('#state').val();
                                                    var pincode = $('#pincode').val();
                                                    var supplier = $('#supplier').val();
                                                    
                                                    $.ajax({
                                                    url: "<?= base_url('Supplier/supplierUpdate');?>",
                                                    method: "POST",
                                                    data: {
                                                    brand_name:a,
                                                    add:b,
                                                    c:c,
                                                    d:d,
                                                    turn:e,
                                                    turnover_unit:turnover_unit,
                                                    first_name:f,
                                                    last_name:l,
                                                    country:country,
                                                    state:state,
                                                    pincode:pincode,
                                                    supplier:supplier
                                                    },
                                                    dataType: "json",
                                                    success: function(res) {
                                                    $('.div').show();
                                                    $('.div').html(res.success);
                                                    if (res.success == true) {
                                                    
                                                    }
                                                    else if (res.success == false) {
                                                    
                                                    }
                                                    }
                                                    
                                                    // }
                                                    });
                                                    });
                                                    });
                                                    </script>
                                                    <!-- <script>
                                                    $(document).ready(function(){
                                                    $('select[name="countray"]').on('click', function(){
                                                    
                                                    var id = $(this).val();
                                                    alert(id);
                                                    // alert(version);
                                                    // alert('Do you want to approve ?');
                                                    $.ajax({
                                                    url: "<?= base_url('/Supplier/alertttt/')?>",
                                                    method: "POST",
                                                    data:{
                                                    id:id,
                                                    },
                                                    success: function(result) {
                                                    
                                                    
                                                    }
                                                    });
                                                    });
                                                    });
                                                    </script> -->
                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                    $('#Secondbtn').on('click', function(e) {
                                                    e.preventDefault();
                                                    var country = $('#country_man').val();
                                                    var state = $('#state_man').val();
                                                    var address = $('#address_man').val();
                                                    var zipcode = $('#zipcode_man').val();
                                                    var language = $('#language_man').val();
                                                    var currency = $('#currency_man').val();
                                                    var timeZones = $('#timeZones').val();
                                                    var d = [];
                                                    var a = $('#website').val();
                                                    var b = $('#description').val();
                                                    // var d[] = $('#socials').val();
                                                    var d = $('#socials').val();
                                                    
                                                    // $('#socials').val();
                                                    var e = $('#mission').val();
                                                    //  alert(d);
                                                    $.ajax({
                                                    url: "<?= base_url('Supplier/supplierUpdate2');?>",
                                                    method: "POST",
                                                    data: {
                                                    a: a,
                                                    b: b,
                                                    d: d,
                                                    e: e,
                                                    country: country,
                                                    state:state,
                                                    address:address,
                                                    zipcode:zipcode,
                                                    language:language,
                                                    currency:currency,
                                                    timeZones:timeZones
                                                    },
                                                    dataType: "json",
                                                    success: function(res) {
                                                    $('.div').hide();
                                                    $('.rohit').show();
                                                    $('.rohit').html(res.success);
                                                    }
                                                    });
                                                    // }
                                                    });
                                                    });
                                                    </script>
                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                    $('.rohittt').on('click', function(e) {
                                                    e.preventDefault();
                                                    var bio = $('#bio_man').val();
                                                    var date = $('#date_man').val();
                                                    
                                                    
                                                    
                                                    $.ajax({
                                                    url: "<?= base_url('Supplier/supplierUpdate4');?>",
                                                    method: "POST",
                                                    data: {
                                                    bio:bio,
                                                    date:date,
                                                    
                                                    
                                                    },
                                                    dataType: "json",
                                                    success: function(res) {
                                                    $('.div').hide();
                                                    $('.rohit').show();
                                                    $('.rohit').html(res.success);
                                                    }
                                                    });
                                                    // }
                                                    });
                                                    });
                                                    </script>
                                                    <!-- <script type="text/javascript">
                                                    $("document").ready(function() {
                                                    $('#firstbtn').on('click', function() {
                                                    //  var sId = $(this).val();
                                                    // alert('sId');
                                                    var turnover = $('#turnover').val();
                                                    var address = $('#address').val();
                                                    var brand_name = $('#brand_name').val();
                                                    var ind = $('#ind').val();
                                                    
                                                    $.ajax({
                                                    url: "<?= base_url('/Supplier/supplierUpdate')?>",
                                                    type: "POST",
                                                    data: {
                                                    turnover:turnover,
                                                    address:address,
                                                    ind:ind,
                                                    brand_name:brand_name
                                                    },
                                                    processData: false,
                                                    contentType: false,
                                                    cache: false,
                                                    dataType: "json",
                                                    success: function(data) {
                                                    // $('.msg_box').show();
                                                    alert('ijihj');
                                                    // $('.msg_at').html(data.msg);
                                                    // topFunction();
                                                    }
                                                    
                                                    });
                                                    });
                                                    
                                                    
                                                    });
                                                    function topFunction() {
                                                    document.body.scrollTop = 10;
                                                    document.documentElement.scrollTop = 10;
                                                    }
                                                    </script> -->
                                                    <script>
                                                    $(document).ready(function(){
                                                    $('.approve_btn').on('click', function(){
                                                    var id= $(this).attr('data-id');
                                                    var version= $(this).attr('data-version');
                                                    // alert(version);
                                                    // alert('Do you want to approve ?');
                                                    $.ajax({
                                                    url: "<?= base_url('/Brand/approvePolicy/')?>/" + id+ "/" + version,
                                                    method: "GET",
                                                    success: function(result) {
                                                    location.reload(true);
                                                    
                                                    }
                                                    });
                                                    });
                                                    });
                                                    </script>
                                                    <script>
                                                    function getNext() {
                                                    // alert();
                                                    $('#accordionMarginOne').removeClass('show');
                                                    $('#accordionMarginTwo').addClass('collapse show');
                                                    }
                                                    </script>
                                                    <script>
                                                    $(document).ready(function(){
                                                    $('#mmmm').on('click', function(){
                                                    var id = $('select[name="for_longer[]"]').val();
                                                    alert(id);
                                                    // alert(version);
                                                    // alert('Do you want to approve ?');
                                                    $.ajax({
                                                    url: "<?= base_url('/Supplier/alertttt/')?>",
                                                    method: "POST",
                                                    data:{
                                                    id:id,
                                                    },
                                                    success: function(result) {
                                                    
                                                    
                                                    }
                                                    });
                                                    });
                                                    });
                                                    </script>
                                                    <?= $this->endSection() ?>
                                                    <script>
                                                    var toggle = document.getElementById('toggle_btn')
                                                    let isToggle = true;
                                                    function myFunction() {
                                                    var textArea = document.getElementById('color_change')
                                                    isToggle = !isToggle
                                                    if (isToggle) {
                                                    textArea.value =
                                                    `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
                                                    } else {
                                                    console.log("ok ok")
                                                    textArea.value =
                                                    `<iframe src="https://bigsolution.co.in/admin/brand_black_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
                                                    }
                                                    }
                                                    </script>
                                                    <!-- color change by toggle btn end -->
                                                    <script>
                                                    $(document).ready(function() {
                                                    $('[data-toggle="tooltip"]').tooltip();
                                                    });
                                                    // range slider
                                                    $("#ex13").slider({
                                                    ticks: [0, 100, 200],
                                                    ticks_labels: ['$0', '$100', '$200'],
                                                    ticks_snap_bounds: 30
                                                    });
                                                    </script>
                                                    <script>
                                                    var input = document.getElementById('addquick');
                                                    
                                                    var trip_from = new google.maps.places.Autocomplete(input);
                                                    
                                                    </script>