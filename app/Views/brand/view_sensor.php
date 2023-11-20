<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<style>
  p.fs {
    font-size: 9px!important;
}
</style>
<?= $this->endSection();?>
<?= $this->section('content') ?>



<div class="modal fade" id="default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add</h4>

            </div>
            <div class="modal-body">
                <h5>Weather</h5>
              <img id="weather" style="width: 125px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg"> 

              <h5>I Auditor</h5>
              <img style="width: 125px;" src="https://app.safetyculture.com/static/media/sensor-definium.35422901..svg"> 
                <h5>I custom</h5>
              <img style="width: 125px;" src="https://app.safetyculture.com/static/media/sensor-iauditor-icon.f3c5c285..svg"> 
            
        </div>
    </div>
</div>
</div>


<div class="app-content content">
 

	<div class="row">
   <div class="content-wrapper container-xxl p-0">

    <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"></h2>
                            <div class="breadcrumb-wrapper">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                             <?php  if($add == 1) { ?>
                            <button type="button" class="btn btn-primary waves-effect cc" data-bs-toggle="modal"
                                data-bs-target="#default">
                                <i class="fa-solid fa-plus"></i> Add Sensor </button>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
   	

           <div class="pt-5">
  
       
          <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab-fill"
                data-bs-toggle="tab"
                href="#home-fill"
                role="tab"
                aria-controls="home-fill"
                aria-selected="true"
                >Sensors</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="profile-tab-fill"
                data-bs-toggle="tab"
                href="#profile-fill"
                role="tab"
                aria-controls="profile-fill"
                aria-selected="false"
                >Alert History</a>
            </li>
          </ul>

          <!-- Tab panes -->
         <div class="tab-content pt-1">
            <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
             <section class="app-user-list">
          
                <?php if($kk){?>
<div class="card">
  <div class="card-body">
    <div class="container">
    <div class="row">
      <div class="col-md-2">
 <img  style="width: 100px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg">
    </div>
    <div class="col-md-2">

    </div>
        <div class="col-md-2">
<h6>Place</h6>
<h3><?php echo json_encode($kk->name); ?></h3>  
    </div>
    <div class="col-md-2">
<h6>Temperature</h6>
<h3><?php $i =  json_encode($kk->main->temp-'273.15'); ?>
      <?php echo number_format($i,2); ?>       
 <span>'C</span></h3>  
    </div>
<div class="col-md-2">
<h6>Wind</h6>
<h3>W <?php echo json_encode($kk->wind->speed);  ?> <span>KM/h</span></h3>
      
    </div>
    <div class="col-md-2">
<h6>Humidity</h6>
<h3><?php echo json_encode($kk->main->humidity);  ?>  <span>% RH</span></h3>
      
    </div>

 
</div>
</div>

  </div>
  </div>



<?php
}else{?>
    
<div class="pt-3">
  <?php foreach ($weather_ap as $key => $value) {?>

 <div class="rohit" data-id="<?php echo $value['id']; ?>">

<div class="card">
  <span class="px-3">Last read at 
    <?php $input =$value['updated_at'];
$date = time();
echo date('d M Y h:i A', $date);

  ?></span>
  <div class="card-body">
<div class="container">
    <div class="row">

      <div class="col-md-2">
<img style="width: 100px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg"> 
    </div>
    <div class="col-md-2">
<input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">

    </div>
        <div class="col-md-2">
<input type="hidden" class="id_weatherrr" value="<?php echo $value['id']; ?> ">
<h6>Place</h6>

<h3><?php echo $value['city_name']; ?></h3> 
    </div>
    <div class="col-md-2">
<h6>Temperature</h6>
<h3><?php echo $value['temp']; ?> <span>'C</span></h3>  
    </div>
<div class="col-md-2">
<h6>Wind</h6>
<h3>W <?php echo $value['wind'];  ?> <span>KM/h</span></h3>
      
    </div>
    <div class="col-md-2">
<h6>Humidity</h6>
<h3><?php echo $value['humidity'];  ?>  <span>% RH</span></h3>
      
    </div>
        



</div>
</div>
</div>

  </div>

  </div>

<?php
}?>
   </div>

  <?php 
}?>

 
         </section>
            </div>
            

            
           <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                
            <!-- list and filter start -->
              <section class="app-user-list">
            <!-- list and filter start -->
            <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>Sensor</th>
                           <th>Location</th>
                           <th>Alert Type</th>
                           <th>Started</th>
                           <th>Status</th>
                           <th>Duration</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach($alert_noti as $weather){?>

                        <tr>  

                            <td>Weather</td>
<?php foreach($weather_api as $weath){?>
  <?php if($weath['id'] == $weather['weather_id']){?>

  
                            <td><?php echo $weath['city_name']; ?></td>
                            <?php
                          }?>
                            <?php
                          }?>

                            <td><?php echo $weather['name']; ?></td>
                            <td><?php $input =$weather['deleted_at'];
$date = strtotime($input);
echo date('d M Y h:i', $date);

  ?></td>
                            <td>
                              <p class="btn-primary">Past-Alert<p>
                            </td>
                            <td>13 hrs 59 min</td>
                            <td>Complete</td>
                         
                            <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                    <i data-feather="more-vertical">view Chart</i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?= base_url('view_weather_data')."/".$weather['weather_id'];?>">
                                    <i data-feather="eye" class="me-50"></i>
                                    <span>view chart</span>
                                    </a>
                                </div>
                                </div>
                            </td>
                         
                        </tr>
                        <?php
                      }?>
                             
                                
                        
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- list and filter end -->
        
                  
               </div>
            </div>
            <!-- list and filter end -->
         </section>
            </div>
            
            
          </div>


  </div>
  


</div>


	


	


<?= $this->endSection(); ?>
<?= $this->section('script') ?>


<script>
$(document).ready(function() {
    $(document).on('click', '.rohit', function(event) {
        event.preventDefault();

        var id = $(this).data('id');
       
         
       
   window.location.href = "/view_weather_data/" + id;
       


      
    });
});
</script>

<script type="text/javascript">

$("document").ready(function() {
 
    $('#weather').on('click', function() {
      // alert('l');
   window.location.href = "/weather";
        
    });
 });

</script>
<?= $this->endSection(); ?>

