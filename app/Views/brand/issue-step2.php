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

<h1>Step :2  Investigation Team Formation </h1>

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
  <li ui-sref="secondStep" class="active">
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
                  
                        <form class="add-new-user modal-content pt-0" action="<?php echo base_url() ?>/StepController/step01" method="post"
                    enctype="multipart/form-data">
                            
                            <input type="hidden" name="issue_id" value="<?php echo $ide; ?>">
                            <input type="hidden" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
                            <div class="modal-body flex-grow-1">
<div class="row">
                  <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-fullname">Investigation Team Lead</label>
                                    
                                    <select id="st_2_Inv_t_lead" class="select2 form-select" name="st_2_Inv_t_lead">
                                        <option value="10">Leader</option>
                                       
                                        
                                    </select>
                                </div>
                                </div>

                  <div class="col-md-6 col-12">
                            
                            <div class="mb-1 position-relative">
                                <label for="task-assigned" class="form-label d-block">Investigation Team members*</label>
                                <select class="select2 form-select" id="st_2_Inv_t_memb" name="st_2_Inv_t_memb">
                                    <option value="">Select </option>
                                    <option value="0" <?= $whole1step[0]['st_2_Inv_t_memb']=="0"?'selected':'' ?>>Jenny</option>
                                    <option value="10" <?= $whole1step[0]['st_2_Inv_t_memb']=="10"?'selected':'' ?>>Rohit</option>
                                    <option value="11"<?= $whole1step[0]['st_2_Inv_t_memb']=="11"?'selected':'' ?>>Miracle</option>
                                    <option value="12"<?= $whole1step[0]['st_2_Inv_t_memb']=="12"?'selected':'' ?>>Venture</option>
                                    <option value="13"<?= $whole1step[0]['st_2_Inv_t_memb']=="13"?'selected':'' ?>>Ashhar</option>
                                   
                                </select>
                            </div>
                            </div>
                  <div class="col-md-6 col-12">

                               <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-email">Target Date to complete</label>
                                    <input type="date" id="basic-icon-default-email" value="<?= $whole1step[0]['st_2_target_date_time']?>"class="form-control dt-email"
                                        placeholder="Date-Time" name="st_2_target_date_time" />
                                </div>
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                
                                
                             
                                
                            </div>
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
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


