<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>
<?php 
$indicator_value_json = json_encode($series_arr);
?>
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
		<div class="separator-breadcrumb border-top">
		</div>                
		<div class="row">                
			<input type="hidden" name="assessment_id" value="<?php echo $assessment_id['assessment_id'];?>" >                    
			<div class="col-lg-12 col-md-12">                        
				<div class="category_page_header">                            
					<div class="cph_inner">                                
						<div class="cph_left">                                    
							<img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $assessment[0]['image'];?>">                                </div>                                
							<div class="cph_right">                                    
								<div class="cph_title"><?php echo $assessment[0]['title'];?></div>                                    
								<div class="cph_short_desc">                        
									<?php echo $assessment[0]['description'];?>     
								</div>                                    
								<div class="cph_status">
								    <div class="cph_status_left d-flex">                                           
								    	<div class="cph_score_icon">                      
								    		<img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_score.png">                                            </div>                                            
								    		<div class="cph_score_content">                                                
								    			<div class="cph_score_label">Question Completion</div>                                                
								    			<div class="cph_score_result"><span id="tot_attempt_id"><?php echo $detail['total_attempt']?></span> Out of <?php echo $detail['total_question']?></div>                                            
								    		</div>                                        </div>                                        
								    		<div class="cph_status_right d-flex">                                            
								    			<div class="cph_score_icon">                                                <img src="<?php echo base_url();?>/public/brand/assets/custom_img/icon_complete.png">                                            
								    		</div>                                            
 <div class="cph_score_content">
                                                <div class="cph_score_label">Utopiic Level : <?php echo $level['level_name'];?></div>
                                                <div class="cph_score_result"><?php echo $level['level_per'];?>% Out of 100</div>
                                            </div>
								    		
								    	</div>                                    
								    </div>                                
								</div>                            
							</div>                        
						</div>                    
					</div>                
				</div>                
				<br><?php if($indicator && $indicator[0]['is_submit']==0 && $supp_assess['is_verify']==0){?>
					<div class="row" id="tab1c">
						<?php if(!empty($indicator)){foreach($indicator as $t){
						  $tot_question = count($t['question']);?>                    
						  <div class="col-lg-3 col-md-6 col-sm-6">                        
						  	<a href="" data-toggle="modal" data-target="#exampleModalCenter<?php echo $t['id'];?>">                        
						  		<div class="category_single">                            
						  			<div class="cs_icon">                                
									<img src="<?php echo base_url();?>/public/uploads/sdg/<?php echo $t['image'];?>">
									</div>
									<div class="cs_category_name">
										<?php echo $t['indicator_category_name'];?>     
										<?php if($t['question_attempt']==$tot_question){?>
											<img id="completeImg<?php echo $t['id'];?>" src="<?php echo base_url();?>/public/brand/assets/custom_img/q_filled.png"><?php }else{?>    
												<img id="completeImg<?php echo $t['id'];?>" src="<?php echo base_url();?>/public/brand/assets/custom_img/q_blank.png"><?php } ?></div>                            
					<div class="cs_subcategory_name">                      
					      <?php echo $t['indicator_name'];?>  </div>                            
					<div class="cs_single_bottom d-flex">                                
						<div class="cs_bottom_label">Questions Answered</div>                                                             
						<div class="cs_bottom_value"><span id="totAnswer<?php echo $t['id'];?>"><?php echo $t['question_attempt'];?></span>/<span id="totQuestion<?php echo $t['id'];?>"><?php echo $tot_question;?></span></div>                            </div>                        
					</div>                        
				</a>                        
				<div class="modal fade custom_modal" id="exampleModalCenter<?php echo $t['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">                            
					<div class="modal-dialog modal-dialog-centered" role="document">                                
						<div class="modal-content">                                    
							<div class="modal-header">                                        <h5 class="modal-title" id="exampleModalCenterTitle-2"><?php echo $t['indicator_name'];?></h5>                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                                    </div>                                    
							<div class="modal-body">                                                                                           <div class="accordion custom_accordion" id="accordionRightIcon">                                                
								<?php     $index=1;    if(!empty($t['question'])){        foreach($t['question'] as $q){            ?>    
								<div class="card">    
									<div class="card-header crd_header header-elements-inline">    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">        
	        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-<?php echo $t['id'].$index;?>"><span></span><?php echo $q['question_title'];?></a> <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title=""></i>    </h6>    
</div>    
    <div class="collapse" id="accordion-item-icons-<?php echo $t['id'].$index;?>" data-parent="#accordionRightIcon">    


    <div class="card-body c_body">
        <div class="card_body_inner">
        <!--    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.-->
                        <p><?php echo $q['question'];?></p>
        <input type="hidden" name="answer_insert_id" id="answer_insert_id<?php echo $q['question_id'];?>" value='<?php echo $q['answer_insert_id'];?>' /> 
        </div>
        <div class="card_body_inn_2">
            <div class="card_body_txt vertical_full">

                <div class="q_radio_btn vertical">
        <?php if(!empty($q['answer'])){
            //print_r($q['answer']);
            foreach ($q['answer'] as $key => $a) { 
             ?>
             <?php if($a['choice']=='Single'){?>
            <label class="radio radio-primary">
                <input type="radio" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>" <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>  > <span><?php echo $a['answer'];?></span>
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


<!-- <div class="card-body"><?php echo $q['question'];?>       
<div class="q_radio_btn">        
	<input type="hidden" name="answer_insert_id" id="answer_insert_id<?php echo $q['question_id'];?>" value='<?php echo $q['answer_insert_id'];?>' />         <?php if(!empty($q['answer'])){            
	//print_r($q['answer']);            
		foreach ($q['answer'] as $key => $a) {              
			?>            
		<label class="radio radio-primary">             
			<?php if($a['choice']=='Single'){?>                
				<input type="radio" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>" 
				<?php if($a['ava_status']==1){?> checked='checked' <?php } ?>  > 
				<span><?php echo $a['answer'];?></span><span class="checkmark"></span>            <?php } ?>            
				<?php if($a['choice']=='Multi'){?>                
					<input type="checkbox" name="answer<?php echo $q['question_id'];?>" value="<?php echo $a['answer_id'];?>"  <?php if($a['ava_status']==1){?> checked='checked' <?php } ?>><span><?php echo $a['answer'];?></span>
					<span class="checkmark" style="border-radius: 1px;"></span>            
					<?php } ?>            
				</label>                    
				<?php  
			} 
		} ?>
		           </div>    
		           <textarea class="custom_area" name="remark<?php echo $q['question_id'];?>" id="remark<?php echo $q['question_id'];?>" placeholder="Your comment..."><?php echo $q['remark'];?></textarea>    
		           	<span id="responseDiv<?php echo $q['question_id'];?>" style="col<?php echo $q['question_id'];?>or: green;font-size: 15px;"></span>    
		           	<div class="admin_btn mt-4"><input type="button" value="Submit" onclick="saveQuestion(<?php echo $assessment_id['assessment_id'];?>,<?php echo $q['question_id'];?>,<?php echo $t['id'];?>,<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>,'<?php echo $q['choice']?>')" >
		           		<input type="button" value="Next" onclick="getNext(<?php echo $t['id'].$index;?>,<?php echo $t['id'].$index+1;?>)" style="float:right;" >    
		           	</div>    
		           </div>    -->
		       </div>  
		   </div>     
		   <?php $index++;
		} 
	} 
	?>                                                                
</div>                        
</div>                      
</div>                  
</div>              
</div>          
</div>  
<?php 
} 
} 
?>                                       
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
							<form name="assessment-form" method="post" action="<?php echo base_url();?>/admin/submitAdvanceAssessment" id='assessment-form'> <input type="hidden" name="supplier_assessment_id" value="<?php echo $assessment_id['assessment_id'];?>">
                            <div class="theme_field">
                                <div class="d-flex">
                                    <div class="form_6">
                                        <div class="">
<!--                                         	<input id="datepicker"/> -->
<input type="date" name="from" id="form" class="form-control" required="required" value="<?php echo $t['from_date'];?>">
                                        </div>
                                    </div>
                                    <div class="stc_center">to</div>
                                    <div class="form_6 doc_top_margin">
                                        <div class="">
<!--                                         	<input id="datepicker2"/> -->
	<input type="date" name="to" id="to" class="form-control" required="required" value="<?php echo $t['to_date'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="admin_btn mt-4" id="tab2">
	<input type="submit" name="Submit" onclick="return confirm('Do You Want to Submit Assessment?')" value="Submit">
                            </div>
<!--								<div class="">    
<label style="color: #fff;">Select From Date </label>    
<input type="date" name="from" id="form" class="form-control" required="required" value="<?php echo $t['from_date'];?>">
</div>
<div class="">    
	<label style="color: #fff;padding-top: 5px;">Select To Date </label>    
	<input type="date" name="to" id="to" class="form-control" required="required" value="<?php echo $t['to_date'];?>">
</div>
<br>
<div class="">
	<input type="submit" name="Submit" style="background-color: #C39A4A;color: white;font-size: 16px;font-weight: 600;border: none;padding: 3px 15px; cursor: pointer;" onclick="return confirm('Do You Want to Submit Assessment?')" value="Submit">
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
<a href="" data-toggle="modal" class="submit_btn" onclick="checkQuestionCompletion()">Submit</a>                        
<?php } }?>
<?php 
    if(empty($supp_assess)) {
?>
<a href="" data-toggle="modal" class="submit_btn" onclick="checkQuestionCompletion()">Submit</a>
<?php
    }
?>
</div>                    
</div>                
</div><?php } else{ //print_r($supplier_info);die;?>               
<?php if($supp_assess['is_submit']==1 && $supp_assess['is_verify']==0) { ?>
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
		<div class="undo" id="tab1"><u><a href="<?php echo base_url();?>/admin/undoadvanceAssessment/<?php echo $assessment_id['assessment_id'];?>" onclick="return confirm('Do you want to undo base assessment?');" >Undo</a></u>
		</div>                                
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
                <a id="go_to_upload_doc" class="btn btn-primary" href="<?php base_url() ?>/supplier/document" class="btn">Upload Document</a>
                <a id="go_to_base_assess" style="display:none;" class="btn btn-primary" href="<?php base_url() ?>/admin/advanceAssessment" class="btn">Advance Assessment</a>           				
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
if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==0) { 
?>
                <div class="row" id="tab2c">
                    <div class="col-sm-12">
                        <div class="confirm_box">
                            <div class="cb_single">
                                <div class="cb_left"><span><?php echo $supplier_info['brand_name'];?></span> &nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y", strtotime($indicator[0]['from_date']));?> - <?php echo date("d-m-Y", strtotime($indicator[0]['to_date']));?></div>
                                <div class="cb_right">
                                   
                                </div>
                            </div>
                            <div class="cb_single mt-2">
                                <div class="cb_left"> Your advance assessment is under verification</div>
                                <div class="cb_right">
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>


<?php } }?>
<?php if($supp_assess) {if($supp_assess['is_verify']==1 && $supp_assess['admin_verify']==1) { ?>                
	<div class="row" id="tab2c">                    
		<div class="col-sm-12">                        
			<div class="accordion custom_accordion" id="accordionRightIcon">                            
				<div class="card custom_tab">                                
					<div class="card-header header-elements-inline">                                    
						<h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">                                        
							<a class="text-default" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="true"><span></span>                                            <?php
							if($supplier_info) {
								echo $supplier_info['brand_name'];
							} 
							?>
							</a>                                        
							<i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>                                    
						</h6>                                
					</div>                                 
<div class="collapse show" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="padding-top: 10px;">                                    
	<div class="card-body" style="padding: 10px !important;">                                        
		<div class="custom_tab">                                            
			<ul class="nav nav-pills" id="myPillTab" role="tablist">
				<li class="nav-item"><a class="nav-link active show" id="overview-icon-pill" data-toggle="pill" href="#Overview" role="tab" aria-controls="overviewPIll" aria-selected="false">Overview</a></li>			                                                
<!-- 				<li class="nav-item"><a class="nav-link" id="home-icon-pill" data-toggle="pill" href="#Strengths" role="tab" aria-controls="homePIll" aria-selected="false">Strengths</a></li>                                                
				<li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Improvements" role="tab" aria-controls="profilePIll" aria-selected="false">Improvements</a></li> -->                                                
				<li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Risks" role="tab" aria-controls="contactPIll" aria-selected="true">Risks</a></li>                                            </ul>                                             
				<div class="tab-content" id="myPillTabContent">
                    <div class="tab-pane fade active show" id="Overview" role="tabpanel" aria-labelledby="overview-icon-pill">


<div class="accordian_graph2s">
        <div id="scaterchart"></div>
</div>
<!-- <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
 -->

                    </div>				                                                
<!--					<div class="tab-pane fade show" id="Strengths" role="tabpanel" aria-labelledby="home-icon-pill">                                                    
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
			if($sbal['supplier_base_assessment']['degree_id']==7) {?>                                                                    
<tr>                                                                                                                                    
	<td><?php echo $sbal['question']['sdg_name']; ?>                                                                        
</td>                                                                        
<td><?php echo $sbal['question']['indicator_name']; ?>                                                                                                                                                    
</td>                                                                        
<td><?php echo $sbal['question']['question']; ?>                                                                        
</td>                                                                        
<td><?php echo $sbal['answer']['answer']; ?>                                                                                                                                                    
</td>                                                                        
<td><div class="status_bg exc_bg">
	<?php     
	if($degree) {        
		foreach($degree as $deg) {            
			if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) 
				{                
					echo $deg['name'];            
				}        
			}    
		}
	?>                                                                        
</div></td>                                                                           
<td>Document here</td>                                                                           
<td><?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                                                                                                    
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
</div>     -->                                           
<!-- <div class="tab-pane fade show" id="Improvements" role="tabpanel" aria-labelledby="home-icon-pill">                                                
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
		if($sbal['supplier_base_assessment']['degree_id']==5 || $sbal['supplier_base_assessment']['degree_id']==6) {?>                    
			<tr>                                                                                                                                    
				<td><?php echo $sbal['question']['sdg_name']; ?>                                                                        
			</td>                                                                        <td><?php echo $sbal['question']['indicator_name']; ?>                                                                                                                                                    
		</td>                                                                        
		<td><?php echo $sbal['question']['question']; ?>                                                                        
	</td>                                                                        
	<td><?php echo $sbal['answer']['answer']; ?>                                                                                                                                                    
</td>                                                                        
<td>
	<div 
<?php if($sbal['supplier_base_assessment']['degree_id']==6){?> class="status_bg good_bg" <?php } ?>
<?php if($sbal['supplier_base_assessment']['degree_id']==5){?> class="status_bg low_bg" <?php } ?>
 >
 <?php     
	if($degree) {        
		foreach($degree as $deg) {            
			if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) 
				{                
					echo $deg['name'];            
				}        
			}    
		}
	?>                                                                        
</div>
</td>                                                                           
<td>Document here</td>                                                                           
<td><?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                                                                                                    
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
</div>           -->                                     
<div class="tab-pane fade show" id="Risks" role="tabpanel" aria-labelledby="home-icon-pill">                                                
	<div class="accordion_table">                                                        
		<div class="table-responsive">                                                        
			<table class="table">                                                                
				<thead>                                                                    <tr>                                                                        
					<th scope="col">Indicator Category</th>                                                                        
					<th scope="col">Indicator</th>                                                                        
					<th scope="col">Question</th>                                                                        
					<th scope="col">Answer</th>                                                                        
					<th scope="col">Degree</th>                                                                            
					<th scope="col">Document</th>                                                                        
					<th scope="col">Remark</th>                                                                                                                            
				</tr>                                                                
			</thead>                                                                <tbody>
				<?php     
				if($supplier_base_assessment_list) {        
					foreach($supplier_base_assessment_list as $sbal) {            
						if($sbal['supplier_base_assessment']['degree_id']==1 || $sbal['supplier_base_assessment']['degree_id']==2) {
				?>                                                                    <tr>                                                                                                                                    <td><?php echo $sbal['question']['sdg_name']; ?>                                                                        
			</td>                                                                        <td><?php echo $sbal['question']['indicator_name']; ?>                                                                                                                                                    
		</td>                                                                        
		<td><?php echo $sbal['question']['question']; ?>                                                                        
	</td>                                                                        
	<td><?php echo $sbal['answer']['answer']; ?>                                                                                                                                                    
</td>                                                                        
<td><div 
<?php if($sbal['supplier_base_assessment']['degree_id']==1){?> class="status_bg high_bg" <?php } ?>
<?php if($sbal['supplier_base_assessment']['degree_id']==2){?> class="status_bg medium_bg" <?php } ?>>
	<?php     
	if($degree) {        
		foreach($degree as $deg) {            
			if($deg['id']==$sbal['supplier_base_assessment']['degree_id']) 
				{                
					echo $deg['name'];            
				}        
			}    
		}
	?>                                                                        
</div>
</td>                                                                           
<td>Document here</td>                                                                           
<td><?php echo $sbal['supplier_base_assessment']['admin_remark']; ?>                                                                                                                                                    
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
<?php 
} 
} 
?>            
</div>                    
</div><!-- color change by toggle btn start -->        
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
<script>            
	var toggle = document.getElementById('toggle_btn')    
	let isToggle = true;    
	function myFunction() {        
		var textArea = document.getElementById('color_change')        
		isToggle = !isToggle        
		if (isToggle) {            
			textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `        } 
			else {            
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
		function saveQuestion(assessment_id,qid,indicator,id,next,choice) {        //let quesitonNumber = $(that).attr('data-question');        
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
			url : "<?php echo base_url();?>/admin/submitSdgAssessmentQuestion/"+assessment_id+"/"+qid+"/"+answer+"/"+remark+"/"+indicator+"/"+choice+"/"+answer_insert_id,            
			type: "POST",            
			//dataType: "JSON",            
			success: function(result){                 
				var obj = JSON.parse(result);                 
				$("#totAnswer"+indicator).html(obj.tot_ans);                 
				$("#totQuestion"+indicator).html(obj.tot_q);                 
				$("#answer_insert_id"+qid).val(obj.insert_id);                 
				$("#tot_attempt_id").html(obj.total_q);
				$("#responseDiv"+qid).html('Answer has been successfully saved');                 
				if(obj.tot_ans==obj.tot_q){                    
					$("#completeImg"+indicator).attr("src","<?php echo base_url();?>/public/brand/assets/custom_img/q_filled.png");                 
				}            
			},        
		});        
// 	$('#accordion-item-icons-'+id).removeClass('show');        
// $('#accordion-item-icons-'+next).addClass('collapse show');    
        $('#accordion-item-icons-'+id).removeClass('show');
        $('#accordion-item-icons-'+next).addClass('collapse show');
}
</script>
<!-- <script>    
var j = jQuery.noConflict();j(document).ready(function(){  
j('#tab2c, #tab3c').hide();        
j('#tab1').click(function(){        j('#tab1c').show();                               
j('#tab2c, #tab3c').hide();                           
});                
j('#tab2').click(function(){        j('#tab2c').show();                               
j('#tab1c, #tab3c').hide();                               
});                
j('#tab3').click(function(){        j('#tab3c').show();                               
j('#tab1c, #tab2c').hide();                               
});});
</script>   
-->
<!-- tooltip start -->
<script>    
	$(document).ready(function(){    
		$('[data-toggle="tooltip"]').tooltip();       
	});
	function verify(){  
		$.ajax({        
			url : "<?php echo base_url()?>/admin/verifyAdvanceAssessment",        
			type: "POST",        
			//dataType: "JSON",        
			success: function(data){          
				// $('#confirm_modal_bdy').html('<p>'+data+'</p><p>Connect your answers with the supporting document from the Documents Library!</p>');        
	   //          setTimeout(function(){ 
	   //            // location.reload();
	   //          }, 3000);
          if(data!="") {
              $('#confirm_modal_spn').html('<p>'+data+'</p>');
          }
          else {
              $('#confirm_modal_spn').html('<p>You have connected all the documents, Your assessment is under verification</p>');
              $("#go_to_upload_doc").hide();
              $("#go_to_base_assess").show();
          }
			},        
			error: function(xhr, status, error){            
				// alert('error');          
				// $('#sdgDiv').html('<option value="">Select Sdg </option>');        
			}    
		});
	}
function checkQuestionCompletion() {
  $.ajax({
        url : "<?php echo base_url()?>/admin/checkQuestionCompletion",
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(parseInt(data.total_question) == parseInt(data.total_attempt)) {
                 // alert('test');
                 // alert(data.total_question);
                 // alert(data.total_attempt);
				$("#tot_attempt_id").html(data.total_attempt);
                $("#submitModalCenter").modal('show');
            }
            else {
                $("#submit_err_msg").html(data.total_attempt+" Out of "+data.total_question+" completed, need to complete remaining question for submit");
                $("#submitErrorModal ").modal('toggle');
            }
        },
        error: function(xhr, status, error){
            // alert('error');
          // $('#sdgDiv').html('<option value="">Select Sdg </option>');
        }
    });
}
</script>   

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
        ['CAN',    80.66,              1.67,      'North America',  33739900],
        ['DEU',    79.84,              1.36,      'Europe',         81902307],
        ['DNK',    78.6,               1.84,      'Europe',         5523095],
        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
        ['GBR',    80.05,              2,         'Europe',         61801570],
        ['IRN',    72.49,              1.7,       'Middle East',    73137148],
        ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
        ['ISR',    81.55,              2.96,      'Middle East',    7485600],
        ['RUS',    68.6,               1.54,      'Europe',         141850000],
        ['USA',    78.09,              2.05,      'North America',  307007000]
      ]);

      var options = {
        title: 'Fertility rate vs life expectancy in selected countries (2010).' +
          ' X=Life Expectancy, Y=Fertility, Bubble size=Population, Bubble color=Region',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var graph2 = {
          series: <?php echo $indicator_value_json;?>,
          chart: {
          height: 350,
          type: 'scatter',
          zoom: {
            enabled: true,
            type: 'xy'
          }
        },
        xaxis: {
          tickAmount: 5,
          // labels: {
          //   formatter: function(val) {
          //     return parseFloat(val).toFixed(1)
          //   }
          // },
          min : 0,
          max : 5,
        },
        yaxis: {
          tickAmount: 5,
          min : 0,
          max : 5,
        }
        };
//     var chart1 = new ApexCharts(document.querySelector("#linechart"), graph1);
     var chart2 = new ApexCharts(document.querySelector("#scaterchart"), graph2);
//    chart1.render();
    chart2.render();
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