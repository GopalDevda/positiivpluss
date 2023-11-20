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
use App\Models\AllAssessmentModel;
use App\Models\BrandModel;
use App\Models\GhgFactorModel;


class Governance extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

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
    
            $data['pg_nm'] = 'sensor';
            
            
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
            $data['pg_nm'] = 'Governance';
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


$data['governance_indicator'] = 
$db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 11")->getResultArray();
 // print_r($data['governance_indicator']);
 // die();
       
         
            echo view('brand/view_governance',$data);

   

    }
  
   
   public function governance($id){

      
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

        $data['social_indicator']= $db->query("SELECT * FROM `indicator` WHERE indicator_category_id = 11 and id='".$id."'")->getResultArray();
        
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
    //   echo "<pre>";
    //   print_r($list);
    //   echo "\n";
    //   die();public function governance(){


   
    echo view('brand/governance_indicator_view',$data);

    }  
   
   
}

