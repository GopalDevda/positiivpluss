<?php  use App\Models\ActionCenterModel; ?>

<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?= $this->endSection();?>

<?= $this->section('content') ?>


<div class="app-content content rohitbluer">
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

<div class="modal fade" id="modal-bluer">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      
    </div>
    
  </div>
</div>
</div>
      <!-- <?php 
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
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('error');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?> -->
      <div class="content-body">
        <section id="basic-horizontal-layouts">
          <div class="row">
              
              <!--Graph Start-->
            <div class="col-md-12 col-12">
              <div class="row">
                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color">15.99%</h3>
                        <span class="text-white">Active</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                        <i class="fa-brands fa-affiliatetheme"></i>                </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color">12</h3>
                        <span class="text-white">Products</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-brands fa-product-hunt"></i>                
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color">5</h3>
                        <span class="text-white">Locations</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-solid fa-location-dot"></i>                
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <?php if($role == 10) { ?>
                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color"><?php echo $allemployemana  ?></h3>
                        <span class="text-white">Employees</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-solid fa-users"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                 <?php

                 } else if($role == 11) { ?>

                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color"><?php echo $allemploy  ?></h3>
                        <span class="text-white">Employees</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-solid fa-users"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                 <?php } else if($role == 0) { ?>

                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color"><?php echo $allemployemana  ?></h3>
                        <span class="text-white">Employees</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-solid fa-users"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                 <?php } 
                 else { ?>

                 <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color">0</h3>
                        <span class="text-white">Employees</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                          <i class="fa-solid fa-users"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>


              <?php   } ?>
              </div>
            </div>   
            
            <section id="basic-horizontal-layouts">
            <div class="row"> 
            </div>
         </section>
         
         
            
            <!--<div class="col-md-12 col-12">-->
            <!--  <div class="card">-->
            <!--    <div class="card-header">-->
                  <!-- <h4 class="card-title">Indicators</h4> -->
            <!--    </div>-->
            <!--    <div class="card-body">-->
            <!--     <div class='tableauPlaceholder' id='viz1657020766713' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;sa&#47;sample05-07-2022&#47;Dashboard2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='path' value='views&#47;sample05-07-2022&#47;Dashboard2?:language=en-GB&amp;:embed=true&amp;publish=yes' /> <param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;sa&#47;sample05-07-2022&#47;Dashboard2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-GB' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1657020766713');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else { vizElement.style.width='100%';vizElement.style.height='727px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script> </div>              </div>-->
            <!--</div>-->
            
            <!--Graph End-->
          </div>
        </section>
         <!-- Dashboard Ecommerce Starts -->
        <section id="dash-ecommerce">
            <div class="row match-height">
    <div class="col-lg-4 col-12">
      <div class="row match-height">
        <!-- Bar Chart - USD -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50">
              <h6>Emission/Turnover</h6>
              <h2 class="fw-bolder mb-1"><?php echo  number_format($total_emp,2); ?> kg CO2e</h2>
              <!-- <div id="statistics-order-chart"></div> -->
            </div>
          </div>
        </div>
        <!--/ Bar Chart - USD -->

        <!-- Line Chart - Employees -->
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Emission/Emp <!--loyee--></h6>
            
              <h2 class="fw-bolder mb-1"><?php echo  number_format($total_emision,2); ?> kg CO2e</h2>
              <!-- <div id="statistics-profit-chart"></div> -->
            </div>
          </div>
        </div>
        <!--/ Line Chart - Employees -->

        <!-- Earnings Card -->
        <div class="col-lg-12 col-md-6 col-12">
          <div class="card earnings-card">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <h6 >Emission/Month</h6>
                  <div class="font-small-2">This Month</div>
                  <h5 class="mb-1"><?php echo $emision_aa  ?> kg CO2e</h5>
                  <p class="card-text text-muted font-small-2">
                    <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                  </p>
                </div>
                <div class="col-6">
                  <div id="earnings-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Earnings Card -->
      </div>
    </div>

    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-8 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <h4 class="card-title mb-50 mb-sm-0">Emission's <!--Report--></h4>
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center me-2">
                  <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                  <span>Scope-1</span>
                </div>
                <div class="d-flex align-items-center ms-75">
                  <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                  <span>Scope-2</span>
                </div>
                <div class="d-flex align-items-center ms-75">
                  <span class="bullet bullet-info font-small-3 me-50 cursor-pointer"></span>
                  <span>Scope-3</span>
                </div>
              </div>
            </div>
            <div id="revenue-report-chart"></div>
          </div>
          <div class="col-md-4 col-12 budget-wrapper">
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                2020
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">2020</a>
                <a class="dropdown-item" href="#">2019</a>
                <a class="dropdown-item" href="#">2018</a>
              </div>
            </div>
            <h2 class="mb-25">Total:</h2>
            <div class="d-flex justify-content-center">
              <!--<span class="fw-bolder me-25">Total:</span>-->
              <span  class="fw-bolder me-25">00.00</span>
            </div>
            <!--<div id="budget-chart"></div>-->
            <!--<button type="button" class="btn btn-primary">Increase Budget</button>-->
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
  </div>
        </section>
         <!-- Dashboard Ecommerce ends -->
            <!-- Analytics Ecommerce start -->
            <section>
                <div class="row match-height">
                    <!-- Avg Sessions Chart Card starts -->
                    <div class="col-lg-6 col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row pb-50">
                            <div class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                              <div class="mb-1 mb-sm-0">
                                <h2 class="fw-bolder mb-25"><?php echo $ggg; ?></h2>
                                <p class="card-text fw-bold mb-2">Issue Reported</p>
                               <!--  <div class="font-medium-2"> -->
                                  <!-- <span class="text-success me-25">+5.2%</span>
                                  <span>
                                   From
                                  vs last 7 days</span> -->
                                  <form class="form" method="post" action="<?php echo base_url() ?>/Graph/index" enctype="multipart/form-data">
               
                              <label style="margin: 5px 0px;">From</label>
                            <input type="date" class="form-control" name="issue_from" id="issue_from" required>
                            <label style="margin: 5px 0px;">To</label>
                            <input type="date" name="issue_to" class="form-control" id="issue_to" required>
                            <br>
                             <div class="pt-0 px-5">
                             <button type="submit" class="btn btn-primary" value="issue"name="issue">Submit</button>
                             </div>
                      
                                </form>
                                <!-- </div> -->

                              </div>
                              <!-- <button type="button" class="btn btn-primary">View Details</button> -->
                            </div>
                            <div class="col-sm-6 col-12 d-flex justify-content-between flex-column text-end order-sm-2 order-1">
                              <div class="dropdown chart-dropdown">
                                <a href="https://user.positiivplus.io/supplier" 
                                  
                                >
                                  
 All
                                </a>
                               <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownItem5">
                                  <a class="dropdown-item" href="#">Last 28 Days</a>
                                  <a class="dropdown-item" href="#">Last Month</a>
                                  <a class="dropdown-item" href="#">Last Year</a>
                                </div> -->
                              </div>
                              <div id="avg-sessions-chart"></div>
                            </div>
                          </div>
                          <hr />
                          <div class="row avg-sessions pt-50">
                           <!--  <?php if($issue){ foreach($issue as $issu_name){
                            ?>
                            <div class="col-6 mb-2">
                              <p class="mb-50"><?= $issu_name['issue_name'] ?>: <?= $issu_name['id']?></p>
                              <div class="progress progress-bar-<?php if($issu_name['id']%2 ==0 )
                              {echo "primary";}else{echo "warning";} ?>" style="height: 6px">
                                <div
                                  class="progress-bar"
                                  role="progressbar"
                                  aria-valuenow="50"
                                  aria-valuemin="50"
                                  aria-valuemax="100"
                                  style="width: 50%"
                                ></div>
                              </div>
                            </div>
                            
                            <?php } } ?> -->
                            <div class="col-6 mb-2">
                              <p class="mb-50">Observation: <b><?php echo $o ?></b></p>
                            <?php if($ovv == '50'){ ?> 
                           <div class="progress progress-bar-danger" style="height: 6px">
                              <div class="progress-bar"
                               role="progressbar"
                               aria-valuenow="50"
                                 aria-valuemin="50"
                                aria-valuemax="100"
                                 style="width: <?php echo $ov ?>%"
                               ></div>
                            <?php }
                            else{?>
                    
                        <div class="progress progress-bar-warning" style="height: 6px">
                              <div class="progress-bar"
                               role="progressbar"
                               aria-valuenow="50"
                                 aria-valuemin="50"
                                aria-valuemax="100"
                                 style="width: <?php echo $ov ?>%"
                               ></div>

                          <?php  }?>
                            </div>
                           </div>
                            <div class="col-6">
                              <p class="mb-50">Maintenance:<b><?php echo $m ?></b></p>
                             <div class="progress progress-bar-danger" style="height: 6px">
                               <div
                                 class="progress-bar"
                                role="progressbar"
                               aria-valuenow="50"
                                aria-valuemin="50"
                                 aria-valuemax="100"
                                 style="width:<?php echo $mv ?>%"
                               ></div>
                             </div>
                            </div>
                            <div class="col-6">
                              <p class="mb-50">Near Miss: <b><?php echo $n ?></b></p>
                             <div class="progress progress-bar-primary" style="height: 6px">
                               <div
                                 class="progress-bar"
                                role="progressbar"
                               aria-valuenow="50"
                                aria-valuemin="50"
                                 aria-valuemax="100"
                                 style="width: <?php echo $nv ?>%"
                               ></div>
                             </div>
                            </div><div class="col-6">
                              <p class="mb-50">Incident: <b><?php echo $i ?></b></p>
                             <div class="progress progress-bar-danger" style="height: 6px">
                               <div
                                 class="progress-bar"
                                role="progressbar"
                               aria-valuenow="0"
                                aria-valuemin="10"
                                 aria-valuemax="100"
                                 style="width: <?php echo $iv ?>%"
                               ></div>
                             </div>
                            </div>
                            <div class="col-6">
                              <p class="mb-50">Hazard: <b><?php echo $h ?></b></p>
                           <div class="progress progress-bar-primary" style="height: 6px">
                              <div
                                  class="progress-bar"
                               role="progressbar"
                               aria-valuenow="0"
                                 aria-valuemin="10"
                                aria-valuemax="100"
                                 style="width: <?php echo $hv ?>%"
                               ></div>
                             </div>
                            </div>
                            <div class="col-6">
                              <p class="mb-50">Other: <b><?php echo $ot ?></b></p>
                              <?php if($ovv == '50'){ ?> 
                           <div class="progress progress-bar-danger" style="height: 6px">
                              <div class="progress-bar"
                               role="progressbar"
                               aria-valuenow="50"
                                 aria-valuemin="50"
                                aria-valuemax="100"
                                 style="width: <?php echo $ovv ?>%"
                               ></div>
                            <?php }
                            else{?>
                    
                        <div class="progress progress-bar-warning" style="height: 6px">
                              <div class="progress-bar"
                               role="progressbar"
                               aria-valuenow="50"
                                 aria-valuemin="50"
                                aria-valuemax="100"
                                 style="width: <?php echo $ovv ?>%"
                               ></div>

                          <?php  }?>
                                  
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Avg Sessions Chart Card ends -->
                
                    <!-- Support Tracker Chart Card starts -->
                    <div class="col-lg-6 col-12">
                      <div class="card">
                        <div class="card-header d-flex justify-content-between pb-0">
                          <h4 class="card-title">Action Tracker</h4>
                          
                        </div>
                        
                        <div class="card-body">
                            <div class="dropdown chart-dropdown">
                         <form class="form form-inline" method="post" action="<?php echo base_url() ?>/Graph/index" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col">
                                <label style="margin: 5px 0px;">From</label>
                                <input type="date" class="form-control" name="from_date" id="from_date" required>
                            </div>
                            <div class="col">
                                <label style="margin: 5px 0px;">To</label>
                                <input type="date" class="form-control" name="to_date" id="to_date" required>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary" value="action_tracker"name="action_tracker" style="float: right;margin-top: 13px;">Submit</button>
                            </div>
                            </div>
                                </form>
                            
                          </div>
                          <div class="row">
                            <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                              <h1 class="font-large-2 fw-bolder mt-2 mb-0"><?php echo $without_allaction; ?></h1>
                              <p class="card-text">Actions</p>
                            </div>
                            <div class="col-sm-10 col-12 d-flex justify-content-center">
                              <div id="support-trackers-chart"></div>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between mt-1">
                            <div class="text-center">
                              <p class="card-text mb-50">Pending Actions</p>
                              <span class="font-large-1 fw-bold"><?php echo $pending-$in_progress; ?></span>
                            </div>
                             <div class="text-center">
                              <p class="card-text mb-50">In Progress</p>
                              <span class="font-large-1 fw-bold"><?= $in_progress ?></span>
                            </div>
                            <div class="text-center">
                              <!--<p class="card-text mb-50">Response Time</p>-->
                              <p class="card-text mb-50">Completed Action</p>
                              <span class="font-large-1 fw-bold"><?php echo $complete; ?></span>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Support Tracker Chart Card ends -->
                </div>
            </section>
            <!-- Analytics Ecommerce start -->
         
         
      </div>
   </div>
</div>


<?php $scope; ?>
 <?php 
$db = \Config\Database::connect();
$session = session();
$o_id = session()->supplier_info['supplier_id'];
 $data = $db->query("SELECT COUNT(sd.id) as doc FROM `control_footprints` as sd WHERE sd.owner_id='".$o_id." ' and sd.status=1 ")->getResultArray();  

?>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>

<!--CHART JS-->
<!--<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/apexcharts.min.js')?>"></script>
<!--<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')?>"></script>-->
<!-- <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-analytics.min.js')?>"></script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
   $(document).ready(function() {
  $("#modal-bluer").modal('show');
  });
</script>
<script>
    $(window).on("load", (function() {
    "use strict";
    var o, e, r, t, a, s, i, l, n, d, h, c = "#f3f3f3",
        w = "#EBEBEB",
        p = "#b9b9c3",
        u = document.querySelector("#statistics-order-chart"),
        g = document.querySelector("#statistics-profit-chart"),
        b = document.querySelector("#earnings-chart"),
        y = document.querySelector("#revenue-report-chart"),
        m = document.querySelector("#budget-chart"),
        f = document.querySelector("#browser-state-chart-primary"),
        k = document.querySelector("#browser-state-chart-warning"),
        x = document.querySelector("#browser-state-chart-secondary"),
        C = document.querySelector("#browser-state-chart-info"),
        A = document.querySelector("#browser-state-chart-danger"),
        B = document.querySelector("#goal-overview-radial-bar-chart"),
        S = "rtl" === $("html").attr("data-textdirection");
    setTimeout((function() {
        toasr.success("", {
            closeButton: !0,
            tapToDismiss: !1,
            rtl: S
        })
    }), 2e3), o = {
        chart: {
            height: 70,
            type: "bar",
            stacked: !0,
            toolbar: {
                show: !1
            }
        },
        grid: {
            show: !1,
            padding: {
                left: 0,
                right: 0,
                top: -15,
                bottom: -15
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%",
                startingShape: "rounded",
                colors: {
                    backgroundBarColors: [c, c, c, c, c],
                    backgroundBarRadius: 5
                }
            }
        },
        legend: {
            show: !1
        },
        dataLabels: {
            enabled: !1
        },
        colors: [window.colors.solid.warning],
        series: [{
            name: "2020",
            data: [45, 85, 65, 45, 65]
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
        },
        yaxis: {
            show: !1
        },
        tooltip: {
            x: {
                show: !1
            }
        }
    }, 
    new ApexCharts(u, o).render(), e = {
        chart: {
            height: 70,
            type: "line",
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            }
        },
        grid: {
            borderColor: w,
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: !0
                }
            },
            yaxis: {
                lines: {
                    show: !1
                }
            },
            padding: {
                top: -30,
                bottom: -10
            }
        },
        stroke: {
            width: 3
        },
        colors: [window.colors.solid.danger],
        series: [{
            data: [0, 20, 5, 30, 15, 45]
        }],
        markers: {
            size: 2,
            colors: window.colors.solid.info,
            strokeColors: window.colors.solid.info,
            strokeWidth: 2,
            strokeOpacity: 1,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [{
                seriesIndex: 0,
                dataPointIndex: 5,
                fillColor: "#ffffff",
                strokeColor: window.colors.solid.info,
                size: 5
            }],
            shape: "circle",
            radius: 2,
            hover: {
                size: 3
            }
        },
        xaxis: {
            labels: {
                show: !0,
                style: {
                    fontSize: "0px"
                }
            },
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            }
        },
        yaxis: {
            show: !1
        },
        tooltip: {
            x: {
                show: !1
            }
        }
    }, 
    new ApexCharts(g, e).render(), r = {
        chart: {
            type: "donut",
            height: 120,
            toolbar: {
                show: !1
            }
        },
        dataLabels: {
            enabled: !1
        },
        series: [12, 16, <?php echo $emision_aa; ?>],
        legend: {
            show: !1
        },
        comparedResult: [2, -3, 8],
        labels: ["App", "Service", "Product"],
        stroke: {
            width: 0
        },
        colors: ["#28c76f66", "#28c76f33", window.colors.solid.success],
        grid: {
            padding: {
                right: -20,
                bottom: -8,
                left: -20
            }
        },
        plotOptions: {
            pie: {
                startAngle: -10,
                donut: {
                    labels: {
                        show: !0,
                        name: {
                            offsetY: 15
                        },
                        value: {
                            offsetY: -15,
                            formatter: function(o) {
                                return parseInt(o) + "%"
                            }
                        },
                        total: {
                            show: !0,
                            offsetY: 15,
                            label: "App",
                            formatter: function(o) {
                                return "53%"
                            }
                        }
                    }
                }
            }
        },
        responsive: [{
            breakpoint: 1325,
            options: {
                chart: {
                    height: 100
                }
            }
        }, {
            breakpoint: 1200,
            options: {
                chart: {
                    height: 120
                }
            }
        }, {
            breakpoint: 1045,
            options: {
                chart: {
                    height: 100
                }
            }
        }, {
            breakpoint: 992,
            options: {
                chart: {
                    height: 120
                }
            }
        }]
    }, new ApexCharts(b, r).render(), t = {
        chart: {
            height: 230,
            stacked: !0,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "17%",
                endingShape: "rounded"
            },
            distributed: !0
        },
        colors: [window.colors.solid.primary, window.colors.solid.warning],
        series: [{
            name: "Earning",
            // data: [95, 177, 284, 256, 105, 63, 168, 218, 72],
             data: [6, 177, 284, 256, 105, 63, 168, 218, 72]
        }, {
            name: "Expense",
             data: [-145, -80, -60, -180, -100, -60, -85, -75, -100],
             data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
        }],
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        grid: {
            padding: {
                top: -20,
                bottom: -10
            },
            yaxis: {
                lines: {
                    show: !1
                }
            }
        },        xaxis: {

            categories: [
            "jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"
            ],
            labels: {
                style: {
                    colors: p,
                    fontSize: "0.86rem"
                }
            },
            axisTicks: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
      
        yaxis: {
            labels: {
                style: {
                    colors: p,
                    fontSize: "0.86rem"
                }
            }
        }
    },
    new ApexCharts(y, t).render(), a = {
        chart: {
            height: 80,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            type: "line",
            sparkline: {
                enabled: !0
            }
        },
        stroke: {
            curve: "smooth",
            dashArray: [0, 5],
            width: [2]
        },
        colors: [window.colors.solid.primary, "#dcdae3"],
        series: [{
            data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
        }, {
            data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
        }],
        tooltip: {
            enabled: !1
        }
    }, 
    new ApexCharts(m, a).render(), s = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.primary],
        series: [54.4],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    },
    new ApexCharts(f, s).render(), i = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.warning],
        series: [6.1],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    },
    new ApexCharts(k, i).render(), l = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.secondary],
        series: [14.6],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(x, l).render(), n = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.info],
        series: [4.2],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(C, n).render(), d = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.danger],
        series: [8.4],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    },
    new ApexCharts(A, d).render(), h = {
        chart: {
            height: 245,
            type: "radialBar",
            sparkline: {
                enabled: !0
            },
            dropShadow: {
                enabled: !0,
                blur: 3,
                left: 1,
                top: 1,
                opacity: .1
            }
        },
        colors: ["#51e5a8"],
        plotOptions: {
            radialBar: {
                offsetY: -10,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: "77%"
                },
                track: {
                    background: "#ebe9f1",
                    strokeWidth: "50%"
                },
                dataLabels: {
                    name: {
                        show: !1
                    },
                    value: {
                        color: "#5e5873",
                        fontSize: "2.86rem",
                        fontWeight: "600"
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: [window.colors.solid.success],
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        series: [83],
        stroke: {
            lineCap: "round"
        },
        grid: {
            padding: {
                bottom: 30
            }
        }
    }, new ApexCharts(B, h).render()
}));
    
</script>


<script>
    $(window).on("load", (function() {
    "use strict";
    var e, o, t, r, a, s = "#ebf0f7",
        i = "#5e5873",
        n = "#ebe9f1",
        d = document.querySelector("#gained-chart"),
        l = document.querySelector("#order-chart"),
        h = document.querySelector("#avg-sessions-chart"),
        p = document.querySelector("#support-trackers-chart"),
        c = document.querySelector("#sales-visit-chart"),
        w = "rtl" === $("html").attr("data-textdirection");
    setTimeout((function() {
        toatr.success("You have successfully logged in to Vuexy. Now you can start to explore!", "ðŸ‘‹ Welcome John Doe!", {
            closeButton: !0,
            tapToDismiss: !1,
            rtl: w
        })
    }), 2e3), e = {
        chart: {
            height: 100,
            type: "area",
            toolbar: {
                show: !1
            },
            sparkline: {
                enabled: !0
            },
            grid: {
                show: !1,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        colors: [window.colors.solid.primary],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: "smooth",
            width: 2.5
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: .9,
                opacityFrom: .7,
                opacityTo: .5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: "Subscribers",
            data: [28, 40, 36, 52, 38, 60, 55]
        }],
        xaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: {
                left: 0,
                right: 0
            }
        }],
        tooltip: {
            x: {
                show: !1
            }
        }
    }, new ApexCharts(d, e).render(), o = {
        chart: {
            height: 100,
            type: "area",
            toolbar: {
                show: !1
            },
            sparkline: {
                enabled: !0
            },
            grid: {
                show: !1,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        colors: [window.colors.solid.warning],
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: "smooth",
            width: 2.5
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: .9,
                opacityFrom: .7,
                opacityTo: .5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: "Orders",
            data: [10, 15, 8, 15, 7, 12, 8]
        }],
        xaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: {
                left: 0,
                right: 0
            }
        }],
        tooltip: {
            x: {
                show: !1
            }
        }
    }, 
    new ApexCharts(l, o).render(), t = {
        chart: {
            type: "bar",
            height: 200,
            sparkline: {
                enabled: !0
            },
            toolbar: {
                show: !1
            }
        },
        states: {
            hover: {
                filter: "none"
            }
        },
        colors: [window.colors.solid.warning,window.colors.solid.danger, window.colors.solid.primary, window.colors.solid.danger, window.colors.solid.primary,window.colors.solid.danger],
        series: [{
            name: "Sessions",
            data: [<?php echo $ov*10 ?>, <?php echo $mv*10 ?>,<?php echo $iv*10 ?>, <?php echo $nv*10 ?>, <?php echo $hv*10 ?>, <?php echo $ovv*10 ?>]
        }],
        grid: {
            show: !1,
            padding: {
                left: 0,
                right: 0
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "45%",
                distributed: !0,
                endingShape: "rounded"
            }
        },
        tooltip: {
            x: {
                show: !1
            }
        },
        xaxis: {
            type: "numeric"
        }
    }, new ApexCharts(h, t).render(), r = {
        chart: {
            height: 270,
            type: "radialBar"
        },
        plotOptions: {
            radialBar: {
                size: 150,
                offsetY: 20,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: "65%"
                },
                track: {
                    background: "#fff",
                    strokeWidth: "100%"
                },
                dataLabels: {
                    name: {
                        offsetY: -5,
                        color: i,
                        fontSize: "1rem"
                    },
                    value: {
                        offsetY: 15,
                        color: i,
                        fontSize: "1.714rem"
                    }
                }
            }
        },
        colors: [window.colors.solid.danger],
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: [window.colors.solid.primary],
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: {
            dashArray: 8
        },
        series: [<?php if($allaction==0){$allaction=1;}echo number_format(($complete/$allaction)*100,2);?>],
        labels: ["Complete Actions"]
    }, new ApexCharts(p, r).render(), a = {
        chart: {
            height: 300,
            type: "radar",
            dropShadow: {
                enabled: !0,
                blur: 8,
                left: 1,
                top: 1,
                opacity: .2
            },
            toolbar: {
                show: !1
            },
            offsetY: 5
        },
        series: [{
            name: "Sales",
            data: [90, 50, 86, 40, 100, 20]
        }, {
            name: "Visit",
            data: [70, 75, 70, 76, 20, 85]
        }],
        stroke: {
            width: 0
        },
        colors: [window.colors.solid.primary, window.colors.solid.info],
        plotOptions: {
            radar: {
                polygons: {
                    strokeColors: [n, "transparent", "transparent", "transparent", "transparent", "transparent"],
                    connectorColors: "transparent"
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                gradientToColors: [window.colors.solid.primary, window.colors.solid.info],
                shadeIntensity: 1,
                type: "horizontal",
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            }
        },
        markers: {
            size: 0
        },
        legend: {
            show: !1
        },
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        dataLabels: {
            background: {
                foreColor: [n, n, n, n, n, n]
            }
        },
        yaxis: {
            show: !1
        },
        grid: {
            show: !1,
            padding: {
                bottom: -27
            }
        }
    }, new ApexCharts(c, a).render()
}));
</script>
<script>
$(document).ready(function() {
    $("#fromtobtn").on('click', function(e) {
        e.preventDefault();

      
        var g = $('input[name="from_date"]').val();
        var catId = $('input[name="to_date"]').val();

        // alert(catId); 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Graph/actiontracker",
            data: {
              catId:catId,
               g:g,
               

            },
            success: function(response) {

            }

        })
    });
});
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>

    var input = document.getElementById('company_address');

    var company_address = new google.maps.places.Autocomplete(input);    

</script> 

