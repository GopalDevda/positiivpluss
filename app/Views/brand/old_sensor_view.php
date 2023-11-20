<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href="assets/header.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css');?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>

p.fs {
font-size: 13px!important;
}
.fs-smaller{
font-size: 10px!important;
}
.less-margin{
margin-bottom: 5px!important;
}
.badge.badge-light-yellow {
background-color: rgb(245 246 180);
color: #FF6347!important;
}
.auto.bg-danger.me-3.p-2.text-light {
border-radius: 50%;
width: 10px;
height: 10px;
text-align: center;
padding-bottom: 14px;
text-align: center;
align-items: center;
justify-content: center;
display: flex;
}

</style>
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">
  <div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Add Automation</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="<?php echo base_url() ?>/Automotion/createSensor" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Select Boundary</label>
                  <select class="form-control select2" name="boundary" id="boundary_idddd" required="" onchange="showBoundary(this);">
                    <option value="0">Select Boundary </option>
                    <?php
                    if(!empty($boundary_item))
                    foreach($boundary_item as $dd){?>
                    <option value="<?php echo $dd['id'];?>"><?php echo $dd['item_name'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Select Site</label>
                  <select class="form-control js-example-basic-single select2" id="subboundary_id" name="sub_boundary" required >
                    <option value="0">Select Site</option>
                    <?php
                    if(!empty($indicator)) {
                    foreach($indicator as $indi) {
                    ?>
                    <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Select Type</label>
                  <select class="form-control select2" name="type_board" id="type_board" required="">
                    <option value="0">Select Type</option>
                    <option value="electricity">Electricity</option>
                    <!--    <option value="water">Water</option> -->
                    <option value="Sensor">Weather</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12" id="sub_site_id_show" style="display:none;">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Select Sub-Site</label>
                  <select class="form-control select2" id="sub_site_id" name="sub_site">
                    <option value="0">Select sub-Site</option>
                    <?php
                    if(!empty($indicator)) {
                    foreach($indicator as $indi) {
                    ?>
                    <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12" id="dbmb" style="display: none;">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Select Provider(EB)</label>
                  <select class="form-control select2" name="name_discom">
                    <option value="NULL">Select provider</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12" id="weather_show"  style="display: none;">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Latitude</label>
                  <input type="text" name="latitude" placeholder="Enter Latitude" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-12" id="weather_show1"  style="display: none;">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Longitude</label>
                  <input type="text" name="longitude" placeholder="Enter Longitude" class="form-control">
                </div>
              </div>
              
              <div id="holder_pdf" style="display:none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Electricity Connection holder name </label>
                      <input type="text" name="conHolName" class="form-control" placeholder="Enter Holder Name.">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Concent Form (Upload PDF)</label>
                      <input type="file" name="consent_form" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="ac"  style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Account No.</label>
                      <input type="text" name="account_no" id="ac_r" placeholder="Enter Account No." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- <div id="us"  style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Username</label>
                      <input type="text" name="username" id="us_r" placeholder="Enter Username" class="form-control">
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- end acpa -->
              <div id="ca"  style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">CA No.</label>
                      <input type="text" name="ca_no" id="ca_r" placeholder="Enter CA No." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="bp"  style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">BP No.</label>
                      <input type="text" name="bp_no" id="bp_r" placeholder="Enter BP No." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="mo" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Mobile No.</label>
                      <input type="text" name="mo_no" id="mo_r" placeholder="Enter Mobile No." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="co" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Consumer No.</label>
                      <input type="text" name="consumer_no" id="co_r" placeholder="Enter Consumer No." class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="ser" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Service No.</label>
                      <input type="text" name="service_no" id="ser_r" placeholder="Enter service no" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="kn" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">K No.</label>
                      <input type="text" name="kn_no" id="kn_r" placeholder="Enter K no" class="form-control">
                    </div>
                  </div>
                  
                </div>
              </div>
              <div id="username_show" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Username</label>
                      <input type="text" name="username" id="us_r" placeholder="Enter Username" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div id="pa" style="display: none;">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="last-name-column">Password</label>
                      <input type="text" name="password" id="pa_r" placeholder="Enter password" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3" id="rrr" style="display:none;">
                <input  type="checkbox" class="uuuu" id="privacypolicy" >
                <!--<label class="custom-control-label" for="privacypolicy">I agree to the Terms and Conditions and Privacy Policy</label>-->
                <label class="custom-control-label" for="privacypolicy">
                  &nbsp;&nbsp;I agree to the
                  <a href="#" target="_blank" style="text-decoration: underline;">Terms of Service</a> and
                  <a href="#" target="_blank" style="text-decoration: underline;">Privacy Policy</a>.
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light uuuu4" disabled>Submit</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect" id="searchclear">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  $session = session();
  if($session->get('success')){?>
  <script type="text/javascript">
  var id = '<?php echo $session->get('success'); ?>';
  
  toastr.success(id, "Success", {
  closeButton: !0,
  tapToDismiss: !1,
  progressBar: !0,
  })
  
  </script>
  <?php } ?>
  <?php
  $session = session();
  if($session->get('error')){?>
  <script type="text/javascript">
  var id = '<?php echo $session->get('error'); ?>';
  
  toastr.error(id, "Error", {
  closeButton: !0,
  tapToDismiss: !1,
  progressBar: !0,
  })
  
  </script>
  <?php } ?>
  <div class="alert alert-success alert-dismissible fade show" style="display:none;" id="divvv" role="alert" style="padding: 0.71rem 1rem">
    <strong id="suc">Success!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <div class="float-end">
    <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
    <i class="fa-solid fa-plus"></i> Add Automation
    </button>
    <!-- <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#modal-a">
    <i class="fa fa-plus"></i> Import
    </button> -->
  </div>
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Automation</h2>
            <div class="breadcrumb-wrapper">
            </div>
          </div>
        </div>
      </div>
      <!-- -->
    </div>
    <input type="text" name="" class="form-control" placeholder="Search" onkeyup="get_sensor_by_search($(this).val())">
    <!-- White blocks -->
    <section class="mt-3">
      <div class="row">
        <div class="col-md-3">
          <div class="card" style="border-top: 3px solid #73d1fe;">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-7 text-center text-lg-left">
                <div class="card-body p-1">
                  <h6 class="text-center mb-0">Total</h6>
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body p-1">
                  <p class="text-center pt-2"><?= $all_automation; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="card"style="border-top: 3px solid green;">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-7 text-center text-lg-left">
                <div class="card-body p-1">
                  <h6 class="text-center mb-0">Connected</h6>
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body p-1">
                  <p class="text-center pt-2"><?= $connect_data; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="border-top: 3px solid #ffca0b;">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-7 text-center text-lg-left">
                <div class="card-body p-1">
                  <h6 class="text-center mb-0">Processing</h6>
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body p-1">
                  <p class="text-center pt-2"><?php echo $processing_data; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="border-top: 3px solid red;">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-7 text-center text-lg-left">
                <div class="card-body p-1">
                  <h6 class="text-center mb-0">Not Connected</h6>
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body p-1">
                  <p class="text-center pt-2"><?= $not_connect; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <!-- End White blocks -->
    <div id="Sensordatafetch"></div>
    
    <section class="app-user-list">
      <?php foreach ($weather_ap as $key => $value) {?>
      <div>
        <div class="rohitd" data-id="<?php echo $value['id']; ?>">
          <div class="card p-0">
            <div class="card-body p-1 pb-0">
              
              <div class="container p-0">
                <div class="row">
                  <div class="col-md-2 ">
                    <p class="pb-0 mb-0 fs">
                      <?php $input =$value['updated_at'];
                      $date = time();
                      echo date('d M Y h:i A', $date);
                    ?></p>
                    <img style="width: 50px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg">
                    <input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">
                  </div>
                  <div class="col-md-1 p-0 pt-2">
                    <input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">
                    <h6 class="fw-bolder">
                    <?php $id = $value['boundary_id']; ?>
                    <?php if($id == '30'){
                    echo 'Boundry';
                    }
                    if($id == '43'){
                    echo 'Supplier';
                    }
                    if($id == '31'){
                    echo 'Supplier';
                    }?>
                    </h6>
                    
                    <!--  <?php foreach($site_id as $id){?>
                    <?php if($id['id'] == $value['site_id']){?>
                    <p class="mb-0"><?php echo $id['cp_name']; ?></p>
                    <?php
                    }}?>
                    <p class="mb-0"><?php echo $value['city_name']; ?></p>
                    -->
                    <p class="mb-0 fs">site</p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Site Name</h6>
                    <p class="mb-0 fs">BKC corporate team Bandra.....</p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Temperature</h6>
                    <p class="fs"><?php echo $value['temp']; ?> <span>'C</span></p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6  class="fw-bolder">Wind</h6>
                    <p class="fs"><?php echo $value['wind'];  ?> <span>KM/h</span></p>
                  </div>
                  <div class="col-md-1 p-0 pt-2">
                    <h6  class="fw-bolder">Humidity</h6>
                    <p class="fs"><?php echo $value['humidity'];  ?>  <span>% RH</span></p>
                  </div>
                  <div class="col-md-1 pt-2">
                    <h6 class="fw-bolder">Status</h6>
                    
                    <span class="rohit badge badge-light-success"  data-id="<?php echo $value['id']; ?>">Connected</span>
                  </div>
                  <div class="col-md-1 pt-2 text-end">
                    <div class="ms-2">
                      <a
                        class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0"
                        href="javascript:void(0)"
                        id="dropdownMenuButton1"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >
                        <i data-feather="more-vertical" class="font-medium-4"></i>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <i data-feather="edit-2" class="me-50"></i><span>Update</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                            <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      }?>
    </section>
    <!-- Dashboard Ecommerce ends -->
  </div>
</div>
<div class="modal fade" id="modal-a">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Automotion/csvautomotion');?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idee" value="">
        <div class="form-group mb-3">
          <div class="mb-3">
            <input type="file" name="file" class="form-control" id="file">
          </div>
        </div>
        <div class="d-grid">
          <input type="submit" name="submit" value="Upload" class="btn btn-dark"/>
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
        <h4 class="modal-title" id="myModalLabel1">Delete Building</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" action="<?php echo base_url() ?>/Automotion/electricity_delete" method="post" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" id="del_electricity_id" name="electricity_id" />
            <p>Are you sure you want to delete this Company ?</p>
          </div>
          
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->
<!-- delete modal -->
<div class="modal fade text-start" id="statuschangePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Status Change</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" action="<?php echo base_url() ?>/Automotion/status_change" method="post" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" id="connect_status_id" name="status_name" />
            <p>Are you sure you want to status change ?</p>
          </div>
          
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->
<div class="modal fade text-start" id="editmodel" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Edit Automation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="<?php echo base_url() ?>/Automotion/editSensor" enctype="multipart/form-data">
          <input type="hidden" id="editelectricity" name="editid">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Select Boundary</label>
                <input type="hidden" name="boundary" id="editboundary_idd">
                <select class="form-control" id="editboundary_id"  onchange="editshowBoundary(this);" disabled>
                  <option value="">Select Boundary </option>
                  <?php
                  if(!empty($boundary_item))
                  foreach($boundary_item as $dd){?>
                  <option value="<?php echo $dd['id'];?>"><?php echo $dd['item_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Select Site</label>
                <input type="hidden" name="sub_boundary" id="editsubboundary_idd">
                <select class="form-control select2" id="editsubboundary_id"  disabled>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Select Type</label>
                <input type="hidden" name="type_board" id="boardtypee">
                <select class="form-control" name="type_board" id="boardtype" required="" disabled>
                  <option value="">Select Type</option>
                  <option value="electricity">Electricity</option>
                  <!--    <option value="water">Water</option> -->
                  <option value="Sensor">Weather</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12" id="sub_site_id_showedit" style="display:none;">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Select Sub-Site</label>
                <input type="hidden" name="sub_site" id="sub_sitee">
                <select class="form-control" id="sub_site" name="sub_site" disabled>
                  <option value="">Select sub-Site</option>
                  <?php
                  if(!empty($indicator)) {
                  foreach($indicator as $indi) {
                  ?>
                  <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12" id="editdbmb" style="display: none;">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Select Provider(EB)</label>
                <input type="hidden" name="name_discom_edit" id="name_discom_edit">
                <select class="form-control select2" name="name_discom_edit" disabled>
                  <option value="NULL">Select provider</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12" id="weather_show"  style="display: none;">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Latitude</label>
                <input type="text" name="latitude" placeholder="Enter Latitude" class="form-control">
              </div>
            </div>
            <div class="col-md-6 col-12" id="weather_show1"  style="display: none;">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Longitude</label>
                <input type="text" name="longitude" placeholder="Enter Longitude" class="form-control">
              </div>
            </div>
            <!--  <div class="col-md-6 col-12" id="user_name" style="display: none;">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Username</label>
                <input type="text" name="username" placeholder="Enter username" class="form-control">
              </div>
            </div> <div class="col-md-6 col-12" id="password" style="display: none;">
            <div class="mb-1">
              <label class="form-label" for="last-name-column">Password</label>
              <input type="text" name="password" placeholder="Password" class="form-control">
              
            </div>
          </div> -->
          <!-- acpa -->
          <div id="edit_holder_pdf" style="display:none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Electricity Connection holder name </label>
                  <input type="text" name="conHolName" id="holdername" class="form-control" placeholder="Enter Holder Name." required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Concent Form (Upload PDF)</label>
                  <input type="file" name="consent_form" id="concent_pdf" class="form-control" required>
                </div>
              </div>
              <!-- <div class="col-md-1 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">pdf</label>
                  <div id="pdfshow">xcgfdh</div>
                </div>
              </div> -->
            </div>
          </div>
          <div id="eac"  style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Account No.</label>
                  <input type="text" name="account_no" id="eac_r" placeholder="Enter Account No." class="form-control">
                </div>
              </div>
            </div>
          </div>
          
          
          
          <!-- end acpa -->
          <div id="eca"  style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">CA No.</label>
                  <input type="text" name="ca_no" id="eca_r" placeholder="Enter CA No." class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="ebp"  style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">BP No.</label>
                  <input type="text" name="bp_no" id="ebp_r" placeholder="Enter BP No." class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="emo" style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Mobile No.</label>
                  <input type="text" name="mo_no" id="emo_r" placeholder="Enter Mobile No." class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="eco" style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Consumer No.</label>
                  <input type="text" name="consumer_no" id="eco_r" placeholder="Enter Consumer No." class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="eser" style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Service No.</label>
                  <input type="text" name="service_no" id="eser_r" placeholder="Enter service no" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div id="ekn" style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">K No.</label>
                  <input type="text" name="kn_no" id="ekn_r" placeholder="Enter K no" class="form-control">
                </div>
              </div>
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="mb-1">
                <label class="form-label" for="last-name-column">Username</label>
                <input type="text" name="username" id="eus_r" placeholder="Enter Username" class="form-control">
              </div>
            </div>
          </div>
          <div id="epa" style="display: none;">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Password</label>
                  <input type="text" name="password" id="epa_r" placeholder="Enter password" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3" id="errr" style="display:none;">
            <input  type="checkbox" class="uuuu" id="privacypolicy" >
            <!--<label class="custom-control-label" for="privacypolicy">I agree to the Terms and Conditions and Privacy Policy</label>-->
            <label class="custom-control-label" for="privacypolicy">
              &nbsp;&nbsp;I agree to the
              <a href="#" target="_blank" style="text-decoration: underline;">Terms of Service</a> and
              <a href="#" target="_blank" style="text-decoration: underline;">Privacy Policy</a>.
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light uuuu4" disabled>Submit</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
      </div>
    </form>
  </div>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
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
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<!-- barchart script-->
<script>
$(document).ready(function() {
$('#example').DataTable();
});
$(function(){
$("#searchclear").click(function(){

$("#boundary_idddd").select2('val', '0');
$("#subboundary_id").select2('val', '0');
$("#type_board").select2('val', '0');


$("#sub_site_id_show").hide();
$("#dbmb").hide();
$("#holder_pdf").hide();
$("#ac").hide();
$("#pa").hide();
$("#ca").hide();
$("#bp").hide();
$("#mo").hide();
$("#co").hide();
$("#ser").hide();
$("#kn").hide();
$("#username_show").hide();

});
});
</script>
<script>
function showBoundary(that) {
var boundary_id = $(that).val();
// alert(boundary_id);
if(boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
$.ajax({
url : "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/"+boundary_id,
type: "POST",
//dataType: "JSON",
success: function(data){
$("#subboundary_id").html(data);
},
error: function(xhr, status, error){
$('#indicatorDiv').html('<option value="">No data found </option>');
}
});
}
$.ajax({
url : "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/"+boundary_id,
type: "POST",
//dataType: "JSON",
success: function(data){
$("#indicator").html(data);
},
error: function(xhr, status, error){
$('#indicator').html('<option value="">No data found </option>');
}
});
}
</script>
<script type="text/javascript">
function collapase(that)
{
var id = $(that).attr('data-id');
var help =  $("#vali"+id).val();
// alert(help);
if(help == "")
{
// alert('cbgvcn');
$("#vali"+id).val('1');
$("#rr"+id).hide();
}
else
{
$("#vali"+id).val('');
$("#rr"+id).show();
}
}
</script><!-- 
<script type="text/javascript">
$.ajax({
url : "<?php echo base_url()?>/Automotion/sensor_data_view",
type: "GET",
//dataType: "JSON",
success: function(data){
$("#Sensordatafetch").html(data);
},
});
</script> -->

<script type="text/javascript">

var limit = 10; //The number of records to display per request
var start = 0; //The starting pointer of the data

 load_country_data(limit, start);
 
 function load_country_data(limit, start)
 {

$.ajax({
url : "<?php echo base_url()?>/Automotion/sensor_data_view",
data:{limit:limit, start:start},
cache:false,
method: "POST",
//dataType: "JSON",
success: function(data){
  
$("#Sensordatafetch").append(data);

},
});
 }

$(window).scroll(function(){
  if($(window).scrollTop())
  {
  //  action = 'active';
  
   start = start + limit;
  //  setTimeout(function(){
     load_country_data(limit, start);
  //  }, 100);
  }
 });

</script>
<!-- <script>
function editshowBoundary(that) {
var boundary_id = $(that).val();
// alert(boundary_id);
if(boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
$.ajax({
url : "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/"+boundary_id,
type: "POST",
//dataType: "JSON",
success: function(data){
$("#editsubboundary_id").html(data);
},
error: function(xhr, status, error){
$('#indicatorDiv').html('<option value="">No data found </option>');
}
});
}
$.ajax({
url : "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/"+boundary_id,
type: "POST",
//dataType: "JSON",
success: function(data){
$("#indicator").html(data);
},
error: function(xhr, status, error){
$('#indicator').html('<option value="">No data found </option>');
}
});
}
</script> -->
<script>
function electricity_delete(that) {
// alert(that);
$("#docDeletePopup").modal('show');
$("#del_electricity_id").val(that);
}
</script>
<!-- <script type="text/javascript">
function myFunction(that)
{
var input = $(that).val();
$.ajax({
url: "<?php echo base_url()?>/Automotion/search/"+input,
type: "GET",
dataType: "json",
success: function(data)
{
}
})
}
</script> -->
<script type="text/javascript">
function get_sensor_by_search(val) {
  // alert(val);
    $.ajax({
      url: "<?= base_url() ?>/Automotion/sensor_data_view",
      type: "post",
      data: {
        "filter": val
      },
      dataType: "JSON",
      cache: false,
      success: function(data) {
        $("#Sensordatafetch").html(data);
        $('#idss').val(data.id);
        $('#statuss').val(data.status);
      },
    });
  }
  </script>
<script>
function editmodel(that) {
var boundary = $(that).attr('data-boundary');
var id = $(that).attr('data-id');
var subboundary = $(that).attr('data-subboundary');
var boardtype = $(that).attr('data-boardtype');
var subsite = $(that).attr('data-subsite');
var provider = $(that).attr('data-provider');
var username = $(that).attr('data-username');
var password = $(that).attr('data-password');
var knno = $(that).attr('data-knno');
var consumerno = $(that).attr('data-consumerno');
var accountno = $(that).attr('data-accountno');
var mobileno = $(that).attr('data-mobileno');
var serviceno = $(that).attr('data-serviceno');
var cano = $(that).attr('data-cano');
var holdername = $(that).attr('data-holdername');
var pdf = $(that).attr('data-pdf');

// $("#pdfshow").html('<a href="javascript:void(0);" NAME="My Window Name" title="Bill" onClick="window.open("<?php echo base_url()?>/public/uploads/pdfElectricity/"'+pdf',"Ratting","width=750,height=650,0,status=0,scrollbars=1");"><i class="fa-solid fa-file-pdf text-danger fs-4"></i></a>');

$('#edit_holder_pdf').show();
$('#holdername').val(holdername);
$('#editboundary_id').val(boundary);
$('#editboundary_idd').val(boundary);
$('#editsubboundary_idd').val(subboundary);
$('#boardtypee').val(boardtype);
$('#boardtype').val(boardtype);
$('#eus_r').val(username);
$('#sub_sitee').val(subsite);
$('#name_discom_edit').val(provider);
$('#editelectricity').val(id);
// alert(subsite);
$('#editsubboundary_id').find('option').remove().end();
if(subsite == 0){
$("#sub_site_id_showedit").hide();
}else{
$("#sub_site_id_showedit").show();
}
if(boundary == 30 || boundary == 31 || boundary == 43) {
$.ajax({
url : "<?php echo base_url()?>/Automotion/getsubboundaryByBoundary/"+boundary,
type: "GET",
//dataType: "JSON",
success: function(data)
{
$.each(data, function(key, value) {
var sub_id = value.id;
if(sub_id == subboundary)
{
$('select[id="editsubboundary_id"]').append('<option selected value="' +
value.id + '">' + value.cp_name +
'</option>');
}
else
{
$('select[id="editsubboundary_id"]').append('<option value="' +
value.id + '">' + value.cp_name +
'</option>');
}
})
},
});
}
if (boundary == 30) {
$.ajax({
url: "<?php echo base_url()?>/Automotion/site_sub_site/"+subboundary,
type: "GET",
dataType: "json",
success: function(data) {
$('select[name="sub_site"]').empty();
$('select[name="sub_site"]').append(
'<option value="">select from the list</option>');
$.each(data, function(key, value) {
var sub_id = value.id;
if(sub_id == subsite){
$('select[name="sub_site"]').append('<option selected value="' +
value.id + '">' + value.sub_site_name +
'</option>');
}else{
$('select[name="sub_site"]').append('<option value="' +
value.id + '">' + value.sub_site_name +
'</option>');
}
})
}
})
}
if (subboundary) {
if(boardtype == 'electricity')
{
$('#editdbmb').show();
}
else
{
$('#editdbmb').hide();
}
$.ajax({
url: "<?php echo base_url()?>/Sensor/eb_board/"+subboundary+"/"+30,
type: "GET",
dataType: "json",
success: function(data) {
$('select[name="name_discom_edit"]').empty();
$('select[name="name_discom_edit"]').append(
'<option value="">Open this select menu</option>');
$.each(data, function(key, value) {
var d_id = value.id;
if(d_id == provider){
$('select[name="name_discom_edit"]').append('<option selected value="' +
value.id + '">' + value.name_discom +
'</option>');
}else{
$('select[name="name_discom_edit"]').append('<option value="' +
value.id + '">' + value.name_discom +
'</option>');
}
})
}
})
}
// alert(provider);
if(provider)
{
$.ajax({
url: "<?php echo base_url()?>/Sensor/user_pass/"+provider,
type: "GET",
dataType: "json",
success: function(data) {
// alert(data.success);
if(data.success == 'uspa'){
$("#eus").show();
$("#eus_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#emo").hide();
$("#eac").hide();
$("#eco").hide();
$("#eca").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
$("#eus_r").val(username);
$("#epa_r").val(password);
// rohit
}if(data.success == 'acpa'){
// alert(data.success);
$("#eac_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eac").show();
$("#epa").show();
$("#eca").hide();
$("#eco").hide();
$("#eus").hide();
$("#eser").hide();
$("#emo").hide();
$("#ekn").hide();
$("#eac_r").val(accountno);
$("#epa_r").val(password);
}
if(data.success == 'mo_o')
{
$("#eac_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eac").hide();
$("#emo_o").show();
$("#eacpa").hide();
$("#ecapa").hide();
$("#econpa").hide();
$("#emapa").hide();
$("#eserpa").hide();
$("#emo_pa").hide();
$("#eknpa").hide();
$("#epa").hide();
$("#eser").hide();
}
if(data.success == 'paca')
{
$("#eac").hide();
$("#eca_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eca").show();
$("#eco").hide();
$("#eus").hide();
$("#eser").hide();
$("#emo").hide();
$("#ekn").hide();
$("#epa").show();
$("#epa_r").val(password);
$("#eca_r").val(cano);
}
if(data.success == 'pakn')
{
$("#eac").hide();
$("#emo").hide();
$("#eac").hide();
$("#eca").hide();
$("#eus").hide();
$("#ekn_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").hide();
$("#ekn").show();
$("#epa").show();
$("#eser").hide();
$("#epa_r").val(password);
$("#ekn_r").val(knno);
}
if(data.success == 'paser')
{
$("#eac").hide();
$("#emo").hide();
$("#eac").hide();
$("#eca").hide();
$("#eus").hide();
$("#eser_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").show();
$("#epa_r").val(password);
$("#eser_r").val(serviceno);
}
if(data.success == 'paco')
{
$("#eac").hide();
$("#emo").hide();
$("#eus").hide();
$("#eca").hide();
$("#eco_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").show();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
$("#epa_r").val(password);
$("#eco_r").val(consumerno);
}
if(data.success == 'pamo')
{
$("#eac").hide();
$("#eus").hide();
$("#eco").hide();
$("#eca").hide();
$("#emo_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#emo").show();
$("#eknpa").hide();
$("#epa").show();
$("#eser").hide();
$("#epa_r").val(password);
$("#emo_r").val(mobileno);
}
if(data.success == 'pabp')
{
$("#eca").hide();
$("#emo").hide();
$("#ebp").show();
$("#eac").hide();
$("#eco").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
$("#ebp_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#epa_r").val(password);
$("#ebp_r").val(password);
}
}
})
}
// $('#editsubboundary_id').val(subboundary);
$('#errr').show();
$("#editmodel").modal('show');
}
</script>
<script type="text/javascript">
$("document").ready(function() {
$('select[name="sub_boundary"]').on('change', function() {
var tId = $(this).val();
// alert(tId);
if (tId) {
$.ajax({
url: "<?php echo base_url()?>/Sensor/eb_board/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
$('select[name="name_discom"]').empty();
$('select[name="name_discom"]').append(
'<option value="">Open this select menu</option>');
$.each(data, function(key, value) {
$('select[name="name_discom"]').append('<option value="' +
value.id + '">' + value.name_discom +
'</option>');
})
}
})
}
});
});
</script>
// <script type="text/javascript">
//   $(document).ready(function() {
//     $('.js-example-basic-single').select2();
// });
// </script>
<script type="text/javascript">
$("document").ready(function() {
$('select[name="sub_boundary"]').on('change', function() {
var tId = $(this).val();
// alert(tId);
if (tId) {
$.ajax({
url: "<?php echo base_url()?>/Sensor/eb_board/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
$('select[name="name_discom_edit"]').empty();
$('select[name="name_discom_edit"]').append(
'<option value="">Open this select menu</option>');
$.each(data, function(key, value) {
$('select[name="name_discom_edit"]').append('<option value="' +
value.id + '">' + value.name_discom +
'</option>');
})
}
})
}
});
});
</script>
<script>
$(document).ready(function() {
$(document).on('click', '.rohitd', function(event) {
event.preventDefault();
var id = $(this).data('id');
window.location.href = "/view_weather_data/" + id;
});
});
</script>
<script>
$(document).ready(function() {
$(document).on('click', '.firstconnect', function(event) {
event.preventDefault();
var id = $(this).data('id');
$("#statuschangePopup").modal('show');
$("#connect_status_id").val(id);
});
});
</script>
<script>
$(document).ready(function() {
$(document).on('click', '.rohit', function(event) {
event.preventDefault();
var id = $(this).data('id');
// alert(id);
window.location.href = "/new_page/" + id;
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="type_board"]').on('change', function() {
var sId = $(this).val();
// alert(sId);
if(sId == 'Sensor'){
$('#weather_show').show();
$('#weather_show1').show();
}else{
$('#weather_show').hide();
$('#weather_show1').hide();
}
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="type_board"]').on('change', function() {
var sId = $(this).val();
// alert(sId);
if(sId == 'electricity'){
$('#dbmb').show();
}else{
$('#dbmb').hide();
}
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="name_discom"]').on('change', function() {
var sId = $(this).val();
$('#user_name').show();
$('#password').show();
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="name_discom"]').on('change', function() {
var sId = $(this).val();
$('#username_show').show();
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="type_board"]').on('change', function() {
var sId = $(this).val();
// alert(sId);
if(sId ='Sensor'){
$('#rrr').show();
}
});
});
</script>
<script>
$(document).ready(function() {
$('select[name="type_board"]').on('change', function() {
var sId = $(this).val();
// alert(sId);
if(sId ='electricity'){
$('#holder_pdf').show();
}
});
});
</script>
<script type="text/javascript">
$("document").ready(function() {
$('select[id="subboundary_id"]').on('change', function() {
var tId = $(this).val();
var id = $('#boundary_idddd').val();
if (id == 30) {
$.ajax({
url: "<?php echo base_url()?>/Automotion/site_sub_site/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
if(data == ''){
// alert(data);
$("#sub_site_id_show").hide();
}else{
$("#sub_site_id_show").show();
$('select[name="sub_site"]').empty();
$('select[name="sub_site"]').append(
'<option value="">select from the list</option>');
$.each(data, function(key, value) {
$('select[name="sub_site"]').append('<option value="' +
value.id + '">' +'<b>'+ value.sub_site_name+'</b>' +' [ '+value.sub_site_address+' ]'+
'</option>');
})
}
}
})
}
});
});
</script>
<script type="text/javascript">
function fetch_data(that) {
alert(that);
$.ajax({
url: "<?php echo base_url()?>/Automotion/search/"+that,
type: "GET",
dataType: "json",
success: function(data) {
}
});
}
</script>
<!-- <script type="text/javascript">
$("document").ready(function() {
$('select[id="editsubboundary_id"]').on('change', function() {
var tId = $(this).val();
var id = $('#editboundary_id').val();
$("#sub_site_id_showedit").show();
if (id == 30) {
$.ajax({
url: "<?php echo base_url()?>/Automotion/site_sub_site/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
$('select[name="sub_site"]').empty();
$('select[name="sub_site"]').append(
'<option value="">select from the list</option>');
$.each(data, function(key, value) {
$('select[name="sub_site"]').append('<option value="' +
value.id + '">' + value.sub_site_name +
'</option>');
})
}
})
}
});
});
</script> -->
<script>
$(document).ready(function() {
$('select[name="name_discom"]').on('change', function() {
var sId = $(this).val();
$('#rrr').show();
});
});
</script>
<script>
$(document).ready(function(){
$('input[class="uuuu"]').click(function(){
if($(this).prop("checked") == true){
$('.uuuu4').removeAttr('disabled');
console.log("Checkbox is checked.");
}
else if($(this).prop("checked") == false){
$('.uuuu4').attr('disabled','disabled');
console.log("Checkbox is unchecked.");
}
});
});
</script>
<script type="text/javascript">
$("document").ready(function() {
$('select[name="name_discom"]').on('change', function() {
var tId = $(this).val();
// alert(tId);
if (tId) {
$.ajax({
url: "<?php echo base_url()?>/Sensor/user_pass/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
if(data.success == 'uspa'){
$("#us").show();
$("#us_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#mo").hide();
$("#ac").hide();
$("#co").hide();
$("#ca").hide();
$("#kn").hide();
$("#pa").show();
$("#ser").hide();
// rohit
}if(data.success == 'acpa'){
// alert(data.success);
$("#ac_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#ac").show();
$("#pa").show();
$("#ca").hide();
$("#co").hide();
$("#us").hide();
$("#ser").hide();
$("#mo").hide();
$("#kn").hide();
}
if(data.success == 'mo_o'){
$("#ac_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#ac").hide();
$("#mo_o").show();
$("#acpa").hide();
$("#capa").hide();
$("#conpa").hide();
$("#emapa").hide();
$("#serpa").hide();
$("#mo_pa").hide();
$("#acrr").hide();
$("#con_mo").hide();
$("#knpa").hide();
$("#pa").hide();
$("#ser").hide();
}
if(data.success == 'paca'){
$("#ac").hide();
$("#ca_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#ca").show();
$("#co").hide();
$("#us").hide();
$("#ser").hide();
$("#mo").hide();
$("#kn").hide();
$("#pa").show();
} if(data.success == 'pakn'){
$("#ac").hide();
$("#mo").hide();
$("#ac").hide();
$("#ca").hide();
$("#us").hide();
$("#kn_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#co").hide();
$("#kn").show();
$("#pa").show();
$("#ser").hide();
}
if(data.success == 'paser'){
$("#ac").hide();
$("#mo").hide();
$("#ac").hide();
$("#ca").hide();
$("#us").hide();
$("#ser_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#co").hide();
$("#kn").hide();
$("#pa").show();
$("#ser").show();
} if(data.success == 'paco'){
$("#ac").hide();
$("#mo").hide();
$("#us").hide();
$("#ca").hide();
$("#co_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#co").show();
$("#kn").hide();
$("#pa").show();
$("#ser").hide();
} if(data.success == 'pamo'){
$("#ac").hide();
$("#us").hide();
$("#co").hide();
$("#ca").hide();
$("#mo_r").prop('required',true);
$("#pa_r").prop('required',true);
$("#mo").show();
$("#knpa").hide();
$("#pa").show();
$("#ser").hide();
}
if(data.success == 'pabp'){
$("#ca").hide();
$("#mo").hide();
$("#bp").show();
$("#ac").hide();
$("#co").hide();
$("#kn").hide();
$("#pa").show();
$("#ser").hide();
$("#bp_r").prop('required',true);
$("#pa_r").prop('required',true);
}
}
})
}
});
});
</script>
<script type="text/javascript">
$("document").ready(function() {
$('select[name="name_discom_edit"]').on('change', function() {
var tId = $(this).val();
// alert(tId);
if (tId) {
$.ajax({
url: "<?php echo base_url()?>/Sensor/user_pass/"+tId,
type: "GET",
dataType: "json",
success: function(data) {
if(data.success == 'uspa'){
$("#eus").show();
$("#eus_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#emo").hide();
$("#eac").hide();
$("#eco").hide();
$("#eca").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
$("#eus_r").val(username);
$("#epa_r").val(password);
// rohit
}if(data.success == 'acpa'){
// alert(data.success);
$("#eac_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eac").show();
$("#epa").show();
$("#eca").hide();
$("#eco").hide();
$("#eus").hide();
$("#eser").hide();
$("#emo").hide();
$("#ekn").hide();
$("#eac_r").val(accountno);
$("#epa_r").val(password);
}
if(data.success == 'mo_o'){
$("#eac_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eac").hide();
$("#emo_o").show();
$("#eacpa").hide();
$("#ecapa").hide();
$("#econpa").hide();
$("#emapa").hide();
$("#eserpa").hide();
$("#emo_pa").hide();
$("#eknpa").hide();
$("#epa").hide();
$("#eser").hide();
}
if(data.success == 'paca'){
$("#eac").hide();
$("#eca_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eca").show();
$("#eco").hide();
$("#eus").hide();
$("#eser").hide();
$("#emo").hide();
$("#ekn").hide();
$("#epa").show();
} if(data.success == 'pakn'){
$("#eac").hide();
$("#emo").hide();
$("#eac").hide();
$("#eca").hide();
$("#eus").hide();
$("#ekn_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").hide();
$("#ekn").show();
$("#epa").show();
$("#eser").hide();
}
if(data.success == 'paser'){
$("#eac").hide();
$("#emo").hide();
$("#eac").hide();
$("#eca").hide();
$("#eus").hide();
$("#eser_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").show();
} if(data.success == 'paco'){
$("#eac").hide();
$("#emo").hide();
$("#eus").hide();
$("#eca").hide();
$("#eco_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#eco").show();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
} if(data.success == 'pamo'){
$("#eac").hide();
$("#eus").hide();
$("#eco").hide();
$("#eca").hide();
$("#emo_r").prop('required',true);
$("#epa_r").prop('required',true);
$("#emo").show();
$("#eknpa").hide();
$("#epa").show();
$("#eser").hide();
}
if(data.success == 'pabp'){
$("#eca").hide();
$("#emo").hide();
$("#ebp").show();
$("#eac").hide();
$("#eco").hide();
$("#ekn").hide();
$("#epa").show();
$("#eser").hide();
$("#ebp_r").prop('required',true);
$("#epa_r").prop('required',true);
}
}
})
}
});
});
</script>
</script>
<?= $this->endSection() ?>