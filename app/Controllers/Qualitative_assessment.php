<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\BrandModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\UserNotification;
use App\Models\Assessment;
use App\Models\SupplierModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\FootprintTypeModel;
use App\Models\SupplierType;
use App\Models\AdvancedAssessment;
use App\Models\QualitativeAssessment;
use App\Models\DocumentModel;
use App\Models\QualitativeSubmitAnswerModel;
use App\Models\QualitativeAssessmentComplete;




class Qualitative_assessment extends BaseController
{
    private $helperData = array();
    public function __construct()
    {
        helper(['form', 'url', 'html', 'menu']);
        $session = \Config\Services::session();
        $this->helperData = commonData();
    }
    public function assessment()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = "Qualitative ";
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $assessment = new Assessment();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];
        $supplier_mod_item = [];
        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {
                $supplier_mod[] = $smir["supplier_module_id"];
                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();
        $query = $db->query("SELECT gh.* FROM `ghg` as gh where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) $role = 10;
        else $role = $ok['role'];

        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $sid = session()->supplier_info['supplier_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from qualitative_assessment where (assigned_to =$sid or owner_id='" . $o_id . "')and status=1 and num_show=0")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from qualitative_assessment where complete !=0 and owner_id='" . $o_id . "' and status=1 and num_show=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from qualitative_assessment where owner_id='" . $o_id . "'and status=1 and and num_show=0 ")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from qualitative_assessment where owner_id='" . $o_id . "'and status=1 and complete!=0 and num_show=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from qualitative_assessment where owner_id='" . $o_id . "' and status=1 and num_show=0 and ( assigned_to = $sid or supplier_id = $sid ) ")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from qualitative_assessment where owner_id='" . $o_id . "' and status=1 and complete!=0 and ( assigned_to = $sid or supplier_id = $sid ) and num_show=1")->getResultArray();

            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }

        $data['assessment'] = $assessment->findAll();
        $find = $db->query("SELECT * from qualitative_assessment where status = 1 and owner_id = $o_id")->getResultArray();
        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day = abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE qualitative_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day = abs(round($diff / 86400));
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE qualitative_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day = abs(round($diff / 86400));
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE qualitative_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day = abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE qualitative_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
        }
        if (session()->supplier_info['role'] == 0) {
            $assQue = $db->query("SELECT * FROM `qualitative_assessment` WHERE (owner_id = $o_id) AND status=1 AND (num_show=0 OR complete=12)")->getResultArray();
            $query = $db->query("SELECT * FROM `qualitative_assessment` WHERE owner_id = $o_id AND status=1 ")->getResultArray();
        } else {
            $assQue = $db->query("SELECT * FROM `qualitative_assessment` WHERE (supplier_id=$sid OR assigned_to=$sid) AND status=1 AND (num_show=0 OR complete=12)")->getResultArray();
            $query = $db->query("SELECT * FROM `qualitative_assessment` WHERE (supplier_id=$sid OR assigned_to=$sid) AND status=1 ")->getResultArray();
        }
        $queCount = $totalQue = 0;
        foreach ($assQue as $frq) {
            if ($frq['frequency'] == 'Monthly') {
                $queCount = 12;
            } else if ($frq['frequency'] == 'Quarterly') {
                $queCount = 4;
            } else if ($frq['frequency'] == 'Half yearly') {
                $queCount = 2;
            } else if ($frq['frequency'] == 'Yearly') {
                $queCount = 1;
            }
            $totalQue += $queCount;
        }
        $data['total_assessment'] = $totalQue; //safal code
        $successCount = 0;
        $failCount = 0;
        $caArr = [];
        foreach ($query as $qd) {
            $caArr[] = $qd['id'];
        }
        $passfailData = $db->query("SELECT * FROM `qualitative_assessment_complete` WHERE status=1 ")->getResultArray();
        foreach ($passfailData as $pdDAta) {
            if (in_array($pdDAta['control_assessment_id'], $caArr)) {
                if ($pdDAta['percentile'] >= 50) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }
        }

        $data['pfSuccess'] = $successCount;
        $data['pfFail'] = $failCount;


        $data['supplier'] = $supplier_model->findAll();



        $add_ass_model = new AdvancedAssessment();
        $data['assessment_name'] = $add_ass_model->where('status', 1)->findAll();

        foreach ($pending_notify as $key => $value) {
            $pending_notify[$key]['assessment_name'] = $add_ass_model->where('id', $value['indicator'])->first()['assessment_name'];
            $ass_data = $supplier_model->where('id', $value['assigned_to'])->first();
            $pending_notify[$key]['assigned_to_name'] = $ass_data['supplier_name'];
            $pending_notify[$key]['assigned_to_image'] = $ass_data['image'];
            $pending_notify[$key]['role'] = $ass_data['image'];
            if ($ass_data['role'] == 10) $adc = "Admin";
            elseif ($ass_data['role'] == 11) $adc = "Manager";
            elseif ($ass_data['role'] == 0) $adc = "Admin";
            elseif ($ass_data['role'] == 12) $adc = "Employee";
            $pending_notify[$key]['role_name'] = $adc;
        }

        $data['control_assessment_pending'] = $pending_notify;

        echo view('brand/view-qualitative-assessment', $data);
    }



    public function delete_assessment()
    {
        $model = new QualitativeAssessment();

        $model->update($this->request->getPost('del_assessment'), ['status' => 0]);
        return redirect()->back();
    }
    public function start_assessment($main_id, $ass_id)
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = "Qualitative ";

        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $answer = new QualitativeSubmitAnswerModel();
        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];
        $supplier_mod_item = [];
        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {
                $supplier_mod[] = $smir["supplier_module_id"];
                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();
        $data['indicator_category'] = $db->query("SELECT * from indicator_category where status = 1")->getResultArray();
        $data['indicator'] = $db->query("SELECT * from indicator where status = 1")->getResultArray();
        $data['total_Ans'] = '1';

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }

        $AdvancedAssessment = new AdvancedAssessment();
        $data['assessment_title'] = $AdvancedAssessment->where('id', $ass_id)->where('status', 1)->first();
        $data['employee_details'] = [];
        // $assessment_ = new Qualitative_assessment_step();
        // $site_id = '30';
        $data['a_q'] =
            $db->query("select alq.id,alq.remark,alq.is_document_needed,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,amaa.marks,amaa.answer as multi_answer from all_advance_assessment_question as alq join all_master_assessment_answer as amaa on alq.answer=amaa.id where alq.status=1 and alq.all_assessment_id=" . $ass_id)->getResultArray();
        // print_r($data['a_q']);
        // die;

        // $data['a_q'] = $db->query(
        // "SELECT ind.id,ind.remark,ind.is_document_needed,ind.question_title,ind.question,ind.choice,ind.answer,amaa.answeroption,amaa.marks,indi.indicator_category_name,amaa.answer as multi_answer 
        // from Qualitative_assessment_step AS alq 
        // JOIN all_assessment_question AS ind ON ind.id= alq.select_question_id 
        // JOIN all_master_assessment_answer AS amaa ON alq.question_id = amaa.id 
        // JOIN assessment as ass ON ind.all_assessment_id=ass.id
        // JOIN indicator_category AS indi ON indi.id= alq.indicator_id where alq.status = 1 AND ass.status=1 AND amaa.status = 1 AND ind.status = 1 AND alq.control_assessment_id = $main_id AND alq.indicator_id=$i_id"
        // )->getResultArray();
        $data['id'] = $main_id;
        $data['a_id'] = $ass_id;
        $data['total_Q'] = count($data['a_q']);
        $data['qu_an'] = $answer->where('owner_id', $o_id)->where('qualitative_assesment_id', $main_id)->where('status', 1)->findAll();
        $is_submit = array();
        foreach ($data['qu_an'] as $key => $value) $is_submit[] = $value['question_id'];
        $data['is_submit'] = $is_submit;
        $documentmodel = new DocumentModel();
        $data['document'] = $documentmodel->where('supplier_id', $o_id)->where('status', 1)->findAll();

        // $data['start_assessment'] = $db->query("SELECT COUNT(alq.indicator_id) as total_Q,alq.* from Qualitative_assessment_step as alq where alq.status=1 and alq.control_assessment_id = $a_id GROUP BY indicator_id ")->getResultArray();
        // usort($data['start_assessment'], fn ($a, $b) => $a['indicator_id'] <=> $b['indicator_id']);
        // print_r($data['start_assessment']);
        // die;
        $data['answer_t'] = $answer->where('owner_id', $o_id)->where('status', 1)->findAll();

        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM `all_advance_assessment_question` AS aaq JOIN qualitative_submit_answer AS bqa ON bqa.question_id = aaq.id WHERE bqa.qualitative_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 ")->getResultArray();
        $data['total_A'] = $query_total_A[0]['total_A'];

        $data['mandatory'] = $db->query("SELECT COUNT(*) as total_m FROM `all_advance_assessment_question` WHERE all_assessment_id =$ass_id AND is_mandatory_needed = 1")->getResultArray();

        $data['mand'] = $data['mandatory'][0]['total_m'];

        $data['ans_mand'] = $db->query("SELECT COUNT(*) as total_m_a FROM `all_advance_assessment_question` as a JOIN `qualitative_submit_answer` as b on a.id=b.question_id WHERE a.all_assessment_id =$ass_id AND is_mandatory_needed = 1")->getResultArray();

        $data['mand_ans'] = $data['ans_mand'][0]['total_m_a'];
        $data['id'] = $main_id;

        // $data['answer_count'] = $db->query("SELECT COUNT(alq.indicator_id) as total_a, bqa.indicator_id from Qualitative_assessment_step as alq JOIN brand_qualitative_answer as bqa on alq.select_question_id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = $main_id and alq.status=1 and alq.control_assessment_id = $a_id GROUP BY indicator_id")->getResultArray();

        $total_mark = [];
        $query_total_Marks = $db->query("SELECT bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM `all_advance_assessment_question` AS aaq JOIN qualitative_submit_answer AS bqa ON bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.qualitative_assesment_id= $main_id ")->getResultArray();
        foreach ($query_total_Marks as $first => $firsts) {
            $submited_answer = json_decode($firsts['submited_array']);
            $marks_array = json_decode($firsts['marks_aray']);
            $answer_array = $firsts['answer_array'];
            $choice = $firsts['choice'];
            if ($choice == 'Single') {
                $b = array($answer_array);
            } else {
                $b = json_decode($answer_array);
            }
            if (is_array($submited_answer) == 1) {
                $sybmited_answer = $submited_answer;
                foreach ($b as $key => $ans_arry) {
                    if (in_array($ans_arry, $sybmited_answer)) {
                        $r = count($sybmited_answer);
                        $marka[] = $marks_array[$key];
                        $sybmited_answer = [];
                    }
                }
                $divide = array_sum($marka) / $r;
                array_push($total_mark, $divide);
            } else {
                $sybmited_answerH[] = $submited_answer;
                foreach ($b as $key => $ans_arry) {
                    if (in_array($ans_arry, $sybmited_answerH)) {
                        $r = count($sybmited_answerH);
                        array_push($total_mark, ($marks_array[$key] / $r));
                        $sybmited_answerH = [];
                    }
                }
            }
        }
        $totalsubmited = count($data['a_q']);
        if ($totalsubmited == 0) {
            $totalsubmited = 1;
        }
        $percentile1 = ($data['total_A'] / $totalsubmited) * 100;
        $percentile = number_format(($percentile1), 2);
        $data['percentile1'] = $percentile;
        // print_r($data['percentile1']);
        // die;
        echo view('brand/view-qualitative-question', $data);
    }


    public function report_view($id)
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = "Qualitative ";

        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $s_id = $supplier_info['supplier_id'];
        $data['s_name'] = $supplier_info['supplier_name'];

        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];
        $supplier_mod_item = [];
        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {
                $supplier_mod[] = $smir["supplier_module_id"];
                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();


        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $data['assessment-Ques-ans'] =
            $insert = new QualitativeSubmitAnswerModel();
        $data['assessm'] = [];
        $supplier = new SupplierModel();
        $data['inspected'] = $supplier->findAll();
        $data['assessmentreport_data'] = $insert->where('qualitative_assesment_id', $id)->findAll();
        $data['control_assessment'] = $boundry = $db->query("SELECT ed.* FROM `qualitative_assessment` as ed where ed.id=$id")->getResultArray();
        $boundaryid =
            $boundry[0]['boundary'];
        if ($boundaryid == '30') {
            $data['assessm'] = $db->query("SELECT * FROM supplier_assessment where is_submit=1 AND assessment_id=12")->getResultArray();
            $data['boundryname'] = 'Site';
        } elseif ($boundaryid == '31') {
            $data['assessm'] = $db->query("SELECT * FROM supplier_assessment where is_submit=1 AND assessment_id=11")->getResultArray();
            $data['boundryname'] = 'Products';
        }
        $advancedassessment_model = new AdvancedAssessment();
        $data['assessment'] = $advancedassessment_model->where('status', 1)->findAll();
        $data['question_assessment'] = $db->query("SELECT ed.* FROM `all_advance_assessment_question` as ed where ed.status=1")->getResultArray();
        $percentage = new QualitativeAssessmentComplete();
        $data['percentage'] = $percentage->where('control_assessment_id', $id)->first();
        echo view('brand/qualitative-assessment-report', $data);
    }


    public function control_assessment_submit()
    {
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $priority = $this->request->getVar("priority");
        $due_date = $this->request->getVar("due_date");
        $comment = $this->request->getVar("comment");
        $frequency = $this->request->getVar("frequency");
        $assigned_to = $this->request->getVar("assigned_to");
        $assessment_id = $this->request->getVar("indicator");
        $sub_boundary = $this->request->getVar("sub_boundary");
        $boundary = $this->request->getVar("boundary");
        $supplier_Type = $this->request->getVar("supplier_Type");
        $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
        $supplier_rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
        $srnum = rand(1000, 999999);
        $supplier_uniq_spl_chr = ucwords('#' . $supplier_rname . '_' . $srnum);
        $for = $assigned_to;
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        if ($u_id != $o_id) {
            $run = $supplier->where('id', $u_id)->first();
            if (!$run['department'] || !$run['employee_code'] || !$run['designation']) return json_encode(['status' => false, 'error' => 'Please Complete your profile']);
        }
        $data = [
            'supplier_id' => $u_id,
            'priority' => $priority,
            'due_date' => $due_date,
            'comment' => $comment,
            'frequency' => $frequency,
            'assigned_to' => $assigned_to,
            'uniq_spl' => $supplier_uniq_spl_chr,
            'indicator' => $assessment_id,
            'sub_boundary' => $sub_boundary,
            'boundary' => $boundary,
            'owner_id' => $o_id,
            'start_date' => date("Y-m-d")
        ];
        $QualitativeAssessment = new QualitativeAssessment();
        $insert = $QualitativeAssessment->insert($data);
        if ($insert) {
            $adminname = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
            $indicator_show = '';
            $advancedassessment_model = new AdvancedAssessment();
            $indicatorname = $advancedassessment_model->where('id', $assessment_id)->first()['assessment_name'];
            $notimsg = 'New Task ' . $indicatorname . ' assigned to you by admin ' . $adminname['supplier_name'];
            $noti = new UserNotification();
            $data = ['msg' => $notimsg, 'created_by' => $supplier_info['supplier_id'], 'owner_id' => $o_id, 'for_y' => $for, 'link' => 'Qualitative-assessment'];
            $noti->insert($data);

            $session->setFlashdata('success', 'Assessment has been saved successfully');
        } else {
            $session->setFlashdata('error', ' Not Save');
        }
        $ava = $db->query("select * from supplier where id='" . $assigned_to . "' ");
        $ava = $ava->getResultArray();
        $receiptemail = $ava[0]['email'];
        $detail = $supplier->where('id', $o_id)->first();
        $image = $detail['image'];
        $s_name = $ava[0]['supplier_name'];
        $department = $detail['department'];
        $supplier_name = $detail['supplier_name'];
        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        $t = time();
        $time_date1 = date("d-m-Y H:i:s", $t);
        $time_date2 = date("Y", $t);
        $user_message = '';
        $user_message .= '<html><body>';
        $user_message .= '<div style="margin: 0 auto;
width: 600px;
"><div style="background:black;
padding:22px;
border-top-right-radius:10px;
border-top-left-radius:10px;
"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;
 "><div style="padding:40px;
 font-size:18px;
 border: 1px solid #ddd;
 "><h3 style="margin-top:0px;
 margin-bottom:13px;
 ">Hello ' . $s_name . ',</h3><p>A new data request has been assign from<br><img style="width:60px;
 border-radius:10px;
 margin-top:30px;
 "src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;
 background: #f1f1f1;
 height: 1px;
 border: none;
 "><p style="margin-bottom:0px;
 margin-top:13px;
 ">' . $supplier_name . '</p><p style="margin-bottom:0px;
 margin-top:3px;
 font-size:12px;
 ">' . $role_name . '&nbsp;
 ' . $department . '</p><p style="margin-bottom:13px;
 margin-top:13px;
 ">For ' . $indicatorname . ' Assessment on<b style="font-size:15px;
 "> POSITIIVPLUS</b> <b>' . ($detail['brand_name']) . '</b></p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px;
 color:black;
 border: 1px solid #caeb5d;
 border-radius: 5px;
 background: #defe73;
 text-decoration: none;
 display: inline-block;
 margin-top: 25px;
 font-size: 15px;
 ">RECORD</a></div></div><div style="border-bottom-left-radius:10px;
 border-bottom-right-radius:10px;
 background:black;
 color:white;
 padding:20px;
 "><span style="color:white!important;
 ">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;
 margin-top: 5px;
 font-size: 10px;
 ">' . $time_date1 . '</div><hr style="background: #4e4848;
 border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png" style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
        $user_message .= '</body></html>';
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'Assigned Task');
        $email->setTo($receiptemail);
        $email->setSubject('Task');
        $email->setMessage($user_message);
        return redirect()->back();
    }

    public function getIndicatorByboundary($boundary_id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier = new SupplierModel();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        if ($boundary_id == 35450) {
            $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.is_document_needed=1 and (b.industry_id='" . $supplier_info['industry_id'] . "' or b.industry_id=0) group by b.indicator_id order by s.id");
            $indicator = $query->getResultArray();
            $data = '';
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '">' . $indi['indicator_name'] . '</option>';
                }
            }
        }
        if ($boundary_id == '43') {
            $supplier_model = new SupplierModel();
            $SupplierType = new SupplierType();
            $footprint_type_model = new FootprintTypeModel();
            $supplier_type = $SupplierType->where('status', 1)->where('supplier_id', $u_id)->Orwhere('owner_id', $o_id)->groupBy('supplier_type')->findAll();
            $data1 = '<option value="0">Select Supplier Type</option>';
            if ($supplier_type)
                foreach ($supplier_type as $supplier_type_id) {
                    $g = [];
                    $supplier_type_g = $SupplierType->select("email")->where('id', $supplier_type_id['id'])->findAll();
                    foreach ($supplier_type_g as $keya => $valuea)
                        $g[] = $valuea['email'];
                    $model = $supplier_model->whereIn('email', $g)->findAll();
                    if (!$model) continue;
                    $type = $footprint_type_model->where(['footprint_id' => 3, 'status' => 1])->where('id', $supplier_type_id['supplier_type'])->findAll();
                    foreach ($type as $type_name)
                        $data1 .= '<option value="' . $type_name['id'] . '">' . $type_name['type_name'] . '</option>';
                }
        }
        $assessment = new Assessment();
        $assess = $assessment->Select('*')->join('indicator_category', 'assessment.indicator_category_id = indicator_category.id')->where('assessment.status', 1)->where('assessment.boundary', $boundary_id)->where('indicator_category.status', 1)->groupBy('assessment.indicator_category_id')->findAll();
        $data = '<option value="0">Select Indicator category</option>';
        if ($assess) {
            foreach ($assess as $asses) {
                $data .= '<option value="' . $asses['id'] . '">' . $asses['indicator_category_name'] . '</option>';
            }
        }
        if ($boundary_id == '2NKJINI') {
            $query = $db->query("select s.sdg_id,b.indicator_id,indi.id,indi.sdg_name,indi.image from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id join sdg_assessment_question as saq on saq.sdg_id=s.sdg_id join sdg as indi on indi.id=s.sdg_id where (s.industry_id='" . $supplier_info['industry_id'] . "' or s.industry_id=0) and saq.is_document_needed=1 and (saq.industry_id=0 or saq.industry_id='" . $supplier_info['industry_id'] . "') group by sdg_id");
            $indicator = $query->getResultArray();
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '">' . $indi['sdg_name'] . '</option>';
                }
            }
        }
        $response =
            [
                'site' => $data,
                'supplier' => $data1,
            ];
        return $this->response->setJSON($response);
    }
    // delete assessment
    public function deleteAssessment()
    {
        $db = \Config\Database::connect();
        $session = session();
        $id = $this->request->getVar('del_assessment');
        $query = $db->query("UPDATE control_assessment set status = 0 where id =" . $id);
        $response =
            [
                'succescc' => '1',
            ];
        return $this->response->setJSON($response);
    }

    public function addAnswerQuestion()
    {

        $insert = new QualitativeSubmitAnswerModel();
        $db = \Config\Database::connect();
        $supplier = new SupplierModel();
        $session = session();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $totalSize = 0;
        $documentData = $db->query("select * from supplier_document where supplier_id='" . $u_id . "' and status=1")->getResultArray();
        foreach ($documentData as $key => $docData) {
            $totalSize += $docData['file_size'];
        }
        $query = $db->query("select * from document_Storage where user_id='" . $o_id . "'");
        $user_id = $query->getResultArray()[0];
        $limit = $user_id['limit'];
        $unit = $user_id['unit'];
        if ($unit == '1') {
            $limi = $limit / 1024;
        } elseif ($unit == '2') {
            $limi = $limit;
        } else {
            $limi = $limit * 1024;
        }
        if ($totalSize > $limi) {
            $s_date = ['error' => 'Document Library is full'];
            return $this->response->setJSON($s_date);
        } else {
            $newName = NULL;
            $answer_media = $this->request->getFile('answer_media');
            $answer = $this->request->getVar('answer');
            $indicator_id = $this->request->getVar('indicator_id');
            // $i_id = $indicator_id;
            // print_r($answer);
            // print_r($answer_media);
            // die;
            if ($answer == '' && $answer_media == '') {
                $session->setFlashdata('error', 'please select answer');
                // return redirect()->back();
                // return $this->response->setJSON($response);
            }
            $comment = $this->request->getVar('comment');
            $q_id = $this->request->getVar('question_id');
            $answer_id = $this->request->getVar('answer_id');
            $main_id = $this->request->getVar('main_id');
            $a_id = $this->request->getVar('a_id');
            $file = $this->request->getFile('file');
            $fileupload = $this->request->getVar('fileupload');
            // print_r($q_id);
            // die;
            $model_doc = new DocumentModel();
            if ($fileupload) {
                $documentname = $model_doc->where('document_name', $fileupload)->where('status', 1)->where('supplier_id', $u_id)->first()['image'];
            }
            if (!($fileupload)) {
                if ($file->isValid()) {
                    $ext = $file->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $newName = $file->getRandomName();
                        $filename = $file->getName();
                        $file_size = $file->getSizeByUnit('mb');
                        $file->move('public/uploads/ans_question', $newName);
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                }
            } else {
                $newname = '12' . $documentname;
                $yxsfj = copy('public/uploads/supplier_document/' . $documentname, 'public/uploads/ans_question/' . $newname);
            }
            if ($main_id) $data['qualitative_assesment_id'] = $main_id;
            if ($newName) $data['media'] = $newName;
            if ($filename) $data['media_name'] = $filename;
            if ($comment) $data['comment'] = $comment;

            if ($answer_id) $data['answer_id'] = $answer_id;
            if ($answer) $data['answer'] = json_encode($answer);
            if ($q_id) $data['question_id'] = $q_id;
            if ($o_id) $data['owner_id'] = $o_id;
            if ($u_id) $data['supplier_id'] = $u_id;

            if ($answer_media) {
                if ($answer_media->isValid()) {
                    $ext = $answer_media->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $ans_media = $answer_media->getRandomName();
                        $answer_media->move('public/uploads/answered_question', $ans_media);
                        $data['answer'] = json_encode($ans_media);
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                }
            }
            $model = new QualitativeAssessment();
            $document_uniq = $model->where('id', $main_id)->first()['uniq_spl'];
            // print_r($document_uniq);
            // die;
            $find = $insert->where('owner_id', $o_id)->where('question_id', $q_id)->where('qualitative_assesment_id', $main_id)->where('status', 1)->first();
            // print_r($find);
            // die;
            if ($find) {
                $id = $find['id'];
                $ins = $insert->update($id, $data);
            } else {
                $ins = $insert->insert($data);
            }
            // print_r($ins);
            // die();
            $model_doc = new DocumentModel();
            $doc_name = $filename;
            $title = $this->request->getVar('title');
            $img = $model_doc->insert(['supplier_id' => $u_id, 'action_id' => '1', 'image' => $newName, 'indicator_id' => $document_uniq, 'title' => $title, 'status' => 1, 'document_type_id' => '19', 'document_name' => $doc_name, 'Qualitative_quantitative_id' => '53', 'file_size' => $file_size, 'date' => date('Y-m-d')]);

            $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM `all_advance_assessment_question` AS aaq JOIN qualitative_submit_answer AS bqa ON bqa.question_id = aaq.id WHERE bqa.qualitative_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 ")->getResultArray();
            $total_A = $query_total_A[0]['total_A'];

            $data['a_q'] = $db->query("SELECT alq.id,alq.question_title,alq.question,alq.choice,alq.answer,amaa.answeroption,amaa.marks,amaa.answer as multi_answer from all_advance_assessment_question as alq 
 JOIN all_master_assessment_answer AS amaa ON alq.answer = amaa.id where alq.status = 1 AND amaa.status = 1 and
 alq.all_assessment_id=$a_id")->getResultArray();
            // print_r($data['a_q']);
            // die;
            $data['total_Q'] = count($data['a_q']);

            // $Qualitative_assessment_step = new Qualitative_assessment_step();
            // $overques = $Qualitative_assessment_step->where('status', 1)->where('control_assessment_id', $main_id)->findAll();
            // $over_tot_q = count($overques);

            // $overall = $db->query("SELECT COUNT(*) AS total_A FROM `Qualitative_assessment_step` AS aaq JOIN brand_qualitative_answer AS bqa ON bqa.question_id = aaq.select_question_id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND aaq.control_assessment_id=$main_id")->getResultArray();
            // $overtot = $overall[0]['total_A'];

            $query_total_Marks = $db->query("SELECT bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM `all_advance_assessment_question` AS aaq JOIN qualitative_submit_answer AS bqa ON bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.qualitative_assesment_id = $main_id ")->getResultArray();
            // $over_percentage = ($overtot / $over_tot_q) * 100;
            $total_mark[] = null;
            foreach ($query_total_Marks as $first => $firsts) {
                $submited_answer = json_decode($firsts['submited_array']);
                $marks_array = json_decode($firsts['marks_aray']);
                $answer_array = json_decode($firsts['answer_array']);
                if ($firsts['choice'] == "Single") {
                    $answer_array = ["Text"];
                    $answer_array = ["Date and Time"];
                    $answer_array = ["Numbers"];
                    $answer_array = ["Date"];
                    $answer_array = ["Time"];
                    $answer_array = ["Signature"];
                }
                $choice = $firsts['choice'];
                if ($choice == 'Single') {
                    // $answer_array1 = array($firsts['answer_array']);
                    $answer_array = $answer_array;
                }
                if (is_array($submited_answer) == 1) {
                    $sybmited_answer = $submited_answer;
                    foreach ($answer_array as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answer)) {
                            $r = count($sybmited_answer);
                            $marka[] = $marks_array[$key];
                            $sybmited_answer = [];
                        }
                    }
                    $divide = array_sum($marka) / $r;
                    $divided = number_format(($divide), 2);
                    $total_mark[] = $divided;
                } else {
                    $sybmited_answerH[] = $submited_answer;
                    if ($answer_array)
                        foreach ($answer_array as $key => $ans_arry) {
                            if (in_array($ans_arry, $sybmited_answerH) || $ans_arry == "Text" || $ans_arry == "Date and Time" || $ans_arry == "Numbers" || $ans_arry == "Date" || $ans_arry == "Time" || $ans_arry == "Signature") {
                                $r = count($sybmited_answerH);
                                $total_mark[] = number_format(($marks_array[$key] / $r), 2);
                                $sybmited_answerH = [];
                            }
                        }
                }
            }
            $totalsubmited = count($data['a_q']);
            $percentile1 = ($total_A / $totalsubmited) * 100;
            $percentile = number_format(($percentile1), 2);
            if ($ins) {
                $response = [
                    'success' => true,
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has been saved successfully"
                ];
            } else {
                $response = [
                    'success' => false,
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has not save"
                ];
            }
        }
        return $this->response->setJSON($response);
    }
    public function completeAssessment($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        $timeline = new QualitativeAssessmentComplete();
        $answer = new QualitativeSubmitAnswerModel();
        $find = $db->query("SELECT * from qualitative_assessment where status = 1 and id = $id")->getResultArray();

        $d = $find[0];
        $d = $find[0];
        $com = $find[0]['complete'];
        if ($d['frequency'] == 'Monthly') {
            $complete = $com + 1;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 1 months'));
        } else if ($d['frequency'] == 'Quarterly') {
            $complete = $com + 3;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 4 months'));
        } else if ($d['frequency'] == 'Half yearly') {
            $complete = $com + 6;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 6 months'));
        } else if ($d['frequency'] == 'Yearly') {
            $complete = $com + 12;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 12 months'));
        }
        $model = new QualitativeAssessment();
        $query = $model->update($id, [
            'complete' => $complete,
            'completed_at' => Date('Y-m-d'),
            'num_show' => 1,
        ]);
        if ($complete != 12) {
            $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
            $rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
            $rnum = rand(1000, 999999);
            $uniq_spl_chr = ucwords('#' . $rname . '_' . $rnum);
            $d['uniq_spl'] = $uniq_spl_chr;
            $d['complete'] = $complete;

            $model->insert($d);
        }

        if ($query) {

            $find_new = $db->query("SELECT * from qualitative_assessment where status = 1 and id = $id")->getResultArray();
            $complete_status = number_format($find_new[0]['complete'] / 2);
            $ans = $answer->where('qualitative_assesment_id', $id)->findAll();
            $ans_id = [];
            foreach ($ans as $row) {
                array_push($ans_id, $row['id']);
                $data['status'] = 2;
                $data['duration'] = $find['0']['start_date'] . '-' . $find[0]['due_date'];
                $answer->update($row['id'], $data);
            }
            // $Qualitative_assessment_step = new Qualitative_assessment_step();
            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            } else {
                $u_id = session()->supplier_info['supplier_id'];
                $o_id = $supplier->where('id', $u_id)->first()['owner_id'];
            }
            $submitAns = $answer->select('all_master_assessment_answer.marks,all_master_assessment_answer.answer,all_master_assessment_answer.choice,qualitative_submit_answer.answer as ans')->Join('all_master_assessment_answer', 'all_master_assessment_answer.id=qualitative_submit_answer.answer_id')->where('qualitative_submit_answer.qualitative_assesment_id', $id)->findAll();
            $totalCount = count($submitAns);
            // print_r($submitAns);
            // die;
            $marks = 0;
            foreach ($submitAns as $g) {

                if ($g['choice'] == 'Single') {
                    $marks += json_decode($g['marks'])[0];
                } else {
                    $val = json_decode($g['answer']);
                    $v = $g['ans'];
                    foreach ($val as $key => $l) {
                        $jj = '"' . $l . '"';
                        if ($jj == $v) {
                            $marks += json_decode($g['marks'])[$key];
                        }
                    }
                }
            }
            $Percentage = $marks / $totalCount * 100;


            $a_data = [
                'answer_id' => json_encode($ans_id),
                'control_assessment_id' => $id,
                'assigned_to' => $find[0]['assigned_to'],
                'due_date' => $find[0]['due_date'],
                'start_date' => $find[0]['start_date'],
                'complete_status' => $complete_status,
                'percentile' => $Percentage, //safal code
                // 'passfail_status' => $passfail //safal code
            ];

            $timeline->insert($a_data);

            $for = $find[0]['supplier_id'];
            if (session()->supplier_info['role'] == 0) {
                $o_id = $u_id = session()->supplier_info['supplier_id'];
            } else {
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id', $u_id)->first();
                $o_id = $id_o['owner_id'];
            }
            $noti = new UserNotification();
            $empName = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
            $taskData = $find[0]['indicator'];
            $advancedassessment_model = new AdvancedAssessment();
            $indicatorname = $advancedassessment_model->where('id', $taskData)->first()['assessment_name'];
            $notiempmsg = $indicatorname . ' Task assigned to ' . $empName['supplier_name'] . ' has been successfully completed';
            $noti = new UserNotification();
            $data = [
                'msg' => $notiempmsg,
                'created_by' => $u_id,
                'owner_id' => $o_id,
                'for_y' => $for,
                'link' => 'Qualitative-assessment'
            ];
            $noti->insert($data);
            $session->setFlashdata('success', 'Your assessment has been saved successfully');
        } else {
            $session->setFlashdata('error', 'Your assessment has not save');
        }
        $ava = $db->query("select * from supplier where id='" . $for . "' ");
        $ava = $ava->getResultArray();
        $receiptemail = $ava[0]['email'];
        $detail = $supplier->where('id', $u_id)->first();
        $image = $detail['image'];
        $s_name = $ava[0]['supplier_name'];
        $department = $detail['department'];
        $supplier_name = $detail['supplier_name'];
        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        $subject = 'SUB: Task has been completed! ' . date("Y-m-d-h-i-s");;
        $t = time();
        $time_date1 = date("d-m-Y H:i:s", $t);
        $time_date2 = date("Y", $t);
        $admin_message = '';
        $admin_message .= '<html><body>';
        $admin_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . ',</h3><p>Task has been completed by <br><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">' . $detail['supplier_name'] . '</p><p style="margin-bottom:0px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p><p style="margin-bottom:13px; margin-top:13px;">
 For ' . ' Assessment on<b style="font-size:15px;"> POSITIIVPLUS</b> <b>' . ($detail['brand_name']) . '</b></p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png" style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
        $admin_message .= '</body></html>';
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'Assigned Task');
        $email->setTo($receiptemail);
        $email->setSubject('Task');
        $email->setMessage($admin_message);
        // $a = $email->send();
        return redirect()->to('Qualitative-assessment');
    }
    public function control_assessment_update()
    {
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $priority = $this->request->getVar("priority");
        $due_date = $this->request->getVar("due_date");
        $comment = $this->request->getVar("comment");
        $id = $this->request->getVar("id");
        $assigned_to = $this->request->getVar("assigned_to");
        $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
        $rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
        $rnum = rand(1000, 999999);
        $uniq_spl_chr = ucwords('#' . $rname . '_' . $rnum);
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        } elseif (session()->supplier_info['role'] == 10) {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        }
        $control_assessment = $db->query("UPDATE control_assessment set supplier_id = " . $supplier_info['supplier_id'] . ", priority = '" . $priority . "', due_date = '" . $due_date . "', comment = '" . $comment . "', assigned_to = '" . $assigned_to . "',uniq_spl = '" . $uniq_spl_chr . "',
 owner_id = '" . $o_id . "' WHERE id = $id ");
        if ($control_assessment) {
            $noti = new UserNotification();
            $data = [
                'owner_id' => $o_id,
                'created_by' => $supplier_info['supplier_id'],
                'msg' => $msg,
                'link' => 'Controlwork/assessment',
                'for_y' => $for
            ];
            $noti->insert($data);
            $session->setFlashdata('success', 'Assessment has been update successfully');
        } else {
            $session->setFlashdata('error', ' Not update');
        }
        $ava = $db->query("select * from supplier where id='" . $assigned_to . "' ");
        $ava = $ava->getResultArray();
        $receiptemail = $ava[0]['email'];
        $receiptemail = $ava[0]['email'];
        $detail = $supplier->where('id', $o_id)->first();
        $image = $detail['image'];
        $s_name = $ava[0]['supplier_name'];
        $department = $detail['department'];
        $supplier_name = $detail['supplier_name'];
        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        $subject = 'SUB: You have a new task! ' . date("Y-m-d-h-i-s");;
        $qualitative_message = '<html><body>';
        $qualitative_message .= '<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . '</h3><h5 style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:50px; width:50px;" src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">' . $supplier_name . '</h5><h5 style="margin-bottom:0px; margin-top:13px;">' . $role_name . '&nbsp;' . $department . '</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Qualitative Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://positiivplus.com/Controlwork/assessment"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $qualitative_message .= '</body></html>';
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'Assigned Task');
        $email->setTo($receiptemail);
        $email->setSubject('Task');
        $email->setMessage($qualitative_message);
        // $a = $email->send();
        return redirect()->to('Controlwork/assessment');
    }
    public function findDetails($boundary, $sub_boundary, $indicator)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT item_name FROM `supplier_module_item` WHERE id=$boundary")->getResultArray();
        $data['boundary'] = $query[0]['item_name'];
        $query = $db->query("SELECT cp_name FROM `supplier_assessment` WHERE id=$sub_boundary")->getResultArray();
        $data['sub_boundary'] = $query[0]['cp_name'];
        $query = $db->query("SELECT assessment_name FROM `assessment` WHERE id=$indicator")->getResultArray();
        $data['indicator'] = $query[0]['assessment_name'];
        return $this->response->setJSON($data);
    }
    public function getAssessment($id)
    {
        $advancedassessment_model = new AdvancedAssessment();
        $advancedassessment = $advancedassessment_model->select("*")->where('status', 1)->where('boundary', $id)->findAll();
        $data = '';
        foreach ($advancedassessment as $advancedassessment_id) {
            $data .= '<option value="' . $advancedassessment_id['id'] . '">' . $advancedassessment_id['assessment_name'] . '</option>';
        }
        echo $data;
    }

    // public function get_data_api()
    // {
    //     $companyName =  $this->request->getVar('name');
    //     $db = \Config\Database::connect();
    //     $query = $db->query("SELECT * FROM `madhyapradesh` WHERE company_name LIKE '%" . $companyName . "%'")->getResultArray();
    //     $data = '';
    //     foreach ($query as $name) {
    //         $data .= '<option value="' . $name['company_name'] . '">' . $name['company_name'] . '</option>';
    //     }
    //     $response =
    //         [
    //             'companyName' => $data,

    //         ];
    //     return $this->response->setJSON($response);
    // }
}
