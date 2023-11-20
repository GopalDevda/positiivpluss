<?php
 $p=base_url('/Api/detail');
 
 include('include/header.php'); ?>

  <div class="side_menu">
    <div class="mobile_menu_header">
      <div class="close_nav"> <i class="arrow_left"></i> <i class="icon_close"></i> </div>
      <div class="mobile_logo"> <a class="navbar-brand header_logo" href="index.php"> <img class="sticky_logo main_logo" src="<?php echo base_url(); ?>/public/Api/img/logo.png" srcset="img/logo-2x.png 2x" alt="logo"> <img class="white_logo" src="img/logo-w.png" srcset="img/logo-w2x.png 2x" alt="logo"> </a> </div>
    </div>
    <div class="mobile_nav_wrapper">
      <nav class="mobile_nav_top">
        <ul class="navbar-nav menu ml-auto">
          <li class="nav-item dropdown submenu"> <a href="#" class="nav-link">Home</a> </li>
          <li class="nav-item dropdown submenu active"> <a href="#" class="nav-link">Docs</a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="#" class="nav-link">Doc Archives</a></li>
              <li class="nav-item"><a href="doc-main.html" class="nav-link">DocTopics</a></li>
              <li class="nav-item dropdown submenu"> <a href="#" class="nav-link">Elements</a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="doc-element-tab.html" class="nav-link">Tabs</a></li>
                  <li class="nav-item"><a href="doc-element-accordion.html" class="nav-link">Accordion</a></li>
                  <li class="nav-item active"><a href="doc-element-notice.html" class="nav-link">Notices</a></li>
                  <li class="nav-item"><a href="doc-content-tables.html" class="nav-link">Tables</a></li>
                  <li class="nav-item"><a href="doc-content-tooltip.html" class="nav-link">Tooltips & Direction</a></li>
                  <li class="nav-item"><a href="doc-element-hotspots.html" class="nav-link">Image Hotspots</a></li>
                  <li class="nav-item"><a href="doc-element-lightbox.html" class="nav-link">Lightbox</a></li>
                  <li class="nav-item"><a href="doc-changelog.html" class="nav-link">Changelog</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown submenu"> <a href="#" class="nav-link">Layouts</a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="doc-element-hotspots.html" class="nav-link">Left Sidebar</a></li>
                  <li class="nav-item"><a href="doc-content-video.html" class="nav-link">Full-width</a></li>
                  <li class="nav-item"><a href="doc-layout-banner-gradient.html" class="nav-link">Gradient Banner</a></li>
                  <li class="nav-item"><a href="doc-layout-banner-empty.html" class="nav-link">Without Banner</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown submenu"> <a href="#" class="nav-link">Pages</a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="onepage.html" class="nav-link">Onepage Doc</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item"><a href="onepage.html" class="nav-link">Onepage Doc</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
              <li class="nav-item"><a href="404-error.html" class="nav-link">404 Error</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown submenu"> <a href="#" class="nav-link">Forum</a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="forums.html" class="nav-link">Forums Root</a></li>
              <li class="nav-item"><a href="forum-topics.html" class="nav-link">Forum Topics</a></li>
              <li class="nav-item"><a href="forum-single.html" class="nav-link">Topic Details</a></li>
              <li class="nav-item"><a href="forum-profile.html" class="nav-link">User Profile</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown submenu"> <a class="nav-link" href="#"> Blog </a> <i class="arrow_carrot-down_alt2 mobile_dropdown_icon"></i>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="blog-grid.html" class="nav-link">Blog Grid</a></li>
              <li class="nav-item"><a href="blog-grid-two.html" class="nav-link">Blog Grid Two</a></li>
              <li class="nav-item"><a href="blog-list.html" class="nav-link">Blog List</a></li>
              <li class="nav-item"><a href="blog-single.html" class="nav-link">Blog Details</a></li>
              <li class="nav-item"><a href="blog-single2.html" class="nav-link">Blog Details Two</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <div class="mobile_nav_bottom">
        <aside class="doc_left_sidebarlist">
          <h2>Docy Documentation</h2>
          <div class="scroll">
            <ul class="list-unstyled nav-sidebar">
              <li class="nav-item"> <a href="doc-main.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/home.png" alt="">Home</a> </li>
              <li class="nav-item"> <a href="doc-element-tab.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/briefcase.png" alt="briefcase">Elements</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                <ul class="list-unstyled dropdown_nav">
                  <li><a href="doc-element-tab.html">Tabs</a></li>
                  <li><a href="doc-element-accordion.html">Accordion</a></li>
                  <li><a href="doc-element-notice.html">Notices</a></li>
                  <li><a href="doc-content-tables.html">Table</a></li>
                  <li><a class="active" href="doc-element-lightbox.html">Image Lightbox</a></li>
                  <li><a href="doc-element-hotspots.html">Image Hotspots</a></li>
                  <li><a href="doc-element-code.html">Source Code</a></li>
                  <li><a href="doc-content-tooltip.html">Tooltip</a></li>
                </ul>
              </li>
              <li class="nav-item active"> <a href="doc-content-video.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/layout.png" alt="">Layouts</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                <ul class="list-unstyled dropdown_nav">
                  <li><a href="doc-content-video.html">Full-width</a></li>
                  <li><a href="doc-element-hotspots.html">Left Sidebar</a></li>
                  <li><a href="doc-layout-banner-gradient.html">Gradient Banner</a></li>
                  <li><a class="active" href="doc-layout-banner-empty.html">Without Banner</a></li>
                </ul>
              </li>
              <li class="nav-item"> <a href="doc-ref-cheatsheet.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/chat1.png" alt="">Reference</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                <ul class="list-unstyled dropdown_nav">
                  <li><a href="doc-ref-cheatsheet.html">Cheatsheet</a></li>
                  <li><a href="doc-ref-footnote.html">Footnotes</a></li>
                  <li><a href="doc-tour.html">Interface Tour</a></li>
                  <li><a href="doc-ref-can-use.html">Can I Use</a></li>
                  <li><a href="doc-content-tooltip.html">Tooltips & Direction</a></li>
                  <li><a href="doc-ref-shortcuts.html">Keyboard Shortcuts</a></li>
                </ul>
              </li>
              <li class="nav-item"> <a href="doc-content-image.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/document.png" alt="">Content</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                <ul class="list-unstyled dropdown_nav">
                  <li><a href="doc-content-image.html">Image</a></li>
                  <li><a class="active" href="doc-content-tables.html">Tables</a></li>
                  <li><a href="doc-content-tooltip.html">Tooltips & Direction</a></li>
                  <li><a href="doc-element-code.html">Code</a></li>
                  <li><a href="doc-content-video.html">Video</a></li>
                  <li><a href="typography.html">Typography</a></li>
                </ul>
              </li>
              <li class="nav-item"> <a href="doc-changelog.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/clock.png" alt="">Change Log</a> </li>
            </ul>
            <ul class="list-unstyled nav-sidebar coding_nav">
              <li class="nav-item"> <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/account.png" alt="">Account</a> </li>
              <li class="nav-item"> <a href="onepage.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/layout.png" alt="">Onepage Doc</a> </li>
            </ul>
            <ul class="list-unstyled nav-sidebar bottom_nav">
              <li class="nav-item"> <a href="#" class="nav-link"><img src="img/side-nav/united-states.png" alt="">United States</a> </li>
              <li class="nav-item"> <a href="signup.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/edit.png" alt="">Signup</a> </li>
              <li class="nav-item"> <a href="signin.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/users.png" alt="">Sign In <i class="arrow_right"></i></a> </li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <section class="page_breadcrumb" style="margin-top: 83px;">
    <div class="container-fluid pl-60 pr-60">
      <div class="row">
        <div class="col-sm-7">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php 
              if($detail){
                  echo $detail['api_name'];
              }
              ?></li>
            </ol>
          </nav>
        </div>
        <div class="col-sm-5">
          <!--<a href="#" class="date"><i class="icon_clock_alt"></i>Updated on March 03, 2020</a>-->
        </div>
      </div>
    </div>
  </section>
  <!--================Topic Area =================-->
  <section class="doc_documentation_area" id="sticky_doc">
    <div class="overlay_bg"></div>
    <div class="container custom_container">
      <div class="row">
        <div class="col-lg-3 doc_mobile_menu display_none">
          <aside class="doc_left_sidebarlist">
            <div class="open_icon" id="left"> <i class="arrow_carrot-right"></i> <i class="arrow_carrot-left"></i> </div>
            <div class="scroll">
              <ul class="list-unstyled nav-sidebar">
                <li class="nav-item"> <a href="doc-main.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/home.png" alt="">Home</a> </li>
                <li class="nav-item"> <a href="doc-main.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/briefcase.png" alt="briefcase">Elements</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                  <ul class="list-unstyled dropdown_nav">
                    <li><a href="doc-element-tab.html">Tabs</a></li>
                    <li><a href="doc-element-accordion.html">Accordion</a></li>
                    <li><a href="doc-element-notice.html">Notices</a></li>
                    <li><a href="doc-content-tables.html">Table</a></li>
                    <li><a href="doc-element-lightbox.html">Image Lightbox</a></li>
                    <li><a href="doc-element-hotspots.html">Image Hotspots</a></li>
                    <li><a href="doc-element-code.html">Source Code</a></li>
                    <li><a href="doc-content-tooltip.html">Tooltip</a></li>
                  </ul>
                </li>
                <li class="nav-item active"> <a href="doc-content-video.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/layout.png" alt="">Layouts</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                  <ul class="list-unstyled dropdown_nav">
                    <li><a href="doc-content-video.html">Full-width</a></li>
                    <li><a href="doc-element-hotspots.html">Left Sidebar</a></li>
                    <li><a href="doc-layout-banner-gradient.html">Gradient Banner</a></li>
                    <li><a class="active" href="doc-layout-banner-empty.html">Without Banner</a></li>
                  </ul>
                </li>
                <li class="nav-item"> <a href="typography.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/document.png" alt="">Content</a> <span class="icon"><i class="arrow_carrot-down"></i></span>
                  <ul class="list-unstyled dropdown_nav">
                    <li><a href="doc-content-image.html">Image</a></li>
                    <li><a href="doc-element-tab.html">Tables</a></li>
                    <li><a href="doc-element-code.html">Code</a></li>
                    <li><a href="doc-content-video.html">Video</a></li>
                    <li><a href="doc-content-tooltip.html">Tooltips & Direction</a></li>
                    <li><a href="typography.html">Typography</a></li>
                  </ul>
                </li>
                <li class="nav-item"> <a href="doc-changelog.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/clock.png" alt="">Change Log</a> </li>
              </ul>
              <ul class="list-unstyled nav-sidebar coding_nav">
                <li class="nav-item"> <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/account.png" alt="">Account</a> </li>
                <li class="nav-item"> <a href="doc-element-code.html" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/coding.png" alt="">Development</a> </li>
              </ul>
              <ul class="list-unstyled nav-sidebar bottom_nav">
                <li class="nav-item"> <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/united-states.png" alt="">United States</a> </li>
                <li class="nav-item"> <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/edit.png" alt="">English </a> </li>
                <li class="nav-item"> <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>/public/Api/img/side-nav/users.png" alt="">Sign In <i class="arrow_right"></i></a> </li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="col-lg-7 col-md-8 doc-middle-content">
          <div id="post" class="shortcode_info">
            <div class="shortcode_title">
                <a class="btn" href="#"><?php echo $detail['api_name']; ?></a>
            </div>
            <div class="tab_shortcode">
             
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Url</a> </li>
                <li class="nav-item"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">API Request</a> </li>
                <li class="nav-item"> <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">API Response</a> </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> <?php echo $detail['hitting_url']; ?> </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">  <?php echo json_encode($detail['api_request'], JSON_PRETTY_PRINT); ?> </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> <?php echo $detail['api_response']; ?> </div>
              </div>
            </div>
            
          </div>
          
        </div>
        
      </div>
    </div>
  </section>
  <!--================End Topic Area =================-->
  
  <?php include('include/footer.php'); ?>