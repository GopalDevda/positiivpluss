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
use App\Models\ControlFootprintModel;
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
use App\Models\QuantitativeFootprintAnswerModel;

class Quantitative extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

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
            
            $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

            $data['sub_boundary_item'] = $query->getResultArray();
            
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
            $data['pg_nm'] = 'Quantitative ';
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


         
            echo view('brand/view-user-footprints',$data);
    
        }
        public function b($id){

               $b = new CompanyVehicleDetailModel();
              

          $data = $b->where('vehicle',$id)->first();
            //    return $query;

            //    $data  = $b->where('vehicle',18);
              
            
            echo json_encode($data);

        }
    
        public function start_footprint($main_id){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $supplier_model = new SupplierModel();
            $data['pg_nm'] = 'Footprints ';
            $db = \Config\Database::connect();
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
            $supplier_info = $session->get('supplier_info');
            $ghg = new GhgModel();
            $footprint_answer = new QuantitativeFootprintAnswerModel();
            $footprint = new ControlFootprintModel();
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
            $footprint = $footprint->where('id',$main_id)->where('status',1)->first();
            $footprint = $ghg->where('id',$footprint['ghg'])->first();
            $data['footprint'] = $footprint['ghg_name'];
            $data['footprint_answer'] = $footprint_answer->where('status',1)->where('owner_id', $o_id)->where('footprint_id',$main_id)->first();
            // print_r($data['footprint_answer']);
            // die();
            $data['main_id'] = $main_id;

            $a = new VehicleModel(); 
            $data['vehical'] = $a->where('status','1')->where('footprint_id','5')->findAll();
            $data['consumption'] = $db->query("SELECT * FROM `consumption` WHERE status=1 ")->getResultArray();
            $data['consumption_sub_category'] = $db->query("SELECT id, sub_category FROM `Consumption_Sub_Category` WHERE  status=1 ")->getResultArray();
            $data['all_unit'] = $db->query("SELECT id, unit_name FROM `unit` WHERE  status=1 ")->getResultArray();
            $data['all_finance'] = $db->query("SELECT id, finance_name FROM `finance` WHERE  status=1 ")->getResultArray();
            $data['all_sub_finance'] = $db->query("SELECT id, sub_category FROM `Finance_Sub_Category` WHERE  status=1 ")->getResultArray();
            $data['choose_vehicle'] = $db->query("SELECT * FROM `vehicle` WHERE footprint_id = 5 and status=1")->getResultArray();
            $find_m = $db->query("SELECT ghg FROM `control_footprints` WHERE id = $main_id and status=1")->getResultArray();
            $f_m_id = $find_m[0]['ghg'];
            $data['all_material'] = $db->query("SELECT id, factor_name FROM `factor` WHERE `ghg_id`= $f_m_id and status=1")->getResultArray();



            // print_r($f_m_id);
            // die();
            $find = $supplier_model->where('id',$u_id)->first();
            $query = $db->query("select * from manufacturing_process_detail  where status=1 AND industry_id=".$find['industry_id']);
    $data['manufacturing_process_detail'] = $query->getResultArray();

            echo view('brand/start-footprint',$data);
        }

        
        public function answerFootprint($main_id){
            // Developer is Mr Right
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $supplier_model = new SupplierModel();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $nights = $this->request->getVar('nights');
            $people = $this->request->getVar('people');
            $arrival = $this->request->getVar('arrival');
            $departure = $this->request->getVar('departure');
            $refrigrants_unit = $this->request->getVar('refrigrants_unit');
            $refrigrants = $this->request->getVar('refrigrants');
            $wood_unit = $this->request->getVar('wood_unit');
            $wood = $this->request->getVar('wood');
            $natural_gas_unit = $this->request->getVar('natural_gas_unit');
            $natural_gas = $this->request->getVar('natural_gas');
            $electricity_unit = $this->request->getVar('electricity_unit');
            $electricity = $this->request->getVar('electricity');
            $mileage = $this->request->getVar('mileage');
            $unit = json_encode($this->request->getVar('unit'));
            $choose_vehicle = $this->request->getVar('choose_vehicle');
            $year = $this->request->getVar('year');
            $type_name = $this->request->getVar('type_name');
            $model_name = $this->request->getVar('model_name');
            $factor = $this->request->getVar('factor');
            $water_supply = $this->request->getVar('water_supply');
            $water_supply_unit = $this->request->getVar('water_supply_unit');
            $waste_water = $this->request->getVar('waste_water');
            $waste_water_unit = $this->request->getVar('waste_water_unit');
            $tap_water = $this->request->getVar('tap_water');
            $tap_water_unit = $this->request->getVar('tap_water_unit');
            $add_process = json_encode($this->request->getVar('add_process'));
            $quantity = json_encode($this->request->getVar('quantity'));
            $material = json_encode($this->request->getVar('material'));
            $supplier_location = json_encode($this->request->getVar('supplier_location'));
            $consumption = json_encode($this->request->getVar('consumption'));
            $consumption_sub_category = json_encode($this->request->getVar('consumption_sub_category'));
            $finance = $this->request->getVar('finance');
            $sub_finance = $this->request->getVar('sub_finance');
            $ghg_factor = $this->request->getVar('ghg_factor');
            $location_from = $this->request->getVar('location_from');
            $location_to = $this->request->getVar('location_to');
            $form_type = $this->request->getVar('form_type');
            $result_type = 0;
            $land_api = 0;
            if($form_type == 3){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id'         => $o_id,
                    'footprint_id'     => $main_id,
                    'form_id'          => $form_type,
                    'refrigrants_unit' => $refrigrants_unit,
                    'wood_unit'        => $wood_unit,
                    'natural_gas_unit' => $natural_gas_unit,
                    'electricity_unit' => $electricity_unit,
                    'refrigrants'      => $refrigrants,
                    'wood'             => $wood,
                    'natural_gas'      => $natural_gas,
                    'electricity'      => $electricity
                ];
            }
            elseif($form_type == 4){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'mileage' => $mileage,
                    'unit' => $unit,
                    'choose_vehicle' => $choose_vehicle,
                    'year' => $year,
                    'type_name' => $type_name,
                    'model_name' => $model_name,
                    'factor' => $factor,
                ];
            }
            elseif($form_type == 5){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'water_supply' => $water_supply,
                    'water_supply_unit' => $water_supply_unit,
                    'waste_water' => $waste_water,
                    'waste_water_unit' => $waste_water_unit,
                    'tap_water' => $tap_water,
                    'tap_water_unit' => $tap_water_unit,
                ];
            }
            elseif($form_type == 6){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'add_process' => $add_process,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 7){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'material' => $material,
                    'supplier_location' => $supplier_location,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 8){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'material' => $material,
                    'supplier_location' => $supplier_location,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 9){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'material' => $material,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 10){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'consumption' => $consumption,
                    'consumption_sub_category' => $consumption_sub_category,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 11){
                $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'quantity' => $quantity,
                    'finance' => $finance,
                    'sub_finance' => $sub_finance,
                    'ghg_factor' => $ghg_factor,
                    'unit' => $unit,
                ];
            }
            elseif($form_type == 12){
                // $result_type = 1;
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id' => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'departure' => $departure,
                    'arrival' => $arrival,
                ];
            }
            else{
                $data = [
                    // 'completed_by' => $u_id,
                    'owner_id'     => $o_id,
                    'footprint_id' => $main_id,
                    'form_id'          => $form_type,
                    'departure'    => $departure,
                    'arrival'      => $arrival,
                    'people'       => $people,
                    'nights'       => $nights
                ];
            }
            if($form_type == 1){
                $land_api = 1;
            }
            $footprint_answer = $footprint->where('status',1)->where('owner_id', $o_id)->where('footprint_id',$main_id)->first();
            if($footprint_answer){
                $save = $footprint->update($footprint_answer['id'], $data);
            }
            else{
                $save = $footprint->save($data);
            }
            if($save){
                // $session->setFlashdata('success','Your answer has been saved successfully');
                $response = [
                    'success' => true,
                    'data' => 'hm',
                    'departure' => $departure,
                    'arrival' => $arrival,
                    'result_type' => $result_type,
                    'land_api' => $land_api,
                    'msg' => "Footprint has been saved successfully"
                ];
            }else{
                // $session->setFlashdata('error','Your answer has not save');
                $response = [
                    'success' => false,
                    'data' => 'hm',
                    'msg' => "Footprint has not save"
                ];
            }
        return $this->response->setJSON($response);
        }
    
    public function getTypeOfCompanyVehicle() {

        $db = \Config\Database::connect();        

        $vehicle =  $this->request->getVar("vehicle_id");
     

        // $year = $this->request->getVar("year");

        $query = $db->query("select c.type , c.id from company_vehicle_detail as c where vehicle='".$vehicle."' and status=1");

        $cv_type = $query->getResultArray();
        // echo $db->getlastquery($query);

        $data='<option value="0">Select Type</option>';
        if($cv_type) {

            foreach($cv_type as $cvy) {

                $data.='<option value="'.$cvy['id'].'">'.$cvy['type'].'</option>';

            }

        }

        echo $data;

    }
    public function getTypeOfCompanyModel() {

        $db = \Config\Database::connect();        

        $vehicle =  $this->request->getVar("type_id");
     

        // $year = $this->request->getVar("year");

        $query = $db->query("select c.id , c.model from company_vehicle_detail as c where id='".$vehicle."' and status=1");

        $cv_type = $query->getResultArray();
        // echo $db->getlastquery($query);

        $data='<option value="0">Select Model</option>';
        if($cv_type) {

            foreach($cv_type as $cvy) {

                $data.='<option value="'.$cvy['id'].'">'.$cvy['model'].'</option>';

            }

        }

        echo $data;

    }
    
    public function getAirportByLocation() {

        $db = \Config\Database::connect();

        $from = $this->request->getVar("departure");

        $to = $this->request->getVar("arrival");

        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

        $formattedAddrFrom    = str_replace(' ', '+', $from);

        $formattedAddrTo     = str_replace(' ', '+', $to);

        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);

        $outputFrom = json_decode($geocodeFrom);

        if(!empty($outputFrom->error_message)){

            return $outputFrom->error_message;

        }

        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);

        $outputTo = json_decode($geocodeTo);

        if(!empty($outputTo->error_message)){

            return $outputTo->error_message;

        }
// print_r($outputTo);
$o=count($outputTo->results[0]->address_components)-1;
  
    $country    = $outputTo->results[0]->address_components[$o]->long_name;
    
   
    
    
    $ce=$db->query("SELECT  hsd.emission FROM  hotel_stay_detail AS hsd JOIN countries AS c ON c.id = hsd.country_id WHERE hsd.status=1 and c.name='".$country."'")->getResultArray();
    if(empty($ce)){
        $fj['emission']=90.2;
        $fjz[]= $fj;
        $f[]=$fjz;
    }else{
        $f[]= $ce;
    }

// print_r($f);
$latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;

        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;

        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;

        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        $airports = [];
        $airports['airports_from'] = [];

        $airports['airports_to'] = [];

        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeFrom."/".$longitudeFrom."/km/400/106",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

print_r($response);
die();
        if ($err) {

            echo "cURL Error #:" . $err;

        } else {

            $rs = json_decode($response);

            $temp_arr = [];

            foreach($rs->items as $itm) {

                $arr = [];

                $arr['name'] = $itm->name;

                $arr['code'] = $itm->icao;

                $temp_arr[] = $arr;

            }

            $airports['airports_from'] = $temp_arr;

        }
        // print_r(json_encode($airports['airports_from']));die();


        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeTo."/".$longitudeTo."/km/100/5",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {

            $rs = json_decode($response);

            $temp_arr = [];

            foreach($rs->items as $itm) {

                $arr = [];

                $arr['name'] = $itm->name;

                $arr['code'] = $itm->icao;

                $temp_arr[] = $arr;

            }

            $airports['airports_to'] = $temp_arr;

        }
        // print_r($f[0][0]['emission']);
$airports['emission'] = $f[0][0]['emission'];
// json_encode($airports);
// print_r($airports); die();

// $ok = json_encode($airports['airports_to']);
//  $okk = json_encode($airports['airports_from']);
        echo json_encode($airports);

    }
    public function getAirportByLocation_ok() {

        $db = \Config\Database::connect();

        $from = $this->request->getVar("departure");

        $to = $this->request->getVar("arrival");

        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

        $formattedAddrFrom    = str_replace(' ', '+', $from);

        $formattedAddrTo     = str_replace(' ', '+', $to);

        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);

        $outputFrom = json_decode($geocodeFrom);

        if(!empty($outputFrom->error_message)){

            return $outputFrom->error_message;

        }

        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);

        $outputTo = json_decode($geocodeTo);

        if(!empty($outputTo->error_message)){

            return $outputTo->error_message;

        }
// print_r($outputTo);
$o=count($outputTo->results[0]->address_components)-1;
  
    $country    = $outputTo->results[0]->address_components[$o]->long_name;
    
   
    
    
    $ce=$db->query("SELECT  hsd.emission FROM  hotel_stay_detail AS hsd JOIN countries AS c ON c.id = hsd.country_id WHERE hsd.status=1 and c.name='".$country."'")->getResultArray();
    if(empty($ce)){
        $fj['emission']=90.2;
        $fjz[]= $fj;
        $f[]=$fjz;
    }else{
        $f[]= $ce;
    }

$latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;

        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;

        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;

        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        $airports = [];

        $airports['airports_from'] = [];

        $airports['airports_to'] = [];

        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeFrom."/".$longitudeFrom."/km/100/5",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);
       

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {
            
            // if No airport in 100 KM Radius
             if(empty($respons)){
                         $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeFrom."/".$longitudeFrom."/km/200/5",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);
       

        $err = curl_error($curl);

        curl_close($curl);
                 
                  if ($err) {

            echo "cURL Error #:" . $err;

        } else {
                 
                 

            $rs = json_decode($response);

            $temp_arr = [];

            foreach($rs->items as $itm) {

                $arr = [];

                $arr['name'] = $itm->name;

                $arr['code'] = $itm->icao;

                $temp_arr[] = $arr;

            }

            $airports['airports_from'] = $temp_arr;

        }

}
}
        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeTo."/".$longitudeTo."/km/100/5",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {
            $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/".$latitudeTo."/".$longitudeTo."/km/100/5",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {
            if(empty($respons)){

            $rs = json_decode($response);

            $temp_arr = [];

            foreach($rs->items as $itm) {

                $arr = [];

                $arr['name'] = $itm->name;

                $arr['code'] = $itm->icao;

                $temp_arr[] = $arr;

            }

            $airports['airports_to'] = $temp_arr;

        }
        
        }
            
        }
        // print_r($f[0][0]['emission']);
$airports['emission'] = $f[0][0]['emission'];
        echo json_encode($airports);

    }
    public function find_airport() {
        $db = \Config\Database::connect();
            $from = $this->request->getVar("departure");
            $to = $this->request->getVar("arrival");
            // echo " To: ".$to;
            // die();
            $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';
        $formattedAddrFrom    = str_replace(' ', '+', $from);
        $formattedAddrTo     = str_replace(' ', '+', $to);
    // print_r($from);
        // echo "From: ".$formattedAddrFrom." To: ".$formattedAddrTo;
        //  die();
        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if(!empty($outputFrom->error_message)){
            return $outputFrom->error_message;
        }
        $geocodeFrofm = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&key='.$apiKey);
    $Fo=count($outputFrom->results[0]->address_components)-1;
        $Fc0    = $outputFrom->results[0]->address_components[$Fo]->long_name;
        if(is_numeric($Fc0)){
            $Fi=$Fo-1;
            $countryF    = $outputFrom->results[0]->address_components[$Fi]->long_name;                
        }
        else{
            $countryF    = $outputFrom->results[0]->address_components[$Fo]->long_name;;
        }
    // echo "<prev></prev>";
    //     print_r($geocodeFrofm);
    //     die();
        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }
        // echo '<pre>';
        // print_r($outputTo);
        // die();
        // Get latitude and longitude from the geodata
        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
        $o=count($outputTo->results[0]->address_components)-1;
        $c0    = $outputTo->results[0]->address_components[$o]->long_name;
         if(is_numeric($c0)){
            $i=$o-1;
            $country    = $outputTo->results[0]->address_components[$i]->long_name; 
                                            // if(is_numeric($c1)){
                                            //                     $c2    = $outputTo->results[0]->address_components[2]->long_name; 
                                            //                     if(is_numeric($c2)){
                                            //                         $c3    = $outputTo->results[0]->address_components[3]->long_name;
                                            //                         if(is_numeric($c3)){
                                            //                         $country    = $outputTo->results[0]->address_components[4]->long_name;
                                            //                     }else{
                                            //                       $country    = $outputTo->results[0]->address_components[3]->long_name; 
                                            //                     }
                                            //                     }else{
                                            //                       $country    = $outputTo->results[0]->address_components[2]->long_name; 
                                            //                     }
                                            //                 }else{
                                            //                     $country    = $outputTo->results[0]->address_components[1]->long_name;                                                            
                       //                 }
        }
        else{  
            $country    = $outputTo->results[0]->address_components[$o]->long_name;;
        }
        $ce=$db->query("SELECT  hsd.emission FROM  hotel_stay_detail AS hsd JOIN countries AS c ON c.id = hsd.country_id WHERE hsd.status=1 and c.name='".$country."'")->getResultArray();
        if(empty($ce)){
            $fj['emission']=90.2;
            $fjz[]= $fj;
            $f[]=$fjz;
        }else{
            $f[]= $ce;
        }
    // print_r($countryF);
        $rs = [];
        $rs['query'] = $f[0][0]['emission'];
        $rs['Fromcountry'] = $countryF;
        $rs['latitudeFrom'] = $latitudeFrom;
        $rs['longitudeFrom'] = $longitudeFrom;
        $rs['latitudeTo'] = $latitudeTo;
        $rs['longitudeTo'] = $longitudeTo;
        echo json_encode($rs);
        // Calculate distance between latitude and longitude
        // $theta    = $longitudeFrom - $longitudeTo;
        // $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        // $dist    = acos($dist);
        // $dist    = rad2deg($dist);
        // $miles    = $dist * 60 * 1.1515;
        // // Convert unit and return distance
        // $unit = strtoupper($unit);
        // if($unit == "K"){
        //     return round($miles * 1.609344, 2);
        // }elseif($unit == "M"){
        //     return round($miles * 1609.344, 2).' meters';
        // }else{
        //     return round($miles, 2).' miles';
        // }        
        }

 public function find_location_and_airport_distance() {

        $db = \Config\Database::connect();

        $from = $this->request->getVar("from");

        $departrue_airport_name = $this->request->getVar("departure_airport_name");

        $departrue_airport_name = $departrue_airport_name.",".$from;

        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");

        $airport_departure_emission_factor = 0;

        $query = $db->query("select * from ghg_factor where id=".$airport_departure_transfer);

        $emission_factor_arr = $query->getResultArray();

        
        if($emission_factor_arr) {
            
            $emission = json_decode($emission_factor_arr[0]['emission_factor']);
            
            $airport_departure_emission_factor=$emission[0];

        }
        // if($airport_departure_transfer=="rail") {

        //     $airport_departure_emission_factor = 4;

        // }

        // elseif($airport_departure_transfer=="bus") {

        //     $airport_departure_emission_factor = 5;

        // }

        // elseif($airport_departure_transfer=="car") {

        //     $airport_departure_emission_factor = 3;

        // }

        $arr = [];

        // $distance = $this->getDistance($from,$departrue_airport_name,"K");
        
          $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';
          
          $departrue_airport_name    = str_replace(' ', '+', $departrue_airport_name);

        $from     = str_replace(' ', '+', $from);
        $pure = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$from.'&destinations='.$departrue_airport_name.'&key='.$apiKey);

    $pureoutput = json_decode($pure);
    if(!empty($pureoutput->error_message)){

        return $pureoutput->error_message;

    }

    // Get latitude and longitude from the geodata

    $distance    = number_format((($pureoutput->rows[0]->elements[0]->distance->value)/1000),1);
// echo "<pre>";
//   print_r($pureoutput);

        $arr['distance'] = $distance.' km';

        $arr['emission'] = $airport_departure_emission_factor * $distance;

        echo json_encode($arr);

    }
 public function find_air_distance() {

        $db = \Config\Database::connect();

        $departure_code = $this->request->getVar("departure_code");

        $arrival_code = $this->request->getVar("arrival_code");

        $flying_class = $this->request->getVar("flying_class");

        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");

        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/Icao/".$departure_code."/distance-time/".$arrival_code,

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_FOLLOWLOCATION => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "GET",

            CURLOPT_HTTPHEADER => [

                "x-rapidapi-host: aerodatabox.p.rapidapi.com",

                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"

            ],

        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        } else {

            $rs = json_decode($response);

            $airport_departure_emission_factor = 0;

            if($airport_departure_transfer=="rail") {

                $airport_departure_emission_factor = 5;

            }

            elseif($airport_departure_transfer=="bus") {

                $airport_departure_emission_factor = 3;

            }

            elseif($airport_departure_transfer=="car") {



            }

            $flight_class_factor_id = 0;

            $flight_detail_arr = $db->query("select * from flight_detail where '".$rs->greatCircleDistance->km."' between from_distance and to_distance and flight_class='".$flying_class."' and status=1")->getResultArray();

            if($flight_detail_arr) {

                $flight_class_factor_id = $flight_detail_arr[0]['ghg_factor_id'];

            }

            $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id=".$flight_class_factor_id)->getResultArray();

            $emission_factor = 0;

             if($emission_factor_arr) {
                $emiss=json_decode($emission_factor_arr[0]['emission_factor']);

                $emission_factor = $emiss[0];

            }
           
            
            
            $arr = [];

            $arr['emission'] = round($rs->greatCircleDistance->km*$emission_factor);

            $arr['distance'] = $rs->greatCircleDistance->km.' km';

            echo json_encode($arr);

        }

        echo '';

    }
 public function find_distance() {
        $db = \Config\Database::connect();

        $lat_from = $this->request->getVar("lat_from");

        $long_from = $this->request->getVar("long_from");

        $lat_to = $this->request->getVar("lat_to");

        $long_to = $this->request->getVar("long_to");

        $theta    = $long_from - $long_to;

        $dist    = sin(deg2rad($lat_from)) * sin(deg2rad($lat_to)) +  cos(deg2rad($lat_from)) * cos(deg2rad($lat_to)) * cos(deg2rad($theta));

            $dist    = acos($dist);
            //echo $dist;

        $dist    = rad2deg($dist);

        $miles    = $dist * 60 * 1.1515;

        // Convert unit and return distance

        $unit = strtoupper("K");

        $distance = "";

        if($unit == "K"){

            $distance = round($miles * 1.609344, 2);

        }elseif($unit == "M"){

            $distance = round($miles * 1609.344, 2).' meters';

        }else{

            $distance = round($miles, 2).' miles';

        }        

        // echo $distance;
        $airport_departure_transfer = "131";
            $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id='".$airport_departure_transfer."'")->getResultArray();

            $emission_factor = 0;
            


            if($emission_factor_arr) {
                $emiss=json_decode($emission_factor_arr[0]['emission_factor']);

                $emission_factor = $emiss[0];

            }
        // $emission_factor = 55565786908;

        $arr = [];

        $arr['emission'] = round($distance*$emission_factor);

        $arr['distance'] = $distance.' km';

        echo json_encode($arr);

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
        public function control_footprints_submit(){
        
            $db = \Config\Database::connect();
            
            $encrypter = \Config\Services::encrypter();
    
            $supplier = new SupplierModel();
    
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
    
            $priority = $this->request->getVar("priority");
    
            $due_date = $this->request->getVar("due_date");
    
            $comment = $this->request->getVar("comment");
            
            $frequency = $this->request->getVar("frequency");

            $repeating = $this->request->getVar("repeating");
    
             $assigned_to = $this->request->getVar("assigned_to");
    
            $ghg = $this->request->getVar("ghg");
        // print_r($ghg);
        // die();
            $sub_boundary = $this->request->getVar("sub_boundary");

$findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();

$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);


            if($repeating == 1){
                $frequency = '';
            }
            
            $boundary = $this->request->getVar("boundary");
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $msg = "A quantitative task assign you go and check";
                $for = $assigned_to;
            }
            elseif(session()->supplier_info['role'] == 10){
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "A quantitative task assign you go and check";
                $for = $assigned_to;
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id',$u_id)->first();
                $o_id = $id_o['owner_id']; 
                $msg = "A quantitative task assign you go and check";
                $for = $assigned_to;
            }
            foreach($ghg as $g){
            $control_footprints = $db->query("insert into control_footprints(supplier_id,priority,due_date,comment,frequency,repeating,assigned_to,ghg,sub_boundary,boundary,uniq_spl,owner_id,start_date) 
             values(".$supplier_info['supplier_id'].",'".$priority."','".$due_date."','".$comment."','".$frequency."','".$repeating."','".$assigned_to."','".$g."','".$sub_boundary."',
             '".$boundary."','".$uniq_spl_chr."','".$o_id."','".date("Y-m-d")."')");
            }
        if($control_footprints){ 
            $noti = new UserNotification();
            $data = [
                'owner_id' => $o_id,
                'created_by' => $supplier_info['supplier_id'],
                'msg' => $msg,
                'link' => 'Quantitative/footprints',
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
      //$msg= "";
      $quantitative_msg.='<html><body>';
      $quantitative_msg.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><h5  style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:70px; width:70px;" src="'.base_url("/").'/public/profilimg/'.$image.'" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</h5><h5 style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Quantitative Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/Quantitative/footprints"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $quantitative_msg.='</body></html>';
        //print_r($msg);
        // die(); 
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.io', 'PositiivPlus:Assigned Task');
                        $email->setTo($receiptemail);
                        // $email->mailType(html);   
                        $email->setSubject('You have a new task!');
                        $email->setMessage($quantitative_msg);
                        $a = $email->send();
      return redirect()->back();
        }
        public function getIndicatorGhg($boundary_id) {
            $db = \Config\Database::connect();
            $session = session();
            $ghg = new GhgModel();
            $supplier_info = $session->get('supplier_info');
            $data='<option value="0">Select Ghg</option>';
            $find = $ghg->where('status',1)->where('boundary_id',$boundary_id)->findAll();
                if($find) {
                    foreach($find as $indi) {
                        $data.='<option value="'.$indi['id'].'">'.$indi['ghg_name'].'</option>';
                    }
                }        
            echo $data;
        } 
        public function updateAirTravel(){
            // Created By Mr Nasrullah Sheikh
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $air_id = $this->request->getVar('air_id');
            $vehical_before = $this->request->getVar('vehical_before');
            $type_name_before = $this->request->getVar('type_name_before');
            $model_name_before = $this->request->getVar('model_name_before');
            $trip_class = $this->request->getVar('trip_class');
            $travel_from = $this->request->getVar('travel_from');
            $travel_to = $this->request->getVar('travel_to');
            $vehical_after = $this->request->getVar('vehical_after');
            $type_name_after = $this->request->getVar('type_name_after');
            $model_name_after = $this->request->getVar('model_name_after');
            $trans_id = $this->request->getVar('trans_id');
            // print_r($trans_id);die();
            $form_tab = $this->request->getVar('form_tab');
            $driving = $this->request->getVar('driving');
            $driving_from = $this->request->getVar('driving_from');
            $driving_to = $this->request->getVar('driving_to');
            $distance_before = $this->request->getVar('distance_before');
            $distance_main = $this->request->getVar('distance');
            $distance_after = $this->request->getVar('distance_after');
            $distance = [];
            array_push($distance,$distance_before);
            array_push($distance,$distance_main);
            array_push($distance,$distance_after);
            // print_r($distance_before);
            // print_r($form_tab);die();
            if($form_tab == 1){
                $data = [
                    'driving' => $driving,
                ];
                $save = $footprint->update($trans_id, $data);
            }
            elseif($form_tab == 2){
                $data = [
                    'travel_from' => $travel_from,
                    'travel_to' => $travel_to,
                    'driving_from' => $driving_from,
                    'driving_to' => $driving_to,
                ];
                $save = $footprint->update($trans_id, $data);
            }
            elseif($form_tab == 3){

                $data = [
                    'vehical_before' => $vehical_before,
                    'type_name_before'    => $type_name_before,
                    'model_name_before'      => $model_name_before,
                    // 'travel_from' => $travel_from,
                    // 'travel_to' => $travel_to,
                ];
                // print_r($air_id);die();
                $save = $footprint->update($air_id, $data);
            }
            else{
                $data = [
                    'vehical_before' => $vehical_before,
                    'type_name_before'    => $type_name_before,
                    'model_name_before'      => $model_name_before,
                    'trip_class'       => $trip_class,
                    'travel_from'       => $travel_from,
                    'travel_to' => $travel_to,
                    'vehical_after' => $vehical_after,
                    'type_name_after' => $type_name_after,
                    'model_name_after' => $model_name_after,
                    'distance' => json_encode($distance)
                ];
                $save = $footprint->update($air_id, $data);
            }
            if($save){
                // $session->setFlashdata('success','Your answer has been saved successfully');
                $response = [
                    'success' => true,
                    'data' => 'hm',
                    'msg' => "Footprint has been saved successfully"
                ];
            }else{
                // $session->setFlashdata('error','Your answer has not save');
                $response = [
                    'success' => false,
                    'data' => 'hm',
                    'msg' => "Footprint has not save"
                ];
            }
        return $this->response->setJSON($response);
        // return redirect()->back();
        }
        public function completeFootprint(){
            // created by Mr Nasrullah Sheikh
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $to_from_date = $this->request->getVar('to_from_date');
            $from_date = $this->request->getVar('from_date');
            $main_id = $this->request->getVar('main_id');
            $data = [
                'from_date' => $from_date,
                'to_from_date'    => $to_from_date,
                'completed_by' => $u_id,
                'status' => 2
            ];
            $footprint_answer = $footprint->where('status',1)->where('owner_id', $o_id)->where('footprint_id',$main_id)->first();
            if($footprint_answer){
                $save = $footprint->update($footprint_answer['id'], $data);
            }
            if($save){
                $control_footprints = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'   and status=1  and id=$main_id")->getResultArray();
            $com = $control_footprints[0]['complete'];
            $com += 1;
            $control_footprints = $db->query("UPDATE control_footprints set complete=$com where id=$main_id and status=1");
                $session->setFlashdata('success','The task has been completed successfully');
                // $response = [
                //     'success' => true,
                //     'data' => 'hm',
                //     'msg' => "Footprint has been saved successfully"
                // ];
            }else{
                $session->setFlashdata('error','Your answer has not save');
                return redirect()->back();
                // $response = [
                //     'success' => false,
                //     'data' => 'hm',
                //     'msg' => "Footprint has not save"
                // ];
            }
        // return $this->response->setJSON($response);
       
        return redirect()->to('Quantitative/footprints');
        }
        public function getSubConsumption($id){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $consumption_sub_category = $db->query("SELECT * FROM `Consumption_Sub_Category` WHERE  status=1 and consumption_category_id=$id ")->getResultArray();
            // return $consumption_sub_category;
            return $this->response->setJSON($consumption_sub_category);
        }
        public function getSubFinance($id){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $consumption_sub_category = $db->query("SELECT id, sub_category FROM `Finance_Sub_Category` WHERE  status=1  and finance_category_id=$id ")->getResultArray();
            // return $consumption_sub_category;
            return $this->response->setJSON($consumption_sub_category);
        }
        public function getChooseVehicle($id){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $consumption_sub_category = $db->query("SELECT year FROM `company_vehicle_detail` where vehicle =$id and status=1 GROUP BY year")->getResultArray();
            // return $consumption_sub_category;
            return $this->response->setJSON($consumption_sub_category);
        }
        public function getChooseYear($year, $vehi){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $consumption_sub_category = $db->query("SELECT id, type FROM `company_vehicle_detail` WHERE `vehicle` =$vehi and `year` =$year and status=1")->getResultArray();
            // return $consumption_sub_category;
            return $this->response->setJSON($consumption_sub_category);
        }
        public function getChooseType($id){
            $rs = check_session();
            if(!$rs) {
                return redirect()->to('home/user_login');
            }
            $db = \Config\Database::connect();
            $session = session();
            $footprint = new QuantitativeFootprintAnswerModel();
            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
            $consumption_sub_category = $db->query("SELECT id, model, emission_factor FROM `company_vehicle_detail` WHERE id=$id")->getResultArray();
            // return $consumption_sub_category;
            return $this->response->setJSON($consumption_sub_category);
        }

        public function deleteFootprint($id){
            $db = \Config\Database::connect();
        $session = session();
        $query = $db->query("UPDATE control_footprints set status = 0 where id =".$id);
        if($query){
            $session->setFlashData('success','Footprint delete successfuly');                        
        }
        else{
            $session->setFlashData('error','Footprint not delete');                        
        }
        return redirect()->back();
        }
        public function findDetails($boundary, $sub_boundary, $ghg){
            $db = \Config\Database::connect();
            $query = $db->query("SELECT item_name FROM `supplier_module_item` WHERE id = $boundary")->getResultArray();
            $data['boundary'] = $query[0]['item_name'];
            $query = $db->query("SELECT cp_name FROM `supplier_assessment` WHERE id = $sub_boundary")->getResultArray();
            $data['sub_boundary'] = $query[0]['cp_name'];
            $query = $db->query("SELECT ghg_name FROM `ghg` WHERE id = $ghg")->getResultArray();
            $data['ghg'] = $query[0]['ghg_name'];
            return $this->response->setJSON($data);
            
    
        }
        public function control_footprint_update(){
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
            $control_assessment = $db->query("UPDATE control_footprints set supplier_id = ".$supplier_info['supplier_id'].", priority = '".$priority."', due_date = '".$due_date."', comment = '".$comment."', assigned_to = '".$assigned_to."',uniq_spl = '".$uniq_spl_chr."',
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
    $ava = $db->query("select * from supplier where id='".$assigned_to."' ");  
            $ava = $ava->getResultArray();
    $receiptemail=$ava[0]['email'];
      $msg= "TASK";
      
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.io', 'Assigned Task');
                        $email->setTo($receiptemail);
                        // $email->mailType(html);   
                        $email->setSubject('You Have a New Task');
                        $email->setMessage($quantitative_msg);
                        $a = $email->send();
      return redirect()->back();
        }
}