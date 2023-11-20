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



use App\Models\DocumentTypeModel;

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

class Documenttype extends BaseController

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



        $data['title'] = 'Document Type Management';





        $query = $db->query("select * from document_type where status=1 ");



        $data['typelist'] = $query->getResultArray();
        
                                        $query = $db->query("SELECT
                                        dst.id AS id,
                                        dst.document_sub_type_name AS sub_name,
                                        dst.details
                                        
                                    FROM
                                        `document_sub_type` AS dst
                                  
                                    WHERE
                                        dst.status = 1 ");



        $data['list'] = $query->getResultArray();
        
        



        echo view('admin/document-sub-type',$data);



    }

    public function getsubdocumentdetails($id) {
    
        $db = \Config\Database::connect();        
        
        $ava = $db->query("select * from document_sub_type where id='".$id."' and  status=1")->getResultArray();
 
                if($ava) {  
        
                        foreach($ava as $indi) {
        
                            $data=''.$indi['details'].'';
        
                        }
        
                    }
        echo $data;

    }

    public function adddocumentsubtype(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new DocumentSubTypeModel(); 



      $name = "404";
      
      $sub_name = $this->request->getVar('sub_name');
      
      
      $description = $this->request->getPost('description');



      $ava = $db->query("select * from document_sub_type where document_sub_type_name='".$sub_name."' and status=1");



      $ava = $ava->getResultArray();



        if(empty($ava)){


            if($model->insert(['document_type_name'=>$name,'document_sub_type_name'=>$sub_name,'details'=>$description,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){



               $session->setFlashdata('success','Policies has been saved successfully');



            }else{



                $session->setFlashdata('error',' Not Save');



            }          



        }else{



         $session->setFlashdata('error','Document Sub Type '.$name.' already exist!');



        }



        return redirect()->to('documenttype');



    }

   
    public function editSubDocumentType(){



      $db = \Config\Database::connect();



      $session = session();



      $model = new DocumentSubTypeModel(); 



      $name = $this->request->getVar('name');
      
      
      $sub_name = $this->request->getVar('sub_name');



      $id = $this->request->getVar("id");
      
      
      
      $description = $this->request->getPost('description');


      $ava = $db->query("select * from document_sub_type where document_sub_type_name='".$sub_name."' and status=1");



      $ava = $ava->getResultArray();



        if(empty($ava)){



            $updated_data = [



                "document_type_name" => $name,
                
                "document_sub_type_name" => $sub_name,
                
                "details" => $description



            ];



            if($model->where(['id' => $id])->set($updated_data)->update()){



               $session->setFlashdata('success','Document Sub Type has been updated successfully');



            }else{



                $session->setFlashdata('error',' Not Updated');



            }          



        }else{



         $session->setFlashdata('error','Document SUb Type '.$name.' already exist!');



        }



        return redirect()->to('documenttype');



    }

    public function deleteSubDocumentType($id){



      $db = \Config\Database::connect();



      $session = session();



      $model = new DocumentSubTypeModel(); 



        if($model->update($id, ['status'=>0])){



             $session->setFlashdata('success','Document Sub Type  has been delete successfully');



        }else{



             $session->setFlashdata('error','Document Sub Type not deleted');



        }     



        return redirect()->to('documenttype');



    }


}    