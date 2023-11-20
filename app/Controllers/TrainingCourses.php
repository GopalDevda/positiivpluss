<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\LeadModel;
use App\Models\FinanceModel;
use App\Models\ImpactModel;
use App\Models\RawMaterialProcessDetailModel;
use App\Models\RawmaterialDetailModel;
use App\Models\Finance_Sub_Category_Model;
use App\Models\IndustryModel;
use App\Models\IndicatorCategoryModel;
use App\Models\TrainingCourse;
use App\Models\IndicatorModel;
use App\Models\IndustryCategoryModel;
use App\Models\AssessmentModel;
use App\Models\AssessmentAnswerModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\DegreeModel;
use App\Models\Assessment;
use App\Models\ModuleModel;
use App\Models\SupplierModel;
use App\Models\GhgCategoryModel;
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
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;

class TrainingCourses extends BaseController

{ 
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }
        
        
        
    public function courses(){

        $db = \Config\Database::connect();

        $data=$this->helperData;
$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $session = session();

        $data['title'] = 'Module Courses Management';

        $query = $db->query("SELECT tc.courses_name,tcm.modulename,tcm.* FROM `training-courses-module` as tcm join `training-courses` as tc on tcm.course=tc.id  where tcm.status=1 ");

        $data['coursemodulelist'] = $query->getResultArray();

        $query = $db->query("SELECT tc.* FROM `training-courses` as tc  where tc.status=1 ");

        $data['courselist'] = $query->getResultArray();
        
        echo view('admin/courses-train-section',$data);

    }  
    public function cardcourses(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

   
$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $data['title'] = 'Module Courses Management';

        $query = $db->query("SELECT tc.courses_name,tcm.modulename,tcm.* FROM `training-courses-module` as tcm join `training-courses` as tc on tcm.course=tc.id  where tcm.status=1 ");

        $data['coursemodulelist'] = $query->getResultArray();

        $query = $db->query("SELECT tcm.* FROM `training-courses-module` as tcm  where tcm.status=1 ");

        $data['coursemodulelist'] = $query->getResultArray();
        
        echo view('admin/training-courses-card',$data);

    }
    
        public function startcourses(){

                $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Training';
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

        
        echo view('brand/harki',$data);

    }
    
    public function cardsave(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();

        $data['title'] = ' Courses Management';
     
        $contenttitle = $this->request->getVar('contenttitle');
     
        $contentdiscription = $this->request->getVar('contentdiscription');
        
        echo $contenttitle . $contentdiscription;
      
    }
    
    

    public function index(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

       $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        $data['title'] = 'Training Courses Management';

        $query = $db->query("SELECT tc.* FROM `training-courses` as tc  where tc.status=1 ");

        $data['courselist'] = $query->getResultArray();
        
        echo view('admin/training-courses',$data);

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

    public function addCourseName(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new CourseModule(); 

        $course_name = $this->request->getVar('course_name');
      
        $module_name = $this->request->getVar('module_name');
      
        $card_type = $this->request->getPost('card_id');
        
        $ava = $db->query("select * from  `training-courses-module` where modulename='".$module_name."' and status=1");
        // print_r( $this->request->getVar('module_name'));die();
        $ava = $ava->getResultArray();

        if(empty($ava)){

            if($model->insert(['course'=>$course_name,'modulename'=>$module_name,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){

               $session->setFlashdata('success','Training Module Course name has been saved successfully');

            }else{

                $session->setFlashdata('error',' Not Save');

            }          

        }else{

         $session->setFlashdata('error','Training Module Course  <b>'.$course_name.' </b< already exist!');

        }

        return redirect()->to('trainingCourses/courses');

    }
    
    public function addModuleName(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new TrainingCourse();
        
        $course_name = $this->request->getVar('course_name');
      
        $description = $this->request->getVar('description');
         
        $ava = $db->query("select * from  `training-courses` where courses_name='".$course_name."' and status=1");
        // print_r( $this->request->getVar('module_name'));die();
        $ava = $ava->getResultArray();

        if(empty($ava)){

            if($model->insert(['courses_name'=>$course_name,'details'=>$description,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){

               $session->setFlashdata('success','Training Course name has been saved successfully');

            }else{

                $session->setFlashdata('error',' Not Save');

            }          

        }else{

         $session->setFlashdata('error','Training Course  <b>'.$course_name.' </b< already exist!');

        }

        return redirect()->to('trainingCourses');

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
    
    
     public function edittrainingmoduleCourses(){



      $db = \Config\Database::connect();



      $session = session();



     $model = new CourseModule(); 



        $courses_name = $this->request->getVar('courses_id');
        
        $module_name = $this->request->getVar('module_name');
      
        $id = $this->request->getVar("module_id");
        
        $ava = $db->query("select * from  `training-courses-module` where modulename='".$module_name."' and status=1");



      $ava = $ava->getResultArray();



        if(empty($ava)){



            $updated_data = [



                "course" => $courses_name,
                
                
                "modulename" => $module_name



            ];



            if($model->where(['id' => $id])->set($updated_data)->update()){



               $session->setFlashdata('success','Courses module name has been updated successfully');



            }else{



                $session->setFlashdata('error',' Not Updated');



            }          



        }else{



         $session->setFlashdata('error','Courses module name <b> '.$courses_name.' </b> already exist!');



        }



        return redirect()->to('trainingCourses/courses');



    }

    public function deletetrainingCoursese($id){



      $db = \Config\Database::connect();



      $session = session();



      $model = new TrainingCourse(); 
      



        if($model->update($id, ['status'=>0])){



             $session->setFlashdata('success','Training Coursese  has been delete successfully');



        }else{



             $session->setFlashdata('error','Training Courses not deleted');



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
    
//      public function viewmodule($id){
//         $db = \Config\Database::connect();
//         $data=$this->helperData;
//         $session = session();
        
//         $query = $db->query("SELECT * FROM `training-courses-module` WHERE id = '$id' AND status = 1");
      
//         $folloupdata_arrr = $query->getResultArray();
       
//              $i=1;
            
//                      if($folloupdata_arrr) {
            
//      foreach($folloupdata_arrr as $f){
         
           
            
//     $r='<div class="card-body"> <p class="card-text" id="output"></p> <div class="card-body">';
                                             
//     $r.='<h1 contentEditable="true"><input  style=" background-color: white;  width: 20rem;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;
//                             border-bottom-style: groove;background-color: #ffffff; type="text" value="'.$f['contenttitle'].'" name="contenttitle"></h1>
//             <div contentEditable="true"><textarea style=" background-color: white;width: 20rem;border-top-style: hidden; border-right-style: hidden;border-left-style: hidden;
//                             border-bottom-style: groove;background-color: #eee;" value="'.$f['contentdiscription'].'" name="contentdiscription"></textarea></div> ';
                                                                            
                                                                
//     $r.='<h1 contentEditable="true"><input style=" background-color: white; width: 20rem;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;
//                             border-bottom-style: groove;background-color: #ffffff; "type="text" value="'.$f['contenttitle1'].'" name="contenttitle1"></h1>
//              <div contentEditable="true"><textarea style=" background-color: white;width: 20rem;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;
//                             border-bottom-style: groove;background-color: #eee; " value="'.$f['contentdiscription1'].'" name="contentdiscription1"></textarea></div>   
                                                                            
//                                                                             <!--middle end-->
//                                                                             <!--end start-->
//                                                                             ';
//     $r.=' <h1 contentEditable="true"><input  style=" background-color: white; width: 20rem; border-top-style: hidden; border-right-style: hidden;border-left-style: hidden;
//                             border-bottom-style: groove;background-color: #ffffff;type="text" value="'.$f['contenttitle2'].'" name="contenttitle2"> </h1>
//             <div contentEditable="true"><textarea style=" background-color: white; width: 20rem;border-top-style: hidden;border-right-style: hidden; border-left-style: hidden;
//                             border-bottom-style: groove; background-color: #eee;  " value="'.$f['contentdiscription2'].'" name="contentdiscription2"></textarea></div>
//                                                                  ';
                                                                   
//     $r.='</div> </div>';

// } 
         
//          echo $r; 
//      }  

    
//      }
     public function viewmodule($id){
        $db = \Config\Database::connect();
        $data=$this->helperData;
        $session = session();
        
        $query = $db->query("SELECT * FROM `training-courses-module` WHERE id = '$id' AND status = 1");
      
        $folloupdata_arrr = $query->getResultArray();
       
             $i=1;
            
                     if($folloupdata_arrr) {
            
     foreach($folloupdata_arrr as $f){
         
           
            
    $r='<div class="card-body"> <p class="card-text" id="output"></p> <div class="card-body">';
                                             
    $r.='<h1 contentEditable="true">'.$f['contenttitle'].'</h1>
            <div contentEditable="true">'.$f['contentdiscription'].'</div> ';
                                                                            
    $r.='<h1 contentEditable="true">'.$f['contenttitle1'].'</h1>
            <div contentEditable="true">'.$f['contentdiscription1'].'</div> ';
                                                                           
    $r.=' <h1 contentEditable="true">'.$f['contenttitle2'].' </h1>
            <div contentEditable="true">'.$f['contentdiscription2'].'</div> ';
            
    $r.='</div> </div>';

} 
         
         echo $r; 
     }  

    
     }

     public function training(){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Trainings';
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

        echo view('brand/training',$data);
    }

    public function course_detail(){
        $rs = check_session();
        if(!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Training';
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

        echo view('brand/course-detail',$data);
    }
    
}