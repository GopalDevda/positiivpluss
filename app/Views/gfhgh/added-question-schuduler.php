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


<div class="modal fade text-start" id="default-edit" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Assessment</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Controlwork/control_assessment_update" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Boundary</label>
                        <input type="hidden" name='id' value="" id="editassessmentid">
                        <input type="text" class='form-control' id='edit_boundary' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Select  Sub Boundary</label>
                        <input type="text" class='form-control' id='edit_sub_boundary' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Select Assessment</label>
                        <input type="text" class='form-control' id='edit_indicator' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Assigned to</label>
                        <select class="form-control select2" name="assigned_to" id='edit_assigned_to'  required='required'>
                           <option value="0">Select Assigned to </option>
                           <?php if(!empty($employee_details)) {
                              foreach($employee_details as $empd) {
                                if($empd['id'] == session()->supplier_info['supplier_id']){
                              ?>
                           <option value="<?= session()->supplier_info['supplier_id']?>">Self</option>
                           <?php }else{?>
                           <option value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?></option>
                           <?php
                              }
                                                        }
                                                        }
                                                        ?>
                           <!--<option value="Sales">Self</option>-->
                           <!--<option value="Govind">Govind</option>-->
                           <!--<option value="Nisha">Nisha</option>-->
                           <!--<option value="Vedika">Vedika</option>-->
                           <!--<option value="Charu">Charu</option>-->
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Frequency</label>
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input " type="radio" name="frequency" id="edit_assessment_radio" value="" checked />
                              <label class="form-check-label edit_assessment_radio" for="edit-inlineRadio1"></label>
                           </div>
                           <!-- <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio2" value="Half yearly" />
                              <label class="form-check-label" for="edit-inlineRadio2">Half yearly</label>
                              </div>
                              <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio3" value="Quarterly" />
                              <label class="form-check-label" for="edit-inlineRadio3">Quarterly</label>
                              </div>
                              <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio4" value="Monthly" />
                              <label class="form-check-label" for="edit-inlineRadio4">Monthly</label>
                              </div> -->
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Comment</label>
                        <textarea placeholder="" class="form-control" name="comment" id="edit-comment" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Due Date</label>
                        <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="edit-due_date" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Priority</label>
                        <select class="form-control "  id='edit_priority' name="priority">
                           <option value="1">Low</option>
                           <option value="2">Mediun </option>
                           <option value="3">High</option>
                        <option value="Critical">Critical</option>
                           
                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- end edit Assessment modal -->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Add the Template Question</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
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
        
         <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
               <div class="row breadcrumbs-top">
                  <div class="col-12">
                     <h2 class="content-header-title float-start mb-0"></h2>
                     <div class="breadcrumb-wrapper">
                     </div>
                  </div>
               </div>
            </div>
            <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
               <div class="mb-1 breadcrumb-right">
                  <div class="dropdown">

                    <a class="d-flex align-items-center" href="<?php echo base_url('taskscheduler/view_scheduler');?>/17">
                     <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#tempalte">
                     <i class="fa-solid fa-plus"></i> View Question
                     </button></a>
                     
                  </div>
               </div>
            </div>
         </div>
         <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                   <!--<form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/addAdvanceAllAssessmentQuestion">-->
                   <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/Taskscheduler/template_question_add">

                <div class="card-body">

      <div class="form-group">
        <label for="exampleInputEmail1">Question Title</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="question_title">
      </div>
      <div class="form-group">



        <label for="exampleInputEmail1">Question</label>



        <textarea class="form-control" id="exampleInputEmail1" required="required" name="question"></textarea>



      </div>

      <div class="form-group">



        <label for="exampleInputEmail1"> Select Choice</label>



        <select name="choice" id="choice" required="required"  onchange="showanswertype(this);"class="form-control" >



            <option value="">Select Choice</option>



            <option value="Single">Single Choice</option>



            <option value="Multi">Multi Choice </option>



        </select>



      </div>







      <div class="form-group">



        <label for="exampleInputEmail1">Remark</label>



        <input type="text"  class="form-control" id="exampleInputEmail1"  name="remark">
        
        <input type="hidden"  class="form-control" id="exampleInputEmail1" value="<?php echo $title;?>" name="assess">




      </div>

                  
                  
                   <div class="form-group" >
                    
        <label for="exampleInputEmail1"> Select Answer</label>

        <div id="ANSWER"></div>



      
                  </div>





     <!--Start -->
      <!--<div class="form-group">-->



      <!--  <div class="col-md-5" style="float: left;">-->



      <!--    <label for="exampleInputEmail1">Standard</label>-->



      <!--    <select name="standard[]" id="standard[]"  class="form-control" onchange="getClassification(this.value,0);">-->



      <!--      <option value="">Select Standard</option>-->



            <?php 



              $stand_opt = "";



            //   if(!empty($standard)) 
            {



            //     foreach($standard as $stand) 
            {



                //   $stand_opt.='<option value="'.$stand['id'].'">'.$stand['standard_name'].'</option>';



            ?>



            <?php



                }



              }



            //   echo $stand_opt;



            ?>



      <!--    </select>-->



      <!--  </div>-->



      <!--  <div class="col-md-5" style="float: left;">-->



      <!--    <label for="exampleInputEmail1">Classification</label>-->



      <!--    <select name="classification[]" id="classificationDiv_0"  class="form-control" >-->



      <!--      <option value="">Select Classification</option>-->



      <!--    </select>-->



      <!--  </div>-->



      <!--  <div class="col-md-2" style="float: left;">-->



      <!--    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>-->



      <!--    <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button> -->



      <!--  </div>-->



      <!--</div>-->



      <!--<span class="stand_and_classific_div"></span>-->


<!--End here-->













      <div class="form-group">



        <label>Document Needed&nbsp;&nbsp;</label>



        <input type="radio" id="yes" name="doc_needed_status" value="1">



        <label for="yes">YES</label>&nbsp;&nbsp;



        <input type="radio" id="no" name="doc_needed_status" value="0" checked="checked">



        <label for="no">NO</label>



      </div>
      
      <div class="form-group">



        <label>Mandatory &nbsp;&nbsp;</label>



        <input type="radio" id="yes" name="mandatory_needed_status" value="1">



        <label for="yes">YES</label>&nbsp;&nbsp;



        <input type="radio" id="no" name="mandatory_needed_status" value="0" checked="checked">



        <label for="no">NO</label>



      </div>



           




</div>



                <!-- /.card-body -->







                <div class="card-footer">



                  <button type="submit" class="btn btn-primary">Submit</button>



                </div>



              </form>
               </div>
            </div>
            <!-- list and filter end -->
         </section>
         <!-- Dashboard Ecommerce ends -->
      </div>
   </div>
</div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
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


<script type="text/javascript">



function getIndicatorAjax(id=1){



  $.ajax({



        url : "<?php echo base_url()?>/assessment/getIndicatorByIndicatorCategory/"+id,



        type: "POST",



        //dataType: "JSON",



        success: function(data){



          $('#indicatorDiv').html(data);



        },



    });



}



</script>



<script type="text/javascript">










    function getClassification(id,i) {



      $.ajax({



            url : "<?php echo base_url()?>/assessment/getClassification/"+id,



            type: "POST",



            //dataType: "JSON",



            success: function(data){



              $('#classificationDiv_'+i).html(data);



            },



            error: function(xhr, status, error){



              $('#classificationDiv_'+i).html('<option value="">Select Classification</option>');



            }



        });



    }



  var i=1;



  function addStandAndClassificDiv(){



      stand_opt = '<?php echo $stand_opt ?>';



      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="standard[]" id="standard[]" required="required" class="form-control" onchange="getClassification(this.value,'+i+');"><option value="">Select Classification</option>'+stand_opt+'</select></div><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="classification[]" id="classificationDiv_'+i+'" required="required" class="form-control" ><option value="">Select Classification</option></select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');



      i+=1;



    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });



function showanswertype(that){
            // alert('test');
             var id = $(that).val();
            //   alert(id);
              
              
                            $.ajax({

                        url : "<?php echo base_url()?>/assessment/getalladvanceallAnswers/"+id,
            
                        type: "GET",
            
                        success: function(data){
                            
                        $('#ANSWER').html(data);
                        
                
            
                        },

                            error: function(xhr, status, error){
                         }


                    });
            if(id == '1') {
                            $('#showcontent').show();
                            $('#showimage').hide();
                            $('#showaudio').hide();
                            $('#showquiz').hide();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '2') {
                            $('#showimage').show();
                            $('#showcontent').hide();
                            $('#showaudio').hide();
                            $('#showall').hide();
                            $('#showquiz').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '3') {
                            $('#showimage').hide();
                            $('#showcontent').hide();
                            $('#showaudio').show();
                            $('#showquiz').hide();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '4') {
                            $('#showimage').hide();
                            $('#showcontent').hide();
                            $('#showaudio').hide();
                            $('#showquiz').show();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }
                        else    { 
                            $('#showimage').hide();
                            $('#showcontent').hide();
                             $('#showaudio').hide();
                            $('#showquiz').hide();
                            $('#showall').show();
                                }
            }



</script>
<script>
   $(document).ready(function() {
       $('#example').DataTable();
   });
</script>
<!-- END: Page Vendor JS-->
<!-- barchart script-->

<script type="text/javascript">
    function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
                template = $("<div class='media'> <div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'><img src='https://user.positiivplus.io/public/uploads/owner/john.jpg' alt='avatar'></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>"+ text +"</a></div> ");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '40px'});

</script>
<script type="text/javascript">
$("document").ready(function() {
    $('select[name="type"]').on('change', function() {
        var tId = $(this).val();
        var id = $('select[name="boundary"]').val();
// alert(id);
        if (tId) {
            $.ajax({
                url: "<?php echo base_url()?>/Taskscheduler/getsubboundaryByBoundary/" + tId + '/' + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="assessment_name"]').empty();
                    $('select[name="assessment_name"]').append(
                        '<option value="">Open this select menu</option>');
                    $.each(data, function(key, value) {
                        $('select[name="assessment_name"]').append(
                            '<option value="' +
                            value.id + '">' + value.assessment_name +
                            '</option>');
                    })
                }

            })
        } else {
            $('select[name="assessment_name"]').empty();
        }
    });
});
</script>

<script type="text/javascript">



function getIndicatorAjax(id=1){



  $.ajax({



        url : "<?php echo base_url()?>/master/getIndicatorByIndicatorCategorymaster/"+id,



        type: "POST",



        //dataType: "JSON",



        success: function(data){



          $('#indicatorDiv').html(data);



        },



    });



}



</script>

<!-- end barchart script -->
<!-- Show Bounday script-->
<!-- <script>
   function showBoundary(that) {
   
       var boundary_id = $(that).val();
   
        // alert(boundary_id);
   
        if(boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
   
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
</script> -->


<!-- end Show Bounday script -->
<script>
   var input = document.getElementById('company_address');
   
   var company_address = new google.maps.places.Autocomplete(input);    
   
</script> 
<script>
   $('.company_pin').keypress (function(){
   
           var regExp = /[a-z]/i;
   
             $('.company_pin').on('keydown keyup', function(e) {
   
               var value = String.fromCharCode(e.which) || e.key;
   
               // No letters
   
               if (regExp.test(value)) {
   
                 e.preventDefault();
   
                 return false;
   
               }
   
           });
   
   });
   
   
   
   function editemployee(that) {
   
       var emp_table_id = $(that).attr("data-emp_table_id");
   
       var empid = $(that).attr("data-empid");
   
       var name = $(that).attr("data-name");
   
       var phone_no = $(that).attr("data-phone_no");
   
       var email = $(that).attr("data-email");
   
       
   
       $("#emp_table_id").val(emp_table_id);
   
       $("#employee_emp_id").val(empid);
   
       $("#employee_name").val(name);
   
       $("#employee_phone_no").val(phone_no);
   
       $("#employee_email").val(email);
   
   
   
       $('#docEditePopup').modal('show');
   
   }
   
   
   
   function deleteemployee_id(that) {
   
       var id = $(that).attr("data-number");
   
       // alert(id);
   
       $("#del_employee_id").val(id);
   
       $("#docDeletePopup").modal('show');
   
   }
   
</script>
<script>
   $(document).ready(function () {
     $('.edit-model-button').on('click', function(){
       id = $(this).attr("data-id");
       boundary = $(this).attr("data-boundary");
       sub_boundary = $(this).attr("data-sub_boundary");
       indicator = $(this).attr("data-indicator");
       assigned_to = $(this).attr("data-assigned_to");
       frequency = $(this).attr("data-frequency");
       comment = $(this).attr("data-comment");
       due_date = $(this).attr("data-due_date");
       priority = $(this).attr("data-priority");
       // alert(boundary + "/" + sub_boundary + "/" + indicator);
       $.ajax({
         url: "<?= base_url('Controlwork/findDetails')?>" + "/" + boundary + "/" + sub_boundary + "/" + indicator,
         method : "GET",
         success : function(ok){
           // alert('ok');
       $('#edit_boundary').val(ok.boundary);
       $('#edit_sub_boundary').val(ok.sub_boundary);
       $('#edit_indicator').val(ok.indicator);
   
         }
       });
      
       $("#edit_priority").val(priority);
       $("#edit-comment").html(comment);
       $("#edit-due_date").val(due_date);
       $('#editassessmentid').val(id);
       $('#edit_assigned_to').val(assigned_to);
       $('.edit_assessment_radio').html(frequency);
       $('#edit_assessment_radio').val(frequency);
       $('#default-edit').modal('show');
     });
   });
</script>
<script>
    
    function showBoundary(that) {
    var boundary_id = $(that).val();
    // alert(boundary_id);
     if(boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
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
<?= $this->endSection() ?>
