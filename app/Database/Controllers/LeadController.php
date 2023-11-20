<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\LeadModel;
use App\Models\FollowupModel;
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

class LeadController extends BaseController

{
    private $helperData=array();
   
    public function __construct()
        {

                helper(['form', 'url','html','menu']);
                
                $session = \Config\Services::session();
                
                $this->helperData=commonData();

        }
    
    public function lead(){
        $db = \Config\Database::connect();
        $data=$this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        $session = session();
        $data['title'] = ' Lead Management';
        $leadquery = $db->query("SELECT lead.deal_status,lead.id,industry.industry_name,lead.lead,lead.person_name,lead.email,lead.phone_number,lead.company_name,lead.location,lead.description,lead.create_on FROM lead JOIN industry ON industry.id=lead.industry_id WHERE lead.status=1")->getResultArray();
        $data['lead'] = $leadquery;
        
        foreach($leadquery as $lid){
        $querycall = $db->query("SELECT MAX(fd.next_follow_up_date) as nextdate,MAX(fd.follow_up_date) as calldate,fd.lead_id as lead_id FROM followup_detail as fd WHERE fd.status=1  and fd.lead_id=".$lid['id'])->getResultArray();
        $colm[]=$querycall;
       }
         $data['followup']=$colm;
        //  print_R( $data['followup']);
        //  die();
        $query = $db->query("SELECT * FROM `industry` where status=1 ");
        $data['ind'] = $query->getResultArray();
        echo view('admin/lead-management',$data);
    }
    
    public function leadSubmit() {
      $db = \Config\Database::connect();
      $lead_model = new LeadModel();
      $session = Session();
      $lead = $this->request->getVar("lead");
      $email = $this->request->getVar("email");
      $phone_number = $this->request->getVar("phone_number");
      $industry_id = $this->request->getVar("industry_id");
      $company_name = $this->request->getVar("company_name");
      $location = $this->request->getVar("location");
      $description = $this->request->getVar("description");
      $follow_up_date = $this->request->getVar("follow_up_date");
      
        $data = [
        "lead" => $lead,
        "email" => $email,
        "phone_number" => $phone_number,
        "industry_id" => $industry_id,
        "company_name" => $company_name,
        "location" => $location,
        "description" => $description,
        "follow_up_date" => $follow_up_date,
        "user_id" => 1,
        ];
        if($lead_model->insert($data)){
          $session->setFlashdata('success','Lead has been saved successfully');
        }else{
          $session->setFlashdata('error','Lead Not Save');
        }
      
      return redirect()->to('LeadController/lead');
    }
    
    public function followupSubmit() {
      $db = \Config\Database::connect();
      $followup_model = new FollowupModel();
      $lead_model = new LeadModel();
      $session = Session();
      $follow_up_date = $this->request->getVar("follow_up_date");
      $lead_id = $this->request->getVar("lead_id");
      $follow_up = $this->request->getVar("follow_up");
      $next_follow_up_date = $this->request->getVar("next_follow_up_date");
      $dealstatus="1";
      
        $data = [
        "follow_up_date" => $follow_up_date,
        "lead_id" => $lead_id,
        "follow_up" => $follow_up,
        //"industry_id" => $industry_id,
        "next_follow_up_date" => $next_follow_up_date,
        ];
         $lead_model->where(['id' => $lead_id])->set(["deal_status" => $dealstatus,])->update();
        if($followup_model->insert($data)){
          $session->setFlashdata('success','FollowUp has been saved successfully');
        }else{
          $session->setFlashdata('error','FollowUp Not Save');
        }
      
      return redirect()->to('LeadController/lead');
    } 
    public function closedealSubmit() {
      $db = \Config\Database::connect();
      $followup_model = new FollowupModel();
      $lead_model = new LeadModel();
      $session = Session();
      $follow_up_date = $this->request->getVar("follow_up_date");
      $lead_id = $this->request->getVar("lead_id");
      $remark = $this->request->getVar("remark");
      $next_follow_up_date = $this->request->getVar("next_follow_up_date");
      $dealstatus = $this->request->getVar("dealstatus");
      if($dealstatus==2){$follow_up="Deal CLoded Positively";}
      if($dealstatus==0){$follow_up="Deal CLoded Negative";}
      
        $data = [
        "follow_up_date" => $follow_up_date,
        "lead_id" => $lead_id,
        "follow_up" => $follow_up,
        "remark" => $remark,
        "next_follow_up_date" => $next_follow_up_date,
        ];
        
       $lead_model->where(['id' => $lead_id])->set(["deal_status" => $dealstatus,])->update();
        if($followup_model->insert($data)){
          $session->setFlashdata('success','Deal closed  has been saved successfully');
        }else{
          $session->setFlashdata('error','Deal Not closed ');
        }
      
      return redirect()->to('LeadController/lead');
    }
    
    public function showData($id){
        $db = \Config\Database::connect();
        $data=$this->helperData;
        $session = session();
        
        $query = $db->query("SELECT * FROM `followup_detail` WHERE lead_id = '$id' AND status = 1");
        // echo $db->getLastquery($query);
        // die();
        $folloupdata_arr = $query->getResultArray();
       
             $i=1;
            $data='<table class="table table-bordered table table-bordered table-striped">
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Followup</th>
                        <th>Next Followup Date</th>
                    </tr>';
                     if($folloupdata_arr) {
            foreach($folloupdata_arr as $f){
         
            $data.='<tr>';
            $data.='<td>'.$i.'</td>';
            $data.='<td>'.$f['follow_up_date'].'</td>';
            $data.='<td>'.$f['follow_up'].'</td>'; 
            $data.='<td>'.$f['next_follow_up_date'].'</td>';

            $data.='</tr>';
            $i++;
            }
            $data.='</table>';
            }else{
                 $data.='<table>';
                 $data.='<h2 align="center">No Follow Up Details Found</h2>';
                 $data.='</table>';
            }
        echo $data;
        
    }


}    