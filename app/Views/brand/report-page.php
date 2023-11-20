<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
<style type="text/css">
  .dis {
    color: #000;
  }

  .dis:hover {
    color: #9bbb31;
  }

  .dark-layout .dis {
    color: #D0D2D6;
  }

  .dark-layout .dis:hover {
    color: #9bbb31;
  }

  .accordion-item {
    box-shadow: 0px 0px 2px 0px #8d8d8d;
  }

  .accordion-header {
    background: #fff !important;
    color: #222;
    font-weight: 600;
  }

  .accordion-button {
    background: #fff !important;
    color: #222;
    font-weight: 600;
  }

  @media (min-width: 576px) {
    .modal-slide-in .modal-dialog {
      width: 48rem !important;
    }
  }

  .select2-container--classic .select2-results__option,
  .select2-container--default .select2-results__option {
    padding: 12px !important;
    margin: 10px;
    box-shadow: 0px 0px 3px 0px;
    border-radius: 6px;
  }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Report</h2>
            <div class="breadcrumb-wrapper">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    $session = session();
    if ($session->get('success')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <?php
    $session = session();
    if ($session->get('error')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <div class="content-body">
      <!-- Vertical Wizard -->
      <section class="vertical-wizard">
        <div class="bs-stepper vertical vertical-wizard-example">
          <div class="bs-stepper-header">
            <div class="step" data-target="#step1" role="tab" id="step1-trigger">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-box">1</span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Step</span>
                </span>
              </button>
            </div>
            <div class="step" data-target="#step2" role="tab" id="step2-trigger">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-box">2</span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Step</span>
                </span>
              </button>
            </div>
            <div class="step" data-target="#step3" role="tab" id="step3-trigger">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-box">3</span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Step</span>
                </span>
              </button>
            </div>
            <div class="step" data-target="#step4" role="tab" id="step4-trigger">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-box">4</span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Step</span>
                </span>
              </button>
            </div>
            <div class="step" data-target="#step5" role="tab" id="step5-trigger">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-box">5</span>
                <span class="bs-stepper-label">
                  <span class="bs-stepper-title">Step</span>
                </span>
              </button>
            </div>
            <!--<div class="step" data-target="#step6" role="tab" id="step6-trigger">-->
            <!--  <button type="button" class="step-trigger">-->
            <!--    <span class="bs-stepper-box">6</span>-->
            <!--    <span class="bs-stepper-label">-->
            <!--      <span class="bs-stepper-title">Step</span>-->
            <!--    </span>-->
            <!--  </button>-->
            <!--</div>-->
          </div>
          <div class="bs-stepper-content">
            <div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
              <form action="<?= base_url('reportbuilder/step_submit_1') ?>" id="step_submit_1" method="post">
                <div class="row">
                  <div class="mb-1 col-md-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="" />
                  </div>
                  <div class="mb-1 col-md-3">
                    <label class="form-label" for="start_date">Start Period</label>
                    <input type="date" id="start_date" class="form-control" placeholder="" aria-label="john.doe" />
                  </div>
                  <div class="mb-1 col-md-3">
                    <label class="form-label" for="end_date">End Period</label>
                    <input type="date" id="end_date" class="form-control" placeholder="" aria-label="john.doe" />
                  </div>
                  <div class="mb-1 col-md-3">
                    <label class="form-label" for="standard">standard</label>
                    <select class="form-control select2" id="standard">
                      <?php foreach ($standard as $std) {
                        echo '<option value="' . $std['id'] . '">' . $std['standard_name'] . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <button class="btn btn-outline-secondary btn-prev" disabled>
                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button type="submit" class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                  </button>
                </div>
              </form>
            </div>
            <div id="step2" class="content" role="tabpanel" aria-labelledby="step2-trigger">
              <div class="content-header">
                <h4 class="mb-2">SELECT CLASSIFICATION</h4>
                <p>
                  Following is a comprehensive list of globally recognised metrics encompassed in GRI, BRSR & CDP reporting standards a responsible organisation can access and include in their report. The indicator list is broad and concrete in nature, allowing the organization to choose and remove indicators as per their company profile and materiality awareness to reflect upon the organization's commitment towards ESG indicators as well as showcase the same to various stakeholders. </p>
              </div>
              <form action="<?= base_url('reportbuilder/step_submit_2') ?>" id="step_submit_2" method="post">
                <input type="hidden" name="id" id="step_2_id">
                <input type="hidden" name="standard_id" id="standarad_id">
                <div class="row">
                  <div class="mb-1 col-md-12">
                    <label class="form-label" for="vertical-first-name"> Classification </label>
                    <select placeholder="Select" name="indicators[]" class="select2 form-select" id="select2-multiple" multiple>
                      <option value="">Select Classification</option>
                    </select>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <button class="btn btn-primary btn-prev">
                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                  </button>
                  <button type="submit" class="btn btn-primary btn-next">
                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                  </button>
                </div>
              </form>
            </div>

            <div id="step3" class="content" role="tabpanel" aria-labelledby="step3-trigger">
              <div class="content-header">
                <h5 class="mb-0">Disclosure</h5>
              </div>
              <form action="<?= base_url('reportbuilder/step_submit_3') ?>" id="step_submit_3" method="post">
                <input type="hidden" name="id" id="step_3_id">
                <input type="hidden" name="standard_id" id="standarad_idd">

              <div class="row" id="show_step_3">
              </div>
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button type="submit" class="btn btn-primary btn-next">
                  <span class="align-middle d-sm-inline-block d-none">Next</span>
                  <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                </button>
                    </form>
              </div>
            </div>

            <div id="step4" class="content" role="tabpanel" aria-labelledby="step4-trigger">
              <div class="content-header">
                <!-- <h5 class="mb-0"><a href="#">Complete the answer</a></h5> -->
              </div>

              <div class="row mb-1">
                <h4 class="mb-1"><a href="#" class="dis">Sites</a></h4>
                <!-- <div class="ps-2">
                  <div class="mb-1 col-md-12">
                    <h5 class=""><a href="#" class="dis" tabindex="0" type="button"  data-bs-target="#modals-slide-in"><i class="fa-solid fa-circle-check"></i> DISCLOSURE 302-1 Energy Consumption within the organization. </a></h5>
                  </div>
                  <div class="mb-1 col-md-12">
                    <h5 class=""><a href="#" class="dis" tabindex="0" type="button"  data-bs-target="#modals-slide-in"><i class="fa-solid fa-circle-check"></i> Disclosure 302-2 Energy consumption outside of the organisation.</a></h5>
                  </div>
                  <div class="mb-1 col-md-12">
                    <h5 class=""><a href="#" class="dis" tabindex="0" type="button"  data-bs-target="#modals-slide-in"><i class="fa-solid fa-circle-check"></i> Disclosure 302-3 Energy intensity. </a></h5>
                  </div>
                  <div class="mb-1 col-md-12">
                    <h5 class=""><a href="#" class="dis" tabindex="0" type="button"  data-bs-target="#modals-slide-in"><i class="fa-solid fa-circle-check"></i>Disclosure 302-4 Reduction of energy consumption. </a></h5>
                  </div>
                  <div class="mb-1 col-md-12">
                    <h5 class=""><a href="#" class="dis" tabindex="0" type="button" data-bs-target="#modals-slide-in"><i class="fa-solid fa-circle-check"></i> Disclosure 302-5 Reductions in energy requirements of products and services. </a></h5>
                  </div>
                </div> -->
                <div id="show_step_4"></div>
              </div>

              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next" onclick="sitescheck()">
                  <span class="align-middle d-sm-inline-block d-none">Next</span>
                  <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                </button>
              </div>
            </div>
            <div id="step5" class="content" role="tabpanel" aria-labelledby="step5-trigger">
              <div class="content-header">
                <!-- <h5 class="mb-0">Step5</h5> -->
              </div>
              <!-- <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Invite Approvers</h4>
                    </div>
                    <div class="card-body">
                      <div class="mb-1">
                        <label class="form-label" for="username">Email</label>
                        <div class="input-group">
                          <input type="email" class="form-control" placeholder="Button on right" aria-describedby="button-addon2">
                          <button class="btn btn-primary waves-effect" id="button-addon2" type="button">Send</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Review Request Summary</h4>
                    </div>
                    <div class="card-body">
                      <div class="mb-1">
                        <div class="table-responsive table-bordered">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <span class="fw-bold">abc@gamil.com</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                      <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <span class="fw-bold">xyz@gamil.com</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-success me-1">Completed</span></td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                      <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <span class="fw-bold">demo@gmail.com</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-info me-1">Scheduled</span></td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                      <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <span class="fw-bold">test@gmail.com</span>
                                </td>
                                <td><span class="badge rounded-pill badge-light-warning me-1">Pending</span></td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                      <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                      </a>
                                      <a class="dropdown-item" href="#">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- Complex Headers -->
<section>
  <div class="row">
    <div class="col-12">
      <div class="card p-2">
        <!-- <div class="card-header border-bottom">
          <h4 class="card-title">Complex Headers</h4>
        </div> -->
      
        <div id="showClassiData"></div>
      
       
      </div>
    </div>
  </div>
</section>
<!--/ Complex Headers -->
              <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn-prev">
                  <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit waves-effect waves-float waves-light">Submit</button>
              </div>
            </div>
            <!--<div id="step6" class="content" role="tabpanel" aria-labelledby="step6-trigger">-->
            <!--  <div class="content-header">-->
            <!-- <h5 class="mb-0">Step6</h5> -->
            <!--  </div>-->
            <!--  <div class="row">-->
            <!--    <div class="col-md-12">-->
            <!--      <div class="card">-->
            <!--        <div class="card-header">-->
            <!--          <h4 class="card-title">Review Request Summary</h4>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--          <div class="mb-1">-->
            <!--            <div class="table-responsive table-bordered">-->
            <!--              <table class="table">-->
            <!--                <thead>-->
            <!--                  <tr>-->
            <!--                    <th>Email</th>-->
            <!--                    <th>Status</th>-->
            <!--                    <th>Actions</th>-->
            <!--                  </tr>-->
            <!--                </thead>-->
            <!--                <tbody>-->
            <!--                  <tr>-->
            <!--                    <td>-->
            <!--                      <span class="fw-bold">abc@gamil.com</span>-->
            <!--                    </td>-->
            <!--                    <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>-->
            <!--                    <td>-->
            <!--                      <div class="dropdown">-->
            <!--                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">-->
            <!--                          <i data-feather="more-vertical"></i>-->
            <!--                        </button>-->
            <!--                        <div class="dropdown-menu dropdown-menu-end">-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="edit-2" class="me-50"></i>-->
            <!--                            <span>Edit</span>-->
            <!--                          </a>-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="trash" class="me-50"></i>-->
            <!--                            <span>Delete</span>-->
            <!--                          </a>-->
            <!--                        </div>-->
            <!--                      </div>-->
            <!--                    </td>-->
            <!--                  </tr>-->
            <!--                  <tr>-->
            <!--                    <td>-->
            <!--                      <span class="fw-bold">xyz@gamil.com</span>-->
            <!--                    </td>-->
            <!--                    <td><span class="badge rounded-pill badge-light-success me-1">Completed</span></td>-->
            <!--                    <td>-->
            <!--                      <div class="dropdown">-->
            <!--                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">-->
            <!--                          <i data-feather="more-vertical"></i>-->
            <!--                        </button>-->
            <!--                        <div class="dropdown-menu dropdown-menu-end">-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="edit-2" class="me-50"></i>-->
            <!--                            <span>Edit</span>-->
            <!--                          </a>-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="trash" class="me-50"></i>-->
            <!--                            <span>Delete</span>-->
            <!--                          </a>-->
            <!--                        </div>-->
            <!--                      </div>-->
            <!--                    </td>-->
            <!--                  </tr>-->
            <!--                  <tr>-->
            <!--                    <td>-->
            <!--                      <span class="fw-bold">demo@gmail.com</span>-->
            <!--                    </td>-->
            <!--                    <td><span class="badge rounded-pill badge-light-info me-1">Scheduled</span></td>-->
            <!--                    <td>-->
            <!--                      <div class="dropdown">-->
            <!--                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">-->
            <!--                          <i data-feather="more-vertical"></i>-->
            <!--                        </button>-->
            <!--                        <div class="dropdown-menu dropdown-menu-end">-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="edit-2" class="me-50"></i>-->
            <!--                            <span>Edit</span>-->
            <!--                          </a>-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="trash" class="me-50"></i>-->
            <!--                            <span>Delete</span>-->
            <!--                          </a>-->
            <!--                        </div>-->
            <!--                      </div>-->
            <!--                    </td>-->
            <!--                  </tr>-->
            <!--                  <tr>-->
            <!--                    <td>-->
            <!--                      <span class="fw-bold">test@gmail.com</span>-->
            <!--                    </td>-->
            <!--                    <td><span class="badge rounded-pill badge-light-warning me-1">Pending</span></td>-->
            <!--                    <td>-->
            <!--                      <div class="dropdown">-->
            <!--                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">-->
            <!--                          <i data-feather="more-vertical"></i>-->
            <!--                        </button>-->
            <!--                        <div class="dropdown-menu dropdown-menu-end">-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="edit-2" class="me-50"></i>-->
            <!--                            <span>Edit</span>-->
            <!--                          </a>-->
            <!--                          <a class="dropdown-item" href="#">-->
            <!--                            <i data-feather="trash" class="me-50"></i>-->
            <!--                            <span>Delete</span>-->
            <!--                          </a>-->
            <!--                        </div>-->
            <!--                      </div>-->
            <!--                    </td>-->
            <!--                  </tr>-->
            <!--                </tbody>-->
            <!--              </table>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="d-flex justify-content-between">-->
            <!--    <button class="btn btn-primary btn-prev">-->
            <!--      <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>-->
            <!--      <span class="align-middle d-sm-inline-block d-none">Previous</span>-->
            <!--    </button>-->
            <!--    <button class="btn btn-success btn-submit waves-effect waves-float waves-light">Publish</button>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </section>
      <!-- /Vertical Wizard -->

      <!-- Modal to add new user starts-->
      <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
        <div class="modal-dialog">
          <form class="add-new-user modal-content pt-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">Disclosure 301-1 Materials used by weight or volume</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="accordion-item mb-1">
                <h2 class="accordion-header" id="headingMarginOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                    Requirements
                    <span class="ms-auto me-2"></span>
                  </button>
                </h2>
                <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                  <div class="accordion-body">
                    The reporting organization shall report the following data after selecting the unit of measurements: Joules, Watt-hours, Multiples


                    <br><br>
                    Total energy consumption within the organization:
                    <ul>
                      <li>Total non-renewable fuel consumption & fuel types</li>
                      <li>Total renewable fuel consumption & fuel types</li>
                      <li>Total consumption of purchased electricity, heating, cooling & steam</li>
                      <li> Total non-consumption of self generated electricity, heating, cooling & steam</li>
                      <li>Total sale of electricity, heating, cooling & steam for removal from total energy consumption within the organization</li>
                      <li>Standards, methodologies, assumptions &/or calculation tools in use</li>
                      <li>Sources of the coversion factors in use</li>
                    </ul>

                  </div>
                </div>
              </div>
              <div class="accordion-item mb-1">
                <h2 class="accordion-header" id="headingMarginTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                    Guidance
                    <span class="ms-auto me-2"></span>
                  </button>
                </h2>
                <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                  <div class="accordion-body">
                    <p style=" text-align:justify;"> Most businesses exclusively use electricity as a significant source of energy.
                      The organization can either create its own energy (self-generated) or obtain it from other sources(external).
                      Non-renewable fuel sources might include fuel used in the organization's own or controlled boilers, furnaces, heaters, turbines, flares, incinerators, generators, and automobiles.
                      The organization's purchases of fuels are covered by non-renewable fuel sources. They also include fuel produced by the organization's operations & activities. Renewable fuel sources can include biofuels, when purchased for direct use, and biomass in sources owned or controlled by the organization.
                      The primary source of direct (Scope 1) GHG emissions is often due to the use of non-renewable fuels. Consuming purchased electricity, heating, cooling, and steam contributes to the organization’s energy indirect (Scope 2) GHG emissions.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item mb-1">
                <h2 class="accordion-header" id="headingMarginThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginThree" aria-expanded="false" aria-controls="accordionMarginThree">
                    Answer
                    <span class="ms-auto me-2"></span>
                  </button>
                </h2>
                <div id="accordionMarginThree" class="accordion-collapse collapse" aria-labelledby="headingMarginThree" data-bs-parent="#accordionMargin">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class="form-check-label fw-bolder">Text</label>
                        <input type="text" name="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="form-check-label fw-bolder">Unit</label>
                        <select class="form-class select2">
                          <option value="KWH">KWH</option>
                          <option value="MJ">MJ</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mt-1">
                      <button type="button" class="btn btn-dark waves-effect waves-float waves-light btn-sm">Request Data</button>
                      <button type="button" class="btn btn-dark waves-effect waves-float waves-light btn-sm">Document Connect</button>
                    </div>

                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Modal to add new user Ends-->
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>

<script>

$(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

  $('#step_submit_1').submit(function(e) {
    e.preventDefault();
    let name = $('#name').val(),
      start_date = $('#start_date').val(),
      end_date = $('#end_date').val(),
      standard = $('#standard').val();
    var data = {
      name: name,
      start_date: start_date,
      end_date: end_date,
      standard: standard
    }
    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_1') ?>",
      data: data,
      dataType: "json",
      success: function(response) {
        append = '';
        let data = response['data'];
        $('#step_2_id').val(response['id']);
        $('#standarad_id').val(response['standard']);
        for (i in data) {
          append += `<option value="` + data[i]['id'] + `">` + data[i]['classification_name'] + `</option>`;
        }
        console.log(append);
        $('#select2-multiple').html(append);
      }
    });
  });


  $('#step_submit_2').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_2') ?>",
      data: {
        indicators: $('#select2-multiple').val(),
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },

      success: function(data)
      {
        $('#show_step_3').html(data);
      }
    });
  });
  // alert('xdgfhfdjfiojngfn');

  $('#step_submit_3').submit(function(e) {
    e.preventDefault();

    var fav = [];
$.each($("input[name='subdischeck[]']:checked"), function(){            
    fav.push($(this).val());
});

    $.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_submit_3') ?>",
      data: {
        sub_dis: fav,
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },
    
      success: function(data) {
      
        $('#show_step_4').html(data);
        // append = '';
        // for (i in data) {
        //   append += `<option value="` + data[i]['id'] + `">` + data[i]['disclosure_name'] + `</option>`;
        // }
        // console.log(append);
        // $('#select2-multiple').append(append);
      }
    });

  });

</script>
<script>
  function sitescheck()
  {
    var fav = [];
$.each($("input[name='sitescheck[]']:checked"), function(){            
    fav.push($(this).val());
});

var fav1 = [];
$.each($("input[name='subdischeck[]']:checked"), function(){            
    fav1.push($(this).val());
});

$.ajax({
      type: "post",
      url: "<?= site_url('reportbuilder/step_4') ?>",
      data: {
        sites: fav,
        sub_dis1:fav1,
        id: $('#step_2_id').val(),
        standarad_id: $('#standarad_id').val()
        
      },
    
      success: function(data) {
      
        $('#showClassiData').html(data);

      }
    });

  }
</script>

<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>
  var input = document.getElementById('company_address');
  var company_address = new google.maps.places.Autocomplete(input);
</script>

<script>
  $('.company_pin').keypress(function() {

    var regExp = /[a-z]/i;
    $('.company_pin').on('keydown keyup', function(e) {

      var value = String.fromCharCode(e.which) || e.key; // No letters

      if (regExp.test(value)) {

        e.preventDefault();
        return false;
      }

    });
  });

  function editemployee(that) {

    var emp_table_id = $(that).attr("data-emp_table_id");
    var empid = $(that).attr("data-empid");
    var name = $(that).attr("data-name");
    var phone_no = $(that).attr("data-phone_no");
    var email = $(that).attr("data-email");
    $("#emp_table_id").val(emp_table_id);
    $("#employee_emp_id").val(empid);
    $("#employee_name").val(name);
    $("#employee_phone_no").val(phone_no);
    $("#employee_email").val(email);
    $('#docEditePopup').modal('show');
  }



  function deleteemployee_id(that) {

    var id = $(that).attr("data-number"); // alert(id);    $("#del_employee_id").val(id);    $("#docDeletePopup").modal('show');  }







    function showBoundary(that) {

      var boundary_id = $(that).val(); // alert(boundary_id);    if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {

      $.ajax({

        url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {

          $("#subboundary_id").html(data);
        },
        error: function(xhr, status, error) {

          $('#indicatorDiv').html('<option value="">No data found </option>');
        }

      });
    }

    $.ajax({

      url: "<?php echo base_url() ?>/Controlwork/getIndicatorByboundary/" + boundary_id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {

        $("#indicator").html(data);
      },
      error: function(xhr, status, error) {

        $('#indicator').html('<option value="">No data found </option>');
      }

    });
  }
</script>