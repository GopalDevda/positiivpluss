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

class Controlwork extends BaseController

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
    
    public function assessment()
    {

      
        $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Qualitative ';

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

       // print_r($data['roleAllow']['view']);
       // die();
        
        // $query = $db->query("SELECT ed.* FROM `employee_details`as ed WHERE ( ed.supplier_info=945 || ed.admin_id=965)  and ed. status=1 ");
        if(session()->supplier_info['role'] == 0)
        {
            $o_id = session()->supplier_info['supplier_id'];
            $data['control_assessment_pending'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1 and complete=0")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1 and complete=1")->getResultArray();

            $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        }
        elseif(session()->supplier_info['role'] == 10)
        {
            $sid = session()->supplier_info['supplier_id'];
                        $ok = $supplier_model->where('id', $sid)->first();
                        $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1 and complete=0")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1 and complete=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();
        }
        else
        {
            $sid = session()->supplier_info['supplier_id'];
                        $ok = $supplier_model->where('id', $sid)->first();
                        $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'   and status=1 and complete=0 and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray(); 
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'   and status=1 and complete=1 and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();

            if(session()->supplier_info['role'] == 11)
            {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();   
            }
            else
            {
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
     
        echo view('brand/view-user-assessment',$data);

    }



    public function start_assessment($a_id , $main_id){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Assessment';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $answer = new BrandQualitativeAnswerModel();
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
        // print_r($a_id);
        // die();
        $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        // $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        // $data['employee_details'] = $query->getResultArray();
        $data['start_assessment'] = $db->query("SELECT COUNT(alq.indicator_id) as total_Q, alq.* from all_assessment_question as alq where alq.status=1 and alq.all_assessment_id = $a_id GROUP BY indicator_id")->getResultArray();
          //  print_r($data['start_assessment']);
          // die();
        $data['indicator_category'] = $db->query("SELECT * from indicator_category where status = 1")->getResultArray();
        $data['indicator'] = $db->query("SELECT * from indicator where status = 1")->getResultArray();
        $data['total_Ans'] = '1';
        $assess = new Assessment();
        $data['assessment'] = $assess->where('id',$a_id)->first();

        $data['a_q'] = $db->query("SELECT alq.id,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,ind.indicator_name,
        amaa.answer as multi_answer from all_assessment_question as alq JOIN indicator as ind on ind.id= alq.indicator_id  
        JOIN all_master_assessment_answer AS amaa ON alq.answer = amaa.id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and 
        alq.all_assessment_id = $a_id ")->getResultArray();
        $data['total_Q'] =count($data['a_q']);

        if(session()->supplier_info['role'] == 0)
        {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        }
        else
        {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id',$u_id)->first();
            $o_id = $find['owner_id'];            
        } 

        $data['answer_t'] = $answer->where('owner_id',$o_id)->where('status',1)->findAll();      
        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id")->getResultArray();
        $data['total_A'] = $query_total_A[0]['total_A'];
       // print_r($a_id);
       // die();
        $data['mandatory'] = $db->query("SELECT COUNT(*) as total_m FROM `all_assessment_question` WHERE all_assessment_id =$a_id AND is_mandatory_needed = 1")->getResultArray();
        // print_r($data['mandatory']);
        // die;
        $data['mand'] = $data['mandatory'][0]['total_m'];
        $data['ans_mand'] = $db->query("SELECT COUNT(*) as total_m_a FROM `all_assessment_question` as a JOIN `brand_qualitative_answer` as b on a.id=b.question_id WHERE b.owner_id = $o_id AND a.all_assessment_id =$a_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand_ans'] = $data['ans_mand'][0]['total_m_a'];

        // print_r($data['mand_ans']);
        // print_r($data['mand']);
        // die();
        // if($data['mand_ans'] >= $data['mand'])
        // { 
        //  $data['mand_ans'];
        // }

        // die();
        // print_r($data['mand_ans']); die();
         // print_r($data['mand_ans']);
         // print_r($data['mand']);
         // die();
        $data['id'] = $main_id;
$data['answer_count'] = $db->query("SELECT COUNT(alq.indicator_id) as total_a, bqa.indicator_id from all_assessment_question as alq JOIN brand_qualitative_answer as bqa on alq.id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = $main_id and bqa.owner_id = $o_id AND alq.status=1 and alq.all_assessment_id = $a_id GROUP BY indicator_id")->getResultArray();
        // print_r($data['answer_count']);die();

 //Percentile data start   
       $total_mark=[];
     
       
$query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id= $main_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();

       // $query_total_Marks = $db->query("SELECT * FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id= $main_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();
   
    // print_r($query_total_Marks);
    // die();
        foreach($query_total_Marks as $first=>$firsts){
        $submited_answer = json_decode($firsts['submited_array']);
        $marks_array = json_decode($firsts['marks_aray']);
        $answer_array = $firsts['answer_array'];
        $choice = $firsts['choice'];

         if ($choice == 'Single')
        {
            $b = array($answer_array);
            
        }else{
            $b = json_decode($answer_array); 
        }


            // $b = array($vv); 
        
        
        if(is_array($submited_answer)==1){
                $sybmited_answer=$submited_answer;
                // print_r($sybmited_answer); // submitted answer
                    
                    foreach($b as $key => $ans_arry){
                        if(in_array($ans_arry,$sybmited_answer)){
                            $r= count($sybmited_answer);
                            $marka[]  =$marks_array[$key];
                             $sybmited_answer=[];
                            // echo  $marks_array[$key];
                            
                        }
                       
                    
        } 
        $divide=array_sum($marka)/$r;
        array_push($total_mark,$divide);
        

        }else{
                
               
                 $sybmited_answerH[]=$submited_answer;
                //  print_r($sybmited_answerH); // submitted answer

                    foreach($b as $key => $ans_arry){
                                               
                        if(in_array($ans_arry,$sybmited_answerH)){
                            $r= count($sybmited_answerH);
                           array_push($total_mark,($marks_array[$key]/$r));
                            $sybmited_answerH=[];
                          
                        }
                        
                         }
                        
        }
    
              
        }
      
       
//  $totalsubmited=count($total_mark);
 $totalsubmited=count($data['a_q']);
 
 
 
 if($totalsubmited==0){
    $totalsubmited=1;
}
 $totalmarkrecievd =array_sum($total_mark);
 $percentile=($totalmarkrecievd/$totalsubmited)*100;
       //Percentile data end  
        
      $data['percentile1']=$percentile;

        echo view('brand/start-assessmet',$data);
    }
    public function location(){
       $v = $this->request->getVar('y');
       $y = $this->request->getVar('z');
       $id = 230;

        $inser = new BrandQualitativeAnswerModel();
        $data=[
        'latitude_location' => $v,
        'longitude_location' => $y,
        ];

        $inser->update($id,$data);



    }
    public function annotation_image(){
       $annotation = $this->request->getVar('file');

// print_r($annotation);
// die();

$path = $annotation;
$type = pathinfo($path, PATHINFO_EXTENSION);
// print_r($type);
// die();
// $data = file_get_contents($path);
// print_r($data);
// die();
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($path);
        // print_r($base64);
        // die();

      

      $signatureFileName = uniqid().'.png';
     $signature = str_replace('data:image/png;base64,', '', $base64);
     // print_r($signature);
     // die();
     $signature = str_replace(' ', '+', $signature);
     $data = base64_decode($signature);
     $file = 'public/annotation/'.$signatureFileName;
     $vv = file_put_contents($file, $data);
         $id = 230;
  
        $inser = new BrandQualitativeAnswerModel();
        $data=[
        'annotation_image' => $signatureFileName,
        ];

        $inser->update($id,$data);

            return redirect()->back();

    }

    public function sign(){

     $y = $this->request->getVar('y');
     $signatureFileName = uniqid().'.png';
     $signature = str_replace('data:image/png;base64,', '', $y);
     $signature = str_replace(' ', '+', $signature);
     $data = base64_decode($signature);
     $file = 'public/sign/'.$signatureFileName;
    $vv = file_put_contents($file, $data);
      
     $id = 230;
  
    $session = session();
       
        $inser = new BrandQualitativeAnswerModel();
        $data=[

        'signature' => $signatureFileName,
        ];

      $yyyyy =  $inser->update($id,$data);
      if($yyyyy){
       $session->setFlashdata('success','signature successfully insert');
    
    
}else{ 
      $session->setFlashdata('error',' signature not Save');
}
return redirect()->back();

    }
    
    public function footprints(){

      
        $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Footprints ';
        
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

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
    
        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();
        
        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        $data['ghg_name'] = $query->getResultArray();
        
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        
     
        echo view('brand/view-user-footprints',$data);

    }

    public function start_footprint(){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
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
        // $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        // $data['employee_details'] = $query->getResultArray();
        echo view('brand/start-footprint',$data);
    }  

    public function footprint_report(){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
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
        // $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        // $data['employee_details'] = $query->getResultArray();
        echo view('brand/footprint-report',$data);
    }
    
    public function assessment_report($com ,$roit,$a_id){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $s_id = $supplier_info['supplier_id'];
        $data['s_name'] = $supplier_info['supplier_name'];
$answer = new BrandQualitativeAnswerModel();
        
        $supplier_model = new SupplierModel();
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
        // $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        // $data['employee_details'] = $query->getResultArray();
        $data['com'] = $com;

$data['a_q'] = $db->query("SELECT alq.id,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,ind.indicator_name,
        amaa.answer as multi_answer from all_assessment_question as alq JOIN indicator as ind on ind.id= alq.indicator_id  
        JOIN all_master_assessment_answer AS amaa ON alq.answer = amaa.id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and 
        alq.all_assessment_id = $a_id ")->getResultArray();
        $data['total_Q'] =count($data['a_q']);
$total_mark=[];
     
     $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id= $roit AND bqa.supplier_id = $s_id AND bqa.owner_id = $s_id ")->getResultArray();

       
        foreach($query_total_Marks as $first=>$firsts){
        $submited_answer = json_decode($firsts['submited_array']);
        $marks_array = json_decode($firsts['marks_aray']);
        $answer_array = $firsts['answer_array'];
        $choice = $firsts['choice'];

         if ($choice == 'Single')
        {
            $b = array($answer_array);
            
        }else{
            $b = json_decode($answer_array); 
        }


         if(is_array($submited_answer)==1)
         {
                $sybmited_answer=$submited_answer;
                // print_r($sybmited_answer); // submitted answer
                    
                    foreach($b as $key => $ans_arry){
                        if(in_array($ans_arry,$sybmited_answer)){
                            $r= count($sybmited_answer);
                            $marka[]  =$marks_array[$key];
                             $sybmited_answer=[];
                            // echo  $marks_array[$key];
                            
                        }
                       
                    
        } 

        $divide=array_sum($marka)/$r;
        array_push($total_mark,$divide);
        

        }else{
                
               
                 $sybmited_answerH[]=$submited_answer;
                //  print_r($sybmited_answerH); // submitted answer

                    foreach($b as $key => $ans_arry){
                                               
                        if(in_array($ans_arry,$sybmited_answerH)){
                            $r= count($sybmited_answerH);
                           array_push($total_mark,($marks_array[$key]/$r));
                            $sybmited_answerH=[];
                          
                        }
                        
                         }
                        
        }
    
              
        }
      
       
//  $totalsubmited=count($total_mark);
 $totalsubmited=count($data['a_q']);
 
 
 
 if($totalsubmited==0){
    $totalsubmited=1;
}
 $totalmarkrecievd =array_sum($total_mark);
 $percentile=($totalmarkrecievd/$totalsubmited)*100;
 // print_r($percentile);
 // die();
       //Percentile data end  
        
      $data['percentile1']=$percentile;

        print_r($data['percentile1']);
        die();
      

$data['control_assessment'] = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.id=$roit")->getResultArray();
      
  // print_r($data['control_assessment']);
  // die();
        $insert = new BrandQualitativeAnswerModel();

        $data['assessmentreport_data'] = $insert->where('control_assesment_id',$roit)->where('supplier_id',$s_id)->findAll();
        $question_total = $insert->where('control_assesment_id',$roit)->where('supplier_id',$s_id)->where('status',2)->findAll();
        $data['Total_ques']   = count($question_total);
         // print_r($roit);
        // die();
      //   foreach($dat as $d){

      // echo $d['question_id'];
$db = \Config\Database::connect();
 $data['iv'] = $insert->select('*')
         
         ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id') 
         ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('brand_qualitative_answer.supplier_id',$s_id)->where('action_center.status',!0)->findAll();
   // print_r($data['iv']);
   // die();
$data['yyyyy'] = $insert->select('action_center.title')
         
         ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id') 
         ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('brand_qualitative_answer.supplier_id',$s_id)->where('action_center.status',!0)->countAllResults();
   

$data['rohit'] = $db->query("SELECT ed.* FROM `all_assessment_question` as ed  where ed.status=1")->getResultArray();
 // print_r($query);
 // die();
$data['control_ass'] =  $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = $roit")->getResultArray();
$data['indica'] =  $db->query("SELECT ed.* FROM `indicator` as ed  where ed.status=1")->getResultArray();
 $data['action'] =  $db->query("SELECT ed.* FROM `action_center` as ed ")->getResultArray();
  // print_r($data['indica']);
  // die();
$data['lll'] =  $db->query("SELECT * FROM `all_master_assessment_answer` where status=1 AND id=56")->getResultArray();




 $data['ind'] = $db->query("SELECT * FROM  indicator where status=1")->getResultArray();


 $v = new ActionCenterModel();

   $data['actio'] = $v->where('owner_id',$s_id)->where('assign_from','Qualitative')->countAllResults();
// print_r($data['actio']);
// die();
   $assess = new Assessment();
   $data['assessment'] = $assess->findAll();
  // print_r($data['assessment']);
  //       die();   

// $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );
 $data['assessm'] = $db->query("SELECT * FROM  supplier_assessment where is_submit=1")->getResultArray();

// $data['assessm'] = $query->getResultArray();
// print_r($data['assessm']);
// die();
  $supplier = new SupplierModel();
  $data['inspected'] = $supplier->findAll();
        echo view('brand/assessment-report',$data);
    }
    
    public function cardcourses(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();

        $data['title'] = 'Module Courses Management';

        $query = $db->query("SELECT tc.courses_name,tcm.modulename,tcm.* FROM `training-courses-module` as tcm join `training-courses` as tc on tcm.course=tc.id  where tcm.status=1 ");

        $data['coursemodulelist'] = $query->getResultArray();

        $query = $db->query("SELECT tcm.* FROM `training-courses-module` as tcm  where tcm.status=1 ");

        $data['coursemodulelist'] = $query->getResultArray();
        
        echo view('admin/training-courses-card',$data);

    }
    
    public function getsubboundaryByBoundary($boundary) {

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $data='<option value="0">Select Site</option>';

           if($boundary==30) {
 
            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=12 and is_submit=1" );

            $indicator = $query->getResultArray();  
           // print_r($indicator);
           //  die();           

           if($indicator) {

                foreach($indicator as $indi) {

                    $data.='<option value="'.$indi['id'].'/30">'.$indi['cp_name'].'</option>';

                }

            }

        }

        if($boundary==31) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=11 and is_submit=1" );

            $indicator = $query->getResultArray();            
// print_r($indicator);
//             die();  
           if($indicator) {

                foreach($indicator as $indi) {

                    $data.='<option value="'.$indi['id'].'/31">'.$indi['cp_name'].'</option>';

                }

            }

        }   
        if($boundary==43) {

            $query = $db->query("select id,name from supplier_type where supplier_id='".$supplier_info['supplier_id']."' and status=1" );


            $indicator = $query->getResultArray(); 
            // print_r($indicator);
            // die();           

           if($indicator) {

                foreach($indicator as $indi) {

                    $data.='<option value="'.$indi['id'].'/43">'.$indi['name'].'</option>';

                }

            }

        }
       

        echo $data;

    }
    
    public function UpdateAction(){
        
        $db = \Config\Database::connect();
        
        $encrypter = \Config\Services::encrypter();

        $supplier = new SupplierModel();


        $session = session();

        $supplier_info = $session->get('supplier_info');
        $file = $this->request->getFile('image');
        // $assigned_to = json_encode($this->request->getVar("task-assigned"));
        $assigned_too = $this->request->getVar("task_assigned");
        $assigned_to = json_encode($assigned_too);
        $task_status = $this->request->getVar("task_change");
        $titleAdd = $this->request->getVar("TitleAdd");
        $comment = $this->request->getVar("description");
        $action_center_id = $this->request->getVar("action_center_id");
        $deadline = $this->request->getVar("deadline");
        $assigne_to = '["0000"]';


        $boundary = $this->request->getVar("boundary");
        if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        }
        elseif(session()->supplier_info['role'] == 10){
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        }
        else{
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        }

       
     if($assigned_to == 'null'){
       $add_timeline = $db->query("insert into timeline_action_center(supplier_id,TitleAdd,description,status,assigned,action_center_id,deadline,owner_id) 
         values(".$supplier_info['supplier_id'].",'".$titleAdd."','".$comment."','".$task_status."','".$assigne_to."','".$action_center_id."','".$deadline."','".$o_id."')");  
    }else{
       $add_timelin = $db->query("insert into timeline_action_center(supplier_id,TitleAdd,description,status,assigned,action_center_id,deadline,owner_id) 
         values(".$supplier_info['supplier_id'].",'".$titleAdd."','".$comment."','".$task_status."','".$assigned_to."','".$action_center_id."','".$deadline."','".$o_id."')");   
    }

if($task_status==3){
    $query = $db->query("UPDATE action_center set status = 4 where id =".$action_center_id);
}
        
    if($add_timelin){ 
        $noti = new UserNotification();
        foreach($assigned_too as $asto){
        $data = [
            'owner_id' => $o_id,
            'created_by' => $supplier_info['supplier_id'],
            'msg' => $msg,
            'link' => 'Controlwork/assessment',
            'for_y' => $asto
        ];
        $noti->insert($data);
        }
    
      $session->setFlashdata('success','TimeLinesaved  has been saved successfully');
    
    
}else{ 
      $session->setFlashdata('error',' Not Save');
}
 

  return redirect()->to('action/task');

    }
    public function control_assessment_submit(){
        
        $db = \Config\Database::connect();
        
        $encrypter = \Config\Services::encrypter();

        $supplier = new SupplierModel();


        $session = session();

        $supplier_info = $session->get('supplier_info');

        $priority = $this->request->getVar("priority");

        $due_date = $this->request->getVar("due_date");

        $comment = $this->request->getVar("comment");
        
        $frequency = $this->request->getVar("frequency");

        $assigned_to = $this->request->getVar("assigned_to");

        $indicator = $this->request->getVar("indicator");
        
        $sub_boundary = $this->request->getVar("sub_boundary");
        
        $boundary = $this->request->getVar("boundary");

        $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
// print_r($findrand);
// die();
$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);
// print_r($uniq_spl_chr);
// die();
        if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "A task assign you go and check";
            $for = $assigned_to;
        }
        elseif(session()->supplier_info['role'] == 10){
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "A task assign you go and check";
            $for = $assigned_to;
        }
        else{
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "A task assign you go and check";
            $for = $assigned_to;
        }

        
        $control_assessment = $db->query("insert into control_assessment(supplier_id,priority,due_date,comment,frequency,assigned_to,uniq_spl,indicator,sub_boundary,boundary,owner_id,start_date) 
values(".$supplier_info['supplier_id'].",'".$priority."','".$due_date."','".$comment."','".$frequency."','".$assigned_to."','".$uniq_spl_chr."','".$indicator."','".$sub_boundary."',
         '".$boundary."','".$o_id."','".date("Y-m-d")."')");

 //        print_r($control_assessment);
 // die();
    if($control_assessment){ 
        $noti = new UserNotification();
        $data = [
            'owner_id' => $o_id,
            'created_by' => $supplier_info['supplier_id'],
            'msg' => $msg,
            'link' => 'Controlwork/assessment',
            'for_y' => $for
        ];
        $noti->insert($data);
    
    
      $session->setFlashdata('success','Assessment has been saved successfully');
    
    
}else{ 
      $session->setFlashdata('error',' Not Save');
}
    
//      if(empty($ava)){


//             if($model->insert(['document_type_name'=>$name,'document_sub_type_name'=>$sub_name,'details'=>$description,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){



//               $session->setFlashdata('success','Document Sub Type has been saved successfully');



//             }else{



//                 $session->setFlashdata('error',' Not Save');



//             }          

// }
        $ava = $db->query("select * from supplier where id='".$assigned_to."' ");  

                $ava = $ava->getResultArray();
                
                
        $receiptemail=$ava[0]['email'];
        $detail = $supplier->where('id',$o_id)->first();
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

        //$message='';
        $subject ='SUB: You have a new task! '.date("Y-m-d-h-i-s");;
       
        $qualitative_message.='<html><body>';
        $qualitative_message.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><h5  style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:50px; width:50px;" src="'.base_url("/").'/public/profilimg/'.$image.'" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</h5><h5 style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Qualitative Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/Controlwork/assessment"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $qualitative_message.='</body></html>';
          //print_r($message);
        // die(); 


                    $email = \Config\Services::email();



                    $email->setFrom('info@positiivplus.io', 'Assigned Task');



                    $email->setTo($receiptemail);



                    // $email->mailType(html);   



                    $email->setSubject('Task');



                    $email->setMessage($qualitative_message);



                    $a = $email->send();
  return redirect()->to('Controlwork/assessment');

    }
    
    public function getIndicatorByboundary($boundary_id) {

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $data='<option value="0">Select Indicator</option>';
        
                // $boundary_id 30 equal to 1
                
        if($boundary_id==35450) {

            $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.is_document_needed=1 and (b.industry_id='".$supplier_info['industry_id']."' or b.industry_id=0) group by b.indicator_id order by s.id" );

            $indicator = $query->getResultArray();
            // echo $db->getLastquery($indicator);
            if($indicator) {

                foreach($indicator as $indi) {

                    $data.='<option value="'.$indi['id'].'">'.$indi['indicator_name'].'</option>';

                }

            }

        }

            $query = $db->query("SELECT  assess.* FROM `assessment` as assess  where assess.status=1 and assess.assessmemnt_access=1  and assess.boundary='".$boundary_id."' ");

            $assess = $query->getResultArray();
            // echo $db->getLastquery($indicator);
            if($assess) {

                foreach($assess as $asses) {

                    $data.='<option value="'.$asses['id'].'">'.$asses['assessment_name'].'</option>';

                }

            }

        
        
        // $boundary_id 31 equal to 2

        if($boundary_id=='2NKJINI') {

            $query = $db->query("select s.sdg_id,b.indicator_id,indi.id,indi.sdg_name,indi.image from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id join sdg_assessment_question as saq on saq.sdg_id=s.sdg_id join sdg as indi on indi.id=s.sdg_id where (s.industry_id='".$supplier_info['industry_id']."' or s.industry_id=0) and saq.is_document_needed=1 and (saq.industry_id=0 or saq.industry_id='".$supplier_info['industry_id']."') group by sdg_id");

            $indicator = $query->getResultArray();            

           if($indicator) {

                foreach($indicator as $indi) {

                    $data.='<option value="'.$indi['id'].'">'.$indi['sdg_name'].'</option>';

                }

            }

        }

       
        echo $data;

    }
    // delete assessment
    public function deleteAssessment(){
        $db = \Config\Database::connect();
        $session = session();
        $id = $this->request->getVar('del_assessment');
        $query = $db->query("UPDATE control_assessment set status = 0 where id =".$id);
        if($query){
            $session->setFlashData('success','Assessment delete successfuly');                        
        }
        else{
            $session->setFlashData('error','Assessment not delete');                        
        }
        return redirect()->back();
    }
    public function answerQuestion($a_id , $i_id , $main_id){
        $rs = check_session();
        $data['indicator_id'] =$i_id;

        if(!$rs) {

            return redirect()->to('home/user_login');

        }

        $data['pg_nm'] = 'Qualitative ';

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
    

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();
        
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
        }
        else{
            $sid = session()->supplier_info['supplier_id'];
                        $ok = $supplier_model->where('id', $sid)->first();
                        $o_id = $ok['owner_id'];
        }
        $data['supplier'] = $supplier_model->findAll();
      $data['control_assessment'] =
       $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1")->getResultArray();


        $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        $data['assessment'] = $assessment->findAll();

    $test = $db->query("SELECT * from control_assessment where owner_id='".$o_id."'and status=1")->getResultArray();
        

         $data['a_q']= $db->query("SELECT alq.id,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,amaa.marks,ind.indicator_name,
        amaa.answer as multi_answer from all_assessment_question as alq JOIN indicator as ind on ind.id= alq.indicator_id  
        JOIN all_master_assessment_answer AS amaa ON alq.answer = amaa.id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and 
        alq.all_assessment_id = $a_id   and alq.indicator_id=$i_id ")->getResultArray();
        
        $data['total_Q'] =count($data['a_q']);
        $insert = new BrandQualitativeAnswerModel();
        if(session()->supplier_info['role'] == 0)
        {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        }
        else
        {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id',$u_id)->first();
            $o_id = $find['owner_id'];            
        }
        $data['qu_an'] = $insert->where('owner_id',$o_id)->where('control_assesment_id', $main_id)->where('status',1)->findAll();
        
       //Percentile data start   
       $total_mark=[];
     
       

        // $query_total_Marks =
        //  $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();

       $query_total_Marks =
         $db->query("SELECT bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();

  // print_r($query_total_Marks);
  // die();

     foreach($query_total_Marks as $first=>$firsts){

        $answer_array = $firsts['answer_array'];
        $choice = $firsts['choice'];

        $submited_answer = json_decode($firsts['submited_array']);
        $marks_array = json_decode($firsts['marks_aray']);

        if ($choice == 'Single')
        {
            $answer_array1 = array($answer_array);
            $answer_array = json_encode($answer_array1);
        }
   
   

        if(is_array($submited_answer)==1){
                $sybmited_answer=$submited_answer;
                // print_r($sybmited_answer);
                // submitted answer
                   
                    foreach($answer_array as $key => $ans_arry){
                        if(in_array($ans_arry,$sybmited_answer)){
                            $r= count($sybmited_answer);
                            $marka[]  =$marks_array[$key];
                             $sybmited_answer=[];
                            // echo  $marks_array[$key];
                            
                        }
                       
                    
        } 
        $divide=array_sum($marka)/$r;
        array_push($total_mark,$divide);
        }

        else
        {
            $b = json_decode($answer_array);

                 // print_r($b);
               
                 $sybmited_answerH[]=$submited_answer;
                //  print_r($sybmited_answerH); // submitted answer
 // print_r($answer_array);
 // die();
                    foreach($b as $key => $ans_arry){                         
                        if(in_array($ans_arry,$sybmited_answerH)){
                            $r= count($sybmited_answerH);
                           array_push($total_mark,($marks_array[$key]/$r));
                            $sybmited_answerH=[];
                          
                        }
                        
                 }
                        
        }
    
              
        }
      
       // die();
//  $totalsubmited=count($total_mark);
 $totalsubmited=count($data['a_q']);
 
 if($totalsubmited==0){
    $totalsubmited=1;
}

  $totalmarkrecievd =array_sum($total_mark);
 $percentile=($totalmarkrecievd/$totalsubmited)*100;


  //  print_r($percentile);
  // die();
       //Percentile data end  
        
        
        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND bqa.indicator_id = $i_id  AND bqa.owner_id = $o_id")->getResultArray();

        $data['total_A'] = $query_total_A[0]['total_A'];
        $data['percentile'] = $percentile;
        // print_r($data['percentile']);
        // print_r($data['total_A']);
        // die();
        $data['mandatory'] = $db->query("SELECT COUNT(*) as total_m FROM `all_assessment_question` WHERE all_assessment_id =$a_id AND indicator_id = $i_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand'] = $data['mandatory'][0]['total_m'];
        $data['ans_mand'] = $db->query("SELECT COUNT(*) as total_m_a FROM `all_assessment_question` as a JOIN `brand_qualitative_answer` as b on a.id=b.question_id WHERE b.owner_id = $o_id AND a.all_assessment_id =$a_id AND a.indicator_id = $i_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand_ans'] = $data['ans_mand'][0]['total_m_a'];

        $data['id'] = $main_id;
        $data['a_id'] = $a_id;
$dat = $db->query("SELECT signature from brand_qualitative_answer where id=230")->getResultArray();

foreach($dat as $shhhh)
{

    $shhhh['signature'];
}


$data['signatureeeee'] = $shhhh['signature'];
$dataa = $db->query("SELECT annotation_image from brand_qualitative_answer where id=230")->getResultArray();

foreach($dataa as $bbb)
{

 $bbb['annotation_image'];

}

$data['annotation_imageeee'] = $bbb['annotation_image'];
// print_r($data['annotation_imageeee']);
// die();



           // print_r($data['signatureeeee']);
           // die();
        return view('brand/view-user-answer-question',$data);
    }
    public function addAnswerQuestion(){
        // print_r('xjkzgfbhg');
        // die();
        $insert = new BrandQualitativeAnswerModel();
        
        $db = \Config\Database::connect();
        $supplier = new SupplierModel();
         
        $session = session();
        if(session()->supplier_info['role'] == 0)
        {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        }
        else
        {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier->where('id',$u_id)->first();
            $o_id = $find['owner_id'];            
        }

        $newName = NULL;
        $answer_media = $this->request->getFile('answer_media');

        $answer = $this->request->getVar('answer');
        $indicator_id = $this->request->getVar('indicator_id');
        $i_id = $indicator_id;

       // print_r($answer);
       // die();
       
        if($answer == '' && $answer_media == ''){
            $session->setFlashdata('error','please select answer');
        return redirect()->back();
        }
      // print_r($answer);
      //  die();
        $comment = $this->request->getVar('comment');
        $q_id = $this->request->getVar('question_id');
        // print_r($q_id);
        // die();
        $answer_id = $this->request->getVar('answer_id');
        $main_id = $this->request->getVar('main_id');
        $a_id = $this->request->getVar('a_id');
  
        $file = $this->request->getFile('file');
          if($file){
            if($file->isValid()){
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if(in_array($ext,$ava_ext)){
                         $newName = $file->getRandomName();
                        //  print_r($newName); die();
                    $file->move('public/uploads/ans_question',$newName);
                    }else{
                            $session->setFlashdata('error','Please select a valid image');
                    }
                  }
          }


          if($main_id){
            $data['control_assesment_id'] = $main_id;
          }
          if($newName){
            $data['media'] = $newName;
          }
          if($comment){
            $data['comment'] = $comment;
          }
          if($indicator_id){
            $data['indicator_id'] = $indicator_id;
          }
          if($answer_id){
            $data['answer_id'] = $answer_id;
          }
          if($answer){
            $data['answer'] = json_encode($answer);
          }
          if($q_id){
            $data['question_id'] = $q_id;
          }
          if($o_id){
            $data['owner_id'] = $o_id;
          }
          if($u_id){
            $data['supplier_id'] = $u_id;
          }

          if($answer_media){
            if($answer_media->isValid()){

                $ext = $answer_media->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if(in_array($ext,$ava_ext)){
                         $ans_media = $answer_media->getRandomName();
                        //  print_r($ans_media); die();
                    $answer_media->move('public/uploads/answered_question',$ans_media);
                    $data['answer'] = json_encode($ans_media);
                    }else{
                            $session->setFlashdata('error','Please select a valid image');
                    }
                  }
          }
            $find = $insert->where('owner_id',$o_id)->where('question_id',$q_id)->where('status',1)->first();
            if($find){
                $id = $find['id'];
                // print_r($data);
                // die();
                $ins = $insert->update($id,$data);
            }
            else{
                $ins = $insert->insert($data);
            }
            
   

        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();


        $total_A = $query_total_A[0]['total_A'];
        

        $data['a_q']= $db->query("SELECT alq.id,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,amaa.marks,ind.indicator_name,
        amaa.answer as multi_answer from all_assessment_question as alq JOIN indicator as ind on ind.id= alq.indicator_id  
        JOIN all_master_assessment_answer AS amaa ON alq.answer = amaa.id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and 
        alq.all_assessment_id = $a_id   and alq.indicator_id=$i_id ")->getResultArray();
        
        $data['total_Q'] =count($data['a_q']);
        //Percentile data start   
          
          // print_r($data['total_Q']);
          // die();
        $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();
    // print_r($query_total_Marks);
      // print_r($query_total_Marks);
      // die();

        foreach($query_total_Marks as $first=>$firsts){
        $submited_answer = json_decode($firsts['submited_array']);
        $marks_array = json_decode($firsts['marks_aray']);
        $answer_array = json_decode($firsts['answer_array']);
        $choice = $firsts['choice'];
        if($choice == 'Single'){
 $answer_array1 = array($firsts['answer_array']);
 $answer_array = json_decode($answer_array);
        }
 // print_r($submited_answer);
 //               print_r($answer_array);
 //               print_r($marks_array);

             if(is_array($submited_answer)==1){
                $sybmited_answer=$submited_answer;
                // print_r($sybmited_answer); // submitted answer
                    foreach($answer_array as $key => $ans_arry){
                        if(in_array($ans_arry,$sybmited_answer)){
                            $r= count($sybmited_answer);
                            $marka[]  =$marks_array[$key];
                            $sybmited_answer=[];
                            // echo  $marks_array[$key];
                            
    }           
        } 
        $divide=array_sum($marka)/$r;
        $divided=number_format(($divide),2);
        $total_mark[]=$divided;
        }else{
                
               // print_r($submited_answer);
               // print_r($answer_array);
               // print_r($marks_array);
                 $sybmited_answerH[]=$submited_answer;
                //  print_r($sybmited_answerH); // submitted answer
                    foreach($answer_array as $key => $ans_arry){
                                               
                        if(in_array($ans_arry,$sybmited_answerH)){
                            $r = count($sybmited_answerH);
                            $total_mark[] = number_format(($marks_array[$key]/$r),2);
                            $sybmited_answerH=[]; 
                        }
                         }              
        }     
        }
        // die();
     //  $totalsubmited=count($total_mark);
     $totalsubmited=count($data['a_q']);
 
     $totalmarkrecievd =array_sum($total_mark);
 
     $percentile1=($totalmarkrecievd/$totalsubmited)*100;
     $percentile=number_format(($percentile1),2);
        
            if($ins)
            {
                // $session->setFlashdata('success','Your answer has been saved successfully');
                $response = [
                    'success' => true,
                    'data' => 'hm',
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has been saved successfully"
                ];
            }
            else
            {
                // $session->setFlashdata('error','Your answer has not save');
                $response = [
                    'success' => false,
                    'data' => 'hm',
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has not save"
                ];
            }
            // $response = [
            //     'success' => true,
            //     'data' => 'hm',
            //     'msg' => "Your answer has been saved successfully"
            // ];
        
        return $this->response->setJSON($response);
        // return redirect()->back();
        
        // print_r($okok);
    }
    public function addAction(){
        // echo 'njbjbbn';
        $supplier = new SupplierModel();
        $insert = new ActionCenterModel();
        $session = session();
        if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        }
        else{
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier->where('id',$u_id)->first();
            $o_id = $find['owner_id'];            
        }
        
        $tag = json_encode($this->request->getVar('task-tag'));
        $assignee = json_encode($this->request->getVar('task-assigned'));
        $data = [
            'owner_id'    => $o_id,
            'supplier_id' => $u_id,
            'description' => $this->request->getVar('description'), 
            'assignee'    => $assignee,
            'priority'    => $this->request->getVar('priority'),
            'tag'         => $tag,
            'due_date'    => $this->request->getVar('task-due-date'),
            'title'       => $this->request->getVar('todoTitleAdd'),
            'audit'       => $this->request->getVar('inlineRadioOptions'),
            'question_id' => $this->request->getVar('q_id'),
            'indicator_id' => $this->request->getVar('i_id'),
            'assessment_id' => $this->request->getVar('a_id'),
            'assign_from' => 'Qualitative'
        ];
        $ins = $insert->insert($data);
        if($ins){
            $session->setFlashdata('success','Your action has been saved successfully');
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            }
            elseif(session()->supplier_info['role'] == 10){
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            }
            $noti = new UserNotification();
        print_r($for);
        foreach($for as $rof){
        $data = [
                'owner_id' => $o_id,
                'created_by' => $u_id,
                'msg' => $msg,
                'link' => 'Controlwork/assessment',
                'for_y' => $rof
            ];
            $noti->insert($data);
            
        }
           
            
            // $response = [
            //     'success' => true,
            //     'data' => 'hm',
            //     'msg' => "Your answer has been saved successfully"
            // ];
        }else{
            $session->setFlashdata('error','Your action has not save');
            // $response = [
            //     'success' => false,
            //     'data' => 'hm',
            //     'msg' => "Your answer has not save"
            // ];
        }
        // $response = [
        //     'success' => true,
        //     'data' => 'hm',
        //     'msg' => "Your answer has been saved successfully"
        // ];
    
    // return $this->response->setJSON($response);
    return redirect()->back();

    }
    public function completeAssessment($id,$total_per){
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        $timeline = new QualitativeTimelineAnswerModel();
        $answer = new BrandQualitativeAnswerModel();
        $find = $db->query("SELECT * from control_assessment where status = 1 and id = $id")->getResultArray();

         // print_r($find);
         // // die();
         // print_r($find[0]['assigned_to']);
         // print_r(session()->supplier_info['supplier_id']);
         // die();

        if($find[0]['assigned_to'] != session()->supplier_info['supplier_id']){
            $session->setFlashdata('error','This task is not assign you');
            return redirect()->back();
        }

        $com = $find[0]['complete'];
        $complete = $com+1;
        $query = $db->query("UPDATE control_assessment set complete = $complete where status=1 and id = $id");

        if($query){
        $find_new = $db->query("SELECT * from control_assessment where status = 1 and id = $id")->getResultArray();
        $complete_status =  number_format($find_new[0]['complete']/2);
            $ans = $answer->where('control_assesment_id', $id)->findAll();
            $ans_id = [];
            foreach($ans as $row){
                array_push($ans_id,$row['id']);
                $data['status'] = 2;
                $data['duration'] = $find['0']['start_date'].'-'.$find[0]['due_date'];
                $answer->update($row['id'], $data);
            }
            $a_data = [
                'answer_id' => json_encode($ans_id),
                'control_assessment_id' => $id,
                'assigned_to' => $find[0]['assigned_to'],
                'due_date' => $find[0]['due_date'],
                'start_date' => $find[0]['start_date'],
                'complete_status' => $complete_status,
                'percentile' => $total_per
            ];
            // print_r($a_data);die();
            $timeline->insert($a_data);
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            }
            elseif(session()->supplier_info['role'] == 10){
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            }
            $noti = new UserNotification();
            $data = [
                'owner_id' => $o_id,
                'created_by' => $u_id,
                'msg' => $msg,
                'link' => 'Controlwork/assessment',
                'for_y' => $for
            ];
            $noti->insert($data);
            // $ok = $timeline->where('')
            $session->setFlashdata('success','Your assessment has been saved successfully');
            // $response = [
            //     'success' => true,
            //     'data' => 'hm',
            //     'msg' => "Your answer has been saved successfully"
            // ];
        }else{
            $session->setFlashdata('error','Your assessment has not save');
            // $response = [
        }
    return redirect()->to('Controlwork/assessment');


    }
    public function control_assessment_update(){
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $priority = $this->request->getVar("priority");
        $due_date = $this->request->getVar("due_date");
        $comment = $this->request->getVar("comment");
        $id = $this->request->getVar("id");
        $assigned_to = $this->request->getVar("assigned_to");
         $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();

$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);

        if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        }
        elseif(session()->supplier_info['role'] == 10){
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        }
        else{
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        }
        $control_assessment = $db->query("UPDATE control_assessment set supplier_id = ".$supplier_info['supplier_id'].", priority = '".$priority."', due_date = '".$due_date."', comment = '".$comment."', assigned_to = '".$assigned_to."',uniq_spl = '".$uniq_spl_chr."',
        owner_id = '".$o_id."' WHERE id = $id ");    
    if($control_assessment){ 
        $noti = new UserNotification();
        $data = [
            'owner_id' => $o_id,
            'created_by' => $supplier_info['supplier_id'],
            'msg' => $msg,
            'link' => 'Controlwork/assessment',
            'for_y' => $for
        ];
        $noti->insert($data);
      $session->setFlashdata('success','Assessment has been update successfully');   
}else{ 
      $session->setFlashdata('error',' Not update');
}
//      if(empty($ava)){
//             if($model->insert(['document_type_name'=>$name,'document_sub_type_name'=>$sub_name,'details'=>$description,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){
//               $session->setFlashdata('success','Document Sub Type has been saved successfully');
//             }else{
//                 $session->setFlashdata('error',' Not Save');
//             }          
// }
$ava = $db->query("select * from supplier where id='".$assigned_to."' ");  
        $ava = $ava->getResultArray();
$receiptemail=$ava[0]['email'];

                
                
        $receiptemail=$ava[0]['email'];
        $detail = $supplier->where('id',$o_id)->first();
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

        //$message='';
        $subject ='SUB: You have a new task! '.date("Y-m-d-h-i-s");;
       
        $qualitative_message.='<html><body>';
        $qualitative_message.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><h5  style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:50px; width:50px;" src="'.base_url("/").'/public/profilimg/'.$image.'" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</h5><h5 style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Qualitative Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/Controlwork/assessment"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $qualitative_message.='</body></html>';
        

                    $email = \Config\Services::email();
                    $email->setFrom('info@positiivplus.io', 'Assigned Task');
                    $email->setTo($receiptemail);
                    // $email->mailType(html);   
                    $email->setSubject('Task');
                    $email->setMessage($qualitative_message);
                    $a = $email->send();
  return redirect()->to('Controlwork/assessment');
    }
    public function findDetails($boundary, $sub_boundary, $indicator){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT item_name FROM `supplier_module_item` WHERE id = $boundary")->getResultArray();
        $data['boundary'] = $query[0]['item_name'];
        $query = $db->query("SELECT cp_name FROM `supplier_assessment` WHERE id = $sub_boundary")->getResultArray();
        $data['sub_boundary'] = $query[0]['cp_name'];
        $query = $db->query("SELECT assessment_name FROM `assessment` WHERE id = $indicator")->getResultArray();
        $data['indicator'] = $query[0]['assessment_name'];
        return $this->response->setJSON($data);
        

    }
}

