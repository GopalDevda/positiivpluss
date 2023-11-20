<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
<style type="text/css">
 
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">All Notifications</h2>
            <div class="breadcrumb-wrapper">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    $session = session();
    if ($session->get('success')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <?php
    $session = session();
    if ($session->get('error')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <div class="content-body">
     
   
         <!-- Dashboard Ecommerce Starts -->
         <section class="app-user-list">
         <ul class="list-group list-group-flush card">
         <?php foreach($notiData as $redNoti) { ?>
                <?php if($redNoti['noti_read'] == 0) { ?>
                    <li class="list-group-item">
                        <p> <span class="text-success" style="font-size: 40px; font-weight: bolder;"> . </span> <?= $redNoti['msg'] ?> </p> </li>
                <?php }?>
            <?php }?>

            <?php foreach($notiData as $greenNoti) { ?>
                <?php if($greenNoti['noti_read'] == 1) { ?>
                    <li class="list-group-item">
                        <p> <span class="text-danger" style="font-size: 40px; font-weight: bolder;"> . </span> <?= $greenNoti['msg'] ?> </p> </li>
                <?php }?>
            <?php }?>

            

        </ul>
         </section>
         <!-- Dashboard Ecommerce ends -->
      </div>
    
    </div>
    </div>
     </div>
  </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>

<script>

$(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

  $('#step_submit_1').submit(function(e) {
    e.preventDefault();
    let name = $('#name').val(),
      start_date = $('#start_date').val(),
      end_date = $('#end_date').val(),
      standard = $('#standard').val();
    var data = {
      name: name,
      start_date: start_date,
      end_date: end_date,
      standard: standard
    }
    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_1') ?>",
      data: data,
      dataType: "json",
      success: function(response) {
        append = '';
        let data = response['data'];
        $('#step_2_id').val(response['id']);
        $('#standarad_id').val(response['standard']);
        for (i in data) {
          append += `<option value="` + data[i]['id'] + `">` + data[i]['classification_name'] + `</option>`;
        }
        console.log(append);
        $('#select2-multiple').html(append);
      }
    });
  });


  $('#step_submit_2').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_2') ?>",
      data: {
        indicators: $('#select2-multiple').val(),
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },

      success: function(data)
      {
        $('#show_step_3').html(data);
      }
    });
  });
  // alert('xdgfhfdjfiojngfn');

  $('#step_submit_3').submit(function(e) {
    e.preventDefault();

    var fav = [];
$.each($("input[name='subdischeck[]']:checked"), function(){            
    fav.push($(this).val());
});

    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_3') ?>",
      data: {
        sub_dis: fav,
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },
    
      success: function(data) {
      
        $('#show_step_4').html(data);
        // append = '';
        // for (i in data) {
        //   append += `<option value="` + data[i]['id'] + `">` + data[i]['disclosure_name'] + `</option>`;
        // }
        // console.log(append);
        // $('#select2-multiple').append(append);
      }
    });

  });

</script>
<script>
  function sitescheck()
  {
    var fav = [];
$.each($("input[name='sitescheck[]']:checked"), function(){            
    fav.push($(this).val());
});

var fav1 = [];
$.each($("input[name='subdischeck[]']:checked"), function(){            
    fav1.push($(this).val());
});

$.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_4') ?>",
      data: {
        sites: fav,
        sub_dis1:fav1,
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },
    
      success: function(data) {
      
        $('#showClassiData').html(data);

      }
    });

  }
</script>

<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>
  var input = document.getElementById('company_address');
  var company_address = new google.maps.places.Autocomplete(input);
</script>

<script>
  $('.company_pin').keypress(function() {

    var regExp = /[a-z]/i;
    $('.company_pin').on('keydown keyup', function(e) {

      var value = String.fromCharCode(e.which) || e.key; // No letters

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

    var id = $(that).attr("data-number"); // alert(id);    $("#del_employee_id").val(id);    $("#docDeletePopup").modal('show');  }







    function showBoundary(that) {

      var boundary_id = $(that).val(); // alert(boundary_id);    if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {

      $.ajax({

        url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {

          $("#subboundary_id").html(data);
        },
        error: function(xhr, status, error) {

          $('#indicatorDiv').html('<option value="">No data found </option>');
        }

      });
    }

    $.ajax({

      url: "<?php echo base_url() ?>/Controlwork/getIndicatorByboundary/" + boundary_id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {

        $("#indicator").html(data);
      },
      error: function(xhr, status, error) {

        $('#indicator').html('<option value="">No data found </option>');
      }

    });
  }
</script>