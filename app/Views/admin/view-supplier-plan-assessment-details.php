<?php include('include/header.php'); ?>
	<?php include('include/menu.php');?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Supplier Plan Assessment Details</h1> </div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item active"><a href="#" onclick="addSupplierPlanAssessmentDetail()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Supplier Plan Assessment Detail</a> </li>
							</ol>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<?php 

if($session->get('success')){?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $session->get('success');?>
						</div>
						<?php } ?>
							<?php 

if($session->get('error')){?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $session->get('error');?>
								</div>
								<?php } ?>
									<div class="row">
										<!-- left column -->
										<div class="col-md-12">
											<!-- general form elements -->
											<div class="card card-primary">
												<div class="card-header">
													<h3 class="card-title">Supplier Plan Assessment List</h3> </div>
												<?php 



                        if(!empty($supplier_plan_assessment_details)){?>
													<table class="table table-bordered table-hover" id="datatables">
														<thead>
															<tr>
																<th>#</th>
																<th>Company</th>
																<th>Plan</th>
																<th>Assessment</th>
																<th>No. of Entry</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $s=1;
                                								foreach($supplier_plan_assessment_details as $d){?>
																<tr>
																	<td>
																		<?php echo $s;?>
																	</td>

																	<td>
																		<?php 
																		foreach($plans as $p){
																			if($p['id'] == $d['supplier_plan_id']){

																				$data_companySize = $p['company_size'];

																				$data_companyID = $p['company_id'];

																				echo $p['company_size'];
																			}
																		}
																		?>
																	</td>
																	<td>
																		<?php 
																		foreach($plans as $p){
																			if($p['id'] == $d['supplier_plan_id']){

																				$data_planId = $d['supplier_plan_id'];
																				echo $p['plan_name'];
																			}
																		}
																		?>
																	</td>
																	<td>
																		<?php 
																		foreach($assessment_list as $al){
																			if($al['id'] == $d['assessment_id']){
																				$data_assessmentId = $d['assessment_id'];
																				echo $al['assessment_name'];
																			}

																		}
																		//echo $d['factor_unit'];
																		?>
																	</td>
																	<td>
																		<?php 
																		echo $d['no_of_entry'];
																		?>
																	</td>
																	<td> <a class="btn btn-primary" href="javascript:void(0);" onclick="editSupplierPlanAssessmentDetails(this)" 
																	
																	data-planId='<?php echo $data_planId;?>' 

																	data-assessmentId='<?php echo $data_assessmentId;?>' 
																	
																	data-numberOfEntry='<?php echo $d['no_of_entry'];?>'

																	data_companySize='<?php echo $data_companySize;?>'  

																	data_companyID='<?php echo $data_companyID;?>'

																	data-supPlanAssId='<?php echo $d['id'];?>'

																	><i class="fa fa-pencil"></i></a> 
																	<a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteSupplierPlanAssessmentDetails/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a> </td>
																</tr>
																<?php $s++;}?>
														</tbody>
													</table>
													<?php } ?>
											</div>
										</div>
									</div>
				</div>
				<!-- /.container-fluid -->
			</section>
		</div>

<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form method="post" name="factor-form" id="factor-form" action="<?php echo base_url();?>/master/addSupplierPlanAssessmentDetails">
				<div class="modal-body">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Supplier Plan Assessment Detail</h3> </div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body">
						<input type="hidden"  id="supplier_plan_assessment_details"  name="supplier_plan_assessment_details" value ="true" >
							<div class="form-group">
								<label for="industrycategoryid">Company</label>
								<select name="industry_category_id" id="companySize" required="required" class="form-control" onchange="showOptions(this)">
									<option value="">Select Company</option>
									<?php 
									if(!empty($company_list)){
                        				foreach($company_list as $r){
									?>
										<option value="<?php echo $r['id'];?>">
											<?php echo $r['company_size'];?>
										</option>
									<?php  
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="companyplan">Supplier Plan</label>
								<select name="supplier_plan_id" id="supplier_plan_id" required="required" class="form-control select-text">
									<option value="">Select Supplier Plan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="assessment">Assessment</label>
								<select name="assessment_id" id="assessment_id" required="required" class="form-control">
									<option value="">Select Assessment</option>
									<?php 
									if(!empty($assessment_list)){
                        				foreach($assessment_list as $r){
									?>
										<option value="<?php echo $r['id'];?>">
											<?php echo $r['assessment_name'];?>
										</option>
									<?php  
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Number of entry</label>
								<input type="number" class="form-control" id="no_of_entry" placeholder="Number of entry" required="required" name="no_of_entry" min="0">
							</div>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form method="post" name="factor-form" id="factor-form" action="<?php echo base_url();?>/master/editSupplierPlanAssessmentDetails">
				<div class="modal-body">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Update Supplier Plan Assessment Details</h3> </div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body">
							<div class="form-group">
								<label for="industrycategoryid">Company</label>
								<select name="industry_category_id" id="edit_companySize" required="required" class="form-control" onchange="editShowOptions(this)">
									<option value="">Select Company</option>
									<?php 
									if(!empty($company_list)){
                        				foreach($company_list as $r){
									?>
										<option value="<?php echo $r['id'];?>">
											<?php echo $r['company_size'];?>
										</option>
									<?php  
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="companyplan">Supplier Plan</label>
								<select name="supplier_plan_id" id="edit_supplier_plan_id" required="required" class="form-control select-text">
									
								</select>
							</div>
							<div class="form-group">
								<label for="assessment">Assessment</label>
								<select name="assessment_id" id="edit_assessment_id" required="required" class="form-control">
									<option value="">Select Assessment</option>
									<?php 
									if(!empty($assessment_list)){
                        				foreach($assessment_list as $r){
									?>
										<option value="<?php echo $r['id'];?>">
											<?php echo $r['assessment_name'];?>
										</option>
									<?php  
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Number of entry</label>
								<input type="number" class="form-control" id="edit_no_of_entry" name="edit_no_of_entry" placeholder="Enter Industry Name" required="required" min="0">
							</div>

							<input type="hidden" id="supPlanAssId" name="supPlanAssId" value="">
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
    
<script type="text/javascript">
		function editSupplierPlanAssessmentDetails(that) {

			var planId = $(that).attr('data-planId');
			var assessmentId = $(that).attr('data-assessmentId');
			var numberOfEntry = $(that).attr('data-numberOfEntry');  
			var companySize = $(that).attr('data_companySize');  
			var data_companyID = $(that).attr('data_companyID');  
			var data_supPlanAssId = $(that).attr('data-supPlanAssId');

			$.ajax({
					url : '<?php echo base_url();?>/master/getSuplierPlane',
					type: 'POST',
					data : { company_id: data_companyID}
			}).done(function(response){
				$("#edit_supplier_plan_id").html(response);
				// here when i put the below line after '$('#edit_no_of_entry').val(numberOfEntry);' so not working properly because ajax take more time while then the event is triggred so i put this line in the ajax only after load of my select box and its working..
				// here we can use another way also by pasing plan_id and company_id but it requres more functionility
				$('#edit_supplier_plan_id').val(planId);
			});
			$('#edit_companySize').val(data_companyID);
			$('#edit_assessment_id').val(assessmentId);  
			$('#edit_no_of_entry').val(numberOfEntry); 
			$('#supPlanAssId').val(data_supPlanAssId); 
			$('#modal-edit').modal('show');
		}

		function addSupplierPlanAssessmentDetail() {
			$('#modal-add').modal('show');
		}

    function showOptions(s) {
      var company_id = s[s.selectedIndex].value;
      $.ajax({
              url : '<?php echo base_url();?>/master/getSuplierPlane',
              type: 'POST',
              data : { company_id: company_id}
      }).done(function(response){ 
        console.log(response);
		$("#supplier_plan_id").html(response);
      });
    }

	function editShowOptions(s) {
      var company_id = s[s.selectedIndex].value;
      $.ajax({
              url : '<?php echo base_url();?>/master/getSuplierPlane',
              type: 'POST',
              data : { company_id: company_id}
      }).done(function(response){ 
        console.log(response);
		$("#edit_supplier_plan_id").html(response);
      });
    }


	// function editSuplierPlanDetails() {
	// 	$('#modal-edit').modal('show');
	// }

</script>
		<?php include('include/footer.php');?>