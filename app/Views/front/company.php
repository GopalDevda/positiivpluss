<?php include("include/header.php"); ?>
<?php include("include/menu.php");?>

<div class="main-content-wrap sidenav-open d-flex flex-column custom_page">
            <!-- ============ Body content start ============= -->
            <div class="main-content category_body">
                <div class="breadcrumb">
                    <h1><?php echo $assessment[0]['assessment_name'];?></h1>
                   <!-- <ul>
                        <li><a href="">dummy</a></li>
                        <li>dummy</li>
                    </ul>-->
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">

                <input type="hidden" name="assessment_id" value="<?php echo $assessment_id['assessment_id'];?>" >
                    <div class="col-lg-12 col-md-12">
                        <div class="category_page_header">
                            <div class="cph_inner">
                                <div class="cph_left">
                                    <img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $assessment[0]['image'];?>">
                                </div>
                                <div class="cph_right">
                                    <div class="cph_title"><?php echo $assessment[0]['title'];?></div>
                                    <div class="cph_short_desc">
                                        <?php echo $assessment[0]['description'];?>
                                    </div>
                                    <div class="cph_status">
                                        <div class="cph_status_left d-flex">
                                            <div class="cph_score_icon">
                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_score.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Question Completion</div>
                                                <div class="cph_score_result"><?php echo $detail['total_attempt']?> Out of <?php echo $detail['total_question']?></div>
                                            </div>
                                        </div>
                                        <div class="cph_status_right d-flex">
                                            <div class="cph_score_icon">
                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_complete.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Utopiic Score</div>
                                                <div class="cph_score_result"><?php echo $detail['percent'];?> Out of 100</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

<?php 
$session = session();
if($session->get('success')){?>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <?php echo $session->get('success');?>
  </div> 
<?php } ?>

<?php 
if($session->get('error')){?>
<!--   <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
<div class="modal fade show" id="submitErrorModal" tabindex="-1" role="dialog" aria-labelledby="submitErrorModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Submit Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <?php echo $session->get('error');?>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    $("#submitErrorModal").modal("show");    
</script>
<!--   </div>  -->
<?php } ?>

<?php if($indicator[0]['is_submit']==0){?>
<div class="row" id="tab1c">
<?php 
if(!empty($indicator)){
foreach($indicator as $t){
  $tot_question = count($t['question']);
?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="" data-toggle="modal" data-target="#exampleModalCenter<?php echo $t['id'];?>">
                        <div class="category_single">
                            <div class="cs_icon">
                                <img src="<?php echo base_url();?>/public/uploads/sdg/<?php echo $t['image'];?>">
                            </div>
<div class="cs_category_name">
<?php echo $t['indicator_category_name'];?> 
    
<?php if($t['question_attempt']==$tot_question){?>
<img id="completeImg<?php echo $t['id'];?>" src="<?php echo base_url();?>/public/brand/assets/custom_img/q_filled.png">
<?php }else{?>
    <img id="completeImg<?php echo $t['id'];?>" src="<?php echo base_url();?>/public/brand/assets/custom_img/q_blank.png">
<?php } ?>
</div>
                            <div class="cs_subcategory_name">
                            <?php echo $t['indicator_name'];?>  </div>
                            <div class="cs_single_bottom d-flex">
                                <div class="cs_bottom_label">Questions Answered</div>
                             
                                <div class="cs_bottom_value"><span id="totAnswer<?php echo $t['id'];?>"><?php echo $t['question_attempt'];?></span>/<span id="totQuestion<?php echo $t['id'];?>"><?php echo $tot_question;?></span></div>
                            </div>
                        </div>
                        </a>

                        <div class="modal fade custom_modal" id="exampleModalCenter<?php echo $t['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2"><?php echo $t['indicator_name'];?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                           
                                                <div class="accordion custom_accordion" id="accordionRightIcon">
                                            
    <?php 
    $index=1;
    if(!empty($t['question'])){
        foreach($t['question'] as $key=>$q){
            $stan_and_class = "";
            if($q['standard']) {
                foreach($q['standard'] as $s_arr) {
                    if($s_arr) {
                        $stan_and_class.=$s_arr['standard_name']." - ".$s_arr['classification_name'].", ";
                    }
                }
            }
            ?>
    <div class="card">
    <div class="card-header header-elements-inline">

    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-<?php echo $q['question_id'];?>"><span></span><?php echo $q['question'];?></a>
 <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $stan_and_class; ?>"></i>
    </h6>
    </div>
    <div class="collapse" id="accordion-item-icons-<?php echo $q['question_id'];?>" data-parent="#accordionRightIcon">
    <div class="card-body"><?php echo $q['question'];?>
       <div class="q_radio_btn">

        <input type="hidden" name="answer_insert_id" id="answer_insert_id<?php echo $q['question_id'];?>" value='<?php echo $q['answer_insert_id'];?>' /> 

        <?php if(!empty($q['answer'])){
            //print_r($q['answer']);
            foreach ($q['answer'] as $key => $a) { 
             ?>
            <label class="radio radio-primary">
             <?php if($a['choice']=='Single'){?>
                <input type="radio" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>" <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>  > <span><?php echo $a['answer'];?></span><span class="checkmark"></span>
            <?php } ?>
            <?php if($a['choice']=='Multi'){?>
                <input type="checkbox" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>"  <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>><span><?php echo $a['answer'];?></span><span class="checkmark" style="border-radius: 1px;"></span>
            <?php } ?>
            </label>
            
        <?php  } } ?>       
    </div>
    <textarea class="custom_area" name="remark<?php echo $q['question_id'];?>" id="remark<?php echo $q['question_id'];?>" placeholder="Your comment..."><?php echo $q['remark'];?></textarea>
    <span id="responseDiv<?php echo $q['question_id'];?>" style="col<?php echo $q['question_id'];?>or: green;font-size: 15px;"></span>
    <div class="admin_btn mt-4">

<input type="button" value="Submit" onclick="saveQuestion(<?php echo $assessment_id['assessment_id'];?>,<?php echo $q['question_id'];?>,<?php echo $t['id'];?>,<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>,'<?php echo $q['choice']?>')" >
<input type="button" value="Next" onclick="getNext(<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>)" style="float:right;" >
    </div>
    </div>
    </div>
    </div>
     <?php $index++;} } ?>                                       
                         </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
  <?php } } ?>                       
                </div>







                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right mt-4">


<div class="modal fade custom_modal" id="submitModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalCenterTitle-2">Select Time Period for Assessment</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
    <div class="modal-body" style="background-color: #000;">

<form name="assessment-form" method="post" action="<?php echo base_url();?>/supplier/submitAssessment" id='assessment-form'> 
<input type="hidden" name="supplier_assessment_id" value="<?php echo $assessment_id['assessment_id'];?>">
<div class="">
    <label style="color: #fff;">Select From Date </label>
    <input type="date" name="from" id="form" class="form-control" required="required" value="<?php echo $t['from_date'];?>">
</div>
<div class="">
    <label style="color: #fff;padding-top: 5px;">Select To Date </label>
    <input type="date" name="to" id="to" class="form-control" required="required" value="<?php echo $t['to_date'];?>">
</div>
<br>
<div class="">
<input type="submit" name="Submit" style="background-color: #C39A4A;color: white;
font-size: 16px;
font-weight: 600;
border: none;
padding: 3px 15px; 
cursor: pointer;" onclick="return confirm('Do You Want to Submit Assessment?')" value="Submit">
</div>
</form>
    </div>
</div>
</div>
</div>

<?php 
if($supp_assess) {
if($supp_assess['is_verify']==0) { 
?>
<a href="" data-toggle="modal" data-target="#submitModalCenter" style="background-color: #C39A4A;color: white;
font-size: 16px;
font-weight: 600;
border: none;
padding: 3px 15px;
cursor: pointer;" disabled>Submit</a>
<?php } }?>
                        </div>
                    </div>
                </div>


<?php }else{ 
//print_r($supplier_info);die;
?>





                <div class="row" id="tab2c">
                    <div class="col-sm-12">
                        <div class="confirm_box">
                            <div class="cb_single">
                                <div class="cb_left"><span><?php echo $supplier_info['brand_name'];?></span></div>
                                <div class="cb_right">
                                    <div class="admin_btn" data-toggle="modal" data-target="#confirmModal">
                                        <input type="button" value="Verify" onclick="verify()">    
                                    </div>
                                </div>
                            </div>
                            <div class="cb_single mt-2">
                                <div class="cb_left"><?php echo $indicator[0]['from_date'];?> - <?php echo $indicator[0]['to_date'];?></div>
                                <div class="cb_right">
                                    <div class="undo" id="tab1"><u><a href="<?php echo base_url();?>/supplier/undoBaseAssessment/<?php echo $assessment_id['assessment_id'];?>" >Undo</a></u></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade custom_modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Confirmation </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body" id="confirm_modal_bdy">
                                        Connect your answers with the supporting document from the Documents Library!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php 
if($supp_assess) {
if($supp_assess['is_verify']==1) { 
?>
                <div class="row" id="tab2c">
                    <div class="col-sm-12">


                        <div class="accordion custom_accordion" id="accordionRightIcon">
                            <div class="card custom_tab">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="false"><span></span>
                                            Title Here
                                        </a>
                                        <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>
                                    </h6>
                                </div> 
                                <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="">
                                    <div class="card-body">
                                        <div class="custom_tab">
                                            <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#Strengths" role="tab" aria-controls="homePIll" aria-selected="false">Strengths</a></li>
                                                <li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Improvements" role="tab" aria-controls="profilePIll" aria-selected="false">Improvements</a></li>
                                                <li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Risks" role="tab" aria-controls="contactPIll" aria-selected="true">Risks</a></li>
                                            </ul> 
                                            <div class="tab-content" id="myPillTabContent">
                                                <div class="tab-pane fade active show" id="Strengths" role="tabpanel" aria-labelledby="home-icon-pill">
                                                    <div class="accordion_table">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Indicator Category</th>
                                                                        <th scope="col">Indicator</th>
                                                                        <th scope="col">Question</th>
                                                                        <th scope="col">Answer</th>
                                                                        <th scope="col">Degree</th>    
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Remark</th>                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php 
    if($supplier_base_assessment_list) {
        foreach($supplier_base_assessment_list as $sbal) {
            if($sbal['supplier_base_assessment']['degree_id']==1 || $sbal['supplier_base_assessment']['degree_id']==4) {
?>
                                                                    <tr>                                                            
                                                                        <td>
<?php echo $sbal['question']['indicator_category_name']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['indicator_name']; ?>                                                                            
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['question']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['answer']['answer']; ?>                                                                            
                                                                        </td>
                                                                        <td><div class="status_bg high_bg">
<?php 
    if($degree) {
        foreach($degree as $deg) {
            if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) {
                echo $deg['name'];
            }
        }
    }
?>
                                                                        </div></td>   
                                                                        <td>Document here</td>   
                                                                        <td>
<?php echo $sbal['supplier_base_assessment']['remark']; ?>                                                                            
                                                                        </td>                                                      
                                                                    </tr>
<?php 
            }
        }
    }
?>                                              
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="Improvements" role="tabpanel" aria-labelledby="home-icon-pill">
                                                <div class="accordion_table">
                                                        <div class="table-responsive">
                                                        <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Indicator Category</th>
                                                                        <th scope="col">Indicator</th>
                                                                        <th scope="col">Question</th>
                                                                        <th scope="col">Answer</th>
                                                                        <th scope="col">Degree</th>    
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Remark</th>                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php 
    if($supplier_base_assessment_list) {
        foreach($supplier_base_assessment_list as $sbal) {
            if($sbal['supplier_base_assessment']['degree_id']==5 || $sbal['supplier_base_assessment']['degree_id']==6) {
?>
                                                                    <tr>                                                            
                                                                        <td>
<?php echo $sbal['question']['indicator_category_name']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['indicator_name']; ?>                                                                            
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['question']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['answer']['answer']; ?>                                                                            
                                                                        </td>
                                                                        <td><div class="status_bg high_bg">
<?php 
    if($degree) {
        foreach($degree as $deg) {
            if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) {
                echo $deg['name'];
            }
        }
    }
?>
                                                                        </div></td>   
                                                                        <td>Document here</td>   
                                                                        <td>
<?php echo $sbal['supplier_base_assessment']['remark']; ?>                                                                            
                                                                        </td>                                                      
                                                                    </tr>
<?php 
            }
        }
    }
?>                                              
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="Risks" role="tabpanel" aria-labelledby="home-icon-pill">
                                                <div class="accordion_table">
                                                        <div class="table-responsive">
                                                        <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Indicator Category</th>
                                                                        <th scope="col">Indicator</th>
                                                                        <th scope="col">Question</th>
                                                                        <th scope="col">Answer</th>
                                                                        <th scope="col">Degree</th>    
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Remark</th>                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php 
    if($supplier_base_assessment_list) {
        foreach($supplier_base_assessment_list as $sbal) {
            if($sbal['supplier_base_assessment']['degree_id']==7) {
?>
                                                                    <tr>                                                            
                                                                        <td>
<?php echo $sbal['question']['indicator_category_name']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['indicator_name']; ?>                                                                            
                                                                        </td>
                                                                        <td>
<?php echo $sbal['question']['question']; ?>
                                                                        </td>
                                                                        <td>
<?php echo $sbal['answer']['answer']; ?>                                                                            
                                                                        </td>
                                                                        <td><div class="status_bg high_bg">
<?php 
    if($degree) {
        foreach($degree as $deg) {
            if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) {
                echo $deg['name'];
            }
        }
    }
?>
                                                                        </div></td>   
                                                                        <td>Document here</td>   
                                                                        <td>
<?php echo $sbal['supplier_base_assessment']['remark']; ?>                                                                            
                                                                        </td>                                                      
                                                                    </tr>
<?php 
            }
        }
    }
?>                                              
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>

                    </div>
                </div>    
<?php } }?>
            </div>
            
        </div>
<!-- color change by toggle btn start -->        
<script>        
    var toggle = document.getElementById('toggle_btn')
    let isToggle = true;

    function myFunction() {
        var textArea = document.getElementById('color_change')
        isToggle = !isToggle
        if (isToggle) {
            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
        } else {
            console.log("ok ok")
            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_black_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
        }
    }
</script>
<?php include("include/footer.php"); ?>
<script type="text/javascript">
    function getNext(id,next){
        $('#accordion-item-icons-'+id).removeClass('show');
        $('#accordion-item-icons-'+next).addClass('collapse show');
    }

    function saveQuestion(assessment_id,qid,indicator,id,next,choice) {
        //let quesitonNumber = $(that).attr('data-question');
        var remark = $("#remark"+qid).val();
        if(remark==''){ remark=0;}
        var answer_insert_id = $("#answer_insert_id"+qid).val();
        var answer = $("input[name='answer"+qid+"']:checked").val();
        if(choice=='Multi'){
            var answer = [];
            $.each($("input[name='answer"+qid+"']:checked"), function(){
                answer.push($(this).val());
            });
        }
        
        $.ajax({
            url : "<?php echo base_url();?>/supplier/submitBaseAssessmentQuestion/"+assessment_id+"/"+qid+"/"+answer+"/"+remark+"/"+indicator+"/"+choice+"/"+answer_insert_id,
            type: "POST",
            //dataType: "JSON",
            success: function(result){
                 var obj = JSON.parse(result);
                 $("#totAnswer"+indicator).html(obj.tot_ans);
                 $("#totQuestion"+indicator).html(obj.tot_q);
                 $("#answer_insert_id"+qid).val(obj.insert_id);
                 $("#responseDiv"+qid).html('Answer has been successfully saved');
                 if(obj.tot_ans==obj.tot_q){
                    $("#completeImg"+indicator).attr("src","<?php echo base_url();?>/public/brand/assets/custom_img/q_filled.png");
                 }

            },
        });
        $('#accordion-item-icons-'+id).removeClass('show');
        $('#accordion-item-icons-'+next).addClass('collapse show');
    }
</script>
<!-- <script>
    var j = jQuery.noConflict();
j(document).ready(function(){
  j('#tab2c, #tab3c').hide();
        j('#tab1').click(function(){
        j('#tab1c').show();                       
        j('#tab2c, #tab3c').hide();                   
        });
        
        j('#tab2').click(function(){
        j('#tab2c').show();                       
        j('#tab1c, #tab3c').hide();                       
        });
        
        j('#tab3').click(function(){
        j('#tab3c').show();                       
        j('#tab1c, #tab2c').hide();                       
        });
});
</script>  
 --><!-- tooltip start -->
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });

function verify(){
  $.ajax({
        url : "<?php echo base_url()?>/supplier/verifyBaseAssessment",
        type: "POST",
        //dataType: "JSON",
        success: function(data){
          $('#confirm_modal_bdy').html('<p>'+data+'</p><p>Connect your answers with the supporting document from the Documents Library!</p>');
        },
        error: function(xhr, status, error){
            alert('error');
          // $('#sdgDiv').html('<option value="">Select Sdg </option>');
        }
    });
}

</script>   
