<?php 
use App\Models\ActionCenterModel;

?>

<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
 <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="assets/header.css">
  <style>
      ul.wizard,
ul.wizard li {
  margin: 0;
  padding: 0;
  display: flex;

  width: 100%;
}

ul.wizard {
  counter-reset: num;
  margin: 26px 0px;
}

ul.wizard li {
  flex-direction: column;
  align-items: center;
  position: relative;
}


/* Cerchio*/

ul.wizard li::before {
  counter-increment: num;
  content: counter(num);
  width: 1.5em;
  height: 1.5em;
  text-align: center;
  line-height: 1.5em;
  border-radius: 50%;
  background: #c1c1c1;
  cursor: pointer;
}


/* Linea */

ul.wizard li ~ li::after {
  content: '';
  position: absolute;
  width: 100%;
  right: 50%;
  height: 4px;
  background-color: #c1c1c1;
  top: calc(0.75em - 2px);
  z-index: -1;
}


/* Tutte le righe che vengono dopo l'ultimo completed */

ul.wizard li.completed ~ li::after {
  content: '';
  position: absolute;
  width: 100%;
  right: 50%;
  height: 4px;
  background-color: #c1c1c1;
  top: calc(0.75em - 2px);
  z-index: -1;
}

ul.wizard li.active::before {
  background: #defe73;
  color: #222;
}

ul.wizard li.active::after {
  background: #246E9E;
  color: white;
}

ul.wizard span {
  color: #333;
  font-size: 12px;
  word-break: break-all;
}


/*  updated sample  */


/*  number and circle  */

ul.wizard li.completed::before {
  background: #262626;
  color: #fff;
}

ul.wizard li.completed span {
  /*  text  */
  color: #000;
}

ul.wizard li.completed + li::after {
  /*  line after circle  */
  background: #262626;
}

ul.wizard li.completed::after {
  /*  line before circle  */
  background: #68e870;
}


        .con {

  max-width: 600px;

  position: relative;

}



.dot {

  background: red;

  border-radius: 50%;

  height: 20px;

  position: absolute;

  width: 20px;

}



.dot1 {

  top: 14%;

  left: 25%;


}
#text{
 word-wrap: 30px;

}


.dot2 {

  top: 6%;

  left: 25%;

}

.dotleg{

  top: 90%;

  right: 75%;

}

.dotleg2{

  top: 90%;

  right: 68%;

}

.dotleg3{

  top: 75%;

  right: 75%;

}
.textareaaaaa{

   word-spacing: 30px;
}
.dotleg4{

  top: 75%;

  right: 68%;

}

.dotleg5{

  top: 58%;

  right: 76%;

}
.dotleg6{

  top: 58%;

  right: 66%;

}

.dothip{

  top: 45%;

  right: 79%;

}
.dothip2{

  top: 45%;

  right: 64%;

}
.dotback{

  top: 40%;

  right: 71%;

}
.dotback2{

  top: 33%;

  right: 71%;

}
.dotback3{

  top: 23%;

  right: 71%;

}
.dotshoulder{

  top: 23%;

  right: 59%;

}
.dotshoulder2{

  top: 23%;

  right: 85%;

}


.dot3 {

  bottom: 40%;

  left: 50%;

}

.dotfEar{

  top: 10%;

  left: 65%;
}
.dotfEar2{

  top: 10%;

  left: 77%;
}
.dotfMouth{

  top: 13%;

  left: 72%;
}
.dotfEye{

  top: 9%;

  left: 69%;
}
.dotfEye2{

  top: 9%;

  left: 73%;
}
.dotfHead{

  top: 4%;

  left: 71%;
}
.dotfAdams{

  top: 17%;

  left: 73%;
}
.dotfshoulder{

  top: 22%;

  left: 58%;
}
.dotfshoulder2{

  top: 22%;

  left: 84%;
}
.dotfchest{

  top: 25%;

  left: 74%;
}
.dotfElbow{

  top: 29%;

  left: 57%;
}
.dotfElbow2{

  top: 29%;

  left: 86%;
}
.dotfForearm{

  top: 41%;

  left: 56%;
}.dotfForearm2{

  top: 40%;

  left: 86%;
}

.dotfUmbilicus{
top: 40%;

  left: 71%;

}
.dotfPenis{
top: 46%;

  left: 73%;

}

.dotfThigh{
top: 56%;

  left: 66%;

}

.dotfThigh2{
top: 56%;

  left: 76%;

}
.dotfKnee{
top: 68%;

  left: 68%;

}
.dotfKnee2{
top: 68%;

  left: 75%;

}
.dotfCalf{
top: 78%;

  left: 68%;

}
.dotfCalf2{
top: 78%;

  left: 75%;

}
.dotfFoot{
top: 89%;

  left: 68%;

}
.dotfFoot2{
top: 89%;

  left: 75%;

}


img {

  width: 100%;

}

  </style>

<?= $this->endSection();?>

<?= $this->section('content') ?>
<div class="app-content content">

<h1>Incident Reporting Form</h1>

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
         if($session->get('item')){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
            <strong>Success!</strong><?php echo session()->getFlashdata('item') ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <ul class="wizard">
  <li ui-sref="firstStep" class="active">
    <span data-translate>Incident Report</span>
  </li>
  <li ui-sref="secondStep">
    <span data-translate>Investigation Team Formation</span>
  </li>
  <li ui-sref="thirdStep">
    <span data-translate>Root Cause Analysis</span>
  </li>
  <li ui-sref="fourthStep">
    <span data-translate>Recommended Action(CAPA)</span>
  </li>
  <li ui-sref="fifthStep">
    <span data-translate>Review and Closure</span>
  </li>
</ul>
<div class="container">           
    <form class="add-new-user modal-content pt-0" action="<?php echo base_url() ?>/StepController/step" method="post"
                    enctype="multipart/form-data">
                            
                            <input type="hidden" name="issue_id" value="<?php echo $ide; ?>">
                            <div class="modal-body flex-grow-1">

                <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-fullname">Select Type of Incident</label>
                                    
                                    <select id="country" class="select2 form-select" name="incident">
                                        <option value="10">incident</option>
                                       
                                        
                                    </select>
                                </div>
                                </div>
                  <div class="col-md-6 col-12">
                            
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-uname">Name Location</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                        placeholder="Name Location" value="<?= $whole1step[0]['location']?>" name="location" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-email">Date-Time</label>
                                    <input type="date" id="basic-icon-default-email" value="<?= $whole1step[0]['date_time']?>"class="form-control dt-email"
                                        placeholder="Date-Time" name="date_time" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-fullname">Select Shift</label>
                                    
                                    <select id="country" class="select2 form-select" name="shift">
                                        <option value="shift">Shift</option>
                                     
                                    </select>
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-company">Machine no/Exact location</label>
                                    <input type="text" id="basic-icon-default-company" value="<?= $whole1step[0]['mach_no_exa_loc']?>" class="form-control dt-contact"
                                        placeholder="Machine no/Exact location" name="mac_exa_loc" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                               <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-company">Description of Incident</label>
                                    <input type="text" id="basic-icon-default-company" value="<?= $whole1step[0]['description']?>"class="form-control dt-contact"
                                        placeholder="Descrption" name="descrption" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                               <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-company">Extent of Damage</label>
                                    <input type="hidden" name="stepdatas" value="<?php echo $last_Id; ?>">
                                    <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                        placeholder="Extent of Damage"value="<?= $whole1step[0]['extend_damage']?>"  name="damage" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-company">Immediate action taken</label>
                                    <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                        placeholder="Immediate action taken"value="<?= $whole1step[0]['immediate_action_taken']?>" name="action_taken" />
                                </div>
                                </div>
                  <div class="col-md-6 col-12">

                                <div class="mb-1">
                                  
                       <label class="form-label" for="basic-icon-default-company">Where There any Victims</label>
                    <div class="">
                   
                    <p class="dropdown-item" data-bs-toggle="modal" data-bs-target="#new-add-task-modal">Yes</p>
                     <span class="">No</span>
                    </div> 
                                      
                                    
                                </div>
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                               
                                
                            </div>
     </form>
                   
</div>
                
</div>

<!-- side bar victim model -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-add-task-modal">
      <form id="" class="todo-modal needs-validation" method='post' action='<?= base_url('StepController/victim');?>'>
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <!-- <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false"> -->
          
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Add Victim</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                    </div>
                </div>
                            <input type="hidden" name="issue_id" value="<?php echo $ide; ?>">
                            <input type="hidden" name="stepdataIds1" value="<?php echo $last_Id; ?>">

                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <div class="action-tags">
                        <div class="mb-1 position-relative">
                            <label for="task-assigned" class="form-label d-block">Select Victim</label>
                            <select class="select2 form-select" id="victim" name="victim">
                                <option value="">Select Victim</option>
                                <option value="0">Owner</option>
                                <option value="10">Admin</option>
                                <option value="11">Manager</option>
                                <option value="12">Employee</option>
                                <option value="13">Supllier</option>
                               
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="todoTitleAdd" class="form-label">Name of Victim</label>
                            <input type="text" id="name_victim" value="" name="name_victim" class="new-todo-item-title form-control"
                                placeholder="Victim name" />
                        </div>
                        
                        
                <div class="mb-1">
                     <label for="task-tag" class="form-label">Gender</label>
                     <select class="form-control"  name="gender">
                       <option value="">Select Gender</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                        <option value="Others">Others</option>
                     </select>
                  </div>
                        
                        <div class="mb-1">
                            <label class="form-label">Range</label>

                            <input type="range" name="age_range" value="">
                            <!-- <textarea name="description" id="" cols="" rows="" class="form-control"></textarea> -->

                        </div>
                        <div class="mb-1">
                            <label class="form-label">Details of Injury</label>
                             <textarea name="detail_injury" id="" cols="" rows="" class="form-control"></textarea> 

                        </div>
                      <div class="mb-1">
                            <label class="form-label" style="margin-bottom: 10px;">Body Mark</label>
                            <div class="demo-inline-spacing mb-3">
                                <div class="form-check form-check-inline mt-0">
                                    <p class="iii">yes</p>     
                                </div>
                                <div class="form-check form-check-inline mt-0">
                                    <p class="form-check-input" name="inlineRadioOptions"
                                        id="inlineRadio2">NO</p> 
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mybg text-white text-center d-block">
                    <h5 class="modal-title">Body Mark</h5>
            </div>
               
                 <div class="con">


  <div class="dot dot1"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="neck"></div>
  <div class="dot dot2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="head"></div>
  <div class="dot dotleg"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftleg"></div>
  <div class="dot dotleg2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightleg"></div>
  <div class="dot dotleg3"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftcalf"></div>
  <div class="dot dotleg4"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightcalf"></div>

  <!-- <div class="dot dotleg5"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]"></div>
  <div class="dot dotleg6"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]"></div> -->

  <div class="dot dotleg5"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftthigh"></div>
  <div class="dot dotleg6"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightthigh"></div>
  <!-- uper -->
  <div class="dot dothip"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="lefthip"></div>
  <div class="dot dothip2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="righthip"></div>
  <div class="dot dotback"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="lumber"></div>
  <div class="dot dotback2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="back"></div>
  <div class="dot dotback3"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="shoulderblade"></div>
  <div class="dot dotshoulder"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightshoulder"></div>
  <div class="dot dotshoulder2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftshoulder"></div>
  <!-- Front Uper -->
  <div class="dot dotfEar"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftear"></div>
  <div class="dot dotfEar2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightear"></div>
  <div class="dot dotfMouth"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="mouth"></div>
  <div class="dot dotfEye"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="righteye"></div>
  <div class="dot dotfEye2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="lefteye"></div>
  <div class="dot dotfHead"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="head"></div>
  <div class="dot dotfAdams"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="adams"></div>
  <div class="dot dotfshoulder"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightshoulder"></div>
  <div class="dot dotfshoulder2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftshoulder"></div>
  <div class="dot dotfchest"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="chest"></div>
  <div class="dot dotfElbow"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightelbow"></div>
  <div class="dot dotfElbow2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftelbow"></div>
  <div class="dot dotfForearm"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="forearm"></div>
  <div class="dot dotfForearm2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="forearm2"></div>
  <div class="dot dotfUmbilicus"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="umbilicus"></div>
  <div class="dot dotfPenis"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="penis"></div>
  <div class="dot dotfThigh"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightThigh"></div>
  <div class="dot dotfThigh2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftThigh"></div>
  <div class="dot dotfKnee"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightknee"></div>
  <div class="dot dotfKnee2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftknee"></div>
  <div class="dot dotfCalf"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightcalf"></div>
  <div class="dot dotfCalf2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftcalf"></div>
  <div class="dot dotfFoot"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="rightfoot"></div>
  <div class="dot dotfFoot2"><input type="checkbox" id="myCheck" onclick="myFunction()" name="body_mark[]" value="leftfoot"></div>

  <img src="https://user.positiivplus.io/report_design/demo4/body-mark.jpeg" />
</div> 

<div class="card shadow-none bg-transparent border-secondary">
<div class="card-body"><h4 class="card-title" id="text" style="word-spacing:30px;"></h4></div>
</div>

            </div>
        </div>
    </div>

 </div>
                        <div class="mb-1">
                            <label class="form-label" style="margin-bottom: 10px;">What was Victim taken</label>
                            <div class="demo-inline-spacing mb-3">
                                <div class="form-check form-check-inline mt-0">
                                    <p class="iiiiii">yes</p>
                                    <!-- <label class="form-check-label" for="inlineRadio1">Yes</label>  -->
                                </div>
                                <div class="form-check form-check-inline mt-0">
                                    <p class="form-check-input" name="inlineRadioOptions"
                                        id="inlineRadio2">NO</p>
                                    <!-- <label class="form-check-label" for="inlineRadio2">No</label> -->
                                </div>
                            </div>
                        </div>
                        <div class="mb-1" id="return_work" style="display:none;">
                     <label for="task-tag" class="form-label">When did the victim return to work</label>
                     <select class="form-control"  name="vic_days">
                       <option value="Same Day"<?= $whole1step[0]['hospitalized']=='Same Day'?'selected':'' ?>>Same Day</option>
                       <option value="Next Day" <?= $whole1step[0]['hospitalized']=="Next Day"?'selected':'' ?>>Next Day</option>
                       <option value="Within 2 Days"<?= $whole1step[0]['hospitalized']=="Within 2 Days"?'selected':'' ?>>Within 2 Days</option>
                       <option value="After 2 Days"<?= $whole1step[0]['hospitalized']=="After 2 Days"?'selected':'' ?>>After 2 Days</option>
                       <option value="Didn't Return"<?= $whole1step[0]['hospitalized']=="Didn't Return"?'selected':'' ?>>Did'nt return</option>
                     </select>
                  </div>

                  <div class="mb-1">
                            <label class="form-label">Details of Treatment</label>
                             <textarea name="treatment" id="" cols="" rows="" class="form-control"></textarea> 

                        </div>
                    </div>
                    <div class="my-1">
                        <button type="submit" class="btn btn-primary me-1">Add</button>
                        <button type="button" class="btn btn-outline-secondary add-todo-item d-none"
                            data-bs-dismiss="modal">
                            Cancel
                        </button>
                        
                    </div>
                </div>
            </form>
            <br><br>
            
                 
        </div>
    </div>
</div>


<!-- end side bar victim -->

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
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<!-- barchart script-->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- <script>
function myFunction(that) {
  // alert(that);
  // $v = $("#").val();
console.log($v) 
 // alert(checkBox);
  var text = document.getElementById("text");
  
}
</script> -->
<!-- <script>

$(document).ready(function(){            

  $("#myCheck").click(function(){          
   
  var testval = [];

     $('#myCheck:checked').each(function() {

       testval.push($(this).val());

     });

  $("#text").text(testval);

 });

});
</script> -->
<script>

function myFunction() {
  // Get the checkbox
var checkBox = document.getElementById("myCheck");
// var id = $(this).val();
// alert(id);
 var testval = [];
     $('#myCheck:checked').each(function() {
      
       testval.push($(this).val());

     });
      // alert(testval);

  $("#text").text(testval);
}
</script>

<script>
$(document).ready(function() {
    $('.iiiiii').click(function(e) {
        e.preventDefault();
      $('#return_work').show();
   
    });
});
</script>
<script>
$(document).ready(function() {
    $('.iii').click(function(e) {
        e.preventDefault();
        // alert('ll');

    $('#myModal1').modal('show');
      // $('#myModal1').show();
   
    });
});
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


