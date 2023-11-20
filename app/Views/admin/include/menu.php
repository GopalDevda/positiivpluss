 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="http://utopiic.com/assets/images/logo_new.png" alt="Utopiic " class="brand-image " style="opacity: 10.8;margin-left: 4.1rem !important; width:100px;">
    </a>
   <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('public/admin/assets/'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('admin/home'); ?>" class="d-block"><?php 
           $session = session();
           echo $session->admin; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php 
          if($menu) {
            foreach($menu as $m) {
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <?php echo $m["module_name"] ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php 
            if($mod_item) {
            ?>
             <ul class="nav nav-treeview">
              <?php 
              foreach($mod_item as $mt) { 
                if($mt['module_id']==$m['id']) {
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/<?php echo $mt['link'] ?>" class="nav-link active">
                 <i class="<?php echo $mt["icon"] ?>"></i>
                 <p><?php echo $mt["item_name"] ?></p>
                </a>
              </li>
            <?php 
              }
            } 
            ?>
            </ul>
            <?php 
              }
            ?>
          </li>
        <?php
            }
          }
        ?>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Supplier Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php 
              if($supplier_management_menu) {
                foreach($supplier_management_menu as $smm) {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/master/supplier/<?php echo $smm['id'] ?>" class="nav-link active">
                 <i class="fa fa-users"></i>
                 <p><?php echo $smm["industry_name"] ?></p>
                </a>
              </li>
            <?php
                }
              }
            ?>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>

              <p>

                Widgets

                <span class="right badge badge-danger">New</span>

              </p>

            </a>

          </li>

          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-copy"></i>

              <p>

                CMS
                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/aboutus" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>About us</p>

                </a>

              </li>
               <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/policy" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Privacy Policy</p>

                </a>

              </li>
              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/terms" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Terms conditions</p>

                </a>

              </li>          
             
               <li class="nav-item">

                <a href="<?php echo base_url(); ?>/cms/contactus" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Contact us</p>

                </a>

              </li>
              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/plan" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Plan</p>

                </a>

              </li>
              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/faq" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Faq Main</p>

                </a>

              </li>
              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/faqcategory" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Faq Category</p>

                </a>

              </li>
              <li class="nav-item">

                <a href="<?php echo base_url();?>/cms/faqquestion" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Faq's</p>

                </a>

              </li>
              
            </ul>

          </li>

        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>

