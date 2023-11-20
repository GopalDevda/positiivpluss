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



use App\Models\GhgCategoryModel;



use App\Models\GhgModel;



use App\Models\DisclosureCategoryModel;



use App\Models\DisclosureModel;



use App\Models\GhgFactorModel;



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

class SubSubIndustry extends BaseController

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

         $industry_model = new IndustryModel();

       
        $data['title'] = 'Sub Sub Industry Management';
        
        

        $ava = $db->query("select 	industry.industry_name as indust,indc.industry_category_name as icm,indc.id as icm_id,subind.* from SubSubIndustry  as subind join  industry_category as indc on indc.id= subind.industry_cat join industry on industry.id =subind.industry where  subind.status=1");
        
        $ava = $ava->getResultArray();
        
        $data['list'] =$ava;
        
        
        $query = $db->query("select * from industry_category where status=1 ");

        $data['industry_category'] = $query->getResultArray();
        
        
        $industry = $industry_model->select("*")->where('status',1)->findAll();

        $data['industry'] = $industry;




        echo view('admin/sub-sub-industry',$data);



    }


    public function getIndustryByIndustryCategory($id) {
   
     $db = \Config\Database::connect();
   
        $data= '';
       
         $industry_model = new IndustryModel();

         $industry = $industry_model->select("*")->where('status',1)->where('industry_category_id',$id)->findAll();

        $data.="<option value=''>Select Industry</option>";
   
        if(!empty($industry)){
   
            foreach($industry as $i){
   
                $data.="<option value=".$i['id'].">".$i['industry_name']."</option>";
   
            
             }
       
        }
      
        return $data;
   
    }
    
    
    

    public function addsubsubindustry(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new SubSubIndustryModel(); 



      $industry_cat = $this->request->getVar('industry_category_id');
    
      
      $industry = $this->request->getVar('industry');
      
      
      $SubSubIndustry = $this->request->getPost('subsubindustry');



      $ava = $db->query("select * from SubSubIndustry where subsubindustry='".$SubSubIndustry."' and status=1");



      $ava = $ava->getResultArray();


        if(empty($ava)){


            if($model->insert(['industry_cat'=>$industry_cat,'industry'=>$industry,'subsubindustry'=>$SubSubIndustry,'status'=>1,'created_at'=>date('Y-m-d H:i:s')])){



               $session->setFlashdata('success','Sub Sub Industry has been saved successfully');



            }else{



                $session->setFlashdata('error',' Not Save');



            }          



        }else{



         $session->setFlashdata('error','Sub Sub Industry '.$SubSubIndustry.' already exist!');



        }



        return redirect()->to('SubSubIndustry');



    }

   
    public function editSubSub(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new SubSubIndustryModel();  
      
      
      $id = $this->request->getVar("sub_sub_id");
      
      
      $ind_cat_name = $this->request->getVar('ind_cat_name');
      
      
      $ind_name = $this->request->getVar('ind_name');
      
      
      $sub_sub = $this->request->getVar('sub_sub');


      $ava = $db->query("select * from SubSubIndustry where subsubindustry='".$sub_sub."' and status=1");



      $ava = $ava->getResultArray();



        if(empty($ava)){



            $updated_data = [



                "industry_cat" => $ind_cat_name,
                
                "industry" => $ind_name,
                
                "subsubindustry" => $sub_sub



            ];



            if($model->where(['id' => $id])->set($updated_data)->update()){



               $session->setFlashdata('success','Sub Sub Industry has been updated successfully');



            }else{



                $session->setFlashdata('error',' Not Updated');



            }          



        }else{



         $session->setFlashdata('error','Sub SUb Industry  '.$sub_sub.' already exist!');



        }



        return redirect()->to('SubSubIndustry');



    }



    public function deleteSubSubIndustry($id){



      $db = \Config\Database::connect();



      $session = session();



       $model = new SubSubIndustryModel(); 



        if($model->update($id, ['status'=>0])){



             $session->setFlashdata('success','Sub Sub Industry has been delete successfully');



        }else{



             $session->setFlashdata('error','Sub Sub Industry not deleted');



        }     



        return redirect()->to('SubSubIndustry');



    }


}    