<?= $this->extend("brand/layout/master-page.php") ?>
<?= $this->section("style") ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/vendors.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css"
   ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css"
   ); ?>">
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="app-content content">
   <div class="text-end mb-1 mt-2 back_button">
      <button class="btn btn-primary waves-effect">Back</button>
   </div>
   <div class="content-wrapper">
      <div class="category_page_header mb-2">
         <div class="cph_inner">
            <div class="cph_left">
               <img src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
            </div>
            <div class="cph_right">
               <div class="cph_title">ISO 14001 Checklist</div>
               <div class="cph_short_desc">
                  This is an Advanced assessment aligning you brand wth the United Nation's Sustainable
                  Development Goals.
               </div>
               <div class="cph_status">
                  <div class="cph_status_left d-flex">
                     <div class="cph_score_icon me-1">
                        <img src="https://user.positiivplus.io//public/brand/assets/app-assets/images/icon_score.png?v=1">
                     </div>
                     <div class="cph_score_content">
                        <div class="cph_score_label">Question Completion</div>
                        <div class="cph_score_result fw-bolder"><span id="tot_attempt_id" class="fw-bolder">0</span> Out of 47</div>
                     </div>
                  </div>
                  <div class="cph_status_right d-flex">
                     <div class="cph_score_icon me-1">
                        <img src="https://positiivplus.io/public/brand/assets/custom_img/icon_complete.png">
                     </div>
                     <div class="cph_score_content">
                        <div class="cph_score_label">Utopiic Level : Dorment</div>
                        <div class="cph_score_result fw-bolder">
                           0.00%
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section id="nav-filled">
         <div class="row match-height">
            <!-- Filled Tabs starts -->
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title"><?= $name ?></h4>
                  </div>
                  <div class="card-body">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a
                              class="nav-link active"
                              id="home-tab-fill"
                              data-bs-toggle="tab"
                              href="#home-fill"
                              role="tab"
                              aria-controls="home-fill"
                              aria-selected="true"
                              >Introduction</a
                              >
                        </li>
                        <li class="nav-item">
                           <a
                              class="nav-link"
                              id="profile-tab-fill"
                              data-bs-toggle="tab"
                              href="#profile-fill"
                              role="tab"
                              aria-controls="profile-fill"
                              aria-selected="false"
                              >Disclosure</a
                              >
                        </li>
                        <li class="nav-item">
                           <a
                              class="nav-link"
                              id="messages-tab-fill"
                              data-bs-toggle="tab"
                              href="#messages-fill"
                              role="tab"
                              aria-controls="messages-fill"
                              aria-selected="false"
                              >KPIS</a
                              >
                        </li>
                        <li class="nav-item">
                           <a
                              class="nav-link"
                              id="settings-tab-fill"
                              data-bs-toggle="tab"
                              href="#settings-fill"
                              role="tab"
                              aria-controls="settings-fill"
                              aria-selected="false"
                              >Request</a
                              >
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content pt-1">
                        <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
                           <?php if ($list) { ?>
                           <p>
                              Category Name : <b><?= $list[0]["indicator_category_name"] ?></b>
                           </p>
                           <p>
                              Image : <img src="<?php echo base_url() .
                                 "/public/uploads/sdg/" .
                                 $list[0]["image"]; ?>" style="width: 70px;">
                           </p>
                           <p><b>Description</b>
                              <?= $list[0]["description"] ?>
                           </p>
                           <p><b>SDG</b>
                           <ul>
                              <?php
                                 $sdg = $list[0]["sdg"];
                                 foreach ($sdg as $key => $gds) {
                                 	echo "<li>" . $gds["sdg_name"] . "</li>";
                                 }
                                 ?>
                              </p>
                           </ul>
                           <?php } else {echo "No SDG Connected";} ?>
                        </div>
                        <!--   Emissions Div start -->
                        <?php if ($name == "Emissions") { ?>
                        <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                           <div class="col-sm-12">
                              <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                 <div class="accordion" id="accordionExample">
                                    <!-- accordion 1 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingOne">
                                          <button
                                             class="accordion-button mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionOne"
                                             aria-expanded="true"
                                             aria-controls="accordionOne"
                                             >
                                          Clause 1: Direct (Scope 1) GHG emissions
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionOne"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingOne"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_1" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Stationary combustion</label>
                                                         <select class="select2 form-select">
                                                            <option>Select from List</option>
                                                            <option></option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-3 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">
                                                      </div>
                                                      <!-- Value Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-1" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Direct (Scope 1) GHG emissions can come from the following sources owned or controlled by an organization:</p>
                                                <ul>
                                                <li>Generation of electricity, heating, cooling and steam: these emissions result from the combustion of fuels in stationary sources,such as boilers, furnaces, and turbines – and from other combustion processes such as flaring.</li>
                                                <li>Physical or chemical processing: most of these emissions result from the manufacturing or processing of chemicals and materials, such as cement, steel, aluminium, ammonia, and waste processing.</li>
                                                <li>Transportation of materials, products, waste, workers, and passengers: these emissions result from the combustion of fuels in mobile combustion sources owned or controlled by the organization, such as trucks, trains, ships, aeroplanes, buses, and cars</li>
                                                <li>Fugitive emissions: these are emissions that are not physically controlled but result from intentional or unintentional releases of GHGs. These can include equipment leaks from joints, seals, packing, and gaskets; methane emissions (e.g., from coal mines) and venting; HFC emissions from refrigeration and air conditioning equipment; and methane leakages (e.g., from gas transport)</li>
                                                </ul>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_1()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="emission_div bg-light"></div>
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Mobile combustion</label>
                                                         <select class="select2 form-select">
                                                            <option>Select from List</option>
                                                            <option></option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-3 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">
                                                      </div>
                                                      <!-- Value Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-1" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>For Non-Renewable Sources: coal; fuels distilled from petroleum or
                                                crude oil, such as gasoline, diesel fuel, jet fuel, and heating oil; fuels
                                                extracted from natural gas processing and petroleum refinings, such as
                                                butane, propane, and liquefied petroleum gas (LPG); natural gas, such
                                                as compressed natural gas (CNG), and liquefied natural gas (LNG);
                                                nuclear power</p>
                                                <p>For Renewable Souces: biomass, geothermal, hydro, solar, wind.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_2()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="emission2_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The total scope 1 GHG emission of the organization</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Total Value</label>
                                                         <input type="number"class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-2" readonly="">
                                                      </div>
                                                      <!-- Value 2 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-2" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 2 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Biogenic CO2 emissions in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The total scope 1 GHG emission of the organization</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-3" readonly="">
                                                      </div>
                                                      <!-- Value 3 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-3" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Report biogenic emissions of CO2 from the combustion or biodegradation of biomass separately from the gross direct (Scope 1) GHG emissions. Exclude biogenic emissions of other types of GHG (such as CH and N O), and biogenic emissions of CO that occur in the life cycle of biomass other than from combustion or biodegradation (such as GHG emissions from processing or transporting biomass).</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 15 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The base year for the calculation, if applicable, including: </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-6 p-0">
                                                      <p>The rationale for choosing it.</p>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value-sidebar-4" readonly=""></textarea>
                                                   </div>
                                                   <!-- Value 4 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-4" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 4 Sidebar -->
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-6 p-0 mt-1">
                                                      <p>Emission in the base year</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-5" readonly="">
                                                   </div>
                                                   <!-- Value 5 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-5" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 5 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-3 p-0 mt-1">
                                                      <p>The context for any significant changes in emissions that triggered recalculations of base year emissions. </p>
                                                   </div>
                                                   <div class="offset-md-3 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-6" readonly="">
                                                   </div>
                                                   <!-- Value 6 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-6" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 6 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                   <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                      <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                      <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                          <!-- question 5-->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Source of the emission factors and the global warming potential (GWP) rates used, or a reference to the GWP source? </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-7" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 7 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-7" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 7 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 5 -->
                                          <!-- question 6 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Consolidation approach for emissions; whether equity share, financial control, or operational control. </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-8" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 8 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-8" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 8 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 6 -->
                                          <!-- question 7 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-9" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 9 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-9" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 9 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 7 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 1 -->
                                    <!-- 2 accordion -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingTwo">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionTwo"
                                             aria-expanded="false"
                                             aria-controls="accordionTwo"
                                             >
                                          Clause 2: Indirect (Scope 2) GHG emissions
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionTwo"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingTwo"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the gross location-based energy indirect (Scope 2) GHG emissions in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_2" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>Location-based energy indirect (scope 2) GHG emissions.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-10" readonly="">
                                                      </div>
                                                      <!-- Value 10 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-10" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>A location-based method reflects the average GHG emissions intensity of grids on which energy consumption occurs, using mostly gridaverage emission factor data</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 10 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the gross market-based energy indirect (Scope 2) GHG emissions in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>Gross market-based energy indirect (scope 2) GHG emissions.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-11" readonly="">
                                                      </div>
                                                      <!-- Value 11 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-11" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>The market-based method reflects emissions from the electricity that
                                                an organization has purposefully chosen (or its lack of choice). The
                                                market-based method calculation also includes the use of a residual
                                                mix, if the organization does not have specified emissions intensity from
                                                its contractual instruments. This helps prevent double counting
                                                between consumers’ market-based method figures. If a residual mix is
                                                unavailable, the organization can disclose this and use grid-average
                                                emission factors as a proxy (which can mean that the location-based
                                                and market-based are the same numbers until information on the
                                                residual mix is available).
                                                </p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 11 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2-->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-12" readonly="">
                                                      </div>
                                                      <!-- Value 12 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-12" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 12 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3-->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The base year for the calculation, if applicable, including: </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_1"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-6 p-0">
                                                      <p>The rationale for choosing it.</p>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value-sidebar-13" readonly=""></textarea>
                                                   </div>
                                                   <!-- Value 13 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-13" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 13 Sidebar -->
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-6 p-0 mt-1">
                                                      <p>Emission in the base year</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-14" readonly="">
                                                   </div>
                                                   <!-- Value 14 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-14" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 14 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-3 p-0 mt-1">
                                                      <p>The context for any significant changes in emissions that triggered recalculations of base year emissions. </p>
                                                   </div>
                                                   <div class="offset-md-3 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-15" readonly="">
                                                   </div>
                                                   <!-- Value 15 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-15" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">The rationale for choosing it.</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Emission in the base year</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">The context for any significant changes in emissions that triggered recalculations of base year emissions.</label>
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="col-md-8">
                                                                                 <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the Value">
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="row">
                                                                                 <div class="col-md-4">
                                                                                    <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                                                 </div>
                                                                                 <div class="col-md-8">
                                                                                    <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label  fs-6" for="exampleFormControlTextarea1">Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your comments..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label fs-6" for="exampleFormControlTextarea1">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 15 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                   <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                      <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                      <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                          <!-- question 5-->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Source of the emission factors and the global warming potential (GWP) rates used, or a reference to the GWP source? </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-16" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 16 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-16" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 16 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 5 -->
                                          <!-- question 6 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Consolidation approach for emissions; whether equity share, financial control, or operational control. </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-17" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 17 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-17" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 17 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 6 -->
                                          <!-- question 7 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-18" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 18 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-18" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Methodologies used to calculate the direct (Scope I) GHG emissions can include:</p>
                                                <ul>
                                                <li>Direct measurement of energy source consumed (coal, gas) or losses(refills) of cooling systems and conversion to GHG (CO2 equivalents). Mass balance calculations.</li>
                                                <li>Calculations based on site-specific data, such as for fuel composition analysis.</li>
                                                <li>Calculations are based on published criteria, such as emission factors and GWP rates.</li>
                                                <li>Direct measurements of GHG emissions, such as continuous online analyzers.</li>
                                                <li>Estimations.</li>
                                                </ul>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 18 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 7 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 2 -->
                                    <!-- accordion 3 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionThree"
                                             aria-expanded="false"
                                             aria-controls="accordionThree"
                                             >
                                          Clause 3: Other indirect (Scope 3) GHG emissions
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionThree"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the gross other indirect (Scope 3) GHG emissions in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_3" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>Gross other indirect (scope 3) GHG emissions.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-19" readonly="">
                                                      </div>
                                                      <!-- Value 19 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-19" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 19 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-20" readonly="">
                                                      </div>
                                                      <!-- Value 20 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-20" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 20 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Biogenic CO2 emissions in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The Biogenic CO2 emissions.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-21" readonly="">
                                                      </div>
                                                      <!-- Value 21 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-21" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Report biogenic emissions of CO2 from the combustion or biodegradation of biomass separately from the gross direct (Scope 1) GHG emissions. Exclude biogenic emissions of other types of GHG (suchas CH and N O), and biogenic emissions of CO that occur in the life cycle of biomass other than from combustion or biodegradation (such as GHG emissions from processing or transporting biomass).</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 21 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the energy consumption outside of the organization?, in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- upstream -->
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <label class="form-label fs-6" for="vertical-landmark">Upstream Activities</label>
                                                      <select class="select2 form-select">
                                                         <option>Purchased goods and services</option>
                                                         <option>Capital goods</option>
                                                         <option>Natural Gas</option>
                                                         <option>Fuel and Energy related activities (Not used within the organisation)</option>
                                                         <option>Upstream transportation and distribution</option>
                                                         <option>Waste generated in operations</option>
                                                         <option>Business travel</option>
                                                         <option>Employee commuting</option>
                                                         <option>Upstream leased assets</option>
                                                         <option>Other upstream</option>
                                                      </select>
                                                   </div>
                                                   <div class="offset-md-2 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value-sidebar-22" readonly="">
                                                   </div>
                                                   <!-- Value 22 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-22" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 22 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="upstream_question()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="upstream_activities bg-light"></div>
                                             <!-- end upstream -->
                                             <!-- downstream -->
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <label class="form-label fs-6" for="vertical-landmark">Downstream activities list</label>
                                                      <select class="select2 form-select">
                                                         <option>Downstream transportation and distribution</option>
                                                         <option>Processing of sold products</option>
                                                         <option>Use of sold products</option>
                                                         <option>End-of-life treatment of sold products</option>
                                                         <option>Downstream leased assets</option>
                                                         <option>Franchises</option>
                                                         <option>Investments</option>
                                                         <option>Other downstream</option>
                                                      </select>
                                                   </div>
                                                   <div class="offset-md-2 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value-sidebar-23"  readonly="">
                                                   </div>
                                                   <!-- Value 23 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-23" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 23 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="downstream_question()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="downstream_activities bg-light"></div>
                                             <!-- end downstream -->
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The total energy consumed outside the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" >Total Value</label>
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                          <!-- question 5 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The base year for the calculation, if applicable, including: </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-6 p-0">
                                                      <p>The rationale for choosing it.</p>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value-sidebar-24" readonly=""></textarea>
                                                   </div>
                                                   <!-- Value 24 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-24" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 24 Sidebar -->
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-6 p-0 mt-1">
                                                      <p>Emission in the base year</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-25" readonly="">
                                                   </div>
                                                   <!-- Value 25 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-25" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 25 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                </div>
                                                <div class="row mt-2">
                                                   <div class="col-md-3 p-0 mt-1">
                                                      <p>The context for any significant changes in emissions that triggered recalculations of base year emissions. </p>
                                                   </div>
                                                   <div class="offset-md-3 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-26" readonly="">
                                                   </div>
                                                   <!-- Value 26 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value-sidebar-26" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 26 Sidebar -->
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                   </div>
                                                   <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                      <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                      <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end question 5 -->
                                          <!-- question 6-->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Source of the emission factors and the global warming potential (GWP) rates used, or a reference to the GWP source? </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-25" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 25 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-25" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 25 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 6 -->
                                          <!-- question 7 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Consolidation approach for emissions; whether equity share, financial control, or operational control. </p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-26" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 26 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-26" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 26 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 7 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 3 -->
                                    <!-- accordion 4 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionFour"
                                             aria-expanded="false"
                                             aria-controls="accordionFour"
                                             >
                                          Clause 4: GHG emissions intensity
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionFour"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">GHG emissions intensity ratio for the organization.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_4" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-5">
                                                         <label class="form-label fs-6" for="select2-basic">Type</label>
                                                         <select class="select2 form-select">
                                                            <option>Products (such as metric tons of CO2 emissions per unit produced)</option>
                                                            <option>Services (such as metric tons of CO2 emissions per function or per service)</option>
                                                            <option>Sales (such as metric tons of CO2 emissions per sale)</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-1 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-27" readonly="">
                                                      </div>
                                                      <!-- Value 27 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-27" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 27 Sidebar -->
                                                <div class="offset-md-2 col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_3()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="emission3_div bg-light"></div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Organization-specific metric (the denominator) is chosen to calculate the ratio.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-5">
                                                         <label class="form-label fs-6" for="select2-basic">Type</label>
                                                         <select class="select2 form-select">
                                                            <option>Unit of product</option>
                                                            <option>Production volume (such as metric tons, litres, or MWh)</option>
                                                            <option>Size (such as m2 floor space)</option>
                                                            <option>Number of full-time employees</option>
                                                            <option>Monetary units (such as revenue in INR)</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-1 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-28" readonly="">
                                                      </div>
                                                      <!-- Value  28 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-28" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 28 Sidebar -->
                                                <div class="offset-md-2 col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_4()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="emission4_div bg-light"></div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 1 (Direct emission)</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 2 (Energy Indirect emission)</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 3 (Other Indirect emission)</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-29" readonly="">
                                                      </div>
                                                      <!-- Value 29 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-29" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 1 (Direct emission)</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 2 (Energy Indirect
                                                emission)
                                                </label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 3 (Other Indirect
                                                emission)</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 29  Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-30" readonly="">
                                                      </div>
                                                      <!-- Value 30 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-30" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 30 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 4 -->
                                    <!-- accordion 5 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionFive"
                                             aria-expanded="false"
                                             aria-controls="accordionFive"
                                             >
                                          Clause 5: Reduction of GHG emissions
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionFive"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">How much GHG emissions are reduced as a direct result of reduction initiatives, in metric tons of CO2 equivalent?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_5" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The GHG emission reduced from direct reduction Value initiatives. </p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-31" readonly="">
                                                      </div>
                                                      <!-- Value 31 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-31" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>For Non-Renewable Sources: coal; fuels distilled from petroleum or
                                                crude oil, such as gasoline, diesel fuel, jet fuel, and heating oil; fuels
                                                extracted from natural gas processing and petroleum refinings, such as
                                                butane, propane, and liquefied petroleum gas (LPG); natural gas, such
                                                as compressed natural gas (CNG), and liquefied natural gas (LNG);
                                                nuclear power</p>
                                                <p>For Renewable Souces: biomass, geothermal, hydro, solar, wind.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 31 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CO2</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">CH4</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">N2O</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">HFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">PFCs</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">SF6</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">NF3</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-32" readonly="">
                                                      </div>
                                                      <!-- Value 32 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-32" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 32 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The basis for calculating reductions in energy consumption</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Base year</label>
                                                         <select class="select2 form-select">
                                                            <option>FY 2019 - 2020</option>
                                                            <option>FY 2020 - 2021</option>
                                                            <option>FY 2021 - 2022</option>
                                                            <option>FY 2022 - 2023</option>
                                                            <option>FY 2022 - 2024</option>
                                                            <option>FY 2022 - 2025</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-2 col-md-7">
                                                         <label class="form-label fs-6" for="select2-basic">Baseline</label>
                                                         <textarea type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value-sidebar-33" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 33 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-33" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment(optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 33 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Types of GHG emissions are included in the intensity ratio.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 1 (Direct emission)</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 2 (Energy Indirect emission)</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 3 (Other Indirect emission)</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Value"
                                                            data-bs-toggle="modal" data-bs-target="#add-value-sidebar-34" readonly="">
                                                      </div>
                                                      <!-- Value 34 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-34" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 1 (Direct emission)</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 2 (Energy Indirect emission)</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Scope 3 (Other Indirectemission)</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 34 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                          <!-- question 5 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-35" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 35 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-35" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 35 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 5 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 5 -->
                                    <!-- accordion 6 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingFour">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionSix"
                                             aria-expanded="false"
                                             aria-controls="accordionSix"
                                             >
                                          Clause 6: Emissions of ozone-depleting substances (ODS)
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionSix"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingFour"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Production, imports, and exports of ozone-depleting substances (ODS) in metric tons of CFC-11 (trichlorofluoromethane) equivalent.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_6"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_6" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <!-- 1 -->
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>Production of ODS </p>
                                                      </div>
                                                      <div class="col-md-2 mb-1">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-36" readonly="">
                                                      </div>
                                                      <!-- Value 36 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-36" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Production of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Imports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Exports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 36 Sidebar -->
                                                <div class="col-md-2 mb-1">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <!-- 2 -->
                                                <div class="col-md-6 mb-1 mt-1 text-dark">
                                                <p>Imports of ODS</p>
                                                </div>
                                                <div class="col-md-2 mb-1">
                                                <label class="form-label fs-6">Value</label>
                                                <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-37" readonly="">
                                                </div>
                                                <!-- Value 37 Sidebar -->
                                                <div class="modal modal-slide-in fade" id="add-value-sidebar-37" aria-hidden="true">
                                                <div class="modal-dialog sidebar-lg">
                                                <div class="modal-content p-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                <div class="d-inline-flex">
                                                <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                Record
                                                </button>
                                                <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                Calculate
                                                </button>
                                                </div>
                                                <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Production of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Imports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Exports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 37 Sidebar -->
                                                <div class="col-md-2 mb-1">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <!-- 3 -->
                                                <div class="col-md-6 mb-1 mt-1 text-dark">
                                                <p>Exports of ODS</p>
                                                </div>
                                                <div class="col-md-2 mb-1">
                                                <label class="form-label fs-6">Value</label>
                                                <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-38" readonly="">
                                                </div>
                                                <!-- Value 38 Sidebar -->
                                                <div class="modal modal-slide-in fade" id="add-value-sidebar-38" aria-hidden="true">
                                                <div class="modal-dialog sidebar-lg">
                                                <div class="modal-content p-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                <div class="d-inline-flex">
                                                <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                Record
                                                </button>
                                                <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                Calculate
                                                </button>
                                                </div>
                                                <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Production of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Imports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Exports of ODS</label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="offset-md-4 col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="row">
                                                <div class="col-md-4">
                                                <label class="form-label fs-6" for="exampleFormControlTextarea1">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="MT CO2eq" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ty</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 38 Sidebar -->
                                                <div class="col-md-2 mb-1">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Substances included in the calculation.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_6"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-39" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 39 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-39" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 39 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Source of the emission factors used.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_6"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-40" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 40 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-40" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 40 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_6"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-41" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 41 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-41" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 41 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                       </div>
                                    </div>
                                    <!-- accordion 6 end -->
                                    <!-- accordion 7 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingFour">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionSeven"
                                             aria-expanded="false"
                                             aria-controls="accordionSeven"
                                             >
                                          Clause 7: Nitrogen oxides (NOx), sulfur oxides (SOx), and other significant air emissions
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionSeven"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingFour"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the Significant air emissions, in metric ton , for each of the following:</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_7"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter_7" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <label class="form-label fs-6" for="select2-basic">Significant air emissions</label>
                                                         <select class="select2 form-select">
                                                            <option>Nitrogen Oxides (NOx)</option>
                                                            <option>Sulphur Oxides (SOx)</option>
                                                            <option>Persistent organic pollutants (POP)
                                                            </option>
                                                            <option>Volatile organic compounds (VOC)</option>
                                                            <option>Hazardous air pollutants (HAP)</option>
                                                            <option>Particulate matter (PM)</option>
                                                            <option>Other standard categories of air emissions identified in relevant regulations</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-2 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-42" readonly="">
                                                      </div>
                                                      <!-- Value 42 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-42" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>The reporting organization shall select one of the following approaches for calculating significant air emissions:</p>
                                                <ul>
                                                <li>Direct measurement of emissions (such as online analyzers).</li>
                                                <li>Calculation based on site-specific data.</li>
                                                <li>Calculation based on published emission factors</li>
                                                <li>Estimation. If estimations are used due to a lack of default figures, the organization shall indicate the basis on which figures were estimated.</li>
                                                </ul>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 42 Sidebar -->
                                                <div class="col-md-2">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_1()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="emission_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-6 mb-1 mt-1 text-dark">
                                                         <p>The total significant air emissions.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Total Value</label>
                                                         <input type="number"class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Source of the emission factors used.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_7"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-43" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 43 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-43" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 43 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter_7"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value-sidebar-44" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 44 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-44" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 44 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                       </div>
                                    </div>
                                    <!-- accordion 7 end -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--   Emissions Div end -->
                        <?php } elseif ($name == "Energy Management") {
                           foreach ($list_indicat as $lidis) {
                           if ($lidis["indicator_id"] == "17") { ?>
                        <?php }
                           } ?>
                        <!--   Energy Div start -->
                        
                        <div class="tab-pane " id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                           <div class="col-sm-12">
                              <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                 <div class="accordion" id="accordionExample">
                                    <!-- accordion 1 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingOne">
                                          <button
                                             class="accordion-button mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionOne"
                                             aria-expanded="false"
                                             aria-controls="accordionOne"
                                             >
                                          Clause 1:Energy consumption within the organization
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"  data-bs-toggle="modal" data-bs-target="#exampleModal_1"></i></span>
                                          </button>
                                       </h2>
                                       <!-- modal 1 -->
                                       <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header bg-white pb-0">
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark ">
                                                   <p class="text-dark">Direct (Scope 1) GHG emissions can come from the following sources owned or controlled by an organization:</p>
                                                   <ul>
                                                      <li>Generation of electricity, heating, cooling and steam: these emissions result from the combustion of fuels in stationary sources, such as boilers, furnaces, and turbines – and from other combustion processes such as flaring.</li>
                                                      <li>Physical or chemical processing: most of these emissions result from the manufacturing orprocessing of chemicals and materials, such as cement, steel, aluminium, ammonia, and waste processing.</li>
                                                      <li>Transportation of materials, products, waste, workers, and passengers: these emissions result from the combustion of fuels in mobile combustion sources owned or controlled by the organization, such as trucks, trains, ships, aeroplanes, buses, and cars.</li>
                                                      <li>Fugitive emissions: these are emissions that are not physically controlled but result from intentional or unintentional releases of GHGs. These can include equipment leaks from joints, seals, packing, and gaskets; methane emissions (e.g., from coal mines) and venting; HFC emissions from refrigeration and air conditioning equipment; and methane leakages (e.g., from gas transport).</li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end modal 1 -->
                                       <div
                                          id="accordionOne"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingOne"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Total fuel consumption within the organization (including fuel types used), in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- 1st part -->
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Source list</label>
                                                         <p class="pt-1">Non-Renewable Sources</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Energy list</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">
                                                      </div>
                                                      <!-- Value Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-1" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select class="form-control  form-control-sm">
                                                <option>Select Boundary </option>
                                                <option>Sites</option>
                                                <option>Products</option>
                                                <option>Supplier</option>
                                                <option>Projects</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Energy list</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select  class="form-control  form-control-sm  total_number" readonly="">
                                                <option>Select from list</option>
                                                <option>Purchased energy</option>
                                                <option>Generated energy</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select class="form-control  form-control-sm">
                                                <option>Select Site</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Type</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select  class="form-control  form-control-sm  total_number" readonly="">
                                                <option>Coal</option>
                                                <option>Petroleum</option>
                                                <option>Natural gas</option>
                                                <option>Other</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>For Non-Renewable Sources: coal; fuels distilled from petroleum or crude oil, such as gasoline, diesel fuel, jet fuel, and heating oil; fuels extracted from natural gas processing and petroleum refinings, such as butane, propane, and liquefied petroleum gas (LPG); natural gas, such as compressed natural gas (CNG), and liquefied natural gas (LNG); nuclear power.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value Sidebar -->
                                                <div class="col-md-1 p-0">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="addSourceDiv()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="source_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>Fuel consumption from Non-renewable sources within the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <input type="number"class="form-control total_number" placeholder="Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                             <!-- end 1st part -->
                                             <hr>
                                             <!-- 2nd part -->
                                             <div class=" container mt-2 pb-1">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Source list</label>
                                                         <p class="pt-1">Renewable Sources</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Energy list</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1_2" readonly="">
                                                      </div>
                                                      <!-- Value Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value-sidebar-1_2" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select class="form-control  form-control-sm">
                                                <option>Select Boundary </option>
                                                <option>Sites</option>
                                                <option>Products</option>
                                                <option>Supplier</option>
                                                <option>Projects</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Energy list</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select  class="form-control  form-control-sm  total_number" readonly="">
                                                <option>Select from list</option>
                                                <option>Purchased energy</option>
                                                <option>Generated energy</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select class="form-control  form-control-sm">
                                                <option>Select Site</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Type</label>
                                                </div>
                                                <div class="col-md-8">
                                                <select  class="form-control  form-control-sm  total_number" readonly="">
                                                <option>Hydropower</option>
                                                <option>Solar energy</option>
                                                <option>Wind energy</option>
                                                <option>Biogas</option>
                                                <option>Other</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>For Renewable Sources: biomass, geothermal, hydro, solar, wind.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value Sidebar -->
                                                <div class="col-md-1 p-0">
                                                <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="addSourceDiv_1()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="source_div_1 bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>Fuel consumption from Non-renewable sources within the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <input type="number"class="form-control total_number" placeholder="Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                             <!-- end 2nd part -->
                                             <hr>
                                             <!-- 3rd part -->
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total fuel consumption within the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Total Value</label>
                                                         <input type="number"class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                             <!-- end 3rd part -->
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">How is the total electricity consumed in the organisation? , in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-7 mb-1 mt-1 text-dark">
                                                      <p>The total energy consumed in the organization.</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value2-sidebar" readonly="">
                                                   </div>
                                                   <!-- Value 2 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value2-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Boundary </option>
                                                                                 <option>Sites</option>
                                                                                 <option>Products</option>
                                                                                 <option>Supplier</option>
                                                                                 <option>Projects</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Site</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 2 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                      <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                      <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end question 2-->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">How is the energy consumed through other sources in the organisation? , in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-5 mb-1 mt-1 text-dark">
                                                      <p>Energy consumed through other sources.</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Energy List</label>
                                                      <input type="number" class="form-control total_number" placeholder="Select from list" readonly="">
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value3-sidebar" readonly="">
                                                   </div>
                                                   <!-- Value 3 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value3-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Boundary </option>
                                                                                 <option>Sites</option>
                                                                                 <option>Products</option>
                                                                                 <option>Supplier</option>
                                                                                 <option>Projects</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Site</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12">
                                                                        <p class="fs-6">Energy consumed through other sources</p>
                                                                     </div>
                                                                     <div class="offset-md-6 col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select  class="form-control  form-control-sm  total_number" readonly="">
                                                                                 <option>Select from list</option>
                                                                                 <option>Heating consumption</option>
                                                                                 <option>Cooling consumption</option>
                                                                                 <option>Steam consumption</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <hr>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 3 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivthree()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="questionthree_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total energy consumed through other sources in the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3-->
                                           <!-- question 3 sold -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">How is the energy sold in the organisation? , in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-5 mb-1 mt-1 text-dark">
                                                      <p>Energy sold through other sources.</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Energy List</label>
                                                      <input type="number" class="form-control total_number" placeholder="Select from list" readonly="">
                                                   </div>
                                                   <div class="col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value3_sold-sidebar" readonly="">
                                                   </div>
                                                   <!-- Value 3 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value3_sold-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Boundary </option>
                                                                                 <option>Sites</option>
                                                                                 <option>Products</option>
                                                                                 <option>Supplier</option>
                                                                                 <option>Projects</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Site</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12">
                                                                        <p class="fs-6">Energy sold through other sources</p>
                                                                     </div>
                                                                     <div class="offset-md-6 col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select  class="form-control  form-control-sm  total_number" readonly="">
                                                                                 <option>Select from list</option>
                                                                                 <option>Heating sold</option>
                                                                                 <option>Cooling sold</option>
                                                                                 <option>Steam sold</option>
                                                                                 <option>Electricity sold</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <hr>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 3 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivsold()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="questionsold_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total energy consumed through other sources in the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 sold-->
                                          <!-- question 4-->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Total energy consumption in the organisation, in joules or multiples.</p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total energy consumption in the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Total Value</label>
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4-->
                                          <!-- question 5 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value4-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 4 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value4-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 4 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end questin 5 -->
                                          <!-- question 6 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the source of the conversion factors used (if any)</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value5-sidebar"  readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 5 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value5-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 5 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end questin 6 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 1 -->
                                    <!-- 2 accordion -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingTwo">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionTwo"
                                             aria-expanded="false"
                                             aria-controls="accordionTwo"
                                             >
                                          Clause 2: Energy consumption outside of the organization
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"  data-bs-toggle="modal" data-bs-target="#exampleModal2"></i></span>
                                          </button>
                                       </h2>
                                       <!-- modal 2 -->
                                       <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header bg-white pt-0">
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-dark pt-0">
                                                   <p>A location-based method reflects the average GHG emissions intensity of grids on which energy consumption occurs, using mostly grid-average emission factor data</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end modal 2 -->
                                       <div
                                          id="accordionTwo"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingTwo"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">What is the energy consumption outside of the organization?, in joules or multiples.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter2" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- upstream -->
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <label class="form-label fs-6" for="vertical-landmark">Upstream Activities</label>
                                                      <select class="select2 form-select">
                                                         <option>Purchased goods and services</option>
                                                         <option>Capital goods</option>
                                                         <option>Natural Gas</option>
                                                         <option>Fuel and Energy related activities (Not used within the organisation)</option>
                                                         <option>Upstream transportation and distribution</option>
                                                         <option>Waste generated in operations</option>
                                                         <option>Business travel</option>
                                                         <option>Employee commuting</option>
                                                         <option>Upstream leased assets</option>
                                                         <option>Other upstream</option>
                                                      </select>
                                                   </div>
                                                   <div class="offset-md-3 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value6-sidebar" readonly="">
                                                   </div>
                                                   <!-- Value 6 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value6-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 6 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="upstream_question()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="upstream_activities bg-light"></div>
                                             <!-- end upstream -->
                                             <!-- downstream -->
                                             <div class=" container mt-2">
                                                <div class="row">
                                                   <div class="col-md-4">
                                                      <label class="form-label fs-6" for="vertical-landmark">Downstream activities list</label>
                                                      <select class="select2 form-select">
                                                         <option>Downstream transportation and distribution</option>
                                                         <option>Processing of sold products</option>
                                                         <option>Use of sold products</option>
                                                         <option>End-of-life treatment of sold products</option>
                                                         <option>Downstream leased assets</option>
                                                         <option>Franchises</option>
                                                         <option>Investments</option>
                                                         <option>Other downstream</option>
                                                      </select>
                                                   </div>
                                                   <div class="offset-md-3 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value7-sidebar"  readonly="">
                                                   </div>
                                                   <!-- Value 7 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value7-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 7 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <label class="form-label fs-6">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="downstream_question()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="downstream_activities bg-light"></div>
                                             <!-- end downstream -->
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total energy consumed outside the organization.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" >Total Value</label>
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value8-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 8 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value8-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 8 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2-->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the source of the conversion factors used (if any)</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."  data-bs-toggle="modal" data-bs-target="#add-value9-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 9 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value9-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" id="image" name="image" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 9 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3-->
                                       </div>
                                    </div>
                                    <!-- end accordion 2 -->
                                    <!-- accordion 3 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionThree"
                                             aria-expanded="false"
                                             aria-controls="accordionThree"
                                             >
                                          Clause 3:Energy intensity
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionThree"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Energy intensity ratio for the organization for the following</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter3" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2 mb-1">
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <label class="form-label fs-6" for="vertical-landmark">Energy intensity type</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">
                                                   </div>
                                                   <div class="offset-md-1 col-md-2">
                                                      <label class="form-label fs-6">Value</label>
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value10-sidebar" readonly="">
                                                   </div>
                                                   <!-- Value 10 Sidebar -->
                                                   <div class="modal modal-slide-in fade" id="add-value10-sidebar" aria-hidden="true">
                                                      <div class="modal-dialog sidebar-lg">
                                                         <div class="modal-content p-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                            <div class="d-inline-flex">
                                                               <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                               Record
                                                               </button>
                                                               <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                               Calculate
                                                               </button>
                                                            </div>
                                                            <div class="modal-body flex-grow-1 bg-light pt-1">
                                                               <form>
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">Start Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Boundary </option>
                                                                                 <option>Sites</option>
                                                                                 <option>Products</option>
                                                                                 <option>Supplier</option>
                                                                                 <option>Projects</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <h6 class="text-center">End Date</h6>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Period</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="date" placeholder="calender">
                                                                           </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Site</label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <select class="form-control  form-control-sm">
                                                                                 <option>Select Site</option>
                                                                              </select>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label for="exampleFormControlInput1" class="form-label ">Energy intensity type </label>
                                                                        <select  class="form-control  form-control-sm  total_number" readonly="">
                                                                           <option>Select from list</option>
                                                                           <option>Products (such as energy consumed per unit produced)</option>
                                                                           <option>Services (such as energy consumed per function or per service)</option>
                                                                           <option>Sales (such as energy consumed per monetary unit of sales)</option>
                                                                           <option>Size (such as m2 floor space)</option>
                                                                           <option>Employees (such as energy intensity per employee)</option>
                                                                           <option>Other (specify the details in comments)</option>
                                                                        </select>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Value </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input id="smallInput" class="form-control form-control-sm" type="text" placeholder="Enter the value">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="row mb-1">
                                                                           <div class="col-md-4">
                                                                              <label for="exampleFormControlInput1" class="form-label ">Unit </label>
                                                                           </div>
                                                                           <div class="col-md-8">
                                                                              <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <hr>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                                        <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                                     </div>
                                                                     <div class="col-md-12 mb-2">
                                                                        <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                                        <input class=" form-control" type="file" aria-invalid="false">
                                                                     </div>
                                                                     <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                               <div class="Guidance">
                                                                  <h6 class="text-decoration-underline">Guidance:</h6>
                                                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- end value 10 Sidebar -->
                                                   <div class="col-md-1 p-0">
                                                      <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                   </div>
                                                   <div class="col-md-2 mt-2 lh">
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="Type_accordionThree()"><i class="fa fa-plus"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="type_questionone bg-light"></div>
                                             <div class="container bg-light">
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 pb-1">
                                                   <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                   <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <!--     <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                             			<div class="row">
                                             						<div class="col-md-10">
                                             									<p class="mb-0 d-inline-block ">Organization-specific metric (the denominator) is chosen to calculate the ratio.</p>
                                             						</div>
                                             						<div class="col-md-2 text-end p-0">
                                             									<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="fa-solid fa-user-plus"></i></button>
                                             									<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                             									<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                             						</div>
                                             			</div>
                                             </div>
                                             <div class=" container mt-2 mb-1">
                                             			<div class="row">
                                             						<div class="col-md-6">
                                             									<label class="form-label fs-6" for="vertical-landmark">Type</label>
                                             									<select class="select2 form-select">
                                             												<option>Unit of product</option>
                                             												<option>Production volume (such as metric tons, litres, or MWh)</option>
                                             												<option>Size (such as m2 floor space)</option>
                                             												<option>Number of full-time employees</option>
                                             												<option>Monetary units (such as revenue in INR)</option>
                                             									</select>
                                             						</div>
                                             						<div class="offset-md-1 col-md-2">
                                             									<label class="form-label fs-6">Value</label>
                                             									<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value11-sidebar" readonly="">
                                             </div> -->
                                          <!-- Value 11 Sidebar -->
                                          <!-- <div class="modal modal-slide-in fade" id="add-value11-sidebar" aria-hidden="true">
                                             <div class="modal-dialog sidebar-lg">
                                             			<div class="modal-content p-0">
                                             						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                             						<div class="d-inline-flex">
                                             									<button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                             									Record
                                             									</button>
                                             									<button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                             									Calculate
                                             									</button>
                                             						</div>
                                             						<div class="modal-body flex-grow-1 bg-light pt-1">
                                             									<form>
                                             												<div class="row">
                                             															<div class="col-md-6">
                                             																		<h6 class="text-center">Start Date</h6>
                                             																		<div class="row mb-1">
                                             																					<div class="col-md-4">
                                             																								<label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                             																					</div>
                                             																					<div class="col-md-8">
                                             																								<input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                             																					</div>
                                             																		</div>
                                             																		<div class="row mb-1">
                                             																					<div class="col-md-4">
                                             																								<label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                             																					</div>
                                             																					<div class="col-md-8">
                                             																								<input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                             																					</div>
                                             																		</div>
                                             															</div>
                                             															<div class="col-md-6">
                                             																		<h6 class="text-center">End Date</h6>
                                             																		<div class="row mb-1">
                                             																					<div class="col-md-4">
                                             																								<label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                             																					</div>
                                             																					<div class="col-md-8">
                                             																								<input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="calender">
                                             																					</div>
                                             																		</div>
                                             															</div>
                                             															<div class="col-md-12 mb-2">
                                             																		<label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                             																		<textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                             															</div>
                                             															<div class="col-md-12 mb-2">
                                             																		<label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                             																		<input class=" form-control" type="file" aria-invalid="false">
                                             															</div>
                                             															<div class="col-md-12 mb-2 text-end border-bottom">
                                             																		<button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                             															</div>
                                             												</div>
                                             									</form>
                                             									<div class="Guidance">
                                             												<h6 class="text-decoration-underline">Guidance:</h6>
                                             												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .</p>
                                             									</div>
                                             						</div>
                                             			</div>
                                             </div>
                                             </div> -->
                                          <!-- end value 11 Sidebar -->
                                          <!--   <div class="offset-md-1 col-md-2 mt-2 lh p-0">
                                             <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="Type_accordinquestiontwo()"><i class="fa fa-plus"></i></button>
                                             </div>
                                             </div>
                                             </div>
                                             <div class="type_questiontwo bg-light"></div>
                                             <div class="container bg-light">
                                             <div class="offset-md-10 col-md-2 admin_btn mt-1 pb-1">
                                             <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                             <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                             </div>
                                             </div>
                                             </div> -->
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Types of energy included in the intensity ratio.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Type"
                                                            data-bs-toggle="modal" data-bs-target="#add-value12-sidebar" readonly="">
                                                      </div>
                                                      <!-- Value 12 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value12-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 12 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Does the ratio uses energy consumption within the organization, outside of it, or both.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Within the organization</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Outside the organization</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Both</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Type"  data-bs-toggle="modal" data-bs-target="#add-value13-sidebar"readonly="">
                                                      </div>
                                                      <!-- Value 13 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value13-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Within the organization</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Outside the organization</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Both</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 13 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save &amp; Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 3 -->
                                    <!-- accordion 4 -->
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionFour"
                                             aria-expanded="false"
                                             aria-controls="accordionFour"
                                             >
                                          Clause 4:Reduction of energy consumption
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionFour"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Amount of reductions in energy consumption achieved as a direct result of conservation and efficiency initiatives.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter4" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <label class="form-label fs-6" for="select2-basic">Type</label>
                                                         <select class="select2 form-select">
                                                            <option>Process redesign</option>
                                                            <option>Conversion and retrofitting of equipment</option>
                                                            <option>Changes in behaviour</option>
                                                            <option>Operational changes</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-3 col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value14-sidebar"  readonly="">
                                                      </div>
                                                      <!-- Value14 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value14-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value14 Sidebar -->
                                                <div class="col-md-1 p-0">
                                                <label class="form-label fs-6">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                </div>
                                                <div class="col-md-2 mt-2 lh">
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="redesign_type()"><i class="fa fa-plus"></i></button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                             <div class="redesign_div bg-light"></div>
                                             <div class="container bg-light mt-3">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>The total amount of reduction.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Total Value</label>
                                                         <input type="number" class="form-control total_number" placeholder="Total Value" readonly="">
                                                      </div>
                                                      <div class="col-md-1 p-0">
                                                         <label class="form-label fs-6">Unit</label>
                                                         <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                      </div>
                                                      <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                         <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                         <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                      </div>
                                                   </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Types of energy included in the reductions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6" for="select2-basic">Selected Type</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Selected Type"
                                                            data-bs-toggle="modal" data-bs-target="#add-value15-sidebar" readonly="">
                                                      </div>
                                                      <!-- Value 15 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value15-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Fuel</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Electricity</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Heating</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Cooling</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Steam</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">All above</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                             </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 15 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The basis for calculating reductions in energy consumption</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Base year</label>
                                                         <select class="select2 form-select">
                                                            <option>FY 2019 - 2020</option>
                                                            <option>FY 2020 - 2021</option>
                                                            <option>FY 2021 - 2022</option>
                                                            <option>FY 2022 - 2023</option>
                                                            <option>FY 2022 - 2024</option>
                                                            <option>FY 2022 - 2025</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-2 col-md-7">
                                                         <label class="form-label fs-6" for="select2-basic">Baseline</label>
                                                         <textarea type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value16-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 16 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value16-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment(optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Base year: historical datum (such as year) against which a measurement is tracked over time.</p>
                                                <p>Baseline: starting point used for comparisons ( it is the projected energy consumption or emissions in the absence of any reduction activity.)</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 16 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                          <!-- question 4 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter4"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value17-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 17 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value17-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 17 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 4 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 4 -->

                                    <!-- accordion 5 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionFive"
                                             aria-expanded="false"
                                             aria-controls="accordionFive"
                                             >
                                          Clause 5: Reductions in energy requirements of products and services.
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionFive"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingThree"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Reductions in energy requirements of sold products and services achieved during the reporting period</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter5" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-7 mb-1 mt-1 text-dark">
                                                         <p>Reductions in energy requirements.</p>
                                                      </div>
                                                      <div class="col-md-2">
                                                         <label class="form-label fs-6">Value</label>
                                                         <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value18-sidebar" readonly="">
                                                      </div>
                                                      <!-- Value18 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value18-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                                  <button class="btn btn-secondary w-100 waves-effect waves-float waves-light">
                                                                  Calculate
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <h6 class="text-center">Start Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Value</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="text" placeholder="Enter the value">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <h6 class="text-center">End Date</h6>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input id="smallInput" class="form-control form-control-sm fs-6" type="date" placeholder="calender">
                                                </div>
                                                </div>
                                                <div class="row mb-1">
                                                <div class="col-md-4">
                                                <label for="exampleFormControlInput1" class="form-label fs-6">Unit</label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="number" id="vertical-landmark" class="form-control  form-control-sm  total_number" placeholder="Joules" readonly="">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value18 Sidebar -->
                                                <div class="col-md-1 p-0">
                                                <label class="form-label fs-6">Unit</label>
                                                <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                                                </div>
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                          <!-- question 2 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">The basis for calculating reductions in energy consumption</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <label class="form-label fs-6" for="select2-basic">Base year</label>
                                                         <select class="select2 form-select">
                                                            <option>FY 2019 - 2020</option>
                                                            <option>FY 2020 - 2021</option>
                                                            <option>FY 2021 - 2022</option>
                                                            <option>FY 2022 - 2023</option>
                                                            <option>FY 2022 - 2024</option>
                                                            <option>FY 2022 - 2025</option>
                                                         </select>
                                                      </div>
                                                      <div class="offset-md-2 col-md-7">
                                                         <label class="form-label fs-6" for="select2-basic">Baseline</label>
                                                         <textarea type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value19-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 19 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value19-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Comment(optional)</label>
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                               <p>Base year: historical datum (such as year) against which a measurement is tracked over time.</p>
                                                <p>Baseline: starting point used for comparisons ( it is the projected energy consumption or emissions in the absence of any reduction activity.)</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 19 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 2 -->
                                          <!-- question 3 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">State the standards, methodologies, assumptions, and/or calculation tools used to answer the above questions.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter5"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="container bg-light mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <textarea  type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..." data-bs-toggle="modal" data-bs-target="#add-value20-sidebar" readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 20 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value20-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 20 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save & Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 3 -->
                                       </div>
                                    </div>
                                    <!-- end accordion 5 -->

                                    <!-- accordion 6 -->
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingFour">
                                          <button
                                             class="accordion-button collapsed mt-1"
                                             type="button"
                                             data-bs-toggle="collapse"
                                             data-bs-target="#accordionSix"
                                             aria-expanded="false"
                                             aria-controls="accordionSix"
                                             >
                                          Clause 6:Performance, Achieve and Trade(PAT)Scheme
                                          <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation"></i></span>
                                          </button>
                                       </h2>
                                       <div
                                          id="accordionSix"
                                          class="accordion-collapse collapse"
                                          aria-labelledby="headingFour"
                                          data-bs-parent="#accordionExample"
                                          >
                                          <!-- question 1 -->
                                          <div class="accordion-body p-0 bg-light">
                                             <div class="total_fuel bg-dark text-white">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <p class="mb-0 d-inline-block ">Does the entity have any sites / facilities identified as designated consumers (DCs) under the Performance, Achieve and Trade (PAT) Scheme of the Government of India? (Yes/No) If yes, disclose whether targets set under the PAT scheme have been achieved. In case targets have not been achieved, provide the remedial action taken, if any.</p>
                                                   </div>
                                                   <div class="col-md-2 text-end p-0">
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModalCenter6"><i class="fa-solid fa-user-plus"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-link"></i></button>
                                                      <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle me-1" type="button"><i class="fa-solid fa-eye"></i></button>
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModalCenter6" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                         <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                               <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body text-dark">
                                                                  <form>
                                                                     <div class="row">
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Select Boundary </option>
                                                                              <option>Sites</option>
                                                                              <option>Products</option>
                                                                              <option>Supplier</option>
                                                                              <option>Projects</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Sub-Boundary</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Choose Sub-Boundary</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                           <select class="select2 form-select">
                                                                              <option>No data found</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Frequency</label>
                                                                           <select class="select2 form-select">
                                                                              <option>One-time</option>
                                                                              <option>Recurring</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="basicInput">Priority</label>
                                                                           <select class="select2 form-select">
                                                                              <option>Low</option>
                                                                              <option>Medium</option>
                                                                              <option>High</option>
                                                                              <option>Critical</option>
                                                                           </select>
                                                                        </div>
                                                                        <div class="col-md-6 text-start mb-1">
                                                                           <label class="form-label fs-6" for="city-column">Due Date</label>
                                                                           <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                                                                        </div>
                                                                        <div class="col-md-12 mb-1 text-start">
                                                                           <label class="form-label fs-6" for="exampleFormControlTextarea1">Comment(Optional)</label>
                                                                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
                                                                        </div>
                                                                     </div>
                                                                  </form>
                                                               </div>
                                                               <div class="modal-footer">
                                                                  <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                  <button type="button" class="btn btn-dark  waves-effect">Submit</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class=" container mt-2">
                                                <form>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">Yes</label>
                                                         </div>
                                                         <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                            <label class="form-check-label fs-5" for="inlineCheckbox1">No</label>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-9">
                                                         <label class="form-label fs-6" for="select2-basic">Emission</label>
                                                         <textarea type="number" id="vertical-landmark" class="form-control total_number" placeholder="Comment..."
                                                            data-bs-toggle="modal" data-bs-target="#add-value21-sidebar"readonly=""></textarea>
                                                      </div>
                                                      <!-- Value 21 Sidebar -->
                                                      <div class="modal modal-slide-in fade" id="add-value21-sidebar" aria-hidden="true">
                                                         <div class="modal-dialog sidebar-lg">
                                                            <div class="modal-content p-0">
                                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                               <div class="d-inline-flex">
                                                                  <button class="btn btn-dark w-100 waves-effect waves-float waves-light">
                                                                  Record
                                                                  </button>
                                                               </div>
                                                               <div class="modal-body flex-grow-1 bg-light pt-1">
                                                <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">Yes</label>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="unchecked">
                                                <label class="form-check-label fs-5" for="inlineCheckbox1">No</label>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <textarea class="form-control fs-6" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..."></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                                                <input class=" form-control" type="file" aria-invalid="false">
                                                </div>
                                                <div class="col-md-12 mb-2 text-end border-bottom">
                                                <button type="button" class="btn btn-dark waves-effect mb-1">Record</button>
                                                </div>
                                                </div>
                                                </form>
                                                <div class="Guidance">
                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- end value 21 Sidebar -->
                                                <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                </div>
                                                <div class="offset-md-9 col-md-3 text-end">
                                                <button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Save &amp; Submit</button>
                                                </div>
                                                </div>
                                                </form>
                                             </div>
                                          </div>
                                          <!-- end question 1-->
                                       </div>
                                    </div>
                                    <!-- accordion 6 end -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           } else {
                           ?>
                        <!--   Energy Div end -->
                        <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                           <p>
                              Croissant jelly tootsie roll candy canes. Donut sugar plum jujubes sweet roll chocolate cake wafer. Tart
                              caramels jujubes. Dragée tart oat cake. Fruitcake cheesecake danish. Danish topping candy jujubes. Candy
                              canes candy canes lemon drops caramels tiramisu chocolate bar pie.
                           </p>
                           <p>
                              Gummi bears tootsie roll cake wafer. Gummies powder apple pie bear claw. Caramels bear claw fruitcake
                              topping lemon drops. Carrot cake macaroon ice cream liquorice donut soufflé. Gummi bears carrot cake
                              toffee bonbon gingerbread lemon drops chocolate cake.
                           </p>
                        </div>
                        <?php
                           } ?>
                        <!-- kpis start -->
                        <?php if ($name == "Energy Management") { ?>
                        <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                           <div class="">
                              <!-- charts part 1 -->
                              <div class="row">
                                 <div class="col-md-5">
                                    <!-- 1 -->
                                    <h5 class="fw-bolder mb-1">Total fuel...in the organization.</h5>
                                    <div class="shadow">
                                       <div class="card">
                                          <div class="card-body d-flex align-items-center justify-content-between">
                                             <div>
                                                <h3 class="fw-bolder mb-75">1.24gb</h3>
                                                <span>Memory Usage</span>
                                             </div>
                                             <div class="avatar bg-light-success p-50">
                                                <span class="avatar-content">
                                                <i data-feather="user-check" class="font-medium-4"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- 2 -->
                                    <h5 class="fw-bolder mb-1">Net  consumption in the organization.</h5>
                                    <div class="shadow">
                                       <div class="card">
                                          <div class="card-body d-flex align-items-center justify-content-between">
                                             <div>
                                                <h3 class="fw-bolder mb-75">1.24gb</h3>
                                                <span>Memory Usage</span>
                                             </div>
                                             <div class="avatar bg-light-success p-50">
                                                <span class="avatar-content">
                                                <i data-feather="user-check" class="font-medium-4"></i>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- 3 -->
                                    <h5 class="fw-bolder mb-1">Total energy consumption in the organization.</h5>
                                    <div class="shadow">
                                       <div class="card">
                                          <div class="card-header flex-column align-items-start pb-0">
                                             <h3 class="fw-bolder">Average Daily Sales</h3>
                                             <p class="card-text">Total Sales This Month</p>
                                             <h3 class="fw-bolder">$28,450</h3>
                                          </div>
                                          <div id="gained-chart"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end column -->
                                 <div class="col-md-7">
                                    <h5 class="mb-1 fw-bolder">Energy sold in the organization.</h5>
                                    <div class="card">
                                       <div class="shadow">
                                          <div class="card-body">
                                             <div id="mychart1"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- circle chart1 -->
                                 <div class="col-md-6">
                                    <h5 class="mb-1 fw-bolder">Energy consumption within the organization</h5>
                                    <div class="card">
                                       <div class="shadow">
                                          <div class="card-body">
                                             <div id="circlechart1"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end circle chart2 -->
                                 <!-- circle chart2 -->
                                 <div class="col-md-6">
                                    <h5 class="mb-1 fw-bolder">Energy sold in the organization.</h5>
                                    <div class="card">
                                       <div class="shadow">
                                          <div class="card-body">
                                             <div id="circlechart2"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end circle chart2 -->
                              </div>
                           </div>
                           <!-- end charts part 1-->
                           <div>
                              <h5 class="fw-bolder">Energy intensity ration for the organization.</h5>
                              <div class="row d-flex justify-content-center bg-light pt-1 pb-1">
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>Energy Consumed/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>Energy Consumed/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>Energy Consumed/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>Energy Consumed/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>Energy Consumed/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Polar Area Chart Starts -->
                           <div class="">
                              <div class="mt-3 mb-1">
                                 <h5 class="fw-bolder">Energy consumption outside of the organization</h5>
                              </div>
                              <div class="shadow">
                                 <div class="card">
                                    <div class="card-header">
                                       <h6 class="fw-bolder">Total energy consumption outside</h6>
                                       <div class="dropdown">
                                          <i
                                             data-feather="more-vertical"
                                             class="cursor-pointer"
                                             role="button"
                                             id="heat-chart-dd"
                                             data-bs-toggle="dropdown"
                                             aria-haspopup="true"
                                             aria-expanded="false"
                                             >
                                          </i>
                                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                             <a class="dropdown-item" href="#">Last 28 Days</a>
                                             <a class="dropdown-item" href="#">Last Month</a>
                                             <a class="dropdown-item" href="#">Last Year</a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="card-body">
                                       <canvas class="polar-area-chart-ex chartjs" data-height="350"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Polar Area Chart Ends-->
                        </div>
                        <?php } elseif ($name == "Emissions") { ?>
                        <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                           <!-- charts part 1 -->
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="shadow">
                                    <div class="card">
                                       <div class="card-header flex-column align-items-start pb-0">
                                          <h3 class="fw-bolder">Total GHG Emission</h3>
                                       </div>
                                       <div id="gained-chart2"></div>
                                       <h4 class="fw-bolder ms-2">175k</h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="shadow">
                                    <div class="card">
                                       <div class="card-header flex-column align-items-start">
                                          <h6 class="card-title mb-75">GHG Emissions</h6>
                                       </div>
                                       <div class="card-body">
                                          <div id="donut-chart"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <h5 class="fw-bolder mb-1">Other indirect (Scope 3) GHG emissions</h5>
                                 <div class="shadow">
                                    <div class="card">
                                       <div class="card-header">
                                          <h4 class="card-title">Upstream Activities emission</h4>
                                          <span class="card-subtitle text-muted pt-1">Spending on various categories </span>
                                          <div class="dropdown">
                                             <i
                                                data-feather="more-vertical"
                                                class="cursor-pointer"
                                                role="button"
                                                id="heat-chart-dd"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                >
                                             </i>
                                             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">Last Year</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                          <canvas class="polar-area-chart-ex-up chartjs" data-height="350"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <h5 class="fw-bolder mb-1">Energy consumption outside of the organization</h5>
                                 <div class="shadow">
                                    <div class="card">
                                       <div class="card-header">
                                          <h4 class="card-title">Downstream Activities emission</h4>
                                          <span class="card-subtitle text-muted pt-1">Value (11923 MT CO2 eq))</span>
                                          <div class="dropdown">
                                             <i
                                                data-feather="more-vertical"
                                                class="cursor-pointer"
                                                role="button"
                                                id="heat-chart-dd"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                >
                                             </i>
                                             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">Last Year</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                          <canvas class="polar-area-chart-esx chartjds" data-height="350"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="shadow">
                                    <div class="card">
                                       <div
                                          class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column"
                                          >
                                          <div class="header-left">
                                             <h4 class="card-title">Total GHG emissions</h4>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                          <canvas class="bar-charst-ex chartjs" data-height="400"></canvas>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end charts part 1-->
                           <div>
                              <h5 class="fw-bolder">GHG emissions intensity ratio for the organization.</h5>
                              <div class="row d-flex justify-content-center bg-light pt-1 pb-1">
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>GHG Emission/ Product</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>GHG Emission/ Service</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>GHG Emission/ Turnover</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>GHG Emission/ Area</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-6">
                                    <div class="card mb-0">
                                       <div class="card-body pb-50">
                                          <h6>GHG Emission/ Employees</h6>
                                          <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } else { ?>
                        <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                           <div class="">
                              <!-- charts part 1 -->
                              Welcome to P+ KPIS
                           </div>
                           <!-- Polar Area Chart Ends-->
                        </div>
                        <?php } ?>
                        <!-- kpis end -->
                        <!-- request start -->
                        <?php if ($name == "Energy Management") { ?>
                        <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                           <div class="d-flex justify-content-between align-items-center mx-0 row pb-1">
                              <div class="col-sm-12 col-md-7">
                                 <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>
                                       Show
                                       <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" style="width: 70px;">
                                          <option value="7">7</option>
                                          <option value="10">10</option>
                                          <option value="25">25</option>
                                          <option value="50">50</option>
                                          <option value="75">75</option>
                                          <option value="100">100</option>
                                       </select>
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-3">
                                 <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:
                                    <input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="row p-0" id="table-borderless">
                              <div class="col-12 p-0">
                                 <div class="table-responsive">
                                    <table class="table table-borderless">
                                       <thead>
                                          <tr>
                                             <th>Assigned To</th>
                                             <th>Task Title</th>
                                             <th>Priority</th>
                                             <th>Due Date</th>
                                             <th>Requester Name</th>
                                             <th>Status</th>
                                             <th>Actions</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                         <span class="b-avatar-img">
                                                         <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
                                                         </span><!---->
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>Total fuel...</td>
                                             <td>
                                                <span class="badge badge-glow bg-warning">Medium</span>
                                             </td>
                                             <td>10/12/2022</td>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" target="_self" style="width: 32px; height: 32px;">
                                                         <div class="avatar bg-light-secondary avatar-sm me-50">
                                                            <span class="avatar-content">pm</span>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td><span class="badge rounded-pill badge-light-success me-1">Active</span></td>
                                             <td>
                                                <div class="dropdown">
                                                   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                   <i data-feather="more-vertical"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-end">
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
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                         <span class="b-avatar-img">
                                                         <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
                                                         </span><!---->
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>Total fuel...</td>
                                             <td>
                                                <span class="badge badge-glow bg-warning">Medium</span>
                                             </td>
                                             <td>10/12/2022</td>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" target="_self" style="width: 32px; height: 32px;">
                                                         <div class="avatar bg-light-secondary avatar-sm me-50">
                                                            <span class="avatar-content">pm</span>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td><span class="badge rounded-pill badge-light-success me-1">Active</span></td>
                                             <td>
                                                <div class="dropdown">
                                                   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                   <i data-feather="more-vertical"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-end">
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
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                         <span class="b-avatar-img">
                                                         <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
                                                         </span><!---->
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>Total fuel...</td>
                                             <td>
                                                <span class="badge badge-glow bg-warning">Medium</span>
                                             </td>
                                             <td>10/12/2022</td>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" target="_self" style="width: 32px; height: 32px;">
                                                         <div class="avatar bg-light-secondary avatar-sm me-50">
                                                            <span class="avatar-content">pm</span>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td><span class="badge rounded-pill badge-light-success me-1">Active</span></td>
                                             <td>
                                                <div class="dropdown">
                                                   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                   <i data-feather="more-vertical"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-end">
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
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                         <span class="b-avatar-img">
                                                         <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
                                                         </span><!---->
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>Total fuel...</td>
                                             <td>
                                                <span class="badge badge-glow bg-warning">Medium</span>
                                             </td>
                                             <td>10/12/2022</td>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" target="_self" style="width: 32px; height: 32px;">
                                                         <div class="avatar bg-light-secondary avatar-sm me-50">
                                                            <span class="avatar-content">pm</span>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td><span class="badge rounded-pill badge-light-success me-1">Active</span></td>
                                             <td>
                                                <div class="dropdown">
                                                   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                   <i data-feather="more-vertical"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-end">
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
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                                         <span class="b-avatar-img">
                                                         <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
                                                         </span><!---->
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td>Total fuel...</td>
                                             <td>
                                                <span class="badge badge-glow bg-warning">Medium</span>
                                             </td>
                                             <td>10/12/2022</td>
                                             <td>
                                                <div class="d-flex justify-content-start align-items-center mt-2">
                                                   <div class="media-aside align-self-center">
                                                      <a href="" target="_self" style="width: 32px; height: 32px;">
                                                         <div class="avatar bg-light-secondary avatar-sm me-50">
                                                            <span class="avatar-content">pm</span>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="profile-user-info">
                                                      <h6 class="mb-0">Peter Reed</h6>
                                                      <small class="text-muted">@ Peter Reed</small>
                                                   </div>
                                                </div>
                                             </td>
                                             <td><span class="badge rounded-pill badge-light-success me-1">Active</span></td>
                                             <td>
                                                <div class="dropdown">
                                                   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                   <i data-feather="more-vertical"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-end">
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
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12 col-md-8">
                                 <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
                              </div>
                              <div class="col-sm-12 col-md-4">
                                 <div class="dataTables_paginate paging_simple_numbers text-end" id="example_paginate">
                                    <ul class="pagination">
                                       <li class="paginate_button page-item previous disabled" id="example_previous">
                                          <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                       </li>
                                       <li class="paginate_button page-item active">
                                          <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                       </li>
                                       <li class="paginate_button page-item next disabled" id="example_next">
                                          <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } else { ?>
                        <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                           No report Generated
                        </div>
                        <?php } ?>
                        <!-- end request -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- Filled Tabs ends -->
         </div>
      </section>
   </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"
   ); ?>"></script>
<script src="<?php echo base_url(
   "public/brand/assets/assets/js/echarts.min.js"
   ); ?>"></script>
<!-- select2 -->
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js"
   ); ?>"></script>
<!-- flatpickr -->
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"
   ); ?>"></script>
<script>
   $(document).ready(function() {
   	$('#example').DataTable();
   });
</script>
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url(
   "public/brand/assets/app-assets/js/scripts/charts/chart-chartjs.min.js"
   ); ?>"></script>
<!-- END: Page JS-->
<!-- Energy -->
<script>
   // accordion one
   // question 1
   function addSourceDiv(){
   $('.source_div').append('<div class=" source_form container mt-2 pb-1">\
   			<form>\
   						<div class="row">\
   									<div class="col-md-3">\
   												<label class="form-label fs-6" for="select2-basic">Source list</label>\
   												<p class="pt-1">Non-Renewable Sources</p>\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6" for="select2-basic">Energy list</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6" for="select2-basic">Type</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6">Value</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">\
   									</div>\
   									<div class="col-md-1 p-0">\
   												<label class="form-label fs-6" for="select2-basic">Unit</label>\
   												<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   									</div>\
   									<div class="col-md-2 mt-2 lh">\
   												<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="addSourceDiv()"><i class="fa fa-plus"></i></button>\
   												<button class="remove_source_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   									</div>\
   						</div>\
   			</form>\
   </div>');
   }
   $(document).on('click','.remove_source_block',function(){
   $(this).closest('.source_form ').remove();
   });
   // end question 1
   // question 1.2
   function addSourceDiv_1(){
   $('.source_div_1').append('<div class="source_form_1 container mt-2 pb-1">\
   			<form>\
   						<div class="row">\
   									<div class="col-md-3">\
   												<label class="form-label fs-6" for="select2-basic">Source list</label>\
   												<p class="pt-1">Renewable Sources</p>\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6" for="select2-basic">Energy list</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6" for="select2-basic">Type</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">\
   									</div>\
   									<div class="col-md-2">\
   												<label class="form-label fs-6">Value</label>\
   												<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1_2" readonly="">\
   									</div>\
   									<div class="col-md-1 p-0">\
   												<label class="form-label fs-6" for="select2-basic">Unit</label>\
   												<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   									</div>\
   									<div class="col-md-2 mt-2 lh">\
   												<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="addSourceDiv_1()"><i class="fa fa-plus"></i></button>\
   												<button class="remove_source_block_1 btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   									</div>\
   						</div>\
   			</form>\
   </div>');
   }
   $(document).on('click','.remove_source_block_1',function(){
   $(this).closest('.source_form_1 ').remove();
   });
   // end question 1.2
   // question 3
   function addquestionDivthree(){
   $('.questionthree_div').append(' <div class="questionthree container mt-2">\
   			<div class="row">\
   						<div class="col-md-5 mb-1 mt-1 text-dark">\
   									<p>Energy consumed through other sources.</p>\
   						</div>\
   						<div class="col-md-2">\
   									<label class="form-label fs-6">Energy List</label>\
   									<input type="number" class="form-control total_number" placeholder="Select from list" readonly="">\
   						</div>\
   						<div class="col-md-2">\
   									<label class="form-label fs-6">Value</label>\
   									<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value3-sidebar" readonly="">\
   						</div>\
   						<div class="col-md-1 p-0">\
   									<label class="form-label fs-6">Unit</label>\
   									<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   						</div>\
   						<div class="col-md-2 mt-2 lh">\
   									<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivthree()"><i class="fa fa-plus"></i></button>\
   									<button class="remove_questionthree_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   						</div>\
   			</div>\
   </div>');
   }
   $(document).on('click','.remove_questionthree_block',function(){
   $(this).closest('.questionthree').remove();
   });
   // end question 3
   // question 3 sold
   function addquestionDivsold(){
   $('.questionsold_div').append('<div class="questionsold container mt-2">\
                                                <div class="row">\
                                                   <div class="col-md-5 mb-1 mt-1 text-dark">\
                                                      <p>Energy sold through other sources.</p>\
                                                   </div>\
                                                   <div class="col-md-2">\
                                                      <label class="form-label fs-6">Energy List</label>\
                                                      <input type="number" class="form-control total_number" placeholder="Select from list" readonly="">\
                                                   </div>\
                                                   <div class="col-md-2">\
                                                      <label class="form-label fs-6">Value</label>\
                                                      <input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value3-sidebar" readonly="">\
                                                   </div>\
                                                   <div class="col-md-1 p-0">\
                                                      <label class="form-label fs-6">Unit</label>\
                                                      <input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
                                                   </div>\
                                                   <div class="col-md-2 mt-2 lh">\
                                                      <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivsold()"><i class="fa fa-plus"></i></button>\
                                                            <button class="remove_questionsold_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
                                                   </div>\
                                                </div>\
                                             </div>');
   }
   $(document).on('click','.remove_questionsold_block',function(){
   $(this).closest('.questionsold').remove();
   });
   // end question 3
   // end accordion One
   // accordion two
   // upstream
   function upstream_question(){
   $('.upstream_activities').append(' <div class="container upstream mt-2">\
   				<div class="row">\
   							<div class="col-md-4">\
   										<label class="form-label fs-6" for="vertical-landmark">Upstream Activities</label>\
   										<select class="select2 form-select">\
   													<option>Purchased goods and services</option>\
   													<option>Capital goods</option>\
   													<option>Natural Gas</option>\
   													<option>Fuel and Energy related activities (Not used within the organisation)</option>\
   													<option>Upstream transportation and distribution</option>\
   													<option>Waste generated in operations</option>\
   													<option>Business travel</option>\
   													<option>Employee commuting</option>\
   													<option>Upstream leased assets</option>\
   													<option>Other upstream</option>\
   										</select>\
   							</div>\
   							<div class="offset-md-3 col-md-2">\
   										<label class="form-label fs-6">Value</label>\
   										<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value6-sidebar"readonly="">\
   							</div>\
   							<div class="col-md-1 p-0">\
   										<label class="form-label fs-6" for="select2-basic">Unit</label>\
   										<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   							</div>\
   							<div class="col-md-2 mt-2 lh">\
   										<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="upstream_question()"><i class="fa fa-plus"></i></button>\
   										<button class="remove_upstream_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   							</div>\
   				</div>\
   	</div>');
   }
   $(document).on('click','.remove_upstream_block',function(){
   $(this).closest('.upstream').remove();
   });
   // end upstream
   // downstream
   function downstream_question(){
   			$('.downstream_activities').append('	<div class="container downstream mt-2">\
   				<div class="row">\
   							<div class="col-md-4">\
   										<label class="form-label fs-6" for="vertical-landmark">Downstream activities list</label>\
   										<select class="select2 form-select">\
   													<option>Downstream transportation and distribution</option>\
   													<option>Processing of sold products</option>\
   													<option>Use of sold products</option>\
   													<option>End-of-life treatment of sold products</option>\
   													<option>Downstream leased assets</option>\
   													<option>Franchises</option>\
   													<option>Investments</option>\
   													<option>Other downstream</option>\
   										</select>\
   							</div>\
   							<div class="offset-md-3 col-md-2">\
   										<label class="form-label fs-6">Value</label>\
   										<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value7-sidebar" readonly="">\
   							</div>\
   							<div class="col-md-1 p-0">\
   										<label class="form-label fs-6">Unit</label>\
   										<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   							</div>\
   							<div class="col-md-2 mt-2 lh">\
   										<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="downstream_question()"><i class="fa fa-plus"></i></button>\
   										<button class="remove_downstream_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   							</div>\
   				</div>\
   	</div>');
   }
   $(document).on('click','.remove_downstream_block',function(){
   $(this).closest('.downstream').remove();
   });
   // end downstream
   // end accordion two
   // accordion three
   // question one
   function Type_accordionThree(){
   $('.type_questionone').append('<div class="type container mt-2 mb-1">\
   			<div class="row">\
   						<div class="col-md-6">\
   									<label class="form-label fs-6" for="vertical-landmark">Energy intensity type</label>\
   									<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Select from list" readonly="">\
   						</div>\
   						<div class="offset-md-1 col-md-2">\
   									<label class="form-label fs-6">Value</label>\
   									<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value10-sidebar" readonly="">\
   						</div>\
   						<div class="col-md-1 p-0">\
   									<label class="form-label fs-6" for="select2-basic">Unit</label>\
   									<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   						</div>\
   						<div class="col-md-2 mt-2 lh">\
   									<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="Type_accordionThree()"><i class="fa fa-plus"></i></button>\
   									<button class="remove_type_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   						</div>\
   			</div>\
   </div>');
   }
   $(document).on('click','.remove_type_block',function(){
   $(this).closest('.type').remove();
   });
   // end question one
   // question two
   /*   function Type_accordinquestiontwo(){
   $('.type_questiontwo').append('<div class="container type_two mt-2 mb-1">\
   				<div class="row">\
   							<div class="col-md-6">\
   										<label class="form-label fs-6" for="vertical-landmark">Type</label>\
   										<select class="select2 form-select">\
   													<option>Unit of product</option>\
   													<option>Production volume (such as metric tons, litres, or MWh)</option>\
   													<option>Size (such as m2 floor space)</option>\
   													<option>Number of full-time employees</option><option>Monetary units (such as revenue in INR)</option>\
   										</select>\
   							</div>\
   							<div class="offset-md-1 col-md-2">\
   										<label class="form-label fs-6">Value</label>\
   										<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value11-sidebar" readonly="">\
   							</div>\
   							<div class="offset-md-1 col-md-2 mt-2 lh p-0">\
   										<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="Type_accordinquestiontwo()"><i class="fa fa-plus"></i></button>\
   										<button class="remove_typetwo_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   							</div>\
   				</div>\
   	</div>');
   }
   $(document).on('click','.remove_typetwo_block',function(){
   $(this).closest('.type_two').remove();
   });*/
   // end question two
   // end accordion three
   // accordion four
   // question one
   function redesign_type(){
   $('.redesign_div').append('<div class="container redesign_type mt-2">\
   				<form>\
   							<div class="row">\
   										<div class="col-md-4">\
   													<label class="form-label fs-6" for="select2-basic">Type</label>\
   													<select class="select2 form-select">\
   																<option>Process redesign</option>\
   																<option>Conversion and retrofitting of equipment</option>\
   																<option>Changes in behaviour</option>\
   																<option>Operational changes</option>\
   													</select>\
   										</div>\
   										<div class="offset-md-3 col-md-2">\
   													<label class="form-label fs-6">Value</label>\
   													<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value14-sidebar" readonly="">\
   										</div>\
   										<div class="col-md-1 p-0">\
   													<label class="form-label fs-6">Unit</label>\
   													<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
   										</div>\
   										<div class="col-md-2 mt-2 lh">\
   													<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="redesign_type()"><i class="fa fa-plus"></i></button>\
   													<button class="remove_redesign_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   										</div>\
   							</div>\
   				</form>\
   	</div>');
   }
   $(document).on('click','.remove_redesign_block',function(){
   $(this).closest('.redesign_type').remove();
   });
   // end question two
   // end question one
   // end accordion four
</script>
<!-- end engery -->
<!-- emission -->
<script>
   // accordion one
   // question 1
   function emission_1(){
   	$('.emission_div').append('<div class="container source_one mt-2 pb-1">\
   					<form>\
   								<div class="row">\
   											<div class="col-md-3">\
   														<label class="form-label fs-6" for="select2-basic">Stationary combustion</label>\
   														<select class="select2 form-select">\
   																	<option>Select from List</option>\
   																	<option></option>\
   														</select>\
   											</div>\
   											<div class="offset-md-3 col-md-2">\
   														<label class="form-label fs-6">Value</label>\
   														<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">\
   											</div>\
   											<div class="col-md-2">\
   														<label class="form-label fs-6" for="select2-basic">Unit</label>\
   														<input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">\
   											</div>\
   											<div class="col-md-2 mt-2 lh">\
   														<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_1()"><i class="fa fa-plus"></i></button>\
   														<button class="remove_emission_1_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   											</div>\
   								</div>\
   					</form>\
   		</div>');
   }
   $(document).on('click','.remove_emission_1_block',function(){
   	$(this).closest('.source_one ').remove();
   });
   // 2
   function emission_2(){
   	$('.emission2_div').append('<div class="container source_two mt-2 pb-1">\
   					<form>\
   								<div class="row">\
   											<div class="col-md-3">\
   														<label class="form-label fs-6" for="select2-basic">Mobile combustion</label>\
   														<select class="select2 form-select">\
   																	<option>Select from List</option>\
   																	<option></option>\
   														</select>\
   											</div>\
   											<div class="offset-md-3 col-md-2">\
   														<label class="form-label fs-6">Value</label>\
   														<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" readonly="">\
   											</div>\
   											<div class="col-md-2">\
   														<label class="form-label fs-6" for="select2-basic">Unit</label>\
   														<input type="number" class="form-control total_number" placeholder="MT CO2 eq" readonly="">\
   											</div>\
   											<div class="col-md-2 mt-2 lh">\
   														<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_2()"><i class="fa fa-plus"></i></button>\
   														<button class="remove_emission_2_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   											</div>\
   								</div>\
   					</form>\
   		</div>');
   }
   $(document).on('click','.remove_emission_2_block',function(){
   	$(this).closest('.source_two ').remove();
   });
   // end question 1
   // END accordion one
   // accordion four
   // 1
   function emission_3(){
   	$('.emission3_div').append('<div class="container source_three mt-2 pb-1">\
   					<form>\
   								<div class="row">\
   											<div class="col-md-5">\
   														<label class="form-label fs-6" for="select2-basic">Type</label>\
   														<select class="select2 form-select">\
   																	<option>Products (such as metric tons of CO2 emissions per unit produced)</option>\
   																	<option>Services (such as metric tons of CO2 emissions per function or per service)</option>\
   																	<option>Sales (such as metric tons of CO2 emissions per sale)</option>\
   														</select>\
   											</div>\
   											<div class="offset-md-1 col-md-2">\
   														<label class="form-label fs-6">Value</label>\
   														<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-27" readonly="">\
   											</div>\
   											<div class="offset-md-2 col-md-2 mt-2 lh">\
   														<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_3()"><i class="fa fa-plus"></i></button>\
   														<button class="remove_emission_3_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   											</div>\
   								</div>\
   					</form>\
   		</div>');
   }
   $(document).on('click','.remove_emission_3_block',function(){
   	$(this).closest('.source_three ').remove();
   });
   // end 1
   // 2
   function emission_4(){
   	$('.emission4_div').append('<div class=" container source_four mt-2 pb-1">\
   					<form>\
   								<div class="row">\
   											<div class="col-md-5">\
   														<label class="form-label fs-6" for="select2-basic">Type</label>\
   														<select class="select2 form-select">\
   																	<option>Unit of product</option>\
   																	<option>Production volume (such as metric tons, litres, or MWh)</option>\
   																	<option>Size (such as m2 floor space)</option>\
   																	<option>Number of full-time employees</option>\
   																	<option>Monetary units (such as revenue in INR)</option>\
   														</select>\
   											</div>\
   											<div class="offset-md-1 col-md-2">\
   														<label class="form-label fs-6">Value</label>\
   														<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"   data-bs-toggle="modal" data-bs-target="#add-value-sidebar-28" readonly="">\
   											</div>\
   											<div class="offset-md-2 col-md-2 mt-2 lh">\
   														<button type="button" class="btn btn-dark btn-sm  waves-effect" onclick="emission_4()"><i class="fa fa-plus"></i></button>\
   														<button class="remove_emission_4_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
   											</div>\
   								</div>\
   					</form>\
   		</div>');
   }
   $(document).on('click','.remove_emission_4_block',function(){
   	$(this).closest('.source_four ').remove();
   });
   // end 2
   // end accordion four
   
   //mychart1
   var options = {
   	series: [{
   		name: 'Net Profit',
   		data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
   	}, {
   		name: 'Revenue',
   		data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
   	}],
   	chart: {
   		type: 'bar',
   		height: 450
   	},
   	plotOptions: {
   		bar: {
   			horizontal: true,
   			columnWidth: '55%',
   			borderRadius: 5
   		},
   	},
   	dataLabels: {
   		enabled: false
   	},
   	stroke: {
   		show: true,
   		width: 2,
   		colors: ['transparent']
   	},
   	xaxis: {
   		categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
   	},
   	colors:['#fbbd1f', '#36c6da'],
   	yaxis: {
   // title: {
   //   text: '$ (thousands)'
   // }
   },
   fill: {
   opacity: 1
   },
   tooltip: {
   y: {
   	formatter: function (val) {
   		return "$ " + val + " thousands"
   	}
   }
   }
   };
   var chart = new ApexCharts(document.querySelector("#mychart1"), options);
   chart.render();
   			// 	endmychart1
   			// 	circlechart1
   var options = {
   	series: [44, 55, 67, 83],
   	chart: {
   		height: 350,
   		type: "radialBar"
   	},
   	colors: ['#FF0000', '#fde924', '#24d9c5', '#49a8f4'],
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
   					fontSize: "0.7rem",
   					label: "Energy Consumption",
   					formatter: function (e) {
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
   	series: [100, 80, 50, 35],
   	labels: ["Electricty", "Heating", "Cooling", "Steam"]
   };
   var chart = new ApexCharts(document.querySelector("#circlechart1"), options);
   chart.render();
   // endcirclechart1
   
   // start circlechart2
   var options = {
   	series: [44, 55, 67, 83],
   	chart: {
   		height: 350,
   		type: "radialBar"
   	},
   	colors: ['#FF0000','#fde924', '#24d9c5', '#49a8f4'],
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
   					label: "Energy Sold",
   					formatter: function (e) {
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
   	series: [100,80, 50, 35],
   	labels: ["Electricty","Heating", "Cooling", "Steam"]
   };
   var chart = new ApexCharts(document.querySelector("#circlechart2"), options);
   chart.render();
   //  end circlechart2
   //gained-chart
   var options = {
   	series: [{
   		name: 'series1',
   		data: [28, 40, 36, 52, 38, 60, 55]
   	}],
   	colors: ['#28c76f'],
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
   	dataLabels: {
   		enabled: !1
   	},
   	stroke: {
   		curve: 'smooth'
   	},
   	fill: {
   		type: "gradient",
   		gradient: {
   			shadeIntensity: 1,
   			opacityFrom: 0.7,
   			opacityTo: 0.9,
   			stops: [0, 90, 100]
   		}
   	},
   	xaxis: {
   		labels: {
   			show: !1
   		},
   		axisBorder: {
   			show: !1
   		}
   	},
   	yaxis: {
   		labels: {
   			show: !1
   		},
   		axisBorder: {
   			show: !1
   		}
   	},
   	tooltip: {
   		x: {
   			show: !1
   		}
   	},
   };
   var chart = new ApexCharts(document.querySelector("#gained-chart"), options);
   chart.render();
   			// 	gained-chart
</script>
<!-- //gained-chart2 -->
<script>
   var options = {
   	series: [{
   		name: 'series1',
   		data: [28, 40, 36, 52, 38, 60, 55]
   	}],
   	colors: ['#28c76f'],
   	chart: {
   		height: 335,
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
   	dataLabels: {
   		enabled: !1
   	},
   	stroke: {
   		curve: 'smooth'
   	},
   	fill: {
   		type: "gradient",
   		gradient: {
   			shadeIntensity: 1,
   			opacityFrom: 0.7,
   			opacityTo: 0.9,
   			stops: [0, 90, 100]
   		}
   	},
   	xaxis: {
   		labels: {
   			show: !1
   		},
   		axisBorder: {
   			show: !1
   		}
   	},
   	yaxis: {
   		labels: {
   			show: !1
   		},
   		axisBorder: {
   			show: !1
   		}
   	},
   	tooltip: {
   		x: {
   			show: !1
   		}
   	},
   };
   var chart = new ApexCharts(document.querySelector("#gained-chart2"), options);
   chart.render();
</script>
<!-- 	gained-chart2 -->
<!-- downstream chart -->
<script>
   $(window).on("load", (function() {
   	"use strict";
   	var o = $(".chartjds"),
   	r = $(".flat-picker"),
   	t = $(".bar-chart-ex"),
   	a = $(".horizontal-bar-chart-ex"),
   	e = $(".line-chart-ex"),
   	i = $(".radar-chart-ex"),
   	l = $(".polar-area-chart-ex-up"),
   	n = $(".bubble-chart-ex"),
   	d = $(".doughnut-chart-ex"),
   	s = $(".scatter-chart-ex"),
   	c = $(".line-area-chart-ex"),
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
   	if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function() {
   		$(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
   	})), r.length) {
   		new Date;
   		r.each((function() {
   			$(this).flatpickr({
   				mode: "range",
   				defaultDate: ["2019-05-01", "2019-05-10"]
   			})
   		}))
   	}
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
   			labels: ["Purchased goods and services", "Capital goods", "Fuel and Energy related activities (Not used within the organisation)", "Upstream transportation and distribution", "Waste generated in operations", "Business travel", "Employee commuting", "Upstream leased assets"],
   			datasets: [{
   				label: "Population (millions)",
   				backgroundColor: [p, C, window.colors.solid.primary, "#299AFF", "#4F5D70", b, "#b01507", "#db8504"],
   				data: [23.5 ,21 ,19 , 17.5, 15, 13.5, 11, 9,],
   				borderWidth: 0
   			}]
   		}
   	});
   }));
</script>
<!-- end downstream chart -->
<!-- upstream chart -->
<script>
   $(window).on("load", (function() {
   	"use strict";
   	var l = $(".polar-area-chart-esx"),
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
   			labels: ["Downstream transportation and distribution", "Processing of sold products", "Use of sold products", "End-of-life treatment of sold products", "Downstream leased assets", "Franchises", "Investments", "Other downstream"],
   			datasets: [{
   				label: "Population (millions)",
   				backgroundColor: [p, C, window.colors.solid.primary, "#299AFF", "#4F5D70", b, "#b01507", "#db8504"],
   				data: [23.5 ,21 ,19 , 17.5, 15, 13.5, 11, 9,],
   				borderWidth: 0
   			}]
   		}
   	});
   }));
</script>
<!-- end upstream chart -->
<!-- line chartjs -->
<script>
   $(window).on("load", (function() {
   	"use strict";
   	var t = $(".bar-charst-ex"),
   	p = "#836AF9",
   	b = "#ffb100",
   	C = "#ffe802",
   	u = "#2c9aff",
   	h = "#84D0FF",
   	y = "#EDF1F4",
   	g = "rgba(0, 0, 0, 0.25)",
   	w = "#666ee8",
   	f = "#ff4961",
   	x = "#6e6b7b",
   	k = "rgba(200, 200, 200, 0.2)";
   	if (t.length) new Chart(t, {
   		type: "bar",
   		options: {
   			elements: {
   				rectangle: {
   					borderWidth: 2,
   					borderSkipped: "bottom"
   				}
   			},
   			responsive: !0,
   			maintainAspectRatio: !1,
   			responsiveAnimationDuration: 500,
   			legend: {
   				display: !1
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
   			scales: {
   				yAxes: [{
   					display: !0,
   					gridLines: {
   						color: k,
   						zeroLineColor: k
   					},
   					ticks: {
   						stepSize: 100,
   						min: 0,
   						max: 300,
   						fontColor: x
   					}
   				}]
   			}
   		},
   		data: {
   			labels: ["", "", "", "", "", "", "", "", "", "", ""],
   			datasets: [{
   				data: [275, 90, 190, 205, 125, 85, 55, 87, 127, 150, 230, 280, 190],
   				barThickness: 20,
   				backgroundColor: b,
   				borderColor: "transparent"
   			}]
   		}
   	});
   }));
</script>
<!-- end line charts -->
<!-- donut -->
<script>
   $((function() {
   	"use strict";
   	var e = $(".flat-picker"),
   	t = "rtl" === $("html").attr("data-textdirection"),
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
   		labels: ["Scope 1", "Scope 2", "Scope 3"],
   		series: [85, 50, 50],
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
<!-- end donut -->
<?= $this->endSection() ?>