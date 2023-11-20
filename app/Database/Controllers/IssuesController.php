<?php



namespace App\Controllers;



use App\Controllers\BaseController;



use CodeIgniter\Controller;



use App\Models\SdgModel;



use App\Models\FinanceModel;



use App\Models\ImpactModel;



use App\Models\RawMaterialProcessDetailModel;



use App\Models\RawmaterialDetailModel;



use App\Models\Finance_Sub_Category_Model;



use App\Models\IndustryModel;



use App\Models\IndicatorCategoryModel;



use App\Models\SubSubIndustryModel;

use App\Models\DocumentSubTypeModel;


use App\Models\ConsumptionModel;


use App\Models\Consumption_Sub_Category_Model;


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




use App\Models\ModelIssues;

use App\Models\AssessmentOffsetModel;

use App\Models\SupplierPlanAssessmentDetailsModel;

use App\Models\SupplierPlanAssessmentGhgDetailsModel;

use App\Models\SdgTargetModel;

use App\Models\UnitModel;

use App\Models\SubUnitModel;

use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;

class IssuesController extends BaseController

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

        $issueModel = new ModelIssues();

       
        $data['title'] = 'Issue  Management';
        
        

      
        
        $data['list'] =  $issueModel->where('status',1)->findAll();
        

        echo view('admin/view-issue',$data);



    }


    

    public function addissue(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new ModelIssues(); 



      $issue_name = $this->request->getVar('issue_name');
    
      
      


      $ava = $db->query("select * from issues where issue_name='".$issue_name."'  and status=1");



      $ava = $ava->getResultArray();


        if(empty($ava)){


            if($model->insert(['issue_name'=>$issue_name,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){



               $session->setFlashdata('success','Issue has been saved successfully');



            }else{



                $session->setFlashdata('error',' Not Save');



            }          



        }else{



         $session->setFlashdata('error','issue  data '.$issue_name.' already exist!');



        }



        return redirect()->to('IssuesController');



    }

   
    public function editissues(){



      $db = \Config\Database::connect();



      $session = session();


      $model = new ModelIssues(); 


      $id = $this->request->getVar("issue_id");
      


      $issue_name = $this->request->getVar('issue_name');
    
     

      $ava = $db->query("select * from issues where issue_name='".$issue_name."' and status=1");



      $ava = $ava->getResultArray();


        if(empty($ava)){



            $updated_data = [
                "issue_name" => $issue_name,
               ];


            if($model->where(['id' => $id])->set($updated_data)->update()){


               $session->setFlashdata('success','Issue  has been updated successfully');



            }else{



                $session->setFlashdata('error',' Not Updated');



            }          



        }else{



         $session->setFlashdata('error',' Issue '.$issue_name.'Data already exist!');



        }



        return redirect()->to('IssuesController');



    }



    public function deleteissue($id){



      $db = \Config\Database::connect();



      $session = session();



       $model = new ModelIssues(); 



        if($model->update($id, ['status'=>0])){



             $session->setFlashdata('success','Issue data has been delete successfully');



        }else{



             $session->setFlashdata('error','Issue  not deleted');



        }     



        return redirect()->to('IssuesController');



    }


}    