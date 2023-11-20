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

<h1>Step :4  Recommended Action(CAPA) </h1>
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
  <li ui-sref="fourthStep" class="active">
    <span data-translate>Recommended Action(CAPA)</span>
  </li>
  <li ui-sref="fifthStep">
    <span data-translate>Review and Closure</span>
  </li>
</ul> 
    <div class="container">
    <div class="row pt-2">

 <?php foreach($j as $k){?>
<div class="col-md-3">
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="text-dark">Title <?php if($k['status'] == '4'){ ?>
        <span class="px-2">Completed</span><i class="fa fa-check px-1" aria-hidden="true"></i></h5>
 <?php }
else{ ?>
      <span class="px-2">Pending</span></h5>  
  <?php  } ?>

    <p class="card-text"><?php echo $k['title']; ?></p>
    <h5 class="text-dark">Assign To</h5>
    <?php foreach($supplier as $v){ ?>
    <?php foreach(json_decode($k['assignee']) as $d){ ?>
        <?php if($d == $v['id']){ ?>
    <p class="card-text"> <?= $v['supplier_name'];?> </p> 
<?php }?>
   <?php
};?>
    
<?php }?>
    <h5 class="text-dark">Description</h5>
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
 
<?php if($com == '1'){?>
<div>
    <form class="add-new-user modal-content pt-0" action="<?= base_url("StepController/approve");?>"
                 method="post" enctype=" multipart/form-data">
            <input type="hidden" id="issue_id" name="issue_id" value="<?php echo $ide; ?>">
                 <input type="hidden" id="stepidfirst_id" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
                 <button type="submit" class="btn btn-primary">submit</button>
     </form>
</div>   
<?php
};?>
 <div class="pt-2">       
 <form class="add-new-user modal-content pt-0" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" id="issue_id" name="issue_id" value="<?php echo $ide; ?>">
        <input type="hidden" id="stepidfirst_id" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
        <p class="dropdown-item btn-primary" data-bs-toggle="modal" data-bs-target="#new-add-task-modal">Action</p>
    </form>  
</div>

            
</div>


<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-add-task-modal">
   <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
         <!-- <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false"> -->
         <form id="" class="todo-modal needs-validation" method='post' action='<?= base_url('StepController/addAction');?>'>
        <input type="hidden" id="issue_id" name="issue_id" value="<?php echo $ide; ?>">
        <input type="hidden" id="stepidfirst_id" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
            <div class="modal-header align-items-center mb-1">
               <h5 class="modal-title">Add Task</h5>
               <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                  <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
               </div>
            </div>
            <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
               <div class="action-tags">
                  <div class="mb-1">

                     <label for="todoTitleAdd" class="form-label">Title</label>
                     <input
                        type="text"
                        id="todoTitleAdd"
                        name="todoTitleAdd"
                        class="new-todo-item-title form-control"
                        placeholder="Title"
                        />
                  </div>
                  <div class="mb-1 position-relative">
                     <label for="task-assigned" class="form-label d-block">Assignee</label>
                     <select class="select2 form-select" id="task-assigned" name="task-assigned[]">
                     <?php
                        foreach($employee_details as $ed){
                           ?>
                           <option value="<?= $ed['id'];?>"><?= $ed['supplier_name'];?></option>
                           <?php
                        } 
                        ?>
                     </select>
                  </div>
                  <div class="mb-1">
                     <label for="task-due-date" class="form-label">Due Date</label>
                     <input type="date" class="form-control task-due-date" id="task-due-date" name="task-due-date"/>
                  </div>
                 <!--  <div class="mb-1">
                     <label for="task-tag" class="form-label d-block">Tag</label>
                     <select class="form-select task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                        <option value="Qualitative">Qualitative</option>
                        <option value="Quantitative">Quantitative</option>
                        <option value="Issue Manager">Issue Manager</option>
                        <option value="Others">Others</option>
                     </select>
                  </div> -->
                  <div class="mb-1">
                     <label class="form-label">Description</label>
                     
                     <!-- <input type="text" name='description' class='form-control' placeholder='Enter description'> -->
                     <textarea name="description" id="" cols="" rows="" class="form-control"></textarea>

                  </div>
                  <div class="mb-1">
                     <label class="form-label">Priority </label>
                     <select class="form-control" name="priority">
                        <option value="">Select Priority</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>
                     </select>
                  </div>
                  
               </div>
               <div class="my-1">
                  <button type="submit" class="btn btn-primary me-1">Add</button>
                  <!-- <button class='btn btn-primary' type='submit'>ok</button> -->
                  <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">
                  Cancel
                  </button>
                  <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
                  <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
                  Delete
                  </button>
               </div>
            </div>
         </form>
         <br><br>
      </div>
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
    var issue_id       = $('#issue_id').val();
    var stepidfirst_id = $('#stepidfirst_id').val();
    var st_4_des       = $('#st_4_des').val();
    var type_control   = $('#type_control').val();
    var responsibility = $('#responsibility').val();
    var date           = $('#date').val();
 
        $.ajax({

            url: "<?= base_url('StepController/step04');?>",

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

<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


