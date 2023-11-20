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
            <!--<link rel="stylesheet" href="<?php echo base_url('public/brand/assets/assets/css/al-range-slider.css')?>" />-->
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
            .businessDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .productDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .locationsDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .marketservedDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .employeeworkerDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .differentlyemployeeworkerDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .participationDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .nameofholdingDiv{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
            }
            .bg-gray{
            background: #f7f7f7;
            padding: 20px 6px;
            border-bottom: 1px solid #ddd;
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
                                             <div class="accordion-body p-0">
                                                <!-- Vertical Wizard -->
                                                <section class="vertical-wizard">
                                                   <div class="bs-stepper vertical vertical-wizard-example">
                                                      <div class="bs-stepper-header">
                                                         <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">1</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Basic Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Basic Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                         <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">2</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Social Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Social Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                         <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">3</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Activity Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Activity Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                         <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">4</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Operations Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Operation Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                         <div class="step" data-target="#workforce-vertical" role="tab" id="workforce-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">5</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Workforce Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Workforce Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                         <div class="step" data-target="#other-vertical" role="tab" id="other-vertical-trigger">
                                                            <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">6</span>
                                                            <span class="bs-stepper-label">
                                                               <span class="bs-stepper-title">Other Info</span>
                                                               <span class="bs-stepper-subtitle">Setup Other Information</span>
                                                            </span>
                                                            </button>
                                                         </div>
                                                      </div>
                                                      <div class="bs-stepper-content">
                                                         <div
                                                            id="account-details-vertical"
                                                            class="content"
                                                            role="tabpanel"
                                                            aria-labelledby="account-details-vertical-trigger"
                                                            >
                                                            <div class="content-header">
                                                               <h5 class="mb-0">Basic Info</h5>
                                                               <small class="text-muted">Enter Basic Information</small>
                                                            </div>
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
                                                                  value="<?= $all['brand_name']?>" disabled/>
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
                                                                  <select  class="form-control select2" id="countray" name='countray' disabled>
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
                                                                     id="ind_cate" name='ind_cate' disabled>
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
                                                                     id="state" name='statee' required="" disabled>
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
                                                                     name='ind' id='ind' disabled>
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
                                                                  value="<?= $all['address']?>" disabled/>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label"
                                                                  for="email">Size</label>
                                                                  <select class="form-control select2" name='size' disabled>
                                                                     <option value="">Select Size</option>
                                                                     <option value="1" selected>
                                                                        <?= $size['company_size']?>
                                                                     </option>
                                                                  </select>
                                                               </div>
                                                              
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-outline-secondary btn-prev" disabled>
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button class="btn btn-primary btn-next">
                                                               <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                               <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
                                                            <div class="content-header">
                                                               <h5 class="mb-0">Social Info</h5>
                                                               <small>Enter Company's social information .</small>
                                                            </div>
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
                                                                  <textarea class="form-control" required  name='description' id="description"  placeholder="Enter the Description of the company"> <?= $all['description']?> </textarea>
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
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-primary btn-prev">
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button type="submit" id="Secondbtn" class="btn btn-primary btn-next">
                                                               <span class="align-middle d-sm-inline-block d-none" >Next</span>
                                                               <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="address-step-vertical-trigger">
                                                            <div class="content-header">
                                                               
                                                               <h5 class="mb-0">Activity Info</h5>
                                                               <small>Enter Your Enter Company's activity information</small>
                                                            </div>
                                                            <!--business activites setion-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">
                                                                  1. Select the list of business activites accounting for 90% of the Turnover.</h5>
                                                               </div>
                                                               <?php
                                                               $count = [];
                                                               $per = json_decode($all['percentage']);
                                                               $act = json_decode($all['activities']);
                                                               $count = $per;
                                                               if($count > 0){
                                                               foreach($per as $key => $row){
                                                               ?>
                                                               <?php if($key == '0'){?>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-address">Industry</label>
                                                                  <select class="form-control" name="industry" id="industry">
                                                                     <option value="">Select Industry</option>
                                                                     <option value="<?= $industry_cate['id']?>"
                                                                     selected><?= $industry_cate['industry_category_name']?></option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Sub Industry</label>
                                                                  <select class="form-control" name='subindustry[]' id="subindustry[]">
                                                                     <option value=""></option>
                                                               <option value="<?= $industry['id']?>" selected><?= $industry['industry_name']?></option>
                                                                     
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Activity</label>
                                                                  <select class="form-control" name='activities[]' id='activities[]'>
                                                                     <?php foreach($activities as $row):
                                                                     if($row['id'] == $act[$key]):?>
                                                                     <option value="<?= $row['id']?>" selected><?= $row['subsubindustry']?></option>
                                                                     <?php else: ?>
                                                                     <option value="<?= $row['id']?>">
                                                                     <?= $row['subsubindustry']?></option>
                                                                     <?php
                                                                     endif;
                                                                     endforeach;?>
                                                                  </select>
                                                               </div>
                                                               
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">Holding Percentage</label>
                                                                  <input type="number" id="percentage"  name='percentage[]' class="form-control percentage" placeholder="" value="<?= $per[$key] ;?>"/>
                                                               </div>
                                                              
                                                               <?php 
                                                               }}}
                                                               ?>
                                                                <?php
                                                               $count = [];
                                                               $per = json_decode($all['percentage']);
                                                               $act = json_decode($all['activities']);
                                                               $count = $per;
                                                               if($count > 0){
                                                               foreach($per as $key => $row){
                                                               ?>
                                                               <?php if($key == !'0'){?>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-address">Industry</label>
                                                                  <select class="form-control" name="industry" id="industry">
                                                                     <option value="">Select Industry</option>
                                                                     <option value="<?= $industry_cate['id']?>"
                                                                     selected><?= $industry_cate['industry_category_name']?></option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Sub Industry</label>
                                                                  <select class="form-control" name='subindustry[]' id="subindustry[]">
                                                                     <option value=""></option>
                                                               <option value="<?= $industry['id']?>" selected><?= $industry['industry_name']?></option>
                                                                     
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Activity</label>
                                                                  <select class="form-control" name='activities[]' id='activitiess[]'>
                                                                     
                                                                     <?php foreach($activities as $row):
                                                                     if($row['id'] == $act[$key]):?>
                                                                     <option value="<?= $row['id']?>" selected><?= $row['subsubindustry']?></option>
                                                                     <?php else: ?>
                                                                     <option value="<?= $row['id']?>">
                                                                     <?= $row['subsubindustry']?></option>
                                                                     <?php
                                                                     endif;
                                                                     endforeach;?>
                                                                  </select>
                                                               </div>
                                                               
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">Holding Percentage</label>
                                                                  <input type="number" id="percentage"  name='percentageee[]' class="form-control percentage" placeholder="" value="<?= $per[$key] ;?>"/>
                                                               </div>
                                                              <div class="mb-1 col-md-3">
                                                          <button class="remove_business_activity_block btn btn-danger btn-sm" style="margin-top: 28px;"><i class="fa-solid fa-xmark"></i></button>
                                                               </div>
                                                               <?php 
                                                               }?>

                                                           <?php 
                                                        }?>
                                                         

                                                           <?php }
                                                               ?>
                                                               
                                                               <div class="mb-1 col-md-3">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addBusinessActivityDiv()" style="margin-top: 28px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="business_activity_div"></span>
                                                            <!--end business activityvv-->
                                                            
                                                            
                                                            <!--start product service-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">2. Products/Services Sold by the entity (Accounting for 90% of the entity's turnover)</h5>
                                                               </div>
                                                               <?php
                                                               if($ssd_data){
                                                               
                                                               $name = json_decode($ssd_data['name']);
                                                               $address = json_decode($ssd_data['address']);
                                                               $percentage = json_decode($ssd_data['percentage']);
                                                               $sub_industry = json_decode($ssd_data['sub_industry']);
                                                               $industry = json_decode($ssd_data['industry']);
                                                               foreach($name as $key => $row){
                                                               ?>
                                                               <?php if($key == '0'){?>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-address">Product/Service</label>
                                                                  <input type="text" class="form-control" name="product_services[]" placeholder="Enter Product/Service"id="product_services" value="<?php echo $row;?>">
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">NIC Code</label>
                                                                  <label class="form-label" for="vertical-landmark"> </label>
                                                                  <select class="form-control" name="nic_code[]" id="nic_code[]">
                                                                      <option >Select the NIC Code</option>
                                                                     <?php foreach($supplier as $id){?>
                                                                     <?php foreach($sub_industrya as $idd){?>
                                                                        <?php if($id['industry_id'] == $idd['industry']){?>

                                                                      
                                                                      <option value="<?php echo $idd['industry']; ?>"><?php echo $idd['subsubindustry']; ?></option>
                                                                        <?php
                                                                     }?>

                                                                        <?php
                                                                     }?>
                                                                     <?php
                                                                     }?>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">Holding Percentage</label>
                                                            <input type="number" id="holding_percentage" name="holding_percentage[]" class="form-control" placeholder="" value="<?= $percentage[$key]?>"/>
                                                               </div>
                                                               <div class="mb-1 col-md-9">
                                                                  
                                                               </div>
                                                               <?php
                                                            }?>
                                                              
                                                               <?php
                                                              }}

                                                               ?>
                                                               <?php
                                                               if($ssd_data){
                                                               
                                                               $name = json_decode($ssd_data['name']);
                                                               $address = json_decode($ssd_data['address']);
                                                               $percentage = json_decode($ssd_data['percentage']);
                                                               $sub_industry = json_decode($ssd_data['sub_industry']);
                                                               $industry = json_decode($ssd_data['industry']);
                                                               foreach($name as $key => $row){
                                                               ?>
                                                               <?php if($key == !'0'){?>
                                                               <div class="mb-1 col-md-6">
                                                                  
                                                                  

                                                                  <label class="form-label" for="vertical-address">Product/Service</label>
                                                                  <input type="text" class="form-control" name="product_servicess[]" id="product_services" value="<?php echo $row;?>">
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">NIC Code</label>
                                                                  <label class="form-label" for="vertical-landmark"> </label>
                                                                  <select class="form-control" name="nic_codeee[]" id="nic_code">
                                                                      <option >Select the NIC Code</option>
                                                                     <?php foreach($supplier as $id){?>
                                                                     <?php foreach($sub_industrya as $idd){?>
                                                                        <?php if($id['industry_id'] == $idd['industry']){?>

                                                                      
                                                                 <option value="<?php echo $idd['industry']; ?>"><?php echo $idd['subsubindustry']; ?></option>
                                                                        <?php
                                                                     }?>

                                                                        <?php
                                                                     }?>
                                                                     <?php
                                                                     }?>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Holding Percentage</label>
                                                            <input type="number" id="holding_percentage" name="holding_percentagee[]" class="form-control" placeholder="" value="<?= $percentage[$key]?>"/>
                                                               </div>

                                                               <div class="mb-1 col-md-6">

                                                            <button class="remove_product_service_block btn btn-danger btn-sm" style="margin-top: 28px;"><i class="fa-solid fa-xmark"></i></button>
                                                               </div>
                                                               <?php
                                                            }}?>
                                                               

                                                            <?php
                                                              }
                                                               ?>

                                                               <div class="mb-1 col-md-3">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addProductServiceDiv()" style="margin-top: 28px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="product_service_div"></span>
                                                            <!--end product service-->
                                                            
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-primary btn-prev">
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button id="Secondbtnnw" class="btn btn-primary btn-next Secondbtnnew">
                                                               <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                               <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div id="social-links-vertical" class="content" role="tabpanel" aria-labelledby="social-links-vertical-trigger">
                                                            <div class="content-header">
                                                               <h5 class="mb-0">Operations Info</h5>
                                                               <small>Enter Your Operations Information</small>
                                                            </div>
                                                            <!--locations section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">
                                                                  1. Number Of Locations where plants and/or operations/offices of the entity are situated</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-4">
                                                                  <label class="form-label" for="vertical-address">Locations</label>
                                                                  <select class="form-control">
                                                                     <option value="1">National</option>
                                                                     <option value="2">International</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">No. Of Plants</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter No. Of Plants" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">No. Of Offices</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter No. Of Offices" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Total</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" placeholder="" readonly />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addLocationsDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            
                                                            <span class="locations_div"></span>
                                                            <div class="bg-gray row" style="padding: 6px 10px;">
                                                                <div class="col-12">
                                                                <h4 class="float-end fw-bolder">Total</h4>
                                                                </div>
                                                            </div>
                                                            <!--end locations section-->
                                                            
                                                            <!--start market served-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">2. Markets Served by the entity</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-6">
                                                                  <!--<label class="form-label" for="vertical-address">Number Of State</label>-->
                                                                  <label for="exampleInputEmail1" style="width: 100%;margin-top: 3px;">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="1">National (Number Of States) </option>
                                                                     <option value="2">International (Number Of Countries)</option>
                                                            
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-4">
                                                                  <label class="form-label" for="vertical-landmark">Number</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter the Number" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addMarketServedDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="marketserved_div"></span>
                                                            <!--end market served-->
                                                            
                                                            <!--start contribution section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">3. What is the contribution of exports as a percentage of the total turnover of the entity?</h5>
                                                               </div>
                                                               
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-landmark">Scale Slider</label>
                                                                 <div class="progress progress-bar-dark" style="margin-top: 13px;">
                                                                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="75"aria-valuemax="100" style="width: 75%">
                                                                        </div>
                                                                    </div>
                                                               </div>
                                                               
                                                               
                                                               <div class="mb-1 col-md-6">
                                                                  <label class="form-label" for="vertical-address">Country</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select the Countries</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm">Save</button>
                                                               </div>
                                                            </div>
                                                            <!--end contribution section-->
                                                            
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-primary btn-prev">
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button class="btn btn-primary btn-next">
                                                               <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                               <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                            <div id="workforce-vertical" class="content" role="tabpanel" aria-labelledby="  workforce-vertical-trigger">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="content-header">
                                                                        <h5 class="mb-0">Workforce Info</h5>
                                                                        <small>Enter Your Workforce Information</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                  <select class="form-control">
                                                                     <option value="">Select Financial Year</option>
                                                                     <option value="">FY 2019-2020</option>
                                                                     <option value="">FY 2019-2021</option>
                                                                     <option value="">FY 2019-2022</option>
                                                                     <option value="">FY 2019-2023</option>
                                                                     <option value="">FY 2019-2024</option>
                                                                     <option value="">FY 2019-2025</option>
                                                                  </select>  
                                                                </div>
                                                            </div>
                                                            <!--start employee and workers section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">1. Employee and workers (Including differently abled)</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-address">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="1">Permanent</option>
                                                                     <option value="2">Other then Permanent</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="1">Employees</option>
                                                                     <option value="2">Worker</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select Gender</option>
                                                                     <option value="male">Male</option>
                                                                     <option value="female">Female</option>
                                                                     <option value="other">Other</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Total</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addEmployeeWorkerDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="employee_worker_div"></span>
                                                            <!--end employee and workers section-->
                                                            
                                                            <!--start differently employee section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">2. Differently abled Employee and workers:</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-address">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="">Permanent</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="">Differently abled Employees</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">&nbsp;</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select Gender</option>
                                                                     <option value="male">Male</option>
                                                                     <option value="female">Female</option>
                                                                     <option value="other">Other</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Total</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addDifferentlyEmployeeWorkerDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="differently_employee_worker_div"></span>
                                                            <!--end differently employee section-->
                                                            
                                                            <!--start participation section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">3. Participation/Inclution/Representation of Women</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-5">
                                                                  <label class="form-label" for="vertical-address">Board Of Directors</label>
                                                                  <select class="form-control">
                                                                     <option value="">Board Of Directors</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-3">
                                                                  <label class="form-label" for="vertical-landmark">Gender</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select Gender</option>
                                                                     <option value="male">Male</option>
                                                                     <option value="female">Female</option>
                                                                     <option value="other">Other</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Total</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addparticipationDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="participation_div"></span>
                                                            <!--end participation section-->
                                                            
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-primary btn-prev">
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button class="btn btn-primary btn-next">
                                                               <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                               <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div id="other-vertical" class="content" role="tabpanel" aria-labelledby="other-vertical-trigger">
                                                            <div class="content-header">
                                                               <h5 class="mb-0">Other Info</h5>
                                                               <small>Enter Your Other Information</small>
                                                            </div>
                                                            <!--start name of holding section-->
                                                            <div class="row bg-gray">
                                                               <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">1. Name Of Holding/Subsidiary/Associate Companies/Joint Venture/Franchise/Investments</h5>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-address">Name</label>
                                                                  <input type="text" id="vertical-landmark" class="form-control" placeholder="" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Location</label>
                                                                  <input type="text" id="vertical-landmark" class="form-control" placeholder="" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Industry</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select Industry</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Sub Industry</label>
                                                                  <select class="form-control">
                                                                     <option value="">Select Sub Industry</option>
                                                                  </select>
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label class="form-label" for="vertical-landmark">Percentage</label>
                                                                  <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" />
                                                               </div>
                                                               <div class="mb-1 col-md-2">
                                                                  <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                  <button type="button" class="btn btn-dark btn-sm" onclick="addnameofholdingDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
                                                               </div>
                                                            </div>
                                                            <span class="name_of_holding_div"></span>
                                                            <!--end name of hodling section-->
                                                            
                                                            <!--start CSR Detail section-->
                                                            <div class="row bg-gray">
                                                               <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="content-header">
                                                                            <h5 class="mb-0 text-black fw-bolder">2. Whether CSR applicable as per section 135 of companies Act 2013</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <select class="form-control">
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class="col-sm-4">
                                                                        <label class="col-form-label" for="first-name">Company Turnover (in INR)</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" id="first-name" class="form-control" name="fname" placeholder="Enter the Turnover">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-1 row">
                                                                    <div class="col-sm-4">
                                                                        <label class="col-form-label" for="email-id">Company Net Worth (in INR)</label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Enter the Net Worth">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end CSR Detail section-->
                                                            
                                                            <!--start CSR Detail section-->
                                                            <div class="row bg-gray">
                                                                <div class="content-header">
                                                                  <h5 class="mb-0 text-black fw-bolder">3. Complaints/Grievances under the National guidelines on responsible business conduct</h5>
                                                                </div>
                                                                
                                                            </div>
                                                            <!--end CSR Detail section-->
                                                            
                                                            <div class="d-flex justify-content-between mt-3">
                                                               <button class="btn btn-primary btn-prev">
                                                               <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                               <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                               </button>
                                                               <button class="btn btn-primary btn-submit">Submit</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </section>
                                                <!-- /Vertical Wizard -->
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
                                                                           <?php echo $count['name'];?>
                                                                        </option>
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
                                                               <button class="btn btn-primary btn-next" id="Secondbtnn">
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
                                                               Information.
                                                               </h5>
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
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js');?>"></script>
                                 <script
                                 src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-repeater.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/auth-register.min.js');?>"></script>
                                 <script src="<?php echo base_url('public/brand/assets/assets/js/al-range-slider.js')?>"></script>
                                 <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                                 <script>
                                 // Start Business Activity add more
                                 function addBusinessActivityDiv(){
                                 $('.business_activity_div').append('<div class="businessDiv row"><div class="mb-1 col-md-6">\
                                    <label class="form-label" for="vertical-address">Industry</label>\
                                    <select class="form-control" name="industry" id="industry">\
                                       <option value=""></option>\
                                       <option value="<?= $industry_cate['id']?>"\
                                              selected><?= $industry_cate['industry_category_name']?></option>\
                                    </select>\
                                 </div>\
                                 <div class="mb-1 col-md-6">\
                                    <label class="form-label" for="vertical-landmark">Sub Industry</label>\
                                    <select class="form-control" id="subindustry[]" name="subindustry[]">\
                                       <option value="0"></option>\
                                       <option value="<?= $industry['id']?>" selected><?= $industry['industry_name']?></option>\
                                           </select>\
                                 </div>\
                                  <div class="mb-1 col-md-6">\
                                    <label class="form-label" for="vertical-landmark">Activity</label>\
                                    <select class="form-control" id="activitiess[]" name="activities[]">\
                                       <option value=""></option>\
                                       <?php foreach($activities as $row):
                                          if($row['id'] == $act[$key]):?>\
                                             <option value="<?= $row['id']?>" selected><?= $row['subsubindustry']?></option>\
                                                <?php else: ?>
                                                   <option value="<?= $row['id']?>">\
                                                                     <?= $row['subsubindustry']?></option>\
                                                                     <?php
                                                                     endif;
                                                                     endforeach;?>
                                    </select>\
                                 </div>\
                                 <div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-landmark">Holding Percentage</label>\
                                    <input type="text" id="percentage" name="percentagee[]" class="form-control percentage" placeholder="Borough bridge" />\
                                 </div>\
                                 <div class="mb-1 col-md-3">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addBusinessActivityDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    &nbsp;<button class="remove_business_activity_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa fa-trash"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_business_activity_block',function(){
                                 $(this).closest('.businessDiv').remove();
                                 });
                                 // end Business Activity add more
                                 
                                 // Start product service add more
                                 function addProductServiceDiv(){
                                 $('.product_service_div').append('<div class="productDiv row"><div class="mb-1 col-md-6">\
                                    <label class="form-label" for="vertical-address">Product/Service</label>\
                                    <input type="text" class="form-control" name="product_servicesss[]" placeholder="Enter Product/Service" id="product_services">\
                                 </div>\
                                 <div class="mb-1 col-md-6">\
                                    <label class="form-label" for="vertical-landmark">NIC Code</label>\
                                    <select class="form-control" id="nic_code[]" name="nic_codee[]">\
                                    <option >Select the NIC Code</option>\
                                       <?php foreach($supplier as $id){?>
                                                                     <?php foreach($sub_industrya as $idd){?>
                                                                        <?php if($id['industry_id'] == $idd['industry']){?>
                                   <option value="<?php echo $idd['industry']; ?>"><?php echo $idd['subsubindustry']; ?></option>\
                                                                        <?php
                                                                     }?>
                                                                       <?php
                                                                     }?>
                                                                     <?php
                                                                     }?>
                                    </select>\
                                 </div>\
                                 <div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-landmark">Holding Percentage</label>\
                                    <input type="text" id="holding_percentage" name="holding_percentageee[]" class="form-control" placeholder="Borough bridge" />\
                                 </div>\
                                 <div class="mb-1 col-md-3">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addProductServiceDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    &nbsp;<button class="remove_product_service_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa fa-trash"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_product_service_block',function(){
                                 $(this).closest('.productDiv').remove();
                                 });
                                 // end product service add more
                                 
                                 // Start location add more
                                 function addLocationsDiv(){
                                 $('.locations_div').append('<div class="locationsDiv row"><div class="mb-1 col-md-4">\
                                    <label class="form-label" for="vertical-address">Location</label>\
                                    <select class="form-control">\
                                        <option value="1">National</option>\
                                        <option value="2">International</option>\
                                    </select>\
                                 </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">No. Of Plants</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter the No. Of Plants" />\
                                 </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">No. Of Offices</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter No. Of Offices" />\
                                 </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Total</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" placeholder="" readonly />\
                                 </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addLocationsDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    &nbsp;<button class="remove_location_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_location_block',function(){
                                 $(this).closest('.locationsDiv').remove();
                                 });
                                 // end product service add more
                                 
                                 // Start market served add more
                                 function addMarketServedDiv(){
                                 $('.marketserved_div').append('<div class="marketservedDiv row"><div class="mb-1 col-md-6">\
                                    <label for="exampleInputEmail1" style="width: 100%;margin-top: 3px;">&nbsp;</label>\
                                    <select class="form-control">\
                                       <option value="1">National (Number Of States) </option>\
                                       <option value="2">International (Number Of Countries)</option>\
                                    </select>\
                                 </div>\
                                 <div class="mb-1 col-md-4">\
                                    <label class="form-label" for="vertical-landmark">Number</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="Enter the Number"  />\
                                 </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addMarketServedDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    <button class="remove_market_served_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_market_served_block',function(){
                                 $(this).closest('.marketservedDiv').remove();
                                 });
                                 // end market served add more
                                 
                                 // Start employee workerd add more
                                 function addEmployeeWorkerDiv(){
                                 $('.employee_worker_div').append('<div class="employeeworkerDiv row"><div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-address">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="1">Permanent</option>\
                                        <option value="2">Other then Permanent</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-landmark">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="1">Employees</option>\
                                        <option value="2">Workers</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Select Gender</option>\
                                        <option value="male">Male</option>\
                                        <option value="female">Female</option>\
                                        <option value="other">Other</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Total</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />\
                                </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addEmployeeWorkerDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    <button class="remove_employee_worker_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_employee_worker_block',function(){
                                    $(this).closest('.employeeworkerDiv').remove();
                                 });
                                 // end employee workerd add more
                                 
                                 // Start differently employee workerd add more
                                 function addDifferentlyEmployeeWorkerDiv(){
                                 $('.differently_employee_worker_div').append('<div class="differentlyemployeeworkerDiv row"><div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-address">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Permanent</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-landmark">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Differently abled Employees</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Select Gender</option>\
                                        <option value="male">Male</option>\
                                        <option value="female">Female</option>\
                                        <option value="other">Other</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Total</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />\
                                </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addDifferentlyEmployeeWorkerDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    <button class="remove_differently_employee_worker_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_differently_employee_worker_block',function(){
                                    $(this).closest('.differentlyemployeeworkerDiv').remove();
                                 });
                                 // end employee workerd add more
                                 
                                 // Start participation add more
                                 function addparticipationDiv(){
                                 $('.participation_div').append('<div class="participationDiv row"><div class="mb-1 col-md-5">\
                                    <label class="form-label" for="vertical-address">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Board Of Directors</option>\
                                        <option value="">Key Management Personal</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-3">\
                                    <label class="form-label" for="vertical-landmark">&nbsp;</label>\
                                    <select class="form-control">\
                                        <option value="">Select Gender</option>\
                                        <option value="male">Male</option>\
                                        <option value="female">Female</option>\
                                        <option value="other">Other</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Total</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" readonly />\
                                </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addparticipationDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    <button class="remove_participation_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_participation_block',function(){
                                    $(this).closest('.participationDiv').remove();
                                 });
                                 // end participation add more
                                 
                                 // Start name of holding add more
                                 function addnameofholdingDiv(){
                                 $('.name_of_holding_div').append('<div class="nameofholdingDiv row"><div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-address">Name</label>\
                                    <input type="text" id="vertical-landmark" class="form-control" placeholder="" />\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Location</label>\
                                    <input type="text" id="vertical-landmark" class="form-control" placeholder="" />\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Industry</label>\
                                    <select class="form-control">\
                                        <option value="">Select Industry</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Sub Industry</label>\
                                    <select class="form-control">\
                                        <option value="">Select Sub Industry</option>\
                                    </select>\
                                </div>\
                                <div class="mb-1 col-md-2">\
                                    <label class="form-label" for="vertical-landmark">Percentage</label>\
                                    <input type="number" id="vertical-landmark" class="form-control" min="0" placeholder="" />\
                                </div>\
                                 <div class="mb-1 col-md-2">\
                                    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>\
                                    <button type="button" class="btn btn-dark btn-sm" onclick="addnameofholdingDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>\
                                    <button class="remove_name_of_holding_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>\
                                 </div></div>');
                                 }
                                 $(document).on('click','.remove_name_of_holding_block',function(){
                                    $(this).closest('.nameofholdingDiv').remove();
                                 });
                                 // end name of holding add more
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
                                 <script type="text/javascript">
                                 $(document).ready(function() {
                                 
                                 $('#deleteind').on('click', function(e) {
                                 e.preventDefault();
                                 
                                 
                                 var f = $(this).val();
                                 // alert(f);
                                 $.ajax({
                                 
                                 url: "<?= base_url('Supplier/supplierUpdate');?>",
                                 method: "POST",
                                 data: {
                                 
                                 
                                 },
                                 
                                 dataType: "json",
                                 success: function(res) {
                                 
                                 
                                 
                                 
                                 }
                                 
                                 
                                 
                                 // }
                                 
                                 });
                                 
                                 });
                                 });
                                 
                                 </script>
                                 
                                
                                 <script type="text/javascript">
                                 $(document).ready(function() {
                                 
                                 $('#Secondbtn').on('click', function(e) {
                                 
                                 e.preventDefault();
                                 var country = $('#country_man').val();
                                 // alert('ll');
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
                                 // alert(d);
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
                                    
                                 
                                 $('.Secondbtnnew').on('click', function(e) {
                                 
                                 e.preventDefault();
                                 var industry= [];
                               
                            
                                 var industry = $('input[name="industry[]"]').val();
                                
                                 var subindustry = $('#subindustry').val();
                                  

                                 var percentage = $('input[name="percentage[]"]').val();
                                 var percentagee = $('input[name="percentagee[]"]').val();
                                 var percentageee = $('input[name="percentageee[]"]').val();
                              

                                 var activities = $('input[name="activities[]"]').val();
                                 var activitiess = $('input[name="activitiess[]"]').val();
                                 var activitiesss = $('input[name="activitiesss[]"]').val();
                                
                                 var nic_code = $('input[name="nic_code[]"]').val();
                                 var nic_codee = $('input[name="nic_codee[]"]').val();
                                 var nic_codeee = $('input[name="nic_codeee[]"]').val();
                                 
                                 var product_services = $('input[name="product_services[]"]').val();
                                 var product_servicess = $('input[name="product_servicess[]"]').val();
                                 var product_servicesss = $('input[name="product_servicesss[]"]').val();
                                
                                 
                                 var holding_percentage = $('input[name="holding_percentage[]"]').val();
                                 var holding_percentagee = $('input[name="holding_percentagee[]"]').val();
                                 var holding_percentageee = $('input[name="holding_percentageee[]"]').val();
                                 
                                
                                 
                                 $.ajax({
                                 
                                 url: "<?= base_url('Supplier/supplierSubsidiaryUpdate');?>",
                                 
                                 method: "POST",
                                 
                                 data: {
                                 
                                 industry:industry,
                                 
                                 subindustry:subindustry,
                                 
                                 activities:activities,
                                 activitiess:activitiess,
                                 activitiesss:activitiesss,
                                 
                                 percentage:percentage,
                                 percentagee:percentagee,
                                 percentageee:percentageee,
                                 
                                 nic_code:nic_code,
                                 nic_codee:nic_codee,
                                 nic_codeee:nic_codeee,
                                 
                                 product_services:product_services,
                                 product_servicess:product_servicess,
                                 product_servicesss:product_servicesss,
                                 
                                 holding_percentage:holding_percentage,
                                 holding_percentagee:holding_percentagee,
                                 holding_percentageee:holding_percentageee,
                                 
                                 },
                                 
                                 dataType: "json",
                                 
                                 success: function(res) {
                                 
                                 
                                 
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