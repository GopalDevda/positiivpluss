<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\LeadModel;
use App\Models\FinanceModel;
use App\Models\ImpactModel;
use App\Models\UserNotification;
use App\Models\RawMaterialProcessDetailModel;
use App\Models\RawmaterialDetailModel;
use App\Models\Finance_Sub_Category_Model;
use App\Models\IndustryModel;
use App\Models\IndicatorCategoryModel;
use App\Models\TrainingCourse;
use App\Models\IndicatorModel;
use App\Models\IndustryCategoryModel;
use App\Models\AssessmentModel;
use App\Models\AssessmentAnswerModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\DegreeModel;
use App\Models\Assessment;
use App\Models\ModuleModel;
use App\Models\SupplierModel;
use App\Models\GhgCategoryModel;
use App\Models\GhgModel;
use App\Models\BrandModel;
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
use App\Models\ActionCenterModel;
use App\Models\SubUnitModel;
use App\Models\StakeholderModel;
use App\Models\InitiativeModel;
use App\Models\FootprintTypeModel;
use App\Models\BadgeModel;
use App\Models\TransportationDetailModel;
use App\Models\HotelStayModel;
use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\ModelIssues;
use App\Models\SupplierModuleItemRelationModel;
class Action extends BaseController
{
private $helperData=array();
public function __construct()
{
helper(['form', 'url','html','menu']);
$session = \Config\Services::session();
$this->helperData=commonData();
}
public function task(){
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}
$data['pg_nm'] = 'Tasks';
$db = \Config\Database::connect();
$session = session();
$action = new ActionCenterModel();
$supplier_info = $session->get('supplier_info');
$supplier_model = new SupplierModel();
$supplier_module_model = new SupplierModuleModel();
$supplier_module_item_model = new SupplierModuleItemModel();
$rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
$supplier_plan_id = $rs['supplier_plan_id'];
$supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
$sup_mod_item_relation = 
$supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
$supplier_mod = [];
$supplier_mod_item = [];
if($sup_mod_item_relation) {
foreach($sup_mod_item_relation as $smir) {
$supplier_mod[] = $smir["supplier_module_id"];
$supplier_mod_item[] = $smir["supplier_module_item_id"];
}
}
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
}
$data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();
$data['action'] = $action->where('owner_id',$o_id)->where('status',1)->orWhere('status',4)->findAll();
$data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
$brand = new BrandModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = session()->supplier_info['role'];
}
$data['pg_nm'] = 'Action Center';
$data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
echo view('brand/task',$data);
}
public function addAction(){
// echo 'njbjbbn';
$supplier = new SupplierModel();
$insert = new ActionCenterModel();
$session = session();

$findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();

$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);

// print_r($uniq_spl_chr);
// die();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$find = $supplier->where('id',$u_id)->first();
$o_id = $find['owner_id'];

}


// $tag = json_encode($this->request->getVar('task-tag'));
$tag = 'Others';

$assignee = json_encode($this->request->getVar('task-assigned'));
//print_r($assignee );die();
$data = [
'owner_id'    => $o_id,
'supplier_id' => $u_id,
'uniq_spl' => $uniq_spl_chr,
'description' => $this->request->getVar('description'),
'assignee'    => $assignee,
'priority'    => $this->request->getVar('priority'),
'tag'         => $tag,
'due_date'    => $this->request->getVar('task-due-date'),
'title'       => $this->request->getVar('todoTitleAdd'),
'audit'       => $this->request->getVar('inlineRadioOptions'),
'assign_from' => 'Other'
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
foreach($this->request->getVar('task-assigned') as $row){
$data = [
'owner_id' => $o_id,
'created_by' => $u_id,
'msg' => $msg,
'link' => 'action/task',
'for_y' => $row
];
// print_r($data);die();
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

//email for action task starts


    $assignee_to = json_decode($assignee);
    foreach($assignee_to as $id){

    $detail = $supplier->where('id',$id)->first();

    }

      $receiptemail=$detail['email'];
  

      $s_name = $detail['supplier_name'];  
      
      $s_detail = $supplier->where('id',$detail['owner_id'])->first();

      $supplier_name =  $s_detail['supplier_name'];
      $image = $s_detail['image'];
      $role = $s_detail['role'];
      $department = $s_detail['department'];
         if ($role == '10' || $role == '0') {
             $role_name = 'Admin';
         }
         if ($role == '11') {
             $role_name = 'Manager';
         }
      //$msg= "";
      $action_msg.='<html><body>';
      $action_msg.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><h5 style="margin-top:0px;margin-bottom:13px;>A new data request has been assign from</h5><img style="height:50px; width:50px;" src="'.base_url("/").'/public/profilimg/'.$image.'" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</h5><h5>'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Action Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/action/task"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $action_msg.='</body></html>';
        //print_r($msg);
        //die(); 
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.io', 'PositiivPlus:Assigned Task');
                        $email->setTo($receiptemail);  
                        $email->setSubject('You have a new task!');
                        $email->setMessage($action_msg);
                        $a = $email->send();
//email for action task ends

return redirect()->back();
// print_r($data);
}
public function actionType($actiontype){
$db = \Config\Database::connect();
$supplier_model = new SupplierModel();
$session = session();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
}
$action = new ActionCenterModel();
$brand = new BrandModel();
$supplier_model = new SupplierModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = session()->supplier_info['role'];
}
$data['pg_nm'] = 'Action Center';
$roleAllow = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
if($actiontype == "All"){
$actions = $action->where('owner_id',$o_id)->where('status',1)->orWhere('status',4)->findAll();
}
elseif($actiontype == "Pending"){
$actions = $action->where('owner_id',$o_id)->where('status',1)->findAll();
}
elseif($actiontype == "Completed"){
$actions = $action->where('owner_id',$o_id)->where('status',4)->findAll();
}
elseif($actiontype == "Archive"){
$actions = $action->where('owner_id',$o_id)->where('status',0)->findAll();
}
else{
$actions = $action->where('owner_id',$o_id)->where('assign_from',$actiontype)->where('status',1)->orWhere('status',4)->where('assign_from',$actiontype)->orWhere('status',4)->where('priority',$actiontype)->orWhere('status',1)->where('priority',$actiontype)->findAll();
}
$rsp='';
if(!empty($actions)){
$rsp.='<ul class="todo-task-list media-list" id="todo-task-list">';
    foreach($actions as $key => $row){
    $rsp.='<li class="todo-item"> <div class="todo-title-wrapper"> <div class="todo-title-area">
        <div class="title-wrapper"> <div class="form-check">'.++$key;
            
            $rsp.='<span class="badge rounded-pill badge-light-primary">'.$row['uniq_spl'];
            $rsp.='</span> <label class="form-check-label" for="customCheck1"></label></div>';
            $rsp.='<span class="todo-title" onclick="getTimelineAjax('.$row['id'].')">'.$row['title'].'</span> </div> </div> <div class="todo-item-action">
            <div class="badge-wrapper me-1">';
                $rsp.='<span class="badge rounded-pill badge-light-info">'.$row['assign_from'].'</span>';
                
                if($row['priority'] == 'High'){
                $rsp.='<span class="badge rounded-pill badge-light-danger">High</span>';
                } elseif($row['priority'] == 'Low'){
                $rsp.='<span class="badge rounded-pill badge-light-success">Low</span>';
                }else{
                $rsp.='<span class="badge rounded-pill badge-light-warning">Medium</span>';
                }
            $rsp.='</div>
            <small class="text-nowrap text-muted me-1">';
            $date=date_create($row['due_date']);
            $finaldate=date_format($date,"F j");
            $rsp.=''.$finaldate.'</small> <div class="avatar"><img src="'.base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg').'" alt="user-avatar" height="32" width="32" />
            </div>';
            if($roleAllow){
            if($roleAllow['delete'] == 1 && $row['status'] != 0){
            $rsp.='<a href='. base_url().'"/Action/actionDelete/"'. $row["id"].' class="btn customCheckok" data-id='. $row['id'].' onclick="return confirm("you want to delete this")" ><i class="fa fa-trash"></i></a>';
            }}
        $rsp.='</div>
    </div>
</li>';
}
}else{
$rsp.='</ul><div class="no-results"> <h5>No Items Found</h5></div>';
}
echo $rsp;
}
public function actionDelete($id){
$db = \Config\Database::connect();
$session = session();
$action = new ActionCenterModel();
$data = [
'status' => 0
];
$ok = $action->update($id,$data);
if($ok){
$session->setFlashdata('success','Action deleted successfully');
}else{
$session->setFlashdata('error',' Not delete');
}
return redirect()->back();
// $find = $action->where('id',$id)->first();
}
}