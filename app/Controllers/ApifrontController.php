<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Universal;
use App\Models\ApiUserModel;
use App\Models\IndustryModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\ModuleModel;
use App\Models\ModuleItemModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\SupplierModel;
use App\Models\DegreeModel;;
use App\Models\ApiModel;
class ApifrontController extends BaseController{
    private $helperData=array();
    public function __construct(){
        helper(['form', 'url','html','menu']);
        $session = \Config\Services::session();
        $this->userInfo = $this->user_info = $session->get('user_info');
        $this->helperData=commonData();
    }
  
     public function index(){

      $db = \Config\Database::connect();

      $session = session();
      $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
      $data['category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
      $data['sub_category'] = $query->getResultArray();
      return view('api/index',$data);
    }
     public function Plan(){

      $db = \Config\Database::connect();
      $session = session();
      
      $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
      $data['category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
      $data['sub_category'] = $query->getResultArray();
      
      return view('api/plan',$data);
    }
    
     public function detail($id){

      $db = \Config\Database::connect();

      $session = session();
      $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
      $data['category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
      $data['sub_category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and id=".$id)->getResultArray();
      $data['detail'] = $query[0];
        // echo $db->getLastquery($data['detail']);
        // print_r( $data['detail']);
        // die();
      return view('api/detail',$data);


    }
    
    public function login(){

      $db = \Config\Database::connect();

      $session = session();
      $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
      $data['category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
      $data['sub_category'] = $query->getResultArray();
      
      return view('api/login',$data);

    }
    
    public function signup(){

      $db = \Config\Database::connect();

      $session = session();
      $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
      $data['category'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM countries WHERE status=1");
      $data['country'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM industry WHERE status=1");
      $data['industry'] = $query->getResultArray();
      
      $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
      $data['sub_category'] = $query->getResultArray();
      
      return view('api/signup',$data);

    }
    
    // public function signupSub()
    // {
    //     $db = \Config\Database::connect();
    //         $apiuserModel = new ApiUserModel();
    //         $data = [
    //             'name' => $this->request->getVar('name'),
    //             'email' => $this->request->getVar('email'),
    //             'mobile' => $this->reuest->getVar('mobile'),
    //             'brand_name' => $this->reuest->getVar('brand_name'),
    //             'country_id' => $this->reuest->getVar('country_id'),
    //             'industry_id' => $this->reuest->getVar('industry_id'),
    //             'password' => $this->reuest->getVar('password'),
    //             'test_key' => $this->reuest->getVar('brand_name'),
    //             'live_key' => $this->reuest->getVar('live_key'),
    //             'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
    //         ];
    //         $apiuserModel->save($data);
    //         $session->setFlashdata("error","Email not Found Please Login".' <a href="'.base_url('home/signup').'">SignUp</a>');
    //         return redirect()->to('/signin');
    //     }
    
    public function signupSub(){
      $db = \Config\Database::connect();
      $session = session();
      $userapi_model = new ApiUserModel();
      $name = $this->request->getVar('name');
      $email = $this->request->getVar('email');
      $mobile = $this->request->getVar('mobile');
      $brand_name = $this->request->getVar('brand_name');
      $country_id = $this->request->getVar('country_id');
      $industry_id = $this->request->getVar('industry_id');
      $password = $this->request->getVar('password');
      $cpassword = $this->request->getVar('cpassword');
      $test_key = $this->request->getVar('test_key');
      $live_key = $this->request->getVar('live_key');
      if($password != $cpassword){
          $session->setFlashdata('error','Password Not Matched');
      }else{
      $checkquery = $db->query("select * from apiusers where email='".$email."' and status=1");
      $res = $checkquery->getResultArray();
        if(empty($res)){
            if($userapi_model->insert([
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'brand_name'=>$brand_name,
                'country_id'=>$country_id,
                'industry_id'=>$industry_id,
                'test_key' => 'test_key',
                'live_key' => 'live_key',
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ])){
               $session->setFlashdata('success','User has been saved successfully');
            }else{
                $session->setFlashdata('error','User Not Save');
            }          
        }else{
         $session->setFlashdata('error','Email Name'.$email.' already exist!');
        }
        return redirect()->to('apifrontController/signup');
     }
    }
    
    public function loginSub() {
        $db = \Config\Database::connect();
        $email = $this->request->getVar("email");
        $password = $this->request->getVar("password");
        $supplier_model = new ApiUserModel();
        $session = Session();
        $rs = $supplier_model->where('email',$email)->first();
        if($rs) {

            if(password_verify($password, $rs["password"])) {
                $query = $db->query("select * from apiusers where  id='".$rs['id']."' order by id asc");
                $supplier = $query->getResultArray();
                // echo "<pre>";
                // echo print_r($supplier);
                // die();
                $ses_data = ['id'=> $supplier[0]['id'],'name'=> $supplier[0]['name'],'brand_name'=> $supplier[0]['brand_name'],'industry_id'=>$supplier[0]['industry_id']];
                // echo "<pre>";
                // echo print_r($ses_data);
                // die();
                $e = $session->set('supplier_info',$ses_data);
                
                // echo print_r($e);
                // die();
                
                $session->setFlashdata('success','Data has been successfully saved');
                // echo "<pre>";
                // echo print_r($supplier);
                // die();
                // if($supplier) {

                //     if($supplier[0]['dashboard_access']==1) {

                //         return redirect()->to('apifrontController/profile');                        

                //     }elseif($supplier[0]['dashboard_access']==0){
                //         echo "Not Access";
                //     }

                // }else{
                //     echo 'no';
                // }
                // return redirect()->to('apifrontController/profile');

            }else{

                $session->setFlashdata("error","Incorrect Email or Password");
            }
        }else{
            $session->setFlashdata("error","Email not Found Please Login".' <a href="'.base_url('home/signup').'">SignUp</a>');
        }
        return redirect()->to('apifrontController/login');
    }
    
    public function profile(){
        $rs = check_session();

        if(!$rs) {

            return redirect()->to('apifrontController/login');

        }

        $data['pg_nm'] = 'Profile';

        $db = \Config\Database::connect();

        $session = session();
        $query = $db->query("SELECT * FROM api_module_category WHERE status=1");
        $data['category'] = $query->getResultArray();
      
        $query = $db->query("SELECT * FROM api_module WHERE status=1 and api_category='1'");
        $data['sub_category'] = $query->getResultArray();

        $data['supplier_info']= $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        // print_r($supplier_info);
        // die();
        
        return view('api/profile',$data);
        
    }
    
    public function logout() {
        $session = Session();
        $session->destroy();
        
        return redirect()->to('apifrontController/login');
    }
    
    public function User(){

      $db = \Config\Database::connect();

      $session = session();

      return view('api/user');


    }
    
   
    public function dashboard(){
        echo view('api/main-dashboard');
    }
    
    
}