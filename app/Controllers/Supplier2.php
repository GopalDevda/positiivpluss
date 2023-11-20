<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SupplierModel;
use App\Models\TimelineActionCenterModel;
use App\Controllers\DateTime;
use CodeIgniter\I18n\Time;
use App\Models\DocumentSubTypeModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\DocumentModel;
use App\Models\Assessment;
use App\Models\IndicatorModel;
use App\Models\IndustryModel;
use App\Models\QuickStartModel;
use App\Models\CountryModel;
use App\Models\SupplierSubsidiaryModel;
use App\Models\SubSubIndustryModel;
use App\Models\IndustryCategoryModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\DegreeModel;
use App\Models\PolicyBrandModel;
use App\Models\GhgModel;
use App\Models\ActionCenterModel;
use App\Models\QuantitativeFootprintAnswerModel;
use App\Models\Toolissue;
use App\Models\StateModel;
use App\Models\BrandQualitativeAnswerModel;
use App\Models\Energy_managment;

class Supplier extends BaseController{
public function __construct()
{
helper(['form', 'url','html','menu']);
$session = \Config\Services::session();
}
public function employee()
{
return view('brand/404');
}
public function supplierOperationsInfo()
{
$session = session();
$update = new QuickStartModel();
$supplier_model = new SupplierModel();
if(session()->supplier_info['role'] == 0)
{
$o_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$make = $supplier_model->where('id',$u_id)->first();
$o_id = $make['owner_id'];
}
$location = $this->request->getVar('location');
$national = $this->request->getVar('national');
$international = $this->request->getVar('international');
$plants = $this->request->getVar('plants');
$offices = $this->request->getVar('offices');
$number_of_state = $this->request->getVar('number_of_state');
// $number = $this->request->getVar('marknumber');
$numberr = $this->request->getVar('numberr');
$country = $this->request->getVar('country');
$percentage = $this->request->getVar('percentage');
foreach($number_of_state as $idd){
}
if($idd == '1'){
$number_of_state = $this->request->getVar('number_of_state');
// $first[0] = $number;
// $first[1] = $numberr;
$data = [
'country' => json_encode($country),
'location' => json_encode($location),
'plants' => json_encode($plants),
'offices' => json_encode($offices),
'number_of_state' => json_encode($number_of_state),
'international'=>json_encode($international),
'national'=>json_encode($national),
'operation_percantage' => json_encode($percentage),
'owner_id' => $o_id,
'step4' => 1,
];
}
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
$step1 = $find['step1'];
$step2 = $find['step2'];
$step3 = $find['step3'];
$step4 = $find['step4'];
$step5 = $find['step5'];
$all_step = $step1+$step2+$step3+$step4+$step5;
if($find)
{
$update->update($find['id'],$data);
}
else
{
$update->insert($data);
}
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
$step1 = $find['step1'];
$step2 = $find['step2'];
$step3 = $find['step3'];
$step4 = $find['step4'];
$step5 = $find['step5'];
$all_step = $step1+$step2+$step3+$step4+$step5;
$s_date = [
	'success' => 'Data update SuccessFully',
	'all_step' => $all_step
];
return $this->response->setJSON($s_date);
}

public function assessment_quest_indi($id)
{
	 $db = \Config\Database::connect();
                $session = session();
                $supplier_info = $session->get('supplier_info');

                if(session()->supplier_info['role'] == 0)
                {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                }
                else
                {
                $u_id = session()->supplier_info['supplier_id'];
                $o_id = $find['owner_id'];
                }
  $query = $db->query("SELECT * FROM `control_assessment` WHERE owner_id = $o_id and status !=0")->getResultArray();
  $indicator = new IndicatorModel();
  $indicator_query = $indicator->where('status',1)->findAll();

  $data="";
  $data.='<option value="">Select from list</option>';
   if($id == '52')
{
 foreach ($indicator_query as $key => $indicator_name)
   {
   $data.='<option value="'.$indicator_name['id'].'">'.$indicator_name['indicator_name'].'</option>';
   }  


}else{
   foreach ($query as $key => $value)
   {
   $data.='<option value="'.$value['id'].'">'.$value['uniq_spl'].'</option>';
   }
}
   echo $data;


}

public function indiacator_assessmentID($id,$ass_id)
{
	 $db = \Config\Database::connect();
                $session = session();
                $supplier_info = $session->get('supplier_info');

                if(session()->supplier_info['role'] == 0)
                {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                }
                else
                {
                $u_id = session()->supplier_info['supplier_id'];
                $o_id = $find['owner_id'];
                }
				// print_r($id);
				// die;
$BrandQualitativeAnswerModel = new BrandQualitativeAnswerModel();
$Environment = new Energy_managment();

if($ass_id  == '53'){

$question_all =  $db->query("SELECT * from all_assessment_question as alq JOIN brand_qualitative_answer AS amaa ON alq.id = amaa.question_id  where  alq.status = 1 and amaa.owner_id=$o_id and  amaa.control_assesment_id = $id ")->getResultArray();
// print_r($question_all);
// die;
  $data="";
  foreach ($question_all as $key => $value)
  {
  	if(!($value['media'] == null)){
  $data.='<div class="tab-pane active"
                    id="tabVerticalLeft1"
                    role="tabpanel"
                    aria-labelledby="baseVerticalLeft-tab1"
                    >
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb-1 border-0">
                            <div class="row">
                                <div class="col-md-11">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#accordionOne'.$value['id'].'"
                                    aria-expanded="true"
                                    aria-controls="accordionOne"
                                    >
                                    '.$value['question_title'].'
                                    <span class="ms-auto me-2">
                                        <!-- <i class="fa-solid fa-circle-exclamation" data-bs-toggle="modal" data-bs-target="#exampleModal_1"></i> -->
                                    </span>
                                    </button>
                                    </h2>

                                    <div
                                        id="accordionOne'.$value['id'].'"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample"
                                        >
                                        <div class="accordion-body bg-light">
                                            <p>'.$value['question'].'</p>
                                            <label class="form-label fs-6" for="select2-basic">Answer</label>
                                            
                                            <p>'.$value['answer'].'</p>
                                        </div>
                                    </div>

									<input type="hidden" name="" id="indi_id" value="'.$id.'">
									<input type="hidden" id="qualitative_id" value="53">
                                </div>
                                <div class="col-md-1">
                                    <div class="form-check form-check-inline  pt-1 pb-1">
                            <input class="form-check-input gopal-navv" name="checkQuestion[]" type="checkbox" id="inlineCheckbox'.$value['id'].'" value="'.$value['question_title'].'"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>';
  }

}
}
else
{
$Environment_query = $Environment->where('indicator_id',$id)->where('status',1)->where('supplier_id',$u_id)->findAll();
$data="";
  foreach ($Environment_query as $key => $value)
  {
    if(!($value['image'] == null)){
  $data.='<div class="tab-pane active"
                    id="tabVerticalLeft1"
                    role="tabpanel"
                    aria-labelledby="baseVerticalLeft-tab1"
                    >
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb-1 border-0">
                            <div class="row">
                                <div class="col-md-11">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#accordionOne'.$value['id'].'"
                                    aria-expanded="true"
                                    aria-controls="accordionOne"
                                    >
                                    '.$value['sub_e_type'].'
                                    <span class="ms-auto me-2">
                                        <!-- <i class="fa-solid fa-circle-exclamation" data-bs-toggle="modal" data-bs-target="#exampleModal_1"></i> -->
                                    </span>
                                    </button>
                                    </h2>
                                    <div
                                        id="accordionOne"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample"
                                        >

                                        <div class="accordion-body bg-light">
                                            <p></p>
                                            <label class="form-label fs-6" for="select2-basic">Answer</label>
                                            <p></p>
                                        </div>
										<input type="hidden" id="indi_id" value="'.$id.'">
										<input type="hidden" id="qualitative_id" value="52">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-check form-check-inline  pt-1 pb-1">
                            <input class="form-check-input gopal-navv" name="checkQuestion[]" type="checkbox" id="inlineCheckbox'.$value['id'].'" value="'.$value['sub_e_type'].'"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>';
  }

}


}
 echo $data;


}

public function question_document_submit($id)
{

$question_id = explode(',' , $id);
$db = \Config\Database::connect();
                $session = session();
                $supplier_info = $session->get('supplier_info');

                if(session()->supplier_info['role'] == 0)
                {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                }
                else
                {
                $u_id = session()->supplier_info['supplier_id'];
                $o_id = $find['owner_id'];
                }
$BrandQualitativeAnswerModel = new BrandQualitativeAnswerModel();

  $model = new DocumentModel();
foreach($question_id  as $question){

$barnd_query = $BrandQualitativeAnswerModel->where('supplier_id',$u_id)->where('id',$question)->where('status',2)->findAll();

foreach($barnd_query as $brand)
{

$ll = $data = [
    'supplier_id'=>$supplier_info['supplier_id'],
    'image'=>$brand['media'],
    'action_id'=>'2',
    'details'=>$brand['comment'],
    'status'=>1,
    'indicator_id'=>$brand['indicator_id'],
    'document_name'=>$brand['imageName'],
    'file_size'=>'0',
    'date'=>date('Y-m-d'),
    'document_type_id'=>'19',
];
$ll = $model->insert($data);



}

}
return $this->response->setJSON($ll);


}


public function supplierWorkforceInfo()
{
// print_r('ok');die();
$session = session();
$update = new QuickStartModel();
$supplier_model = new SupplierModel();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$make = $supplier_model->where('id',$u_id)->first();
$o_id = $make['owner_id'];
}
$women_total = $this->request->getVar('women_total');
$women_gen = $this->request->getVar('women_gen');
$women_bord = $this->request->getVar('women_bord');
$differently_per = $this->request->getVar('differently_per');
$differently_emp = $this->request->getVar('differently_emp');
$differently_gen = $this->request->getVar('differently_gen');
$differently_total = $this->request->getVar('differently_total');
$employee_total = $this->request->getVar('employee_total');
$employee_gen = $this->request->getVar('employee_gen');
$employee_wor = $this->request->getVar('employee_wor');
$employee_per = $this->request->getVar('employee_per');
$financial_year = $this->request->getVar('financial_year');
$data = [
'financial_year' => $financial_year,
'employee_per' => json_encode($employee_per),
'employee_wor' => json_encode($employee_wor),
'employee_gen' => json_encode($employee_gen),
'employee_total' => json_encode($employee_total),
'women_total' => json_encode($women_total),
'women_gen' => json_encode($women_gen),
'women_bord' => json_encode($women_bord),
'differently_per' => json_encode($differently_per),
'differently_emp' => json_encode($differently_emp),
'differently_gen' => json_encode($differently_gen),
'differently_total' => json_encode($differently_total),
'owner_id' => $o_id,
'step5' =>1,
];
// print_r($data);
// die();
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
if($find)
{
//  print_r($data);
//  die();
$update->update($find['id'],$data);
$s_date = ['success' => 'All Information successfully updated'];
$session->setFlashdata($s_date);
}
else
{
$update->insert($data);
$s_date = ['success' => 'All Information successfully saved'];
$session->setFlashdata($s_date);
}
return redirect()->to('brand/manage_organization');
}

public function getsubdocumentsubtype($id){
        $docModel = new DocumentSubTypeModel();
        $docData = $docModel->where('id',$id)->first();
        $docDescription = $docData['details'];
        echo $docDescription;
    }
    
public function supplierActivityInfo()
{
// print_r('ok');die();
$session = session();
$update = new QuickStartModel();
$supplier_model = new SupplierModel();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$make = $supplier_model->where('id',$u_id)->first();
$o_id = $make['owner_id'];
}
$activity_industry = $this->request->getVar('activity_industry');
$activity_subindustry = $this->request->getVar('activity_subindustry');
$activity_activities = $this->request->getVar('activity_activities');
$activity_percentagee = $this->request->getVar('activity_percentagee');
$product_servicesss = $this->request->getVar('product_servicesss');
$nic_codee = $this->request->getVar('nic_codee');
$holding_percentageee = $this->request->getVar('holding_percentageee');
$data = [
'holding_percentageee' => json_encode($holding_percentageee),
'activity_industry' => json_encode($activity_industry),
'activity_subindustry' => json_encode($activity_subindustry),
'activity_activities' => json_encode($activity_activities),
'activity_percentagee' => json_encode($activity_percentagee),
'product_servicesss' => json_encode($product_servicesss),
'nic_codee' => json_encode($nic_codee),
'owner_id' => $o_id,
'step3' => 1
];
// print_r($data);
// die();
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
if($find)
{
$update->update($find['id'],$data);
}
else
{
$update->insert($data);
}
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
$step1 = $find['step1'];
$step2 = $find['step2'];
$step3 = $find['step3'];
$step4 = $find['step4'];
$step5 = $find['step5'];
$all_step = $step1+$step2+$step3+$step4+$step5;
$s_date = [
	'success' => 'Data update SuccessFully',
	'all_step' => $all_step
];
return $this->response->setJSON($s_date);
}
public function supplierOtherInfo()
{
// print_r('ok');die();
$session = session();
$update = new QuickStartModel();
$supplier_model = new SupplierModel();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$make = $supplier_model->where('id',$u_id)->first();
$o_id = $make['owner_id'];
}
$name_hol = $this->request->getVar('name_hol');
$location_6 = $this->request->getVar('location_6');
$industry_name = $this->request->getVar('industry_name');
$sub_industry_name = $this->request->getVar('sub_industry_name');
$percentage = $this->request->getVar('percentage');
$whether = $this->request->getVar('whether');
$cturnover = $this->request->getVar('cturnover');
$net_worth = $this->request->getVar('net_worth');
$data = [
'net_worth' => $net_worth,
'name_hol' => json_encode($name_hol),
'location_6' => json_encode($location_6),
'industry_name' => json_encode($industry_name),
'sub_industry_name' => json_encode($sub_industry_name),
'percentage' => json_encode($percentage),
'whether' => $whether,
'cturnover' => $cturnover,
'owner_id' => $o_id
];
// print_r($data);
// die();
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
if($find)
{
//  print_r($data);
//  die();
$update->update($find['id'],$data);
}
else
{
$update->insert($data);
}
// $s_date = ['success' => 'Data update SuccessFully'];
// $session->setFlashdata($s_date);
// return redirect()->back();
return redirect()->to('brand/manage_organization');
}
public function supplierCompany()
{
// print_r('ok');die();
$session = session();
$update = new QuickStartModel();
$supplier_model = new SupplierModel();
if(session()->supplier_info['role'] == 0){
$o_id = session()->supplier_info['supplier_id'];
}
else{
$u_id = session()->supplier_info['supplier_id'];
$make = $supplier_model->where('id',$u_id)->first();
$o_id = $make['owner_id'];
}
$socials = $this->request->getVar('socials');
$twiter = $this->request->getVar('twiter');
$link = $this->request->getVar('link');
// print_r($socials);
// die();
$website = $this->request->getVar('website');
$description = $this->request->getVar('description');
$mission = $this->request->getVar('mission');
$data = [
'mission' => $mission,
'link' => $link,
'twiter' =>$twiter,
'socials' => json_encode($socials),
'website' => $website,
'description' => $description,
'company_email' => $this->request->getVar('cEmail'),
'company_mobile' => $this->request->getVar('cPhone'),
'owner_id' => $o_id,
'step2' => 1,
];
// print_r($data);
// die();
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
if($find)
{
$update->update($find['id'],$data);
}
else
{
$update->insert($data);
}
$find = $update->where('owner_id', $o_id)->where('status', 1)->first();
$step1 = $find['step1'];
$step2 = $find['step2'];
$step3 = $find['step3'];
$step4 = $find['step4'];
$step5 = $find['step5'];
$all_step = $step1+$step2+$step3+$step4+$step5;
$s_date = [
	'success' => 'Data update SuccessFully',
	'all_step' => $all_step
];
return $this->response->setJSON($s_date);
}
public function index(){
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
$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
$per = 0;
$total_per = 0;
$query = $db->query("select * from assessment where status=1 order by id");
$rs = $query->getResultArray();
if(!empty($rs)){
foreach($rs as $r){
$query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and is_verify=1 and is_submit=1 and assessment_id='".$r['id']."' " );
$p = $query->getResultArray();
if(!empty($p)){
$per = ($p[0]['assessment_per']/100)*$r['weight_percentage'];
$total_per = $per+$per;
}
}
}
$ghg = array();
$query = $db->query("select * from assessment where  id=10 order by id");
$rs = $query->getResultArray();
$query = $db->query("select * from supplier_assessment where is_submit=1 and assessment_id='".$rs[0]['id']."' and supplier_id='".$supplier_info['supplier_id']."'");
$s = $query->getResultArray();
$total_company_footprint = 0;
$total_building_footprint = 0;
$total_travel_footprint = 0;
$total_company_vehicle_footprint = 0;
$total_mobile_fuel_footprint = 0;
if($s) {
foreach($s as $rs) {
$total_company_footprint = $total_company_footprint + $rs['total_footprint'];
$query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=17");
$building_footprint = $query->getResultArray();
if($building_footprint) {
$total_building_footprint = $total_building_footprint + $building_footprint[0]['tot'];
}
$query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=18");
$travel_footprint = $query->getResultArray();
if($travel_footprint) {
$total_travel_footprint = $total_travel_footprint + $travel_footprint[0]['tot'];
}
$query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=19");
$company_vehicle_footprint = $query->getResultArray();
if($company_vehicle_footprint) {
$total_company_vehicle_footprint = $total_company_vehicle_footprint + $company_vehicle_footprint[0]['tot'];
}
$query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=20");
$mobile_fuel_footprint = $query->getResultArray();
if($mobile_fuel_footprint) {
$total_mobile_fuel_footprint = $total_mobile_fuel_footprint + $mobile_fuel_footprint[0]['tot'];
}
}
}
if(!empty($s)) {
$query = $db->query("select SUM(estimate)as tot,ghg_id from ghg_assessment where  supplier_assessment_id='".$s[0]['id']."' and supplier_id='".$supplier_info['supplier_id']."' group by ghg_id");
$rs = $query->getResultArray();
}
// print_r($rs);die;
if(!empty($s)) {
if(!empty($rs)){
foreach($rs as $r){
if(!empty($r)){
$query = $db->query("select * from ghg where status=1 and id='".$r['ghg_id']."' ");
$g = $query->getResultArray();
$per = 0;
if($total_company_footprint!=0) {
if($r['ghg_id']==17) {
$per = ($total_building_footprint/$total_company_footprint) * 100;
}
if($r['ghg_id']==18) {
$per = ($total_travel_footprint/$total_company_footprint) * 100;
}
if($r['ghg_id']==19) {
$per = ($total_company_vehicle_footprint/$total_company_footprint) * 100;
}
if($r['ghg_id']==20) {
$per = ($total_mobile_fuel_footprint/$total_company_footprint) * 100;
}
}
$ghg[] = array('ghg_name'=>$g[0]['ghg_name'],'per'=> $per);
}
}
}
}
$sdg = [];
if($supplier_info) {
$query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=2 order by id desc");
$supp_ass = $query->getResultArray();
if($supp_ass) {
$query = $db->query("select sba.base_assessment_question_id,saq.sdg_id,s.sdg_name,s.image,d.degree_num from supplier_base_assessment as sba join sdg_assessment_question as saq on sba.base_assessment_question_id=saq.id join sdg as s on saq.sdg_id=s.id join degree as d on sba.degree_id=d.id where sba.supplier_assessment_id='".$supp_ass[0]['id']."' and (d.degree_num=3 or d.degree_num=4) group by sdg_id");
$sdg = $query->getResultArray();
}
}
$query = $db->query("select indicator_name from indicator where status=1 order by id");
$indicator = $query->getResultArray();
$query = $db->query("select * from supplier_assessment where  assessment_id=1 and supplier_id='".$supplier_info['supplier_id']."' order by id");
$b = $query->getResultArray();
$category = array();
$query = $db->query("select * from indicator_category where status=1 order by id");
$cat = $query->getResultArray();
//        print_r($b);die;
if(!empty($b)){
if(!empty($cat)){
foreach($cat as $c){
// $query = $db->query("select count(id)as tot from base_assessment_question where indicator_category_id='".$c['id']."' and status=1 order by id");
$query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment where supplier_assessment_id='".$b[0]['id']."' and status=1");
$total_question = $query->getResultArray();
if($total_question[0]['tot']>0){
// $query = $db->query("select count(s.id)as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and indicator_category_id='".$c['id']."' and supplier_assessment_id='".$b[0]['id']."'  ");
$query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and indicator_category_id='".$c['id']."' and supplier_assessment_id='".$b[0]['id']."'  ");
$ava_question = $query->getResultArray();
$per = 0;
if($ava_question[0]['tot']>0) {
$per = round(($ava_question[0]['tot']/$total_question[0]['tot'])*100);
}
$category[] = array('value'=>$per,'name'=>$c['indicator_category_name']);
}else{
$category[] = array('value'=>0,'name'=>$c['indicator_category_name']);
}
}
}
}
$indicator = array();
$indicator_value = array();
if(!empty($b)){
$query = $db->query("select count(s.id)as tot,indicator_id from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and supplier_assessment_id='".$b[0]['id']."' group by b.indicator_id ");
$ava_question = $query->getResultArray();
if(!empty($ava_question)){
foreach($ava_question as $v){
$query = $db->query("select count(id)as tot from base_assessment_question where indicator_id='".$v['indicator_id']."' and status=1 order by id");
$total_question = $query->getResultArray();
if($total_question[0]['tot']>0){
$query = $db->query("select * from indicator where id='".$v['indicator_id']."' ");
$i = $query->getResultArray();
$per = round(($v['tot']/$total_question[0]['tot'])*100);
$indicator[] = array($i[0]['indicator_name']);
$indicator_value[] =$per;
}
}
}
}
$data['ghg'] = $ghg;
$data['sdg'] = $sdg;
//        $data['indicator'] = $indicator_per;
$data['indicator'] = array('indicator_array'=>$indicator,'indicator_per'=>$indicator_value);
$data['indicator_category'] = $category;
$data['assessment'] = array('gaugeChart_percentage'=>$total_per);
$query = $db->query("select count(id)as tot,sum(no_of_employee) as tot_emp from supplier_assessment where assessment_id=10 and supplier_id='".$supplier_info['supplier_id']."' order by id");
$total_location = $query->getResultArray();
$query = $db->query("select count(id)as tot from supplier_assessment where assessment_id=11 and supplier_id='".$supplier_info['supplier_id']."' order by id");
$total_product = $query->getResultArray();
$data['dashboard'] = array("location"=>$total_location[0]['tot'],"employee"=>$total_location[0]['tot_emp'],"product"=>$total_product[0]['tot']);
$supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=1 order by id desc")->getRowArray();
$data['supp_assess'] = $supp_assess;
$list = [];
$degree_model = new DegreeModel();
$data['degree'] = $degree_model->where('status',1)->findAll();
$supplier_base_assessment = [];
if($data['supp_assess']) {
$supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=".$data['supp_assess']['id'])->getResultArray();
}
if($supplier_base_assessment) {
foreach($supplier_base_assessment as $sba) {
$temp_arr = [];
$question = $db->query("select base_assessment_question.question,indicator_category.indicator_category_name,indicator.indicator_name from base_assessment_question join indicator_category on base_assessment_question.indicator_category_id=indicator_category.id join indicator on base_assessment_question.indicator_id=indicator.id  where base_assessment_question.id=".$sba['base_assessment_question_id'])->getRowArray();
$answer = $db->query("select answer,marks from base_assessment_answer where degree_id in(6,7) and base_assessment_answer.id=".$sba['base_assessment_answer_id'])->getRowArray();
$temp_arr["supplier_base_assessment"] = $sba;
$temp_arr["question"] = $question;
$temp_arr["answer"] = $answer;
$list[] = $temp_arr;
}
}
$query = $db->query("SELECT * FROM `supplier_base_assessment` as s join base_assessment_answer as a on s.`base_assessment_answer_id`=a.id join base_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(1,4) and c.assessment_id=1 and c.`supplier_id`=".$supplier_info['supplier_id']." ");
$risk = $query->getResultArray();
$data['base_risk'] = array();
if(!empty($risk)){
foreach ($risk as $key => $r) {
$query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
$cat = $query->getResultArray();
$query = $db->query("select * from indicator where id='".$r['indicator_id']."' order by id ");
$i = $query->getResultArray();
$base_risk[] = array("indicator_category_name"=>$cat[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg"=>'');
}
$data['base_risk'] = $base_risk;
}
$query = $db->query("SELECT * FROM `supplier_base_assessment` as s join base_assessment_answer as a on s.`base_assessment_answer_id`=a.id join base_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(6,7) and c.assessment_id=1 and c.`supplier_id`=".$supplier_info['supplier_id']." ");
$strong = $query->getResultArray();
$data['base_strong'] = array();
if(!empty($strong)){
foreach ($strong as $key => $r) {
$query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
$cat = $query->getResultArray();
$query = $db->query("select * from indicator where id='".$r['indicator_id']."' order by id ");
$i = $query->getResultArray();
$base_strong[] = array("indicator_category_name"=>$cat[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg"=>'');
}
$data['base_strong'] = $base_strong;
}
$query = $db->query("SELECT * FROM `supplier_base_assessment` as s join sdg_assessment_answer as a on s.`base_assessment_answer_id`=a.id join sdg_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(1,2) and c.assessment_id=2 and c.`supplier_id`=".$supplier_info['supplier_id']."  ");
$risk = $query->getResultArray();
$data['sdg_risk'] = array();
if(!empty($risk)){
foreach ($risk as $key => $r) {
$query = $db->query("select * from sdg where id='".$r['sdg_id']."' order by id ");
$sdg = $query->getResultArray();
$query = $db->query("select i.*,ic.indicator_category_name from indicator as i join indicator_category as ic on i.indicator_category_id=ic.id where i.id='".$r['indicator_id']."' order by i.id ");
$i = $query->getResultArray();
$sdg_risk[] = array("indicator_category_name"=>$i[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg_name"=>$sdg[0]['sdg_name']);
}
$data['sdg_risk'] = $sdg_risk;
}
$query = $db->query("SELECT * FROM `supplier_base_assessment` as s join sdg_assessment_answer as a on s.`base_assessment_answer_id`=a.id join sdg_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(6,7) and c.assessment_id=2 and c.`supplier_id`=".$supplier_info['supplier_id']."  ");
$strong = $query->getResultArray();
$data['sdg_strong'] = array();
if(!empty($strong)){
foreach ($strong as $key => $r) {
$query = $db->query("select * from sdg where id='".$r['sdg_id']."' order by id ");
$sdg = $query->getResultArray();
$query = $db->query("select i.*,ic.indicator_category_name from indicator as i join indicator_category as ic on i.indicator_category_id=ic.id where i.id='".$r['indicator_id']."' order by i.id ");
$i = $query->getResultArray();
$sdg_strong[] = array("indicator_category_name"=>$i[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg_name"=>$sdg[0]['sdg_name']);
}
$data['sdg_strong'] = $sdg_strong;
}
$query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=".$supplier_info['supplier_id']." group by assessment_id order by assessment_id");
$level = $query->getResultArray();
$total_level = 0;
$level_name ='';
if(!empty($level)){
foreach($level as $l){
$query = $db->query("SELECT * FROM assessment WHERE status=1 and id='".$l['assessment_id']."' ");
$t = $query->getResultArray();
$total_level = $total_level+(($l['tot']/100)*$t[0]['weight_percentage']);
}
}
if($total_level>=0 && $total_level<=10){
$level_name = "Dorment";
}
if($total_level>=10 && $total_level<=40){
$level_name = "Active";
}
if($total_level>=41 && $total_level<=81){
$level_name = "Positive";
}
if($total_level>=81 && $total_level<=100){
$level_name = "Green";
}
$data['level'] = array("level_name"=>$level_name,"level_per"=>$total_level);;
$data['supplier_base_assessment_list'] = $list;
$data['total_emission'] = 0;
$data['per_employee_emission'] = 0;
$data['risk_assessment'] = [];
$data['riissk_assessment'] = [];
$risk_assessment_arr = [];
$riissk_assessment_arr = [];
if($supplier_info['supplier_id']) {
$query = $db->query("select sum(total_footprint) as tot from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and is_submit=1");
$rs = $query->getResultArray();
if($rs) {
$data['total_emission'] = ($rs[0]['tot'])/1000;
}
$query = $db->query("select sum(no_of_employee) as tot from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=10 and is_submit=1");
$emp_arr = $query->getResultArray();
if($emp_arr) {
if($emp_arr[0]['tot']) {
$data['per_employee_emission'] = $data['total_emission']/($emp_arr[0]['tot']);
}
}
$query = $db->query("select * from indicator_category where status=1");
$indicator_category_arr = $query->getResultArray();
            // echo '<pre>';
	                        if($indicator_category_arr) {
	                            foreach($indicator_category_arr as $indicator_category) {
	                                $tot_degree = 0;
	                                $tot_answer = 0;
	                                
	                                
	                                $toot_answer = 0;
	                                
	                                
	                                $toot_degree =0;
	                                
	                                $avg_degree = 0;
	                                $aavvgg_degree=0;
	                                $temp = [];
	                                $tempp = [];
	                                $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."'");
	                                $supplier_assessment_arr = $query->getResultArray();
	                                if($supplier_assessment_arr) {
	                                    foreach($supplier_assessment_arr as $supplier_assessment) {
	                                        if($supplier_assessment['assessment_id']==1) {
	                                            $query = $db->query("select sba.base_assessment_question_id,baq.indicator_category_id,sba.base_assessment_answer_id,baa.degree_id,sum(d.degree_num) as tot_degree,count(baa.id) as tot_answer from supplier_base_assessment as sba 
	                                            join base_assessment_question as baq on sba.base_assessment_question_id=baq.id 
	                                            join base_assessment_answer as baa on sba.base_assessment_answer_id=baa.id 
	                                            join degree as d on d.id=baa.degree_id where sba.supplier_assessment_id='".$supplier_assessment['id']."' and baq.indicator_category_id='".$indicator_category['id']."'");
	                                            $supplier_base_assessment = $query->getResultArray();
	                                            if($supplier_base_assessment) {
	                                                $tot_degree+= $supplier_base_assessment[0]['tot_degree'];
	                                                $tot_answer+= $supplier_base_assessment[0]['tot_answer'];
	                                                
	                                                $toot_degree+= $supplier_base_assessment[0]['tot_degree'];
	                                                $toot_answer+= $supplier_base_assessment[0]['tot_answer'];
	                                            }
	                                        }
	                                        if($supplier_assessment['assessment_id']==2) {
	                                            $query = $db->query("select sba.base_assessment_question_id,saq.indicator_id,sba.base_assessment_answer_id,saa.degree_id,sum(d.degree_num) as tot_degree,count(saa.id) as tot_answer,i.indicator_category_id from supplier_base_assessment as sba join sdg_assessment_question as saq on sba.base_assessment_question_id=saq.id join sdg_assessment_answer as saa on sba.base_assessment_answer_id=saa.id join degree as d on d.id=saa.degree_id join indicator as i on i.id=saq.indicator_id where sba.supplier_assessment_id='".$supplier_assessment['id']."' and saq.indicator_id=i.id and i.indicator_category_id='".$indicator_category['id']."'");
	                                            $supplier_advance_assessment = $query->getResultArray();
	                                            if($supplier_advance_assessment) {
	                                                $tot_degree+= $supplier_advance_assessment[0]['tot_degree'];
	                                                $tot_answer+= $supplier_advance_assessment[0]['tot_answer'];
	               // $toot_degree+= $supplier_advance_assessment[0]['tot_degree'];
	                                                // $toot_answer+= $supplier_advance_assessment[0]['tot_answer'];
	                                            }
	                                        }
	                                    }
	                                }
	            $temp['indicator_category_name'] = $indicator_category['indicator_category_name'];
	                                 $tempp['indicator_category_nam'] = $indicator_category['indicator_category_name'];
	                                  $tempp['indicator_category_id'] = $indicator_category['id'];
	                                $temp['avg_degree'] = 0;
	                                if($tot_degree && $tot_answer) {
	                                    $temp['avg_degree'] = $tot_degree/$tot_answer;
	                                }
	                                $tempp['aavvgg_degree'] = 0;
	                                if($toot_degree && $toot_answer) {
	                                    $tempp['aavvgg_degree'] = $toot_degree/$toot_answer;
	                                }
	                                 $risk_assessment_arr[] = $temp;
	                                $riissk_assessment_arr[] = $tempp;
	                            }
	                 $db = \Config\Database::connect();
	                    $session = session();
	                $supplier_info = $session->get('supplier_info');
	                $querygoal = $db->query("select baa.degree_id,baq.question_title,sdg.image,sdg.sdg_name,sdg.id from supplier_base_assessment as sba join sdg_assessment_question as baq on sba.base_assessment_question_id=baq.id join sdg as sdg on baq.sdg_id=sdg.id join sdg_assessment_answer as baa on baa.id=sba.base_assessment_answer_id where sba.supplier_assessment_id=71  AND baa.degree_id>4 AND sba.supplier_id=".$supplier_info['supplier_id']."  group BY sdg.sdg_name ");
	                $ggooaall = $querygoal->getResultArray();
	                            $data['risk_assessment'] = $risk_assessment_arr;
	                            $data['riissk_assessment'] = $riissk_assessment_arr;
	                            $data['goal'] = $ggooaall;
	                        }
	                    }
	             $query = $db->query("SELECT
	                g.*,
	                gc.ghg_category_name AS gc,
	                SUM(gas.estimate) as w
	            FROM
	                ghg AS g
	            JOIN ghg_category AS gc
	            ON
	                g.ghg_category_id = gc.id
	             JOIN ghg_assessment as gas
	             on g.id=gas.ghg_id
	             where gas.supplier_id='".$supplier_info['supplier_id']."'  and (g.footprint_id=5||g.footprint_id=1||g.footprint_id=2) and g.status=1 group by gc.ghg_category_name");
	                    $data['ghg'] = $query->getResultArray();
	                    $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_id='".$supplier_info['supplier_id']."' ");
	                    $total_flight_footprint_arr = $query->getResultArray();
	                    $data['tot_flight_footprint'] = 0;
	                    if($total_flight_footprint_arr) {
	                        $data['tot_flight_footprint'] = $total_flight_footprint_arr[0]['tot'];
	                    }
	                    $total_top_stage_footprint = 0;
	             if($data['ghg']) {
	                        foreach($data['ghg'] as $ghg) {
	                            $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from ghg_assessment where supplier_id='".$supplier_info['supplier_id']."' ")->getResultArray();
	                            if($top_ghg_estimate_arr) {
	                                if($top_ghg_estimate_arr[0]['mest']) {
	                                    $total_top_stage_footprint = $total_top_stage_footprint + $top_ghg_estimate_arr[0]['mest'];
	                                }
	                            }
	                        }
	                    }
	             $supp_assess20 = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and is_submit=1  order by id desc")->getRowArray();
	            // print_r($supp_assess20);
	            // die();
	                    $data['supp_assess20'] = $supp_assess20;
	                    // print_r($data['supp_assess20']);
	                    // die();
	              if($data['ghg']) {
	                        foreach($data['ghg'] as $ghg) {
	                            $max_est_arr = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_id=".$supplier_info['supplier_id']."")->getResultArray();
	                            if($max_est_arr) {
	                                if($max_est_arr[0]['mest']) {
	                                    $fact_name_arr=$db->query("select gf.name,f.factor_name,gc.ghg_category_name from ghg_factor as gf join factor as f on gf.name=f.id join ghg_category as gc on gc.id=gf.ghg_category_id where gf.id='".$max_est_arr[0]['factor_id']."'||f.id='".$max_est_arr[0]['factor_id']."'")->getResultArray();
	                                    $fact_name = "";
	                                    $ghg_cat_name = "";
	                                    if($fact_name_arr) {
	                                        $fact_name = $fact_name_arr[0]['factor_name'];
	                                        $ghg_cat_name = $fact_name_arr[0]['ghg_category_name'];
	                                    }
	                                    $temp = [];
	                                    $temp['value'] = number_format(( $ghg['w']),3,".","");
	                                    // $temp['ghg_name'] = $ghg['ghg_name'];
	                                    // $temp['factor_name'] = $fact_name;
	                                    $temp['ghg_category_name'] = $ghg['gc'];;
	                                    $top_in_each_stage[] = $temp;
	                                }
	                            }
	                        }
	              }
	             if($data['ghg']) {
	              foreach($data['ghg'] as $g) {
	                        if($g['ghg_name']!="Welcome") {                
	                $foot_per = 0;
	             // print_r($data);
	             // die();
	            // print_r($data['supp_assess20']['is_submit']);die();
	            if($data['supp_assess20']['is_submit']==1) {
	            if($data['supp_assess20']['total_footprint']==0){
	                $data['supp_assess20']['total_footprint']=1;
	            }
	                        $ghg_name[] = $g['ghg_name'];
	                        $ghg_val[] = number_format((($data['tot_flight_footprint']*100)/$data['supp_assess20']['total_footprint']),3,",",".");
	             }
	                        }
	                    }
	                }
	            $ghg_name2=[];
	            $ghg_val3=[];
	            // print_r($top_in_each_stage[1]['value']);
	            if(!empty($top_in_each_stage)){
	                                         if($top_in_each_stage[0]['ghg_category_name']!=="scope 1"){
	                                           $ghg_name2[]=array("scope 11");;
	                                        }else{
	                                        $ghg_name2[]=$top_in_each_stage[0]['ghg_category_name'];
	                                        }
	                                             if(empty($top_in_each_stage[1]['ghg_category_name'])){
	                                               $ghg_name2[]=array("scope 22");
	                                            }else{
	                                             $ghg_name2[]=$top_in_each_stage[1]['ghg_category_name'];
	                                            }
	                                                 if(empty($top_in_each_stage[2]['ghg_category_name'])){
	                                                    //  print_r($top_in_each_stage[2]['ghg_category_name']);
	                                                    //  die();
	                                                   $ghg_name2[]=array("scope 2");
	                                                }else{
	                                                $ghg_name2[]=$top_in_each_stage[2]['ghg_category_name'];
	                                                }
	                                                                if(empty($top_in_each_stage[0]['value'])){
	                                                                    $ghg_val3[]="0457";
	                                                                    
	                                                                }else{
	                                                                $ghg_val3[]=$top_in_each_stage[0]['value'];
	                                                                
	                                                                }
	                                                                    if(empty($top_in_each_stage[1]['value'])){
	                                                                        $ghg_val3[]="0";
	                                                                        
	                                                                    }else{
	                                                                    
	                                                                    $ghg_val3[]=$top_in_each_stage[1]['value'];
	                                                                    }
	                                                                        if(empty($top_in_each_stage[2]['value'])){
	                                                                             $ghg_val3[]="0";
	                                                                            
	                                                                        }else{
	                                                                        $ghg_val3[]=$top_in_each_stage[2]['value'];
	                                                                        }
	            $data['ghg_max']=round(max($ghg_val3));
	                $m=max($ghg_val3);
	                $mx=$m/8;
	            }else{
	                $ghg_name2[]=("scope 01");
	                $ghg_val3[]=array("0");
	                 $ghg_name2[]=("scope 02");
	                $ghg_val3[]=array("0");
	                 $ghg_name2[]=("scope 03");
	                $ghg_val3[]=array("0");
	                $data['ghg_max']=round(500.00);
	                $mx=1000/10;
	                $data['ghg_interval']= round($mx);
	            }
	            if(empty($ghg_val3[0] and $ghg_name2[0])==""){
	                // $ghg_name2[]=("scope 1.0");
	                $ghg_val3[]=("0");
	            }
	            if(empty($ghg_val3[1]) and empty($ghg_name2[1])){
	                $ghg_name2[]=("scope 2.0");
	                $ghg_val3[]=array("0");
	            }
	            if(empty($ghg_val3[2])and empty($ghg_name2[2])){
	                $ghg_name2[]=array("scope 3.0");
	                $ghg_val3[]=("0");
	            }
	              
	            $data['ghg_interval']= round($mx);
	            $data['ghg_valuedash'] =[];
	            $data['ghg_namedas'] = json_encode($ghg_name2);
	            $data['ghg_valuedash'] = json_encode($ghg_val3);
	            $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1");
	            $data['site'] = $query->getResultArray();
	            $query = $db->query("SELECT * FROM ghg_category where status=1 ");
	            $data['scope'] = $query->getResultArray();
	            $data['issue'] =   $db->query("SELECT * FROM issues where status=1 ")->getResultArray();
	             $a = new SupplierModel();
	            $footprint = new QuantitativeFootprintAnswerModel();
	            $session = session();
	             $supplier_info = $session->get('supplier_info');
	             $o_id = $supplier_info['supplier_id'];
	            $country_fetc = $a->where('id', $o_id)->first();
	            // print_r($country_fetc);
	            // die();
	            $turnover = $country_fetc['turnover'];
	            $country_id = $country_fetc['country_id'];
	           
	             $country_model =  $db->query("SELECT * FROM countries where id=$country_id")->getResultArray();
	            foreach($country_model as $id){
	               $emp = $id['emission_factor'];
	            }
	            if(empty($turnover)){
	            $data['total_emp'] =0;
	            }
	            elseif(empty($emp)){
	            $data['total_emp'] =0;
	            }else{
	            $data['total_emp'] =$emp/$turnover;
	            }
	            $emisio = $footprint->where('owner_id',$o_id)->first();
	            if($emisio){
	            $countemp = $emisio['emision'];
	            }else{
	                $countemp=1;
	            }
	            // print_r($countemp);
	            // die();
	             $data['role'] = $supplier_info['role'];
	              $dat = $a->where('owner_id',$o_id)->where(["role !=" => 10])->countAllResults();
	              
	              // print_r($dat);
	              // die();
	             $data['allemployemana'] = $a->where('id',$o_id)->countAllResults();
	              // print_r($data['allemployemana']);
	              // die();
	             $data['allemploy'] = $a->where('owner_id',$o_id)->where('role',12)->countAllResults();
	            if($dat){
	                $dat=$dat;
	            }
	            else{
	                $dat=1;
	            }
	            $data['total_emision']  = $countemp / $dat;
	            // print_r($data['total_emision']);
	            // die();
	            $action = new ActionCenterModel();
	            $data['allaction'] = $action->where('status',1)->where('supplier_id',$o_id)->countAllResults();
	            $issue = new Toolissue();
	            // print_r($issue);
	            // die();
	            $data['ggg'] = $issue->where('status',1)->where('user_id',$o_id)->countAllResults();
	             
	              
	            $aaa = new TimelineActionCenterModel();
	                
	                      $month = date('F d Y');
	             
	                      $date =  Time::parse($month);
	                   
	                    $start_date = $date->format('Y-m-d G:i:s');
	                  
	                   $v =   $date->modify('last day of this month')->setTime(23,59,59);
	                    $end_date = $date->format('Y-m-d G:i:s');
	               $data['emision_aa'] = $footprint->where('updated_at >=', $start_date)->where('updated_at <=', $end_date)->where('owner_id',$o_id)->countAllResults();
	                // print_r($data['emision_aa']);
	               // die();
	               
	                $action= new ActionCenterModel();
	                $data['allaction'] = $action->where('status',1)->where('supplier_id',$o_id)->orwhere('status',4)->where('supplier_id',$o_id)->countAllResults();
	                $data['without_allaction'] = $action->where('status',1)->where('supplier_id',$o_id)->orwhere('status',4)->where('supplier_id',$o_id)->countAllResults();
	                // print_r($data['without_allaction']);
	                // die();
	                $data['pending'] = $action->where('status',1)->where('supplier_id',$o_id)->countAllResults();
	                $data['complete'] = $action->where('status',4)->where('supplier_id',$o_id)->countAllResults();
	            $process=array();
	            $pend=array();
	            $inprogress_bar = $action->where('status',1)->where('supplier_id',$o_id)->findAll();
	                                foreach($inprogress_bar as $inp_bar){
	                                   $inb = $db->query("SELECT tac.id as tot ,tac.status FROM timeline_action_center as tac join action_center as ac on ac.id=tac.action_center_id  where  tac.action_center_id='".$inp_bar['id']."' and tac.status=2  order by tac.id DESC LIMIT 1")->getResultArray();
	                                if(!empty($inb)){
	                                    if($inb[0]['status']=2){
	                                        $process[]=$inb[0]['tot'];
	                                        
	                                    }
	                                    if($inb[0]['status']=1){
	                                        $pend[]=$inb[0]['tot'];
	                                    }
	                                   
	                                    // print_r($pend);
	                                }
	                                    
	                                }
	                                $in_progress=count($process);
	                  $pending=count($pend);
	                                 $data['in_progress']=$in_progress;
	                   
	                         // $count = $this->db->from('quantitative_footprint_answer')
	                        //     ->where('date_added >=', $start_date)
	                       //     ->where('date_added <=', $end_date)
	                      //    ->count_all_results();
	                     // print_r($data['emision_aa']);
	                    // die();
	                    // Issue graph code start
	               $issue = new Toolissue();
	               $data['i'] = $issue->where('user_id',$o_id)->where('issue_type',3)->where('status',1)->countAllResults();
	               $data['iv'] = $data['i']*10;
	               $data['o'] = $issue->where('user_id',$o_id)->where('issue_type',1)->where('status',1)->countAllResults();
	               $data['ov'] = $data['o']*10;
	               $data['m'] = $issue->where('user_id',$o_id)->where('issue_type',2)->where('status',1)->countAllResults();
	               $data['mv'] = $data['m']*10;
	               $data['n'] = $issue->where('user_id',$o_id)->where('issue_type',4)->where('status',1)->countAllResults();
	               $data['nv'] = $data['n']*10;
	               $data['h'] = $issue->where('user_id',$o_id)->where('issue_type',5)->where('status',1)->countAllResults();
	               $data['hv'] = $data['h']*10;
	               // print_r($data['hv']);
	               // die();
	               $data['ot'] = $issue->where('user_id',$o_id)->where('issue_type',6)->where('status',1)->countAllResults();
	               $data['ovv'] = $data['ot']*10;
	                $data['eee'] = $db->query("SELECT * FROM control_footprints where status=1 AND owner_id = $o_id")->getResultArray();
	                $data['ffff'] = $db->query("SELECT * FROM ghg where status=1")->getResultArray();
	               // print_r($data['eee']);
	               // die();
	                $data['indicator'] = $db->query("SELECT * FROM  indicator where status=1")->getResultArray();
	             
	               
	                 $data['iiii'] = $db->query("SELECT * FROM `control_footprints`  WHERE owner_id='".$o_id." ' and status=1 ")->getResultArray();
	                 // print_r($data['eee']);
	                 // die();
	                 $data['kkkk'] = $db->query("SELECT * FROM `ghg`  WHERE status=1 ")->getResultArray();   
	                 echo view('brand/dashboard',$data);
	                //   echo view('brand/dashboard_blank_page',$data);
	              
	              
	                }
	                public function forgot_password(){
	                    echo view('front/forgot_password');
	                }
	                public function forgot_password2(){
	                    $receiptemail = $this->request->getVar('email');    
	                    
	                    $session = session();
	                    $update = new SupplierModel();
	                    $model = $update->where('email',$receiptemail)->first();
	                    $user_id = $model['id'];
	                    $t=time();
	                    $encrypter = \Config\Services::encrypter();
	                    $otp=rand(10000,99999);
	                    $id = $encrypter->encrypt($user_id);
	                    
	                    //$msg= "<p>OTP : $otp <p>";
		                            $msg.='<html><body>';
			                                            $msg.= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Your Login OTP is:'.$otp.'</h3><br><p style="margin-bottom:0px; margin-top:13px;">This code will be active for 15 minutes. If you donot enter it on the <b style="font-size:15px;"> POSITIIVPLUS</b>page you just visited within that time, you can resend it from your transfer.<br><br>
			                                            Team UTOPIIC</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a><a href=""><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a></div></div>
		                                             </div>';
	                    $msg.='</body></html>';
	                    // print_r($msg);die();
	                $email = \Config\Services::email();
	                $email->setFrom('info@positiivplus.io', 'PositiivPlus Verification');
	                $email->setTo($receiptemail);
	                $email->setSubject('PositiivPlus Email Verification');
	                $email->setMessage($msg);
	                $a = $email->send();
	                if($a){
	                    $data = [
	                        'otp' => $otp,
	                    ];
	                    $update->update($user_id,$data);
	                    $session->setFlashdata('success','OTP has been Resend Successfully! ');
	                    $msg=true;
	                }else{
	                    $session->setFlashdata('error','OTP has not been Resend! ');
	                    $msg=false;
	                }
	              $data = [
	        $receiptemail,
	         
	              ];
	          return $this->response->setJSON($data);
	            
	        }

	        public function resendotp()
	        {
	        // print_r('jkxzbhkdgfhbgfjghj');
	        // die();
	                $receiptemail = $this->request->getVar('email');  
	                $session = session();
	                $update = new SupplierModel();
	                $model = $update->where('email',$receiptemail)->first();
	                $user_id = $model['id'];
	                $t=time();
	               
	                $encrypter = \Config\Services::encrypter();
	                $otp=rand(10000,99999);
	                $id = $encrypter->encrypt($user_id);
	                
	                //$msg= "<p>OTP : $otp <p>";
		                         $msg.='<html><body>';
			                                    $msg.= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Your Login OTP is:'.$otp.'</h3><br><p style="margin-bottom:0px; margin-top:13px;">This code will be active for 15 minutes. If you donot enter it on the<b style="font-size:15px;"> POSITIIVPLUS</b> page you just visited within that time, you can resend it from your transfer.<br><br>Team UTOPIIC</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div  style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a><a href=""><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a></div></div></div>';
		                    $msg.='</body></html>';
		                    // print_r($msg);die();
		                    $email = \Config\Services::email();
		                    $email->setFrom('info@positiivplus.io', 'PositiivPlus Verification');
		                    $email->setTo($receiptemail);
		                    $email->setSubject('PositiivPlus Resend Email Verification');
		                    $email->setMessage($msg);
		                    $a = $email->send();
		                    if($a){
		                        $data = [
		                            'otp' => $otp,
		                        ];
		                        $update->update($user_id,$data);
		                        $session->setFlashdata('success','OTP has been Resend Successfully! ');
		                        $msg=true;
		                    }else{
		                        $session->setFlashdata('error','OTP has not been Resend! ');
		                        $msg=false;
		                    }
		                $data = [
		                           'OTP send successfully',
		                  ];
		              return $this->response->setJSON($data);
		            }


		            public function otpverify()
		            {
		            $otp = $this->request->getVar('otp');
		            $receiptemail = $this->request->getVar('email');  
		                    
		                    
		                    
		                    $session = session();
		                    $update = new SupplierModel();
		                    $model = $update->where('otp',$otp)->first();
		                    $user_id = $model['id'];
		                    if($user_id){
		              
		               $verify = $update->where('otp',$otp)->where('id',$user_id)->first();
		            }else{
		                echo "otp not match";
		            }
		            $data = [
		               $user_id,
		             
		            ];
		              
		              return $this->response->setJSON($data);
		                // echo view('front/confirmpassword');
		                        // return redirect()->to('front/confirmpassword');
		            }

		            public function confirm_password(){
		            $password = $this->request->getVar('pass');
		            $cpassword = $this->request->getVar('cpass');
		            $id = $this->request->getVar('id');
		             $session = session();
		             if($password == $cpassword){
		             $model = new SupplierModel();
		             $data = [
		            'password' => password_hash($password, PASSWORD_DEFAULT),
		             ];
		              $model->update($id,$data);
		              $succes = 'Password Upadte successfully';
		             }else{
		              $errorr = 'Password do not match';
		             }
		            $y = [
		            'success' => $succes,
		            ];
		              return $this->response->setJSON($y);
		            }
		                public function graphpscope($id){
		            $model = new GhgModel();
		            $data = $model->where(['ghg_category_id' => $id, 'status' => 1])->findAll();
		            // echo view('brand/dashboard',$data);
		              return $this->response->setJSON($data);
		                }
		                
		                
		            //     public function quickStart(){
		            //         $rs = check_session();
		            //         if(!$rs) {
		            //             return redirect()->to('home/user_login');
		            //         }
		            //         $data['pg_nm'] = 'Quick Start';
		            //         $db = \Config\Database::connect();
		            //         $session = session();
		            //         $supplier_info = $session->get('supplier_info');
		            //         $supplier_model = new SupplierModel();
		            //         $supplier_module_model = new SupplierModuleModel();
		            //         $supplier_module_item_model = new SupplierModuleItemModel();
		            //         $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
		            //         $supplier_plan_id = $rs['supplier_plan_id'];
		            //         $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
		            //         $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
		            //         $supplier_mod = [];
		            //         $supplier_mod_item = [];
		            //         if($sup_mod_item_relation) {
		            //             foreach($sup_mod_item_relation as $smir) {
		            //                 $supplier_mod[] = $smir["supplier_module_id"];
		            //                 $supplier_mod_item[] = $smir["supplier_module_item_id"];
		            //             }
		            //         }
		            // $v = $supplier_module_model->where('status',1)->findAll();
		            //  // print_r($supplier_mod);
		            //  // die();
		            //         $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
		            //         $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
		                    
		            //         $data['supinfo'] = $db->query("SELECT supplier.brand_name,supplier.socials,supplier.turnover, countries.name, industry.industry_name,supplier.ownership,supplier.mission,supplier.vision, supplier_plan.plan_name, supplier.website, supplier.description, company.company_size FROM `supplier` JOIN countries ON countries.id = supplier.country_id JOIN industry ON industry.id = supplier.industry_id JOIN supplier_plan ON supplier_plan.id = supplier.supplier_plan_id JOIN company ON company.id=supplier_plan.company_id WHERE supplier.id = '".$supplier_info['supplier_id']."' AND supplier.status = 1")->getResultArray();
		                    
		            //         $query = $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '".$supplier_info['supplier_id']." ' and ed.status=1 ")->getResultArray();
		            //         $data['employee_details'] = $query[0]['num'];
		            //          // print_r($data['employee_details']);
		            //         // die();
		            //         if(session()->supplier_info['role'] == 0){
		            //         $o_id = session()->supplier_info['supplier_id'];
		            //         }
		            //         else{
		            //             $u_id = session()->supplier_info['supplier_id'];
		            //             $make = $supplier_model->where('id',$u_id)->first();
		            //             // print_r($make);
		            //             // die();
		            //             $o_id = $make['owner_id'];
		            //             // print_r($o_id);
		            //         }
		            //         $query = $db->query("SELECT COUNT(sd.id) as doc FROM `policy_brand` as sd WHERE sd.owner_id='".$o_id." ' and sd.policy_status='0' or sd.policy_status='2' and sd.status=1 ")->getResultArray();
		            //         $a = new PolicyBrandModel();
		            //         // $o_id = session()->supplier_info['supplier_id'];
		                   
		            //         // $data['b'] =  $a->where('status', 1)->where('owner_id',$o_id)->get()->getNumRows();
		            //         $data['b'] =  '1';
		            //         $data['c']  = 3;
		            //          $o_id = session()->supplier_info['supplier_id'];
		                  
		            //         $data['total_document'] = $a->where(["status" => 1])->where('owner_id',$o_id)->where(["approved_by !=" => null])->countAllResults();
		            //   // print_r($data['total_document']);
		            //  // die();
		                   
		            //         $supplier = new SupplierModel();
		            // $o_id = session()->supplier_info['supplier_id'];
		            // // print_r($o_id);
		            // // die();
		            //         $model = $supplier->where('id',$o_id)->first();
		            //         // print_r($model);
		            //         // die();
		            //          $position_id = $model['position'];
		            //         $ii = $supplier->where('id',$o_id)->first();
		            //         $data['total_page'] = $ii['position'];
		            // // print_r($data['total_page']);
		            // // die();
		            //         $supplier_plan = new SupplierPlanModel();
		            //         $company = new CompanyModel();
		            //         $activitie = new SubSubIndustryModel();
		            //         $ssd = new SupplierSubsidiaryModel();
		            //         $policy = new DocumentSubTypeModel();
		            //         $s_data = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
		            //         $data['ssd_data'] = $ssd->where('supplier_id',session()->supplier_info['supplier_id'])->first();
		            //         $indi = new IndustryModel();
		            //         $indi_cate = new IndustryCategoryModel();
		            //         $ik = $data['industry'] = $indi->where('id',$s_data['industry_id'])->first();
		            //         $data['industry_cate'] = $indi_cate->where('id',$ik['industry_category_id'])->first();
		            //         $data['activities'] = $activitie->where('industry',$ik['id'])->findAll();
		            //         $sp = $data['supplier_plan'] = $supplier_plan->where('id',$s_data['supplier_plan_id'])->first();
		            //         $data['size'] = $company->where('id',$sp['company_id'])->first();
		            //         // print_r($data['size']);die()
		            //         $data['all'] = $s_data;
		            //         $data['ind_cate'] = $indi_cate->where('status',1)->findAll();
		            //         $data['ind'] = $indi;
		            //         $data['policy'] = $policy->where('status',1)->findAll();
		            //         $data['u_data'] =  
		            //         $db->query("SELECT ind.industry_name,ind_cat.industry_category_name FROM `supplier` as s JOIN industry as ind on ind.id =s.industry_id JOIN industry_category as ind_cat On ind_cat.id=ind.industry_category_id WHERE s.id=965")->getResultArray();
		            //             if(session()->supplier_info['role'] == 0){
		            //             $id = session()->supplier_info['supplier_id'];
		            //             $o_id = session()->supplier_info['supplier_id'];
		            //         }
		            //         else{
		            //             $id = session()->supplier_info['supplier_id'];
		            //             $a_id = $supplier_model->where('id',$id)->first();
		            //             $o_id = $a_id['owner_id'];
		            //         }
		                    
		            //         $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=".$o_id);
		            //             $find = $ok->getResultArray();
		            //     $data['country'] =  $db->query("SELECT * FROM `countries` WHERE status=1")->getResultArray();
		            //     // print_r($data['country']);
		            //     // die();
		            //             if(session()->supplier_info['role'] == 11){
		            //                 $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And policy_status=1 or policy_status=2 And owner_id=".$o_id);
		            //             $find = $ok->getResultArray();
		            //             }
		            //         $data['policyy'] = $find;
		            //         $query = $db->query("select * from countries where status=1");
		            //         $data['country'] = $query->getResultArray();
		            //         $quer = $db->query("select * from states ");
		            //         $data['state'] = $quer->getResultArray();
		                   
		            //        $picode =  $supplier->where('id',$id)->first();
		            //        $data['pincode']  = $picode['zipcode'];
		                  
		            //      $data['ok'] = '1';
		                   
		                               
		            //         // echo view('brand/quick-start',$data);
		            //         echo view('brand/demo-quick-startdaynamic',$data);
		            //     }
		                public function supplierSubsidiaryUpdate()
		                {
		                    $session = session();
		                   
		            $update = new SupplierModel();
		                    $id = session()->supplier_info['supplier_id'];
		                    // $a = [];
		                    // $b = [];
		                    // $d = $this->request->getVar('invoice[0][industry]');
		                    // $e = $this->request->getVar('invoice[0][sub_industry]');
		                    // foreach($this->request->getVar('invoice') as $ok){
		                    //     array_push($b,$ok['percentage']);
		                    //     array_push($a,$ok['activities']);
		                    // }
		            $aa = array($this->request->getVar('percentage'));
		            $c = array($this->request->getVar('percentagee'));
		            $cc = array($this->request->getVar('percentageee'));
		            $ba = array($this->request->getVar('activities'));
		            $bb = array($this->request->getVar('activitiess'));
		            $bbb = array($this->request->getVar('activitiesss'));
		                    
		            $a = (array_merge($aa,$cc,$c));
		            $b = (array_merge($ba,$bb,$bbb));
		                    $data = [
		                        
		                         'position' => '4',
		                        'activities' => json_encode($b),
		                        'percentage' => json_encode($a)
		                    ];
		                    $update->update($id,$data);
		                    $s_date = ['success' => 'Data update SuccessFully'];
		                       $session->setFlashdata($s_date);
		                    $session = session();
		             $update = new SupplierSubsidiaryModel();
		                    $a = [];
		                    $b = [];
		                    $c = [];
		                    $d = [];
		                    $e = [];
		            $a = array($this->request->getVar('address'));
		            $b = array($this->request->getVar('product_services'));
		            $bb = array($this->request->getVar('product_servicess'));
		            $bbb = array($this->request->getVar('product_servicesss'));
		            $name = (array_merge($b,$b,$bbb));
		            // print_r($name);
		            // die();
		            $c = array($this->request->getVar('holding_percentage'));
		            $cc = array($this->request->getVar('holding_percentagee'));
		            $ccc = array($this->request->getVar('holding_percentageee'));
		            $holding_percentage = (array_merge($c,$cc,$ccc));
		            $d = array($this->request->getVar('industry_namev'));
		            $e = array($this->request->getVar('sub_industry'));
		            $code = array($this->request->getVar('nic_code'));
		            $codee = array($this->request->getVar('nic_codee'));
		            $codeee = array($this->request->getVar('nic_codeee'));
		            $nic_code = (array_merge($code,$codee,$codeee));
		                    $data = 
		                    [
		                        'supplier_id' => session()->supplier_info['supplier_id'],
		                        'position' => '4',
		                        'industry' => json_encode($d),
		                        'sub_industry' => json_encode($e),
		                        'name' => json_encode($name),
		                        'percentage' => json_encode($holding_percentage),
		                        'address' => json_encode($a),
		                        'nic_code' =>json_encode($nic_code),
		                    ];
		                    
		                    $ssd = $update->where('supplier_id',session()->supplier_info['supplier_id'])->first();
		                    if($ssd){
		                        $id = $ssd['id'];
		                      $i=  $update->update($id,$data);
		                    }else{
		                        $update->insert($data);
		                    }
		                    
		            $supplier_info = $session->get('supplier_info');
		             $o_id = $supplier_info['supplier_id'];
		             $model = new SupplierModel();
		             $id = [];
		             $id = $this->request->getVar('llll');
		            $ii = json_encode($id);
		             // print_r($ii);
		             // die();
		            $data=
		             [
		            'multiple_country' => $ii
		             ];
		             $model->update($o_id,$data);
		                   
		                return redirect()->back();
		                    
		                }
		                public function supplierUpdate3()
		                {
		              
		                    $session = session();
		                    $update = new SupplierModel();
		                    $id = session()->supplier_info['supplier_id'];
		                    $a = [];
		                    $b = [];
		                    $d = $this->request->getVar('invoice[0][industry]');
		                    $e = $this->request->getVar('invoice[0][sub_industry]');
		                    foreach($this->request->getVar('invoice') as $ok){
		                        array_push($b,$ok['percentage']);
		                        array_push($a,$ok['activities']);
		                        // array_push($c,$ok['percentage']);
		                        // $a = $ok['address'];
		                        // print_r($ok);
		                
		                    }
		                     // print_r($id);
		                      // die();
		                    $data = [
		                        // 'brand_name' => $this->request->getVar('brand_name'),
		                        // 'industry_id' => $this->request->getVar('ind'),
		                        // 'mission' => $this->request->getVar('mission'),
		                        // 'description' => $this->request->getVar('description'),
		                        // 'website' => $this->request->getVar('website'),
		                         'position' => '4',
		                        'activities' => json_encode($a),
		                        'percentage' => json_encode($b)
		                    ];
		                    $update->update($id,$data);
		                    $s_date = ['success' => 'Data update SuccessFully'];
		                       $session->setFlashdata($s_date);
		                     return redirect()->back();
		                }
		                public function supplierUpdate()
		                {
		                    $session = session();
		                    $update = new SupplierModel();
		                     // print_r($model);
		                     // die();
		                    $id = session()->supplier_info['supplier_id'];
		                    $model = $update->where('status',1)->where('id',$id)->orwhere('status',0)->where('id',$id)->first();
		                    $position_id = $model['position'];
		                    $add = $this->request->getVar('add');
		                    $name = $this->request->getVar('supplier');
		                    // print_r($name);
		                    // die();
		                    $turn = $this->request->getVar('turn');
		                    $turnover_unit = $this->request->getVar('turnover_unit');
		                    $brand_name = $this->request->getVar('brand_name');
		                    // echo $brand_name;
		                    $country = $this->request->getVar('country');
		                    $state = $this->request->getVar('state');
		                    $pincode = $this->request->getVar('pincode');
		                    $last_name = $this->request->getVar('last_name');
		                    $first_name = $this->request->getVar('first_name');
		                    if($last_name != ''){
		                        $data['last_name'] = $last_name;
		                    } 
		                    if($first_name != ''){
		                        $data['first_name'] = $first_name;
		                    } 
		                    if($turn != ''){
		                        $data['turnover'] = $turn;
		                    }
		                    if($add != ''){
		                        $data['address'] = $add;
		                    }
		                    if($brand_name != ''){
		                        $data['brand_name'] = $brand_name;
		                    }  
		                    if($country != ''){
		                        $data['country_id'] = $country;
		                    } 
		                    if($state != ''){
		                        $data['state_id'] = $state;
		                    } 
		                    if($pincode != ''){
		                        $data['zipcode'] = $pincode;
		                    }
		                    if($turnover_unit != ''){
		                     $data['unit_id'] = $turnover_unit;
		                    }      
		                   
		                            
		                    if($id != '')
		                {
		                     if($name == '1'){
		                        $data['position'] = '1';
		                        $update->update($id,$data);
		                    }
		                
		                }
		                    $s_date = ['success' => 'Data update SuccessFully'];
		                    //   $session->setFlashdata($s_date);
		                    //   return redirect()->back();
		                    // if($id){
		                    //    $response = [
		                    //    'success' => true,
		                    //    'data' => 'hm',
		                    //    'departure' => $departure,
		                    //    'arrival' => $arrival,
		                    //    'msg' => "Footprint has been saved successfully"
		                    //    ];
		                    //    }
		                    //    else{
		                    //     $response = [
		                    //    'success' => false,
		                    //    'data' => 'hm',
		                    //   'msg' => "Footprint has not save"
		                    //  ];
		                    //  }
		                     return $this->response->setJSON($s_date);
		                        
		                }
		                public function supplierUpdate2(){
		                    $session = session();
		                    $update = new SupplierModel();
		                    $id = session()->supplier_info['supplier_id'];
		                    $e = array($this->request->getVar('d'));
		                        $state = $this->request->getVar('state');
		                        $zipcod = $this->request->getVar('zipcode');     
		                //  $s = htmlspecialchars_decode($e, ENT_COMPAT);
		                       if($state == ''){
		                        $data = [
		                         'position' => '2',
		                     
		                        'language' => $this->request->getVar('language'),
		                        'currency' => $this->request->getVar('currency'),
		                        'timezone' => $this->request->getVar('timeZones'),
		                        'mission' => $this->request->getVar('e'),
		                        'description' => $this->request->getVar('b'),
		                        'website' => $this->request->getVar('a'),
		                        'socials' => json_encode($e),
		                    ];   
		                    }
		                    else{
		                        $country_id =$this->request->getVar('country');
		                        $state_id = $this->request->getVar('state');
		                        $zipcode = $this->request->getVar('zipcode');  
		                         $data = [
		                        'position' => '2',
		                        'country_id' =>$country_id,
		                        'state_id' =>  $state_id,
		                        'zipcode' => $zipcode,
		                        'address' => $this->request->getVar('address'),
		                        'language' => $this->request->getVar('language'),
		                        'currency' => $this->request->getVar('currency'),
		                        'timezone' => $this->request->getVar('timeZones'),
		                        'mission' => $this->request->getVar('e'),
		                        'description' => $this->request->getVar('b'),
		                        'website' => $this->request->getVar('a'),
		                        'socials' => json_encode($e),
		                    ];
		                    }
		                    $update->update($id,$data);
		                    $s_date = ['success' => 'Data update SuccessFully', 'okk' => e];
		                    return $this->response->setJSON($s_date);
		                }
		                public function supplierUpdate4(){
		                    $session = session();
		                    $update = new SupplierModel();
		                    $id = session()->supplier_info['supplier_id'];
		                    $bio =  $this->request->getVar('bio');
		                    $data = [
		              
		                        'position' =>'4',
		                        'bio' => $bio,
		                        'age' => $this->request->getVar('date'),
		                            ];
		                    
		                    $update->update($id,$data);
		                    $s_date = ['success' => 'Data update SuccessFully'];
		                  
		                       return $this->response->setJSON($s_date);
		                }
		                public function state_country($id){
		                    $db = \Config\Database::connect();
		                    $session = session();
		                    $supplier_info = $session->get('supplier_info');
		                    $supplier_id = $supplier_info['supplier_id'];
		                  
		                $supplier_model = new SupplierModel();
		                $state = new StateModel();
		                $CountryModel = new CountryModel();
		                $country = $supplier_model->where('id',$supplier_id)->first();
		                $country_id = $country['country_id'];
		               
		                    if($id == '1'){
		                   $data = $state->where('country_id',$country_id)->findAll();
		                    }
		                    if($id == '2'){
		                   $data = $CountryModel->where('status',1)->findAll();
		                    }
		                    return $this->response->setJSON($data);
		                }
		                public function addmoreCountry($id)
		                {
		                    $rs = check_session();
		                       if(!$rs) {
		                              return redirect()->to('home/user_login');
		                       }
		                       $db = \Config\Database::connect();
		                       $country_model = new CountryModel();
		                       $v = $id;
		                       $ids = explode(',', $v);
		                       $data= '';
		                       $data.='<div class="addDiv row bg-gray">
			                         <div class="mb-1 col-md-6">
				                        <label class="form-label" for="vertical-address">Country</label>
				                        <select class="select2 form-select" id="inter_country_id" name="country[]" required><option value="">Select country</option>';
				                                    foreach ($ids as $key => $value) {
				                                    $val = $country_model->where('id',$value)->findAll();
				                                    foreach($val as $f){
				                                   $data.="<option value=".$f['id'].">".$f['name']."</option>";
				                                    }
				                                   }
				                           
			                                $data.='</select>
		                                 </div><div class="mb-1 col-md-2">
		                                 <label class="form-label" for="vertical-landmark">Percentage </label>
		                                 <input type="number" id="vertical-landmark" name="percentage[]" class="form-control" min="0" placeholder="Enter the Percentage" required />
	                              </div>
	                              <div class="mb-1 offset-md-2 col-md-2">
		                                 <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
		                                 <button type="button" class="btn btn-dark btn-sm" onclick="addDiv()" style="margin-top: 6px;"><i class="fa fa-plus"></i></button>
		                                 <button class="removeadd_block btn btn-danger btn-sm" style="margin-top: 6px;"><i class="fa-solid fa-xmark"></i></button>
	                              </div></div>';
	                             return $data;
	                               }
	                public function subIndustry($id){
	                    $indi = new IndustryModel();
	                    $data = $indi->where('industry_category_id',$id)->findAll();
	                    return $this->response->setJSON($data);
	                }
	                public function baseAssessmentTime(){
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $query = $db->query("select * from assessment where id=1 order by id ");
	                    $data['assessment'] = $query->getResultArray();
	                    echo view('brand/base-assessment-time',$data);
	                }
	               public function baseAssessment(){
	                    $rs = check_session();
	                    if(!$rs) 
	                    {
	                        return redirect()->to('home/user_login');
	                    }
	                    $data['pg_nm'] = 'Base';
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $supplier_model = new SupplierModel();
	                    $supplier_module_model = new SupplierModuleModel();
	                    $supplier_module_item_model = new SupplierModuleItemModel();
	                    $assessment_id = 0;
	                    $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=1 order by id desc")->getRowArray();
	                    $data['supp_assess'] = $supp_assess;
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
	                    $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
	                    $query = $db->query("select * from assessment where id=1 order by id ");
	                    $data['assessment'] = $query->getResultArray();
	                    $from_date = '';
	                    $to_date ='';        
	                    $is_submit =0;        
	                    $assessment_per =0;        
	                    $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=1   ");
	                    $ava_assessment = $query->getResultArray();
	                    //print_r($ava_assessment);
	                    if(!empty($ava_assessment)){
	                        $assessment_id = $ava_assessment[0]['id'];
	                        $from_date = $ava_assessment[0]['date_from'];
	                        $to_date =$ava_assessment[0]['date_to'];
	                        $is_submit =$ava_assessment[0]['is_submit'];;        
	                        $assessment_per =$ava_assessment[0]['assessment_per'];;        
	                    } elseif(empty($ava_assessment)){
	                        if($supp_assess) {
	                            if($supp_assess['is_verify']==0) {
	                                $assessment_id = $db->query("insert into supplier_assessment(assessment_id,supplier_id,date,datetime)values(1,'".$supplier_info['supplier_id']."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");
	                                $assessment_id = $db->insertID();                    
	                            }
	                        }
	                        else {
	                        $assessment_id = $db->query("insert into supplier_assessment(assessment_id,supplier_id,date,datetime)values(1,'".$supplier_info['supplier_id']."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");
	                        $assessment_id = $db->insertID();
	                        }
	                    }
	                    $data['assessment_id'] = array('assessment_id'=>$assessment_id);
	                    $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and (b.industry_id='".$supplier_info['industry_id']."' or b.industry_id=0) group by b.indicator_id order by s.id" );
	                    $indicator = $query->getResultArray();
	                    $total_question=0;
	                    $total_attempt = 0;
	                    $array=array();
	                    if(!empty($indicator)){
	                        foreach($indicator as $i){
	                            $query = $db->query("select * from indicator_category where id='".$i['indicator_category_id']."' order by id ");
	                            $cat = $query->getResultArray();
	                            $query = $db->query("select * from base_assessment_question where indicator_id='".$i['id']."' and status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id ");
	                            $question = $query->getResultArray();
	                            $question_array = array();
	                            if(!empty($question)){
	                                foreach($question as $q){
	                                    $answer_insert_id=0;
	                                    $remark='';
	                                    $query = $db->query("select * from base_assessment_answer where base_assessment_question_id='".$q['id']."' and status=1 order by id ");
	                                    $answer = $query->getResultArray();
	                                    $answer_array = array();
	                                    if(!empty($answer)){
	                                        foreach($answer as $a){
	                                            $ava_status =0;
	                                            $query = $db->query("select * from supplier_base_assessment where base_assessment_question_id='".$q['id']."' and supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and base_assessment_answer_id='".$a['id']."' and status=1  order by id ");
	                                            $ava = $query->getResultArray();
	                                            if(!empty($ava)){$ava_status=1;$answer_insert_id=$ava[0]['id'];$remark=$ava[0]['remark'];}    
	                                             $answer_array[] = array('answer_id'=>$a['id'],'answer'=>$a['answer'],'marks'=>$a['marks'],'choice'=>$q['choice'],'ava_status'=>$ava_status);
	                                        }
	                                    }  //die;
	                                    $query = $db->query("select aqs.*,s.standard_name,c.classification_name from assessment_question_standard as aqs join standard as s on aqs.standard_id=s.id join classification as c on aqs.classification_id=c.id where aqs.question_id=".$q['id']." and aqs.status=1");
	                                    $standard = $query->getResultArray();
	                                    $question_array[] = array('question_id'=>$q['id'],'question'=>$q['question'],'choice'=>$q['choice'],'remark'=>$q['remark'],'answer'=>$answer_array,'answer_insert_id'=>$answer_insert_id,'remark'=>$remark,'standard' => $standard, 'question_title' => $q['question_title']);
	                                }
	                            }
	                        $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$i['id']."'  and s.supplier_id='".$supplier_info['supplier_id']."' and  s.supplier_assessment_id='".$assessment_id."' ");
	                        $question_attempt = $query->getResultArray();
	                            $total_attempt = $total_attempt+$question_attempt[0]['tot'];
	                            $total_question = $total_question+count($question_array);
	                        $array[] = array('id'=>$i['id'],'indicator_name'=>$i['indicator_name'],'image'=>$i['image'],'indicator_category_name'=>$cat[0]['indicator_category_name'],'question'=>$question_array,'question_attempt'=>$question_attempt[0]['tot'],'from_date'=>$from_date,'to_date'=>$to_date,'is_submit'=>$is_submit);
	                       }
	                    }
	                    $data['detail'] = array('total_question'=>$total_question,'total_attempt'=>$total_attempt,'percent'=>$assessment_per);
	                    $data['indicator'] = $array;
	                    $data['supplier_info'] = array('supplier_id'=>$supplier_info['supplier_id'],'brand_name'=>$supplier_info['brand_name']);
	                        $list = [];
	                        $degree_model = new DegreeModel();
	                        $data['degree'] = $degree_model->where('status',1)->findAll();
	                        $supplier_base_assessment = [];
	                        if($data['supp_assess']) {
	                        $supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=".$data['supp_assess']['id'])->getResultArray();
	                        }
	                        if($supplier_base_assessment) {
	                            foreach($supplier_base_assessment as $sba) {
	                                $temp_arr = [];
	                                $question = $db->query("select base_assessment_question.question,indicator_category.indicator_category_name,indicator.indicator_name from base_assessment_question join indicator_category on base_assessment_question.indicator_category_id=indicator_category.id join indicator on base_assessment_question.indicator_id=indicator.id  where base_assessment_question.id=".$sba['base_assessment_question_id'])->getRowArray();
	                                $answer = $db->query("select answer,marks from base_assessment_answer where base_assessment_answer.id=".$sba['base_assessment_answer_id'])->getRowArray();
	                                $temp_arr["supplier_base_assessment"] = $sba;
	                                $temp_arr["question"] = $question;
	                                $temp_arr["answer"] = $answer;
	                                $list[] = $temp_arr;
	                            }
	                        }
	                        $data['supplier_base_assessment_list'] = $list;
	                    $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=1 order by id desc")->getRowArray();
	                    $data['supp_assess'] = $supp_assess;
	                    $query = $db->query("select * from supplier_assessment where  assessment_id=1 and supplier_id='".$supplier_info['supplier_id']."' order by id");
	                    $b = $query->getResultArray();
	                    $category = array();
	                    $category_per = array();
	                    $query = $db->query("select * from indicator_category where status=1 order by id");
	                    $cat = $query->getResultArray();
	            //        print_r($b);die;
	                    if(!empty($b)){
	                        if(!empty($cat)){
	                            foreach($cat as $c){
	                                $query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment where supplier_assessment_id='".$b[0]['id']."' and status=1");
	                                $total_question = $query->getResultArray();
	                                if($total_question[0]['tot']>0){
	                                    $query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and indicator_category_id='".$c['id']."' and supplier_assessment_id='".$b[0]['id']."'  ");
	                                    $ava_question = $query->getResultArray();
	                                    $per = 0;
	                                    if($ava_question[0]['tot']>0) {
	                                         $per = round(($ava_question[0]['tot']/$total_question[0]['tot'])*100);
	                                    }
	                                    $category[] = $c['indicator_category_name'];
	                                    $category_per[] = $per;
	                                }else{
	                                    $category[] = $c['indicator_category_name'];
	                                    $category_per[] = 0;
	                                }
	                            }
	                        }
	                    }
	            //        $data['indicator'] = array('indicator_array'=>$indicator,'indicator_per'=>$indicator_value);
	                    $data['indicator_cat'] = array('indicator_array'=>$category,'indicator_per'=>$category_per);
	                    //$data['indicator_category'] = $category;
	                    $badge_arr = [];
	                    $bg_arr = [];
	                    if($data['supp_assess']) {
	                        $badge_arr = $db->query("select distinct(baa.badge_id) from `supplier_base_assessment` as sba join `base_assessment_answer` as baa on baa.id=sba.base_assessment_answer_id where sba.supplier_assessment_id='".$data['supp_assess']['id']."' and baa.badge_id is not NULL")->getResultArray();
	                        if($badge_arr) {
	                            foreach($badge_arr as $badge) {
	                                $badge_no_of_ans = 0;
	                                $rs_count = 0;
	                                $no_of_attached_ans_arr = $db->query("select count(id) as cnt from base_assessment_answer where badge_id=".$badge['badge_id'])->getResultArray();
	                                if($no_of_attached_ans_arr) {
	                                    $badge_no_of_ans = $no_of_attached_ans_arr[0]['cnt'];
	                                }
	                                $rs_arr = $db->query("select sba.base_assessment_answer_id,baa.badge_id from supplier_base_assessment as sba join base_assessment_answer as baa on baa.id=sba.base_assessment_answer_id where sba.supplier_assessment_id='".$data['supp_assess']['id']."' and baa.badge_id=".$badge['badge_id'])->getResultArray();
	                                if($rs_arr) {
	                                    $rs_count = count($rs_arr);
	                                }        
	                                if($badge_no_of_ans!=0 && $rs_count!=0) {
	                                    if($rs_count>=$badge_no_of_ans) {
	                                        $bg_arr[] = $badge['badge_id'];
	                                    }
	                                }
	                            }
	                        }
	                    }
	                    $data['bg_arr'] = [];
	                    if($bg_arr) {
	                        $max_prior_bg = 0;
	                        $max_prior_bg_count = 0;
	                        foreach($bg_arr as $barr) {
	                            $bg_count_arr = $db->query("select count(id) as badge_cnt from base_assessment_answer where badge_id=".$barr." and status=1")->getResultArray();
	                            if($bg_count_arr) {
	                                if($bg_count_arr[0]['badge_cnt']>$max_prior_bg_count) {
	                                    $max_prior_bg = $barr;
	                                    $max_prior_bg_count = $bg_count_arr[0]['badge_cnt'];
	                                }
	                            }
	                        }
	                        $data['bg_arr'] = $db->query("select * from badge where id=".$max_prior_bg)->getResultArray();
	                    }
	                    $total_level ='';
	                    $level_name ='';
	                   $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id=1 and a.`supplier_id`=".$supplier_info['supplier_id']." order by assessment_id");
	                    //echo $db->getLastquery($query);
	                   $level = $query->getResultArray();
	                   $total_level = 0;
	                   $level_name ='';
	                   if(!empty($level)){
	                           $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='".$level[0]['assessment_id']."' ");
	                           //echo $db->getLastquery($query);
	                           $t = $query->getResultArray();
	                           if(!empty($t)) {
	                                //echo $t[0]['weight_percentage'];
	                               $total_level = (($level[0]['tot']/100)*$t[0]['weight_percentage']); 
	                           }
	                   }
	                   if($total_level>=0 && $total_level<=20){
	                        $level_name = "Dorment";
	                   }
	                   if($total_level>=21 && $total_level<=40){
	                        $level_name = "Active";
	                   }
	                   if($total_level>=41 && $total_level<=60){
	                        $level_name = "Positive";
	                   }
	                   if($total_level>=81 && $total_level<=100){
	                        $level_name = "Green";
	                   }
	                    $data['level'] = array("level_name"=>$level_name,"level_per"=>$total_level);;
	                    echo view('brand/base-assessment',$data);
	                }
	            public function signupstepp($plan_id,$supplier_id){
	                    if(isset($supplier_id) && $supplier_id!='') {
	                        $db = \Config\Database::connect();
	                        $data['supplier'] = array('supplier_id'=>$supplier_id,'plan_id'=>$plan_id);
	                        $query = $db->query('select * from industry where status=1 order by id asc');
	                        $data['industry'] = $query->getResultArray();
	                        $query = $db->query('select * from countries where status=1');
	                        $data['country'] = $query->getResultArray();
	                        // $data['country'] = $query->getResultArray();
	                        $data['plan_id'] = $this->request->getVar('plan_id');
	                       
	                        echo view('front/signuppstep',$data);
	                    }else{ 
	                         return redirect()->to('home/pricing');
	                    }
	                } 
	                
	                public function otp($plan_id,$supplier_id){
	                    $db = \Config\Database::connect();
	                    if(isset($supplier_id) && $supplier_id!='') {
	                        $data['plan_id'] = $plan_id;
	                        $query = $db->query("select * from supplier where  id='".$plan_id."' order by id asc");
	                        $supplier = $query->getFirstRow();
	                        $data['email'] = $supplier->email;
	                        $data['supplier_id'] = $supplier_id;
	                        echo view('front/otpverify',$data);
	                    }
	                    else
	                    { 
	                     return redirect()->to('home/pricing');
	                    }
	                } 
	                public function signupstep($supplier_id,$plan_id){
	                       // print_r($supplier_id);
	                    if(isset($supplier_id) && $supplier_id!='') {
	                      // print_r($supplier_id);
	                      // die();
	                        $db = \Config\Database::connect();
	                        $data['supplier'] = array('supplier_id'=>$supplier_id);
	                        $query = $db->query('select * from industry where status=1 order by id asc');
	                        $data['industry'] = $query->getResultArray();
	                        $query = $db->query('select * from countries where status=1');
	                        $data['country'] = $query->getResultArray();
	                        
	                        $data['industry_category'] = $db->query('select * from industry_category where status=1')->getResultArray();
	                        // $data['country'] = $query->getResultArray();
	                        $data['plan_id'] =$plan_id;
	                        echo view('front/signupstep',$data);
	                    }else{ 
	                    // die();
	                         return redirect()->to('home/pricing');
	                    }
	                } 
	                public function industry_category($id)
	                {
	                  $session = session();
	                     $db = \Config\Database::connect();
	                     $indi = new IndustryModel();
	                    $data = $indi->where('industry_category_id',$id)->findAll();
	                    return $this->response->setJSON($data);
	                }
	                public function country_state($id)
	                {
	                 $StateModel = new StateModel();
	                 $data = $StateModel->where('country_id',$id)->findAll();
	                 return $this->response->setJSON($data);
	                }
	                public function signupStepSubmit(){
	                     $session = session();
	                     $db = \Config\Database::connect();
	                     $model = new SupplierModel();
	                     $supplier_id = $this->request->getVar('plan_id');
	                     $brand_name = $this->request->getVar('brand_name');
	                     $industry_category = $this->request->getVar('industry_category');
	                     $state = $this->request->getVar('state');
	                     $industry_id = $this->request->getVar('industry_id');
	                     $country = $this->request->getVar('country');
	                     $register_address = $this->request->getVar('register_address');
	                     
	                     $plan_id = $this->request->getVar('supplier_id');
	            $insert= $db->query("update supplier set brand_name='".$brand_name."',industry_category_id='".$industry_category."',state_id='".$state."',industry_id='".$industry_id."',status='2',country_id='".$country."',address='".$register_address."' where id='".$supplier_id."' ");
	                    
	                     if($insert){
	                       $query = $db->query("select * from supplier where  id='".$supplier_id."' order by id asc"
	                   );
	                        $supplier = $query->getResultArray();
	                        $ses_data = ['supplier_id'=> $supplier[0]['id'],'supplier_name'=> $supplier[0]['supplier_name'],'brand_name'=> $supplier[0]['brand_name'],'industry_id'=>$supplier[0]['industry_id']];
	                        $session->set('supplier_info',$ses_data);
	                        // $session->setFlashdata('success','Data has been successfully saved');
	                        $session->setFlashdata('success','Your Account is created Please check your email.');
	         
	                         return redirect()->to('home/user_login');
	                        // return redirect()->to('supplier/subscribe/'.$supplier_id.'/'.$plan_id);
	                        //return redirect()->to('supplier/subscribe/'.$supplier_id);
	                     }else{
	                       $session->setFlashdata('error','Data Not Saved');
	                      return redirect()->to('supplier/signupstep/'.$supplier_id);
	                     }
	            }
	                public function subscribe($supplier_id,$plan_id){
	                    $session = session();
	                    $db = \Config\Database::connect();
	                    $pla =  base64_decode($plan_id);
	                    $q = $db->query("update supplier set supplier_plan_id='".$pla."' where id='".$supplier_id."' ");
	                    $q = $db->query("select * from supplier where id='".$supplier_id."' ");
	                    $u = $q->getResultArray();
	                    $data['supplier'] = $u;
	                    echo view('front/subscribe',$data);
	                }
	                public function stripe_payment($supplier_id){
	                    $session = session();
	                    $db = \Config\Database::connect();
	                    $q = $db->query("select * from supplier where id='".$supplier_id."' ");
	                    $u = $q->getResultArray();
	                    $q = $db->query("select * from supplier_plan where id='".$u[0]['supplier_plan_id']."' and status=1 ");
	                    $p = $q->getResultArray();
	                    
	                    $gst=($p[0]['plan_price']*18)/100;
	                    $pricegst=$p[0]['plan_price']+$gst;
	                    $data = "success_url=https://user.positiivplus.io/supplier/subscription/".$supplier_id."&cancel_url=https://user.positiivplus.io/supplier/subscriptioncancel/".$supplier_id."&payment_method_types[0]=card&line_items[0][quantity]=1&line_items[0][price_data][unit_amount]=".($pricegst*100)."&line_items[0][price_data][product]=".$p[0]['stripe_product_id']."&line_items[0][price_data][currency]=INR&line_items[0][price_data][recurring][interval]=".$p[0]['plan_validity']."&line_items[0][price_data][recurring][interval_count]=".$p[0]['plan_validity_time']."&mode=subscription&billing_address_collection=required";
	                    $url = "https://api.stripe.com/v1/checkout/sessions";
	                    $curl = curl_init($url);
	                    curl_setopt($curl, CURLOPT_URL, $url);
	                    curl_setopt($curl, CURLOPT_POST, true);
	                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	                    $headers = array(
	                    "Content-Type: application/x-www-form-urlencoded",
	                    'Authorization: Bearer '.stripe_secret_key
	                    );
	                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	             $data = "success_url=https://user.positiivplus.io/supplier/subscription/".$supplier_id."&cancel_url=https://user.positiivplus.io/supplier/subscriptioncancel/".$supplier_id."&payment_method_types[0]=card&line_items[0][quantity]=1&line_items[0][price_data][unit_amount]=".($pricegst*100)."&line_items[0][price_data][product]=".$p[0]['stripe_product_id']."&line_items[0][price_data][currency]=INR&line_items[0][price_data][recurring][interval]=".$p[0]['plan_validity']."&line_items[0][price_data][recurring][interval_count]=".$p[0]['plan_validity_time']."&mode=subscription&billing_address_collection=required";
	                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	                    //for debug only!
	                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	                    $resp = curl_exec($curl);
	                    curl_close($curl);
	                    $checkout_session = json_decode($resp);
	                    $q = $db->query("update supplier set stripe_token='".$checkout_session->id."' where id='".$supplier_id."' and status=2 ");
	                    echo json_encode(['id' => $checkout_session->id]);
	                }
	                
	                
	                public function subscription($supplier_id){
	                    $session = session();
	                    $db = \Config\Database::connect();
	                    $q = $db->query("select stripe_token from supplier where id='".$supplier_id."' "); 
	                    $u = $q->getResultArray();
	                    $url = "https://api.stripe.com/v1/checkout/sessions/".$u[0]['stripe_token'];
	                    $curl = curl_init($url);
	                    curl_setopt($curl, CURLOPT_URL, $url);
	                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	                    $headers = array(
	                       "Content-Type: application/x-www-form-urlencoded",
	                       'Authorization: Bearer '.stripe_secret_key
	                    );
	                    //for debug only!
	                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	                    $resp = curl_exec($curl);
	                    $stripe = json_decode($resp);
	                    curl_close($curl);
	                     $q = $db->query("update supplier set stripe_subscription_id='".$stripe->subscription."',status=1,subscription_datetime='".date('Y-m-d H:i:s')."' where id='".$supplier_id."'"); 
	                    return redirect()->to('supplier/subscriptionsuccess/'.$supplier_id);
	                }
	                public function subscriptionsuccess($supplier_id){
	                    $session = session();
	                    $db = \Config\Database::connect();
	                    $q = $db->query("select * from supplier where id='".$supplier_id."' ");
	                    $data['supplier'] = $q->getResultArray();
	                    echo view('front/subscription',$data);
	                }
	                public function subscriptioncancel($supplier_id){
	                    $session = session();
	                    $db = \Config\Database::connect();
	                    $q = $db->query("select * from supplier where id='".$supplier_id."' ");
	                    $data['supplier'] = $q->getResultArray();
	                    echo view('front/subscriptioncancel',$data);
	                }
	                public function submitBaseAssessmentQuestion($assessment_id,$qid,$answer,$remark,$indicator,$choice,$answer_insert_id){
	                   if($remark=='0'){$remark='';}
	                   $db = \Config\Database::connect();
	                   $session = session();
	                   $supplier_info = $session->get('supplier_info');
	                   if($choice=='Multi'){
	                        if($answer!=''){
	                            $query = $db->query("delete from supplier_base_assessment where status=1 and base_assessment_question_id='".$qid."' and supplier_id='".$supplier_info['supplier_id']."' and supplier_assessment_id='".$assessment_id."'  order by id asc");
	                            $answer = explode(",",$answer);
	                            foreach($answer as $a){
	                               $query = $db->query("select * from base_assessment_answer where status=1 and id='".$a."' order by id asc");
	                               $marks = $query->getResultArray();
	                              $query = $db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$a."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");      
	                               $answer_insert_id = $db->insertID();
	                            }
	                        }
	                   }else{
	                        $query = $db->query("select * from base_assessment_answer where status=1 and id='".$answer."' order by id asc");
	                        $marks = $query->getResultArray();
	                        if($answer_insert_id=='0'){
	                            $query =$db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$answer."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");      
	                            $answer_insert_id = $db->insertID();
	                        }else{
	                            $query =$db->query("update supplier_base_assessment set base_assessment_answer_id='".$answer."',mark='".$marks[0]['marks']."',remark='".$remark."',updated_at='".date('Y-m-d H:i:s')."' where id='".$answer_insert_id."' ");   
	                        }
	                   }
	                   $query = $db->query("select count('id') tot from base_assessment_question where status=1 and indicator_id='".$indicator."' and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id asc");
	                   $a = $query->getResultArray();
	                   $AllQuestions = $a[0]['tot'];
	                   $query = $db->query("select count(distinct(s.base_assessment_question_id)) as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$indicator."'  and s.supplier_id='".$supplier_info['supplier_id']."' and (industry_id='".$supplier_info['industry_id']."' or industry_id=0)  ");
	                    $b = $query->getResultArray();
	                   $query = $db->query("select count(distinct(s.base_assessment_question_id)) as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where s.supplier_id='".$supplier_info['supplier_id']."' and (industry_id='".$supplier_info['industry_id']."' or industry_id=0)  ");
	                    $t = $query->getResultArray();
	                    echo json_encode(array("status"=>1,'tot_q'=>$AllQuestions,'tot_ans'=>$b[0]['tot'],'insert_id'=>$answer_insert_id,"total_q"=>$t[0]['tot']));
	                }
	              function submitAssessment(){
	                $db = \Config\Database::connect();
	                $session = session();
	                $supplier_info = $session->get('supplier_info');
	                $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.industry_id='".$supplier_info['industry_id']."' group by b.indicator_id order by s.id" );
	                $indicator = $query->getResultArray();
	                $total_question=0;
	                $total_attempt = 0;
	                if(!empty($indicator)) {
	                    foreach($indicator as $i) {
	                        $query = $db->query("select count(id) as cnt from base_assessment_question where indicator_id='".$i['id']."' and status=1 and industry_id='".$supplier_info['industry_id']."' order by id ");
	                        $question = $query->getResultArray();
	                        if($question) {
	                            $total_question = $total_question+$question[0]['cnt'];          
	                        }
	                        $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$i['id']."' and b.industry_id='".$supplier_info['industry_id']."' and s.supplier_id='".$supplier_info['supplier_id']."' ");
	                        $question_attempt = $query->getResultArray();
	                        $total_attempt = $total_attempt+$question_attempt[0]['tot'];
	                    }
	                }
	                if($total_attempt == $total_question) {
	                $assessment_id = $this->request->getVar('supplier_assessment_id');      
	                $from = $this->request->getVar('from');      
	                $to = $this->request->getVar('to');      
	                   $query = $db->query("SELECT count(b.id) as tot FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.industry_id='".$supplier_info['industry_id']."'");
	                   $r = $query->getResultArray();
	                   $totalQuestionAnswered = $r[0]['tot'];
	                   $query = $db->query("SELECT * FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1  group by base_assessment_question_id ");
	                   $b = $query->getResultArray();
	                    $total_answer = count($b);
	                   if(!empty($b)){echo $b = count($b);}else{$b=0;}
	                   $percent = ($totalQuestionAnswered/$b)*100;
	                   $query = $db->query("SELECT SUM(mark) as tot FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1 ");
	                   $m = $query->getResultArray();
	                   $marks = $m[0]['tot'];
	                   $u = $db->query("update supplier_assessment set total_question='".$totalQuestionAnswered."',total_answer='".$total_answer."',assessment_per='".$percent."',is_submit=1,submit_datetime='".date('Y-m-d H:i:s')."',date_from='".$from."',date_to='".$to."' where id='".$assessment_id."' ");
	                    $session->setFlashdata('success','Assessment has been successfully submitted');
	                }
	                else {
	                    $session->setFlashdata('error', $total_attempt. " Out Of ".$total_question." Question Completed, Need to complete remaining question for submit");
	                }
	                    return redirect()->to('supplier/baseAssessment');
	                }
	                public function undoBaseAssessment($assessment_id){
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $u = $db->query("update supplier_assessment set is_submit=0,updated_at='".date('Y-m-d H:i:s')."' where id='".$assessment_id."' ");
	                    $session->set('success','Assessment has been successfully und0');
	                    return redirect()->to('supplier/baseAssessment');
	                }
	                public function document(){
	                    $supplier_doc=array();
	                    $db = \Config\Database::connect();
	                    $session = session();
	                     $data['pg_nm'] = 'Policies';
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
	                    $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
	                    $assessment_model = new Assessment(); 
	                    $data['assessment'] = $assessment_model->where('status',1)->findAll();
	                    $indicator_model = new IndicatorModel();
	                    $data['indicator_name'] = $indicator_model->where('status',1)->findAll();
	                    // print_r($data['indicator_name']);
	                    // die();
	                    $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and (b.industry_id='".$supplier_info['industry_id']."' or b.industry_id=0) group by b.indicator_id order by s.id" );
	                    $data['indicator'] = $query->getResultArray();
	                    // $data['indicator'] = $indicator_model->where('status',1)->findAll();
	                    $supplier_info = $session->get('supplier_info');
	                    $query = $db->query("select * from document_type where status=1 order by id asc");
	                    $data['document'] = $query->getResultArray();
	                    
	                     $ava = $db->query("select * from document_sub_type where  status=1");
	                     $data['document_sub_type']= $ava->getResultArray();
	                    $query = $db->query("select * from supplier_document where supplier_id='".$supplier_info['supplier_id']."' and status=1 order by id asc");
	                    $doc = $query->getResultArray();
	                    // print_r($doc);
	                    // die();
	                    if(!empty($doc)){
	                        foreach($doc as $r){
	                            $query = $db->query("select * from document_type where id='".$r['document_type_id']."'");
	                            $type = $query->getResultArray();
	                            $query = $db->query("select count(id) as cnt from document_connection where document_id=".$r['id']);
	                            $document_connect_count=$query->getRow();
	                            $supplier_doc[]=array('id'=>$r['id'],'owneremail'=>$r['owneremail'],'owner_id'=>$r['supplier_id'],'Qual_quan_id'=>$r['Qualitative_quantitative_id'],'titleu'=>$r['title'],'ownername'=>$r['ownername'],'add'=>$r['documentadd'],'indicator'=>$r['indicator_id'],'ownerimg'=>$r['ownerimg'],'document_name'=>$r['document_name'],'approved_on'=>$r['approved_on'],'document_type'=>$type[0]['document_type_name'],'file_size'=>$r['file_size'],'image'=>$r['image'],'document_type_id'=>$r['document_type_id'],'date'=>$r['date'],'doc_connect_count' => $document_connect_count->cnt);
	                        }
	                    }
	                    $data['supplier_doc'] = $supplier_doc;
	                    // print_r($data['supplier_doc']);
	                    // die();
	                // print_r($data);
	                    echo view('brand/document',$data);
	                }

					
	                public function addDocument(){
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $model = new DocumentModel();
	                    $type_id = $this->request->getVar('document_type_id');
	                    $doc_name = $this->request->getVar('company_name');
	                    $file = $this->request->getFile('file');
	                    $supplier_info = $session->get('supplier_info');
	                    
	                    $action_id = $this->request->getVar('action_id');
	                    
	                    $description = $this->request->getVar('description');
	                    
	                    // print_r( $this->request->getVar());
	                    // // print_r($description);
	                    // die();
	                    $document_sub_type_id = $this->request->getVar('document_sub_type_id');
	                    
	                    if($action_id=='2'){
	                        $newName="";
	                        $file_size=0;
	                        if($model->insert(['supplier_id'=>$supplier_info['supplier_id'],'documentadd'=>'1','document_sub_type_id'=>$document_sub_type_id,'image'=>$newName,'action_id'=>$action_id,'details'=>$description,'status'=>1,'document_type_id'=>$type_id,'document_name'=>$doc_name,'file_size'=>$file_size,'date'=>date('Y-m-d')])){
	                                    $session->setFlashdata('success','Document has been successfully upload');
	                                }else{
	                                    $session->setFlashdata('error','Document not upload');
	                                }
	                    
	                        
	                    }
	                    if($action_id=='1'){
	                 
	                     if($file->isValid()){
	                    $ext = $file->getClientExtension();
	                    $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");
	                        if(in_array($ext,$ava_ext)){
	                            $newName = $file->getRandomName();
	                            $file_size = $file->getSizeByUnit('mb'); 
	                            if($file->move('public/uploads/supplier_document',$newName)){
	                                if($model->insert(['supplier_id'=>$supplier_info['supplier_id'],'action_id'=>$action_id,'documentadd'=>'1','image'=>$newName,'status'=>1,'document_type_id'=>$type_id,'document_name'=>$doc_name,'file_size'=>$file_size,'date'=>date('Y-m-d')])){
	                                    $session->setFlashdata('success','Document has been successfully upload');
	                                }else{
	                                    $session->setFlashdata('error','Document not upload');
	                                }
	                            }else{
	                                $session->setFlashdata('error','Please select a valid file like pdf,image');
	                            }
	            }else{
	                            $session->setFlashdata('error','Please select a valid file like pdf,image');
	                        }
	                    }else{
	                            $session->setFlashdata('error','Please select a valid file like pdf,image');
	                    }
	            }
	                    return redirect()->to('supplier/document');
	                }
	                public function editDocument(){
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $model = new DocumentModel();
	                    $type_id = $this->request->getVar('document_type_id');
	                    $doc_name = $this->request->getVar('doc_name');
	                    $id = $this->request->getVar('id');
	                    $file = $this->request->getFile('file');
	                    $supplier_info = $session->get('supplier_info');
	                    if($file->isValid()){
	                    $ext = $file->getClientExtension();
	                    $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");
	                        if(in_array($ext,$ava_ext)){
	                            $newName = $file->getRandomName();
	                            $file_size = $file->getSizeByUnit('mb'); 
	                            $file->move('public/uploads/supplier_document',$newName);
	                            $array = ['supplier_id'=>$supplier_info['supplier_id'],'image'=>$newName,'document_type_id'=>$type_id,'document_name'=>$doc_name,'file_size'=>$file_size];
	                        }else{
	                            $session->setFlashdata('error','Please select a valid file like pdf,image');
	                        }
	                    }else{
	                        $array = ['supplier_id'=>$supplier_info['supplier_id'],'document_type_id'=>$type_id,'document_name'=>$doc_name];
	                    }
	                    $u = $model->where(['id' => $id])->set($array)->update();
	                    if($u){
	                        $session->setFlashdata('success','Document has been successfully deleted');
	                    }else{
	                        $session->setFlashdata('error','Document not delete');
	                    }
	                    return redirect()->to('supplier/document');
	                }
	                public function deleteDocument($id){
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $model = new DocumentModel();
	                    $u = $model->where(['id' => $id])->set(['status'=>0])->update();
	                    if($u){
	                        $session->setFlashdata('success','Document has been successfully deleted');
	                    }else{
	                        $session->setFlashdata('error','Document not delete');
	                    }
	                    return redirect()->to('supplier/document');
	                }
	                
	                public function getGhgAjax($ghg_id,$id){
	                    $session = Session();
	                    $supplier_info = $session->get('supplier_info');
	                    $db = \Config\Database::connect();
	                    
	                    $baq_id="";
	                    $data="";
	                    $ans_detail="";
	                    if($ghg_id==29){
	                    $supplier_assessment = $db->query("
	                    
	                    
	                    
	                    SELECT gas.id, gas.estimate AS estimate, gas.quantity, gas.unit,gas.document_connect, f.factor_name, csc.sub_category FROM `ghg_assessment` AS gas JOIN Consumption_Sub_Category AS csc ON csc.id = gas.consumption_sub_id JOIN factor as f ON f.id=csc.factor_id WHERE gas.supplier_id = ".$supplier_info['supplier_id']." AND gas.supplier_assessment_id = ".$id." AND gas.ghg_id =".$ghg_id)->getResultArray();
	                    foreach($supplier_assessment as $a) {
	            $doc_connect_check = $a['document_connect']==1?'checked=checked':'';
	            $data.='        <div class="card-header header-elements-inline" id="colorId0">
		                  
		                  <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-0" aria-expanded="false"><span></span><h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">'.$a['factor_name'].' </h6>&nbsp;'.$a['estimate'].'Co2e &nbsp;, for '.$a['quantity'].' <small>'.$a['unit'].'</small></a>
		                  <span class="one">
			                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
		                  </span>
		                  <span class="two">
			                        <input type="checkbox" name="question[]" value="'.$a['id'].'" '.$doc_connect_check.'>
		                  </span>
	            </div>   ';     
	                            }
	                           
	                    
	                }elseif($ghg_id==23){
	                    $supplier_assessment = $db->query("
	                    
	                    
	                    SELECT smp.id, smp.process_name, smp.estimate AS estimate, smp.qty, smp.electricity_consumption_unit As unit, smp.document_connect FROM `supplier_manufacturing_process` AS smp WHERE smp.status=1 And
	            smp.supplier_id = ".$supplier_info['supplier_id']." AND smp.supplier_assessment_id = ".$id." AND smp.ghg_id =".$ghg_id)->getResultArray();
	                    
	                    
	                    // echo $db->getlastquery($supplier_assessment);
	                    // die();
	                    
	                    
	                    foreach($supplier_assessment as $a) {
	            $doc_connect_check = $a['document_connect']==1?'checked=checked':'';
	            $data.='        <div class="card-header header-elements-inline" id="colorId0">
		                  
		                  <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-0" aria-expanded="false"><span></span><h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">'.$a['process_name'].' </h6>&nbsp;'.$a['estimate'].'Co2e &nbsp;, for '.$a['qty'].' <small>'.$a['unit'].'</small></a>
		                  <span class="one">
			                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
		                  </span>
		                  <span class="two">
			                        <input type="checkbox" name="question[]" value="'.$a['id'].'" '.$doc_connect_check.'>
		                  </span>
	            </div>   ';     
	                            }
	                           
	                    
	                }else{
	                    
	                    $supplier_assessment = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  WHERE gas.supplier_id = ".$supplier_info['supplier_id']." AND gas.supplier_assessment_id = ".$id." AND gas.ghg_id =".$ghg_id)->getResultArray();
	                    foreach($supplier_assessment as $a) {
	             $doc_connect_check = $a['document_connect']==1?'checked=checked':'';
	            $data.='        <div class="card-header header-elements-inline" id="colorId0">
		                  
		                  <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-0" aria-expanded="false"><span></span><h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">'.$a['factor_name'].' </h6>&nbsp;'.$a['estimate'].'Co2e &nbsp;, for '.$a['quantity'].' <small>'.$a['unit'].'</small></a>
		                  <span class="one">
			                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
		                  </span>
		                  <span class="two">
			                        <input type="checkbox" name="question[]" value="'.$a['id'].'" '.$doc_connect_check.'>
		                  </span>
	            </div>   ';     
	                            }
	                    
	                }
	                    
	                   echo $data;  
	                }
	                public function getQuestionByIndicatorAjax($indicator_id,$assessment_id) {
	                    $session = Session();
	                    $supplier_info = $session->get('supplier_info');
	                    $db = \Config\Database::connect();
	                    $baq_id="";
	                    $data="";
	                    $supplier_assessment = $db->query("select id from supplier_assessment where assessment_id=".$assessment_id." and supplier_id=".$supplier_info['supplier_id']." and is_submit=1 and is_verify=0")->getRow();
	                    if($supplier_assessment) {
	                    if($assessment_id==1) {        
	                    $rs= $db->query("select s.*,b.question,b.question_title,b.choice from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$indicator_id."' and s.supplier_assessment_id='".$supplier_assessment->id."' and b.is_document_needed=1")->getResultArray();
	                    foreach($rs as $key=>$r) {
	                        $doc_connect_check = $r['document_connect']==1?'checked=checked':'';
	                        $ans = $db->query("select id,answer from base_assessment_answer where base_assessment_question_id=".$r['base_assessment_question_id'])->getResultArray();
	                        $ans_detail = "";
	                        if($ans) {
	                         if($r['choice']=='Single'){
	                            foreach($ans as $a) {
	                            $check_status = $a['id']==$r['base_assessment_answer_id']?'checked=checked':'';
	                            $ans_detail.='<label class="radio radio-primary">';
		                                $ans_detail.='<input type="radio" value="'.$a['id'].'" '.$check_status.' disabled="disabled"> <span style="color:black">'.$a['answer'].'</span><span class="checkmark"></span>';
	                            $ans_detail.='</label>';
	                            }
	                        }
	                        if($r['choice']=='Multi'){
	                            foreach($ans as $a) {
	                            $check_status = $a['id']==$r['base_assessment_answer_id']?'checked=checked':'';
	                            $ans_detail.='<label class="radio radio-primary">';
		                                $ans_detail.='<input type="checkbox" value="'.$a['id'].'" '.$check_status.' disabled="disabled"><span style="color:black;">'.$a['answer'].'</span><span class="checkmark" style="border-radius: 1px;"></span>';
	                            $ans_detail.='</label>';
	                            }
	                        }
	                        }
	                                                            $data.='<div class="card">
		                                                                    <div class="card-header header-elements-inline" id="colorId'.$key.'">
			                                                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0"><a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-'.$key.'" aria-expanded="false"><span></span>'.$r['question_title'].'</a></h6>
			                                                                            <span class="one">
				                                                                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
			                                                                            </span>
			                                                                            <span class="two">
				                                                                                        <input type="checkbox" name="question[]" value="'.$r['base_assessment_question_id'].'" '.$doc_connect_check.'/>
			                                                                            </span>
		                                                                    </div>
		                                                                    <div class="collapse" id="accordion-item-icons-'.$key.'" data-parent="#accordionRightIcon" style="">
			                                                                            <div class="card-body">
				                                                                                        '.$r['question'].'
				                                                                                            <div class="">
					                                                                                                        '.$ans_detail.'
				                                                                                            </div>
				                                                                                            <textarea class="custom_area" placeholder="Your comment..." readonly>'.$r['remark'].'</textarea>
			                                                                            </div>
		                                                                    </div>
	                                                            </div>';            
	                    }
	                    }
	                    else {
	                    // $rs= $db->query("select s.*,b.question from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$indicator_id."' and s.supplier_assessment_id='".$supplier_assessment->id."' and b.is_document_needed=1")->getResultArray();
	                    $rs= $db->query("select s.*,b.question,b.question_title,b.choice from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where b.sdg_id='".$indicator_id."' and s.supplier_assessment_id='".$supplier_assessment->id."' and b.is_document_needed=1")->getResultArray();
	                    foreach($rs as $key=>$r) {
	                        // $doc_connect_check = $r['document_connect']==1?'checked=checked':'';
	                        // $ans = $db->query("select answer from sdg_assessment_answer where id=".$r['base_assessment_answer_id'])->getRow();
	                        // $ans_detail = "";
	                        //  if($ans->choice=='Single'){
	                        //     $ans_detail='<input type="radio" value="'.$ans->answer_id.'"> <span>'.$ans->answer.'</span><span class="checkmark"></span>';
	                        // }
	                        // if($ans->choice=='Multi'){
	                        //     $ans_detail='<input type="checkbox" value="'.$ans->answer_id.'"><span>'.$ans->answer.'</span><span class="checkmark" style="border-radius: 1px;"></span>';
	                        // }
	                        $doc_connect_check = $r['document_connect']==1?'checked=checked':'';
	                        $ans = $db->query("select id,answer from sdg_assessment_answer where sdg_assessment_question_id=".$r['base_assessment_question_id'])->getResultArray();
	                        $ans_detail = "";
	                        if($ans) {

	                         if($r['choice']=='Single'){
	                            foreach($ans as $a) {
	                            $check_status = $a['id']==$r['base_assessment_answer_id']?'checked=checked':'';
	                            $ans_detail.='<label class="radio radio-primary">';
		                                $ans_detail.='<input type="radio" value="'.$a['id'].'" '.$check_status.' disabled="disabled"> <span style="color:black">'.$a['answer'].'</span><span class="checkmark"></span>';
	                            $ans_detail.='</label>';
	                            }
	                        }


	                        if($r['choice']=='Multi'){
	                            foreach($ans as $a) {
	                            $check_status = $a['id']==$r['base_assessment_answer_id']?'checked=checked':'';
	                            $ans_detail.='<label class="radio radio-primary">';
		                                $ans_detail.='<input type="checkbox" value="'.$a['id'].'" '.$check_status.' disabled="disabled"><span style="color:black;">'.$a['answer'].'</span><span class="checkmark" style="border-radius: 1px;"></span>';
	                            $ans_detail.='</label>';
	                            }
	                        }

	                        }
	                                                            $data.='<div class="card">
		                                                                    <div class="card-header header-elements-inline" id="colorId'.$key.'">
			                                                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0"><a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-'.$key.'" aria-expanded="false"><span></span>'.$r['question_title'].'</a></h6>
			                                                                            <span class="one">
				                                                                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
			                                                                            </span>
			                                                                            <span class="two">
				                                                                                        <input type="checkbox" name="question[]" value="'.$r['base_assessment_question_id'].'" '.$doc_connect_check.'/>
			                                                                            </span>
		                                                                    </div>
		                                                                    <div class="collapse" id="accordion-item-icons-'.$key.'" data-parent="#accordionRightIcon" style="">
			                                                                            <div class="card-body">
				                                                                                        '.$r['question'].'
				                                                                                            <div class="">
					                                                                                                        '.$ans_detail.'
				                                                                                            </div>
				                                                                                            <textarea class="custom_area" placeholder="Your comment..." readonly>'.$r['remark'].'</textarea>
			                                                                            </div>
		                                                                    </div>
	                                                            </div>';            
	                    }
	                    }
	                }
	                    return $data;
	                }
	                public function updatePersonalInfostep1(){
	                    
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $turnover = $this->request->getVar("turnover"); 
	                    $supplier_info = $session->get('supplier_info');
	                    $insert= $db->query("update supplier set turnover='".$turnover."' where id='".$supplier_info['supplier_id']." '");
	                    
	                     if(!$insert){
	                         echo "contact developer";
	                         die();
	                }
	                return redirect()->to('supplier/quickStart');
	                } 
	               
	                public function updatePersonalInfostep2(){
	                    
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $vision= $this->request->getVar("vision"); 
	                    $mission = $this->request->getVar("mission"); 
	                    $ownership = $this->request->getVar("ownership"); 
	                    $supplier_info = $session->get('supplier_info');
	                    $insert= $db->query("update supplier set ownership='".$ownership."', mission='".$mission."', vision='".$vision."' where id='".$supplier_info['supplier_id']." '");
	                    
	                     if(!$insert){
	                         echo "contact developer";
	                         die();
	                }
	                return redirect()->to('supplier/quickStart');
	                } 
	                
	                public function updatePersonalInfostep3(){
	                    
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $socials= $this->request->getVar("socials"); 
	                   
	                    $supplier_info = $session->get('supplier_info');
	                    $insert= $db->query("update supplier set socials='".$socials."'where id='".$supplier_info['supplier_id']." '");
	                     
	                     if(!$insert){
	                         echo "contact developer";
	                         die();
	                }
	                return redirect()->to('supplier/quickStart');
	                }
	                
	                public function updateselfDocApproval(){
	                    
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $doc_id= $this->request->getVar("doc_id"); 
	                   
	                    $supplier_info = $session->get('supplier_info');
	                    
	                    $supplier_details = $db->query("select  s.id,s.email,s.image from supplier as s where s.id=".$supplier_info['supplier_id']." ")->getResultArray();
                         $image  = $supplier_details[0]['image'];

                        // print_r($image);
                        // die();
	                  
	                    $approved_on=date(" jS  F Y");
	                 
	                
	                    $insert= $db->query("update supplier_document set approved_on='".$approved_on."' , ownername='".$supplier_info['supplier_name']."' ,ownerimg='".$image."', owneremail='".$supplier_details[0]['email']."' , self_approved=1 where id='".$doc_id."'and supplier_id='".$supplier_info['supplier_id']." '");
	                    
	                     if(!$insert){
	                         echo "contact developer";
	                         die();
	                }
	                return redirect()->to('supplier/document');
	                }
	                
	                
	                
	                
	                public function documentConnectSubmit() {
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $supplier_info = $session->get('supplier_info');
	                    $document_id = $this->request->getVar("document_id");
	                    $assessment_id = $this->request->getVar("assessment_id");
	            $indicator_id="";
	                    $indicator_id = $this->request->getVar("indicator_id"); 
	                    
	                    $question = $this->request->getVar("question");
	                    $TYPE="0";
	                    $TYPE = $this->request->getVar("TYPE");   //ghg
	            $supplier_assessment = $db->query("select id from supplier_assessment where assessment_id=".$assessment_id." and supplier_id=".$supplier_info['supplier_id']." and is_submit=1 and is_verify=0")->getRow();
	            // echo $db->getlastquery($supplier_assessment);
	            // die();
	                    if($supplier_assessment) {
	                        if($question) {
	                            foreach($question as $ques) {
	                                $query = $db->query("select * from document_connection where assessment_id=".$assessment_id." and supplier_assessment_id=".$supplier_assessment->id." and supplier_id=".$supplier_info['supplier_id']." and question_id=".$ques);
	                                $ava = $query->getResultArray();
	                                if(empty($ava)) {
	                                        $connection_id = $db->query("insert into document_connection(assessment_id,supplier_assessment_id,supplier_id,question_id,ghg_id,document_id,indicator_id,status) values($assessment_id,$supplier_assessment->id,'".$supplier_info['supplier_id']."',$ques,'.$TYPE.',$document_id,'.$indicator_id.',1)");
	                                    if($connection_id) {
	            if(($assessment_id==10 || $assessment_id==11) and  $TYPE!=23){
	                
	                 $db->query("update ghg_assessment set document_connect=1 where ghg_id!='23' and supplier_id=".$supplier_info['supplier_id']." and id=".$ques);
	               
	             
	                        
	                }elseif(($assessment_id==10 || $assessment_id==11) && $TYPE==23){
	                    
	             $db->query("update supplier_manufacturing_process set document_connect=1 where supplier_id=".$supplier_info['supplier_id']." and id=".$ques);
	                    
	                    }else{
	                $db->query("update supplier_base_assessment set document_connect=1 where supplier_id=".$supplier_info['supplier_id']." and base_assessment_question_id=".$ques);
	             
	            }
	               
	               
	                                        
	                                    }
	                                }
	                            }
	                        }
	                    }
	                    return redirect()->to('supplier/document');
	                }

	                public function verifyBaseAssessment() {
	                    $db = \Config\Database::connect();
	                    $session = Session();
	                    $supplier_info = $session->get('supplier_info');
	                    $msg = "";
	                    if($supplier_info['supplier_id']) {
	                        // $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=1 and supplier_id=".$supplier_info['supplier_id']);
	                        $supplier_assessment = $db->query("select * from supplier_assessment where assessment_id=1 and supplier_id=".$supplier_info['supplier_id'])->getRow();
	                        // $supplier_base_assessment = $db->query("select count(*) as cnt from supplier_base_assessment where supplier_assessment_id=".$supplier_assessment->id." and need_document=1")->getRow();
	                        $supplier_base_assessment = $db->query("select sba.base_assessment_question_id,baq.id as qid from supplier_base_assessment as sba join base_assessment_question as baq on sba.base_assessment_question_id=baq.id where sba.supplier_assessment_id=".$supplier_assessment->id." and baq.is_document_needed=1")->getResultArray();
	                        $connected_document = $db->query("select count(*) as doc_cnt from document_connection where supplier_assessment_id=".$supplier_assessment->id)->getRow();
	                        if($supplier_base_assessment) {
	                            $msg = $connected_document->doc_cnt." out of ".count($supplier_base_assessment)." document connected,need to connect remaining documents";
	                        }
	                        if($connected_document->doc_cnt==count($supplier_base_assessment)) {
	                            $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=1 and supplier_id=".$supplier_info['supplier_id']);
	                            return "";                   
	                        }
	                    }
	                    // $session->setFlashdata('success',$msg);
	                        return $msg;
	                }
	                public function checkQuestionCompletion() {
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $assessment_id=0;
	                    $query = $db->query("select id from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=1" );
	                    $s_assess = $query->getResultArray();
	                    if($s_assess) {
	                        $assessment_id = $s_assess[0]['id'];
	                    }
	                    $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and (b.industry_id='".$supplier_info['industry_id']."' or b.industry_id=0) group by b.indicator_id order by s.id" );
	                    $indicator = $query->getResultArray();
	                    $total_question=0;
	                    $total_attempt = 0;
	                    if(!empty($indicator)) {
	                        foreach($indicator as $i) {
	                            $query = $db->query("select count(id) as cnt from base_assessment_question where indicator_id='".$i['id']."' and status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id ");
	                            $question = $query->getResultArray();
	                            if($question) {
	                                $total_question = $total_question+$question[0]['cnt'];          
	                            }
	                            $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$i['id']."'  and s.supplier_id='".$supplier_info['supplier_id']."' and s.supplier_assessment_id=".$assessment_id);
	                            $question_attempt = $query->getResultArray();
	                            $total_attempt = $total_attempt+$question_attempt[0]['tot'];
	                        }
	                    }
	                    echo json_encode(array("total_question" => $total_question, "total_attempt" => $total_attempt));
	                }
	                public function getIndicatorByAssessment($assessment_id) {
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $data='<option value="0">Select Indicator</option>';
	                    if($assessment_id==1) {
	                        $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.is_document_needed=1 and (b.industry_id='".$supplier_info['industry_id']."' or b.industry_id=0) group by b.indicator_id order by s.id" );
	                        $indicator = $query->getResultArray();
	                        // echo $db->getLastquery($indicator);
	                        if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['indicator_name'].'</option>';
	                            }
	                        }
	                    }
	                    if($assessment_id==2) {
	                        $query = $db->query("select s.sdg_id,b.indicator_id,indi.id,indi.sdg_name,indi.image from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id join sdg_assessment_question as saq on saq.sdg_id=s.sdg_id join sdg as indi on indi.id=s.sdg_id where (s.industry_id='".$supplier_info['industry_id']."' or s.industry_id=0) and saq.is_document_needed=1 and (saq.industry_id=0 or saq.industry_id='".$supplier_info['industry_id']."') group by sdg_id");
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['sdg_name'].'</option>';
	                            }
	                        }
	                    }
	                    if($assessment_id==10) {
	                       
	             $query = $db->query("select g.id,g.footprint_id,g.ghg_name from ghg as g where g.status=1 and g.footprint_id=1 group by g.id");
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['ghg_name'].'</option>';
	                            }
	                        }
	                    }
	                    if($assessment_id==11) {
	                        $query = $db->query("select g.id,g.footprint_id,g.ghg_name from ghg as g where g.status=1 and g.footprint_id=2 group by g.id");
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['ghg_name'].'</option>';
	                            }
	                        }
	                    }
	                    if($assessment_id==12) {
	                        $query = $db->query("select g.id,g.footprint_id,g.ghg_name from ghg as g where g.status=1 and g.footprint_id=5 group by g.id");
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['ghg_name'].'</option>';
	                            }
	                        }
	                    }
	                    echo $data;
	                }
	                
	                
	                 public function getpolicydata($id) {
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    
	                    $ava = $db->query("select * from document_sub_type where id='".$id."' and  status=1")->getResultArray();
	             
	                            if($ava) {  
	                    
	                                    foreach($ava as $indi) {
	                    
	                                        $data=''.$indi['details'].'';
	                    
	                                    }
	                    
	                                }
	                    echo $data;
	                }
					public function document_connect($title,$id,$indi,$qual_quan,$indicator_id)
					{
						$db = \Config\Database::connect();
	                    $session = session();
						$supplier_info = $session->get('supplier_info');
						if(session()->supplier_info['role'] == 0)
						{
						$o_id = session()->supplier_info['supplier_id'];
						$u_id = session()->supplier_info['supplier_id'];
						}
						else
						{
						$u_id = session()->supplier_info['supplier_id'];
						$o_id = $find['owner_id'];
						}
						// print_r($qual_quan);
         if($qual_quan == '53'){
		  $query = $db->query("SELECT * FROM `control_assessment` WHERE owner_id = $o_id and id = $indicator_id")->getResultArray();
		//   print_r($query);
		//   die;
		  $indi = $query[0]['uniq_spl'];
		 }

					
						$db = \Config\Database::connect();
	                    $session = session();
	                    $model = new DocumentModel();
						$data = ['documentadd'=>0,
						        'title'=>$title,
								'indicator_id'=>$indi,
								'Qualitative_quantitative_id'=>$qual_quan,
							];
					$done =	$model->update($id,$data);
                      if($done){
						return $this->response->setJSON($done);
					  }



					}
	                
	                 public function getIndicatorByAssessmentDATE($id,$assessment_id) {
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $data='<option value="0">Select Assess Date</option>';
	                    
	                    if($assessment_id==10) {
	                        $query = $db->query("select id,cp_name,date_from,date_to from supplier_assessment where id='".$id."'  and supplier_id='".$supplier_info['supplier_id']."' and assessment_id=10 and is_submit=1" );
	                        $indicator = $query->getResultArray();            
	                   if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['date_from'].' to   '.$indi['date_to'].'</option>';
	                            }
	                        }
	                    }
	                    
	                    if($assessment_id==11) {
	                        $query = $db->query("select id,cp_name,date_from from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=11 and is_submit=1" );
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['date_from'].'</option>';
	                            }
	                        }
	                    }
	                   
	                    if($assessment_id==12) {
	                        $query = $db->query("select g.id,g.footprint_id,g.ghg_name from ghg as g where g.status=1 and g.footprint_id=5 group by g.id");
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['ghg_name'].'</option>';
	                            }
	                        }
	                    }
	                    echo $data;
	                }
	             public function getFootprintByAssessment($assessment_id) {
	                    $db = \Config\Database::connect();
	                    $session = session();
	                    $supplier_info = $session->get('supplier_info');
	                    $data='<option value="0">Select Indicator</option>';
	                       if($assessment_id==10) {
	                        $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=10 and is_submit=1" );
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['cp_name'].'</option>';
	                            }
	                        }
	                    }
	                    if($assessment_id==11) {
	                        $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=11 and is_submit=1" );
	                        $indicator = $query->getResultArray();            
	                       if($indicator) {
	                            foreach($indicator as $indi) {
	                                $data.='<option value="'.$indi['id'].'">'.$indi['cp_name'].'</option>';
	                            }
	                        }
	                    }
	                    echo $data;
	                }
	            public function alertttt(){
	             $db = \Config\Database::connect();
	             $session = session();
	             $supplier_info = $session->get('supplier_info');
	             $o_id = $supplier_info['supplier_id'];
	             $model = new SupplierModel();
	             $id = $this->request->getVar('id');
	            $ii = json_encode($id);
	            $data=
	             [
	            'multiple_country' => $ii
	             ];
	             $model->update($o_id,$data);
	             
	            }
	            public function country_city($id){
	            $db = \Config\Database::connect();
	            $data = $db->query("select id,name from states where country_id='".$id."'")->getResultArray();
	              return $this->response->setJSON($data);
	            }
	            public function demoquickStart(){
	                    $rs = check_session();
	                    if(!$rs) {
	                        return redirect()->to('home/user_login');
	                    }
	                    $data['pg_nm'] = 'Quick Start';
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
	            $v = $supplier_module_model->where('status',1)->findAll();
	             // print_r($supplier_mod);
	             // die();
	                    $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
	                    $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
	                    $data['supinfo'] = $db->query("SELECT supplier.brand_name,supplier.socials,supplier.turnover, countries.name, industry.industry_name,supplier.ownership,supplier.mission,supplier.vision, supplier_plan.plan_name, supplier.website, supplier.description, company.company_size FROM `supplier` JOIN countries ON countries.id = supplier.country_id JOIN industry ON industry.id = supplier.industry_id JOIN supplier_plan ON supplier_plan.id = supplier.supplier_plan_id JOIN company ON company.id=supplier_plan.company_id WHERE supplier.id = '".$supplier_info['supplier_id']."' AND supplier.status = 1")->getResultArray();
	                    $query = $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '".$supplier_info['supplier_id']." ' and ed.status=1 ")->getResultArray();
	                    $data['employee_details'] = $query[0]['num'];
	                     // print_r($data['employee_details']);
	                    // die();
	                    if(session()->supplier_info['role'] == 0){
	                    $o_id = session()->supplier_info['supplier_id'];
	                    }
	                    else{
	                        $u_id = session()->supplier_info['supplier_id'];
	                        $make = $supplier_model->where('id',$u_id)->first();
	                        // print_r($make);
	                        // die();
	                        $o_id = $make['owner_id'];
	                        // print_r($o_id);
	                    }
	                    $query = $db->query("SELECT COUNT(sd.id) as doc FROM `policy_brand` as sd WHERE sd.owner_id='".$o_id." ' and sd.policy_status='0' or sd.policy_status='2' and sd.status=1 ")->getResultArray();
	                    $a = new PolicyBrandModel();
	                    // $o_id = session()->supplier_info['supplier_id'];
	                   
	                    // $data['b'] =  $a->where('status', 1)->where('owner_id',$o_id)->get()->getNumRows();
	                    $data['b'] =  '1';
	                    $data['c']  = 3;
	                     $o_id = session()->supplier_info['supplier_id'];
	                  
	                    $data['total_document'] = $a->where(["status" => 1])->where('owner_id',$o_id)->where(["approved_by !=" => null])->countAllResults();
	              // print_r($data['total_document']);
	             // die();
	                    $supplier = new SupplierModel();
	            $o_id = session()->supplier_info['supplier_id'];
	            // print_r($o_id);
	            // die();
	                    $model = $supplier->where('id',$o_id)->first();
	                    // print_r($model);
	                    // die();
	                     $position_id = $model['position'];
	                    $ii = $supplier->where('id',$o_id)->first();
	                    $data['total_page'] = $ii['position'];
	            // print_r($data['total_page']);
	            // die();
	                    $supplier_plan = new SupplierPlanModel();
	                    $company = new CompanyModel();
	                    $activitie = new SubSubIndustryModel();
	                    $ssd = new SupplierSubsidiaryModel();
	                    $policy = new DocumentSubTypeModel();
	                    $s_data = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
	                    $data['ssd_data'] = $ssd->where('supplier_id',session()->supplier_info['supplier_id'])->first();
	                    $indi = new IndustryModel();
	                    $indi_cate = new IndustryCategoryModel();
	                    $ik = $data['industry'] = $indi->where('id',$s_data['industry_id'])->first();
	                    $data['industry_cate'] = $indi_cate->where('id',$ik['industry_category_id'])->first();
	                    $data['activities'] = $activitie->where('industry',$ik['id'])->findAll();
	                    $sp = $data['supplier_plan'] = $supplier_plan->where('id',$s_data['supplier_plan_id'])->first();
	                    $data['size'] = $company->where('id',$sp['company_id'])->first();
	                    // print_r($data['size']);die()
	                    $data['all'] = $s_data;
	                    $data['ind_cate'] = $indi_cate->where('status',1)->findAll();
	                    $data['ind'] = $indi;
	                    $data['policy'] = $policy->where('status',1)->findAll();
	                    $data['u_data'] =  
	                    $db->query("SELECT ind.industry_name,ind_cat.industry_category_name FROM `supplier` as s JOIN industry as ind on ind.id =s.industry_id JOIN industry_category as ind_cat On ind_cat.id=ind.industry_category_id WHERE s.id=965")->getResultArray();
	                        if(session()->supplier_info['role'] == 0){
	                        $id = session()->supplier_info['supplier_id'];
	                        $o_id = session()->supplier_info['supplier_id'];
	                    }
	                    else{
	                        $id = session()->supplier_info['supplier_id'];
	                        $a_id = $supplier_model->where('id',$id)->first();
	                        $o_id = $a_id['owner_id'];
	                    }
	                    
	                    $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=".$o_id);
	                        $find = $ok->getResultArray();
	                $data['country'] =  $db->query("SELECT * FROM `countries` WHERE status=1")->getResultArray();
	                // print_r($data['country']);
	                // die();
	                        if(session()->supplier_info['role'] == 11){
	                            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And policy_status=1 or policy_status=2 And owner_id=".$o_id);
	                        $find = $ok->getResultArray();
	                        }
	                        
	                    $data['policyy'] = $find;
	                    $query = $db->query("select * from countries where status=1");
	                    $data['supplier'] = $db->query("SELECT * FROM `supplier` WHERE id=$o_id")->getResultArray();
	                    $data['sub_industrya'] = $db->query("select * from SubSubIndustry  where status=1")->getResultArray();
	                    $quer = $db->query("select * from states ");
	                    $data['state'] = $quer->getResultArray();
	                   
	                   $picode =  $supplier->where('id',$id)->first();
	                   $data['pincode']  = $picode['zipcode'];
	                  
	                 $data['ok'] = '1';
	                   
	                    echo view('brand/demo-quick-start',$data);
	                }
	              public function country_record()
	              {
	                 $db = \Config\Database::connect();
	           
	 $data =  $db->query("SELECT * FROM `countries` WHERE status=1")->getResultArray();
	              return $this->response->setJSON($data);
	              }
	                
	                public function quickStart(){
	                    $rs = check_session();
	                    if(!$rs) {
	                        return redirect()->to('home/user_login');
	                    }
	                    $data['pg_nm'] = 'Quick Start';
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
	            $v = $supplier_module_model->where('status',1)->findAll();
	             // print_r($supplier_mod);
	             // die();
	                    $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
	                    $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();
	                    $data['supinfo'] = $db->query("SELECT supplier.brand_name,supplier.socials,supplier.turnover, countries.name, industry.industry_name,supplier.ownership,supplier.mission,supplier.vision, supplier_plan.plan_name, supplier.website, supplier.description, company.company_size FROM `supplier` JOIN countries ON countries.id = supplier.country_id JOIN industry ON industry.id = supplier.industry_id JOIN supplier_plan ON supplier_plan.id = supplier.supplier_plan_id JOIN company ON company.id=supplier_plan.company_id WHERE supplier.id = '".$supplier_info['supplier_id']."' AND supplier.status = 1")->getResultArray();
	                    
	                    $query = $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '".$supplier_info['supplier_id']." ' and ed.status=1 ")->getResultArray();
	                    $data['employee_details'] = $query[0]['num'];
	                     // print_r($data['employee_details']);
	                    // die();
	                    if(session()->supplier_info['role'] == 0){
	                    $o_id = session()->supplier_info['supplier_id'];
	                    }
	                    else{
	                        $u_id = session()->supplier_info['supplier_id'];
	                        $make = $supplier_model->where('id',$u_id)->first();
	                        // print_r($make);
	                        // die();
	                        $o_id = $make['owner_id'];
	                        // print_r($o_id);
	                    }
	                    $query = $db->query("SELECT COUNT(sd.id) as doc FROM `policy_brand` as sd WHERE sd.owner_id='".$o_id." ' and sd.policy_status='0' or sd.policy_status='2' and sd.status=1 ")->getResultArray();
	                    $a = new PolicyBrandModel();
	                    // $o_id = session()->supplier_info['supplier_id'];
	                   
	                    // $data['b'] =  $a->where('status', 1)->where('owner_id',$o_id)->get()->getNumRows();
	                    $data['b'] =  '1';
	                    $data['c']  = 3;
	                     $o_id = session()->supplier_info['supplier_id'];
	                  
	                    $data['total_document'] = $a->where(["status" => 1])->where('owner_id',$o_id)->where(["approved_by !=" => null])->countAllResults();
	              // print_r($data['total_document']);
	             // die();
	                    $supplier = new SupplierModel();
	            $o_id = session()->supplier_info['supplier_id'];
	            // print_r($o_id);
	            // die();
	                    $model = $supplier->where('id',$o_id)->first();
	                    // print_r($model);
	                    // die();
	                     $position_id = $model['position'];
	                    $ii = $supplier->where('id',$o_id)->first();
	                    $data['total_page'] = $ii['position'];
	            // print_r($data['total_page']);
	            // die();
	                    $supplier_plan = new SupplierPlanModel();
	                    $company = new CompanyModel();
	                    $activitie = new SubSubIndustryModel();
	                    $ssd = new SupplierSubsidiaryModel();
	                    $policy = new DocumentSubTypeModel();
	                    $s_data = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
	                    $data['ssd_data'] = $ssd->where('supplier_id',session()->supplier_info['supplier_id'])->first();
	                    $indi = new IndustryModel();
	                    $indi_cate = new IndustryCategoryModel();
	                    $ik = $data['industry'] = $indi->where('id',$s_data['industry_id'])->where('status',1)->first();
	                    $data['industry_cate'] = $indi_cate->where('id',$ik['industry_category_id'])->where('status',1)->first();
	                    $data['activities'] = $activitie->where('industry',$ik['id'])->where('status',1)->findAll();
	                    // print_r($data['activities']);
	                    // die();
	                    $sp = $data['supplier_plan'] = $supplier_plan->where('id',$s_data['supplier_plan_id'])->first();
	                    $data['size'] = $company->where('id',$sp['company_id'])->first();
	                    // print_r($data['size']);die()
	                    $data['all'] = $s_data;
	                    $data['ind_cate'] = $indi_cate->where('status',1)->findAll();
	                    $data['ind'] = $indi;
	                    $data['policy'] = $policy->where('status',1)->findAll();
	                    $data['u_data'] =  
	                    $db->query("SELECT ind.industry_name,ind_cat.industry_category_name FROM `supplier` as s JOIN industry as ind on ind.id =s.industry_id JOIN industry_category as ind_cat On ind_cat.id=ind.industry_category_id WHERE s.id=965")->getResultArray();
	                        if(session()->supplier_info['role'] == 0){
	                        $id = session()->supplier_info['supplier_id'];
	                        $o_id = session()->supplier_info['supplier_id'];
	                    }
	                    else{
	                        $id = session()->supplier_info['supplier_id'];
	                        $a_id = $supplier_model->where('id',$id)->first();
	                        $o_id = $a_id['owner_id'];
	                    }
	                    
	                    $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=".$o_id);
	                        $find = $ok->getResultArray();
	                $data['country'] =  $db->query("SELECT * FROM `countries` WHERE status=1")->getResultArray();
	                // print_r($data['country']);
	                // die();
	                        if(session()->supplier_info['role'] == 11){
	                            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And policy_status=1 or policy_status=2 And owner_id=".$o_id);
	                        $find = $ok->getResultArray();
	                        }
	                    $data['policyy'] = $find;
	                    $query = $db->query("select * from countries where status=1");
	                    $data['country'] = $query->getResultArray();
	                    $query = $db->query("select countries.*,countries.name as ghjk from countries where status=1");
	                    $data['countryk'] = $query->getResultArray();
	                  
	                    $query1 = $db->query("select id,name from countries where status=1");
	                    $data['append_country'] = $query1->getResultArray();
	                    // print_r($data['append_country']);
	                    // die();
	                    $quer = $db->query("select * from states ");
	                    $data['supplier'] = $db->query("SELECT * FROM `supplier` WHERE id=$o_id")->getResultArray();
	                    $data['sub_industrya'] = $db->query("select * from SubSubIndustry  where status=1")->getResultArray();
	                    $data['state'] = $quer->getResultArray();
	                   
	                   $picode =  $supplier->where('id',$id)->first();
	                   $data['pincode']  = $picode['zipcode'];
	                  
	                 $data['ok'] = '1';
	                    $session = session();
	                    $find = new QuickStartModel();
	                    $supplier_model = new SupplierModel();
	                    if(session()->supplier_info['role'] == 0){
	                        $o_id = session()->supplier_info['supplier_id'];
	                        $u_id = session()->supplier_info['supplier_id'];
	                    }
	                    else{
	                        $u_id = session()->supplier_info['supplier_id'];
	                        $make = $supplier_model->where('id',$u_id)->first();
	                        $o_id = $make['owner_id'];
	                    }
	                   $data['operationsInfo'] = $find->where('owner_id', $o_id)->where('status',1)->first();
	                   $country_id = $supplier_model->where('id',$u_id)->first();
	                    $countrya = $country_id['country_id'];
	                   
	                    $data['quick_state'] = $db->query("SELECT * FROM `states` WHERE country_id=$countrya")->getResultArray();
	                    $data['countries_data'] = $db->query("SELECT * FROM `countries` WHERE status=1")->getResultArray();
	                   // print_r($data['operationsInfo']);
	                   // die();
	                // $CountryModel = new CountryModel();
	                // $data['country'] = $CountryModel->where('status',1)->get();
	                    $indi = new IndustryModel();
	                    $data['sub_indi'] = $indi->where('status',1)->findAll();
	                    $data['c'] = 5;
	                    $total = 1;
	                    $find_total = $find->where('owner_id', $o_id)->where('status',1)->first();
	                    if($find_total)
	                    {
	                        if($find_total['socials'] != null)
	                        {
	                            $total = $total + 1;
	                        }
	                        if($find_total['activity_industry'] != null)
	                        {
	                            $total = $total + 1;
	                        }
	                        if($find_total['location'] != null)
	                        {
	                            $total = $total + 1;
	                        }
	                        if($find_total['employee_per'] != null)
	                        {
	                            $total = $total + 1;
	                        }
	                        if($find_total['name_hol'] != null)
	                        {
	                            $total = $total + 1;
	                        }
	                    }
	                    $data['total_page'] = $total;
	                    $data['h'] = 5;
	                    echo view('brand/demo-quick-startdaynamic',$data);
	                }
	            }