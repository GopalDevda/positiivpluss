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
    <div class="category_page_header">
        <div class="cph_inner">
            <div class="cph_left">
                <img src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
            </div>
            <div class="cph_right">
                <div class="cph_title">Indicators</div>
                <div class="cph_short_desc"></div>
                <div class="cph_status">
                    <div class="cph_status_left d-flex">
                        <div class="cph_score_icon me-1">
                            <!-- <img src="https://user.positiivplus.io/public/uploads/sdg/1625734091_5869abd34d30ffa92010.jpg" style="width: 39px;"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <?php foreach($Indicator as $vvvvvv){ ?>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card mb-4">
                <?php if($vvvvvv['indicator_category_id'] == '8'){ $Indicator_name = "Environment"; ?>
                <a href="<?php echo base_url().'/environment_indicator_view/'.$vvvvvv['id'];?>" class="myblock1">

                    <?php
                }?> <?php if($vvvvvv['indicator_category_id'] == '9'){ $Indicator_name = "Social";?>
                <a href="<?php echo base_url().'/social_indicator_view/'.$vvvvvv['id'];?>" class="myblock1">
                    <?php
                }?> <?php if($vvvvvv['indicator_category_id'] == '11'){ $Indicator_name = "Governance";?>
                <a href="<?php echo base_url().'/governance_view/'.$vvvvvv['id'];?>" class="myblock1">
                    <?php
                }?>
                    <div class="card-body">
                        <div class="cs_icon">
                            <img src="<?= base_url("/")?>/public/uploads/sdg/<?php echo $vvvvvv['image'] ?>">
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <h6 class="fw-bolder"><?= $Indicator_name; ?></h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    title="Checked" class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle"
                                    src="https://user.positiivplus.io/public/brand/assets/app-assets/images/q_blank.png?v=1"
                                    alt="Avatar" />
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                            <div class="role-heading">
                                <h4 class="fw-bolder text-uppercase font-size-15">
                                <?php echo $vvvvvv['indicator_name']?>            </h4>
                                <!-- <span>
                                    <small class="fw-bolder">Questions Answered</small>
                                </span> -->
                            </div>
                            <!-- <span class="text-body fw-bolder">0/47</span> -->
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
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