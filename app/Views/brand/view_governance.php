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
                        <img
                            src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
                    </div>
                    <div class="cph_right">
                        <div class="cph_title">ISO 14001 Checklist</div>
                        <div class="cph_short_desc">
                            This is an Advanced assessment aligning you brand wth the United Nation's Sustainable
                            Development Goals.
                        </div>
                        <div class="cph_status">
                            <div class="cph_status_left d-flex">
                                <div class="cph_score_icon me-1">
                                    <img
                                        src="https://user.positiivplus.io/public/brand/assets/app-assets/images/icon_score.png?v=1">
                                </div>
                                <div class="cph_score_content">
                                    <div class="cph_score_label">Question Completion</div>
                                    <div class="cph_score_result fw-bolder"><span id="tot_attempt_id"
                                            class="fw-bolder">0</span> Out of 47</div>
                                </div>
                            </div>
                            <div class="cph_status_right d-flex">
                                <div class="cph_score_icon me-1">
                                    <img src="https://positiivplus.io/public/brand/assets/custom_img/icon_complete.png">
                                </div>
                                <div class="cph_score_content">
                                    <div class="cph_score_label">Utopiic Level : Dorment</div>
                                    <div class="cph_score_result fw-bolder">
                                        0.00%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- category_page_header -->

            <!-- blocks start -->
            <!-- Role cards -->
            



           
            <div class="row mt-4">
                <?php foreach($governance_indicator as $vf){?>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card mb-4"> 
                     <a href="<?php echo base_url().'/governance_view/'.$vf['id'];?>" class="myblock1">
                            <div class="card-body">
                                <div class="cs_icon">
        <img src="<?= base_url("/")?>/public/uploads/sdg/<?php echo $vf['image'] ?>">
                                       
                                                                    </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="fw-bolder">Governance</h6>
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
                                        <h4 class="fw-bolder text-uppercase font-size-17">
                                         <?php  echo $vf['indicator_name']?>                                    </h4>
                                       <!--  <span>
                                            <small class="fw-bolder">Questions Answered</small>
                                        </span> -->
                                    </div>
                                   <!--  <span class="text-body fw-bolder">0/47</span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                                                <!-- <div class="col-xl-3 col-lg-6 col-md-6">
    <div class="card mb-4">
      <a href="" class="myblock1" data-bs-target="#myModal2" data-bs-toggle="modal">
        <div class="card-body">
          <div class="cs_icon">
            <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/i1.png?v=1">
          </div>
          <div class="d-flex justify-content-between mt-1">
            <h6 class="fw-bolder">Social</h6>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
              <li
                data-bs-toggle="tooltip"
                data-popup="tooltip-custom"
                data-bs-placement="top"
                title="Checked"
                class="avatar avatar-sm pull-up"
              >
                <img class="rounded-circle" src="https://user.positiivplus.io/public/brand/assets/app-assets/images/q_filled.png?v=1" alt="Avatar" />
              </li>
            </ul>
          </div>
          <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
            <div class="role-heading">
              <h4 class="fw-bolder text-uppercase font-size-17">No Poverty</h4>
              <span>
                <small class="fw-bolder">Questions Answered</small>
              </span>
            </div>
            <span class="text-body fw-bolder">2/3</span>
          </div>
        </div>
      </a>
    </div>
  </div>-->
 <?php
        };
            ?>
            </div>

            <!--/ Role cards -->
            <!-- end blocks  -->


<!-- Right Sidebar starts -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Add Task</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">

                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                    </div>
                </div>
                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <div class="action-tags">
                        <div class="mb-1">
                            <label for="todoTitleAdd" class="form-label">Title</label>
                            <input type="text" id="todoTitleAdd" name="todoTitleAdd"
                                class="new-todo-item-title form-control" placeholder="Title" />
                        </div>
                        <div class="mb-1 position-relative">
                            <label for="task-assigned" class="form-label d-block">Assignee</label>
                            <select class="select2 form-select" id="task-assigned" name="task-assigned">
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-3.jpg"
                                    value="Phill Buffer" selected>
                                    Phill Buffer
                                </option>
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-1.jpg"
                                    value="Chandler Bing">
                                    Chandler Bing
                                </option>
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg"
                                    value="Ross Geller">
                                    Ross Geller
                                </option>
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-6.jpg"
                                    value="Monica Geller">
                                    Monica Geller
                                </option>
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-2.jpg"
                                    value="Joey Tribbiani">
                                    Joey Tribbiani
                                </option>
                                <option
                                    data-img="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg"
                                    value="Rachel Green">
                                    Rachel Green
                                </option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="task-due-date" class="form-label">Due Date</label>
                            <input type="text" class="form-control task-due-date" id="task-due-date"
                                name="task-due-date" />
                        </div>
                        <div class="mb-1">
                            <label for="task-tag" class="form-label d-block">Tag</label>
                            <select class="form-select task-tag" id="task-tag" name="task-tag" multiple="multiple">
                                <option value="NUll">Open Select</option>
                                <option value="Risks">Risks</option>
                                <option value="Opportunities">Opportunities</option>
                                <option value="Hotspots">Hotspots</option>
                                <option value="Issues">Issues</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Description</label>
                            <div id="task-desc" class="border-bottom-0" data-placeholder="Write Your Description"></div>
                            <div class="d-flex justify-content-end desc-toolbar border-top-0">
                                <span class="ql-formats me-0">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-align"></button>
                                    <button class="ql-link"></button>
                                </span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Priority </label>
                            <select class="form-control" name="">
                                <option value="">Select Priority</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" style="margin-bottom: 10px;">Audit</label>
                            <div class="demo-inline-spacing mb-3">
                                <div class="form-check form-check-inline mt-0">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="Yes" checked />
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline mt-0">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="No" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="my-1">
                        <button type="submit" class="btn btn-primary d-none add-todo-item me-1">Add</button>
                        <button type="button" class="btn btn-outline-secondary add-todo-item d-none"
                            data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button"
                            class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
                        <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
            <br><br>
            <!-- time line -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic</h4>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>12 Invoices have been paid</h6>
                                    <span class="timeline-event-time">12 min ago</span>
                                </div>
                                <p>Invoices have been paid to the company.</p>
                                <div class="d-flex flex-row align-items-center">
                                    <img class="me-1"
                                        src="https://user.positiivplus.io/public/brand/assets/app-assets/images/icons/file-icons/pdf.png"
                                        alt="invoice" height="23" />
                                    <span>invoice.pdf</span>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Client Meeting</h6>
                                    <span class="timeline-event-time">45 min ago</span>
                                </div>
                                <p>Project meeting with john @10:15am.</p>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="avatar">
                                        <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/avatars/12-small.png"
                                            alt="avatar" height="38" width="38" />
                                    </div>
                                    <div class="ms-50">
                                        <h6 class="mb-0">John Doe (Client)</h6>
                                        <span>CEO of Infibeam</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Financial Report</h6>
                                    <span class="timeline-event-time">2 hours ago</span>
                                </div>
                                <p class="mb-50">Click the button below to read financial reports</p>
                                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="true"
                                    aria-controls="collapseExample">
                                    Show Report
                                </button>
                                <div class="collapse" id="collapseExample">
                                    <ul class="list-group list-group-flush mt-1">
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <span>Last Year's Profit : <span class="fw-bold">$20000</span></span>
                                            <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <span> This Year's Profit : <span class="fw-bold">$25000</span></span>
                                            <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <span> Last Year's Commission : <span class="fw-bold">$5000</span></span>
                                            <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <span> This Year's Commission : <span class="fw-bold">$7000</span></span>
                                            <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between flex-wrap">
                                            <span> This Year's Total Balance : <span
                                                    class="fw-bold">$70000</span></span>
                                            <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6 class="mb-50">Interview Schedule</h6>
                                    <span class="timeline-event-time">03:00 PM</span>
                                </div>
                                <p>Have to interview Katy Turner for the developer job.</p>
                                <hr />
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="avatar me-1">
                                            <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/avatars/1-small.png"
                                                alt="Avatar" height="32" width="32" />
                                        </div>
                                        <span>
                                            <p class="mb-0">Katy Turner</p>
                                            <span class="text-muted">Javascript Developer</span>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center cursor-pointer mt-sm-0 mt-50">
                                        <i data-feather="message-square" class="me-1"></i>
                                        <i data-feather="phone-call"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Online Store</h6>
                                    <span class="timeline-event-time">03:00PM</span>
                                </div>
                                <p>
                                    Develop an online store of electronic devices for the provided layout, as well as
                                    develop a mobile
                                    version of it. The must be compatible with any CMS.
                                </p>
                                <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                                    <div>
                                        <p class="text-muted mb-50">Developers</p>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-light-primary avatar-sm me-50">
                                                <span class="avatar-content">A</span>
                                            </div>
                                            <div class="avatar bg-light-success avatar-sm me-50">
                                                <span class="avatar-content">B</span>
                                            </div>
                                            <div class="avatar bg-light-danger avatar-sm">
                                                <span class="avatar-content">C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-sm-0 mt-1">
                                        <p class="text-muted mb-50">Deadline</p>
                                        <p class="mb-0">20 Dec 2077</p>
                                    </div>
                                    <div class="mt-sm-0 mt-1">
                                        <p class="text-muted mb-50">Budget</p>
                                        <p class="mb-0">$50000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between align-items-center mb-50">
                                    <h6>Designing UI</h6>
                                    <div>
                                        <span class="badge rounded-pill badge-light-primary">Design</span>
                                    </div>
                                </div>
                                <p>
                                    Our main goal is to design a new mobile application for our client. The customer
                                    wants a clean & flat
                                    design.
                                </p>
                                <div>
                                    <span class="text-muted">Participants</span>
                                    <div class="avatar-group mt-50">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="bottom" title="Vinnie Mostowy" class="avatar pull-up">
                                            <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg"
                                                alt="Avatar" height="30" width="30" />
                                        </div>
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="bottom" title="Elicia Rieske" class="avatar pull-up">
                                            <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg"
                                                alt="Avatar" height="30" width="30" />
                                        </div>
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="bottom" title="Julee Rossignol" class="avatar pull-up">
                                            <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/portrait/small/avatar-s-10.jpg"
                                                alt="Avatar" height="30" width="30" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Right Sidebar ends -->

    </div>

    <!-- END: Content-->



    <!-- BEGIN: Customizer-->

    <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center d-none" href="#"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">

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

        <input

          type="radio"

          id="skinlight"

          name="skinradio"

          class="form-check-input layout-name"

          checked

          data-layout=""

        />

        <label class="form-check-label" for="skinlight">Light</label>

      </div>

      <div class="form-check me-1">

        <input

          type="radio"

          id="skinbordered"

          name="skinradio"

          class="form-check-input layout-name"

          data-layout="bordered-layout"

        />

        <label class="form-check-label" for="skinbordered">Bordered</label>

      </div>

      <div class="form-check me-1">

        <input

          type="radio"

          id="skindark"

          name="skinradio"

          class="form-check-input layout-name"

          data-layout="dark-layout"

        />

        <label class="form-check-label" for="skindark">Dark</label>

      </div>

      <div class="form-check">

        <input

          type="radio"

          id="skinsemidark"

          name="skinradio"

          class="form-check-input layout-name"

          data-layout="semi-dark-layout"

        />

        <label class="form-check-label" for="skinsemidark">Semi Dark</label>

      </div>

    </div>

  </div>



  <hr/>



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