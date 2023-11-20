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
<style>
   .avatar-group .avatar:hover{
    -webkit-transition:all .25s ease;
    transition:all .25s ease
}
.avatar-group .avatar.pull-up:hover{
    -webkit-transform:translateY(-4px) scale(1.07);
    -ms-transform:translateY(-4px) scale(1.07);
    transform:translateY(-4px) scale(1.07)
}
</style>
<style>
.profile_span {
  background-color: black;
  color:white;
  font-size: 15px
  padding: 0px;
  display: none;
  width: 100px;
  border-radius: 10px;
}
  
.profile_div:hover + .profile_span  {
  display: block;
}
</style>
<?= $this->endSection();?>

<?= $this->section('content') ?>
<!-- BEGIN: Content-->

    <div class="app-content content todo-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <?php 
         $session = session();
         if($session->get('success')){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('success');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <?php 
         $session = session();
         if($session->get('error')){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Error!</strong> <?php echo $session->get('error');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem; display: none" id="alertMessage">
         <strong>Success!</strong>
         <span style="" id="alertMsg"></span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem; display: none" id="alertMessage2">
      <strong>Error!</strong>
         <span style="" id="alertMsg2"></span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="content-area-wrapper container-xxl p-0">
        
        <div class="sidebar-left">
          <div class="sidebar"><div class="sidebar-content todo-sidebar">
  <div class="todo-app-menu">
    <div class="add-task">
    <?php
                        if($roleAllow){
                        if($roleAllow['add'] == 1){?>
      <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-add-task-modal">
        Add Action
      </button>
      <?php }} ?>
    </div>
    <div class="sidebar-menu-list">
      <div class="list-group list-group-filters">
        <a href="#" onclick="getActionAjax('All')" class="list-group-item list-group-item-action active">
          <i data-feather="mail" class="font-medium-3 me-50"></i>
          <span class="align-middle">All </span>
        </a>
        <a href="#" onclick="getActionAjax('Pending')" class="list-group-item list-group-item-action">
          <i data-feather="star" class="font-medium-3 me-50"></i> <span class="align-middle">Pending</span>
        </a>
        <a href="#" onclick="getActionAjax('Completed')" class="list-group-item list-group-item-action">
          <i data-feather="check" class="font-medium-3 me-50"></i> <span class="align-middle">Completed</span>
        </a>
        <a href="#" onclick="getActionAjax('Archive')"class="list-group-item list-group-item-action">
          <i data-feather="trash" class="font-medium-3 me-50"></i> <span class="align-middle">Archive</span>
        </a>
      </div>
      <div class="mt-3 px-2 d-flex justify-content-between">
        <h6 class="section-label mb-1">Action Type</h6>
        <i data-feather="plus" class="cursor-pointer"></i>
      </div>
      <div class="list-group list-group-labels">
       
        <a href="#"  onclick="getActionAjax('Qualitative')"class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-success me-1"></span>Qualitative
        </a>
        <a href="#" onclick="getActionAjax('Quantitative')" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-warning me-1"></span>Quantitative
        </a>
        <a  onclick="getActionAjax('Issue Manager')" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-primary me-1" ></span>Issue Manager
        </a>
        <a  onclick="getActionAjax('Other')" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-primary me-1" ></span>Other
        </a>
        
      </div>
      <div class="mt-3 px-2 d-flex justify-content-between">
        <h6 class="section-label mb-1">Tags</h6>
        <i data-feather="plus" class="cursor-pointer"></i>
      </div>
      <div class="list-group list-group-labels">
        
        <a href="#"onclick="getActionAjax('Low')"  class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-success me-1"></span>Low
        </a>
        <a href="#" onclick="getActionAjax('Medium')" class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-warning me-1"></span>Medium
        </a>
        <a href="#" onclick="getActionAjax('High')"   class="list-group-item list-group-item-action d-flex align-items-center">
          <span class="bullet bullet-sm bullet-danger me-1"></span>High
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
<!--<i data-feather="more-vertical" class="drag-icon"></i>-->
           
  <!-- Todo List starts -->
  <div class="todo-task-list-wrapper list-group"  id="alltask">
    <ul class="todo-task-list media-list" id="todo-task-list">
      <?php foreach($action as $key => $row){?>
      <li class="todo-item">
        <div class="todo-title-wrapper">
          <div class="todo-title-area">
             <div class="title-wrapper">
              <div class="form-check">
                <!-- <input type="checkbox" class="form-check-input customCheck1" value='<?= $row['id'];?>' /> -->
              <span class="badge rounded-pill badge-light-primary"><?php echo $row['uniq_spl'];?></span>


                <?php echo ++$key;?>
                 
                <label class="form-check-label" for="customCheck1"></label>
              </div>
              <span class="todo-title r" data-title="<?php echo $row['title'];?>" onclick="getTimelineAjax(<?= $row['id'];?>);"><?= $row['title'];?> </span>
            </div>
          </div>
          <div class="todo-item-action">
            <div class="badge-wrapper me-1">
            <span class="badge rounded-pill badge-light-info"><?= $row['assign_from'];?></span>
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
            </div><?php
             if($roleAllow){
                  if($roleAllow['delete'] == 1 && $row['status'] != 0){?>

                <a href='<?php echo base_url()?>/Action/actionDelete/<?= $row['id'];?>' class="btn customCheckok" data-id='<?= $row['id'];?>' onclick='return confirm("you want to delete this")' ><i class='fa fa-trash'></i></a>
                <?php }}?>
          </div>
        </div>
      </li>
      <?php }?>
    
     
     
      
    </ul>
    <div class="no-results">
      <h5>No Items Found</h5>
    </div>
  </div>
  <!-- Ajax Start -->
  <div class="todo-task-list-wrapper list-group"  id="alltaskcompleted" style="display:none;">
  <div class="card-body" id="alltaskcompleteddiv"></div>
  </div>
  <!-- Ajax End -->
  <!-- Todo List ends -->
</div>

<!-- Right Sidebar starts -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
     
      <br><br>
   
      <div class="card">
        <div class="card-header">
          <h4 id="ti" class="card-title"></h4>
        </div>
        <div class="spinner-border text-success" style=" display: block;margin-left: auto;margin-right: auto;" role="status" id="basicloader">
              <span class="visually-hidden">Loading...</span>
            </div>
        <div id="itemDiv"></div>
      </div>
       
    </div>
  </div>
</div>
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-add-task-modal">
   <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
         <!-- <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false"> -->
         <form id="" class="todo-modal needs-validation" method='post' action='<?= base_url('Action/addAction');?>'>
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
                     <input
                        type="text"
                        id="todoTitleAdd"
                        name="todoTitleAdd"
                        class="new-todo-item-title form-control"
                        placeholder="Title"
                        />
                  </div>
                  <div class="mb-1 position-relative">
                     <label for="task-assigned" class="form-label d-block">Assignee</label>
                     <select class="select2 form-select" id="task-assigned" name="task-assigned[]" multiple="multiple">
                     <?php
                        foreach($employee_details as $ed){
                           ?>
                           <option value="<?= $ed['id'];?>"><?= $ed['supplier_name'];?></option>
                           <?php
                        } 
                        ?>
                     </select>
                  </div>
                  <div class="mb-1">
                     <label for="task-due-date" class="form-label">Due Date</label>
                     <input type="date" class="form-control task-due-date" id="task-due-date" name="task-due-date" />
                  </div>
                 <!--  <div class="mb-1">
                     <label for="task-tag" class="form-label d-block">Tag</label>
                     <select class="form-select task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                        <option value="Qualitative">Qualitative</option>
                        <option value="Quantitative">Quantitative</option>
                        <option value="Issue Manager">Issue Manager</option>
                        <option value="Others">Others</option>
                     </select>
                  </div> -->
                  <div class="mb-1">
                     <label class="form-label">Description</label>
                     
                     <!-- <input type="text" name='description' class='form-control' placeholder='Enter description'> -->
                     <textarea name="description" id="" cols="" rows="" class="form-control"></textarea>

                  </div>
                  <div class="mb-1">
                     <label class="form-label">Priority </label>
                     <select class="form-control" name="priority">
                        <option value="">Select Priority</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>
                     </select>
                  </div>
                  <!-- <div class="mb-1">
                     <label class="form-label" style="margin-bottom: 10px;">Audit</label>
                     <div class="demo-inline-spacing mb-3">
                        <div class="form-check form-check-inline mt-0">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio1"
                              value="Yes"
                              checked
                              />
                           <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mt-0">
                           <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio2"
                              value="No"
                              />
                           <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                     </div>
                  </div> -->
               </div>
               <div class="my-1">
                  <button type="submit" class="btn btn-primary me-1">Add</button>
                  <!-- <button class='btn btn-primary' type='submit'>ok</button> -->
                  <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">
                  Cancel
                  </button>
                  <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
                  <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
                  Delete
                  </button>
               </div>
            </div>
         </form>
         <br><br>
         <!-- time line -->
         <!-- <div class="card">
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
         </div> -->
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
<script>
   function getTimelineAjax(timelineId=1){
   
   
   if(timelineId){
      // alert(timelineId);
     
      $('#basicloader').show();

      $('#itemDiv').html("");
     $.ajax({
   
   
           url : "<?php echo base_url()?>/Controlwork/gettimeline/"+timelineId,
   
   
           type: "POST",
   
         //dataType: "JSON",
           success: function(data){
            $('#basicloader').hide();

   
   
             $('#itemDiv').html(data);
   
   
           },
   
   
       });
     }
   
   
   }    
   
   
</script>
<script>
   $(document).ready(function() {
    $('.r').click(function(e) {
        e.preventDefault();
      var id = $(this).data('title');  
        
       $('#ti').html(id);

        
    })
});
</script>
<script>
   function getActionAjax(actiontype=1){
   
   
   if(actiontype){
      // alert(actiontype);
      $('#alltask').hide();
     $.ajax({
   
   
           url : "<?php echo base_url()?>/Action/actionType/"+actiontype,
   
   
           type: "POST",
   
   
           //dataType: "JSON",
   
   
           success: function(data){
           
               $('#alltaskcompleted').show();
           
               $('#alltaskcompleteddiv').html(data);
   
   
           },
   
   
       });
     }
   
   
   }    
   
   
</script>
<script>
   // $(document).ready(function(){
   //    $('.customCheckok').on('click', function(){
   //       var id = $(this).attr("data-id");
   //       // alert('oko');
   //       // alert(id);
   //       if(id){
   //          $.ajax({
   //             url : "<?php echo base_url()?>/Action/actionDelete/"+id,
   //             type: "POST",
   //             //dataType: "JSON",
   //             success: function(data){
   //                // alert(data.data);
   //                if(data.data == 1){
   //                // alert("okok");
   //                $('#alertMessage').show();
   //                $('#alertMsg').html('Action deleted successfuly');
   //                }
   //                else{
   //                   $('#alertMessage2').show();
   //                $('#alertMsg2').html('Action not delete');
   //                }
   //                topFunction();
   //                // $('#alltaskcompleted').show();
   //                // $('#alltaskcompleteddiv').html(data);
   //             },
   //          });
   //       }
   //    })
   // })
</script>
<script type="text/javascript">
	function topFunction() {
  document.body.scrollTop = 10;
  document.documentElement.scrollTop = 10;
}
</script>

<?= $this->endSection() ?>

