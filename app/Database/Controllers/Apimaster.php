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

use App\Models\CompanyVehicleDetailModelApi;

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

class Apimaster extends BaseController



{


    private $helperData=array();
    public function __construct(){



        helper(['form', 'url','html','menu']);



        $session = \Config\Services::session();



       // $this->user_info = $this->session->get_userdata();

        $this->helperData=commonData();



    }



    
    public function companyVehicleApi() {
        $db = \Config\Database::connect();
        $data=$this->helperData;
       $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $standard_model = new StandardModel();
        
        $data['standard'] = $standard_model->where('status',1)->findAll();
        // company_vehicle_detail
        $data['list'] = $db->query("select cvd.*,v.vehicle_name,gf.name,f.factor_name from api_company_vehicle_detail as cvd left join vehicle as v on cvd.vehicle=v.id left join ghg_factor as gf on gf.id=cvd.ghg_factor_id left join factor as f on gf.name=f.id where cvd.status=1")->getResultArray();
        // print_r($data['list']);
        // die();
        // // status removed start
        // $data['vehicle'] = $db->query("select * from vehicle where status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        $data['vehicle'] = $db->query("select * from vehicle where status=0||status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        // status removed end
        
        $data['ghg_factor'] = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on gf.name=f.id where gf.ghg_id=19")->getResultArray();
        return view('admin/view-company-vehicle-api.php',$data);
    }

    public function addApiCompanyVehicle() {
        $db = \Config\Database::connect();

        $company_vehicle_detail_model = new CompanyVehicleDetailModelApi();

        $session = Session();

        $vehicle = $this->request->getVar("vehicle");

        $year = $this->request->getVar("year");

        $type = $this->request->getVar("type");

        $model = $this->request->getVar("model");
        
        $ghg_factor = $this->request->getVar("ghg_factor");
        
        $efficiency = $this->request->getVar("efficiency");
      
        $data = [

            "vehicle" => $vehicle,

            "year" => $year,

            "type" => $type,

            "model" => $model,

            "user_id" => 1,
            
            "efficiency" => $efficiency,

            "status" => 1,
            
            "ghg_factor_id" => $ghg_factor

        ];
    $ava = $db->query("select * from api_company_vehicle_detail where type='".$type."' and ghg_factor_id='".$ghg_factor."' and status=1");



      $ava = $ava->getResultArray();



      if(empty($ava)){
                                    if($company_vehicle_detail_model->insert($data)) {
                            
                                        $session->setFlashdata('success','Api Company Vehicle Detail has been successfully saved');
                            
                                    }
                            
                                    else {
                            
                                        $session->setFlashdata('error','Error to save');
                            
                                    }
                     } else{



                                $session->setFlashdata('error','Type <b>'.$type.' </b> already exist!');

                            }
         return redirect()->to('apimaster/companyVehicleApi');

    }


    public function deleteApiCompanyVehicle($id) {

        $company_vehicle_detail_model = new CompanyVehicleDetailModelApi();

        $session = Session();

        if($company_vehicle_detail_model->where('id',$id)->set(['status' => 0])->update()) {

            $session->setFlashdata("success","Api Company Vehicle Detail has been successfully deleted");

        }

        else {

            $session->setFlashdata("error","Error to delete");

        }

        return redirect()->to('apimaster/companyVehicleApi');

    }


    public function editApiCompanyVehicle() {
        $company_vehicle_detail_model = new CompanyVehicleDetailModelApi();

        $session = Session();

        $id = $this->request->getVar("id");

        $vehicle = $this->request->getVar("vehicle");

        $year = $this->request->getVar("year");

        $type = $this->request->getVar("type");

        $model = $this->request->getVar("model");
        $ghg_factor = $this->request->getVar("ghg_factor");
        // $derivative = $this->request->getVar("derivative");

        $efficiency = $this->request->getVar("efficiency");

        // $emission_factor = $this->request->getVar("emission_factor");

        $updated_data = [

            "vehicle" => $vehicle,

            "year" => $year,

            "type" => $type,

            "model" => $model,
            
            "efficiency" => $efficiency,

            "ghg_factor_id" => $ghg_factor

        ];

        if($company_vehicle_detail_model->where('id',$id)->set($updated_data)->update()) {

            $session->setFlashdata('success','Api Company Vehicle Detail has been successfully updated');

        }

        else {

            $session->setFlashdata("error","Error to update");

        }

        return redirect()->to('apimaster/companyVehicleApi');

    }



    public function vehicle() {

        $db = \Config\Database::connect();
        $data=$this->helperData;

        // $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        $standard_model = new StandardModel();

        // $data['menu'] = $module_model->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $data['standard'] = $standard_model->where('status',1)->findAll();

        $data['list'] = $db->query("select v.*,f.footprint_name,f.id as foot_id from vehicle as v left join footprint as f on f.id=v.footprint_id where v.status=1")->getResultArray();

        $query = $db->query("select * from footprint where status=1");
        $footprint_arr = $query->getResultArray();
        $data['footprint'] = $footprint_arr;

        return view('admin/view-vehicle.php',$data);

    }



    
    

}    