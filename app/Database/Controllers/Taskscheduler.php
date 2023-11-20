<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\LeadModel;
use App\Models\FinanceModel;
use App\Models\TimelineActionCenterModel;
use App\Models\BrandModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\ImpactModel;
use App\Models\RawMaterialProcessDetailModel;
use App\Models\RawmaterialDetailModel;
use App\Models\Finance_Sub_Category_Model;
use App\Models\IndustryModel;
use App\Models\IndicatorCategoryModel;
use App\Models\TrainingCourse;
use App\Models\IndicatorModel;
use App\Models\QualitativeTimelineAnswerModel;
use App\Models\IndustryCategoryModel;
use App\Models\AssessmentModel;
use App\Models\AssessmentAnswerModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\ActionCenterModel;
use App\Models\BrandQualitativeAnswerModel;
use App\Models\DegreeModel;
use App\Models\UserNotification;
use App\Models\Assessment;
use App\Models\ModuleModel;
use App\Models\SupplierModel;
use App\Models\GhgCategoryModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\GhgModel;
use App\Models\DisclosureCategoryModel;
use App\Models\DisclosureModel;
use App\Models\GhgFactorModel;
use App\Models\CourseModule;
use App\Models\CountryModel;
use App\Models\ModuleItemModel;
use App\Models\FootprintModel;
use App\Models\GhgQuestionModel;
use App\Models\StandardModel;
use App\Models\ClassificationModel;
use App\Models\FactorModel;
use App\Models\FlightDetailModel;
use App\Models\CompanyVehicleDetailModel;
use App\Models\VehicleModel;
use App\Models\AssessmentOffsetModel;
use App\Models\SupplierPlanAssessmentDetailsModel;
use App\Models\SupplierPlanAssessmentGhgDetailsModel;
use App\Models\SdgTargetModel;
use App\Models\UnitModel;
use App\Models\SubUnitModel;
use App\Models\StakeholderModel;
use App\Models\InitiativeModel;
use App\Models\FootprintTypeModel;
use App\Models\BadgeModel;
use App\Models\TransportationDetailModel;
use App\Models\HotelStayModel;
use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;
use App\Models\AdvancedAssessment;
use App\Models\Template;
use App\Models\AddTaskscheduler;
use App\Models\Template_question;



class Taskscheduler extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }
        
    public function gettimeline($timelineId=0) {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_model = new SupplierModel();
        
        // echo $timelineId;

        // $rs = $supplier_model->select("supplier_plan_id")->where('id','965')->first();
        $action_center_model = new ActionCenterModel();
        $timeline_action_center = new TimelineActionCenterModel();
        
        // $timeline_action_data = $timeline_action_center->where(['action_center_id' => $timelineId])->findAll();
        $timeline_action_data = $query = $db->query("SELECT s.supplier_name , s.role , t.* FROM `timeline_action_center` as t join `supplier` as s on s.id=t.supplier_id  WHERE t.action_center_id = $timelineId")->getResultArray();
        $centre_dataa = $action_center_model->where(['id' => $timelineId, 'status' => 1])->findAll();
        
        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        if($centre_dataa){
            $centre_data=$centre_dataa;
        }else{
             $centre_data = $action_center_model->where(['id' => $timelineId])->findAll();
            
        }
       
        $action_center_id =$centre_data[0]['id'];
        $priority =$centre_data[0]['priority'];
        

       $employee_details = $query->getResultArray();
      
       $user_data = $supplier_model->select("*")->where('id',$centre_data[0]['supplier_id'])->first();
       if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }
    else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];            
    }
       $user_new_data = $supplier_model->where('owner_id',$o_id)->findAll();
      
    //    if($user_data["role"]==10){
    //        $designation_name="Admin";
    //    } 
       $Creater_name = $user_data['supplier_name'];
       $task_report = $centre_data[0]['status'];
       $deadline = $centre_data[0]['due_date'];
       $assignedarray = json_decode($centre_data[0]['assignee']);
       $creater_image = $user_data['image'];
       if($user_data["role"]==0){
           $designation_name="Owner";
       }
       if($user_data["role"]==10){
        $designation_name="Admin";
    }
       if($user_data["role"]==11){
           $designation_name="Manager";
       }
       if($user_data["role"]==12){
           $designation_name="Employee";
       }
       if($user_data["role"]==13){
           $designation_name="Supplier";
       }
       
       $statuspic = array (
  array("id"=>"1", "name"=>"pending"),
  array("id"=>"2", "name"=>"In progress"),
  array("id"=>"3", "name"=>"Completed"),
  
);

        $rs="";
        
        
        
        
        
        
        if($centre_data) {
            $ky=1;
            $i = 0;
            // First start
            $rs.='<div class="card-body">';
            $rs.=' <ul class="timeline">';
            $rs.=' <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6 class="mb-1">'.$centre_data[0]['description'].'</h6>
                  
                </div>
                <div class="d-flex flex-row align-items-center">
                  <div class="avatar">';
                  if($creater_image == ''){
                    $rs.='<img src="'.base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg').'" alt="avatar" height="38" width="38">';
                  }
                  else{
                    $rs.='<img src="'.base_url('public/brand/assets/app-assets/images/avatars/'.$creater_image.'').'" alt="avatar" height="38" width="38">';
                  }
                  $rs.='</div>
                  <div class="ms-50" style="margin-right: 137px;">
                    <h6 class="mb-0">'.$Creater_name.' </h6>
                    <span>'.$designation_name.'</span>
                  </div>
                  <span class="timeline-event-time"><i class="fa-solid fa-calendar-days"></i> '.substr($centre_data[0]['created_at'],0,10).'<br><i class="fa-solid fa-clock"></i> '.substr($centre_data[0]['created_at'],10).'</span>
                </div>';
                $rs.='<hr>';
               $rs.=' <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column mt-1">
                          <div>
                            <p class="text-dark mb-50" style="font-weight:500">Assign</p>
                            <div class="d-flex align-items-center">';
        // danger success
     
                     
                     
                            foreach($assignedarray as $key=>$assigned){
                                $rs.= '<div class="avatar-group">';
                                foreach($user_new_data as $dt){
                                    if($dt['id'] == $assigned){
                                        $rs.= '<div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="'.$dt["supplier_name"].'" class="avatar pull-up" data-bs-original-title="Vinnie Mostowy">
                                        <img src="'.base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg").'" alt="Avatar" height="30" width="30">
                                      </div>';
                                    }
                                }
                                $rs.='</div>';       
                            }
                    $rs.= '</div></div>
                          <div class="mt-sm-0 mt-1">
                            <p class="text-dark mb-50" style="font-weight:500">Deadline</p>
                            <p class="mb-0">'.$deadline.'</p>
                          </div>
                              <div class="mt-sm-0 mt-1">
                                <p class="text-dark mb-50" style="font-weight:500">Priority</p>';
                                if($priority=="High"){$color="danger";}
                                if($priority=="Medium"){$color="warning";}
                                if($priority=="Low"){$color="success";}
                                 $rs.='<span class="mb-0 badge rounded-pill badge-light-'.$color.'">'.$priority.'</span>
                             </div>
                        </div>
              </div>
            </li>';


            // First End
            // print_r($timeline_action_data);
            
                  foreach($timeline_action_data as $key=>$timactdat){
                      
                    //   print_r($timactdat);
            $rs.='      <li class="timeline-item">';
            if($timactdat['status']=="1"){
            $rs.= '<span class="timeline-point timeline-point-warning timeline-point-indicator"></span>';
            }
            if($timactdat['status']=="2"){
            $rs.= '<span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>';
            }
            if($timactdat['status']=="3"){
            $rs.= '<span class="timeline-point timeline-point-success timeline-point-indicator"></span>';
            }
            
              
              $rs.='<div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-2">
                <h6 class="mb-1">'.$timactdat['description'].'</h6>
                  
                </div>
                
                <div class="d-flex flex-row align-items-center">
                  <div class="avatar">
                    <img src="'.base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg').'" alt="avatar" height="38" width="38" />
                  </div>
                  <div class="ms-50" style="margin-right: 137px;">
                    <h6 class="mb-0">'.$timactdat['supplier_name'].'</h6>
                    <span>';
                    if($timactdat['role'] == 0){
                        $rs.='owner';
                    }
                    elseif($timactdat['role'] == 10){
                        $rs.='admin';
                    }
                    elseif($timactdat['role'] == 11){
                        $rs.='manager';
                        
                    }
                    elseif($timactdat['role'] == 12){
                        $rs.='employee';
                    }
                    elseif($timactdat['role'] == 13){
                        $rs.='supplier';
                    }
                    $rs.= '</span>
                  </div>
                  <span class="timeline-event-time">45 min ago</span>
                </div>';
                $rs.='<hr>';
                 $rs.=' <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                          <div>
                            <p class="text-dark mb-50" style="font-weight:500" id="asss">Assign</p>
                            <div class="d-flex align-items-center">';
        // danger success
     
                     
                     // end
                            
                                $rs.= '<div class="avatar-group">';
                                $u_n = json_decode($timactdat['assigned']);
                foreach($user_new_data as $dt){
                    if(in_array($dt['id'],$u_n)){
                        
                    $rs.= '<div data-bs-toggle="tooltip" data-popup="tooltip-custom" id="sss" data-bs-placement="bottom" title="'.$dt["supplier_name"].'" aria-describedby="tooltip610702" class="avatar pull-up" data-bs-original-title="Vinnie Mostowy">';
                        if($dt['image'] == ''){
                                        $rs.='<img src="'.base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg").'" alt="Avatar" height="30" width="30">';
                        }
                        else{
                            $rs.='<img src="'.base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg").'" alt="Avatar" height="30" width="30">';
                        }
                                      $rs.='</div>';
                        
                    }
                }
                $rs.='</div>';
                                
                            
                    $rs.= '</div></div>
                          <div class="mt-sm-0 mt-1">
                            <p class="text-dark mb-50" style="font-weight:500">Deadline</p>
                            <p class="mb-0">'.$deadline.'</p>
                          </div>
                              <div class="mt-sm-0 mt-1">
                                <p class="text-dark mb-50" style="font-weight:500">Priority</p>

                                
                                 <span class="mb-0 badge rounded-pill badge-light-'.$color.'">'.$priority.'</span>
                              </div>
                        </div>
                
              </div>
            </li>'; 
                  }
                 
             
            $rs.='      ';
        $rs.='</li> </ul> </div>';
    //   print_r($task_report);
        if($task_report != '4' and $task_report != '0'){
        $rs.='<div class="my-1 mx-3">
            <button class="btn btn-primary waves-effect waves-float waves-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                  Take Further action
                </button>
           
            <button type="button" class="btn btn-outline-danger update-btn waves-effect" data-bs-dismiss="modal">
              Close
            </button>
            
            
          </div>';
          $rs.='<div class="collapse" id="collapseExample">
                  <form id="form-modal-todo" class="todo-modal needs-validation" method="post">
                  <ul class="list-group list-group-flush mt-1">
                    <li class="list-group-item d-flex justify-content-between flex-wrap" style="display:none;">
                  
                    <li class="list-group-item d-flex justify-content-between flex-wrap" id="yyy" style="display:none;">
                      <span><span class="fw-bold" id="descript" style="display:none;">Description</span><textarea id="description" class="form-control" style="display:none;" name="description" rows="4" cols="50"></textarea></span>
                      </li>
                      <input type="hidden" name="action_center_id" id="action_center_id" value="'.$action_center_id.'">
                       <input type="hidden" name="deadline" id="deadline" value="'.$deadline.'">';
              
                   
                 $rs.='</select> </li>';
                 $rs.='<li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span class="fw-bold" style="display:none;" id="task-assig">Assigne</span> <select style="display:none;"  class="select2 form-select select2-show-accessible" id="task-assigned" name="task-assigned[]"  multiple="multiple" >';
                       
                        foreach($user_new_data as $ed){
                           
                          $rs.='<option value="'.$ed['id'].'">'.$ed['supplier_name'].'</option> ';
                           
                        } 
                   
                 $rs.='</select> </li>';

                 $rs.='<li class="list-group-item d-flex justify-content-between flex-wrap"> 
                      <span class="fw-bold" style="display:none;" id="chhhh">Change Status</span> <select style="display:none;" class="select2 form-select" id="task-status" name="task-status">';
                       
                        foreach($statuspic as $std){
                           
                          $rs.='<option value="'.$std['id'].'">'.$std['name'].'</option> ';
                           
                        } 
                $rs.='</select> </li>';
                $rs.='<li class="list-group-item d-flex justify-content-between flex-wrap"> 
                      <span class="fw-bold" style="display:none;" id="imageee">Image</span> 
                       <input type="file" name="image" id="image" style="display:none;">    
                       <input type="file" name="image_old" id="image_old" style="display:none;">    
                        
                 </li>';            
                $rs.='<li class="list-group-item d-flex justify-content-between flex-wrap id="r">
                       <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="r"> Add Update</p>
                       
                       <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="roo">assign</p>
                      
                       <p  class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light"  id="attach">Attach media</p>
                      
                       <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="changeee">Change</p>
                       <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light attachhe" id="changeee">Update</p></li>
                      
                  </ul>
                  </form>

                </div>';  
                $rs.='<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>'; 
                $rs.='
    <script>
               $(document).ready(function() {
               $("#r").click(function(e) {
                  e.preventDefault();
                  // alert("okkkk");
                 $("#description").show(); 
                 $("#descript").show();
                 $("#task-assig").hide(); 
                 $("#task-assigned").hide(); 
                 $("#task-status").hide(); 
                 $("#chhhh").hide();     
                 $("#imageee").hide();     
                 $("#image").hide();     
    })
});
</script>';
$rs.='
    <script>
               $(document).ready(function() {
               $("#roo").click(function(e) {
                  e.preventDefault();
                 $("#task-assig").show(); 
                 $("#task-assigned").show(); 
                 $("#description").hide(); 
                 $("#descript").hide(); 
                 $("#task-status").hide(); 
                 $("#chhhh").hide(); 
                 $("#imageee").hide(); 
                 $("#image").hide(); 
                     
    })
});
</script>';
$rs.='
    <script>
               $(document).ready(function() {
               $("#changeee").click(function(e) {
                  e.preventDefault();
                 $("#task-status").show(); 
                 $("#chhhh").show(); 
                 $("#task-assig").hide(); 
                 $("#task-assigned").hide(); 
                 $("#description").hide(); 
                 $("#descript").hide();
                 $("#imageee").hide(); 
                 $("#image").hide();  
                     
    })
});
</script>';
$rs.='
    <script>
               $(document).ready(function() {
               $("#attach").click(function(e) {
                  e.preventDefault();
                 $("#task-status").hide(); 
                 $("#chhhh").hide(); 
                 $("#task-assig").hide(); 
                 $("#task-assigned").hide(); 
                 $("#description").hide(); 
                 $("#descript").hide();
                 $("#imageee").show(); 
                 $("#image").show();  
                     
    })
});
</script>';
$rs.='
    <script>
        $(document).ready(function() {
        $(".attachhe").click(function(e) {
         e.preventDefault();
          var description  =  $("#description").val();
          var task_change =  $("#task-status").val(); 
          var task_assigned  = $("#task-assigned").val(); 
          var image          =  $("#image").val(); 
           var action_center_id = $("#action_center_id").val();
           var deadline = $("#deadline").val();

                 // alert(description); 
            $.ajax({
               url : " '.base_url('/Controlwork/UpdateAction/').'",
               type: "POST",
               data: {
              description:description,
              task_change:task_change,
              task_assigned:task_assigned,
              image:image,
              action_center_id:action_center_id,
              deadline:deadline,

                },
               success: function(data){
   
                location.reload(); 
         }
                     
    })
    })
});
</script>';
        }     
        }

        return $rs;
    }
    
    public function index(){

      
        $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $assessment = new Assessment();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

        $supplier_mod = [];

        $supplier_mod_item = [];

        if($sup_mod_item_relation) {

            foreach($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];

            }

        }

        $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  

        
        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        $data['ghg_name'] = $query->getResultArray();
        
       

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        
       
        
      
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

        $data['sub_boundary_item'] = $query->getResultArray();

        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if(session()->supplier_info['role'] == 0){
            $role = 10;
        }
        else{
            $role = $ok['role'];
        }
        $data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();


        // $query = $db->query("SELECT ed.* FROM `employee_details`as ed WHERE ( ed.supplier_info=945 || ed.admin_id=965)  and ed. status=1 ");
        if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $data['control_assessment'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        }
        elseif(session()->supplier_info['role'] == 10){
            $sid = session()->supplier_info['supplier_id'];
                        $ok = $supplier_model->where('id', $sid)->first();
                        $o_id = $ok['owner_id'];
            $data['control_assessment'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1")->getResultArray();

            $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        }
        else{
            $sid = session()->supplier_info['supplier_id'];
                        $ok = $supplier_model->where('id', $sid)->first();
                        $o_id = $ok['owner_id'];
            $data['control_assessment'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
            if(session()->supplier_info['role'] == 11){
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();   
            }
            else{
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();   
            }
            
            
        }
        



        $data['assessment'] = $assessment->findAll();
        
        $find = $db->query("SELECT * from control_assessment where status = 1 and owner_id = $o_id")->getResultArray();
        foreach($find as $key => $row){
            if($row['frequency'] == "Yearly"){
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if($day >= 365){
                    if($row['complete'] % 2 != 0){
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date. ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date. ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
                    }
                //    print_r("ok");die();
                }
            }
            if($row['frequency'] == "Half yearly"){
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if($day > 182){
                    if($row['complete'] % 2 != 0){
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date. ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date. ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
                    }
                //    print_r("ok");die();
                }   
            }
            if($row['frequency'] == "Quarterly"){
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if($day > 90){
                    if($row['complete'] % 2 != 0){
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date. ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date. ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
                    }
                //    print_r("ok");die();
                  }  
            }
            if($row['frequency'] == "Monthly"){
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if($day > 30){
                    if($row['complete'] % 2 != 0){
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date. ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date. ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
                    }
                //    print_r("ok");die();
                  }  
            }
        }
        // print_r($find); die();
        $query = $db->query("SELECT * FROM `control_assessment` WHERE owner_id = $o_id")->getResultArray();
        $total_assessment = 0;
        $total_panding = 0;
       $success = 0;
        foreach($query as $row){
           
            $ok = $total_panding += number_format($row['complete']/2);
            if($ok){
                $find = new QualitativeTimelineAnswerModel();
                $need = $find->where('control_assessment_id',$row['id'])->findAll();
                foreach($need as $nd){
                    if($nd['percentile'] >= 50){
                        $success++;
                    }
                }
            }
            
            if($row['frequency'] == 'Monthly'){
                $total_assessment += 12;
            }
            elseif($row['frequency'] == 'Quarterly'){
                $total_assessment += 4;
            }
            elseif($row['frequency'] == 'Half yearly'){
                $total_assessment += 2;
            }
            elseif($row['frequency'] == 'Yearly'){
                $total_assessment += 1;
            }
            // print_r($total_assessment);
        }
     $data['total_assessment'] = $total_assessment;
     $data['total_panding'] = $total_panding;
     $data['success'] = $success;

     $data['supplier'] = $supplier_model->where('owner_id',$o_id)->orwhere('id',$o_id)->findAll();
    //  print_r($data['supplier']); die();

      $industry_model = new IndustryModel();
    
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
         
        $data['industry'] = $industry_model->select("*")->where('status',1)->findAll();

$query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();
 $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();


      $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();

$query = $db->query("select * from template_addition where status=1 ");

        $data['template_addition'] = $query->getResultArray(); 
        // print_r($data['template_addition']);
        // die();

        $query = $db->query("select * from task_scheduler where status=1 ");

        $data['task_scheduler'] = $query->getResultArray(); 

         $query = $db->query("select * from template_question where status=1 ");

        $data['template_question'] = $query->getResultArray(); 

        echo view('brand/view-taskscheduler',$data);

    }
    public function view_scheduler($id){


 $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
       $model = $supplier_model->where('status',0)->findAll();
       // print_r($model);
       // die();

        $assessment = new Assessment();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

        $supplier_mod = [];

        $supplier_mod_item = [];

        if($sup_mod_item_relation) {

            foreach($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];

            }

        }

        $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  

        
        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        $data['ghg_name'] = $query->getResultArray();
        
       

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        
       
        
      
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

        $data['sub_boundary_item'] = $query->getResultArray();

       

       
       $data['template_question'] = $db->query("SELECT * FROM `template_question`")->getResultArray();


      // print_r($data['template_question']);
      // die();
     

        // $data['template_question'] = $query->getResultArray(); 
               
       // print_r($data['template_question']);
       // die();
        
        
        echo view('brand/view-added-question',$data);


    }

     public function add_question($id){


     $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $assessment = new Assessment();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

        $supplier_mod = [];

        $supplier_mod_item = [];

        if($sup_mod_item_relation) {

            foreach($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];

            }

        }

        $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  

        
        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        $data['ghg_name'] = $query->getResultArray();
        
       

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        
       
        
      
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

        $data['sub_boundary_item'] = $query->getResultArray();
        
        // ________
        
     
        
        $queryAssessment = $db->query("SELECT * FROM `advancedassessment` WHERE  status=1 and id=".$id)->getResultArray();
        
        $data['title'] = $queryAssessment[0]['id'];
        
        $data['heading'] = $queryAssessment[0]['assessment_name'];

        $standard_model = new StandardModel();
        
        $disclosure_model = new DisclosureModel();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();



        $data['standard'] = $standard_model->where('status',1)->findAll();



        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();

        
        echo view('brand/added-question-schuduler',$data);


    }
    public function delete($id){

  
    $delete = new Template();

    $data= [

        'status' => '0'];

   $insert =  $delete->update($id,$data);

 if($insert){
       $session->setFlashdata('error','Template Dele successfully! ');
    }else{

             $session->setFlashdata('error','Template not added successfully! ');

    }

   return redirect()->back();


    }


public function Add_taskschedular(){

 $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');


        $supplier_model = new SupplierModel();

         $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];

        $template = new Template();
      $img =  $this->request->getFile('file');

        
        if ($img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'public/icon', $newName);
        }


        $data = [
            'supplier_id' => $u_id,
            'owner_id' => $o_id,
       'name' => $this->request->getVar('name'),
       'type' => $this->request->getVar('type'),
       'industry' => $this->request->getVar('industry_id'),
       'indicator' => $this->request->getVar('indicator_id'),
       'company_size' => $this->request->getVar('company_size'),
       'icon' => $newName,
       'description' => $this->request->getVar('description'),
       'indicator_category' => $this->request->getVar('indicator_category_id'),
       'location' => $this->request->getVar('location_id'),
       'weight' => $this->request->getVar('weight_percentage'),

        ];

    $insert =    $template->insert($data);
    if($insert){
       $session->setFlashdata('success','Template added successfully! ');
    }else{

             $session->setFlashdata('error','Template not added successfully! ');

    }

   return redirect()->back();


}

public function add_task_schuduler(){

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

         $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];

        $addtask = new AddTaskscheduler();
          
          $data = [
        'supplier_id'   => $u_id,
        'owner_id'      => $o_id,
        'boundary_id'   => $this->request->getVar('boundary'),
        'subboundary_id'=>$this->request->getVar('sub_boundary'),
        'type'          =>$this->request->getVar('type'),
        'assessment_id' =>$this->request->getVar('assessment_name'),
        'assign'        =>$this->request->getVar('assigned_to'),
        'frequency'     =>$this->request->getVar('frequency'),
        'comment'       =>$this->request->getVar('comment'),
        'due_date'      =>$this->request->getVar('due_date'),
        'priority'      =>$this->request->getVar('priority'),

          ];
        $assigned_to =  $this->request->getVar('assigned_to'); 

            $add = $addtask->insert($data);

            if($add){
       $session->setFlashdata('success','Taskscheduler added successfully! ');

       //email starts
      $ava = $db->query("select * from supplier where id='".$assigned_to."' ");
            $ava = $ava->getResultArray();
        
      $receiptemail=$ava[0]['email'];
      $detail = $supplier_model->where('id',$o_id)->first();
      $image = $detail['image'];
      $s_name = $ava[0]['supplier_name'];  
      $department = $detail['department'];
      $supplier_name = $detail['supplier_name'];
      $role = $detail['role'];
         if ($role == '10' || $role == '0') {
             $role_name = 'Admin';
         }
         if ($role == '11') {
             $role_name = 'Manager';
         }


      $task_msg.='<html><body>';
      $task_msg.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><h5  style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:70px; width:70px;" src="'.base_url("/").'/public/profilimg/'.$image.'" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</h5><h5 style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Task Scheduler" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/Taskscheduler"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $task_msg.='</body></html>';
        //print_r($task_msg);
        //die(); 
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.io', 'PositiivPlus:Assigned Task');
                        $email->setTo($receiptemail);
                        // $email->mailType(html);   
                        $email->setSubject('You have a new task!');
                        $email->setMessage($task_msg);
                        $a = $email->send();
                        //print_r($a); print_r($email);
                       //die();

    //email ends

    }else{

             $session->setFlashdata('error','Taskscheduler not added successfully! ');

    }
   

   return redirect()->back();
     

}
public function taskscheduler_delete($id){

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

$delete = new AddTaskscheduler();

    $data= [

        'status' => '0'];

   $insert =  $delete->update($id,$data);

 if($insert){
       $session->setFlashdata('error','Taskscheduler Delete successfully! ');
    }else{

             $session->setFlashdata('error','Taskscheduler not added successfully! ');

    }

   return redirect()->back();
}

public function template_question_add(){


  $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

         $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];

        $addtask = new Template_question();
          
          $data = [
       
        'title'   => $this->request->getVar('question_title'),
        'question'          =>$this->request->getVar('question'),
        'choice' =>$this->request->getVar('choice'),
        'remark'        =>$this->request->getVar('remark'),
        'document_needed'     =>$this->request->getVar('doc_needed_status'),
        'mandatory'       =>$this->request->getVar('mandatory_needed_status'),
       

          ];

            $add = $addtask->insert($data);

            if($add){
       $session->setFlashdata('success','Templatequestion added successfully! ');
    }else{

             $session->setFlashdata('error','Templatequestion not added successfully! ');

    }

   return redirect()->back();




}

public function question_delete($id){

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Taskscheduler';

        $db = \Config\Database::connect();

        $session = session();

$delete = new Template_question();

    $data= [

        'status' => '0'];

   $insert =  $delete->update($id,$data);

 if($insert){
       $session->setFlashdata('error','Template_question Delete successfully! ');
    }else{

             $session->setFlashdata('error','Taskscheduler not added successfully! ');

    }

   return redirect()->back();
}


   
}

