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

<h1>Step :3  Root Cause Analysis </h1>
<span>Select reason for the existence of the immediate cause</span>
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
  <li ui-sref="thirdStep" class="active">
    <span data-translate>Root Cause Analysis</span>
  </li>
  <li ui-sref="fourthStep">
    <span data-translate>Recommended Action(CAPA)</span>
  </li>
  <li ui-sref="fifthStep">
    <span data-translate>Review and Closure</span>
  </li>
</ul>     
<form class="add-new-user modal-content pt-0" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="issue_id" value="<?php echo $ide; ?>">
        <input type="hidden" name="stepidfirst_id" value="<?php echo $last_Id; ?>">
            <h3>Machine</h3><hr>            
                            
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
          
          
          
                <input type="checkbox" value="Abuse or Misuse"
<?php foreach ($whole1step as $key => $value) {?>
                 <?php if($value['st_3_m1']=='"Abuse or Misuse"')
                            {
                                'checked';
                            }; ?>  
<?php
                    }?>
                            name="m1[]"><label class="form-label" for="basic-icon-default-fullname" >Abuse or Misuse</label>
                        </div>
                        

                 <div class="mb-1">
                            <input type="checkbox" value="wear & Tear" 
<?php foreach ($whole1step as $key => $value) {?>
                            <?php if($value['st_3_m1']=='"wear & Tear"'){
                                'checked';
                            }; ?> 
                            <?php
                    }?>name="m1[]"><label class="form-label" for="basic-icon-default-fullname">wear & Tear</label>
                        </div>
                        <div class="mb-1">
       <input type="checkbox" value="Engineering" name="m1[]" 
<?php foreach ($whole1step as $key => $value) {?>

        <?php if($value['st_3_m1']=='"Engineering"'){
                                'checked';
                            }; ?>
<?php
                    }?>
                            ><label class="form-label" for="basic-icon-default-fullname">Engineering</label>
                        </div>
                        <div class="mb-1">
                            <input type="checkbox" value="Maintaince" name="m1[]"><label class="form-label" for="basic-icon-default-fullname">Maintaince</label>
                        </div>
                        <div class="mb-1">
                             <textarea name="Machine" id="machine" cols="" rows="" class="form-control">
<?php foreach ($whole1step as $key => $value) {?>


                                <?= $value['st_3_Machine_des'] ?>
                                    
                                    <?php
                    }?>
                                </textarea>
                         </div>
  
                    </div>
                <h3>Man</h3><hr>            
                            
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <input type="checkbox" value="Improper Motivation" name="man1[]"><label class="form-label" for="basic-icon-default-fullname">Improper Motivation</label>
                        </div>
                        <div class="mb-1">
                            <input type="checkbox" value="Physical" name="man1[]"><label class="form-label" for="basic-icon-default-fullname">Physical</label>
                        </div>
                        <div class="mb-1">
                             <textarea name="Man" id="" cols="" rows="" class="form-control">

<?php foreach ($whole1step as $key => $value) {?>

                                <?= $value['st_3_Man_des'] ?>
                                    

                                    <?php
                    }?>
                                </textarea>
                         </div>
                    
                    </div>
                <h3>Material</h3><hr>            
                            
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <input type="checkbox" value="Low Quality" name="Material1[]"><label class="form-label" for="basic-icon-default-fullname">Low Quality</label>
                        </div>
                        <div class="mb-1">
                            <input type="checkbox" value="incorrect" name="Material1[]"><label class="form-label" for="basic-icon-default-fullname">Incorrect</label>
                        </div>
                        <div class="mb-1">
                             <textarea name="Material" id="material" cols="" rows="" class="form-control">
<?php foreach ($whole1step as $key => $value) {?>

                                <?= $value['st_3_Material1_des'] ?>
                                    
                                    <?php
                    }?>
                                </textarea>
                         </div>
                    
                    </div>

                 <h3>Enviroment</h3><hr>            
                                            
                        <div class="modal-body flex-grow-1">
                                 <div class="mb-1">
                                            <input type="checkbox" value="Earthquake" name="Enviroment1[]"><label class="form-label" for="basic-icon-default-fullname">Earthquake</label>
                                 </div>
                                  <div class="mb-1">
                                            <input type="checkbox" value="landslide" name="Enviroment1[]"><label class="form-label" for="basic-icon-default-fullname">landslide</label>
                                  </div>
                                <div class="mb-1">
                                    <textarea name="Enviroment" id="enviroment" cols="" rows="" class="form-control">
<?php foreach ($whole1step as $key => $value) {?>

                                        <?= $value['st_3_Enviroment_des'] ?>
                                            
                                            <?php
                    }?>
                                        </textarea>
                                </div>
                        </div>

                <h3>System</h3><hr>            
                                            
                        <div class="modal-body flex-grow-1">
                             <div class="mb-1">
                                
                                <textarea name="System" id="system" cols="" rows="" class="form-control">
<?php foreach ($whole1step as $key => $value) {?>

                                    <?= $value['st_3_System'] ?>
                                        <?php
                    }?>
                                    </textarea>
                            </div>
                                    
                        </div>
                        

                    <p class="btn btn-primary" id="step3submit">Submit</p>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <!-- <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button> -->
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
    var issue_id = $('input[name="issue_id"]').val();
    var stepidfirst_id = $('input[name="stepidfirst_id"]').val();
    var m1 = $('input[name="m1[]"]:checked').val();
    // alert(m1);
    var machine = $('#machine').val();
    var man1 = $('input[name="man1[]"]:checked').val();
    var man = $('input[name="Man"]').val();
    var Material1  = $('input[name="Material1[]"]:checked').val();
    var Material  = $('#material').val();
    var Enviroment1  = $('input[name="Enviroment1[]"]:checked').val();
    var Enviroment  = $('#enviroment').val();
    var System  = $('#system').val();
 
       // alert(stepidfirst_id);
       



        $.ajax({

            url: "<?= base_url('StepController/step03');?>",

            method: "POST",

            data: {
                issue_id:issue_id,
                stepidfirst_id:stepidfirst_id,
                m1:m1,
                machine:machine,
                man1:man1,
                man:man,
                Material1:Material1,
                Material:Material,
                Enviroment1:Enviroment1,
                Enviroment:Enviroment,
                System:System,
             
            },

            dataType: "json",

            success: function(res) {
                 // console.log(res);
          // res.issue_id;
              i = res.issue_id;
              v = res.stepidfi;
              k = "https://user.positiivplus.io/step4/";
            
                 window.location.href = "https://user.positiivplus.io/step4/" + i + '/' + v;
    
            }

        });

        // }

    });

});

</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


