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
use App\Models\ControlEnergryModel;
use App\Models\UserNotification;
use App\Models\Victim;
use App\Models\ActionCenterModel;
use App\Models\GhgModel;
use App\Models\AllAssessmentModel;
use App\Models\BrandModel;
use App\Models\GhgFactorModel;
use App\Models\SubClassificationModel;
use App\Models\Energy_managment;
use App\Models\Energy_managment_data;
use App\Models\Electricity_consumed;
use App\Models\SubDisclosure;
use App\Models\StandardModel;
use App\Models\DisclosureModel;
use App\Models\EnergyConnect;
use App\Models\SensorModel;
use App\Models\DocumentModel;
use App\Models\MasterSubDis;
use App\Models\Data_electricityModel;
use App\Models\SubUnitModel;
use App\Models\OptionAnswerModel;


class Environment extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }
        
        public function deleteFootprint($id) 
        {



        $footprint_model = new ControlEnergryModel();



        $session = Session();



        if($footprint_model->where('id',$id)->set(['status' => 0])->update()) 
        {

            $session->setFlashdata('fin_yeardate', '2022');
            $session->setFlashdata('finTear', '2022');
            $session->setFlashdata('request', 'KPIS has been successfully deleted');

        }
        else
        {
            $session->setFlashdata('error', 'Error to delete');

        }


$s_date=[
    'err' => $date_option,
   
]; 
// print_r($s_date);
// die();
return $this->response->setJSON($s_date);

        // return redirect()->to('/Environment/environmentt/17');



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
    
            $data['pg_nm'] = 'sensor ';
            
            
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
            $data['pg_nm'] = 'Environment';
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

        $data['environ_indicator'] = $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 8")->getResultArray();
        $industry_category = '8';

$data['indicator_category'] = $db->query("select * from indicator_category where id='".$industry_category."' and status=1 ")->getResultArray();

        
        echo view('brand/environment_view',$data);


    }
 
// new Environment start


public function newenvironment($id)
{

      
  $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        
        $model = new AllAssessmentModel();

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

            $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
    
            $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        
            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
    
            $data['employee_details'] = $query->getResultArray();
            
            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
            $data['indicator'] = $db->query("SELECT * FROM `indicator`   where status=1 ")->getResultArray();
            // $data['ghg_name'] = $query->getResultArray();
            
            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
    
            $data['boundary_item'] = $query->getResultArray();

            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
            }
            elseif(session()->supplier_info['role'] == 10){
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                            $ok = $supplier_model->where('id', $sid)->first();
                            $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
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
            $data['u_id'] = $u_id;
            $data['o_id'] = $o_id;
            $data['role'] = session()->supplier_info['role'];

            $brand = new BrandModel();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if(session()->supplier_info['role'] == 0){
                $role = 10;
            }
            else{
                $role = session()->supplier_info['role'];
            }
            $data['pg_nm'] = 'SocialController';
            $data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
         $indicator_sdg_id = $id;

        $data['indicator_sdg'] = $db->query("select * from indicator_sdg  where status=1 and indicator_id='".$indicator_sdg_id."'")->getResultArray();
        $data['sdg'] = $db->query("select * from sdg  where status=1 ")->getResultArray();
       


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
       
        $data['total_footprint'] = $total_footprint;

        $data['social_indicator']= $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 8 and id='".$id."'")->getResultArray();
        
        $query = $db->query("select * from all_assessment_question as aaq  where aaq.status=1 and aaq.indicator_id='".$id."'");
        $indquestion = $query->getResultArray();
        
        $data['indquestion']=$indquestion;
        $r=$data['social_indicator'][0]['indicator_name'];
        $jid=$data['social_indicator'][0]['id'];
        $data['name']=$r;
$data['site_data'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
       

$query = $db->query("select * from indicator where status=1 and id= '".$jid."'order by id");

        

        $rs = $query->getResultArray();



        $list=array();



        if(!empty($rs)){



            foreach($rs as $r){



                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");



                $cat = $query->getResultArray();



                if(!empty($cat)){$category_name =$cat[0]['indicator_category_name']; }else{$category_name=0;}



                $query = $db->query("select *,s.id as indicator_sdg_id  from indicator_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.indicator_id='".$jid."' and b.status=1 ");



                $sdg = $query->getResultArray();



                $list[]=array('indicator_id'=>$r['id'],'description'=>$r['description'],'indicator_name'=>$r['indicator_name'],'indicator_category_name'=>$category_name,'image'=>$r['image'],'sdg'=>$sdg);   



            }



        }



       $data['list']=$list;
       $role = session()->supplier_info['role'];
       // print_r($role);
       // die();
          $data['Indicator_id'] = $id;
    $sensor_model = new SensorModel();
    $Data_electricityModel = new Data_electricityModel();
    $data['sensor_ele'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',3)->where('energy_status',1)->findAll();

    // $data['sensor_notConnect'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',2)->findAll();
   // $data['sensor_notConnect'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',2)->findAll();

   $energy_managment = new Energy_managment();
   $data['site_connect'] = $energy_managment->where('status',1)->where('connect',1)->where('supplier_id',$u_id)->findAll();
   $data['SensorData'] = $sensor_model->where('status',1)->where('energy_status',2)->where('supplier_id',$u_id)->findAll();


    if($role == 0 || $role == 10)
    {
      
      $data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

      $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();

      $data['sub_disc'] = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
      $data['sub_disc1'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1  group by sd.sub_clasification")->getResultArray();
      $data['sub_disc11'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 group by sd.sub_clasification")->getResultArray();



      $masterDisclosure = new MasterSubDis();
      $data['disclosure_id_show'] =  $masterDisclosure->where('status',1)->groupBy('disclosure_id')->findAll();
      $data['sub_disclosure_show'] =  $masterDisclosure->where('status',1)->groupBy('sub_disclosure_id')->findAll();
    
      $data['disclosure_show'] = $db->query("select * from disclosure  where status=1 and indicator_id=".$id." ")->getResultArray();
      // print_r($data['disclosure_show']);
      // die();
      $data['subdisclosure_show'] = $db->query("select * from sub_disclosure  where status=1")->getResultArray();
      $data['option_answer'] = $db->query("select * from option_Answer  where status=1")->getResultArray();

      $data['all_subdisclosure'] =  $masterDisclosure->where('status',1)->findAll();
 
     // print_r( $data['disclosure_id_show']);
     // die();
    $classification_sub_model = new SubClassificationModel();
    $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();


$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();


$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
$month_end   = array("1","2","3","4","5","6","7","8","9","10","11","12");


$jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;

$summ= $db->query("SELECT * FROM `energy_managment`  WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewables' and status=1  ")->getResultArray();
foreach ($summ as $key => $valueId) 
      {

$kk = json_decode($valueId['monthly_name']);

         foreach ($kk as $key => $value_mon) 
         {
             if($value_mon==1){$jan+=$valueId['value'];}
             if($value_mon==2){$feb+=$valueId['value'];}
             if($value_mon==3){$mar+=$valueId['value'];}
             if($value_mon==4){$apr+=$valueId['value'];}
             if($value_mon==5){$may+=$valueId['value'];}
             if($value_mon==6){$jun+=$valueId['value'];}
             if($value_mon==7){$jul+=$valueId['value'];}
             if($value_mon==8){$aug+=$valueId['value'];}
             if($value_mon==9){$sep+=$valueId['value'];}
             if($value_mon==10){$oct+=$valueId['value'];}
             if($value_mon==11){$nov+=$valueId['value'];}
             if($value_mon==12){$dec+=$valueId['value'];}
     }
     }
     $tarnon[]=$jan;$tarnon[]=$feb;$tarnon[]=$mar;$tarnon[]=$apr;$tarnon[]=$may;
     $tarnon[]=$jun;$tarnon[]=$jul;$tarnon[]=$aug;$tarnon[]=$sep;$tarnon[]=$oct;
     $tarnon[]=$nov;$tarnon[]=$dec;
     // print_r($tarnon);
     $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;

$summ= $db->query("SELECT * FROM `energy_managment_data`  WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewables ' and status=1  ")->getResultArray();
foreach ($summ as $key => $valueId) 
      {

$kk = json_decode($valueId['monthly_name']);

        foreach ($kk as $key => $value_mon) 
    {
             if($value_mon==1){$jan+=$valueId['value'];}
             if($value_mon==2){$feb+=$valueId['value'];}
             if($value_mon==3){$mar+=$valueId['value'];}
             if($value_mon==4){$apr+=$valueId['value'];}
             if($value_mon==5){$may+=$valueId['value'];}
             if($value_mon==6){$jun+=$valueId['value'];}
             if($value_mon==7){$jul+=$valueId['value'];}
             if($value_mon==8){$aug+=$valueId['value'];}
             if($value_mon==9){$sep+=$valueId['value'];}
             if($value_mon==10){$oct+=$valueId['value'];}
             if($value_mon==11){$nov+=$valueId['value'];}
             if($value_mon==12){$dec+=$valueId['value'];}
    }

    }

     $tarRenewables[]=$jan;$tarRenewables[]=$feb;$tarRenewables[]=$mar;$tarRenewables[]=$apr;$tarRenewables[]=$may;
     $tarRenewables[]=$jun;$tarRenewables[]=$jul;$tarRenewables[]=$aug;$tarRenewables[]=$sep;$tarRenewables[]=$oct;
     $tarRenewables[]=$nov;$tarRenewables[]=$dec;
 

$data['fuel_dis'] = $db->query("SELECT sum(em.value) as data FROM `energy_managment`as em  WHERE (sub_e_type = 'Non-Renewables' or sub_e_type = 'Renewables')  and supplier_id=$u_id  and owner_id=$o_id and  status=1  ")->getResultArray();


$connect_total = $db->query("SELECT * FROM `energy_managment`  WHERE connect=1  and supplier_id=$u_id  and owner_id=$o_id and  status=1  ")->getResultArray();

$total = 0;
foreach ($connect_total as $key => $value) 
{  
    $val = $value['value'];
   
     $total += $val;
      
   

}

$data['total_connet'] = $total;





$sumRenewable=array();
foreach($month_names as $ky=> $mname)
{
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}


$data['month_names']=$month_names;
$data['sumNon']=$tarnon;

$data['sumRenewable']=$tarRenewables;

  $energy_managment = new Energy_managment();
 
   $EnergyConnect = new EnergyConnect();
  $data['NonRenewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->findAll();
  $data['Renewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->findAll();
   
 $data['history_data'] = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();
  $data['connect_data'] =  $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id ")->getResultArray();

  
  
 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();
// print_r($data['control_data']);
// die();

 $data['request_count'] = count($data['control_data']);

 $energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();


$data['Heating_a']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=2 ")->getResultArray();
$data['Cooling_b']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=3")->getResultArray();
$data['Stream_c']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=4")->getResultArray();
$data['Electricity_d']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ele_con' and status=1 ")->getResultArray();

 $data['Electricity'] = $data['Electricity_d'][0]['data'];
 // print_r($data['Electricity']);
 // die();
 $data['Heating'] = $data['Heating_a'][0]['data'];
 $data['Cooling'] = $data['Cooling_b'][0]['data'];
 $data['Stream'] = $data['Stream_c'][0]['data'];
$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];
// $data['consum_per'] = $total/4;

 $sold_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',2)->first();
 $sold_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',3)->first();
 $sold_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',4)->first();
 $sold_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold')->first();



$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
$data['sold'] = $data['per_electricity_sold'];
// print_r($data['per_electricity_sold']);
// die();
if($data['per_electricity_sold'] == 0){
    $data['per_electricity_sold'] = '1';
}
 $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0){
    $data['per_Heating_sold'] = '1';
}
 $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0){
    $data['per_Coling_sold'] = '1';
}
 $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0){
    $data['per_Stream_sold'] = '1';
}
 $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;

// Energy intensity ration 
$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
// $data['sold'] = $total/4;consum_per
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();

$data['energy_product']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=1 ")->getResultArray();

$data['energy_services']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=2 ")->getResultArray();

$data['energy_sales']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=3 ")->getResultArray();

$data['energy_size']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=4 ")->getResultArray();

$data['energy_Employee']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=5 ")->getResultArray();

//energy consumption  Outside 

$data['outside_Purchased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=21 ")->getResultArray();


$data['outside_Capital']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=22 ")->getResultArray();

$data['outside_Fuel']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=23 ")->getResultArray();

$data['outside_Upstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=24 ")->getResultArray();

$data['outside_Waste']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=25 ")->getResultArray();

$data['outside_Business']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=26 ")->getResultArray();

$data['outside_Employees']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=27 ")->getResultArray();

$data['outside_Leased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=28 ")->getResultArray();

$data['outside_Downstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=29 ")->getResultArray();

$data['outside_Processing']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=30 ")->getResultArray();

$data['outside_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=31 ")->getResultArray();

$data['outside_End_of_life']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=32 ")->getResultArray();

$data['outside_Downstreamleased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=33 ")->getResultArray();

$data['outside_Franchises']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=34 ")->getResultArray();

$data['outside_Investments']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=35 ")->getResultArray();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

  $dreduction_energy = $energy_managment->where('sub_e_type','reduction_energy1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($dreduction_energy as $ss)
  {

  }
  $data['reduction'] = $ss['reduction_retio'];

  $energy_intensity = $energy_managment->where('sub_e_type','energy_intensity1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity as $intensity)
  {

  }
  $data['intensityy'] = $intensity['intensity_ratio'];

   $energy_intensity1 = $energy_managment->where('sub_e_type','energy_intensity')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity1 as $intensity1)
  {

  }
  $data['intensity_con'] = $intensity1['energy_con_ratio'];

$data['yes_no'] = $energy_managment->where('sub_e_type','per_achi_trade')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();


}
  $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

            $data['boundary_item'] = $query->getResultArray();


 $data['f_year'] ='2022';
 $data['units'] = $db->query("select * from unit where status=1")->getResultArray();
 $data['category_units'] = $db->query("select * from category_unit where status=1")->getResultArray();
      $ava = $db->query("select * from sub_units where sub_unit_name='".$subunit_name."' and status=1")->getResultArray();
$data['subunits'] =   $db->query("SELECT unit.unit_name,sub_units.* FROM sub_units JOIN unit ON unit.id = sub_units.unit_id WHERE sub_units.status = 1")->getResultArray();



$energy_managment_data = new Energy_managment_data();

$reload_data_id =  $energy_managment_data->select('data_id')->where('supplier_id',$u_id)->where('status',1)->groupBy('data_id')->findAll();



foreach ($reload_data_id as $key => $value) 
{
$reload_environemnt_id[] = $value['data_id']; 
}

$data['reload_data_id'] = json_encode($reload_environemnt_id);



$reload_subdisclosure_id =  $energy_managment_data->select('sub_disclosure_id')->where('supplier_id',$u_id)->where('status',1)->groupBy('sub_disclosure_id')->findAll();

foreach ($reload_subdisclosure_id as $key => $value) 
{

$reload_sub_id[] = $value['sub_disclosure_id']; 

}

$data['reload_sub_id'] = json_encode($reload_sub_id);



 

echo view('brand/newEnvironment',$data);


    } 


    public function SensorDelete($id)
    {

        
        
        $data['pg_nm'] = 'Social';

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
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

     $sensor = new SensorModel();

     $data = ['energy_status'=>1];
  $update =  $sensor->update($id,$data);
// print_r($update);
// die();
return $this->response->setJSON($update);

    }


 public function sidebardata($id,$idd)
 {


 
   $rs = check_session();

        if(!$rs) 
        {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

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
                                    
$MasterSubDis = new MasterSubDis();
$data1 = $MasterSubDis->where('id',$id)->where('status',1)->first();
$boundary = json_decode($data1['boundary_id']);
$boundary_select = json_decode($data['boundary_select']);
$listing = json_decode($data1['type_option']);
$date_option = $data1['date_option'];

$disclosure_id = $data1['disclosure_id'];

$DisclosureModel = new DisclosureModel();
$indicator_id_fetch = $DisclosureModel->where('status',1)->where('id',$disclosure_id)->first();
$indicator_id = $indicator_id_fetch['indicator_id'];

$sub_disclosure_id = $data1['sub_disclosure_id'];
$sub_classi = $data1['sub_clasification'];
$title_uniq = $data1['title'];


$site_data = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 $ii =  $db->query("SELECT * FROM `sub_disclosure` where id = $sub_disclosure_id")->getResultArray();

$query_master = $MasterSubDis->where('status',1)->where('id',$id)->first();
$subClasification_id = json_decode($query_master['sub_clasifiction']);
$subClasification  = $subClasification_id[0];

$subClasification_query =  $db->query("SELECT * FROM `sub_classification` where id = $subClasification")->getResultArray();
$unit_id     =   $subClasification_query[0]['unit_id'];
$guideline   =   $subClasification_query[0]['guidelines'];

// print_r($unit_id);
// die();
 $unit_query =  $db->query("SELECT * FROM `unit` where id = $unit_id")->getResultArray();
 $unit_name = $unit_query[0]['unit_name'];
// print_r($guideline);
// die();

$subDisMOdel  = new SubDisclosure();


foreach($ii as $k)
{
    // print_r($k);
}
$title = $k['sub_disclosure'];

if($idd == ',')
{
$idd = $id;
}

  $g = explode(",", $idd);
// print_r($g);
// die();

if($g[1] == '')
{
$e_value = '0';
}

else
{
$e_value = '1';
}
// print_r($e_value);
// die();
  foreach($g as $listing_vali)
  {

if($listing_vali == 'Select from list'){
return $this->response->setJSON($listing_vali);

  }
  
}

$type_id_fetch = $MasterSubDis->where('status',1)->where('id',$id)->first();
$answer_option = json_decode($type_id_fetch['answer_option']);

$optionAnswer = new OptionAnswerModel();

foreach ($answer_option as  $answer_opti_id) 
{

 $option_type_id = $optionAnswer->where('status',1)->where('id',$answer_opti_id)->first();
 $title_answer[] = $option_type_id['answer_name'];

}



// print_r($id);
// print_r($idd);
// // print_r($title_answer);
// // print_r(array_merge($g,$title_answer));
// die();

$data="";
            $data.='<input type="hidden" name="disclose_id" value="'.$disclosure_id.'">
                    <input type="hidden" name="sub_dis" class="sub_dis_id"  value="'.$sub_disclosure_id.'">
                    <input type="hidden" name="indicator_id" class="indiacator"  value="'.$indicator_id.'">
                    <input type="hidden" name="sub_clasii" value="'.$sub_classi.'">
                    <input type="hidden" name="type_name" value="'.$title_uniq.'">
                    <input type="hidden" name="title" value="'.$title.'">
                    <input type="hidden" name="data_id" class="data_id_number" value="'.$id.'">';
                   
                   
                if($e_value == '1')
            { 

                foreach($g as $key1=> $i)
            {
                foreach($title_answer as $key=> $title_name)
            {
                if($key==$key1){

             
                    if(!$i == "")
            {
             
                    $data.='
                    <div class="row mb-1">
                    <div class="col-md-2">
                    <label for="exampleFormControlInput1" class="form-label">'.$title_name.'</label>
                    </div>
                    <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" name="energy[]" id="energy_show_id" value="'.$i.'" required readonly>
                    </div></div>';
            
        

            }
        }
        }
        }

            }
                    $data.='<div class="row mb-1">
                       <div class="col-md-2">
                          <label for="exampleFormControlInput1" class="form-label ">Value </label>
                       </div>
                       <div class="col-md-4">
                          <input id="Valueinput" class="form-control form-control-sm" name="value" type="text" placeholder="Enter the value" required>
                       </div>';

                     
                 $data.='
                 <div class="col-md-2">
                 <label for="exampleFormControlInput1" class="form-label ">Unit </label>
              </div>
              <div class="col-md-4">
                 <input type="text" id="vertical-landmark" name="unit"  class="form-control  form-control-sm  total_number"  
                 value="'.$unit_name.'" readonly="">
              </div>
           </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label" for="exampleFormControlTextarea1 fs-6"> Comment (Optional)</label>
                            <textarea class="form-control fs-6" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Comment..." ></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                         <label class="form-label" for="exampleFormControlTextarea1 fs-6">Attachments, If any</label>
                            <input type="file" name="image" class="form-control">
                        </div>';
                       
 $res = [
 'suc'=>$data,
 'Guideline'=>$guideline,
];

return $this->response->setJSON($res);
                        // echo $data;


 } 

public function site_sub_site($id)
{
$rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = '';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $supplier_id = $supplier_info['supplier_id'];


 $data = $db->query("SELECT * FROM `sub_site` where site_id =$id and supplier_id=$supplier_id and status=1")->getResultArray();
 

 
        
return $this->response->setJSON($data);

}

 public function subdisclosure_totalValue($id,$data_id)
 {
                       $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

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
// print_r($data_id);
// print_r($id);
// die();
$energy_managment_data_model = new Energy_managment_data();
$energy_managment_data =  $energy_managment_data_model->select('value')->where('supplier_id',$u_id)->where('status',1)->where('sub_disclosure_id',$id)->findAll();
$energy_managment_data_id =  $energy_managment_data_model->select('value')->where('supplier_id',$u_id)->where('status',1)->where('data_id',$data_id)->findAll();

// SubDisclosure TotalValue
if(empty($energy_managment_data))
{
  

$s_date=[
    'success' => '0',
    
];
return $this->response->setJSON($s_date);
}
foreach ($energy_managment_data as $key => $value) 
{

  $total[] =  $value['value']; 


}

foreach($total as $y)
{
    $sum += $y;
}

// subdisclosure data ID value 

if(empty($energy_managment_data_id))
{
  

$s_date=[
    'success' => $sum,
    'data_value' => '0',
    
]; 

return $this->response->setJSON($s_date);

}
foreach ($energy_managment_data_id as $key => $value1) 
{

  $total_value[] =  $value1['value']; 


}

foreach($total_value as $y)
{
    $sum_data += $y;
}


$s_date=[
    'success' => $sum,
    'data_value' => $sum_data,
    
]; 

return $this->response->setJSON($s_date);


 }

 public function unitsubunit($id)
 {

    $db = \Config\Database::connect();
                                            $data=$this->helperData;
                                            $session = session();
                                            $user_info = $session->get('user_info');
                                           
                                            $unit_model = new SubUnitModel();

                                            $data['units'] = $db->query("select * from unit where status=1")->getResultArray();
                                            $data['category_unit'] = $db->query("select * from category_unit where status=1")->getResultArray();

                                            $response = $db->query("select * from sub_units where unit_id='".$id."' and status=1")->getResultArray();
                                           // print_r($response);
                                           // die();
                                              $data.="";
                                              $data.='<option>Select from list</option>';
                                              foreach($response as $jj){
   
                                              $data.='
                                              <option value="'.$jj['conversion_value'].'">'.$jj['sub_unit_name'].'</option>';
                                          }
                                          echo $data;


 }

public function dynamicRecord($y)
{

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

    $energy_managment_data_model = new Energy_managment_data();
    $energy_managment_data =  $energy_managment_data_model->where('supplier_id',$u_id)->where('status',1)->where('data_id',$y)->findAll();
  
$data="";
foreach($energy_managment_data as $data_show){
    $data.='<div class="source_form'.$data_show['id'].' mt-2 pb-1">
            
               <div class="row">
                  <div class="col-md-3">
                     <p class="pt-1">'.$data_show['sub_e_type'].'</p>
                  </div>';
         
                $list = json_decode($data_show['energy']);
                // print_r($list);
                       if($list[0] == '')
                       {
                       $lis_value = '0';
                       }else
                       {
                       $lis_value = '1';

                       }

                $kkk = '1';  
                $k=1;
                // print_r($list);
    
 $count = count($list);
             foreach($list as $key=> $ll)
 {
    if($count == '1'){
        if($ll){
          $data.='<div class="col-md-2">
                    <label></label>
                     
                  </div>';  
        }
    }

     if($ll == ""){
   $data.='<div class="col-md-2">
         <label></label>
          </div>'; $data.='<div class="col-md-2">
                    <label></label>
                     
                  </div>';

    }
     
 }

                foreach ($list as $key=> $list_name) 
             {

                   $keyId[] = $key;
                   $i = $k++;

                   if(!$list_name == '')
                {

                  
                  $data.='<div class="col-md-2">
                    <label></label>
                     <input type="text" class="form-control listinghh'.$data_show['id'].''.$data_show['sub_disclosure_id'].'" value="'.$list_name.'" disabled>

                  </div>';
                }
             }


                 $data.='<input type="hidden" class="jjj'.$data_show['id'].'" value="'.$list_name.'"/>';
                 
                 $swati = $data_show['sub_e_type'].$data_show["id"];                                                   
                  $data.='<div class="col-md-2">
                     <label class="form-label fs-6">Value</label>
                     <input type="number" id="llll" class="form-control total_number" 
                      placeholder="Value" value="'.$data_show['value'].'"
                       data-id="'.$data_show['data_id'].'"
                       data-dev_id="'.$data_show['id'].'"
                       data-sub="'.$data_show['sub_disclosure_id'].'"
                        readonly="">
                    </div>

                  
                  <input type="hidden" class="form-control total_number_add_more'.$data_show['data_id'].'" value="'.str_replace(' ', '', $swati).'" placeholder="Joules" readonly="">

                  <div class="col-md-1 p-0">
                     <label class="form-label fs-6" for="select2-basic">Unit</label>
                     <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                  </div>
                  <div class="col-md-2 mt-2 lh">';
                     // <button type="button" class="btn btn-dark btn-sm  waves-effect"  data-id="'.$data_show["data_id"].'" onclick="addSourceDiv(this)"><i class="fa fa-plus"></i></button>
                     $data.='<button class="btn btn-sm btn-danger waves-effect" data-subDis="'.$data_show['sub_disclosure_id'].'" data-value="'.$data_show['value'].'" data-id="'.$data_show['id'].'" data-showId="'.$data_show['data_id'].'" onclick="Non_deleted(this)"><i class="fa-solid fa-xmark"></i></button>
                  </div>
               </div>
           
         </div>';

}

echo $data;


}

 public function historyreload($id)
{
    $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
        else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
        }

$energy_managment = new Energy_managment();
   
$history_data = $energy_managment->where('supplier_id',$u_id)->where('status',1)->where('indicator_id',$id)->orderBy('id', 'desc')->groupBy('created_at')->findAll();

// print_r($history_data);
$supplier= $db->query("SELECT * FROM `supplier` ")->getResultArray();

$data="";

    $data.='<div class="row p-0" id="table-borderless">
            <div class="col-12 p-0">
            <div class="table-responsive">
            <table class="table table-borderless">
            <thead>
            <tr>
            <th>S NO.</th>
            <th>Task Title</th>
            <th>Delete</th>
            <th>Actions</th>
            </tr>
            </thead>
    <tbody>';
             $sno=0; foreach($history_data as $control){
             $data.='<tr>
            <td>'.++$sno.'</td>
            <td class="text-dark" > <span style="font-weight: bold;">'.$control["title"].'</span>';
            if($control['connect'] == '0'){
              $data.='  data has been entered By<br>';  
            }
            if($control['connect'] == '1'){
              $data.='data has been connect By<br>';  
            }
            
            foreach($supplier as $dsd){
            if($dsd["id"]==$control["supplier_id"]){
            $data.='<span style="font-weight: bold;">'.$dsd["supplier_name"].'</span>'; 
             }}
              $data.= ''." On ".''; 
            $data.= ''.$control["created_at"].'';  

             $data.= ''."   ".'';
              if($control['connect'] == '0'){
               $data.= '<span style="font-weight: bold;">'.$control["value"].'</span>';  
            }
            if($control['connect'] == '1'){
                $k = $control["value"];
            
                $data.= '<span style="font-weight: bold;">'.$k.'</span>'; 
            }

           

           if($control['connect'] == '0'){
              $data.= ''." Joules  Unit ".'';  
            }
            if($control['connect'] == '1'){
               $data.= ''." Consume  Unit ".''; 
            }
          
            $data.='</td>
            <td> <button type="button" class="btn btn-danger btn-sm  waves-effect"
              data-id="'.$control['data_id'].'"
            data-value="'.$control['value'].'"
            data-mainid="'.$control['id'].'"
            onclick="Non_deleted_history(this)">
                 <i class="fa-solid fa-xmark"></i></button></td>
                <td  onclick="getSubDisclosureoninfoproce('.$control['id'].')" ><i class="fa-solid fa-eye"></i></td></tr>';
            }
                $data.='</tbody> 
                </table>
                        </div>
                        </div>
                        </div>';



echo $data;

}

public function requestreload()
{
    $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
        else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
        }
$control =  new ControlEnergryModel();

 $control_data = $control->where('supplier_id',$u_id)->where('status',1)->findAll();
// print_r( $control_data);
$supplier= $db->query("SELECT * FROM `supplier` ")->getResultArray();

$data="";

    $data.='<div class="row p-0" id="table-borderless">
            <div class="col-12 p-0">
            <div class="table-responsive">
            <table class="table table-borderless">
            <thead><tr>
            <th>Assigned To</th>
            <th>Task Title</th>
            <th>Requester Name</th>
            <th>Status</th>
            <th>Actions</th>
            </tr>
            </thead>';
             if($control_data){
            $data.='<tbody>';
             foreach($control_data as $control){
            $data.='<tr><td>
            <div class="d-flex justify-content-start align-items-center mt-2">
            <div class="media-aside align-self-center">
            <a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">
            <span class="b-avatar-img">
            <img src="https://user.positiivplus.io/public/uploads/owner/john.jpg" alt="avatar">
            </span><!---->
            </a>
            </div>';
           if(!empty($supplier)){
               foreach($supplier as $dsd){
                if($dsd['id']==$control['assigned_to']){
                         $data.='<div class="profile-user-info">
                        <h6 class="mb-0">'.$dsd["supplier_name"].'</h6>
                        <small class="text-muted">';
                        if($dsd['role'] == 10){
                        $data.=''."( Admin )".'';
                         }
                         elseif($dsd['role'] == 11){
                       
                         $data.=''."( Manager )".'';
                         }
                        elseif($dsd['role'] == 0){
                       
                         $data.=''."( Owner )".'';

                        }
                        elseif($dsd['role'] == 12){
                        
                         $data.=''."( Emploee )".'';

                         }
                        else{
                      
                         $data.=''."( Supplier )".'';

                        }
                         $data.='</small>';
                        } }}
                                                                                       $data.='</div>
                                                                                    </div>
                                                                                 </td>';
                                                                                 $data.='<td>'.$control['task_title'].'</td>';
                                                                                 
                                                                                 
                                                                                 $data.='<td>
                                                                                    <div class="d-flex justify-content-start align-items-center mt-2">
                                                                                       <div class="media-aside align-self-center">
                                                                                          <a href="" target="_self" style="width: 32px; height: 32px;">
                                                                                             <div class="avatar bg-light-secondary avatar-sm me-50">
                                                                                                <!--   <span class="avatar-content">pm</span> -->
                                                                                             </div>
                                                                                          </a>
                                                                                       </div>';
                                                                                       
                                                                                      
                                                                                       if(!empty($supplier)){
                                                                                       foreach($supplier as $dsd){
                                                                                       if($dsd['id']==$control['supplier_id']){
                                                                                   
                                                                                        $data.='<div class="profile-user-info">
                                                                                          <h6 class="mb-0">'.$dsd['supplier_name'].'</h6>
                                                                                          <small class="text-muted">';
                                                                                           if($dsd['role'] == 10){
                                                                                         $data.=''."( Admin )".'';
                                                                                          }
                                                                                          elseif($dsd['role'] == 11){
                                                                                         echo "( Manager )";
                                                                                          $data.=''."( Manager )".'';
                                                                                          }
                                                                                         elseif($dsd['role'] == 0){
                       
                                                                                          $data.=''."( Owner )".'';

                                                                                         }
                                                                                         elseif($dsd['role'] == 12){
                        
                                                                                          $data.=''."( Emploee )".'';

                                                                                          }
                                                                                         else{
                      
                                                                                          $data.=''."( Supplier )".'';

                                                                                         }
                                                                                          $data.='</small>';
                                                                                         } }}                                                                 
                                                                                       $data.='</div>
                                                                                       
                                                                                    </div>
                                                                                 </td>
                                                                                 <td class="oooooo"  data-id="'.$control["assign_dis_id"].'"><span class="badge rounded-pill badge-light-success me-1" >Active</span></td>
                                                                                 <td>
                                                                                    <div class="dropdown">
                                                                                       <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                                       <i data-feather="more-vertical"></i>
                                                                                       </button>
                                                                                       <div class="dropdown-menu dropdown-menu-end">
                                                                                          <!--  <a class="dropdown-item" href="#">
                                                                                             <i data-feather="edit-2" class="me-50"></i>
                                                                                             <span>Edit</span>
                                                                                          </a> -->
                                                                                <a class="dropdown-item" data-id="'.$control["id"].'" onclick="RequestDelete(this)">
                                                                                             <i data-feather="trash" class="me-50"></i>
                                                                                             <span>Delete</span>
                                                                                          </a>
                                                                                          <a class="dropdown-item" href="'.base_url("Environment/deleteFootprint")."/".$control["id"].'">
                                                                                             <i data-feather="fa-plus" class="me-50"></i>
                                                                                             <span>Reminder</span>
                                                                                          </a>
                                                                                       </div>
                                                                                    </div>
                                                                                 </td>
                                                                              </tr>';
                                                                             
                                                                              }
                                                                          
                                                                        $data.='</tbody>';
                                                                           }
                                                                     $data.='</table>
                                                                        </div>
                                                                     </div>
                                                            </div>';



echo $data;

}




 public function sidebardata111($id,$idd)
 {
   $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

$MasterSubDis = new MasterSubDis();
$data = $MasterSubDis->where('id',$id)->where('status',1)->first();
$boundary = json_decode($data['boundary_id']);
$listing = json_decode($data['type_option']);
$date_option = $data['date_option'];

// print_r($boundary);
// die();


 $s_date=[
    'success' => $boundary,
    'err' => $date_option,
    'list' => $listing,
]; 
// print_r($s_date);
// die();
return $this->response->setJSON($s_date);


 } 


public function addMoreDataShow($id)
{
 $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
 $option_answer = $db->query("select * from option_Answer  where status=1")->getResultArray();
$MasterSubDis = new MasterSubDis();
$dataaa = $MasterSubDis->where('id',$id)->where('status',1)->first();
$answer_option = json_decode($dataaa['answer_option']);
$data="";

   
         $type_option = json_decode($dataaa['type_option']);
         $answer_option = json_decode($dataaa['answer_option']); 
                                                                             
                

                  $data.='<?php if($all_subdisclosure_id["id"] =='.$id.'){
                    ?><div id="addMoreoption"></div><?php}?>';

echo $data;

}

public function addMoreData($id)
{
 $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }
 $option_answer = $db->query("select * from option_Answer  where status=1")->getResultArray();
 // print_r($option_answer);
 // die();
$MasterSubDis = new MasterSubDis();
$dataaa = $MasterSubDis->where('id',$id)->where('status',1)->first();
$answer_option = json_decode($dataaa['answer_option']);
$data="";
    $data.='<div class="source_form mt-2">
            
               <div class="row">
                  <div class="col-md-3">
                     <p class="pt-1">'.$dataaa['title'].'</p>
                  </div>';
         $type_option = json_decode($dataaa['type_option']);
         $answer_option = json_decode($dataaa['answer_option']); 
                  $swati=$dataaa['title'].$dataaa["id"]; 

                if($type_option){
                    foreach ($type_option as $key1 => $type_option_show) {
                    foreach ($answer_option as $key2 => $answer_option_show) {

                     if($key1 == $key2){ if($type_option_show == '1' || $type_option_show == '2'){ 
                    foreach($option_answer as $option_answer_show){ 
                    if($option_answer_show['id'] == $answer_option_show){ 
                    $optionAnswer = json_decode($option_answer_show['optionAnswer']); 


                  $data.='<div class="col-md-2">
                     <label class="form-label fs-6" for="select2-basic">';

                     if(str_word_count($option_answer_show['answer_name']) >2 ){

                      $data.=''.substr_replace($option_answer_show['answer_name'], "...", 14).'';
                      }else{
                       $data.=''.$option_answer_show['answer_name'].'';
                       } 
                       $data.='</label>
                       <input type="hidden" class="rohitnochance" value="'.$option_answer_show['id'].'">
                       
                     <select  class="form-control listingh'.$option_answer_show["id"].$dataaa["id"].'"  id="energy_list" 
                     name="listhf'.$option_answer_show['id'].'[]" readonly="">
                        <option>Select from list</option>';
                        foreach ($optionAnswer as $key => $optionAnswerShow) {
                       $data.='<option  value="'. $optionAnswerShow.'">'.$optionAnswerShow.'</option>';
                       }
                     $data.='</select>
                  </div>';
                 
           }}}}}}}
                                                                    
                 $data.='<div class="col-md-2">
                     <label class="form-label fs-6">Value</label>
                     <input type="number" id="llll" class="form-control total_number"  placeholder="Value" data-id="'.$dataaa["id"].'"   readonly="">
                  </div>
                  <div class="col-md-1 p-0">
                     <label class="form-label fs-6" for="select2-basic">Unit</label>
                     <input type="number" class="form-control total_number" placeholder="Joules" readonly="">
                  </div>
                  <div class="col-md-2 mt-2 lh">
                     <button type="button" class="btn btn-dark btn-sm  waves-effect"  data-id="'.$dataaa["id"].'" onclick="addSourceDiv(this)"><i class="fa fa-plus"></i></button>
                     <button class="remove_source_block btn btn-sm btn-danger waves-effect" id="delete_hide"><i class="fa-solid fa-xmark"></i></button><div id="delete_show"></div>
                  </div>
               </div>
           
         </div>';

echo $data;
}




// new Environment End
   public function environment($id){

      
  $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        
        $model = new AllAssessmentModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $data['Indicator_id'] = $id;
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

            $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
    
            $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        
            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
    
            $data['employee_details'] = $query->getResultArray();
            
            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
            $data['indicator'] = $db->query("SELECT * FROM `indicator`   where status=1 ")->getResultArray();
            // $data['ghg_name'] = $query->getResultArray();
            
            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
    
            $data['boundary_item'] = $query->getResultArray();

            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
            }
            elseif(session()->supplier_info['role'] == 10){
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                            $ok = $supplier_model->where('id', $sid)->first();
                            $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
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
            $data['u_id'] = $u_id;
            $data['o_id'] = $o_id;
            $data['role'] = session()->supplier_info['role'];

            $brand = new BrandModel();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if(session()->supplier_info['role'] == 0){
                $role = 10;
            }
            else{
                $role = session()->supplier_info['role'];
            }
            $data['pg_nm'] = 'SocialController';
            $data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();
         $indicator_sdg_id = $id;

        $data['indicator_sdg'] = $db->query("select * from indicator_sdg  where status=1 and indicator_id='".$indicator_sdg_id."'")->getResultArray();
        $data['sdg'] = $db->query("select * from sdg  where status=1 ")->getResultArray();
       


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
       
        $data['total_footprint'] = $total_footprint;

        $data['social_indicator']= $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 8 and id='".$id."'")->getResultArray();
        
        $query = $db->query("select * from all_assessment_question as aaq  where aaq.status=1 and aaq.indicator_id='".$id."'");
        $indquestion = $query->getResultArray();
        
        $data['indquestion']=$indquestion;
        $r=$data['social_indicator'][0]['indicator_name'];
        $jid=$data['social_indicator'][0]['id'];
        $data['name']=$r;
       

$query = $db->query("select * from indicator where status=1 and id= '".$jid."'order by id");

        

        $rs = $query->getResultArray();



        $list=array();



        if(!empty($rs)){



            foreach($rs as $r){



                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");



                $cat = $query->getResultArray();



                if(!empty($cat)){$category_name =$cat[0]['indicator_category_name']; }else{$category_name=0;}



                $query = $db->query("select *,s.id as indicator_sdg_id  from indicator_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.indicator_id='".$jid."' and b.status=1 ");



                $sdg = $query->getResultArray();



                $list[]=array('indicator_id'=>$r['id'],'description'=>$r['description'],'indicator_name'=>$r['indicator_name'],'indicator_category_name'=>$category_name,'image'=>$r['image'],'sdg'=>$sdg);   



            }



        }



       $data['list']=$list;
       $role = session()->supplier_info['role'];
       // print_r($role);
       // die();
       $sensor_model = new SensorModel();

       $data['sensor_ele'] = $sensor_model->where('boundary_id',30)->where('supplier_id',$u_id)->findAll();

    if($role == 0 || $role == 10){
      $data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

      $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();

      $data['sub_disc'] = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
      $data['sub_disc1'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1  group by sd.sub_clasification")->getResultArray();
      $data['sub_disc11'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 group by sd.sub_clasification")->getResultArray();

 //  print_r($data['sub_disc1']);
 // die();

       $classification_sub_model = new SubClassificationModel();
     $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();

$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();

$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

$month_end = array("2023-01-31","2023-02-28","2023-03-31","2022-04-30","2022-05-31","2022-06-30","2022-07-31","2022-08-31","2022-09-30","2022-10-31","2022-11-30","2022-12-31");
$month_start = array("2023-01-01","2023-02-01","2023-03-01","2022-04-01","2022-05-01","2022-06-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2022-12-01");

// print_r($month_end);
// die();


$sumNon=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumNon,0);
        }else{
            array_push($sumNon,$summ[0]['data']);
        }
}
// print_r($sumNon);
// die();
$sumRenewable=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}

$data['month_names']=$month_names;
$data['sumNon']=$sumNon;

$data['sumRenewable']=$sumRenewable;

  $energy_managment = new Energy_managment();
   $EnergyConnect = new EnergyConnect();
  $data['NonRenewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->findAll();
  $data['Renewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->findAll();
   
 $data['history_data'] = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();
  $data['connect_data'] =  $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id ")->getResultArray();

  
  // print_r($data['connect_data']);
  // die();

// print_r($u_id);
 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();
// print_r($data['control_data']);
// die();

 $data['request_count'] = count($data['control_data']);

 $energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();


$data['Heating_a']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=2 ")->getResultArray();
$data['Cooling_b']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=3")->getResultArray();
$data['Stream_c']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=4")->getResultArray();
$data['Electricity_d']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ele_con' and status=1 ")->getResultArray();

 $data['Electricity'] = $data['Electricity_d'][0]['data'];
 // print_r($data['Electricity']);
 // die();
 $data['Heating'] = $data['Heating_a'][0]['data'];
 $data['Cooling'] = $data['Cooling_b'][0]['data'];
 $data['Stream'] = $data['Stream_c'][0]['data'];
$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];
// $data['consum_per'] = $total/4;

 $sold_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',2)->first();
 $sold_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',3)->first();
 $sold_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',4)->first();
 $sold_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold')->first();



$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
$data['sold'] = $data['per_electricity_sold'];
// print_r($data['per_electricity_sold']);
// die();
if($data['per_electricity_sold'] == 0)
{
    $data['per_electricity_sold'] = '1';
}
 $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0)
{
    $data['per_Heating_sold'] = '1';
}
 $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0)
{
    $data['per_Coling_sold'] = '1';
}
 $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0)
{
    $data['per_Stream_sold'] = '1';
}
 $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;

// Energy intensity ration 
$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
// $data['sold'] = $total/4;consum_per
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();

$data['energy_product']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=1 ")->getResultArray();

$data['energy_services']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=2 ")->getResultArray();

$data['energy_sales']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=3 ")->getResultArray();

$data['energy_size']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=4 ")->getResultArray();

$data['energy_Employee']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=5 ")->getResultArray();

//energy consumption  Outside 

$data['outside_Purchased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=21 ")->getResultArray();


$data['outside_Capital']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=22 ")->getResultArray();

$data['outside_Fuel']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=23 ")->getResultArray();

$data['outside_Upstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=24 ")->getResultArray();

$data['outside_Waste']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=25 ")->getResultArray();

$data['outside_Business']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=26 ")->getResultArray();

$data['outside_Employees']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=27 ")->getResultArray();

$data['outside_Leased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=28 ")->getResultArray();

$data['outside_Downstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=29 ")->getResultArray();

$data['outside_Processing']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=30 ")->getResultArray();

$data['outside_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=31 ")->getResultArray();

$data['outside_End_of_life']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=32 ")->getResultArray();

$data['outside_Downstreamleased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=33 ")->getResultArray();

$data['outside_Franchises']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=34 ")->getResultArray();

$data['outside_Investments']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=35 ")->getResultArray();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

  $dreduction_energy = $energy_managment->where('sub_e_type','reduction_energy1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($dreduction_energy as $ss)
  {

  }
  $data['reduction'] = $ss['reduction_retio'];

  $energy_intensity = $energy_managment->where('sub_e_type','energy_intensity1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity as $intensity)
  {

  }
  $data['intensityy'] = $intensity['intensity_ratio'];

   $energy_intensity1 = $energy_managment->where('sub_e_type','energy_intensity')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity1 as $intensity1)
  {

  }
  $data['intensity_con'] = $intensity1['energy_con_ratio'];

$data['yes_no'] = $energy_managment->where('sub_e_type','per_achi_trade')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();


}
 if($role == 11){
$data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

    $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();


      $sub_disc = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
     $ControlEnergryModel  = new ControlEnergryModel();
     $dataFetch = $ControlEnergryModel->where('assigned_to',$u_id)->findAll();
     $sub  = new SubDisclosure();
    
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();
     
    
     $sub_dis = [];
     $dis = [];
     foreach ($dataFetch as $key => $value) 
     {
       
        $sub_disclosure1 = $value['sub_disclosure'];
      $ii =  $db->query("SELECT * FROM `sub_disclosure` WHERE  sub_disclosure='".$sub_disclosure1."' group by disclosure_name")->getResultArray();

      $o =  $db->query("SELECT * FROM `sub_disclosure` WHERE  sub_disclosure='".$sub_disclosure1."' group by sub_clasification")->getResultArray();
            array_push($sub_dis,$o[0]);
            array_push($dis,$ii[0]);
     
    
     }

   $data['sub_disc11'] =$sub_dis;
   $data['sub_disc1'] =$sub_dis;
   $data['sub_disc'] =$dis;
     

     

   // print_r($data['sub_disc1']);
   // die();
       $classification_sub_model = new SubClassificationModel();
     $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();

$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();

$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

$month_end = array("2023-01-31","2023-02-28","2023-03-31","2022-04-30","2022-05-31","2022-06-30","2022-07-31","2022-08-31","2022-09-30","2022-10-31","2022-11-30","2022-12-31");
$month_start = array("2023-01-01","2023-02-01","2023-03-01","2022-04-01","2022-05-01","2022-06-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2022-12-01");



$sumNon=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumNon,0);
        }else{
            array_push($sumNon,$summ[0]['data']);
        }
}

$sumRenewable=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}

$data['month_names']=$month_names;
$data['sumNon']=$sumNon;

$data['sumRenewable']=$sumRenewable;

  $energy_managment = new Energy_managment();
  $data['NonRenewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->findAll();
  $data['Renewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->findAll();
   
   $data['history_data'] = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();

 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();

 // print_r($data['control_data']);
 // die();
 $data['request_count'] = count($data['control_data']);
$energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();

 $data['per_electricity'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 $data['consum_per'] = $data['per_electricity'];

 if($data['per_electricity'] == 0){
    $data['per_electricity'] = '1';
}
 $data['Electricity'] = $energy_electricity['value']/$data['per_electricity']*100;
 
 $data['per_Heating'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Heating'] == 0){
    $data['per_Heating'] = '1';
}
 $data['Heating'] = $energy_Heating['value']/$data['per_Heating']*100;

 $data['per_Coling'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Coling'] == 0){
    $data['per_Coling'] = '1';
}
 $data['Cooling'] = $energy_Cooling['value']/$data['per_Coling']*100;

 $data['per_Stream'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Stream'] == 0){
    $data['per_Stream'] = '1';
}
 $data['Stream'] = $energy_Stream['value']/$data['per_Stream']*100;


$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];
// $data['consum_per'] = $total/4;

 $sold_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',2)->first();
 $sold_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',3)->first();
 $sold_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',4)->first();
 $sold_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold')->first();



$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
if($data['per_electricity_sold'] == 0){
    $data['per_electricity_sold'] = '1';
}
 $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0){
    $data['per_Heating_sold'] = '1';
}
 $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0){
    $data['per_Coling_sold'] = '1';
}
 $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0){
    $data['per_Stream_sold'] = '1';
}
 $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;


$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
$data['sold'] = $total/4;
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

    }


  
      
 echo view('brand/environment_indicator_view',$data);


   
    }   
       
    public function environmentt($id){

      
  $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
      

        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        
        $model = new AllAssessmentModel();

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

            $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
    
            $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        
            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
    
            $data['employee_details'] = $query->getResultArray();
            
            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
    
            // $data['ghg_name'] = $query->getResultArray();
             $indicator_sdg_id = '17';
        $data['indicator_sdg'] = $db->query("select * from indicator_sdg  where status=1 and indicator_id='".$indicator_sdg_id."'")->getResultArray();
        $data['sdg'] = $db->query("select * from sdg  where status=1 ")->getResultArray();
        
            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
            $data['indicator'] = $db->query("SELECT * FROM `indicator`   where status=1 ")->getResultArray();
            $data['boundary_item'] = $query->getResultArray();

            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
            }
            elseif(session()->supplier_info['role'] == 10){
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                            $ok = $supplier_model->where('id', $sid)->first();
                            $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
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
            $data['u_id'] = $u_id;
            $data['o_id'] = $o_id;
            $data['role'] = session()->supplier_info['role'];

            $brand = new BrandModel();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if(session()->supplier_info['role'] == 0){
                $role = 10;
            }
            else{
                $role = session()->supplier_info['role'];
            }
            $data['pg_nm'] = 'SocialController';
            $data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();

        
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
       
        $data['total_footprint'] = $total_footprint;

        $data['social_indicator']= $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 8 and id='".$id."'")->getResultArray();
        
        $query = $db->query("select * from all_assessment_question as aaq  where aaq.status=1 and aaq.indicator_id='".$id."'");
        $indquestion = $query->getResultArray();
        
        $data['indquestion']=$indquestion;
        $r=$data['social_indicator'][0]['indicator_name'];
        $jid=$data['social_indicator'][0]['id'];
        $data['name']=$r;
       

$query = $db->query("select * from indicator where status=1 and id= '".$jid."'order by id");



        $rs = $query->getResultArray();



        $list=array();



        if(!empty($rs)){



            foreach($rs as $r){



                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");



                $cat = $query->getResultArray();



                if(!empty($cat)){$category_name =$cat[0]['indicator_category_name']; }else{$category_name=0;}



                $query = $db->query("select *,s.id as indicator_sdg_id  from indicator_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.indicator_id='".$jid."' and b.status=1 ");



                $sdg = $query->getResultArray();



                $list[]=array('indicator_id'=>$r['id'],'description'=>$r['description'],'indicator_name'=>$r['indicator_name'],'indicator_category_name'=>$category_name,'image'=>$r['image'],'sdg'=>$sdg);   



            }



        }



       $data['list']=$list;
       $role = session()->supplier_info['role'];
       // print_r($role);
       // die();
       $sensor_model = new SensorModel();

$data['sensor_ele'] = $sensor_model->where('boundary_id',30)->where('supplier_id',$u_id)->where('current_status',3)->findAll();
// print_r($data['sensor_ele']);
// die();
    if($role == 0 || $role == 10){
      $data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

      $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();

      $data['sub_disc'] = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
      $data['sub_disc1'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1  group by sd.sub_clasification")->getResultArray();
      $data['sub_disc11'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 group by sd.sub_clasification")->getResultArray();

 // print_r($data['sub_disc']);
 // die();
       $classification_sub_model = new SubClassificationModel();
     $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();

$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
// print_r($data['control_environment']);
// die();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();

$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

$month_end = array("2023-01-31","2023-02-28","2023-03-31","2022-04-30","2022-05-31","2022-06-30","2022-07-31","2022-08-31","2022-09-30","2022-10-31","2022-11-30","2022-12-31");
$month_start = array("2023-01-01","2023-02-01","2023-03-01","2022-04-01","2022-05-01","2022-06-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2022-12-01");


$sumNon=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumNon,0);
        }else{
            array_push($sumNon,$summ[0]['data']);
        }
}

$sumRenewable=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}

$data['month_names']=$month_names;
$data['sumNon']=$sumNon;

$data['sumRenewable']=$sumRenewable;

  $energy_managment = new Energy_managment();
   $EnergyConnect = new EnergyConnect();
  
  $data['history_data'] = 
  $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->groupBy('start_date')->groupBy('end_date')->groupBy('sub_e_type')->groupBy('activities')->groupBy('energy_intensity_type')->groupBy('intensity_ratio')->findAll();

  // print_r($data['history_data']);
  // die();
  // print_r($data['history_data']);
  // die();
  // print_r($data['history_data']);
  // die();
  $data['connect_data'] =  $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id and status =1 ")->getResultArray();

  
  // print_r($data['connect_data']);
  // die();

// print_r($u_id);
 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();
// print_r($data['control_data']);
// die();

 $data['request_count'] = count($data['control_data']);

 $energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();

$data['Heating_a']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=2 ")->getResultArray();
$data['Cooling_b']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=3")->getResultArray();
$data['Stream_c']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=4")->getResultArray();
$data['Electricity_d']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ele_con' and status=1 ")->getResultArray();

 $data['Electricity'] = $data['Electricity_d'][0]['data'];

 $data['Heating'] = $data['Heating_a'][0]['data'];
 $data['Cooling'] = $data['Cooling_b'][0]['data'];
 $data['Stream'] = $data['Stream_c'][0]['data'];
 // print_r($data['Electricity']);
 // print_r($data['Heating']);

 // print_r($data['Cooling']);
 // die();

 // print_r($data['Stream']);


//  $data['per_electricity'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
//  $data['consum_per'] = $data['per_electricity'];
//  if($data['per_electricity'] == 0){
//     $data['per_electricity'] = '1';
// }
//  // $data['Electricity'] = $energy_electricity['value'];
 
//  $data['per_Heating'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
//  if($data['per_Heating'] == 0){
//     $data['per_Heating'] = '1';
// }
//  // $data['Heating'] = $energy_Heating['value'];

//  $data['per_Coling'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
//  if($data['per_Coling'] == 0){
//     $data['per_Coling'] = '1';
// }
//  // $data['Cooling'] = $energy_Cooling['value'];

//  $data['per_Stream'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
//  if($data['per_Stream'] == 0){
//     $data['per_Stream'] = '1';
// }
 // $data['Stream'] = $energy_Stream['value'];


$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];

$energy_managment_data = new Energy_managment_data();

$data['base_year_reduction11'] = $energy_managment_data->where('sub_e_type','reduction_energy_base1')->where('status',1)->where('supplier_id',$u_id)->first();
$data['base_year_reduction_requ'] = $energy_managment_data->where('sub_e_type','reduction_energy_base')->where('status',1)->where('supplier_id',$u_id)->first();
// print_r($data['base_year_reduction']);
// die();
// $data['consum_per'] = $total/4;
$data['NonRenewable']=$energy_managment_data->where('sub_e_type','Non-Renewable')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
// print_r($data['NonRenewable']);
// die();
$data['nonkey'] =  array_key_last($data['NonRenewable']);


$data['Renewable']=$energy_managment_data->where('sub_e_type','Renewable')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
 $data['renkey'] =  array_key_last ( $data['Renewable']);
// print_r($i);

$data['Electricity_cons']=$energy_managment_data->where('sub_e_type','ene_con')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
 $data['conkey'] =  array_key_last ( $data['Electricity_cons']);
// print_r($data['conkey']);
// die();
$data['Electricity_so']=$energy_managment_data->where('sub_e_type','sold_a')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
 $data['soldkey'] =  array_key_last ( $data['Electricity_so']);
// print_r($data['soldkey']);
// die();
$data['activity_energyy']=$energy_managment_data->where('sub_e_type','cl_2')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
 $data['activitykey'] =  array_key_last ( $data['activity_energyy']);

// print_r($data['activity_energyy']);
// die();
$data['intencity_energyy']=$energy_managment_data->where('sub_e_type','cl_3')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
 $data['intencitykey'] =  array_key_last ( $data['intencity_energyy']);

$data['reduction_energyyy']=$energy_managment_data->where('sub_e_type','reduction_energy')->where('supplier_id',$u_id)->where('owner_id',$o_id)->where('status',1)->findAll();
$data['reductionkey'] =  array_key_last ( $data['reduction_energyyy']);
 

$data['Heating_a_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='sold_a' and status=1  and energy=2 ")->getResultArray();
$data['Cooling_b_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='sold_a' and status=1  and energy=3")->getResultArray();
$data['Stream_c_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='sold_a' and status=1  and energy=4")->getResultArray();
$data['Electricity_d_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='sold' and status=1 ")->getResultArray();
// print_r($data['Heating_a_sold']);
// die();
$data['Electricity_sold'] = $data['Electricity_d_sold'][0]['data'];
 $data['Heating_sold'] = $data['Heating_a_sold'][0]['data'];
 $data['Cooling_sold'] = $data['Cooling_b_sold'][0]['data'];
 $data['Stream_sold'] = $data['Stream_c_sold'][0]['data'];
// print_r($data['Heating_sold']);
// die();
$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
$data['sold'] = $data['per_electricity_sold'];
if($data['per_electricity_sold'] == 0){
    $data['per_electricity_sold'] = '1';
}
 // $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0){
    $data['per_Heating_sold'] = '1';
}
 // $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0){
    $data['per_Coling_sold'] = '1';
}
 // $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0){
    $data['per_Stream_sold'] = '1';
}
 // $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;

// Energy intensity ration 
$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
// $data['sold'] = $total/4;
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();

$data['energy_product']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=1 ")->getResultArray();

$data['energy_services']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=2 ")->getResultArray();

$data['energy_sales']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=3 ")->getResultArray();

$data['energy_size']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=4 ")->getResultArray();

$data['energy_Employee']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=5 ")->getResultArray();

//energy consumption  Outside 

$data['outside_Purchased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=21 ")->getResultArray();


$data['outside_Capital']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=22 ")->getResultArray();

$data['outside_Fuel']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=23 ")->getResultArray();

$data['outside_Upstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=24 ")->getResultArray();

$data['outside_Waste']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=25 ")->getResultArray();

$data['outside_Business']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=26 ")->getResultArray();

$data['outside_Employees']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=27 ")->getResultArray();

$data['outside_Leased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=28 ")->getResultArray();

$data['outside_Downstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=29 ")->getResultArray();

$data['outside_Processing']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=30 ")->getResultArray();

$data['outside_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=31 ")->getResultArray();

$data['outside_End_of_life']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=32 ")->getResultArray();

$data['outside_Downstreamleased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=33 ")->getResultArray();

$data['outside_Franchises']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=34 ")->getResultArray();

$data['outside_Investments']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=35 ")->getResultArray();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

  $dreduction_energy = $energy_managment->where('sub_e_type','reduction_energy1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($dreduction_energy as $ss)
  {

  }
  $data['reduction'] = $ss['reduction_retio'];

  $energy_intensity = $energy_managment->where('sub_e_type','energy_intensity1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity as $intensity)
  {

  }
  $data['intensityy'] = $intensity['intensity_ratio'];

   $energy_intensity1 = $energy_managment->where('sub_e_type','energy_intensity')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity1 as $intensity1)
  {

  }
  $data['intensity_con'] = $intensity1['energy_con_ratio'];

$data['yes_no'] = $energy_managment->where('sub_e_type','per_achi_trade')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();


}
 if($role == 11){
$data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

    $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();


      $sub_disc = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
     $ControlEnergryModel  = new ControlEnergryModel();
     $dataFetch = $ControlEnergryModel->where('assigned_to',$u_id)->findAll();
     $sub  = new SubDisclosure();
    
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();
     
    
     $sub_dis = [];
     $dis = [];
     foreach ($dataFetch as $key => $value) 
     {
       
        $sub_disclosure1 = $value['sub_disclosure'];
      $ii =  $db->query("SELECT * FROM `sub_disclosure` WHERE  sub_disclosure='".$sub_disclosure1."' group by disclosure_name")->getResultArray();

      $o =  $db->query("SELECT * FROM `sub_disclosure` WHERE  sub_disclosure='".$sub_disclosure1."' group by sub_clasification")->getResultArray();
            array_push($sub_dis,$o[0]);
            array_push($dis,$ii[0]);
     
    
     }

   $data['sub_disc11'] =$sub_dis;
   $data['sub_disc1'] =$sub_dis;
   $data['sub_disc'] =$dis;
     

     

   // print_r($data['sub_disc1']);
   // die();
       $classification_sub_model = new SubClassificationModel();
     $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();

$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();

$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

$month_end = array("2023-01-31","2023-02-28","2023-03-31","2022-04-30","2022-05-31","2022-06-30","2022-07-31","2022-08-31","2022-09-30","2022-10-31","2022-11-30","2022-12-31");
$month_start = array("2023-01-01","2023-02-01","2023-03-01","2022-04-01","2022-05-01","2022-06-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2022-12-01");


$sumNon=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."' ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumNon,0);
        }else{
            array_push($sumNon,$summ[0]['data']);
        }
}

$sumRenewable=array();
foreach($month_names as $ky=> $mname){
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}

$data['month_names']=$month_names;
$data['sumNon']=$sumNon;

$data['sumRenewable']=$sumRenewable;

  $energy_managment = new Energy_managment();
  $data['NonRenewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->findAll();
  $data['Renewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->findAll();
   
$data['history_data'] = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();

 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();

 // print_r($data['control_data']);
 // die();
 $data['request_count'] = count($data['control_data']);
$energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();

 $data['per_electricity'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 $data['consum_per'] =  $data['per_electricity'];
 if($data['per_electricity'] == 0){
    $data['per_electricity'] = '1';
}
 $data['Electricity'] = $energy_electricity['value']/$data['per_electricity']*100;
 
 $data['per_Heating'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Heating'] == 0){
    $data['per_Heating'] = '1';
}
 $data['Heating'] = $energy_Heating['value']/$data['per_Heating']*100;

 $data['per_Coling'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Coling'] == 0){
    $data['per_Coling'] = '1';
}
 $data['Cooling'] = $energy_Cooling['value']/$data['per_Coling']*100;

 $data['per_Stream'] = $energy_Heating['value']+$energy_Cooling['value']+$energy_Stream['value']+$energy_electricity['value'];
 if($data['per_Stream'] == 0){
    $data['per_Stream'] = '1';
}
 $data['Stream'] = $energy_Stream['value']/$data['per_Stream']*100;


$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];
// $data['consum_per'] = $total/4;

 $sold_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',2)->first();
 $sold_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',3)->first();
 $sold_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',4)->first();
 $sold_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold')->first();



$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
$data['sold'] = $data['per_electricity_sold'];
if($data['per_electricity_sold'] == 0){
    $data['per_electricity_sold'] = '1';
}
 $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0){
    $data['per_Heating_sold'] = '1';
}
 $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0){
    $data['per_Coling_sold'] = '1';
}
 $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0){
    $data['per_Stream_sold'] = '1';
}
 $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;


$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
// $data['sold'] = $total/4;
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

    }

 $data['fin_yeardate']=$this->request->getVar('financialyear');
  $data['f_year'] = $data['fin_yeardate'];
 $y=$session->get('finTear',$data['f_year']);
// print_r($session->get('finTear'));
// print_r($y['finTear']);
// print_r($data['f_year']);
  
//       die();
 echo view('brand/environment_indicator_view',$data);


   
    }
public function getNonren($id)
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];

$energy_managment = new Energy_managment();
  $NonRenewable = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->where('energy',$id)->where('status',1)->findAll();
  
 // print_r($NonRenewable);
 // die();
 $s_date=[
    'success' => $NonRenewable,
];   


  return $this->response->setJSON($s_date);

}
public function commuting()
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  $consumption = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('status',1)->findAll();
  // print_r($consumption);
  // die();
 
 $s_date=[
    'success' => $consumption,
];   


  return $this->response->setJSON($s_date);

}
public function outside_activity()
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  $outside_activity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','cl_2')->where('status',1)->findAll();
  // print_r($consumption);
  // die();
 
 $s_date=[
    'success' => $outside_activity,
];   


  return $this->response->setJSON($s_date);

}
public function intensity_re()
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  $outside_activity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','cl_3')->where('status',1)->findAll();
  // print_r($consumption);
  // die();
 
 $s_date=[
    'success' => $outside_activity,
];   


  return $this->response->setJSON($s_date);

}
public function redesign_show()
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  $outside_activity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','reduction_energy')->where('status',1)->findAll();
  // print_r($consumption);
  // die();
 
 $s_date=[
    'success' => $outside_activity,
];   


  return $this->response->setJSON($s_date);

}
public function sold_ene()
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  $sold = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('status',1)->findAll();
  // print_r($consumption);
  // die();
 
 $s_date=[
    'success' => $sold,
];   


  return $this->response->setJSON($s_date);

}

public function getren($id)
{
  $db = \Config\Database::connect();
        $session = session();

    $supplier_info = $session->get('supplier_info');
    $u_id = $supplier_info['supplier_id'];
$energy_managment = new Energy_managment();
  
  $Renewable = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->where('energy',$id)->where('status',1)->findAll();
 
 $s_date=[
    'success' => $Renewable,
];   


  return $this->response->setJSON($s_date);

}

    public function standard($id){

      
  $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        
        $model = new AllAssessmentModel();

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

            $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
    
            $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        
            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
    
            $data['employee_details'] = $query->getResultArray();
            
            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
    
            // $data['ghg_name'] = $query->getResultArray();
            
            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
    
            $data['boundary_item'] = $query->getResultArray();
            $data['indicator'] = $db->query("SELECT * FROM `indicator`   where status=1 ")->getResultArray();

            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
            }
            elseif(session()->supplier_info['role'] == 10){
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                            $ok = $supplier_model->where('id', $sid)->first();
                            $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
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
            $data['u_id'] = $u_id;
            $data['o_id'] = $o_id;
            $data['role'] = session()->supplier_info['role'];

            $brand = new BrandModel();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if(session()->supplier_info['role'] == 0){
                $role = 10;
            }
            else{
                $role = session()->supplier_info['role'];
            }
            $data['pg_nm'] = 'SocialController';
            $data['roleAllow'] = $brand->where('brand_name',$data['pg_nm'])->where('role_id',$role)->where('plan_id',$ok['supplier_plan_id'])->first();

        
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
       
        $data['total_footprint'] = $total_footprint;

        $data['social_indicator']= $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 8 and id='".$id."'")->getResultArray();
        
        $query = $db->query("select * from all_assessment_question as aaq  where aaq.status=1 and aaq.indicator_id='".$id."'");
        $indquestion = $query->getResultArray();
        
        $data['indquestion']=$indquestion;
        $r=$data['social_indicator'][0]['indicator_name'];
        $jid=$data['social_indicator'][0]['id'];
        $data['name']=$r;
       
 $indicator_sdg_id = $id;
        $data['indicator_sdg'] = $db->query("select * from indicator_sdg  where status=1 and indicator_id='".$indicator_sdg_id."'")->getResultArray();
        $data['sdg'] = $db->query("select * from sdg  where status=1 ")->getResultArray();
$query = $db->query("select * from indicator where status=1 and id= '".$jid."'order by id");



        $rs = $query->getResultArray();



        $list=array();



        if(!empty($rs)){



            foreach($rs as $r){



                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");



                $cat = $query->getResultArray();



                if(!empty($cat)){$category_name =$cat[0]['indicator_category_name']; }else{$category_name=0;}



                $query = $db->query("select *,s.id as indicator_sdg_id  from indicator_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.indicator_id='".$jid."' and b.status=1 ");



                $sdg = $query->getResultArray();



                $list[]=array('indicator_id'=>$r['id'],'description'=>$r['description'],'indicator_name'=>$r['indicator_name'],'indicator_category_name'=>$category_name,'image'=>$r['image'],'sdg'=>$sdg);   



            }



        }



       $data['list']=$list;
       $role = session()->supplier_info['role'];
       // print_r($role);
       // die();
       $sensor_model = new SensorModel();
        $data['Indicator_id'] = $id;
    $sensor_model = new SensorModel();
    $Data_electricityModel = new Data_electricityModel();
    $data['sensor_ele'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',3)->where('energy_status',1)->findAll();

    // $data['sensor_notConnect'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',2)->findAll();
   // $data['sensor_notConnect'] = $sensor_model->where('status',1)->where('supplier_id',$u_id)->where('current_status',2)->findAll();

   $energy_managment = new Energy_managment();
   $data['site_connect'] = $energy_managment->where('status',1)->where('connect',1)->where('supplier_id',$u_id)->findAll();
   $data['SensorData'] = $sensor_model->where('status',1)->where('energy_status',2)->where('supplier_id',$u_id)->findAll();
   $standard_id = $this->request->getVar('id');
   $data['standard_id'] = $this->request->getVar('id');
   $data['filter_id']  = $this->request->getVar('id');
// print_r($standard_id);
// die();
// $data['sensor_ele'] = $sensor_model->where('boundary_id',30)->where('supplier_id',$u_id)->findAll();
    if($role == 0 || $role == 10)
    {
      
      $data['list_indicat'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1")->getResultArray();

      $data['listt'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();

      $data['sub_disc'] = $db->query("select sd.* from sub_disclosure as sd where sd.status=1  group by sd.disclosure_name")->getResultArray();
      $data['sub_disc1'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1  group by sd.sub_clasification")->getResultArray();
      $data['sub_disc11'] = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 group by sd.sub_clasification")->getResultArray();


// print_r($standard_id);
      $masterDisclosure = new MasterSubDis();
      $data['disclosure_id_show'] =  $masterDisclosure->where('status',1)->groupBy('disclosure_id')->findAll();
      $data['sub_disclosure_show'] =  $masterDisclosure->where('status',1)->groupBy('sub_disclosure_id')->findAll();
    

      $data['disclosure_show'] = $db->query("select * from disclosure  where status=1 and indicator_id=".$id."")->getResultArray();
      $data['disclosure_showg'] = $db->query("select * from disclosure  where status=1 and indicator_id=".$id." and standard_id=".$standard_id."")->getResultArray();

      // print_r($data['disclosure_show']);
      // die();

      $data['subdisclosure_show'] = $db->query("select * from sub_disclosure  where status=1")->getResultArray();

      $subdisclosure_show= $db->query("select * from sub_disclosure  where status=1")->getResultArray();

      $data['option_answer'] = $db->query("select * from option_Answer  where status=1")->getResultArray();




  foreach ($data['disclosure_showg'] as $key => $value) 
    {
          $dis =  json_decode($value['sub_classification_id']);

          foreach($dis as $yy)
          {
            $jj = json_encode($yy);
// print_r($jj); echo '<pre>';

$all_subdisclosure[] =  $masterDisclosure->where('status',1)->like('sub_clasifiction',$jj)->orderBy('id','DESC')->findAll();

 

          }

    }
  


$month_name_show=array();
 $arr=0;

foreach ($all_subdisclosure as $key => $value) 
{


foreach($value as $cgk){
$month_name_show[] = $cgk;
$month_name_show[$arr++];
}


}

 $processed_ids = array(); // initialize array to store processed IDs

foreach ($month_name_show as $item) {
    if (!in_array($item, $processed_ids))
    { // check if ID has already been processed process data here
      
        
        $processed_ids[] = $item; // add processed ID to array
    }
}



for ($i = 0; $i < sizeof($processed_ids); ++$i) {
            for ($j = $i + 1; $j < sizeof($processed_ids); ++$j) {
                if ($processed_ids[$i]['id'] > $processed_ids[$j]['id']) {
                    $a = $processed_ids[$i];
                    $processed_ids[$i] = $processed_ids[$j];
                    $processed_ids[$j] = $a;
                }
            }
        }
// print_r($processed_ids);
// die();
// foreach ($processed_ids as $key => $value) 
// {
//     asort($value);


// print_r($value);
   
// }
// die();
// // ksort()





      $data['all_subdisclosure'] =  $processed_ids;

     // print_r($data['all_subdisclosure']);
     // die();

    $classification_sub_model = new SubClassificationModel();
    $data['sub_clasi'] = $classification_sub_model->where('status',1)->findAll();


$data['site'] = $db->query("SELECT * FROM `supplier_assessment` WHERE (supplier_id = $u_id or owner_id = $o_id) and assessment_id=12")->getResultArray();
 
$data['control_environment']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and (supplier_id = $u_id or owner_id = $o_id) ORDER BY `id` DESC")->getResultArray();
$data['control_environment1']= $db->query("SELECT * FROM `control_environment` WHERE status=1 and supplier_id = $u_id and task_title='total electricity consumed in the organisation'")->getResultArray();
 // print_r($data['control_environment']);
 // die();
// print_r($data['control_environment']);
$data['supplier']= $db->query("SELECT * FROM `supplier`  ")->getResultArray();
// print_r($data['supplier']);
// die();


$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
$month_end   = array("1","2","3","4","5","6","7","8","9","10","11","12");


$jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;

$summ= $db->query("SELECT * FROM `energy_managment`  WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Non-Renewables' and status=1  ")->getResultArray();
foreach ($summ as $key => $valueId) 
      {

$kk = json_decode($valueId['monthly_name']);

         foreach ($kk as $key => $value_mon) 
         {
             if($value_mon==1){$jan+=$valueId['value'];}
             if($value_mon==2){$feb+=$valueId['value'];}
             if($value_mon==3){$mar+=$valueId['value'];}
             if($value_mon==4){$apr+=$valueId['value'];}
             if($value_mon==5){$may+=$valueId['value'];}
             if($value_mon==6){$jun+=$valueId['value'];}
             if($value_mon==7){$jul+=$valueId['value'];}
             if($value_mon==8){$aug+=$valueId['value'];}
             if($value_mon==9){$sep+=$valueId['value'];}
             if($value_mon==10){$oct+=$valueId['value'];}
             if($value_mon==11){$nov+=$valueId['value'];}
             if($value_mon==12){$dec+=$valueId['value'];}
     }
     }
     $tarnon[]=$jan;$tarnon[]=$feb;$tarnon[]=$mar;$tarnon[]=$apr;$tarnon[]=$may;
     $tarnon[]=$jun;$tarnon[]=$jul;$tarnon[]=$aug;$tarnon[]=$sep;$tarnon[]=$oct;
     $tarnon[]=$nov;$tarnon[]=$dec;
     // print_r($tarnon);
     $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;

$summ= $db->query("SELECT * FROM `energy_managment_data`  WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewables ' and status=1  ")->getResultArray();
foreach ($summ as $key => $valueId) 
      {

$kk = json_decode($valueId['monthly_name']);

        foreach ($kk as $key => $value_mon) 
    {
             if($value_mon==1){$jan+=$valueId['value'];}
             if($value_mon==2){$feb+=$valueId['value'];}
             if($value_mon==3){$mar+=$valueId['value'];}
             if($value_mon==4){$apr+=$valueId['value'];}
             if($value_mon==5){$may+=$valueId['value'];}
             if($value_mon==6){$jun+=$valueId['value'];}
             if($value_mon==7){$jul+=$valueId['value'];}
             if($value_mon==8){$aug+=$valueId['value'];}
             if($value_mon==9){$sep+=$valueId['value'];}
             if($value_mon==10){$oct+=$valueId['value'];}
             if($value_mon==11){$nov+=$valueId['value'];}
             if($value_mon==12){$dec+=$valueId['value'];}
    }

    }

     $tarRenewables[]=$jan;$tarRenewables[]=$feb;$tarRenewables[]=$mar;$tarRenewables[]=$apr;$tarRenewables[]=$may;
     $tarRenewables[]=$jun;$tarRenewables[]=$jul;$tarRenewables[]=$aug;$tarRenewables[]=$sep;$tarRenewables[]=$oct;
     $tarRenewables[]=$nov;$tarRenewables[]=$dec;
 

$data['fuel_dis'] = $db->query("SELECT sum(em.value) as data FROM `energy_managment`as em  WHERE (sub_e_type = 'Non-Renewables' or sub_e_type = 'Renewables')  and supplier_id=$u_id  and owner_id=$o_id and  status=1  ")->getResultArray();


$connect_total = $db->query("SELECT * FROM `energy_managment`  WHERE connect=1  and supplier_id=$u_id  and owner_id=$o_id and  status=1  ")->getResultArray();

$total = 0;
foreach ($connect_total as $key => $value) 
{  
    $val = $value['value'];
   
     $total += $val;
      
   

}

$data['total_connet'] = $total;





$sumRenewable=array();
foreach($month_names as $ky=> $mname)
{
    $summ= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='Renewable' and status=1  and start_date <='".$month_end[$ky]." ' and start_date >='".$month_start[$ky]."'  ")->getResultArray();
        // echo $db->getLastQuery($summ); ;
        if($summ[0]['data']==NUll){
             array_push($sumRenewable,0);
        }else{
            array_push($sumRenewable,$summ[0]['data']);
        }
}


$data['month_names']=$month_names;
$data['sumNon']=$tarnon;

$data['sumRenewable']=$tarRenewables;

  $energy_managment = new Energy_managment();
 
   $EnergyConnect = new EnergyConnect();
  $data['NonRenewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->findAll();
  $data['Renewable'] = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','Renewable')->findAll();
   
 $data['history_data'] = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();
  $data['connect_data'] =  $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id ")->getResultArray();

  
  
 $control =  new ControlEnergryModel();
 $data['control_data'] = $control->where('assigned_to',$u_id)->where('status',1)->findAll();
 $data['assign'] = $control->where('owner_id',$u_id)->where('status',1)->findAll();
// print_r($data['control_data']);
// die();

 $data['request_count'] = count($data['control_data']);

 $energy_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',2)->first();
 $energy_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',3)->first();
 $energy_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ene_con')->where('energy',4)->first();
 $energy_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','ele_con')->first();


$data['Heating_a']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=2 ")->getResultArray();
$data['Cooling_b']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=3")->getResultArray();
$data['Stream_c']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ene_con' and status=1  and energy=4")->getResultArray();
$data['Electricity_d']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='ele_con' and status=1 ")->getResultArray();

 $data['Electricity'] = $data['Electricity_d'][0]['data'];
 // print_r($data['Electricity']);
 // die();
 $data['Heating'] = $data['Heating_a'][0]['data'];
 $data['Cooling'] = $data['Cooling_b'][0]['data'];
 $data['Stream'] = $data['Stream_c'][0]['data'];
$total =  $data['Heating']+$data['Cooling']+$data['Stream']+$data['Electricity'];
// $data['consum_per'] = $total/4;

 $sold_Heating = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',2)->first();
 $sold_Cooling = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',3)->first();
 $sold_Stream = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold_a')->where('energy',4)->first();
 $sold_electricity = $energy_managment->where('supplier_id',$u_id)->where('sub_e_type','sold')->first();



$data['per_electricity_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
$data['sold'] = $data['per_electricity_sold'];
// print_r($data['per_electricity_sold']);
// die();
if($data['per_electricity_sold'] == 0){
    $data['per_electricity_sold'] = '1';
}
 $data['Electricity_sold'] = $sold_electricity['value']/$data['per_electricity_sold']*100;
 
 $data['per_Heating_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Heating_sold'] == 0){
    $data['per_Heating_sold'] = '1';
}
 $data['Heating_sold'] = $sold_Heating['value']/$data['per_Heating_sold']*100;

 $data['per_Coling_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
  if($data['per_Coling_sold'] == 0){
    $data['per_Coling_sold'] = '1';
}
 $data['Cooling_sold'] = $sold_Cooling['value']/$data['per_Coling_sold']*100;

 $data['per_Stream_sold'] = $sold_Heating['value']+$sold_Cooling['value']+$sold_Stream['value']+$sold_electricity['value'];
 if($data['per_Stream_sold'] == 0){
    $data['per_Stream_sold'] = '1';
}
 $data['Stream_sold'] = $sold_Stream['value']/$data['per_Stream_sold']*100;

// Energy intensity ration 
$total =  $data['Heating_sold']+$data['Cooling_sold']+$data['Stream_sold']+$data['Electricity_sold'];
// $data['sold'] = $total/4;consum_per
 
 $data['employee_assign'] = $supplier_model->where('owner_id',$o_id)->findAll();
 $standard_model = new StandardModel();
$data['standard'] = $standard_model->where('status',1)->findAll();

$data['energy_product']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=1 ")->getResultArray();

$data['energy_services']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=2 ")->getResultArray();

$data['energy_sales']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=3 ")->getResultArray();

$data['energy_size']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=4 ")->getResultArray();

$data['energy_Employee']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_3' and status=1  and energy_intensity_type=5 ")->getResultArray();

//energy consumption  Outside 

$data['outside_Purchased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=21 ")->getResultArray();


$data['outside_Capital']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=22 ")->getResultArray();

$data['outside_Fuel']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=23 ")->getResultArray();

$data['outside_Upstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=24 ")->getResultArray();

$data['outside_Waste']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=25 ")->getResultArray();

$data['outside_Business']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=26 ")->getResultArray();

$data['outside_Employees']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=27 ")->getResultArray();

$data['outside_Leased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=28 ")->getResultArray();

$data['outside_Downstream']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=29 ")->getResultArray();

$data['outside_Processing']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=30 ")->getResultArray();

$data['outside_sold']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=31 ")->getResultArray();

$data['outside_End_of_life']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=32 ")->getResultArray();

$data['outside_Downstreamleased']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=33 ")->getResultArray();

$data['outside_Franchises']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=34 ")->getResultArray();

$data['outside_Investments']= $db->query("SELECT sum(em.value) as data  FROM `energy_managment` as em WHERE supplier_id=$u_id  and owner_id=$o_id and sub_e_type ='cl_2' and status=1  and activities=35 ")->getResultArray();

$datatotalr= $db->query("SELECT sum(em.value) as datarenonall ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and (sub_e_type ='Non-Renewable' || sub_e_type ='Renewable') and status=1")->getResultArray();
 $data['A'] = $datatotalr[0]['datarenonall'];

 $datarnonOver11= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ene_con' and status=1")->getResultArray();

  $datarnonOver12= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'ele_con' and status=1")->getResultArray();

  $data['B'] = $datarnonOver11[0]['data']+$datarnonOver12[0]['data'];

$datarnonOver_sold= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold' and status=1")->getResultArray();
$datarnonOver_sold1= $db->query("SELECT sum(em.value) as data ,em.* FROM `energy_managment` as em WHERE supplier_id=$u_id  and sub_e_type = 'sold_a' and status=1")->getResultArray();
  $data['C'] = $datarnonOver_sold[0]['data']+$datarnonOver_sold1[0]['data'];

  $dreduction_energy = $energy_managment->where('sub_e_type','reduction_energy1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($dreduction_energy as $ss)
  {

  }
  $data['reduction'] = $ss['reduction_retio'];

  $energy_intensity = $energy_managment->where('sub_e_type','energy_intensity1')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity as $intensity)
  {

  }
  $data['intensityy'] = $intensity['intensity_ratio'];

   $energy_intensity1 = $energy_managment->where('sub_e_type','energy_intensity')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();
  foreach($energy_intensity1 as $intensity1)
  {

  }
  $data['intensity_con'] = $intensity1['energy_con_ratio'];

$data['yes_no'] = $energy_managment->where('sub_e_type','per_achi_trade')->where('supplier_id',$u_id)->where('owner_id',$o_id)->findAll();


}
  $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

            $data['boundary_item'] = $query->getResultArray();


 $data['f_year'] ='2022';
 $data['units'] = $db->query("select * from unit where status=1")->getResultArray();
 $data['category_units'] = $db->query("select * from category_unit where status=1")->getResultArray();
      $ava = $db->query("select * from sub_units where sub_unit_name='".$subunit_name."' and status=1")->getResultArray();
$data['subunits'] =   $db->query("SELECT unit.unit_name,sub_units.* FROM sub_units JOIN unit ON unit.id = sub_units.unit_id WHERE sub_units.status = 1")->getResultArray();



$energy_managment_data = new Energy_managment_data();

$reload_data_id =  $energy_managment_data->select('data_id')->where('supplier_id',$u_id)->where('status',1)->groupBy('data_id')->findAll();



foreach ($reload_data_id as $key => $value) 
{
$reload_environemnt_id[] = $value['data_id']; 
}

$data['reload_data_id'] = json_encode($reload_environemnt_id);



$reload_subdisclosure_id =  $energy_managment_data->select('sub_disclosure_id')->where('supplier_id',$u_id)->where('status',1)->groupBy('sub_disclosure_id')->findAll();

foreach ($reload_subdisclosure_id as $key => $value) 
{

$reload_sub_id[] = $value['sub_disclosure_id']; 

}

$data['reload_sub_id'] = json_encode($reload_sub_id);
 echo view('brand/standard_environment_view',$data);



   

    }



 public function control_environment_submit(){    
        
        $db = \Config\Database::connect();
        
        $encrypter = \Config\Services::encrypter();

        $supplier = new SupplierModel();


        $session = session();

        $supplier_info = $session->get('supplier_info');

        $priority = $this->request->getVar("priority");

        $due_date = $this->request->getVar("due_date");

        $comment = $this->request->getVar("comment");
        
        $frequency = $this->request->getVar("frequency");

        $assigned_to = $this->request->getVar("assign_to");

        $indicator = $this->request->getVar("indicator");
        $monthly_name = json_encode($this->request->getVar("monthly_name"));
        $monthly = $this->request->getVar("monthly_name");
        
        $site = $this->request->getVar("site");
        $sub_boundary = json_encode($site);

        $start_date = $this->request->getVar("Start_date");
        $end_date = $this->request->getVar("End_date");
     
        $disclosure_id = $this->request->getVar("disclose_id");
        $sub_disclosure = $this->request->getVar("sub_disclosure");
        $disclosure_name = $this->request->getVar("disclosure_name");
        $assign_dis_id = $this->request->getVar("assign_dis_id");
                                                                      

         
        $boundary = $this->request->getVar("boundary");
        $task_title = $this->request->getVar("task_title");
       
        $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
         if(session()->supplier_info['role'] == 0){
            $u_id = session()->supplier_info['supplier_id'];
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "Environment task assign you go and check";
            $for = $assigned_to;
        }
        elseif(session()->supplier_info['role'] == 10){
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "Environment task assign you go and check";
            $for = $assigned_to;
        }
        else{
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id']; 
            $msg = "Environment task assign you go and check";
            $for = $assigned_to;
        }

// print_r($site);
// die();

$control_environment = new ControlEnergryModel();
$same_month_vali = $control_environment->where('status',1)->where('supplier_id',$u_id)->where('sub_disclosure',$sub_disclosure)->first();
$site_mat = $same_month_vali['sub_boundary'];

// if($same_month_vali)
// {



// }else
// {
// echo 'insert';
// }         
//      die();     
$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);
// print_r($uniq_spl_chr);
// die();
       
// print_r($o_id);
// print_r($u_id);
// die();


 $energy =  new  Energy_managment();
$k = json_encode($site);
foreach ($site as $key => $site_id) 
{
$ggg = $energy->where('status',1)->where('supplier_id',$u_id)->like('site_id',$site_id)->where('sub_disclosure_id','29')->findAll();
if($ggg)
{
foreach ($monthly as  $month) 
{
$month_data = $energy->where('status',1)->where('supplier_id',$u_id)->like('site_id',$site_id)->like('monthly_name',$month)->findAll();
if(!$month_data)
{

$site_id_data = array($site_id);
$site_c_id = json_encode($site_id_data);

$mon = array($month);
$month_no = json_encode($mon);

$data = [
'task_title' =>$task_title,
'supplier_id' =>$supplier_info['supplier_id'],
'assigned_to' =>$assigned_to,
'uniq_spl' =>$uniq_spl_chr,
'indicator' =>$indicator,
'sub_boundary' =>$site_c_id,
'owner_id' =>$o_id,
'start_date' =>date("Y-m-d"),
'disclosure_name' =>$disclosure_name,
'sub_disclosure' =>$sub_disclosure,
'disclosure_id' =>$disclosure_id,
'monthly' =>$month_no,
'frequency' =>$frequency,
];


$control_assessment = $control_environment->insert($data);

}

else
{
$s_date = ['error' => 'This Month Site Already Connect'];
              
return $this->response->setJSON($s_date);
}

}

}
else
{

$site_id_data = array($site_id);
$site_c_id = json_encode($site_id_data);

$data = [
'task_title' =>$task_title,
'supplier_id' =>$supplier_info['supplier_id'],
'assigned_to' =>$assigned_to,
'uniq_spl' =>$uniq_spl_chr,
'indicator' =>$indicator,
'sub_boundary' =>$site_c_id,
'owner_id' =>$o_id,
'start_date' =>date("Y-m-d"),
'disclosure_name' =>$disclosure_name,
'sub_disclosure' =>$sub_disclosure,
'disclosure_id' =>$disclosure_id,
'monthly' =>$monthly_name,
'frequency' =>$frequency,
];

$control_assessment = $control_environment->insert($data);

}

}


 
// print_r($task_title);

    
   


    //email start
     $ava = $db->query("select * from supplier where id='".$assigned_to."' ");
            $ava = $ava->getResultArray();
       $supp_id = $supplier_info['supplier_id'];
       $supplier_info = $db->query("SELECT * FROM supplier where id=$supp_id")->getResultArray();
       $department = $supplier_info[0]['department'];
        
      $receiptemail=$ava[0]['email'];
      $detail = $supplier->where('id',$o_id)->first();
      $image = $detail['image'];
      $s_name = $ava[0]['supplier_name'];  
      //$department = $detail['department'];
      $supplier_name = $detail['supplier_name'];
      $role = $detail['role'];
         if ($role == '10' || $role == '0') {
             $role_name = 'Admin';
         }
         if ($role == '11') {
             $role_name = 'Manager';
         }
         if ($role == '12') {
             $role_name = 'Employee';
         }
          if ($role == '13') {
             $role_name = 'Supplier';
         }


    
    if($control_assessment){ 

        $noti = new UserNotification();
        $data = [
            'owner_id' => $o_id,
            'created_by' => $u_id,
            'msg' => $msg,
            'link' => 'Environment',
            'for_y' => $for
        ];
        // print_r($data);
        // die();
        $noti->insert($data);
    
    
      $session->setFlashdata('success','Assessment has been saved successfully');
    
    
}else{ 
      $session->setFlashdata('error',' Not Save');
}
    

$ava = $db->query("select * from supplier where id='".$assigned_to."' ");  

        $ava = $ava->getResultArray();
        
        
$receiptemail=$ava[0]['email'];

     $image1 =   base_url("/").'/public/profilimg/'.$image;

         $t=time();
      $msg_assign.='<html><body>';
      $msg_assign.='<div style="margin: 0 auto;width: 600px;font-family: "Google Sans";"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:15px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$s_name.'</h3><p style="margin-top:0px;margin-bottom:13px";>A new data request has been assign from</p><img src="'.$image1.'" style="height:50px; width:50px; border-radius:10px;"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">'.$supplier_name.'</p><p style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</p><p style="margin-bottom:13px; margin-top:13px;">For '.$sub_disclosure.' Task on<b style="font-size:15px;"> POSITIIVPLUS</b></p><a href="https://user.positiivplus.io/Environment/environmentt/17" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png"></a></div></div></div>';
        $msg_assign.='</body></html>';
    
                    $email = \Config\Services::email();
        



                    $email->setFrom('info@positiivplus.io', 'Assigned Task');



                    $email->setTo($receiptemail);



                    // $email->mailType(html);   



                    $email->setSubject('SUB: You have a new task!');



                    $email->setMessage($msg_assign);



                    $a = $email->send();
    $s_date = ['success' => 'Data update SuccessFully'];

                    
  return $this->response->setJSON($s_date);


    }

public function connect()
    {

$rs = check_session();
    if(!$rs) {
            return redirect()->to('home/user_login');
        }
    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
    if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];
    }
  $site_id =   $this->request->getVar('site');
  // $start_date = $this->request->getVar('Start_date');
  // $end_date = $this->request->getVar('End_date');
  $monthly_name = json_encode($this->request->getVar('monthly_name'));
  $monthly = $this->request->getVar('monthly_name');


foreach($site_id as $hk)
{

$elec_id[] = str_replace(",","",strpbrk($hk,",")); 
$site_idm[] = str_replace(strpbrk($hk,","),"",$hk); 

}


$t=time();
$date = date("Y-m-d:h-i-s:A",$t);


$SensorModel = new SensorModel();
$Data_electricityModel = new Data_electricityModel();

// print_r($elec_id);
// die();

foreach($elec_id as $senId)
{

$data = 
[
    'energy_status'=>2,
    'energy_date'=>$date,
];

$SensorModel->update($senId,$data);

}
// die();

foreach ($site_idm as $key => $site_id) 
{

$ele[] = $db->query("SELECT * FROM `sensors` as s JOIN data_electricity as de on de.electricity_id=s.id WHERE  s.`supplier_id`=$u_id AND s.`status`=1   AND s.`subboundary_id`=$site_id")->getResultArray();

}


foreach ($ele as $key => $value) 
{
   foreach($value as $dd){
    $jhf[] = $dd['consume_unit'];
    // print_r($jhf);
   }
  
}


$kkkk = json_encode($site_idm);
$control_environment = new ControlEnergryModel();

$site =$site_idm[0];
$consume_unit = $jhf[0];
// print_r($consume_unit);
// die();

$connect = new Energy_managment();
$energy_managment_data = new Energy_managment_data();

$connect_data = $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id ")->getResultArray();

  foreach($connect_data as $f)
  {

  }
 $start =  $f['start_date'];
 $end = $f['end_date'];


$sensor_model = new SensorModel();
$Data_electricityModel = new Data_electricityModel();




foreach ($site_idm as $key => $site_id) 
{

foreach($elec_id as $eleId){

$id_site = json_encode($site_id);
$mon = array($site_id);
$site_iii = json_encode($mon);
// $assign_monh = $control_environment->where('status',1)->where('supplier_id',$u_id)->like('sub_boundary',$id_site)->where('sub_disclosure','29')->findAll();
$repeat_site =  $connect->where('status',1)->where('supplier_id',$u_id)->where('site_id',$site_iii)->findAll();



if(!$repeat_site){
$Sensorvalue = $Data_electricityModel->where('status',1)->where('electricity_id', $eleId)->first();

$consume_unit = $Sensorvalue['consume_unit']; 
$monthly = $Sensorvalue['monthly_name']; 
   $data = [
   'supplier_id'=>$u_id,
   'owner_id'=>$o_id,
   'disclosure_id'=>$this->request->getVar('disclosure_name'),
   'sub_disclosure_id'=>$this->request->getVar('sub_disclosure'),
   'sub_class_id'=>$this->request->getVar('classi'),
   'site_id'=>$site_iii,
   'title'=>$this->request->getVar('task_title'),
   'value'=>$consume_unit,
   'connect'=>'1',
   'monthly_name'=>$monthly,
   'sensorId'=>$eleId,
   'indicator_id'=>$this->request->getVar('indicator'),
     ];
     
   $insert = $connect->insert($data);

   $data1 = [
   'supplier_id'=>$u_id,
   'owner_id'=>$o_id,
   'disclosure_id'=>$this->request->getVar('disclosure_name'),
   'sub_disclosure_id'=>$this->request->getVar('sub_disclosure'),
   'sub_class_id'=>$this->request->getVar('classi'),
   'site_id'=>$site_iii,
   'title'=>$this->request->getVar('task_title'),
   'value'=>$consume_unit,
   'monthly_name'=>$monthly,
   'sensorId'=>$eleId,

     ];

   $energy_managment_data->insert($data1);
        
    }
    } 

    
}

 
if($insert)
{

$connect_value = $connect->select('value')->where('status',1)->where('connect',1)->where('supplier_id',$u_id)->findAll();


$sum = [];
$value= 0;
foreach($connect_value as $value_to)
{

$value_encode = $value_to['value'];
$value_data = $value_encode;
// print_r($ckgj);
$sum[] = $value_data;
$sum[$value++]=$value_data;

}

$value_sum = array_sum($sum);

 

$s_date = ['success' => 'Data update SuccessFully',
'value' => $value_sum
];
}
else
{ 
$s_date = ['error' => 'Not update'];
}

return $this->response->setJSON($s_date);



    }

public function energy_bulk_delete($id){


$rs = check_session();
    if(!$rs) {
            return redirect()->to('home/user_login');
        }
    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
    if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];
    }
  
  $id = $id;

$Energy = new Energy_managment();
$second_Energy = new Energy_managment_data();

$second_Energy_data = $second_Energy->where('id',$id)->where('supplier_id',$u_id)->where('status',1)->first();

$sub_type = $second_Energy_data['sub_e_type'];
$type = $second_Energy_data['type'];
$energy = $second_Energy_data['energy'];
$activities = $second_Energy_data['activities'];
$intensity_type = $second_Energy_data['energy_intensity_type'];
$reduction_type = $second_Energy_data['reduction_type'];
 

if($sub_type == 'cl_2'){

$first_table_data = $Energy->where('supplier_id',$u_id)->where('status',1)->where('sub_e_type',$sub_type)->where('activities',$activities)->findAll();

}
elseif($sub_type == 'cl_3'){
$first_table_data = $Energy->where('supplier_id',$u_id)->where('status',1)->where('sub_e_type',$sub_type)->where('energy_intensity_type',$intensity_type)->findAll();

}
elseif($sub_type =='reduction_energy'){

$first_table_data =  $Energy->where('status',1)->where('sub_e_type',$sub_type)->where('reduction_type',$reduction_type)->where('supplier_id',$u_id)->findAll();
// print_r($update_data);
 }
 else{
$first_table_data = $Energy->where('supplier_id',$u_id)->where('status',1)->where('sub_e_type',$sub_type)->where('type',$type)->where('energy',$energy)->findAll();

}


$data = [

'status'=> 0 
];

$data1 = [

'status'=> 0 
];


foreach($first_table_data as $delete_first)
{
    $first_table_id = $delete_first['id'];

 $delete = $Energy->update($first_table_id,$data);

} 

 $delete1 = $second_Energy->update($id,$data1);
 


   

   if($delete)
   {

     $s_date = ['success' => 'Data update SuccessFully'];
if($sub_type == 'cl_2'){

$session->setFlashdata('delete1','Record delete success');

}
elseif($sub_type == 'cl_3'){

$session->setFlashdata('delete2','Record delete success');
}
elseif($sub_type =='reduction_energy'){

$session->setFlashdata('delete3','Record delete success');
// print_r($update_data);
 }
 else{
$session->setFlashdata('delete4','Record delete success');

}
     
     $session->setFlashdata('finTear','2022');

    
    }
else{ 
      $s_date = ['error' => 'Not update'];
     $session->setFlashdata('finTear','2022');


   }
  

return $this->response->setJSON($s_date);

   // return redirect()->to('Environment/environmentt/17');


    }

  public function record_delete($id){

// print_r($id);
// die();
$rs = check_session();
    if(!$rs) {
            return redirect()->to('home/user_login');
        }
    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
    if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];
    }
  
 
 // print_r($id);
 // die();

$Energy = new Energy_managment();
$energy_managment_data = new Energy_managment_data();

$energy_data = $Energy->where('status',1)->where('id',$id)->where('supplier_id',$u_id)->first();

$history_energy = $energy_data['energy'];
$create_date = $energy_data['created_at'];
$energy_data_date = $Energy->where('status',1)->where('created_at',$create_date)->where('supplier_id',$u_id)->findAll();


$history_type = $energy_data['type'];
$history_sub_type = $energy_data['sub_e_type'];

$site_id = $energy_data['site_id'];

$energy_history_delete = $Energy->where('status',1)->where('energy',$history_energy)->where('supplier_id',$u_id)->where('type',$history_type)->where('sub_e_type',$history_sub_type)->where('site_id',$site_id)->where('id',$id)->findAll();



$supplier = $db->query("SELECT * FROM `supplier` ")->getResultArray();
$value = $energy_data['value'];
$type = $energy_data['type'];
$energy = $energy_data['energy'];
$sub_type = $energy_data['sub_e_type'];
$site_id = $energy_data['site_id'];

$connect_id = $energy_data['connect'];

if($connect_id == '1')
{

$energy_managment_delete = $energy_managment_data->where('supplier_id',$u_id)->where('status',1)->where('site_id',$site_id)->first();

}
else
{

$energy_managment_delete =
$energy_managment_data->where('supplier_id',$u_id)->where('status',1)->where('sub_e_type',$sub_type)->where('type',$type)->where('energy',$energy)->first();

}

// print_r($energy_managment_delete);

$second_table_id = $energy_managment_delete['id'];
$second_table_value = $energy_managment_delete['value'];

// die();
if(is_numeric($value))
{
$second_table_new_value = $second_table_value-$value;
}

$data = 
[
'status'=> 0 
];


if($second_table_new_value == 0)
{

$data1 = [
'value'=> $second_table_new_value,
'status'=> 0 
];

}
else
{

 $data1 = [
'value'=> $second_table_new_value
];

}

foreach ($energy_history_delete as $key => $value)
{

   $del_id = $value['id'];
   $delete = $Energy->update($del_id,$data);
}

   
   $second_table_delete = $energy_managment_data->update($second_table_id,$data1);


if($delete)
{

    $s_date = ['success' => 'Data update SuccessFully'];
   
}
else
{ 

      $s_date = ['error' => 'Not update'];

}
  

$energy_managment = new Energy_managment();
$history_data = $energy_managment->where('supplier_id',$u_id)->where('status',1)->orderBy('id', 'desc')->findAll();

$supplier= $db->query("SELECT * FROM `supplier` ")->getResultArray();

$data="";

    $data.='<div class="row p-0" id="table-borderless">
            <div class="col-12 p-0">
            <div class="table-responsive">
            <table class="table table-borderless">
            <thead>
            <tr>
            <th>S NO.</th>
            <th>Task Title</th>
            <th>Delete</th>
            <th>Actions</th>
            </tr>
            </thead>
    <tbody>';
             $sno=0; foreach($history_data as $control){
             $data.='<tr>
            <td>'.++$sno.'</td>
            <td class="text-dark">'.$control["title"].'data has been entered By<br>';
           
            foreach($supplier as $dsd){
            if($dsd["id"]==$control["supplier_id"]){
            $data.=''.$dsd["supplier_name"].''; 
             }}
              $data.= ''."On".''; 
            $data.= ''.$control["created_at"].'';   $data.= ''."   ".''; $data.= ''.$control["value"].'';  $data.= ''."Joules  Unit".''; 
            $data.='</td>
            <td> <button type="button" class="btn btn-danger btn-sm  waves-effect" 
            data-id="'.$control['data_id'].'"
            data-value="'.$control['value'].'"
            data-mainid="'.$control['id'].'" onclick="Non_deleted_history(this)">
                 <i class="fa-solid fa-xmark"></i></button></td>
                <td  onclick="getSubDisclosureoninfoproce('.$control['id'].')" ><i class="fa-solid fa-eye"></i></td></tr>';
            }
                $data.='</tbody> 
                </table>
                        </div>
                        </div>
                        </div>';



echo $data;





    }

public function sideboundary_data($id)
{

$rs = check_session();
    if(!$rs) {
            return redirect()->to('home/user_login');
        }
    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
    if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];
    }
  
 $modal =  new MasterSubDis();
  
$data = $modal->where('id',$id)->where('status',1)->first();
$boundary = $data['boundary_select'];
$date_option = $data['date_option'];
$boundary_id = json_decode($data['boundary_id']);

$data_show = 
[
'boundary'=>$boundary,
'date'=>$date_option,
'site'=>$boundary_id,
];
 return $this->response->setJSON($data_show); 

}

 public function fuel($id)
 {


    $rs = check_session();
    if(!$rs) 
        {
            return redirect()->to('home/user_login');
        }

    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
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

    $model = new Energy_managment();

   
 $site_filter = $model->where('supplier_id',$u_id)->where('id',$id)->first();



 $site_start = $site_filter['start_date'];
 $site_end = $site_filter['end_date'];
 $site_type = $site_filter['sub_e_type'];
 $activities = $site_filter['energy_intensity_type'];
 $MasterSubDis_id = $site_filter['data_id'];
 $connect_id = $site_filter['connect'];

 $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
 $boundary_item = $query->getResultArray();


$all_site = $model->where('supplier_id',$u_id)->where('sub_e_type',$site_type)->where('status',1)->findAll();
$all_intencity = $model->where('supplier_id',$u_id)->where('start_date',$site_start)->where('end_date',$site_end)->where('sub_e_type',$site_type)->where('energy_intensity_type',$activities)->where('status',1)->findAll();


     $data_fetch = $model->where('supplier_id',$u_id)->where('id',$id)->findAll();
     // print_r($data_fetch);
     // die();
     foreach($data_fetch as $data_type)
     {
        
      
     }

  $type = $data_type['sub_e_type'];
  $create_date = $data_type['created_at'];

 $data_fetchdd = $model->where('supplier_id',$u_id)->where('created_at',$create_date)->findAll();
 
   $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

   $sub_boundary_item = $query->getResultArray();

  $supplier = $supplier_model->where('status',1)->orwhere('status',2)->orwhere('status',0)->findAll();


$masterDisclosure = new MasterSubDis();

$option_type_id = $masterDisclosure->where('status',1)->where('id',$MasterSubDis_id)->first();

$answer_option = json_decode($option_type_id['answer_option']);
$optionModal =  new OptionAnswerModel();
if($connect_id == '1')
{

 $data="";
    $data.='<table class="table table-bordered table-hover"><tr><th>Sno </th><th>Created By</th><th>Site</th><th>Value </th><th>Unit </th><th>Month</th></tr>';
    $sno=1;
    // print_r($data_fetch);
   foreach($data_fetch as $id)
   {

 $value =  $id['value'];
 $site_id =  json_decode($id['site_id']);
 $value_unit = $value;
$monthly_data = json_decode($id['monthly_name']);
$site = $site_id[0];
 

  foreach($supplier as $u_id){
   if($u_id['id'] == $id['supplier_id']){  
 
    $data.='<tr>';
     $data.='<td>'.$sno++.'</td>';
     $data.='<td>';
     $data.='<div class="media">';

     $data.='<div class="media-aside align-self-center">';
     $data.='<a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">';
     $data.='<span class="b-avatar-img">';
     $data.='<img src="'.base_url("/").'/public/profilimg/'.$u_id['image'].'" alt="avatar">';
     $data.='</span>';
     $data.='</a>';
     $data.='</div>';
     $data.='<div class="media-body">';
     $data.='<a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">'.$u_id['supplier_name'].'
       </a></div></div></td>';
    

     $data.='<td>'; foreach($sub_boundary_item as $key => $value) 
      {


     if($value['id'] == $site)
{
$data.=''.$value['cp_name'].' , ';

}



}
$data.='</td>';
     $data.='<td>'.$value_unit.'</td>';
     $data.='<td>'.'joules'.'</td>';
     $data.='<td>';

    foreach($monthly_data  as $month_id)
    { 
    if($month_id == '1')
    {
       $data.='January,'; 
    }if($month_id == '2')
    {
       $data.='February,'; 
    }if($month_id == '3')
    {
       $data.='March,'; 
    }if($month_id == '4')
    {
       $data.='April,'; 
    }if($month_id == '5')
    {
       $data.='May,'; 
    }if($month_id == '6')
    {
       $data.='June,'; 
    }if($month_id == '7')
    {
       $data.='July,'; 
    }if($month_id == '8')
    {
       $data.='August,'; 
    }if($month_id == '9')
    {
       $data.='September,'; 
    }if($month_id == '10')
    {
       $data.='October,'; 
    }if($month_id == '11')
    {
       $data.='November,'; 
    }if($month_id == '12')
    {
       $data.='December'; 
    }

     
    }
    $data.='</td>';

    $data.='</tr>';
    }
                            

}
}
echo $data;

}

else
{


foreach ($answer_option as $key => $value) 
{ 

  $optionTitle =  $optionModal->where('status',1)->where('id',$value)->first();
  $tite_name[] =   $optionTitle['answer_name'];

}



    $data="";
    $data.='<table class="table table-bordered table-hover"><tr><th>Sno </th><th>Created By</th><th>Boundary</th><th>Sub-Boundary</th><th>Source list</th>';
   foreach($tite_name as $titlename){
     $data.='<th>'.$titlename.'</th>';
}
   

     $data.='<th>Value </th><th>Unit </th><th>Month</th></tr>';
    $sno=1;
    
   foreach($data_fetch as $id)
   {

    foreach ($boundary_item as $key => $value) 
    {
      if($value['id'] == $id['boundary_id'])
      {
        $site = $value['item_name'];
      }  
    }
$energy_list = json_decode($id['energy']);
$monthly_data = json_decode($id['monthly_name']);

 

  foreach($supplier as $u_id){
   if($u_id['id'] == $id['supplier_id']){  
 
    $data.='<tr>';
     $data.='<td>'.$sno++.'</td>';
     $data.='<td>';
     $data.='<div class="media">';

     $data.='<div class="media-aside align-self-center">';
     $data.='<a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">';
     $data.='<span class="b-avatar-img">';
     $data.='<img src="'.base_url("/").'/public/profilimg/'.$u_id['image'].'" alt="avatar">';
     $data.='</span>';
     $data.='</a>';
     $data.='</div>';
     $data.='<div class="media-body">';
     $data.='<a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">'.$u_id['supplier_name'].'
       </a></div></div></td>';
     $data.='<td>'.$site.'</td>';
     $data.='<td>';

    foreach($sub_boundary_item as $key => $value) 
      {

 foreach($data_fetchdd as $key => $value1) 
 {
     if($value['id'] == $value1['site_id'])
{
$data.=''.$value['cp_name'].' , ';

}

}

}

     $data.='</td>';
     $data.='<td>'.$id['sub_e_type'].'</td>';

     foreach($energy_list as $energy_list_id){   
     $data.='<td>'.$energy_list_id.'</td>';
    
    }
    
     $data.='<td>'.$id['value'].'</td>';
     $data.='<td>'.'joules'.'</td>';
     $data.='<td>';

    foreach($monthly_data  as $month_id)
    { 
    if($month_id == '1')
    {
       $data.='January,'; 
    }if($month_id == '2')
    {
       $data.='February,'; 
    }if($month_id == '3')
    {
       $data.='March,'; 
    }if($month_id == '4')
    {
       $data.='April,'; 
    }if($month_id == '5')
    {
       $data.='May,'; 
    }if($month_id == '6')
    {
       $data.='June,'; 
    }if($month_id == '7')
    {
       $data.='July,'; 
    }if($month_id == '8')
    {
       $data.='August,'; 
    }if($month_id == '9')
    {
       $data.='September,'; 
    }if($month_id == '10')
    {
       $data.='October,'; 
    }if($month_id == '11')
    {
       $data.='November,'; 
    }if($month_id == '12')
    {
       $data.='December'; 
    }

     
    }
    $data.='</td>';

    $data.='</tr>';
    }
                            

}
}
echo $data;
}



    }
    public function fuell($id){
// https://user.positiivplus.io/Environment/fuel

    $rs = check_session();
    if(!$rs) {
            return redirect()->to('home/user_login');
        }
    $db = \Config\Database::connect();
    $session = session();
    $supplier_model = new SupplierModel();
    $supplier_info = $session->get('supplier_info');
    $supplier_id = $supplier_info['supplier_id'];
    if(session()->supplier_info['role'] == 0){
        $o_id = session()->supplier_info['supplier_id'];
        $u_id = session()->supplier_info['supplier_id'];
    }else{
        $u_id = session()->supplier_info['supplier_id'];
        $find = $supplier_model->where('id',$u_id)->first();
        $o_id = $find['owner_id'];
    }

    $model = new Energy_managment();
    $data_fetch =  $db->query("SELECT * FROM `energy_connect` WHERE  supplier_id =$u_id and id = $id")->getResultArray();
     
     foreach($data_fetch as $data_type)
     {
        
      
     }
$type = json_decode($data_type['site_id']);
foreach ($type as $key => $value) {
    
}


   $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1" );

   $sub_boundary_item = $query->getResultArray();
  $supplier = $supplier_model->where('status',1)->orwhere('status',2)->orwhere('status',0)->findAll();
  if($type == 'energy_intensity1'){
     $data="";
    $data.='<table class="table table-bordered table-hover"><tr><th>Sno </th><th>Created By</th><th>Energy</th></tr>';
    $sno=1;
   foreach($data_fetch as $id)
   {
   
     $int =$id['intensity_ratio'];

   
   
   
  foreach($supplier as $u_id){
   if($u_id['id'] == $id['supplier_id']){
   
      

    $data.='<tr>';
     $data.='<td>'.$sno++.'</td>';
     $data.='<td>';
     $data.='<div class="media">';

     $data.='<div class="media-aside align-self-center">';
     $data.='<a href="" class="b-avatar badge-light-info rounded-circle" target="_self" style="width: 32px; height: 32px;">';
     $data.='<span class="b-avatar-img">';
     $data.='<img src="'.base_url("/").'/public/uploads/owner/john.jpg" alt="avatar">';
     $data.='</span>';
     $data.='</a>';
     $data.='</div>';
     $data.='<div class="media-body">';
    $data.='<a href="" class="fw-bolder d-block text-nowrap text-dark" target="_self">'.$u_id['supplier_name'].'
       </a></div></div></td>';
    
     $data.='<td>'.$int.'</td>';

                                    $data.='</tr>';
                            }
                        

}}
echo $data;
  }
}


  public function create(){


    $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
 $db = \Config\Database::connect();

        $session = session();
        $supplier_model = new SupplierModel();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

         if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

        $model = new Energy_managment();
        $model_data = new Energy_managment_data();

 $fin_yeardate='2022';

 $session->setFlashdata('finTear','2022');
 $session->setFlashdata('fin_yeardate','2022');


$type_name = $this->request->getVar('type_name');

$disclosure_id = $this->request->getVar('disclose_id');
$sub_disclosure_id = $this->request->getVar('sub_dis');
$data_fetch = 
$model->where('supplier_id',$u_id)->where('sub_e_type','Non-Renewable')->first();
$end_date = $this->request->getVar('end_period');
$start_date = $this->request->getVar('start_period');
$boundary = $this->request->getVar('boundary');
$site = $this->request->getVar('site');
$indicator_id = $this->request->getVar('indicator_id');



if($site){
foreach($site as $val)
{
 $site_namefake = explode("/",$val); 
  $site_id[] =  $site_namefake[0];
}
$site=$site_id;
}else{
 $site =array('0');   
}



$energy = $this->request->getVar('energy');
$data_id = $this->request->getVar('data_id');
$frequency = $this->request->getVar('frequency');
$monthly_name = json_encode($this->request->getVar('monthly_name'));

// print_r($monthly_name);
if(empty($energy)){
    $energy = array("");
}

$activities = $this->request->getVar('activities');
$energy_inten_type = $this->request->getVar('energy_inten_type');
$reduction_type = $this->request->getVar('reduction_type');
$sub_type = $this->request->getVar('type_name');
$type = $this->request->getVar('type');
$month_non = date('M',$start_date);
$month_ren = date('M',$start_date);
$file = $this->request->getfile('image');
$date1 = $model->where('sub_e_type','Non-Renewable')->where('supplier_id',$u_id)->first();
$start =  $date1['start_date'];
$date_non = date('M',$start);        
$model1 = new Energy_managment();
$title =  $this->request->getVar('title');
$boun = $this->request->getVar('site');
$so = json_encode($boun);


$control_model =  new ControlEnergryModel();
$control_complete = $control_model->where('status',1)->where('assigned_to',$u_id)->where('task_title',$title)->first();

if($control_complete){

     $ava = $db->query("select * from supplier where id='".$control_complete['owner_id']."' ");
     $ava = $ava->getResultArray();
       
      $noti_asiign = $db->query("select * from supplier where id='".$u_id."' ")->getResultArray();

       // print_r($noti_asiign);
      // die();

      $name  = $noti_asiign[0]['supplier_name'];    
      $email = $noti_asiign[0]['email'];    
      $role  = $noti_asiign[0]['role'];    
      $department = $noti_asiign[0]['department'];    
      $image = $noti_asiign[0]['image'];        
      $admin_mail = $ava[0]['email'];
      $admin_name = $ava[0]['supplier_name'];
      $admin_role = $ava[0]['role'];
      

      $role = $detail['role'];
         if ($role == '10' || $role == '0') {
             $role_name = 'Admin';
         }
         if ($role == '11') {
             $role_name = 'Manager';
         }
         if ($role == '12') {
             $role_name = 'Employee';
         }
          if ($role == '13') {
             $role_name = 'Supplier';
         }

    $msg = 'Your assign task completed by "'.$name.'"';
    $for = $control_complete['owner_id'];
   

        $noti = new UserNotification();
        $data = [
            'owner_id' => $o_id,
            'created_by' => $supplier_info['supplier_id'],
            'msg' => $msg,
            'link' => 'Environment',
            'for_y' => $for
        ];
        $noti->insert($data);
    
    
      $session->setFlashdata('success','Assessment has been saved successfully');
    

     $image1 =   base_url("/").'/public/profilimg/'.$image;

         $t=time();
      $msg_assign.='<html><body>';
      $msg_assign.='<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello '.$admin_name.'</h3><h5 style="margin-top:0px;margin-bottom:13px";>A data request has been recorded successfully from</h5>
        <img src="'.$image1.'" style="height:50px; width:50px; border-radius:10px;"/>
      <h5 style="margin-bottom:0px; margin-top:13px;">'.$name.'</h5><h5 style="margin-bottom:0px; margin-top:13px;">'.$role_name.'&nbsp;'.$department.'</h5><h5 style="margin-bottom:13px; margin-top:13px;">For '.$title.' Task on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/Environment/environmentt/17"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC<div style="float: right; margin-top: 5px;
    font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</span></div></div></div></div>';
        $msg_assign.='</body></html>';
       


                    $email = \Config\Services::email();



                    $email->setFrom('info@positiivplus.io', 'Complete Task');



                    $email->setTo($admin_mail);



                    // $email->mailType(html);   



                    $email->setSubject('SUB: You have a new task!');



                    $email->setMessage($msg_assign);



                    $a = $email->send();
}



$model = new Energy_managment();
$model_data = new Energy_managment_data();
$month = json_decode($monthly_name);
$energy_old  = json_encode($energy);

$repeat_data = $model->where('status',1)->findAll();
$count_repaet_data = count($repeat_data);

// print_r($site);
$hyper=count($site);
// echo $hyper;
$bounceback = $this->request->getVar('value');
$bounceback1 = $this->request->getVar('value');


if($site)
{
foreach($site as $s_id)
{

$site_fil =  $model->where('sub_e_type',$this->request->getVar('type_name'))->where('supplier_id',$u_id)->where('energy',$energy_old)->where('status',1)->where('site_id',$s_id)->findAll(); 
$update_data = $model_data->where('sub_e_type',$this->request->getVar('type_name'))->where('supplier_id',$u_id)->where('energy',$energy_old)->where('status',1)->first();

   
 $update_data_id = $update_data['id'];
if($site_fil)
{

foreach ($month as $key => $mon_fi) {

  $month_filt = $model->like('monthly_name',$mon_fi)->where('sub_e_type',$this->request->getVar('type_name'))->where('supplier_id',$u_id)->where('energy',$energy_old)->where('status',1)->findAll(); 

  

if(!$month_filt)
{


$mon = array($mon_fi);
$l = json_encode($mon);
if($file->isValid()){
           $ext = $file->getClientExtension();
           $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");
            if(in_array($ext,$ava_ext)){
            $newName = $file->getRandomName();
             $file_size = $file->getSizeByUnit('mb'); 
            $file->move('public/energy_img',$newName);

}
}
else
{
    $newName = '';
}

$data=[
         'supplier_id'=>$u_id,
         'owner_id'=>$o_id,
         'financial_year'=>$finYear,
         'sub_disclosure_id'=>$this->request->getVar('sub_dis'),
         'sub_class_id'=>$this->request->getVar('sub_clasii'),
         'disclosure_id'=>$this->request->getVar('disclose_id'),
         'energy'=>json_encode($energy),
         'type'=>$this->request->getVar('type'),
         'value'=>$this->request->getVar('value'),
         'unit'=>'11',
         'boundary_id'=>$this->request->getVar('boundary'),
         'site_id'=>$s_id,
         'comment'=>$this->request->getVar('comment'),
         'start_date'=>$this->request->getVar('start_period'),
         'end_date'=>$this->request->getVar('end_period'),
         'sub_e_type'=>$this->request->getVar('type_name'),
         'q1_comment'=>$this->request->getVar('comment'),
         'q2_comment'=>$this->request->getVar('comment1'),
         'activities'=>$this->request->getVar('activities'),
         'energy_intensity_type'=>$this->request->getVar('energy_inten_type'),
         'intensity_ratio'=>$energy_ratio,
         'energy_con_ratio'=>$energy_con_ratio,
         'reduction_type'=>$this->request->getVar('reduction_type'),
         'reduction_retio'=>$reduction_retio,
         'base_year'=>$this->request->getVar('base_year'),
         'title'=>$this->request->getVar('title'),
         'yes_no'=>$this->request->getVar('yes_no'),
         'image'=>$newName,
         'data_id'=>$data_id,
         'frequency'=>$frequency,
         'monthly_name'=>$l,
         'indicator_id'=>$indicator_id,
        ];

     $old_value = $update_data['value'];
     // $new_value = $this->request->getVar('value');
     $new_value = $bounceback;
     $value = $old_value+$new_value;
     $bounceback='0';

        $data1=[
         'supplier_id'=>$u_id,
         'owner_id'=>$o_id,
         'financial_year'=>$finYear,
         'sub_disclosure_id'=>$this->request->getVar('sub_dis'),
         'sub_class_id'=>$this->request->getVar('sub_clasii'),
         'disclosure_id'=>$this->request->getVar('disclose_id'),
         'energy'=>json_encode($energy),
         'type'=>$this->request->getVar('type'),
         'value'=>$value,
         'unit'=>'11',
         'boundary_id'=>$this->request->getVar('boundary'),
         'site_id'=>$s_id,
         'comment'=>$this->request->getVar('comment'),
         'start_date'=>$this->request->getVar('start_period'),
         'end_date'=>$this->request->getVar('end_period'),
         'sub_e_type'=>$this->request->getVar('type_name'),
         'q1_comment'=>$this->request->getVar('comment'),
         'q2_comment'=>$this->request->getVar('comment1'),
         'activities'=>$this->request->getVar('activities'),
         'energy_intensity_type'=>$this->request->getVar('energy_inten_type'),
         'intensity_ratio'=>$energy_ratio,
         'energy_con_ratio'=>$energy_con_ratio,
         'reduction_type'=>$this->request->getVar('reduction_type'),
         'reduction_retio'=>$reduction_retio,
         'base_year'=>$this->request->getVar('base_year'),
         'title'=>$this->request->getVar('title'),
         'yes_no'=>$this->request->getVar('yes_no'),
         'image'=>$newName,
         'data_id'=>$data_id,
          'frequency'=>$frequency,
         'monthly_name'=>$l,
        ];

         $model_doc = new DocumentModel();
         $doc_name = 'Energy Managment';
         
       $img =  $model_doc->insert(['supplier_id'=>$u_id,'action_id'=>'1','image'=>$newName,'status'=>1,'document_type_id'=>'19','document_name'=>$doc_name,'file_size'=>$file_size,'date'=>date('Y-m-d')]);

      $insert = $model1->insert($data);


 if(empty($update_data))
{
 $energy_managment_data = $model_data->insert($data1);
}
else
{  
 $energy_managment_data = $model_data->update($update_data_id,$data1);
}


}


}

}
else
{

if($file->isValid()){
           $ext = $file->getClientExtension();
           $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");
            if(in_array($ext,$ava_ext)){
            $newName = $file->getRandomName();
             $file_size = $file->getSizeByUnit('mb'); 
            $file->move('public/energy_img',$newName);

}
}
else
{
    $newName = '';
}

$data=[
         'supplier_id'=>$u_id,
         'owner_id'=>$o_id,
         'financial_year'=>$finYear,
         'sub_disclosure_id'=>$this->request->getVar('sub_dis'),
         'sub_class_id'=>$this->request->getVar('sub_clasii'),
         'disclosure_id'=>$this->request->getVar('disclose_id'),
         'energy'=>json_encode($energy),
         'type'=>$this->request->getVar('type'),
         'value'=>$this->request->getVar('value'),
         'unit'=>'11',
         'boundary_id'=>$this->request->getVar('boundary'),
         'site_id'=>$s_id,
         'comment'=>$this->request->getVar('comment'),
         'start_date'=>$this->request->getVar('start_period'),
         'end_date'=>$this->request->getVar('end_period'),
         'sub_e_type'=>$this->request->getVar('type_name'),
         'q1_comment'=>$this->request->getVar('comment'),
         'q2_comment'=>$this->request->getVar('comment1'),
         'activities'=>$this->request->getVar('activities'),
         'energy_intensity_type'=>$this->request->getVar('energy_inten_type'),
         'intensity_ratio'=>$energy_ratio,
         'energy_con_ratio'=>$energy_con_ratio,
         'reduction_type'=>$this->request->getVar('reduction_type'),
         'reduction_retio'=>$reduction_retio,
         'base_year'=>$this->request->getVar('base_year'),
         'title'=>$this->request->getVar('title'),
         'yes_no'=>$this->request->getVar('yes_no'),
         'image'=>$newName,
         'data_id'=>$data_id,
         'frequency'=>$frequency,
         'monthly_name'=>$monthly_name,
         'indicator_id'=>$indicator_id,

        ];
       
     
     $old_value = $update_data['value'];
     // $new_value = $this->request->getVar('value');
     $new_value = $bounceback1;
     $value = $old_value+$new_value;
        $bounceback1='0';
        $data1=[
         'supplier_id'=>$u_id,
         'owner_id'=>$o_id,
         'financial_year'=>$finYear,
         'sub_disclosure_id'=>$this->request->getVar('sub_dis'),
         'sub_class_id'=>$this->request->getVar('sub_clasii'),
         'disclosure_id'=>$this->request->getVar('disclose_id'),
         'energy'=>json_encode($energy),
         'type'=>$this->request->getVar('type'),
         'value'=>$value,
         'unit'=>'11',
         'boundary_id'=>$this->request->getVar('boundary'),
         'site_id'=>$s_id,
         'comment'=>$this->request->getVar('comment'),
         'start_date'=>$this->request->getVar('start_period'),
         'end_date'=>$this->request->getVar('end_period'),
         'sub_e_type'=>$this->request->getVar('type_name'),
         'q1_comment'=>$this->request->getVar('comment'),
         'q2_comment'=>$this->request->getVar('comment1'),
         'activities'=>$this->request->getVar('activities'),
         'energy_intensity_type'=>$this->request->getVar('energy_inten_type'),
         'intensity_ratio'=>$energy_ratio,
         'energy_con_ratio'=>$energy_con_ratio,
         'reduction_type'=>$this->request->getVar('reduction_type'),
         'reduction_retio'=>$reduction_retio,
         'base_year'=>$this->request->getVar('base_year'),
         'title'=>$this->request->getVar('title'),
         'yes_no'=>$this->request->getVar('yes_no'),
         'image'=>$newName,
         'data_id'=>$data_id,
          'frequency'=>$frequency,
         'monthly_name'=>$monthly_name,
        ];


         $model_doc = new DocumentModel();
         $doc_name = 'Energy Managment';
         $title = $this->request->getVar('type_name');
         
         
      $img =  $model_doc->insert(['supplier_id'=>$u_id,'action_id'=>'1','image'=>$newName,'title'=>$title,'status'=>1,'document_type_id'=>'19','document_name'=>$doc_name,'file_size'=>$file_size,'date'=>date('Y-m-d')]);

 $insert = $model1->insert($data);


 if(empty($update_data))
{
 $energy_managment_data = $model_data->insert($data1);
}
else
{  
 $energy_managment_data = $model_data->update($update_data_id,$data1);
}

}

}

}


$repeat_data1 = $model->where('status',1)->findAll();
$count_repaet_data1 = count($repeat_data1);

$All_data = $model_data->where('status',1)->where('supplier_id',$u_id)->findAll();

if($count_repaet_data1 == $count_repaet_data)
{
$s_date = ['error' => 'Record Not insert'];
 return $this->response->setJSON($s_date); 
}
else
{
$s_date = ['success' => 'Record SuccessFully insert'];
 return $this->response->setJSON($s_date);   
}
// die();

$type_show =   $this->request->getVar('type_uniq_name');
// print_r($type_show);
// die();
if($type_show == 'dis_1'){

$session->setFlashdata('success','Record saved successfully'); 
}elseif($type_show == 'dis_2')
{

$session->setFlashdata('success_two','Record saved successfully'); 

}
elseif($type_show == 'dis_3')
{

$session->setFlashdata('success_three','Record saved successfully'); 

}
elseif($type_show == 'dis_4')
{

$session->setFlashdata('success_fourth','Record saved successfully'); 

}
elseif($type_show == 'dis_5')
{

$session->setFlashdata('success_five','Record saved successfully'); 

}elseif($type_show == 'dis_6')
{

$session->setFlashdata('success_six','Record saved successfully'); 

}





// return redirect()->to('Environment/newenvironment/17');
// return redirect()->to('Environment/standard/17');

    }

    public function AllcreateRecord($y)
{

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

    $energy_managment_data_model = new Energy_managment_data();
    $energy_managment_data =  $energy_managment_data_model->where('supplier_id',$u_id)->where('status',1)->where('sub_e_type',$y)->findAll();
  
$data="";
foreach($energy_managment_data as $data_show){
    $data.='<div class="source_form'.$data_show['id'].' mt-2 pb-1">
            
               <div class="row">
                  <div class="col-md-3">
                     <p class="pt-1">'.$data_show['sub_e_type'].'</p>
                  </div>';
         
                $list = json_decode($data_show['energy']); 

                $count = count($list);
             foreach($list as $key=> $ll)
 {
    if($count == '1'){
        if($ll){
          $data.='<div class="col-md-2">
                    <label></label>
                     
                  </div>';  
        }
    }

     if($ll == ""){
   $data.='<div class="col-md-2">
         <label></label>
          </div>'; $data.='<div class="col-md-2">
                    <label></label>
                     
                  </div>';

    }
     
 }
                  
                  foreach ($list as $list_name) {
                    if(!$list_name == '')
                {
                  $data.='<div class="col-md-2">
                    <label></label>
                     <input type="text" class="form-control listinghh'.$data_show['id'].''.$data_show['sub_disclosure_id'].'" value="'.$list_name.'" disabled>

                  </div>';
                 }
             }
                 $data.='<input type="hidden" class="jjj'.$data_show['id'].'" value="'.$list_name.'"/>';
                 
                 $swati = $data_show['sub_e_type'].$data_show["id"];                                                   
                 $data.='<div class="col-md-2">
                     <label class="form-label fs-6">Value</label>
                     <input type="number" id="llll" class="form-control total_number" 
                      placeholder="Value" value="'.$data_show['value'].'"
                       data-id="'.$data_show['data_id'].'"
                       data-dev_id="'.$data_show['id'].'"
                       data-sub="'.$data_show['sub_disclosure_id'].'"
                        readonly="">
                    </div>
                  <input type="hidden" class="form-control total_number_add_more'.$data_show['data_id'].'" value="'.str_replace(' ', '', $swati).'" placeholder="Joules" readonly="" >

                  <div class="col-md-1 p-0">
                     <label class="form-label fs-6" for="select2-basic">Unit</label>
                     <input type="number" class="form-control total_number" placeholder="Joules" readonly="" >
                  </div>

                  <div class="col-md-2 mt-2 lh">';

                     // <button type="button" class="btn btn-dark btn-sm  waves-effect"  data-id="'.$data_show["data_id"].'" onclick="addSourceDiv(this)">
                     //  <i class="fa fa-plus"></i>
                     // </button>

                     $data.='<button class="btn btn-sm btn-danger" data-value="'.$data_show['value'].'" data-id="'.$data_show['id'].'" data-subDis="'.$data_show['sub_disclosure_id'].'" 
                        data-showId="'.$data_show['data_id'].'" onclick="Non_deleted(this)"><i class="fa-solid fa-xmark"></i>
                     </button>

                  </div>
               </div>
         </div>';

}

echo $data;


} 


public function SubTotalValue()
{

$rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';

  // print_r($id);
  // print_r($idd);
  // die();
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            }
            else{
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier_model->where('id',$u_id)->first();
                $o_id = $find['owner_id'];            
            }

    $energy_managment_data_model = new Energy_managment_data();
    $energy_data =  $energy_managment_data_model->where('supplier_id',$u_id)->where('status',1)->findAll();
 

 $energy_data =  
 $db->query("SELECT sum(em.value) as data FROM `energy_managment_data` as em WHERE status =1 and supplier_id = $u_id and GROUP BY data_id")->getResultArray();
  $totalWeight = "SELECT id, sum(value) as value FROM cart GROUP BY car";

   $totalWeight = "SELECT id_user, sum(weight) as weight FROM cart GROUP BY id_user";

    $result = $this->db->query($totalWeight);
    return $result->row()->weight;
 print_r($energy_data);
 die();
   $data = [
    'success' => $energy_data];

return $this->response->setJSON($data);





}

    public function Energy_graph($id)
    {
       $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');

        }
        
        $data['pg_nm'] = 'Social';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        
        $model = new AllAssessmentModel();

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

            $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
    
            $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll();  
        
            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
    
            $data['employee_details'] = $query->getResultArray();
            
            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
            $data['indicator'] = $db->query("SELECT * FROM `indicator`   where status=1 ")->getResultArray();
    
            // $data['ghg_name'] = $query->getResultArray();
            
            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
    
            $data['boundary_item'] = $query->getResultArray();

            if(session()->supplier_info['role'] == 0){
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
            }
            elseif(session()->supplier_info['role'] == 10){
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                            $ok = $supplier_model->where('id', $sid)->first();
                            $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='".$o_id."'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->where('assign_position',1)->findAll();
    
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

     }
 }

 