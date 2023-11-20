<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BrandModel;
use App\Models\OnSiteModel;
use App\Models\SupplierModel;

use App\Models\ActionCenterModel;
use App\Models\BrandQualitativeAnswerModel;
use App\Models\Assessment;

use App\Models\SupplierType;
use App\Models\Qualitative_assessment_step;


class OnSite extends BaseController
{
    // private $helperData = array();
    private $u_id;
    private $o_id;
    private $db;
    // private $sp_info;
    private $sp_model;
    public function __construct()
    {
        // parent::__construct();
        $this->sp_model = new SupplierModel();

        helper(['form', 'url', 'html', 'menu']);
        // $supplier_model = new SupplierModel();
        // $this->helperData = commonData();

        $this->db = \Config\Database::connect();
        $sp_info = session()->supplier_info;
        if ($sp_info['role'] == 0) {
            $o_id = $u_id = $sp_info['supplier_id'];
        } else {
            $u_id = $sp_info['supplier_id'];
            $o_id = $this->sp_model->where('id', $u_id)->first()['owner_id'];
        }
        $this->o_id = $o_id;
        $this->u_id = $u_id;
    }
    public function index()
    {
        if (!check_session()) return redirect()->to('home/user_login');
        $brand = new BrandModel();
        $SupplierType = new SupplierType();
        $onsite_model = new OnSiteModel();
        $db = $this->db;
        $data = SidebarData();
        $ok = $this->sp_model->where('id', $this->u_id)->first();

        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = $ok['role'];
        }
        $data['pg_nm'] = 'OnSite';
        $data['boundary_item'] = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ")->getResultArray();
        $data['sub_boundary_item'] = $db->query("select id,cp_name from supplier_assessment where is_submit=1")->getResultArray();
        $data['indicator'] = $db->query("SELECT * from indicator where status = 1")->getResultArray();
        // $data['employee_details'] = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ")->getResultArray();
        $data['employee_details'] = $this->sp_model->where('owner_id', $this->u_id)->where('role', 15)->findAll();

        $data['supplier'] = $this->sp_model->select('id,supplier_name,role')->where("owner_id=$this->o_id")->findAll();
        // print_r($data['supplier']);
        // die;
        $data['suppliersType'] = $SupplierType->where('status', 1)->where('owner_id', $this->o_id)->findAll();
        if ($role == 15) {
            $data['list'] = $onsite_model->where('status', 1)->where('assigned_to', $this->u_id)->orderBy('id', 'desc')->findAll();
        } else {
            $where = '(supplier_id =' . $this->u_id . ' or assigned_to = ' . $this->u_id . ')';
            $data['list'] = $onsite_model->where('status', 1)->where($where)->orderBy('id', 'desc')->findAll();
        }
        $data['role'] = $role;
        // print_r($data['list']);
        // die;

        $data['supplier_type'] = $SupplierType->select('footprint_type.id,type_name,name')->join('footprint_type', 'footprint_type.id=supplier_type.supplier_type')->where('owner_id', $this->u_id)->groupby('supplier_type')->findAll();


        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();
        return view('brand/view-sites', $data);
    }
    public function Delete()
    {
        $model = new OnSiteModel();
        $model->update($this->request->getPost('id'), ['status' => 0]);
        return redirect()->back()->with('success', "OnSite Deleted Successfully");
    }
    public function create()
    {
        $model = new OnSiteModel();
        $onsite = $this->request->getPost('onsite');
        if (!($supplier = $this->request->getPost('supplier'))) $supplier = $this->request->getPost('supplier1');
        $data = [
            'supplier_id' => $this->u_id,
            'owner_id' => $this->o_id,
            'onsite' => $onsite,
            'supplier' => $supplier,
            'assessment' => $this->request->getPost('assessment'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'comment' => $this->request->getPost('comment'),
            'due_date' => $this->request->getPost('due_date'),
            'priority' => $this->request->getPost('priority'),
        ];
        $model->insert($data);
        return redirect()->back()->with('success', "OnSite Added Successfully");
    }
    public function completesupplier()
    {
        $db = $this->db;;
        if ($singlename = $this->request->getVar('singledata')) {
            $data =  $db->query("SELECT * FROM `control_assessment` WHERE addsupplier_id=$singlename and status=1 and overall_submit=1")->getResultArray();
        } else if ($tier = $this->request->getVar('multidata')) {
            $data =  $db->query("SELECT * FROM `control_assessment` WHERE sub_boundary=$tier and status=1 and overall_submit=1")->getResultArray();
        }
        $option = '<option value="">Select From list</option>';
        foreach ($data as $datauniq) {
            $option .= '<option value="' . $datauniq['uniq_spl'] . '">' . $datauniq['uniq_spl'] . '</option>';
        }
        echo $option;
    }
    public function assessmentreport_check($id)
    {

        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data = SidebarData();
        $data['pg_nm'] = 'OnSite';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $s_id = $u_id = $supplier_info['supplier_id'];
        $data['s_name'] = $supplier_info['supplier_name'];
        $supplier_model = new SupplierModel();
        $onsite_model = new OnSiteModel();
        $Qualitative_assessment_step =  new Qualitative_assessment_step();
        if ($supplier_info['role'] == 0) $o_id = $u_id;
        else $o_id = $supplier_model->where('id', $u_id)->first()['owner_id'];
        $com = 1;
        $ass_uniq = $onsite_model->where('id', $id)->first()['assessment'];
        $roit = $db->query("SELECT * FROM `control_assessment` where uniq_spl='$ass_uniq'")->getResultArray()[0]['id'];
        $data['com'] = $com;
        $control_assessment = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.id=$roit")->getResultArray();
        $weitage_per = json_decode($control_assessment[0]['weightage_per']);
        $indi_Environment =  $indi_Social =  $indi_Governance = 0;

        $percentile  = 0;
        $counter = 0;

        foreach ($weitage_per as $keys => $weitage) {

            $counter++;
            $total_mark = $marka = [];
            $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array ,  bqa.indicator_id AS indicator ,amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=2 and aaq.status = 1 AND bqa.control_assesment_id= $roit AND bqa.indicator_id= $keys ")->getResultArray();
            foreach ($query_total_Marks as $first => $firsts) {
                $submited_answer = json_decode($firsts['submited_array']);
                $marks_array = json_decode($firsts['marks_aray']);
                $answer_array = $firsts['answer_array'];
                $choice = $firsts['choice'];
                if (($choice == 'Single' && $answer_array == 'Text') || $answer_array == "Date and Time" || $answer_array == "Media upload" || $answer_array == "Numbers") {
                    $total_mark[] = 1;
                    continue;
                } else if ($choice == 'Single') $b = array($answer_array);

                else $b = json_decode($answer_array);

                if (is_array($submited_answer)) {
                    $sybmited_answer = $submited_answer;
                    foreach ($b as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answer)) {
                            $r = count($sybmited_answer);
                            $marka[]  = $marks_array[$key];
                        }
                    }
                    $sybmited_answer = [];
                    $total_mark[] = array_sum($marka) / $r;
                } else {
                    $sybmited_answerH = [$submited_answer];
                    foreach ($b as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answerH)) {
                            $r = count($sybmited_answerH);
                            $total_mark[] = $marks_array[$key] / $r;
                            $sybmited_answerH = [];
                        }
                    }
                }
            }

            $percentile += $test = (array_sum($total_mark) / sizeof($query_total_Marks)) * $weitage;
            $test = number_format($test, 2);
            if ($keys == 8) {
                $indi_Environment = $test;
            } else if ($keys == 9) {
                $indi_Social = $test;
            } else if ($keys == 11) {
                $indi_Governance = $test;
            }
        }
        $total_count = $counter;
        $data['graph_val'] = ["Environment" => $indi_Environment / $total_count, "Social" => $indi_Social / $total_count, "Governance" => $indi_Governance / $total_count,];
        $data['percentile1'] = $percentile;
        $data['individual'] = ["indi_Environment" => $indi_Environment, "indi_Social" => $indi_Social, "indi_Governance" => $indi_Governance,];
        $data['control_assessment'] = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.id=$roit")->getResultArray();
        $insert = new BrandQualitativeAnswerModel();
        $data['assessmentreport_data'] = $insert->where('control_assesment_id', $roit)->orderby('indicator_id')->findAll();
        $question_total = $insert->where('control_assesment_id', $roit)->where('status', 2)->findAll();
        $data['Total_ques']   = count($question_total);
        $db = \Config\Database::connect();
        $data['iv'] = $insert->select('*')
            ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id')
            ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('action_center.status', !0)->findAll();
        $data['yyyyy'] = $insert->select('action_center.title')

            ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id')
            ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('brand_qualitative_answer.supplier_id', $s_id)->where('action_center.status', !0)->countAllResults();

        $data['rohit'] = $db->query("SELECT ed.* FROM `all_assessment_question` as ed  where ed.status=1")->getResultArray();

        $data['control_ass'] = $contrrlid = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = $roit")->getResultArray();
        $data['indica'] =  $db->query("SELECT ed.* FROM `indicator` as ed  where ed.status=1")->getResultArray();
        $data['action'] =  $db->query("SELECT ed.* FROM `action_center` as ed ")->getResultArray();
        $boundaryid =   $contrrlid[0]['boundary'];
        // $sub_boundaryid =  $contrrlid[0]['sub_boundary'];
        $assign =  $contrrlid[0]['assigned_to'];
        // $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        // $boundary_item = $query->getResultArray();
        if ($boundaryid == '30') {
            $data['assessm'] = $db->query("SELECT * FROM  supplier_assessment where is_submit=1 AND assessment_id=12")->getResultArray();
            $data['boundryname'] = 'Site';
        } elseif ($boundaryid == '31') {
            $data['assessm'] = $db->query("SELECT * FROM  supplier_assessment where is_submit=1 AND assessment_id=11")->getResultArray();
            $data['boundryname'] = 'Products';
        } elseif ($boundaryid == '43') {
            $data['assessm1'] = $db->query("SELECT * FROM  footprint_type  where status=1")->getResultArray();
            $ssd = $db->query("SELECT * FROM  supplier  where id=$assign")->getResultArray();
            $k = $ssd[0]['email'];
            $data['loction'] = $db->query("SELECT * FROM supplier_type where status=1 AND email='$k'")->getResultArray();


            $data['boundryname'] = 'Supplier';
        } else {
            $data['assessm12'] = [];
        }

        $data['lll'] =  $db->query("SELECT * FROM `all_master_assessment_answer` where status=1 AND id=56")->getResultArray();
        $data['ind'] = $db->query("SELECT * FROM  indicator where status=1")->getResultArray();
        $v = new ActionCenterModel();
        $data['actio'] = $v->where('owner_id', $s_id)->where('assign_from', 'Qualitative')->countAllResults();
        $assess = new Assessment();
        $data['assessment'] = $assess->where('status', 1)->findAll();

        $data['id'] = $roit;
        $supplier = new SupplierModel();
        $data['inspected'] = $supplier->findAll();
        $SupplierType = new SupplierType();
        $user_email = $supplier_info['email'];


        $typeid = $data['control_ass'][0]['addsupplier_id'];
        $supplier_email = $SupplierType->where('id', $typeid)->first()['email'];
        if ($supplier_email == $user_email) {
            $data['nextbtn'] = 1;
        } else {
            $data['nextbtn'] = 0;
        }

        echo view('brand/onsite_assessmentreport_check', $data);
    }
    public function assessment_report_insert()
    {
        $ass_ids = $this->request->getPost('ass_ids');
        $input_text = $this->request->getPost('input_text');
        $checkboxes = $this->request->getPost('checkboxes');
        $remark = $this->request->getPost('remark');
        $brand_model = new BrandQualitativeAnswerModel();
        foreach ($ass_ids as $key => $value) {
            if ($key == 0) $brand_model->update($value, ['onsite_comment' => $input_text[$key], 'onsite_checked' => $checkboxes[$key], 'remark' => $remark]);
            else $brand_model->update($value, ['onsite_comment' => $input_text[$key], 'onsite_checked' => $checkboxes[$key]]);
        }
        return redirect()->to('OnSite');
        // return redirect()->back()->with('success', 'Data saved successfully');
    }
}
