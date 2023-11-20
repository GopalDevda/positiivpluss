<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;

use App\Models\SupplierModel;

use App\Models\SupplierModuleModel;

use App\Models\SupplierModuleItemModel;

use App\Models\SupplierModuleItemRelationModel;

use App\Models\GhgAssessmentModel;

use App\Libraries\libraries\REST_Controller;

// require APPPATH . 'libraries/REST_Controller.php';

use App\Models\Ghg;

use App\Models\FootprintTypeModel;

class BussinessApi extends BaseController

{

    // Transport carbon footprint calculator {{  Choose vehicle  }}
     public function getChoosevehicle() {

        $db = \Config\Database::connect();        

        $session = session();

        $query = $db->query("select distinct(cvd.vehicle),v.vehicle_name,v.id as vid from api_company_vehicle_detail as cvd join vehicle as v on cvd.vehicle=v.id where cvd.status=1");

        $data['comp_vehicle'] = $query->getResultArray();

       return json_encode($query->getResultArray());
    

    }
    // Transport carbon footprint calculator {{  Choose getYearByCompanyVehicle  }}
    
     public function getYearByCompanyVehicle() {
    
            $db = \Config\Database::connect();        
    
            $vehicle = $this->request->getVar('vehicle');
            $query = $db->query("select year from api_company_vehicle_detail where vehicle='".$vehicle."' and status=1 group by year order by year asc");
            $cv_year = $query->getResultArray();
            return json_encode($cv_year);
    
        }
    // Transport carbon footprint calculator {{  Choose getTypeOfTransportation  }}

     public function getTypeOfCompanyVehicle() {

        $db = \Config\Database::connect();        

        $vehicle =  $this->request->getVar("vehicle");

        $year = $this->request->getVar("year");

        $query = $db->query("select distinct(type) from api_company_vehicle_detail where vehicle='".$vehicle."' and year='".$year."' and status=1");

        $cv_type = $query->getResultArray();


        return json_encode($cv_type);

    }

     public function getModelOfCompanyVehicle() {

        $db = \Config\Database::connect();        

        $vehicle =  $this->request->getVar("vehicle");

        $year = $this->request->getVar("year");

        $type = $this->request->getVar("type");

        $query = $db->query("select model from api_company_vehicle_detail where vehicle='".$vehicle."' and year='".$year."' and type='".$type."' and status=1");

        $cv_type = $query->getResultArray();
        foreach ($cv_type as $key => $typevalue)
                    {
                       $modal[] = array(
                            'status' => true,
                            'model' => $typevalue['model'],
                            );
                    }
$data= array("data"=>$modal);

        return json_encode($data);

    }

     public function getGhgFactorOfCompanyVehicle() {

        $db = \Config\Database::connect();        

        $vehicle =  $this->request->getVar("vehicle");

        $year = $this->request->getVar("year");

        $type = $this->request->getVar("type");

        $model = $this->request->getVar("model");

        // $derivative = $this->request->getVar("derivative");

        $query = $db->query("select cvd.*,gf.name,f.factor_name,f.factor_name,gf.id as fid  from api_company_vehicle_detail as cvd join ghg_factor as gf on gf.id=cvd.ghg_factor_id join factor as f on f.id=gf.name where cvd.vehicle='".$vehicle."' and cvd.year='".$year."' and cvd.type='".$type."' and cvd.model='".$model."' and cvd.status=1");

        $cv_ghg_factor = $query->getResultArray();
        // "ghg_factor_id": "208",
        // "name": "1086",
        // "factor_name": "HGV Rigid (>3.5 - 7.5 tonnes)"
         $data = array( 'status' => true,'factor_id' =>$cv_ghg_factor[0]['fid'],'factor_name' =>$cv_ghg_factor[0]['factor_name']);


       return json_encode($data);

    }
    
     public function calculate() {

        $db = \Config\Database::connect();  
        $token=$this->request->getVar("token");
        
        $data=[];
          if($token!=="4****"){
                                $data['error']="The credential are Not matching our recordes";
                                }else{
                
                                         $distance=$this->request->getVar("distance");
                                          $vehicle=$this->request->getVar("vehicle");
                                           $year=$this->request->getVar("year");
                                            $type=$this->request->getVar("type");
                                             $model=$this->request->getVar("model");
                                              $factor=$this->request->getVar("factor");
                                             
                                               $efficiencY = $db->query("SELECT effic.efficiency FROM `api_company_vehicle_detail` as effic WHERE effic.type='".$type."' ")->getResultArray();
                                                $queryfactoremission = $db->query("SELECT gf.emission_factor FROM `ghg_factor` as gf  WHERE gf.`id`='".$factor."' ")->getResultArray();
                                      if(empty($efficiencY) || empty($queryfactoremission)){
                                           $data['staus']=404;
                                          $data['message']="Data and founded thing is missing out";
                                      }else{
                                                 foreach ($efficiencY as $key => $efficiencyvalue)
                                                    {
                                                       
                                               
                                                        $factor=$queryfactoremission[0]['emission_factor'];
                                                        $impact_calculation=($distance/$efficiencyvalue['efficiency'])*$factor;
                                                        $impact[] = array( 'impact' => number_format($impact_calculation,2),);
                                                        
                                                    }
                                                    $data['staus']= true;
                                                    $data['details']= $impact;
                                                    
                                      }
                                    }
           echo json_encode($data);
    } 
    
     public function calculateDelivery() {

        $db = \Config\Database::connect();  
        $token=$this->request->getVar("token");
        
        $data=[];
          if($token!=="4****"){
                                $data['error']="The credential are Not matching our recordes";
                                }else{
                
                                         $distance=$this->request->getVar("distance");
                                          $vehicle=$this->request->getVar("vehicle");
                                          $weight=$this->request->getVar("weight");
                                           $year=$this->request->getVar("year");
                                            $type=$this->request->getVar("type");
                                             $model=$this->request->getVar("model");
                                              $factor=$this->request->getVar("factor");
                                              
                                              if($weight=="" || empty($weight) || !is_numeric($weight)){
                                                  
                                                  $data['staus']=407;
                                          $data['message']="Data format is missing out : $weight";
                                              }elseif($distance=="" || empty($distance) || !is_numeric($distance)){
                                                   $data['staus']=407;
                                          $data['message']="Data format is missing out : $distance";
                                                  
                                                  
                                              }elseif($vehicle=="" || empty($vehicle) || !is_numeric($vehicle)){
                                                  
                                                  $data['staus']=407;
                                          $data['message']="vehicle Id should be pass : $vehicle";
                                                  
                                                  
                                                  
                                              }else
                                             
                                               $efficiencY = $db->query("SELECT effic.efficiency FROM `api_company_vehicle_detail` as effic WHERE effic.type='".$type."' ")->getResultArray();
                                                $queryfactoremission = $db->query("SELECT gf.emission_factor FROM `ghg_factor` as gf  WHERE gf.`id`='".$factor."' ")->getResultArray();
                                      if(empty($efficiencY) || empty($queryfactoremission)){
                                           $data['staus']=404;
                                          $data['message']="Data and founded thing is missing out";
                                      }else{
                                                 foreach ($efficiencY as $key => $efficiencyvalue)
                                                    {
                                                       
                                               
                                                        $factor=$queryfactoremission[0]['emission_factor'];
                                                        $impact_calculation=$weight*($distance/$efficiencyvalue['efficiency'])*$factor;
                                                        $impact[] = array( 'impact' => number_format($impact_calculation,2),);
                                                        
                                                    }
                                                    $data['staus']= true;
                                                    $data['details']= $impact;
                                                    
                                      }
                                    } 
                                    
                               
           echo json_encode($data);
           
    }

}

