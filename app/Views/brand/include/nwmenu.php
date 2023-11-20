 <style>
     .img-new-menu-icon{
     margin-right: 0.5rem;width: 24px;
    transform: translateY(-1px);
    filter: brightness(0) invert(1);
    margin-right: 0.5rem;
     }
     .main-menu.menu-light .navigation>li.active>a img{
         filter: brightness(0) invert(0);
     }
    
     </style>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="index."><span class="brand-logo">
            <img src="<?php echo base_url('public/utopiic/assets/app-assets/images/logo/logo.png')?>" alt="">
                </span>
              <h2 class="brand-text"></h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="<?php echo isset($pg_nm)?($pg_nm=='Quick Start'?'active':''):'' ?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>/supplier/quickStart">
               <img src='<?php echo base_url();?>/public/uploads/new-menu-icon/18 Quick StartNeon.png'class="img-new-menu-icon" />
              <!--<i class="fa-solid fa-jet-fighter"></i>-->
              <span class="menu-title text-truncate" data-i18n="Email">Quick Start</span></a>
          </li>

          <li class="<?php echo isset($pg_nm)?($pg_nm=='Dashboard'?'active':''):'' ?> nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>/supplier">
               <img src='<?php echo base_url();?>/public/uploads/new-menu-icon/19 DashboardNeon.png' class="img-new-menu-icon"/>
              <!--<i class="fa-solid fa-gauge"></i>-->
              <span class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>

          </li>

         <!--  <?php 
            if($supplier_mod) {
                foreach($supplier_mod as $sm) {
            ?> -->


          <!--<li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><?php echo $sm["supplier_module_name"] ?></span><i data-feather="more-horizontal"></i>-->

          <!--</li>-->
         <!--  <li class=" navigation-header"><a class="d-flex align-items-center" href="#"><span class="menu-title text-truncate" data-i18n="<?php echo $sm["supplier_module_name"] ?>"><?php echo $sm["supplier_module_name"] ?></span></a>
          <ul class="menu-content"> -->
         <!--  <?php 
            if($supplier_mod_item) {
                foreach($supplier_mod_item as $smi) {
                    if($smi["supplier_module_id"]==$sm["id"]){                                    
            ?> -->
           
          
              
              <!--<li><a class="d-flex align-items-center" href="<?php echo base_url();?>/<?php echo $smi['link'] ?>">-->
                <!--   <img src='<?php echo base_url();?>/public/uploads/new-menu-icon/<?php echo $smi['img'];?>?v=1' class="img-new-menu-icon"/> -->
              <!--    <i data-feather="<?php echo $smi['icon'] ?>"></i>-->
              <!--    <span class="menu-title text-truncate" data-i18n="Email"><?php echo $smi["item_name"] ?></span></a>-->
              <!--</li>-->
           
            
          <!-- <li class="<?php echo isset($pg_nm)?($pg_nm==$smi["item_name"]?'active':''):'' ?> d-flex align-items-center nav-item">
              <a class="d-flex align-items-center" href="<?php echo base_url();?>/<?php echo $smi['link'] ?>">
                  <img src='<?php echo base_url();?>/public/uploads/new-menu-icon/<?php echo $smi['img'];?>?v=1' class="img-new-menu-icon"/> -->
                  <!--<i data-feather="<?php echo $smi['icon'] ?>"></i>-->
                <!--   <span class="menu-title text-truncate" data-i18n="Email"><?php echo $smi["item_name"] ?></span></a> -->

          <!-- </li>
          <?php
                    }
                }
            }
            ?> 
            </ul> -->
<!-- /li>
            <?php                            
                }
            }
            ?> -->
        
        <!-- </ul> -->
<!--<ul class="navigation navigation-main"  data-menu="menu-navigation">-->
    
<!--      <li class="navigation-header"> -->
<!--            <a class="d-flex" href="<?php echo base_url();?>/reports">-->
               
<!--                <span data-i18n="Apps &amp; Pages">Reports</span>-->
<!--               </a>-->
<!--          </li>-->
<!--</ul>-->
 <?php 
            if($supplier_mod) {
                foreach($supplier_mod as $sm) {
            ?>
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather=""></i><span class="menu-title text-truncate" data-i18n="<?php echo $sm["supplier_module_name"] ?>"><?php echo $sm["supplier_module_name"] ?></span></a>
 

            <ul class="menu-content">
              <?php 
            if($supplier_mod_item) {
                foreach($supplier_mod_item as $smi) {
                    if($smi["supplier_module_id"]==$sm["id"]){                                    
            ?>
              <li class="<?php echo isset($pg_nm)?($pg_nm==$smi["item_name"]?'active':''):'' ?> d-flex align-items-center nav-item"><a class="d-flex align-items-center" href="<?php echo base_url();?>/<?php echo $smi['link'] ?>">
                 <img src='<?php echo base_url();?>/public/uploads/new-menu-icon/<?php echo $smi['img'];?>?v=1' class="img-new-menu-icon"/>

                
 <span class="menu-title text-truncate" data-i18n="Email"><?php echo $smi["item_name"] ?></span></a>
              </a>
              </li>
               <?php
                    }
                }
            }
            ?> 
            </ul>
          </li>
          <?php                            
                }
            }
            ?>
        </ul>

      </div>

    </div>