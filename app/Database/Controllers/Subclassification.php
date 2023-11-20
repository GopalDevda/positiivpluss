<?php



namespace App\Controllers;



use App\Controllers\BaseController;


use CodeIgniter\Controller;


use App\Models\SdgModel;

use App\Models\FinanceModel;

use App\Models\SupplierModuleItemModel;


use App\Models\GroupModel;

use App\Models\ImpactModel;

use App\Models\SubSubIndustryModel;

use App\Models\RawMaterialProcessDetailModel;

use App\Models\RawmaterialDetailModel;



use App\Models\Finance_Sub_Category_Model;



use App\Models\IndustryModel;



use App\Models\IndicatorCategoryModel;



use App\Models\DocumentTypeModel;


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


use App\Models\SubClassificationModel;



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

class Subclassification extends BaseController
{
      private $helperData=array();
    public function __construct(){



        helper(['form', 'url','html','menu']);



        $session = \Config\Services::session();



       // $this->user_info = $this->session->get_userdata();

        $this->helperData=commonData();



    }

      public function index() {

        $data=$this->helperData;

        $db = \Config\Database::connect();

$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        $data['title']='Subclassification';

        $standard_model = new StandardModel();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $unit_model = new UnitModel();

        $data['unit'] = $unit_model->where('status',1)->findAll();

        // $data['list'] = $db->query("select classification.*,standard.standard_name from classification left join standard on classification.standard_id=standard.id where classification.status=1")->getResultArray();
        $data['list'] = $db->query("select sub_classification.*,sub_classification.classification_name as scaId,classification.classification_name,standard.standard_name from sub_classification left join classification on classification.id=sub_classification.classification_name left join standard on sub_classification.standard_id=standard.id where sub_classification.status=1")->getResultArray();

        return view('admin/view-sub-classification.php',$data);



    }
    public function addsubclassification() {

        $classification_sub_model = new SubClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info)
        {
        
            return redirect()->to('auth/logout');

        }
        $name = $this->request->getVar("classification_id");
        $subclassification = $this->request->getVar("subclassification");
        $standard_id = $this->request->getVar("standard_id");
        $add_guidelines = $this->request->getVar("add_guidelines");
        $unit_id = $this->request->getVar("unit_id");
        $data = [

            "classification_name" => $name,
            "sub_classification_name" => $subclassification,
            "standard_id" => $standard_id,
            "unit_id" => $unit_id,
            "guidelines" => $add_guidelines,
            "user_id" => 1,
            "status" => 1
        ];

// print_r($data);
// die();


        if($classification_sub_model->insert($data)) {



            $session->setFlashdata('success','Sub Classification has been successfully saved');



        }



        else {



            $session->setFlashdata('error','Error to save');

        }

        return redirect()->to('Subclassification');

    }

     public function deleteClassification($id) {

        $classification_sub_model = new SubClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        if($classification_sub_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata("success","Sub Classification has been successfully deleted");

        }

        else {

            $session->setFlashdata("error","Error to delete");

        }

        return redirect()->to('Subclassification');

    }
    
      public function editSubClassification() {

        $classification_sub_model = new SubClassificationModel();



        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }



        $id = $this->request->getVar("sub_id");

        $name = $this->request->getVar("subclassification");

        $standard_id = $this->request->getVar("standard_id");

        $classification_id = $this->request->getVar("classification_id");
        $edit_guidelines = $this->request->getVar("edit_guidelines");
        
        $unit_id = $this->request->getVar("unit_id");

        $updated_data = [



            "sub_classification_name" => $name,

            "standard_id" => $standard_id,

            "classification_name" => $classification_id,
            "guidelines" => $edit_guidelines,

            "unit_id" => $unit_id

        ];



        if($classification_sub_model->where('id',$id)->set($updated_data)->update()) {



            $session->setFlashdata('success','Sub Classification has been successfully deleted');



        }



        else {



            $session->setFlashdata("error","Error to delete");



        }



       return redirect()->to('Subclassification');



    }
    
}

