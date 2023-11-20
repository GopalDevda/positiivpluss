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
<style>
  .nav-tabs .nav-link.active {
    position: relative;
    color: #000;
    background: transparent;!important;
    border-radius: 0px!important;
}
</style>

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
                        <h3 class="fw-bolder mb-75 font_color"><?= $countSite; ?></h3>
                        <span class="text-white">Sites</span>
                      </div>
                      <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                        <i class="fa-brands fa-affiliatetheme"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                  <div class="card myblock">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <h3 class="fw-bolder mb-75 font_color"><?= $countProduct; ?></h3>
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
                        <h3 class="fw-bolder mb-75 font_color"><?= $countSupplier;?></h3>
                        <span class="text-white">Supplier</span>
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
                        <h3 class="fw-bolder mb-75 font_color">
                            <!-- <?php echo $allemployemana  ?> -->0
                        </h3>
                        <span class="text-white">Assets</span>
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
                        <h3 class="fw-bolder mb-75 font_color">
                            <!-- <?php echo $allemploy  ?> -->
                        0</h3>
                        <span class="text-white">Assets</span>
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
                        <h3 class="fw-bolder mb-75 font_color">
                            <!-- <?php echo $allemployemana  ?> -->
                        0</h3>
                        <span class="text-white">Assets</span>
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
                        <span class="text-white">Assets</span>
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
        <!-- Start Earning Report Graph & Sales Graph -->
        <section>
          <div class="row">
            <div class="col-12 col-xl-8">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="card-title mb-0">
                    <h5 class="mb-0">Energy</h5>
                    <small class="text-muted">Yearly Earnings Overview</small>
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="earningReportsTabsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
                        <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-gas-station ti-md"></i></div>
                        <h6 class="tab-widget-title mb-0">Fuel</h6>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
                         <div class="badge bg-label-secondary rounded p-1"><i class="ti ti-bolt ti-md"></i></div>
                        <h6 class="tab-widget-title mb-0"> Electricity</h6>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-1"><i class="ti ti-air-conditioning ti-md"></i></i>
                        </div>
                        <h6 class="tab-widget-title mb-0">Heating</h6>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-1"><i class="ti ti-air-conditioning-disabled ti-md"></i></i>
                        </div>
                        <h6 class="tab-widget-title mb-0">Cooling</h6>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-steam-id" aria-controls="navs-steam-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-1"><i class="ti ti-steam ti-md"></i></div>
                        <h6 class="tab-widget-title mb-0">Steam</h6>
                      </a>
                    </li>
                    
                  </ul>
                   <div class="tab-content p-0 ms-0 ms-sm-2">
                    <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                      <div id="column-chart1"></div>
                    </div>
                    <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                      <div id="column-chart2" style="min-height: 200px;"></div>
                    </div>
                    <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                      <div id="column-chart3">3</div>
                    </div>
                    <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                      <div id="column-chart4">4</div>
                    </div>
                    <div class="tab-pane fade" id="navs-steam-id" role="tabpanel">
                      <div id="column-chart5">5</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="card-title mb-0">
                    <h5 class="mb-0">Energy</h5>
                    <small class="text-muted">Last 12 Months</small>
                  </div>
                </div>
                <div class="card-body">
                  <div id="salesChart"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end Earning Report Graph & Sales Graph -->
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
              <h2 class="fw-bolder mb-1"><?php echo  number_format($emission_per_turnover,2); ?> kg CO2e</h2>
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
            
              <h2 class="fw-bolder mb-1"><?php echo  number_format($emission_per_emp,2); ?> kg CO2e</h2>
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
              <!-- <div class="d-flex align-items-center">
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
              </div> -->
            </div>
            <!-- <div id="revenue-report-chart"></div> -->
            <div id="emission"></div>
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
                2023
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">2023</a>
                <a class="dropdown-item" href="#">2022</a>
                <a class="dropdown-item" href="#">2021</a>
              </div>
            </div>
            <h2 class="mb-25">Total:</h2>
            <div class="d-flex justify-content-center">
              <!--<span class="fw-bolder me-25">Total:</span>-->
              <span  class="fw-bolder me-25"><?= $emissiontotal; ?></span>
            </div>
            <!--<div id="budget-chart"></div>-->
            <!--<button type="button" class="btn btn-primary">Increase Budget</button>-->
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
    <!-- prograss bar start-->
    <div class="row match-height">
    <!-- Total Water Withdrawal -->
    <div class="col-lg-4 col-md-4 col-12">
      <div class="card">
        <div class="card-body">
          <div class="row pb-50">
            <div class="col-sm-12 col-md-12 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
              <div class="mb-1 mb-sm-0">
                <h3 class="fw-bolder mb-25">Total Withdrawal</h3> 
              </div>
              
            </div>
            
          </div>
          <hr />
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12 mb-2">
              <div class="d-flex align-items-center">
              <p class="mb-50">All areas</p>
                <div class="fw-bold text-body-heading ms-auto">85%</div>
            </div>
              <div class="progress progress-bar-primary" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="50"
                  aria-valuemin="50"
                  aria-valuemax="100"
                  style="width: 85%"
                ></div>
              </div>
            </div>
          </div>
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12">
              <div class="d-flex align-items-center">
              <p class="mb-50">Area with water stress</p>
              <div class="fw-bold text-body-heading ms-auto">65%</div>
            </div>
              <div class="progress progress-bar-info" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="90"
                  aria-valuemin="90"
                  aria-valuemax="100"
                  style="width: 65%"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Total Water Withdrawal Ends -->
    <!-- Total Water  Discharge -->
    <div class="col-lg-4  col-md-4 col-12">
      <div class="card">
        <div class="card-body">
          <div class="row pb-50">
            <div class="col-sm-12 col-md-12 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
              <div class="mb-1 mb-sm-0">
                <h3 class="fw-bolder mb-25">Total water discharge</h2> 
              </div>
              
            </div>
            
          </div>
          <hr />
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12 mb-2">
              <div class="d-flex align-items-center">
              <p class="mb-50">All areas</p>
                <div class="fw-bold text-body-heading ms-auto">85%</div>
            </div>
              <div class="progress progress-bar-primary" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="50"
                  aria-valuemin="50"
                  aria-valuemax="100"
                  style="width: 85%"
                ></div>
              </div>
            </div>
          </div>
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12">
              <div class="d-flex align-items-center">
              <p class="mb-50">Area with water stress</p>
              <div class="fw-bold text-body-heading ms-auto">65%</div>
            </div>
              <div class="progress progress-bar-info" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="90"
                  aria-valuemin="90"
                  aria-valuemax="100"
                  style="width: 65%"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Water  Discharge ends -->
    <!-- Total Water Consumption -->
     <div class="col-lg-4 col-md-4 col-12">
      <div class="card">
        <div class="card-body">
          <div class="row pb-50">
            <div class="col-sm-12 col-md-12 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
              <div class="mb-1 mb-sm-0">
                <h3 class="fw-bolder mb-25">Total water consumption</h2> 
              </div>
              
            </div>
            
          </div>
          <hr />
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12 mb-2">
              <div class="d-flex align-items-center">
              <p class="mb-50">All areas</p>
                <div class="fw-bold text-body-heading ms-auto">85%</div>
            </div>
              <div class="progress progress-bar-primary" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="50"
                  aria-valuemin="50"
                  aria-valuemax="100"
                  style="width: 85%"
                ></div>
              </div>
            </div>
          </div>
          <div class="row avg-sessions pt-50">
            <div class="col-6 col-md-12">
              <div class="d-flex align-items-center">
              <p class="mb-50">Area with water stress</p>
              <div class="fw-bold text-body-heading ms-auto">65%</div>
            </div>
              <div class="progress progress-bar-info" style="height: 10px">
                <div
                  class="progress-bar"
                  role="progressbar"
                  aria-valuenow="90"
                  aria-valuemin="90"
                  aria-valuemax="100"
                  style="width: 65%"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Total Water Consumption ends-->
   
  </div>
    <!-- progras bar end -->
    <!-- water grph -->
    <div class="row">
      <!-- Total Water Withdrawal-All areas Start -->
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Total Water Withdrawal-All areas</h4>
          
        </div>
        <div class="card-body">
          <canvas class="polar-area-chart-ex first" data-height="350"></canvas>
        </div>
      </div>
    </div>
     <!-- Total Water Withdrawal-All areas End -->
     <!-- Total Water Withdrawal-Area with water stress Start -->
    <div class="col-lg-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Total Water Withdrawal-Area with water stress</h4>
          
        </div>
        <div class="card-body" style="height:370px;">
          <canvas class="polar-area-chart-ex1 second" data-height="350"></canvas>
        </div>
      </div>
    </div>
    <!-- Total Water Withdrawal-Area with water stress End -->
    </div>
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

<!-- <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/chart-chartjs.min.js')?>"></script> -->
<!-- <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/chart.min.js')?>"></script> -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/bar2.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/bar3.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/bar4.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/bar5.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')?>"></script>

<!--CHART JS-->
<!--<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/apexcharts.min.js')?>"></script>
<!--<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')?>"></script>-->
<!-- <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-analytics.min.js')?>"></script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Start Earning Report Graph & Sales Graph -->
<script type="text/javascript">
  $((function () {
   a = {
         series1: "#826af9",
         series2: "#d2b0ff",
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


   var v = document.querySelector("#salesChart"),
      k = {
         chart: {
            height: 290,
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
            name: "Renewables",
            data: <?= json_encode($Ren); ?>
         }, {
            name: "Non-Renewables",
            data: <?= json_encode($nonRen); ?>
         }],
         colors: [o.series1, o.series3],
         xaxis: {
            //categories: ["Battery", "Brand", "Camera", "Memory", "Storage", "Display", "OS", "Price"]
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]

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

}));

  $((function () {
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


   var l = document.querySelector("#emission"),
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
               name: "Scope-1",
               data: [<?=$jan;?>, <?=$feb;?>, <?=$Mar;?>, <?=$Apr;?>, <?=$May;?>, <?=$jun;?>, <?=$july;?>, <?=$Aug;?>, <?=$Sep;?>, <?=$Oct;?>, <?=$Nov;?>, <?=$Dec;?>]
            }, {
               name: "Scope-2",
               data: [<?=$jan1;?>, <?=$feb1;?>, <?=$Mar1;?>, <?=$Apr1;?>, <?=$May1;?>, <?=$jun1;?>, <?=$july1;?>, <?=$Aug1;?>, <?=$Sep1;?>, <?=$Oct1;?>, <?=$Nov1;?>, <?=$Dec1;?>]
            },
            {
               name: "Scope-3",
               data: [<?=$jan2;?>, <?=$feb2;?>, <?=$Mar2;?>, <?=$Apr2;?>, <?=$May2;?>, <?=$jun2;?>, <?=$july2;?>, <?=$Aug2;?>, <?=$Sep2;?>, <?=$Oct2;?>, <?=$Nov2;?>, <?=$Dec2;?>]
            },
         ],
         xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
         },
         fill: {
            opacity: 1
         },
         yaxis: {
            opposite: t
         }
      };
   void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
}));
</script>
<!-- end Earning Report Graph & Sales Graph -->


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- <script type="text/javascript">
   $(document).ready(function() {
  $("#modal-bluer").modal('show');
  });
</script> -->

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
             data: [6, 177, 284, 256, 105, 63, 168, 72, 23, 45, 55, 218]
        }, {
            name: "Expense",
             data: [-145, -80, -60, -180, -100, -60, -85, -75, -22, -45, -67, -100],
             data: [-145, -80, -60, -180, -100, -60, -85, -75, -50, -20, -60, -100]
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
            "jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep","Oct","Nov","Dec"
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
<!-- Water Js Start-->
<script> 
$(window).on("load", (function () {
   "use strict";
   var o = $(".first"),
      r = $(".second"),
      r = $(".flat-picker"),
      l = $(".polar-area-chart-ex"),
      R = $(".polar-area-chart-ex1"),
      p = "#836AF9",
      b = "#28dac6",
      C = "#ffe802",
      u = "#2c9aff",
      h = "#84D0FF",
      y = "#EDF1F4",
      g = "rgba(0, 0, 0, 0.25)",
      w = "#666ee8",
      f = "#ff4961",
      x = "#6e6b7b",
      k = "rgba(200, 200, 200, 0.2)";
      if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function () {
            $(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
         })), r.length) {
         new Date;
         r.each((function () {
            $(this).flatpickr({
               mode: "range",
               defaultDate: ["2019-05-01", "2019-05-10"]
            })
         }))
      }
  
  // First Graph
  
   if (l.length) new Chart(l, {
      type: "polarArea",
      options: {
         responsive: !0,
         maintainAspectRatio: !1,
         responsiveAnimationDuration: 500,
         legend: {
            position: "right",
            labels: {
               usePointStyle: !0,
               padding: 25,
               boxWidth: 9,
               fontColor: x
            }
         },
         layout: {
            padding: {
               top: -5,
               bottom: -45
            }
         },
         tooltips: {
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: g,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
         },
         scale: {
            scaleShowLine: !0,
            scaleLineWidth: 1,
            ticks: {
               display: !1,
               fontColor: x
            },
            reverse: !1,
            gridLines: {
               display: !1
            }
         },
         animation: {
            animateRotate: !1
         }
      },
      data: {
         labels: ["Surface Water", "Ground Water", "Sea Water", "Produced Water", "Third-party Water"],
         datasets: [{
            label: "Population (millions)",
            backgroundColor: [p, C, window.colors.solid.warning, "#299AFF", "#4F5D70", b],
            data: [19, 17.5, 15, 13.5, 11],
            borderWidth: 0
         }]
      }
   });
    // Second Graph
  
   if (R.length) new Chart(R, {
      type: "polarArea",
      options: {
         responsive: !0,
         maintainAspectRatio: !1,
         responsiveAnimationDuration: 500,
         legend: {
            position: "right",
            labels: {
               usePointStyle: !0,
               padding: 25,
               boxWidth: 9,
               fontColor: x
            }
         },
         layout: {
            padding: {
               top: -5,
               bottom: -45
            }
         },
         tooltips: {
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: g,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
         },
         scale: {
            scaleShowLine: !0,
            scaleLineWidth: 1,
            ticks: {
               display: !1,
               fontColor: x
            },
            reverse: !1,
            gridLines: {
               display: !1
            }
         },
         animation: {
            animateRotate: !1
         }
      },
      data: {
         labels: ["Surface Water", "Ground Water", "Sea Water", "Produced Water", "Third-party Water"],
         datasets: [{
            label: "Population (millions)",
            backgroundColor: [p, C, window.colors.solid.warning, "#299AFF", "#4F5D70", b],
            data: [19, 17.5, 15, 13.5, 11],
            borderWidth: 0
         }]
      }
   });
   
   
}));
</script> 

<script>
  $((function () {
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
            formatter: function (o) {
               return o + ""
            },
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
         colors: [a.series3,a.series3,a.series3,a.series3,a.series3,a.series2,a.series3,a.series3,a.series3,a.series3,a.series3,a.series3],
         dataLabels: {
            enabled: !0,
            formatter: function (o) {
               return o + ""
            },
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
            data: <?=  json_encode($monthlyfuel);?>,
         }],
         legend: {
            show: !1
         },
         tooltip: {
            enabled: !1
         },
          xaxis: {
            categories: ["Apr","May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"],
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
               formatter: function (o) {
                  return "$" + parseInt(+o) + "k"
               },
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
  $((function () {
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
            formatter: function (o) {
               return o + ""
            },
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
         colors: [a.series3,a.series3,a.series3,a.series3,a.series3,a.series2,a.series3,a.series3,a.series3,a.series3,a.series3,a.series3],
         dataLabels: {
            enabled: !0,
            formatter: function (o) {
               return o + ""
            },
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
            data: <?=  json_encode($monthlyElect);?>,
         }],
         legend: {
            show: !1
         },
         tooltip: {
            enabled: !1
         },
          xaxis: {
            categories: ["Apr","May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"],
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
               formatter: function (o) {
                  return "$" + parseInt(+o) + "k"
               },
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

<!-- Water Js End-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>

    var input = document.getElementById('company_address');

    var company_address = new google.maps.places.Autocomplete(input);    

</script> 

