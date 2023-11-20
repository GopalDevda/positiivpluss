<?= $this->extend('brand/layout/master-page.php') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-ecommerce.min.css')?>">
<?= $this->endSection();?>

<?= $this->section('content') ?>
<!-- Request Modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Request</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/workforces/createemployee" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="Emp_Id" required="" maxlength="20">
                     </div>
                  </div>
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Description</label>
                        <textarea class="form-control"></textarea>
                     </div>
                  </div>
                  
               </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- End Request Modal -->
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Training</h2>
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
               <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
              <i class="fa-solid fa-plus"></i> Request
              </button>
            </div>
         </div>
      </div>
      <div class="">
         <div class="content-body">
            <!-- E-commerce Content Section Starts -->
            <section id="ecommerce-header">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="ecommerce-header-items">
                        <div class="result-toggler">
                           <button class="navbar-toggler shop-sidebar-toggler" type="button" data-bs-toggle="collapse">
                           <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                           </button>
                           <div class="search-results">16285 results found</div>
                        </div>
                        <div class="view-options d-flex">
                           <div class="btn-group dropdown-sort">
                              <button
                                 type="button"
                                 class="btn btn-primary dropdown-toggle"
                                 data-bs-toggle="dropdown"
                                 aria-haspopup="true"
                                 aria-expanded="false"
                                 >
                              <span class="active-sorting">Featured</span>
                              </button>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#">Featured</a>
                                 <a class="dropdown-item" href="#">Lowest</a>
                                 <a class="dropdown-item" href="#">Highest</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- E-commerce Content Section Starts -->
            <!-- background Overlay when sidebar is shown  starts-->
            <div class="body-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->
            <!-- E-commerce Search Bar Starts -->
            <section id="ecommerce-searchbar" class="ecommerce-searchbar">
               <div class="row mt-1">
                  <div class="col-sm-12">
                     <div class="input-group input-group-merge">
                        <input
                           type="text"
                           class="form-control search-product"
                           id="shop-search"
                           placeholder="Search Course"
                           aria-label="Search..."
                           aria-describedby="Course-search"
                           />
                        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                     </div>
                  </div>
               </div>
            </section>
            <!-- E-commerce Search Bar Ends -->
            <!-- E-commerce Products Starts -->
            <section id="ecommerce-products" class="list-view">
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="app-ecommerce-details.html">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/1.jpg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">The Business Intelligence Analyst Course</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 2 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/2.jpeg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">Complete Digital Marketing Course</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 9 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/3.jpeg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">Basic Level Youth Health and Cooking</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 6 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/4.jpeg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">Drawing and Painting Course for Children</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 2 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/5.jpeg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">Social Media Marketing Course in English</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 3 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
               <div class="card ecommerce-card">
                  <div class="item-img text-center">
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>">
                     <img class="img-fluid card-img-top" src="<?php echo base_url('public/brand/assets/app-assets/images/pages/1.jpg')?>" alt="img-placeholder"/ style="width: 260px;height: 180px;"></a>
                  </div>
                  <div class="card-body">
                     <h6 class="item-name">
                        <a class="text-body" href="<?php echo base_url('trainingCourses/course_detail') ?>">The Business Intelligence Analyst Course</a>
                        <span class="card-text item-company"><i class="fa-solid fa-clock"></i>&nbsp; 5 hours </span>
                     </h6>
                     <p class="card-text item-description">
                        This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or web designs
                     </p>
                  </div>
                  <div class="item-options text-center">
                     <a href="#" class="btn btn-primary">
                     <i class="fa-solid fa-arrow-right"></i>
                     <span class="add-to-cart">Active</span>
                     </a>
                     <a href="<?php echo base_url('trainingCourses/course_detail') ?>" class="btn btn-primary mt-2">Details</a>
                  </div>
               </div>
            </section>
            <!-- E-commerce Products Ends -->
            <!-- E-commerce Pagination Starts -->
            <section id="ecommerce-pagination">
               <div class="row">
                  <div class="col-sm-12">
                     <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-2">
                           <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                           <li class="page-item active"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                           <li class="page-item"><a class="page-link" href="#">5</a></li>
                           <li class="page-item"><a class="page-link" href="#">6</a></li>
                           <li class="page-item"><a class="page-link" href="#">7</a></li>
                           <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </section>
            <!-- E-commerce Pagination Ends -->
         </div>
      </div>
      
   </div>
</div>
<!-- END: Content-->


<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/app-ecommerce.min.js')?>"></script>
<?= $this->endSection() ?>

