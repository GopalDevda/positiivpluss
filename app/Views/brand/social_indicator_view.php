<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">
<div class="content-wrapper">

 <section id="nav-filled">
  <div class="row match-height">
    <!-- Filled Tabs starts -->
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?= $name ?></h4>
        </div>
        <div class="card-body">
          <!-- Nav tabs -->
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
                >Introduction</a
              >
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
                >Road Map</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="messages-tab-fill"
                data-bs-toggle="tab"
                href="#messages-fill"
                role="tab"
                aria-controls="messages-fill"
                aria-selected="false"
                >KPIS</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="settings-tab-fill"
                data-bs-toggle="tab"
                href="#settings-fill"
                role="tab"
                aria-controls="settings-fill"
                aria-selected="false"
                >Action</a
              >
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content pt-1">
            <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
             <?php if($list){?> <p>
                Category Name : <b><?= $list[0]['indicator_category_name']?></b>
              </p>
              <p>
                Image : <img src="<?php echo base_url().'/public/uploads/sdg/'.$list[0]['image'];?>" style="width: 70px;">
              </p>
              <p><b>Description</b>
                <?= $list[0]['description']?>
              </p>
              <p><b>SDG</b><ul>
                <?php $sdg=$list[0]['sdg'];
                foreach($sdg as $key=>$gds){
                  
                    
    echo '<li>'.$gds['sdg_name'].'</li>';
   }
                ?>
              </p></ul><?php }else{echo "No SDG Connected";} ?>
            </div>
            <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
              <p>
                Bear claw jelly beans wafer pastry jelly beans candy macaroon biscuit topping. Sesame snaps lemon drops
                donut gingerbread dessert cotton candy wafer croissant jelly beans. Sweet roll halvah gingerbread bonbon
                apple pie gummies chocolate bar pastry gummi bears.
              </p>
              <p>
                Croissant danish chocolate bar pie muffin. Gummi bears marshmallow chocolate bar bear claw. Fruitcake
                halvah chupa chups dragée carrot cake cookie. Carrot cake oat cake cake chocolate bar cheesecake. Wafer
                gingerbread sweet roll candy chocolate bar gingerbread.
              </p>
            </div>
            <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
              <p>
                Croissant jelly tootsie roll candy canes. Donut sugar plum jujubes sweet roll chocolate cake wafer. Tart
                caramels jujubes. Dragée tart oat cake. Fruitcake cheesecake danish. Danish topping candy jujubes. Candy
                canes candy canes lemon drops caramels tiramisu chocolate bar pie.
              </p>
              <p>
                Gummi bears tootsie roll cake wafer. Gummies powder apple pie bear claw. Caramels bear claw fruitcake
                topping lemon drops. Carrot cake macaroon ice cream liquorice donut soufflé. Gummi bears carrot cake
                toffee bonbon gingerbread lemon drops chocolate cake.
              </p>
            </div>
            <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
              <p>
                Candy canes halvah biscuit muffin dessert biscuit marzipan. Gummi bears marzipan bonbon chupa chups
                biscuit lollipop topping. Muffin sweet apple pie sweet roll jujubes chocolate. Topping cake chupa chups
                chocolate bar tiramisu tart sweet roll chocolate cake.
              </p>
              <p>
                Jelly beans caramels muffin wafer sesame snaps chupa chups chocolate cake pastry halvah. Sugar plum
                cotton candy macaroon tootsie roll topping. Liquorice topping chocolate cake tart tootsie roll danish
                bear claw. Donut candy canes marshmallow. Wafer cookie apple pie.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Filled Tabs ends -->

    
  </div>
</section>
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
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<script>
   $(document).ready(function() {
       $('#example').DataTable();
   });
</script>

<?= $this->endSection() ?>