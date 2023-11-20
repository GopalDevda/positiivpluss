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
  </style>
<?= $this->endSection();?>

<?= $this->section('content') ?>
<div class="app-content content">

<h1>Step :5 Review and Closure </h1>
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
  <li ui-sref="firstStep" class="completed">
    <span data-translate>Incident Report</span>
  </li>
  <li ui-sref="secondStep" class="completed">
    <span data-translate>Investigation Team Formation</span>
  </li>
  <li ui-sref="thirdStep" class="completed">
    <span data-translate>Root Cause Analysis</span>
  </li>
  <li ui-sref="fourthStep" class="completed">
    <span data-translate>Recommended Action(CAPA)</span>
  </li>
  <li ui-sref="fifthStep" class="active">
    <span data-translate>Review and Closure</span>
  </li>
</ul> 
<!-- <form class="add-new-user modal-content pt-0" action="<?= base_url('StepController/step5');?>" method="post" enctype="multipart/form-data">
        <input type="hidden" id="issue_id" name="issue_id" value="<?php echo $ide; ?>">
        <input type="hidden" id="stepidfirst_id" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
            
            <div class="mb-1">
                             <label>Description of the Action</label>

              <textarea name="des_action" id="st_4_des" cols="" rows="" class="form-control">
            <?= $whole1step[0]['st_4_des_action'] ?></textarea>
            </div>
             <div class="mb-1">
            <label>Type of Control</label>

            <input name="type_control" id="type_control" value="<?= $whole1step[0]['st_4_type'] ?>"  class="form-control">
            </div>
            <div class="mb-1">
            <label>Responsibility</label>
            <input name="responsibility" id="responsibility" value="<?= $whole1step[0]['st_4_responsibilty'] ?>"  class="form-control">
            </div>

            
            <div class="mb-1">
            <label>Target Date</label>

     <input type="date" name="date" id="date" value="<?= $whole1step[0]['st_4_target_date'] ?>"  class="form-control">
            </div>
          <div class="mb-1">
            <label>Status</label>
           <select class="form-select" name="status" id="status">
               <option value="Open">Open</option>
               <option value="progress">In progress</option>
               <option value="Completed">Completed</option>
               <option  value="Closed">Closed</option>
           </select>
            </div>
            <div class="mb-1" style="display:none;">
            <label>remark</label>
             <input type="file" name="file" id="file" cols="" rows="" class="form-control"/>
                         </div>
          <div class="mb-1" id="vvvvvv" style="display:none;">
            <label>remark</label>
             <textarea name="remark" id="remark" cols="" rows="" class="form-control"></textarea>
                         </div>
  
             
      <button type="submit" class="btn btn-primary">Save</button>                 
</form>  -->               
<div class="container">
    <div class="row">
<?php foreach($fetchdata as $value){?>
<div class="col-md-3">
<h4>Incident Reporting</h4>
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="text-dark">Incident</h5>
    <p class="card-text">incident </p>
     <h5 class="text-dark">location</h5>
    <p class="card-text"> <?= $value['location'] ?> </p> 
    <h5 class="text-dark">Date_time</h5>
    <p class="card-text"><?= $value['date_time'] ?> </p>

    <h5 class="text-dark">Machine no/Exact location</h5>
    <p class="card-text"><?= $value['mach_no_exa_loc'] ?></p>
    <h5 class="text-dark">Description of Incident</h5>
    <p class="card-text"><?= $value['description'] ?></p>
    <h5 class="text-dark">Extent of Damage</h5>
    <p class="card-text"><?= $value['extend_damage'] ?></p>
    
     <h5 class="text-dark">Immediate action taken</h5>
    <p class="card-text"><?= $value['immediate_action_taken'] ?></p>
  </div>
</div> 
</div> 
<div class="col-md-3">
<h4>Investigation Formation</h4>
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="text-dark">Investigation Team Lead</h5>
    <p class="card-text">leader</p>
     <h5 class="text-dark">Investigation Team members*</h5>
    <p class="card-text"><?= $value['st_2_Inv_t_memb'] ?></p> 
    <h5 class="text-dark">Target Date to complete</h5>
    <p class="card-text"><?= $value['st_2_target_date_time'] ?></p>

  </div>
</div> 
</div>

<div class="col-md-3">
<h4>Root Cause Analysis</h4>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5>Machine</h5>
    <label class="text-dark"><?= $value['st_3_m1'] ?></label>
    <p class="card-text"><?= $value['st_3_Machine_des'] ?></p>
    <h5>Man</h5>

     <label class="text-dark"><?= $value['st_3_man1'] ?></label>
    <p class="card-text"> <?= $value['st_3_Man_des'] ?></p> 

    <h5>Material</h5>
    <label class="text-dark"><?= $value['st_3_Material1'] ?></label>
    <p class="card-text"><?= $value['st_3_Material1_des'] ?></p>

    <h5>Enviroment</h5>
    <label class="text-dark"><?= $value['st_3_Enviroment1'] ?></label>
    <p class="card-text"><?= $value['st_3_Enviroment_des'] ?></p>
    <h5>System</h5>
    <p class="card-text"><?= $value['st_3_System'] ?></p>
  </div>
</div> 
</div>
<div class="accordion-item">
   <h2 class="accordion-header" id="headingMargin1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin1" aria-expanded="false" aria-controls="accordionMargin1">
                            Actions  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                        </button>
                    </h2>
                    <div id="accordionMargin1" class="accordion-collapse collapse" aria-labelledby="headingMargin1" data-bs-parent="#accordionMargin">
                        <div class="accordion-body p-0">
                         <div class="container">
    <div class="row pt-2">

 <?php foreach($j as $k){?>
<div class="col-md-3">
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="text-dark">Title <span class="px-2">Completed</span><i class="fa fa-check px-1" aria-hidden="true"></i></h5>
    <p class="card-text"><?php echo $k['title']; ?> </p>
    <h5 class="text-dark">Assign To</h5>
    <?php foreach($supplier as $v){ ?>
    <?php if($k['assignee'] == $v['id']){ ?>
   
    <div class="media">
        <div class="media-aside align-self-center">
         <a href="#" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
         <span class="b-avatar-img">
         <img src="<?= base_url("/")?>/public/uploads/owner/john.jpg" alt="avatar"></span></a>
         </div>
         <div class="media-body">
           <a href="#" class="fw-bolder d-block text-nowrap text-dark pt-1" target="_self">
            <?php echo $v['supplier_name']; ?> 
                                  <small class="text-muted"><?php 
                                       if($v['role'] == 10){
                                         echo "Admin";
                                       }
                                       elseif($v['role'] == 11){
                                         echo "Manager";
                                       }
                                       elseif($v['role'] == 0){
                                        echo "Owner";
                                      }
                                       elseif($v['role'] == 12){
                                         echo "Emploee";
                                       }
                                       else{
                                         echo "Supplier";
                                       }
                                       ?></small>
                                       </a>
                                            </div>
                                        </div>
<?php }?>
<?php }?>
    <h5 class="text-dark pt-1">Description</h5>
    <p class="card-text"> <?php echo $k['description']; ?></p>
     
    <h5 class="text-dark">Due To</h5>
    <p class="card-text"> <?php echo $k['due_date']; ?> </p>
    <h5 class="text-dark">Priority</h5>
    <p class="card-text"> <?php echo $k['priority']; ?> </p>
  </div>
</div> 
</div> 
<?php }; ?>    
</div> 
</div> 
       </div>
           </div>
         </div>
<?php }?>
</div>           
</div>

<div class="accordion-item pt-2">
   <h2 class="accordion-header" id="headingMargin1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin" aria-expanded="false" aria-controls="accordionMargin">
                            Victim  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                        </button>
                    </h2>
                    <div id="accordionMargin" class="accordion-collapse collapse" aria-labelledby="headingMargin1" data-bs-parent="#accordionMargin">
                        <div class="accordion-body p-0">
                         <div class="container">
    <div class="row pt-2">
<?php foreach($victim_data as $victim){?>
 <div class="col-md-3">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="text-dark">Victim Type</h5>
     <p class="card-text">
     <?php if($victim['victim_type'] == '13'){
      echo 'Supllier';
     }else if($victim['victim_type'] == '12'){echo 'Employee';
     }else if($victim['victim_type'] == '11'){echo 'Manager';
     }else if($victim['victim_type'] == '10'){echo 'Admin';
     }else if($victim['victim_type'] == '0'){echo 'Owner';
     }?>
     </p>

     <label class="text-dark">Victim Name</label>
    <p class="card-text"><?= $victim['victim_name'] ?></p> 
    <h5 class="text-dark">Gender</h5>
    <p class="card-text"><?= $victim['gender'] ?></p>
    <label class="text-dark">Age</label>
    <p class="card-text"><?= $victim['age'] ?></p>
     <h5 class="text-dark">Details of Injury</h5>
    <p class="card-text"><?= $victim['details_injury'] ?></p>
    <h5 class="text-dark">Victim return to work</h5>
    <p class="card-text"><?= $victim['victim_work'] ?></p>
     <h5 class="text-dark">Details of Treatment</h5>
    <p class="card-text"><?= $victim['details_treatment'] ?></p>
  </div>
</div> 
</div>  
<?php
};?>
</div> 
</div> 
       </div>
           </div>
         </div>

<div class="pt-2">
<form class="add-new-user modal-content pt-0" action="<?= base_url('StepController/step5');?>" method="post" enctype="multipart/form-data">
        <input type="hidden" id="issue_id" name="issue_id" value="<?php echo $ide; ?>">
        <input type="hidden" id="stepidfirst_id" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
          
          <div class="mb-1">
            <label>Status</label>
           <select class="form-select" name="status" id="status">
               <option value="Open">Open</option>
               <option  value="Closed">Closed</option>
           </select>
            </div>
            <div class="mb-1" id="vvvvv" style="display:none;">
            <label>Attache File</label>
            <input type="file" name="image">
          </div>
          <div class="mb-1" id="vvvvvv" style="display:none;">
            <label>remark</label>
             <textarea name="remark" id="remark" cols="" rows="" class="form-control"></textarea>
          </div>
          
  
             
      <button type="submit" class="btn btn-primary">Save</button>                 
</form>   
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
<script>
$(document).ready(function() {
    $('.iiiiii').click(function(e) {
        e.preventDefault();
        // alert('ll');
      $('#return_work').show();
   
    });
});
</script>

<script type="text/javascript">

$(document).ready(function() {

    $('#step3submit').on('click', function(e) {

        e.preventDefault();
    var issue_id = $('#issue_id').val();
    var stepidfirst_id = $('#stepidfirst_id').val();

    var st_4_des = $('#st_4_des').val();
    var type_control = $('#type_control').val();
   

   
    var responsibility  = $('#responsibility').val();
    
    var date  = $('#date').val();
 
        $.ajax({

            url: "<?= base_url('StepController/step4');?>",

            method: "POST",

            data: {
                 issue_id:issue_id,
                stepidfirst_id:stepidfirst_id,
                st_4_des:st_4_des,
                type_control:type_control,
                responsibility:responsibility,
                date:date,
               
            },

            dataType: "json",

            success: function(res) {
              
                // window.location.href = "https://user.positiivplus.io/step4/62/5";
    $('#fffff').show();
            }

        });

       

    });

});
</script>
<script>
$(document).ready(function() {
    $('select[name="status"]').on('change', function() {
        var sId = $(this).val();
       if(sId == 'Closed'){
      $('#vvvvvv').show();
      $('#vvvvv').show();

        
       }
   
    });
});
</script>

<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


