<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.bubble.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-quill-editor.min.css')?>">



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- add Document modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Create Policy</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" name="doc-form" method="post" action="<?php echo base_url()?>/Brand/addPolicy" enctype='multipart/form-data'>
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Document Name</label>
                        <input type="text" placeholder="Enter Company Name" name="policy_name" required="" maxlength = "20" class="form-control">
                     </div>
                  </div>
                  
                  <div class="col-md-6 col-6">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Choose Document Action</label>
                        <select class="form-control select2" name="action_id"  id="action_id" onchange="showdocument(this);" >
                            <option value="0">Select action </option>
                            <option value="1"> Upload </option>
                        
                        </select>
                     </div>
                  </div>
                  <div class="doc_upload" style="display:none;" id="document_upload">
                    <label class="form-label" for="city-column">Choose Document</label>
                    <input type="file" class="form-control" id="customFile" name="file" />
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
<!-- end Document modal -->
<!-- edit policy modal -->

<!-- end policy modal -->
<!-- view poplicy modal -->
<div class="modal fade text-start" id="defaulttt" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">View Policy</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" name="doc-form" method="post" action="<?php echo base_url()?>/Brand/acknowledgePolicy" enctype='multipart/form-data'>
               <div class="row">
                     
                        
                        
                        <input type="hidden" id='p_v_id' name='id'>
                    
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
    
                        <div class='view-policy-details'></div>
                           
                     </div>
                  </div>
               </div>
         </div>
         <?php 
         if(session()->supplier_info['role'] == 11){?>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Acknowledge</button>
         </div>
         <?php } ?>
         </form>
      </div>
   </div>
</div>
<!-- end policy modal -->

<!-- Document Connect Modal -->
<div class="modal fade text-start" id="docConnectePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Connect Document</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="create_doc_form connect_doc_form">
               <form action="<?php echo base_url() ?>/supplier/documentConnectSubmit" method="post">
                  <input type="hidden" id="document_id" name="document_id"/>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Assessments</label>
                            <select class="form-control select2" id="assessment_id" name="assessment_id" onchange="getIndicatorByAssessment(this)">
                                 <option value="0">Select Assessment</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Select Indicator</label>
                            <select class="form-control select2" id="indicator_id" name="indicator_id" onchange="getQuestionByIndicatorAjax(this);">
                                <option value="0">Select Indicator</option>
                                
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12" id="row_date" style="display:none">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Select Assess Date</label>
                            <select class="form-control select2" id="DATE" name="DATE" >
                                <option value="0">Select Assessment Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12" id="row_dim" style="display:none">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Select Ghg</label>
                            <select class="form-control select2" id="TYPE" name="TYPE" onchange="getQuestionByGHGAjax(this);">
                                <option value="0">Select GHG</option>
                            </select>
                        </div>
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
<!-- End Document Connect Modal -->

<!-- Edit Document -->
<div class="modal fade text-start" id="docEditePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Document</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form name="doc-form" method="post" action="<?php echo base_url()?>/supplier/editDocument" enctype='multipart/form-data'>
            <input type="hidden" name="id" id="sid">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="last-name-column">Document Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="doc_name" required="required" id="doc_name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="last-name-column">Type</label>
                        <select name="document_type_id" id="document_type_id" class="form-control select2" required="required">
                            <option value="">Select Document Type </option>
                            <?php
                            if(!empty($document))
                            foreach($document as $d){?>
                            <option value="<?php echo $d['id'];?>"><?php echo $d['document_type_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="last-name-column">Choose File</label>
                        <input type="file" class="form-control" id="customFile" name="file" />
                        <a href="" id="imgDiv" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
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
<!-- End Edit Document -->
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
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Policy</h2>
                    <div class="breadcrumb-wrapper">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                	<button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#">
                    <i class="fa-solid fa-download"></i> Download All
                    </button>
                    <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
                    <i class="fa-solid fa-plus"></i> Create Policy
                    </button>
                    
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
          <strong>Success!</strong> <?php echo $session->get('error');?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
    <div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section class="app-user-list">
    <!-- list and filter start -->
    <div class="card">
        <div class="card-body card-datatable table-responsive pt-0">
            <a href="<?= base_url('/Brand/editPolicy/')?>/1">+</a>
			<table class="table table-bordered" id="example">
				<thead class="table-light">
					<tr>
						<th>#</th>
						<th>Policy Name</th>
						<th>Approved On</th>
						<th>SLA</th>
						<th>Version</th>
						<th>Owner</th>
						<th>Created On</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                    foreach($policy as $key => $row){
                        ?>
                        <tr>
						<td><?= ++$key;?></td>
						<td><?= $row['policy_name']?></td>
						<td>
                        <?php if($row['policy_status']==0){?>    
                        <button class='btn approve_btn' onclick="return confirm('Are you sure you want to approve this item?');" data-id="<?= $row['id']?>" data-version="<?= $row['versions']?>"><span class="badge bg-success">Approve</span></button>
                    <?php 
                    }
                    if($row['policy_status']==2){
                        if(session()->supplier_info['role'] == 11){?>    
                        <button class='btn ' onclick="return confirm('You can not approve this item only admin can');" ><span class="badge bg-success">Pending</span></button>
                        <?php } else{?>
                        <button class='btn approve_btn' onclick="return confirm('Are you sure you want to approve this item?');" data-id="<?= $row['id']?>" data-version="<?= $row['versions']?>"><span class="badge bg-success">Pending</span></button>

                    <?php 
                    }
                }
                    else{?>
                        <?= $row['approved_on']?> <?php   }
                        if($row['created_by'] != 0){?>
                        <div class='text-danger'>created by you </div>
                        <?php }?>
                    </td>
						<td onclick="policy(this);" data-id="<?= $row['id']?>"><i class="fa-solid fa-circle-minus"></i></td>
						<td><span class="badge bg-warning text-white">V <?= $row['versions']?></span></td>

						<td>
							<div class="media">
								<div class="media-aside align-self-center">
									<a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
										<span class="b-avatar-img">
											<img src="https://new.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
											</span><!---->
										</a>
									</div>
									<div class="media-body">
										<a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self"> Sally Ride </a>
										<small class="text-muted">sally@drata.co</small>
									</div>
								</div>
							</td>
							<td>
								<div class="media">
									<div class="media-body">
										<a href="" class="d-block text-nowrap text-dark" target="_self"> 9 Days ago </a>
										<small class="text-muted">via Drata</small>
									</div>
								</div>
							</td>
							<td>
         <!--                   <a href="" class="me-1 edit-policy" data-bs-toggle="modal" data-id="<?= $row['id']?>" data-bs-target="#defaultt">-->
									<!--<i class="fa-solid fa-pen-to-square"></i>-->
         <!--                   </a>-->
								<a href="<?= base_url('public/uploads/policy_file/') ."/".$row['file'] ?>" class="me-1" >
									<i class="fa-solid fa-arrow-up-from-bracket"></i>
								</a>
								<a href="" class="me-1 view-policy" data-bs-toggle="modal" data-id="<?= $row['id']?>" data-bs-target="#defaulttt">
									<i class="fa-solid fa-file-invoice"></i>
								</a>
                                <?php   
                        if($row['created_by'] != 0){?>
                            <a href="<?= base_url('Brand/deletePolicy') ."/".$row['id'] ?>" class="me-1" onclick="return confirm('Are you sure you want to delete this item?');">
									<i class="fa-solid fa-trash-can"></i>
								</a>
                        <?php }?>
								<!-- <a href="" class="me-1">
									<i class="fa-solid fa-trash-can"></i>
								</a> -->
							</td>
						</tr>                        
                        <?php
                    }
                    ?>
					</tbody>
				</table>
        </div>
    </div>
  <!-- list and filter end -->
</section>
    <!-- Dashboard Ecommerce ends -->
  </div>
</div>



</div>
<!-- Policy approve-->
<div class="modal fade text-start" id="policy" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">All Details</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <input type="hidden" id='all_data' name='id' value="">
       
        <div class="card-body card-datatable table-responsive pt-0 ">
            <a href="<?= base_url('/Brand/editPolicy/')?>/1" class="d-none">+</a>
          <div class="apr shadow"></div>
        </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>

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
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
 <!-- BEGIN: Theme JS-->
 <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-quill-editor.min.js')?>"></script>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- END: Page Vendor JS-->


<!-- script -->
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
</script>   
<!-- tooltip end -->

<!-- toggle accordion color start-->
<script>
function changeColor(id) {
   var element = document.getElementById("colorId"+id);
   element.classList.toggle("color_class");
}
function changeColor2() {
   var element = document.getElementById("colorId2");
   element.classList.toggle("color_class");
}
</script>
<script type="text/javascript">
   function editdoc(that) {
        var num = $(that).attr('data-number');
        var type = $(that).attr('data-type');
        var name = $(that).attr('data-name');
        var img = $(that).attr('data-img');
        $('#sid').val(num);
        $('#doc_name').val(name);
        $('#document_type_id').val(type);
        $('#imgDiv').attr('href',img);
        $('#docEditePopup').modal('show');
    }
function getQuestionByGHGAjax(that){
    
    //alert('test');
    // return;
     var id = $(that).val();
    //alert(assessment_id);
    ghg_id = $("#indicator_id").val();
    
        $.ajax({
        url : "<?php echo base_url()?>/supplier/getGhgAjax/"+id+"/"+ghg_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            // alert(data);
          $('#accordionRightIcon').html(data);
        },
        error: function(xhr, status, error){
          // $('#indicatorDiv').html('<option value="">Select Indicator </option>');
        }        
    });
    
}
function getQuestionByIndicatorAjax(that){
    
    // alert('test');
    // return;
     var id = $(that).val();
    //   alert(assessment_id);
    assessment_id = $("#assessment_id").val();
    if(assessment_id == 10 || assessment_id == 11) {
  $.ajax({
        url : "<?php echo base_url()?>/supplier/getIndicatorByAssessment/"+assessment_id+"/"+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            //  alert(data);
           $("#TYPE").html(data);
        },
        error: function(xhr, status, error){
          // $('#indicatorDiv').html('<option value="">Select Indicator </option>');
        }        
    });
      $.ajax({
        url : "<?php echo base_url()?>/supplier/getIndicatorByAssessmentDATE/"+id+"/"+assessment_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            //  alert(data);
           $("#DATE").html(data);
        },
        error: function(xhr, status, error){
        }        
    });
    
    
    }else{
        $.ajax({
        url : "<?php echo base_url()?>/supplier/getQuestionByIndicatorAjax/"+id+"/"+assessment_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            // alert(data);
          $('#accordionRightIcon').html(data);
        },
        error: function(xhr, status, error){
          // $('#indicatorDiv').html('<option value="">Select Indicator </option>');
        }        
    });
    }
}

function showDocConnectPopup(that) {
    var document = $(that).attr('data-document');
    $("#document_id").val(document);
    $("#assessment_id").val('0');
    $("#indicator_id").val('0');
    $('#accordionRightIcon').html('');
    $('#TYPE').html('');
    $('#DATE').html('select assess Date');
    $('#docConnectePopup').modal('show');
}

function getIndicatorByAssessment(that) {
    var assessment_id = $(that).val();
     if(assessment_id == 10 || assessment_id == 11) {
            $('#row_dim').show();
             $('#row_date').show();
             $.ajax({
        url : "<?php echo base_url()?>/supplier/getfootprintByAssessment/"+assessment_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            $("#indicator_id").html(data);
        },
        error: function(xhr, status, error){
            // $('#indicatorDiv').html('<option value="">Select Indicator </option>');
        }        
    });
        } else {
            $('#row_dim').hide();
             $('#row_date').hide();
             $.ajax({
        url : "<?php echo base_url()?>/supplier/getIndicatorByAssessment/"+assessment_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            $("#indicator_id").html(data);
        },
        error: function(xhr, status, error){
            // $('#indicatorDiv').html('<option value="">Select Indicator </option>');
        }        
    });
        }
   
}
$('textarea#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200,
        width: 420,
        airMode: false,
        // disableResizeEditor: true,
       
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
      
            function showdocument(that){
            var id = $(that).val();
            if(id == '1') {
                            $('#document_upload').show();
                            $('#showtemplate').hide();
                             $('#showtemplateeditable').hide();
                    
                         }else 
            if(id == '2') {
                            $('#showtemplate').show();
                            $('#document_upload').hide();
                        
                         }
            else { 
                        $('#document_upload').hide();
                        $('#showtemplate').hide();
                            
                  }
            }   
           function showtemplateeditable(that){
            var id = $(that).val();
            
            if(id == '3df1') {
                            $('#document_upload').show();
                            $('#showtemplate').hide();
                    
                         }else 
            if(id == '2#efds') {
                            $('#showtemplate').show();
                            $(this).data("id")
                            $('#document_upload').hide();
                        
                         }
            else { 
                       
                        $('#showtemplate').hide();
                        
                        
             $.ajax({
                        url : "<?php echo base_url()?>/supplier/getpolicydata/"+id,
                        type: "POST",
                            success: function(data){
                            $('#showtemplateeditable').show();
                            $("#editordata").html(data);
                        },
                        error: function(xhr, status, error){
                            }        
                     });
        
                  }
            }

</script>
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
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
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

<script>    
    function policy(that){
        var id= $(that).attr('data-id');
        // alert(id);
        $("#all_data").val(id);
        $.ajax({
            url: "<?= base_url('/Brand/policy_uu/')?>/" + id,
            method: "GET",
            success: function(result) {
                $("#policy_nameee").val(result.policy_id);
                $("#policy_id").html(result.id);
                $(".apr").html(result);
                $("#policy").modal('show');
                
            }
            
        });
        
    }
   
</script>


    <script>
        $(document).ready( function(){
            
            $('.view-policy').on('click', function(){
                var id= $(this).attr('data-id');
                // var pd= $(this).attr('data-pd');
                // var pn= $(this).attr('data-pn');
                // alert(id);
                $.ajax({
                    url: "<?= base_url('/Brand/editPolicy/')?>/" + id,
                method: "GEt",
                success: function(result) {
                    // alert(result.id);
                    $('.view-policy-name').html(result.policy_name);
                    $('.view-policy-details').html(result.policy_details);
                    $('#p_v_id').val(id);                    
                }
            });
                
                    // alert(result.id);
                                      
             
        });
    });
    </script>
    <script>
        CKEDITOR.replace( 'policy_details' );
    </script>
<?= $this->endSection() ?>




