<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">

<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css')?>">

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- <style>
    .pac-container {
        z-index: 10000 !important;
    }
</style> -->

<div class="app-content content">
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
         if($session->get('success')){?>
         
        <script type="text/javaScript">
       
        var id = '<?=  $session->get('success')?>';
         toastr.success(id, "Success", {

closeButton: !0,

tapToDismiss: !1,

progressBar: !0,

})
         </script>
      <?php } ?>
      <?php
         $session = session();
         if($session->get('error')){?>
      <script type="text/javaScript">
       
       var id = '<?=  $session->get('error')?>';
        toastr.error(id, "Error", {

closeButton: !0,

tapToDismiss: !1,

progressBar: !0,

})
        </script>
      <?php } ?>
      <div class="content-body">
         <!-- Dashboard Ecommerce Starts -->
         <section class="app-user-list">
         <ul class="list-group list-group-flush card">
            <?php foreach($notiData as $greenNoti) { ?>
                <?php if($greenNoti['noti_read'] == 1) { ?>
                    <li class="list-group-item">
                        <p> <span class="text-success" style="font-size: 40px; font-weight: bolder;"> . </span> <?= $greenNoti['msg'] ?> </p> </li>
                <?php }?>
            <?php }?>

            <?php foreach($notiData as $redNoti) { ?>
                <?php if($redNoti['noti_read'] == 0) { ?>
                    <li class="list-group-item">
                        <p> <span class="text-danger" style="font-size: 40px; font-weight: bolder;"> . </span> <?= $redNoti['msg'] ?> </p> </li>
                <?php }?>
            <?php }?>
        </ul>
         </section>
         <!-- Dashboard Ecommerce ends -->
      </div>
   </div>
   
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>
   $(document).ready(function(){
   $('input[class="uuuu"]').click(function(){
   if($(this).prop("checked") == true){
   
   $('.uuuu4').removeAttr('disabled');
   console.log("Checkbox is checked.");
   }
   else if($(this).prop("checked") == false){
   $('.uuuu4').attr('disabled','disabled');
   console.log("Checkbox is unchecked.");
   }
   });
   });
</script>



</script>
<script type="text/javascript">
   $("document").ready(function() {
   $('#hhhh').on('click', function() {
   
    var input = document.getElementById("keyword");
   var autocomplete = new google.maps.places.Autocomplete(input);

        $('#default').modal('show');
   });
   });
</script>
<script type="text/javascript">
   $("document").ready(function() {
   $('select[name="country_idd"]').on('change', function() {
   var tId = $(this).val();
   // alert(tId);
   if (tId) {
   $.ajax({
   url: "<?= base_url('/Supplier/country_city/')?>/" + tId,
   type: "GET",
   dataType: "json",
   success: function(data) {
   $('select[name="state_id"]').empty();
   $('select[name="state_id"]').append(
   '<option value="">Select the State</option>');
   $.each(data, function(key, value) {
   $('select[name="state_id"]').append('<option value="' +
      value.id + '">' + value.name +
   '</option>');
   })
   }
   })

   }
   });
   });
</script>

<!-- BEGIN: Page Vendor JS-->
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
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "ajax": {
            // url: "http://positiivplus.io/brand/get_items/",
            url: "<?php echo base_url()?>/brand/get_items",
            type : 'GET'
        },
        success: function(data){
            console.log(data.result);
        },
    });
});
</script>
// <script>
//   $(document).ready(function() {
//   $('#example').DataTable( {
//     "aLengthMenu": [[100, 500, 1000, -1], [100, 500,1000, "All"]],
//     "pageLength": 100
//     } );
//   });
// </script>
<!-- END: Page Vendor JS-->
<script>
   $(document).ready(function() {
   $('select[name="ed"]').on('change', function() {
   var sId = $(this).val();
   $('#r').show();
   $('#rr').show();
   $('#rrr').show();
   });
   });
</script>
<script>
   const btn = document.querySelector('#btn');
   const radioButtons = document.querySelectorAll('input[name="lease_owned"]');
   btn.addEventListener("click", () => {
   let selectedSize;
   for (const radioButton of radioButtons) {
   if (radioButton.checked) {
   selectedSize = radioButton.value;
   break;
   }
   }
   // show the output:
   output.innerText = selectedSize ? `You selected ${selectedSize}` : `You haven't selected any size`;
   });
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
   function editCompany(that) {
   var id = $(that).attr("data-number");
   var name = $(that).attr("data-name");
   var type = $(that).attr("data-type");
   var address = $(that).attr("data-address");
   // var pin = $(that).attr("data-pin");
   var country_id = $(that).attr("data-country_id");
   var state = $(that).attr("data-state");
   var no_of_employee = $(that).attr("data-no_of_employee");
   var building_size = $(that).attr("data-building_size");
   var unit_id = $(that).attr("data-unit-id");
   // alert(state);
   var lease_ownedd = $(that).attr("data-lease_owned");
   //  var input = document.getElementById("company_address");
   // var autocomplete = new google.maps.places.Autocomplete(input);
   $("#company_id").val(id);
   $("#company_name").val(name);
   
   $("#company_type").val(type);
   var inputs = document.getElementById('site_address');
   var trip_froms = new google.maps.places.Autocomplete(inputs);
   
   if(lease_ownedd == 'Lease'){
   $("#inlineRadio11").prop("checked", true);
   }
   if(lease_ownedd == 'Owned'){
   $("#inlineRadio22").prop("checked", true);
   
   }
   // $("#inlineRadio11").val(lease_ownedd);
   // $("#inlineRadio22").val(lease_ownedd);
   
    $("#company_address").val(address);
   // $("#departure").val(address);
   
   $("#state_iddd").val(state);
   // $("#company_pin").val(pin);
   $('#country_idd').val(country_id);
   $("#total_employees").val(no_of_employee);
   $("#building_size").val(building_size);
   $("#unit_iddd").val(unit_id);
   
    $.ajax({
   url: "<?= base_url('/Supplier/country_city/')?>/" + country_id,
   type: "GET",
   dataType: "json",
   success: function(data) {
   $('select[id="state_iddd"]').empty();
   $('select[id="state_iddd"]').append(
   '<option value="">Select the State</option>');
   $.each(data, function(key, value) {
      var state_id = value.id;
      if(state_id == state){
   $('select[id="state_iddd"]').append('<option selected value="' +
      value.id + '">' + value.name +
   '</option>');
   
}else{
   $('select[id="state_iddd"]').append('<option value="' +
      value.id + '">' + value.name +
   '</option>');
}
   })
   
   }
   })


   $('#docEditePopup').modal('show');

   $('select').select2();
   
   }
   
   function deleteCompany(that) 
   {
   var id = $(that).attr("data-number");
   $("#del_company_id").val(id);
   $("#docDeletePopup").modal('show');
   }
   
   function addSub(that) 
   {
   var id = $(that).attr("data-number");
   var site = $(that).attr("data-nu");
   $("#id").val(id);
   $("#idd").val(site);
   $("#defaulttt").modal('show');
   }
   
   function dele(that)
   {
   var id = $(that).attr("data-id");
   $("#defau").modal('show');
   $('#ideee').val(id);
   }
</script>
<script>
   function setAssessment(assessment_id,date_from,date_to) {
   $("#assessment_id").val(assessment_id);
   $("#date_from").val(date_from);
   $("#date_to").val(date_to);
   }
   function compareWorkplace() {
   var workplaces = new Array();
   var workplace_info = $('input[name="workplace_info"]');
   for (var i = 0; i < workplace_info.length; i++) {
   if (workplace_info[i].checked) {
   workplaces.push(workplace_info[i].value);
   }
   }
   $.ajax({
   type: "POST",
   url: "<?php echo base_url()?>/brand/compareWorkplace",
   data: ({workplaces : workplaces }),
   success: function(data){
   rs = JSON.parse(data);
   var color_arr = ["#C39A4A","#828282","blue","brown","orange"];
   var workplace_name = "";
   var building = "";
   var building_rh_bar_value = "";
   var company_vehicle = "";
   var company_vehicle_rh_bar_value ="";
   var flight = "";
   var flight_rh_bar_value ="";
   var mobile_fuel = "";
   var mobile_fuel_rh_bar_value ="";
   if(rs.workplace_name) {
   for (var i = 0; i < rs.workplace_name.length; i++) {
   if (rs.workplace_name[i]) {
   workplace_name+="<span><span style='background:"+color_arr[i]+"'></span>"+rs.workplace_name[i]+"</span>";
   }
   }
   }
   if(rs.building) {
   for (var i = 0; i < rs.building.length; i++) {
   var building_per = 0;
   if(rs.total_building_footprint && rs.total_building_footprint!=0.00) {
   building_per = Math.round((rs.building[i]*100)/rs.total_building_footprint);
   }
   if (rs.building[i]) {
   building+='<div class="progress-bar" role="progressbar" style="width: '+building_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   building_rh_bar_value+='<span>'+rs.building[i]+' tonne CO2e</span><br>';
   }
   else {
   building+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   building_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.company_vehicle) {
   for (var i = 0; i < rs.company_vehicle.length; i++) {
   var company_vehicle_per = 0;
   if(rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint!=0.00) {
   company_vehicle_per = Math.floor((rs.company_vehicle[i]*100)/rs.total_company_vehicle_footprint);
   }
   if (rs.company_vehicle[i]) {
   company_vehicle+='<div class="progress-bar" role="progressbar" style="width: '+company_vehicle_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   company_vehicle_rh_bar_value+='<span>'+rs.company_vehicle[i]+' tonne CO2e</span><br>';
   }
   else {
   company_vehicle+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   company_vehicle_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.flight) {
   for (var i = 0; i < rs.flight.length; i++) {
   var flight_per = 0;
   if(rs.total_flight_footprint && rs.total_flight_footprint!=0.00) {
   flight_per = Math.floor((rs.flight[i]*100)/rs.total_flight_footprint);
   }
   if (rs.flight[i]) {
   flight+='<div class="progress-bar" role="progressbar" style="width: '+flight_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   flight_rh_bar_value+='<span>'+rs.flight[i]+' tonne CO2e</span><br>';
   }
   else {
   flight+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   flight_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   if(rs.mobile_fuel) {
   for (var i = 0; i < rs.mobile_fuel.length; i++) {
   var mobile_fuel_per = 0;
   if(rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint!=0.00) {
   mobile_fuel_per = Math.floor((rs.mobile_fuel[i]*100)/rs.total_mobile_fuel_footprint);
   }
   if (rs.mobile_fuel[i]) {
   mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: '+mobile_fuel_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
   mobile_fuel_rh_bar_value+='<span>'+rs.mobile_fuel[i]+' tonne CO2e</span><br>';
   }
   else {
   mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
   mobile_fuel_rh_bar_value+='<span>0 tonne CO2e</span><br>';
   }
   }
   }
   $("#show_workplace").html(workplace_name);
   $("#building_progress").html(building);
   $("#building_rh_bar_value").html(building_rh_bar_value);
   $("#flight_progress").html(flight);
   $("#flight_rh_bar_value").html(flight_rh_bar_value);
   $("#company_vehicle_progress").html(company_vehicle);
   $("#company_vehicle_rh_bar_value").html(company_vehicle_rh_bar_value);
   $("#mobile_fuel_progress").html(mobile_fuel);
   $("#mobile_fuel_rh_bar_value").html(mobile_fuel_rh_bar_value);
   $("#docComparePopup").modal('show');
   }
   });
   }
   
   
</script>
<?= $this->endSection() ?>