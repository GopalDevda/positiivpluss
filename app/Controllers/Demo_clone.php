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
use App\Models\Automotion_alert;
use App\Models\Data_electricityModel;
use App\Models\UserNotification;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Demo_clone extends BaseController

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
            
            echo view('brand/sensor_view',$data);

   

    }

public function demo()
{

$rs = check_session();

    
            
            
       $db = \Config\Database::connect();

       $session = session();
       $supplier_info = $session->get('supplier_info');

       $model = new SensorModel();

       $Data_electricity = new Data_electricityModel();
       $data = $model->where('status',1)->findAll();
          
    foreach ($data as $key => $value)

           {  

            $ele = $Data_electricity->where('electricity_id',$value['id'])->where('status',1)->orderBy('id','desc')->first();
            if($ele){ 
               $ele['bill_date'];
             $v = $ele['electricity_id'];


           }



     $ele = $Data_electricity->where('electricity_id',$v)->where('status',1)->orderBy('id','desc')->first();

     $electricity_id = $ele['electricity_id'];

    $model = new SensorModel();
    $sensor_id = $model->where('id',$electricity_id)->where('status',1)->first();
    $o_id = $sensor_id['supplier_id'];
    $u_id = $sensor_id['owner_id'];
    // print_r($o_id);


     
     $date = $ele['bill_date'];
     // $o_id = $ele['supplier_id'];
     // $u_id = $ele['owner_id'];


        $curr_time = $ele['bill_date'];

        $time = strtotime($curr_time);  
        $diff    =  time() - $time; 
        $sec     =  $diff;
        $days    =  round($diff / 86400);
        $msg     =  'success msg';
                                                                                                                                                                                                                                                                                                     
if($days >= 31)
{    


$id = $electricity_id;

 $model = new SensorModel();
 $data = ['current_status'=>'2'];
$model->update($id,$data);


 $noti = new UserNotification();
            $data = [
                'owner_id'=>$u_id,
                'created_by'=>$o_id,
                'msg'=>'Bill genrate',
                'link'=>'automotion',
                'for_y'=>$u_id
            ];
   // print_r($data);
   // die();         
 $insert =  $noti->insert($data);
   
} 
 

}
 return redirect()->to('/automotion');
}

public function alert(){

$db = \Config\Database::connect();

       $session = session();
       $supplier_info = $session->get('supplier_info');

       $model = new SensorModel();
       $automotion = new Automotion_alert();



       $Data_electricity = new Data_electricityModel();
       $data = $model->where('status',1)->findAll();
        foreach ($data as $key => $value)

    {  
             
    $ele = $automotion->where('automotion_id',$value['id'])->where('status',1)->orderBy('id','desc')->first();

    if($ele)

    {   
       $vv = $ele['automotion_id'];
    }

    $bb = $Data_electricity->where('electricity_id',$vv)->where('status',1)->orderBy('id','desc')->first();
    $v = $bb['consume_unit'];
    $vvv = $bb['electricity_id'];
    // print_r($vv);
    $automati = $automotion->where('automotion_id',$vvv)->where('name','consume_unit')->first();
// print_r($automati);

    if($automati){

   $bb = $automati['above'];
if($bb == $v)
{
echo 'done';

}

else   
{
echo 'not done';
}

}
  


    }



}

}


