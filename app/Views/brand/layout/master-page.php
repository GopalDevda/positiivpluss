<?php

use App\Models\UserNotification;
use App\Models\SupplierModel;
use App\Models\PolicyBrandModel;
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <title>Positiivplus </title>
  <link rel="apple-touch-icon" href="">
  <link rel="shortcut icon" type="image/x-icon" href="">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
  <?= $this->renderSection('style') ?>
  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/charts/apexcharts.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css') ?>">

  <style>
    .dot {
      height: 7px;
      width: 7px;
      background-color: green;
      border-radius: 50%;
      display: inline-block;
    }

    .goog-te-combo {
      width: 300px;
      height: 30px;
    }

    .goog-te-combo select {
      font-size: 30px;
    }

    .goog-te-combo option {
      font-size: 16px;
    }

    #goog-gt-tt {
      display: none !important;
    }

    .VIpgJd-yAWNEb-VIpgJd-fmcmS-sn54Q {
      background-color: transparent !important;
      box-shadow: 0px 0px 0px 0px !important;
    }

    .goog-te-gadget img {
      display: none !important;
    }

    .goog-te-gadget a {
      display: none !important;
    }

    .goog-te-gadget {
      color: transparent !important;
    }

    body>.skiptranslate {
      display: none;
    }

    body {
      top: 0px !important;
    }

    #language {
      min-width: 150px !important;
      max-width: 150px !important;
    }
  </style>

  <!-- END: Vendor CSS-->
  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/bootstrap-extended.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/colors.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/components.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/themes/dark-layout.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/themes/bordered-layout.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/themes/semi-dark-layout.min.css') ?>">
  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/core/menu/menu-types/vertical-menu.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/dashboard-ecommerce.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/charts/chart-apex.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css') ?>">
  <!-- END: Page CSS-->
  <!-- Tools Css Start -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/assets/css/tools.css') ?>">
  <!-- Tools Css End -->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/assets/css/style.css?v=14') ?>">
  <!-- END: Custom CSS-->
  <!-- BEGIN: Fontawesome CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/fontawesome/css/tabler-icons.css') ?>">
  <!-- END: Fontawesome CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/assets/css/colortheme.css?v=1') ?>">
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
  <!-- BEGIN: Header-->
  <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
        </ul>
        <!-- change Language -->
        <div id="google_translate_element" style="display: none;"></div>
        <select id="language" class="form-control"></select>&nbsp;&nbsp;

        <button onclick="changeLanguageByButtonClick()" class="btn btn-primary waves-effect waves-float waves-light" style="margin-right: -10rem;">Translate</button>
        <ul class=" nav navbar-nav bookmark-icons">
          <?php
          $notifi = new UserNotification();
          $db = \Config\Database::connect();
          $session = session();
          if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10) {

            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
          } else {
            $supplier = new SupplierMOdel();
            $u_id = session()->supplier_info['supplier_id'];
            $id = $supplier->where('id', $u_id)->first();
            $o_id = $id['owner_id'];
          }
          $o_id = session()->supplier_info['supplier_id'];

          $a = new PolicyBrandModel();
          $data['total_document'] = $a->where(["status" => 1])->where('owner_id', $o_id)->where(["approved_by !=" => null])->countAllResults();
          // print_r($data['total_document']);
          // die();
          $supplier = new SupplierModel();
          $o_id = session()->supplier_info['supplier_id'];
          $model = $supplier->where('id', $o_id)->first();
          $position_id = $model['position'];
          $ii = $supplier->where('id', $o_id)->first();
          $data['total_page'] = $ii['position'];
          // print_r($data['total_page']);
          // die();
          $supplier_info = $session->get('supplier_info');
          $query =
            $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '" . $supplier_info['supplier_id'] . " ' and ed.status=1 ")->getResultArray();
          $data['employee_details'] = $query[0]['num'];
          $data['b'] =  $a->where('status', 1)->where('owner_id', $o_id)->get()->getNumRows();
          $data['kkk'] = '4';


          if ($data['total_page'] == $data['kkk']) {
            $data = '0';
          }
          ?>
          <?php if ($data == '0') { ?>
            <!--  <li class="nav-item d-none d-lg-block">
              <a class="nav-link"
                href="<?php echo base_url('brand/manage_organization') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Company Profile">
                <i class="ficon fa-solid fa-building"></i>
              </a>
            </li> -->
          <?php
          } else {
          ?>
            <!--  <li class="nav-item d-none d-lg-block">
              <a class="nav-link"
                href="<?php echo base_url('brand/session') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Company Profile">
                <i class="ficon fa-solid fa-building"></i>
              </a>
            </li> -->
          <?php
          } ?>
          <!-- <li class="nav-item d-none d-lg-block">
              <a class="nav-link" href="<?php echo base_url('brand/approve_policy') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Company Policy">
                <i class="ficon fa-solid fa-building-circle-check"></i>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link" href="<?php echo base_url('action/issue') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Report Issue">
              <i class="ficon fa-solid fa-file-invoice"></i></a>
            </li>
             -->
        </ul>

        <ul class="nav navbar-nav align-items-center ms-1">
          <ul class="nav navbar-nav">
            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"></a>
              <div class="bookmark-input search-input">
                <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                <ul class="search-list search-list-bookmark"></ul>
              </div>
            </li>
          </ul>
      </div>
      <ul class="nav navbar-nav align-items-center ms-auto">
        <a href="<?= site_url('company_document') ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Document"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512">
            <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
          </svg></a>
      </ul>
      <ul class="nav navbar-nav align-items-center ms-1">
        <!-- Tools Opetions -->
        <li class="nav-item dropdown dropdown-cart me-25" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tools"><a class="nav-link" href="#" data-bs-toggle="dropdown">
            <i class="ti ti-layout-grid-add ti-md"></i>

            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
              <li class="dropdown-menu-header">
                <div class="dropdown-header d-flex">
                  <h4 class="notification-title mb-0 me-auto">Tools</h4>
                  <div class="badge rounded-pill badge-light-primary">
                    <i class="ti ti-layout-grid-add ti-md"></i>
                  </div>
                </div>
              </li>

              <li class="scrollable-container media-list">
                <div class="row row-bordered overflow-visible g-0">
                  <?php

                  if ($supplier_mod_item) {
                    foreach ($supplier_mod_item as $smi) {

                      if ($smi["supplier_module_id"] == 51) {

                        if (($smi["supplier_module_id"] == 51)) {
                  ?>
                          <div class="dropdown-shortcuts-item col-md-6">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                              <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/<?php echo $smi['img']; ?>?v=1' class="img-new-menu-icon" />
                            </span>
                            <a href="<?php echo base_url(); ?>/<?php echo $smi['link'] ?>" class="stretched-link"><?php echo $smi["item_name"] ?></a>
                          </div>
                  <?php }
                      }
                    }
                  }
                  ?>

                </div>

              </li>

            </ul>
        </li>
        <!-- Tools Opetions -->
        <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li> -->
        <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
      <div class="search-input">
        <div class="search-input-icon"><i data-feather="search"></i></div>
        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
        <div class="search-input-close"><i data-feather="x"></i></div>
      <ul class="search-list search-list-main"></ul>
    </div>
  </li> -->
        <!-- <label id="switch" class="switch">
    <input type="checkbox" onchange="toggleTheme()" id="slider">
    <span class="slider round"></span>
  </label> -->
        <?php
        $notifi = new UserNotification();
        $supplier = new SupplierMOdel();
        $db = \Config\Database::connect();
        if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10) {
          if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
          } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id = $supplier->where('id', $u_id)->first();
            $o_id = $id['owner_id'];
          }
          $where = "owner_id=$o_id and (for_y=$u_id or for_y=1) and status=1 and noti_read!=1";
          $noti = $notifi->where($where)->orderBy('id', 'DESC')->findAll();

          // $noti = $notifi->where('owner_id', $o_id)->where('for_y', 1)->where('status', 1)->orWhere('owner_id', $o_id)->where('for_y', $u_id)->where('status', 1)->orderBy('id', 'DESC')->findAll();

          // $count = $notifi->where('owner_id',$o_id)->where('for',1)->countAll();
          $count = $db->query("SELECT count(id) as cnt from user_notification where owner_id='" . $o_id . "'and status=1 and (for_y=1 or for_y='" . $u_id . "' ) and noti_read!=1")->getResultArray();
        } else {
          $u_id = session()->supplier_info['supplier_id'];
          $id = $supplier->where('id', $u_id)->first();
          $o_id = $id['owner_id'];

          $where = "owner_id=$o_id and (for_y=$u_id or for_y=2) and status=1 and noti_read!=1";
          $noti = $notifi->where($where)->orWhere('owner_id', $o_id)->orderBy('id', 'DESC')->findAll();


          $count = $db->query("SELECT count(id) as cnt from user_notification where owner_id='" . $o_id . "'and status=1 and (for_y=2 or for_y='" . $u_id . "' ) ")->getResultArray();
        } ?>
        <li class="nav-item dropdown dropdown-notification me-25" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications"><a class="nav-link" href="#" data-bs-toggle="dropdown">
            <i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-dark badge-up count"><?= $count[0]['cnt']; ?></span></a>
          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
            <li class="dropdown-menu-header">
              <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                <div class="badge rounded-pill badge-light-primary"><span class="count" id="count"><?= $count[0]['cnt']; ?></span> New</div>
              </div>
            </li>
            <li class="scrollable-container media-list">
              <?php
              foreach ($noti as $row) {
              ?>
                <a class="d-flex" onclick="notification_read($(this),<?= $row['id'] ?>)">
                  <div class="list-item noti_to_remove d-flex align-items-start">
                    <div class="me-1">
                      <!-- <div class="avatar"><img src="<?php base_url('app-assets/images/portrait/small/avatar-s-15.jpg') ?>" alt="avatar" width="32" height="32"></div> -->
                    </div>
                    <div class="list-item-body flex-grow-1">
                      <!-- <p class="media-heading"> -->
                      <?php if ($row['noti_read'] == 1) { ?>
                        <p class="media-heading"><span class="fw-bolder"><?= $row['msg'] ?></span></p>
                      <?php } else { ?>
                        <div class="row noti_hide">
                          <div class="col-1">
                            <span class="dot"></span>

                          </div>
                          <div class="col-11">
                            <span class="fw-bolder"><?= $row['msg'] ?></span>
                          </div>
                        </div>
                        <p class="media-heading noti_show" style="display:none;"><span class="fw-bolder"><?= $row['msg'] ?></span></p>
                      <?php } ?>
                      <span class="fw-bolder">Date</span><small class="notification-text"> <?= substr($row['created_at'], 0, 10) ?></small>
                      <span class="fw-bolder">Time</span><small class="notification-text"> <?= substr($row['created_at'], 11) ?></small>
                    </div>
                  </div>
                </a>
              <?php } ?>
              <!-- <a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar"><img src="<?php base_url('app-assets/images/portrait/small/avatar-s-15.jpg') ?>" alt="avatar" width="32" height="32"></div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
            </div>
          </div></a><a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar"><img src="<?php base_url('app-assets/images/portrait/small/avatar-s-3.jpg') ?>" alt="avatar" width="32" height="32"></div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
            </div>
          </div></a><a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar bg-light-danger">
                <div class="avatar-content">MD</div>
              </div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
            </div>
          </div></a> -->
              <!-- <div class="list-item d-flex align-items-center">
            <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
            <div class="form-check form-check-primary form-switch">
              <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
              <label class="form-check-label" for="systemNotification"></label>
            </div>
          </div><a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar bg-light-danger">
                <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
              </div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
            </div>
          </div></a><a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar bg-light-success">
                <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
              </div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
            </div>
          </div></a><a class="d-flex" href="#">
          <div class="list-item d-flex align-items-start">
            <div class="me-1">
              <div class="avatar bg-light-warning">
                <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
              </div>
            </div>
            <div class="list-item-body flex-grow-1">
              <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
            </div>
          </div></a> -->
            </li>
            <!-- <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" onclick="read_all_noti()">Read all notifications</a></li> -->
            <li class="dropdown-menu-footer"><a href="<?= base_url('/supplier/readallnotification') ?>" class="btn btn-primary w-100">Read all notifications</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown dropdown-user">

          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php

            $supplier_model = new SupplierModel();
            $session = session();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $dat = $ok['supplier_name'];
            $image  = $ok['image'];
            if (session()->supplier_info['role'] == 0) {
              $role = 10;
            } else {
              $role = $ok['role'];
            }
            if ($role == 11) {
              $manager = 'Manager';
            } else if ($role == 10) {
              $manager = 'Admin';
            } else if ($role == 12) {
              $manager = 'Employee';
            } else if ($role == 13) {
              $manager = 'Supplier';
            }
            ?>
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name fw-bolder"><?php echo $dat; ?></span>
              <span class="user-status"><?php echo $manager; ?></span>
            </div>
            <?php if ($image == '') { ?>
              <span class="avatar">
                <img class="round" src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span>
              </span>
            <?php  } else {
              echo  "<img src='" . base_url('public/profilimg/' . $image . '') . "' id='account-upload-img' class='round' alt='profile image' height='40' width='40' />";
            } ?>


          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="<?php echo base_url('brand/account') ?>"><i class="me-50" data-feather="user"></i> Profile</a>
            <!--  <?php if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10) { ?>
        <a class="dropdown-item" href="<?php echo base_url('brand/payment') ?>"><i class="me-50" data-feather="mail"></i> Payment</a>
        <?php } ?> -->
            <?php if ($ok['supplier_paid'] == '0') { ?>
              <?php if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10 || session()->supplier_info['role'] == 11) { ?>
                <a class="dropdown-item" href="<?php echo base_url('workforces/employee') ?>"><i class="me-50 fa-solid fa-users"></i> Users</a>
            <?php }
            } ?>

            <a class="dropdown-item" href="<?php echo base_url(); ?>/supplierAuth/logout"><i class="me-50" data-feather="power"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
        <h6 class="section-label mt-75 mb-0">Files</h6>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="app-assets/images/icons/xls.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="app-assets/images/icons/jpg.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="app-assets/images/icons/pdf.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="app-assets/images/icons/doc.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
      </a></li>
    <li class="d-flex align-items-center"><a href="#">
        <h6 class="section-label mt-75 mb-0">Members</h6>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
          </div>
        </div>
      </a></li>
  </ul>
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
      </a></li>
  </ul>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?= $this->include('brand/include/menu.php') ?>
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app">
    <?= $this->renderSection('content') ?>
  </div>
  <!-- END: Content-->
  <!-- BEGIN: Customizer-->
  <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center d-none" href="#"><i class="spinner" data-feather="settings"></i></a>
    <div class="customizer-content">
      <!-- Customizer header -->
      <div class="customizer-header px-2 pt-1 pb-0 position-relative">
        <h4 class="mb-0">Theme Customizer</h4>
        <p class="m-0">Customize & Preview in Real Time</p>
        <a class="customizer-close" href="#"><i data-feather="x"></i></a>
      </div>
      <hr />
      <!-- Styling & Text Direction -->
      <div class="customizer-styling-direction px-2">
        <p class="fw-bold">Skin</p>
        <div class="d-flex">
          <div class="form-check me-1">
            <input type="radio" id="skinlight" name="skinradio" class="form-check-input layout-name" checked data-layout="" />
            <label class="form-check-label" for="skinlight">Light</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="skinbordered" name="skinradio" class="form-check-input layout-name" data-layout="bordered-layout" />
            <label class="form-check-label" for="skinbordered">Bordered</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="skindark" name="skinradio" class="form-check-input layout-name" data-layout="dark-layout" />
            <label class="form-check-label" for="skindark">Dark</label>
          </div>
          <div class="form-check">
            <input type="radio" id="skinsemidark" name="skinradio" class="form-check-input layout-name" data-layout="semi-dark-layout" />
            <label class="form-check-label" for="skinsemidark">Semi Dark</label>
          </div>
        </div>
      </div>
      <hr />
      <!-- Menu -->
      <div class="customizer-menu px-2">
        <div id="customizer-menu-collapsible" class="d-flex">
          <p class="fw-bold me-auto m-0">Menu Collapsed</p>
          <div class="form-check form-check-primary form-switch">
            <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch" />
            <label class="form-check-label" for="collapse-sidebar-switch"></label>
          </div>
        </div>
      </div>
      <hr />
      <!-- Layout Width -->
      <div class="customizer-footer px-2">
        <p class="fw-bold">Layout Width</p>
        <div class="d-flex">
          <div class="form-check me-1">
            <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input" checked />
            <label class="form-check-label" for="layout-width-full">Full Width</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input" />
            <label class="form-check-label" for="layout-width-boxed">Boxed</label>
          </div>
        </div>
      </div>
      <hr />
      <!-- Navbar -->
      <div class="customizer-navbar px-2">
        <div id="customizer-navbar-colors">
          <p class="fw-bold">Navbar Color</p>
          <ul class="list-inline unstyled-list">
            <li class="color-box bg-white border selected" data-navbar-default=""></li>
            <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
            <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
            <li class="color-box bg-success" data-navbar-color="bg-success"></li>
            <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
            <li class="color-box bg-info" data-navbar-color="bg-info"></li>
            <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
            <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
          </ul>
        </div>
        <p class="navbar-type-text fw-bold">Navbar Type</p>
        <div class="d-flex">
          <div class="form-check me-1">
            <input type="radio" id="nav-type-floating" name="navType" class="form-check-input" checked />
            <label class="form-check-label" for="nav-type-floating">Floating</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input" />
            <label class="form-check-label" for="nav-type-sticky">Sticky</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="nav-type-static" name="navType" class="form-check-input" />
            <label class="form-check-label" for="nav-type-static">Static</label>
          </div>
          <div class="form-check">
            <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input" />
            <label class="form-check-label" for="nav-type-hidden">Hidden</label>
          </div>
        </div>
      </div>
      <hr />
      <!-- Footer -->
      <div class="customizer-footer px-2">
        <p class="fw-bold">Footer Type</p>
        <div class="d-flex">
          <div class="form-check me-1">
            <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input" />
            <label class="form-check-label" for="footer-type-sticky">Sticky</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="footer-type-static" name="footerType" class="form-check-input" checked />
            <label class="form-check-label" for="footer-type-static">Static</label>
          </div>
          <div class="form-check me-1">
            <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input" />
            <label class="form-check-label" for="footer-type-hidden">Hidden</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End: Customizer-->
  </div>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <!-- BEGIN: Footer-->
  <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="#" target="_blank">Positiivplus</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block"></span></p>
  </footer>
  <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/vendors.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') ?>"></script>

  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/chart.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js') ?>"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page JS-->
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/chart-apex.min.js') ?>"></script>
  <!-- END: Page JS-->
  <!-- BEGIN: Theme JS-->
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/core/app-menu.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/core/app.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/customizer.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/echarts.min.js') ?>"></script>
  <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/charts/echarts.script.min.js') ?>"></script>
  <!-- END: Theme JS-->
  <?= $this->renderSection('script') ?>
  <!-- select2 -->
  <!--  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
          <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script> -->
  <!-- BEGIN: Page JS-->
  <script src="<?php //echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')
                ?>"></script>
  <!-- END: Page JS-->

  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
  </script>
  <!-- Chnage Lagn -->
  <script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: "am",
        includedLanguages: 'en,af,sq,am,ar,hy,as,ay,az,bm,eu,be,bn,bho,bs,bg,ca,ceb,ny,co,hr,cs,da,dv,doi,nl,en,et,ee,tl,fi,fr,fy,gl,ka,de,el,gn,gu,ht,ha,haw,iw,hi,hmn,hu,is,ig,ilo,id,ga,it,ja,jw,kn,kk,km,rw,gom,ko,kri,ku,ckb,ky,lo,la,lv,ln,lt,lg,lb,mk,mai,mg,ms,ml,mt,mi,mr,mni-Mtei,lus,mn,my,ne,no,or,om,ps,fa,pl,pt,pa,qu,ro,ru,sm,sa,gd,nso,sr,st,sn,sd,si,sk,sl,so,es,su,sw,sv,tg,ta,tt,te,th,ti,ts,tr,tk,ak,uk,ur,ug,uz,vi,cy,xh,yi,yo,zu',
      }, 'google_translate_element');
    }

    function changeLanguageByButtonClick() {
      var language = document.getElementById("language").value;
      var selectField = document.querySelector("#google_translate_element select");
      for (var i = 0; i < selectField.children.length; i++) {
        var option = selectField.children[i];
        // find desired langauge and change the former language of the hidden selection-field 
        if (option.value == language) {
          selectField.selectedIndex = i;
          // trigger change event afterwards to make google-lib translate this side
          selectField.dispatchEvent(new Event('change'));
          $('#language option[value="' + language + '"]').attr("selected", "true");
          localStorage.setItem('language', language);
          break;
        }
      }
    }

    $(document).ready(function() {
      setTimeout(function() {
        var html = $('.goog-te-combo').html();

        $('#language').html(html);
        if (localStorage.getItem('language'))
          $('#language option[value="' + localStorage.getItem('language') + '"]').attr("selected", "true");
        else
          $('#language option[value=en]').attr("selected", "true");
      }, 1000);
      // $('.goog-te-combo').each(function(){
      //     var lang = $(this).attr('value');
      //     var lang_title =$(this).attr('text');
      //     alert(lang);
      //     $('#language').append('<option value="'+lang+'">'+lang_title+'</option>')
      // });
    });
  </script>
  <!-- textarea comment change -->
  <script>
    $(document).ready(function() {
      // Function to handle translation
      function translateText() {
        var inputText = $("#comment").val();

        // Use the Google Translate API to get the translation
        var googleTranslateUrl = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=en&dt=t&q=" + encodeURIComponent(inputText);

        $.ajax({
          url: googleTranslateUrl,
          method: "GET",
          dataType: "json",
          success: function(data) {
            if (data && data[0] && data[0][0]) {
              var translatedText = data[0][0][0];
              $("#translationContainer").text(translatedText);
            }
          },
          error: function() {
            $("#translationContainer").text("Error translating the text.");
          }
        });
      }

      // Call the translation function whenever the input text changes
      $("#comment").on("textarea", translateText);
    });
  </script>

  <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?
cb=googleTranslateElementInit"></script>

  <!-- Chnage Lagn -->
  <!-- <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript">
    window.onload = function() {
      $('.goog-te-combo').addClass('form-control');
    };
  </script>


  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 -->
  <script type="text/javascript">
    // function to set a given theme/color-scheme
    function setTheme(themeName) {
      localStorage.setItem('theme', themeName);
      document.documentElement.className = themeName;
    }
    // function to toggle between light and dark theme
    // function toggleTheme() {
    //     if (localStorage.getItem('theme') === 'dark-layout') {
    //         setTheme('theme-light');
    //     } else {
    //         setTheme('dark-layout');
    //     }
    // }
    // Immediately invoked function to set the theme on initial load
    (function() {
      if (localStorage.getItem('theme') === 'dark-layout') {
        setTheme('dark-layout');
        document.getElementById('slider').checked = false;
      } else {
        setTheme('theme-light');
        document.getElementById('slider').checked = true;
      }
    })();
  </script>
  <script>
    function notification_read(that, id) {
      $.ajax({
        type: "post",
        url: "<?= site_url('master/read_notification/') ?>" + id,
        success: function(old_readed) {
          console.log(old_readed);
          if (old_readed != 1) {
            $('.count').html((parseInt($('#count').html())) - 1);
            that.find(".noti_to_remove").remove();
            // that.find('.noti_show').css("display", "block");
          }
        }
      });
    }

    function read_all_noti() {
      $.ajax({
        type: "post",
        url: "<?= site_url('master/read_notification') ?>",
        success: function(response) {
          $('.noti_to_remove').remove();
          // $('.noti_show').css("display", "block");
          $('.count').html(0);
        }
      });

    }
  </script>
</body>
<!-- END: Body-->

</html>