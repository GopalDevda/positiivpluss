<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">
	<div class="text-end mb-1">
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
								0.00%</div>
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
									>Action</a
									>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content pt-1">
								<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
									<?php if($list){?> <p>
										Category Name : <b><?= $list[0]['indicator_category_name']?></b>
									</p>
									<p>
										Image : <img src="<?php echo base_url().'/public/uploads/sdg/'.$list[0]['image'];?>" style="width: 70px;">
									</p>
									<p><b>Description</b>
										<?= $list[0]['description']?>
									</p>
									<p><b>SDG</b><ul>
										<?php $sdg=$list[0]['sdg'];
										foreach($sdg as $key=>$gds){
											echo '<li>'.$gds['sdg_name'].'</li>';
										}
										?>
									</p></ul><?php }else{echo "No SDG Connected";} ?>
								</div>
								<!--   Emissions Div start -->
								<?php if($name=="Emissions"){?>
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
														class="accordion-collapse collapse show"
														aria-labelledby="headingOne"
														data-bs-parent="#accordionExample"
														>
														<!-- question 1 -->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CO2</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CH4</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">N2O</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">HFCs</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">PFCs</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">SF6</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">NF3</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">All Above</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="questiontwo_div bg-light"></div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Biogenic CO2 emissions in metric tons of CO2 equivalent?</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal1"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pb-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark
																						pt-0">
																						<p>Report biogenic emissions of CO2 from the combustion or biodegradation of biomass separately
																							from the gross direct (Scope 1) GHG emissions. Exclude biogenic emissions of other types of GHG
																							(such as CH and N O), and biogenic emissions of CO that occur in the life cycle of biomass other
																							than from combustion or biodegradation (such as GHG emissions from processing or transporting
																						biomass).</p>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">Base year for the calculation, if applicable, including:</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-4 p-0">
																		<h5>The rationale for choosing it.</h5>
																	</div>
																	<div class="col-md-6">
																		<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-4 p-0 mt-1">
																		<h5>Emission in the base year</h5>
																	</div>
																	<div class="col-md-3 mt-1">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-4 p-0 mt-1">
																		<h5>The context for any significant changesin emissions that triggered recalculations of base year emissions.</h5>
																	</div>
																	<div class="col-md-3 mt-1">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 4 -->
														<!-- question 5-->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Source of the emission factors and the global warming potential (GWP) rates used, or a reference to the GWP source?</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">Consolidation approach for emissions; whether equity share, financial control, or operational control.</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal2"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pt-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark pt-0">
																						<p class="text-dark">Methodologies used to calculate the direct (Scope I) GHG emissions can include:</p>
																						<ul>
																							<li>Direct measurement of energy source consumed (coal, gas) or losses (refills) of cooling systems and conversion to GHG (CO2 equivalents).</li>
																							<li>Mass balance calculations.</li>
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
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionOne','accordionTwo')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal3"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">If applicable, what is the gross market-based energy indirect (Scope 2) GHG emissions in metric tons of CO2 equivalent?</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#questiontwoModal"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="questiontwoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pt-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark pt-0">
																						<p>The market-based method reflects emissions from the electricity that an organization has purposefully chosen (or its lack of choice). The market-based method calculation also includes the use of a residual mix, if the organization does not have specified emissions intensity from its contractual instruments. This helps prevent double counting between consumers’ market-based method figures. If a residual mix is unavailable, the organization can disclose this and use grid-average emission factors as a proxy (which can mean that the location-based and market-based are the same numbers until information on the residual mix is available).</p>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What are the gases included in the calculation?</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CO2</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CH4</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">N2O</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">HFCs</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">PFCs</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">SF6</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">NF3</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">All Above</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="questiontwo_div bg-light"></div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#questionfourModal"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="questionfourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pt-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark pt-0">
																						<p>For recalculations of prior year emissions, the organization can follow the approach in the ‘GHG Protocol Corporate Standard’.</p>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-4 p-0">
																		<h5>The rationale for choosing it.</h5>
																	</div>
																	<div class="col-md-6">
																		<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-4 p-0 mt-1">
																		<h5>Emission in the base year</h5>
																	</div>
																	<div class="col-md-3 mt-1">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-4 p-0 mt-1">
																		<h5>The context for any significant changesin emissions that triggered recalculations of base year emissions.</h5>
																	</div>
																	<div class="col-md-3 mt-1">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 4 -->
														<!-- question 5-->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the source of the emission factors and the global warming potential (GWP) rates used, or a reference to the GWP source?</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">Consolidation approach for emissions; whether equity share, financial control, or operational control.</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
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
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">Standards, methodologies, assumptions, and/or calculation tools used.</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionTwo','accordionThree')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question7 -->
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
															<div class="total_fuel p-1 bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionThree','accordionFour')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 1-->
														<!-- question 2 -->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel p-1 bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">If available, what are the gases included in the calculation?</p>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CO2</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">CH4</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">N2O</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">HFCs</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">PFCs</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">SF6</label>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">NF3</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">All Above</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="questiontwo_div bg-light"></div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionThree','accordionFour')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 2 -->
														<!-- question 3 -->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel p-1 bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal5"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pb-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark ">
																						<p class="text-dark">Report biogenic emissions of CO2 from the combustion or biodegradation of biomass separately from the gross direct (Scope 1) GHG emissions. Exclude biogenic emissions of other types of GHG(such as CH and N O), and biogenic emissions of CO that occur in the life cycle of biomass other than from combustion or biodegradation (such as GHG emissions from processing or transporting biomass).</p>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>KG CO2 eq</option>
																			<option>T CO2 eq</option>
																			<option>MT CO2 eq</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionThree','accordionFour')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 3 -->
														<!-- question 4 -->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel p-1 bg-dark text-white">
																<div class="row">
																	<div class="col-md-11">
																		<p class="mb-0 d-inline-block ">What is the Gross direct (Scope 1) GHG emissions in metric tons of CO2 equivalent of the organisation</p>
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal6"></i>
																		</span>
																		<!-- Modal -->
																		<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<div class="modal-header bg-white pb-0">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body text-dark ">
																						<p class="text-dark">Other indirect (Scope 3) GHG emissions are a consequence of an organization’s activities, but occur from sources not owned or controlled by the organization. Other indirect (Scope 3) GHG emissions include both upstream and downstream emissions. Some examples of Scope 3 activities include extracting and producing purchased materials; transporting purchased fuels in vehicles not owned or controlled by the organization; and the end use of products and services. Other indirect emissions can also come from the decomposing of the organization’s waste. Process-related emissions during the manufacture of purchased goods and fugitive emissions in facilities not owned by the organization can also produce indirect emissions.</p>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-1 p-0">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<!-- upstream -->
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<h5>Upstream Activities</h5>
																	</div>
																	<div class="col-md-4">
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
																	<div class="col-md-2">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>Barrel of oil</option>
																			<option>Liters</option>
																			<option>Calorie</option>
																		</select>
																	</div>
																	<div class="col-md-1">
																		<span>
																			<i class="fa-solid fa-circle-exclamation fs-6" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal6"></i>
																		</span>
																		<button type="button" class="btn btn-outline-primary waves-effect" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tooltip on top">Tooltip on top </button>
																	</div>
																	<div class="col-md-4">
																		<button type="button" class="btn btn-dark waves-effect mb-2" onclick="upstream_question()"><i class="fa fa-plus"></i></button>
																	</div>
																</div>
															</div>
															<div class="upstream_activities bg-light"></div>
															<!-- end upstream -->
															<!-- downstream -->
															<div class=" container mt-2">
																<div class="row">
																	<div class="col-md-3">
																		<h5>Downstream Activities</h5>
																	</div>
																	<div class="col-md-4">
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
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>Barrel of oil</option>
																			<option>Liters</option>
																			<option>Calorie</option>
																		</select>
																	</div>
																	<div class="col-md-4">
																		<button type="button" class="btn btn-dark waves-effect mb-2" onclick="downstream_question()"><i class="fa fa-plus"></i></button>
																	</div>
																</div>
															</div>
															<div class="downstream_activities bg-light"></div>
															<!-- end downstream -->
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-12 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="admin_btn mt-1">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionThree','accordionFour')">
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
															<div class="total_fuel p-1 bg-dark text-white">
																<p class="mb-0">Amount of reductions in energy consumption achieved as a direct result of conservation and efficiency initiatives</p>
															</div>
															<div class=" container pt-2">
																<div class="row">
																	<div class="col-md-4">
																		<select class="select2 form-select">
																			<option>Process redesign</option>
																			<option>conversion and retrofitting of equipment</option>
																			<option>changes in behaviour</option>
																			<option>changes in behaviour</option>
																		</select>
																	</div>
																	<div class="col-md-4">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>Barrel of oil</option>
																			<option>Liters</option>
																			<option>Calorie</option>
																		</select>
																	</div>
																	<div class="col-md-2">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																	<div class="col-md-4 pt-1">
																		<button type="button" class="btn btn-dark waves-effect mb-2" onclick="accordionfour()"><i class="fa fa-plus"></i></button>
																	</div>
																</div>
															</div>
															<div class="accordionfour_question bg-light"></div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionFour','accordionFive')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 1-->
														<!-- question 2 -->
														<div class="accordion-body p-0 bg-light">
															<div class="p-1 bg-dark text-white">
																<p class="mb-0">Types of energy included in the reductions</p>
															</div>
															<div class=" container pt-2">
																<div class="row">
																	<div class="col-md-10">
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">Fuel</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">Electricity</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">Heating</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">Cooling</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">Steam</label>
																		</div>
																		<div class="form-check form-check-inline mb-1">
																			<input class="form-check-input fs-4" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
																			<label class="form-check-label fs-4" for="inlineCheckbox1">All Above</label>
																		</div>
																	</div>
																	<div class="col-md-2">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionFour','accordionFive')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 2 -->
														<!-- question 2 -->
														<div class="accordion-body p-0 bg-light">
															<div class="p-1 bg-dark text-white">
																<p class="mb-0">Basis for calculating reductions in energy consumption</p>
															</div>
															<div class=" container pt-2">
																<div class="row">
																	<div class="col-md-5">
																		<div class="mb-3 row">
																			<label class="col-sm-2 col-form-label fs-5 p-0">Base year</label>
																			<div class="col-sm-10">
																				<input type="text" class="form-control" placeholder="Enter the value">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-5">
																		<div class="mb-3 row">
																			<label class="col-sm-2 col-form-label fs-5 p-0">Baseline</label>
																			<div class="col-sm-10">
																				<input type="text" class="form-control" placeholder="Enter the value">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-2">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionFour','accordionFive')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 2 -->
														<!-- question 3 -->
														<div class="accordion-body p-0 bg-light">
															<div class="p-1 bg-dark text-white">
																<p class="mb-0">State the standards, methodologies, assumptions, and/or calculation tools used.</p>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-10 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-2 mt-2">
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 3 -->
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
															<div class="total_fuel p-1 bg-dark text-white">
																<p class="mb-0">Reductions in energy requirements of sold products and services achieved during the reporting period</p>
															</div>
															<div class=" container pt-2">
																<div class="row">
																	<div class="col-md-5">
																		<h4>Reductions in energy requirements</h4>
																	</div>
																	<div class="col-md-3">
																		<input type="text" class="form-control" placeholder="Enter the value">
																	</div>
																	<div class="col-md-2">
																		<select class="select2 form-select">
																			<option>Barrel of oil</option>
																			<option>Liters</option>
																			<option>Calorie</option>
																		</select>
																	</div>
																	<div class="col-md-2">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionFive','accordionSix')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 1-->
														<!-- question 2 -->
														<div class="accordion-body p-0 bg-light">
															<div class="p-1 bg-dark text-white">
																<p class="mb-0">Basis for calculating reductions in energy consumption</p>
															</div>
															<div class=" container pt-2">
																<div class="row">
																	<div class="col-md-5">
																		<div class="mb-3 row">
																			<label class="col-sm-2 col-form-label fs-5 p-0">Base year</label>
																			<div class="col-sm-10">
																				<input type="text" class="form-control" placeholder="Enter the value">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-5">
																		<div class="mb-3 row">
																			<label class="col-sm-2 col-form-label fs-5 p-0">Baseline</label>
																			<div class="col-sm-10">
																				<input type="text" class="form-control" placeholder="Enter the value">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-2">
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																		<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																	</div>
																</div>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-12 mb-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="admin_btn mt-2">
																			<input type="button" class="btn btn-gradient-dark btn-sm float-end mb-1" value="Next" onclick="getNext('accordionFive','accordionSix')">
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 2 -->
														<!-- question 3 -->
														<div class="accordion-body p-0 bg-light">
															<div class="p-1 bg-dark text-white">
																<p class="mb-0">State the standards, methodologies, assumptions, and/or calculation tools used.</p>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-10 mb-1 mt-1">
																			<label class="form-label" for="exampleFormControlTextarea1">Comment(Optional)</label>
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-2 mt-2">
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
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
															<div class="total_fuel p-1 bg-dark text-white">
																<p class="mb-0">Does the entity have any sites / facilities identified as designated consumers (DCs) under the Performance, Achieve and Trade (PAT) Scheme of the Government of India? <br>
																	(Yes/No) If yes, disclose whether targets set under the PAT scheme have been achieved. In case targets have not been achieved, provide the remedial
																	action taken, if any.
																</p>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-10 mb-1 mt-2">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-2 mt-2">
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-1 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 1-->
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
															<div class="total_fuel p-1 bg-dark text-white">
																<p class="mb-0">Does the entity have any sites / facilities identified as designated consumers (DCs) under the Performance, Achieve and Trade (PAT) Scheme of the Government of India? <br>
																	(Yes/No) If yes, disclose whether targets set under the PAT scheme have been achieved. In case targets have not been achieved, provide the remedial
																	action taken, if any.
																</p>
															</div>
															<div class="container bg-light">
																<form>
																	<div class="row">
																		<div class="col-md-10 mb-1 mt-2">
																			<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Your Comment..."></textarea>
																		</div>
																		<div class="col-md-2 mt-2">
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-user-plus"></i></button>
																			<button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" type="button"><i class="fa-solid fa-eye"></i></button>
																		</div>
																		<div class="col-md-10 mb-2">
																			<label for="formFile" class="form-label">Attachment</label>
																			<input class="form-control" type="file" id="formFile">
																		</div>
																		<div class="col-md-2 mb-1 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect " data-bs-toggle="modal" data-bs-target="#default">Action</button>
																		</div>
																		<div class="offset-10 col-md-2 demo-inline-spacing">
																			<button type="button" class="btn btn-primary waves-effect mb-1 mt-0">Submit</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<!-- end question 1-->
													</div>
												</div>
												<!-- accordion 7 end -->
											</div>
										</div>
									</div>
								</div><!--   Emissions Div end -->
								
								<?php }elseif($name=="Energy"){
								 foreach($list_indicat as $lidis){if($lidis['indicator_id']=='17'){  
								   
								?>
								
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
													Clause 1:<?= $lidis['disclosure_name'] ?>
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
																		<p class="mb-0 d-inline-block "><?= $lidis['sub_classification_name'] ?></p>
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
															<div class=" container mt-2 pb-1">
																<form>
																	<div class="row">
																		<div class="col-md-3">
																			<label class="form-label fs-6" for="select2-basic">Source list</label>
																			<select class="select2 form-select">
																				<option>Non-Renewable Sources</option>
																				<option>Renewable Sources</option>
																			</select>
																		</div>
																		<div class="col-md-2">
																			<label class="form-label fs-6" for="select2-basic">Energy list</label>
																			<select class="select2 form-select">
																				<option>Purchased energy</option>
																				<option>Generated energy</option>
																				<option>Purchased energy</option>
																				<option>Generated energy</option>
																			</select>
																		</div>
																		<div class="col-md-2">
																			<label class="form-label fs-6" for="select2-basic">Type</label>
																			<select class="select2 form-select">
																				<option>Coal</option>
																				<option>Petroleum</option>
																				<option>Natural Gas</option>
																				<option>Other</option>
																				<option>Hydropower</option>
																				<option>Solar energy</option>
																				<option>Wind energy</option>
																				<option>Biogas</option>
																				<option>Others</option>
																			</select>
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
														</div>
														<!-- end question 1-->
													
													</div>
												</div>
												<!-- end accordion 1 -->
											
											</div>
										</div>
									</div>
								</div>
								<?php }} ?>
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
															<div class=" container mt-2 pb-1">
																<form>
																	<div class="row">
																		<div class="col-md-3">
																			<label class="form-label fs-6" for="select2-basic">Source list</label>
																			<select class="select2 form-select">
																				<option>Non-Renewable Sources</option>
																				<option>Renewable Sources</option>
																			</select>
																		</div>
																		<div class="col-md-2">
																			<label class="form-label fs-6" for="select2-basic">Energy list</label>
																			<select class="select2 form-select">
																				<option>Purchased energy</option>
																				<option>Generated energy</option>
																				<option>Purchased energy</option>
																				<option>Generated energy</option>
																			</select>
																		</div>
																		<div class="col-md-2">
																			<label class="form-label fs-6" for="select2-basic">Type</label>
																			<select class="select2 form-select">
																				<option>Coal</option>
																				<option>Petroleum</option>
																				<option>Natural Gas</option>
																				<option>Other</option>
																				<option>Hydropower</option>
																				<option>Solar energy</option>
																				<option>Wind energy</option>
																				<option>Biogas</option>
																				<option>Others</option>
																			</select>
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
														</div>
														<!-- end question 1-->
														<!-- question 2 -->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel bg-dark text-white">
																<div class="row">
																	<div class="col-md-10">
																		<p class="mb-0 d-inline-block ">How is the energy consumed in the organisation? , in joules or multiples.</p>
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
																	<div class="col-md-3">
																		<label class="form-label fs-6" for="vertical-landmark">Consumed energy list</label>
																		<select class="select2 form-select">
																			<option>Electricity consumption</option>
																			<option>Heating consumption</option>
																			<option>Cooling consumption</option>
																			<option>Steam consumption</option>
																		</select>
																	</div>
																	<div class="offset-md-4 col-md-2">
																		<label class="form-label fs-6">Value</label>
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
																	<div class="col-md-1 p-0">
																		<label class="form-label fs-6">Unit</label>
																		<input type="number" class="form-control total_number" placeholder="Joules" readonly="">
																	</div>
																	<div class="col-md-2 mt-2 lh">
																		<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivtwo()"><i class="fa fa-plus"></i></button>
																	</div>
																</div>
															</div>
															<div class="questiontwo_div bg-light"></div>
															<div class="container bg-light mt-3">
																<form>
																	<div class="row">
																		<div class="col-md-7 mb-1 mt-1 text-dark">
																			<p>The total energy consumed in the organization.</p>
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
														<!-- end question 2-->
														<!-- question 3 -->
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
																	<div class="col-md-3">
																		<label class="form-label fs-6" for="vertical-landmark">Sold energy list</label>
																		<select class="select2 form-select">
																			<option>Electricity sold</option>
																			<option>Heating sold</option>
																			<option>Cooling sold</option>
																			<option>Steam sold</option>
																		</select>
																	</div>
																	<div class="offset-md-4 col-md-2">
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
																			<p>The total energy sold in the organization.</p>
																		</div>
																		<div class="col-md-2">
																			<label class="form-label fs-6">Total Value</label>
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
														<!-- end question 3-->
														<!-- question 4-->
														<div class="accordion-body p-0 bg-light">
															<div class="total_fuel bg-dark text-white">
																<div class="row">
																	<div class="col-md-10">
																		<p class="mb-0 d-inline-block ">Total energy consumption in the organisation, in joules or multiples.</p>
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
																		<label class="form-label fs-6" for="vertical-landmark">Type</label>
																		<select class="select2 form-select">
																			<option>Products (such as energy consumed per unit produced)</option>
																			<option>Services (such as energy consumed per function or per service)</option>
																			<option>Sales (such as energy consumed per monetary unit of sales)</option>
																			<option>Other, Please specify</option>
																		</select>
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
																		</div>
																	<!-- end value 10 Sidebar -->
																	<div class="offset-md-1 col-md-2 mt-2 lh p-0">
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
														<div class="accordion-body p-0 bg-light">
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
																			<option>Number of full-time employees</option><option>Monetary units (such as revenue in INR)</option>
																		</select>
																	</div>
																	<div class="offset-md-1 col-md-2">
																		<label class="form-label fs-6">Value</label>
																		<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value11-sidebar" readonly="">
																	</div>
																	<!-- Value 11 Sidebar -->
																	<div class="modal modal-slide-in fade" id="add-value11-sidebar" aria-hidden="true">
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
																		</div>
																	<!-- end value 11 Sidebar -->
																	<div class="offset-md-1 col-md-2 mt-2 lh p-0">
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
														</div>
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
																							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
								<?php } else{?>
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
								<?php }?>
								<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
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
								<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
									<p>
										Candy canes halvah biscuit muffin dessert biscuit marzipan. Gummi bears marzipan bonbon chupa chups
										biscuit lollipop topping. Muffin sweet apple pie sweet roll jujubes chocolate. Topping cake chupa chups
										chocolate bar tiramisu tart sweet roll chocolate cake.
									</p>
									<p>
										Jelly beans caramels muffin wafer sesame snaps chupa chups chocolate cake pastry halvah. Sugar plum
										cotton candy macaroon tootsie roll topping. Liquorice topping chocolate cake tart tootsie roll danish
										bear claw. Donut candy canes marshmallow. Wafer cookie apple pie.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Filled Tabs ends -->
			</div>
		</section>
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
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
<script>
	// accordion one
// question 1
function addSourceDiv(){
	$('.source_div').append('<div class="container source_form mt-2">\
			<form>\
				<div class="row">\
					<div class="col-md-3">\
						<label class="form-label fs-6" for="select2-basic">Source list</label>\
						<select class="select2 form-select">\
							<option>Non-Renewable Sources</option>\
							<option>Renewable Sources</option>\
						</select>\
					</div>\
					<div class="col-md-2">\
						<label class="form-label fs-6" for="select2-basic">Energy list</label>\
						<select class="select2 form-select">\
							<option>Purchased energy</option>\
							<option>Generated energy</option>\
							<option>Purchased energy</option>\
							<option>Generated energy</option>\
						</select>\
					</div>\
					<div class="col-md-2">\
						<label class="form-label fs-6" for="select2-basic">Type</label>\
						<select class="select2 form-select">\
							<option>Coal</option>\
							<option>Petroleum</option>\
							<option>Natural Gas</option>\
							<option>Other</option>\
							<option>Hydropower</option>\
							<option>Solar energy</option>\
							<option>Wind energy</option>\
							<option>Biogas</option>\
							<option>Others</option>\
						</select>\
					</div>\
					<div class="col-md-2">\
						<label class="form-label fs-6">Value</label>\
						<input type="number" id="vertical-landmark" class="form-control total_number" data-bs-toggle="modal" data-bs-target="#add-value-sidebar-1" placeholder="Value" readonly="">\
					</div>\
					<div class="col-md-1 p-0">\
						<label class="form-label fs-6">Unit</label>\
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
// question 2
function addquestionDivtwo(){
	$('.questiontwo_div').append('<div class="questiontwo container mt-2">\
			<div class="row">\
				<div class="col-md-3">\
					<label class="form-label fs-6" for="vertical-landmark">Consumed energy list</label>\
					<select class="select2 form-select">\
						<option>Electricity consumption</option>\
						<option>Heating consumption</option>\
						<option>Cooling consumption</option>\
						<option>Steam consumption</option>\
					</select>\
				</div>\
				<div class="offset-md-4 col-md-2">\
					<label class="form-label fs-6">Value</label>\
					<input type="number" id="vertical-landmark" class="form-control total_number" data-bs-toggle="modal" data-bs-target="#add-value2-sidebar" placeholder="Value" readonly="">\
				</div>\
				<div class="col-md-1 p-0">\
					<label class="form-label fs-6" for="select2-basic">Unit</label>\
					<input type="number" class="form-control total_number" placeholder="Joules" readonly="">\
				</div>\
				<div class="col-md-2 mt-2 lh">\
					<button type="button" class="btn btn-sm btn-dark waves-effect" onclick="addquestionDivtwo()"><i class="fa fa-plus"></i></button>\
					<button class="remove_questiontwo_block btn btn-sm btn-danger waves-effect"><i class="fa-solid fa-xmark"></i></button>\
				</div>\
			</div>\
		</div>');
}
$(document).on('click','.remove_questiontwo_block',function(){
	$(this).closest('.questiontwo').remove();
});
// end question 2
// question 3
function addquestionDivthree(){
	$('.questionthree_div').append('<div class="container questionthree mt-2">\
			<div class="row">\
				<div class="col-md-3">\
					<label class="form-label fs-6" for="vertical-landmark">Sold energy list</label>\
					<select class="select2 form-select">\
						<option>Electricity sold</option>\
						<option>Heating sold</option>\
						<option>Cooling sold</option>\
						<option>Steam sold</option>\
					</select>\
				</div>\
				<div class="offset-md-4 col-md-2">\
					<label class="form-label fs-6" for="vertical-landmark">Value</label>\
					<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value" data-bs-toggle="modal" data-bs-target="#add-value3-sidebar" readonly="">\
				</div>\
				<div class="col-md-1 p-0">\
					<label class="form-label fs-6" for="select2-basic">Unit</label>\
					<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Joules" readonly="">\
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
	$('.type_questionone').append('<div class="container type mt-2">\
			<div class="row">\
				<div class="col-md-6">\
					<label class="form-label fs-6" for="vertical-landmark">Type</label>\
					<select class="select2 form-select">\
						<option>Products (such as energy consumed per unit produced)</option>\
						<option>Services (such as energy consumed per function or per service)</option>\
						<option>Sales (such as energy consumed per monetary unit of sales)</option>\
						<option>Other, Please specify</option>\
					</select>\
				</div>\
				<div class="offset-md-1 col-md-2">\
					<label class="form-label fs-6">Value</label>\
					<input type="number" id="vertical-landmark" class="form-control total_number" placeholder="Value"  data-bs-toggle="modal" data-bs-target="#add-value10-sidebar" readonly="">\
				</div>\
				<div class="offset-md-1 col-md-2 mt-2 lh p-0">\
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
function Type_accordinquestiontwo(){
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
});
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
// end accordion one
</script>
<?= $this->endSection() ?>