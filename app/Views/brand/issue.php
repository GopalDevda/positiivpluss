<?php 
use App\Models\UserNotification;
use App\Models\SupplierModel;

?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">

<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-todo.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/dragula.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-quill-editor.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-validation.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-todo.min.css')?>">
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/css/pages/app-ecommerce.min.css')?>')?>">
<style>
.select2-container--classic .select2-results__option, .select2-container--default .select2-results__option{

    font-weight:bolder;
    
}
.fw-bolder{
    font-weight:bolder; 
}
select #assign option[value="Admin"]   
{
     background-image:url(john.jpg);   }
     .box.bg-primary.text-white {
    height: 6rem;
    align-items: center;
    justify-content: center;
    display: flex;
}
     .box-2.bg-primary.text-white {
    height: 32px;
    align-items: center;
    justify-content: center;
    display: flex;
}
.my-7{
    margin: 7px 0;
}
</style>
<?= $this->endSection();?>

<?= $this->section('content') ?>
<!-- add Assessment modal -->
<div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add Report Issue</h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Type of Issue</label>
                                <select name="boundary" id="boundary" class="form-control select2" required="required">
                                    <option value="">Select Type of Issue </option>
                                    <?php foreach($i as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>"><?php echo $s['issue_name']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="last-name-column">Title Of Issue</label>
                                <input type="text" name="issue" id="issue" class="form-control"
                                    placeholder="Enter Title Of Issue">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">What Caused it</label>
                                <input type="text" name="caused" id="caused" class="form-control"
                                    placeholder="Enter What Caused it">
                            </div>
                        </div>
                        <!-- <select id="id_select2_example" style="width: 200px;">
        <option data-img_src="https://data.world/api/datadotworld-apps/dataset/python/file/raw/logo.png">Python programming</option>
        <option data-img_src="https://sdtimes.com/wp-content/uploads/2018/09/Java-logo-490x301.jpg">Java programming</option>
        <option data-img_src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/783373/1160/772/m1/fpnw/wm0/letter-c-cm-.png?1447712834&s=c2ab07fcddfa8acf10c5a0c40f0578c2">C programming</option>
    </select> -->
                        <div class="col-md-4 col-12">
                            <label for="task-assigned" class="form-label">Assigned </label>
                                <select class="form-select select2" id="id_select2_example" style="width: 200px;" name="assign">
                                <option value="">Select Assign</option>
                                <?php 
                             foreach($assign as $s) 
                             { ?>      
                        <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $s['id']; ?>">
                        
                            
                            <?php echo $s['supplier_name']; ?>
                                <?php
                                      if($s['role'] == 10) 
                                       {     
                                         echo "( Admin )";
                                       }  
                                       elseif($s['role'] == 11){
                                         echo "( Manager )";
                                       }
                                       elseif($s['role'] == 0){
                                        echo "( Owner )";
                                       }
                                       elseif($s['role'] == 12){
                                         echo "( Emploee )";
                                       }
                                       else{
                                         echo "( Supplier )";
                                       }
                                    ?>
                          </option>
                                <?php  } ?>
                            </select>
                            
                        </div>
                    <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Site</label>
                                <select class="form-control select2" id="site" name="site">
                                    <option value="">Select Site</option>
                                    <?php foreach($site as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>"><?php echo $s['cp_name']; ?></option>

                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Priority Level</label>
                                <select class="form-control select2" class="" id="priority" name="priority">
                                    <option value="">Select Priority</option>
                                    <option value="Low">Low</option>
                                    <option value="Mediun">Mediun </option>
                                    <option value="High">High</option>
                        <option value="Critical">Critical</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary me-1 waves-effect waves-float waves-light rohit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end Assessment modal -->
<span id="divrohit" class="alert alert-success alert-dismissible fade show" style="display:none; padding:20px;"></span>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Issues</h2>
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
         if($session->get('item')){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
            <strong>Success!</strong><?php echo session()->getFlashdata('item') ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <div id="updatesuccess" class="alert alert-success alert-dismissible fade show" role="alert"
            style="padding: 0.71rem 1rem; display:none;">
            <strong>Success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="deletesuccess" class="alert alert-danger alert-dismissible fade show" role="alert"
            style="padding: 0.71rem 1rem; display:none;">
            <strong>Success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="content-body">
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
                            <button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal"
                                data-bs-target="#default">
                                <i class="fa-solid fa-plus"></i> Update</button>
                            <?php  if($add == 0) { ?>
                            <button type="button" class="btn btn-primary waves-effect cc" data-bs-toggle="modal"
                                data-bs-target="#default">
                                <i class="fa-solid fa-plus"></i> Report Issue</button>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <section class="app-user-list">
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body card-datatable table-responsive pt-0">
                        
                        <!--start myblock-->
                        <div class="row gy-2 mt-1">
                          <?php foreach($join as $vvv){?>

                            <div class="col-md-6">
                              <div class="bg-light-secondary position-relative rounded p-2 border-start-info border-3">
                                <div class="dropdown dropstart btn-pinned">
                                  <a class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0 waves-effect waves-float waves-light" href="javascript:void(0)" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                    <li>
                                      <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        <span id="edit" data-id="<?php echo $vvv['id']; ?>"
                                                    data-issue_type="<?php echo $vvv['issue_type']; ?>"
                                                    data-title_issue="<?php echo $vvv['title_issue']; ?>"
                                                    data-description="<?php echo $vvv['description']; ?>"
                                                    data-coused="<?php echo $vvv['coused']; ?>"
                                                    data-assign="<?php echo $vvv['assign']; ?>"
                                                    data-site="<?php echo $vvv['site']; ?>"
                                                    data-priority="<?php echo $vvv['priority'];?>"
                                                     class="editbtn">Edit</span>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg><span class="ss" data-id="<?php echo $vvv['id'];?>">Delete</span>
                                      </a>
                                    </li>
                                 <?php $seperate=explode(',', $vvv['color']);?>

<?php if($seperate[0]!=""){?>                                 
<li> 
            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('/step1')?>/<?php echo $vvv['id'];?>">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50"></svg>
<?php foreach($view_report as $bb){?>
              <?php if($bb['tool_issue_id'] == $vvv['id']){?>

                     <?php if($bb['step5'] == '1'){?>
                  <span  value="<?php echo $vvv['id'];?>"
                 href="<?php echo base_url('/step1')?>/<?php echo $vvv['id'];?>"> <i class="fa-solid fa-eye"></i>
                    View report</span>
              <?php }
               else{ ?>
<span value="<?php echo $vvv['id'];?>" href="<?php echo base_url('/step1')?>/<?php echo $vvv['id'];?>">Open</span>

            <?php  }?>
              <?php
          }?>
             <?php  
         }?>
                                      </a>
                                    </li>
                                    <?php }
                                            ?>
                                   
                                                               
<li> 
                                      <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                                    onclick="side_form_open('<?php echo $vvv['id']; ?>')"
                                                    data-bs-target="#new-add-task-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50"></svg>
                                        <span> <i class="fa-solid fa-plus"></i>Task</span>
                                      </a>
                                    </li>



                                  </ul>
                                </div>
                                <div class="d-flex align-items-center flex-wrap">
                                  <span class="me-1">Fist Aid Case - <?php echo $vvv['uniq_spl']; ?></span><br>
                                </div>
                                 <?php $seperate=explode(',', $vvv['color']);?>
                                 <?php if($vvv['color']==""){ ?>
                                <button type="button" class="btn btn-info round waves-effect btn-sm my-7 rrrr" data-id="<?php echo $vvv['id'] ?>">Set Rating</button>
                                <?php }
                                elseif($seperate[0]=='danger'){?>
                                     

<button class="btn btn-danger round waves-effect btn-sm my-7"><?php echo 'Fatal'?></button>
                          
                        <?php
                    }
                                            elseif($seperate[0]=='warning'){?>
                                               
                                                <button class="btn btn-warning round waves-effect btn-sm my-7"><?php echo 'Major'?></button>
                                           <?php }
                                            else{?>
                                                <button class="btn round waves-effect btn-sm my-7" style="height:2rem;background-color: #FFFF00;"><?php echo 'Minor'?></button>
                                                
                                           <?php }
                                            ?>
                                <div class="mb-3">
                                    <h6 class="d-flex align-items-center">
                                      <span class="me-50">19 Feb, 2022, Sat, 4:60 pm</span>
                                    </h6>
                                    <h6 class="d-flex align-items-center">
                                      <span class="me-50">BHS LOGS</span>
                                    </h6>
                                    <h6 class="d-flex align-items-center fw-bolder">
                                      <span class="me-50"><?php   $supplier_model = new SupplierModel();
                                                        $session = session();
                                                        $sid = session()->supplier_info['supplier_id'];
                                                        $ok = $supplier_model->where('id', $sid)->first();
                                                        $dat = $ok['supplier_name'];
                                                        if(session()->supplier_info['role'] == 0)
                                                            {
                                                                $role = 10;
                                                            }
                                                            else{ 
                                                                $role = $ok['role'];
                                                        }
                                                        if($role == 11)
                                                        {$manager = 'Manager';}
                                                    else if ($role == 10)
                                                        {$manager = 'Admin';}?>
                                                <div class="media-body">
                                                    <a href="#" class="fw-bolder d-block text-nowrap text-dark" target="_self"><?php echo $dat; ?></a>
                                                    <small class="text-muted"><?php echo $manager;?></small>
                                                </div></span>
                                    </h6>
                                </div>
                                <div class="">
                                    <span>By : 

                                                <?php echo $vvv['supplier_name']; ?>
                                            
                                                <?php 
                                       if($vvv['role'] == 10){
                                         echo "(Admin)";
                                       }
                                       elseif($vvv['role'] == 11){
                                         echo "(Manager)";
                                       }
                                       elseif($vvv['role'] == 0){
                                        echo "(Owner)";
                                      }
                                       elseif($vvv['role'] == 12){
                                         echo "(Emploee)";
                                       }
                                       else{
                                         echo "(Supplier)";
                                       }
                                       ?></span><br>
                                    <div class="d-flex justify-content-between flex-grow-1">
                                        <span>19 Feb, 2022, Sat, 4:60 pm</span>
                                        <h6 class="me-50 fw-bolder">Overdue</h6>
                                    </div>
                                </div>
                              </div>
                            </div>
<?php
}?>
                           
                            
                          </div>
                        <!--end myblock-->
                        
                        
                </div>

                <!-- Modal to add new user starts-->
                <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                    <div class="modal-dialog">
                        <form class="add-new-user modal-content pt-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <input type="text" class="form-control dt-full-name"
                                        id="basic-icon-default-fullname" placeholder="John Doe" name="user-fullname" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-uname">Username</label>
                                    <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                        placeholder="Web Developer" name="user-name" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                        placeholder="john.doe@example.com" name="user-email" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-contact">Contact</label>
                                    <input type="text" id="basic-icon-default-contact" class="form-control dt-contact"
                                        placeholder="+1 (609) 933-44-22" name="user-contact" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="basic-icon-default-company">Company</label>
                                    <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                        placeholder="PIXINVENT" name="user-company" />
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="country">Country</label>
                                    <select id="country" class="select2 form-select">
                                        <option value="Australia">USA</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="user-role">User Role</label>
                                    <select id="user-role" class="select2 form-select">
                                        <option value="subscriber">Subscriber</option>
                                        <option value="editor">Editor</option>
                                        <option value="maintainer">Maintainer</option>
                                        <option value="author">Author</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="user-plan">Select Plan</label>
                                    <select id="user-plan" class="select2 form-select">
                                        <option value="basic">Basic</option>
                                        <option value="enterprise">Enterprise</option>
                                        <option value="company">Company</option>
                                        <option value="team">Team</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
        </section>
        <!-- Dashboard Ecommerce ends -->
    </div>
</div>
</div>
<!-- update model  -->

<!-- add Assessment modal -->
<div class="modal fade" id="defaultr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add Report Issue</h4>

            </div>
            <div class="modal-body">
                <form class="form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Type of Issue</label>
                                <select name="boundary" id="boundaryy" class="form-control select2" required="required">
                                    <option value="">Select Type of Issue </option>
                                    <?php foreach($v as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>"><?php echo $s['issue_name']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="last-name-column">Title Of Issue</label>
                                <input type="text" name="issue" id="issuee" class="form-control"
                                    placeholder="Enter Title Of Issue">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Description</label>
                                <textarea class="form-control" name="description" id="descriptionn"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <label for="task-assigned" class="form-label">Assigned </label>
                            <select class="select2 form-select" id="assignn" name="assignn">
                                <option value="">Select Assign</option>

                                <?php 
                             foreach($assign as $s) 
                             { ?>
                                <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg"  value="<?php echo $s['id']; ?>"><?php echo $s['supplier_name']; ?>
                                <?php
                                      if($s['role'] == 10) 
                                       {     
                                         echo "( Admin )";
                                       }  
                                       elseif($s['role'] == 11){
                                         echo "( Manager )";
                                       }
                                       elseif($s['role'] == 0){
                                        echo "( Owner )";
                                       }
                                       elseif($s['role'] == 12){
                                         echo "( Emploee )";
                                       }
                                       else{
                                         echo "( Supplier )";
                                       }
                                    ?>
                            </option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">What Caused it</label>
                                <input type="text" name="caused" id="causedd" class="form-control"
                                    placeholder="Enter What Caused it">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Site</label>
                                <select class="form-control select2" id="sitee" name="site">
                                    <option value="">Select Site</option>
                                    <?php foreach($site as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>"><?php echo $s['cp_name']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="city-column">Priority Level</label>
                                <select class="form-control select2" class="" id="priorityy" name="priority">
                                    <option value="">Select Priority</option>
                                    <option value="Low">Low</option>
                                    <option value="Mediun">Mediun </option>
                                    <option value="High">High</option>
                        <option value="Critical">Critical</option>


                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary me-1 waves-effect waves-float waves-light insert">Submit</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end Assessment modal -->
<div class="modal fade" id="gggg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Set rating</h4>
            </div>
            <input type="hidden" name="ide" id="ide">
<div class="container">
  <div class="row">
    <div class="col-md-4 pe-0">
        <div class="box bg-primary text-white">
             Severity
        </div>
    </div>
    <div class="col-md-8 p-0">
        <div class="box-2 bg-primary text-white">
                 Likelihood of incident
    </div>
        <div class="row">
            <div class="col-md-3">
                Almost Certan/ Cyclic
            </div>
             <div class="col-md-3 p-0">
               Firquent/ Repetative
            </div>
             <div class="col-md-3">
                LIkely/ Intermittent
            </div>
             <div class="col-md-3">
                Unlikely/ Rare
            </div>
        </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-4">

     <span id="i" value="Major Hazard/ Calamity">Major Hazard / Calamity</span> 
    </div>
    <div class="col-md-2 bg-danger text-center pt-0" style="height:2rem;border:20px;">
    <input type="radio" name="datared" id="radio" value="danger,1/Major Hazard">
    </div>
   <div class="col-md-2 bg-danger text-center mx-0" style="height:2rem; border:20px;">
    <input type="radio" name="datared" id="radio" value="danger,2/Major Hazard">
    </div>
     <div class="col-md-2 bg-warning text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared"  id="radio" value="warning,3/Major Hazard">
    </div>
    <div class="col-md-2 bg-info1  text-center pt-0"  style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,4/Major Hazard">
    </div>
  </div>

<div class="row">
    <div class="col-md-4">
    <span id="i" value="Fatal">Fatal</span> 
    </div>
    <div class="col-md-2 bg-danger text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" id="radio" value="danger,1/Fatal">
    </div>
   <div class="col-md-2 bg-warning  text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" id="radio" value="warning,2/Fatal">
    </div>
     <div class="col-md-2 bg-warning  text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" id="radio" value="warning,3/Fatal">
    </div>
    <div class="col-md-2 text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,4/Fatal">
    </div>
  </div>

<div class="row">
    <div class="col-md-4">
  <span id="i" value="Serious">Serious</span>  
    </div>
    <div class="col-md-2 bg-warning  text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" value="warning,1/Serious" id="radio">
    </div>
   <div class="col-md-2 bg-warning  text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" value="warning,2/Serious" id="radio">
    </div>
     <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" value="info1,3/Serious" id="radio">
    </div>
    <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" value="info1,4/Serious" id="radio">
    </div>
  </div>

<div class="row">
    <div class="col-md-4">
       Minor    </div>
    <div class="col-md-2 bg-warning text-center pt-0" style="height:2rem;">
    <input type="radio" name="datared" id="radio" value="warning,1/Minor">
    </div>
   <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,2/Minor">
    </div>
    <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,3/Minor">
    </div>
      <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,4/Minor">
    </div>
  </div>

<div class="row">
    <div class="col-md-4">
     Very Low
    </div>
    <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,1/Very Low">
    </div>
   <div class="col-md-2 bg-iddnfo text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,2/Very Low">
    </div>
     <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,3/Very Low">
    </div>
     <div class="col-md-2  text-center pt-0" style="height:2rem;background-color: #FFFF00;">
    <input type="radio" name="datared" id="radio" value="info1,4/Very Low">
    </div>
  </div>

<!-- <label>Yes</label> <input type="radio" name="">
<label>No</label>  <input type="radio" name=""> -->
<button class="btn btn-primary" id="tttt">Submit</button>
</div>
</div>
</div>
</div>

  

  
    
  
  
<!-- delete model -->
<div class="modal fade text-start" id="docDeletePopup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Delete Building</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo base_url() ?>/Tool/delete" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="ide" name="id" />
                        <p>Are you sure you want to delete this Company ?</p>
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
<!-- end delete model -->
<!-- end update model -->
<!-- right side bar -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-add-task-modal">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <!-- <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false"> -->
            <form id="" class="todo-modal needs-validation" method='post' action='<?= base_url('Tool/addIssue');?>'>
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
                            <input type="hidden" id="issue_id" name="issue_id" class="new-todo-item-title form-control"
                                placeholder="Title" />
                        </div>
                        <div class="mb-1 position-relative">
                            <label for="task-assigned" class="form-label d-block">Assignee</label>
                            <select class="select2 form-select" id="task-assigned" name="task-assigned[]"
                                multiple="multiple">
                                <?php 
                     foreach($assign as $s) { ?>
                                <option value="<?php echo $s['id']; ?>"><?php echo $s['supplier_name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="task-due-date" class="form-label">Due Date</label>
                            <input type="date" class="form-control task-due-date" id="task-due-date"
                                name="task-due-date" />
                        </div>
                        <!-- <div class="mb-1">
                     <label for="task-tag" class="form-label">Tag</label>
                     <select class="form-control task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                       <option value="">Select tag</option>
                       <option value="Risks">Risks</option>
                        <option value="Opportunities">Opportunities</option>
                        <option value="Hotspots">Hotspots</option>
                        <option value="Issues">Issues</option>
                        <option value="Others">Others</option>
                     </select>
                  </div> -->
                        <!-- <div class="mb-1">
                     <label for="task-tag" class="form-label d-block">Tag</label>
                     <select class="form-select task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                        <option value="Risks">Risks</option>
                        <option value="Opportunities">Opportunities</option>
                        <option value="Hotspots">Hotspots</option>
                        <option value="Issues">Issues</option>
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
                        <button type="submit" class="btn btn-primary me-1">Add</button>
                        <!-- <button class='btn btn-primary' type='submit'>ok</button> -->
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


<!-- end side bar -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>">
</script>
<script
    src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>">
</script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
<!-- END: Page Vendor JS-->
<script type="text/javascript">
 function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                // template1 = $("<div>ddddd </div>");
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
<!-- edit assign -->
<script type="text/javascript">
 function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                // template1 = $("<div>ddddd </div>");
                // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
                template = $("<div class='media'> <div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'><img src='https://user.positiivplus.io/public/uploads/owner/john.jpg' alt='avatar'></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>"+ text +"</a></div> ");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#assignn').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '40px'});
</script>

<script>
$(document).ready(function() {
    $('.rohit').click(function(e) {
        e.preventDefault();
        var boundary = $("#boundary").val();
        var issue = $("#issue").val();
        var description = $("#description").val();
        var caused = $("#caused").val();
        var assign = $("#id_select2_example").val();
        var site = $("#site").val();
        var priority = $("#priority").val();
        //  alert(assign);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Tool/b",
            data: {
                boundary: boundary,
                issue: issue,
                description: description,
                caused: caused,
                priority: priority,
                site: site,
                assign: assign,

            },
            success: function(response) {
                //   console.log(priority);
                $("#divrohit").show();
                $("#divrohit").html(response.success);


                setTimeout(location.reload.bind(location), 40);
                setTimeout(function() {
                    $('#divrohit').hide();
                }, 5000);


            }

        })
    });
});
</script>
<!-- barchart script-->
<script>
$(document).ready(function() {
    $(document).on('click', '.rrrr', function(event) {
        event.preventDefault();
           var id = $(this).data('id');
            $('#gggg').modal('show');
            $('#ide').val(id);
        
        });
    });

</script>
<script>

  $(document).ready(function(){

        $("button").click(function () {
       var checkedValue = $('#radio:checked').val();
        var id = $('#ide').val();
       
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
    $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Tool/setRating",
            data: {
                checkedValue:checkedValue,
                 id:id,

               
            },
            success: function(response) {

               
               
            }


        });


        });

    });
    

</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.editbtn', function(event) {
        event.preventDefault();

        var id = $(this).data('id');
        var issue_type = $(this).data('issue_type');
        var description = $(this).data('description');
        var title_issue = $(this).data('title_issue');
        var coused = $(this).data('coused');
        var assign = $(this).data('assign');
        var site = $(this).data('site');
        var priority = $(this).data('priority');
        // $('#boundaryy').val(issue_type);
        // alert(description);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Tool/edit",
            data: {
                id: id,
                issue_type: issue_type,
                description: description,
                title_issue: title_issue,
                coused: coused,
                site: site,
                assign:assign,
                priority: priority,


            },
            success: function(response) {

                $('#id').val(id);
                $('#descriptionn').val(description);
                $('#boundaryy').val(issue_type);
                $('#issuee').val(title_issue);
                $('#causedd').val(coused);
                $('#assignn').val(assign);
                $('#priorityy').val(priority);
                $('#sitee').val(site);
                $('#defaultr').modal('show');
            }


        });
    });
});
</script>

<!-- update model -->
<script>
$(document).ready(function() {
    $('.insert').click(function(e) {
        e.preventDefault();
        var id = $("#id").val();
        var boundaryy = $("#boundaryy").val();
        var issuee = $("#issuee").val();
        var descriptionn = $("#descriptionn").val();
        var causedd = $("#causedd").val();
        var site = $("#sitee").val();
        var assign = $("#assignn").val();
        var priorityy = $("#priorityy").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "<?php echo base_url()?>/Tool/update",
            data: {
                id: id,
                boundaryy: boundaryy,
                issuee: issuee,
                descriptionn: descriptionn,
                causedd: causedd,
                priorityy: priorityy,
                site: site,
                assign:assign,

            },
                success: function(response) {

                $("#updatesuccess").show();
                $('#defaultr').modal('hide');
                $("#updatesuccess").html(response.success);

                setTimeout(function() {
                    $('#updatesuccess').hide();
                }, 4000);
                setTimeout(location.reload.bind(location), 20);




            }

        })
    });
});
</script>
<!-- end update model -->

<!-- delete  -->
<script>
$(document).ready(function() {
    $('.ss').click(function(e) {
        e.preventDefault();
        // var id = $(this).data('id');
        // var description = $(this).data('description');


        var id = $(this).data("id");
        //  alert(id);
        $("#ide").val(id);

        $("#docDeletePopup").modal('show');


        //         success: function(response) {
        //     $("#deletesuccess").show();
        //     // $('#defaultr').modal('hide');
        //     $("#deletesuccess").html(response.success);
        //  setTimeout(location.reload.bind(location),20);
        //     setTimeout(function() {
        //         $('#deletesuccess').hide();
        //     }, 4000);

        // }

    })
});
// });
</script>


<!-- end delete -->
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    var echartElemBar = document.getElementById("echartBar1");

    if (echartElemBar) {
        var echartBar = echarts.init(echartElemBar);
        echartBar.setOption({
            legend: {
                borderRadius: 0,
                orient: "horizontal",
                x: "right",
                data: ["Offline"],
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
                    "Scope 1",
                    "Scope 2",
                    "Scope 3",
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
                    formatter: "${value}",
                },
                min: 0,
                max: 100000,
                interval: 25000,
                axisLine: {
                    show: false,
                },
                splitLine: {
                    show: true,
                    interval: "auto",
                },
            }, ],
            series: [{
                name: "Offline",
                data: [
                    45000,
                    82000,
                    35000,
                    93000,
                    71000,
                    89000,
                    49000,
                    91000,
                    80200,
                    86000,
                    35000,
                    40050,
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
        $(window).on("resize", function() {
            setTimeout(function() {
                echartBar.resize();
            }, 500);
        });
    } // Chart in Dashboard version 1

});
</script>
<!-- end barchart script -->

<script>
function side_form_open($r) {
    $('#issue_id').val($r);
}
</script>
<?= $this->endSection() ?>

<script>
var input = document.getElementById('company_address');

var company_address = new google.maps.places.Autocomplete(input);
</script>
<!-- insert site ajax -->

<!--end insert ajax  -->

<script>
$('.company_pin').keypress(function() {

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

function showBoundary(that) {

    var boundary_id = $(that).val();

    // alert(boundary_id);

    if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {

        $.ajax({

            url: "<?php echo base_url()?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,

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

        url: "<?php echo base_url()?>/Controlwork/getIndicatorByboundary/" + boundary_id,

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

