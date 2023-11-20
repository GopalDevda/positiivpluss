 <?php if ($name == "Emissions") { ?>
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                              <div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                                                                 <div class="modal-dialog sidebar-lg ">
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
                                                                                       <div class="modal-body flex-grow-1 overflow-auto bg-light pt-1">
                                                                                          <form>
                                                                                             <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                   <h6 class="text-center">Start Date</h6>
                                                                                                   <div class="row mb-1">
                                                                                                      <div class="col-md-4">
                                                                                                         <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                      </div>
                                                                                                      <div class="col-md-8">
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                   <input class=" form-control" type="file" aria-invalid="false" name="attch_file">
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
                                                                                                   <input class=" form-control" type="file" aria-invalid="false" name="attch_file">
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
                                                                                                   <input class=" form-control" type="file" aria-invalid="false" name="attch_file">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                   <input class=" form-control" type="file" aria-invalid="false" name="attch_file">
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
                                                                                    <div class="modal-body flex-grow-1 bg-light pt-1 overflow-auto">
                                                                                       <form>
                                                                                          <div class="row">
                                                                                             <div class="col-md-6">
                                                                                                <h6 class="text-center">Start Date</h6>
                                                                                                <div class="row mb-1">
                                                                                                   <div class="col-md-4">
                                                                                                      <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                   </div>
                                                                                                   <div class="col-md-8">
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                <input class=" form-control" type="file" aria-invalid="false" name="attch_file">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                <input class=" form-control" type="file" aria-invalid="false"name="attch_file">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                <input class=" form-control" type="file" aria-invalid="false"name="attch_file">
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
                                                                                                   <input class=" form-control" type="file" id="image" name="attch_file" aria-invalid="false">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                                       <div class="modal-body flex-grow-1 bg-light pt-1 over">
                                                                                          <form>
                                                                                             <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                   <h6 class="text-center">Start Date</h6>
                                                                                                   <div class="row mb-1">
                                                                                                      <div class="col-md-4">
                                                                                                         <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                      </div>
                                                                                                      <div class="col-md-8">
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                    <div class="modal-body flex-grow-1 bg-light pt-1 overflow-auto">
                                                                                       <form>
                                                                                          <div class="row">
                                                                                             <div class="col-md-6">
                                                                                                <h6 class="text-center">Start Date</h6>
                                                                                                <div class="row mb-1">
                                                                                                   <div class="col-md-4">
                                                                                                      <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                   </div>
                                                                                                   <div class="col-md-8">
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                    <div class="modal-body flex-grow-1 bg-light pt-1 overflow-auto">
                                                                                       <form>
                                                                                          <div class="row">
                                                                                             <div class="col-md-6">
                                                                                                <h6 class="text-center">Start Date</h6>
                                                                                                <div class="row mb-1">
                                                                                                   <div class="col-md-4">
                                                                                                      <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                   </div>
                                                                                                   <div class="col-md-8">
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                    <div class="modal-body flex-grow-1 bg-light pt-1 overflow-auto">
                                                                                       <form>
                                                                                          <div class="row">
                                                                                             <div class="col-md-6">
                                                                                                <h6 class="text-center">Start Date</h6>
                                                                                                <div class="row mb-1">
                                                                                                   <div class="col-md-4">
                                                                                                      <label for="exampleFormControlInput1" class="form-label fs-6">Period</label>
                                                                                                   </div>
                                                                                                   <div class="col-md-8">
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                     <div class="container mt-2">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                         <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                      <input id="smallInput" class="form-control form-control-sm fs-6" type="date" min="<?= $mindate?>" max="<?= $maxdate?>" placeholder="calender">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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
                                                                                                   <input type="date" min="<?= $mindate?>" max="<?= $maxdate?>" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
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