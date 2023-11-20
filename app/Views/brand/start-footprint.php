<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>"> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!--  -->
<style>
   .tooltip1 {
      position: relative;
      text-transform: none !important;
      display: inline-block;
      border-bottom: 1px dotted black;
   }

   .tooltip1 .tooltiptext {
      visibility: hidden;
      text-transform: none !important;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip */
      position: absolute;
      z-index: 1;
   }

   .tooltip1:hover .tooltiptext {
      visibility: visible;
   }


   .nav-tabs .nav-link.active {
      position: relative !important;
      color: #262626 !important;
      background: #defe73 !important;
      border-radius: 23px !important;
      box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%), 0 2px 4px 0 rgb(34 41 47 / 8%);
   }

   .nav-tabs .nav-link:after {
      background: #8cb30c !important;
      display: none !important;
   }

   .nav-tabs .nav-link {
      background: #ddd !important;
      border-radius: 26px !important;
      box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%), 0 2px 4px 0 rgb(34 41 47 / 8%);
   }

   .tabcontent {
      display: none;
      padding: 6px 12px;
   }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="app-content content ">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Footprint</h2>
                  <a href="<?= base_url('/') ?>/Quantitative/footprints" class="btn btn-primary float-end mx-2 t">Back</a>
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
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem; display: none" id="alertMessage">
         <strong>Success!</strong>
         <span id="alertMsg"></span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem; display: none" id="alertMessage2">
         <strong>Error!</strong>
         <span id="alertMsgs"></span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="content-body">
         <section id="multiple-column-form">
            <div class="row">
               <?php if ($footprint == 'Business Travel Land') { ?>
                  <!-- form1 -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">Business Travel Land Carbon Calculator</h4>
                        </div>
                        <div class="card-body">
                           <form class="form okoko" id="flight_frm" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="country_name" id="country_name">
                              <div class="row">
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <input type="hidden" name="form_type" value='1'>
                                       <label class="form-label" for="first-name-column">Departure</label>
                                       <input type="text" id="departure" class="form-control" placeholder="Enter Departure" name="departure" required>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="last-name-column">Arrival</label>
                                       <input type="text" id="arrival" class="form-control" placeholder="Enter Arrival" name="arrival" required>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="city-column">People</label>
                                       <select class="form-control" id="people" name="people" required>
                                          <option value="1">1 person</option>
                                          <option value="2">2 people</option>
                                          <option value="3">3 people</option>
                                          <option value="4">4 people</option>
                                          <option value="5">5 people</option>
                                          <option value="6">6 people</option>
                                          <option value="7">7 people</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="country-floating">Nights</label>
                                       <select class="form-control" id="nights" name="nights" required>
                                          <option value="1">1 night</option>
                                          <option value="2">2 nights</option>
                                          <option value="3">3 nights</option>
                                          <option value="4">4 nights</option>
                                          <option value="5">5 nights</option>
                                          <option value="6">6 nights</option>
                                          <option value="7">7 nights</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12 text-center mt-2 mb-1">
                                    <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect" id="reset-btn">Reset</button>
                                 </div>
                              </div>
                           </form>
                           <!-- hide form -->
                           <div class="mt-3 air_ok" style='display:none;'>
                              <p class="ms-1">Choose the main method of transportation for this trip. It helps us make accurate calculations.</p>
                              <ul class="nav ms-2 nav-tabs" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true"><i class="fa-solid fa-bus"></i> Bus</a>
                                 </li>
                                 <li class="nav-item mx-1">
                                    <a class="nav-link" id="rail" data-bs-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false"><i class="fa-solid fa-train-tram"></i> Rail</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false" onclick="taxi()"><i class="fa-solid fa-car"></i> Taxi</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <!-- tab1 -->
                                 <h5 class="fw-bolder my-2"><i class="fa-solid fa-house-user"></i> Departing from <span id="deport"></span></h5>
                                 <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                    <form class="okoko" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                       <input type="hidden" name="transport_type" value='1'>
                                       <input type="hidden" name="footprint_value">
                                       <input type="hidden" name="form_type" value='1'>
                                       <input type="hidden" name="departure" id="hide_departure" value='1'>
                                       <input type="hidden" name="arrival" id="hide_arrival" value='1'>
                                       <input type="hidden" name="country_name" id="country_name">
                                       <input type="hidden" name="people" id="hide_people" value='1'>
                                       <input type="hidden" name="nights" id="hide_nights" value='1'>
                                       <input type="hidden" class="footprint_one" value='0'>
                                       <input type="hidden" class="footprint_two" value='0'>
                                       <input type="hidden" class="footprint_three" value='0'>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="bus_departure_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="land_vehicle" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Footprint</p>
                                                <p class="fw-bolder"><span id="emission_first"></span></p>
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_bus_distance"></span></p>
                                                <input type="hidden" id="location_bus_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-bus"></i> From,</label>
                                                <select class="form-control" name="travel_from" id="departure_bus_station" onchange="find_distance_between_bus_station()">
                                                   <option value="0">Select From</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-5 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-bus"></i> To</label>
                                                <select class="form-control" name="travel_to" id="arrival_bus_station" onchange="find_distance_between_bus_station()">
                                                   <option value="0">Select To</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="bus_distance_emission"></span></p>

                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="location_arrival_departure_bus_distance"></span></p>
                                                <input type="hidden" id="location_arrival_departure_bus_distance_main" name="distance">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_after" id="bus_arrival_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_after" class="form-control type_name_after" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_after" name='model_name_after' onchange="find_distance_between_bus_station()" require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="emission_bus_arrival"></span></p>
                                                <input type="hidden" id="" name="distance_after">
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="location_arrival_bus_distance"></span></p>
                                                <input type="hidden" id="location_arrival_bus_distance_main" name="distance_after">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- tab2 -->
                                 <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                    <form class="update_air" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                       <input type="hidden" name="footprint_value">
                                       <input type="hidden" name="footprint_id" value="<?= $main_id ?>">
                                       <input type="hidden" name="form_type" value='1'>
                                       <input type="hidden" name="transport_type" value='2'>
                                       <input type="hidden" name="departure" id="rail_departure">
                                       <input type="hidden" name="arrival" id="rail_arrival">
                                       <input type="hidden" name="country_name" id="rail_country_name">
                                       <input type="hidden" name="people" id="rail_people">
                                       <input type="hidden" name="nights" id="rail_nights">
                                       <input type="hidden" class="footprint_one" value='0'>
                                       <input type="hidden" class="footprint_two" value='0'>
                                       <input type="hidden" class="footprint_three" value='0'>

                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="rail_departure_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="land_vehicle" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <!-- <div class="col-md-3 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_rail_distance"></span></p>
                                                <input type="hidden" id="location_rail_distance_main" name="distance_before">
                                             </div>
                                          </div> -->
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Footprint</p>
                                                <p class="fw-bolder"><span id="emission_distance"></span></p>
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_rail_distance"></span></p>
                                                <input type="hidden" id="location_rail_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> Train From </label>
                                                <select class="form-control" name="travel_from" id="departure_rail_station" onchange="find_distance_between_rail_station()">
                                                   <option value="0">Select From</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-5 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> To</label>
                                                <select class="form-control" name="travel_to" id="arrival_rail_station" onchange="find_distance_between_rail_station()">
                                                   <option value="0">Select To</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="rail_distance_emission"></span></p>
                                                <!-- <input type="hidden" id="rail_station_distance_main" name="distance"> -->
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="rail_station_distance"></span></p>
                                                <input type="hidden" id="rail_station_distance_main" name="distance">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_after" id="rail_arrival_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_after" class="form-control type_name_after" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_after" onchange="find_distance_between_rail_station()" name='model_name_after' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="rail_arrival_distane_emission"></span></p>

                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="location_arrival_rail_distance"></span></p>
                                                <input type="hidden" id="location_arrival_rail_distance_main" name="distance_after">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- tab3 -->
                                 <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                    <form class="update_air" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <div class="row">
                                          <input type="hidden" value="3" name="form_tab">
                                          <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="rail_departure_transfer11" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_arrival_taxi_distance"></span></p>
                                                <input type="hidden" id="location_arrival_taxi_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <!-- <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-plane-up"></i> Flying Type </label>
                                       <select class="form-control" id="flying_class" name="trip_class" onchange="find_air_distance()">
                                          <option value="economy">economy</option>
                                          <option value="premium">premium</option>
                                          <option value="business">business</option>
                                          <option value="first">first</option>
                                       </select>
                                    </div>
                                    </div> -->
                                          <!-- <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-car"></i>Address From </label>
                                       <input type="text" id="texi_departure" class="form-control" placeholder="Address From" name="travel_from" required>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-car"></i> To Address</label>
                                       <input type="text" id="texi_arrival" class="form-control" placeholder="Address to" name="travel_to" required>
                                    </div>
                                 </div> -->
                                       </div>
                                       <!-- <div class="row">
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="first-name-vertical"> Vehicle</label>
                                       <select class="form-control">
                                          <option value="0">Select Vehicle</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                       <label class="form-label" for="first-name-vertical"> Factor</label>
                                       <select class="form-control">
                                          <option value="0">Select Factor</option>
                                       </select>
                                    </div>
                                 </div>
                                 </div> -->
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                 </div>
                                 </form>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <h5 class="fw-bolder my-2"><i class="fa-solid fa-person-chalkboard"></i> Arriving at <span id="arrived"></span></h5>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2 col-12" style="text-align: right">
                                       <div class="mb-1">
                                          <p>Total Footprints</p>
                                          <p class="fw-bolder"><span id="total_footprint"></span></p>
                                       </div>
                                    </div>
                                    <div class="col-md-2 col-12" style="text-align: right">
                                       <div class="mb-1">
                                          <p>Homestay </p>
                                          <p class="fw-bolder"><span id="cost"></span></p>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="footprint"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end from1 -->
                  <?php } elseif ($footprint == 'Company Vehicle') { ?>
                     <!-- form2 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Company Vehicle Carbon Footprint Calculator</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <div class="row">
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <input type="hidden" name="form_type" value='4'>
                                          <label class="form-label" for="first-name-column">Mileage</label>
                                          <input type="text" id="first-name-column" class="form-control" placeholder="Mileage" name="mileage">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="last-name-column">Unit</label>
                                          <select class="form-control" name="unit" id="exampleFormControlSelect1">
                                             <option value="0">Select Unit</option>
                                             <?php foreach ($all_unit as $value) {
                                                if ($value['id'] == 5) { ?>
                                                   <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                             <?php }
                                             } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="city-column">Choose vehicle </label>
                                          <select class="form-control choose_vehicle" id="" name="choose_vehicle">
                                             <option value="0">Select Vehicle</option>
                                             <?php foreach ($choose_vehicle as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['vehicle_name'] ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="country-floating">Year</label>
                                          <select class="form-control choose_year" name="year" id="vehicle_info_1">
                                             <option value="0">Select year</option>
                                             <option value="2020">2020</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="company-column">Type</label>
                                          <select class="form-control choose_type" id="vehicle_info_2" name="type_name" onchange="getModelOfCompanyVehicle(this)">
                                             <option value="0">Select type</option>
                                             <option value="Large car">Large car</option>
                                             <option value="Average car">Average car</option>
                                             <option value="Small car">Small car</option>
                                             <option value="Medium car">Medium car</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="email-id-column">Model</label>
                                          <select class="form-control choose_model_name" id="vehicle_info_3" name="model_name">
                                             <option value="0">Select model</option>
                                             <option value="Diesel">Diesel</option>
                                             <option value="Petrol">Petrol</option>
                                             <option value="Hybrid">Hybrid</option>
                                             <option value="CNG">CNG</option>
                                             <option value="LPG">LPG</option>
                                             <option value="Unknown">Unknown</option>
                                             <option value="Battery Electric*">Battery Electric*</option>
                                             <option value="Plug-in Hybrid Electric*">Plug-in Hybrid Electric*</option>
                                          </select>
                                       </div>
                                    </div>
                                    <!-- <div class="col-md-4 col-12">
                                       <div class="mb-1">
                                          <label class="form-label choose_emission_factor" for="email-id-column">Factor</label>
                                          <select class="form-control" id="company_vehicle_factor" name="factor">
                                             <option value="0">Select Factor</option>
                                             <option value="182">Sulfur</option>
                                          </select>
                                       </div>
                                    </div> -->
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- end form2 -->
                  <?php } elseif ($footprint == 'Financial') { ?>
                     <!-- form3 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Financial New</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <div class="row">
                                    <div class="col-md-3 col-12">
                                       <div class="mb-1">
                                          <input type="hidden" name="form_type" value='11'>
                                          <label class="form-label" for="first-name-column">Finance</label>
                                          <select class="form-control label_select finance" id="finsanceCat" name="finance">
                                             <option value="0">Select Finance</option>
                                             <?php foreach ($all_finance as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['finance_name'] ?> </option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="last-name-column">Sub Finance</label>
                                          <select id="SubfinanceCata" class="form-control sub_finance" name="sub_finance" required="">
                                             <option value="0">Select Finance Sub category</option>
                                             <?php foreach ($all_sub_finance as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['sub_category'] ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <!-- <div class="col-md-3 col-12">
                                 <div class="mb-1">
                                    <label class="form-label" for="city-column">GHG Factor </label>
                                    <select class="form-control label_select" id="ghg_factor" name="ghg_factor" onchange="setUnit(this)">
                                       <option value="0">Select GHG Factor</option>
                                    </select>
                                 </div>
                                 </div> -->
                                    <div class="col-md-3 col-12">
                                       <div class="mb-1">
                                          <label class="form-label" for="email-id-column">Quantity/Unit</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-column" class="form-control" name="quantity" placeholder="Enter Product Weight" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="unit" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- end form3 -->
                  <?php } elseif ($footprint == 'Raw Materials') { ?>
                     <!-- form4 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Raw material carbon footprint calculator</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <input type="hidden" name="form_type" value='7'>
                                 <div class="row">
                                    <div class="append-data row col-md-11">
                                       <div class="col-md-4 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Materials</label>
                                             <select class="form-control label_select" id="" name="material[]">
                                                <option value="0">Select Materials</option>
                                                <?php foreach ($all_material as $value) { ?>
                                                   <option value="<?= $value['id']; ?>"><?= $value['factor_name']; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-12">
                                          <label class="form-label" for="email-id-column">Supplier Location</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-co" class="form-control" name="supplier_location[]" placeholder="Supplier Location" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-9 mb-1">
                                          <label class="form-label" for="email-id-column">Quantity/Unit</label>
                                          <div class="input-group">
                                             <input type="number" id="" class="form-control" name="quantity[]" placeholder="Enter Quantity" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="unit[]" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-1 col-3 mb-1">
                                       <button class="close append_close mb-1 btn btn-primary btn-sm" type="button" style='border:none; background-color:white; font-size: 20px; font-weight: bold; position: relative;top: 25px;' aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor($(this).parent().parent())"><span aria-hidden="true"><i class="fa-solid fa-plus"></i></span></button>
                                    </div>
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <div class="col-md-12">
                                          <div class="append-div"></div>
                                       </div>
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- end form4 -->
                  <?php } elseif ($footprint == 'Packaging') { ?>
                     <!-- form5 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Packaging carbon footprint calculator</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <input type="hidden" name="form_type" value='8'>
                                 <div class="row">
                                    <div class="append-data row col-md-11">
                                       <div class="col-md-4 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Materials</label>
                                             <select class="form-control label_select" id="" name="material[]">
                                                <option value="0">Select Materials</option>
                                                <?php foreach ($all_material as $value) { ?>
                                                   <option value="<?= $value['id']; ?>"><?= $value['factor_name']; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-12">
                                          <label class="form-label" for="email-id-column">Supplier Location</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-co" class="form-control" name="supplier_location[]" placeholder="Supplier Location" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-9 mb-1">
                                          <label class="form-label" for="email-id-column">Quantity/Unit</label>
                                          <div class="input-group">
                                             <input type="number" id="" class="form-control" name="quantity[]" placeholder="Enter Quantity" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="unit[]" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-1 col-3 mb-1">
                                       <button class="close append_close mb-1 btn btn-primary btn-sm" type="button" style='border:none; background-color:white; font-size: 20px; font-weight: bold; position: relative;
                                    top: 25px;' aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor($(this).parent().parent())"><span aria-hidden="true"><i class="fa-solid fa-plus"></i></span></button>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="append-div"></div>
                                    </div>
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- end form5 -->
                  <?php } elseif ($footprint == 'Manufacturing') { ?>
                     <!-- form6 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Manufacturing carbon footprint calculator</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <input type="hidden" name="form_type" value='6'>
                                 <div class="row">
                                    <div class="append-data row col-md-11">
                                       <div class="col-md-6 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Add Process</label>
                                             <select class="form-control label_select" id="finsanceCat" name="add_process[]">
                                                <option value="0">Select Process</option>
                                                <?php foreach ($manufacturing_process_detail as $value) { ?>
                                                   <option value="<?= $value['id'] ?>"><?= $value['process_name'] ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-5 col-9 mb-1">
                                          <label class="form-label" for="email-id-column">Enter Material Quantity/Unit</label>
                                          <div class="input-group">
                                             <input type="number" id="" class="form-control" name="quantity[]" placeholder="Material Quantity" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="unit[]" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-1 col-3">
                                       <button class="close append_close mb-1 btn btn-primary btn-sm" type="button" style='border:none; background-color:white; font-size: 20px; font-weight: bold; position: relative;
                                    top: 25px;' aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor($(this).parent().parent())"><span aria-hidden="true"><i class="fa-solid fa-plus"></i></span></button>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="append-div"></div>
                                    </div>
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <button type="submut" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- end form6 -->
                  <?php } elseif ($footprint == 'Transportation') { ?>
                     <!-- form7 -->
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Transportation carbon footprint calculator</h4>
                           </div>
                           <div class="card-body">
                              <form class="form okoko" id="flight_frm" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                 <div class="row">
                                    <div class="col-md-6 col-12">
                                       <div class="mb-1">
                                          <input type="hidden" name="form_type" value='12'>
                                          <label class="form-label" for="first-name-column">Location From</label>
                                          <input type="text" id="departure" class="form-control" placeholder="Enter Departure" name="location_from" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                       <label class="form-label" for="email-id-column">Location To</label>
                                       <div class="input-group">
                                          <input type="text" id="arrival" class="form-control" name="location_to" placeholder="Location To" required="">
                                       </div>
                                    </div>
                                    <div class="col-12 text-center mt-2 mb-1">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light ok"> Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>

                           <div class="mt-3 air_ok" style='display:none;'>
                              <p class="ms-1">Choose the main method of transportation for this trip. It helps us make accurate calculations.</p>
                              <ul class="nav ms-2 nav-tabs" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true"><i class="fa-solid fa-bus"></i> Bus</a>
                                 </li>
                                 <li class="nav-item mx-1">
                                    <a class="nav-link" id="rail" data-bs-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false"><i class="fa-solid fa-train-tram"></i> Rail</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false" onclick="taxi()"><i class="fa-solid fa-car"></i> Taxi</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <!-- tab1 -->
                                 <h5 class="fw-bolder my-2"><i class="fa-solid fa-house-user"></i> Departing from <span id="deport"></span></h5>
                                 <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                    <form class="okoko" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                       <input type="hidden" name="transport_type" value='1'>
                                       <input type="hidden" name="footprint_value">
                                       <input type="hidden" name="form_type" value='1'>
                                       <input type="hidden" name="departure" id="hide_departure" value='1'>
                                       <input type="hidden" name="arrival" id="hide_arrival" value='1'>
                                       <input type="hidden" name="country_name" id="country_name">
                                       <input type="hidden" name="people" id="hide_people" value='1'>
                                       <input type="hidden" name="nights" id="hide_nights" value='1'>
                                       <input type="hidden" class="footprint_one" value='0'>
                                       <input type="hidden" class="footprint_two" value='0'>
                                       <input type="hidden" class="footprint_three" value='0'>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="bus_departure_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical_transportion as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="land_vehicle" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext" id="emission_first"></span>
                                                   </i>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_bus_distance"></span></p>
                                                <input type="hidden" id="location_bus_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-5 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-bus"></i> From,</label>
                                                <select class="form-control" name="travel_from" id="departure_bus_station" onchange="find_distance_between_bus_station()">
                                                   <option value="0">Select From</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-bus"></i> To</label>
                                                <select class="form-control" name="travel_to" id="arrival_bus_station" onchange="find_distance_between_bus_station()">
                                                   <option value="0">Select To</option>
                                                </select>
                                             </div>
                                          </div>
                                          <!-- <div class="col-md-1 col-12">
                                             <div class="mb-1">
                                                <button type="button" class="btn btn-dark btn-sm" id="bussaddmore" style="margin-top: 27px;"><i class="fa fa-plus"></i></button>
                                             </div>
                                          </div> -->
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext val-shows" id="bus_distance_emission"></span>
                                                   </i>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span class="val-show" id="location_arrival_departure_bus_distance"></span></p>
                                                <input type="hidden" id="location_arrival_departure_bus_distance_main" name="distance">
                                             </div>
                                          </div>
                                       </div>
                                       <div id="busaddmoredata"></div>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_after" id="bus_arrival_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical_transportion as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_after" class="form-control type_name_after" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_after" name='model_name_after' onchange="find_distance_between_bus_station()" require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext" id="emission_bus_arrival"></span>
                                                   </i>
                                                </div>
                                                <!-- <input type="hidden" name="distance_after"> -->
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="location_arrival_bus_distance"></span></p>
                                                <input type="hidden" id="location_arrival_bus_distance_main" name="distance_after">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- tab2 -->
                                 <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                    <form class="update_air" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                       <input type="hidden" name="footprint_value">
                                       <input type="hidden" name="footprint_id" value="<?= $main_id ?>">
                                       <input type="hidden" name="form_type" value='1'>
                                       <input type="hidden" name="transport_type" value='2'>
                                       <input type="hidden" name="departure" id="rail_departure">
                                       <input type="hidden" name="arrival" id="rail_arrival">
                                       <input type="hidden" name="country_name" id="rail_country_name">
                                       <input type="hidden" name="people" id="rail_people">
                                       <input type="hidden" name="nights" id="rail_nights">
                                       <input type="hidden" class="footprint_one" value='0'>
                                       <input type="hidden" class="footprint_two" value='0'>
                                       <input type="hidden" class="footprint_three" value='0'>

                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="rail_departure_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical_transportion as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="land_vehicle" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <!-- <div class="col-md-3 col-12" style="text-align: right">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_rail_distance"></span></p>
                                                <input type="hidden" id="location_rail_distance_main" name="distance_before">
                                             </div>
                                          </div> -->
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <!-- <p>Footprint</p> -->
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext" id="emission_distance"></span>
                                                   </i>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_rail_distance"></span></p>
                                                <input type="hidden" id="location_rail_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-5 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> Train From </label>
                                                <select class="form-control" name="travel_from" id="departure_rail_station" onchange="find_distance_between_rail_station()">
                                                   <option value="0">Select From</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> To</label>
                                                <select class="form-control" name="travel_to" id="arrival_rail_station" onchange="find_distance_between_rail_station()">
                                                   <option value="0">Select To</option>
                                                </select>
                                             </div>
                                          </div>
                                          <!-- <div class="col-md-1 col-12">
                                             <div class="mb-1">
                                                <button type="button" class="btn btn-dark btn-sm" id="trainaddmore" style="margin-top: 27px;"><i class="fa fa-plus"></i></button>
                                             </div>
                                          </div> -->
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <!-- <p class="fw-bolder"><span id="rail_distance_emission"></span></p> -->
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext val-shows" id="rail_distance_emission"></span>
                                                   </i>
                                                </div>
                                                <!-- <input type="hidden" id="rail_station_distance_main" name="distance"> -->
                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span class="val-show" id="rail_station_distance"></span></p>
                                                <input type="hidden" id="rail_station_distance_main" name="distance">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="append_data"></div>
                                       <div class="row">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_after" id="rail_arrival_transfer" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical_transportion as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_after" class="form-control type_name_after" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_after" onchange="find_distance_between_rail_station()" name='model_name_after' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-1 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <div class="tooltip1"><i class="fas fa-info-circle">
                                                      <span class="tooltiptext" id="rail_arrival_distane_emission"></span>
                                                   </i>
                                                </div>
                                                <!-- <p class="fw-bolder"><span id="rail_arrival_distane_emission"></span></p> -->

                                             </div>
                                          </div>
                                          <div class="col-md-2 col-12 text-center">
                                             <div class="mb-1">
                                                <p></p>
                                                <p class="fw-bolder"><span id="location_arrival_rail_distance"></span></p>
                                                <input type="hidden" id="location_arrival_rail_distance_main" name="distance_after">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                    </form>
                                 </div>
                                 <!-- tab3 -->
                                 <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                    <form class="update_air" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <div class="row">
                                          <input type="hidden" value="3" name="form_tab">
                                          <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                <select class="form-control" name="vehical_before" id="rail_departure_transfer11" require="require">
                                                   <option value="0">Select Vehicle</option>
                                                   <?php foreach ($vehical_transportion as  $key => $a) : ?>
                                                      <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Type</label>
                                                <select name="type_name_before" class="form-control type_name_before" id="" require="require">
                                                   <option value="0">Select Type</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-vertical">Model</label>
                                                <select class="form-control model_name_before" name='model_name_before' require="require">
                                                   <option value="0">Select Model</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-12">
                                             <div class="mb-1">
                                                <p>Distance</p>
                                                <p class="fw-bolder"><span id="location_arrival_taxi_distance"></span></p>
                                                <input type="hidden" id="location_arrival_taxi_distance_main" name="distance_before">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">

                                       </div>
                                       <div class="col-sm-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                 </div>
                                 </form>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <h5 class="fw-bolder my-2"><i class="fa-solid fa-person-chalkboard"></i> Arriving at <span id="arrived"></span></h5>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2 col-12" style="text-align: right">
                                       <div class="mb-1">
                                          <p>Total Footprints</p>
                                          <p class="fw-bolder"><span id="total_footprint"></span></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end form7 -->
                     <?php } elseif ($footprint == 'Energy') { ?>
                        <!-- form8 -->
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Energy carbon footprint calculator</h4>
                              </div>
                              <div class="card-body">
                                 <form class="form okok" method="POST">
                                    <div class="row">
                                       <?php foreach ($list as $key => $value) { ?>
                                          <div class="col-md-6 col-12 mb-1">
                                             <input type="hidden" name="form_type" value='3'>
                                             <label class="form-label" for="id-<?= $value['id'] ?>">Enter <?= $value['factor_name'] ?>/Unit</label>
                                             <div class="input-group">
                                                <input type="number" data-unit-id="<?= $value['unit_id'] ?>" data-factor-id="<?= $value['factor_id'] ?>" id="id-<?= $value['id'] ?>" class="input-value form-control" placeholder="<?= $value['factor_name'] ?>" required>
                                                <div class="input-group-text p-0">
                                                   <select class="form-select shadow-none bg-light border-0" disabled>
                                                      <option value="<?= $value['unit_id'] ?>" selected disabled><?= $value['unit_name'] ?></option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       <?php } ?>
                                       <div class="col-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- end form8 -->
                     <?php } elseif ($footprint == 'Water') { ?>
                        <!-- form9 -->
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Water</h4>
                              </div>
                              <div class="card-body">
                                 <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                    <div class="row">
                                       <div class="col-md-4 col-12 mb-1">
                                          <input type="hidden" name="form_type" value='5'>
                                          <label class="form-label" for="email-id-column">Enter Water Supply/Unit</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-column" class="form-control" name="water_supply" placeholder="Water Supply" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="water_supply_unit" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-12 mb-1">
                                          <label class="form-label" for="email-id-column">Enter Waste water/Unit</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-column" class="form-control" name="waste_water" placeholder="Waste water" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="waste_water_unit" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-12 mb-1">
                                          <label class="form-label" for="email-id-column">Enter Tap water/Unit</label>
                                          <div class="input-group">
                                             <input type="text" id="email-id-column" class="form-control" name="tap_water" placeholder="Tap water" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0" name="tap_water_unit" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- end form9 -->
                     <?php } elseif ($footprint == 'Consumables') { ?>
                        <!-- form10 -->
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Consumables</h4>
                              </div>
                              <div class="card-body">
                                 <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                    <input type="hidden" name="form_type" value='10'>
                                    <div class="row">
                                       <div class="append-data row col-md-11">
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Select Consumption</label>
                                                <select class="form-control label_select consumption" id="finsanceCat" name="consumption[]">
                                                   <option value="0">Select Consumption</option>
                                                   <?php foreach ($consumption as $row) { ?>
                                                      <option value="<?= $row['id'] ?>"><?= $row['consumption_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-4 col-12">
                                             <div class="mb-1">
                                                <label class="form-label" for="first-name-column">Select Consumption Sub Category</label>
                                                <select class="form-control label_select consumption_sub_category" id="" name="consumption_sub_category[]">
                                                   <option value="0">Select Consumption Sub Category</option>
                                                   <?php foreach ($consumption_sub_category as $row) { ?>
                                                      <option value="<?= $row['id'] ?>"><?= $row['sub_category'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 col-9 mb-1">
                                             <label class="form-label" for="email-id-column">Quantity/Unit</label>
                                             <div class="input-group">
                                                <input type="number" id="" class="form-control" name="quantity[]" placeholder="Enter Quantity" required="">
                                                <div class="input-group-text p-0">
                                                   <select class="form-select shadow-none bg-light border-0" name="unit[]" required="">
                                                      <option value="0">Select Unit</option>
                                                      <?php foreach ($all_unit as $value) { ?>
                                                         <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-1 col-3">
                                          <button class="close append_close mb-1 btn btn-primary btn-sm" type="button" style='border:none; background-color:white; font-size: 20px; font-weight: bold; position: relative;
                                    top: 25px;' aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor($(this).parent().parent())"><span aria-hidden="true"><i class="fa-solid fa-plus"></i></span></button>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="append-div"></div>
                                       </div>
                                       <div class="col-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- end form10 -->
                     <?php } elseif ($footprint == 'Mobile Fuel') { ?>
                        <!-- form11 -->
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Mobile fuel carbon footprint calculator</h4>
                              </div>
                              <div class="card-body">
                                 <form class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST">
                                    <input type="hidden" name="form_type" value='9'>
                                    <div class="row">
                                       <!-- <div class="append-data row col-md-11"> -->
                                       <div class="col-md-6 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="first-name-column">Materials</label>
                                             <select class="form-control label_select" onchange="get_unit($(this))" id="" name="material[]">
                                                <option value="0">Select Materials</option>
                                                <?php foreach ($all_material as $value) { ?>
                                                   <option value="<?= $value['id']; ?>"><?= $value['factor_name']; ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-5 col-9 mb-1">
                                          <label class="form-label" for="email-id-column">Enter Material Quantity/Unit</label>
                                          <div class="input-group">
                                             <input type="number" id="" class="form-control" name="quantity[]" placeholder="Material Quantity" required="">
                                             <div class="input-group-text p-0">
                                                <select class="form-select shadow-none bg-light border-0 unit_change" name="unit[]" required="">
                                                   <option value="0">Select Unit</option>
                                                   <?php foreach ($all_unit as $value) { ?>
                                                      <option value="<?= $value['id'] ?>"><?= $value['unit_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-1 col-3">
                                          <button class="close append_close mb-1 btn btn-primary btn-sm" type="button" style='border:none; background-color:white; font-size: 20px; font-weight: bold; position: relative;
                                    top: 25px;' aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor($(this).parent().parent())"><span aria-hidden="true"><i class="fa-solid fa-plus"></i></span></button>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="append-div"></div>
                                       </div>
                                    </div>
                                    <div class="text-center mt-2 mb-1">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"> Add To Footprint</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- end form11 -->
                     <?php } elseif ($footprint == 'Business Travel Air') { ?>
                        <!-- form12 -->
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">Business Travel Air Carbon Calculator</h4>
                              </div>
                              <div class="card-body">
                                 <form id='' class="form okoko" action="<?= base_url("/Quantitative/answerFootprint") ?>/<?= $main_id ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                       <div class="col-md-3 col-12">
                                          <div class="mb-1">
                                             <input type="hidden" name="form_type" value='2'>
                                             <label class="form-label" for="first-name-column">Departure</label>
                                             <input type="text" id="departure" class="form-control" placeholder="Enter Departure" name="departure" required>
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="last-name-column">Arrival</label>
                                             <input type="text" id="arrival" class="form-control" placeholder="Enter Arrival" name="arrival" required>
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="city-column">People</label>
                                             <select class="form-control" id="people" name="people" required>
                                                <option value="1">1 person</option>
                                                <option value="2">2 people</option>
                                                <option value="3">3 people</option>
                                                <option value="4">4 people</option>
                                                <option value="5">5 people</option>
                                                <option value="6">6 people</option>
                                                <option value="7">7 people</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="country-floating">Nights</label>
                                             <select class="form-control" id="nights" name="nights" required>
                                                <option value="1">1 night</option>
                                                <option value="2">2 nights</option>
                                                <option value="3">3 nights</option>
                                                <option value="4">4 nights</option>
                                                <option value="5">5 nights</option>
                                                <option value="6">6 nights</option>
                                                <option value="7">7 nights</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-12 text-center mt-2 mb-1">
                                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                          <button type="reset" class="btn btn-outline-secondary waves-effect" id="reset-btn">Reset</button>
                                       </div>
                                    </div>
                                 </form>
                                 <!-- hide form -->
                                 <div class="mt-3 air_ok" style='display:none;'>
                                    <p class="ms-1">Choose the main method of transportation for this trip. It helps us make accurate calculations.</p>
                                    <ul class="nav ms-2 nav-tabs" role="tablist">
                                       <li class="nav-item">
                                          <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false"><i class="fa-solid fa-plane-up"></i> Air</a>
                                       </li>
                                    </ul>
                                    <form class="update_air" action="<?= base_url("Quantitative/updateAirTravel"); ?>" method='Post'>
                                       <input type="hidden" value='<?php if (!empty($footprint_answer)) echo $footprint_answer['id']; ?>' name="air_id">
                                       <div class="">
                                          <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                             <h5 class="fw-bolder my-2"><i class="fa-solid fa-house-user"></i> Departing from <span id="deport"></span></h5>
                                             <div class="row">
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                      <select class="form-control" name="vehical_before" id="airport_transfer_departure_fuel" require="require">
                                                         <option value="0">Select Vehicle</option>
                                                         <?php foreach ($vehical as  $key => $a) : ?>
                                                            <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                         <?php endforeach; ?>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Type</label>
                                                      <select name="type_name_before" class="form-control type_name_before" id="land_vehicle" require="require">
                                                         <option value="0">Select Type</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Model</label>
                                                      <select class="form-control model_name_before" name='model_name_before' require="require">
                                                         <option value="0">Select Model</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-2 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p>Footprint</p>
                                                      <!-- <p class="fw-bolder"><span id="location_airport_distance"></span></p>
                                                   <input type="hidden" id="location_airport_distance_main" name="distance_before"> -->
                                                   </div>
                                                </div>
                                                <div class="col-md-1 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p>Distance</p>
                                                      <p class="fw-bolder"><span id="location_airport_distance"></span></p>
                                                      <input type="hidden" id="location_airport_distance_main" name="distance_before">
                                                   </div>
                                                </div>
                                                <!-- <div class="col-md-3 col-12">
                                          <div class="mb-1">
                                             <label class="form-label" for="first-name-vertical">Factor</label>
                                             <select class="form-control">
                                                <option value="0">Select Factor</option>
                                             </select>
                                          </div>
                                          </div> -->
                                             </div>
                                             <div class="row">
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-plane-up"></i> Flying Type </label>
                                                      <select class="form-control" id="flying_class" name="trip_class" onchange="find_air_distance()" require="require">
                                                         <option value="0">Select Flying type</option>

                                                         <?php foreach ($flight_detail as $flight_id) { ?>
                                                            <option value="<?= $flight_id['flight_class']; ?>"><?= $flight_id['flight_class']; ?></option>

                                                         <?php
                                                         } ?>

                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-plane-up"></i> Flying From </label>
                                                      <select class="form-control" name='travel_from' id="departure_airport" onchange="find_air_distance()" require="require">
                                                         <option value="0">Select From</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical"><i class="fa-solid fa-plane-up"></i> To</label>
                                                      <select class="form-control" name='travel_to' id="arrival_airport" onchange="find_air_distance()" require="require">
                                                         <option value="0">Select To</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-2 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p></p>
                                                      <p class="fw-bolder"><span id="airport_distance_emission"></span></p>
                                                      <!-- <input type="hidden" id="location_airport_distance_main" name="distance_before">  -->
                                                   </div>
                                                </div>
                                                <div class="col-md-1 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p></p>
                                                      <p class="fw-bolder"><span id="airport_distance"></span></p>
                                                      <input type="hidden" id="airport_distance_main" name="distance">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Vehicle</label>
                                                      <select class="form-control" name="vehical_after" id="airport_transfer_arrival_fuel" require="require">
                                                         <option value="0">Select Vehicle</option>
                                                         <?php foreach ($vehical as  $key => $a) : ?>
                                                            <option value="<?php echo $a['id']; ?>" onchange="getVehicleFactorForAirport('<?= $a['id'] ?>','<?= $a['vehicle_name'] ?>')"><?php echo $a['vehicle_name']; ?></option>
                                                         <?php endforeach; ?>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Type</label>
                                                      <select name="type_name_after" class="form-control type_name_after" id="" require="require">
                                                         <option value="0">Select Type</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                   <div class="mb-1">
                                                      <label class="form-label" for="first-name-vertical">Model</label>
                                                      <select class="form-control model_name_after" name='model_name_after' require="require">
                                                         <option value="0">Select Model</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-2 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p></p>
                                                      <p class="fw-bolder"><span id="airport_arrival_distane_emission1"></span></p>
                                                      <!-- <input type="hidden" id="location_arrival_airport_distance_main" name="distance_after"> -->
                                                   </div>
                                                </div>
                                                <div class="col-md-1 col-12" style="text-align: right">
                                                   <div class="mb-1">
                                                      <p></p>
                                                      <p class="fw-bolder"><span id="location_arrival_airport_distance"></span></p>
                                                      <input type="hidden" id="location_arrival_airport_distance_main" name="distance_after">
                                                   </div>
                                                </div>
                                             </div>
                                             <h5 class="fw-bolder my-2"><i class="fa-solid fa-person-chalkboard"></i> Arriving at <span id="arrived"></span></h5>
                                          </div>
                                          <div class="col-sm-12 text-center mt-2 mb-1">
                                             <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add To Footprint</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end from12 -->
                     <?php } ?>
                     <!-- <form action="<?= base_url(); ?>/Quantitative/getAirportByLocation" method="post">
                  <input type="text" name="departure">
                  <input type="text" name="arrival">
                  <input type="submit" value="ok"> -->
                     <!-- </form> -->
                     <!-- <form action='<?= base_url(); ?>/Quantitative/getAirportByLocation' method="post">
                  <input type="text" name="departure" value="Indore, Madhya Pradesh, India">
                  <input type="text" name="arrival" value="Delhi, India">
                  <input type="submit" value="ok">
                  </form> -->
                     </div>
         </section>
      </div>
   </div>
</div>
<div class="row" id="map"></div>
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCard">
   Show
   </button> -->
<!-- add new card modal  -->
<div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-transparent">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-sm-5 mx-50 pb-5">
            <h1 class="text-center mb-1" id="addNewCardTitle">Confirm & complete footprint</h1>
            <p class="text-center">If you confirm you never change this footprint details</p>
            <!-- form -->
            <form id="" class="row gy-1 gx-2 mt-75" mothod="post" action="<?= base_url('Quantitative/completeFootprint'); ?>">
               <div class="col-12">
                  <label class="form-label" for="modalAddCardNumber">From</label>
                  <input type="hidden" name="form_type_9" id="form_type_9">
                  <input type="hidden" name="main_id" value='<?= $main_id ?>'>
                  <div class="input-group input-group-merge">
                     <input id="modalAddCardNumber" name="from_date" class="form-control add-credit-card-mask" type="date" require="require" />
                     <span class="input-group-text cursor-pointer p-25" id="modalAddCard2">
                        <span class="add-card-type"></span>
                     </span>
                  </div>
               </div>
               <div class="col-md-12">
                  <label class="form-label" for="modalAddCardName">To From</label>
                  <input type="date" id="modalAddCardName" name="to_from_date" class="form-control" require="require" />
               </div>
               <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-1 mt-1">Confirm</button>
                  <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                     Cancel
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="row" style="display:none">
   <!--<div class="row">-->
   <div class="form-check">
      <input type="checkbox" class="form-check-input" id="bus_round_trip" checked="checked">
      <label class="form-check-label" for="exampleCheck1">
         <h6>Round trip</h6>
         <p>Uncheck if your journey continues on another booking</p>
      </label>
   </div>
</div>
<!--<div class="row">-->
<div class="row" style="display:none">
   <div class="form-check">
      <input type="checkbox" class="form-check-input" id="airport_round_trip" checked="checked" name="trip_status" value="1">
      <label class="form-check-label" for="exampleCheck1">
         <h6>Round trip</h6>
         <p>Uncheck if your journey continues on another booking</p>
      </label>
   </div>
</div>
<!--<div class="row">-->
<div class="row" style="display:none">
   <div class="form-check">
      <input type="checkbox" class="form-check-input" id="rail_round_trip" checked="checked">
      <label class="form-check-label" for="exampleCheck1">
         <h6>Round trip</h6>
         <p>Uncheck if your journey continues on another booking</p>
      </label>
   </div>
</div>

<!--/ add new card modal  -->
<!-- <div class="pb-2">
   <h3>Confirmation dialog</h3>
   <pre><code class="language-javascript"><script>$.showConfirm({
       title: "Please confirm", body: "Do you like cats?", textTrue: "Yes", textFalse: "No",
       onSubmit: function (result) {
           if (result) {
               $.showAlert({title: "Result: " + result, body: "You like cats."})
           } else {
               $.showAlert({title: "Result: " + result, body: "You don't like cats."})
           }
       },
       onDispose: function () {
           console.log("The confirm dialog vanished")
       }
   })</script></code></pre>
   <button type="button" id="button-confirm" class="btn btn-primary">Show diew f89ur iu4uh fiu43hg 4iuhf ui 5hirujConfirm</button>
   </div> -->



<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?= base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
   // console.log($('#departure_rail_station').find(':selected').data('nm'))
   $(document).ready(function() {
      $('.tooltip').tooltip();
      $('#add-more-rows').prop('disabled', true);
      $('#example').DataTable();
      $('.ok').on('click', function() {
         $('.okforms').show();


      })

      // var trainappend = false;
      // $("#trainaddmore").click(function() {
      //    if (!trainappend) {
      //       // $('.show_').css('display', 'flex');
      //       // return false;
      //       let append_data = `
      //             <div class="row trainremove">
      //                <div class="col-md-4 col-12">
      //                   <div class="mb-1">
      //                      <input type="hidden" name="form_type" value='1'>
      //                      <label class="form-label" for="first-name-column">Train From</label>
      //                      <span><input type="text" id="departure11" onchange="cd_for_rail($(this))" class="form-control" placeholder="Enter Departure" name="departure" required></span>
      //                      </div>
      //                </div>
      //          <div class="col-md-4 col-12">
      //             <div class="mb-1"><label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> To </label>
      //             <select class="form-control" name="travel_to" id="departure_rail_station11" onchange="cd_for_rail($(this))">
      //                   <option value="0">Select From</option>
      //                </select></div>
      //          </div>
      //         <!-- <div class="col-md-4 col-12">
      //             <div class="mb-1"><label class="form-label" for="first-name-vertical"><i class="fa-solid fa-train-tram"></i> To</label>
      //                <select class="form-control" name="travel_to" id="arrival_rail_station" onchange="cd_for_rail($(this))">
      //                   <option value="0">Select To</option>
      //                </select>
      //             </div>
      //          </div> -->
      //          <div class="col-md-1 col-12">
      //             <div class="mb-1">
      //                <button type="button" class="trainaddmoreremove btn btn-danger ps-1 pe-1 btn-sm" style="margin-top: 28px;"><i class="fa-solid fa-xmark"></i></button>
      //             </div>
      //          </div>
      //          <div class="col-md-1 col-12 text-center">
      //             <div class="mb-1">
      //                <p></p>
      //                <div class="tooltip1"><i class="fas fa-info-circle">
      //                      <span class="tooltiptext val-shows"></span>
      //                   </i>
      //                </div>
      //             </div>
      //          </div>
      //          <div class="col-md-2 col-12 text-center">
      //             <div class="mb-1">
      //                <p></p>
      //                <p class="fw-bolder"><span class="val-show"></span></p>
      //                <!--<input type="hidden" id="location_arrival_departure_bus_distance_main" name="distance">-->
      //             </div>
      //          </div>
      //       </div>`;
      //       $('.append_data').append(append_data);
      //       $('#departure_rail_station11').html($('#arrival_rail_station').html());
      //       $('#departure_rail_station11').val($('#arrival_rail_station').val());
      //       $('#departure_rail_station11').attr('id', 'arrival_rail_station');
      //       $('#arrival_rail_station').removeAttr('onchange');
      //       $('#select-to-input-change').html('<input type="text" id="departure2" class="form-control" name="departure" required>');
      //       const optionss = {
      //          componentRestrictions: {
      //             country: "IN"
      //          },
      //       };
      //       let gfd = document.getElementById('departure2');
      //       let gfdf = document.getElementById('departure11');
      //       new google.maps.places.Autocomplete(gfd, optionss);
      //       new google.maps.places.Autocomplete(gfdf, optionss);
      //       trainappend = true;
      //    }
      //    // $('.trainaddmoreremove').click(function() {
      //    //    let add_html = $('#arrival_rail_station').html(),
      //    //       val = $('#arrival_rail_station').val();
      //    //    $('#select-to-input-change').html(`<select class="form-control" name="travel_to" id="arrival_rail_station" onchange="cd_for_bus($(this))">
      //    //                                              <option value="0">Select To</option>
      //    //                                           </select>`);
      //    //    $('#arrival_rail_station').html(add_html);
      //    //    $('#arrival_rail_station').val(val);
      //    //    $(this).closest('.trainremove').remove();
      //    //    find_distance_between_rail_station();
      //    //    trainappend = false;
      //    // });
      // });
   });


   // $(document).on('blur', '#departure2', function() {
   //    setTimeout(() => {
   //       $('#departure11').val($('#departure2').val());
   //       cd_for_rail($('#departure11'))
   //       cd_for_rail($(this))
   //    }, 200);
   // })


   // $(document).on('blur', '#departure11', function() {
   //    setTimeout(() => {
   //       $('#departure2').val($('#departure11').val());
   //       cd_for_rail($('#departure2'))
   //       cd_for_rail($(this))
   //    }, 200);
   // })

   // $(document).ready(function() {
   //    var isAppended = false;

   //    $("#bussaddmore").click(function() {
   //       if (!isAppended) {
   //          var add = `
   //                   <div class="row addmorebus">
   //          <div class="col-md-4 col-12">
   //             <div class="mb-1"><label class="form-label" for="first-name-vertical">
   //                   <i class="fa-solid fa-bus"> </i> From,</label>
   //               <!-- <select class="form-control" name="travel_from" id="departure_bus_station" onchange="find_distance_between_bus_station()">
   //                   <option value="0"> Select From </option>
   //                </select>-->
   //                <span><input type="text" id="departure_bus_station11" onchange="cd_for_bus($(this))" class="form-control" placeholder="Enter Departure" name="departure" required></span> </div>
   //          </div>
   //          <div class="col-md-4 col-12">
   //             <div class="mb-1">
   //                <label class="form-label" for="first-name-vertical"> <i class="fa-solid fa-bus"> </i> To</label>
   //                <select class="form-control" name="travel_to" id="arrival_bus_station11" onchange="cd_for_bus($(this))">
   //                   <option value="0"> Select To </option>
   //                </select>
   //             </div>
   //          </div>
   //          <div class="col-md-1 col-12">
   //             <div class="mb-1">
   //                <button type="button" class="busaddmoreremove btn btn-danger btn-sm" style="margin-top: 28px;"><i class="fa-solid fa-xmark"></i></button>
   //             </div>
   //          </div>
   //          <div class="col-md-1 col-12 text-center">
   //                <div class="mb-1">
   //                   <p></p>
   //                   <div class="tooltip1"><i class="fas fa-info-circle">
   //                         <span class="tooltiptext val-shows"></span>
   //                      </i>
   //                   </div>
   //                </div>
   //             </div>
   //             <div class="col-md-2 col-12 text-center">
   //                <div class="mb-1">
   //                   <p></p>
   //                   <p class="fw-bolder"><span class="val-show"></span></p>
   //                   <!--<input type="hidden" id="location_arrival_departure_bus_distance_main" name="distance">-->
   //                </div>
   //             </div>
   //          </div>`;
   //          $("#busaddmoredata").append(add);
   //          isAppended = true;

   //          $('#arrival_bus_station11').html($('#arrival_bus_station').html());
   //          $('#arrival_bus_station11').val($('#arrival_bus_station').val());
   //          $('#arrival_bus_station11').attr('id', 'arrival_bus_station');
   //          $('#select-to-input-change-bus').html('<input type="text" id="departure22" class="form-control" name="departure" required>');
   //          const optionss = {
   //             componentRestrictions: {
   //                country: "IN"
   //             },
   //          };
   //          let gfd = document.getElementById('departure_bus_station11');
   //          let gfdf = document.getElementById('departure22');
   //          new google.maps.places.Autocomplete(gfd, optionss);
   //          new google.maps.places.Autocomplete(gfdf, optionss);

   //       }



   //       $(document).on('blur', '#departure_bus_station11', function() {
   //          setTimeout(() => {
   //             $('#departure22').val($('#departure_bus_station11').val());
   //             cd_for_bus($('#departure22'))
   //             cd_for_bus($(this))
   //          }, 200);
   //       })


   //       $(document).on('blur', '#departure22', function() {
   //          setTimeout(() => {
   //             $('#departure_bus_station11').val($('#departure22').val());
   //             cd_for_bus($('#departure_bus_station11'))
   //             cd_for_bus($(this))
   //          }, 200);
   //       })


   //       $('.busaddmoreremove').click(function() {
   //          let add_html = $('#arrival_bus_station').html(),
   //             val = $('#arrival_bus_station').val();
   //          $(this).closest('.addmorebus').remove();
   //          $('#select-to-input-change-bus').html(`<select class="form-control" name="travel_to" id="arrival_bus_station" onchange="cd_for_bus($(this))"><option value="0">Select To</option></select>`);
   //          $('#arrival_bus_station').html(add_html);
   //          $('#arrival_bus_station').val(val);
   //          isAppended = false;
   //          find_distance_between_bus_station();
   //       });
   //    });
   // });

   function get_unit(that) {
      if (that.val() != 0) {
         $.ajax({
            type: "get",
            url: "<?= site_url('Quantitative/get_unit/') ?>" + that.val(),
            success: function(response) {
               console.log(response)
               that.parent().parent().parent().find('.unit_change').eq(0).val(response);
            }
         });
      }
   }

   function addMoreFactor(that) {
      let append_data = `
               <div class="row">
            <div class="col-md-6 col-12">
               <div class="mb-1">
                  <label class="form-label" for="first-name-column"> Materials </label>
                  <select class="form-control label_select" onchange="get_unit($(this))" id="" name="material[]">
                     <option value="0" selected> Select Materials </option>
                     <?php foreach ($all_material as $value) { ?>
                        <option value="<?= $value['id']; ?>"> <?= $value['factor_name']; ?> </option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-md-5 col-9 mb-1">
               <label class="form-label" for="email-id-column"> Enter Material Quantity / Unit </label>
               <div class="input-group">
                  <input type="number" class="form-control" name="quantity[]" placeholder="Material Quantity" required="">
                  <div class="input-group-text p-0">
                     <select class="form-select shadow-none bg-light border-0 unit_change" name="unit[]" required="">
                        <option value="0" selected> Select Unit </option>
                        <?php foreach ($all_unit as $value) { ?>
                           <option value="<?= $value['id'] ?>"> <?= $value['unit_name'] ?> </option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-1 col-3">
               <button type="button" onclick="$(this).parent().parent().remove()" style="margin-top: 25px;" class="btn btn-danger">
                  <i class="fa fa-solid fa-close">
                  </i></button>
            </div>
         </div>`;

      $('.append_data').append(append_data);
   }

   // function cd_for_rail(that) {
   //    var parent = that.parent().parent().parent();
   //    if (!parent.hasClass('row')) {
   //       parent = parent.parent();
   //    }
   //    var service = new google.maps.DistanceMatrixService(),
   //       destinationA = parent.find('.pac-target-input').val();
   //    if (parent.find('select[name="travel_to"]').length) var origin2 = parent.find('select').find(':selected').data('nm') + ', ' + $('#arrival').val();
   //    else var origin2 = parent.find('select').find(':selected').data('nm') + ', ' + $('#departure').val();
   //    if (origin2 && destinationA) {
   //       console.log(origin2)
   //       console.log(destinationA)
   //       let request = {
   //          origins: [origin2],
   //          destinations: [destinationA],
   //          travelMode: google.maps.TravelMode.DRIVING,
   //          unitSystem: google.maps.UnitSystem.METRIC,
   //          avoidHighways: false,
   //          avoidTolls: false,
   //       };
   //       service.getDistanceMatrix(request).then((response) => {
   //          console.log(response.rows);
   //          console.log(response.rows[0].elements[0].distance.text)
   //          let res = response.rows[0].elements[0].distance;
   //          if (res) {
   //             parent.find('.val-show').html(res.text)
   //             parent.find('.val-shows').html(res.value)
   //             // return false;
   //          } else {
   //             find_distance_between_rail_station();
   //          }
   //       })
   //    } else {
   //       find_distance_between_rail_station();
   //    }
   // }


   // function cd_for_bus(that) {
   //    var parent = that.parent().parent().parent();
   //    if (!parent.hasClass('row')) {
   //       parent = parent.parent();
   //    }
   //    var service = new google.maps.DistanceMatrixService(),
   //       destinationA = parent.find('.pac-target-input').val();
   //    if (parent.find('select[name="travel_to"]').length) var origin2 = parent.find('select').find(':selected').data('nm') + ', ' + $('#arrival').val();
   //    else var origin2 = parent.find('select').find(':selected').data('nm') + ', ' + $('#departure').val();
   //    console.log(origin2)
   //    console.log(destinationA)
   //    if (origin2 && destinationA) {
   //       let request = {
   //          origins: [origin2],
   //          destinations: [destinationA],
   //          travelMode: google.maps.TravelMode.DRIVING,
   //          unitSystem: google.maps.UnitSystem.METRIC,
   //          avoidHighways: false,
   //          avoidTolls: false,
   //       };
   //       service.getDistanceMatrix(request).then((response) => {
   //          console.log(response.rows);
   //          console.log(response.rows[0].elements[0].distance.text)
   //          let res = response.rows[0].elements[0].distance;
   //          if (res) {
   //             parent.find('.val-show').html(res.text)
   //             parent.find('.val-shows').html(res.value)
   //             // return false;
   //          } else {
   //             find_distance_between_bus_station();
   //          }
   //       })
   //    } else {
   //       find_distance_between_bus_station();
   //    }
   // }

   function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
   }

   $("#reset-btn").click(function() {
      $('#departure, #arrival,#arrival,#people,#nights').val('').change();
      $(`
      #location_arrival_departure_bus_distance, #location_arrival_departure_bus_distance_main, #location_arrival_bus_distance, #location_arrival_bus_distance_main, #location_bus_distance, #location_bus_distance_main, #location_rail_distance, #location_rail_distance_main, #location_arrival_rail_distance, #location_arrival_rail_distance_main, #location_arrival_taxi_distance, #location_arrival_taxi_distance_main`).html('');
      $("#departure,#arrival").attr("readOnly", false);
      $("#people,#nights").attr("disabled", false);
      $('.air_ok').hide();
   });

   function footprint_table() {
      $.ajax({
         type: "post",
         url: "<?= site_url("Quantitative/get_footprints/$main_id") ?>",
         success: function(response) {
            $('#footprint').html(response);
            $('.datatables').DataTable();
         }
      });
   }

   $(document).ready(function() {
      $('.okoko').on('submit', function(e) {
         var otp = '';
         $('[name="footprint_value"]').val(parseFloat($('#total_footprint').text()));
         $('.uploadBtn').val('Uploading ...');
         $('.uploadBtn').prop('Disabled');
         e.preventDefault();
         $.ajax({
            url: "<?= base_url("Quantitative/answerFootprint/$main_id"); ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(res) {
               if (res.form_type) $('#form_type_9').val('9');
               $("#departure,#arrival").attr("readOnly", true);
               $("#people,#nights").attr("disabled", true);
               $('.air_ok').show();
               if (res.land_api == 1 || res.form_type == 12) {
                  $('#hide_departure').val(res.departure)
                  $('#hide_arrival').val(res.arrival)
                  $('#hide_people').val(res.people)
                  $('#hide_nights').val(res.nights)
                  footprint_table();
                  $("#trip_div").show();
                  $("#airport_distance,#bus_station_distance,#rail_station_distance").html("");
                  $('#cost').html('₹ ' + res.emission);
                  $("#departure_airport").html("<option value='0'>Select Airport</option>");
                  $("#arrival_airport").html("<option value='0'>Select Airport</option>");
                  $("#departure_bus_station").html("<option value='0'>Select Bus From</option>");
                  $("#arrival_bus_station").html("<option value='0'>Select Bus To</option>");
                  $("#departure_rail_station").html("<option value='0'>Select Train From</option>");
                  $("#arrival_rail_station").html("<option value='0'>Select Train To</option>");
                  var post_url = '<?= base_url(); ?>' + '/Quantitative/find_airport'; //get form action url
                  var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
                  var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
                  $.ajax({
                     url: post_url,
                     type: request_method,
                     data: form_data
                  }).done(function(response) {
                     rs = JSON.parse(response);
                     if (rs.Fromcountry !== "India") {
                        $("#bus").addClass('display-none');
                        $("#rail").addClass('display-none');
                        $("#home").addClass('display-none');
                        airclick();
                     } else {
                        $("#bus").addClass('active');
                        $("#rail").removeClass('active');
                     }
                     var map;
                     var service;
                     var infowindow;
                     var pyrmont = new google.maps.LatLng(rs.latitudeFrom, rs.longitudeFrom);
                     map = new google.maps.Map(document.getElementById('map'), {
                        center: pyrmont,
                        zoom: 15
                     });
                     var request = {
                        location: pyrmont,
                        radius: '50000',
                        type: ['bus_station']
                     };
                     service = new google.maps.places.PlacesService(map);
                     service.nearbySearch(request, callback);

                     function callback(results, status) {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                           var opt = "<option value='0'>Select Bus From</option>";
                           if (results) {
                              for (i = 0; i < results.length; i++) {
                                 opt += "<option value='" + results[i].place_id + "' data-nm='" + results[i].name + "'>" + results[i].name + "</option>";
                              }
                           }
                           console.log(opt)
                           $("#departure_bus_station").html(opt);
                           var pyrmont = new google.maps.LatLng(rs.latitudeTo, rs.longitudeTo);
                           map = new google.maps.Map(document.getElementById('map'), {
                              center: pyrmont,
                              zoom: 15
                           });
                           var request = {
                              location: pyrmont,
                              radius: '50000',
                              type: ['bus_station']
                           };
                           service = new google.maps.places.PlacesService(map);
                           service.nearbySearch(request, callback);

                           function callback(results, status) {
                              if (status == google.maps.places.PlacesServiceStatus.OK) {
                                 console.log(results);
                                 var opt = "<option value='0'>Select Bus To</option>";
                                 if (results) {
                                    for (i = 0; i < results.length; i++) {
                                       opt += "<option value='" + results[i].place_id + "' data-nm='" + results[i].name + "'>" + results[i].name + "</option>";
                                    }
                                 }
                                 $("#arrival_bus_station").html(opt);
                              }
                           }
                        }
                     }
                  });
               }
               topFunction();
               if (res.success == true) {
                  if (res.result_type == 1) {
                     $("#addNewCard").modal("toggle");
                  }
                  $('#alertMsg').html(res.msg);
                  $('#alertMessage').show();
                  $('#arrived').html(res.arrival);
                  $('#deport').html(res.departure);
                  var post_url = '<?= base_url(); ?>/Quantitative/getAirportByLocation_ok'; //get form action url
                  var request_method = $("#transport_frm").attr("method"); //get form GET/POST method
                  var form_data = $(".form").serialize(); //Encode form elements for submission            
                  departing_from = $("#departure").val();
                  arriving_at = $("#arrival").val();
                  $("#departing_airport").html(departing_from);
                  $("#arriving_airport").html(arriving_at);
                  nights = $("#nights").val();
                  people = $("#people").val();
                  $.ajax({
                     url: post_url,
                     type: request_method,
                     data: form_data
                  }).done(function(response) {
                     rs = JSON.parse(response);
                     opt = "<option value='0'>Select Airport</option>";
                     if (rs.airports_from) {
                        for (i = 0; i < rs.airports_from.length; i++) {
                           opt += "<option value='" + rs.airports_from[i].code + "' data-nm='" + rs.airports_from[i].name + "'>" + rs.airports_from[i].name + "</option>";
                        }
                     }
                     $("#departure_airport").html(opt);
                     opt = "<option value='0'>Select Airport</option>";
                     if (rs.airports_to) {
                        for (i = 0; i < rs.airports_to.length; i++) {
                           opt += "<option value='" + rs.airports_to[i].code + "' data-nm='" + rs.airports_to[i].name + "'>" + rs.airports_to[i].name + "</option>";
                        }
                     }
                     $("#arrival_airport").html(opt);
                  });
               } else if (res.success == false) {
                  $('#alertMsg2').html(res.msg);
                  $('#alertMessage2').show();
               }
               $('.uploadBtn').val('submit');
               $('.uploadBtn').prop('Enabled');
            }
         });
      });

      $('.update_air').on('submit', function(e) {
         $('[name="footprint_value"]').val((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2));
         e.preventDefault();
         $.ajax({
            url: "<?= base_url('Quantitative/updateAirTravel'); ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(res) {
               topFunction();
               footprint_table();
            }
         });
      });
   });


   function topFunction() {
      document.body.scrollTop = 10;
      document.documentElement.scrollTop = 10;
   }
</script>
<!-- before air travel start -->
<script type="text/javascript">
   $("document").ready(function() {
      $('select[name="vehical_before"]').on('change', function() {
         var tId = $(this).val();
         if (tId) {
            $.ajax({
               url: '<?= base_url() ?>/Quantitative/getTypeOfCompanyVehicle',
               type: 'post',
               data: {
                  vehicle_id: tId
               },
               success: function(response) {
                  $('.type_name_before').html(response);
               }
            })
         }
      });

      $('select[name="type_name_before"]').on('change', function() {
         var tId = $(this).val();
         if (tId) {
            $.ajax({
               url: '<?= base_url() ?>/Quantitative/getTypeOfCompanyModel',
               type: 'post',
               data: {
                  type_id: tId
               },
               success: function(response) {
                  $('.model_name_before').html(response);
               }
            })
         }
      });

      $('select[name="vehical_after"]').on('change', function() {
         var tId = $(this).val();
         if (tId) {
            $.ajax({
               url: '<?= base_url() ?>/Quantitative/getTypeOfCompanyVehicle',
               type: 'post',
               data: {
                  vehicle_id: tId
               },
               success: function(response) {
                  $('.type_name_after').html(response);
               }
            })
         }
      });

      $('select[name="type_name_after"]').on('change', function() {
         var tId = $(this).val();
         if (tId) {
            $.ajax({
               url: '<?= base_url() ?>/Quantitative/getTypeOfCompanyModel',
               type: 'post',
               data: {
                  type_id: tId
               },
               success: function(response) {
                  $('.model_name_after').html(response);
               }
            })
         }
      });

      $('.consumption').on('change', function() {
         var id = $(this).val();
         $.ajax({
            url: "<?= base_url('Quantitative/getSubConsumption') ?>" + "/" + id,
            method: "get",
            success: function(data) {
               $('.consumption_sub_category').empty();
               $('.consumption_sub_category').append('<option value="0">Select Consumption Sub Category</option>');
               $.each(data, function(key, value) {
                  $('.consumption_sub_category').append('<option value="' +
                     value.id + '">' + value.sub_category +
                     '</option>');
               })
            }
         });
      })

      $('.finance').on('change', function() {
         var id = $(this).val();
         $.ajax({
            url: "<?= base_url('Quantitative/getSubFinance') ?>" + "/" + id,
            method: "get",
            success: function(data) {
               $('.sub_finance').empty();
               $('.sub_finance').append('<option value="0">Select Finance Sub Category</option>');
               $.each(data, function(key, value) {
                  $('.sub_finance').append('<option value="' +
                     value.id + '">' + value.sub_category +
                     '</option>');
               })
            }
         });
      })

      $('.choose_vehicle').on('change', function() {
         var id = $(this).val();
         $.ajax({
            url: "<?= base_url('Quantitative/getChooseVehicle') ?>" + "/" + id,
            method: "get",
            success: function(data) {
               $('.choose_year').empty();
               $('.choose_year').append('<option value="0">Select Year</option>');
               $.each(data, function(key, value) {
                  $('.choose_year').append('<option value="' +
                     value.year + '">' + value.year +
                     '</option>');
               })
            }
         });
      })

      $('.choose_year').on('change', function() {
         var year = $(this).val();
         vehi = $('.choose_vehicle').val();
         $.ajax({
            url: "<?= base_url('Quantitative/getChooseYear') ?>" + "/" + year + "/" + vehi,
            method: "get",
            success: function(data) {
               $('.choose_type').html('<option value="0">Select Year</option>');
               $.each(data, function(key, value) {
                  $('.choose_type').append('<option value="' +
                     value.id + '">' + value.type +
                     '</option>');
               })
            }
         });
      })

      $('.choose_type').on('change', function() {
         var id = $(this).val();
         $.ajax({
            url: "<?= base_url('Quantitative/getChooseType') ?>" + "/" + id,
            method: "get",
            success: function(data) {
               $('.choose_model_name').html('<option value="0">Select Model</option>');
               $('.choose_emission_factor').empty();
               $('.choose_emission_factor').append('<option value="0">Select Factor</option>');
               $.each(data, function(key, value) {
                  $('.choose_model_name').append('<option value="' +
                     value.id + '">' + value.model +
                     '</option>');
                  $('.choose_emission_factor').append('<option value="' +
                     value.id + '">' + value.emission_factor +
                     '</option>');
               })
            }
         });
      })
   })

   var input = document.getElementById('departure');
   var trip_from = new google.maps.places.Autocomplete(input);
   // var trip_from = new google.maps.places.Autocomplete(document.getElementById('departure1'));
   // var trip_from = new google.maps.places.Autocomplete(document.getElementById('departure2'));
   var input1 = document.getElementById('arrival');
   var trip_to = new google.maps.places.Autocomplete(input1);
   google.maps.event.addListener(trip_to, 'place_changed', function() {
      var place = trip_to.getPlace();
      var country_name = place.address_components[(place.address_components.length - 1)].long_name;
      $('#country_name').val(country_name);
   });
   var input_texi = document.getElementById('texi_departure');
   var trip_from_texi = new google.maps.places.Autocomplete(input_texi);
   var input1_texi = document.getElementById('texi_arrival');
   var trip_to_texi = new google.maps.places.Autocomplete(input1_texi);

   $(document).ready(function() {
      $("#rail").click(function() {
         var post_url = '<?= base_url(); ?>/Quantitative/find_airport'; //get form action url
         var request_method = $("#flight_frm").attr("method"); //get form GET/POST method
         var form_data = $("#flight_frm").serialize(); //Encode form elements for submission            
         $.ajax({
            url: post_url,
            type: request_method,
            data: form_data
         }).done(function(response) {
            rs = JSON.parse(response);
            var map;
            var service;
            var infowindow;
            var pyrmont = new google.maps.LatLng(rs.latitudeFrom, rs.longitudeFrom);
            console.log(pyrmont);
            map = new google.maps.Map(document.getElementById('map'), {
               center: pyrmont,
               zoom: 15
            });
            var request = {
               location: pyrmont,
               radius: '50000',
               type: ['train_station']
            };
            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, callback);

            function callback(results, status) {
               if (status == google.maps.places.PlacesServiceStatus.OK) {
                  console.log(results);
                  var opt = "<option value='0'>Select Train From</option>";
                  if (results) {
                     for (i = 0; i < results.length; i++) {
                        opt += "<option value='" + results[i].place_id + "' data-nm='" + results[i].name + "'>" + results[i].name + "</option>";
                     }
                  }
                  $("#departure_rail_station").html(opt);
                  var pyrmont = new google.maps.LatLng(rs.latitudeTo, rs.longitudeTo);
                  map = new google.maps.Map(document.getElementById('map'), {
                     center: pyrmont,
                     zoom: 15
                  });
                  var request = {
                     location: pyrmont,
                     radius: '50000',
                     type: ['train_station']
                  };
                  service = new google.maps.places.PlacesService(map);
                  service.nearbySearch(request, callback);

                  function callback(results, status) {
                     if (status == google.maps.places.PlacesServiceStatus.OK) {
                        console.log(results);
                        var opt = "<option value='0'>Select Train To</option>";
                        if (results) {
                           for (i = 0; i < results.length; i++) {
                              opt += "<option value='" + results[i].place_id + "' data-nm='" + results[i].name + "'>" + results[i].name + "</option>";
                           }
                        }
                        $("#arrival_rail_station").html(opt);
                     } else {
                        $("#arrival_rail_station").html(opt);
                     }
                  }
               }
            }
         });
      });
   });

   function find_distance_between_bus_station() {
      departure = $("#departure_bus_station").val();
      arrival = $("#arrival_bus_station").val();
      from = $("#departure").val();
      to = $("#arrival").val();
      $('#arrived').html(to);
      $('#deport').html(from);
      departure_airport_name = $("#departure_bus_station").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_bus_station").find(':selected').data('nm');
      airport_departure_transfer = $("#bus_departure_transfer").val();
      var vehical_id = airport_departure_transfer;
      airport_arrival_transfer = $("#bus_arrival_transfer").val();
      var arrival_transfer_title = $("#bus_arrival_transfer").find(':selected').data('title');
      airport_transfer_arrival_fuel = $("#bus_transfer_arrival_fuel").val();
      if (departure && arrival) {
         var lat_from = "";
         var long_from = "";
         var lat_to = "";
         var long_to = "";
         var request = {
            placeId: departure,
            fields: ['geometry']
         };
         service = new google.maps.places.PlacesService(map);
         service.getDetails(request, callback);

         function callback(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
               lat_from = place.geometry.location.lat();
               long_from = place.geometry.location.lng();
               var request = {
                  placeId: arrival,
                  fields: ['geometry']
               };
               service = new google.maps.places.PlacesService(map);
               service.getDetails(request, callback);

               function callback(place, status) {
                  if (status == google.maps.places.PlacesServiceStatus.OK) {
                     var airport_departure_transfer = $("#bus_departure_transfer").val();
                     lat_to = place.geometry.location.lat();
                     long_to = place.geometry.location.lng();
                     $.ajax({
                        url: '<?= base_url() ?>/Quantitative/find_distance',
                        type: 'post',
                        data: {
                           lat_from: lat_from,
                           long_from: long_from,
                           lat_to: lat_to,
                           long_to: long_to,
                           airport_departure_transfer: airport_departure_transfer
                        },
                        success: function(response) {
                           rs = JSON.parse(response);
                           $('.footprint_three').val(rs.emission_id);
                           $('#total_footprint').text((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2) + ' KgsCO2e')
                           $("#location_arrival_departure_bus_distance").html(rs.distance);
                           $("#location_arrival_departure_bus_distance_main").val(rs.distance);
                           $("#bus_distance_emission").html(rs.emission); //multiply by 2
                        }
                     });
                  }
               }
            }
         }
      }
      if (departure_airport_name) {
         airport_departure_transfer = $("#bus_departure_transfer").val();
         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: departure_airport_name,
               from: from,
               airport_departure_transfer: airport_departure_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $('.footprint_one').val(rs.emission_id);
               $('#total_footprint').text((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2))
               if ($('#bus_round_trip').is(":checked")) {
                  $("#location_bus_distance").html(rs.distance);
                  $("#emission_first").html(rs.emission);
                  $("#location_bus_distance_main").val(rs.distance);
               } else if ($('#bus_round_trip').is(":not(:checked)")) {
                  $("#location_bus_distance").html(rs.distance);
                  $("#location_bus_distance_main").val(rs.distance);
               }
            }
         });
      }
      if (arrival_airport_name) {
         airport_arrival_transfer = $("#bus_arrival_transfer").val();

         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: arrival_airport_name,
               from: to,
               airport_departure_transfer: airport_arrival_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $('.footprint_two').val(rs.emission_id)
               $('#total_footprint').text(parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_thsree').eq(0).val()))
               $("#location_arrival_bus_distance").html(rs.distance);
               $("#location_arrival_bus_distance_main").val(rs.distance);
               $("#emission_bus_arrival").html(rs.emission);
            }
         });
      }
   }

   function taxi() {
      from = $("#departure").val();
      to = $("#arrival").val();

      airport_arrival_transfer = '0';
      $.ajax({
         url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
         type: 'post',
         data: {
            departure_airport_name: to,
            from: from,
            airport_departure_transfer: airport_arrival_transfer
         },
         success: function(response) {
            rs = JSON.parse(response);
            if ($('#rail_round_trip').is(":checked")) {
               $("#location_arrival_taxi_distance").html(rs.distance);
               $("#location_arrival_taxi_distance_main").val(rs.distance);
            }
         }
      });
   }

   function find_air_distance() {
      departure_code = $("#departure_airport").val();
      arrival_code = $("#arrival_airport").val();
      from = $("#departure").val();
      to = $("#arrival").val();
      flying_class = $("#flying_class").val();
      departure_airport_name = $("#departure_airport").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_airport").find(':selected').data('nm');
      airport_departure_transfer = $("#airport_departure_transfer").val();
      airport_arrival_transfer = $("#airport_arrival_transfer").val();
      airport_transfer_departure_fuel = $("#airport_transfer_departure_fuel").val();
      airport_transfer_arrival_fuel = $("#airport_transfer_arrival_fuel").val();
      if (departure_airport_name) {
         airport_departure_transfer = $("#airport_transfer_departure_fuel").val();

         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: departure_airport_name,
               from: from,
               airport_departure_transfer: airport_departure_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $("#location_airport_distance").html(rs.distance);
               $("#location_airport_distance_main").val(rs.distance);
               $("#airport_departure_distane_emission").html(rs.emission); //multiply by 2
            }
         });
      }
      if (arrival_airport_name) {
         airport_arrival_transfer = $("#airport_transfer_arrival_fuel").val();

         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: arrival_airport_name,
               from: to,
               airport_departure_transfer: airport_arrival_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               if ($('#airport_round_trip').is(":checked")) {
                  $("#location_arrival_airport_distance").html(rs.distance);
                  $("#location_arrival_airport_distance_main").val(rs.distance);
                  $("#airport_arrival_distane_emission1").html(rs.emission); //multiply by 2
               } else if ($('#airport_round_trip').is(":not(:checked)")) {
                  $("#location_arrival_airport_distance1").html(rs.distance);
                  $("#location_arrival_airport_distance_main").val(rs.distance);
               }
            }
         });
      }
      if (departure_code && arrival_code) {
         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_air_distance',
            type: 'post',
            data: {
               departure_code: departure_code,
               arrival_code: arrival_code,
               flying_class: flying_class,
               airport_departure_transfer: airport_departure_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $("#airport_distance").html(rs.distance);
               $("#airport_distance_main").val(rs.distance);
               $("#airport_distance_emission").html(rs.emission); //multiply by 2
            }
         });
      }
   }

   $('.okok').on('submit', function(e) {
      let target = $('.input-value'),
         target_len = target.length,
         footprint_id, factor_id_arr = [],
         unit_id_arr = [],
         arr_val = [];
      for (let i = 0; i < target_len; i++) {
         factor_id_arr[i] = target.eq(i).data("factor-id");
         arr_val[i] = target.eq(i).val();
         unit_id_arr[i] = target.eq(i).data("unit-id");
      }
      data = {
         factor_id_arr: factor_id_arr,
         arr_val: arr_val,
         unit_id_arr: unit_id_arr,
      };
      e.preventDefault();
      $.ajax({
         url: "<?= base_url("Quantitative/answerFootprint_new/$main_id"); ?>",
         method: "POST",
         data: data,
         dataType: "json",
         success: function(res) {
            if (res) $("#addNewCard").modal("toggle");
         }
      })
   })

   function find_distance_between_rail_station() {
      departure = $("#departure_rail_station").val();
      arrival = $("#arrival_rail_station").val();
      from = $("#departure").val();
      to = $("#arrival").val();
      departure_airport_name = $("#departure_rail_station").find(':selected').data('nm');
      arrival_airport_name = $("#arrival_rail_station").find(':selected').data('nm');
      var airport_departure_transfer = $("#rail_departure_transfer").val();
      // if (num) {
      // console.log(num)
      // console.log(departure)
      // console.log(from)
      // console.log(arrival)
      // console.log(to)
      // console.log(departure_airport_name)
      // console.log(arrival_airport_name)
      // }
      if (departure && arrival) {
         var lat_from = "";
         var long_from = "";
         var lat_to = "";
         var long_to = "";
         var request = {
            placeId: departure,
            fields: ['geometry']
         };
         service = new google.maps.places.PlacesService(map);
         service.getDetails(request, callback);

         function callback(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
               lat_from = place.geometry.location.lat();
               long_from = place.geometry.location.lng();
               var request = {
                  placeId: arrival,
                  fields: ['geometry']
               };
               service = new google.maps.places.PlacesService(map);
               service.getDetails(request, callback);

               function callback(place, status) {
                  if (status == google.maps.places.PlacesServiceStatus.OK) {
                     lat_to = place.geometry.location.lat();
                     long_to = place.geometry.location.lng();
                     $.ajax({
                        url: '<?= base_url() ?>/Quantitative/find_distance',
                        type: 'post',
                        data: {
                           lat_from: lat_from,
                           long_from: long_from,
                           lat_to: lat_to,
                           long_to: long_to,
                           airport_departure_transfer: airport_departure_transfer,
                        },
                        success: function(response) {
                           rs = JSON.parse(response);
                           $('.footprint_two').val(rs.emission_id);
                           $('#total_footprint').text((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2) + ' KgsCO2e')
                           $("#rail_station_distance").html(rs.distance);
                           $("#rail_station_distance_main").val(rs.distance);
                           $("#rail_distance_emission").text(rs.emission); //multiply by 2
                        }
                     });
                  }
               }
            }
         }
      }
      if (departure_airport_name) {
         airport_departure_transfer = $("#rail_departure_transfer").val();

         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: departure_airport_name,
               from: from,
               airport_departure_transfer: airport_departure_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $(".footprint_one").val(rs.emission_id);
               $('#total_footprint').text((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2) + ' KgsCO2e')
               $("#location_rail_distance").html(rs.distance);
               $("#location_rail_distance_main").val(rs.distance);
               $("#emission_distance").html(rs.emission);
               $("#rail_departure_distane_emission").html(rs.emission); //multiply by 2
            }
         });
      }
      if (arrival_airport_name) {
         airport_arrival_transfer = $("#rail_arrival_transfer").val();

         $.ajax({
            url: '<?= base_url() ?>/Quantitative/find_location_and_airport_distance',
            type: 'post',
            data: {
               departure_airport_name: arrival_airport_name,
               from: to,
               airport_departure_transfer: airport_arrival_transfer
            },
            success: function(response) {
               rs = JSON.parse(response);
               $(".footprint_three").val(rs.emission_id);
               $('#total_footprint').text((parseFloat($('.footprint_one').eq(0).val()) + parseFloat($('.footprint_two').eq(0).val()) + parseFloat($('.footprint_three').eq(0).val())).toFixed(2) + ' KgsCO2e')
               $("#location_arrival_rail_distance").html(rs.distance);
               $("#location_arrival_rail_distance_main").val(rs.distance);
               $("#rail_arrival_distane_emission").text(rs.emission); //multiply by 2
            }
         });
      }
   }
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>