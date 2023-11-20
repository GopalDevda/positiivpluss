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

class Graph extends BaseController{

public function __construct(){
helper(['form', 'url','html','menu']);
$session = \Config\Services::session();
}


public function actiontracker(){
    $rs = check_session();
    if(!$rs) {
        return redirect()->to('home/user_login');
    }
    $data['pg_nm'] = 'Dashboard';
    $db = \Config\Database::connect();
    $session = session();
    $supplier_info = $session->get('supplier_info');
    $supplier_model = new SupplierModel();
    $supplier_module_model = new SupplierModuleModel();
    $supplier_module_item_model = new SupplierModuleItemModel();
    $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();
    $supplier_plan_id = $rs['supplier_plan_id'];

    $from = $this->request->getVar('catId');
    $to = $this->request->getVar('g');
    // print_r($to);
    // die();

}


public function index(){
$rs = check_session();
if(!$rs) {
return redirect()->to('home/user_login');
}
$data['pg_nm'] = 'Dashboard';
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
//         echo '<pre>';
    // print_r($rs);die;
        if(!empty($s)) {
            if(!empty($rs)){
                foreach($rs as $r){
                    if(!empty($r)){
                        $query = $db->query("select * from ghg where status=1 and id='".$r['ghg_id']."' ");
                        $g = $query->getResultArray();
                        $per = 0;
                        if($total_company_footprint!=0) {
                            if($r['ghg_id']==17) {
                                $per = ($total_building_footprint/$total_company_footprint) * 100;
                            }
                            if($r['ghg_id']==18) {
                                $per = ($total_travel_footprint/$total_company_footprint) * 100;                        
                            }
                            if($r['ghg_id']==19) {
                                $per = ($total_company_vehicle_footprint/$total_company_footprint) * 100;                        
                            }
                            if($r['ghg_id']==20) {
                                $per = ($total_mobile_fuel_footprint/$total_company_footprint) * 100;                        
                            }
                        }
                        $ghg[] = array('ghg_name'=>$g[0]['ghg_name'],'per'=> $per);
                    }
                }
            }
        }
            // echo '<pre>';
                // print_r($ghg);
                // die();
                $sdg = [];
                if($supplier_info) {
                    $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=2 order by id desc");
                    $supp_ass = $query->getResultArray();
                    if($supp_ass) {
                        $query = $db->query("select sba.base_assessment_question_id,saq.sdg_id,s.sdg_name,s.image,d.degree_num from supplier_base_assessment as sba join sdg_assessment_question as saq on sba.base_assessment_question_id=saq.id join sdg as s on saq.sdg_id=s.id join degree as d on sba.degree_id=d.id where sba.supplier_assessment_id='".$supp_ass[0]['id']."' and (d.degree_num=3 or d.degree_num=4) group by sdg_id");
                        $sdg = $query->getResultArray();
                    }
                }
                // echo '<pre>';
                    // print_r($sdg);
                    // die();
                    // $query = $db->query("select * from sdg where status=1 order by id");
                    // $sdg = $query->getResultArray();
                    $query = $db->query("select indicator_name from indicator where status=1 order by id");
                    $indicator = $query->getResultArray();
                    $query = $db->query("select * from supplier_assessment where  assessment_id=1 and supplier_id='".$supplier_info['supplier_id']."' order by id");
                    $b = $query->getResultArray();
                    $category = array();
                    $query = $db->query("select * from indicator_category where status=1 order by id");
                    $cat = $query->getResultArray();
            //        print_r($b);die;
                    if(!empty($b)){
                        if(!empty($cat)){
                            foreach($cat as $c){
                                // $query = $db->query("select count(id)as tot from base_assessment_question where indicator_category_id='".$c['id']."' and status=1 order by id");
                                $query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment where supplier_assessment_id='".$b[0]['id']."' and status=1");
                                $total_question = $query->getResultArray();
                                if($total_question[0]['tot']>0){
                                    // $query = $db->query("select count(s.id)as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and indicator_category_id='".$c['id']."' and supplier_assessment_id='".$b[0]['id']."'  ");
                                    $query = $db->query("select count(distinct(base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and indicator_category_id='".$c['id']."' and supplier_assessment_id='".$b[0]['id']."'  ");
                                    $ava_question = $query->getResultArray();
                                    $per = 0;
                                    if($ava_question[0]['tot']>0) {
                                    $per = round(($ava_question[0]['tot']/$total_question[0]['tot'])*100);
                                    }
                                    $category[] = array('value'=>$per,'name'=>$c['indicator_category_name']);
                                }else{
                                    $category[] = array('value'=>0,'name'=>$c['indicator_category_name']);
                                }
                            }
                        }
                    }
                    $indicator = array();
                    $indicator_value = array();
                    if(!empty($b)){
                        $query = $db->query("select count(s.id)as tot,indicator_id from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id and supplier_assessment_id='".$b[0]['id']."' group by b.indicator_id ");
                        $ava_question = $query->getResultArray();
                        if(!empty($ava_question)){
                        foreach($ava_question as $v){
                            $query = $db->query("select count(id)as tot from base_assessment_question where indicator_id='".$v['indicator_id']."' and status=1 order by id");
                            $total_question = $query->getResultArray();
                                if($total_question[0]['tot']>0){
                                    $query = $db->query("select * from indicator where id='".$v['indicator_id']."' ");
                                    $i = $query->getResultArray();
                                    $per = round(($v['tot']/$total_question[0]['tot'])*100);
                                    $indicator[] = array($i[0]['indicator_name']);
                                    $indicator_value[] =$per;
                                }
                            }
                        }
                    }
                    $data['ghg'] = $ghg;
                    $data['sdg'] = $sdg;
                  // $data['indicator'] = $indicator_per;
                    $data['indicator'] = array('indicator_array'=>$indicator,'indicator_per'=>$indicator_value);
                    $data['indicator_category'] = $category;
                    $data['assessment'] = array('gaugeChart_percentage'=>$total_per);
                    $query = $db->query("select count(id)as tot,sum(no_of_employee) as tot_emp from supplier_assessment where assessment_id=10 and supplier_id='".$supplier_info['supplier_id']."' order by id");
                    $total_location = $query->getResultArray();
                    $query = $db->query("select count(id)as tot from supplier_assessment where assessment_id=11 and supplier_id='".$supplier_info['supplier_id']."' order by id");
                    $total_product = $query->getResultArray();
                    $data['dashboard'] = array("location"=>$total_location[0]['tot'],"employee"=>$total_location[0]['tot_emp'],"product"=>$total_product[0]['tot']);
                        $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=1 order by id desc")->getRowArray();
                        $data['supp_assess'] = $supp_assess;
                        $list = [];
                        $degree_model = new DegreeModel();
                        $data['degree'] = $degree_model->where('status',1)->findAll();
                        $supplier_base_assessment = [];
                        if($data['supp_assess']) {
                        $supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=".$data['supp_assess']['id'])->getResultArray();
                        }
                        if($supplier_base_assessment) {
                            foreach($supplier_base_assessment as $sba) {
                                $temp_arr = [];
                                $question = $db->query("select base_assessment_question.question,indicator_category.indicator_category_name,indicator.indicator_name from base_assessment_question join indicator_category on base_assessment_question.indicator_category_id=indicator_category.id join indicator on base_assessment_question.indicator_id=indicator.id  where base_assessment_question.id=".$sba['base_assessment_question_id'])->getRowArray();
                                $answer = $db->query("select answer,marks from base_assessment_answer where degree_id in(6,7) and base_assessment_answer.id=".$sba['base_assessment_answer_id'])->getRowArray();
                                $temp_arr["supplier_base_assessment"] = $sba;
                                $temp_arr["question"] = $question;
                                $temp_arr["answer"] = $answer;
                                $list[] = $temp_arr;
                            }
                        }
                   $query = $db->query("SELECT * FROM `supplier_base_assessment` as s join base_assessment_answer as a on s.`base_assessment_answer_id`=a.id join base_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(1,4) and c.assessment_id=1 and c.`supplier_id`=".$supplier_info['supplier_id']." ");
                    $risk = $query->getResultArray();
                    $data['base_risk'] = array();
                    if(!empty($risk)){
                            foreach ($risk as $key => $r) {
                                $query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
                                $cat = $query->getResultArray();
                                $query = $db->query("select * from indicator where id='".$r['indicator_id']."' order by id ");
                                $i = $query->getResultArray();
                                $base_risk[] = array("indicator_category_name"=>$cat[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg"=>'');
                            }
                        $data['base_risk'] = $base_risk;
                    }
                
                    $query = $db->query("SELECT * FROM `supplier_base_assessment` as s join base_assessment_answer as a on s.`base_assessment_answer_id`=a.id join base_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(6,7) and c.assessment_id=1 and c.`supplier_id`=".$supplier_info['supplier_id']." ");
                    $strong = $query->getResultArray();
                    $data['base_strong'] = array();
                    if(!empty($strong)){
                        foreach ($strong as $key => $r) {
                            $query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
                            $cat = $query->getResultArray();
                            $query = $db->query("select * from indicator where id='".$r['indicator_id']."' order by id ");
                            $i = $query->getResultArray();
                            $base_strong[] = array("indicator_category_name"=>$cat[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg"=>'');
                        }
                        $data['base_strong'] = $base_strong;
                    }
                   $query = $db->query("SELECT * FROM `supplier_base_assessment` as s join sdg_assessment_answer as a on s.`base_assessment_answer_id`=a.id join sdg_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(1,2) and c.assessment_id=2 and c.`supplier_id`=".$supplier_info['supplier_id']."  ");
                    $risk = $query->getResultArray();
                    $data['sdg_risk'] = array();
                    if(!empty($risk)){
                            foreach ($risk as $key => $r) {
                                $query = $db->query("select * from sdg where id='".$r['sdg_id']."' order by id ");
                                $sdg = $query->getResultArray();
                               // $query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
                                //$cat = $query->getResultArray();
                                $query = $db->query("select i.*,ic.indicator_category_name from indicator as i join indicator_category as ic on i.indicator_category_id=ic.id where i.id='".$r['indicator_id']."' order by i.id ");
                                $i = $query->getResultArray();
                                $sdg_risk[] = array("indicator_category_name"=>$i[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg_name"=>$sdg[0]['sdg_name']);
                            }
                        $data['sdg_risk'] = $sdg_risk;
                    }
                    $query = $db->query("SELECT * FROM `supplier_base_assessment` as s join sdg_assessment_answer as a on s.`base_assessment_answer_id`=a.id join sdg_assessment_question as b on  b.id=s.`base_assessment_question_id` join supplier_assessment as c on c.id=s.supplier_assessment_id  WHERE s.status=1 and  a.degree_id in(6,7) and c.assessment_id=2 and c.`supplier_id`=".$supplier_info['supplier_id']."  ");
                    $strong = $query->getResultArray();
                    $data['sdg_strong'] = array();
                    if(!empty($strong)){
                        foreach ($strong as $key => $r) {
                            $query = $db->query("select * from sdg where id='".$r['sdg_id']."' order by id ");
                            $sdg = $query->getResultArray();
                           // $query = $db->query("select * from indicator_category where id='".$r['indicator_category_id']."' order by id ");
                            //$cat = $query->getResultArray();
                            $query = $db->query("select i.*,ic.indicator_category_name from indicator as i join indicator_category as ic on i.indicator_category_id=ic.id where i.id='".$r['indicator_id']."' order by i.id ");
                            $i = $query->getResultArray();
                            $sdg_strong[] = array("indicator_category_name"=>$i[0]['indicator_category_name'],"indicator_name"=>$i[0]['indicator_name'],"question"=>$r['question'],"answer"=>$r['answer'],'degree_id'=>$r['degree_id'],"sdg_name"=>$sdg[0]['sdg_name']);
                        }
                        $data['sdg_strong'] = $sdg_strong;
                    }
                   $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=".$supplier_info['supplier_id']." group by assessment_id order by assessment_id");
                   $level = $query->getResultArray();
                   // echo '<pre>';
                       // print_r($level);
                       // die();
                       $total_level = 0;
                       $level_name ='';
                       if(!empty($level)){
                           foreach($level as $l){
                               $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='".$l['assessment_id']."' ");
                               $t = $query->getResultArray();
                               $total_level = $total_level+(($l['tot']/100)*$t[0]['weight_percentage']); 
                           }
                       }
                       if($total_level>=0 && $total_level<=10){
                            $level_name = "Dorment";
                       }
                       if($total_level>=10 && $total_level<=40){
                            $level_name = "Active";
                       }
                       if($total_level>=41 && $total_level<=81){
                            $level_name = "Positive";
                       }
                       if($total_level>=81 && $total_level<=100){
                            $level_name = "Green";
                       }
                        $data['level'] = array("level_name"=>$level_name,"level_per"=>$total_level);;
                        $data['supplier_base_assessment_list'] = $list;
                        $data['total_emission'] = 0;
                        $data['per_employee_emission'] = 0;
                        $data['risk_assessment'] = [];
                        $data['riissk_assessment'] = [];
                        $risk_assessment_arr = [];
                        $riissk_assessment_arr = [];
                        if($supplier_info['supplier_id']) {
                            $query = $db->query("select sum(total_footprint) as tot from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and is_submit=1");
                            $rs = $query->getResultArray();
                            if($rs) {
                                $data['total_emission'] = ($rs[0]['tot'])/1000;
                            }
                            $query = $db->query("select sum(no_of_employee) as tot from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=10 and is_submit=1");
                            $emp_arr = $query->getResultArray();
                            if($emp_arr) {
                                if($emp_arr[0]['tot']) {
                                    $data['per_employee_emission'] = $data['total_emission']/($emp_arr[0]['tot']);                
                                }
                            }
                            $query = $db->query("select * from indicator_category where status=1");
                            $indicator_category_arr = $query->getResultArray();
                            // echo '<pre>';
                                if($indicator_category_arr) {
                                    foreach($indicator_category_arr as $indicator_category) {
                                        $tot_degree = 0;
                                        $tot_answer = 0;
                                        $toot_answer = 0;  
                                        $toot_degree =0;
                                
                                        $avg_degree = 0;
                                        $aavvgg_degree=0;
                                        $temp = [];
                                        $tempp = [];
                                        $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."'");
                                        $supplier_assessment_arr = $query->getResultArray();
                                        if($supplier_assessment_arr) {
                                            foreach($supplier_assessment_arr as $supplier_assessment) {
                                                if($supplier_assessment['assessment_id']==1) {
                                                    $query = $db->query("select sba.base_assessment_question_id,baq.indicator_category_id,sba.base_assessment_answer_id,baa.degree_id,sum(d.degree_num) as tot_degree,count(baa.id) as tot_answer from supplier_base_assessment as sba 
                                                    join base_assessment_question as baq on sba.base_assessment_question_id=baq.id 
                                                    join base_assessment_answer as baa on sba.base_assessment_answer_id=baa.id 
                                                    join degree as d on d.id=baa.degree_id where sba.supplier_assessment_id='".$supplier_assessment['id']."' and baq.indicator_category_id='".$indicator_category['id']."'");
                                                    $supplier_base_assessment = $query->getResultArray();
                                                    if($supplier_base_assessment) {
                                                        $tot_degree+= $supplier_base_assessment[0]['tot_degree'];
                                                        $tot_answer+= $supplier_base_assessment[0]['tot_answer'];
                                                        
                                                        $toot_degree+= $supplier_base_assessment[0]['tot_degree'];
                                                        $toot_answer+= $supplier_base_assessment[0]['tot_answer'];
                                                    }
                                                }
                                                if($supplier_assessment['assessment_id']==2) {
                                                    $query = $db->query("select sba.base_assessment_question_id,saq.indicator_id,sba.base_assessment_answer_id,saa.degree_id,sum(d.degree_num) as tot_degree,count(saa.id) as tot_answer,i.indicator_category_id from supplier_base_assessment as sba join sdg_assessment_question as saq on sba.base_assessment_question_id=saq.id join sdg_assessment_answer as saa on sba.base_assessment_answer_id=saa.id join degree as d on d.id=saa.degree_id join indicator as i on i.id=saq.indicator_id where sba.supplier_assessment_id='".$supplier_assessment['id']."' and saq.indicator_id=i.id and i.indicator_category_id='".$indicator_category['id']."'");
                                                    // PRINT_r($query);
                                                    $supplier_advance_assessment = $query->getResultArray();
                                                    if($supplier_advance_assessment) {
                                                        $tot_degree+= $supplier_advance_assessment[0]['tot_degree'];
                                                        $tot_answer+= $supplier_advance_assessment[0]['tot_answer'];
                                                       
                                                        // $toot_degree+= $supplier_advance_assessment[0]['tot_degree'];
                                                        // $toot_answer+= $supplier_advance_assessment[0]['tot_answer'];
                                                    }
                                                }
                                            }
                                        }
                                        $temp['indicator_category_name'] = $indicator_category['indicator_category_name'];
                                         $tempp['indicator_category_nam'] = $indicator_category['indicator_category_name'];
                                          $tempp['indicator_category_id'] = $indicator_category['id'];
                                        $temp['avg_degree'] = 0;
                                        if($tot_degree && $tot_answer) {
                                            $temp['avg_degree'] = $tot_degree/$tot_answer;
                                        }
                                        $tempp['aavvgg_degree'] = 0;
                                        if($toot_degree && $toot_answer) {
                                            $tempp['aavvgg_degree'] = $toot_degree/$toot_answer;
                                        }
                                        
                                         $risk_assessment_arr[] = $temp;
                                        $riissk_assessment_arr[] = $tempp;
                                    }
                                    
                                    
                                    
                         $db = \Config\Database::connect();
                            $session = session();
                        $supplier_info = $session->get('supplier_info');
                        $querygoal = $db->query("select baa.degree_id,baq.question_title,sdg.image,sdg.sdg_name,sdg.id from supplier_base_assessment as sba join sdg_assessment_question as baq on sba.base_assessment_question_id=baq.id join sdg as sdg on baq.sdg_id=sdg.id join sdg_assessment_answer as baa on baa.id=sba.base_assessment_answer_id where sba.supplier_assessment_id=71  AND baa.degree_id>4 AND sba.supplier_id=".$supplier_info['supplier_id']."  group BY sdg.sdg_name ");
                        $ggooaall = $querygoal->getResultArray();
                        
                        
                                    $data['risk_assessment'] = $risk_assessment_arr;
                                    $data['riissk_assessment'] = $riissk_assessment_arr;
                                    $data['goal'] = $ggooaall;
                                }
                            }
                     $query = $db->query("SELECT
                        g.*,
                        gc.ghg_category_name AS gc,
                        SUM(gas.estimate) as w
                    FROM
                        ghg AS g
                    JOIN ghg_category AS gc
                    ON
                        g.ghg_category_id = gc.id
                     JOIN ghg_assessment as gas
                     on g.id=gas.ghg_id
                     
                     
                     
                     where gas.supplier_id='".$supplier_info['supplier_id']."'  and (g.footprint_id=5||g.footprint_id=1||g.footprint_id=2) and g.status=1 group by gc.ghg_category_name");
                            $data['ghg'] = $query->getResultArray();
                    //Business Travel start
                            $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_id='".$supplier_info['supplier_id']."' ");
                            $total_flight_footprint_arr = $query->getResultArray();
                            $data['tot_flight_footprint'] = 0;
                            if($total_flight_footprint_arr) {
                                $data['tot_flight_footprint'] = $total_flight_footprint_arr[0]['tot'];
                            }
                            
                        
                            $total_top_stage_footprint = 0;
                     if($data['ghg']) {
                                foreach($data['ghg'] as $ghg) {
                                    $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from ghg_assessment where supplier_id='".$supplier_info['supplier_id']."' ")->getResultArray();
                                    if($top_ghg_estimate_arr) {
                                        if($top_ghg_estimate_arr[0]['mest']) {
                                            $total_top_stage_footprint = $total_top_stage_footprint + $top_ghg_estimate_arr[0]['mest'];
                                        }
                                    }
                                }
                            }
                     $supp_assess20 = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and is_submit=1  order by id desc")->getRowArray();
                            $data['supp_assess20'] = $supp_assess20;
                      if($data['ghg']) {
                                foreach($data['ghg'] as $ghg) {
                                    $max_est_arr = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_id=".$supplier_info['supplier_id']."")->getResultArray();
                                    // echo $db->getlastquery($max_est_arr);
                                    //         die();
                                    if($max_est_arr) {
                                        if($max_est_arr[0]['mest']) {
                                            $fact_name_arr=$db->query("select gf.name,f.factor_name,gc.ghg_category_name from ghg_factor as gf join factor as f on gf.name=f.id join ghg_category as gc on gc.id=gf.ghg_category_id where gf.id='".$max_est_arr[0]['factor_id']."'||f.id='".$max_est_arr[0]['factor_id']."'")->getResultArray();
                                            
                                            // echo $db->getlastquery($fact_name_arr);
                                            // die();
                                            $fact_name = "";
                                            $ghg_cat_name = "";
                                            if($fact_name_arr) {
                                                $fact_name = $fact_name_arr[0]['factor_name'];
                                                $ghg_cat_name = $fact_name_arr[0]['ghg_category_name'];
                                            }
                                            $temp = [];
                                            $temp['value'] = number_format(( $ghg['w']),3,".","");
                                            // $temp['ghg_name'] = $ghg['ghg_name'];
                                            // $temp['factor_name'] = $fact_name;
                                            $temp['ghg_category_name'] = $ghg['gc'];;
                                            $top_in_each_stage[] = $temp;
                                        }
                                        
                                        
                                    }
                                }
                            }
                            
                    // print_r($top_in_each_stage);$top_in_each_stage[0]['ghg_category_name']
                            // print_r($temp);
                     if($data['ghg']) {
                            foreach($data['ghg'] as $g) {
                                if($g['ghg_name']!="Welcome") {                
                        $foot_per = 0;
                      
                    if($data['supp_assess20']['is_submit']==1) {
                    if($data['supp_assess20']['total_footprint']==0){
                        $data['supp_assess20']['total_footprint']=1;
                        
                    }
                          
                                $ghg_name[] = $g['ghg_name'];
                                $ghg_val[] = number_format((($data['tot_flight_footprint']*100)/$data['supp_assess20']['total_footprint']),3,",",".");
                     }
                                }
                            }
                        }
                        
                        
                    //  $data['ghg_name'] = $ghg_name;
                    //         $data['per'] = $ghg_val;
                            // echo '<pre>';
                        $ghg_name2=[];
                        $ghg_val3=[];
                        // print_r($top_in_each_stage[1]['value']);
                        if(!empty($top_in_each_stage)){
                            
                                                     if($top_in_each_stage[0]['ghg_category_name']!=="scope 1"){
                                                       $ghg_name2[]=array("scope 11");;
                                                        
                                                    }else{
                                                    $ghg_name2[]=$top_in_each_stage[0]['ghg_category_name'];
                                                    }
                                                         if(empty($top_in_each_stage[1]['ghg_category_name'])){
                                                           $ghg_name2[]=array("scope 22");
                                                            
                                                        }else{
                                                         $ghg_name2[]=$top_in_each_stage[1]['ghg_category_name'];
                                                        }
                                                             if(empty($top_in_each_stage[2]['ghg_category_name'])){
                                                                //  print_r($top_in_each_stage[2]['ghg_category_name']);
                                                                //  die();
                                                               $ghg_name2[]=array("scope 2");
                                                                
                                                            }else{
                                                            $ghg_name2[]=$top_in_each_stage[2]['ghg_category_name'];
                                                            }
                                                                            if(empty($top_in_each_stage[0]['value'])){
                                                                                $ghg_val3[]="0457";
                                                                                
                                                                            }else{
                                                                            $ghg_val3[]=$top_in_each_stage[0]['value'];
                                                                            
                                                                            }
                                                                                if(empty($top_in_each_stage[1]['value'])){
                                                                                    $ghg_val3[]="0";
                                                                                    
                                                                                }else{
                                                                                
                                                                                $ghg_val3[]=$top_in_each_stage[1]['value'];
                                                                                }
                                                                                    if(empty($top_in_each_stage[2]['value'])){
                                                                                         $ghg_val3[]="0";
                                                                                        
                                                                                    }else{
                                                                                    $ghg_val3[]=$top_in_each_stage[2]['value'];
                                                                                    }
                        $data['ghg_max']=round(max($ghg_val3));
                            $m=max($ghg_val3);
                            $mx=$m/8;
                        }else{
                            $ghg_name2[]=("scope 01");
                            $ghg_val3[]=array("0");
                             $ghg_name2[]=("scope 02");
                            $ghg_val3[]=array("0");
                             $ghg_name2[]=("scope 03");
                            $ghg_val3[]=array("0");
                            $data['ghg_max']=round(500.00);
                            $mx=1000/10;
                            $data['ghg_interval']= round($mx);
                        }
                        if(empty($ghg_val3[0] and $ghg_name2[0])==""){
                            // $ghg_name2[]=("scope 1.0");
                            $ghg_val3[]=("0");
                        }
                        if(empty($ghg_val3[1]) and empty($ghg_name2[1])){
                            $ghg_name2[]=("scope 2.0");
                            $ghg_val3[]=array("0");
                        }
                        if(empty($ghg_val3[2])and empty($ghg_name2[2])){
                            $ghg_name2[]=array("scope 3.0");
                            $ghg_val3[]=("0");
                        }
                            // print_r($ghg_val3);
                            // die();
                        $data['ghg_interval']= round($mx);
                        $data['ghg_valuedash'] =[];
                        $data['ghg_namedas'] = json_encode($ghg_name2);
                        $data['ghg_valuedash'] = json_encode($ghg_val3);
                        $query = $db->query("SELECT * FROM supplier_assessment where status=0 and is_submit = 1");
                        $data['site'] = $query->getResultArray();
                        $query = $db->query("SELECT * FROM ghg_category where status=1 ");
                        $data['scope'] = $query->getResultArray();
                        $data['issue'] =   $db->query("SELECT * FROM issues where status=1 ")->getResultArray();;
                         $a = new SupplierModel();
                         $footprint = new QuantitativeFootprintAnswerModel();
                        $session = session();
                         $supplier_info = $session->get('supplier_info');
                         $o_id = $supplier_info['supplier_id'];
                         $data['role'] = $supplier_info['role'];
                        $emision = $footprint->where('owner_id',$o_id)->first();
                        if($emision){
                            $countemp = $emision['emision'];
                        }else{
                            $countemp=0;
                        }
                          $dat = $a->where('owner_id',$o_id)->where(["role !=" => 10])->countAllResults();
                        //   print_r($dat);
                        //   die();
                        if($dat==0){$dat=1;}
                         $data['allemployemana'] = $a->where('owner_id',$o_id)->where('role',11)->orwhere('role',12)->countAllResults();
                         $data['allemploy'] = $a->where('owner_id',$o_id)->where('role',12)->countAllResults();
                         // print_r($data);
                         // die();
                        $data['total_emision']  = $countemp / $dat;
                        $action = new ActionCenterModel();
                        $data['allaction'] = $action->where('status',1)->countAllResults();
                        $issue = new Toolissue();
                        // $data['ggg'] = $issue->where('status',1)->countAllResults();
                        $aaa = new TimelineActionCenterModel();
                            // $db = \Config\Database::connect();
                               $month = date('F d Y');
                         
                         $country_fetc = $a->where('id', $o_id)->first();
$turnover = $country_fetc['turnover'];

$country_id = $country_fetc['country_id'];

 $country_model =  $db->query("SELECT * FROM countries where id=$country_id")->getResultArray();
foreach($country_model as $id){

   $emp = $id['emission_factor'];
}
 
if(empty($turnover)){
$data['total_emp'] =0;

}
elseif(empty($emp)){
$data['total_emp'] =0;

}else{
$data['total_emp'] =$emp/$turnover;
    
}
                          
                $date =  Time::parse($month);
                $start_date = $date->format('Y-m-d G:i:s'); 
                $v =   $date->modify('last day of this month')->setTime(23,59,59);
                $end_date = $date->format('Y-m-d G:i:s');
                $data['emision_aa'] = $footprint->where('updated_at >=', $start_date)->where('updated_at <=', $end_date)->countAllResults();
                // Action Tracker Code start
                $action=$this->request->getVar('action_tracker');
                
                if(!$action==''){
                    $action= new ActionCenterModel();
                    $to_date = $this->request->getVar('to_date');
                    $from_date = $this->request->getVar('from_date');
                    // print_r($to_date);
                    // die();
                    
                    
                    $inprogress_bar = $action->where('status',1)->findAll();
                    foreach($inprogress_bar as $inp_bar){
                       $inb = $db->query("SELECT tac.id as tot ,tac.status FROM timeline_action_center as tac join action_center as ac on ac.id=tac.action_center_id  where ac.created_at >='".$from_date."' and tac.action_center_id='".$inp_bar['id']."' and tac.status=2 and  ac.created_at <= '".$to_date."' order by tac.id DESC LIMIT 1")->getResultArray();
                       print_r($inb);
                    if(!empty($inb)){
                        if($inb[0]['status']=2){
                            $process[]=$inb[0]['tot'];
                        }
                        if($inb[0]['status']=1){
                            $pend[]=$inb[0]['tot'];
                        }
                       
                        // print_r($process);
                    }
                    
                        
                    }
                    if(empty($process)){
                        $in_progress=0;
                    }else{
                     $in_progress=count($process);
                    }
                    // $pending=count($pend);
                     $data['in_progress']=$in_progress;
                       
                    $a = $db->query("SELECT count(id)  as tot FROM `action_center` WHERE created_at >='".$from_date."' AND ( status= 1 || status= 4) AND  created_at <= '".$to_date."' AND supplier_id = '".$o_id."'")->getResultArray();
                    $c = $db->query("SELECT count(id)  as tot FROM `action_center` WHERE created_at >='".$from_date."' AND ( status= 4) AND  created_at <= '".$to_date."'AND supplier_id = '".$o_id."'")->getResultArray();
                    $p = $db->query("SELECT count(id)  as tot FROM `action_center` WHERE created_at >='".$from_date."' AND ( status= 1) AND  created_at <= '".$to_date."'AND supplier_id = '".$o_id."'")->getResultArray();
                    $data['without_allaction']=$a[0]['tot'];
                    // print_r($data['without_allaction']);
                    // die();
                    if($a[0]['tot']==0){  
                        $data['allaction']='1';}
                        else{$data['allaction']=$a[0]['tot'];
                    }
                    $data['complete']=$c[0]['tot'];
                    $data['pending']=$p[0]['tot'];
                    // print_r($data['complete']);
                    // die();
                    // $data['allaction'] = $action->where('status',1)->orwhere('status',4)->countAllResults();
                    // $data['pending'] = $action->where('status',1)->countAllResults();
                    // $data['complete'] = $action->where('status',4)->countAllResults();
                }
                else
                {    

                    $action= new ActionCenterModel();
                   
            $data['without_allaction'] = $action->where('status',1)->where('supplier_id',$o_id)->orwhere('status',4)->where('supplier_id',$o_id)->countAllResults();
                           
            $data['without_allaction'] = $action->where('status',1)->where('supplier_id',$o_id)->orwhere('status',4)->where('supplier_id',$o_id)->countAllResults();
                    $data['pending'] = $action->where('status',1)->where('supplier_id',$o_id)->countAllResults();
                    $data['complete'] = $action->where('status',4)->where('supplier_id',$o_id)->countAllResults();
                    if(empty($process)){
                        $in_progress=0;
                    }else{
                     $in_progress=count($process);
                    }
                    // $pending=count($pend);
                     $data['in_progress']=$in_progress;
                }
                        
        $issue = new Toolissue();

      $data['i'] = $issue->where('user_id',$o_id)->where('issue_type',3)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();
      $data['iv'] = $data['i']*10;


      $data['o'] = $issue->where('user_id',$o_id)->where('issue_type',1)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();
      $data['ov'] = $data['o']*10;


   $data['m'] = $issue->where('user_id',$o_id)->where('issue_type',2)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();

   $data['mv'] = $data['m']*10;

   $data['n'] = $issue->where('user_id',$o_id)->where('issue_type',4)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();

   $data['nv'] = $data['n']*10;

   $data['h'] = $issue->where('user_id',$o_id)->where('issue_type',5)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();

   $data['hv'] = $data['h']*10;
   // print_r($data['hv']);
   // die();

   $data['ot'] = $issue->where('user_id',$o_id)->where('issue_type',6)->orwhere('status',1)->where('user_id',$o_id)->countAllResults();

   $data['ovv'] = $data['ot']*10;
                 $issue_date=$this->request->getVar('issue');
                
              if(!$issue_date == ''){
                  $issue = new Toolissue();
                  $issu_from = $this->request->getVar('issue_from');
                  $issu_to = $this->request->getVar('issue_to');

$all = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."'
 AND ( status = 1) AND create_on <= '".$issu_to."' AND user_id = '".$o_id."'")->getResultArray();

// print_r($all);
// die();
$in = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 3) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();
$oser = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 1) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();
$maint = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 2) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();
$haz = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 5) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();
$nere = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 4) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();
$other = $db->query("SELECT count(id)  as tot FROM `tool_issue` WHERE create_on >='".$issu_from."' AND ( status = 1) AND (issue_type = 6) AND create_on <= '".$issu_to."'AND user_id = '".$o_id."'")->getResultArray();


                    // $data['ggg']=$all[0]['tot'];
                    if($all[0]['tot']==0){  
                        $data['ggg']='0';

                      $data['ggg']=$all[0]['tot'];
                $data['i']=$in[0]['tot'];
                $data['o']=$oser[0]['tot'];
                $data['h']=$haz[0]['tot'];
                $data['m']=$maint[0]['tot'];
                $data['n']=$nere[0]['tot'];
                $data['ot']=$other[0]['tot'];

             $data['iv'] = $data['i']*10;
             $data['ov'] = $data['o']*10;
             $data['mv'] = $data['m']*10;
             $data['nv'] = $data['n']*10;
             $data['hv'] = $data['h']*10;
             $data['ovv'] = $data['ot']*10;  
                    }
                else{
                $data['ggg']=$all[0]['tot'];
                $data['i']=$in[0]['tot'];
                $data['o']=$oser[0]['tot'];
                $data['h']=$haz[0]['tot'];
                $data['m']=$maint[0]['tot'];
                $data['n']=$nere[0]['tot'];
                $data['ot']=$other[0]['tot'];

            $data['iv'] = $data['i']*10;
             $data['ov'] = $data['o']*10;
   $data['mv'] = $data['m']*10;
   $data['nv'] = $data['n']*10;
   $data['hv'] = $data['h']*10;
   $data['ovv'] = $data['ot']*10;


                    } 

                    }
                    else{

                         // print_r('ttt');
                        $issue = new Toolissue();
                        $data['ggg'] = $issue->where('status',1)->where('user_id',$o_id)->countAllResults();


                    } 


               echo view('brand/dashboard',$data);
        
    
}

}