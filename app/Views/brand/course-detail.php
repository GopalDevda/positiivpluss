<?= $this->extend('brand/layout/master-page.php') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-ecommerce.min.css')?>">
<?= $this->endSection();?>

<?= $this->section('content') ?>

<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Course Detail</h2>
                  <div class="breadcrumb-wrapper">
                     <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">eCommerce</a>
                        </li>
                        <li class="breadcrumb-item active">Shop
                        </li>
                     </ol> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
               <a href="<?php echo base_url('trainingCourses/training') ?>" class="btn btn-primary waves-effect">
                  <i class="fa-solid fa-arrow-left"></i>&nbsp; Back
               </a>
            </div>
         </div>
      </div>
      <div class="">
         <div class="content-body"><!-- Blog Detail -->
            <div class="blog-detail-wrapper">
              <div class="row">
                <!-- Blog -->
                <div class="col-12">
                  <div class="card">
                    <img
                      src="<?php echo base_url('public/brand/assets/app-assets/images/pages/1.jpg')?>"
                      class="img-fluid card-img-top"
                      alt="Blog Detail Pic"
                    />
                    <div class="card-body">
                      <h4 class="card-title mb-1">The Business Intelligence Analyst Course
                        <button class="btn btn-primary waves-effect waves-float waves-light float-end"><a href="<?php echo base_url('trainingCourses/startcourses');?>">Start</a></button>
                      </h4>
                      <div class="d-flex">
                        <div class="author-info">
                          <small class="text-muted">Jan 10, 2020</small>
                        </div>
                      </div>
                      <p class="card-text mb-2">
                        Before you get into the nitty-gritty of coming up with a perfect title, start with a rough draft: your
                        working title. What is that, exactly? A lot of people confuse working titles with topics. Let's clear that
                        Topics are very general and could yield several different blog posts. Think "raising healthy kids," or
                        "kitchen storage." A writer might look at either of those topics and choose to take them in very, very
                        different directions.A working title, on the other hand, is very specific and guides the creation of a
                        single blog post. For example, from the topic "raising healthy kids," you could derive the following working
                        title See how different and specific each of those is? That's what makes them working titles, instead of
                        overarching topics.
                      </p>
                      <h4 class="mb-75">Unprecedented Challenge</h4>
                      <ul class="p-0 mb-2">
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Preliminary thinking systems</span>
                        </li>
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Bandwidth efficient</span>
                        </li>
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Green space</span>
                        </li>
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Social impact</span>
                        </li>
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Thought partnership</span>
                        </li>
                        <li class="d-block">
                          <span class="me-25">-</span>
                          <span>Fully ethical life</span>
                        </li>
                      </ul>
                      <hr class="my-2" />
                    </div>
                  </div>
                </div>
                <!--/ Blog -->

                <!-- <div class="col-3">
                  <div class="card">
                    
                    <div class="card-body">
                      <button class="btn btn-primary w-100 waves-effect waves-float waves-light">Start</button>
                    </div>
                  </div>
                </div> -->
                
              </div>
            </div>
            <!--/ Blog Detail -->

          </div>
      </div>
      
   </div>
</div>
<!-- END: Content-->


<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/app-ecommerce.min.js')?>"></script>
<?= $this->endSection() ?>

