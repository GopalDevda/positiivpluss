
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">
	<div class="row">
   <div class="content-wrapper container-xxl p-0">
<div>
<div class="layout-styled__InstructionsSection-sc-jd69t2-4 ewzRAJ">
        
       


	<div class="layout-styled__InstructionsContainer-sc-jd69t2-5 enJjtO">
		<h3 class="typography__H3-sc-rmkozr-2 dtcQgF step-title">Step 1: Select the location you want to capture weather data for</h3>
		<div role="main" class="info-card__InfoCard-sc-1wjhtoo-0 layout-styled__Instructions-sc-jd69t2-6 iFZWMi fxHgll">
		<div class="typography__Label-sc-rmkozr-7 gAMBnx">Location / address</div>
		<div><div class="location-picker-styled__ButtonsContainer-sc-crvint-0 bPtmya buttons-container">
			    <form class="form" method="post" action="<?php echo base_url() ?>/Sensor/weather_api" enctype="multipart/form-data">
			    	 <div class="pb-4">
			    	 	<div class="row">
                           <div class="col-md-6">
                            <label class="form-label">Site </label>
                            <select class="form-control" name="site_name">
                            	<option value="">Select Site</option>

                            	<?php foreach ($site_name as $key => $value) {?>
                       
                             
                             
                              <?php if($value['id'] == $sensor){?>
                                <option selected value="<?php echo $value['id'];?>"><?php echo $value['cp_name'];?></option>
                               <?php  }
                                 else{?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['cp_name'] ?></option>

                                <?php
                                 }?>
                         
                                <?php
                            }?>

                            </select>
                            </div>
                           <div class="col-md-6">

				<p class="btn btn-primary" id="site_show">Manualy</p>
			
                        </div>

                        </div>
                     </div>
			<div class="col-md-6">
				<input class="form-control" placeholder="Type City" name="api" type="text" id="show"  style="display: none;">
				<button type="submit">search</button>
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		</div>

<?= $this->endSection(); ?>



<?= $this->section('script') ?>
<script type="text/javascript">

$("document").ready(function() {
 
    $('#site_show').on('click', function() {
    	
  $('#show').show();
        
    });
 });

</script>


<?= $this->endSection(); ?>
