<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\LeadModel;
use App\Models\ApiPlanModel;
use App\Models\TransportationDetailModel;
use App\Models\HotelStayModel;
use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;

class ApiPlanController extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }
        
    public function index(){

       
        $db = \Config\Database::connect();

        $data=$this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $query = $db->query("select amc.category_name as Api_category , api_module.* from api_module join api_module_category as amc on api_module.api_category=amc.id where api_module.status=1 ");
        $data['api'] = $query->getResultArray();
        $query = $db->query("select api_plan_module.* from api_plan_module  where api_plan_module.status=1 ");
        $data['api_plan_module'] = $query->getResultArray();
        
        return view('admin/api-plan',$data);


    }
    
     public function addPlanSubmit(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new ApiPlanModel(); 

        $plan_name = $this->request->getVar('plan_name');
        $plan_price = $this->request->getVar('plan_price');
        $description = $this->request->getVar('description');
        $plan_validity = $this->request->getVar('plan_validity');
        $no_of_hitting = $this->request->getVar('no_of_hitting');
      
        
      
        $plan_validity_time = $this->request->getPost('plan_validity_time');
        $api_name = $this->request->getPost('api_name');
        print_r($api_name);
        // die();
        
        $ava = $db->query("select * from  `api_plan_module` where plan_name='".$plan_name."' and status=1");
       
        $ava = $ava->getResultArray();

        if(empty($ava)){

            if($model->insert(['plan_name'=>$plan_name,'plan_price'=>$plan_price,'description'=>json_encode($description),'plan_validity'=>$plan_validity,'no_of_hitting'=>$no_of_hitting,'api_name'=>json_encode($api_name),'plan_validity_time'=>$plan_validity_time,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){

               $session->setFlashdata('success','Api Plan  name has been saved successfully');

            }else{

                $session->setFlashdata('error',' Not Save');

            }          

        }else{

         $session->setFlashdata('error','Api   <b>'.$plan_name.' </b< already exist!');

        }

        return redirect()->to('apiPlanController');

    }

    public function gettrainingCoursesdetails($id) {
    
        $db = \Config\Database::connect();        
        
        $ava = $db->query("SELECT tc.* FROM `training-courses` as tc where tc.id='".$id."' and tc.status=1");

        $ava = $ava->getResultArray();
      
 
                if($ava) {  
        
                        foreach($ava as $indi) {
        
                            $data=''.$indi['details'].'';
        
                        }
        
                    }
      

        echo $data;

    }

   

    public function edittrainingCourses(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new TrainingCourse(); 



      $courses_name = $this->request->getVar('course_name');
      
      $id = $this->request->getVar("courses_id");
      
      
      
      $description = $this->request->getPost('description');


     
        $ava = $db->query("select * from  `training-courses` where courses_name='".$courses_name."' and status=1");



      $ava = $ava->getResultArray();



        if(empty($ava)){



            $updated_data = [



                "courses_name" => $courses_name,
                
                
                "details" => $description



            ];



            if($model->where(['id' => $id])->set($updated_data)->update()){



               $session->setFlashdata('success','Courses name has been updated successfully');



            }else{



                $session->setFlashdata('error',' Not Updated');



            }          



        }else{



         $session->setFlashdata('error','No changes has been made in Courses name <b style="font-size:21px;"> '.$courses_name.' </b> might be exist already!');



        }



        return redirect()->to('TrainingCourses');



    }
    
    public function deletetrainingmoduleCoursese($id){



      $db = \Config\Database::connect();



      $session = session();



       $model = new CourseModule(); 
      



        if($model->update($id, ['status'=>0])){



             $session->setFlashdata('success','Training Coursese  Module has been delete successfully');



        }else{



             $session->setFlashdata('error','Training Module Courses not deleted');



        }     


               return redirect()->to('trainingCourses/courses');




    }
    
}