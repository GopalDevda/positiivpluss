<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="<?php echo base_url('public/Api/'); ?>/img/favicon.ico" type="image/x-icon">
  <title>Api</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/bootstrap/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/slick/slick.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/slick/slick-theme.css">
  <!-- icon css-->
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/elagent-icon/style.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/niceselectpicker/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/animation/animate.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/css/style-main.css?v=3">
  <link rel="stylesheet" href="<?php echo base_url('public/Api/'); ?>/css/responsive.css">
  <script src="js/video-active.js"></script>
  <script src="js/theme.js"></script>
</head>

<body data-scroll-animation="true">
  <div class="body_wrapper">
    <!--================Menu Area =================-->
    <header class="header_area">
      <nav class="navbar navbar-expand-lg menu_one menu_purple sticky-nav" style="<?php if($p=base_url('/Api/detail')){echo 'background: #000';} ?>">
        <div class="container">
          <a class="navbar-brand header_logo" href="<?php echo base_url(); ?>/apifrontController">
            <img class="first_logo sticky_logo" src="<?php echo base_url('public/Api/'); ?>/img/logo.png" srcset="<?php echo base_url('public/Api/'); ?>/img/logo-2x.png 2x" alt="logo">
            <img class="white_logo main_logo" src="<?php echo base_url('public/Api/'); ?>/img/logo-w.png" srcset="<?php echo base_url('public/Api/'); ?>/img/logo-w2x.png 2x" alt="logo">
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                    <span class="menu_toggle">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="hamburger-cross">
                            <span></span>
                            <span></span>
                        </span>
                    </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav menu ml-auto">
              <li class="nav-item active">
                <a href="<?php echo base_url(); ?>/apifrontController" class="nav-link">Home</a>
              </li>
              <li class="nav-item dropdown submenu mega_menu tab-demo">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Api</a>
                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="true" data-toggle="dropdown"></i>
                <ul class="dropdown-menu">
                  <li>
                    <div class="row">
                      <div class="col-lg-5 tabHeader">
                        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <?php foreach($category as $cat){ ?>
                          <li class="nav-item active">
                            <a class="nav-link" id="v-pills-<?php echo $cat['id'] ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $cat['id'] ?>" role="tab" aria-controls="v-pills-<?php echo $cat['id'] ?>" aria-selected="true"><?php echo $cat['category_name'] ?></a>
                          </li>
                          <?php } ?>
                          
                        </ul>
                      </div>
                      <div class="col-lg-7">
                        <div class="tab-content tabContent" id="v-pills-tabContent">
                          <div class="tab-pane fade active show" id="v-pills-doc" role="tabpanel" aria-labelledby="v-pills-doc-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list">
                                 <?php foreach($sub_category as $subCat){ ?>
                                <li> <a href="<?php echo base_url(); ?>/apifrontController/detail/<?php echo $subCat['id'] ?>"> <?php echo $subCat['api_name'] ?> </a> </li>
                                <?php } ?>
                              </ul>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-code" role="tabpanel" aria-labelledby="v-pills-code-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list">
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Tabs</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Accordion</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Notice</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Tables</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-layout" role="tabpanel" aria-labelledby="v-pills-layout-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list">
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Left Sidebar</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Full-width</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Gradient Banner</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Without Banner</a></li>
                              </ul>
                            </div>
                            <div class="text">
                              <a href="#">
                                <p>More Categories</p>
                              </a>
                              <a href="#">
                                <p>All docs</p>
                              </a>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-tour" role="tabpanel" aria-labelledby="v-pills-tour-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list w_100">
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Cheatsheet</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Footnotes</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Interface Tour</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Can I Use</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Tooltips & Direction</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Keyboard Shortcuts</a></li>
                              </ul>
                            </div>
                            <div class="text">
                              <a href="#">
                                <p>More Categories</p>
                              </a>
                              <a href="#">
                                <p>All docs</p>
                              </a>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-content" role="tabpanel" aria-labelledby="v-pills-content-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list">
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Image</a></li>
                                <li><a class="active" href="<?php echo base_url(); ?>/apifrontController/detail">Tables</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Video</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Typography</a></li>
                                <li><a href="<?php echo base_url(); ?>/apifrontController/detail">Tooltips & Direction</a></li>
                              </ul>
                            </div>
                            <div class="text">
                              <a href="#">
                                <p>More Categories</p>
                              </a>
                              <a href="#">
                                <p>All docs</p>
                              </a>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
                            <div class="d-flex">
                              <ul class="list-unstyled tab_list">
                                <li> <a href="<?php echo base_url(); ?>/apifrontController/detail">Onepage</a> </li>
                                <li> <a href="<?php echo base_url(); ?>/apifrontController/detail">Doc Topics</a></li>
                                <li> <a href="<?php echo base_url(); ?>/apifrontController/detail">Cheatsheet</a> </li>
                                <li> <a href="<?php echo base_url(); ?>/apifrontController/detail">Changelog</a> </li>
                              </ul>
                            </div>
                            <div class="text">
                              <a href="#">
                                <p>More Categories</p>
                              </a>
                              <a href="<?php echo base_url(); ?>/apifrontController/detail">
                                <p>All docs</p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item"><a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>/apifrontController/plan">Plan</a></li>
              <li class="nav-item"><a class="nav-link dropdown-toggle" href="#">Contact Us</a></li>
            </ul>
            <div class="right-nav">
              <?php  $session = session(); 
              $supplier_info = $session->get('supplier_info');
              if(!empty($supplier_info)){ ?>
              <a class="nav_btn not-round-btn" href="<?php echo base_url(); ?>/apifrontController/logout">Logout</a>
              <?php }else{ ?>
              <a class="nav_btn not-round-btn" href="<?php echo base_url(); ?>/apifrontController/login">Login</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!--================End Menu Area =================-->