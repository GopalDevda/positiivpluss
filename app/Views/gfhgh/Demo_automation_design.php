
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
          <select class="form-control select2" name="boundary" required="" onchange="showBoundary(this);">
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
        <label class="form-label" for="last-name-column">Select Sub Boundary</label>
        <select class="form-control select2" id="subboundary_id" name="sub_boundary">
         <option value="0">Select  Sub Boundary</option>
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
      <select class="form-control select2" name="type_board" required="">
       <option value="">Select Type</option>
       <option value="electricity">Electricity</option>
       <!--    <option value="water">Water</option> -->
       <option value="Sensor">Weather</option>
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
                   <div id="acpa"  style="display: none;">
                    <div class="row">
                      <div class="col-md-6 col-12">
                       <div class="mb-1">
                        <label class="form-label" for="last-name-column">Account No.</label>
                        <input type="text" name="username" placeholder="Enter Account No." class="form-control">
                      </div>
                    </div> <div class="col-md-6 col-12">
                     <div class="mb-1">
                      <label class="form-label" for="last-name-column">Password</label>
                      <input type="text" name="password" placeholder="Password" class="form-control">

                    </div>
                  </div>
                </div>
              </div>
              <!-- end acpa -->
              <div id="capa"  style="display: none;">
               <div class="row">
                <div class="col-md-6 col-12">
                 <div class="mb-1">
                  <label class="form-label" for="last-name-column">CA No.</label>
                  <input type="text" name="usernamee" placeholder="Enter CA No." class="form-control">
                </div>
              </div> <div class="col-md-6 col-12">
               <div class="mb-1">
                <label class="form-label" for="last-name-column">Password</label>
                <input type="text" name="password" placeholder="Password" class="form-control">

              </div>
            </div>
          </div>
        </div>

        <div id="mo_o" style="display: none;">
          <div class="row">
            <div class="col-md-6 col-12">
             <div class="mb-1">
              <label class="form-label" for="last-name-column">Mobile No.</label>
              <input type="text" name="username" placeholder="Enter Mobile No." class="form-control">
            </div>
          </div> <div class="col-md-6 col-12">

           <div class="mb-1">
            <label class="form-label" for="last-name-column">OTP</label>
            <input type="text" name="password" placeholder="OTP" class="form-control">

          </div>

        </div>
      </div>
    </div>

    <div id="conpa" style="display: none;">
      <div class="row">

        <div class="col-md-6 col-12">
         <div class="mb-1">
          <label class="form-label" for="last-name-column">Consumer No.</label>
          <input type="text" name="username" placeholder="Enter Consumer No." class="form-control">
        </div>
      </div> <div class="col-md-6 col-12">
       <div class="mb-1">
        <label class="form-label" for="last-name-column">Password</label>
        <input type="text" name="password" placeholder="Password" class="form-control">

      </div>
    </div>
  </div>
</div>

<div id="emapa" style="display: none;">
  <div class="row">

    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Email</label>
      <input type="email" name="username" placeholder="Enter Email" class="form-control">
    </div>
  </div> <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">Password</label>
    <input type="text" name="password" placeholder="Password" class="form-control">

  </div>
</div>
</div>
</div>

<div id="serpa" style="display: none;">
  <div class="row">

    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Service No.</label>
      <input type="text" name="username" placeholder="Enter service no" class="form-control">
    </div>
  </div> <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">Password</label>
    <input type="text" name="password" placeholder="Password" class="form-control">

  </div>
</div>
</div>
</div>

<div id="mo_pa" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Mobile No.</label>
      <input type="text" name="username" placeholder="Enter Mobile no" class="form-control">
    </div>
  </div> <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">Password</label>
    <input type="text" name="password" placeholder="Password" class="form-control">

  </div>
</div>
</div>
</div>

<div id="acrr" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Account No.</label>
      <input type="text" name="username" placeholder="Enter Account no" class="form-control">
    </div>
  </div> <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">RR NO.</label>
    <input type="text" name="password" placeholder="RR no." class="form-control">

  </div>
</div>
</div>
</div>
<div id="con_mo" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Consumer No.</label>
      <input type="text" name="username" placeholder="Enter Consumer no" class="form-control">
    </div>
  </div> <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">Mobile NO.</label>
    <input type="text" name="password" placeholder="Mobile no." class="form-control">

  </div>
</div>
</div>
</div>
<div id="knpa" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">K No.</label>
      <input type="text" name="username" placeholder="Enter K no" class="form-control">
    </div>
  </div> 
  <div class="col-md-6 col-12">
   <div class="mb-1">
    <label class="form-label" for="last-name-column">password</label>
    <input type="text" name="password" placeholder="Password" class="form-control">

  </div>
</div>
</div>
</div>
<div id="ac" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Account No.</label>
      <input type="text" name="username" placeholder="Enter Account no" class="form-control">
    </div>
  </div> 
</div>
</div>
<div id="pa" style="display: none;">
  <div class="row">
    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Password</label>
      <input type="text" name="password" placeholder="Enter password" class="form-control">
    </div>
  </div> 
</div>
</div>
<div id="ser" style="display: none;">
  <div class="row">

    <div class="col-md-6 col-12">
     <div class="mb-1">
      <label class="form-label" for="last-name-column">Service consumer No.</label>
      <input type="text" name="username" placeholder="Enter Service consumer No." class="form-control">
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
  <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
</div>
</form>
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
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
   <strong>Error!</strong> <?php echo $session->get('error');?>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
<?php } ?>

<div class="float-end">

  <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
    <i class="fa-solid fa-plus"></i> Add Automation
  </button>

  <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#modal-a">
    <i class="fa fa-plus"></i> Import
  </button>
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
<div class="content-header-left offset-md-2 col-md-4 col-12 mb-2">
  <div class="me-1">
   <div id="DataTables_Table_0_filter" class="dataTables_filter">
     <input type="search" class="form-control" placeholder="Search" aria-controls="DataTables_Table_0">
   </div>
 </div>
</div>
</div>
<?php foreach ($item as $key => $value) { ?>

  <!-- Accordion start -->
  <section id="accordion">
    <div class="row">
      <div class="col-sm-12">
        <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
          <div class="card">
     <!--      <?php if($value['timestamp_date']){?>  
          <span class="px-3">Last Updated at 
    <?php echo $value['timestamp_date'];?></span>
    <?php
  }?> -->
  <div class="card-body p-1">
   <h6 class="pb-1">Last read on 06 Jan 2023</h6>
   <div class="row">
     <div class="col-md-2 text-center">
      <h5 class="fw-bolder"></h5>
      <img src="<?php echo base_url('public/icon/electricity.png')?>" width="95px">

    </div>
    <div class="col-md-2 pt-2">
      <h5 class="fw-bolder">Boundary</h5>
      <p ><?php foreach($boundary_item as $bb){ ?>
        <?php if($bb['id'] == $value['boundary_id']){
          echo $bb['item_name'];
        }?>
        <?php
      }?></p>  
    </div>
    <div class="col-md-2 pt-2">
      <h5 class="fw-bolder">Site Name</h5>
      <p> <?php foreach($sub_boundary_item as $bb){ ?>
        <?php if($bb['id'] == $value['subboundary_id']){
          echo $bb['cp_name'];
        }?>
        <?php
      }?></p>  
    </div>
    <div class="col-md-2 pt-2">
      <h5 class="fw-bolder">Provider Name</h5>
      <p><?php echo $value['board_type']?></p>
      
    </div>
    <div class="col-md-2 pt-2">
      <h5 class="fw-bolder">Consumed Unit</h5>
      <p> <?php foreach($electricity_board as $bb){ ?>
        <?php if($bb['id'] == $value['provider_type']){
          echo $bb['name_discom'];
        }?>
        <?php
      }?></p>
    </div>
    <div class="col-md-1 pt-2">
     <h5 class="fw-bolder">Status</h5>
     <?php if($value['current_status'] == '1'){?>
      <form class="form" method="post" action="<?php echo base_url() ?>/Automotion/update_status" enctype="multipart/form-data">
       <input type="hidden" name="status_id" value="<?php echo $value['id']; ?>"> 
       <!--<span class='bg-danger' style='border-radius:90%;'>&nbsp;o&nbsp;</span>-->

       <span class="badge badge-light-danger">Connect</span>

     </form>
     <?php 
   }?>
   <?php if($value['current_status'] == '2'){?>

     <span class="badge badge-light-primary">Awaited</span>


     <?php 
   }?>
   <?php if($value['current_status'] == '3'){?>

     <!--<span class='bg-success' style='border-radius:90%;'>&nbsp;o&nbsp;</span>-->
     <span class="rohit badge badge-light-success"  data-id="<?php echo $value['id']; ?>">Connected</span>

     <?php 
   }?>
 </div>
 <div class="col-md-1 pt-2">
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
</section>
<!-- Accordion end -->
<?php

}?>

<section class="app-user-list">

  <?php foreach ($weather_ap as $key => $value) {?>
    <div>
     <div class="rohitd" data-id="<?php echo $value['id']; ?>">

      <div class="card p-0">


          <div class="card-body p-1">
               <h6 class="pb-1">Last read at 
          <?php $input =$value['updated_at'];
          $date = time();
          echo date('d M Y h:i A', $date);

          ?></h6>
            <div class="container">
              <div class="row">

                <div class="col-md-2 text-center">
                  <img style="width: 100px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg"> 
                   <input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">
                </div>
                <div class="col-md-2 pt-2">
                  <input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">
                  <h5 class="fw-bolder">
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

                 </h5>


                 <?php foreach($site_id as $id){?>
                   <?php if($id['id'] == $value['site_id']){?>
                    <p class="mb-0"><?php echo $id['cp_name']; ?></p> 
                    <?php
                  }}?>
                  <p class="mb-0"><?php echo $value['city_name']; ?></p> 

                </div>
                <div class="col-md-2 pt-2">
                  <h5 class="fw-bolder">Site Name</h5>
                   <p class="mb-0">BKC corporate team Bandra.....</p> 
                </div>
                <div class="col-md-2 pt-2">
                  <h5 class="fw-bolder">Temperature</h5>
                  <p><?php echo $value['temp']; ?> <span>'C</span></p>  
                </div>
                <div class="col-md-1 pt-2">
                  <h5  class="fw-bolder">AQI</h5>
                  <p><?php echo $value['wind'];  ?> <span>KM/h</span></p>

                </div>
                <div class="col-md-1 p-0 pt-2">
                  <h5  class="fw-bolder">Humidity</h5>
                  <p><?php echo $value['humidity'];  ?>  <span>% RH</span></p>

                </div>
                 <div class="col-md-1 pt-2">
     <h5 class="fw-bolder">Status</h5>


   
     <span class="rohit badge badge-light-success"  data-id="<?php echo $value['id']; ?>">Connected</span>

 </div>
  <div class="col-md-1 pt-2">
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
</div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
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
<!-- barchart script-->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
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
        $('select[name="type_board"]').on('change', function() {
          var sId = $(this).val();
        // alert(sId);
        if(sId ='Sensor'){

          $('#rrr').show();

        }
      });
        
      });
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
                '<option value="">select from the list</option>');
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

             if(data.success == 'ac'){
              $("#ac").show();
              $("#mo_o").hide();
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


            }if(data.success == 'acpa'){

              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").show();
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
            if(data.success == 'mo_o'){
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
            if(data.success == 'capa'){
              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").hide();
              $("#capa").show();
              $("#conpa").hide();
              $("#emapa").hide();
              $("#serpa").hide();
              $("#mo_pa").hide();
              $("#acrr").hide();
              $("#con_mo").hide();
              $("#knpa").hide();
              $("#pa").hide();
              $("#ser").hide();


            } if(data.success == 'conpa'){
              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").hide();
              $("#capa").hide();
              $("#conpa").show();
              $("#emapa").hide();
              $("#serpa").hide();
              $("#mo_pa").hide();
              $("#acrr").hide();
              $("#con_mo").hide();
              $("#knpa").hide();
              $("#pa").hide();
              $("#ser").hide();


            } if(data.success == 'emapa'){
              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").hide();
              $("#capa").hide();
              $("#conpa").hide();
              $("#emapa").show();
              $("#serpa").hide();
              $("#mo_pa").hide();
              $("#acrr").hide();
              $("#con_mo").hide();
              $("#knpa").hide();
              $("#pa").hide();
              $("#ser").hide();


            } if(data.success == 'serpa'){

              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").hide();
              $("#capa").hide();
              $("#conpa").hide();
              $("#emapa").hide();
              $("#serpa").show();
              $("#mo_pa").hide();
              $("#acrr").hide();
              $("#con_mo").hide();
              $("#knpa").hide();
              $("#pa").hide();
              $("#ser").hide();

            } 
            if(data.success == 'mo_pa'){
              $("#ac").hide();
              $("#mo_o").hide();
              $("#acpa").hide();
              $("#capa").hide();
              $("#conpa").hide();
              $("#emapa").hide();
              $("#serpa").hide();
              $("#mo_pa").show();
              $("#acrr").hide();
              $("#con_mo").hide();
              $("#knpa").hide();
              $("#pa").hide();
              $("#ser").hide();


            }if(data.success == 'acrr'){

             $("#ac").hide();
             $("#mo_o").hide();
             $("#acpa").hide();
             $("#capa").hide();
             $("#conpa").hide();
             $("#emapa").hide();
             $("#serpa").hide();
             $("#mo_pa").hide();
             $("#acrr").show();
             $("#con_mo").hide();
             $("#knpa").hide();
             $("#pa").hide();
             $("#ser").hide();

           }if(data.success == 'con_mo'){

            $("#ac").hide();
            $("#mo_o").hide();
            $("#acpa").hide();
            $("#capa").hide();
            $("#conpa").hide();
            $("#emapa").hide();
            $("#serpa").hide();
            $("#mo_pa").hide();
            $("#acrr").hide();
            $("#con_mo").show();
            $("#knpa").hide();
            $("#pa").hide();
            $("#ser").hide();

          } 
          if(data.success == 'knpa'){
            $("#ac").hide();
            $("#mo_o").hide();
            $("#acpa").hide();
            $("#capa").hide();
            $("#conpa").hide();
            $("#emapa").hide();
            $("#serpa").hide();
            $("#mo_pa").hide();
            $("#acrr").hide();
            $("#con_mo").hide();
            $("#knpa").show();
            $("#pa").hide();
            $("#ser").hide();


          } if(data.success == 'pa'){
           $("#ac").hide();
           $("#mo_o").hide();
           $("#acpa").hide();
           $("#capa").hide();
           $("#conpa").hide();
           $("#emapa").hide();
           $("#serpa").hide();
           $("#mo_pa").hide();
           $("#acrr").hide();
           $("#con_mo").hide();
           $("#knpa").hide();
           $("#pa").show();
           $("#ser").hide();


         } 
         if(data.success == 'ser'){
           $("#ac").hide();
           $("#mo_o").hide();
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
           $("#ser").show();

         } 


       }

     })
}
});


});
</script>

<?= $this->endSection() ?>

