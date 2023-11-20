<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<!-- add Document modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Create Document</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" name="doc-form" method="post" action="<?php echo base_url()?>/supplier/addDocument" enctype='multipart/form-data'>
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Document Name</label>
                        <input type="text" placeholder="Enter Company Name" name="company_name" required="" maxlength = "20" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Document Type</label>
                        <select name="document_type_id" id="" class="form-control select2" required="required">
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
                        <label class="form-label" for="city-column">Choose Document Action</label>
                        <select class="form-control select2" name="action_id"  id="action_id" onchange="showdocument(this);" >
                            <option value="0">Select action </option>
                            <option value="1"> Upload </option>
                            <option value="2"> Choose Template </option>
                        </select>
                     </div>
                  </div>
                  <div class="doc_upload" style="display:none;" id="document_upload">
                    <label class="form-label" for="city-column">Choose Document</label>
                    <input type="file" class="form-control" id="customFile" name="file" />
                  </div>
                 <div class="form-group" style="display:none;" id="showtemplate">
                    <label class="form-label" for="city-column">Choose Template</label>
                    <select name="document_sub_type_id" id="" class="form-control select2"  onchange="showtemplateeditable(this);">
                        <option value="">Select Template </option>
                        <?php
                        if(!empty($document_sub_type))
                        foreach($document_sub_type as $dd){?>
                        <option value="<?php echo $dd['id'];?>"><?php echo $dd['document_sub_type_name'];?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group note-control-selection "style="display:none;" id="showtemplateeditable">* 
                    <label class="form-label" for="">update name</label>
                    <textarea class="form-control" name="description" id="summernote" required="required"><p id="editordata"></p></textarea>
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
</div>
<!-- end Document modal -->

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
                                 <?php
                                    if($assessment) {
                                    foreach($assessment as $assess) {
                                    ?>
                                 <option value="<?php echo $assess['id'] ?>"><?php echo $assess['assessment_name'] ?></option>
                                 <?php } } ?>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Select Indicator</label>
                            <select class="form-control select2" id="indicator_id" name="indicator_id" onchange="getQuestionByIndicatorAjax(this);">
                                <option value="0">Select Indicator</option>
                                <?php
                                if($indicator) {
                                foreach($indicator as $indi) {
                                ?>
                                <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                                <?php }} ?>
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

<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Document Library</h2>
                    <div class="breadcrumb-wrapper">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
                    <i class="fa-solid fa-plus"></i> Add
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
            <table class="table table-bordered" id="example">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Document Name</th>
                        <th>Uploaded Date</th>
                        <th>Approved On</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Owner</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($supplier_doc)){
                    $s=1;
                    foreach($supplier_doc as $r){
                    ?>
                    <tr>
                        <td><?php echo $s;?></td>
                        <td><?php echo $r['document_name'];?></td>
                        <td><?php echo $r['date'];?></td>
                        <td><?php if(empty($r['approved_on'])){  ?>
                            <form action="<?php echo base_url(); ?>/supplier/updateselfDocApproval" method="post">
                                <input type="hidden" name="doc_id" value="<?php echo $r['id'];?>">
                                <button type="submit" class="btn btn-relief-primary btn-sm">Approve</button>
                            </form>
                            <?php } else { echo $r['approved_on']; } ?> 
                        </td>
                        <td><?php echo $r['document_type'];?></td>
                        <td><?php echo $r['file_size'];?> mb</td>
                        <td>
                             <?php $title = $r['titleu']; ?>
                        <div class="<?php echo $r['doc_connect_count']==0?'doc_deactive':'doc_active' ?> badge bg-dark fw-normal" id="bread">
                            <?php
                           

                             if($r['doc_connect_count']==0) {

                                echo '<p class="muted"><a href="#" data-bs-toggle="tooltip" data-bs-title="'.$title.'">Connected</a></p>';
                               // echo 'Connected';
                             }
                             else{
                                echo 'Connected with '.$r['doc_connect_count'].' question';
                             }
                            ?>

                        </div>
                            <!--                                                 <div class="doc_active">Connected</div>
                            <div class="sub_con">7 Connections</div>
                            -->                                                <!--<div class="doc_deactive">Deactive</div>-->
                        </td>
                        <td>
                            <div class="media">
                                <div class="media-aside align-self-center">
                                    <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                        <span class="b-avatar-img">
                                            <img src="<?php echo base_url()."/public/uploads/owner/".$r['ownerimg'];?>" alt="avatar">
                                            </span><!---->
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="" class="font-weight-bold d-block text-nowrap" target="_self"> <?php echo $r['ownername'];?> </a>
                                        <small class="text-muted"><?php echo $r['owneremail'];?></small>
                                    </div>
                                </div>
                            </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#" data-document='<?php echo $r['id'] ?>' onclick="showDocConnectPopup(this)">
                                        <i data-feather="link" class="me-50"></i>
                                        <span>Connect</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="editdoc(this);"  data-name='<?php echo $r['document_name'];?>' data-type='<?php echo $r['document_type_id'];?>' data-number="<?php echo $r['id'];?>" data-img='<?php echo base_url();?>/public/uploads/supplier_document/<?php echo $r['image'];?>'>
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url();?>/supplier/deleteDocument/<?php echo $r['id'];?>" onclick="return confirm('Do you want to delete?')">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $s++;} }?>
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







// $('textarea#summernote').summernote({
//         placeholder: '',
//         tabsize: 2,
//         height: 200,
//         width: 420,
//         airMode: false,
//         // disableResizeEditor: true,
       
//   toolbar: [
//         ['style', ['style']],
//         ['font', ['bold', 'italic', 'underline', 'clear']],
//         // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
//         //['fontname', ['fontname']],
//        // ['fontsize', ['fontsize']],
//         ['color', ['color']],
//         ['para', ['ul', 'ol', 'paragraph']],
//         ['height', ['height']],
//         ['table', ['table']],
//         ['insert', ['link', 'picture', 'hr']],
//         //['view', ['fullscreen', 'codeview']],
//         ['help', ['help']]
//       ],
//       });
   
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
<?= $this->endSection() ?>

