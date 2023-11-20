<?php


namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\Toolissue;
use App\Models\ModelIssues;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\UserNotification;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\FootprintTypeModel;
use App\Models\BrandModel;
use App\Models\ActionCenterModel;
use App\Models\CountryModel;

class Tool extends BaseController{

    public function __construct(){

        helper(['form', 'url','html']);

    }
    public function issue(){
      $rs = check_session();
      if(!$rs) {
          return redirect()->to('home/user_login');
      }

      $data['pg_nm'] = 'Issues';
      $db = \Config\Database::connect();
      $session = session();
      $supplier_info = $session->get('supplier_info');
      $u_id = $supplier_info['supplier_id'];
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
         ->where('tool_issue.status',1)->where('tool_issue.user_id',$u_id)->findAll();

         // print_r($data['join']);
         // die();

         $data['view_report'] =  $db->query("SELECT * FROM steps where status=1 and supplier_id=$u_id")->getResultArray();
         

         
      
        // print_r($query);
        // die();

           
        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1 and supplier_id=$u_id");

$dat = $db->query("SELECT * FROM steps where status=1 and step5 = 1 and supplier_id=$u_id")->getResultArray();
$vv['step5']='';
foreach($dat as $vv ){

    $vv['step5'];
}

$data['step5_complete'] = $vv['step5'];
// print_r($data['step5_complete']);
// die();
  

        $data['site'] = $query->getResultArray();  

        $supplier_model = new SupplierModel();
        $id = session()->supplier_info['supplier_id'];

        $data['assign'] = $supplier_model->where('added_by',$id)->findAll();
        
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
  
        // $data['roleAllow'] =  $supplier_model->where('supplier_name',$data['pg_nm'])->where('role',$role)->where('supplier_plan_id', $o['supplier_id'])->first();
        $dat = $brand->where('brand_id',42)->where('role_id',$role)->where('plan_id',$o['supplier_id'])->first();
        if($dat){
        $data['add'] =  $dat['add'];
        $data['view'] =  $dat['view'];
        $data['edit'] =  $dat['edit'];
        $data['delete'] =  $dat['delete'];  
    }else{

        $data['add'] =  '';
        $data['view'] =  '';
        $data['edit'] =  '';
        $data['delete'] =  '';  
    }
       

        // $data['assign'] = $supplier_model->;
 $data['step_complete'] = '0';
      
        echo view('brand/issue',$data);
      }
    public function b(){

      $session = session();
$supplier = new SupplierModel();
      $supplier_info = $session->get('supplier_info');

      $mode = new ModelIssues();
      $data['i'] = $mode->where('status',1)->findAll();
      $data['v'] = $mode->where('status',1)->findAll();
      $msg = 'Data submit succesfully';
      $r = $session->setFlashdata('success',$msg);
      $model = new Toolissue();

$findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
// print_r($findrand);
// die();'uniq_spl' =>$uniq_spl_chr,
$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum); 
      $data = [
      'issue_type' => $this->request->getVar('boundary'),
      'title_issue' => $this->request->getVar('issue'),
      'description' => $this->request->getVar('description'),
      'coused' => $this->request->getVar('caused'),
      'priority'=> $this->request->getVar('priority'),
      'assign'=>$this->request->getVar('assign'),
      'site'=> $this->request->getVar('site'),
      'user_id' => $supplier_info['supplier_id'],
      'item' => $r,
       'uniq_spl' =>$uniq_spl_chr,
      ];

      $model->insert($data);
      $response = [
        'success' => 'Data has been success',
    ];
    return $this->response->setJSON($response); 
    echo view('brand/issue',$data);
  }
  public function update()
     {

    $model = new Toolissue();
     $id = $this->request->getVar('id');
     $data = [
    'issue_type' => $this->request->getVar('boundaryy'),
    'title_issue' => $this->request->getVar('issuee'),
    'description' => $this->request->getVar('descriptionn'),
    'coused' => $this->request->getVar('causedd'),
    'priority'=> $this->request->getVar('priorityy'),
    'site'=> $this->request->getVar('site'),
    'assign'=> $this->request->getVar('assign'),
    // 'user_id' => $supplier_info['supplier_id'],
    ];
    
    $model->update($id,$data);
    $response = [
      'success' => 'Data has been Update',
      ];
  return $this->response->setJSON($response); 
  }
  public function delete(){

    $model = new Toolissue();
     $id = $this->request->getVar('id');
     $session = session();

     $msg = 'Data deleted succesfully';
     $r = $session->setFlashdata('item',$msg);
    
    $data=[
        // 'asign' => $msg,
        'status'=> 0,
        'item' => $r,

    ]; 
    $model->update($id,$data);
  //   $response = [
  //     'success' => 'Data delete succesfully',
  // ];

  // return $this->response->setJSON($response); 
  return redirect()->back();  
}
  public function edit()
  {
    $model = new Toolissue();
    $id = $this->request->getVar('id');
    $data['issue_type'] = $this->request->getVar('issue_type');
    $data['description'] = $this->request->getVar('description');
    $data['title_issue'] = $this->request->getVar('title_issue');
    $data['coused'] = $this->request->getVar('coused');
    $data['site'] = $this->request->getVar('site');
    $data['priority'] = $this->request->getVar('priority');
    return $this->response->setJSON(['status'=>$id,$data]); 

  }

  public function updateProfle(){

$mode =  new CountryModel();
$data['country'] = $mode->findAll();

  $model = new SupplierModel();
  $id = $this->request->getVar('id');
  $accountFirstName = $this->request->getVar('accountFirstName'); 
  $accountLastName = $this->request->getVar('accountLastName');
  
  $accountEmail = $this->request->getVar('accountEmail');
  $accountOrganization = $this->request->getVar('accountOrganization');
  $accountPhoneNumber = $this->request->getVar('accountPhoneNumber');
  $accountAddress = $this->request->getVar('accountAddress');
  $accountState = $this->request->getVar('accountState');
  $accountZipCode = $this->request->getVar('accountZipCode');
  $country = $this->request->getVar('country');
  $timeZones = $this->request->getVar('timeZones');
  $currency = $this->request->getVar('currency');
  $language = $this->request->getVar('language');

  $data = [
    'zipcode' => $accountZipCode,

'supplier_name'=> $accountFirstName,
'last_name'=>   $accountLastName,
'mobile'=>   $accountPhoneNumber,
'email'=>  $accountEmail,
'address'=> $accountAddress,
'state_id'=>  $accountState,
'description'=> $accountOrganization,
'currency'=>  $currency,
'country_id'=>  $country,
'language' => $language,

  ];

  // print_r($data);
  // die();
  $model->update($id,$data);
  $response = [
    'success' => 'Profile updated succesfully',
  ];
  return $this->response->setJSON($response); 

  }
  public function addIssue(){
    
    $issue_id = $this->request->getVar('issue_id');
   
    $supplier = new SupplierModel();
    $model = new ActionCenterModel();
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
    $findrand = $supplier->where('id',session()->supplier_info['supplier_id'])->first();
// print_r($findrand);
// die();
$rname=substr($findrand['brand_name'].'abcdefghijklmnop',-4);
$rnum=rand(1000,999999);
$uniq_spl_chr=ucwords('#'.$rname.'_'.$rnum);
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
        'assessment_id'=> $issue_id,
        'uniq_spl' =>$uniq_spl_chr,
        'audit'       => $this->request->getVar('inlineRadioOptions'),
        'assign_from' => 'Issue manager'
    ];
    //  $model->insert($data);
     $ins = $model->insert($data);
     if($ins){
         $session->setFlashdata('success','Your issue has been saved successfully');
         if(session()->supplier_info['role'] == 0){
             $o_id = session()->supplier_info['supplier_id'];
             $u_id = session()->supplier_info['supplier_id'];
             $msg = "A issue task is assign you go and check";
             $for = $this->request->getVar('task-assigned');
         }
         elseif(session()->supplier_info['role'] == 10){
             $u_id = session()->supplier_info['supplier_id'];
             $id_o = $supplier->where('id',$u_id)->first();
             $o_id = $id_o['owner_id']; 
             $msg = "A Issue task is assign you go and check";
             $for = $this->request->getVar('task-assigned');
         }
         else{
             $u_id = session()->supplier_info['supplier_id'];
             $id_o = $supplier->where('id',$u_id)->first();
             $o_id = $id_o['owner_id']; 
             $msg = "A issue task is assign you go and check";
             $for = $this->request->getVar('task-assigned');
         }
         $noti = new UserNotification();
         foreach($this->request->getVar('task-assigned') as $row){
         $data = [
             'owner_id' => $o_id,
             'created_by' => $u_id,
             'msg' => $msg,
             'link' => 'tool/issue',
             'for_y' => $row
         ];
         $noti->insert($data);
     }
         
     }else{
         $session->setFlashdata('error','Your issue has not save');
        
     }
     //email on issue creation starts
       /*$a = json_decode($assignee);
       print_r($a);die();
      $detail = $supplier->where('id',$admin_id)->first();
      print_r($ava); die();
      $receiptemail=$ava[0]['email'];
   
      $s_name = $ava[0]['supplier_name'];  
      $department = $ava[0]['department'];
      $role = $ava[0]['role'];
         if ($role == '10' || $role == '0') {
             $role_name = 'Admin';
         }
         if ($role == '11') {
             $role_name = 'Manager';
         }
      $msg= "";
      $tool_msg.='<html><body>';
      $tool_msg.='<h3>Hello '.$s_name.'</h3><h5>A new data request has been assign from</h5><img style="height:50px; width:50px;" src="'.base_url("/").'/public/uploads/owner/john.jpg" alt="Image"/><h5>'.$role_name.'</h5><h5>'.$department.'</h5><h5>For "Issue Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/tool/issue"><button style="padding:8px 30px; color:green; border-radius: 6px;">RECORD</button></a>';
        $tool_msg.='</body></html>';
        //print_r($tool_msg);
         //die(); 
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.io', 'PositiivPlus:Assigned Task');
                        $email->setTo($receiptemail);
                        $email->setSubject('You have a new task!');
                        $email->setMessage($tool_msg);
                        $a = $email->send();*/
                        
     //email on issue creation ends
     
     return redirect()->back();


  }
  public function setRating(){
      $session = session();   
   $issuemodel = new Toolissue();

    $d = $this->request->getVar('checkedValue');
    $id = $this->request->getVar('id');
    $data=[
        'id'=>$id,
        'color'=> $d,
       
    ];

   $issuemodel->update($id,$data);
  $session->setFlashdata('success','Your issue  color saved successfully');
   

  }

 
}
?>