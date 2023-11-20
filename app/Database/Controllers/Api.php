<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Universal;
use App\Models\IndustryModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\ModuleModel;
use App\Models\ModuleItemModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\SupplierModel;
use App\Models\ApiModelCategory;
use App\Models\ApiModel;
class Api extends BaseController{
    private $helperData=array();
    
    public function __construct(){
        helper(['form', 'url','html','menu']);
        $session = \Config\Services::session();
        $this->userInfo = $this->user_info = $session->get('user_info');
        $this->helperData=commonData();
    }
    
    public function apiDashboard(){
        $db = \Config\Database::connect();
        $data=$this->helperData; 
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $data['title'] = 'APIs Management';
        $query = $db->query("select amc.category_name as Api_category , api_module.* from api_module join api_module_category as amc on api_module.api_category=amc.id where api_module.status=1 ");
        $data['api'] = $query->getResultArray();
        $query = $db->query("select amc.category_name,amc.id from api_module_category as amc where amc.status=1 ");
        $data['Category'] = $query->getResultArray();
        return view('admin/api-dashboard',$data);

    }
        
    public function viewApiList(){
        $db = \Config\Database::connect();
        $data=$this->helperData; 
        $data['title'] = 'APIs Management';
        $query = $db->query("select amc.category_name as Api_category , api_module.* from api_module join api_module_category as amc on api_module.api_category=amc.id where api_module.status=1 ");
        $data['api'] = $query->getResultArray();
        $query = $db->query("select amc.category_name,amc.id from api_module_category as amc where amc.status=1 ");
        $data['Category'] = $query->getResultArray();
        return view('admin/view-api-list',$data);

    } 
    
    public function addapi(){



      $db = \Config\Database::connect();



      $session = session();



      $api_Module = new ApiModel(); 
     
     
      $API_Name = $this->request->getVar('API_Name');
      
      
      $API_Category = $this->request->getVar('API_Category');
      
    
      $Hitting_Url = $this->request->getVar('Hitting_Url'); 
     
      
      $Api_Request = $this->request->getVar('Api_Request');
    
      
      $Api_Response = $this->request->getVar('Api_Response');
      
      



     
      $ava = $db->query("select * from api_module where API_Name='".$API_Name."' and status=1");
     
      $ava = $ava->getResultArray();
   
    if(empty($ava)){
          
                        if($api_Module->insert(['API_Name'=>$API_Name,'api_category'=>$API_Category,'Hitting_Url'=>$Hitting_Url,'Api_Request'=>$Api_Request,'Api_Response'=>$Api_Response,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){




                            $session->setFlashdata('success','Api Details has been saved successfully');

                        }
                  
                        else
                  
                        {
                   
                            $session->setFlashdata('error','Api details Not Save');
                  
                        }
                  
                       } 
                 
                       else{
         
             $session->setFlashdata('error','API name '.$API_Name.' already exist!');



        }
             return redirect()->to('api/apiDashboard');


    }
    
    public function apiCategory(){
        $db = \Config\Database::connect();
        $data=$this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        } 
        $data['title'] = 'APIs CategoryManagement';
        $query = $db->query("select amc.category_name,amc.id from api_module_category as amc where amc.status=1 ");
        $data['Category'] = $query->getResultArray();
        return view('admin/add-api-category',$data);

    }
    
    public function addapiCategory(){



      $db = \Config\Database::connect();



      $session = session();



      $apiModelCategory = new ApiModelCategory(); 
      
      $API_Category = $this->request->getVar('API_category');
      
      $ava = $db->query("select * from api_module_category where category_name='".$API_Category."' and status=1");
     
      $ava = $ava->getResultArray();
   
    if(empty($ava)){
          
                        if($apiModelCategory->insert(['category_name'=>$API_Category,'created_at'=>date('Y-m-d H:i:s')])){




                            $session->setFlashdata('success','Api Category Details has been saved successfully');



                        }
                  
                        else
                  
                        {
                   
                            $session->setFlashdata('error','Api Category details Not Save');
                  
                        }
                  
                       } 
                 
                       else{
         
             $session->setFlashdata('error','API Category name '.$API_Category.' already exist!');



        }
             return redirect()->to('api/apiCategory');


    }
    
    public function deleteApiCategory($id) {


        
        $Category_model = new ApiModelCategory();
        
        $session = Session();

        if($Category_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata("success","Category has been  deleted successfully");

        }

        else {

            $session->setFlashdata("error","Error to delete");

        }

        return redirect()->to('api/apiCategory');

    }
    
    public function editApiCategory() {

        $ApiModelCategoryl = new ApiModelCategory();

        $session = Session();
        
        $db = \Config\Database::connect();

        $id = $this->request->getVar("id");

        $category_name = $this->request->getVar("category_name");
       
        
        
        $ava = $db->query("select * from api_module_category where category_name='".$category_name."' and status=1")->getResultArray();;
        
           

        $updated_data = [

         "category_name" => $category_name,

        ];
        if(empty($ava)){
                                 if($ApiModelCategoryl->where('id',$id)->set($updated_data)->update()) {
                                                $session->setFlashdata('success','Category has been Updated successfully');
                                            }
                                    else{
                                            $session->setFlashdata("error","Error to delete");
                                        }
                
        } 
        else
            {
             $session->setFlashdata('error','No changes has been made !');
            }
        return redirect()->to('api/apiCategory');



    }
    
    public function userModule(){
        $db = \Config\Database::connect();
$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $data=$this->helperData;
        return view('admin/user-dashboard',$data);

    }
    
   
    
    
    
}