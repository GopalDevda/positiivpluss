<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

use App\Models\AssessmentModel;

use App\Models\Finance_Sub_Category_Model;

use App\Models\Consumption_Sub_Category_Model;

use App\Models\AllMasterAssessmentAnswerModel;

use App\Models\AssessmentAnswerModel;

use App\Models\FinanceModel;

use App\Models\DegreeModel;

use App\Models\SingleMasterAnswerModel;

use App\Models\ModuleModel;

use App\Models\IndustryModel;

use App\Models\SdgModel;

use App\Models\IndicatorModel;

use App\Models\SdgAssessmentModel;

use App\Models\SdgAssessmentAnswerModel;

use App\Models\ModuleItemModel;

use App\Models\StandardModel;

use App\Models\ProAssessmentQuestionClassificationModel;
use App\Models\ProAssessmentQuestionStandardModel;
use App\Models\ProAssessmentAnswerModel;
use App\Models\ProAssessmentModel;

use App\Models\AllAssessmentQuestionClassificationModel;
use App\Models\AllAssessmentQuestionStandardModel;
use App\Models\AllAssessmentAnswerModel;
use App\Models\AllAssessmentModel;
use App\Models\AllAdvanceAssessmentModel;
use App\Models\BrandQualitativeAnswerModel;

use App\Models\ClassificationModel;
use App\Models\AssessmentQuestionStandardModel;
use App\Models\AssessmentQuestionClassificationModel;
use App\Models\SdgAssessmentQuestionStandardModel;
use App\Models\DisclosureModel;


class Assessment extends BaseController{

    private $helperData=array();
    public function __construct(){

        helper(['form', 'url','html','menu']);

        $session = \Config\Services::session();

        $this->helperData=commonData();

       // $this->user_info = $this->session->get_userdata();

    }

    

    public function index(){

        echo view('login');

    }


 public function FinanceSubCategory()
 {

        $db = \Config\Database::connect();

        $data=$this->helperData;

     

$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }


        $query = $db->query("select * from industry where status=1");

        $data['industry'] = $query->getResultArray();

        $query = $db->query("select * from finance where status=1");

        $data['SubCategory'] = $query->getResultArray();
        
        $query = $db->query("SELECT fsc.id, fsc.sub_category, ins.industry_name, ins.id as insid, f.id as fid, f.finance_name FROM Finance_Sub_Category AS fsc LEFT JOIN industry AS ins ON ins.id = fsc.industry_id LEFT JOIN finance AS f ON f.id = fsc.finance_category_id WHERE fsc.status = 1");
        
        $data['subfinance'] = $query->getResultArray();


       
        
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add_FinanceSubCategory',$data);

    }
    public function ConsumptionSubCategory(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();


        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }


        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();

        $query = $db->query("select * from consumption where status=1 ");

        $data['SubCategory'] = $query->getResultArray();
        
        $query = $db->query("select * from factor where status=1 and ghg_id=29");

        $data['GhgConsumptionFactor'] = $query->getResultArray();
        
        $query = $db->query("SELECT csc.id, csc.sub_category,ins.id as insId, ins.industry_name,con.id as conId, con.consumption_name,f.id as fid, f.factor_name FROM Consumption_Sub_Category AS csc LEFT JOIN industry AS ins ON ins.id = csc.industry_id LEFT JOIN consumption AS con ON con.id = csc.consumption_category_id LEFT JOIN factor as f ON f.id=csc.factor_id WHERE csc.status = 1 ORDER BY csc.id ASC");
        $data['subconsu'] = $query->getResultArray();



       
        
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add_ConsumptionSubCategory',$data);

    }
    public function assessmentQuestion(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();
        
        $disclosure_model = new DisclosureModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();



        $data['standard'] = $standard_model->where('status',1)->findAll();



        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add-assessment-question',$data);

    }
    
    
    public function proassessmentQuestion(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();



        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();
        $disclosure_model = new DisclosureModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();



        $data['standard'] = $standard_model->where('status',1)->findAll();



        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add-pro-assessment-question',$data);

    }



public  function demo($value='')

{

        $db = \Config\Database::connect();

        $db->query('ALTER TABLE base_assessment_question ADD remark varchar(255);');

}


 public function addFinanceSubCategory(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new Finance_Sub_Category_Model();

        

        $industry_id = $this->request->getVar('industry_id');

        $category_id = $this->request->getVar('Category_id');
        
        $sub_category = $this->request->getVar('FinanceSubCategory');

      
        $Finance_Sub_Category = $model->insert(['industry_id'=>$industry_id,'finance_category_id'=>$category_id,'sub_category'=>$sub_category,'status'=>1,'user_id'=>1]); 

        

        if($Finance_Sub_Category){

              $session->setFlashdata('success','Finance Sub Category has been successfully saved');
 
        }else{

               $session->setFlashdata('error','Finance Sub Category Not Saved');

       }

       return redirect()->to('assessment/FinanceSubCategory');

    }
    
    public function addConsumptionSubCategory(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new Consumption_Sub_Category_Model();

        

        $industry_id = $this->request->getVar('industry_id');

        $category_id = $this->request->getVar('Category_id');
        
        $sub_category = $this->request->getVar('ConsumptionSubCategory');
        
        $factor_id = $this->request->getVar('Factor_id');
        
        

     
        $Consumption_Sub_Category = $model->insert(['industry_id'=>$industry_id,'consumption_category_id'=>$category_id,'factor_id'=>$factor_id,'sub_category'=>$sub_category,'status'=>1,'user_id'=>1]); 

        

        if($Consumption_Sub_Category){

              $session->setFlashdata('success','Consumption Sub Category has been successfully saved');
 
        }else{

               $session->setFlashdata('error','Consumption Sub Category Not Saved');

       }

       return redirect()->to('assessment/ConsumptionSubCategory');

    }
        public function addAssessmentQuestion(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new AssessmentModel();

        $answer_model = new AssessmentAnswerModel();

        $assessment_question_standard_model = new AssessmentQuestionStandardModel();

        $assessment_question_classification_model = new AssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');

        // $indicator_category_id = $this->request->getVar('indicator_category_id');

        // $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        $badge = $this->request->getVar('badge_id');
        
        
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $questionId = $model->insert(['question'=>$question,'choice'=>$choice,'status'=>1,'user_id'=>1,'remark'=>$remark,'is_document_needed' => $doc_needed_status, 'question_title' => $question_title, 'disclosure_id' => $disclosure_id]); 

        if($questionId){

              if(!empty($answer)){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['base_assessment_question_id' => $questionId, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['base_assessment_question_id'=>$questionId,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key], "badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }
                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $assessment_question_standard_model->insert(['question_id'=>$questionId,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId && $answer_id){

              $session->setFlashdata('success','Assessment Question has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/assessmentQuestion');

    }
    
        public function addAllAssessmentmasteranswer(){

        $db = \Config\Database::connect();

        $session = session();
       $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $answer_model = new AllMasterAssessmentAnswerModel();

     
        $choice = $this->request->getVar('choice');


        // $remark = $this->request->getVar('remark');
        
        if($choice=="Single"){
            
             $answer = $this->request->getVar('singleanswer');
        }
        else{
        $answer = $this->request->getVar('answer');
        
        }
        
        $answeroption = $this->request->getVar('answeroption');
        
        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
       

        // $doc_needed_status = $this->request->getVar('doc_needed_status');

        
        // $disclosure_id = $this->request->getVar('disclosure_id');
        
       
if($choice!=="Multi"){
 

              
              if(!empty($degree)){
foreach($degree as $key=>$r){
                  
                               $answer_id = $answer_model->insert(['choice'=>$choice,'answer'=>$answer,'answeroption'=>$answeroption,"marks"=>$mark[$key],"degree_id"=>$r, "badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                  
                    
                }
}
    
}
else{
            if(!empty($answer)){
   
                $answer_id = $answer_model->insert(['choice'=>$choice,'answeroption'=>$answeroption,'answer'=>json_encode($answer),"marks"=>json_encode($mark),"degree_id"=>json_encode($degree), "badge_id"=>json_encode($badge),"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                   
                }
}

                      if($answer_id){
                    
                                  $session->setFlashdata('success','Assessment Master Answer has been successfully saved');
                    
                            }else{
                    
                                   $session->setFlashdata('error','Not Saved');
                    
                           }

       return redirect()->to('assessment/allmasterassessmentanswer/');

    }   
    
    
    public function editAllAssessmentmasteranswer(){

        $db = \Config\Database::connect();

        $session = session();

        $answer_model = new AllMasterAssessmentAnswerModel();

     
        $choice = $this->request->getVar('choice');
        $id = $this->request->getVar('id');


       
        
        if($choice=="Single"){
            
             $answer = $this->request->getVar('singleanswer');
        }
        else{
        $answer = $this->request->getVar('answer');
        
        }
        
        $answeroption = $this->request->getVar('answeroption');
        
        
        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
       
       
if($choice!=="Multi"){
 

              
              if(!empty($degree)){
foreach($degree as $key=>$r){
                  
    $answer_id = $answer_model->insert(['choice'=>$choice,'answer'=>$answer,'answeroption'=>$answeroption,"marks"=>$mark[$key],"degree_id"=>$r, "badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                  
                    
                }
}
    
}
else{
            if(!empty($answer)){
    $updated_data = [

                    'choice'=>$choice,
                    'answeroption'=>$answeroption,
                    'answer'=>json_encode($answer),
                    "marks"=>json_encode($mark),
                    "degree_id"=>json_encode($degree), 
                    "badge_id"=>json_encode($badge),
                    "status"=>1,
                    "user_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')

        ];
        
        
        $questionId = $answer_model->where(['id' => $id])->set($updated_data)->update(); 
   
   
   
 
                   
                }
}

                      if($questionId){
                    
                                  $session->setFlashdata('success','Assessment Master Answer has been successfully Updated');
                    
                            }else{
                    
                                   $session->setFlashdata('error','Not Saved');
                    
                           }

       return redirect()->to('assessment/allmasterassessmentanswer/');

    } 
     public function addAllAssessmentQuestion(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new AllAssessmentModel();

        $answer_model = new AllAssessmentAnswerModel();

        $assessment_question_standard_model = new AllAssessmentQuestionStandardModel();

        $assessment_question_classification_model = new AllAssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');
       
        $assess = $this->request->getVar('assess');

        $indicator_category_id = $this->request->getVar('indicator_category_id');

        $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');
        
        $mandatory_needed_status = $this->request->getVar('mandatory_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $sub_classification = json_encode($this->request->getVar('sub_classification_name0'));



// print_r($standard_arr);
// print_r($classfication_arr);
// print_r($sub_classification);
// die();

        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $data = 
       [
        'question'=>$question,
        'all_assessment_id'=>$assess,
        'clasification'=>$classfication_arr,
        'sub_clasification'=>$sub_classification,
        'is_mandatory_needed'=>$mandatory_needed_status,
        'choice'=>$choice,
        'status'=>1,
        'user_id'=>1,
        'answer'=>$answer,
        'remark'=>$remark,
        'is_document_needed'=>$doc_needed_status, 
        'question_title'=>$question_title,
        'standard'=>$standard_arr,
    ]; 

        $questionId = $model->insert($data);

        if($questionId){

              $session->setFlashdata('success','Assessment Question has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/allassessmentQuestion/'.$assess);

    } 
     public function addAdvanceAllAssessmentQuestion(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new AllAdvanceAssessmentModel();

        $answer_model = new AllAssessmentAnswerModel();

        $assessment_question_standard_model = new AllAssessmentQuestionStandardModel();

        $assessment_question_classification_model = new AllAssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');
       
        $assess = $this->request->getVar('assess');

        // $indicator_category_id = $this->request->getVar('indicator_category_id');

        // $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');
        
        $mandatory_needed_status = $this->request->getVar('mandatory_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        // $disclosure_id = $this->request->getVar('disclosure_id');
        $questionId = $model->insert(['question'=>$question,'all_assessment_id'=>$assess,'is_mandatory_needed'=>$mandatory_needed_status,'choice'=>$choice,'status'=>1,'user_id'=>1,'answer'=>$answer,'remark'=>$remark,'is_document_needed' => $doc_needed_status,  'question_title' => $question_title]); 

        

        if($questionId){

              $session->setFlashdata('success','Assessment Question has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/alladvanceassessmentQuestion/'.$assess);

    } 
    
        public function addProAssessmentQuestion(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new ProAssessmentModel();

        $answer_model = new ProAssessmentAnswerModel();

        $assessment_question_standard_model = new ProAssessmentQuestionStandardModel();

        $assessment_question_classification_model = new ProAssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');

        // $indicator_category_id = $this->request->getVar('indicator_category_id');

        // $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        $badge = $this->request->getVar('badge_id');
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $questionId = $model->insert(['question'=>$question,'choice'=>$choice,'status'=>1,'user_id'=>1,'remark'=>$remark,'is_document_needed' => $doc_needed_status,  'question_title' => $question_title, 'disclosure_id' => $disclosure_id]); 

        if($questionId){

              if(!empty($answer)){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['base_assessment_question_id' => $questionId, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['base_assessment_question_id'=>$questionId,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key], "badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }
                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $assessment_question_standard_model->insert(['question_id'=>$questionId,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId && $answer_id){

              $session->setFlashdata('success','Assessment Question has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/proassessmentQuestion');

    }



    public function getIndicatorByIndicatorCategory($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from indicator where status=1 and indicator_category_id='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Indicator</option>";

        if(!empty($cat)){

            foreach($cat as $c){

                $data.="<option value=".$c['id'].">".$c['indicator_name']."</option>";

             }

        }
        $response = [
            'succss'=>$data];

        return $this->response->setJSON($response);


    }
    public function getsubindustryByindustry($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from SubSubIndustry where status=1 and industry='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Indicator</option>";

        if(!empty($cat)){

            foreach($cat as $c){

                $data.="<option value=".$c['id'].">".$c['subsubindustry']."</option>";

             }

        }

        return $data;

    }   
    
    
    // update the master all answer start
//     public function addAllAssessmentmasteranswer(){

//         $db = \Config\Database::connect();

//         $session = session();

//         $answer_model = new AllMasterAssessmentAnswerModel();

     
//         $choice = $this->request->getVar('choice');


//         // $remark = $this->request->getVar('remark');
        
//         if($choice=="Single"){
            
//              $answer = $this->request->getVar('singleanswer');
//         }
//         else{
//         $answer = $this->request->getVar('answer');
        
//         }
        
//         $answeroption = $this->request->getVar('answeroption');
        
//         $mark = $this->request->getVar('marks');

//         $degree = $this->request->getVar('degree_id');
        
//         $badge = $this->request->getVar('badge_id');
        
       

//         // $doc_needed_status = $this->request->getVar('doc_needed_status');

        
//         // $disclosure_id = $this->request->getVar('disclosure_id');
        
       
// if($choice!=="Multi"){
 

              
//               if(!empty($degree)){
// foreach($degree as $key=>$r){
                  
//                               $answer_id = $answer_model->insert(['choice'=>$choice,'answer'=>$answer,'answeroption'=>$answeroption,"marks"=>$mark[$key],"degree_id"=>$r, "badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                  
                    
//                 }
// }
    
// }
// else{
//             if(!empty($answer)){
   
//                 $answer_id = $answer_model->insert(['choice'=>$choice,'answeroption'=>$answeroption,'answer'=>json_encode($answer),"marks"=>json_encode($mark),"degree_id"=>json_encode($degree), "badge_id"=>json_encode($badge),"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                   
//                 }
// }

//                       if($answer_id){
                    
//                                   $session->setFlashdata('success','Assessment Master Answer has been successfully saved');
                    
//                             }else{
                    
//                                   $session->setFlashdata('error','Not Saved');
                    
//                           }

//       return redirect()->to('assessment/allmasterassessmentanswer/');

//     } 
    
     // update the master all answer end
    
    public function editmasteranser($id) {
           
        $db = \Config\Database::connect();
        $data=$this->helperData;
        
        $query = $db->query("select * from degree where status=1");
        $data['degree'] = $query->getResultArray();
        
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();
        
        $query = $db->query("select * from all_master_assessment_answer where status=1 and id=".$id);
        $data['answer'] = $query->getResultArray();

     
        $query = $db->query("select ipt.*,u.unit_name  from nImpact as ipt join unit as u on u.id=ipt.impact_unit where ipt.status=1 ");
        return view('admin/edit-master-answer.php',$data);
    }

 public function allmasterassessmentanswer() {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $data['title'] = 'Assessment Answer Management';

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge']=$query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from base_assessment_question where status=1");

        $rs = $query->getResultArray();

        $list=array();

        $query = $db->query("select amaa.*,d.name as degree_name,b.badge_name as badge_name from all_master_assessment_answer as amaa left join degree as d on amaa.degree_id=d.id left join badge as b on amaa.badge_id=b.id where amaa.status=1 ");
        $answers = $query->getResultArray();

        $data['answers']=$answers;

        return view('admin/view-master-assessment-answer',$data);

    }
    public function viewAssessmentQuestion() {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $data['title'] = 'Assessment Questions Management';

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge']=$query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from base_assessment_question where status=1");

        $rs = $query->getResultArray();

        $list=array();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from industry where status=1 and id='".$r['industry_id']."' ");

                $industry = $query->getResultArray();

                if(!empty($industry)){$industry_name =$industry[0]['industry_name']; }else{$industry_name=0;}

                $query = $db->query("select * from indicator where status=1 and id='".$r['indicator_id']."' ");

                $indicator = $query->getResultArray();

                if(!empty($indicator)){$indicator_name =$indicator[0]['indicator_name']; }else{$indicator_name=0;}

                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");

                $indicator_category = $query->getResultArray();

                if(!empty($indicator_category)){$indicator_category_name =$indicator_category[0]['indicator_category_name']; }else{$indicatory_category_name=0;}

                $query = $db->query("select * from disclosure where status=1 and id='".$r['disclosure_id']."' ");

                $disclosure = $query->getResultArray();

                if(!empty($disclosure)){$disclosure_name =$disclosure[0]['disclosure_name']; }else{$disclosure_name='';}

                $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'indicator_category_name' => $indicator_category_name, 'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'], 'question_title' => $r['question_title'],'disclosure_name' => $disclosure_name);          

            }

        }

        $data['list']=$list;

        return view('admin/view-assessment',$data);

    }
  

       
 public function viewallassessmentquestion($name) {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $queryAssessment = $db->query("SELECT * FROM `assessment` WHERE  status=1 and id=".$name)->getResultArray();
        // print_r($queryAssessment);
        // die();
        $data['title'] = $queryAssessment[0]['id'];
        
        $data['heading'] = $queryAssessment[0]['assessment_name'];


        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        
        $query = $db->query("select * from badge where status=1");
        
        $data['badge']=$query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from all_assessment_question where status=1 and all_assessment_id=".$name);

        $rs = $query->getResultArray();
    
        $list=array();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from industry where status=1 and id='".$r['industry_id']."' ");

                $industry = $query->getResultArray();

                if(!empty($industry)){$industry_name =$industry[0]['industry_name']; }else{$industry_name=0;}

                $query = $db->query("select * from indicator where status=1 and id='".$r['indicator_id']."' ");

                $indicator = $query->getResultArray();

                if(!empty($indicator)){$indicator_name =$indicator[0]['indicator_name']; }else{$indicator_name=0;}

                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");

                $indicator_category = $query->getResultArray();
               

                if(!empty($indicator_category)){$indicatory_category_name =$indicator_category[0]['indicator_category_name']; }else{$indicatory_category_name=0;}
               

                $query = $db->query("select * from disclosure where status=1 and id='".$r['disclosure_id']."' ");

                $disclosure = $query->getResultArray();

                if(!empty($disclosure)){$disclosure_name =$disclosure[0]['disclosure_name']; }else{$disclosure_name='';}

                // $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'indicator_category_name' => $indicator_category_name, 'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'], 'question_title' => $r['question_title'],'disclosure_name' => $disclosure_name); 

                $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'indicator_category_name' => $indicatory_category_name,  'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'],'is_mandatory_needed' => $r['is_mandatory_needed'], 'question_title' => $r['question_title'],'disclosure_name' => $disclosure_name);          

            }

        } 

        $data['list']=$list;

        return view('admin/view-all-assessment-question',$data);

    }    
    
    public function viewalladvanceassessmentquestion($name) {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $queryAssessment = $db->query("SELECT * FROM `advancedassessment` WHERE  status=1 and id=".$name)->getResultArray();
        
        $data['title'] = $queryAssessment[0]['id'];
        
        $data['heading'] = $queryAssessment[0]['assessment_name'];


        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        
        $query = $db->query("select * from badge where status=1");
        
        $data['badge']=$query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from all_advance_assessment_question where status=1 and all_assessment_id=".$name);

        $rs = $query->getResultArray();
        // echo $db->getLastQuery($rs);
        // print_r($rs);die();
        $list=array();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from industry where status=1 and id='".$r['industry_id']."' ");

                $industry = $query->getResultArray();

                if(!empty($industry)){$industry_name =$industry[0]['industry_name']; }else{$industry_name=0;}

                // $query = $db->query("select * from indicator where status=1 and id='".$r['indicator_id']."' ");

                // $indicator = $query->getResultArray();

               

                if(!empty($disclosure)){$disclosure_name =$disclosure[0]['disclosure_name']; }else{$disclosure_name='';}

                // $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'indicator_category_name' => $indicator_category_name, 'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'], 'question_title' => $r['question_title'],'disclosure_name' => $disclosure_name);          
                $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,  'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'],'is_mandatory_needed' => $r['is_mandatory_needed'], 'question_title' => $r['question_title']);          

            }

        } 

        $data['list']=$list;

        return view('admin/view-all-advance-assessment-question',$data);

    }    
    
  public function allassessmentQuestion($name)
    {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();
        
        $queryAssessment = $db->query("SELECT * FROM `assessment` WHERE  status=1 and id=".$name)->getResultArray();
        
        $data['title'] = $queryAssessment[0]['id'];
        
        $data['heading'] = $queryAssessment[0]['assessment_name'];

        $standard_model = new StandardModel();
      
        $disclosure_model = new DisclosureModel();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();



        $data['standard'] = $standard_model->where('status',1)->findAll();



        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add-all-assessment-question',$data);

    }

  public function alladvanceassessmentQuestion($name)
  {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();
        
        $queryAssessment = $db->query("SELECT * FROM `advancedassessment` WHERE  status=1 and id=".$name)->getResultArray();
        
        $data['title'] = $queryAssessment[0]['id'];
        
        $data['heading'] = $queryAssessment[0]['assessment_name'];

        $standard_model = new StandardModel();
        
        $disclosure_model = new DisclosureModel();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();

        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add-all-advance-assessment-question',$data);

    }
   
   
    public function addallmasterassessmentanswer(){

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $session = session();
        
        
        
        $data['title'] = "master answer";
        
        $data['heading'] = "Assessment answer";

        $standard_model = new StandardModel();
        
        $single_model = new SingleMasterAnswerModel();
        
        $disclosure_model = new DisclosureModel();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();



        $data['standard'] = $standard_model->where('status',1)->findAll();
        
        
        $data['singleanswer'] = $single_model->where('status',1)->findAll();



        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $data['disclosure'] = $disclosure_model->where('status',1)->findAll();
        // echo '<pre>';
        // print_r($data['disclosure']);
        // die();
        echo view('admin/add-all-answer',$data);

    }
    public function getalleditallAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

       
        $query = $db->query("select * from all_master_assessment_answer as amaa  where amaa.status=1 and amaa.choice='".$id."'");
        $answers = $query->getResultArray();






            // <option value="">Select Choice</option>






        // </select>
        $data.="<select name='answer'  required='required' class='form-control' >";

       
        $data.="<option value=''>Select Answer</option>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<option value='".$ans['id']."'>".$ans['answer']."</option>";

            }

        }

         $data.="</select>";
         
        return $data;

    }  
    
    public function getallallAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

       
        $query = $db->query("select * from all_master_assessment_answer as amaa  where amaa.status=1 and amaa.choice='".$id."'");
        $answers = $query->getResultArray();
        $data.="<select name='answer'  required='required' class='form-control' >";

        $data.="<option value=''>Select Answer</option>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<option value='".$ans['id']."'>".$ans['answer']."</option>";

            }

        }

         $data.="</select>";
         
        return $data;

    }
    public function getalladvanceallAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

       
        $query = $db->query("select * from all_master_assessment_answer as amaa  where amaa.status=1 and amaa.choice='".$id."'");
        $answers = $query->getResultArray();
        $data.="<select name='answer'  required='required' class='form-control' >";

        $data.="<option value=''>Select Answer</option>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<option value='".$ans['id']."'>".$ans['answer']."</option>";

            }

        }

         $data.="</select>";
         
        return $data;

    }
    
    public function getallAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

       
        $query = $db->query("select amaa.answer from all_assessment_question as aaq join all_master_assessment_answer as amaa on amaa.id=aaq.answer where aaq.status=1 and aaq.id='".$id."'");
        
        $answers = $query->getResultArray();

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Answer</th>";


        $data.="</tr>";
$r=json_decode($answers[0]['answer']);
        if(!empty($answers)){

            $s=1;

           
foreach($r as $rg){
                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$rg;

                $data.="</td>";

               
                $data.="</tr>";

                $s++;

}  

        }

        $data.="</table>";

        return $data;

    }
    public function getalladvanceAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

       
        $query = $db->query("select amaa.answer from all_advance_assessment_question as aaq join all_master_assessment_answer as amaa on amaa.id=aaq.answer where aaq.status=1 and aaq.id='".$id."'");
        
        $answers = $query->getResultArray();

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Answer</th>";


        $data.="</tr>";
$r=json_decode($answers[0]['answer']);
        if(!empty($answers)){

            $s=1;

           
foreach($r as $rg){
                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$rg;

                $data.="</td>";

               
                $data.="</tr>";

                $s++;

}  

        }

        $data.="</table>";

        return $data;

    }
    
    public function viewProAssessmentQuestion() {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $data['title'] = 'Pro Assessment Questions Management';


        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge']=$query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from pro_assessment_question where status=1");

        $rs = $query->getResultArray();

        $list=array();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from industry where status=1 and id='".$r['industry_id']."' ");

                $industry = $query->getResultArray();

                if(!empty($industry)){$industry_name =$industry[0]['industry_name']; }else{$industry_name=0;}

                $query = $db->query("select * from indicator where status=1 and id='".$r['indicator_id']."' ");

                $indicator = $query->getResultArray();

                if(!empty($indicator)){$indicator_name =$indicator[0]['indicator_name']; }else{$indicator_name=0;}

                $query = $db->query("select * from indicator_category where status=1 and id='".$r['indicator_category_id']."' ");

                $indicator_category = $query->getResultArray();

                if(!empty($indicator_category)){$indicator_category_name =$indicator_category[0]['indicator_category_name']; }else{$indicatory_category_name=0;}

                $query = $db->query("select * from disclosure where status=1 and id='".$r['disclosure_id']."' ");

                $disclosure = $query->getResultArray();

                if(!empty($disclosure)){$disclosure_name =$disclosure[0]['disclosure_name']; }else{$disclosure_name='';}

                $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'indicator_category_name' => $indicator_category_name, 'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'], 'question_title' => $r['question_title'],'disclosure_name' => $disclosure_name);          

            }

        }

        $data['list']=$list;

        return view('admin/view-pro-assessment',$data);

    }
    
      public function editAllAssessmentQuestion($id) {

        $db = \Config\Database::connect();

        $data=$this->helperData;   
        
        $data['heading'] = "Edit";
        $data['title'] = "Edit master";
        $standard_model = new StandardModel();

        $rs = $db->query("select *  from all_assessment_question  where id=".$id);
        $rsr = $db->query("select aaq.*,amaa.answer as aws from all_assessment_question as aaq join all_master_assessment_answer as amaa on amaa.id=aaq.answer where aaq.id=".$id);

        $data['rs'] = $rs->getRow();
        $data['rsr'] = $rsr->getRow();
     // print_r($data['rs']);
     // die();

        $data['standard'] = $standard_model->where('status',1)->findAll();
        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        
         $query = $db->query("select * from indicator_category where status=1 ");

        // $data['indicator_category'] = $query->getResultArray();

        // $query = $db->query("select * from indicator where indicator_category_id=".$data['rs']->indicator_category_id." and status=1");

        $data['indicator'] = $query->getResultArray(); 
        
        $query = $db->query("select * from all_master_assessment_answer where status=1");
        $data['answer'] = $query->getResultArray();
        return view('admin/edit-All-assessment-question.php',$data);

    }
      public function editAllAdvanceAssessmentQuestion($id) {

        $db = \Config\Database::connect();

        $data=$this->helperData;   
        
        $data['heading'] = "Edit Advance";
        $data['title'] = "Edit master";
        $standard_model = new StandardModel();

        $rs = $db->query("select *  from all_advance_assessment_question  where id=".$id);
        $rsr = $db->query("select aaq.*,amaa.answer as aws from all_advance_assessment_question as aaq join all_master_assessment_answer as amaa on amaa.id=aaq.answer where aaq.id=".$id);

        $data['rs'] = $rs->getRow();
        $data['rsr'] = $rsr->getRow();
     
        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        
         $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();

        
        
        $query = $db->query("select * from all_master_assessment_answer where status=1");
        $data['answer'] = $query->getResultArray();
        return view('admin/edit-All-Advance-assessment-question.php',$data);

    }


public function editAssessmentQuestion($id) {

        $db = \Config\Database::connect();

        $data=$this->helperData;        

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $rs = $db->query("select * from base_assessment_question where id=".$id);

        $data['rs'] = $rs->getRow();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();

        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();

        $query = $db->query("select * from degree where status=1");

        $data["degree"] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();
        $query = $db->query("select * from indicator where indicator_category_id=".$data['rs']->indicator_category_id." and status=1");

        $data['indicator'] = $query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();

        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        return view('admin/edit-assessment-question.php',$data);

    }
public function editAdvanceAssessmentQuestion($id) {

        $db = \Config\Database::connect();

        $data=$this->helperData;        

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $rs = $db->query("select * from base_assessment_question where id=".$id);

        $data['rs'] = $rs->getRow();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();

        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();

        $query = $db->query("select * from degree where status=1");

        $data["degree"] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();
        $query = $db->query("select * from indicator where indicator_category_id=".$data['rs']->indicator_category_id." and status=1");

        $data['indicator'] = $query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();

        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        return view('admin/edit-advance-assessment-question.php',$data);

    }
    public function editProAssessmentQuestion($id) {

        $db = \Config\Database::connect();

        $data=$this->helperData;        

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $rs = $db->query("select * from pro_assessment_question where id=".$id);

        $data['rs'] = $rs->getRow();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();

        $query = $db->query("select * from indicator_category where status=1 ");

        $data['indicator_category'] = $query->getResultArray();

        $query = $db->query("select * from degree where status=1");

        $data["degree"] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");
        $data['badge'] = $query->getResultArray();
        $query = $db->query("select * from indicator where indicator_category_id=".$data['rs']->indicator_category_id." and status=1");

        $data['indicator'] = $query->getResultArray();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();

        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        return view('admin/edit-Pro-assessment-question.php',$data);

    }



    public function updateProAssessmentQuestion() {

        $db = \Config\Database::connect();

        $session = session();

        $model = new ProAssessmentModel();

        $answer_model = new ProAssessmentAnswerModel();

        $assessment_question_standard_model = new ProAssessmentQuestionStandardModel();

        $id = $this->request->getVar("id");

        $industry_id = $this->request->getVar('industry_id');

        $indicator_category_id = $this->request->getVar('indicator_category_id');

        $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $doc_needed_status = $this->request->getVar("doc_needed_status");

        $location = $this->request->getVar('location_id');

        $company = $this->request->getVar('company_id');

        // echo '<pre>';

        // print_r(count($answer));

        // die();

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        $badge = $this->request->getVar('badge_id');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $updated_data = [

            'industry_id'=>$industry_id,

            'indicator_category_id'=>$indicator_category_id,

            'indicator_id'=>$indicator_id,

            'question'=>$question,

            'choice'=>$choice,

            'status'=>1,

            'user_id'=>1,

            'remark'=>$remark,

            'is_document_needed' => $doc_needed_status,

            'location' => $location,

            'company' => $company,
            'question_title' => $question_title,
            'disclosure_id' => $disclosure_id

        ];

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');

        $questionId = $model->where(['id' => $id])->set($updated_data)->update(); 

        if($questionId){

              if($answer[0]!=""){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['base_assessment_question_id' => $id, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['base_assessment_question_id'=>$id,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key],"badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }

                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $assessment_question_standard_model->insert(['question_id'=>$id,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId){

              $session->setFlashdata('success','Pro Assessment Question has been successfully updated');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/viewProAssessmentQuestion');

    }
    public function updateAssessmentQuestion() {

        $db = \Config\Database::connect();

        $session = session();

        $model = new AssessmentModel();

        $answer_model = new AssessmentAnswerModel();

        $assessment_question_standard_model = new AssessmentQuestionStandardModel();

        $id = $this->request->getVar("id");

        $industry_id = $this->request->getVar('industry_id');

        $indicator_category_id = $this->request->getVar('indicator_category_id');

        $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $doc_needed_status = $this->request->getVar("doc_needed_status");

        $location = $this->request->getVar('location_id');

        $company = $this->request->getVar('company_id');

        // echo '<pre>';

        // print_r(count($answer));

        // die();

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        $badge = $this->request->getVar('badge_id');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $updated_data = [

            'industry_id'=>$industry_id,

            'indicator_category_id'=>$indicator_category_id,

            'indicator_id'=>$indicator_id,

            'question'=>$question,

            'choice'=>$choice,

            'status'=>1,

            'user_id'=>1,

            'remark'=>$remark,

            'is_document_needed' => $doc_needed_status,

            'location' => $location,

            'company' => $company,
            'question_title' => $question_title,
            'disclosure_id' => $disclosure_id

        ];

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');

        $questionId = $model->where(['id' => $id])->set($updated_data)->update(); 

        if($questionId){

              if($answer[0]!=""){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['base_assessment_question_id' => $id, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['base_assessment_question_id'=>$id,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key],"badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }

                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $assessment_question_standard_model->insert(['question_id'=>$id,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId){

              $session->setFlashdata('success','Assessment Question has been successfully updated');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/viewAssessmentQuestion');

    }
    public function updateallAssessmentQuestion() {

            $db = \Config\Database::connect();

        $session = session();

        $model = new AllAssessmentModel();

        $answer_model = new AllAssessmentAnswerModel();

        $assessment_question_standard_model = new AllAssessmentQuestionStandardModel();

        $assessment_question_classification_model = new AllAssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');
       
        $assess = $this->request->getVar('assess');
        
        $assessment_id = $this->request->getVar('assessment_id');

        $indicator_category_id = $this->request->getVar('indicator_category_id');

        $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');
        
        $mandatory_needed_status = $this->request->getVar('mandatory_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
       
        $questionId = $model->where('id',$assess)->set(['question'=>$question,'indicator_category_id'=>$indicator_category_id,'indicator_id'=>$indicator_id,'is_mandatory_needed'=>$mandatory_needed_status,'choice'=>$choice,'status'=>1,'user_id'=>1,'answer'=>$answer,'remark'=>$remark,'is_document_needed' => $doc_needed_status,  'question_title' => $question_title, 'disclosure_id' => $disclosure_id])->update(); 
        //  print_r($questionId);
        //         die();
        
        if($questionId){

              $session->setFlashdata('success','Assessment Question Updated has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/editAllAssessmentQuestion/'.$assess);


    }
    public function updatealladvanceAssessmentQuestion() {

            $db = \Config\Database::connect();

        $session = session();

        $model = new AllAdvanceAssessmentModel();

        $answer_model = new AllAssessmentAnswerModel();

        $assessment_question_standard_model = new AllAssessmentQuestionStandardModel();

        $assessment_question_classification_model = new AllAssessmentQuestionClassificationModel();

        // $industry_id = $this->request->getVar('industry_id');
       
        $assess = $this->request->getVar('assess');
        
        $assessment_id = $this->request->getVar('assessment_id');

        // $indicator_category_id = $this->request->getVar('indicator_category_id');

        // $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        
        $badge = $this->request->getVar('badge_id');
        
        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');
        
        $mandatory_needed_status = $this->request->getVar('mandatory_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
       
        $questionId = $model->where('id',$assess)->set(['question'=>$question,'is_mandatory_needed'=>$mandatory_needed_status,'choice'=>$choice,'status'=>1,'user_id'=>1,'answer'=>$answer,'remark'=>$remark,'is_document_needed' => $doc_needed_status,  'question_title' => $question_title])->update(); 
        //  print_r($questionId);
        //         die();
        
        if($questionId){

              $session->setFlashdata('success','Advance Assessment Question Updated has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/editAllAdvanceAssessmentQuestion/'.$assess);


    }



    public function getAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

        // $query = $db->query("select * from base_assessment_answer where status=1 and base_assessment_question_id='".$id."' ");
        $query = $db->query("select baa.*,d.name as degree_name,b.badge_name as badge_name from base_assessment_answer as baa left join degree as d on baa.degree_id=d.id left join badge as b on baa.badge_id=b.id where baa.status=1 and baa.base_assessment_question_id='".$id."'");
        $answers = $query->getResultArray();

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Answer</th>";

        $data.="<th>Marks</th>";

        $data.="<th>Degree</th>";
        $data.="<th>Badge</th>";
        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$ans['answer'];

                $data.="</td>";

                $data.="<td>";

                $data.=$ans['marks'];                

                $data.="</td>";

                $data.="<td>";

                $data.=$ans["degree_name"];

                $data.="</td>";
                $data.="<td>";

                $data.=$ans["badge_id"].($ans["badge_name"])?$ans["badge_name"]:'NA';

                $data.="</td>";
                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editSdg(this)' data-id='".$ans['id']."' data-answer='".$ans['answer']."' data-marks='".$ans['marks']."' data-degree='".$ans['degree_id']."' data-badge='".$ans['badge_id']."' data-baqid='".$ans['base_assessment_question_id']."'><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteAnswer/".$ans['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }
    
    
     public function getproAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

        // $query = $db->query("select * from base_assessment_answer where status=1 and base_assessment_question_id='".$id."' ");
        $query = $db->query("select baa.*,d.name as degree_name,b.badge_name as badge_name from pro_assessment_answer as baa left join degree as d on baa.degree_id=d.id left join badge as b on baa.badge_id=b.id where baa.status=1 and baa.base_assessment_question_id='".$id."'");
        $answers = $query->getResultArray();

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Answer</th>";

        $data.="<th>Marks</th>";

        $data.="<th>Degree</th>";
        $data.="<th>Badge</th>";
        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$ans['answer'];

                $data.="</td>";

                $data.="<td>";

                $data.=$ans['marks'];                

                $data.="</td>";

                $data.="<td>";

                $data.=$ans["degree_name"];

                $data.="</td>";
                $data.="<td>";

                $data.=$ans["badge_id"].($ans["badge_name"])?$ans["badge_name"]:'NA';

                $data.="</td>";
                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editSdg(this)' data-id='".$ans['id']."' data-answer='".$ans['answer']."' data-marks='".$ans['marks']."' data-degree='".$ans['degree_id']."' data-badge='".$ans['badge_id']."' data-baqid='".$ans['base_assessment_question_id']."'><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteProAnswer/".$ans['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }


 public function editMasterAnswer() {
        $db = \Config\Database::connect();
        $answer_model = new AllMasterAssessmentAnswerModel();

        $session = session();

        $id = $this->request->getVar("id");

        $answer = $this->request->getVar("answer");

        $marks = $this->request->getVar("marks");

        $degree_id = $this->request->getVar("degree_id");
        $badge_id = $this->request->getVar("badge_id");
        $updated_data = [

            "answer" => $answer,

            "marks" => $marks,

            "degree_id" => $degree_id,
            "badge_id" => $badge_id
        ];

        $ans_ava = $db->query("select * from all_master_assessment_answer where  answer='".$answer."' and id=".$id)->getResultArray();
        if(!$ans_ava) {
            if($answer_model->where(['id' => $id])->set($updated_data)->update()) {

                $session->setFlashdata('success','Answer has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update answer');

            }
        }
        else {
            $session->setFlashdata('error','Answer already exists');            
        }

        return redirect()->to('assessment/allmasterassessmentanswer');

    }
    public function editAnswer() {
        $db = \Config\Database::connect();
        $answer_model = new AssessmentAnswerModel();

        $session = session();

        $id = $this->request->getVar("id");
        $baq_id = $this->request->getVar("baq_id");
        $answer = $this->request->getVar("answer");

        $marks = $this->request->getVar("marks");

        $degree_id = $this->request->getVar("degree_id");
        $badge_id = $this->request->getVar("badge_id");
        $updated_data = [

            "answer" => $answer,

            "marks" => $marks,

            "degree_id" => $degree_id,
            "badge_id" => $badge_id
        ];

        $ans_ava = $db->query("select * from base_assessment_answer where base_assessment_question_id='".$baq_id."' and answer='".$answer."' and id!=".$id)->getResultArray();
        if(!$ans_ava) {
            if($answer_model->where(['id' => $id])->set($updated_data)->update()) {

                $session->setFlashdata('success','Answer has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update answer');

            }
        }
        else {
            $session->setFlashdata('error','Answer already exists');            
        }

        return redirect()->to('assessment/viewAssessmentQuestion');

    }
    
     public function editAllAnswer($name) {
        $db = \Config\Database::connect();
        $answer_model = new AllAssessmentAnswerModel();

        $session = session();

        $id = $this->request->getVar("id");
        $baq_id = $this->request->getVar("baq_id");
        $answer = $this->request->getVar("answer");

        $marks = $this->request->getVar("marks");

        $degree_id = $this->request->getVar("degree_id");
        $badge_id = $this->request->getVar("badge_id");
        $updated_data = [

            "answer" => $answer,

            "marks" => $marks,

            "degree_id" => $degree_id,
            "badge_id" => $badge_id
        ];

        $ans_ava = $db->query("select * from all_assessment_answer where base_assessment_question_id='".$baq_id."' and answer='".$answer."' and id!=".$id)->getResultArray();
        if(!$ans_ava) {
            if($answer_model->where(['id' => $id])->set($updated_data)->update()) {

                $session->setFlashdata('success','All Answer has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update answer');

            }
        }
        else {
            $session->setFlashdata('error','All Answer already exists');            
        }

        return redirect()->to('assessment/viewAllAssessmentQuestion/'.$name);

    }
    
    public function editProAnswer() {
        $db = \Config\Database::connect();
        $answer_model = new ProAssessmentAnswerModel();

        $session = session();

        $id = $this->request->getVar("id");
        $baq_id = $this->request->getVar("baq_id");
        $answer = $this->request->getVar("answer");

        $marks = $this->request->getVar("marks");

        $degree_id = $this->request->getVar("degree_id");
        $badge_id = $this->request->getVar("badge_id");
        $updated_data = [

            "answer" => $answer,

            "marks" => $marks,

            "degree_id" => $degree_id,
            "badge_id" => $badge_id
        ];

        $ans_ava = $db->query("select * from pro_assessment_answer where base_assessment_question_id='".$baq_id."' and answer='".$answer."' and id!=".$id)->getResultArray();
        if(!$ans_ava) {
            if($answer_model->where(['id' => $id])->set($updated_data)->update()) {

                $session->setFlashdata('success','Pro Answer has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update answer');

            }
        }
        else {
            $session->setFlashdata('error','Pro Answer already exists');            
        }

        return redirect()->to('assessment/viewProAssessmentQuestion');

    }



    public function deleteAnswer($id) {

        $answer_model = new AssessmentAnswerModel();

        $session = session();        

        if($answer_model->where(['id' => $id])->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Answer has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete answer');

        }

        return redirect()->to('assessment/viewAssessmentQuestion');

    } 
    public function deleteMasterAnswer($id) {

        $answer_model = new AllMasterAssessmentAnswerModel();

        $session = session();        

        if($answer_model->where(['id' => $id])->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Answer has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete answer');

        }

        return redirect()->to('assessment/allmasterassessmentanswer');

    } 
    public function deleteProAnswer($id) {

        $answer_model = new ProAssessmentAnswerModel();

        $session = session();        

        if($answer_model->where(['id' => $id])->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Pro Answer has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete answer');

        }

        return redirect()->to('assessment/viewProAssessmentQuestion');

    }



    public function deleteAssessmentQuestion($id) {

        $assessment_model = new AssessmentModel();        

        $session = session();

        if($assessment_model->where(['id' => $id])->set(['status' => 0])->update()){

            $session->setFlashdata('success','Assessment Question has been successfully deleted');

        } 

        else {

            $session->setFlashdata('error','Error to delete assessment question');

        }

        return redirect()->to('assessment/viewAssessmentQuestion');

    } 
    public function deleteAllAssessmentQuestion($id,$name) {

        $assessment_model = new AllAssessmentModel();        

        $session = session();

        if($assessment_model->where(['id' => $id])->set(['status' => 0])->update()){

            $session->setFlashdata('success','All Assessment Question has been successfully deleted');

        } 

        else {

            $session->setFlashdata('error','Error to delete assessment question');

        }

        return redirect()->to('assessment/viewAllAssessmentQuestion/'.$name);

    }
    public function deleteAllAdvanceAssessmentQuestion($id,$name) {

        $assessment_model = new AllAdvanceAssessmentModel();        

        $session = session();

        if($assessment_model->where(['id' => $id])->set(['status' => 0])->update()){

            $session->setFlashdata('success','All Assessment Question has been successfully deleted');

        } 

        else {

            $session->setFlashdata('error','Error to delete assessment question');

        }

        return redirect()->to('assessment/viewalladvanceassessmentquestion/'.$name);

    }
    
    public function deleteProAssessmentQuestion($id) {

        $assessment_model = new ProAssessmentModel();        

        $session = session();

        if($assessment_model->where(['id' => $id])->set(['status' => 0])->update()){

            $session->setFlashdata('success','Pro Assessment Question has been successfully deleted');

        } 

        else {

            $session->setFlashdata('error','Error to delete assessment question');

        }

        return redirect()->to('assessment/viewProAssessmentQuestion');

    }



    public function addSdgAssessmentQuestion() {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        // $module_model = new ModuleModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $industry_model = new IndustryModel();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $data['industry'] = $industry_model->where('status',1)->findAll();

        $query = $db->query("select * from degree where status=1");

        $data['degree'] = $query->getResultArray();    
        $query = $db->query("select * from badge where status=1");

        $data['badge'] = $query->getResultArray();    
        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        return view('admin/add-sdg-assessment-question',$data);

    }



    public function getSdgByIndustry($id){

        $db = \Config\Database::connect();

        $data= '';

        $sdg_model = new SdgModel();

        if($id==0) {

            $query = $db->query("select * from industry_sdg where status=1");

        }

        else {

            $query = $db->query("select * from industry_sdg where status=1 and industry_id=".$id);

        }

        $industry_sdg = $query->getResultArray();

        $sdg_arr = [];

        foreach($industry_sdg as $ind_sdg) {

            $sdg_arr[] = $ind_sdg["sdg_id"];

        }

        $sdg = $sdg_model->whereIn('id',$sdg_arr)->findAll();

        $data.="<option value=''>Select Sdg</option>";

        if(!empty($sdg)){

            foreach($sdg as $s){

                $data.="<option value=".$s['id'].">".$s['sdg_name']."</option>";

             }

        }

        return $data;

    }



    public function getIndicatorBySdg($id){

        $db = \Config\Database::connect();

        $data= '';

        $indicator_model = new IndicatorModel();

        $query = $db->query("select * from indicator_sdg where status=1 and sdg_id=".$id);

        $indicator_sdg = $query->getResultArray();

        $indicator_arr = [];

        foreach($indicator_sdg as $ind_sdg) {

            $indicator_arr[] = $ind_sdg["indicator_id"];

        }

        $indicator = $indicator_model->whereIn('id',$indicator_arr)->findAll();

        $data.="<option value=''>Select Indicator</option>";

        if(!empty($indicator)){

            foreach($indicator as $indi){

                $data.="<option value=".$indi['id'].">".$indi['indicator_name']."</option>";

             }

        }

        return $data;

    }



    public function addSdgAssessmentQuestionSubmit() {

        $db = \Config\Database::connect();

        $session = session();

        $model = new SdgAssessmentModel();

        $answer_model = new SdgAssessmentAnswerModel();

        $sdg_assessment_question_standard_model = new SdgAssessmentQuestionStandardModel();

        // $industry_id = $this->request->getVar('industry_id');

        // $sdg_id = $this->request->getVar('sdg_id');

        // $indicator_id = $this->request->getVar('indicator_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');

        // $location = $this->request->getVar('location_id');

        // $company = $this->request->getVar('company_id');

        $doc_needed_status = $this->request->getVar('doc_needed_status');

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $questionId = $model->insert(['question'=>$question,'choice'=>$choice,'status'=>1,'user_id'=>1,'remark'=>$remark,'is_document_needed' => $doc_needed_status, 'question_title' => $question_title, 'disclosure_id' => $disclosure_id]); 

        if($questionId){

              if(!empty($answer)){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['sdg_assessment_question_id' => $questionId, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['sdg_assessment_question_id'=>$questionId,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }

                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $sdg_assessment_question_standard_model->insert(['question_id'=>$questionId,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId && $answer_id){

              $session->setFlashdata('success','Sdg Assessment Question has been successfully saved');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/viewSdgAssessmentQuestion');        

    }



    public function viewSdgAssessmentQuestion() {

        $db = \Config\Database::connect();

        $data=$this->helperData;

        $data['title'] = 'Sdg Assessment Questions Management';

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        $classification_model = new ClassificationModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $query = $db->query("select * from degree where status=1");

        $data['degree']=$query->getResultArray();
        $query = $db->query("select * from badge where status=1");

        $data['badge']=$query->getResultArray();
        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['classification'] = $classification_model->where('status',1)->findAll();

        $query = $db->query("select * from sdg_assessment_question where status=1");

        $rs = $query->getResultArray();

        $list=array();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from industry where status=1 and id='".$r['industry_id']."' ");

                $industry = $query->getResultArray();

                if(!empty($industry)){$industry_name =$industry[0]['industry_name']; }else{$industry_name=0;}

                $query = $db->query("select * from indicator where status=1 and id='".$r['indicator_id']."' ");

                $indicator = $query->getResultArray();

                if(!empty($indicator)){$indicator_name =$indicator[0]['indicator_name']; }else{$indicator_name=0;}

                $query = $db->query("select * from sdg where status=1 and id='".$r['sdg_id']."' ");

                $sdg = $query->getResultArray();

                if(!empty($sdg)){$sdg_name =$sdg[0]['sdg_name']; }else{$sdg_name=0;}

                $query = $db->query("select * from disclosure where status=1 and id='".$r['disclosure_id']."' ");

                $disclosure = $query->getResultArray();

                if(!empty($disclosure)){$disclosure_name =$disclosure[0]['disclosure_name']; }else{$disclosure_name='';}

                $list[]=array('assessment_id' => $r['id'] , 'industry_name' => $industry_name,'indicator_name' => $indicator_name, 'sdg_name' => $sdg_name, 'question' => $r['question'], 'choice' => $r['choice'],'remark' => $r['remark'],'is_document_needed' => $r['is_document_needed'], 'question_title' => $r['question_title'], 'disclosure_name' => $disclosure_name);          

            }

        }

        $data['list']=$list;
        
        // echo $db->getLastquery($data['list']);

        return view('admin/view-sdg-assessment',$data);

    }



    public function getSdgAnswers($id){

        $db = \Config\Database::connect();

        $data= '';

        // $query = $db->query("select * from sdg_assessment_answer where status=1 and sdg_assessment_question_id='".$id."' ");
        $query = $db->query("select saa.*,d.name as degree_name,b.badge_name as badge_name from sdg_assessment_answer as saa left join degree as d on saa.degree_id=d.id left join badge as b on saa.badge_id=b.id where saa.status=1 and saa.sdg_assessment_question_id='".$id."'");
        $answers = $query->getResultArray();
        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Answer</th>";

        $data.="<th>Marks</th>";

        $data.="<th>Degree</th>";
        $data.="<th>Badge</th>";
        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$ans['answer'];

                $data.="</td>";

                $data.="<td>";

                $data.=$ans['marks'];                

                $data.="</td>";

                $data.="<td>";

                $data.=($ans["degree_name"])?$ans["degree_name"]:'NA';

                $data.="</td>";
                $data.="<td>";

                $data.=($ans["badge_name"])?$ans["badge_name"]:'NA';

                $data.="</td>";
                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editSdg(this)' data-id='".$ans['id']."' data-answer='".$ans['answer']."' data-marks='".$ans['marks']."' data-degree='".$ans['degree_id']."' data-badge='".$ans['badge_id']."' data-saqid='".$ans['sdg_assessment_question_id']."'><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteSdgAnswer/".$ans['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }



    public function editSdgAnswer() {
        $db = \Config\Database::connect();
        $answer_model = new SdgAssessmentAnswerModel();

        $session = session();

        $id = $this->request->getVar("id");
        $saq_id = $this->request->getVar("saq_id");
        $answer = $this->request->getVar("answer");

        $marks = $this->request->getVar("marks");

        $degree_id = $this->request->getVar("degree_id");
        $badge_id = $this->request->getVar("badge_id");
        $updated_data = [

            "answer" => $answer,

            "marks" => $marks,

            "degree_id" => $degree_id,
            "badge_id" => $badge_id
        ];

        $ans_ava = $db->query("select * from sdg_assessment_answer where sdg_assessment_question_id='".$saq_id."' and answer='".$answer."' and id!=".$id)->getResultArray();
        if(!$ans_ava) {
            if($answer_model->where(['id' => $id])->set($updated_data)->update()) {

                $session->setFlashdata('success','Answer has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update answer');

            }
        }
        else {
            $session->setFlashdata('error','Answer already exists');            
        }

        return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }



    public function deleteSdgAnswer($id) {

        $answer_model = new SdgAssessmentAnswerModel();

        $session = session();        

        if($answer_model->where(['id' => $id])->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Answer has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete answer');

        }

        return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }



    public function deleteSdgAssessmentQuestion($id) {

        $assessment_model = new SdgAssessmentModel();        

        $session = session();

        if($assessment_model->where(['id' => $id])->set(['status' => 0])->update()){

            $session->setFlashdata('success','Sdg Assessment Question has been successfully deleted');

        } 

        else {

            $session->setFlashdata('error','Error to delete sdg assessment question');

        }

        return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }



    public function editSdgAssessmentQuestion($id) {

        $db = \Config\Database::connect(); 

        $data=$this->helperData;       

        // $module_model = new ModuleModel();

        $sdg_model = new SdgModel();

        $indicator_model = new IndicatorModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $rs = $db->query("select * from sdg_assessment_question where id=".$id);

        $data['rs'] = $rs->getRow();

        $query = $db->query("select * from industry where status=1 ");

        $data['industry'] = $query->getResultArray();

        // $query = $db->query("select * from indicator_category where status=1 ");

        // $data['indicator_category'] = $query->getResultArray();

        if($data['rs']->industry_id==0) {

            $query = $db->query("select * from industry_sdg where status=1");

        }

        else {

            $query = $db->query("select * from industry_sdg where status=1 and industry_id=".$data['rs']->industry_id);

        }

        $industry_sdg = $query->getResultArray();

        $sdg_arr = [];

        foreach($industry_sdg as $ind_sdg) {

            $sdg_arr[] = $ind_sdg["sdg_id"];

        }

        $data["sdg"] = $sdg_model->whereIn('id',$sdg_arr)->findAll();

        $query = $db->query("select * from degree where status=1");

        $data["degree"] = $query->getResultArray();
        $query = $db->query("select * from badge where status=1");

        $data["badge"] = $query->getResultArray();
        // $query = $db->query("select * from indicator where indicator_category_id=".$data['rs']->indicator_category_id." and status=1");

        // $data['indicator'] = $query->getResultArray();

        $query = $db->query("select * from indicator_sdg where status=1 and sdg_id=".$data['rs']->sdg_id);

        $indicator_sdg = $query->getResultArray();

        $indicator_arr = [];

        foreach($indicator_sdg as $ind_sdg) {

            $indicator_arr[] = $ind_sdg["indicator_id"];

        }

        $data['indicator'] = $indicator_model->whereIn('id',$indicator_arr)->findAll();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $query = $db->query("select * from company where status=1 ");

        $data['company'] = $query->getResultArray();



        $query = $db->query("select * from countries");

        $data['country'] = $query->getResultArray();
        $query = $db->query("select * from disclosure where status=1");
        $data['disclosure'] = $query->getResultArray();
        return view('admin/edit-sdg-assessment-question.php',$data);        

    }



    public function updateSdgAssessmentQuestion() {

        $db = \Config\Database::connect();

        $session = session();

        $model = new SdgAssessmentModel();

        $answer_model = new SdgAssessmentAnswerModel();

        $sdg_assessment_question_standard_model = new SdgAssessmentQuestionStandardModel();

        $id = $this->request->getVar("id");

        $industry_id = $this->request->getVar('industry_id');

        $sdg_id = $this->request->getVar('sdg_id');

        $indicator_id = $this->request->getVar('indicator_id');

        $country_id = $this->request->getVar('location_id');

        $company_id = $this->request->getVar('company_id');

        $question = $this->request->getVar('question');

        $choice = $this->request->getVar('choice');

        $remark = $this->request->getVar('remark');

        $answer = $this->request->getVar('answer');

        $doc_needed_status = $this->request->getVar('doc_needed_status');

        // echo '<pre>';

        // print_r(count($answer));

        // die();

        $mark = $this->request->getVar('marks');

        $degree = $this->request->getVar('degree_id');
        $badge = $this->request->getVar('badge_id');
        $question_title = $this->request->getVar('question_title');
        $disclosure_id = $this->request->getVar('disclosure_id');
        $updated_data = [

            'industry_id'=>$industry_id,

            'sdg_id'=>$sdg_id,

            'indicator_id'=>$indicator_id,

            'question'=>$question,

            'choice'=>$choice,

            'status'=>1,

            'user_id'=>1,

            'remark'=>$remark,

            'is_document_needed' => $doc_needed_status,

            'company_id' => $company_id,

            'country_id' => $country_id,
            'question_title' => $question_title,
            'disclosure_id' => $disclosure_id

        ];

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');

        $questionId = $model->where(['id' => $id])->set($updated_data)->update(); 

        if($questionId){

              if($answer[0]!=""){

                foreach($answer as $key=>$r){
                    $ans_ava = $answer_model->where(['sdg_assessment_question_id' => $id, 'answer' => $r])->findAll();
                    if(!$ans_ava) {
                        $answer_id = $answer_model->insert(['sdg_assessment_question_id'=>$id,'answer'=>$r,"marks"=>$mark[$key],"degree_id"=>$degree[$key],"badge_id"=>$badge[$key],"status"=>1,"user_id"=>1,"created_at"=>date('Y-m-d H:i:s')]);  
                    }

                }

            }

              if(!empty($standard_arr)){

                foreach($standard_arr as $key=>$standard){

                    $standard_id = $sdg_assessment_question_standard_model->insert(['question_id'=>$id,'standard_id'=>$standard,'classification_id' => $classfication_arr[$key],"status"=>1,"user_id"=>1]);  

                }

            }

        }

        if($questionId){

              $session->setFlashdata('success','Sdg Assessment Question has been successfully updated');

        }else{

               $session->setFlashdata('error','Not Saved');

       }

       return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }



    public function getClassification($id) {

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from classification where status=1 and standard_id='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Classification</option>";

        if(!empty($cat)){

            foreach($cat as $c){

                $data.="<option value=".$c['id'].">".$c['classification_name']."</option>";

             }

        }

        return $data;

    }
    public function getClassification_edit($id,$clasi) {

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from classification where status=1 and standard_id='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Classification</option>";

        if(!empty($cat)){

            foreach($cat as $c){
                 if($c['id'] == $clasi){
                $data.="<option selected value=".$c['id'].">".$c['classification_name']."</option>";

             }else{
                 $data.="<option  value=".$c['id'].">".$c['classification_name']."</option>";
             }
         }

        }

        return $data;

    }

    public function getSubClassification($id) {

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from sub_classification where status=1 and classification_name='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Sub Classification</option>";

        if(!empty($cat)){

            foreach($cat as $c){

                $data.="<option value=".$c['id'].">".$c['sub_classification_name']."</option>";

             }

        }

        return $data;

    } 
    public function getSubClassification_edit($id,$assement_id) {

// print_r($assement_id);
// die();
        $db = \Config\Database::connect();

        $data= '';


        $query = $db->query("select * from sub_classification where status=1 and classification_name='".$id."' ");

        $cat = $query->getResultArray();
 $rs = $db->query("select *  from all_assessment_question  where id=".$assement_id)->getResultArray();

$sub_clasii = json_decode($rs[0]['sub_clasification']);


        $data.="<option value=''>Select Sub Classification</option>";

        if(!empty($cat)){

            foreach($cat as $c){
                foreach($sub_clasii as $c_i){

                if($c['id']==$c_i){

                $data.="<option selected value=".$c['id'].">".$c['sub_classification_name']."</option>";

             }else{
                $data.="<option value=".$c['id'].">".$c['sub_classification_name']."</option>";

             }
         }

        }
    }

        return $data;

    }

    public function getProClassification($id) {

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select * from classification where status=1 and standard_id='".$id."' ");

        $cat = $query->getResultArray();

        $data.="<option value=''>Select Classification</option>";

        if(!empty($cat)){

            foreach($cat as $c){

                $data.="<option value=".$c['id'].">".$c['classification_name']."</option>";

             }

        }

        return $data;

    }



    public function getStandards($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select aqs.*,s.standard_name,c.classification_name from assessment_question_standard as aqs join standard as s on aqs.standard_id=s.id join classification as c on aqs.classification_id=c.id where aqs.question_id=".$id." and aqs.status=1");

        $assess_ques_stand = $query->getResultArray();        

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Standard</th>";

        $data.="<th>Classification</th>";

        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($assess_ques_stand)){

            $s=1;

            foreach($assess_ques_stand as $key=>$stand){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$stand['standard_name'];

                $data.="</td>";

                $data.="<td>";

                $data.=$stand['classification_name'];                

                $data.="</td>";

                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editStandard(this)' data-id='".$stand['id']."' data-standard='".$stand['standard_id']."' data-classification='".$stand['classification_id']."' ><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteStandard/".$stand['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }
    public function getProStandards($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select aqs.*,s.standard_name,c.classification_name from pro_assessment_question_standard as aqs join standard as s on aqs.standard_id=s.id join classification as c on aqs.classification_id=c.id where aqs.question_id=".$id." and aqs.status=1");

        $assess_ques_stand = $query->getResultArray();        

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Standard</th>";

        $data.="<th>Classification</th>";

        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($assess_ques_stand)){

            $s=1;

            foreach($assess_ques_stand as $key=>$stand){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$stand['standard_name'];

                $data.="</td>";

                $data.="<td>";

                $data.=$stand['classification_name'];                

                $data.="</td>";

                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editStandard(this)' data-id='".$stand['id']."' data-standard='".$stand['standard_id']."' data-classification='".$stand['classification_id']."' ><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteProStandard/".$stand['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }
    
    public function getAllStandards($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select aqs.*,s.standard_name,c.classification_name from all_assessment_question_standard as aqs join standard as s on aqs.standard_id=s.id join classification as c on aqs.classification_id=c.id where aqs.question_id=".$id." and aqs.status=1");

        $assess_ques_stand = $query->getResultArray();        

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Standard</th>";

        $data.="<th>Classification</th>";

        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($assess_ques_stand)){

            $s=1;

            foreach($assess_ques_stand as $key=>$stand){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$stand['standard_name'];

                $data.="</td>";

                $data.="<td>";

                $data.=$stand['classification_name'];                

                $data.="</td>";

                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editStandard(this)' data-id='".$stand['id']."' data-standard='".$stand['standard_id']."' data-classification='".$stand['classification_id']."' ><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteAllStandard/".$stand['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }



    public function editStandard() {

        $assessment_question_standard_model = new AssessmentQuestionStandardModel();

        $session = Session();

        $id = $this->request->getVar('id');

        $stand = $assessment_question_standard_model->where('id',$id)->first();

        $standard_id = $this->request->getVar('standard_id');

        $classification_id = $this->request->getVar('classification_id');

        $ava = $assessment_question_standard_model->where(['question_id' => $stand['question_id'], 'standard_id' => $standard_id, 'classification_id' => $classification_id, 'status' => 1])->findAll();

        $data = [

            'standard_id' => $standard_id,

            'classification_id' => $classification_id

        ];

        if(empty($ava)) {

            if($assessment_question_standard_model->where('id',$id)->set($data)->update()) {

                $session->setFlashdata('success','Assessment Question Standard successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update');

            }

        }

        else {

            $session->setFlashdata('error', 'This Assessment Question Standard already exists');

        }

        return redirect()->to('assessment/viewAssessmentQuestion');

    } 
    public function editProStandard() {

        $assessment_question_standard_model = new ProAssessmentQuestionStandardModel();

        $session = Session();

        $id = $this->request->getVar('id');

        $stand = $assessment_question_standard_model->where('id',$id)->first();

        $standard_id = $this->request->getVar('standard_id');

        $classification_id = $this->request->getVar('classification_id');

        $ava = $assessment_question_standard_model->where(['question_id' => $stand['question_id'], 'standard_id' => $standard_id, 'classification_id' => $classification_id, 'status' => 1])->findAll();

        $data = [

            'standard_id' => $standard_id,

            'classification_id' => $classification_id

        ];

        if(empty($ava)) {

            if($assessment_question_standard_model->where('id',$id)->set($data)->update()) {

                $session->setFlashdata('success','Pro Assessment Question Standard successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update');

            }

        }

        else {

            $session->setFlashdata('error', 'This Pro Assessment Question Standard already exists');

        }

        return redirect()->to('assessment/viewProAssessmentQuestion');

    }

    public function editAllStandard() {

        $assessment_question_standard_model = new AllAssessmentQuestionStandardModel();

        $session = Session();

        $id = $this->request->getVar('id');

        $stand = $assessment_question_standard_model->where('id',$id)->first();

        $standard_id = $this->request->getVar('standard_id');

        $classification_id = $this->request->getVar('classification_id');

        $ava = $assessment_question_standard_model->where(['question_id' => $stand['question_id'], 'standard_id' => $standard_id, 'classification_id' => $classification_id, 'status' => 1])->findAll();

        $data = [

            'standard_id' => $standard_id,

            'classification_id' => $classification_id

        ];

        if(empty($ava)) {

            if($assessment_question_standard_model->where('id',$id)->set($data)->update()) {

                $session->setFlashdata('success','All Assessment Question Standard successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update');

            }

        }

        else {

            $session->setFlashdata('error', 'This All Assessment Question Standard already exists');

        }

        return redirect()->to('assessment/viewAllAssessmentQuestion');

    }


    public function deleteStandard($id) {

        $assessment_question_standard_model = new AssessmentQuestionStandardModel();

        $session = Session();        

        if($assessment_question_standard_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Assessment Question Standard has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete');

        }

        return redirect()->to('assessment/viewAssessmentQuestion');

    } 
    public function deleteProStandard($id) {

        $assessment_question_standard_model = new ProAssessmentQuestionStandardModel();

        $session = Session();        

        if($assessment_question_standard_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Pro Assessment Question Standard has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete');

        }

        return redirect()->to('assessment/viewProAssessmentQuestion');

    }



    public function getSdgStandards($id){

        $db = \Config\Database::connect();

        $data= '';

        $query = $db->query("select saqs.*,s.standard_name,c.classification_name from sdg_assessment_question_standard as saqs join standard as s on saqs.standard_id=s.id join classification as c on saqs.classification_id=c.id where saqs.question_id=".$id." and saqs.status=1");

        $assess_ques_stand = $query->getResultArray();        

        $data.="<table class='table table-bordered table-hover'>";

        $data.="<tr>";

        $data.="<th>#</th>";

        $data.="<th>Standard</th>";

        $data.="<th>Classification</th>";

        $data.="<th>Action</th>";

        $data.="</tr>";

        if(!empty($assess_ques_stand)){

            $s=1;

            foreach($assess_ques_stand as $key=>$stand){

                $data.="<tr>";

                $data.="<td>".$s."</td>";

                $data.="<td>";

                $data.=$stand['standard_name'];

                $data.="</td>";

                $data.="<td>";

                $data.=$stand['classification_name'];                

                $data.="</td>";

                $data.="<td>";

                $data.="<a class='btn btn-primary' href='#' onclick='editSdgStandard(this)' data-id='".$stand['id']."' data-standard='".$stand['standard_id']."' data-classification='".$stand['classification_id']."' ><i class='fa fa-pencil'></i></a>";

                $data.="<a class='btn btn-danger' href='".base_url()."/assessment/deleteSdgStandard/".$stand['id']."' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";

                $data.="</td>";

                $data.="</tr>";

                $s++;

             }

        }

        $data.="</table>";

        return $data;

    }



    public function editSdgStandard() {

        $sdg_assessment_question_standard_model = new SdgAssessmentQuestionStandardModel();

        $session = Session();

        $id = $this->request->getVar('id');

        $stand = $sdg_assessment_question_standard_model->where('id',$id)->first();

        $standard_id = $this->request->getVar('standard_id');

        $classification_id = $this->request->getVar('classification_id');

        $data = [

            'standard_id' => $standard_id,

            'classification_id' => $classification_id

        ];

        $ava = $sdg_assessment_question_standard_model->where(['question_id' => $stand['question_id'], 'standard_id' => $standard_id, 'classification_id' => $classification_id, 'status' => 1])->findAll();

        if(empty($ava)) {

            if($sdg_assessment_question_standard_model->where('id',$id)->set($data)->update()) {

                $session->setFlashdata('success','Sdg Assessment Question Standard has been successfully updated');

            }

            else {

                $session->setFlashdata('error','Error to update');

            }

        }

        else {

            $session->setFlashdata('error', 'This Sdg Assessment Question Standard Already exists');

        }

        return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }



    public function deleteSdgStandard($id) {

        $sdg_assessment_question_standard_model = new SdgAssessmentQuestionStandardModel();

        $session = Session();        

        if($sdg_assessment_question_standard_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata('success','Sdg Assessment Question Standard has been successfully deleted');

        }

        else {

            $session->setFlashdata('error','Error to delete');

        }

        return redirect()->to('assessment/viewSdgAssessmentQuestion');

    }
    
    
public function updatefinaneSub() {
       // $db = \Config\Database::connect();
        $financesubModel = new Finance_Sub_Category_Model();
        $session = Session();
        $id = $this->request->getVar("id");
        $industry_id = $this->request->getVar("industry_id");
        $Category_id = $this->request->getVar("Category_id");
        $FinanceSubCategory = $this->request->getVar("FinanceSubCategory");
        $updated_data = [
            "industry_id" => $industry_id,
            "finance_category_id" => $Category_id,
            "sub_category" => $FinanceSubCategory
        ];
        if($financesubModel->where('id',$id)->set($updated_data)->update()) {
            $session->setFlashdata('success',' Finance Subcategory has been successfully updated');
        }
        else {
            $session->setFlashdata("error","Error to update");
        }
        return redirect()->to('assessment/FinanceSubCategory');            
    }
    
public function updateConsumptionSubCategory() {
       // $db = \Config\Database::connect();
        $consumsubModel = new Consumption_Sub_Category_Model();
        $session = Session();
        $id = $this->request->getVar("id");
        $industry_id = $this->request->getVar("industry_id");
        $Category_id = $this->request->getVar("Consumption_category_id");
        $consumptionSubCategory = $this->request->getVar("ConsumptionSubCategory");
        $ghgId = $this->request->getVar("ghgId");
        $updated_data = [
            "industry_id" => $industry_id,
            "consumption_category_id" => $Category_id,
            "factor_id" => $ghgId,
            "sub_category" => $consumptionSubCategory
        ];
        if($consumsubModel->where('id',$id)->set($updated_data)->update()) {
            $session->setFlashdata('success',' Consumption Subcategory has been successfully updated');
        }
        else {
            $session->setFlashdata("error","Error to update Consumption Sub");
        }
        return redirect()->to('assessment/ConsumptionSubCategory');            
    }


}

