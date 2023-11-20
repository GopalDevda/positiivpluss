<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

use App\Models\SupplierModel;
use App\Models\TimelineActionCenterModel;
use App\Controllers\DateTime;

use CodeIgniter\I18n\Time;
use App\Models\DocumentSubTypeModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;

use App\Models\DocumentModel;
use App\Models\Assessment;
use App\Models\IndicatorModel;
use App\Models\IndustryModel;

use App\Models\SupplierSubsidiaryModel;
use App\Models\SubSubIndustryModel;
use App\Models\IndustryCategoryModel;
use App\Models\SupplierModuleModel;

use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\DegreeModel;
use App\Models\PolicyBrandModel;

use App\Models\GhgModel;
use App\Models\ActionCenterModel;
use App\Models\QuantitativeFootprintAnswerModel;
use App\Models\Toolissue;
use App\Models\SupplierType;
use App\Models\FootprintTypeModel;
use App\Models\CountryModel;
use App\Models\StateModel;


class Suppliers_Model extends BaseController{
  public function __construct()
    {

        helper(['form', 'url','html','menu']);


        $session = \Config\Services::session();

    } 


    public function index(){

        $rs = check_session();

        if(!$rs) {

            return redirect()->to('home/user_login');


        }
        
     
        $data['pg_nm'] = 'Supplier';
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_id = $supplier_info['supplier_id'];

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

$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->orderBy('sequence', 'ASC')->findAll();

        $per = 0;

        $total_per = 0;

        $query = $db->query("select * from assessment where status=1 order by id");

        $rs = $query->getResultArray();

        if(!empty($rs)){

            foreach($rs as $r){

                $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and is_verify=1 and is_submit=1 and assessment_id='".$r['id']."' " ); 

                $p = $query->getResultArray();


                if(!empty($p)){


                    $per = ($p[0]['assessment_per']/100)*$r['weight_percentage'];

                    $total_per = $per+$per;


                }

            }

        }

        $ghg = array();

        $query = $db->query("select * from assessment where  id=10 order by id");

        $rs = $query->getResultArray();

        $query = $db->query("select * from supplier_assessment where is_submit=1 and assessment_id='".$rs[0]['id']."' and supplier_id='".$supplier_info['supplier_id']."'");

        $s = $query->getResultArray();

        $total_company_footprint = 0;

        $total_building_footprint = 0;

        $total_travel_footprint = 0;

        $total_company_vehicle_footprint = 0;

        $total_mobile_fuel_footprint = 0;

        if($s) {

            foreach($s as $rs) {


                $total_company_footprint = $total_company_footprint + $rs['total_footprint'];

                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=17");
                $building_footprint = $query->getResultArray();

                if($building_footprint) {

                    $total_building_footprint = $total_building_footprint + $building_footprint[0]['tot'];

                }

                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=18");

                $travel_footprint = $query->getResultArray();

                if($travel_footprint) {


                    $total_travel_footprint = $total_travel_footprint + $travel_footprint[0]['tot'];

                }


                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=19");

                $company_vehicle_footprint = $query->getResultArray();

                if($company_vehicle_footprint) {


                    $total_company_vehicle_footprint = $total_company_vehicle_footprint + $company_vehicle_footprint[0]['tot'];

                }


                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='".$rs['id']."' and ghg_id=20");

                $mobile_fuel_footprint = $query->getResultArray();


                if($mobile_fuel_footprint) {

                    $total_mobile_fuel_footprint = $total_mobile_fuel_footprint + $mobile_fuel_footprint[0]['tot'];


                }


            }

        }


        if(!empty($s)) {


            $query = $db->query("select SUM(estimate)as tot,ghg_id from ghg_assessment where  supplier_assessment_id='".$s[0]['id']."' and supplier_id='".$supplier_info['supplier_id']."' group by ghg_id");


            $rs = $query->getResultArray();
              }


             $footprint_type_model = new FootprintTypeModel();

             $data['type'] = $footprint_type_model->where(['footprint_id' => 3, 'status'=> 1])->findAll();

              $query = $db->query("select * from states");

        $data['stateee'] = $query->getResultArray();

        $query = $db->query("select * from countries where status=1 ");

        $data['country'] = $query->getResultArray();

     $model =  new SupplierType();

     $data['list'] = $model->where('supplier_id',$supplier_id)->where('status',1)->findAll();


     echo view('brand/add_supplier',$data);



      
    }
    public function createSupplier(){
     

        $rs = check_session();



        if(!$rs) {



            return redirect()->to('home/user_login');



        }

        $data['pg_nm'] = 'Building';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

     $supplier_model = new SupplierModel();



$model =  new SupplierType();
     $name = $this->request->getVar('name');
     $country_id = $this->request->getVar('country_idd');
     $supplier_code = $this->request->getVar('supplier_code');
     $state_id = $this->request->getVar('state_id');
     $supplier_type = $this->request->getVar('supplier_type');
     $supplier_address = $this->request->getVar('supplier_address');
     $supplier_industry = $this->request->getVar('supplier_industry');
     $pincode = $this->request->getVar('add_pincode');

     
      $data=[
        'supplier_id' => $supplier_id,
        'owner_id' => $supplier_id,
        'name' => $this->request->getVar('name'),
        'supplier_code' =>$this->request->getVar('supplier_code'),
        'supplier_type' => $this->request->getVar('supplier_type'),
        'supplier_address' => $this->request->getVar('supplier_address'),
        'state' => $state_id ,
        'country' => $country_id,
        'supplier_industry' => $this->request->getVar('supplier_industry'),
        'pincode' =>$pincode,
      ];

    $insert = $model->insert($data);
    if($insert){
$s_date = ['success' => 'Supplier Insert SuccessFully'];

$session->setFlashdata($s_date);


  }
     return redirect()->back();

    }
    public function deleteSupplier(){

   $id = $this->request->getVar('company_id');
        $session = session();

  $model =  new SupplierType();

  $data=[
        
        'status' =>'0',
      ];

    $insert = $model->update($id,$data);
    if($insert){
$s_date = ['error' => 'Supplier Delete SuccessFully'];

$session->setFlashdata($s_date);


  }
     return redirect()->back();


    }

     public function editSupplier(){
     

        $rs = check_session();



        if(!$rs) {



            return redirect()->to('home/user_login');



        }

        $data['pg_nm'] = 'Building';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

     $supplier_model = new SupplierModel();



$model =  new SupplierType();

     $name = $this->request->getVar('name');
     $country_id = $this->request->getVar('country_idd');
     $supplier_code = $this->request->getVar('supplier_code');
     $state_id = $this->request->getVar('state_id');
     $supplier_type = $this->request->getVar('supplier_type');
     $supplier_address = $this->request->getVar('supplier_address');
     $supplier_industry = $this->request->getVar('supplier_industry');
     $id = $this->request->getVar('supplier_id');
     $pincode = $this->request->getVar('edit_pincode');
     $city="No google Extraction";
       
       
          
      $data=[
        'supplier_id' => $supplier_id,
        'owner_id' => $supplier_id,
        'name' => $this->request->getVar('name'),
        'supplier_code' =>$this->request->getVar('supplier_code'),
        'supplier_type' => $this->request->getVar('supplier_type'),
        'supplier_address' => $this->request->getVar('supplier_address'),
        'state' => $state_id,
        'country' => $country_id,
        'city' => $city,
        'supplier_industry' => $this->request->getVar('supplier_industry'),
        'pincode' => $pincode,
      ];

    $insert = $model->update($id,$data);
    if($insert){
$s_date = ['success' => 'Supplier update SuccessFully'];

$session->setFlashdata($s_date);


  }
     return redirect()->back();

    }



    }






       






