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

<!-- add Assessment modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Taskscheduler</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Taskscheduler/add_task_schuduler" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Boundary</label>
                        <select name="boundary" id="boundary" class="form-control select2" required="required"  onchange="showBoundary(this);">
                           <option value="">Select Boundary </option>
                           <?php
                              if(!empty($boundary_item))
                              foreach($boundary_item as $dd){?>
                           <option value="<?php echo $dd['id'];?>"><?php echo $dd['item_name'];?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Select  Sub Boundary</label>
                        <select class="form-control select2" id="subboundary_id" name="sub_boundary" onchange="getQuestionByIndicatorAjax(this);">
                           <option value="0">Select  Sub Boundary</option>
                           <?php
                              if(!empty($indicator)) {
                              foreach($indicator as $indi) {
                              ?>
                           <option value="<?php echo $indi['id'] ?>"><?php echo $indi['indicator_name'] ?></option>
                           <?php }} ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">

                  <div class="form-group">
            
                     <label for="exampleInputEmail1">Type</label>
                    <select name="type" id="type" required="required"  class="form-control" >
                        <option value="">Select Type</option>
                        <option value="1">Survey</option>
                        <option value="2">Checklist</option> 
                        <option value="3">Inception</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Select Assessment</label>
                        <select class="form-control select2" id="indicator" name="assessment_name" >
                           <option value="0">Select Assessment</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Assigned to</label>
                        <select id="id_select2_example" style="width: 200px;" class="form-control select2" name="assigned_to"  required='required'>
                           <option  value="0">Select Assigned to </option>
                           <?php if(!empty($employee_details)) {
                              foreach($employee_details as $empd) {
                              //   ?><?php
                                if($empd['id'] == session()->supplier_info['supplier_id']){
                              ?>
                           <option value="<?= session()->supplier_info['supplier_id']?>">Self</option>
                           <?php }else{?>
                           <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg"  value="<?php echo $empd['id'] ?>">

                             <?php echo $empd['supplier_name'] ?>
                             
                             <?php
                                   if($empd['role'] == 10)
                                       {                                            
                                      echo "( Admin )";
                                       }
                                       elseif($empd['role'] == 11){
                                         echo "( Manager )";
                                       }
                                       elseif($empd['role'] == 0){
                                        echo "( Owner )";
                                       } 
                                       elseif($empd['role'] == 12){
                                         echo "( Emploee )";
                                       }
                                       else{
                                         echo "( Supplier )";
                                       }
                                        ?>
                        </option>
                           <?php
                              }
                                 }
                                  }
                                                        ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Frequency</label>
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio1" value="Yearly" checked />
                              <label class="form-check-label" for="inlineRadio1">Yearly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio2" value="Half yearly" />
                              <label class="form-check-label" for="inlineRadio2">Half yearly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio3" value="Quarterly" />
                              <label class="form-check-label" for="inlineRadio3">Quarterly</label>
                           </div>
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="inlineRadio4" value="Monthly" />
                              <label class="form-check-label" for="inlineRadio4">Monthly</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Comment</label>
                        <textarea placeholder="" class="form-control" name="comment" id="comment" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Due Date</label>
                        <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="due_date" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Priority</label>
                        <select class="form-control select2" class="" name="priority">
                           <option value="1">Low</option>
                           <option value="2">Mediun </option>
                           <option value="3">High</option>
                        <option value="4">Critical</option>

                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
         <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- end Assessment modal -->

</div>
<!-- edit Assessment modal -->
<div class="modal fade text-start" id="default-edit" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit task scheduler</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Controlwork/control_assessment_update" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="first-name-column">Boundary</label>
                        <input type="hidden" name='id' value="" id="editassessmentid">
                        <input type="text" class='form-control' id='edit_boundary' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="last-name-column">Select  Sub Boundary</label>
                        <input type="text" class='form-control' id='edit_sub_boundary' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Select Assessment</label>
                        <input type="text" class='form-control' id='edit_indicator' readonly>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Assigned to</label>
                        <select class="form-control select2" name="assigned_to" id='edit_assigned_to'  required='required'>
                           <option value="0">Select Assigned to </option>
                           <?php if(!empty($employee_details)) {
                              foreach($employee_details as $empd) {
                                if($empd['id'] == session()->supplier_info['supplier_id']){
                              ?>
                           <option value="<?= session()->supplier_info['supplier_id']?>">Self</option>
                           <?php }else{?>
                           <option value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?></option>
                           <?php
                              }
                                                        }
                                                        }
                                                        ?>
                           <!--<option value="Sales">Self</option>-->
                           <!--<option value="Govind">Govind</option>-->
                           <!--<option value="Nisha">Nisha</option>-->
                           <!--<option value="Vedika">Vedika</option>-->
                           <!--<option value="Charu">Charu</option>-->
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Frequency</label>
                        <div class="demo-inline-spacing">
                           <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input " type="radio" name="frequency" id="edit_assessment_radio" value="" checked />
                              <label class="form-check-label edit_assessment_radio" for="edit-inlineRadio1"></label>
                           </div>
                           <!-- <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio2" value="Half yearly" />
                              <label class="form-check-label" for="edit-inlineRadio2">Half yearly</label>
                              </div>
                              <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio3" value="Quarterly" />
                              <label class="form-check-label" for="edit-inlineRadio3">Quarterly</label>
                              </div>
                              <div class="form-check form-check-inline mt-1">
                              <input class="form-check-input" type="radio" name="frequency" id="edit-inlineRadio4" value="Monthly" />
                              <label class="form-check-label" for="edit-inlineRadio4">Monthly</label>
                              </div> -->
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-12 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Comment</label>
                        <textarea placeholder="" class="form-control" name="comment" id="edit-comment" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Due Date</label>
                        <input type="date" class="form-control" placeholder="05-05-2022" name="due_date" id="edit-due_date" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="mb-1">
                        <label class="form-label" for="city-column">Priority</label>
                        <select class="form-control "  id='edit_priority' name="priority">
                           <option value="1">Low</option>
                           <option value="2">Mediun </option>
                           <option value="3">High</option>
                        <option value="Critical">Critical</option>
                           
                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- end edit Assessment modal -->

<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-start mb-0">Taskscheduler</h2>
                  <div class="breadcrumb-wrapper">
                  </div>
               </div>
            </div>
         </div>
      </div>
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
         <strong>Success!</strong> <?php echo $session->get('error');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      <div class="content-body">
         <section id="basic-horizontal-layouts">
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Taskscheduler</h4>
                     </div>
                     <div class="card-body">
                        <div id="echartBar1" style="height: 300px;"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="row">
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color"><?= $success;?></h3>

                                 <span class="text-white">Success</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                 <i class="fa-brands fa-affiliatetheme"></i>                </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color"><?= $total_assessment;?></h3>
                                 <span class="text-white">Total</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                 <i class="fa-brands fa-product-hunt"></i>                
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color"><?= $total_panding - $success; ?></h3>
                                 <span class="text-white">Failed</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                 <i class="fa-solid fa-location-dot"></i>                
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="card myblock">
                           <div class="card-body d-flex align-items-center justify-content-between">
                              <div>
                                 <h3 class="fw-bolder mb-75 font_color"><?= $total_assessment - $total_panding;?></h3>
                                 <span class="text-white">Pending</span>
                              </div>
                              <div class="avatar bg-light-primary p-50">
                                 <span class="avatar-content">
                                 <i class="fa-solid fa-users"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Dashboard Ecommerce Starts -->
         <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
               <div class="row breadcrumbs-top">
                  <div class="col-12">
                     <h2 class="content-header-title float-start mb-0"></h2>
                     <div class="breadcrumb-wrapper">
                     </div>
                  </div>
               </div>
            </div>
            <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
               <div class="mb-1 breadcrumb-right">
                  <div class="dropdown">

                     <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
                     <i class="fa-solid fa-plus"></i> Add Taskscheduler
                     </button>
                     <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#tempalte">
                     <i class="fa-solid fa-plus"></i> Add Template
                     </button>
                     
                  </div>
               </div>
            </div>
         </div>
     <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Task Schuduler</h4>
        </div>
        <div class="card-body">
          <!-- Nav tabs -->

          <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab-fill"
                data-bs-toggle="tab"
                href="#home-fill"
                role="tab"
                aria-controls="home-fill"
                aria-selected="true"
                >Task</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="profile-tab-fill"
                data-bs-toggle="tab"
                href="#profile-fill"
                role="tab"
                aria-controls="profile-fill"
                aria-selected="false"
                >Template</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content pt-1">
            <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
             <section class="app-user-list">
          
              <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Boundary_id</th>
                           <th>SubBoundary_id</th>
                           <th>Type</th>
                           <th>Assessment_id</th>
                            <th>Frequency</th>
                           <th>Assign</th>
                           <th>due_date</th>
                           <th>priority</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($task_scheduler as $key => $row){
                           ?>
                        <tr>
                           <td><?= ++$key;?>
                             

                           </td>

                             <td>
   
                                 <?php  if(!empty($boundary_item)){
                              foreach($boundary_item as $dd){
                                echo $dd['id']==$row['boundary_id']? $dd['item_name']:'';
                                
                               } }?>
                                </td>
                                <td>

                                  <?php if(!empty($sub_boundary_item)){
                              foreach($sub_boundary_item as $dsd){
                              
                                echo $dsd['id']==$row['subboundary_id']? $dsd['cp_name']:'';
                                
                               } }?>
                                </td>
                                 
                           <td><?php if($row['type'] == '1'){
                                  echo 'Survey';
                           }if($row['type'] == '2'){
                                  echo 'Checlist';


                           }
                           if($row['type'] == '3'){
                                  echo 'Inception';


                           }
                          
                        ?></td>
                        <td> <?php if(!empty($assessment)){
                              foreach($assessment as $dd){
                                echo $dd['id']==$row['assessment_id']? $dd['assessment_name']:'';
                                
                               } }?> 
                                </td>
 <td><?php
                             
                            echo $row['frequency'];
                             
                              
                                ?></td>  

                              <td>
                                <div class="media">
                                 <?php
                                    if(!empty($supplier)){
                                    foreach($supplier as $dsd){
                                      if($dsd['id']==$row['supplier_id']){
                                      ?>
                                 <div class="media-aside align-self-center">
                                    <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
                                       <span class="b-avatar-img">
                                       <img src="<?= base_url("/")?>/public/uploads/owner/john.jpg" alt="avatar">
                                       </span><!---->
                                    </a>
                                 </div>
                        <div class="media-body">
                           <a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">
                           <?= $dsd['id']==$row['supplier_id']? $dsd['supplier_name']:''; ?>
                              </a>
                           <small class="text-muted"><?php 
                                       if($dsd['role'] == 10){
                                         echo "Admin";
                                       }
                                       elseif($dsd['role'] == 11){
                                         echo "Manager";
                                       }
                                       elseif($dsd['role'] == 0){
                                        echo "Owner";
                                      }
                                       elseif($dsd['role'] == 12){
                                         echo "Emploee";
                                       }
                                       else{
                                         echo "Supplier";
                                       }
                                       ?></small>
                                 </div>
                                 <?php } }}?>
                              </div>
                                   
                                </td> 

                                 <td><?php
                             
                            echo $row['due_date'];
                             
                              
                                ?></td>  
                                <td>
                                   <?php if($row['priority'] == '1'){
                                  echo 'Low';
                           }if($row['priority'] == '2'){
                                  echo 'Mediun';


                           }
                           if($row['priority'] == '3'){
                                  echo 'High';


                           }
                            if($row['priority'] == '4'){
                                  echo 'Critical';


                           }
                          
                        ?>
                                </td>  

                           <td>
                              <div class="dropdown">
                                 <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                 <i data-feather="more-vertical"></i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end">
                                   
                                       
                                    <a class="dropdown-item edit-model-button" data-id="<?php echo $row['id'] ?>" href="#" data-bs-toggle="modal" 
                                      >
                                    <i data-feather="edit-2" class="me-50"></i>
                                    <span>Edit</span>
                                    </a>
                                    
                                    <a class="dropdown-item" href="<?= base_url('Taskscheduler/taskscheduler_delete')."/".$row['id'];?>" 
                                       onclick="return confirm('Are you show delete this?');">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>Delete</span>
                                    </a>
                                     <a class="dropdown-item" href="<?= base_url('Taskscheduler/view_scheduler')."/".$row['id'];?>">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>View</span>
                                    </a>
                                   
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?php 
                     }?>
                       <!--  <td></td>
                        <td>Name</td>
                        <td>Building</td>
                        <td>Head office</td>
                        <td>ok</td>
                        <td>01-02-2022 to 30-04-2022</td>
                        <td><span class="badge badge-light-success">Success</span></td>
                        <td>minal</td>
                        <td>22-03-2022</td> -->
                        <!-- <td> -->
                           <!-- <div class="dropdown"> -->
                              <!-- <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                              </button> -->
                              <!-- <div class="dropdown-menu dropdown-menu-end"> -->
                                 <!--<a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>">-->
                                 <!--  <i class="fa solid fa-play me-50"></i>-->
                                 <!--  <span>Start</span>-->
                                 <!--</a>-->
                                 <!-- // <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_report') ?>"> -->
                                <!--  <i class="fa solid fa-eye me-50"></i>
                                 <span>View Result</span>
                                 </a>
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
                        </td> --> 
                        
                     </tbody>
                  </table>
               </div>
            </div>

 <!-- list and filter end -->
         </section>
            </div>
            
<div class="modal fade text-start" id="tempalte" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Template</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="form" method="post" action="<?php echo base_url() ?>/Taskscheduler/Add_taskschedular" enctype="multipart/form-data">
               <div class="row">
                 
                  <div class="col-md-6 col-12">
                     <div class="mb-1">

                    <label for="exampleInputEmail1">Name</label>

                    <input type="text"  class="form-control" id="assessment_name" required="required" name="name">

                  </div>
                  </div>
                   <div class="col-md-6 col-12">
                     <div class="mb-1"> 
            
            
                     <label for="exampleInputEmail1">Type</label>
            
            
            
                    <select name="type" id="type" required="required"  class="form-control" >
            
            
            
                        <option value="">Select Type</option>
            
            
            
                        <option value="1">Survey</option>
            
            
                        <option value="2">Checklist </option>
                        
                        
                        <option value="3">Inception </option>
            
            
            
                    </select>
            
            
            
                  </div>
                  </div>
                  
                  
                  
              <div class="col-md-6 col-12">
                     <div class="mb-1"> 



                    <label for="exampleInputEmail1">Select Industry </label>



                    <select name="industry_id" id="industry_id" required="required" class="form-control">



                        <option value="">Select Industry </option>

                        <option value="0">All</option>



                        <?php if(!empty($industry)){



                          foreach($industry as $r){?>



                        <option value="<?php echo $r['id'];?>"><?php echo $r['industry_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div>
                  </div>
                  
                   <div class="col-md-6 col-12">
                     <div class="mb-1"> 




                    <label for="exampleInputEmail1"> Select Indicator Category</label>



                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">



                        <option value="">Select Indicator Category </option>



                        <?php if(!empty($indicator_category)){



                          foreach($indicator_category as $r){?>



                        <option value="<?php echo $r['id'];?>"><?php echo $r['indicator_category_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div>
                  </div>



                <div class="col-md-6 col-12">
                     <div class="mb-1"> 




                    <label for="exampleInputEmail1"> Select Indicator </label>



                    <select name="indicator_id" id="indicatorDiv" required="required" class="form-control" >



                        <option value="">Select Indicator </option>



                        



                    </select>



                  </div>
                  </div>



              <div class="col-md-6 col-12">
                     <div class="mb-1"> 



                    <label for="exampleInputEmail1">Select Location </label>



                    <select name="location_id" id="location_id" required="required" class="form-control">



                        <option value="">Select Location </option>

                        <option value="0">All</option>



                        <?php 

                          if($country) {

                            foreach($country as $c) {

                        ?>

                          <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>

                        <?php                              

                            }

                          }

                        ?>



                    </select>



                  </div>
                  </div>



                <div class="col-md-6 col-12">
                     <div class="mb-1"> 



                    <label for="exampleInputEmail1">Select Company Size </label>



                    <select name="company_size" id="company_id" required="required" class="form-control">



                        <option value="">Select Size </option>

                        <option value="0">All</option>



                        <?php 

                          if($company) {

                            foreach($company as $c) {

                        ?>

                          <option value="<?php echo $c['id'] ?>"><?php echo $c['company_size'] ?></option>

                        <?php                              

                            }

                          }

                        ?>



                    </select>



                  </div>
                  </div>

         <div class="col-md-6 col-12">
                     <div class="mb-1"> 

                    <label for="exampleInputEmail1">Weight Percentage</label>

                    <input type="text"  class="form-control" id="assessment_weight_percentage" required="required" name="weight_percentage">

                  </div>
                  </div>



                  <div class="col-md-6 col-12">
                     <div class="mb-1"> 

                    <label for="exampleInputEmail1">Description</label>

                    <textarea class="form-control" id="assessment_description" required="required" name="description"></textarea>

                  </div>                           
                  </div>                           



               <div class="col-md-6 col-12">
                     <div class="mb-1"> 



                    <label for="exampleInputFile">Icon</label>



               



                      <div class="custom-file">



                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file" required="required">



                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>



                      </div>



                      </div>



                  </div>

                 

                </div>

                <!-- /.card-body -->



                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              </form>  
                 
                  
                  
                 
                 
                  
               </div>
         </div>
        
         </form>
      </div>
   </div>
            
           <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                <section class="app-user-list">
            <!-- list and filter start -->
             <div class="card">
               <div class="card-body card-datatable table-responsive pt-0">
                  <table class="table table-bordered" id="example">
                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Type</th>
                           <th>industray</th>
                           <th>Indicator</th>
                           <th>Company_size</th>
                           <th>Description</th>
                           <th>Indicator_category</th>
                           <th>Location</th>
                           <th>weight</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($template_addition as $key => $row){
                           ?>
                        <tr>
                           <td><?= ++$key;?>
                              <span class="badge rounded-pill badge-light-primary"><?php echo $row['id'] ?></span>
                           </td>
                           <td><?php
                             echo $row['name'];?></td>
                           <td><?php if($row['type'] == '1'){
                                  echo 'Survey';
                           }if($row['type'] == '2'){
                                  echo 'Checlist';


                           }
                           if($row['type'] == '3'){
                                  echo 'Inception';


                           }
                            


                        ?></td>
                           <td>

                         <?php foreach ($industry as $key => $value) {?>
                           <?php if($value['id'] == $row['industry']){
                              echo $value['industry_name'];


                           } ?>
                               
<?php
}?>

                            </td>
                                 <td><?php
                             
                            echo $row['indicator'];
                             
                              
                                ?></td>
                                <td><?php
                             
                            echo $row['company_size'];
                             
                              
                                ?></td>
                                 <td><?php
                             
                            echo $row['description'];
                             
                              
                                ?></td>
                                <td><?php
                             
                            echo $row['indicator_category'];
                             
                              
                                ?></td>
<td><?php
                             
                            echo $row['location'];
                             
                              
                                ?></td>
                                <td><?php
                             
                            echo $row['weight'];
                             
                              
                                ?></td>

                           <td>
                              <div class="dropdown">
                                 <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                 <i data-feather="more-vertical"></i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end">
                                   
                                       
                                    <a class="dropdown-item edit-model-button" href="#" data-bs-toggle="modal" 
                                      >
                                    <i data-feather="edit-2" class="me-50"></i>
                                    <span>Edit</span>
                                    </a>
                                    
                                    <a class="dropdown-item" href="<?= base_url('Taskscheduler/delete')."/".$row['id'];?>" onclick="return confirm('Are you show delete this?');">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>Delete</span>
                                    </a>
                                     <a class="dropdown-item" href="<?= base_url('Taskscheduler/view_scheduler')."/".$row['id'];?>">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>View</span>
                                    </a>
                                   
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?php 
                     }?>
                       <!--  <td></td>
                        <td>Name</td>
                        <td>Building</td>
                        <td>Head office</td>
                        <td>ok</td>
                        <td>01-02-2022 to 30-04-2022</td>
                        <td><span class="badge badge-light-success">Success</span></td>
                        <td>minal</td>
                        <td>22-03-2022</td> -->
                        <!-- <td> -->
                           <!-- <div class="dropdown"> -->
                              <!-- <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                              <i data-feather="more-vertical"></i>
                              </button> -->
                              <!-- <div class="dropdown-menu dropdown-menu-end"> -->
                                 <!--<a class="dropdown-item" href="<?php echo base_url('Controlwork/start_assessment') ?>">-->
                                 <!--  <i class="fa solid fa-play me-50"></i>-->
                                 <!--  <span>Start</span>-->
                                 <!--</a>-->
                                 <!-- // <a class="dropdown-item" href="<?php echo base_url('Controlwork/assessment_report') ?>"> -->
                                <!--  <i class="fa solid fa-eye me-50"></i>
                                 <span>View Result</span>
                                 </a>
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
                        </td> --> 
                        
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- list and filter end -->
         </section>
            </div>
            <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
              <p>
                Croissant jelly tootsie roll candy canes. Donut sugar plum jujubes sweet roll chocolate cake wafer. Tart
                caramels jujubes. Dragée tart oat cake. Fruitcake cheesecake danish. Danish topping candy jujubes. Candy
                canes candy canes lemon drops caramels tiramisu chocolate bar pie.
              </p>
              <p>
                Gummi bears tootsie roll cake wafer. Gummies powder apple pie bear claw. Caramels bear claw fruitcake
                topping lemon drops. Carrot cake macaroon ice cream liquorice donut soufflé. Gummi bears carrot cake
                toffee bonbon gingerbread lemon drops chocolate cake.
              </p>
            </div>
            <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
              <p>
                Candy canes halvah biscuit muffin dessert biscuit marzipan. Gummi bears marzipan bonbon chupa chups
                biscuit lollipop topping. Muffin sweet apple pie sweet roll jujubes chocolate. Topping cake chupa chups
                chocolate bar tiramisu tart sweet roll chocolate cake.
              </p>
              <p>
                Jelly beans caramels muffin wafer sesame snaps chupa chups chocolate cake pastry halvah. Sugar plum
                cotton candy macaroon tootsie roll topping. Liquorice topping chocolate cake tart tootsie roll danish
                bear claw. Donut candy canes marshmallow. Wafer cookie apple pie.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
      
         <!-- Dashboard Ecommerce ends -->
      </div>
   </div>
</div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
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
<!-- END: Page Vendor JS-->
<!-- barchart script-->
<script>
   $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
   
      var echartElemBar = document.getElementById("echartBar1");
   
      if (echartElemBar) {
         var echartBar = echarts.init(echartElemBar);
         echartBar.setOption({
            legend: {
               borderRadius: 0,
               orient: "horizontal",
               x: "right",
               data: ["KgCo2e"],
            },
            grid: {
               left: "8px",
               right: "8px",
               bottom: "0",
               containLabel: true,
            },
            tooltip: {
               show: true,
               backgroundColor: "rgba(0, 0, 0, .8)",
            },
            xAxis: [{
               type: "category",
               data: [
                 

                  "Success",
                  "Pending",
                  "Failed",
                  "Total",
               ],
               axisTick: {
                  alignWithLabel: true,
               },
               splitLine: {
                  show: false,
               },
               axisLine: {
                  show: true,
               },
            }, ],
            yAxis: [{
               type: "value",
               axisLabel: {
                  formatter: "{value}",
               },
               min: 0,
               max: 100,
               interval: 25,
               axisLine: {
                  show: false,
               },
               splitLine: {
                  show: true,
                  interval: "auto",
               },
            }, ],
            series: [{
               name: "KgCo2e",
               data: [
                  <?= $success;?>,
                  <?= $total_assessment - $total_panding;?>, 
                  <?= $total_panding - $success; ?>,
                  <?= $total_assessment;?>,
                 
               ],
               label: {
                  show: false,
                  color: "#639",
               },
               type: "bar",
               color: "#defe73",
               smooth: true,
               itemStyle: {
                  emphasis: {
                     shadowBlur: 10,
                     shadowOffsetX: 0,
                     shadowOffsetY: -2,
                     shadowColor: "rgba(0, 0, 0, 0.3)",
                  },
               },
            }, ],
         });
         $(window).on("resize", function () {
            setTimeout(function () {
               echartBar.resize();
            }, 500);
         });
      } // Chart in Dashboard version 1
   
   });
   
</script>
<script type="text/javascript">
    function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
                template = $("<div class='media'> <div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'><img src='https://user.positiivplus.io/public/uploads/owner/john.jpg' alt='avatar'></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>"+ text +"</a></div> ");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '40px'});

</script>
<script type="text/javascript">
$("document").ready(function() {
    $('select[name="type"]').on('change', function() {
        var tId = $(this).val();
        var id = $('select[name="boundary"]').val();
// alert(id);
        if (tId) {
            $.ajax({
                url: "<?php echo base_url()?>/Taskscheduler/getsubboundaryByBoundary/" + tId + '/' + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="assessment_name"]').empty();
                    $('select[name="assessment_name"]').append(
                        '<option value="">Open this select menu</option>');
                    $.each(data, function(key, value) {
                        $('select[name="assessment_name"]').append(
                            '<option value="' +
                            value.id + '">' + value.assessment_name +
                            '</option>');
                    })
                }

            })
        } else {
            $('select[name="assessment_name"]').empty();
        }
    });
});
</script>

<script type="text/javascript">



function getIndicatorAjax(id=1){



  $.ajax({



        url : "<?php echo base_url()?>/master/getIndicatorByIndicatorCategorymaster/"+id,



        type: "POST",



        //dataType: "JSON",



        success: function(data){



          $('#indicatorDiv').html(data);



        },



    });



}



</script>

<!-- end barchart script -->
<!-- Show Bounday script-->
<!-- <script>
   function showBoundary(that) {
   
       var boundary_id = $(that).val();
   
        // alert(boundary_id);
   
        if(boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
   
                $.ajax({
   
           url : "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/"+boundary_id,
   
           type: "POST",
   
           //dataType: "JSON",
   
           success: function(data){
   
               $("#subboundary_id").html(data);
   
           },
   
           error: function(xhr, status, error){
   
               $('#indicatorDiv').html('<option value="">No data found </option>');
   
           }        
   
       });
   
           } 
   
           $.ajax({
   
           url : "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/"+boundary_id,
   
           type: "POST",
   
           //dataType: "JSON",
   
           success: function(data){
   
              $("#indicator").html(data);
   
           },
   
           error: function(xhr, status, error){
   
                $('#indicator').html('<option value="">No data found </option>');
   
           }        
   
       });
   
      
   
   }
</script> -->


<!-- end Show Bounday script -->
<script>
   var input = document.getElementById('company_address');
   
   var company_address = new google.maps.places.Autocomplete(input);    
   
</script> 
<script>
   $('.company_pin').keypress (function(){
   
           var regExp = /[a-z]/i;
   
             $('.company_pin').on('keydown keyup', function(e) {
   
               var value = String.fromCharCode(e.which) || e.key;
   
               // No letters
   
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
   
       var id = $(that).attr("data-number");
   
       // alert(id);
   
       $("#del_employee_id").val(id);
   
       $("#docDeletePopup").modal('show');
   
   }
   
</script>
<script>
   $(document).ready(function () {
     $('.edit-model-button').on('click', function(){
       id = $(this).attr("data-id");
       boundary = $(this).attr("data-boundary");
       sub_boundary = $(this).attr("data-sub_boundary");
       indicator = $(this).attr("data-indicator");
       assigned_to = $(this).attr("data-assigned_to");
       frequency = $(this).attr("data-frequency");
       comment = $(this).attr("data-comment");
       due_date = $(this).attr("data-due_date");
       priority = $(this).attr("data-priority");
       // alert(boundary + "/" + sub_boundary + "/" + indicator);
       $.ajax({
         url: "<?= base_url('Controlwork/findDetails')?>" + "/" + boundary + "/" + sub_boundary + "/" + indicator,
         method : "GET",
         success : function(ok){
           // alert('ok');
       $('#edit_boundary').val(ok.boundary);
       $('#edit_sub_boundary').val(ok.sub_boundary);
       $('#edit_indicator').val(ok.indicator);
   
         }
       });
      
       $("#edit_priority").val(priority);
       $("#edit-comment").html(comment);
       $("#edit-due_date").val(due_date);
       $('#editassessmentid').val(id);
       $('#edit_assigned_to').val(assigned_to);
       $('.edit_assessment_radio').html(frequency);
       $('#edit_assessment_radio').val(frequency);
       $('#default-edit').modal('show');
     });
   });
</script>
<script>
    
    function showBoundary(that) {
    var boundary_id = $(that).val();
    // alert(boundary_id);
     if(boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
             $.ajax({
        url : "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/"+boundary_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
            $("#subboundary_id").html(data);
        },
        error: function(xhr, status, error){
            $('#indicatorDiv').html('<option value="">No data found </option>');
        }        
    });
        } 
        $.ajax({
        url : "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/"+boundary_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
           $("#indicator").html(data);
        },
        error: function(xhr, status, error){
             $('#indicator').html('<option value="">No data found </option>');
        }        
    });
   
}
  
</script>
<?= $this->endSection() ?>
