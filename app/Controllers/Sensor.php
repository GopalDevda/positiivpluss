<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SupplierModel;
use App\Models\TimelineActionCenterModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\StepModel;
use App\Models\Toolissue;
use App\Models\Victim;
use App\Models\ActionCenterModel;
use App\Models\GhgModel;
use App\Models\BrandModel;
use App\Models\GhgFactorModel;
use App\Models\SensorModel;
use App\Models\StandardModel;
use App\Models\ElectricityModel;
use App\Models\Weather_alert_model;
use App\Models\Weather;
use App\Models\CountryModel;
use App\Models\StateModel;
use DateTime;
class Sensor extends BaseController
{
private $helperData=array();

public function __construct()
{
helper(['form', 'url','html','menu']);

$session = \Config\Services::session();

$this->helperData=commonData();
}

public function index()
{
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}
$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
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
$data['supplier_mod'] = new SupplierModel();


$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();
$supplier_id= $supplier_info['supplier_id'];
$ghg = new GhgModel();

$rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

$supplier_plan_id = $rs['supplier_plan_id'];
// print_r($supplier_id);
// die();



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

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
elseif(session()->supplier_info['role'] == 10){
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
else{
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
if(session()->supplier_info['role'] == 11){
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}
else{
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}


}
$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
$data['boundary_item'] = $query->getResultArray();

$query = $db->query("select id,cp_name from supplier_assessment where is_submit=1 ");
$data['sub_boundary_item'] = $query->getResultArray();

$data['ghg'] = $ghg->findAll();
$data['supplier'] = $supplier_model->where('owner_id',$o_id)->orwhere('id',$o_id)->findAll();
// if(session()->supplier_info['role'] == 0){
//     $o_id = session()->supplier_info['supplier_id'];
//     $u_id = session()->supplier_info['supplier_id'];
// }
// else{
//     $u_id = session()->supplier_info['supplier_id'];
//     $find = $supplier_model->where('id',$u_id)->first();
//     $o_id = $find['owner_id'];
// }
$brand = new BrandModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = session()->supplier_info['role'];
}
$data['pg_nm'] = 'sensor';
$data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
// print_r($data['control_footprints']);
// print_r($data['ghg']); die();
$find = $db->query("SELECT * from control_footprints where status = 1 and owner_id = $o_id")->getResultArray();
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
}
//    print_r("ok");die();
}
}
}
$ghg_factor = $db->query("SELECT * FROM `ghg_factor` where status=1")->getResultArray();
$g_name = $db->query("SELECT * FROM `group_name` WHERE status = 1")->getResultArray();
$ghg_factor_count = $db->query("SELECT count(*) FROM `ghg_factor` where status=1")->getResultArray();
$g_name_count = $db->query("SELECT COUNT(id) FROM `group_name` WHERE status = 1")->getResultArray();
$g_name_array = [];
foreach($g_name as $value){
array_push($g_name_array,$value['group_id']);
}
$ghg_factor_model = new GhgFactorModel();
$all_ghg_factor = $ghg_factor_model->select('id')->whereIn('group_id',$g_name_array)->where('status',1)->findAll();
$g_name_implode = implode('","',$g_name_array);
// print_r($g_name_implode);die();
$query = $db->query("SELECT * FROM `control_footprints` WHERE owner_id = $o_id")->getResultArray();
$total_footprint = 0;
$total_panding = 0;
$success = 0;
foreach($query as $row){

if($row['frequency'] == 'Monthly'){
$total_footprint += 12;
}
elseif($row['frequency'] == 'Quarterly'){
$total_footprint += 4;
}
elseif($row['frequency'] == 'Half yearly'){
$total_footprint += 2;
}
elseif($row['frequency'] == 'Yearly'){
$total_footprint += 1;
}
else{
$total_footprint +=1;
}
// print_r($total_footprint);
}
$brand = new BrandModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
// print_r($ok);
// die();
$data['pg_nm'] = $ok['supplier_name'];


if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = $ok['role'];
// print_r($role);
// die();
}
if(session()->supplier_info['role'] == 10){
$role = 10;
}
$o['supplier_id'] = $ok['supplier_plan_id'];
// print_r($o['supplier_id']);
// die();
$dat = $brand->where('brand_id',58)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();
// print_r($dat);
// die();
if($dat){
$data['add'] =  $dat['add'];
$data['view'] =  $dat['view'];
$data['edit'] =  $dat['edit'];
$data['delete'] = $dat['delete'];
}else{
$data['add'] = '0';
$data['view'] =  '0';
$data['edit'] =  '0';
$data['delete'] = '0';
}

$data['total_footprint'] = $total_footprint;
$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
$data['boundary_item'] = $query->getResultArray();
// print_r($data['boundary_item']);
// die();
$query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );
$data['sub_boundary_item'] = $query->getResultArray();
$query = $db->query("select id,boundary_id,subboundary_id,board_type,provider_type from sensors where status=1" );
$data['item'] = $query->getResultArray();

$query = $db->query("select id,name_discom,state from electricity_board" );
$data['electricity_board'] = $query->getResultArray();
$data['kk'] = '';
$data['weather_api'] = $db->query("select * from Weather" )->getResultArray();
// print_r($u_id);
// print_r($o_id);
// die();
$data['weather_ap']  = $db->query("SELECT * FROM Weather WHERE STATUS=1 And  (supplier_id = $u_id or owner_id = $o_id) GROUP by city_name ")->getResultArray();
// print_r($data['weather_ap']);
// die();

$weather_alert = new Weather_alert_model();
$data['alert_noti'] = $weather_alert->where('status',1)->where('supplier_id',$u_id)->orwhere('owner_id',$o_id)->findAll();


echo view('brand/view_sensor',$data);
}

public function indexx(){
$db = \Config\Database::connect();
$data=$this->helperData;

$standard_model = new StandardModel();
$session = session();
$user_info = $session->get('user_info');
if(!$user_info){

return redirect()->to('auth/logout');
}
$data['standard'] = $standard_model->where('status',1)->findAll();
// company_vehicle_detail
$data['list'] = $db->query("select cvd.*,v.vehicle_name,gf.name,f.factor_name from api_company_vehicle_detail as cvd left join vehicle as v on cvd.vehicle=v.id left join ghg_factor as gf on gf.id=cvd.ghg_factor_id left join factor as f on gf.name=f.id where cvd.status=1")->getResultArray();
// print_r($data['list']);
// die();
// // status removed start
// $data['vehicle'] = $db->query("select * from vehicle where status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
$data['vehicle'] = $db->query("select * from vehicle where status=0||status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
// status removed end

$data['ghg_factor'] = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on gf.name=f.id where gf.ghg_id=19")->getResultArray();
$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
$data['boundary_item'] = $query->getResultArray();
// print_r($data['boundary_item']);
// die();
$query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );
$data['sub_boundary_item'] = $query->getResultArray();
$query = $db->query("select id,boundary_id,subboundary_id,board_type,provider_type from sensors where status=1" );
$data['item'] = $query->getResultArray();
$query = $db->query("select * from electricity_board where status=1" );
$data['electricity_board'] = $query->getResultArray();
$query = $db->query("select id,name from states" );
$data['state'] = $query->getResultArray();
echo view('admin/view-sensordata',$data);
}
public function adminsensoradd(){
$rs = check_session();
// if(!$rs) {
// return redirect()->to('home/user_login');
// }

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
$supplier_info = $session->get('supplier_info');
$state = $this->request->getVar('state');
$type = $this->request->getVar('type');
$provider = $this->request->getVar('provider');
$username = $this->request->getVar('username[]');
$Abbrevation = $this->request->getVar('Abbrevation');
// print_r($username);
// die();
$a= $username;
// print_r($a);
// die();
$random_keys=array_rand($a,2);
$u = $a[$random_keys[0]];
$y =$a[$random_keys[1]];
$bbb = $u.''.$y;
$model = new ElectricityModel();
$data=[
'name_discom' => $provider,
'state' => $state,
'type' => $type,
'uniq_id' => $bbb,
'abbrevation' => $Abbrevation,
];
$insert = $model->insert($data);
if($insert){
$session->setFlashdata('success','Sensor has been saved successfully');
}else{
$session->setFlashdata('error',' Not Save');
}
return redirect()->back();
}
public function adminsensoredit(){
$rs = check_session();
// if(!$rs) {
// return redirect()->to('home/user_login');
// }

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
$supplier_info = $session->get('supplier_info');
$id = $this->request->getVar('id');
$state = $this->request->getVar('state');
$type = $this->request->getVar('type');
$provider = $this->request->getVar('provider');
$editAbbrevation = $this->request->getVar('editAbbrevation');
$username = $this->request->getVar('username[]');

// $a= json_encode($username);
 $a= $username;
// print_r($a);
// die();
$random_keys=array_rand($a,2);
$u = $a[$random_keys[0]];
$y =$a[$random_keys[1]];
$bbb = $u.''.$y;
$model = new ElectricityModel();
$data =
[
'name_discom' => $provider,
'state' => $state,
'type' => $type,
'uniq_id' => $bbb,
'abbrevation' => $editAbbrevation,
];
// print_r($data);
// die();
$insert = $model->update($id,$data);
if($insert){
$session->setFlashdata('success','Sensor has been Update successfully');
}else{
$session->setFlashdata('error',' Not Save');
}
return redirect()->back();
}
public function createSensor(){
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
$supplier_info = $session->get('supplier_info');
$sensor = new SensorModel();
$boundary = $this->request->getVar('boundary');
$sub_boundary = $this->request->getVar('sub_boundary');
$type_board = $this->request->getVar('type_board');
$provider = $this->request->getVar('name_discom');
// print_r($provider);
// die();
$username = $this->request->getVar('usernamee');
//   print_r($username);
// die();
$password = $this->request->getVar('password');
$data=[
'boundary_id'=>$boundary,
'subboundary_id'=>$sub_boundary,
'board_type'=> $type_board,
'provider_type'=> $provider,
'username'=> $username,
'password'=>$password,
'current_status'=>'1'
];
$insert = $sensor->insert($data);
if($insert){
$session->setFlashdata('success','Sensor has been saved successfully');
}else{
$session->setFlashdata('error',' Not Save');
}
return redirect()->back();
}
public function delete($id){
$rs = check_session();
// adminsensoradd

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
$supplier_info = $session->get('supplier_info');

$sensor = new ElectricityModel();

$data=[
'status' =>'0',
];
$delete = $sensor->update($id,$data);
if($delete){
$session->setFlashdata('error','Sensor delete');
}else{
$session->setFlashdata('error',' Not delete');
}
return redirect()->back();
}
public function eb_board($id,$site){

$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$supplier_model = new SupplierModel();

$session = session();

$supplier_info = $session->get('supplier_info');

$rft = session()->supplier_info['supplier_id'];


if(session()->supplier_info['role'] == 0){

$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
elseif(session()->supplier_info['role'] == 10){

$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
else{
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
if(session()->supplier_info['role'] == 11){
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}
else{
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}


}

if($site=='30'){
$co = $db->query("SELECT state_id FROM `supplier_assessment` where id =$id and supplier_id =$rft and is_submit=1")->getResultArray();
}elseif($site=='43'){
$co = $db->query("SELECT state as state_id FROM `supplier_type` where id =$id and supplier_id =$rft and status=1")->getResultArray();
}

foreach ($co as $key => $value) {

}
$vv =$value['state_id'];

$que = $db->query("SELECT id, name_discom FROM `electricity_board` where state=$vv and status=1")->getResultArray();

return $this->response->setJSON($que);
}
public function user_pass($id){
$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();
$co = $db->query("SELECT uniq_id FROM `electricity_board` where id =$id")->getResultArray();
foreach($co as $vvvv){
$vvvv['uniq_id'];
}
$fff = $vvvv['uniq_id'];
$response = [
'success' => $fff
];
return $this->response->setJSON($response);
}
public function weather(){
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
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
$data['supplier_mod'] = new SupplierModel();


$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();
$ghg = new GhgModel();

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

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
elseif(session()->supplier_info['role'] == 10){
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
else{
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
if(session()->supplier_info['role'] == 11){
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}
else{
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}


}
$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
$data['boundary_item'] = $query->getResultArray();
// print_r($u_id);
// die();
// $data['site_name'] = $db->query("select id,cp_name from supplier_assessment where is_submit=1 and supplier_id = ")->getResultArray();
$data['site_name'] = $db->query("SELECT * from supplier_assessment where (is_submit = 0 Or is_submit = 1) and (supplier_id=$u_id Or owner_id=$o_id) and assessment_id=12" )->getResultArray();
// print_r($data['site_name']);
// die();
// print_r($data['site_name']);
// die();

$data['ghg'] = $ghg->findAll();
$data['supplier'] = $supplier_model->where('owner_id',$o_id)->orwhere('id',$o_id)->findAll();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
}
$brand = new BrandModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = session()->supplier_info['role'];
}
$data['pg_nm'] = 'sensor';
$data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
// print_r($data['control_footprints']);
// print_r($data['ghg']); die();
$find = $db->query("SELECT * from control_footprints where status = 1 and owner_id = $o_id")->getResultArray();
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
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
$update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '".$new_s_date."' , due_date = '".$new_d_date."' where status = 1 and id = $f_id");
}
//    print_r("ok");die();
}
}
}
$ghg_factor = $db->query("SELECT * FROM `ghg_factor` where status=1")->getResultArray();
$g_name = $db->query("SELECT * FROM `group_name` WHERE status = 1")->getResultArray();
$ghg_factor_count = $db->query("SELECT count(*) FROM `ghg_factor` where status=1")->getResultArray();
$g_name_count = $db->query("SELECT COUNT(id) FROM `group_name` WHERE status = 1")->getResultArray();
$g_name_array = [];
foreach($g_name as $value){
array_push($g_name_array,$value['group_id']);
}
$ghg_factor_model = new GhgFactorModel();
$all_ghg_factor = $ghg_factor_model->select('id')->whereIn('group_id',$g_name_array)->where('status',1)->findAll();
$g_name_implode = implode('","',$g_name_array);
// print_r($g_name_implode);die();
$query = $db->query("SELECT * FROM `control_footprints` WHERE owner_id = $o_id")->getResultArray();
$total_footprint = 0;
$total_panding = 0;
$success = 0;
foreach($query as $row){

// $ok = $total_panding += number_format($row['complete']/2);
// if($ok){
//     $find = new QualitativeTimelineAnswerModel();
//     $need = $find->where('control_assessment_id',$row['id'])->findAll();
//     foreach($need as $nd){
//         if($nd['percentile'] >= 50){
//             $success++;
//         }
//     }
// }

if($row['frequency'] == 'Monthly'){
$total_footprint += 12;
}
elseif($row['frequency'] == 'Quarterly'){
$total_footprint += 4;
}
elseif($row['frequency'] == 'Half yearly'){
$total_footprint += 2;
}
elseif($row['frequency'] == 'Yearly'){
$total_footprint += 1;
}
else{
$total_footprint +=1;
}
// print_r($total_footprint);
}
$data['total_footprint'] = $total_footprint;
$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
$data['boundary_item'] = $query->getResultArray();
// print_r($data['boundary_item']);
// die();
$query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );
$data['sub_boundary_item'] = $query->getResultArray();
$query =
$db->query("SELECT id,boundary_id,subboundary_id,board_type,provider_type FROM sensors where owner_id = $o_id and  supplier_id=$u_id and status=1");
// $query = $db->query("select id,boundary_id,subboundary_id,board_type,provider_type from sensors where status=1 where" );
$data['item'] = $query->getResultArray();
// print_r($data['item']);
// die();
$query = $db->query("select id,name_discom,state from electricity_board" );
$data['electricity_board'] = $query->getResultArray();
$data['sensor'] = '0';
echo view('brand/weather_api',$data);
}
public function weather_api(){
$rs = check_session();
if(!$rs)
{
return redirect()->to('home/user_login');
}

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
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
$data['supplier_mod'] = new SupplierModel();
$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');
foreach($supplier_info as $supplier)
{

}

// print_r($supplier_info);
// die();

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();
$ghg = new GhgModel();

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

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");



$data['boundary_item'] = $query->getResultArray();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
elseif(session()->supplier_info['role'] == 10){
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
$data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

}
else{
$sid = session()->supplier_info['supplier_id'];
$u_id = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
$o_id = $ok['owner_id'];
$data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
if(session()->supplier_info['role'] == 11){
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}
else{
$query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
$data['employee_details'] = $query->getResultArray();
}


}

$brand = new BrandModel();
$sid = session()->supplier_info['supplier_id'];
$ok = $supplier_model->where('id', $sid)->first();
if(session()->supplier_info['role'] == 0){
$role = 10;
}
else{
$role = $ok['role'];
// print_r($role);
// die();
}
if(session()->supplier_info['role'] == 10){
$role = 10;
}
$o['supplier_id'] = $ok['supplier_plan_id'];
// print_r($o['supplier_id']);
// die();
$dat = $brand->where('brand_id',58)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();

if($dat){
$data['add'] =  $dat['add'];
$data['view'] =  $dat['view'];
$data['edit'] =  $dat['edit'];
$data['delete'] = $dat['delete'];
}else{
$data['add']    = '0';
$data['view']   = '0';
$data['edit']   = '0';
$data['delete'] = '0';
}

$v = $this->request->getVar('api');
if(empty($v)){
$city_name = $this->request->getVar('site_name');
$query = $db->query("SELECT * FROM `supplier_assessment` WHERE id=$city_name");
$city = $query->getResultArray();
foreach ($city as $key => $value) {
$value['cp_address'];
}
$v = $value['cp_address'];
$site_id = $value['id'];
echo $v;
die();
}else{
$v = $this->request->getVar('api');
$site_id = '';
}
$apiKey = "1fd8072853c5cb42d00bf4c5ff3f3639";
$cityId = "3163858";
// $googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
$googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $v . "&appid=" . $apiKey;
// print_r($googleApiUrl);
// die();
$ch = curl_init();
// print_r($ch);
// die();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
// print_r($response);
// die();
curl_close($ch);
$data['kk'] = json_decode($response);

$weather = new Weather();
$city_name =$data['kk']->name;
$description =$data['kk']->weather[0]->description;
$temp1 =$data['kk']->main->temp;
$temp_max1 =$data['kk']->main->temp_max;
$temp_min1 =$data['kk']->main->temp_min;
$humidity =$data['kk']->main->humidity;
$wind =$data['kk']->wind->speed;
if(!empty($data['kk']->wind->gust))
{
$wind_gust =  $data['kk']->wind->gust;
}else
{
$wind_gust =  '0';
}
$sunrise =$data['kk']->sys->sunrise;
$sunset =$data['kk']->sys->sunset;
// print_r($wind_gust);
// die();
$temp = $temp1-'272.15';
$temp_max = $temp_max1-'272.15';
$temp_min = $temp_min1-'272.15';
$insert =[
'supplier_id'=>$u_id,
'owner_id'=>$o_id,
'site_id' =>$site_id,
'city_name' =>$city_name,
'description' =>$description,
'temp' =>$temp,
'temp_min' =>$temp_min,
'temp_max' =>$temp_max,
'humidity' =>$humidity,
'wind' =>$wind,
'wind_gust' =>$wind_gust,
'sunrise' =>$sunrise,
'sunset' =>$sunset,
];
$insert = $weather->insert($insert);
$currentTime = time();
date_default_timezone_set("Asia/Calcutta");
$weather_alert = new Weather_alert_model();
// $data['weather_api'] = $db->query("select * from Weather" )->getResultArray();
$model = new Weather();
$data['weather_api'] = $model->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
$data['alert_noti'] = $weather_alert->where('status',1)->where('supplier_id',$u_id)->findAll();
echo view('brand/view_sensor',$data);
}
public function weather_site_name($id){
$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');
$query = $db->query("SELECT * FROM `supplier_assessment` WHERE id=$id");
$city = $query->getResultArray();
foreach ($city as $key => $value) {
$value['cp_address'];
}
$data = [
'res' =>  $value['cp_address']
];
return $this->response->setJSON($data);
}
public function api($iiiiiiiii)
{


$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = 'Dashboard';


$db = \Config\Database::connect();

$session = session();

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



$data['supplier_mod'] = new SupplierModel();


$rs = check_session();

if(!$rs)
{

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();

$ghg = new GhgModel();
$id = session()->supplier_info['supplier_id'];





$data['assign'] = $supplier_model->where('owner_id',$id)->findAll();

$rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

$supplier_plan_id = $rs['supplier_plan_id'];
$session_id = session()->supplier_info['supplier_id'];


$supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

$sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

$supplier_mod = [];

$supplier_mod_item = [];

if($sup_mod_item_relation)
{

foreach($sup_mod_item_relation as $smir)
{

$supplier_mod[] = $smir["supplier_module_id"];
$supplier_mod_item[] = $smir["supplier_module_item_id"];


}

}


$data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();

$query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

$data['employee_details'] = $query->getResultArray();

$query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();

$data['view_data'] = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();



// $view_data = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();
//  foreach ($view_data as $key => $value) {
//      // echo $value['city_name'];
//      // die();
//  }
//  $name = $value['city_name'];

$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();

foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];
$site_id = $value['id'];



$dat = $db->query("SELECT * FROM `Weather` where status=1")->getResultArray();

$data['checked_data'] = $db->query("SELECT * FROM `weather_alert_notification` where status=1 and weather_id=$iiiiiiiii")->getResultArray();
$weather_alert = new Weather_alert_model();
$data['temp'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Temperature')->findAll();
// print_r($data['temp']);
// die();
$data['wind'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind speed')->findAll();

$data['wind_gust'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind gust')->findAll();
$data['humidity'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Humidity')->findAll();



foreach($data['checked_data'] as $ched){

// echo $ched['name'];
// die();

}

// $data['alert_id'] = $ched['id'];


$view = $db->query("SELECT * FROM `Weather` where status=1 and supplier_id = $id")->getResultArray();

foreach($view as $bb){

$bb['temp'];

}


$data['graph_temp']     =$bb['temp'];
$data['graph_humidity'] =$bb['humidity'];
$data['graph_wind']     =$bb['wind'];

$method2 = strtotime('-3 hour');
$data['aa'] = date("Y-m-d h:i:s",$method2);
// print_r($data['aa']);;
// die();

$data['id'] = $iiiiiiiii;

$string = 'Manal Softech Private Limited Ujjain,II-Floor,
Tower Chowk, near Vasavda Petrol Pump, Madhav Nagar, Ujjain, Madhya Pradesh, India';
$pieces = explode(',' , $string);
// $last_word = array_pop($pieces);
// echo $last_word;
// die();



$apiKey = "1fd8072853c5cb42d00bf4c5ff3f3639";
$googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $v . "&appid=" . $apiKey;
$ch = curl_init();
// print_r($ch);
// die();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data['kk'] = json_decode($response);
// print_r($data['kk']);
// die();

$weather = new Weather();
$city_name =$data['kk']->name;
$description =$data['kk']->weather[0]->description;
$temp1 =$data['kk']->main->temp;
$temp_max1 =$data['kk']->main->temp_max;
$temp_min1 =$data['kk']->main->temp_min;
$humidity =$data['kk']->main->humidity;
$wind =$data['kk']->wind->speed;
// $wind_gust =$data['kk']->wind->gust;
$sunrise =$data['kk']->sys->sunrise;
$sunset =$data['kk']->sys->sunset;
// print_r($wind_gust);
// die();
$temp = $temp1-'273.15';
$temp_max = $temp_max1-'273.15';
$temp_min = $temp_min1-'273.15';

$insert =[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'site_id' =>$site_id,
'city_name' =>$city_name,
'description' =>$description,
'temp' =>$temp,
'temp_min' =>$temp_min,
'temp_max' =>$temp_max,
'humidity' =>$humidity,
'wind' =>$wind,
'wind_gust' =>'0',
'sunrise' =>$sunrise,
'sunset' =>$sunset,
];

// $insert = $weather->insert($insert);

$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();

foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];
$wea = new Weather();
$weathe = $wea->where('city_name',$v)->findAll();

foreach($weathe as $gg){

}
$last_id = $gg['id'];


$currentTime11 = strtotime('now');
$currentTime111 = date('m/d/Y H',$currentTime11);
if($currentTime111){
$currentTime2 = $currentTime111.':30';
}
// print_r($currentTime2);
// die();
$currentTime = strtotime('now');

$da =  $weather->where('status',1)->where('id',$last_id)->first();
$city = $da['city_name'];
$boundary = $da['boundary_id'];
$site_id = $da['site_id'];
$currentTime1 = date('m/d/Y',$currentTime);
$data['last_id_data'] =$weather->where('supplier_id',$session_id)->where('city_name',$city)->where('timestampRoh >=', $currentTime2)->first();


// $data['last_id_data'] = $db->query("SELECT * FROM `Weather` where status=1 and id=$last_id")->getResultArray();

$time = time();

$meth = strtotime('now');
$dat = date('m/d/Y',$meth);
// print_r($dat);
// die();
$date = $weather->where('status',1)->where('city_name',$city)->where('timestamp_date',$dat)->first();
$data['iiii'] = $weather->where('supplier_id',$session_id)->where('city_name',$city)->where('timestampRoh >=', $currentTime2)->findAll();

$iiii = count($data['iiii']);


if(11 > $iiii)
{
// echo 'rohit';
// die();
$county_model = new CountryModel();
$v = $da['city_name'];
// print_r($v);
// die();
$state_model = new StateModel();
// Google API key

$apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

// Change address format

$formattedAddrFrom    = str_replace(' ', '+', $v);

// Geocoding API request with start address

$geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);

$outputFrom = json_decode($geocodeFrom);

// print_r($outputFrom);

if(!empty($outputFrom->error_message)){

return $outputFrom->error_message;

}

$addresscomponent    = $outputFrom->results[0]->address_components;

foreach($addresscomponent as $key=>$addCompVal){

if($addCompVal->types[0]=='postal_code'){

$pincode=$addCompVal->long_name;
}
if($addCompVal->types[0]=='country'){

$country=$addCompVal->long_name;

$query = $county_model->where('name',$country)->where('status',1)->first();

$country_id = $query['id'];

}
if($addCompVal->types[0]=='administrative_area_level_1'){

$state=$addCompVal->long_name;

$query = $state_model->where('name',$state)->where('status',0)->first();

$state_id = $query['id'];

}
if($addCompVal->types[0]=='locality'){

$city=$addCompVal->long_name;
}

}
$from = $city.','.$state.','.$country;

$weatherData = [];
$curl = curl_init();
curl_setopt_array($curl, [
CURLOPT_URL => "https://aerisweather1.p.rapidapi.com/forecasts/".$from."?plimit=24&filter=1hr",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => [
"X-RapidAPI-Host: aerisweather1.p.rapidapi.com",
"X-RapidAPI-Key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"
],
]);
$responsese = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err)
{
echo "cURL Error #:" . $err;
} else
{
// echo $responsese;
$rs = json_decode($responsese);
$temp_arr = [];

$rs1=$rs->response[0];
$long =$rs1->loc->long;
$lat =$rs1->loc->lat;

if($rs1){
foreach($rs1->periods as $itm) {

$arr = [];

$arr['maxTempC'] = $itm->maxTempC;
$arr['minTempC'] = $itm->minTempC;

$arr['tempC'] = $itm->tempC;

$arr['humidity'] = $itm->humidity;

$arr['windDir'] = $itm->windDir;

$arr['windSpeedKPH'] = $itm->windSpeedKPH;

$arr['weather'] = $itm->weather;

$arr['windGust80mKPH'] = $itm->windGust80mKPH;

$arr['windDir80m'] = $itm->windDir80m;

$arr['timestampRoh'] = $itm->timestamp;

$temp_arr[] = $arr;

}
// echo json_encode($weatherData);


$weather = new Weather();
// print_r($temp_arr);
// die();
foreach($temp_arr as $tarunrohit)
{

$timestampRoh =  date('m/d/Y H:i:s', $tarunrohit['timestampRoh']);
$timestamp_date =  date('m/d/Y', $tarunrohit['timestampRoh']);
$insert1 =[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'site_id' =>$site_id,
'city_name' =>$from,
'description' =>$tarunrohit['weather'],
'temp' =>$tarunrohit['tempC'],
'temp_min' =>$tarunrohit['minTempC'],
'temp_max' =>$tarunrohit['maxTempC'],
'humidity' =>$tarunrohit['humidity'],
'wind' =>$tarunrohit['windSpeedKPH'],
'windDir' =>$tarunrohit['windDir'],
'timestampRoh' =>$timestampRoh,
'windDir80m' =>$tarunrohit['windDir80m'],
'wind_gust' =>$tarunrohit['windGust80mKPH'],
'sunrise' =>"rise",
'sunset' =>'nset',
'boundary_id'=>$boundary,
'long'=>$long,
'lat'=>$lat,
'timestamp_date'=>$timestamp_date,

];
$insertt = $weather->insert($insert1);
// print_r($insertt);
// die();
}

}
else{
$session->setFlashdata('error','The requested location was not found.');
}
}
}
else
{

}


$time = time();

$meth = strtotime('now');
$dat = date('H:i A',$meth);

$method1 = strtotime('now');
$method2 = strtotime('-2 hour');
$method3 = strtotime('-4 hour');
$method4 = strtotime('-6 hour');
$method5 = strtotime('-8 hour');
$method6 = strtotime('-10 hour');
$method7 = strtotime('-12 hour');
$method8 = strtotime('-14 hour');
$method9 = strtotime('-16 hour');
$method10 = strtotime('-18 hour');
$method11 = strtotime('-20 hour');
$method12 = strtotime('-22 hour');
$method13 = strtotime('-24 hour');

$data['a'] = date('H:00',$method1);
$data['aaa'] = date('H:00',$method11);
$data['aaaa'] = date('H:00',$method12);
$data['aa'] = date('H:00',$method10);
$data['b'] = date('H:00',$method2);
$data['c'] = date('H:00',$method3);
$data['d'] =  date('H:00', $method4);
$data['e'] =  date('H:00', $method5);
$data['f'] =  date('H:00', $method6);
$data['g'] =  date('H:00', $method7);
$data['h'] =  date('H:00', $method8);
$data['i'] = date('H:00', $method9);

$data['month_names'] = array("January","February","March","April","May","June","July","August","September","October","November","December");
$data['id'] = $iiiiiiiii;


$weather = new Weather();
$name = $weather->where('id',$iiiiiiiii)->first();


$city_name = $name['city_name'];
$weather1 = $weather->where('status',1)->findAll();
$weather33 = $weather->where('status',1)->where('id',$iiiiiiiii)->findAll();

// $data['month'] = $weather->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('Hour(updated_at)',date('h'))->findAll();

$currentTime11 = strtotime('now');
$currentTime111 = date('m/d/Y H',$currentTime11);
if($currentTime111){
$currentTime2 = $currentTime111.':30';
}
// $gg = $weather->where('timestampRoh <=','01/03/2023'.$currentTime2)->findAll();

// print_r($gg);
// die();

$currentTime = strtotime('now');

$currentTime1 = date('m/d/Y',$currentTime);
$data['month'] =
$weather->where('Month(updated_at)', date('m'))->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('timestampRoh',date('H:i'))
->where('timestamp_date >=',$currentTime1)->where('timestampRoh >=',$currentTime2)->findAll(12);
// echo "<pre>";
// print_r($data['month']);
// die();
$humiditydata=array();
$monthavai=array();
$Atime=array();
$monthareal=array();

$temphumiditydata=array();
$tempmonthavai=array();
$tempmonthareal=array();
$timereal=array();

$windhumiditydata=array();
$windtempmonthavai=array();
$windtempmonthareal=array();

foreach ($data['month'] as $key => $value)
{
$date=date_create($value['updated_at']);
array_push($windhumiditydata,$value['wind']);
array_push($temphumiditydata,$value['temp']);
array_push($humiditydata,$value['humidity']);
array_push($monthavai,date_format($date,"M"));
$date1=date_create($value['timestampRoh']);
array_push($Atime,date_format($date1,"H:i"));
}
// print_r($Atime);
// die();

$monthsall = array('January','February','March','April','May','June','July','August','September','October','November','December');
foreach ($monthsall as $key => $valmbnt)
{

if (in_array(substr($valmbnt,0,3),$monthavai))
{
foreach ($humiditydata as $key => $vadatbnt)
{
array_push($monthareal,$vadatbnt);

}
foreach ($Atime as $key => $vadatbnt1)
{
array_push($timereal,$vadatbnt1);
// print_r($timereal);

}
foreach ($temphumiditydata as $key => $vadatbntmp)
{
array_push($tempmonthareal,$vadatbntmp);

}
foreach ($windhumiditydata as $key => $vadatbntmp)
{
array_push($windtempmonthareal,$vadatbntmp);

}
}else
{
array_push($windtempmonthareal,'0');
array_push($tempmonthareal,'0');
array_push($monthareal,'0');
array_push($timereal,'0');
}

}

foreach($tempmonthareal as $key => $l)
{
if($key>11)
{
if(count($tempmonthareal)!=12)
{
$tempmonthareal=array_reverse($tempmonthareal);
array_pop($tempmonthareal);

}
if(count($windtempmonthareal)!=12)
{
$windtempmonthareal=array_reverse($windtempmonthareal);
array_pop($windtempmonthareal);
}
if(count($monthareal)!=12)
{
$monthareal=array_reverse($monthareal);
array_pop($monthareal);
}
if(count($timereal)!=12)
{
// $timereal=array_reverse($timereal);
array_pop($timereal);
}
}
}
$data['montharealtmp']=$tempmonthareal;
$data['windtempmonthareal']=$windtempmonthareal;
$data['monthareal']=$monthareal;
$data['timereal']=$timereal;

$data['check']='2';
// $data['month']=array();
    // print_r($data['montharealtmp']);
//     print_r($data['windtempmonthareal']);
//     print_r($data['monthareal']);
// print_r($timereal);
// die();


// //   print_r($data['month']);


echo view('brand/view_weather_data',$data);


}
public function api_auto()
{
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}

$data['pg_nm'] = 'Dashboard';

$db = \Config\Database::connect();
$session = session();
$weather = new Weather();
$weather1960 = $weather->where('status',1)->groupBy('supplier_id')->findAll();
foreach($weather1960 as $lpp) {
$iiiiiiiii=$lpp['id'];
$supplier_info = $lpp;

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



$data['supplier_mod'] = new SupplierModel();


$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $lpp;

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();

$ghg = new GhgModel();
$id =   $supplier_info['supplier_id'];    ;





$data['assign'] = $supplier_model->where('owner_id',$id)->findAll();

$rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

$supplier_plan_id = $rs['supplier_plan_id'];
$session_id = session()->supplier_info['supplier_id'];


$supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

$sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

$supplier_mod = [];

$supplier_mod_item = [];

if($sup_mod_item_relation)
{

foreach($sup_mod_item_relation as $smir)
{

$supplier_mod[] = $smir["supplier_module_id"];
$supplier_mod_item[] = $smir["supplier_module_item_id"];


}

}


$data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();

$query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

$data['employee_details'] = $query->getResultArray();

$query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();

$data['view_data'] = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();



// $view_data = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();
//  foreach ($view_data as $key => $value) {
//      // echo $value['city_name'];
//      // die();
//  }
//  $name = $value['city_name'];

$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();

foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];



$dat = $db->query("SELECT * FROM `Weather` where status=1")->getResultArray();

$data['checked_data'] = $db->query("SELECT * FROM `weather_alert_notification` where status=1 and weather_id=$iiiiiiiii")->getResultArray();
$weather_alert = new Weather_alert_model();
$data['temp'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Temperature')->findAll();
// print_r($data['temp']);
// die();
$data['wind'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind speed')->findAll();

$data['wind_gust'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind gust')->findAll();
$data['humidity'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Humidity')->findAll();



foreach($data['checked_data'] as $ched){

// echo $ched['name'];
// die();

}

// $data['alert_id'] = $ched['id'];


$view = $db->query("SELECT * FROM `Weather` where status=1 and supplier_id = $id")->getResultArray();

foreach($view as $bb){

$bb['temp'];

}


$data['graph_temp']     =$bb['temp'];
$data['graph_humidity'] =$bb['humidity'];
$data['graph_wind']     =$bb['wind'];

$method2 = strtotime('-3 hour');
$data['aa'] = date("Y-m-d h:i:s",$method2);
// print_r($data['aa']);;
// die();

$data['id'] = $iiiiiiiii;

//   $weekday = array("12pm","3pm","6pm","9pm","12am","3am", "6am","9am");
//   $start = new DateTime("2017-03-09 09:06:00");
//   $end = new DateTime("2017-03-11 09:25:00");
//   $interval = $start->diff($end);
//   $hrs = $interval->d * 24 + $interval->h;
//   echo $hrs." hours ".$interval->format('%i')." minutes";
//   die();

// for($i = 7; $i >= 0; $i = $i -1){
//     print("$weekday[$i]<br>");
// }
// die();



$apiKey = "1fd8072853c5cb42d00bf4c5ff3f3639";
$googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $v . "&appid=" . $apiKey;
$ch = curl_init();
// print_r($ch);
// die();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data['kk'] = json_decode($response);
// print_r($data['kk']);
// die();

$weather = new Weather();
$city_name =$data['kk']->name;
$description =$data['kk']->weather[0]->description;
$temp1 =$data['kk']->main->temp;
$temp_max1 =$data['kk']->main->temp_max;
$temp_min1 =$data['kk']->main->temp_min;
$humidity =$data['kk']->main->humidity;
$wind =$data['kk']->wind->speed;
// $wind_gust =$data['kk']->wind->gust;
$sunrise =$data['kk']->sys->sunrise;
$sunset =$data['kk']->sys->sunset;
// print_r($wind_gust);
// die();
$temp = $temp1-'273.15';
$temp_max = $temp_max1-'273.15';
$temp_min = $temp_min1-'273.15';

$insert =[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'site_id' =>$v,
'city_name' =>$city_name,
'description' =>$description,
'temp' =>$temp,
'temp_min' =>$temp_min,
'temp_max' =>$temp_max,
'humidity' =>$humidity,
'wind' =>$wind,
'wind_gust' =>'0',
'sunrise' =>$sunrise,
'sunset' =>$sunset,
];

$insert = $weather->insert($insert);

$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();

foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];
$wea = new Weather();
$weathe = $wea->where('city_name',$v)->findAll();

foreach($weathe as $gg){

}
$last_id = $gg['id'];



$data['last_id_data'] = $db->query("SELECT * FROM `Weather` where status=1 and id=$last_id")->getResultArray();
$time = time();

$meth = strtotime('now');
$dat = date('H',$meth);

$method1 = strtotime('now');
$method2 = strtotime('-2 hour');
$method3 = strtotime('-4 hour');
$method4 = strtotime('-6 hour');
$method5 = strtotime('-8 hour');
$method6 = strtotime('-10 hour');
$method7 = strtotime('-12 hour');
$method8 = strtotime('-14 hour');
$method9 = strtotime('-16 hour');
$method10 = strtotime('-18 hour');
$method11 = strtotime('-20 hour');
$method12 = strtotime('-22 hour');
$method13 = strtotime('-24 hour');


$data['a'] = date('H:00',$method1);
$data['aaa'] = date('H:00',$method11);
$data['aaaa'] = date('H:00',$method12);
$data['aa'] = date('H:00',$method10);
$data['b'] = date('H:00',$method2);
$data['c'] = date('H:00',$method3);
$data['d'] =  date('H:00', $method4);
$data['e'] =  date('H:00', $method5);
$data['f'] =  date('H:00', $method6);
$data['g'] =  date('H:00', $method7);
$data['h'] =  date('H:00', $method8);
$data['i'] = date('H:00', $method9);

$data['month_names'] = array("January","February","March","April","May","June","July","August","September","October","November","December");
$data['id'] = $iiiiiiiii;


$weather = new Weather();
$name = $weather->where('id',$iiiiiiiii)->first();


$city_name = $name['city_name'];
$weather1 = $weather->where('status',1)->findAll();

// $data['month'] = $weather->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('Hour(updated_at)',date('h'))->findAll();
$data['month'] = $weather->where('Month(updated_at)', date('m'))->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('Hour(updated_at)',date('h'))->findAll();

$humiditydata=array();
$monthavai=array();
$monthareal=array();

$temphumiditydata=array();
$tempmonthavai=array();
$tempmonthareal=array();

$windhumiditydata=array();
$windtempmonthavai=array();
$windtempmonthareal=array();

foreach ($data['month'] as $key => $value) {
$date=date_create($value['updated_at']);
array_push($windhumiditydata,$value['wind']);
array_push($temphumiditydata,$value['temp']);
array_push($humiditydata,$value['humidity']);
array_push($monthavai,date_format($date,"M"));
}

//   print_r($monthavai);
// print_r($humiditydata);
$monthsall =
array( 'January','February','March','April','May','June','July ','August','September','October','November','December');


foreach ($monthsall as $key => $valmbnt) {

if (in_array(substr($valmbnt,0,3),$monthavai))
{
foreach ($humiditydata as $key => $vadatbnt) {
array_push($monthareal,$vadatbnt);

}
foreach ($temphumiditydata as $key => $vadatbntmp) {
array_push($tempmonthareal,$vadatbntmp);

}

foreach ($windhumiditydata as $key => $vadatbntmp) {
array_push($windtempmonthareal,$vadatbntmp);

}
}else
{
array_push($windtempmonthareal,'0');
array_push($tempmonthareal,'0');
array_push($monthareal,'0');
}

}

// $data['montharealtmp']=array();
// $data['windtempmonthareal']=array();
// $data['monthareal']=array();
// print_r($data['month']);
// die();
foreach($tempmonthareal as $key => $l){

if($key>11){
if(count($tempmonthareal)!=12){
$tempmonthareal=array_reverse($tempmonthareal);
array_pop($tempmonthareal);

}
if(count($windtempmonthareal)!=12){
$windtempmonthareal=array_reverse($windtempmonthareal);
array_pop($windtempmonthareal);
}
if(count($monthareal)!=12){
$monthareal=array_reverse($monthareal);
array_pop($monthareal);
}}
}
$data['montharealtmp']=$tempmonthareal;
$data['windtempmonthareal']=$windtempmonthareal;
$data['monthareal']=$monthareal;
$data['check']='2';
$data['month']=array();

}

}


public function months(){
$iiiiiiiii = $this->request->getVar('id');
$data['pg_nm'] = 'Dashboard';

$db = \Config\Database::connect();
$session = session();
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
$data['supplier_mod'] = new SupplierModel();


$rs = check_session();
if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();
$ghg = new GhgModel();
$id = session()->supplier_info['supplier_id'];
$data['assign'] = $supplier_model->where('owner_id',$id)->findAll();

$rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

$supplier_plan_id = $rs['supplier_plan_id'];
$session_id = session()->supplier_info['supplier_id'];


$supplier_module_item_relation_model = new SupplierModuleItemRelationModel();

$sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();

$supplier_mod = [];

$supplier_mod_item = [];

if($sup_mod_item_relation)
{

foreach($sup_mod_item_relation as $smir)
{

$supplier_mod[] = $smir["supplier_module_id"];

$supplier_mod_item[] = $smir["supplier_module_item_id"];

}

}

$data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();

$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();

$query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

$data['employee_details'] = $query->getResultArray();

$query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();
$data['view_data'] = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();

// $view_data = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();
//  foreach ($view_data as $key => $value) {
//      // echo $value['city_name'];
//      // die();
//  }
//  $name = $value['city_name'];
$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();
foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];

$dat = $db->query("SELECT * FROM `Weather` where status=1")->getResultArray();
$data['checked_data'] = $db->query("SELECT * FROM `weather_alert_notification` where status=1 and weather_id=$iiiiiiiii")->getResultArray();
$weather_alert = new Weather_alert_model();
$data['temp'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Temperature')->findAll();
// print_r($data['temp']);
// die();
$data['wind'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind speed')->findAll();

$data['wind_gust'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Wind gust')->findAll();
$data['humidity'] = $weather_alert->where('weather_id',$iiiiiiiii)->where('name','Humidity')->findAll();

foreach($data['checked_data'] as $ched)
{
}
$view = $db->query("SELECT * FROM `Weather` where status=1 and supplier_id = $id")->getResultArray();

foreach($view as $bb)
{
$bb['temp'];
}
$data['graph_temp']     =$bb['temp'];
$data['graph_humidity'] =$bb['humidity'];
$data['graph_wind']     =$bb['wind'];
$method2 = strtotime('-3 hour');
$data['aa'] = date("Y-m-d h:i:s",$method2);
// print_r($data['aa']);;
// die();
$data['id'] = $iiiiiiiii;
$apiKey = "1fd8072853c5cb42d00bf4c5ff3f3639";
$googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $v . "&appid=" . $apiKey;
$ch = curl_init();
// print_r($ch);
// die();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$data['kk'] = json_decode($response);
// print_r($data['kk']);
// die();
$weather = new Weather();
$city_name =$data['kk']->name;
$description =$data['kk']->weather[0]->description;
$temp1 =$data['kk']->main->temp;
$temp_max1 =$data['kk']->main->temp_max;
$temp_min1 =$data['kk']->main->temp_min;
$humidity =$data['kk']->main->humidity;
$wind =$data['kk']->wind->speed;
// $wind_gust =$data['kk']->wind->gust;
$sunrise =$data['kk']->sys->sunrise;
$sunset =$data['kk']->sys->sunset;
// print_r($wind_gust);
// die();
$temp = $temp1-'273.15';
$temp_max = $temp_max1-'273.15';
$temp_min = $temp_min1-'273.15';
$insert =[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'site_id' =>$v,
'city_name' =>$city_name,
'description' =>$description,
'temp' =>$temp,
'temp_min' =>$temp_min,
'temp_max' =>$temp_max,
'humidity' =>$humidity,
'wind' =>$wind,
'wind_gust' =>'0',
'sunrise' =>$sunrise,
'sunset' =>$sunset,
];
// $insert = $weather->insert($insert);
$city_name = $db->query("SELECT * FROM `Weather` where status=1 and id=$iiiiiiiii")->getResultArray();
foreach ($city_name as $key => $value) {

}
$v = $value['city_name'];
$wea = new Weather();
$weathe = $wea->where('city_name',$v)->findAll();
foreach($weathe as $gg){
}
$last_id = $gg['id'];
$data['last_id_data'] = $weather->where('supplier_id', $id)->where('id',$last_id)->first();
// print_r($data['last_id_data']);
// die();
$time = time();
$meth = strtotime('now');
$dat = date('H',$meth);
$method1 = strtotime('now');
$method2 = strtotime('-3 hour');
$method3 = strtotime('-6 hour');
$method4 = strtotime('-9 hour');
$method5 = strtotime('-12 hour');
$method6 = strtotime('-15 hour');
$method7 = strtotime('-18 hour');
$method8 = strtotime('-21 hour');
$method9 = strtotime('-24 hour');
$data['aaa'] = 'February';
$data['aaaa'] = 'January';
$data['b'] = 'November';
$data['aa'] = 'March';
$data['a'] = 'December';
$data['c'] = 'October';
$data['d'] = 'September';
$data['e'] = 'August';
$data['f'] = 'July';
$data['g'] = 'june';
$data['h'] = 'May';
$data['i'] = 'April';
$weather = new Weather();
$name = $weather->where('id',$iiiiiiiii)->first();
$city_name = $name['city_name'];
$weather1 = $weather->where('status',1)->findAll();
$month = $this->request->getVar('months');
if($month == '1')
{
$humiditydata=array();
$monthavai=array();
$monthareal=array();

$temphumiditydata=array();
$tempmonthavai=array();
$tempmonthareal=array();

$windhumiditydata=array();
$windtempmonthavai=array();
$windtempmonthareal=array();


$city_name = $name['city_name'];
$weather1 = $weather->where('status',1)->findAll();
$weather33 = $weather->where('status',1)->where('id',$iiiiiiiii)->findAll();

// $data['month'] = $weather->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('Hour(updated_at)',date('h'))->findAll();

$currentTime11 = strtotime('now');
$currentTime111 = date('m/d/Y H',$currentTime11);
if($currentTime111){
$currentTime2 = $currentTime111.':30';
}
// $gg = $weather->where('timestampRoh <=','01/03/2023'.$currentTime2)->findAll();

// print_r($gg);
// die();

$currentTime = strtotime('now');

$currentTime1 = date('m/d/Y',$currentTime);
$data['month'] =
$weather->where('Month(updated_at)', date('m'))->where('supplier_id',$id)->where('city_name',$city_name)->groupBY('timestampRoh',date('H:i'))
->where('timestamp_date >=',$currentTime1)->where('timestampRoh >=',$currentTime2)->findAll(12);

foreach ($data['month'] as $key => $value)
{
$date=date_create($value['timestampRoh']);
array_push($windhumiditydata,$value['wind']);
array_push($temphumiditydata,$value['temp']);
array_push($humiditydata,$value['humidity']);
array_push($monthavai,date_format($date,"M"));
}


// print_r($humiditydata);
$monthsall = array('January','February','March','April','May','June','July ','August','September','October','November','December');


foreach($monthsall as $key => $valmbnt) {

if (in_array(substr($valmbnt,0,3),$monthavai))
{
foreach ($humiditydata as $key => $vadatbnt) {
array_push($monthareal,$vadatbnt);

}
foreach ($temphumiditydata as $key => $vadatbntmp) {
array_push($tempmonthareal,$vadatbntmp);

}

foreach ($windhumiditydata as $key => $vadatbntmp) {
array_push($windtempmonthareal,$vadatbntmp);

}
}else
{
array_push($windtempmonthareal,'0');
array_push($tempmonthareal,'0');
array_push($monthareal,'0');
}

}
$data['montharealtmp']=$tempmonthareal;
$data['windtempmonthareal']=$windtempmonthareal;
$data['monthareal']=$monthareal;
$data['monthsall']=$monthsall;


$data['month']=array();
$data['check']='1';

}
if($month == '2'){
return redirect()->to('view_weather_data/'.$iiiiiiiii);
}
echo view('brand/view_weather_data',$data);
}
public function alert(){
$rs = check_session();

if(!$rs)
{

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();
$session = session();

$jj = $this->request->getVar('id');

$name = $this->request->getVar('Wind');

$weather_alert = new Weather_alert_model();

$view = $weather_alert->where('weather_id',$jj)->where('name',$name)->findAll();
if(empty($view)){

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();
$session_id = session()->supplier_info['supplier_id'];
$weather_alert = new Weather_alert_model();
// $email = $this->request->getVar('email');
// if($email){
$vvv =  $this->request->getVar('noti_to');
$data=[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'name'=> $this->request->getVar('Wind'),
'weather_id' => $this->request->getVar('id'),
'above'=>$this->request->getVar('above'),
'below'=>$this->request->getVar('below'),
'for_longer'=>$this->request->getVar('for_longer'),
'noti_to'=> $this->request->getVar('noti_to'),
'above_below'=>$this->request->getVar('above_below'),
];
$insert = $weather_alert->insert($data);

}

else{
$jj = $this->request->getVar('id');
$name = $this->request->getVar('Wind');
$weather_alert = new Weather_alert_model();
$view = $weather_alert->where('weather_id',$jj)->where('name',$name)->findAll();



foreach($view as $da){
}
$weather_name = $da['name'];
$id = $da['id'];
// print_r($id);
// die();
$wind =   $this->request->getVar('Wind');

$vvv =  $this->request->getVar('noti_to');
if($weather_name == $wind){
$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();
$session_id = session()->supplier_info['supplier_id'];
$weather_alert = new Weather_alert_model();
$data =
[
'supplier_id'=>$session_id,
'owner_id'=>$session_id,
'name'=> $this->request->getVar('Wind'),
'weather_id' => $this->request->getVar('id'),
'above'=>$this->request->getVar('above'),
'below'=>$this->request->getVar('below'),
'for_longer'=>$this->request->getVar('for_longer'),
'noti_to'=>$vvv,
'above_below'=>$this->request->getVar('above_below'),
];
$insert = $weather_alert->update($id, $data);

}
}

return redirect()->back();
}


public function demo(){
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}

$data['pg_nm'] = 'Dashboard';
$db = \Config\Database::connect();
$session = session();
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
$data['supplier_mod'] = new SupplierModel();


$rs = check_session();

if(!$rs) {

return redirect()->to('home/user_login');

}

$data['pg_nm'] = '';


$db = \Config\Database::connect();

$session = session();

$supplier_info = $session->get('supplier_info');

$supplier_model = new SupplierModel();

$supplier_module_model = new SupplierModuleModel();

$supplier_module_item_model = new SupplierModuleItemModel();
$ghg = new GhgModel();

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

// $data['ghg_name'] = $query->getResultArray();

$query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

$data['boundary_item'] = $query->getResultArray();

echo view('brand/template_demo',$data);
}

}