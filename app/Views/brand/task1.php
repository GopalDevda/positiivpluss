<?= $this->extend('brand/layout/master-page.php') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/dragula.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-quill-editor.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-validation.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-todo.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-ecommerce.min.css')?>')?>">
<?= $this->endSection();?>

<?= $this->section('content') ?>
<!-- BEGIN: Content-->
    <div class="app-content content todo-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-area-wrapper container-xxl p-0">
        <div class="sidebar-left">
          <div class="sidebar"><div class="sidebar-content todo-sidebar">
  <div class="todo-app-menu">
    <div class="add-task">
      <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">
        Add Action
      </button>
    </div>
    <div class="sidebar-menu-list">
      <div class="list-group list-group-filters">
        <a href="#" class="list-group-item list-group-item-action active">
          <i data-feather="mail" class="font-medium-3 me-50"></i>
          <span class="align-middle"> My Task</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <i data-feather="star" class="font-medium-3 me-50"></i> <span class="align-middle">Important</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <i data-feather="check" class="font-medium-3 me-50"></i> <span class="align-middle">Completed</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <i data-feather="trash" class="font-medium-3 me-50"></i> <span class="align-middle">Deleted</span>
        </a>
      </div>
      <div class="mt-3 px-2 d-flex justify-content-between">
        <h6 class="section-label mb-1">Tags</h6>
        <i data-feather="plus" class="cursor-pointer"></i>
      </div>
      <div class="list-group list-group-labels">
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-primary me-1"></span>Team
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-success me-1"></span>Low
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-warning me-1"></span>Medium
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-danger me-1"></span>High
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-info me-1"></span>Update
        </a>
      </div>
    </div>
  </div>
</div>

          </div>
        </div>
        <div class="content-right">
          <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body"><div class="body-content-overlay"></div>
<div class="todo-app-list">
  <!-- Todo search starts -->
  <div class="app-fixed-search d-flex align-items-center">
    <div class="sidebar-toggle d-block d-lg-none ms-1">
      <i data-feather="menu" class="font-medium-5"></i>
    </div>
    <div class="d-flex align-content-center justify-content-between w-100">
      <div class="input-group input-group-merge">
        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
        <input
          type="text"
          class="form-control"
          id="todo-search"
          placeholder="Search task"
          aria-label="Search..."
          aria-describedby="todo-search"
        />
      </div>
    </div>
    <div class="dropdown">
      <a
        href="#"
        class="dropdown-toggle hide-arrow me-1"
        id="todoActions"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="todoActions">
        <a class="dropdown-item sort-asc" href="#">Sort A - Z</a>
        <a class="dropdown-item sort-desc" href="#">Sort Z - A</a>
        <a class="dropdown-item" href="#">Sort Assignee</a>
        <a class="dropdown-item" href="#">Sort Due Date</a>
        <a class="dropdown-item" href="#">Sort Today</a>
        <a class="dropdown-item" href="#">Sort 1 Week</a>
        <a class="dropdown-item" href="#">Sort 1 Month</a>
      </div>
    </div>
  </div>
  <!-- Todo search ends -->

  <!-- Todo List starts -->
  <div class="todo-task-list-wrapper list-group">
    <ul class="todo-task-list media-list" id="todo-task-list">
      <?php foreach($action as $key => $row){?>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck1" />
                <label class="form-check-label" for="customCheck1"></label>
              </div>
              <span class="todo-title"><?= $row['title'];?> 💻</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-primary">Team</span>
              <?php 
              if($row['priority'] == 'High'){?>
              <span class="badge rounded-pill badge-light-danger">High</span>
              <?php } elseif($row['priority'] == 'Low'){?>
                <span class="badge rounded-pill badge-light-success">Low</span>
                <?php }else{ ?>
                  <span class="badge rounded-pill badge-light-warning">Medium</span>
                  <?php }?>
            </div>
            <small class="text-nowrap text-muted me-1"><?php $date=date_create($row['due_date']);
            echo date_format($date,"F j");?></small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <?php }?>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck2" />
                <label class="form-check-label" for="customCheck2"></label>
              </div>
              <span class="todo-title">Plan a party for development team 🎁</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-primary">Team</span>
              <span class="badge rounded-pill badge-light-danger">High</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 30</small>
            <div class="avatar bg-light-warning">
              <div class="avatar-content">MB</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck3" />
                <label class="form-check-label" for="customCheck3"></label>
              </div>
              <span class="todo-title">Hire 5 new Fresher or Experienced, frontend and backend developers </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-info">Update</span>
              <span class="badge rounded-pill badge-light-warning">Medium</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 28</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item completed">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck4" checked />
                <label class="form-check-label" for="customCheck4"></label>
              </div>
              <span class="todo-title">Skype Tommy for project status & report</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-danger">High</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 18</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-8.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck5" />
                <label class="form-check-label" for="customCheck5"></label>
              </div>
              <span class="todo-title">Send PPT with real-time reports</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-warning">Medium</span>
              <span class="badge rounded-pill badge-light-success">Low</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 22</small>
            <div class="avatar bg-light-danger">
              <div class="avatar-content">LM</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck6" />
                <label class="form-check-label" for="customCheck6"></label>
              </div>
              <span class="todo-title">Submit quotation for Abid's ecommerce website and admin project </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-primary">Team</span>
              <span class="badge rounded-pill badge-light-success">Low</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 24</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item completed">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck7" checked />
                <label class="form-check-label" for="customCheck7"></label>
              </div>
              <span class="todo-title">Reminder to mail clients for holidays</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-primary">Team</span>
              <span class="badge rounded-pill badge-light-warning">Medium</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 27</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck8" />
                <label class="form-check-label" for="customCheck8"></label>
              </div>
              <span class="todo-title">Refactor Code and fix the bugs and test it on server </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-success">Low</span>
              <span class="badge rounded-pill badge-light-warning">Medium</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 27</small>
            <div class="avatar bg-light-success">
              <div class="avatar-content">KL</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck9" />
                <label class="form-check-label" for="customCheck9"></label>
              </div>
              <span class="todo-title">List out all the SEO resources and send it to new SEO team. </span>
            </div>
          </div>
          <div class="todo-item-action">
            <small class="text-nowrap text-muted me-1">Sept 15</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck10" />
                <label class="form-check-label" for="customCheck10"></label>
              </div>
              <span class="todo-title">Finish documentation and make it live</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-success">Low</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 28</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item completed">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck11" checked />
                <label class="form-check-label" for="customCheck11"></label>
              </div>
              <span class="todo-title">Pick up Nats from her school and drop at dance class😁 </span>
            </div>
          </div>
          <div class="todo-item-action">
            <small class="text-nowrap text-muted me-1">Aug 17</small>
            <div class="avatar bg-light-primary">
              <div class="avatar-content">PK</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck12" />
                <label class="form-check-label" for="customCheck12"></label>
              </div>
              <span class="todo-title">Plan new dashboard design with design team for Google app store. </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-info">Update</span>
            </div>
            <small class="text-nowrap text-muted me-1">Sept 02</small>
            <div class="avatar bg-light-danger">
              <div class="avatar-content">LO</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck13" />
                <label class="form-check-label" for="customCheck13"></label>
              </div>
              <span class="todo-title">Conduct a mini awareness meeting regarding health care. </span>
            </div>
          </div>
          <div class="todo-item-action">
            <small class="text-nowrap text-muted me-1">Sept 05</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-17.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item completed">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck14" checked />
                <label class="form-check-label" for="customCheck14"></label>
              </div>
              <span class="todo-title">Test functionality of apps developed by dev team for enhancements. </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-danger">High</span>
            </div>
            <small class="text-nowrap text-muted me-1">Sept 07</small>
            <div class="avatar bg-light-info">
              <div class="avatar-content">VB</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck15" />
                <label class="form-check-label" for="customCheck15"></label>
              </div>
              <span class="todo-title">Answer the support tickets and close completed tickets. </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-primary">Frontend</span>
            </div>
            <small class="text-nowrap text-muted me-1">Sept 12</small>
            <div class="avatar bg-light-success">
              <div class="avatar-content">SW</div>
            </div>
          </div>
        </div>
      </li>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
            <i data-feather="more-vertical" class="drag-icon"></i>
            <div class="title-wrapper">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck16" />
                <label class="form-check-label" for="customCheck16"></label>
              </div>
              <span class="todo-title">Meet Jane and ask for coffee ❤️</span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
              <span class="badge rounded-pill badge-light-info">Update</span>
              <span class="badge rounded-pill badge-light-warning">Medium</span>
              <span class="badge rounded-pill badge-light-success">Low</span>
            </div>
            <small class="text-nowrap text-muted me-1">Aug 10</small>
            <div class="avatar">
              <img
                src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-2.jpg')?>"
                alt="user-avatar"
                height="32"
                width="32"
              />
            </div>
          </div>
        </div>
      </li>
    </ul>
    <div class="no-results">
      <h5>No Items Found</h5>
    </div>
  </div>
  <!-- Todo List ends -->
</div>

<!-- Right Sidebar starts -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
     
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
                  <img
                    class="me-1"
                    src="<?php echo base_url('public/brand/assets/app-assets/images/icons/file-icons/pdf.png')?>"
                    alt="invoice"
                    height="23"
                  />
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
                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/12-small.png')?>" alt="avatar" height="38" width="38" />
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
                <button
                  class="btn btn-outline-primary btn-sm"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseExample"
                  aria-expanded="true"
                  aria-controls="collapseExample"
                >
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
                      <span> This Year's Total Balance : <span class="fw-bold">$70000</span></span>
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
                      <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/1-small.png')?>" alt="Avatar" height="32" width="32" />
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
                  Develop an online store of electronic devices for the provided layout, as well as develop a mobile
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
                  Our main goal is to design a new mobile application for our client. The customer wants a clean & flat
                  design.
                </p>
                <div>
                  <span class="text-muted">Participants</span>
                  <div class="avatar-group mt-50">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Vinnie Mostowy"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Elicia Rieske"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Julee Rossignol"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-10.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
       <div class="my-1">
            <button type="submit" class="btn btn-primary d-none add-todo-item me-1">Add</button>
            <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
            <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
              Delete
            </button>
          </div>
    </div>
  </div>
</div>
<!-- Right Sidebar ends -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/app-todo.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/dragula.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/app-ecommerce.min.js')?>"></script>
<?= $this->endSection() ?>

