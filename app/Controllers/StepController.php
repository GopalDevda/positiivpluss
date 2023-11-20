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
use App\Models\ModelIssues;
use App\Models\BrandModel;
use \Mpdf\Mpdf;
 use Dompdf\Dompdf;
require_once "vendor/autoload.php";
class StepController extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }

        public  function htmlToPDF($id,$i) {


            require_once 'vendor/autoload.php';

            $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
        $data['ide'] = $id;
         
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
            $issuetool =  new Toolissue();
            $issue_detail = $issuetool->where(['id' => $id, 'status' => 1])->first();
            $issue_description=$issue_detail['description'];
            $incident=$issue_detail['issue_type'];
            $date_time=$issue_detail['create_on'];


 
        $findrand = $supplier_model->where('id',session()->supplier_info['supplier_id'])->first();
        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
        $rnum=rand(1000,999999);
        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);   
        $s_id  =$supplier_info['supplier_id'];
        $stepmodel =  new StepModel(); 
        // $stepcheckfind = $stepmodel->where(['tool_issue_id'=>$id, 'status' => 1])->first();
        
        $stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id")->getResultArray();
     $victim = new Victim();

       $datain =[

        'uniq_spl'=>$uniq_spl_chr,
        'tool_issue_id'=>$id,
        'supplier_id'=>$s_id,
        'owner_id'=>$s_id,
        'incident_type'=>  $incident,
        'date_time'=> $date_time,
        'description'=>$issue_description,
        
        
       ];
       if(empty($stepcheckfind)){

        $sub=$stepmodel->insert($datain);
        $data["last_Id"]=$sub;
    }else{
        $data["last_Id"]=$stepcheckfind[0]['id'];

    }

     $data['issue_title'] = $db->query("SELECT gh.* FROM `tool_issue` as gh  where gh.status=1 and gh.user_id=$s_id")->getResultArray();
     // print_r($issue_title);
     // die();

     $stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id and gh.supplier_id=$s_id")->getResultArray();
     $data['root_cause'] = $stepcheckfind;

        foreach($stepcheckfind as $v){
            $v['id'];
        }
         $g = $v['id'];
         $issue_id = $v['tool_issue_id'];
         $step1 = $v['step1'];
         $step2 = $v['step2'];
         $step3 = $v['step3'];
         $step4 = $v['step_4'];
         $step5 = $v['step5'];

 $id=$data['last_Id'];
  // print_r($s_id);
  // die();
 $data['whole1step']=$stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id and gh.supplier_id=$s_id")->getResultArray();


    if($datain){
  $session->setFlashdata('success','Page successfully Insert');

    }else{
  $session->setFlashdata('item','Page Not Insert');


    $action = new ActionCenterModel();
// print_r($id);
// die();
// $dat = $action->where('supplier_id', $u_id)->where('assessment_id',$step1)->where('step',$id)->first();
// $i = $dat['assignee'];
// $v = json_decode($i);
 // print_r($v);
 // die();

$data['j'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('step',$g)->findAll();
$data['k'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('status',1)->findAll();

// print_r($data['k']);
// die();
if(empty($data['k'])){

    $data['com'] = 1;
}else{
    $data['com'] = 0;

}

$u_id = session()->supplier_info['supplier_id'];
      // print_r($u_id);
      // die();
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
  $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();

    $data['fetchdata'] =$db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$g and gh.tool_issue_id=$id and gh.supplier_id=$s_id")->getResultArray();

    $data['victim_data'] = 
$db->query("SELECT gh.* FROM `victim` as gh  where gh.supplier_id=$s_id and gh.step_id=$g and gh.tool_issue_id=$id and gh.status=1 and gh.supplier_id=$s_id")->getResultArray();




 $model = new ModelIssues();
      $data['i'] = $model->where('status',1)->findAll();
      $data['v'] = $model->where('status',1)->findAll();
      
      
      
      $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
     
        $issuemodel = new Toolissue();
        // $data['j'] =  $issuemodel->where('status',1)->findAll();
         $data['join'] = $model->select('tool_issue.*,issues.issue_name,supplier_assessment.cp_name,supplier.supplier_name,supplier.role')->join('tool_issue','tool_issue.issue_type = issues.id')
         ->join('supplier_assessment','supplier_assessment.id=tool_issue.site')->join('supplier','supplier.id=tool_issue.assign')
         ->where('tool_issue.status',1)->findAll();
         // print_r($data['join']);
         // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1 and supplier_id = $s_id");
       
        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('owner_id',$id)->findAll();
        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();


        $data['pg_nm'] = $ok['supplier_name'];
          // print_r($ok);
          // die();
        $role['role'] = $ok['role'];
        if(session()->supplier_info['role'] == 0){
            $role = 11;
        }
        else{
            $role = $ok['role'];
        }

        $o['supplier_id'] = $ok['supplier_plan_id'];


$data['victim_report'] =  $db->query("SELECT * FROM victim where status=1 and tool_issue_id = $issue_id and supplier_id = $sid")->getResultArray();

 $data['all_action'] = $db->query("SELECT * FROM action_center where status=4 and assessment_id = $issue_id and step != 'null' and supplier_id=$sid")->getResultArray();
 $data['all_action_timeline'] = $db->query("SELECT * FROM timeline_action_center where status != '0' ")->getResultArray();

 
    $dat = $brand->where('brand_id',42)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();
        $data['add'] =  $dat['add'];
        $data['view'] =  $dat['view'];
        $data['edit'] =  $dat['edit'];
        $data['delete'] =  $dat['delete'];


 
    echo view('brand/pdfreport',$data);

     }
 }
 

    public function index($id)

    {  
        $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
        $data['ide'] = $id;
         
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
            $issuetool =  new Toolissue();
            $issue_detail = $issuetool->where(['id' => $id, 'status' => 1])->first();
            $issue_description=$issue_detail['description'];
            $incident=$issue_detail['issue_type'];
            $date_time=$issue_detail['create_on'];


 
        $findrand = $supplier_model->where('id',session()->supplier_info['supplier_id'])->first();
        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
        $rnum=rand(1000,999999);
        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);   
        $s_id  =$supplier_info['supplier_id'];
        $stepmodel =  new StepModel(); 
        // $stepcheckfind = $stepmodel->where(['tool_issue_id'=>$id, 'status' => 1])->first();
        
        $stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id and gh.supplier_id=$s_id")->getResultArray();
     $victim = new Victim();

       $datain =[

        'uniq_spl'=>$uniq_spl_chr,
        'tool_issue_id'=>$id,
        'supplier_id'=>$s_id,
        'owner_id'=>$s_id,
        'incident_type'=>  $incident,
        'date_time'=> $date_time,
        'description'=>$issue_description,
        
        
       ];
       if(empty($stepcheckfind)){

        $sub=$stepmodel->insert($datain);
        $data["last_Id"]=$sub;
    }else{
        $data["last_Id"]=$stepcheckfind[0]['id'];

    }

     $data['issue_title'] = $db->query("SELECT gh.* FROM `tool_issue` as gh  where gh.status=1 and gh.user_id=$s_id")->getResultArray();
     // print_r($issue_title);
     // die();

     $stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id and gh.supplier_id=$s_id")->getResultArray();
     $data['root_cause'] = $stepcheckfind;
       // print_r($data['root_cause']);
       // die();

        foreach($stepcheckfind as $v){
            $v['id'];
        }
         $g = $v['id'];
         $issue_id = $v['tool_issue_id'];
         $step1 = $v['step1'];
         $step2 = $v['step2'];
         $step3 = $v['step3'];
         $step4 = $v['step_4'];
         $step5 = $v['step5'];

 $id=$data['last_Id'];
 $data['whole1step']=$stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id and gh.supplier_id=$s_id")->getResultArray();
 // print_r($data['whole1step']);
 // die();
    if($datain){
  $session->setFlashdata('success','Page successfully Insert');

    }else{
  $session->setFlashdata('item','Page Not Insert');


    }
    $action = new ActionCenterModel();
// print_r($id);
// die();
// $dat = $action->where('supplier_id', $u_id)->where('assessment_id',$step1)->where('step',$id)->first();
// $i = $dat['assignee'];
// $v = json_decode($i);
 // print_r($v);
 // die();

$data['j'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('step',$g)->findAll();
$data['k'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('status',1)->findAll();

// print_r($data['k']);
// die();
if(empty($data['k'])){

    $data['com'] = 1;
}else{
    $data['com'] = 0;

}

$u_id = session()->supplier_info['supplier_id'];
      // print_r($u_id);
      // die();
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
  $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();

    $data['fetchdata'] =$db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$g and gh.tool_issue_id=$id and gh.supplier_id=$s_id")->getResultArray();

    $data['victim_data'] = 
$db->query("SELECT gh.* FROM `victim` as gh  where gh.supplier_id=$s_id and gh.step_id=$g and gh.tool_issue_id=$id and gh.status=1")->getResultArray();




 $model = new ModelIssues();
      $data['i'] = $model->where('status',1)->findAll();
      $data['v'] = $model->where('status',1)->findAll();
      
      
      
      $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
     
        $issuemodel = new Toolissue();
        // $data['j'] =  $issuemodel->where('status',1)->findAll();
         $data['join'] = $model->select('tool_issue.*,issues.issue_name,supplier_assessment.cp_name,supplier.supplier_name,supplier.role')->join('tool_issue','tool_issue.issue_type = issues.id')
         ->join('supplier_assessment','supplier_assessment.id=tool_issue.site')->join('supplier','supplier.id=tool_issue.assign')
         ->where('tool_issue.status',1)->where('tool_issue.user_id',$u_id)->findAll();
         // print_r($data['join']);
         // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1");
        //  $data['sit'] = $db->query("SELECT tool_issue.*,issues.issue_name,supplier_assessment.cp_name FROM `tool_issue`
        //  join supplier_assessment on supplier_assessment.id=tool_issue.site
        //  join issues on tool_issue.issue_type = issues.id  where tool_issue.status=1")->getResultArray();
        //  print_r($data['sit']);
        //  die();

// $cars=["Volvo","BMW","Toyota"]; 
// echo   $cars[0] . ", " . $cars[1] . "," . $cars[2] . ".";
// die();
        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('owner_id',$id)->findAll();
        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();


        $data['pg_nm'] = $ok['supplier_name'];
          // print_r($ok);
          // die();
        $role['role'] = $ok['role'];
        if(session()->supplier_info['role'] == 0){
            $role = 10;
        }
        elseif(session()->supplier_info['role'] == 10){

            $role = 10;

        }
        elseif(session()->supplier_info['role'] == 11){

            $role = 11;

        }
        elseif(session()->supplier_info['role'] == 12){

            $role = 12;

        }
        else{
            $role = $ok['role'];
        }

        $o['supplier_id'] = $ok['supplier_plan_id'];


$data['victim_report'] =  $db->query("SELECT * FROM victim where status=1 and tool_issue_id = $issue_id")->getResultArray();


// $data['action_all'] = $db->query("SELECT tool_issue.*,issues.issue_name,supplier_assessment.cp_name FROM `tool_issue`
//           join supplier_assessment on supplier_assessment.id=tool_issue.site
//           join issues on tool_issue.issue_type = issues.id  where tool_issue.status=1")->getResultArray();

 $data['all_action'] = $db->query("SELECT * FROM action_center where status=4 and assessment_id = $issue_id and step != 'null' ")->getResultArray();
 $data['all_action_timeline'] = $db->query("SELECT * FROM timeline_action_center where status != '0' ")->getResultArray();

$model = new Toolissue();


 $data['join'] = $model->select('tool_issue.*,supplier_assessment.cp_name')
 ->join('supplier_assessment','supplier_assessment.id = tool_issue.site')
 ->where('tool_issue.status',1)->where('tool_issue.user_id',$u_id)
 ->findAll();

      //  print_r($data['join']);
      // die();


  // $data['join'] = $Database->select('*')
 // ->join('action_center','timeline_action_center.action_center_id = action_center.id')
//        ->findAll();
// print_r($data['all_action_timeline']);
// die();

        // $data['roleAllow'] =  $supplier_model->where('supplier_name',$data['pg_nm'])->where('role',$role)->where('supplier_plan_id', $o['supplier_id'])->first();
 // print_r($role);
 // die();
        $dat = $brand->where('brand_id',42)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();
        // print_r($dat);
        // die();

        $data['add'] =  $dat['add'];
        $data['view'] =  $dat['view'];
        $data['edit'] =  $dat['edit'];
        $data['delete'] =  $dat['delete'];

      if($step1 == '0'){

        echo view('brand/issue-step1',$data);
        }
        else if($step2 == '0'){

        echo view('brand/issue-step2',$data);

        }
        else if($step3 == '0'){
        // echo view('brand/issue-step3',$data);
     return redirect()->to('step3/'.$issue_id.'/'.$g);

        }
        else if($step4 == '0'){
     return redirect()->to('step4/'.$issue_id.'/'.$g);

        }
        else if($step5 == '0'){

      return redirect()->to('step5/'.$issue_id.'/'.$g);

        }
    else if($step5 == '1'){

        echo view('brand/step_report',$data);

    }
        
    }

  
    
    public function report_pdf(){
           $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
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
            


 
        $findrand = $supplier_model->where('id',session()->supplier_info['supplier_id'])->first();
        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
        $rnum=rand(1000,999999);
        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);   
        $s_id  =$supplier_info['supplier_id'];
        $stepmodel =  new StepModel(); 
        // $stepcheckfind = $stepmodel->where(['tool_issue_id'=>$id, 'status' => 1])->first();

    $model = new ModelIssues();
      $data['i'] = $model->where('status',1)->findAll();
      $data['v'] = $model->where('status',1)->findAll();
      
      
      
      $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
     
        $issuemodel = new Toolissue();
        // $data['j'] =  $issuemodel->where('status',1)->findAll();
         $data['join'] = $model->select('tool_issue.*,issues.issue_name,supplier_assessment.cp_name,supplier.supplier_name,supplier.role')->join('tool_issue','tool_issue.issue_type = issues.id')
         ->join('supplier_assessment','supplier_assessment.id=tool_issue.site')->join('supplier','supplier.id=tool_issue.assign')
         ->where('tool_issue.status',1)->findAll();
         // print_r($data['join']);
         // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1");
        //  $data['sit'] = $db->query("SELECT tool_issue.*,issues.issue_name,supplier_assessment.cp_name FROM `tool_issue`
        //  join supplier_assessment on supplier_assessment.id=tool_issue.site
        //  join issues on tool_issue.issue_type = issues.id  where tool_issue.status=1")->getResultArray();
        //  print_r($data['sit']);
        //  die();
        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('owner_id',$id)->findAll();
        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();


        $data['pg_nm'] = $ok['supplier_name'];
         
		echo view('brand/pdfreport',$data);
	}

     public function step_report()
     {
           $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
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
            


 
        $findrand = $supplier_model->where('id',session()->supplier_info['supplier_id'])->first();
        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
        $rnum=rand(1000,999999);
        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);   
        $s_id  =$supplier_info['supplier_id'];
        $stepmodel =  new StepModel(); 
        // $stepcheckfind = $stepmodel->where(['tool_issue_id'=>$id, 'status' => 1])->first();

    $model = new ModelIssues();
      $data['i'] = $model->where('status',1)->findAll();
      $data['v'] = $model->where('status',1)->findAll();
      
      
      
      $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
     
        $issuemodel = new Toolissue();
        // $data['j'] =  $issuemodel->where('status',1)->findAll();
         $data['join'] = $model->select('tool_issue.*,issues.issue_name,supplier_assessment.cp_name,supplier.supplier_name,supplier.role')->join('tool_issue','tool_issue.issue_type = issues.id')
         ->join('supplier_assessment','supplier_assessment.id=tool_issue.site')->join('supplier','supplier.id=tool_issue.assign')
         ->where('tool_issue.status',1)->findAll();
         // print_r($data['join']);
         // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1");
        //  $data['sit'] = $db->query("SELECT tool_issue.*,issues.issue_name,supplier_assessment.cp_name FROM `tool_issue`
        //  join supplier_assessment on supplier_assessment.id=tool_issue.site
        //  join issues on tool_issue.issue_type = issues.id  where tool_issue.status=1")->getResultArray();
        //  print_r($data['sit']);
        //  die();

        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('owner_id',$id)->findAll();
        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];

        $ok = $supplier_model->where('id', $sid)->first();
        $data['pg_nm'] = $ok['supplier_name'];    
    
        echo view('brand/step_report',$data);


    }

public function step(){

        $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager';
   
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];

            $supplier = new SupplierModel();
 
$findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
 // print_r($findrand);
 //  die();
$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);   
       $id = $this->request->getVar('issue_id');
       $stepdatas = $this->request->getVar('stepdatas');




       $stepmodel = new StepModel(); 

       // $data['whole1step']= $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id")->getResultArray();
      // print_r($data['whole1step']);
     // die();
       $issue_id = $this->request->getVar('idee');

       $incident = $this->request->getVar('incident');    
       $location = $this->request->getVar('location');    
       $date_time = $this->request->getVar('date_time');    
       $shift = $this->request->getVar('shift');    
       $mac_exa_loc = $this->request->getVar('mac_exa_loc');    
       $descrption = $this->request->getVar('descrption');    
       $action_taken = $this->request->getVar('action_taken');    
       $damage = $this->request->getVar('damage');    
      
       $data =[

         'uniq_spl'=>$uniq_spl_chr,
        'tool_issue_id'=>$id,
        'supplier_id'=>$s_id,
        'owner_id'=>$s_id,
        'incident_type'=>  $incident,
        'location'=> $location,
        'date_time'=> $date_time,
        'shift'=> $shift,
        'mach_no_exa_loc'=>$mac_exa_loc,
        'step1'=>'1',
        'description'=>$descrption,
        'extend_damage'=>$damage,
        'immediate_action_taken'=> $action_taken
       ];

    $stepmodel->update($stepdatas,$data);
    echo "data successfully insert";
    if($data){
  $session->setFlashdata('success','Page successfully Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}

    return redirect()->to('step2/'.$id.'/'.$stepdatas);
    

    }

      public function step1($step1,$id)
      {

 
            $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
           

            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
            $data['ide'] = $step1;
          // print_r($data['ide']);
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
       
            $data['whole1step']=$stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id")->getResultArray();
            $data['last_Id']=$id;
      

            echo view('brand/issue-step2',$data);
    

    }
 

    public function step01(){

 $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];

            $supplier = new SupplierModel();
 
       


       $stepmodel =  new StepModel(); 
       $id = $this->request->getVar('issue_id');
       $last_id = $this->request->getVar('stepidfirst_id');
      
       $st_2_Inv_t_lead = $this->request->getVar('st_2_Inv_t_lead');    
       $st_2_Inv_t_memb = $this->request->getVar('st_2_Inv_t_memb');    
       $st_2_target_date_time = $this->request->getVar('st_2_target_date_time');    
         
      
       $data =[

        'st_2_Inv_t_lead'=>$st_2_Inv_t_lead,
        'st_2_Inv_t_memb'=>$st_2_Inv_t_memb,
        'st_2_target_date_time'=>$st_2_target_date_time,
        'step2'=>'1',
        
       ];

    $stepmodel->update($last_id,$data);
    echo "data successfully insert";
    $data['last_Id']=$last_id;

  if($data){
  $session->setFlashdata('success','Page successfully Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}

   return redirect()->to('step3/'.$id.'/'.$last_id);

    

    }
public function step2($step1,$id){
        
        $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
           

            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
            $data['ide'] = $step1;
          // print_r($data['ide']);
          // die();
            $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
   $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => 
                $supplier_plan_id, 'status' => 1])->findAll();
    
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
       
         $data['whole1step']= $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id and gh.supplier_id=$s_id")->getResultArray();

      
         // $data['whole1step'] = $stepmodel->where('id',$id)->where('supplier_id',$s_id)->first();

          // print_r($id);
          // die();

            $data['last_Id']=$id;
      

            echo view('brand/issue-step3',$data);
    

    }
    public function step02(){

 $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];

            $supplier = new SupplierModel();
 
       


       $stepmodel =  new StepModel(); 
       $issue_id = $this->request->getVar('idee');
       $last_id = $this->request->getVar('stepidfirst_id');
       
       $st_2_Inv_t_lead = $this->request->getVar('st_2_Inv_t_lead');    
       $st_2_Inv_t_memb = $this->request->getVar('st_2_Inv_t_memb');    
       $st_2_target_date_time = $this->request->getVar('st_2_target_date_time');    
         
      
       $data =[

        'st_2_Inv_t_lead'=>$st_2_Inv_t_lead,
        'st_2_Inv_t_memb'=>$st_2_Inv_t_memb,
        'st_2_target_date_time'=>$st_2_target_date_time,
        'step2'=>'1',
        
       ];

    $stepmodel->update($last_id,$data);
    echo "data successfully insert";
    $data['last_Id']=$last_id;

  if($data){
  $session->setFlashdata('success','Page successfully Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}
    return redirect()->back();

    

    }
    public function victim(){

            $rs = check_session();
                
                        if(!$rs) {
                
                            return redirect()->to('home/user_login');
                
                        }
                
                        $data['pg_nm'] = 'issue Manager ';
                        
                        
                        $db = \Config\Database::connect();
                
                        $session = session();
                
                        $supplier_info = $session->get('supplier_info');
                        $s_id = $supplier_info['supplier_id'];

                        $supplier = new SupplierModel();
                        $step = new StepModel();
                        $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
                 
                        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
                        $rnum=rand(1000,999999);
                        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);  

                        $id = $this->request->getVar('issue_id');
                        $stepdataIds1 = $this->request->getVar('stepdataIds1');
                  

            $yy = $step->findAll();
            $query = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id")->getResultArray();
                  foreach ($query as  $value) {
                   
                  }
         
            $idee = $value['id'];
                   $body_mark = $this->request->getVar('body_mark[]');
                    //  print_r($body_mark);
                    // die();
                  $mark = json_encode($body_mark);
                   $victim = $this->request->getVar('victim');
                   $name_victim = $this->request->getVar('name_victim');    
                   $gender = $this->request->getVar('gender');    
                   $age_range = $this->request->getVar('age_range');    
                   $detail_injury = $this->request->getVar('detail_injury');    
                   $vic_days = $this->request->getVar('vic_days');    
                   $treatment = $this->request->getVar('treatment');
             $stepmodel = new Victim();
                   $data =[
                   'tool_issue_id'=>$id,
                    'supplier_id'=>$s_id,
                    'owner_id'=>$s_id,
                    'victim_type'=> $victim,
                    'victim_name'=>  $name_victim,
                    'gender'=> $gender,
                    'age'=>$age_range,
                    'body_mark'=>$body_mark,
                    'details_injury'=> $detail_injury,
                    'victim_work'=> $vic_days,
                    'details_treatment'=>$treatment,
                    'step_id'=>$stepdataIds1,
                    'body_mark'=>$mark, 
                   ];
                   // print_r($data);
                   // die();
                $stepmodel->insert($data);
                if($data){
       $session->setFlashdata('success','Page successfully Insert');

         }else{
         $session->setFlashdata('item','Page Not Insert');

             }
             return redirect()->back();

                }
               public function step3($step1,$id){
        
        $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager';
            $db = \Config\Database::connect();
            $session = session();    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
            $data['ide'] = $step1;
          // print_r($data['ide']);
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
       
            $data['whole1step']=$stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id")->getResultArray();
            $data['last_Id']=$id;
      $u_id = session()->supplier_info['supplier_id'];
      // print_r($u_id);
      // die();
$find = $supplier_model->where('id',$u_id)->first();
$o_id = $find['owner_id'];
          $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
$action = new ActionCenterModel();
// print_r($id);
// die();
// $dat = $action->where('supplier_id', $u_id)->where('assessment_id',$step1)->where('step',$id)->first();
// $i = $dat['assignee'];
// $v = json_decode($i);
 // print_r($v);
 // die();
$data['j'] = $action->where('supplier_id', $u_id)->where('assessment_id',$step1)->where('step',$id)->findAll();

$data['supplier'] = $supplier_model->findAll();
$data['k'] = $action->where('supplier_id', $s_id)->where('assessment_id',$step1)->where('status',1)->findAll();

if(empty($data['k'])){

    $data['com'] = 1;

}else{
    $data['com'] = 0;

}

 echo view('brand/issue-step4',$data);
    }

     public function step03()
    {
      $rs = check_session();
                
                        if(!$rs) {
                
                            return redirect()->to('home/user_login');
                
                        }
                        

                        $data['pg_nm'] = 'issue Manager';     
                        $db = \Config\Database::connect();
                
                        $session = session();
                
                        $supplier_info = $session->get('supplier_info');
                        $s_id = $supplier_info['supplier_id'];

                        $supplier = new SupplierModel();
                        $step = new StepModel();
                        $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
                 
                        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
                        $rnum=rand(1000,999999);
                        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);  

                        $id = $this->request->getVar('issue_id');
                        $stepdataIds1 = $this->request->getVar('stepdataIds1');
                  

            $yy = $step->findAll();
            $query = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id")->getResultArray();
                  foreach ($query as  $value) {
                   
                  }
         
                    $idee = $value['id'];

                  
                   $issue_id = $this->request->getVar('issue_id');
                   $stepidfi = $this->request->getVar('stepidfirst_id');
                   // print_r($stepidfirst_id);
                   // die();    
                   $m1 = $this->request->getVar('m1');    
                   $machine = $this->request->getVar('machine');    
                   $man1 = $this->request->getVar('man1');    
                   $man = $this->request->getVar('man');    
                   $Material1 = $this->request->getVar('Material1');
                   $Material = $this->request->getVar('Material');
                   $Enviroment1 = $this->request->getVar('Enviroment1');
                   $Enviroment = $this->request->getVar('Enviroment');
                   $System = $this->request->getVar('System');
                  $stepmodel = new StepModel();

            $data =
                    [
                   
                    'st_3_m1'=> json_encode($m1),
                    'st_3_Machine_des'=>$machine,
                    'st_3_man1'=> json_encode($man1),
                    'st_3_Man_des'=>$man,
                    'st_3_Material1'=>json_encode($Material1),
                    'st_3_Material1_des'=>$Material,
                    'st_3_Enviroment1'=> json_encode($Enviroment1),
                    'st_3_Enviroment_des'=>$Enviroment,
                    'st_3_System'=>$System,
                    'step3' =>'1',
                   ];
                   $response = [
                   'issue_id'=>$this->request->getVar('issue_id'),
                    'stepidfi' => $this->request->getVar('stepidfirst_id'),
                    ]; 
               $stepmodel->update($stepidfi,$data);
      

                if($data){
       $session->setFlashdata('success','Page successfully Insert');

         }else{
         $session->setFlashdata('item','Page Not Insert');

             }
    return $this->response->setJSON($response);

    }
   public function step4($step1,$id){
        

        $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager';
           

            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier_model = new SupplierModel();
            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    
            $supplier_plan_id = $rs['supplier_plan_id'];
    
            $data['ide'] = $step1;
          // print_r($data['ide']);
          // die();
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
       
            $data['whole1step']=$stepcheckfind = $db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id")->getResultArray();
            $data['last_Id']=$id;
      
              $step = new StepModel();
    $data['fetchdata'] =$db->query("SELECT gh.* FROM `steps` as gh  where gh.id=$id and gh.tool_issue_id=$step1 and gh.supplier_id=$s_id")->getResultArray();
              $u_id = session()->supplier_info['supplier_id'];
              $action = new ActionCenterModel();
// print_r($id);
// die();
$data['j'] = $action->where('supplier_id', $u_id)->where('assessment_id',$step1)->where('step',$id)->findAll();

$data['supplier'] = $supplier_model->findAll();
$data['victim_data'] = 
$db->query("SELECT gh.* FROM `victim` as gh  where gh.supplier_id=$u_id and gh.step_id=$id and gh.tool_issue_id=$step1 and gh.status=1")->getResultArray();


            echo view('brand/issue-step5',$data);
    

    }
    public function step04(){

$rs = check_session();
                
                        if(!$rs) {
                
                            return redirect()->to('home/user_login');
                
                        }
                
                        $data['pg_nm'] = 'issue Manager ';
                        
                        
                        $db = \Config\Database::connect();
                
                        $session = session();
                
                        $supplier_info = $session->get('supplier_info');
                        $s_id = $supplier_info['supplier_id'];

                        $supplier = new SupplierModel();
                        $step = new StepModel();
                        $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
                 
                        $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
                        $rnum=rand(1000,999999);
                        $uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);  

                        $id = $this->request->getVar('issue_id');
                        $stepdataIds1 = $this->request->getVar('stepdataIds1');
                  

            $yy = $step->findAll();
         $query = $db->query("SELECT gh.* FROM `steps` as gh  where gh.tool_issue_id=$id")->getResultArray();
                  foreach ($query as  $value) {
                   
                  }
         
                    $idee = $value['id'];

                  
                   $issue_id = $this->request->getVar('issue_id');
                   $stepidfi = $this->request->getVar('stepidfirst_id');   
                   $st_4_des = $this->request->getVar('st_4_des');    
                   $type_control = $this->request->getVar('type_control');    
                   $responsibility = $this->request->getVar('responsibility');    
                   $date = $this->request->getVar('date');    
                   $stepmodel = new StepModel();

            $data =
                    [
                   
                 
                    'st_4_des_action'=>$st_4_des,
                 
                    'st_4_type'=>$type_control,
                 
                    'st_4_responsibilty'=>$responsibility,
                    
                    'st_4_target_date'=>$date,
                  
                    'step_4' =>'1',
                   ];

                   
               $stepmodel->update($stepidfi,$data);
      

                if($data){
       $session->setFlashdata('success','Page successfully Insert');

         }else{
         $session->setFlashdata('item','Page Not Insert');

             }
        return $this->response->setJSON($data);


    }

    public function approve(){

$rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];

            $supplier = new SupplierModel();

       $stepmodel =  new StepModel(); 
       $id = $this->request->getVar('issue_id');
       $last_id = $this->request->getVar('stepidfirst_id');
       $approve = $this->request->getVar('approve');
      
       // print_r($last_id);
       // die();
      
       $data =[

        'approve'=>$approve,
        'step_4' =>'1',

       ];

    $stepmodel->update($last_id,$data);
    echo "data successfully insert";
    $data['last_Id']=$last_id;
 

$action = new ActionCenterModel();

$data['j'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('step',$last_id)->findAll();


$data['supplier'] = $supplier->findAll();
  if($data){
  $session->setFlashdata('success','Page successfully Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}


   return redirect()->to('step5/'.$id.'/'.$last_id);

    }
    public function step5(){


$rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager ';
            $db = \Config\Database::connect();
            $session = session();
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];
            $supplier = new SupplierModel();     
       $data['supplier'] = $supplier->findAll();
       $stepmodel =  new StepModel(); 
        $id = $this->request->getVar('issue_id');
        $last_id = $this->request->getVar('stepidfirst_id');

       $id = $this->request->getVar('issue_id');
       $des_action = $this->request->getVar('des_action');
       $type_control = $this->request->getVar('type_control');
       $responsibility = $this->request->getVar('responsibility');
       $date = $this->request->getVar('date');
       $status = $this->request->getVar('status');
       $remark = $this->request->getVar('remark');

      $file = $this->request->getFile('image');
      if ($file->isValid() && ! $file->hasMoved()) {

        $newName = $file->getRandomName();

        $file->move('public/stepmedia/', $newName);
    }else{
      $newName = 'null'; 
    }

       $data =[

       'st_4_des_action'=>$des_action,    
          'st_4_type'=>$type_control,
          'st_4_responsibilty'=>$responsibility,
           'st_4_target_date'=>$date,
           'st_5_status'=>$status,
            'st_5_remark'=>$remark,
                    'step5' =>'1',
                    'media_attach'=>$newName
       ];

    $stepmodel->update($last_id,$data);
    $data['last_Id']=$last_id;

$action = new ActionCenterModel();
$data['j'] = $action->where('supplier_id', $s_id)->where('assessment_id',$id)->where('step',$last_id)->findAll();

$data['supplier'] = $supplier->findAll();

  if($data){
  $session->setFlashdata('success','Page successfully Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}

$data['pg_nm'] = 'Issues';
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
      $model = new ModelIssues();
      $data['i'] = $model->where('status',1)->findAll();
      $data['v'] = $model->where('status',1)->findAll();
      
      
      
      $data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
     
        $issuemodel = new Toolissue();
        // $data['j'] =  $issuemodel->where('status',1)->findAll();
         $data['join'] = $model->select('tool_issue.*,issues.issue_name,supplier_assessment.cp_name,supplier.supplier_name,supplier.role')->join('tool_issue','tool_issue.issue_type = issues.id')
         ->join('supplier_assessment','supplier_assessment.id=tool_issue.site')->join('supplier','supplier.id=tool_issue.assign')
         ->where('tool_issue.status',1) ->where('tool_issue.user_id',$s_id)->findAll();
         // print_r($data['join']);
         // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1 and supplier_id= $s_id
            ");
        //  $data['sit'] = $db->query("SELECT tool_issue.*,issues.issue_name,supplier_assessment.cp_name FROM `tool_issue`
        //  join supplier_assessment on supplier_assessment.id=tool_issue.site
        //  join issues on tool_issue.issue_type = issues.id  where tool_issue.status=1")->getResultArray();
        //  print_r($data['sit']);
        //  die();

        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('owner_id',$id)->findAll();
        
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();


        $data['pg_nm'] = $ok['supplier_name'];
          // print_r($ok);
          // die();
        $role['role'] = $ok['role'];
        if(session()->supplier_info['role'] == 0){
            $role = 10;
        }
        elseif(session()->supplier_info['role'] == 10){

            $role = 10;

        }
        elseif(session()->supplier_info['role'] == 11){

            $role = 11;

        }
        elseif(session()->supplier_info['role'] == 12){

            $role = 12;

        }

        else{
            $role = $ok['role'];
        }

        $o['supplier_id'] = $ok['supplier_plan_id'];
  
        // $data['roleAllow'] =  $supplier_model->where('supplier_name',$data['pg_nm'])->where('role',$role)->where('supplier_plan_id', $o['supplier_id'])->first();
        $dat = $brand->where('brand_id',42)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();
        $data['add'] =  $dat['add'];
        $data['view'] =  $dat['view'];
        $data['edit'] =  $dat['edit'];
        $data['delete'] =  $dat['delete'];
       $data['step_complete'] = '0';

return redirect()->to('tool/issue');
          // echo view('brand/issue',$data);Rohit



    }

    public function addAction()
    {


      $rs = check_session();
    
            if(!$rs) {
    
                return redirect()->to('home/user_login');
    
            }
    
            $data['pg_nm'] = 'issue Manager';
            
            
            $db = \Config\Database::connect();
    
            $session = session();
    
            $supplier_info = $session->get('supplier_info');
            $s_id = $supplier_info['supplier_id'];

            $supplier = new SupplierModel();
 
       

$data['supplier'] = $supplier->findAll();

     
       $action = new ActionCenterModel();

       $assign = $this->request->getVar('task-assigned');
       // print_r($assign);
       // die();
       $last_id = $this->request->getVar('stepidfirst_id');
       $id = $this->request->getVar('issue_id');
       $title = $this->request->getVar('todoTitleAdd');
       $vv = $this->request->getVar('task-due-date');
       $description = $this->request->getVar('description');
       $priority = $this->request->getVar('priority');
$findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();

       $rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum); 
       $data =[
            'supplier_id'=>$s_id,
            'owner_id'=>$s_id,
            'title'=>$title,
            'due_date'=> $vv,
            'description'=>$description,
            'priority'=>$priority,
            'assessment_id'=>$id,           
            'step'=>$last_id,  
            'assignee'=> json_encode($assign), 
            'uniq_spl'=> $uniq_spl_chr,        
       ];

        //  print_r($data);
        // die();
       $action->insert($data);
   
  if($data){
  $session->setFlashdata('success','Add task Insert');

}else{
  $session->setFlashdata('item','Page Not Insert');

}

    return redirect()->back();

    }

        
   
}

