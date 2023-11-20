<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<?php 

$indicator_json = array();

$indicator_json = json_encode($indicator_cat['indicator_array']); 

$indicator_value_json = json_encode($indicator_cat['indicator_per']);

?>

<style>
    .upload_doc{
    background: #EDFEB6;
    border: 1px solid #a4bd50 !important;
    color: #262626;
    transition: 0.5s;
    padding: 10px;
    border-radius: 30px;
    font-weight: 600;
    }
    .upload_doc:hover{
        
    box-shadow: rgb(50 50 93 / 25%) 0px 6px 12px -2px, rgb(0 0 0 / 30%) 0px 3px 7px -3px;
    border: 1px solid #defe73 !important;
    transition: 0.5s;
    background: #defe73;
    color: #262626;
    }
    
    
</style>

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

                                                <div class="cph_score_result"><span id="total_questio_sub"><?php echo $detail['total_attempt']?></span> Out of <?php echo $detail['total_question']?></div>

                                            </div>

                                        </div>

                                        <div class="cph_status_right d-flex">

                                            <div class="cph_score_icon">

                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_complete.png">

                                            </div>

                                            <div class="cph_score_content">

                                                <div class="cph_score_label">Utopiic Level : <?php echo $level['level_name'];?></div>

                                                <div class="cph_score_result"><?php echo NUMBER_FORMAT(($level['level_per']),2,".",".");?>% Out of 100</div>

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

<!--   <div class="alert alert-success alert-dismissible">

  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->

<div class="modal fade show" id="confirmVerifyModal" tabindex="-1" role="dialog" aria-labelledby="confirmVerifyModalTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Verify Assessment</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

   <?php echo $session->get('success');?>

</div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>

<script>

 //   $("#confirmVerifyModal").modal("show");    

</script>

<!--   </div>  -->

<?php } ?>



<?php 

//if($session->get('error')){?>

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

      <div class="modal-body"><p id="submit_err_msg"></p>

   <?php // echo $session->get('error');?>

</div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>

<!--   </div>  -->

<?php // } ?>



<?php if($indicator && ($indicator[0]['is_submit']==0 && $supp_assess['is_verify']==0)){?>

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

                                    <div class="modal-header mdl_header">

                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">

                                            <?php echo $t['indicator_name'];?></h5>

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

    <div class="card-header crd_header header-elements-inline">



    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-<?php echo $t['id'].$index;?>"><span></span><?php echo $q['question_title'];?></a>

 <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $stan_and_class; ?>"></i>

    </h6>

    </div>

    <div class="collapse" id="accordion-item-icons-<?php echo $t['id'].$index;?>" data-parent="#accordionRightIcon">

    <div class="card-body c_body">

        <div class="card_body_inner">
            
<p><?php echo $q['question'];?></p>
<input type="hidden" name="answer_insert_id" id="answer_insert_id<?php echo $q['question_id'];?>" value='<?php echo $q['answer_insert_id'];?>' /> 

            </div>

        <div class="card_body_inn_2">

            <div class="card_body_txt cbt_2 vertical_full">

                

        
                <div class="q_radio_btn q_radio_first vertical">

        <?php if(!empty($q['answer'])){

            //print_r($q['answer']);

            foreach ($q['answer'] as $key => $a) { 

             ?>

             <?php if($a['choice']=='Single'){?>

            <label class="radio radio-primary">

                <input type="radio" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>" <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>  > 

                <span style="border-right: 2px solid black;"><?php echo $a['answer'];?></span>

<!--                 <span class="checkmark"></span> -->

            </label>

            <?php } ?>

            <?php if($a['choice']=='Multi'){?>

            <label class="radio radio-primary">

                <input type="checkbox" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>"  <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>><span><?php echo $a['answer'];?></span>

<!--                 <span class="checkmark" style="border-radius: 1px;"></span> -->

            </label>

            <?php } ?>

            

        <?php  } } ?>       

                </div>

                </div>

                <div class="comment_optional">

                    <p class="comnt_open show_btn">Comment (Optional)</p>

                        <div class="commnt_text">

                        <textarea class="custom_area" name="remark<?php echo $q['question_id'];?>" id="remark<?php echo $q['question_id'];?>" placeholder="Your comment..."><?php echo $q['remark'];?></textarea>

                            <span class="comment_close">x</span>

                        </div>

                </div>

                <span id="responseDiv<?php echo $q['question_id'];?>" style="col<?php echo $q['question_id'];?>or: green;font-size: 15px;"></span>

                <div class="admin_btn mt-4">

<!--                     <input type="button" value="save & Next" data-toggle="collapse" href="#accordion-item-icons-2"ss>     -->

                    <input type="button" value="Submit" onclick="saveQuestion(<?php echo $assessment_id['assessment_id'];?>,<?php echo $q['question_id'];?>,<?php echo $t['id'];?>,<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>,'<?php echo $q['choice']?>')" >

                    <input type="button" value="Next" onclick="getNext(<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>)" style="float:right;" >

                </div>

            </div>

<!--        <div class="q_radio_btn"> -->



<!--         <input type="hidden" name="answer_insert_id" id="answer_insert_id<?php echo $q['question_id'];?>" value='<?php echo $q['answer_insert_id'];?>' />  -->



        <?php if(!empty($q['answer'])){

            //print_r($q['answer']);

            foreach ($q['answer'] as $key => $a) { 

             ?>

<!--             <label class="radio radio-primary">

             <?php if($a['choice']=='Single'){?>

                <input type="radio" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>" <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>  > <span><?php echo $a['answer'];?></span><span class="checkmark"></span> -->

            <?php } ?>

            <?php if($a['choice']=='Multi'){?>

<!--                 <input type="checkbox" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>"  <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>><span><?php echo $a['answer'];?></span><span class="checkmark" style="border-radius: 1px;"></span> -->

            <?php } ?>

<!--             </label> -->

            

        <?php  } } ?>       

<!--     </div> -->

<!--     <textarea class="custom_area" name="remark<?php echo $q['question_id'];?>" id="remark<?php echo $q['question_id'];?>" placeholder="Your comment..."><?php echo $q['remark'];?></textarea> -->

<!--     <span id="responseDiv<?php echo $q['question_id'];?>" style="col<?php echo $q['question_id'];?>or: green;font-size: 15px;"></span> -->

<!--     <div class="admin_btn mt-4"> -->



<!-- <input type="button" value="Submit" onclick="saveQuestion(<?php echo $assessment_id['assessment_id'];?>,<?php echo $q['question_id'];?>,<?php echo $t['id'];?>,<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>,'<?php echo $q['choice']?>')" >

<input type="button" value="Next" onclick="getNext(<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>)" style="float:right;" > -->

<!--     </div> -->

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





<div class="modal fade custom_modal action_modal create_modal doc_create" id="submitModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title" id="exampleModalCenterTitle-2">Select Time Period for Assessment</h5>

<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

</div>

    <div class="modal-body">

        <div class="create_doc_form">

<form name="assessment-form" method="post" action="<?php echo base_url();?>/supplier/submitAssessment" id='assessment-form'> 

<input type="hidden" name="supplier_assessment_id" value="<?php echo $assessment_id['assessment_id'];?>">

    <div class="theme_field">

        <div class="d-flex">

            <div class="form_6">

                <div class="">

<!--                     <input id="datepicker"/> -->

    <input type="date" name="from" id="form" class="form-control" required="required" value="<?php echo $t['from_date'];?>">

                </div>

            </div>

            <div class="stc_center">to</div>

            <div class="form_6 doc_top_margin">

                <div class="">

<!--                     <input id="datepicker2"/> -->

    <input type="date" name="to" id="to" class="form-control" required="required" value="<?php echo $t['to_date'];?>">

                </div>

            </div>

        </div>

    </div>

    <div class="admin_btn mt-4" id="tab2">

    <input type="submit" name="Submit" onclick="return confirm('Do You Want to Submit Assessment?')" value="Submit">    

    </div>

<!-- <div class="">

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

</div> -->

</form>

</div>

    </div>

</div>

</div>

</div>



<?php 

if($supp_assess) {

if($supp_assess['is_verify']==0) { 

?>

<a href="" data-toggle="modal"  class="submit_btn" disabled onclick="checkQuestionCompletion()">Submit</a>

<?php } }?>

<?php 

    if(empty($supp_assess)) {

?>

<a href="" data-toggle="modal" data-target="#submitModalCenter" class="submit_btn" disabled>Submit</a>

<?php

    }

?>

                        </div>

                    </div>

                </div>





<?php }else{ 

//print_r($supplier_info);die;

?>









            <?php if($supp_assess['is_verify']==0) { ?>

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

                                <div class="cb_left"><?php echo $indicator?date("d-m-Y", strtotime($indicator[0]['from_date'])):'';?> - <?php echo $indicator?date("d-m-Y", strtotime($indicator[0]['to_date'])):'';?></div>

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

                                        <span id="confirm_modal_spn"></span>

                                        <a id="go_to_upload_doc" class="btn btn-primary upload_doc" href="<?php base_url() ?>/supplier/document" class="btn">Upload Document</a>

                                        <a id="go_to_base_assess" style="display:none;" class="btn btn-primary" href="<?php base_url() ?>/supplier/baseAssessment" class="btn">Base Assessment</a>                                                                                

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

<?php } ?>

<?php 

if($supp_assess) {

if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==1) { 

?>

                <div class="row" id="tab2c">

                    <div class="col-sm-12">





                        <div class="accordion custom_accordion" id="accordionRightIcon" onclick="renderPieChart()">

                            <div class="card custom_tab">

                                <div class="card-header header-elements-inline">

                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

                                        <a class="text-default" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="true"><span></span>

                                            <?php echo $supplier_info['brand_name'];?>  &nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y", strtotime($indicator[0]['from_date']));?> - <?php echo date("d-m-Y", strtotime($indicator[0]['to_date']));?>

                                        </a>

                                        <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>

                                    </h6>

                                </div> 

                                <div class="collapse show" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="padding-top: 10px;">

                                    <div class="card-body" style="padding: 10px !important;">

                                        <div class="custom_tab">

                                            <ul class="nav nav-pills" id="myPillTab" role="tablist">

                                                <li class="nav-item"><a class="nav-link active show" id="overview-icon-pill" data-toggle="pill" href="#Overview" role="tab" aria-controls="homePIll" aria-selected="false">Overview</a></li>

<!--                                                 <li class="nav-item"><a class="nav-link" id="home-icon-pill" data-toggle="pill" href="#Strengths" role="tab" aria-controls="homePIll" aria-selected="false">Strengths</a></li>

                                                <li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Improvements" role="tab" aria-controls="profilePIll" aria-selected="false">Improvements</a></li> -->

                                                <li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Risks" role="tab" aria-controls="contactPIll" aria-selected="true">Risks</a></li>

                                                <li class="nav-item"><a class="nav-link" id="badge-icon-pill" data-toggle="pill" href="#Badge" role="tab" aria-controls="BadgePIll" aria-selected="true">Badge</a></li>

                                            </ul> 

                                            <div class="tab-content" id="myPillTabContent">

                                                <div class="tab-pane fade active show" id="Overview" role="tabpanel" aria-labelledby="overview-icon-pill">

                                                    <div class="accordion_table">

                                                        <div class="table-responsive">

                                <?php  

// $indicator_json = array();

// $indicator_json = json_encode($indicator_cat['indicator_array']); 

// $indicator_value_json = json_encode($indicator_cat['indicator_per']);

// $echartPie = json_encode($indicator_category); ?>

<!-- <div id="echartPie" style="height: 300px;"></div> -->

<div class="tab-pane fade show" id="graph1" role="tabpanel" aria-labelledby="home-icon-pill">

    <div class="accordian_graph1">

            <div id="linechart" ></div>

    </div>

</div>

                                                        </div>

                                                    </div>

                                                </div>

<!--                                                <div class="tab-pane fade show" id="Strengths" role="tabpanel" aria-labelledby="home-icon-pill">

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

<td><?php echo $sbal['question']['indicator_category_name']; ?>

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

<td><div class="status_bg exc_bg">

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

<?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                            

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

                                                </div> -->

<!--                                                <div class="tab-pane fade show" id="Improvements" role="tabpanel" aria-labelledby="home-icon-pill">

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

                                                                        <td>

<div 

<?php if($sbal['supplier_base_assessment']['degree_id']==6){?> class="status_bg good_bg" <?php } ?>

<?php if($sbal['supplier_base_assessment']['degree_id']==5){?> class="status_bg low_bg" <?php } ?>

 >

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

<?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                            

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

                                                </div> -->

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

        if($sbal['supplier_base_assessment']['degree_id']==1 || $sbal['supplier_base_assessment']['degree_id']==2) {



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

                                                                        <td>

<div 

<?php if($sbal['supplier_base_assessment']['degree_id']==1){?> class="status_bg high_bg" <?php } ?>

<?php if($sbal['supplier_base_assessment']['degree_id']==2){?> class="status_bg medium_bg" <?php } ?>>

<?php 

    if($degree) {

        foreach($degree as $deg) {

            if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) {

                //echo $deg['name']; 

                echo "High Risk"; 

            }

        }

    }

?>

                                                                        </div></td>   

                                                                        <td>Document here</td>   

                                                                        <td>

<?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                            

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

                                                <div class="tab-pane fade show" id="Badge" role="tabpanel" aria-labelledby="badge-icon-pill">

<!--                                                     <div class="accordion_table">

                                                        <div class="table-responsive">



                                                        </div>

                                                    </div> -->

                                                    <div class="offset_inner">

                                                        <div class="offset_title">

                                                            Carbon ....... Projects

                                                        </div>

                                                        <div class="">

                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 

                                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 

                                                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.

                                                        </div>

<?php 

    if($bg_arr) {

        foreach($bg_arr as $key=>$os) {

            if($key%3==0) {

                if($key!=0) {

?>

                </div>

<?php                    

                }

?>

            <div class="row mt-3">

<?php

            }

?>            

            <div class="col-md-4 col-sm-6">

                <div class="offset_single">

                    <img src="<?php echo base_url() ?>/public/uploads/badges/<?php echo $os['badge_image'] ?>">

                    <div class="os_title">

                    <?php echo $os['badge_name']; ?>                        

                    </div>

                    <div>

                    <?php echo $os['badge_description']; ?>                        

                    </div>

                    <div class="admin_btn btn_black mt-3">

                        <input type="button" value="Buy">    

                    </div>

                </div>

            </div>



<?php



        }

    }

?>


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



<?php 

if($supp_assess) {

if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==0) { 

?>

                <div class="row" id="tab2c">

                    <div class="col-sm-12">

                        <div class="confirm_box">

                            <div class="cb_single">

                                <div class="cb_left"><span><?php echo $supplier_info['brand_name'];?></span> &nbsp;&nbsp;&nbsp; <?php echo $indicator[0]['from_date'];?> - <?php echo $indicator[0]['to_date'];?></div>

                                <div class="cb_right">

                                   

                                </div>

                            </div>

                            <div class="cb_single mt-2">

                                <div class="cb_left"> Your base assessment is under verification</div>

                                <div class="cb_right">

                                </div>

                            </div>

                        </div>

                      

                    </div>

                </div>





<?php } }?>





            </div>

        </div>

<!-- color change by toggle btn start -->        

    <?php include("include/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>

     var graph1 = {

          series: [{

            name: "",

            data: <?php echo $indicator_value_json;?>

        }],

          chart: {

          height: 350,

          type: 'line',

          zoom: {

            enabled: false

          }

        },

        dataLabels: {

          enabled: false

        },

        stroke: {

          curve: 'straight'

        },

        title: {

          text: '',

          align: 'left'

        },

        grid: {

          row: {

            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns

            opacity: 0.5

          },

        },

        xaxis: {

          categories: <?php echo $indicator_json;?>,

        },

        yaxis: {

          tickAmount: 5,

          min: 0,

          max: 100

        }

        };

    var chart1 = new ApexCharts(document.querySelector("#linechart"), graph1);

    chart1.render();

</script>

<script>

    function getNext(id,next){        

        $('#accordion-item-icons-'+id).removeClass('show');        

        $('#accordion-item-icons-'+next).addClass('collapse show');

    }    

</script>

<script>

    $(document).ready(function(){

        $(".show_btn").click(function(){

            $(".comnt_open").hide();

        });

        $(".show_btn").click(function(){

            $(".commnt_text").css('display', 'block');

        });

        $(".comment_close").click(function(){

            $(".comnt_open").show();

        });

        $(".comment_close").click(function(){

            $(".commnt_text").hide();

        });

    });

    /* $(document).ready(function(){

        $(".comnt_open").click(function(){

            $(".commnt_text").slideToggle();

        }); 

    }); */

</script>   



<script>

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

          if(data!="") {

              $('#confirm_modal_spn').html('<p>'+data+'</p>');

          }

          else {

              $('#confirm_modal_spn').html('<p>You have connected all the documents, Your assessment is under verification</p>');

              $("#go_to_upload_doc").hide();

              $("#go_to_base_assess").show();

          }

            // setTimeout(function(){ 

            //   location.reload();

            // }, 3000);

        },

        error: function(xhr, status, error){

            alert('error');

          // $('#sdgDiv').html('<option value="">Select Sdg </option>');

        }

    });

}



function checkQuestionCompletion() {

  $.ajax({

        url : "<?php echo base_url()?>/supplier/checkQuestionCompletion",

        type: "POST",

        dataType: "JSON",

        success: function(data){

            if(parseInt(data.total_question) == parseInt(data.total_attempt)) {

                //  alert('test');

                $("#submitModalCenter").modal('show');

            }

            else {

                $("#submit_err_msg").html(data.total_attempt+" Out of "+data.total_question+" completed, need to complete remaining question for submit");

                $("#submitErrorModal ").modal('toggle');

            }

        },

        error: function(xhr, status, error){

            alert('error');

          // $('#sdgDiv').html('<option value="">Select Sdg </option>');

        }

    });

}



</script>