 <?php

  use App\Models\UserNotification;

  use App\Models\SupplierModel;
  use App\Models\PolicyBrandModel;
  use App\Models\QuickStartModel;



  ?>


 <style>
   .img-new-menu-icon {
     margin-right: 0.5rem;
     width: 24px;
     transform: translateY(-1px);
     filter: brightness(0) invert(1);
     margin-right: 0.5rem;
   }

   .main-menu.menu-light .navigation>li.active>a img {
     filter: brightness(0) invert(0);
   }
 </style>

 <?php

  $notifi = new UserNotification();

  $db = \Config\Database::connect();
  $session = session();


  $supplier = new SupplierModel();

  if (session()->supplier_info['role'] == 0) {
    $o_id = $u_id = session()->supplier_info['supplier_id'];
  } else {
    $u_id = session()->supplier_info['supplier_id'];
    $make = $supplier->where('id', $u_id)->first();
    $o_id = $make['owner_id'];
  }
  $a = new PolicyBrandModel();
  $QuickStart = new QuickStartModel();
  $profile = $QuickStart->where('step2', 1)->where('step3', 1)->where('step4', 1)->where('step5', 1)->where('owner_id', $o_id)->first();
  // print_r($profile);
  // die();

  $data['total_document'] = $a->where(["status" => 1])->where('owner_id', $o_id)->where(["approved_by !=" => null])->countAllResults();
  // echo $data['total_document'];
  $model = $supplier->where('id', $u_id)->first();
  // print_r($model['role']);
  // die;
  $position_id = $model['position'];
  $ii = $supplier->where('id', $o_id)->first();
  $data['total_page'] = $ii['position'];

  $supplier_info = $session->get('supplier_info');

  $query =
    $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '" . $supplier_info['supplier_id'] . " ' and ed.status=1 ")->getResultArray();
  $data['employee_details'] = $query[0]['num'];
  // echo $data['employee_details'];

  $data['b'] =  $a->where('status', 1)->where('owner_id', $o_id)->get()->getNumRows();

  $data['kkk'] = '4';
  $dat = '4';

  if ($data['total_page'] == '4') {

    $o = '1';
  } else {

    $o = '0';
  }

  if ($data['employee_details'] == '1') {

    $oo = '1';
  } else {
    $oo = '0';
  }


  if ($data['total_document'] == '1') {
    $ooo = '1';
  } else {
    $ooo = '0';
  }

  // die();



  ?>

 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

   <div class="navbar-header">
     <ul class="nav navbar-nav flex-row">
       <li class="nav-item me-auto"><a class="navbar-brand" href="index."><span class="brand-logo">
             <img src="<?php echo base_url('public/utopiic/assets/app-assets/images/logo/logo.png') ?>" alt="">
           </span>
           <h2 class="brand-text"></h2>
         </a></li>
       <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
     </ul>
   </div>
   <div class="shadow-bottom"></div>
   <!-- <p>zxjkcghjkfbhkgj</p> -->
   <div class="main-menu-content">
     <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

       <?php if ($ooo == '0' || $oo == '0' || $o == '0') { ?>

         <li class="<?php echo isset($pg_nm) ? ($pg_nm == 'Quick Start' ? 'active' : '') : '' ?> nav-item">
           <?php if (empty($profile)) { ?>
             <?php
              if ($model['role'] == '0' || $model['role'] == '10') { ?>
               <a class="d-flex align-items-center" href="<?php echo base_url(); ?>/supplier/quickStart">
               <?php
              } else { ?>
                 <a class="d-flex align-items-center" href="<?php echo base_url(); ?>/company_profile">

                 <?php
                } ?>
                 <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/18 Quick StartNeon.png' class="img-new-menu-icon" />
                 <!--<i class="fa-solid fa-jet-fighter"></i>-->
                 <!--<span class="menu-title text-truncate" data-i18n="Email">Quick Start</span>-->
                 <span class="menu-title text-truncate" data-i18n="Email">Company Profile</span>
                 </a>
               <?php
              }
              if ($profile) { ?>
                 <?php
                  if ($model['role'] == '0' || $model['role'] == '10' || $model['role'] == '11') { ?>

                   <a class="d-flex align-items-center" href="<?php echo base_url(); ?>/brand/manage_organization">
                   <?php
                  }  ?>
                   <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/18 Quick StartNeon.png' class="img-new-menu-icon" />
                   <!--<i class="fa-solid fa-jet-fighter"></i>-->
                   <!--<span class="menu-title text-truncate" data-i18n="Email">Quick Start</span>-->
                   <span class="menu-title text-truncate" data-i18n="Email">Company Profile</span>
                   </a>

                 <?php
                } ?>

         </li>
       <?php
        } ?>
       <?php
        $supplier_model = new SupplierModel();

        $session = session();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();

        // print_r($myArray);
        // die;
        if ($ok['supplier_paid'] == '0') { ?>
         <li class="<?php echo isset($pg_nm) ? ($pg_nm == 'Dashboard' ? 'active' : '') : '' ?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url(); ?>/dashboard">
             <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/19 DashboardNeon.png' class="img-new-menu-icon" />
             <!--<i class="fa-solid fa-gauge"></i>-->
             <span class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
         </li>
       <?php
        } ?>

       <?php
        if ($supplier_mod) {
          // print_r($supplier_mod);

          foreach ($supplier_mod as $key => $sm) {

            if (!($sm["id"] == 51)) {
              if ($key == 3) {
                $sm = $supplier_mod[4];
              } elseif ($key == 4) {
                $sm = $supplier_mod[3];
              }


        ?>

             <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><?php echo $sm["supplier_module_name"] ?></span><i data-feather="more-horizontal"></i>

             </li>
             <?php
              if ($supplier_mod_item) {
                foreach ($supplier_mod_item as $smi) {
                  if ($smi["supplier_module_id"] == $sm["id"]) {



                    if ($ok['supplier_paid'] == '1') {
                      $hiddenIDs = [43, 45, 59, 62];
                      if (in_array($smi['id'], $hiddenIDs)) {
                        continue; // Skip rendering this menu item
                      }
              ?>
                     <li class="<?php echo isset($pg_nm) ? ($pg_nm == $smi["item_name"] ? 'active' : '') : '' ?> nav-item">
                       <a class="d-flex align-items-center" href="<?php echo base_url(); ?>/<?php echo $smi['link'] ?>">
                         <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/<?php echo $smi['img']; ?>?v=1' class="img-new-menu-icon" />
                         <!--<i data-feather="<?php echo $smi['icon'] ?>"></i>-->
                         <span class="menu-title text-truncate" data-i18n="Email"><?php echo $smi["item_name"] ?></span></a>

                     </li>
                   <?php
                    } else { ?>
                     <li class="<?php echo isset($pg_nm) ? ($pg_nm == $smi["item_name"] ? 'active' : '') : '' ?> nav-item" id="<?= $smi['id'] ?>">
                       <a class="d-flex align-items-center" href="<?php echo base_url(); ?>/<?php echo $smi['link'] ?>" onclick="assement_click(<?= $smi['id']; ?>);">
                         <img src='<?php echo base_url(); ?>/public/uploads/new-menu-icon/<?php echo $smi['img']; ?>?v=1' class="img-new-menu-icon" />
                         <!--<i data-feather="<?php echo $smi['icon'] ?>"></i>-->
                         <span class="menu-title text-truncate" data-i18n="Email"><?php echo $smi["item_name"] ?></span></a>

                     </li>
             <?php }
                  }
                }
              }
              ?>

       <?php
            }
          }
        }
        ?>

     </ul>


   </div>

 </div>