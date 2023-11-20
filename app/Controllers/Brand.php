<?php

namespace App\Controllers;

use App\Models\SupplierModuleModel;
use App\Models\QuickStartModel;
use App\Models\Sub_siteModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\GhgAssessmentModel;
use App\Models\Ghg;
use App\Models\UserNotification;
use App\Models\PolicyBrandModel;
use App\Models\DocumentSubTypeModel;
use App\Models\CountryModel;
use App\Models\UnitModel;
use App\Models\FootprintTypeModel;
use App\Models\StateModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\SubSubIndustryModel;
use App\Models\SupplierSubsidiaryModel;
use App\Models\IndustryModel;
use App\Models\IndustryCategoryModel;
use App\Models\EmployeeDetails;
use App\Models\SupplierRoleModel;
use App\Models\Supplier_assessment;
use App\Models\SensorModel;
use App\Models\Energy_managment;
use App\Models\Energy_managment_data;
use App\Models\SupplierType;
use App\Models\SupplierModel;

class Brand extends BaseController

{

    public function index()
    {

        return view('brand/dashboard');
    }

    public function target()
    {
        return view('brand/targets');
    }

    public function manage_assets()
    {
        return view('brand/404');
    }



    public function reportnew()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Report';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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


        $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=" . $supplier_info['supplier_id'] . " group by assessment_id order by assessment_id");


        $level = $query->getResultArray();

        $total_level = 0;

        $level_name = '';

        if (!empty($level)) {

            foreach ($level as $l) {

                $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='" . $l['assessment_id'] . "' ");

                $t = $query->getResultArray();

                $total_level = $total_level + (($l['tot'] / 100) * $t[0]['weight_percentage']);
            }
        }



        if ($total_level >= 0 && $total_level <= 20) {



            $level_name = "Dorment";
        }



        if ($total_level >= 21 && $total_level <= 40) {



            $level_name = "Active";
        }



        if ($total_level >= 41 && $total_level <= 60) {
            $level_name = "Positive";
        }
        if ($total_level >= 81 && $total_level <= 100) {
            $level_name = "Green";
        }
        $data['level'] = array("level_name" => $level_name, "level_per" => $total_level);
        $ghg_cat_arr = [];
        if ($supplier_info['supplier_id']) {



            $query = $db->query("select * from ghg_category where status=1");



            $ghg_category_arr = $query->getResultArray();



            if ($ghg_category_arr) {



                foreach ($ghg_category_arr as $ghg_category) {



                    $temp = [];



                    $query = $db->query("select sum(ga.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from ghg_assessment as ga join ghg as g on g.id=ga.ghg_id join supplier_assessment as sa on sa.id=ga.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $ghg_assessment_arr = $query->getResultArray();



                    $total_estimate = 0;



                    if ($ghg_assessment_arr) {



                        $total_estimate = $ghg_assessment_arr[0]['tot_estimate'];
                    }



                    $query = $db->query("select sum(smp.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from supplier_manufacturing_process as smp join ghg as g on g.id=smp.ghg_id join supplier_assessment as sa on sa.id=smp.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $supplier_manufacturing_process_arr = $query->getResultArray();



                    if ($supplier_manufacturing_process_arr) {



                        $total_estimate += $supplier_manufacturing_process_arr[0]['tot_estimate'];
                    }



                    $temp['ghg_category_name'] = $ghg_category['ghg_category_name'];



                    $temp['total_emission'] = $total_estimate;



                    $ghg_cat_arr[] = $temp;
                }
            }
        }



        $data['ghg_cat_arr'] = $ghg_cat_arr;









        return view('brand/reports-1', $data);
    }



    //Reports Works
    public function address_search()
    {
        $supplier_model = new SupplierModel();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = $u_id = session()->supplier_info['supplier_id'];
            $o_id = $supplier_model->where('id', $sid)->first()['owner_id'];
        } else {
            $sid = $u_id = session()->supplier_info['supplier_id'];
            $o_id = $supplier_model->where('id', $sid)->first()['owner_id'];
        }
        $search = $this->request->getVar('search');
        $supp_ass = new Supplier_assessment();
        if ($search == '') return false;
        $data = $supp_ass->select('cp_name,cp_address,id')->like('cp_name', $search)->orlike('cp_address', $search)->where("supplier_id=$u_id and assessment_id=12")->findAll(5);
        echo json_encode($data);
    }


    public function profileImageUpload()
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_model = new SupplierModel();



        $id = $this->request->getVar("proide");

        $file = $this->request->getFile('image');


        // $old = $this->request->getVar('old_image');

        // print_r($file);
        // die();
        $validated = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4096]',
            ],
        ]);

        if (!$validated) {
            $session->setFlashdata('error', 'Please upload file jpg,jpeg,png');
            return redirect()->to('brand/account');
        }


        if ($file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();

            $file->move('public/profilimg/', $newName);
            $msg = "Profile upload successfully";
            $session->setFlashdata('success', $msg);
        }



        $data = [



            'image' => $newName,

        ];

        $supplier_model->update($id, $data);
        $prof_id = $this->request->getVar("prof_id");


        if ($prof_id == '11') {
            return redirect()->to('brand/manage_organization');
        } else {
            return redirect()->to('brand/account');
        }
    }

    public function state_country($id)
    {


        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }
        $db = \Config\Database::connect();

        $country_model = new CountryModel();

        $v = $id;
        $ids = explode(',', $v);
        $data = '';
        $data .= "<option value=''>Select Country</option>";
        foreach ($ids as $key => $value) {

            $val = $country_model->where('id', $value)->findAll();
            foreach ($val as $f) {

                $data .= "<option value=" . $f['id'] . ">" . $f['name'] . "</option>";
            }
        }

        return $data;
    }

    public function get_items()
    {

        $db = \Config\Database::connect();



        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];
        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }

        $query = $db->query("select sa.*,ft.type_name,u.unit_name,c.name as country_name,k.name as state_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join countries as c on sa.country_id=c.id left join states as k on sa.state_id=k.id left join unit as u on u.id=sa.unit_id where (sa.supplier_id='" . $u_id . "' OR  sa.owner_id='" . $o_id . "')and assessment_id=12  order by sa.id asc")->getResultArray();

        $model = new Sub_siteModel();


        $data = [];

        $i = 1;

        foreach ($query as $r) {
            $id =  $r['id'];
            $sub_site = $model->where('supplier_id', $u_id)->where('status', 1)->where('site_id', $id)->findAll();
            $count_site = count($sub_site);
            $data[] = array(
                $i++,
                $r['cp_name'],
                $r['type_name'],
                $r['cp_address'],
                $r['state_name'],
                $r['country_name'],
                $count_site,
                '<div class="dropdown">
                                 <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                 
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docEditePopup" 
                                    data-name="' . $r['cp_name'] . '" data-lease_owned="' . $r['lease_owned'] . '" data-type="' . $r['cp_type_id'] . '" 
                                    data-address="' . $r['cp_address'] . '" data-country_id="' . $r['country_id'] . '" data-state="' . $r['state_id'] . '" data-no_of_employee="' . $r['no_of_employee'] . '" data-number="' . $r['id'] . '" data-building_size="' . $r['building_size'] . '" 
                                    data-unit-id="' . $r['unit_id'] . '" onclick="editCompany(this)">
                                    <i data-feather="edit-2" class="me-50"></i>
                                    <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#docDeletePopup" data-number="' . $r['id'] . '" onclick="deleteCompany(this)">
                                    <i data-feather="trash" class="me-50"></i>
                                    <span>Delete</span>
                                    </a>
                                    <a class="dropdown-item" href="' . base_url('/Brand/sub_site_view/' . $r['id'] . '') . '" >
                                    <i data-feather="eye" class="me-50"></i>
                                    <span>Sub-Site</span>
                                    </a>
                                 </div>
                              </div>',

            );
        }

        $kl = count($query);
        $draw = $kl;
        $result = array(
            "draw" => $draw,
            "recordsTotal" => $kl,
            "recordsFiltered" => $kl,
            "data" => $data
        );


        echo json_encode($result);
        exit();
    }

    public function report()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Reports';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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







        $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=" . $supplier_info['supplier_id'] . " group by assessment_id order by assessment_id");



        $level = $query->getResultArray();



        // echo '<pre>';



        // print_r($level);



        // die();



        $total_level = 0;



        $level_name = '';



        if (!empty($level)) {



            foreach ($level as $l) {



                $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='" . $l['assessment_id'] . "' ");



                $t = $query->getResultArray();



                $total_level = $total_level + (($l['tot'] / 100) * $t[0]['weight_percentage']);
            }
        }



        if ($total_level >= 0 && $total_level <= 20) {



            $level_name = "Dorment";
        }



        if ($total_level >= 21 && $total_level <= 40) {



            $level_name = "Active";
        }



        if ($total_level >= 41 && $total_level <= 60) {



            $level_name = "Positive";
        }



        if ($total_level >= 81 && $total_level <= 100) {



            $level_name = "Green";
        }



        $data['level'] = array("level_name" => $level_name, "level_per" => $total_level);





        $ghg_cat_arr = [];



        if ($supplier_info['supplier_id']) {



            $query = $db->query("select * from ghg_category where status=1");



            $ghg_category_arr = $query->getResultArray();



            if ($ghg_category_arr) {



                foreach ($ghg_category_arr as $ghg_category) {



                    $temp = [];



                    $query = $db->query("select sum(ga.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from ghg_assessment as ga join ghg as g on g.id=ga.ghg_id join supplier_assessment as sa on sa.id=ga.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $ghg_assessment_arr = $query->getResultArray();



                    $total_estimate = 0;



                    if ($ghg_assessment_arr) {



                        $total_estimate = $ghg_assessment_arr[0]['tot_estimate'];
                    }



                    $query = $db->query("select sum(smp.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from supplier_manufacturing_process as smp join ghg as g on g.id=smp.ghg_id join supplier_assessment as sa on sa.id=smp.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $supplier_manufacturing_process_arr = $query->getResultArray();



                    if ($supplier_manufacturing_process_arr) {



                        $total_estimate += $supplier_manufacturing_process_arr[0]['tot_estimate'];
                    }



                    $temp['ghg_category_name'] = $ghg_category['ghg_category_name'];



                    $temp['total_emission'] = $total_estimate;



                    $ghg_cat_arr[] = $temp;
                }
            }
        }



        $data['ghg_cat_arr'] = $ghg_cat_arr;



        $marks_per_arr = [];



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id='" . $supplier_info['supplier_id'] . "'");



            $supplier_details = $query->getResultArray();



            if ($supplier_details) {



                $query = $db->query("select company_id from supplier_plan where id='" . $supplier_details[0]['supplier_plan_id'] . "'");



                $company_arr = $query->getResultArray();



                if ($company_arr) {



                    $query = $db->query("select * from indicator_category where status=1");



                    $indicator_category_arr = $query->getResultArray();



                    if ($indicator_category_arr) {



                        foreach ($indicator_category_arr as $indicator_category) {



                            $tot_marks = 0;



                            $obtained_marks = 0;



                            /* Total Marks For Base Assessment Code Start  */



                            $query = $db->query("select id,choice from base_assessment_question where (industry_id=0 or industry_id=" . $supplier_details[0]['industry_id'] . ") and (location=0 or location=" . $supplier_details[0]['country_id'] . ") and (company=0 or company=" . $company_arr[0]['company_id'] . ") and status=1 and indicator_category_id=" . $indicator_category['id']);



                            $baq_arr = $query->getResultArray();



                            if ($baq_arr) {



                                foreach ($baq_arr as $baq) {



                                    if ($baq['choice'] == 'Single') {



                                        $query = $db->query("select max(marks) as mark from base_assessment_answer where base_assessment_question_id=" . $baq['id'] . " and status=1");



                                        $max_marks_arr = $query->getResultArray();



                                        if ($max_marks_arr) {



                                            $tot_marks += $max_marks_arr[0]['mark'];
                                        }
                                    } elseif ($baq['choice'] == 'Multi') {



                                        $query = $db->query("select sum(marks) as mark from base_assessment_answer where base_assessment_question_id=" . $baq['id'] . " and status=1");



                                        $max_marks_arr = $query->getResultArray();



                                        if ($max_marks_arr) {



                                            $tot_marks += $max_marks_arr[0]['mark'];
                                        }
                                    }
                                }
                            }



                            /* Total Marks For Base Assessment Code End */







                            /* Total Marks For Advance Assessment Code Start */







                            $query = $db->query("select saq.id,saq.choice from sdg_assessment_question as saq join indicator as i on i.id=saq.indicator_id join indicator_category as ic on ic.id=i.indicator_category_id where (saq.industry_id=0 or saq.industry_id=" . $supplier_details[0]['industry_id'] . ") and (saq.country_id=0 or saq.country_id=" . $supplier_details[0]['country_id'] . ") and (saq.company_id=0 or saq.company_id=" . $company_arr[0]['company_id'] . ") and saq.status=1 and ic.id=" . $indicator_category['id']);



                            $saq_arr = $query->getResultArray();



                            if ($saq_arr) {



                                foreach ($saq_arr as $saq) {



                                    if ($saq['choice'] == 'Single') {



                                        $query = $db->query("select max(marks) as mark from sdg_assessment_answer where sdg_assessment_question_id=" . $saq['id'] . "  and status=1");



                                        $max_marks_arr = $query->getResultArray();



                                        if ($max_marks_arr) {



                                            $tot_marks += $max_marks_arr[0]['mark'];
                                        }
                                    } elseif ($saq['choice'] == 'Multi') {



                                        $query = $db->query("select sum(marks) as mark from sdg_assessment_answer where sdg_assessment_question_id=" . $saq['id'] . "  and status=1");



                                        $max_marks_arr = $query->getResultArray();



                                        if ($max_marks_arr) {



                                            $tot_marks += $max_marks_arr[0]['mark'];
                                        }
                                    }
                                }
                            }







                            /* Total Marks For Advance Assessment Code End */







                            /* Total Marks Obtained For Base Assessment Code Start */







                            $query = $db->query("select sum(sba.mark) as mark from supplier_base_assessment as sba join supplier_assessment as sa on sa.id=sba.supplier_assessment_id join base_assessment_question as baq on baq.id=sba.base_assessment_question_id join indicator_category as ic on ic.id=baq.indicator_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.assessment_id=1 and ic.id=" . $indicator_category['id']);



                            $marks_for_base_assessment_arr = $query->getResultArray();



                            if ($marks_for_base_assessment_arr) {



                                $obtained_marks = $marks_for_base_assessment_arr[0]['mark'];
                            }







                            /* Total Marks Obtained For Base Assessment Code End */







                            /* Total Marks Obtained For Advance Assessment Code Start */







                            $query = $db->query("select sum(sba.mark) as mark from supplier_base_assessment as sba join supplier_assessment as sa on sa.id=sba.supplier_assessment_id join sdg_assessment_question as saq on saq.id=sba.base_assessment_question_id join indicator as i on i.id=saq.indicator_id join indicator_category as ic on ic.id=i.indicator_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.assessment_id=2 and ic.id=" . $indicator_category['id']);



                            $marks_for_advance_assessment_arr = $query->getResultArray();



                            if ($marks_for_advance_assessment_arr) {



                                $obtained_marks += $marks_for_advance_assessment_arr[0]['mark'];
                            }







                            /* Total Marks Obtained For Advance Assessment Code End */



                            $marks_per = 0;



                            if ($tot_marks) {



                                $marks_per = ($obtained_marks * 100) / $tot_marks;
                            }



                            $temp = [];



                            $temp['indicator_category'] = $indicator_category['indicator_category_name'];



                            $temp['marks_per'] = $marks_per;



                            $marks_per_arr[] = $temp;
                        }
                    }
                }
            }
        }



        $data['indicator_category_marks_per'] = $marks_per_arr;



        return view('brand/reports', $data);
    }







    //Accounts Work



    public function account()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Account';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $supp_info = [];



        $company = [];



        $plans = [];



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id='" . $supplier_info['supplier_id'] . "'");



            $supp_info = $query->getResultArray();



            if ($supp_info) {



                $query = $db->query("select * from supplier_plan where id='" . $supp_info[0]['supplier_plan_id'] . "'");



                $supp_plan = $query->getResultArray();



                if ($supp_plan) {



                    $query = $db->query("select * from company where id='" . $supp_plan[0]['company_id'] . "'");



                    $company = $query->getResultArray();



                    if ($company) {



                        $query = $db->query("select * from supplier_plan where status=1 and company_id='" . $company[0]['id'] . "' order by plan_price");



                        $plans = $query->getResultArray();
                    }
                }
            }
        }



        $data['company'] = $company;



        $data['supp_info'] = $supp_info;



        $data['plans'] = $plans;

        $query = $db->query("select * from currency where status=1");

        $data['currency'] = $query->getResultArray();

        $query = $db->query("select * from languages where status=1");

        $data['languages'] = $query->getResultArray();



        $query = $db->query("select * from industry where status=1");



        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1");



        $data['country'] = $query->getResultArray();



        $query = $db->query("select * from states ");



        $data['state'] = $query->getResultArray();



        // print_r($data['stateee']);

        // die();



        // echo '<pre>';



        // print_r($data['country']);



        // die();



        return view('brand/account', $data);
    }

    public function information()
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_model = new SupplierModel();

        $id = $this->request->getVar('id');








        $msg = "information Update SuccessFully";

        $data = [

            'website' => $this->request->getVar('website'),
            'bio'  => $this->request->getVar('bio'),
            'age' => $this->request->getVar('age'),
            'country_account' => $this->request->getVar('country'),
            'current_address' => $this->request->getVar('currentadd'),
            'permanent_address' => $this->request->getVar('permanentadd'),
            'date_joining' => $this->request->getVar('datejoin'),
            'employee_code' => $this->request->getVar('employeecode'),
            'state_id_account' => $this->request->getVar('state'),
            'designation' => $this->request->getVar('designation'),

            'department' => $this->request->getVar('department'),

            'success' => $msg,

        ];

        $supplier_model->update($id, $data);
        return $this->response->setJSON($data);







        // return redirect()->to('brand/account');

    }



    public function information2()
    {



        $db = \Config\Database::connect();



        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $id = $this->request->getVar('inid');
        $file = $this->request->getFile('nameproof');
        $old = $this->request->getVar('old_image');


        if ($file) {

            $validated = $this->validate([
                'nameproof' => [
                    'uploaded[nameproof]',
                    'mime_in[nameproof,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[nameproof,4096]',
                ],
            ]);

            if (!$validated) {
                $session->setFlashdata('error', 'Please upload correct name-proof file in jpg,jpeg,png format Only');
                return redirect()->to('brand/account');
            } else {

                if ($file->isValid() && !$file->hasMoved()) {


                    $newName = $file->getRandomName();

                    $file->move('public/nameproof/', $newName);
                }

                $msg = 'Name-Proof information update successfully';
                $data = [

                    'nameproof' => $newName,

                ];


                $supplier_model->update($id, $data);

                $msg = "Name-Proof information Update SuccessFully";
                $session->setFlashdata('success', $msg);
                $session->setFlashdata('tar', 'information');



                return redirect()->to('brand/account');
            }
        }

        $addresproof = $this->request->getFile('addresproof');
        $ol = $this->request->getVar('addresproof_old');




        if ($addresproof) {
            if ($addresproof->isValid() && !$addresproof->hasMoved()) {

                $validated = $this->validate([

                    'addresproof' => [
                        'uploaded[addresproof]',
                        'mime_in[addresproof,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[addresproof,4096]',
                    ],
                ]);


                if (!$validated) {
                    $session->setFlashdata('error', 'Please upload Address Proof file in jpg,jpeg,png format Only');
                    return redirect()->to('brand/account');
                }
                $new = $addresproof->getRandomName();

                $addresproof->move('public/addressproof/', $new);

                $data = [

                    'addressproof' => $new,

                ];

                $supplier_model->update($id, $data);

                $msg = "Address Proof information Update SuccessFully";
                $session->setFlashdata('success', $msg);
                $session->setFlashdata('tar', 'information');


                return redirect()->to('brand/account');
            }
        }
    }



    public function payment()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Payment';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $supp_info = [];



        $company = [];



        $plans = [];



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id='" . $supplier_info['supplier_id'] . "'");



            $supp_info = $query->getResultArray();



            if ($supp_info) {



                $query = $db->query("select * from supplier_plan where id='" . $supp_info[0]['supplier_plan_id'] . "'");



                $supp_plan = $query->getResultArray();



                if ($supp_plan) {



                    $query = $db->query("select * from company where id='" . $supp_plan[0]['company_id'] . "'");



                    $company = $query->getResultArray();



                    if ($company) {



                        $query = $db->query("select * from supplier_plan where status=1 and company_id='" . $company[0]['id'] . "' order by plan_price");



                        $plans = $query->getResultArray();
                    }
                }
            }
        }



        $data['company'] = $company;



        $data['supp_info'] = $supp_info;



        $data['plans'] = $plans;



        $query = $db->query("select * from industry where status=1");



        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1");



        $data['country'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['plans']);



        // die();



        return view('brand/payment-page', $data);
    }



    public function report_page()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Report';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $supp_info = [];



        $company = [];



        $plans = [];



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id='" . $supplier_info['supplier_id'] . "'");



            $supp_info = $query->getResultArray();



            if ($supp_info) {



                $query = $db->query("select * from supplier_plan where id='" . $supp_info[0]['supplier_plan_id'] . "'");



                $supp_plan = $query->getResultArray();



                if ($supp_plan) {



                    $query = $db->query("select * from company where id='" . $supp_plan[0]['company_id'] . "'");



                    $company = $query->getResultArray();



                    if ($company) {



                        $query = $db->query("select * from supplier_plan where status=1 and company_id='" . $company[0]['id'] . "' order by plan_price");



                        $plans = $query->getResultArray();
                    }
                }
            }
        }



        $data['company'] = $company;



        $data['supp_info'] = $supp_info;



        $data['plans'] = $plans;



        $query = $db->query("select * from industry where status=1");



        $data['industry'] = $query->getResultArray();



        $query = $db->query("select * from standard where status=1");



        $data['standard'] = $query->getResultArray();



        $query = $db->query("select indicator_name from indicator where status=1");



        $data['indicator'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1");



        $data['country'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['plans']);



        // die();



        return view('brand/report-page', $data);
    }

    public function company($assessment_id = 0)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $db = \Config\Database::connect();



        $session = session();

        $data['supp_assess'] = [];



        $supplier_info = $session->get('supplier_info');



        $data['ghg_assessment_id'] = $assessment_id;



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];
            }
        }



        if ($assessment_id) {



            $query = $db->query("SELECT * FROM `consumption` where status=1");



            $data['cons'] = $query->getResultArray();



            $query = $db->query("select country_id from supplier_assessment where id=" . $assessment_id);



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                if ($supp_ass[0]['country_id']) {



                    $country_id = $supp_ass[0]['country_id'];
                }
            }
        }







        $data['completed_module_count'] = 0;



        $data['total_company_footprint'] = 0;



        if ($assessment_id) {



            $query = $db->query("select count(distinct(ghg_id)) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['completed_module_count'] = $rs[0]['cnt'];
            }



            $query = $db->query("select sum(estimate) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['total_company_footprint'] = $rs[0]['cnt'];
            }
        }



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



        $query = $db->query("select * from assessment where id=10 order by id ");



        $data['assessment'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1 ");



        $data['country'] = $query->getResultArray();



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_id);



        $data['ghg_assessment'] = $query->getResultArray();



        $query = $db->query("select * from ghg where footprint_id=1 and status=1");



        $data['ghg'] = $query->getResultArray();



        //        $query = $db->query("select * from ghg_factor where status=1 and type=1");



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor'] = $query->getResultArray();



        $query1 = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor1'] = $query1->getResultArray();

        $query12 = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor12'] = $query12->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $data['ghg_assessment_detail'] = $query->getResultArray();



        $query1 = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $data['ghg_assessment_detail1'] = $query1->getResultArray();

        $query12 = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $data['ghg_assessment_detail12'] = $query12->getResultArray();



        // echo '<pre>';



        // print_r($data['ghg_assessment_detail']);



        // die();



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=18");

        //echo $db->getLastquery($query);

        $total_flight_footprint_arr = $query->getResultArray();



        $data['tot_flight_footprint'] = 0;



        if ($total_flight_footprint_arr) {



            $data['tot_flight_footprint'] = $total_flight_footprint_arr[0]['tot'];
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=19");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $data['tot_company_vehicle_footprint'] = 0;



        if ($total_company_vehicle_footprint_arr) {



            $data['tot_company_vehicle_footprint'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=17");

        //echo $db->getLastquery($query);

        $total_building_footprint_arr = $query->getResultArray();



        $data['tot_building_footprint'] = 0;



        if ($total_building_footprint_arr) {



            $data['tot_building_footprint'] = $total_building_footprint_arr[0]['tot'];
        }



        // Water consumption start

        $query1 = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=28");



        $total_WATER_footprint_arr = $query1->getResultArray();



        // echo $db->getLastquery($total_WATER_footprint_arr);

        $data['tot_WATER_footprint'] = 0;



        if ($total_WATER_footprint_arr) {



            $data['tot_WATER_footprint'] = $total_WATER_footprint_arr[0]['tot'];
        }

        // Water consumption end





        //  Consumables start

        $query12 = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=29");



        $total_Consumables_footprint_arr = $query12->getResultArray();



        // echo $db->getLastquery($total_WATER_footprint_arr);

        $data['tot_Consumables_footprint'] = 0;



        if ($total_Consumables_footprint_arr) {



            $data['tot_Consumables_footprint'] = $total_Consumables_footprint_arr[0]['tot'];
        }

        // Consumables end

        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=20");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();

        //echo $db->getLastquery($total_mobile_fuel_footprint_arr);



        $data['tot_mobile_fuel_footprint'] = 0;



        if ($total_mobile_fuel_footprint_arr) {



            $data['tot_mobile_fuel_footprint'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        // $query = $db->query("select distinct(vehicle) from company_vehicle_detail where status=1");



        $query = $db->query("select distinct(cvd.vehicle),v.vehicle_name,v.id as vid from company_vehicle_detail as cvd join vehicle as v on cvd.vehicle=v.id where cvd.status=1");



        $data['comp_vehicle'] = $query->getResultArray();



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_id);



        $supplier_assessment = $query->getResultArray();



        //   echo '<pre>';

        // echo $db->getLastquery($supplier_assessment);

        // print_r($supplier_assessment);



        // die();



        if ($supplier_assessment) {



            $data['supp_assess'] = $supplier_assessment[0];
        }
        $data['supp_assess1'] = [];



        if ($supplier_assessment) {



            $data['supp_assess12'] = $supplier_assessment[0];
        }





        // echo '<pre>';



        // print_r($data['supp_assess1']);



        // die();



        $data['offset'] = $db->query("select * from assessment_offset where status=1")->getResultArray();



        $data['degree'] = $db->query('select * from degree where status=1')->getResultArray();



        $data['flight_class'] = $db->query('select distinct(flight_class) from flight_detail where status=1')->getResultArray();



        $stages = [];



        $total_footprint_arr = $db->query("select sum(estimate) as est from ghg_assessment where supplier_assessment_id=" . $assessment_id)->getResultArray();



        $data['total_footprint'] = 0;



        if ($total_footprint_arr) {



            $data['total_footprint'] = $total_footprint_arr[0]['est'];
        }



        if ($data['total_footprint'] != 0) {



            $stages[0] = [];



            $stages[0]['value'] = round((($data['tot_building_footprint'] / $data['total_footprint']) * 100));



            $stages[0]['name'] = 'Energy';



            $stages[1] = [];



            $stages[1]['value'] = round((($data['tot_flight_footprint'] / $data['total_footprint']) * 100));



            $stages[1]['name'] = 'Business Flights';



            $stages[2] = [];



            $stages[2]['value'] = round((($data['tot_company_vehicle_footprint'] / $data['total_footprint']) * 100));



            $stages[2]['name'] = 'Company Vehicle';



            $stages[3] = [];



            $stages[3]['value'] = round((($data['tot_mobile_fuel_footprint'] / $data['total_footprint']) * 100));



            $stages[3]['name'] = 'Mobile Fuel';
        }



        $data['stages'] = $stages;



        $top_in_each_stage = [];



        $total_top_stage_footprint = 0;



        if ($data['ghg']) {



            foreach ($data['ghg'] as $ghg) {



                $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();



                if ($top_ghg_estimate_arr) {



                    if ($top_ghg_estimate_arr[0]['mest']) {



                        $total_top_stage_footprint = $total_top_stage_footprint + $top_ghg_estimate_arr[0]['mest'];
                    }
                }
            }
        }



        if ($data['ghg']) {



            foreach ($data['ghg'] as $ghg) {



                $max_est_arrt = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();





                $max_est_arr = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'] . " and estimate='" . $max_est_arrt[0]['mest'] . "'")->getResultArray();

                // echo $db->getLastquery($max_est_arr);



                // DIE();





                if ($max_est_arr) {



                    if ($max_est_arr[0]['mest']) {



                        $fact_name_arr = $db->query("select gf.name,f.factor_name,gc.ghg_category_name from ghg_factor as gf join factor as f on gf.name=f.id join ghg_category as gc on gc.id=gf.ghg_category_id where gf.id='" . $max_est_arr[0]['factor_id'] . "'||f.id='" . $max_est_arr[0]['factor_id'] . "'")->getResultArray();

                        // echo $db->getLastquery($fact_name_arr);







                        // DIE();

                        $fact_name = "";



                        $ghg_cat_name = "";



                        if ($fact_name_arr) {



                            $fact_name = $fact_name_arr[0]['factor_name'];



                            $ghg_cat_name = $fact_name_arr[0]['ghg_category_name'];
                        }



                        $temp = [];



                        $temp['value'] = $max_est_arr[0]['mest'];



                        $temp['ghg_name'] = $ghg['ghg_name'];



                        $temp['factor_name'] = $fact_name;



                        $temp['ghg_category_name'] = $ghg_cat_name;



                        $top_in_each_stage[] = $temp;
                    }
                }
            }
        }



        $data['top_in_each_stage'] = $top_in_each_stage;



        $ghg_category = $db->query("select * from ghg_category where status=1")->getResultArray();



        $category_footprint = [];



        $category_name = [];



        if ($data['total_footprint'] != 0) {



            if ($ghg_category) {



                foreach ($ghg_category as $gc) {



                    $ghg = $db->query("select * from ghg where ghg_category_id=" . $gc['id'] . " and footprint_id=1 and status=1 order by id DESC")->getResultArray();



                    //echo $db->getLastquery($ghg);





                    $total_cat_footprint = 0;



                    if ($ghg) {



                        foreach ($ghg as $g) {



                            $estimate_arr = $db->query("select sum(estimate) as est from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $g['id'])->getResultArray();

                            //echo $db->getLastquery($ghg);

                            if ($estimate_arr) {



                                if ($estimate_arr[0]['est']) {



                                    $total_cat_footprint = $total_cat_footprint + $estimate_arr[0]['est'];
                                }
                            }
                        }
                    }



                    $category_footprint[] = round(($total_cat_footprint / $data['total_footprint']) * 100);



                    $temp = [];



                    $temp['value'] = ($total_cat_footprint / $data['total_footprint']) * 100;



                    $temp['name'] = $gc['ghg_category_name'];



                    $category_name[] = $temp;
                }
            }
        }



        $data['category_footprint'] = $category_footprint;



        $data['category_name'] = $category_name;



        $ghg_name = [];



        $ghg_val = [];

        $ghg_name2 = [];



        $ghg_val3 = [];



        if ($data['ghg']) {



            foreach ($data['ghg'] as $g) {



                if ($g['ghg_name'] != "Welcome") {



                    $foot_per = 0;



                    if ($data['supp_assess']['is_submit'] == 1) {



                        if ($g['id'] == 17) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_building_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }





                        if ($g['id'] == 28) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_WATER_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        // if($g['id']==18) {



                        //     $ghg_name[] = $g['ghg_name'];



                        //     $ghg_val[] = ($data['tot_flight_footprint']*100)/$data['supp_assess']['total_footprint'];



                        // }



                        if ($g['id'] == 29) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_Consumables_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        if ($g['id'] == 20) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_mobile_fuel_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }
                    }
                }
            }

            if (!empty($ghg_name)) {

                $ghg_name2[] = $ghg_name[0];

                $ghg_name2[] = $ghg_name[2];

                $ghg_name2[] = $ghg_name[3];

                $ghg_name2[] = $ghg_name[1];



                $ghg_val3[] = $ghg_val[0];

                $ghg_val3[] = $ghg_val[2];

                $ghg_val3[] = $ghg_val[3];

                $ghg_val3[] = $ghg_val[1];
            }
        }



        $query = $db->query("select * from vehicle where status=1 and footprint_id=1 and vehicle_name not in ('Heavy Goods Vehicles','Heavy Goods Vehicles Refrigerated','Vans')");



        $data['land_vehicle'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['land_vehicle']);



        // die();

        // print_r($ghg_name);



        $data['ghg_name'] = $ghg_name2;



        $data['ghg_val'] = $ghg_val3;



        $query = $db->query("select * from sub_units where status=1");



        $data['sub_units'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['ghg_factor']);



        // die();



        echo view('brand/company', $data);
    }

    public function organisationAssessmentSubmit()
    {







        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');





        $date_from = date("Y-m-d", strtotime($this->request->getVar("date_from")));



        $date_to = date("Y-m-d", strtotime($this->request->getVar("date_to")));



        $date_time = date('Y-m-d H:i:s');





        $company_id = $this->request->getVar('company_id');



        $query = $db->query("select * from supplier_assessment where id=" . $company_id);



        $ava = $query->getResultArray();



        if (empty($ava)) {
        } else {







            $ghg_assessment = $db->query("update supplier_assessment set date_from='" . $date_from . "',date_to='" . $date_to . "',datetime='" . $date_time . "' where id=" . $company_id);



            $ghg_assessment_id = $ava[0]['id'];



            // }



        }







        return redirect()->to('brand/organization/' . $company_id);
    }





    public function companyAssessmentSubmit()
    {



        // echo '<pre>';



        // print_r($this->request->getVar());



        // die();



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $country_id = $this->request->getVar("country_id");



        // $no_of_employee = $this->request->getVar("no_of_employee");



        $date_from = date("Y-m-d", strtotime($this->request->getVar("date_from")));



        $date_to = date("Y-m-d", strtotime($this->request->getVar("date_to")));



        $date_time = date('Y-m-d H:i:s');



        //        $emp_work_from_home = $this->request->getVar("emp_work_from_home");



        $company_id = $this->request->getVar('company_id');



        $query = $db->query("select * from supplier_assessment where id=" . $company_id);



        $ava = $query->getResultArray();



        if (empty($ava)) {



            // $ghg_assessment = $db->query("insert into supplier_assessment(assessment_id,footprint_id,supplier_id,country_id,no_of_employee,date_from,date_to,status,datetime)values(10,1,".$supplier_info['supplier_id'].",".$country_id.",".$no_of_employee.",'".$date_from."','".$date_to."',1,'".$date_time."')");



            // $ghg_assessment_id = $db->insertID();



        } else {



            // if($company_id==0 && $ava[0]['is_submit']==1) {



            //     $ghg_assessment = $db->query("insert into supplier_assessment(assessment_id,footprint_id,supplier_id,country_id,no_of_employee,date_from,date_to,status,datetime)values(10,1,".$supplier_info['supplier_id'].",".$country_id.",".$no_of_employee.",'".$date_from."','".$date_to."',1,'".$date_time."')");



            //     $ghg_assessment_id = $db->insertID();



            // }



            // else {



            $ghg_assessment = $db->query("update supplier_assessment set date_from='" . $date_from . "',date_to='" . $date_to . "',datetime='" . $date_time . "' where id=" . $company_id);



            $ghg_assessment_id = $ava[0]['id'];



            // }



        }



        // $query = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");        



        // $ava = $query->getResultArray();



        // if(empty($ava)) {



        //     $ghg_assessment = $db->query("insert into supplier_assessment(assessment_id,footprint_id,supplier_id,country_id,no_of_employee,date_from,date_to,status,datetime)values(10,1,".$supplier_info['supplier_id'].",".$country_id.",".$no_of_employee.",'".$date_from."','".$date_to."',1,'".$date_time."')");



        //     $ghg_assessment_id = $db->insertID();



        // }



        // else {



        //     $ghg_assessment = $db->query("update supplier_assessment set country_id=".$country_id.",no_of_employee=".$no_of_employee.",date_from='".$date_from."',date_to='".$date_to."',datetime='".$date_time."' where id=".$ava[0]['id']);



        //     $ghg_assessment_id = $ava[0]['id'];



        // }



        // echo $ghg_assessment_id;



        // echo $company_id;



        // die();



        // echo '<pre>';



        // print_r($data['ghg_factor']);



        // die();



        return redirect()->to('brand/company/' . $company_id);
    }

    public function organization($assessment_id = 0)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');

        $assessment_idd = '12';





        $data['ghg_assessment_id'] = $assessment_id;



        $industry_id = 0;



        $country_id = 0;



        // submit details start





        $supp_assess = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=" . $assessment_idd . " order by id desc")->getRowArray();



        // $data['supp_assess'] = $supp_assess;



        //   echo '<pre>';



        // print_r($data['supp_assess']);



        // die();

        //         // submit details end 























        $data['pg_nm'] = 'Organization';











        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];
            }
        }



        if ($assessment_id) {



            $query = $db->query("select country_id from supplier_assessment where id=" . $assessment_idd);



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                if ($supp_ass[0]['country_id']) {



                    $country_id = $supp_ass[0]['country_id'];
                }
            }
        }



        $data['completed_module_count'] = 0;



        $data['total_company_footprint'] = 0;



        if ($assessment_id) {



            $query = $db->query("select count(distinct(ghg_id)) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['completed_module_count'] = $rs[0]['cnt'];
            }



            $query = $db->query("select sum(estimate) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['total_company_footprint'] = $rs[0]['cnt'];
            }
        }



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



        $query = $db->query("select * from assessment where id=12 order by id ");



        $data['assessment'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1 ");



        $data['country'] = $query->getResultArray();



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_idd);



        $data['ghg_assessment'] = $query->getResultArray();



        $query = $db->query("select * from ghg where footprint_id=5 and status=1");



        $data['ghg'] = $query->getResultArray();

        // $assessment_id='12';

        //        $query = $db->query("select * from ghg_factor where status=1 and type=1");



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor'] = $query->getResultArray();



        $query1 = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor1'] = $query1->getResultArray();

        $query12 = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor12'] = $query12->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $data['ghg_assessment_detail'] = $query->getResultArray();



        $query1 = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $data['ghg_assessment_detail1'] = $query1->getResultArray();

        $query12 = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");





        $data['ghg_assessment_detail12'] = $query12->getResultArray();



        $query123 = $db->query("select f.id,f.finance_name,fsc.id,fsc.sub_category,gof.estimate from ghg_assessment as gof join finance as f on gof.financeid=f.id join Finance_Sub_Category as fsc on gof.subFinanceid=fsc.id where gof.supplier_id=" . $supplier_info['supplier_id'] . " and gof.supplier_assessment_id='" . $assessment_id . "'and gof.ghg_id=27");





        $data['ghg_assessment_detail123'] = $query123->getResultArray();



        // echo '<pre>';



        // print_r($data['ghg_factor12']);



        // die();





        //Business Travel start

        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=18");



        $total_flight_footprint_arr = $query->getResultArray();



        $data['tot_flight_footprint'] = 0;



        if ($total_flight_footprint_arr) {



            $data['tot_flight_footprint'] = $total_flight_footprint_arr[0]['tot'];
        }



        // Business Travel end



        //Company Vehicle start

        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=19");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $data['tot_company_vehicle_footprint'] = 0;



        if ($total_company_vehicle_footprint_arr) {



            $data['tot_company_vehicle_footprint'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        // Company Vehicle end





        //Financial start

        $query1 = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=27");



        $total_finance_footprint_arr = $query1->getResultArray();



        $data['total_finance_fuel_footprint'] = 0;



        if ($total_finance_footprint_arr) {



            $data['total_finance_fuel_footprint'] = $total_finance_footprint_arr[0]['tot'];
        }

        // Financial end





        //  Consumables start

        $query12 = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=29");



        $total_Consumables_footprint_arr = $query12->getResultArray();



        // echo $db->getLastquery($total_WATER_footprint_arr);

        $data['tot_Consumables_footprint'] = 0;



        if ($total_Consumables_footprint_arr) {



            $data['tot_Consumables_footprint'] = $total_Consumables_footprint_arr[0]['tot'];
        }

        // Consumables end

        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=27");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();



        $data['tot_mobile_fuel_footprint'] = 0;



        if ($total_mobile_fuel_footprint_arr) {



            $data['tot_mobile_fuel_footprint'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        // $query = $db->query("select distinct(vehicle) from company_vehicle_detail where status=1");



        $query = $db->query("select distinct(cvd.vehicle),v.vehicle_name,v.id as vid from company_vehicle_detail as cvd join vehicle as v on cvd.vehicle=v.id where cvd.status=1");



        $data['comp_vehicle'] = $query->getResultArray();



        $query = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=$assessment_idd");



        $supplier_assessment = $query->getResultArray();

        // organisatiom assistes id start

        //  $query = $db->query("select * from supplier_assessment where id=".$assessment_id);



        // $supplier_assessment = $query->getResultArray();

        // end 



        //   echo '<pre>';



        // print_r($assessment_id);



        // die();







        if ($supplier_assessment) {



            $data['supp_assess'] = $supplier_assessment[0];
        }

        $data['supp_assess1'] = [];



        if ($supplier_assessment) {



            $data['supp_assess1'] = $supplier_assessment[0];
        }





        // echo '<pre>';



        // print_r($data['supp_assess']);



        // die();



        $data['offset'] = $db->query("select * from assessment_offset where status=1")->getResultArray();



        $data['degree'] = $db->query('select * from degree where status=1')->getResultArray();



        $data['flight_class'] = $db->query('select distinct(flight_class) from flight_detail where status=1')->getResultArray();



        $stages = [];



        $total_footprint_arr = $db->query("select sum(estimate) as est from ghg_assessment where supplier_assessment_id=" . $assessment_id)->getResultArray();



        $data['total_footprint'] = 0;



        if ($total_footprint_arr) {



            $data['total_footprint'] = $total_footprint_arr[0]['est'];
        }



        if ($data['total_footprint'] != 0) {







            $stages[1] = [];



            $stages[1]['value'] = round((($data['tot_flight_footprint'] / $data['total_footprint']) * 100));



            $stages[1]['name'] = 'Business Flights';



            $stages[2] = [];



            $stages[2]['value'] = round((($data['tot_company_vehicle_footprint'] / $data['total_footprint']) * 100));



            $stages[2]['name'] = 'Company Vehicle';



            $stages[3] = [];



            $stages[3]['value'] = round((($data['tot_mobile_fuel_footprint'] / $data['total_footprint']) * 100));



            $stages[3]['name'] = 'Mobile Fuel';
        }



        $data['stages'] = $stages;



        $top_in_each_stage = [];



        $total_top_stage_footprint = 0;



        if ($data['ghg']) {



            foreach ($data['ghg'] as $ghg) {



                $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();



                if ($top_ghg_estimate_arr) {



                    if ($top_ghg_estimate_arr[0]['mest']) {



                        $total_top_stage_footprint = $total_top_stage_footprint + $top_ghg_estimate_arr[0]['mest'];
                    }
                }
            }
        }



        if ($data['ghg']) {



            foreach ($data['ghg'] as $ghg) {



                $max_est_arr = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();



                if ($max_est_arr) {



                    if ($max_est_arr[0]['mest']) {



                        $fact_name_arr = $db->query("select gf.name,f.factor_name,gc.ghg_category_name from ghg_factor as gf join factor as f on gf.name=f.id join ghg_category as gc on gc.id=gf.ghg_category_id where gf.id='" . $max_est_arr[0]['factor_id'] . "'||f.id='" . $max_est_arr[0]['factor_id'] . "'")->getResultArray();





                        //echo $db->getlastquery($fact_name_arr);

                        // die();

                        $fact_name = "";



                        $ghg_cat_name = "";



                        if ($fact_name_arr) {



                            $fact_name = $fact_name_arr[0]['factor_name'];



                            $ghg_cat_name = $fact_name_arr[0]['ghg_category_name'];
                        }



                        $temp = [];



                        $temp['value'] = number_format(($max_est_arr[0]['mest']), 3, ".", "");



                        $temp['ghg_name'] = $ghg['ghg_name'];



                        $temp['factor_name'] = $fact_name;



                        $temp['ghg_category_name'] = $ghg_cat_name;



                        $top_in_each_stage[] = $temp;
                    }
                }
            }
        }







        $data['top_in_each_stage'] = $top_in_each_stage;



        $ghg_category = $db->query("select * from ghg_category where status=1")->getResultArray();



        $category_footprint = [];



        $category_name = [];



        if ($data['total_footprint'] != 0) {



            if ($ghg_category) {



                foreach ($ghg_category as $gc) {



                    $ghg = $db->query("select * from ghg where ghg_category_id=" . $gc['id'] . " and footprint_id=5 and status=1")->getResultArray();



                    $total_cat_footprint = 0;



                    if ($ghg) {



                        foreach ($ghg as $g) {



                            $estimate_arrfin = $db->query("select id,max(estimate) as est from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $g['id'])->getResultArray();



                            $estimate_arr = $db->query("select id,max(estimate) as est from ghg_assessment where estimate='" . $estimate_arrfin[0]['est'] . "' and supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $g['id'])->getResultArray();

                            // print_r($estimate_arr);

                            // die();



                            if ($estimate_arr) {



                                if ($estimate_arr[0]['est']) {



                                    $total_cat_footprint = $total_cat_footprint + $estimate_arr[0]['est'];
                                }
                            }
                        }
                    }



                    $category_footprint[] = round(($total_cat_footprint / $data['total_footprint']) * 100);



                    $temp = [];



                    $temp['value'] = ($total_cat_footprint / $data['total_footprint']) * 100;



                    $temp['name'] = $gc['ghg_category_name'];



                    $category_name[] = $temp;
                }
            }
        }



        $data['category_footprint'] = $category_footprint;



        $data['category_name'] = $category_name;



        $ghg_name = [];



        $ghg_val = [];



        if ($data['ghg']) {



            foreach ($data['ghg'] as $g) {



                if ($g['ghg_name'] != "Welcome") {



                    $foot_per = 0;



                    if ($data['supp_assess']['is_submit'] == 1) {





                        // Financial 

                        if ($g['id'] == 27) {



                            //  finance



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format((($data['total_finance_fuel_footprint'] * 100) / $data['supp_assess']['total_footprint']), 3, ".", ".");
                        }









                        if ($g['id'] == 18) {



                            // Business Travel

                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format((($data['tot_flight_footprint'] * 100) / $data['supp_assess']['total_footprint']), 3, ".", ".");
                        }



                        if ($g['id'] == 19) {



                            // Company 

                            $ghg_name[] = $g['ghg_name'];

                            $ghg_val[] = number_format((($data['tot_company_vehicle_footprint'] * 100) / $data['supp_assess']['total_footprint']), 3, ".", ".");
                        }
                    }
                }
            }
        }



        $query = $db->query("select * from vehicle where status=1 and footprint_id=5 and vehicle_name not in ('Heavy Goods Vehicles','Heavy Goods Vehicles Refrigerated','Vans')");



        $data['land_vehicle'] = $query->getResultArray();

        //echo $db->getLastquery($data['land_vehicle']);



        // echo '<pre>';



        // print_r($data['land_vehicle']);



        // die();



        $data['ghg_name'] = $ghg_name;



        $data['ghg_val'] = $ghg_val;



        $query = $db->query("select * from sub_units where status=1");



        $data['sub_units'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['ghg_factor']);



        // die();



        echo view('brand/organization', $data);
    }









    public function buildingAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $ghg_assessment_id = 0;



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                // $country_id = $supplier[0]['country_id'];



            }
        }



        if (!empty($this->request->getVar())) {



            $ghg_id = $this->request->getVar('ghg_id');



            $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



            if ($ghg_assessment_id) {



                $query = $db->query("select country_id from supplier_assessment where id=" . $ghg_assessment_id);



                $supp_ass = $query->getResultArray();



                if ($supp_ass) {



                    if ($supp_ass[0]['country_id']) {



                        $country_id = $supp_ass[0]['country_id'];
                    }
                }
            }



            $factor_arr = $this->request->getVar('factor');



            $qty_arr = $this->request->getVar('qty');



            $unit_arr = $this->request->getVar('unit');



            $emission_factor_arr = $this->request->getVar('emission_factor');



            $estimate = 0;



            $total_footprint = 0;



            if ($qty_arr) {



                foreach ($qty_arr as $key => $qty) {



                    if (!empty($qty)) {



                        $estimate = ($qty * $emission_factor_arr[$key]);



                        $unit_nm = "";



                        if ($unit_arr[$key]) {



                            $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                            $unit_nm = $unit_arr[$key];



                            $sub_unit = $query->getResultArray();



                            if ($sub_unit) {



                                $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                                $estimate = eval('return ' . $estimate . ';');



                                $unit_nm = $sub_unit[0]['sub_unit_name'];
                            }
                        }



                        $total_footprint = $total_footprint + $estimate;



                        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $factor_arr[$key]);



                        $ava = $query->getResultArray();



                        if (empty($ava)) {



                            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $factor_arr[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ")");
                        } else {



                            $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "' where id=" . $ava[0]['id']);
                        }
                    }
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);
        } else {



            $query = $db->query("select country_id,no_of_employee from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=10");



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                $query = $db->query("select emission_factor from countries where id=" . $supp_ass[0]['country_id']);



                $country_emission_factor_arr = $query->getResultArray();



                if ($country_emission_factor_arr) {



                    $total_footprint = $country_emission_factor_arr[0]['emission_factor'] * $supp_ass[0]['no_of_employee'];
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=10");
        }



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");

        // echo $db->getLastquery($query);

        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 17) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e:' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=17");



        $total_building_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_footprint_arr) {



            $arr['tot'] = $total_building_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }



    public function waterAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $ghg_assessment_id = 0;



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                // $country_id = $supplier[0]['country_id'];



            }
        }



        if (!empty($this->request->getVar())) {



            $ghg_id = $this->request->getVar('ghg_id');



            $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



            if ($ghg_assessment_id) {



                $query = $db->query("select country_id from supplier_assessment where id=" . $ghg_assessment_id);



                $supp_ass = $query->getResultArray();



                if ($supp_ass) {



                    if ($supp_ass[0]['country_id']) {



                        $country_id = $supp_ass[0]['country_id'];
                    }
                }
            }



            $factor_arr = $this->request->getVar('factor');



            $qty_arr = $this->request->getVar('qty');



            $unit_arr = $this->request->getVar('unit');



            $emission_factor_arr = $this->request->getVar('emission_factor');



            $estimate = 0;



            $total_footprint = 0;



            if ($qty_arr) {



                foreach ($qty_arr as $key => $qty) {



                    if (!empty($qty)) {



                        $estimate = ($qty * $emission_factor_arr[$key]);



                        $unit_nm = "";



                        if ($unit_arr[$key]) {



                            $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                            $unit_nm = $unit_arr[$key];



                            $sub_unit = $query->getResultArray();



                            if ($sub_unit) {



                                $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                                $estimate = eval('return ' . $estimate . ';');



                                $unit_nm = $sub_unit[0]['sub_unit_name'];
                            }
                        }



                        $total_footprint = $total_footprint + $estimate;



                        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $factor_arr[$key]);



                        $ava = $query->getResultArray();



                        if (empty($ava)) {



                            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $factor_arr[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ")");

                            // echo $db->getLastquery($ghg_assessment_detail);

                        } else {



                            $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "' where id=" . $ava[0]['id']);
                        }
                    }
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);
        } else {



            $query = $db->query("select country_id,no_of_employee from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=10");



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                $query = $db->query("select emission_factor from countries where id=" . $supp_ass[0]['country_id']);



                $country_emission_factor_arr = $query->getResultArray();



                if ($country_emission_factor_arr) {



                    $total_footprint = $country_emission_factor_arr[0]['emission_factor'] * $supp_ass[0]['no_of_employee'];
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=10");
        }



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");

        // echo $db->getLastquery($query);

        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        $query1 = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail1 = $query1->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 28) {



                    if ($ghg_assessment_detail1) {



                        foreach ($ghg_assessment_detail1 as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e:' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=28");



        $total_building_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_footprint_arr) {



            $arr['tot'] = $total_building_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }

    public function flightAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_plan_id = 0;



        if ($supplier_info) {



            $supplier_plan_arr = $db->query("select supplier_plan_id as spid from supplier where id=" . $supplier_info['supplier_id'])->getResultArray();



            if ($supplier_plan_arr) {



                $supplier_plan_id = $supplier_plan_arr[0]['spid'];
            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $trip_status = $this->request->getVar('trip_status');



        $people = $this->request->getVar('people');



        $night = $this->request->getVar('nights');



        $trip_from = $this->request->getVar('trip_from');



        $trip_to = $this->request->getVar('trip_to');



        $total_emission_flight = $this->request->getVar("total_emission_flight");



        $distance = $this->getDistance($trip_from, $trip_to, "K");



        $trip_class = $this->request->getVar('trip_class');



        $trip_count = 1;



        $emission_factor = 0;



        $trip_class_name = "";



        $flight_class_factor_id = 0;



        $flight_detail_arr = $db->query("select * from flight_detail where '" . $distance . "' between from_distance and to_distance and flight_class='" . $trip_class . "' and status=1")->getResultArray();



        if ($flight_detail_arr) {



            $flight_class_factor_id = $flight_detail_arr[0]['ghg_factor_id'];
        }



        $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id=" . $flight_class_factor_id)->getResultArray();



        if ($emission_factor_arr) {



            $emission_factor = $emission_factor_arr[0]['emission_factor'];
        }



        $no_of_entry = 0;



        $no_of_entry_arr = $db->query("select no_of_entry as noe from supplier_plan_assessment_ghg_details where supplier_plan_id='" . $supplier_plan_id . "' and assessment_id=10 and status=1 and ghg_id=" . $ghg_id)->getResultArray();



        if ($no_of_entry_arr) {



            $no_of_entry = $no_of_entry_arr[0]['noe'];
        }



        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and supplier_id=" . $supplier_info['supplier_id']);



        $ava = $query->getResultArray();



        if (count($ava) < $no_of_entry) {



            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,trip_status,trip_from,trip_to,trip_class,trip_count,people,nights,estimate,factor_id) values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $trip_status . ",'" . $trip_from . "','" . $trip_to . "','" . $trip_class . "'," . $trip_count . ",'" . $people . "','" . $night . "'," . ($total_emission_flight) . "," . $flight_class_factor_id . ")");
        }



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $ghg_assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 18) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = $gd['estimate'] . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . ' CO2e : 
                    
                    

                    </span> from ' . $gd['trip_from'] . ' to ' . $gd['trip_to'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeFlightFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        if (count($ava) >= $no_of_entry) {



            $data .= '<div class="alert alert-success custom_alert" role="alert"><span style="color:red;">Either you do not have permission to calculate or you have reached at your plan limit<span></div>';
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=18");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);



        // if(empty($ava)) {



        //     $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,trip_status,trip_from,trip_to,trip_class,trip_count) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$trip_status.",'".$trip_from."','".$trip_to."','".$trip_class."',".$trip_count.")");



        // }



        // else {



        //     $db->query("update ghg_assessment set trip_status=".$trip_status.",trip_from='".$trip_from."',trip_to='".$trip_to."',trip_class='".$trip_class."',trip_count=".$trip_count." where id=".$ava[0]['id']);



        // }



        // echo 'success';



    }

    public function companyVehicleAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_plan_id = 0;



        if ($supplier_info) {



            $supplier_plan_arr = $db->query("select supplier_plan_id as spid from supplier where id=" . $supplier_info['supplier_id'])->getResultArray();



            if ($supplier_plan_arr) {



                $supplier_plan_id = $supplier_plan_arr[0]['spid'];
            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $mileage = $this->request->getVar('mileage');



        $vehicle = $this->request->getVar('vehicle');



        $vehicle_info_1 = $this->request->getVar('vehicle_info_1');



        $vehicle_info_2 = $this->request->getVar('vehicle_info_2');



        $vehicle_info_3 = $this->request->getVar('vehicle_info_3');



        $vehicle_info_4 = $this->request->getVar('vehicle_info_4');



        // $efficiency = $this->request->getVar('efficiency');



        $company_vehicle_factor = $this->request->getVar("company_vehicle_factor");



        $cv_emission_factor = 0;



        $estimate = 0;



        // if($vehicle) {



        // $query = $db->query("select emission_factor from company_vehicle_detail where vehicle=".$vehicle." and year='".$vehicle_info_1."' and type='".$vehicle_info_2."' and model='".$vehicle_info_3."' and efficiency='".$efficiency."' and status=1");



        // $cv_emission_factor_arr = $query->getResultArray();



        // if($cv_emission_factor_arr) {



        //     $cv_emission_factor = $cv_emission_factor_arr[0]['emission_factor'];



        //     $estimate = (2*$mileage)+($cv_emission_factor*$efficiency);



        // }



        // }



        $query = $db->query("select emission_factor from ghg_factor where id=" . $company_vehicle_factor);



        $cv_emission_factor_arr = $query->getResultArray();



        if ($cv_emission_factor_arr) {



            $cv_emission_factor = $cv_emission_factor_arr[0]['emission_factor'];



            $estimate = $mileage * $cv_emission_factor;
        }



        $no_of_entry = 0;



        $no_of_entry_arr = $db->query("select no_of_entry as noe from supplier_plan_assessment_ghg_details where supplier_plan_id='" . $supplier_plan_id . "' and assessment_id=10 and status=1 and ghg_id=" . $ghg_id)->getResultArray();



        if ($no_of_entry_arr) {



            $no_of_entry = $no_of_entry_arr[0]['noe'];
        }



        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and supplier_id=" . $supplier_info['supplier_id']);



        $ava = $query->getResultArray();



        if (count($ava) < $no_of_entry) {



            // $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,vehicle_mileage,vehicle,vehicle_info_1,vehicle_info_2,vehicle_info_3,vehicle_efficience,estimate) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$mileage.",'".$vehicle."','".$vehicle_info_1."','".$vehicle_info_2."','".$vehicle_info_3."',".$efficiency.",".$estimate.")");            



            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,vehicle_mileage,estimate,vehicle_info_1,vehicle_info_2,vehicle_info_3,vehicle,factor_id) values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $mileage . "," . $estimate . ",'" . $vehicle_info_1 . "','" . $vehicle_info_2 . "','" . $vehicle_info_3 . "','" . $vehicle . "'," . $company_vehicle_factor . ")");
        }



        // if(empty($ava)) {



        //     $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,vehicle_mileage,vehicle,vehicle_info_1,vehicle_info_2,vehicle_info_3,vehicle_info_4,vehicle_efficience) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$mileage.",'".$vehicle."','".$vehicle_info_1."','".$vehicle_info_2."','".$vehicle_info_3."','".$vehicle_info_4."',".$efficiency.")");



        // }



        // else {



        //     $db->query("update ghg_assessment set vehicle_mileage=".$mileage.",vehicle='".$vehicle."',vehicle_info_1='".$vehicle_info_1."',vehicle_info_2='".$vehicle_info_2."',vehicle_info_3='".$vehicle_info_3."',vehicle_info_4='".$vehicle_info_4."',vehicle_efficience=".$efficiency." where id=".$ava[0]['id']);



        // }



        // echo 'success';        



        // die();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $ghg_assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 19) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = ($gd['estimate']) . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                    
                    

                    </span> CO2e :for mileage=' . $gd['vehicle_mileage'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeCompanyVehicleFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        if (count($ava) >= $no_of_entry) {



            $data .= '<div class="alert alert-success custom_alert" role="alert"><span style="color:red;">Either you do not have permission to calculate or you have reached at your plan limit<span></div>';
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=19");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }



    public function mobileFuelSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                // $country_id = $supplier[0]['country_id'];



            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        if ($ghg_assessment_id) {



            $query = $db->query("select country_id from supplier_assessment where id=" . $ghg_assessment_id);



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                if ($supp_ass[0]['country_id']) {



                    $country_id = $supp_ass[0]['country_id'];
                }
            }
        }



        $factor_arr = $this->request->getVar('mf_factor');



        $qty_arr = $this->request->getVar('mf_qty');



        $unit_arr = $this->request->getVar('mf_unit');



        $emission_factor_arr = $this->request->getVar('mf_emission_factor');



        $estimate = 0;



        $total_footprint = 0;



        $query = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and footprint_id=1 and assessment_id=10");



        $footprint = $query->getResultArray();



        if ($footprint) {



            $total_footprint = $footprint[0]['total_footprint'];
        }



        if ($qty_arr) {



            foreach ($qty_arr as $key => $qty) {



                if (!empty($qty)) {



                    $query = $db->query("select * from ghg_factor where id='" . $factor_arr[$key] . "'");



                    $emission_factor_arr = $query->getResultArray();



                    $emission_factor = 0;



                    if ($emission_factor_arr) {



                        $emission_factor = $emission_factor_arr[0]['emission_factor'];
                    }



                    $estimate = ($qty * $emission_factor);



                    $unit_nm = "";



                    if ($unit_arr[$key]) {



                        $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                        $unit_nm = $unit_arr[$key];



                        $sub_unit = $query->getResultArray();



                        if ($sub_unit) {



                            $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                            $estimate = eval('return ' . $estimate . ';');



                            $unit_nm = $sub_unit[0]['sub_unit_name'];
                        }
                    }



                    $total_footprint = $total_footprint + $estimate;



                    $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $factor_arr[$key]);



                    $ava = $query->getResultArray();



                    if (empty($ava)) {



                        $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $factor_arr[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ")");
                    } else {



                        $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "' where id=" . $ava[0]['id']);
                    }
                }
            }
        }







        //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



        $tot_footprint_arr = $db->query("select sum(estimate) as tot_foot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id)->getResultArray();



        if ($tot_footprint_arr) {



            $total_footprint = $tot_footprint_arr[0]['tot_foot'];
        }



        $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 20) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeMobileFuelFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=20");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_mobile_fuel_footprint_arr) {



            $arr['tot'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }



    public function mobileFuelfinanSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                // $country_id = $supplier[0]['country_id'];



            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        if ($ghg_assessment_id) {



            $query = $db->query("select country_id from supplier_assessment where id=" . $ghg_assessment_id);



            $supp_ass = $query->getResultArray();



            if ($supp_ass) {



                if ($supp_ass[0]['country_id']) {



                    $country_id = $supp_ass[0]['country_id'];
                }
            }
        }



        $financeCat = $this->request->getVar('financeCat');



        $financeSubCat = $this->request->getVar('data');



        // print_r($financeCat);

        $ghg_factor = $this->request->getVar('ghg_factor');





        $factor_arr = $this->request->getVar('mf_factor');



        $qty_arr = $this->request->getVar('mf_qty');



        $unit_arr = $this->request->getVar('mf_unit');



        $emission_factor_arr = $this->request->getVar('mf_emission_factor');



        $estimate = 0;



        $total_footprint = 0;



        // $query = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and footprint_id=1 and assessment_id=12");

        $query = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . "  and assessment_id=12");



        $footprint = $query->getResultArray();



        if ($footprint) {



            $total_footprint = $footprint[0]['total_footprint'];
        }



        if ($qty_arr) {



            foreach ($qty_arr as $key => $qty) {



                if (!empty($qty)) {



                    $j = count($financeSubCat);





                    for ($x = 0; $x < $j; $x++) {

                        $ghg = $x;

                        $qyt = $x;

                        $qty = $qty_arr[$qyt];

                        $sub = $x;

                        $cat = $x;



                        $finance_nn = "";







                        $financesub_nn = "";



                        $finance_nn = $financeCat[$cat];

                        $financesub_nn = $financeSubCat[$sub];





                        $query = $db->query("select * from ghg_factor where name='" . $ghg_factor[$ghg] . "'");



                        $emission_factor_arr = $query->getResultArray();



                        $emission_factor = 0;





                        if ($emission_factor_arr) {



                            $emission_factor = $emission_factor_arr[0]['emission_factor'];

                            // print_r($emission_factor);



                        }



                        $estimate = ($qty_arr[$qyt] * $emission_factor);



                        $unit_nm = "";



                        if ($unit_arr[$key]) {



                            $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                            $unit_nm = $unit_arr[$key];



                            $sub_unit = $query->getResultArray();



                            if ($sub_unit) {



                                $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                                $estimate = eval('return ' . $estimate . ';');



                                $unit_nm = $sub_unit[0]['sub_unit_name'];
                            }
                        }











                        $total_footprint = $total_footprint + $estimate;













                        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $ghg_factor[$key] . " and subFinanceid='" . $financesub_nn . "'  ");





                        $ava = $query->getResultArray();



                        // echo $db->getLastquery($ava);





                        if (empty($ava)) {







                            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,financeid,subFinanceid,ghg_id,factor_id,unit,quantity,estimate)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . ",'" . $finance_nn . "','" . $financesub_nn . "'," . $ghg_id . "," . $ghg_factor[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ")");

                            // echo $db->getlastquery($ghg_assessment_detail);

                        } else {



                            $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "' where id=" . $ava[0]['id']);
                        }
                    }
                }
            }
        }







        //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



        $tot_footprint_arr = $db->query("select sum(estimate) as tot_foot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id)->getResultArray();



        if ($tot_footprint_arr) {



            $total_footprint = $tot_footprint_arr[0]['tot_foot'];
        }



        $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        // echo $db->getlastquery($ghg_factor);



        $query = $db->query("select ga.*,fs.sub_category from ghg_assessment as ga JOIN Finance_Sub_Category as fs on ga.subFinanceid = fs.id where ga.supplier_id=" . $supplier_info['supplier_id'] . " and ga.supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        //  echo $db->getlastquery($ghg_assessment_detail);



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 27) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {

                            // echo $gf['id']."vr".$gd['factor_id'];



                            if ($gf['name'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit'] . ' in  ' . $gf['factor_name'] . ' for ' . $gd['sub_category'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeMobileFuelFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';



                                // echo $ghg_assessment_detail;



                            }
                        }
                    }
                }
            }
        }



        //  echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=27");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_mobile_fuel_footprint_arr) {



            $arr['tot'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }







    public function products($assessment_id = 0)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $data['ghg_assessment_id'] = $assessment_id;



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {





                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $data['completed_module_count'] = 0;



        $data['total_product_footprint'] = 0;



        if ($assessment_id) {



            $query = $db->query("select count(distinct(ghg_id)) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['completed_module_count'] = $rs[0]['cnt'];
            }



            $query = $db->query("select * from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['completed_module_count'] = $data['completed_module_count'] + 1;
            }



            $query = $db->query("select sum(estimate) as cnt from ghg_assessment where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['total_product_footprint'] = $rs[0]['cnt'];
            }



            $query = $db->query("select sum(estimate) as cnt from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id);



            $rs = $query->getResultArray();



            if ($rs) {



                $data['total_product_footprint'] = $data['total_product_footprint'] + $rs[0]['cnt'];
            }
        }



        // $query = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



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



        $query = $db->query("select * from assessment where id=11 order by id ");



        $data['assessment'] = $query->getResultArray();



        $query = $db->query("select * from countries where status=1 ");



        $data['country'] = $query->getResultArray();



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_id);



        $data['ghg_assessment'] = $query->getResultArray();



        $query = $db->query("select * from ghg where footprint_id=2 and status=1");



        $data['ghg'] = $query->getResultArray();



        //        $query = $db->query("select * from ghg_factor where status=1 and type=2");



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $data['ghg_factor'] = $query->getResultArray();



        $query = $db->query("select ga.*,gf.name,f.factor_name,f.factor_unit,u.unit_name from ghg_assessment as ga left join ghg_factor as gf on gf.id=ga.factor_id left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id  where ga.supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by ga.id asc");



        $data['ghg_assessment_detail'] = $query->getResultArray();



        // echo '<pre>';



        // print_r($data['ghg_assessment_detail']);



        // die();



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=22");



        $total_transport_footprint_arr = $query->getResultArray();



        $data['tot_transport_footprint'] = 0;



        if ($total_transport_footprint_arr) {



            $data['tot_transport_footprint'] = $total_transport_footprint_arr[0]['tot'];
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=21");



        $total_building_footprint_arr = $query->getResultArray();



        $data['tot_building_footprint'] = 0;



        if ($total_building_footprint_arr) {



            $data['tot_building_footprint'] = $total_building_footprint_arr[0]['tot'];
        }





        $query = $db->query("select sum(estimate) as tot from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id . " and ghg_id=23 group by supplier_assessment_id");



        // changes made here

        $total_manufacturing_footprint_arr = $query->getResultArray();





        $data['tot_manufacturing_footprint'] = 0;



        if ($total_manufacturing_footprint_arr) {





            $data['tot_manufacturing_footprint'] = $total_manufacturing_footprint_arr[0]['tot'];
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=24");



        $total_manufacturing2_footprint_arr = $query->getResultArray();



        $data['tot_manufacturing2_footprint'] = 0;



        if ($total_manufacturing2_footprint_arr) {



            $data['tot_manufacturing2_footprint'] = $total_manufacturing2_footprint_arr[0]['tot'];
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=25");



        $total_manufacturing3_footprint_arr = $query->getResultArray();



        $data['tot_manufacturing3_footprint'] = 0;



        if ($total_manufacturing3_footprint_arr) {



            $data['tot_manufacturing3_footprint'] = $total_manufacturing3_footprint_arr[0]['tot'];
        }



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_id);



        $supplier_assessment = $query->getResultArray();



        $data['supp_assess'] = [];



        if ($supplier_assessment) {



            $data['supp_assess'] = $supplier_assessment[0];
        }



        $data['offset'] = $db->query("select * from assessment_offset where status=1")->getResultArray();



        $data['degree'] = $db->query("select * from degree where status=1")->getResultArray();



        $query = $db->query("select distinct(cvd.vehicle_id),v.vehicle_name,v.id as vid from transportation_detail as cvd join vehicle as v on cvd.vehicle_id=v.id where cvd.status=1");



        $data['comp_vehicle'] = $query->getResultArray();



        $data['supplier_manufacturing_process'] = $db->query("select smp.*,gf.name,f.factor_name from supplier_manufacturing_process as smp join ghg_factor as gf on smp.raw_material_id=gf.id join factor as f on f.id=gf.name where smp.supplier_id=" . $supplier_info['supplier_id'] . " and smp.supplier_assessment_id=" . $assessment_id . " and smp.ghg_id=23 and smp.status=1")->getResultArray();



        $stages = [];



        $total_footprint_arr = $db->query("select sum(estimate) as est from ghg_assessment where supplier_assessment_id=" . $assessment_id)->getResultArray();



        $data['total_footprint'] = 0;



        if ($total_footprint_arr) {



            $data['total_footprint'] = $total_footprint_arr[0]['est'];
        }





        if ($data['supp_assess']) {



            if ($data['supp_assess']['total_footprint'] != 0) {



                $stages[0] = [];



                $stages[0]['value'] = number_format((($data['tot_building_footprint'] / $data['supp_assess']['total_footprint']) * 100), 2);



                $stages[0]['name'] = 'Raw Materials';



                $stages[1] = [];



                $stages[1]['value'] = number_format((($data['tot_transport_footprint'] / $data['supp_assess']['total_footprint']) * 100), 2);



                $stages[1]['name'] = 'Transport';



                $stages[2] = [];



                $stages[2]['value'] = number_format((($data['tot_manufacturing_footprint'] / $data['supp_assess']['total_footprint']) * 100), 2);



                $stages[2]['name'] = 'Manufacturing';



                $stages[3] = [];



                $stages[3]['value'] = number_format((($data['tot_manufacturing2_footprint'] / $data['supp_assess']['total_footprint']) * 100), 2);



                $stages[3]['name'] = 'Packaging';
            }
        }











        $data['stages'] = $stages;



        $top_in_each_stage = [];



        $total_top_stage_footprint = 0;



        if ($data['ghg']) {



            foreach ($data['ghg'] as $ghg) {



                if ($ghg['id'] == 23) {



                    $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from supplier_manufacturing_process where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();
                } else {



                    $top_ghg_estimate_arr = $db->query("select max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();
                }



                if ($top_ghg_estimate_arr) {



                    if ($top_ghg_estimate_arr[0]['mest']) {



                        $total_top_stage_footprint = $total_top_stage_footprint + $top_ghg_estimate_arr[0]['mest'];
                    }
                }
            }
        }



        if ($total_top_stage_footprint != 0) {



            if ($data['ghg']) {



                foreach ($data['ghg'] as $ghg) {



                    if ($ghg['id'] == 23) {



                        //   new mind start

                        $max_est_arr_man = $db->query("select id,max(estimate) as mest from supplier_manufacturing_process where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();

                        if ($max_est_arr_man[0]['mest'] == "") {



                            $namemest = "55";
                        } else {

                            $namemest = $max_est_arr_man[0]['mest'];
                        }

                        // new mind end

                        $max_est_arr = $db->query("select factor_id,max(estimate) as mest from supplier_manufacturing_process where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'] . " and estimate=" . $namemest)->getResultArray();

                        // $namemest=$max_est_arr_man[0]['mest'];

                        //  echo $db->getLastquery($max_est_arr);



                    } else {



                        $max_est_arr = $db->query("select factor_id,max(estimate) as mest from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $ghg['id'])->getResultArray();

                        //echo $db->getLastquery($max_est_arr);

                    }



                    if ($max_est_arr) {



                        $fact_name = "";



                        $ghg_cat_name = "";

                        if ($max_est_arr[0]['factor_id'] == "") {



                            $namemest = "55";

                            // $fact_name_arrblan=$db->query("SELECT smp.process_name as process_name, MAX(smp.estimate) AS mest, gf.id, gfc.ghg_category_name as scope FROM supplier_manufacturing_process as smp JOIN ghg_factor as gf on smp.ghg_id=gf.ghg_id JOIN ghg_category as gfc on gfc.id=gf.ghg_category_id where gf.status=1 and smp.supplier_id=".$supplier_info['supplier_id']." and smp.supplier_assessment_id='".$assessment_id."'  and smp.estimate='".$namemest."' and smp.ghg_id=".$ghg['id']."")->getResultArray();



                            $fact_name_arrblan = $db->query("SELECT smp.process_name as process_name, MAX(smp.estimate) AS mest, gf.id, gfc.ghg_category_name as scope FROM supplier_manufacturing_process as smp JOIN ghg_factor as gf on smp.ghg_id=gf.ghg_id JOIN ghg_category as gfc on gfc.id=gf.ghg_category_id where gf.status=1 and smp.supplier_id=" . $supplier_info['supplier_id'] . " and smp.supplier_assessment_id='" . $assessment_id . "'  and smp.estimate='" . $namemest . "' and smp.ghg_id=" . $ghg['id'] . "")->getResultArray();



                            //  echo $db->getLastquery($fact_name_arrblan);

                            //  die();

                            if ($fact_name_arrblan) {



                                $fact_name = $fact_name_arrblan[0]['process_name'];



                                $ghg_cat_name = $fact_name_arrblan[0]['scope'];
                            }
                        }

                        if ($max_est_arr[0]['factor_id'] !== "" || !empty($max_est_arr[0]['factor_id'])) {

                            $fact_name_arr = $db->query("select gf.name,f.factor_name,gc.ghg_category_name from ghg_factor as gf join factor as f on gf.name=f.id join ghg_category as gc on gc.id=gf.ghg_category_id where gf.id='" . $max_est_arr[0]['factor_id'] . "'")->getResultArray();

                            // echo $db->getLastquery($fact_name_arr);

                            if ($fact_name_arr) {



                                if ($fact_name_arr) {



                                    $fact_name = $fact_name_arr[0]['factor_name'];



                                    $ghg_cat_name = $fact_name_arr[0]['ghg_category_name'];
                                }
                            }
                        }















                        $temp = [];



                        $temp['value'] = $max_est_arr[0]['mest'];



                        $temp['factor_name'] = $fact_name;



                        $temp['ghg_name'] = $ghg['ghg_name'];



                        $temp['ghg_category_name'] = $ghg_cat_name;



                        $top_in_each_stage[] = $temp;
                    }
                }
            }
        }







        $data['top_in_each_stage'] = $top_in_each_stage;



        $ghg_category = $db->query("select * from ghg_category where status=1")->getResultArray();



        $category_footprint = [];



        $category_name = [];



        if ($ghg_category) {



            foreach ($ghg_category as $gc) {



                $ghg = $db->query("select * from ghg where ghg_category_id=" . $gc['id'] . " and footprint_id=2 and status=1")->getResultArray();



                $total_cat_footprint = 0;



                if ($ghg) {



                    foreach ($ghg as $g) {



                        if ($g['id'] == 23) {



                            $estimate_arr = $db->query("select sum(estimate) as est from supplier_manufacturing_process where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $g['id'])->getResultArray();
                        } else {



                            $estimate_arr = $db->query("select sum(estimate) as est from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=" . $g['id'])->getResultArray();
                        }



                        if ($estimate_arr) {



                            if ($estimate_arr[0]['est']) {



                                $total_cat_footprint = $total_cat_footprint + $estimate_arr[0]['est'];
                            }
                        }
                    }
                }



                if ($data['supp_assess']) {



                    if ($data['supp_assess']['total_footprint'] != 0) {



                        $category_footprint[] = round(($total_cat_footprint / $data['supp_assess']['total_footprint']) * 100);



                        $temp = [];



                        $temp['name'] = $gc['ghg_category_name'];



                        $temp['value'] = round(($total_cat_footprint / $data['supp_assess']['total_footprint']) * 100);



                        $category_name[] = $temp;
                    }
                }
            }
        }



        $data['category_footprint'] = $category_footprint;



        $data['category_name'] = $category_name;



        $query = $db->query("select * from sub_units where status=1");



        $data['sub_units'] = $query->getResultArray();



        $ghg_name = [];



        $ghg_val = [];



        $ghg_name2 = [];



        $ghg_val3 = [];



        if ($data['ghg']) {



            foreach ($data['ghg'] as $g) {



                if ($g['ghg_name'] != "Welcome") {



                    if ($data['supp_assess']['is_submit'] == 1) {



                        // if($g['id']==21) {



                        //     $ghg_name[] = $g['ghg_name'];



                        //     $ghg_val[] = number_format(($data['tot_building_footprint']*100)/$data['total_footprint'],2);



                        // }



                        if ($g['id'] == 21) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_building_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        // if($g['id']==22) {



                        //     $ghg_name[] = $g['ghg_name'];



                        //     $ghg_val[] = number_format(($data['tot_transport_footprint']*100)/$data['total_footprint'],2);



                        // }

                        if ($g['id'] == 22) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_transport_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        // if($g['id']==23) {



                        //     $ghg_name[] = $g['ghg_name'];



                        //     $ghg_val[] = number_format(($data['tot_manufacturing_footprint']*100)/$data['total_footprint'],2);





                        // }

                        // print_r($data['supp_assess']['total_footprint']);

                        // die();

                        if ($g['id'] == 23) {



                            $ghg_name[] = $g['ghg_name'];

                            // $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_manufacturing_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        // if($g['id']==24) {



                        //     $ghg_name[] = $g['ghg_name'];



                        //     $ghg_val[] = number_format(($data['tot_manufacturing2_footprint']*100)/$data['total_footprint'],2);                            



                        // }



                        if ($g['id'] == 24) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = number_format(($data['tot_manufacturing2_footprint'] * 100) / $data['supp_assess']['total_footprint'], 2);
                        }



                        if ($g['id'] == 25) {



                            $ghg_name[] = $g['ghg_name'];



                            $ghg_val[] = round(($data['tot_manufacturing3_footprint'] * 100) / $data['supp_assess']['total_footprint']);
                        }
                    }
                }
            }





            if (!empty($ghg_name)) {

                $ghg_name2[] = $ghg_name[0];

                $ghg_name2[] = $ghg_name[3];

                $ghg_name2[] = $ghg_name[2];

                $ghg_name2[] = $ghg_name[1];



                $ghg_val3[] = $ghg_val[0];

                $ghg_val3[] = $ghg_val[3];

                $ghg_val3[] = $ghg_val[2];

                $ghg_val3[] = $ghg_val[1];
            }
        }



        $data['ghg_name'] = $ghg_name2;



        $data['ghg_val'] = $ghg_val3;



        $query = $db->query("select v.id as vid,td.ghg_factor_id,gf.id,gf.name,f.factor_name from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id join factor as f on gf.name=f.id where v.status=1");



        $data['transport_vehicle'] = $query->getResultArray();



        $query = $db->query("select * from vehicle where status=1 and vehicle_name not in ('Air Freight','Rail Freight','Sea Freight') and footprint_id=2");



        $data['land_vehicle'] = $query->getResultArray();

        // process code Start from here





        $query = $db->query("select * from manufacturing_process_detail  where status=1 AND industry_id=" . $industry_id);

        $data['manufacturing_process_detail'] = $query->getResultArray();





        //  process code end here



        $query = $db->query("select * from unit where status=1");

        $data['units'] = $query->getResultArray();

        echo view('brand/products', $data);
    }







    public function productAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $assessment_id = $this->request->getVar("assessment_id");



        // $country_id = $this->request->getVar("country_id");



        // $no_of_employee = $this->request->getVar("no_of_employee");



        $date_from = date("Y-m-d", strtotime($this->request->getVar("date_from")));



        $date_to = date("Y-m-d", strtotime($this->request->getVar("date_to")));



        $date_time = date('Y-m-d H:i:s');



        //        $emp_work_from_home = $this->request->getVar("emp_work_from_home");



        $query = $db->query("select * from supplier_assessment where id=" . $assessment_id);



        $ava = $query->getResultArray();



        if (empty($ava)) {



            $ghg_assessment = $db->query("insert into supplier_assessment(assessment_id,footprint_id,supplier_id,country_id,no_of_employee,date_from,date_to,status,datetime)values(11,2," . $supplier_info['supplier_id'] . "," . $country_id . "," . $no_of_employee . ",'" . $date_from . "','" . $date_to . "',1,'" . $date_time . "')");



            $ghg_assessment_id = $db->insertID();
        } else {



            $ghg_assessment = $db->query("update supplier_assessment set date_from='" . $date_from . "',date_to='" . $date_to . "',datetime='" . $date_time . "' where id=" . $assessment_id);



            $ghg_assessment_id = $ava[0]['id'];
        }



        return redirect()->to('brand/products/' . $assessment_id);
    }







    public function productBuildingAssessmentSubmit()
    {



        //         $db = \Config\Database::connect();



        //         $ghg_assessment_model = new GhgAssessmentModel();



        //         $session = session();



        //         $supplier_info = $session->get('supplier_info');



        //         $ghg_id = $this->request->getVar('ghg_id');



        //         $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        //         $factor_arr = $this->request->getVar('prod_factor');



        //         $qty_arr = $this->request->getVar('qty');



        //         $unit_arr = $this->request->getVar('unit');



        //         // $emission_factor_arr = $this->request->getVar('emission_factor');



        //         $estimate = 0;



        //         $total_footprint = 0;



        //         if($qty_arr) {



        //             foreach($qty_arr as $key=>$qty) {



        //                 if(!empty($qty)) {



        //                     $query = $db->query("select emission_factor from ghg_factor where id=".$factor_arr[$key]);



        //                     $emission_factor_arr = $query->getResultArray();



        //                     if($emission_factor_arr) {



        //                     $estimate = ($qty * $emission_factor_arr[0]['emission_factor']);



        //                     $total_footprint = $total_footprint + $estimate;



        //                     $query = $db->query("select * from ghg_assessment where supplier_assessment_id=".$ghg_assessment_id." and ghg_id=".$ghg_id." and factor_id=".$factor_arr[$key]);



        //                     $ava = $query->getResultArray();



        //                     if(empty($ava)) {



        //                         $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$factor_arr[$key].",'".$unit_arr[$key]."',".$qty.",".$estimate.")");



        //                     }



        //                     else {



        //                         $db->query("update ghg_assessment set quantity=".$qty.",estimate=".$estimate." where id=".$ava[0]['id']);



        //                     }



        //                     }



        //                 }



        //             }



        //         }







        // //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



        //         $db->query("update supplier_assessment set total_footprint=".$total_footprint." where id=".$ghg_assessment_id);



        //         echo 'success';



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        if (!empty($this->request->getVar())) {



            $ghg_id = $this->request->getVar('ghg_id');



            $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



            $factor_arr = $this->request->getVar('prod_factor');



            $qty_arr = $this->request->getVar('qty');



            $unit_arr = $this->request->getVar('unit');



            $supplier_location = $this->request->getVar("supplier_location");



            // $emission_factor_arr = $this->request->getVar('emission_factor');



            $estimate = 0;



            $total_footprint = 0;



            if ($qty_arr) {



                foreach ($qty_arr as $key => $qty) {



                    if (!empty($qty) || $qty == 0) {



                        $emission_factor = 0;



                        $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id=" . $factor_arr[$key])->getResultArray();



                        if ($emission_factor_arr) {



                            $emission_factor = $emission_factor_arr[0]['emission_factor'];
                        }



                        $estimate = ($qty * $emission_factor);



                        $unit_nm = "";



                        if ($unit_arr[$key]) {



                            $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                            $unit_nm = $unit_arr[$key];



                            $sub_unit = $query->getResultArray();



                            if ($sub_unit) {



                                $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                                $estimate = eval('return ' . $estimate . ';');



                                $unit_nm = $sub_unit[0]['sub_unit_name'];
                            }
                        }



                        $total_footprint = $total_footprint + $estimate;



                        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $factor_arr[$key]);



                        $ava = $query->getResultArray();



                        if (empty($ava)) {



                            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate,supplier_location)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $factor_arr[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ",'" . $supplier_location[$key] . "')");
                        } else {



                            $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "',supplier_location='" . $supplier_location[$key] . "' where id=" . $ava[0]['id']);
                        }
                    }
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);
        } else {



            //     $query = $db->query("select country_id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



            //     $supp_ass = $query->getResultArray();



            //     if($supp_ass) {



            //         $query = $db->query("select emission_factor from countries where id=".$supp_ass[0]['country_id']);



            //         $country_emission_factor_arr = $query->getResultArray();



            //         if($country_emission_factor_arr) {



            //             $total_footprint=$country_emission_factor_arr[0]['emission_factor']*$supp_ass[0]['no_of_employee'];



            //         }                    



            //     }



            // $db->query("update supplier_assessment set total_footprint=".$total_footprint." where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        }



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 21) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = (number_format($gd['estimate'], 4)) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=21");



        $total_building_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_footprint_arr) {



            $arr['tot'] = $total_building_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);



        die();



        // echo $data;



    }







    public function productTransportAssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_plan_id = 0;



        if ($supplier_info) {



            $supplier_plan_arr = $db->query("select supplier_plan_id as spid from supplier where id=" . $supplier_info['supplier_id'])->getResultArray();



            if ($supplier_plan_arr) {



                $supplier_plan_id = $supplier_plan_arr[0]['spid'];
            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $transportation_way = $this->request->getVar("transportation_way");



        $transportation_by = $this->request->getVar("transportation_by");



        $transportation_from = $this->request->getVar("transportation_from");





        $factor1 = $this->request->getVar("factor_1");



        $factor2 = $this->request->getVar("factor_2");



        $factor3 = $this->request->getVar("factor_3");



        $factor4 = $this->request->getVar("factor_4");



        $factor5 = $this->request->getVar("factor_5");







        $transportation_to = $this->request->getVar("transportation_to");



        $inner_transportation_from = $this->request->getVar("inner_transportation_from");



        $inner_transportation_to = $this->request->getVar("inner_transportation_to");



        $local_transportation_from_by = $this->request->getVar("local_transportation_from_by");



        $local_transportation_to_by = $this->request->getVar("local_transportation_to_by");



        $transport_emission = $this->request->getVar("transport_emission");



        // $mileage = $this->request->getVar('mileage');



        // $vehicle = $this->request->getVar('vehicle');



        // $vehicle_info_1 = $this->request->getVar('vehicle_info_1');



        // $vehicle_info_2 = $this->request->getVar('vehicle_info_2');



        // $vehicle_info_3 = $this->request->getVar('vehicle_info_3');



        // $vehicle_info_4 = $this->request->getVar('vehicle_info_4');



        // $efficiency = $this->request->getVar('efficiency');



        // $raw_material = $this->request->getVar('supplier_raw_material');



        // $transport_type = $this->request->getVar('transport_type');



        // $transport_factor = $this->request->getVar("transport_factor");



        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and supplier_id=" . $supplier_info['supplier_id']);



        $ava = $query->getResultArray();

        if ($factor1 !== 0) {

            $factor = $factor1;
        } elseif ($factor2 > 0 || $factor3 > 0) {
            $factor = $factor2;
        } elseif ($factor4 !== 0 || $factor5 !== 0) {
            $factor = $factor4;
        }



        //  $cv_emission_factor = 0;



        //  $estimate = 0;



        // $query = $db->query("select emission_factor from ghg_factor where id=".$transport_factor);



        //  $cv_emission_factor_arr = $query->getResultArray();



        //  if($cv_emission_factor_arr) {



        //      $cv_emission_factor = $cv_emission_factor_arr[0]['emission_factor'];



        //      $estimate = $mileage*$cv_emission_factor;



        //  }



        // $cv_emission_factor = 3;



        // $estimate = (2*$mileage)+($cv_emission_factor*$efficiency);



        // if($vehicle) {



        //     $query = $db->query("select emission_factor from company_vehicle_detail where vehicle=".$vehicle." and year='".$vehicle_info_1."' and type='".$vehicle_info_2."' and model='".$vehicle_info_3."' and efficiency='".$efficiency."' and status=1");



        //     $cv_emission_factor_arr = $query->getResultArray();



        //     if($cv_emission_factor_arr) {



        //         $cv_emission_factor = $cv_emission_factor_arr[0]['emission_factor'];



        //         $estimate = (2*$mileage)+($cv_emission_factor*$efficiency);



        //     }



        // }



        // if(empty($ava)) {



        //     $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,vehicle_mileage,vehicle,vehicle_info_1,vehicle_info_2,vehicle_info_3,vehicle_info_4,vehicle_efficience,raw_material) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$mileage.",'".$vehicle."','".$vehicle_info_1."','".$vehicle_info_2."','".$vehicle_info_3."','".$vehicle_info_4."',".$efficiency.",'".$raw_material."')");



        // }



        // else {



        //     $db->query("update ghg_assessment set vehicle_mileage=".$mileage.",vehicle='".$vehicle."',vehicle_info_1='".$vehicle_info_1."',vehicle_info_2='".$vehicle_info_2."',vehicle_info_3='".$vehicle_info_3."',vehicle_info_4='".$vehicle_info_4."',vehicle_efficience=".$efficiency.",raw_material='".$raw_material."' where id=".$ava[0]['id']);



        // }



        // echo 'success';        



        // die();



        $no_of_entry = 0;



        $no_of_entry_arr = $db->query("select no_of_entry as noe from supplier_plan_assessment_ghg_details where supplier_plan_id='" . $supplier_plan_id . "' and assessment_id=11 and ghg_id=" . $ghg_id)->getResultArray();



        if ($no_of_entry_arr) {



            $no_of_entry = $no_of_entry_arr[0]['noe'];
        }



        if (count($ava) < $no_of_entry) {



            // $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,vehicle_mileage,vehicle,vehicle_info_1,vehicle_info_2,vehicle_info_3,vehicle_info_4,vehicle_efficience,estimate) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$mileage.",'".$vehicle."','".$vehicle_info_1."','".$vehicle_info_2."','".$vehicle_info_3."','".$vehicle_info_4."',".$efficiency.",".((2*$mileage)+(3*$efficiency)).")");            



            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,transportation_way,estimate,transportation_by,transportation_from,transportation_to,inner_transportation_from,inner_transportation_to,local_transportation_from_by,local_transportation_to_by) values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . ",$factor,'" . $transportation_way . "'," . $transport_emission . ",'" . $transportation_by . "','" . $transportation_from . "','" . $transportation_to . "','" . $inner_transportation_from . "','" . $inner_transportation_to . "','" . $local_transportation_from_by . "','" . $local_transportation_to_by . "')");





            // echo $db->getlastquery($ghg_assessment_detail);



            // die();



            if ($ghg_assessment_detail) {



                $ghg_assess_arr = $db->query("select max(id) as gaid from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id)->getResultArray();



                if ($ghg_assess_arr) {



                    $ghg_assess_id = $ghg_assess_arr[0]['gaid'];



                    // if($raw_material) {



                    //     foreach($raw_material as $rm) {



                    //         $db->query("insert into supplier_raw_material(supplier_id,supplier_assessment_id,ghg_assessment_id,raw_material_id,status) values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_assess_id.",".$rm.",1)");



                    //     }



                    // }



                }
            }
        }



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $ghg_assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 22) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = $gd['estimate'] . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                    
                    

                    </span> 
                    
                    

                    CO2e :Estimate Emissions of Transportation of Material from ' . $gd['transportation_from'] . ' to ' . $gd['transportation_to'] . 'via LAND/RAIL/AIR/SEA.<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeTransportFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=22");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = number_format($total_company_vehicle_footprint_arr[0]['tot'], 2);
        }



        echo json_encode($arr);
    }







    public function productManufacturingAssessmentSubmit()
    {

        // echo '<pre>';

        // print_r($this->request->getVar());

        // die();

        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');

        // echo '<pre>';

        // print_r($supplier_info);

        // die();



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $process_name_arr = $this->request->getVar('process_name');

        $process_material_unit_arr = $this->request->getVar('process_material_unit');



        $material_qty_arr = $this->request->getVar("material_qty");

        // $electricity_consumption_arr = $this->request->getVar('electricity_consumption');



        // $water_consumption_arr = $this->request->getVar('water_consumption');



        $process_raw_material_arr = $this->request->getVar('process_raw_material');



        $raw_material_arr = [];



        if ($process_raw_material_arr) {



            foreach ($process_raw_material_arr as $parr) {



                $raw_material_arr[] = $parr;
            }
        }



        // echo '<pre>';

        // print_r($raw_material_arr);

        // die();



        // $electricity_consumption_unit_arr = $this->request->getVar('electricity_consumption_unit');



        // $water_consumption_unit_arr = $this->request->getVar('water_consumption_unit');



        if ($process_name_arr) {

            $db->query("delete from supplier_manufacturing_process where supplier_assessment_id=" . $ghg_assessment_id . " and supplier_id=" . $supplier_info['supplier_id'] . " and ghg_id=" . $ghg_id . "");



            foreach ($process_name_arr as $key => $process_name) {

                $jk = $process_name;

                $query = $db->query("select * from manufacturing_process_detail where id=" . $process_name);

                $p_name = "";

                $process_name_arr = $query->getResultArray();

                if ($process_name_arr) {

                    $p_name = $process_name_arr[0]['process_name'];
                }



                if ($process_name != "" && $material_qty_arr[$key] != "" && $process_material_unit_arr[$key] != "" && $raw_material_arr) {



                    $estimate = 0;



                    $emission_fact = 0;



                    if ($raw_material_arr[$key]) {



                        foreach ($raw_material_arr[$key] as $raw_mater) {



                            // $emission_factor_arr = $db->query("select emission_factor as ef from ghg_factor where id=".$raw_mater)->getResultArray();

                            $unit_detail_arr = explode(",", $process_material_unit_arr[$key]);



                            $unit_detail = 0;

                            $new_material_qty = $material_qty_arr[$key];

                            if (count($unit_detail_arr) > 1) {

                                $query = $db->query("select * from sub_units where id=" . $unit_detail_arr[1]);

                                $sub_unit_detail_arr = $query->getResultArray();

                                if ($sub_unit_detail_arr) {





                                    $new_material_qty = $material_qty_arr[$key] . '' . $sub_unit_detail_arr[0]['conversion_symbol'] . '' . $sub_unit_detail_arr[0]['conversion_value'];

                                    $new_material_qty = eval('return ' . $new_material_qty . ';');
                                }

                                // else {

                                //     $new_material_qty = 0

                                // }

                            }

                            $query = $db->query("select * from manufacturing_detail where industry_id='" . $supplier_info['industry_id'] . "' and ghg_id=23 and process_id='" . $process_name . "' and ghg_factor_id='" . $raw_mater . "'");

                            $manufacturing_detail = $query->getResultArray();

                            $amount_cal = 1;

                            if ($manufacturing_detail) {

                                $amount_cal = ($new_material_qty / $manufacturing_detail[0]['per_quantity_val']) * $manufacturing_detail[0]['per_quantity_amt'];
                            }

                            //  $emission_factor_arr = $db->query("select emission_factor as ef from ghg_factor where id=".$raw_mater)->getResultArray();

                            $emission_factor_arr = $db->query("SELECT SUM(per_quantity_amt) as ef FROM `manufacturing_detail` WHERE `process_id`=" . $jk . " AND `status`=1")->getResultArray();



                            $emission_factor_arr = $db->query("select sum((md.per_quantity_amt)*(gf.emission_factor)) as ef from manufacturing_detail as md join ghg_factor as gf on md.ghg_factor_id=gf.id WHERE md.process_id=" . $jk . " AND md.status=1")->getResultArray();







                            if ($emission_factor_arr) {

                                $emission_fact = $emission_fact + ($emission_factor_arr[0]['ef'] * $amount_cal);
                            }
                        }
                    }

                    $raw_mater_id = implode(",", $raw_material_arr[$key]);



                    // $estimate = ($electricity_consumption_arr[$key]*2) + ($water_consumption_arr[$key]*3) + ($emission_fact);

                    // print_r($emission_fact);

                    if ($process_material_unit_arr[$key] == '1') {

                        $estimate = $emission_fact * ($new_material_qty / 1000);

                        $process_material_unit = "gram";
                    } else {



                        $estimate = $emission_fact * $new_material_qty;

                        $process_material_unit = $process_material_unit_arr[$key];
                    }



                    $db->query("insert into supplier_manufacturing_process(supplier_id,supplier_assessment_id,ghg_id,process_name,electricity_consumption,water_consumption,raw_material_id,status,electricity_consumption_unit,water_consumption_unit,estimate,qty)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . ",'" . $p_name . "',0,0,'" . $raw_mater_id . "',1,'" . $process_material_unit_arr[$key] . "','" . $process_material_unit . "'," . $estimate . "," . $new_material_qty . ")");
                }
            }
        }



        $supplier_manufacturing_process = $db->query("select smp.*,gf.name,f.factor_name from supplier_manufacturing_process as smp join ghg_factor as gf on 26 =gf.id join factor as f on f.id=gf.name where smp.supplier_id=" . $supplier_info['supplier_id'] . " and smp.supplier_assessment_id=" . $ghg_assessment_id . " and smp.ghg_id=23 and smp.status=1  group by smp.process_name ")->getResultArray();



        $data = '';



        if ($supplier_manufacturing_process) {



            foreach ($supplier_manufacturing_process as $smp) {



                $data .= '<div class="alert alert-success custom_alert" role="alert">
                
                

                <span>' . number_format($smp['estimate'], 2) . '</span> Kgs: ' . $smp['qty'] . ' ' . $smp['water_consumption_unit'] . ' for process = ' . $smp['process_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor(' . $smp['id'] . ',' . $smp['ghg_id'] . ',' . $smp['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                        
                        

                        </div>';
            }
        }



        // echo $data;



        // 25-01-2022 toal error start



        $query = $db->query("select estimate as tot from supplier_manufacturing_process where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=23 group by process_name ");





        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {

            $tot = 0;

            foreach ($total_company_vehicle_footprint_arr as $h) {

                $tot += $h['tot'];

                $arr['tot'] = number_format($tot, 2);
            }



            // 25-01-2022 toal error end 

        }



        echo json_encode($arr);



        /*        $factor_arr = $this->request->getVar('manuf_factor');
        
        

        $qty_arr = $this->request->getVar('manuf_qty');
        
        

        $unit_arr = $this->request->getVar('manuf_unit');
        
        

        $emission_factor_arr = $this->request->getVar('manuf_emission_factor');
        
        

        $estimate = 0;
        
        

        $total_footprint = 0;
        
        

        $query = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and footprint_id=2 and assessment_id=11");
        
        

        $footprint = $query->getResultArray();
        
        

        if($footprint) {
            
            

            $total_footprint = $footprint[0]['total_footprint'];
            
            

        }
        
        

        if($qty_arr) {
            
            

            foreach($qty_arr as $key=>$qty) {
                
                

                if(!empty($qty)) {
                    
                    

                    $estimate = ($qty * $emission_factor_arr[$key]);
                    
                    

                    $total_footprint = $total_footprint + $estimate;
                    
                    

                    $query = $db->query("select * from ghg_assessment where supplier_assessment_id=".$ghg_assessment_id." and ghg_id=".$ghg_id." and factor_id=".$factor_arr[$key]);
                    
                    

                    $ava = $query->getResultArray();
                    
                    

                    if(empty($ava)) {
                        
                        

                        $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$factor_arr[$key].",'".$unit_arr[$key]."',".$qty.",".$estimate.")");
                        
                        

                    }
                    
                    

                    else {
                        
                        

                        $db->query("update ghg_assessment set quantity=".$qty.",estimate=".$estimate." where id=".$ava[0]['id']);
                        
                        

                    }
                    
                    

                }
                
                

            }
            
            

        }
        
        
        
        
        
        

        //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



$db->query("update supplier_assessment set total_footprint=".$total_footprint." where id=".$ghg_assessment_id);
        
        

        // echo 'success'.$total_footprint;
        
        

        $query = $db->query("select gf.*,f.factor_name,f.factor_unit from ghg_factor as gf join factor as f on gf.name=f.id where gf.status=1 and gf.type=2");
        
        

        $ghg_factor = $query->getResultArray();
        
        

        $query = $db->query("select ga.*,gf.name,f.factor_name,f.factor_unit from ghg_assessment as ga join ghg_factor as gf on gf.id=ga.factor_id join factor as f on gf.name=f.id  where supplier_id=".$supplier_info['supplier_id']." order by ga.id asc");
        
        

        $ghg_assessment_detail = $query->getResultArray();
        
        

        $data='';
        
        

        if($ghg_factor) {
            
            

            foreach($ghg_factor as $gf) {
                
                

                if($gf['ghg_id']==23) {
                    
                    

                    if($ghg_assessment_detail) {
                        
                        

                        foreach($ghg_assessment_detail as $gd) {
                            
                            

                            if($gf['id']==$gd['factor_id']) {
                                
                                

                                $data.='<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>'.$gf['emission_factor']*$gd['quantity'].'
                                
                                

                                </span> tonnes:'.$gd['quantity'].' '.$gf['factor_unit'].' of '.$gf['factor_name'].'<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor('.$gd['id'].','.$gf['id'].')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            
                            

                        }
                            
                            

                        }
                        
                        

                    }
                    
                    

                }
                
                

            }
            
            

        }
        
        

        echo $data; */
    }







    public function productManufacturing2AssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $factor_arr = $this->request->getVar('manuf2_factor');



        $qty_arr = $this->request->getVar('manuf2_qty');



        $unit_arr = $this->request->getVar('manuf2_unit');



        $supplier_location_arr = $this->request->getVar("supplier_location");



        // $waste_product = $this->request->getVar("waste_product");



        // $emission_factor_arr = $this->request->getVar('manuf2_emission_factor');



        $estimate = 0;



        $total_footprint = 0;



        $query = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and footprint_id=2 and assessment_id=11");



        $footprint = $query->getResultArray();



        if ($footprint) {



            $total_footprint = $footprint[0]['total_footprint'];
        }



        if ($qty_arr) {



            foreach ($qty_arr as $key => $qty) {



                if (!empty($qty)) {



                    $estimate = 0;



                    $emission_factor_arr = $db->query("select emission_factor as ef from ghg_factor where id=" . $factor_arr[$key])->getResultArray();



                    if ($emission_factor_arr) {



                        $estimate = $emission_factor_arr[0]['ef'] * $qty;
                    }



                    $unit_nm = "";



                    if ($unit_arr[$key]) {



                        $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                        $unit_nm = $unit_arr[$key];



                        $sub_unit = $query->getResultArray();



                        if ($sub_unit) {



                            $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                            $estimate = eval('return ' . $estimate . ';');



                            $unit_nm = $sub_unit[0]['sub_unit_name'];
                        }
                    }



                    // $estimate = ($qty * $emission_factor_arr[$key]);



                    $total_footprint = $total_footprint + $estimate;



                    $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $factor_arr[$key]);



                    $ava = $query->getResultArray();



                    if (empty($ava)) {



                        $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate,supplier_location)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $factor_arr[$key] . ",'" . $unit_nm . "'," . $qty . "," . $estimate . ",'" . $supplier_location_arr[$key] . "')");
                    } else {



                        $db->query("update ghg_assessment set quantity=" . $qty . ",estimate=" . $estimate . ",unit='" . $unit_nm . "',supplier_location='" . $supplier_location_arr[$key] . "' where id=" . $ava[0]['id']);
                    }
                }
            }
        }







        //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



        $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);



        // echo 'success'.$total_footprint;



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit from ghg_factor as gf join factor as f on gf.name=f.id where gf.status=1 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select ga.*,gf.name,f.factor_name,f.factor_unit,u.unit_name from ghg_assessment as ga left join ghg_factor as gf on gf.id=ga.factor_id left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $ghg_assessment_id . "' order by ga.id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 24) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1) {



                        $rs_conversion = ($gd['estimate']) . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gd['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturing2Factor(' . $gd['id'] . ',' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                }
            }
        }



        // echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=24");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = number_format($total_company_vehicle_footprint_arr[0]['tot'], 4);
        }



        echo json_encode($arr);
    }
    public function electricity()
    {


        $db = \Config\Database::connect();
        $ghg_assessment_model = new GhgAssessmentModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $id = $this->request->getVar('ideee');
        $electricity = $this->request->getVar('ed');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $s = '1';

        $ghg_assessment_detail
            = $db->query("update supplier_assessment set electricity_board='" . $electricity . "',
    username='" . $username . "',password='" . $password . "',step1='" . $s . "' where id=" . $id);

        return redirect()->back();

        // print_r($ghg_assessment_detail);
        //  die();

        // print_r($likepost);
        //   die();
    }








    public function productManufacturing3AssessmentSubmit()
    {



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $ghg_id = $this->request->getVar('ghg_id');



        $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        $service_period = $this->request->getVar('service_period');



        $per_raw_material = $this->request->getVar('per_raw_material');



        $waste_prod = $this->request->getVar('waste_prod');



        $estimate = 0;



        $s1 = 0;



        $s2 = 0;



        $waste_product_ef = 0;



        $waste_product_ef_arr = $db->query("select emission_factor from ghg_factor where id=" . $waste_prod)->getResultArray();



        if ($waste_product_ef_arr) {



            $waste_product_ef = $waste_product_ef_arr[0]['emission_factor'];
        }



        $s1_arr = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $ghg_assessment_id . "' and ghg_id=21")->getResultArray();



        if ($s1_arr) {



            $s1 = $s1_arr[0]['tot'];
        }



        $s2_arr = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $ghg_assessment_id . "' and ghg_id=24")->getResultArray();



        if ($s2_arr) {



            $s2 = $s2_arr[0]['tot'];
        }



        $estimate = (($s1 + $s2) - ((($s1 + $s2) * $per_raw_material) / 100)) * $waste_product_ef;



        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id);



        $ava = $query->getResultArray();



        if (empty($ava)) {



            $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,product_service_period,waste_raw_material_per,waste_product,estimate)values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . "," . $service_period . ",'" . $per_raw_material . "','" . $waste_prod . "'," . $estimate . ")");
        } else {



            $db->query("update ghg_assessment set product_service_period=" . $service_period . ",waste_raw_material_per=" . $per_raw_material . ",waste_product='" . $waste_prod . "',estimate=" . $estimate . " where id=" . $ava[0]['id']);
        }



        $tot_eos_footprint = 0;



        $rs = $db->query("select estimate from ghg_assessment where supplier_assessment_id='" . $ghg_assessment_id . "' and ghg_id=25")->getResultArray();



        if ($rs) {



            $tot_eos_footprint = $rs[0]['estimate'];
        }



        echo $tot_eos_footprint;
    }







    public function getProductFactor()
    {



        $db = \Config\Database::connect();



        $prod_factor_arr = $this->request->getVar("prod_factor");



        $session = session();



        $supplier_info = $session->get('supplier_info');





        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }





        $prod_factors = implode(",", $prod_factor_arr);





        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2 and gf.industry_id=" . $industry_id);

        // $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2");



        $ghg_factor = $query->getResultArray();



        $product_factor = "";



        $fact_unit = '<option value="0">Select Unit</option>';



        $fact_unit_id = 0;



        if ($ghg_factor) {



            $fact_unit .= '<option>' . $ghg_factor[0]['unit_name'] . '</option>';



            $fact_unit_id = $ghg_factor[0]['factor_unit'];



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 21) {



                    $product_factor .= '<option value="' . $gf['id'] . '">' . $gf['factor_name'] . '</option>';
                }
            }



            if ($fact_unit_id) {



                $query = $db->query("select * from sub_units where unit_id=" . $fact_unit_id . " and status=1");



                $sub_units = $query->getResultArray();



                if ($sub_units) {



                    foreach ($sub_units as $sub_unit) {



                        $fact_unit .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }



        $arr = [];



        $arr['res'] = '';



        $arr['rand_num'] = 1;



        if ($product_factor) {



            $rand_num = rand(1, 10000);



            $arr['rand_num'] = $rand_num;



            $supplier_location = '<div class="step_field" style="width:30%;">
            
            

            <div class="theme_field">
    
    

    <div class="stc_left" style="width:100%;">
        
        

        <input type="text" class="form-control" id="autocomplete_' . $rand_num . '" name="supplier_location[]" value=" " />       
            
            

            </div>
        
        

        </div>
    
    

    </div>';



            $arr['res'] = '<div class="step_inner append_row"><div class="theme_field step_label"><select class="form-control label_select" id="exampleFormControlSelect1" name="prod_factor[]" onchange="setUnit(this)">' . $product_factor . '</select></div><div class="step_field"><div class="theme_field step_three_column"><div class="stc_left"><input type="number" placeholder="Enter number" name="qty[]" value=""></div><div class="stc_center"></div><div class="stc_right"><select class="form-control" id="exampleFormControlSelect1" name="unit[]">' . $fact_unit . '</select></div></div></div>' . $supplier_location . '<button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div>';
        }



        echo json_encode($arr);
    }







    public function getUnit($factor_id)
    {



        $db = \Config\Database::connect();



        $query = $db->query("select f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.id=" . $factor_id);

        //echo $db->getLastquery($query);

        $factor_unit_arr = $query->getResultArray();



        $data = '<option value="0">Select Unit</option>';



        if ($factor_unit_arr) {



            $data .= '<option>' . $factor_unit_arr[0]['unit_name'] . '</option>';



            if ($factor_unit_arr[0]['factor_unit']) {



                $query = $db->query("select * from sub_units where unit_id=" . $factor_unit_arr[0]['factor_unit'] . " and status=1");

                //echo $db->getLastquery($query);

                $sub_units = $query->getResultArray();



                if ($sub_units) {



                    foreach ($sub_units as $sub_unit) {



                        $data .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }



        echo $data;
    }



    public function getUnitProcess($factor_id)
    {



        $db = \Config\Database::connect();



        $query = $db->query("select * from manufacturing_process_detail join unit on manufacturing_process_detail.unit_id=unit.id where manufacturing_process_detail.id=" . $factor_id);

        // echo $db->getLastquery($query);

        $factor_unit_arr = $query->getResultArray();



        $data = '<option value="0">Select Unit</option>';



        if ($factor_unit_arr) {



            $data .= '<option>' . $factor_unit_arr[0]['unit_name'] . '</option>';



            if ($factor_unit_arr[0]['unit_id']) {



                $query = $db->query("select * from sub_units where unit_id=" . $factor_unit_arr[0]['unit_id'] . " and status=1");

                // echo $db->getLastquery($query);

                $sub_units = $query->getResultArray();



                if ($sub_units) {



                    foreach ($sub_units as $sub_unit) {



                        $data .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }



        echo $data;
    }











    public function getCountryEmissionFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $query = $db->query("select id,no_of_employee,country_id from supplier_assessment where id=" . $assessment_id);



        $supplier_assessment = $query->getResultArray();



        $no_of_employee = 0;



        $country_id = 0;



        $estimate = 0;



        if ($supplier_assessment) {



            $no_of_employee = $supplier_assessment[0]['no_of_employee'];



            $country_id = $supplier_assessment[0]['country_id'];
        }



        $query = $db->query("select emission_factor from countries where id=" . $country_id);



        $country_emission_factor_arr = $query->getResultArray();



        if ($country_emission_factor_arr) {



            $estimate = $no_of_employee * $country_emission_factor_arr[0]['emission_factor'];
        }



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=17");



        $query = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,estimate) value(" . $supplier_info['supplier_id'] . "," . $assessment_id . ",17," . $estimate . ")");



        $arr = [];



        $arr['estimate'] = $estimate;



        $arr['emp'] = $no_of_employee;



        echo json_encode($arr);
    }







    public function getBuildingFootprint()
    {



        $db = \Config\Database::connect();



        $prod_factor_arr = $this->request->getVar("prod_factor");



        $qty_arr = $this->request->getVar("qty");



        $total_footprint = 0;



        if ($qty_arr) {



            foreach ($qty_arr as $key => $qty) {



                if ($qty) {



                    $query = $db->query("select emission_factor from ghg_factor where id=" . $prod_factor_arr[$key]);



                    $emission_factor_arr = $query->getResultArray();



                    if ($emission_factor_arr) {



                        $total_footprint = $total_footprint + ($qty * $emission_factor_arr[0]['emission_factor']);
                    }
                }
            }
        }



        echo $total_footprint;
    }







    public function removeBuildingFactor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "'");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 17) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e: ' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=17");



        $total_building_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_footprint_arr) {



            $arr['tot'] = $total_building_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }







    public function removeMobileFuelFactor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "'");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 20) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['name'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e : ' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeMobileFuelFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;        



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=20");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_mobile_fuel_footprint_arr) {



            $arr['tot'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }

    public function removeMobileFuelFactorFinance($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "'");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 27) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['name'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = ($gd['estimate']) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e : ' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeMobileFuelFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        // echo $data;        



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=27");



        $total_mobile_fuel_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_mobile_fuel_footprint_arr) {



            $arr['tot'] = $total_mobile_fuel_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }







    public function removeManufacturingFactor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $db->query("delete from supplier_manufacturing_process where id=" . $id);



        $supplier_manufacturing_process = $db->query("select smp.*,gf.name,f.factor_name from supplier_manufacturing_process as smp left join ghg_factor as gf on smp.raw_material_id=gf.id left join factor as f on f.id=gf.name where smp.supplier_id=" . $supplier_info['supplier_id'] . " and smp.supplier_assessment_id=" . $assessment_id . " and smp.ghg_id=23 and smp.status=1 group by smp.process_name")->getResultArray();



        $data = '';



        if ($supplier_manufacturing_process) {



            foreach ($supplier_manufacturing_process as $smp) {



                $data .= '<div class="alert alert-success custom_alert" role="alert">
                
                

                <span>' . $smp['estimate'] . '</span> Kgs:for process = ' . $smp['process_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor(' . $smp['id'] . ',' . $smp['ghg_id'] . ',' . $smp['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                        
                        

                        </div>';
            }
        }



        $query = $db->query("select sum(estimate) as tot from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id . " and ghg_id=23");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = number_format($total_company_vehicle_footprint_arr[0]['tot'], 2);
        }



        echo json_encode($arr);



        // echo $data;



        /*        $query = $db->query("delete from ghg_assessment where id=".$id);
        
        

        $query = $db->query("select gf.*,f.factor_name,f.factor_unit from ghg_factor as gf join factor as f on gf.name=f.id where gf.status=1 and gf.type=2");
        
        

        $ghg_factor = $query->getResultArray();
        
        

        $query = $db->query("select * from ghg_assessment where supplier_id=".$supplier_info['supplier_id']);
        
        

        $ghg_assessment_detail = $query->getResultArray();
        
        

        $data='';
        
        

        if($ghg_factor) {
            
            

            foreach($ghg_factor as $gf) {
                
                

                if($gf['ghg_id']==23) {
                    
                    

                    if($ghg_assessment_detail) {
                        
                        

                        foreach($ghg_assessment_detail as $gd) {
                            
                            

                            if($gf['id']==$gd['factor_id']) {
                                
                                

                                $data.='<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>'.$gf['emission_factor']*$gd['quantity'].'
                                
                                

                                </span> tonnes:'.$gd['quantity'].' '.$gf['factor_unit'].' of '.$gf['factor_name'].'<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturingFactor('.$gd['id'].','.$gf['id'].')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            
                            

                        }
                            
                            

                        }
                        
                        

                    }
                    
                    

                }
                
                

            }
            
            

        }
        
        

        echo $data; */
    }







    public function removeManufacturing2Factor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit from ghg_factor as gf join factor as f on gf.name=f.id where gf.status=1 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        // $query = $db->query("select * from ghg_assessment where supplier_id=".$supplier_info['supplier_id']);



        $query = $db->query("select ga.*,gf.name,f.factor_name,f.factor_unit,u.unit_name from ghg_assessment as ga left join ghg_factor as gf on gf.id=ga.factor_id left join factor as f on gf.name=f.id left join unit as u on f.factor_unit=u.id where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by ga.id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 24) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = ($gd['estimate']) . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit_name'] . ' of ' . $gd['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturing2Factor(' . $gd['id'] . ',' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=24");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        $arr['tot'] = 0;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = number_format($total_company_vehicle_footprint_arr[0]['tot'], 4);
        }



        echo json_encode($arr);



        // echo $data;



    }







    public function removeManufacturing3Factor($id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit from ghg_factor as gf join factor as f on gf.name=f.id where gf.status=1 and gf.type=2");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id']);



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 25) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $gf['emission_factor'] * $gd['quantity'] . '
                                
                                

                                </span> tonnes:' . $gd['quantity'] . ' ' . $gf['factor_unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeManufacturing3Factor(' . $gd['id'] . ',' . $gf['id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        echo $data;
    }







    public function removeAllBuildingFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // echo '<pre>';



        // print_r($supplier_assessment);



        // die();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=17");



        echo 'success';
    }







    public function removeCompanyVehicleFactor($id, $assessment_id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 19) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = $gd['estimate'] . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                    
                    

                    </span> CO2e :for mileage=' . $gd['vehicle_mileage'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeCompanyVehicleFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=19");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }







    public function removeTransportFactor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $query = $db->query("delete from supplier_raw_material where ghg_assessment_id=" . $id);



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 22) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = $gd['estimate'] . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . '
                    
                    

                    </span> tonnes:from ' . $gd['transportation_from'] . ' to ' . $gd['transportation_to'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeTransportFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=22");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }







    public function removeAllCompanyVehicleFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=19");



        echo 'success';
    }







    public function removeAllTransportFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $db->query("delete from supplier_raw_material where supplier_assessment_id=" . $assessment_id);



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=22");



        echo 'success';
    }







    public function removeFlightFactor($id, $assessment_id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id='" . $assessment_id . "' order by id asc");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $gd) {



                if ($gd['ghg_id'] == 18) {



                    $rs_conversion = "";



                    if ($gd['estimate'] < 1000) {



                        $rs_conversion = $gd['estimate'] . " kgs ";
                    } else {



                        $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                    }



                    $data .= '<div class="alert alert-success custom_alert" role="alert">
                    
                    

                    <span>' . $rs_conversion . ' CO2e : 
                    
                    

                    </span> from' . $gd['trip_from'] . ' to ' . $gd['trip_to'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeFlightFactor(' . $gd['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                    
                    

                    </div>';
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=18");



        $total_company_vehicle_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_company_vehicle_footprint_arr) {



            $arr['tot'] = $total_company_vehicle_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);
    }



    public function getSubfinanceCats($state_id)
    {



        $db = \Config\Database::connect();









        $query = $db->query("select * from Finance_Sub_Category  where  status=1 and Finance_Category_id=" . $state_id);



        $finance_sub_category = $query->getResultArray();



        $data = '<option value="0">Select Finance Sub category</option>';



        if ($finance_sub_category) {



            foreach ($finance_sub_category as $fsc) {



                $data .= '<option value="' . $fsc['id'] . '">' . $fsc['sub_category'] . '</option>';
            }
        }



        echo $data;
    }











    public function getYearByCompanyVehicle($vehicle)
    {



        $db = \Config\Database::connect();



        $query = $db->query("select year from company_vehicle_detail where vehicle='" . $vehicle . "' and status=1 group by year order by year asc");



        $cv_year = $query->getResultArray();



        $data = '<option value="0">Select year</option>';



        if ($cv_year) {



            foreach ($cv_year as $cvy) {



                $data .= '<option value="' . $cvy['year'] . '">' . $cvy['year'] . '</option>';
            }
        }



        echo $data;
    }







    public function getTypeOfCompanyVehicle()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $query = $db->query("select distinct(type) from company_vehicle_detail where vehicle='" . $vehicle . "' and year='" . $year . "' and status=1");



        $cv_type = $query->getResultArray();



        $data = '<option value="0">Select type</option>';



        if ($cv_type) {



            foreach ($cv_type as $cvy) {



                $data .= '<option value="' . $cvy['type'] . '">' . $cvy['type'] . '</option>';
            }
        }



        echo $data;
    }







    public function getModelOfCompanyVehicle()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $query = $db->query("select model from company_vehicle_detail where vehicle='" . $vehicle . "' and year='" . $year . "' and type='" . $type . "' and status=1");



        $cv_model = $query->getResultArray();



        $data = '<option value="0">Select model</option>';



        if ($cv_model) {



            foreach ($cv_model as $cvy) {



                $data .= '<option value="' . $cvy['model'] . '">' . $cvy['model'] . '</option>';
            }
        }



        echo $data;
    }







    public function getDerivativeOfCompanyVehicle()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $model = $this->request->getVar("model");



        $query = $db->query("select derivative from company_vehicle_detail where vehicle='" . $vehicle . "' and year='" . $year . "' and type='" . $type . "' and model='" . $model . "' and status=1");



        $cv_derivative = $query->getResultArray();



        $data = '<option value="">Select derivative</option>';



        if ($cv_derivative) {



            foreach ($cv_derivative as $cvy) {



                $data .= '<option value="' . $cvy['derivative'] . '">' . $cvy['derivative'] . '</option>';
            }
        }



        echo $data;
    }







    public function getEfficiencyOfCompanyVehicle()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $model = $this->request->getVar("model");



        // $derivative = $this->request->getVar("derivative");



        $query = $db->query("select efficiency from company_vehicle_detail where vehicle='" . $vehicle . "' and year='" . $year . "' and type='" . $type . "' and model='" . $model . "' and status=1");



        $cv_efficiency = $query->getResultArray();



        $data = '';



        if ($cv_efficiency) {



            foreach ($cv_efficiency as $cvy) {



                $data = $cvy['efficiency'];
            }
        }



        echo $data;
    }







    public function getGhgFactorOfCompanyVehicle()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $model = $this->request->getVar("model");



        // $derivative = $this->request->getVar("derivative");



        $query = $db->query("select cvd.*,gf.name,f.factor_name from company_vehicle_detail as cvd join ghg_factor as gf on gf.id=cvd.ghg_factor_id join factor as f on f.id=gf.name where cvd.vehicle='" . $vehicle . "' and cvd.year='" . $year . "' and cvd.type='" . $type . "' and cvd.model='" . $model . "' and cvd.status=1");



        $cv_ghg_factor = $query->getResultArray();



        $data = '';



        if ($cv_ghg_factor) {



            foreach ($cv_ghg_factor as $cvy) {



                $data .= '<option value="' . $cvy['ghg_factor_id'] . '">' . $cvy['factor_name'] . '</option>';
            }
        }



        echo $data;
    }







    public function removeProductBuildingFactor($id, $assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $query = $db->query("delete from ghg_assessment where id=" . $id);



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)");



        $ghg_factor = $query->getResultArray();



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $assessment_id . " order by id");



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 21) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['id'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = (number_format($gd['estimate'], 4)) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gf['unit_name'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=21");



        $total_building_footprint_arr = $query->getResultArray();



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_footprint_arr) {



            $arr['tot'] = $total_building_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);



        die();



        // echo $data;



    }







    public function removeAllProductBuildingFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=21");



        echo 'success';
    }







    public function submitCompanyFootprint($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $assessment_id = 0;



        $total_company_footprint = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $total_footprint_arr = $db->query("select sum(estimate) as tot_foot from ghg_assessment where supplier_assessment_id=" . $assessment_id)->getResultArray();



        if ($total_footprint_arr) {



            $total_company_footprint = $total_footprint_arr[0]['tot_foot'];
        }

        $db->query("update supplier_assessment set is_submit=1,is_verify=0,admin_verify=0, total_footprint=" . $total_company_footprint . " where id=" . $assessment_id);
    }







    public function undoCompanyFootprint($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');

        // echo $assessment_id;



        // $assessment_id = 0;



        $total_company_footprint = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $db->query("update supplier_assessment set is_submit=0 where id=" . $assessment_id);
    }







    public function verifyCompanyFootprint($assessment_id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $assessment_id = 0;



        $total_company_footprint = 0;



        $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=10")->getResultArray();



        if ($supplier_assessment) {



            $assessment_id = $supplier_assessment[0]['id'];
        }







        $msg = "";







        if ($supplier_info['supplier_id']) {











            $supplier_assessment = $db->query("select id from supplier_assessment where assessment_id=10 and supplier_id=" . $supplier_info['supplier_id'])->getRow();









            //  $supplier_base_assessment = $db->query("select sba.base_assessment_question_id,baq.id as qid from supplier_base_assessment as sba join base_assessment_question as baq on sba.base_assessment_question_id=baq.id where sba.supplier_assessment_id=".$supplier_assessment->id." and baq.is_document_needed=1")->getResultArray();





            // $supplier_building_assessment = 28;







            $doc_count17 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =17")->getResultArray();

            $doc_count20 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =20")->getResultArray();

            $doc_count28 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =28")->getResultArray();

            $doc_count29 = $db->query(" SELECT gas.id, gas.estimate AS estimate, gas.quantity, gas.unit,gas.document_connect, f.factor_name, csc.sub_category FROM `ghg_assessment` AS gas JOIN Consumption_Sub_Category AS csc ON csc.id = gas.consumption_sub_id JOIN factor as f ON f.id=csc.factor_id 
            
              WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =29")->getResultArray();



            $supplier_building_assessment = count($doc_count17) + count($doc_count20) + count($doc_count28) + count($doc_count29);

            // print_r($supplier_building_assessment);

            // die();

            $connected_document = $db->query("select count(*) as doc_cnt from document_connection where supplier_assessment_id=" . $supplier_assessment->id)->getRow();





            if ($connected_document->doc_cnt !== $supplier_building_assessment) {







                $msg = $connected_document->doc_cnt . " out of " . $supplier_building_assessment . " document connected,need to connect remaining documents";
            }



            if ($connected_document->doc_cnt == $supplier_building_assessment) {



                $db->query("update supplier_assessment set is_verify=1 where id=" . $assessment_id);

                // $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=1 and supplier_id=".$supplier_info['supplier_id']);



                return "";
            }
        }







        return $msg;
    }







    public function submitProductFootprint($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $assessment_id = 0;



        $total_company_footprint = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $total_footprint_arr = $db->query("select sum(estimate) as tot_foot from ghg_assessment where supplier_assessment_id=" . $assessment_id)->getResultArray();



        if ($total_footprint_arr) {



            $total_company_footprint = $total_footprint_arr[0]['tot_foot'];
        }



        $total_smp_arr = $db->query("select sum(estimate) as tot_foot from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id)->getResultArray();



        if ($total_smp_arr) {



            $total_company_footprint = $total_company_footprint + $total_smp_arr[0]['tot_foot'];
        }



        $db->query("update supplier_assessment set is_submit=1,is_verify=0,admin_verify=0,total_footprint='" . $total_company_footprint . "' where id=" . $assessment_id);
    }







    public function undoProductFootprint($assessment_id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $assessment_id = 0;



        $total_company_footprint = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $db->query("update supplier_assessment set is_submit=0 where id=" . $assessment_id);
    }







    public function verifyProductFootprint($assessment)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $assessment_id = 0;



        $total_company_footprint = 0;



        $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=11")->getResultArray();



        if ($supplier_assessment) {



            $assessment_id = $supplier_assessment[0]['id'];
        }

        $msg = "";







        if ($supplier_info['supplier_id']) {











            $supplier_assessment = $db->query("select id from supplier_assessment where assessment_id=11 and supplier_id=" . $supplier_info['supplier_id'])->getRow();







            $doc_count21 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =21")->getResultArray();

            $doc_count22 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =22")->getResultArray();

            $doc_count24 = $db->query("SELECT gas.id,gas.estimate as estimate,gas.quantity, gas.unit,gas.document_connect, f.factor_name FROM `ghg_assessment` as gas JOIN ghg_factor as gf on gf.id=gas.factor_id JOIN factor as f ON f.id=gf.name  
            
             WHERE gas.supplier_id = " . $supplier_info['supplier_id'] . " AND gas.supplier_assessment_id = " . $assessment_id . " AND gas.ghg_id =24")->getResultArray();

            $doc_count23 =    $db->query("SELECT smp.id, smp.process_name, smp.estimate AS estimate, smp.qty, smp.electricity_consumption_unit As unit, smp.document_connect FROM `supplier_manufacturing_process` AS smp 
            
            WHERE smp.status=1 And smp.supplier_id = " . $supplier_info['supplier_id'] . " AND smp.supplier_assessment_id = " . $assessment_id . " AND smp.ghg_id =23")->getResultArray();



            $supplier_building_assessment = count($doc_count21) + count($doc_count22) + count($doc_count23) + count($doc_count24);



            //  $supplier_base_assessment = $db->query("select sba.base_assessment_question_id,baq.id as qid from supplier_base_assessment as sba join base_assessment_question as baq on sba.base_assessment_question_id=baq.id where sba.supplier_assessment_id=".$supplier_assessment->id." and baq.is_document_needed=1")->getResultArray();

            // $supplier_building_assessment = 28;





            $connected_document = $db->query("select count(*) as doc_cnt from document_connection where supplier_assessment_id=" . $supplier_assessment->id)->getRow();

            echo $db->getlastquery($connected_document);

            die();



            if ($connected_document->doc_cnt !== $supplier_building_assessment) {







                $msg = $connected_document->doc_cnt . " out of " . $supplier_building_assessment . " document connected,need to connect remaining documents";
            }



            if ($connected_document->doc_cnt == $supplier_building_assessment) {



                $db->query("update supplier_assessment set is_verify=1,admin_verify=0 where id=" . $assessment_id);

                // $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=1 and supplier_id=".$supplier_info['supplier_id']);





                return "";
            }
        }







        return $msg;
    }









    public function getDistance($addressFrom, $addressTo, $unit = '')
    {



        // Google API key



        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';



        // Change address format



        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);



        $formattedAddrTo     = str_replace(' ', '+', $addressTo);



        // Geocoding API request with start address



        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);



        $outputFrom = json_decode($geocodeFrom);



        if (!empty($outputFrom->error_message)) {



            return $outputFrom->error_message;
        }







        // Geocoding API request with end address



        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);



        $outputTo = json_decode($geocodeTo);



        if (!empty($outputTo->error_message)) {



            return $outputTo->error_message;
        }



        // Get latitude and longitude from the geodata



        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;



        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;



        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;



        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;







        // Calculate distance between latitude and longitude



        $theta    = $longitudeFrom - $longitudeTo;



        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));



        $dist    = acos($dist);



        $dist    = rad2deg($dist);



        $miles    = $dist * 60 * 1.1515;



        // Convert unit and return distance



        $unit = strtoupper($unit);



        if ($unit == "K") {



            return round($miles * 1.609344, 2);
        } elseif ($unit == "M") {



            return round($miles * 1609.344, 2) . ' meters';
        } else {



            return round($miles, 2) . ' miles';
        }
    }







    public function getRawMaterial($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $assessment_id = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $raw_material_arr = $db->query("select ga.*,gf.id as gfid,gf.name as gfname,f.factor_name from ghg_assessment as ga join ghg_factor as gf on ga.factor_id=gf.id join factor as f on gf.name=f.id where ga.supplier_assessment_id=" . $assessment_id . " and ga.ghg_id=21 order by ga.id asc")->getResultArray();



        $data = "";



        $arr = [];



        $arr['raw_material'] = '';



        $arr['supplier_location'] = '';



        if ($raw_material_arr) {



            foreach ($raw_material_arr as $rma) {



                // $data.='<option value="'.$rma['id'].'">'.$rma['factor_name'].'</option>';



                $data .= '<input type="checkbox" class="form-check-input" id="exampleCheck1" name="supplier_raw_material[]" style="width:15%" value="' . $rma['factor_id'] . '">' . $rma['factor_name'];
            }
        }



        $arr['raw_material'] = $data;



        $query = $db->query("select supplier_location from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and (ghg_id=21 || ghg_id=24)");



        $supplier_location = $query->getResultArray();



        $location_from = '<option value="0">Select Location From</option>';



        if ($supplier_location) {



            foreach ($supplier_location as $supp_location) {



                $location_from .= '<option value="' . $supp_location['supplier_location'] . '">' . $supp_location['supplier_location'] . '</option>';
            }
        }



        $arr['supplier_location'] = $location_from;



        echo json_encode($arr);



        // echo $data;



    }







    public function removeAllFlightFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=18");



        echo 'success';
    }







    public function removeAllMobileFuelFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=20");



        echo 'success';
    }







    public function removeAllManufacturingFactor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $db->query("delete from supplier_manufacturing_process where supplier_assessment_id=" . $assessment_id . " and ghg_id=23");



        // $query = $db->query("delete from ghg_assessment where supplier_assessment_id=".$assessment_id." and ghg_id=23");



        echo 'success';
    }







    public function removeAllManufacturing2Factor($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=24");



        echo 'success';
    }







    public function removeAllManufacturing3Factor($assessment_id)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $query = $db->query("select id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



        // $supplier_assessment = $query->getResultArray();



        // $assessment_id=0;



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }        



        $query = $db->query("delete from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=25");



        echo 'success';
    }







    public function getRawMaterialForManufacturing($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        // $assessment_id = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        $raw_material_arr = $db->query("select ga.*,gf.id as gfid,gf.name as gfname,f.factor_name from ghg_assessment as ga join ghg_factor as gf on ga.factor_id=gf.id join factor as f on gf.name=f.id where ga.supplier_assessment_id=" . $assessment_id . " and ga.ghg_id=21 order by ga.id asc")->getResultArray();



        $data = "<option value='0' selected>Raw Material</option>";

        $factor_id_arr = [];

        if ($raw_material_arr) {



            foreach ($raw_material_arr as $rma) {



                $data .= '<option value="' . $rma['factor_id'] . '">' . $rma['factor_name'] . '</option>';

                $factor_id_arr[] = $rma['factor_id'];
            }
        }



        $query = $db->query("select * from manufacturing_process_detail where status=1 and industry_id=" . $supplier_info['industry_id']);

        $manu_process = $query->getResultArray();

        $process = '<option value="0">Select Process</option>';

        if ($manu_process) {

            foreach ($manu_process as $mp) {

                $process .= '<option value="' . $mp['id'] . '">' . $mp['process_name'] . '</option>';
            }
        }



        $fact_str = implode(",", $factor_id_arr);

        $query = $db->query("select u.* from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on u.id=f.factor_unit where gf.id in (" . $fact_str . ") group by u.unit_name");

        $units = $query->getResultArray();

        $unit = '<option value="0">Select Unit</option>';

        if ($units) {

            foreach ($units as $u) {

                $unit .= '<option value="' . $u['id'] . '">' . $u['unit_name'] . '</option>';

                $query = $db->query("select * from sub_units where unit_id='" . $u['id'] . "'");

                $sub_units = $query->getResultArray();

                if ($sub_units) {

                    foreach ($sub_units as $sub_unit) {

                        $unit .= '<option value="' . $u['id'] . ',' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }

        $arr = [];

        $arr['res'] = $data;

        $arr['process'] = $process;

        $arr['unit'] = $unit;

        echo json_encode($arr);

        // echo $data;



    }







    public function getRawMaterialForManufacturing2($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $assessment_id . " and ghg_id=24");



        $ghg_assessment_detail = $query->getResultArray();



        $query = $db->query("select * from sub_units where status=1");



        $sub_units = $query->getResultArray();



        // $assessment_id = 0;



        // $supplier_assessment = $db->query("select id from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11")->getResultArray();



        // if($supplier_assessment) {



        //     $assessment_id = $supplier_assessment[0]['id'];



        // }



        // $raw_material_arr = $db->query("select ga.*,gf.id as gfid,gf.name as gfname,f.factor_name,f.factor_unit from ghg_assessment as ga join ghg_factor as gf on ga.factor_id=gf.id join factor as f on gf.name=f.id where ga.supplier_assessment_id=".$assessment_id." and ga.ghg_id=21 order by ga.id asc")->getResultArray();



        $raw_material_arr = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.ghg_id=24 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)")->getResultArray();



        $raw_material_opt = '<option value="0">Select Material</option>';



        $data = "";



        $prod_fact_unit = "";



        if ($ghg_assessment_detail) {



            foreach ($ghg_assessment_detail as $key => $gd) {



                if ($raw_material_arr) {



                    foreach ($raw_material_arr as $rma) {



                        if ($rma['id'] == $gd['factor_id']) {



                            $raw_material_opt .= '<option value="' . $rma['id'] . '" selected>' . $rma['factor_name'] . '</option>';



                            $prod_fact_unit = '<option value="0">Select Unit</option>';



                            if ($rma['unit_name'] == $gd['unit']) {



                                $prod_fact_unit .= '<option selected>' . $rma['unit_name'] . '</option>';
                            } else {



                                $prod_fact_unit .= '<option>' . $rma['unit_name'] . '</option>';
                            }



                            if ($sub_units) {



                                foreach ($sub_units as $sub_unit) {



                                    if ($sub_unit['unit_id'] == $rma['factor_unit']) {



                                        if ($gd['unit'] == $sub_unit['sub_unit_name']) {



                                            $prod_fact_unit .= '<option value="' . $sub_unit['id'] . '" selected>' . $sub_unit['sub_unit_name'] . '</option>';
                                        } else {



                                            $prod_fact_unit .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                                        }
                                    }
                                }
                            }
                        } else {



                            $raw_material_opt .= '<option value="' . $rma['id'] . '">' . $rma['factor_name'] . '</option>';
                        }
                    }
                }



                $del_btn = "";



                if ($key != 0) {



                    $del_btn = '                                            <button class="remove_factor_block_for_manufacturing2 btn btn-danger"><i class="fa fa-trash"></i></button>';
                }



                $data .= '<div class="step_inner">                                            
                
                

                <div class="theme_field step_label">
                                            
                                            

                                            <select class="form-control label_select" id="exampleFormControlSelect1" name="manuf2_factor[]" onchange="setUnitForManufacturing2(this)">
                                            
                                            

                                            ' . $raw_material_opt . '
                                            
                                            

                                            </select>
                                            
                                            

                                            </div>                                        
                                            
                                            

                                            <div class="step_field">
                                            
                                            

                                            <div class="theme_field d-flex">
                                            
                                            

                                            <input type="number" class="mr-2" name="manuf2_qty[]" value="' . $gd['quantity'] . '">
                                            
                                            

                                            <select class="form-control" id="exampleFormControlSelect1" name="manuf2_unit[]">
                                                    
                                                    

                                                    <option value="0">Select Unit</option>
                                    
                                    

                                    ' . $prod_fact_unit . '                                                            
                                                
                                                

                                                </select>
                                                    
                                                    

                                                    </div>
                                                
                                                

                                                </div>
                                            
                                            

                                            <div class="step_field" style="width:30%;">







<div class="theme_field">
    
    
    
    
    
    

    <div class="stc_left" style="width:100%;">
        
        
        
        
        
        

        <input type="text" class="form-control" id="autocomplete_' . $gd["id"] . '" name="supplier_location[]" value="' . $gd["supplier_location"] . '" />       
            
            
            
            
            
            

            </div>
        
        
        
        
        
        

        </div>
    
    
    
    
    
    

    </div>



<script>







var input = document.getElementById("autocomplete_' . $gd['id'] . '");
      
      
      
      
      
      

      var trip_from = new google.maps.places.Autocomplete(input);    
      
      
      
      
      
      

      </script>



<button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactorForManufacturing2()"><span aria-hidden="true">+</span></button>
                                            
                                            

                                            ' . $del_btn . '
                                            
                                            

                                            &nbsp;
                                            
                                            

                                            </div>';
            }
        } else {



            if ($raw_material_arr) {



                foreach ($raw_material_arr as $rm) {



                    $raw_material_opt .= '<option value="' . $rm['id'] . '">' . $rm['factor_name'] . '</option>';
                }
            }



            if ($raw_material_arr) {



                // foreach($raw_material_arr as $rma) {



                // $data.='<option value="'.$rma['factor_id'].'">'.$rma['factor_name'].'</option>';



                $data .= '<div class="step_inner">                                            
                
                

                <div class="theme_field step_label">
                                            
                                            

                                            <select class="form-control label_select" id="exampleFormControlSelect1" name="manuf2_factor[]" onchange="setUnitForManufacturing2(this)">
                                            
                                            

                                            ' . $raw_material_opt . '
                                            
                                            

                                            </select>
                                            
                                            

                                            </div>                                        
                                            
                                            

                                            <div class="step_field">
                                            
                                            

                                            <div class="theme_field d-flex">
                                            
                                            

                                            <input type="number" class="mr-2" name="manuf2_qty[]" value="">
                                                    
                                                    

                                                    <select class="form-control" id="exampleFormControlSelect1" name="manuf2_unit[]">
                                                    
                                                    

                                                    <option value="0">
                                                        
                                                        

                                                        Select Unit
                                    
                                    

                                    </option>
                                                        
                                                        

                                                        </select>
                                                    
                                                    

                                                    </div>
                                                
                                                

                                                </div>
                                            
                                            

                                            <div class="step_field" style="width:30%;">







<div class="theme_field">
    
    
    
    
    
    

    <div class="stc_left" style="width:100%;">
        
        
        
        
        
        

        <input type="text" class="form-control" id="manufacturing_autocomplete" name="supplier_location[]"  />       
            
            
            
            
            
            

            </div>
        
        
        
        
        
        

        </div>
    
    
    
    
    
    

    </div>



<script>







var input = document.getElementById("manufacturing_autocomplete");
      
      
      
      
      
      

      var trip_from = new google.maps.places.Autocomplete(input);    
      
      
      
      
      
      

      </script>



<button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactorForManufacturing2()"><span aria-hidden="true">+</span></button>
                                            
                                            

                                            &nbsp;
                                            
                                            

                                            </div>';



                // }



            }
        }



        echo $data;
    }







    public function product_manage()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Products';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        if ($supplier_info) {



            $industry_id = $supplier_info['industry_id'];
        }



        $supplier_model = new SupplierModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $footprint_type_model = new FootprintTypeModel();



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



        // $data['type'] = $footprint_type_model->where(['footprint_id' => 2, 'status'=> 1])->findAll();



        $data['type'] = $db->query("select * from footprint_type where footprint_id=2 and status=1 and (industry_id=0 or industry_id=" . $industry_id . ")")->getResultArray();



        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }




        $data['list'] = $db->query("select sa.*,ft.type_name,u.unit_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join unit as u on sa.unit_id=u.id where (sa.supplier_id='" . $u_id . "' OR sa.owner_id='" . $o_id . "') and assessment_id=11 order by sa.id asc")->getResultArray();


        //echo $db->getLastquery($data['list']);



        // echo '<pre>';



        // print_r($data['list']);



        // die();



        return view('brand/product_manage_table', $data);
    }







    public function company_manage()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Sites';
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();
        $footprint_type_model = new FootprintTypeModel();

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



        $data['type'] = $footprint_type_model->where(['footprint_id' => 1, 'status' => 1])->findAll();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }

        $data['list'] =
            $db->query("select sa.*,ft.type_name,u.unit_name,c.name as country_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join countries as c on sa.country_id=c.id left join unit as u on u.id=sa.unit_id where (sa.supplier_id='" . $u_id . "' OR sa.owner_id='" . $o_id . "') and assessment_id=12  order by sa.id asc")->getResultArray();

        // $data['list'] = $db->query("select sa.*,ft.type_name,u.unit_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join unit as u on sa.unit_id=u.id where sa.supplier_id='".$supplier_info['supplier_id']."' and assessment_id=11 order by sa.id asc")->getResultArray();

        $data['sub'] = $db->query("select * from supplier_assessment where  (supplier_id=" . $u_id . " OR owner_id=" . $o_id . ")")->getResultArray();


        $query = $db->query("select * from states");

        $data['stateee'] = $query->getResultArray();
        $query = $db->query("select * from countries where status=1 ");

        $data['country'] = $query->getResultArray();




        return view('brand/company_manage_table', $data);
    }


    public function checkCompanyExists()
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_assessment_model = new supplier_assessment();
        $u_id = session()->supplier_info['supplier_id'];

        $company_name = $this->request->getVar('company_name');
        $same_site = $supplier_assessment_model->where('cp_name', $company_name)->where('supplier_id', $u_id)->first();
        echo json_encode(['exists' => $same_site]);
    }


    public function sub_site_view($id)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Building';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];



        $supplier_model = new SupplierModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $footprint_type_model = new FootprintTypeModel();



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



        $data['type'] = $footprint_type_model->where(['footprint_id' => 1, 'status' => 1])->findAll();
        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }


        $data['list'] =
            $db->query("select sa.*,ft.type_name,u.unit_name,c.name as country_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join countries as c on sa.country_id=c.id left join unit as u on u.id=sa.unit_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "'  order by sa.id asc")->getResultArray();

        $data['sub'] = $db->query("select * from supplier_assessment where  (supplier_id=" . $supplier_id . " OR owner_id=" . $o_id . ")")->getResultArray();
        $data['subsite'] = $db->query("select * from supplier_assessment where  (supplier_id=" . $supplier_id . " OR owner_id=" . $o_id . ") and id=" . $id . "")->getResultArray();


        $status = '1';
        $model = new Sub_siteModel();
        // $data['sub_site'] = $db->query("select * from sub_site where  supplier_id=".$supplier_id." and site_id=".$id." and status=1 ")->getResultArray();
        // $data['sub_site'] = $db->query("SELECT * FROM sub_site WHERE status=1 and supplier_id='".$supplier_id."'  ")->getResultArray();

        $data['sub_site'] = $model->where('site_id', $id)->where('status', 1)->where('supplier_id', $u_id)->orwhere('owner_id', $o_id)->findAll();
        // ['site_id' => $id, 'status' => '1', 'supplier_id' => $supplier_id]

        $query = $db->query("select * from states");

        $data['stateee'] = $query->getResultArray();
        $query = $db->query("select * from countries where status=1 ");

        $data['country'] = $query->getResultArray();


        return view('brand/sub_site_view', $data);
    }
    public function sub_site()
    {

        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'report';

        $db = \Config\Database::connect();

        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

        $model = new Sub_siteModel();
        $site_id = $this->request->getVar('site_id');
        $country = $this->request->getVar('country');
        $sub_site = $this->request->getVar('sub_site');
        $state_id = $this->request->getVar('state_id');
        $company_type = $this->request->getVar('company_type');
        $company_address = $this->request->getVar('company_address');
        $lease_owned = $this->request->getVar('lease_owned');
        $building_size = $this->request->getVar('building_size');
        // print_r($site_id);
        // print_r($country);
        // print_r($sub_site);
        // print_r($state_id);
        // print_r($company_type);
        // print_r($company_address);
        // print_r($lease_owned);
        // print_r($building_size);
        // die();

        $data = [
            'supplier_id' => $supplier_id,
            'owner_id' => $supplier_id,
            'site_id' => $site_id,
            'sub_site_name' => $sub_site,
            'sub_site_address' => $company_address,
            'unit_id' => $this->request->getVar('unit_id')

        ];
        // print_r($data);
        // die();

        $site = $model->insert($data);

        if ($site) {
            $s_date = ['success' => 'Sub-site Insert SuccessFully'];

            $session->setFlashdata($s_date);
        }
        return redirect()->back();
    }
    public function checkSubsiteExists()
    {
        $db = \Config\Database::connect();
        $session = session();
        $model = new Sub_siteModel();
        $sub_site = $this->request->getVar('sub_site');
        $same_site = $model->where('sub_site_name', $sub_site)->first();
        echo json_encode(['exists' => $same_site]);
    }
    public function Edit_sub_site()
    {

        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'report';

        $db = \Config\Database::connect();

        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

        $model = new Sub_siteModel();

        $id = $this->request->getVar('id');
        $site_id = $this->request->getVar('site_id');
        $country = $this->request->getVar('country');
        $sub_site = $this->request->getVar('sub_site');
        $state_id = $this->request->getVar('state_id');
        $company_type = $this->request->getVar('company_type');
        $company_address = $this->request->getVar('company_address');
        $lease_owned = $this->request->getVar('lease_owned');
        $building_size = $this->request->getVar('building_size');

        $data = [
            'supplier_id' => $supplier_id,
            'owner_id' => $supplier_id,
            'site_id' => $site_id,
            'sub_site_name' => $sub_site,
            'sub_site_address' => $company_address,
            'unit_id' => $this->request->getVar('unit_id')

        ];

        $site = $model->update($id, $data);

        if ($site) {
            $s_date = ['success' => 'Sub-site Update SuccessFully'];

            $session->setFlashdata($s_date);
        }
        return redirect()->back();
    }

    public function sub_site_delete()
    {

        $rs = check_session();

        $session = session();


        if (!$rs) {



            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'report';

        $db = \Config\Database::connect();

        $id = $this->request->getVar('company_id');
        // print_r($id);
        // die();
        $model = new Sub_siteModel();
        $data = [
            'status' => 0,
        ];

        $delete =  $model->update($id, $data);
        if ($delete) {
            $s_date = ['error' => 'Sub-site delete SuccessFully'];

            $session->setFlashdata($s_date);
        }
        return redirect()->back();
    }

    public function reporting()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'report';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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







        echo view('brand/demo-report', $data);
    }







    public function createCompany()
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = $supplier_info['supplier_id'];
        $company_name = $this->request->getVar("company_name");
        $company_type = $this->request->getVar("company_type");
        $company_address = $this->request->getVar("company_address");
        $county_model = new CountryModel();
        $state_model = new StateModel();
        $branch_code = $this->request->getVar("branch_code");
        $country_id = $this->request->getVar("country_idd");
        $lease_owned = $this->request->getVar("lease_owned");
        $total_employees = $this->request->getVar("total_employees");
        $supplier_assessment_model = new supplier_assessment();
        $supplier_model = new SupplierModel();

        if ($total_employees == "") {
            $total_employees = "null";
        }
        $building_size = $this->request->getVar("building_size");
        if ($building_size == "") {
            $building_size = null;
        }
        $unit_id = $this->request->getVar("unit_id");
        $state_id = $this->request->getVar("state_id");
        $file = $this->request->getFile('building_image');
        $supplier_plan_id = 0;
        $no_of_company = 0;
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }
        $same_site = $supplier_assessment_model->where('supplier_id', $u_id)->where('cp_name', $company_name)->first();
        if ($same_site) {
            $session->setFlashdata("error", "Site Already saved");
            return redirect()->to('brand/company_manage');
        } else {
            if ($supplier_info) {
                $supplier_plan_arr = $db->query("select supplier_plan_id as spid from supplier where id=" . $supplier_info['supplier_id'])->getResultArray();
                if ($supplier_plan_arr) {
                    $supplier_plan_id = $supplier_plan_arr[0]['spid'];
                }
                $comp_arr = $db->query("select count(id) as cnt from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=10")->getResultArray();
                if ($comp_arr) {
                    $no_of_company = $comp_arr[0]['cnt'];
                }
            }
        }
        $no_of_entry = 0;
        if ($supplier_plan_id) {
            $supplier_plan_assessment_details_arr = $db->query("select no_of_entry as noe from supplier_plan_assessment_details where supplier_plan_id=" . $supplier_plan_id . " and assessment_id=12 and status=1")->getResultArray();
            if ($supplier_plan_assessment_details_arr) {
                $no_of_entry = $supplier_plan_assessment_details_arr[0]['noe'];
            }
        }
        // Only 5 Record Insert

        $noCompany = 5;
        $session = session();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if ($ok['supplier_paid'] == '1') {
            $t = $db->query("SELECT COUNT(*) AS record_count FROM supplier_assessment WHERE supplier_id = '" . $supplier_info['supplier_id'] . "'");
            $db->getLastquery($t);
            $result = $t->getRow();
            if ($result && $result->record_count < 5) {
                $t = $db->query("insert into supplier_assessment(is_submit, assessment_id, supplier_id, lease_owned, pincode, city_id, owner_id, no_of_employee, cp_name, state_id, branch_code, building_size, unit_id, cp_type_id, cp_address, country_id, date_from, date_to) 
                values (1, 12, '" . $supplier_info['supplier_id'] . "','" . $lease_owned . "','" . $pincode . "','" . $city . "','" . $o_id . "'," . $total_employees . ",'" . $company_name . "','" . $state_id . "', '" . $branch_code . "','" . $building_size . "','" . $unit_id . "'," . $company_type . ",'" . $company_address . "','" . $country_id . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");

                $db->getLastquery($t);

                if ($t) {
                    $session->setFlashdata('success', 'Company has been created successfully');
                } else {
                    $session->setFlashdata('error', 'Error to create product');
                }
            } else {
                $session->setFlashdata("error", "Cannot create more companies");
            }
        } else {
            // All Record Insert
            if ($no_of_company < $no_of_entry) {
                $t = $db->query("insert into supplier_assessment(is_submit,assessment_id,supplier_id,lease_owned,pincode,city_id,owner_id,no_of_employee,cp_name,state_id,branch_code,building_size,unit_id,cp_type_id,cp_address,country_id,date_from,date_to) values(1,12,'" . $supplier_info['supplier_id'] . "','" . $lease_owned . "','" . $pincode . "','" . $city . "','" . $o_id . "'," . $total_employees . ",'" . $company_name . "','" . $state_id . "', '" . $branch_code . "','" . $building_size . "','" . $unit_id . "'," . $company_type . ",'" . $company_address . "','" . $country_id . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");
                $db->getLastquery($t);
                if ($t) {
                    $session->setFlashdata('success', 'Company has been created successfully');
                } else {
                    $session->setFlashdata('error', 'Error to create product');
                }
            } else {
                $session->setFlashdata("error", "Cannot create more companies,need to upgrade plan");
            }
        }

        return redirect()->to('brand/company_manage');
    }






    public function editCompany()
    {



        $db = \Config\Database::connect();

        $session = session();


        $company_name = $this->request->getVar("company_name");



        $company_type = $this->request->getVar("company_type");



        $company_address = $this->request->getVar("company_address");


        $county_model = new CountryModel();

        $state_model = new StateModel();

        // Google API key

        // $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

        // Change address format

        // $formattedAddrFrom    = str_replace(' ', '+', $company_address);

        // Geocoding API request with start address

        // $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);

        // $outputFrom = json_decode($geocodeFrom);

        // print_r($outputFrom);

        // if(!empty($outputFrom->error_message)){

        //     return $outputFrom->error_message;

        // }

        // $addresscomponent    = $outputFrom->results[0]->address_components;

        // foreach($addresscomponent as $key=>$addCompVal){

        //     if($addCompVal->types[0]=='postal_code'){

        //         $pincode=$addCompVal->long_name;
        //     }
        //     if($addCompVal->types[0]=='country'){

        //         $country=$addCompVal->long_name;

        //         $query = $county_model->where('name',$country)->where('status',1)->first();

        //         $country_id = $query['id'];

        //     }
        //     if($addCompVal->types[0]=='administrative_area_level_1'){

        //         $state=$addCompVal->long_name;

        //         $query = $state_model->where('name',$state)->where('status',0)->first();

        //         $state_id = $query['id'];

        //     }
        //     if($addCompVal->types[0]=='locality'){

        //         $city=$addCompVal->long_name;
        //     }

        // }



        $total_employees = $this->request->getVar("total_employees");



        $building_size = $this->request->getVar("building_size");



        $unit_id = $this->request->getVar("unit_id");


        $lease_owned = $this->request->getVar("lease_owned");
        // print_r($lease_owned);
        // die();

        // $company_pin = $this->request->getVar("company_pin");

        $assessment_id = $this->request->getVar("company_id");
        // $assessment_id = $this->request->getVar("state_id");
        $state = $this->request->getVar("state_id");



        $country_id = $this->request->getVar("country_idd");



        $rs = $db->query("update supplier_assessment set cp_name='" . $company_name . "',city_id='" . $city . "',state_id='" . $state . "',pincode='" . $pincode . "',unit_id='" . $unit_id . "',state_id='" . $state . "',building_size='" . $building_size . "',lease_owned='" . $lease_owned . "',cp_type_id='" . $company_type . "',cp_address='" . $company_address . "',country_id='" . $country_id . "',no_of_employee='" . $total_employees . "' where id='" . $assessment_id . "'");





        if ($rs) {



            $session->setFlashdata('success', 'Company has been updated successfully');
        } else {



            $session->setFlashdata('error', 'Error to update company');
        }



        return redirect()->to('brand/company_manage');
    }







    public function deleteCompany()
    {



        $db = \Config\Database::connect();



        $assessment_id = $this->request->getVar("company_id");

        $session = session();

        $db->query("delete from supplier_assessment where id=" . $assessment_id);
        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];

        // print_r($supplier_id);
        // die();
        $model = new Supplier_assessment();
        $sensor_model = new SensorModel();

        $auto_delete = $sensor_model->where('supplier_id', $supplier_id)->where('status', 1)->where('subboundary_id', $assessment_id)->findAll();

        foreach ($auto_delete as $dele) {
            $dele_id = $dele['id'];
            $data = [
                'status' => 0
            ];
            $sensor_model->update($dele_id, $data);
        }

        $energy = new Energy_managment();
        $energy_data = new Energy_managment_data();

        $energy_site = $energy->where('supplier_id', $supplier_id)->where('status', 1)->where('site_id', $assessment_id)->findAll();

        foreach ($energy_site as $energy_site_id) {
            $dele_id_energy = $energy_site_id['id'];
            $data = [
                'status' => 0
            ];
            $energy->update($dele_id_energy, $data);
        }

        $energy_site_data = $energy_data->where('supplier_id', $supplier_id)->where('status', 1)->where('site_id', $assessment_id)->findAll();

        foreach ($energy_site_data as $energy_site_i_data) {
            $dele_id_energy_data = $energy_site_i_data['id'];
            $data = [
                'status' => 0
            ];
            $energy_data->update($dele_id_energy_data, $data);
        }




        $session->setFlashdata('error', 'Site delete successfully');

        return redirect()->to('brand/company_manage');
    }







    public function createProduct()
    {



        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $product_name = $this->request->getVar("product_name");
        $product_type = $this->request->getVar("product_type");
        $product_life = $this->request->getVar("life");
        $product_collection = $this->request->getVar("product_collection");
        $product_unit = $this->request->getVar("product_unit");
        $product_sku = $this->request->getVar("product_sku");
        $turnover_contribution = $this->request->getVar("turnover_contribution");
        $product_weight = $this->request->getVar("weight");
        $unit_id = $this->request->getVar("unit_id");
        $lifeunit_id = $this->request->getVar("lifeunit_id");
        $file = $this->request->getFile('product_image');
        // 
        $supplier_plan_id = 0;
        // $suppliermodel = new SupplierModel();
        // $data_supplier  = $suppliermodel->where('id', $supplier_info['supplier_id'])->first()['supplier_paid'];
        // if ($data_supplier == '1') {
        //     $prod_arr = $db->query("select count(id) as cnt from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11")->getResultArray();
        //     print_r($prod_arr);
        //     die;
        // }
        // print_r($data);
        // die;

        $no_of_product = 0;



        if ($supplier_info) {



            $supplier_plan_arr = $db->query("select supplier_plan_id as spid from supplier where id=" . $supplier_info['supplier_id'])->getResultArray();



            if ($supplier_plan_arr) {



                $supplier_plan_id = $supplier_plan_arr[0]['spid'];
                // print_r($supplier_plan_id);
                // die();



            }



            $prod_arr = $db->query("select count(id) as cnt from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11")->getResultArray();



            if ($prod_arr) {



                $no_of_product = $prod_arr[0]['cnt'];
            }
        }



        $no_of_entry = 0;



        if ($supplier_plan_id) {



            $supplier_plan_assessment_details_arr = $db->query("select no_of_entry as noe from supplier_plan_assessment_details where supplier_plan_id=" . $supplier_plan_id . " and assessment_id=12 and status=1")->getResultArray();
            // print_r($supplier_plan_assessment_details_arr);
            // die();



            if ($supplier_plan_assessment_details_arr) {



                $no_of_entry = $supplier_plan_assessment_details_arr[0]['noe'];
                // print_r($no_of_entry);
                // die();



            }
        }

        if ($no_of_product < $no_of_entry) {
            $noCompany = 5;
            $supplier_model = new SupplierModel();
            $session = session();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if ($ok['supplier_paid'] == 1) {
                if ($no_of_product < $noCompany) {
                    if ($file->isValid()) {
                        $ext = $file->getClientExtension();
                        $ava_ext = array("png", "jpg", "jpeg", "gif");
                        if (in_array($ext, $ava_ext)) {
                            $newName = $file->getRandomName();
                            if ($file->move('public/uploads/product', $newName)) {
                                $rs = $db->query("insert into supplier_assessment(is_submit,turnover_contribution,product_life,assessment_id,supplier_id,cp_name,cp_type_id,cp_collection,cp_unit,cp_sku,cp_image,weight,unit_id,lifeunit_id,date_from,date_to) values(1,'" . $turnover_contribution . "','" . $product_life . "',11,'" . $supplier_info['supplier_id'] . "','" . $product_name . "'," . $product_type . ",'" . $product_collection . "','" . $product_unit . "','" . $product_sku . "','" . $newName . "','" . $product_weight . "','" . $unit_id . "','" . $lifeunit_id . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");
                                if ($rs) {
                                    $session->setFlashdata('success', 'Product has been created successfully');
                                } else {
                                    $session->setFlashdata('error', 'Error to create product');
                                }
                            } else {
                                $session->setFlashdata('error', 'Please select a valid image');
                            }
                        } else {
                            $session->setFlashdata('error', 'Please select a valid image');
                        }
                    }
                } else {
                    $session->setFlashdata("error", "Cannot create more companies");
                }
            } else {
                // All Record Insert

                if ($file->isValid()) {
                    $ext = $file->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $newName = $file->getRandomName();
                        if ($file->move('public/uploads/product', $newName)) {
                            $rs = $db->query("insert into supplier_assessment(is_submit,turnover_contribution,product_life,assessment_id,supplier_id,cp_name,cp_type_id,cp_collection,cp_unit,cp_sku,cp_image,weight,unit_id,lifeunit_id,date_from,date_to) values(1,'" . $turnover_contribution . "','" . $product_life . "',11,'" . $supplier_info['supplier_id'] . "','" . $product_name . "'," . $product_type . ",'" . $product_collection . "','" . $product_unit . "','" . $product_sku . "','" . $newName . "','" . $product_weight . "','" . $unit_id . "','" . $lifeunit_id . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");
                            // echo $db->getLastquery($rs);
                            if ($rs) {
                                $session->setFlashdata('success', 'Product has been created successfully');
                            } else {
                                $session->setFlashdata('error', 'Error to create product');
                            }
                        } else {
                            $session->setFlashdata('error', 'Please select a valid image');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                }
            }
        }

        return redirect()->to('brand/product_manage');
    }







    public function editProduct()
    {



        $db = \Config\Database::connect();



        $session = session();



        $assessment_id = $this->request->getVar("product_id");




        $name = $this->request->getVar("product_name");



        $type = $this->request->getVar("product_type");



        $collection = $this->request->getVar("product_collection");



        $unit = $this->request->getVar("unit");



        $sku = $this->request->getVar("product_sku");

        $weight = $this->request->getVar("weight");

        $lifeunit_id = $this->request->getVar("lifeunit_id");
        $unit_id = $this->request->getVar("unit_id");



        $file = $this->request->getFile('product_image');
        $filee = $this->request->getVar('product_image_i');

        $turnover_contribution = $this->request->getVar("turnover_contribution");

        $product_life = $this->request->getVar('product_lifse');




        if ($file->isValid()) {



            $ext = $file->getClientExtension();



            $ava_ext = array("png", "jpg", "jpeg", "gif");



            if (in_array($ext, $ava_ext)) {



                $newName = $file->getRandomName();



                if ($file->move('public/uploads/product', $newName)) {



                    $rs = $db->query("update supplier_assessment set cp_name='" . $name . "',cp_type_id=" . $type . ",turnover_contribution='" . $turnover_contribution . "',product_life='" . $product_life . "',lifeunit_id='" . $lifeunit_id . "',cp_collection='" . $collection . "',cp_unit='" . $unit . "',cp_sku='" . $sku . "',cp_image='" . $newName . "',weight='" . $weight . "',unit_id='" . $unit_id . "' where id=" . $assessment_id);

                    // echo $db->getLastquery($rs);
                    // die();

                    if ($rs) {



                        $session->setFlashdata('success', 'Product has been updated successfully');
                    } else {



                        $session->setFlashdata('error', 'Error to update product');
                    }
                } else {



                    $session->setFlashdata('error', 'Please select a valid image');
                }
            } else {



                $session->setFlashdata('error', 'Please select a valid image');
            }
        } else {

            $rs = $db->query("update supplier_assessment set cp_name='" . $name . "',cp_type_id=" . $type . ",turnover_contribution='" . $turnover_contribution . "',product_life='" . $product_life . "',lifeunit_id='" . $lifeunit_id . "',cp_collection='" . $collection . "',cp_unit='" . $unit . "',cp_sku='" . $sku . "',weight='" . $weight . "',unit_id='" . $unit_id . "' where id=" . $assessment_id);

            // echo $db->getLastquery($rs);
            // die();

            if ($rs) {
                $session->setFlashdata('success', 'Product has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Error to update product');
            }
        }

        return redirect()->to('brand/product_manage');
    }







    public function deleteProduct()
    {



        $db = \Config\Database::connect();

        $session = session();


        $assessment_id = $this->request->getVar("product_id");



        $id = $db->query("delete from supplier_assessment where id=" . $assessment_id);

        if ($id) {
            $session->setFlashdata('error', 'Product delete SuccessFully');
        }



        return redirect()->to('brand/product_manage');
    }







    public function addMoreFactorForManufacturing2($assessment_id = 0)
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $industry_id = 0;



        $country_id = 0;



        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }



        $raw_material_arr = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.ghg_id=24 and gf.type=2 and (gf.industry_id=" . $industry_id . " or gf.industry_id=0) and (gf.country_id=" . $country_id . " or gf.country_id=0)")->getResultArray();



        $raw_material_opt = '<option value="0">Select Material</option>';



        $data = "";



        if ($raw_material_arr) {



            foreach ($raw_material_arr as $rm) {



                $raw_material_opt .= '<option value="' . $rm['id'] . '">' . $rm['factor_name'] . '</option>';
            }
        }



        $arr = [];



        $arr['res'] = '';



        $arr['rand_num'] = 1;



        if ($raw_material_arr) {



            $rand_num = rand(1, 10000);



            $arr['rand_num'] = $rand_num;



            // foreach($raw_material_arr as $rma) {



            // $data.='<option value="'.$rma['factor_id'].'">'.$rma['factor_name'].'</option>';



            $supplier_location = '<div class="step_field" style="width:30%;">
            
            

            <div class="theme_field">
    
    

    <div class="stc_left" style="width:100%;">
        
        

        <input type="text" class="form-control" id="manufacturing_autocomplete_' . $rand_num . '" name="supplier_location[]" value=" " />       
            
            

            </div>
        
        

        </div>
    
    

    </div>';



            $data .= '<div class="step_inner">                                            
            
            

            <div class="theme_field step_label">
                                            
                                            

                                            <select class="form-control label_select" id="exampleFormControlSelect1" name="manuf2_factor[]" onchange="setUnitForManufacturing2(this)">
                                            
                                            

                                            ' . $raw_material_opt . '
                                            
                                            

                                            </select>
                                            
                                            

                                            </div>                                        
                                            
                                            

                                            <div class="step_field">
                                            
                                            

                                            <div class="theme_field d-flex">
                                            
                                            

                                            <input type="number" class="mr-2" name="manuf2_qty[]" value="">
                                                    
                                                    

                                                    <select class="form-control" id="exampleFormControlSelect1" name="manuf2_unit[]">
                                                    
                                                    

                                                    <option value="0">Select Unit                                
                                                        
                                                        

                                                        </option>
                                                        
                                                        

                                                        </select>
                                                    
                                                    

                                                    </div>
                                                
                                                

                                                </div>' . $supplier_location . '
                                            
                                            

                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactorForManufacturing2()"><span aria-hidden="true">+</span></button>
                                            
                                            

                                            <button class="remove_factor_block_for_manufacturing2 btn btn-danger"><i class="fa fa-trash"></i></button>
                                            
                                            

                                            &nbsp;
                                            
                                            

                                            </div>';



            // }



        }



        // echo $data;        



        $arr['res'] = $data;



        echo json_encode($arr);
    }







    public function getYearByTransport($vehicle)
    {



        $db = \Config\Database::connect();



        $query = $db->query("select year from transportation_detail where vehicle_id='" . $vehicle . "' and status=1 order by year asc");



        $cv_year = $query->getResultArray();



        $data = '<option value="0">Select year</option>';



        if ($cv_year) {



            foreach ($cv_year as $cvy) {



                $data .= '<option value="' . $cvy['year'] . '">' . $cvy['year'] . '</option>';
            }
        }



        echo $data;
    }







    public function getTypeOfTransportation()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $query = $db->query("select type from transportation_detail where vehicle_id='" . $vehicle . "' and year='" . $year . "' and status=1");



        $cv_type = $query->getResultArray();



        $data = '<option value="0">Select type</option>';



        if ($cv_type) {



            foreach ($cv_type as $cvy) {



                $data .= '<option value="' . $cvy['type'] . '">' . $cvy['type'] . '</option>';
            }
        }



        echo $data;
    }







    public function getModelOfTransportation()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $query = $db->query("select model from transportation_detail where vehicle_id='" . $vehicle . "' and year='" . $year . "' and type='" . $type . "' and status=1");



        $cv_model = $query->getResultArray();



        $data = '<option value="0">Select model</option>';



        if ($cv_model) {



            foreach ($cv_model as $cvy) {



                $data .= '<option value="' . $cvy['model'] . '">' . $cvy['model'] . '</option>';
            }
        }



        echo $data;
    }











    public function getGhgFactorOfTransportation()
    {



        $db = \Config\Database::connect();



        $vehicle =  $this->request->getVar("vehicle");



        $year = $this->request->getVar("year");



        $type = $this->request->getVar("type");



        $model = $this->request->getVar("model");



        // $derivative = $this->request->getVar("derivative");



        $query = $db->query("select cvd.*,gf.name,f.factor_name from transportation_detail as cvd join ghg_factor as gf on gf.id=cvd.ghg_factor_id join factor as f on f.id=gf.name where cvd.vehicle_id='" . $vehicle . "' and cvd.year='" . $year . "' and cvd.type='" . $type . "' and cvd.model='" . $model . "' and cvd.status=1");



        $cv_ghg_factor = $query->getResultArray();



        $data = '';



        if ($cv_ghg_factor) {



            foreach ($cv_ghg_factor as $cvy) {



                $data .= '<option value="' . $cvy['ghg_factor_id'] . '">' . $cvy['factor_name'] . '</option>';
            }
        }



        echo $data;
    }







    public function compareProduct()
    {



        $db = \Config\Database::connect();



        $products = $this->request->getVar('products');



        $product_name = [];



        $raw_material = [];



        $transportation = [];



        $manufacturing = [];



        $packaging = [];



        $end_of_life = [];



        $total_footprint = [];



        $total_raw_material_footprint = 0;



        $total_transportation_footprint = 0;



        $total_manufacturing_footprint = 0;



        $total_packaging_footprint = 0;



        $total_life_footprint = 0;



        $data = [];



        if ($products) {



            foreach ($products as $key => $product) {



                $query = $db->query("select * from supplier_assessment where id=" . $product);



                $prod_info = $query->getResultArray();



                if ($prod_info) {



                    $product_name[] = $prod_info[0]['cp_name'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $product . "' and ghg_id=21");



                $raw_material_footprint = $query->getResultArray();



                if ($raw_material_footprint) {



                    $raw_material[] = number_format($raw_material_footprint[0]['tot'], 2, ".", "");



                    $total_raw_material_footprint = $total_raw_material_footprint + $raw_material_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $product . "' and ghg_id=22");



                $transportation_footprint = $query->getResultArray();



                if ($transportation_footprint) {



                    $transportation[] = number_format($transportation_footprint[0]['tot'], 2, ".", "");



                    $total_transportation_footprint = $total_transportation_footprint + $transportation_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from supplier_manufacturing_process where supplier_assessment_id='" . $product . "' and ghg_id=23");



                $manufacturing_footprint = $query->getResultArray();



                if ($manufacturing_footprint) {



                    $manufacturing[] = number_format($manufacturing_footprint[0]['tot'], 2, ".", "");



                    $total_manufacturing_footprint = $total_manufacturing_footprint + $manufacturing_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $product . "' and ghg_id=24");



                $packaging_footprint = $query->getResultArray();



                if ($packaging_footprint) {



                    $packaging[] = number_format($packaging_footprint[0]['tot'], 2, ".", "");



                    $total_packaging_footprint = $total_packaging_footprint + $packaging_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $product . "' and ghg_id=25");



                $eol_footprint = $query->getResultArray();



                if ($eol_footprint) {



                    $end_of_life[] = number_format($eol_footprint[0]['tot'], 2, ".", "");



                    $total_life_footprint = $total_life_footprint + $eol_footprint[0]['tot'];
                }
            }
        }



        $data['product_name'] = $product_name;



        $data['raw_material'] = $raw_material;



        $data['transportation'] = $transportation;



        $data['manufacturing'] = $manufacturing;



        $data['packaging'] = $packaging;



        $data['end_of_life'] = $end_of_life;



        $data['total_raw_material_footprint'] = number_format($total_raw_material_footprint, 2, ".", "");



        $data['total_transportation_footprint'] = number_format($total_transportation_footprint, 2, ".", "");



        $data['total_manufacturing_footprint'] = number_format($total_manufacturing_footprint, 2, ".", "");



        $data['total_packaging_footprint'] = number_format($total_packaging_footprint, 2, ".", "");



        $data['total_life_footprint'] = number_format($total_life_footprint, 2, ".", "");



        echo json_encode($data);
    }







    public function compareWorkplace()
    {



        $db = \Config\Database::connect();



        $workplaces = $this->request->getVar('workplaces');



        $workplace_name = [];



        $building = [];



        $flight = [];



        $company_vehicle = [];



        $mobile_fuel = [];



        $total_footprint = [];



        $total_building_footprint = 0;



        $total_flight_footprint = 0;



        $total_company_vehicle_footprint = 0;



        $total_mobile_fuel_footprint = 0;



        $data = [];



        if ($workplaces) {



            foreach ($workplaces as $key => $workplace) {



                $query = $db->query("select * from supplier_assessment where id=" . $workplace);



                $workplace_info = $query->getResultArray();



                if ($workplace_info) {



                    $workplace_name[] = $workplace_info[0]['cp_name'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $workplace . "' and ghg_id=17");



                $building_footprint = $query->getResultArray();



                if ($building_footprint) {



                    $building[] = number_format($building_footprint[0]['tot'], 2, ".", "");



                    $total_building_footprint = $total_building_footprint + $building_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $workplace . "' and ghg_id=19");



                $company_vehicle_footprint = $query->getResultArray();



                if ($company_vehicle_footprint) {



                    $company_vehicle[] = number_format($company_vehicle_footprint[0]['tot'], 2, ".", "");



                    $total_company_vehicle_footprint = $total_company_vehicle_footprint + $company_vehicle_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $workplace . "' and ghg_id=18");



                $flight_footprint = $query->getResultArray();



                if ($flight_footprint) {



                    $flight[] = number_format($flight_footprint[0]['tot'], 2, ".", "");



                    $total_flight_footprint = $total_flight_footprint + $flight_footprint[0]['tot'];
                }



                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $workplace . "' and ghg_id=20");



                $mobile_fuel_footprint = $query->getResultArray();



                if ($mobile_fuel_footprint) {



                    $mobile_fuel[] = number_format($mobile_fuel_footprint[0]['tot'], 2, ".", "");



                    $total_mobile_fuel_footprint = $total_mobile_fuel_footprint + $mobile_fuel_footprint[0]['tot'];
                }
            }
        }



        $data['workplace_name'] = $workplace_name;



        $data['building'] = $building;



        $data['flight'] = $flight;



        $data['company_vehicle'] = $company_vehicle;



        $data['mobile_fuel'] = $mobile_fuel;



        $data['total_building_footprint'] = number_format($total_building_footprint, 2, ".", "");



        $data['total_flight_footprint'] = number_format($total_flight_footprint, 2, ".", "");



        $data['total_company_vehicle_footprint'] = number_format($total_company_vehicle_footprint, 2, ".", "");



        $data['total_mobile_fuel_footprint'] = number_format($total_mobile_fuel_footprint, 2, ".", "");



        echo json_encode($data);
    }







    public function updatePersonalInfo()
    {



        $db = \Config\Database::connect();



        $session = session();



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }









        // print_R($this->request->getVar());



        // die();

        $supplier_info = $session->get('supplier_info');



        // $first_name = $this->request->getVar("first_name");



        // $last_name = $this->request->getVar("last_name");



        $email = $this->request->getVar("email");



        // $mobile = $this->request->getVar("mobile");



        $password = $this->request->getVar("password");



        $confirm_password = $this->request->getVar("confirm_password");



        if ($password) {



            if ($password == $confirm_password) {



                $rs = $db->query("update supplier set email='" . $email . "',password='" . password_hash($password, PASSWORD_DEFAULT) . "' where id='" . $supplier_info['supplier_id'] . "'");



                if ($rs) {



                    $session->setFlashdata("success", "Account Info has been updated");
                } else {



                    $session->setFlashdata("error", "Error to update account info");
                }
            } else {



                $session->setFlashdata("error", "Password and confirm password not match");
            }
        } else {



            $rs = $db->query("update supplier set email='" . $email . "' where id='" . $supplier_info['supplier_id'] . "'");



            if ($rs) {



                $session->setFlashdata("success", "Account Info has been updated");
            } else {



                $session->setFlashdata("error", "Error to update account info");
            }
        }



        return redirect()->to('brand/account');
    }







    public function updateCompanyInfo()
    {



        $db = \Config\Database::connect();



        $session = session();



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $supplier_info = $session->get('supplier_info');



        //  $brand_name = $this->request->getVar("brand_name");



        // $country = $this->request->getVar("country");



        $industry = $this->request->getVar("industry");



        $team_size = $this->request->getVar("team_size");



        $website = $this->request->getVar("website");



        $description = $this->request->getVar("description");

        if (empty($industry)) {



            $rs = $query = $db->query("update supplier set website='" . $website . "',description='" . $description . "' where id='" . $supplier_info['supplier_id'] . "'");



            if ($rs) {



                $session->setFlashdata("success", "Company info has been updated");
            }
        } else {



            $rs = $query = $db->query("update supplier set industry_id='" . $industry . "',website='" . $website . "',description='" . $description . "' where id='" . $supplier_info['supplier_id'] . "'");



            if ($rs) {



                $session->setFlashdata("success", "Company info has been updated");
            }
        }

        // else {            // $session->setFlashdata("error","Error to update company info");



        // }



        return redirect()->to("brand/account");
    }







    public function offset()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Offset';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $query = $db->query("select * from assessment_offset where status=1");



        $data['offset'] = $query->getResultArray();



        return view('brand/offset', $data);
    }







    public function offset_payment()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $name_on_certificate = $this->request->getVar("name");



        $offset = $this->request->getVar("offset");



        $offset_qty = $this->request->getVar("offset_qty");



        // echo '<pre>';



        // print_r($offset_qty);



        // die();



        $total_price = $this->request->getVar("tot_price");



        $offset_arr = explode(",", $offset);



        $offset_qty_arr = explode(",", $offset_qty);



        // $total_price = 0;



        // $query = $db->query("select sum(price) as tot_price from assessment_offset where id in (".$offset.")");



        // $price_arr = $query->getResultArray();



        // if($price_arr) {



        //     $total_price = $price_arr[0]['tot_price'];



        // }



        $query = $db->query("select * from assessment_offset where id in (" . $offset . ")");



        $assessment_offset = $query->getResultArray();



        $line_items = [];



        $data_str = "";



        if ($assessment_offset) {



            foreach ($assessment_offset as $key => $ao) {



                $data_str .= "&line_items[" . $key . "][quantity]=" . $offset_qty_arr[$ao['id']] . "&line_items[" . $key . "][price_data][unit_amount]=" . (($ao['price']) * 100) . "&line_items[" . $key . "][price_data][currency]=INR&line_items[" . $key . "][price_data][product]=" . $ao['stripe_product_id'];
            }
        }



        $url = "https://api.stripe.com/v1/checkout/sessions";



        $curl = curl_init($url);



        curl_setopt($curl, CURLOPT_URL, $url);



        curl_setopt($curl, CURLOPT_POST, true);



        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



        $headers = array(



            "Content-Type: application/x-www-form-urlencoded",



            'Authorization: Bearer sk_test_51JJE0hSCiFTqq5nyyrQzOJ2avuneiYqRRs4UUNVjqXWcoC5kSGaMNnifnaAwDR1K6Yds8S8uDKJ1wIDpGpEj8kUV00u7HfW1Jk'



        );







        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



        $data = "success_url=https://positiivplus.io/brand/offset_purchase/" . $supplier_info['supplier_id'] . "&cancel_url=https://positiivplus.io/brand/offset_purchase_cancel/" . $supplier_info['supplier_id'] . "&payment_method_types[0]=card" . $data_str . "&mode=payment&billing_address_collection=required";







        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);



        //for debug only!



        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);



        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);



        $resp = curl_exec($curl);



        curl_close($curl);







        $checkout_session = json_decode($resp, true);



        // echo '<pre>';



        // print_r($checkout_session);



        // die();



        $offsettt = $db->query("insert into supplier_offset(supplier_id,offset,name_on_certificate,stripe_token,stripe_amount,status) values(" . $supplier_info['supplier_id'] . ",'" . json_encode($offset_arr) . "','" . $name_on_certificate . "','" . $checkout_session['id'] . "','" . ($checkout_session['amount_total'] / 100) . "',1)");



        $query = $db->query("SELECT * FROM supplier_offset where supplier_id=" . $supplier_info['supplier_id'] . " ORDER BY id DESC LIMIT 1");



        $last_inserted_id = $query->getRow();



        if ($offset_arr) {



            foreach ($offset_arr as $oa) {



                $query = $db->query("select price from assessment_offset where id='" . $oa . "'");



                $off_price = $query->getResultArray();



                $p = 0;



                if ($off_price) {



                    $p = $off_price[0]['price'];
                }



                $query = $db->query("insert into supplier_offset_item(supplier_offset_payment_id,supplier_id,offset_id,offset_price,status,offset_qty) values('" . $last_inserted_id->id . "','" . $supplier_info['supplier_id'] . "','" . $oa . "','" . $p . "',1," . $offset_qty_arr[$oa] . ")");
            }
        }



        $dta['str'] = $checkout_session['id'];



        return view('brand/offset_payment', $dta);
    }







    public function offset_purchase($supplier_id)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Offset';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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







        $query = $db->query("select * from supplier_offset where supplier_id='" . $supplier_id . "' order by id desc");



        $supplier_offset = $query->getResultArray();







        $url = "https://api.stripe.com/v1/checkout/sessions/" . $supplier_offset[0]['stripe_token'];



        $curl = curl_init($url);



        curl_setopt($curl, CURLOPT_URL, $url);



        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



        $headers = array(



            "Content-Type: application/x-www-form-urlencoded",



            'Authorization: Bearer sk_test_51JJE0hSCiFTqq5nyyrQzOJ2avuneiYqRRs4UUNVjqXWcoC5kSGaMNnifnaAwDR1K6Yds8S8uDKJ1wIDpGpEj8kUV00u7HfW1Jk'



        );



        //for debug only!



        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);



        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);



        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);



        $resp = curl_exec($curl);



        $stripe = json_decode($resp);



        curl_close($curl);



        //$stripe->payment_intent;



        $status = 0;



        if ($stripe->payment_status == 'paid') {



            $status = 1;
        }







        $supplier_offsetttt = $db->query("update supplier_offset set stripe_payment_id='" . $stripe->payment_intent . "',payment_status='" . $status . "',stripe_payment_datetime='" . date('Y-m-d H:i:s') . "' where id='" . $supplier_offset[0]['id'] . "'");



        $session->setFlashdata("success", "Your payment is successful and your payment id is " . $stripe->payment_intent);



        return redirect()->to('brand/offset_manage');



        // echo view('brand/offset_manage');



    }







    public function offset_purchase_cancel($supplier_id)
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Offset';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        echo view('brand/offset_purchase_cancel', $data);
    }







    public function offset_manage()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Offset';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $query = $db->query("select * from supplier_offset where supplier_id='" . $supplier_info['supplier_id'] . "' and payment_status=1 order by id desc");



        $supplier_offset = $query->getResultArray();



        $data['supplier_offset'] = [];



        if ($supplier_offset) {



            foreach ($supplier_offset as $so) {



                $query = $db->query("select soi.*,ao.name from supplier_offset_item as soi join assessment_offset as ao on soi.offset_id=ao.id where soi.supplier_offset_payment_id=" . $so['id']);



                $supplier_offset_item = $query->getResultArray();



                $temp = [];



                $temp['supplier_offset'] = $so;



                $temp['supplier_offset_item'] = $supplier_offset_item;



                $data['supplier_offset'][] = $temp;
            }
        }



        // echo '<pre>';



        // print_r($data['supplier_offset']);



        // die();



        return view('brand/offset_manage', $data);
    }







    public function offset_item_basket()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Offset';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



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



        $offset = $this->request->getVar("offset_basket");



        $offset_qty = $this->request->getVar("offset_qty");



        $offset_arr = explode(",", $offset);



        $offset_qty_temp_arr = explode(",", $offset_qty);



        $offset_qty_arr = [];



        if ($offset_qty_temp_arr && $offset_arr) {



            foreach ($offset_arr as $key => $oa) {



                $offset_qty_arr[$oa] = $offset_qty_temp_arr[$key];
            }
        }



        $query = $db->query("select * from assessment_offset where id in (" . $offset . ")");



        $data['assessment_offset'] = $query->getResultArray();



        // $query = $db->query("select sum(price) as tot from assessment_offset where id in (".$offset.")");



        // $price_arr = $query->getResultArray();



        // $tot_price = 0;



        // if($price_arr) {



        //  $tot_price = $price_arr[0]['tot'];



        // }



        $tot_price = 0;



        foreach ($data['assessment_offset'] as $ass_off) {



            $tot_price += $ass_off['price'] * ($offset_qty_arr[$ass_off['id']]);
        }



        // echo $tot_price;



        // die();



        $data['tot_price'] = $tot_price;



        $data['offset'] = $offset;



        $data['offset_arr'] = $offset_arr;



        $data['offset_qty_arr'] = $offset_qty_arr;



        // echo '<pre>';



        // print_r($data['offset_arr']);



        // echo '<br/>------<br/>';



        // print_r($data['offset_qty_arr']);



        // die();



        return view('brand/offset_item_basket', $data);
    }







    public function check_distance()
    {



        return view('brand/demo.php');
    }





    public function find_water()
    {



        $from = $this->request->getVar("trip_from");



        $to = $this->request->getVar("trip_to");





        // echo '<pre>';



        // print_r($outputTo);



        // die();



        // Get latitude and longitude from the geodata



        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;



        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;



        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;



        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;



        $rs = [];



        $rs['latitudeFrom'] = $latitudeFrom;



        $rs['longitudeFrom'] = $longitudeFrom;



        $rs['latitudeTo'] = $latitudeTo;



        $rs['longitudeTo'] = $longitudeTo;



        echo json_encode($rs);
    }





    public function find_airport()
    {

        $db = \Config\Database::connect();

        $from = $this->request->getVar("trip_from");



        $to = $this->request->getVar("trip_to");



        // echo " To: ".$to;



        // die();



        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';



        $formattedAddrFrom    = str_replace(' ', '+', $from);



        $formattedAddrTo     = str_replace(' ', '+', $to);



        // print_r($from);



        // echo "From: ".$formattedAddrFrom." To: ".$formattedAddrTo;



        //  die();







        // Geocoding API request with start address



        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);



        $outputFrom = json_decode($geocodeFrom);



        if (!empty($outputFrom->error_message)) {



            return $outputFrom->error_message;
        }

        $geocodeFrofm = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $formattedAddrFrom . '&destinations=' . $formattedAddrTo . '&key=' . $apiKey);







        $Fo = count($outputFrom->results[0]->address_components) - 1;



        $Fc0    = $outputFrom->results[0]->address_components[$Fo]->long_name;



        if (is_numeric($Fc0)) {

            $Fi = $Fo - 1;

            $countryF    = $outputFrom->results[0]->address_components[$Fi]->long_name;
        } else {



            $countryF    = $outputFrom->results[0]->address_components[$Fo]->long_name;;
        }





        // echo "<prev></prev>";

        //     print_r($geocodeFrofm);

        //     die();



        // Geocoding API request with end address



        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);



        $outputTo = json_decode($geocodeTo);



        if (!empty($outputTo->error_message)) {



            return $outputTo->error_message;
        }



        // echo '<pre>';



        // print_r($outputTo);



        // die();



        // Get latitude and longitude from the geodata



        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;



        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;



        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;



        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;



        $o = count($outputTo->results[0]->address_components) - 1;



        $c0    = $outputTo->results[0]->address_components[$o]->long_name;

        if (is_numeric($c0)) {

            $i = $o - 1;

            $country    = $outputTo->results[0]->address_components[$i]->long_name;



            // if(is_numeric($c1)){



            //                     $c2    = $outputTo->results[0]->address_components[2]->long_name; 



            //                     if(is_numeric($c2)){

            //                         $c3    = $outputTo->results[0]->address_components[3]->long_name;



            //                         if(is_numeric($c3)){

            //                         $country    = $outputTo->results[0]->address_components[4]->long_name;



            //                     }else{

            //                       $country    = $outputTo->results[0]->address_components[3]->long_name; 



            //                     }



            //                     }else{

            //                       $country    = $outputTo->results[0]->address_components[2]->long_name; 



            //                     }









            //                 }else{

            //                     $country    = $outputTo->results[0]->address_components[1]->long_name;



            //                 }

        } else {



            $country    = $outputTo->results[0]->address_components[$o]->long_name;;
        }





        $ce = $db->query("SELECT  hsd.emission FROM  hotel_stay_detail AS hsd JOIN countries AS c ON c.id = hsd.country_id WHERE hsd.status=1 and c.name='" . $country . "'")->getResultArray();

        if (empty($ce)) {

            $fj['emission'] = 90.2;

            $fjz[] = $fj;

            $f[] = $fjz;
        } else {

            $f[] = $ce;
        }



        // print_r($countryF);



        $rs = [];

        $rs['query'] = $f[0][0]['emission'];

        $rs['Fromcountry'] = $countryF;



        $rs['latitudeFrom'] = $latitudeFrom;



        $rs['longitudeFrom'] = $longitudeFrom;



        $rs['latitudeTo'] = $latitudeTo;



        $rs['longitudeTo'] = $longitudeTo;



        echo json_encode($rs);







        // Calculate distance between latitude and longitude



        // $theta    = $longitudeFrom - $longitudeTo;



        // $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));



        // $dist    = acos($dist);



        // $dist    = rad2deg($dist);



        // $miles    = $dist * 60 * 1.1515;



        // // Convert unit and return distance



        // $unit = strtoupper($unit);



        // if($unit == "K"){



        //     return round($miles * 1.609344, 2);



        // }elseif($unit == "M"){



        //     return round($miles * 1609.344, 2).' meters';



        // }else{



        //     return round($miles, 2).' miles';



        // }        



    }







    public function find_distance()
    {

        $db = \Config\Database::connect();



        $lat_from = $this->request->getVar("lat_from");



        $long_from = $this->request->getVar("long_from");



        $lat_to = $this->request->getVar("lat_to");



        $long_to = $this->request->getVar("long_to");



        $theta    = $long_from - $long_to;



        $dist    = sin(deg2rad($lat_from)) * sin(deg2rad($lat_to)) +  cos(deg2rad($lat_from)) * cos(deg2rad($lat_to)) * cos(deg2rad($theta));



        $dist    = acos($dist);

        //echo $dist;



        $dist    = rad2deg($dist);



        $miles    = $dist * 60 * 1.1515;



        // Convert unit and return distance



        $unit = strtoupper("K");



        $distance = "";



        if ($unit == "K") {



            $distance = round($miles * 1.609344, 2);
        } elseif ($unit == "M") {



            $distance = round($miles * 1609.344, 2) . ' meters';
        } else {



            $distance = round($miles, 2) . ' miles';
        }



        // echo $distance;

        $airport_departure_transfer = "131";

        $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id='" . $airport_departure_transfer . "'")->getResultArray();



        $emission_factor = 0;



        if ($emission_factor_arr) {



            $emission_factor = $emission_factor_arr[0]['emission_factor'];
        }

        // print_r($emission_factor);

        // $emission_factor = 55565786908;



        $arr = [];



        $arr['emission'] = round($distance * $emission_factor);



        $arr['distance'] = $distance . ' km';



        echo json_encode($arr);
    }


    public function getAirportByLocation()
    {



        $db = \Config\Database::connect();



        $from = $this->request->getVar("trip_from");



        $to = $this->request->getVar("trip_to");



        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';



        $formattedAddrFrom    = str_replace(' ', '+', $from);



        $formattedAddrTo     = str_replace(' ', '+', $to);



        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);



        $outputFrom = json_decode($geocodeFrom);



        if (!empty($outputFrom->error_message)) {



            return $outputFrom->error_message;
        }



        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);



        $outputTo = json_decode($geocodeTo);



        if (!empty($outputTo->error_message)) {



            return $outputTo->error_message;
        }

        // print_r($outputTo);

        $o = count($outputTo->results[0]->address_components) - 1;



        $country    = $outputTo->results[0]->address_components[$o]->long_name;









        $ce = $db->query("SELECT  hsd.emission FROM  hotel_stay_detail AS hsd JOIN countries AS c ON c.id = hsd.country_id WHERE hsd.status=1 and c.name='" . $country . "'")->getResultArray();

        if (empty($ce)) {

            $fj['emission'] = 90.2;

            $fjz[] = $fj;

            $f[] = $fjz;
        } else {

            $f[] = $ce;
        }



        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
        $airports = [];
        $airports['airports_from'] = [];
        $airports['airports_to'] = [];



        $curl = curl_init();



        curl_setopt_array($curl, [



            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/" . $latitudeFrom . "/" . $longitudeFrom . "/km/400/106",



            CURLOPT_RETURNTRANSFER => true,



            CURLOPT_FOLLOWLOCATION => true,



            CURLOPT_ENCODING => "",



            CURLOPT_MAXREDIRS => 10,



            CURLOPT_TIMEOUT => 30,



            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,



            CURLOPT_CUSTOMREQUEST => "GET",



            CURLOPT_HTTPHEADER => [



                "x-rapidapi-host: aerodatabox.p.rapidapi.com",



                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"



            ],



        ]);



        $response = curl_exec($curl);



        $err = curl_error($curl);



        curl_close($curl);



        if ($err) {



            echo "cURL Error #:" . $err;
        } else {



            $rs = json_decode($response);



            $temp_arr = [];



            foreach ($rs->items as $itm) {



                $arr = [];



                $arr['name'] = $itm->name;



                $arr['code'] = $itm->icao;



                $temp_arr[] = $arr;
            }



            $airports['airports_from'] = $temp_arr;
        }







        $curl = curl_init();



        curl_setopt_array($curl, [



            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/search/location/" . $latitudeTo . "/" . $longitudeTo . "/km/400/166",



            CURLOPT_RETURNTRANSFER => true,



            CURLOPT_FOLLOWLOCATION => true,



            CURLOPT_ENCODING => "",



            CURLOPT_MAXREDIRS => 10,



            CURLOPT_TIMEOUT => 30,



            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,



            CURLOPT_CUSTOMREQUEST => "GET",



            CURLOPT_HTTPHEADER => [



                "x-rapidapi-host: aerodatabox.p.rapidapi.com",



                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"



            ],



        ]);



        $response = curl_exec($curl);



        $err = curl_error($curl);



        curl_close($curl);



        if ($err) {



            echo "cURL Error #:" . $err;
        } else {



            $rs = json_decode($response);



            $temp_arr = [];



            foreach ($rs->items as $itm) {



                $arr = [];



                $arr['name'] = $itm->name;



                $arr['code'] = $itm->icao;



                $temp_arr[] = $arr;
            }



            $airports['airports_to'] = $temp_arr;
        }

        // print_r($f[0][0]['emission']);

        $airports['emission'] = $f[0][0]['emission'];

        echo json_encode($airports);
    }

    public function demo2()
    {



        return view('brand/demo2.php');
    }

    public function find_air_distance()
    {



        $db = \Config\Database::connect();



        $departure_code = $this->request->getVar("departure_code");



        $arrival_code = $this->request->getVar("arrival_code");



        $flying_class = $this->request->getVar("flying_class");



        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");



        $curl = curl_init();



        curl_setopt_array($curl, [



            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/Icao/" . $departure_code . "/distance-time/" . $arrival_code,



            CURLOPT_RETURNTRANSFER => true,



            CURLOPT_FOLLOWLOCATION => true,



            CURLOPT_ENCODING => "",



            CURLOPT_MAXREDIRS => 10,



            CURLOPT_TIMEOUT => 30,



            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,



            CURLOPT_CUSTOMREQUEST => "GET",



            CURLOPT_HTTPHEADER => [



                "x-rapidapi-host: aerodatabox.p.rapidapi.com",



                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"



            ],



        ]);



        $response = curl_exec($curl);



        $err = curl_error($curl);



        curl_close($curl);



        if ($err) {



            echo "cURL Error #:" . $err;
        } else {



            $rs = json_decode($response);



            $airport_departure_emission_factor = 0;



            if ($airport_departure_transfer == "rail") {



                $airport_departure_emission_factor = 5;
            } elseif ($airport_departure_transfer == "bus") {



                $airport_departure_emission_factor = 3;
            } elseif ($airport_departure_transfer == "car") {
            }



            $flight_class_factor_id = 0;



            $flight_detail_arr = $db->query("select * from flight_detail where '" . $rs->greatCircleDistance->km . "' between from_distance and to_distance and flight_class='" . $flying_class . "' and status=1")->getResultArray();



            if ($flight_detail_arr) {



                $flight_class_factor_id = $flight_detail_arr[0]['ghg_factor_id'];
            }



            $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id=" . $flight_class_factor_id)->getResultArray();



            $emission_factor = 0;



            if ($emission_factor_arr) {



                $emission_factor = $emission_factor_arr[0]['emission_factor'];
            }



            $arr = [];



            $arr['emission'] = round($rs->greatCircleDistance->km * $emission_factor);



            $arr['distance'] = $rs->greatCircleDistance->km . ' km';



            echo json_encode($arr);
        }



        echo '';
    }







    public function find_location_and_airport_distance()
    {



        $db = \Config\Database::connect();



        $from = $this->request->getVar("from");



        $departrue_airport_name = $this->request->getVar("departure_airport_name");



        $departrue_airport_name = $departrue_airport_name . "," . $from;



        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");



        $airport_departure_emission_factor = 0;



        $query = $db->query("select * from ghg_factor where id=" . $airport_departure_transfer);



        $emission_factor_arr = $query->getResultArray();



        if ($emission_factor_arr) {



            $airport_departure_emission_factor = $emission_factor_arr[0]['emission_factor'];
        }



        // if($airport_departure_transfer=="rail") {



        //     $airport_departure_emission_factor = 4;



        // }



        // elseif($airport_departure_transfer=="bus") {



        //     $airport_departure_emission_factor = 5;



        // }



        // elseif($airport_departure_transfer=="car") {



        //     $airport_departure_emission_factor = 3;



        // }



        $arr = [];



        // $distance = $this->getDistance($from,$departrue_airport_name,"K");



        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';



        $departrue_airport_name    = str_replace(' ', '+', $departrue_airport_name);



        $from     = str_replace(' ', '+', $from);

        $pure = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $from . '&destinations=' . $departrue_airport_name . '&key=' . $apiKey);



        $pureoutput = json_decode($pure);

        if (!empty($pureoutput->error_message)) {



            return $pureoutput->error_message;
        }



        // Get latitude and longitude from the geodata



        $distance    = number_format((($pureoutput->rows[0]->elements[0]->distance->value) / 1000), 1);

        // echo "<pre>";

        //   print_r($pureoutput);



        $arr['distance'] = $distance;



        $arr['emission'] = $airport_departure_emission_factor * $distance;



        echo json_encode($arr);
    }











    public function find_air_distance_for_product()
    {



        $db = \Config\Database::connect();



        $departure_code = $this->request->getVar("departure_code");



        $arrival_code = $this->request->getVar("arrival_code");



        // $flying_class = $this->request->getVar("flying_class");



        $assessment_id = $this->request->getVar("ghg_assessment_id");



        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");



        $curl = curl_init();



        curl_setopt_array($curl, [



            CURLOPT_URL => "https://aerodatabox.p.rapidapi.com/airports/Icao/" . $departure_code . "/distance-time/" . $arrival_code,



            CURLOPT_RETURNTRANSFER => true,



            CURLOPT_FOLLOWLOCATION => true,



            CURLOPT_ENCODING => "",



            CURLOPT_MAXREDIRS => 10,



            CURLOPT_TIMEOUT => 30,



            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,



            CURLOPT_CUSTOMREQUEST => "GET",



            CURLOPT_HTTPHEADER => [



                "x-rapidapi-host: aerodatabox.p.rapidapi.com",



                "x-rapidapi-key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"



            ],



        ]);



        $response = curl_exec($curl);



        $err = curl_error($curl);



        curl_close($curl);



        if ($err) {



            echo "cURL Error #:" . $err;
        } else {



            $rs = json_decode($response);



            $airport_departure_emission_factor = 0;



            if ($airport_departure_transfer == "rail") {



                $airport_departure_emission_factor = 5;
            } elseif ($airport_departure_transfer == "bus") {



                $airport_departure_emission_factor = 3;
            } elseif ($airport_departure_transfer == "car") {
            }



            // $flight_class_factor_id = 0;



            // $flight_detail_arr = $db->query("select * from flight_detail where '".$rs->greatCircleDistance->km."' between from_distance and to_distance and flight_class='".$flying_class."' and status=1")->getResultArray();



            // if($flight_detail_arr) {



            //     $flight_class_factor_id = $flight_detail_arr[0]['ghg_factor_id'];



            // }



            // $emission_factor_arr = $db->query("select emission_factor from ghg_factor where id=".$flight_class_factor_id)->getResultArray();



            // $emission_factor = 0;



            // if($emission_factor_arr) {



            //     $emission_factor = $emission_factor_arr[0]['emission_factor'];



            // }



            $aerial_distance = $rs->greatCircleDistance->km;



            $emission_factor = 0;



            $query = $db->query("select v.id as vid,v.vehicle_name,v.status,td.vehicle_id,td.ghg_factor_id,td.from_distance,td.to_distance,gf.id,gf.emission_factor from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id where v.vehicle_name='Air Freight' and v.status=1  and '" . $aerial_distance . "' between td.from_distance and td.to_distance");



            $emission_factor_arr = $query->getResultArray();



            if ($emission_factor_arr) {



                $emission_factor = $emission_factor_arr[0]['emission_factor'];
            }



            $query = $db->query("select quantity,unit from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=21");



            $ghg_assessment = $query->getResultArray();



            $emission = 0;



            if ($ghg_assessment) {



                foreach ($ghg_assessment as $ga) {



                    if ($ga['unit'] == 'Kg') {



                        $emission += ($ga['quantity'] / 1000) * $aerial_distance * $emission_factor;
                    } elseif ($ga['unit'] == 'gm') {



                        $emission += ($ga['quantity'] / 1000000) * $aerial_distance * $emission_factor;
                    }
                }
            }



            $arr = [];



            $arr['emission'] = round($emission);



            $arr['distance'] = $rs->greatCircleDistance->km . ' km';



            echo json_encode($arr);
        }



        echo '';
    }







    public function find_rail_distance_for_product()
    {



        $db = \Config\Database::connect();



        $lat_from = $this->request->getVar("lat_from");



        $long_from = $this->request->getVar("long_from");



        $lat_to = $this->request->getVar("lat_to");



        $long_to = $this->request->getVar("long_to");



        $assessment_id = $this->request->getVar("ghg_assessment_id");



        $theta    = $long_from - $long_to;



        $dist    = sin(deg2rad($lat_from)) * sin(deg2rad($lat_to)) +  cos(deg2rad($lat_from)) * cos(deg2rad($lat_to)) * cos(deg2rad($theta));



        $dist    = acos($dist);



        $dist    = rad2deg($dist);



        $miles    = $dist * 60 * 1.1515;



        // Convert unit and return distance



        $unit = strtoupper("K");



        $distance = "";



        if ($unit == "K") {



            $distance = round($miles * 1.609344, 2);
        } elseif ($unit == "M") {



            $distance = round($miles * 1609.344, 2) . ' meters';
        } else {



            $distance = round($miles, 2) . ' miles';
        }



        // echo $distance;



        // die();



        $emission_factor = 0;



        $query = $db->query("select v.id as vid,v.vehicle_name,v.status,td.vehicle_id,td.ghg_factor_id,td.from_distance,td.to_distance,gf.id,gf.emission_factor from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id where v.vehicle_name='Rail Freight' and v.status=1  and '" . $distance . "' between td.from_distance and td.to_distance");



        $emission_factor_arr = $query->getResultArray();



        // echo '<pre>';



        // print_r($emission_factor_arr);



        // die();



        if ($emission_factor_arr) {



            $emission_factor = $emission_factor_arr[0]['emission_factor'];
        }



        // echo $emission_factor;



        // die();



        $query = $db->query("select quantity,unit from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=21");



        $ghg_assessment = $query->getResultArray();



        // echo '<pre>';



        // print_r($ghg_assessment);



        // die();



        $emission = 0;



        if ($ghg_assessment) {



            foreach ($ghg_assessment as $ga) {



                if ($ga['unit'] == 'Kg') {



                    $emission += ($ga['quantity'] / 1000) * $distance * $emission_factor;
                } elseif ($ga['unit'] == 'gm') {



                    $emission += ($ga['quantity'] / 1000000) * $distance * $emission_factor;
                }
            }
        }



        // echo $emission;



        // die();



        $arr = [];



        $arr['emission'] = $emission;



        $arr['distance'] = $distance . ' km';



        echo json_encode($arr);
    }







    public function find_location_and_airport_distance_for_product()
    {



        $db = \Config\Database::connect();



        $from = $this->request->getVar("from");



        $departrue_airport_name = $this->request->getVar("departure_airport_name");



        $departrue_airport_name = $departrue_airport_name . "," . $from;



        $airport_departure_transfer = $this->request->getVar("airport_departure_transfer");



        $assessment_id = $this->request->getVar("ghg_assessment_id");



        $airport_transfer_departure_fuel = $this->request->getVar("airport_transfer_departure_fuel");



        $airport_departure_emission_factor = 0;



        $emission_factor = 0;











        $arr = [];



        $distance = $this->getDistance($from, $departrue_airport_name, "K");



        $query = $db->query("select quantity,unit from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=21");



        $ghg_assessment = $query->getResultArray();



        $emission = 0;



        $query = $db->query("select td.ghg_factor_id,gf.emission_factor from transportation_detail as td join ghg_factor as gf on td.ghg_factor_id=gf.id where td.vehicle_id='" . $airport_transfer_departure_fuel . "' and td.ghg_factor_id='" . $airport_departure_transfer . "' and td.status=1");



        $emission_factor_arr = $query->getResultArray();



        if ($emission_factor_arr) {



            $emission_factor = $emission_factor_arr[0]['emission_factor'];
        }



        // if($airport_departure_transfer=="rail") {



        //     $query = $db->query("select v.id as vid,v.vehicle_name,v.status,td.vehicle_id,td.ghg_factor_id,td.from_distance,td.to_distance,gf.id,gf.emission_factor from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id where v.vehicle_name='Rail Freight' and v.status=1  and '".$distance."' between td.from_distance and td.to_distance");



        //     $emission_factor_arr = $query->getResultArray();



        //     if($emission_factor_arr) {



        //         $emission_factor = $emission_factor_arr[0]['emission_factor'];



        //     }



        // }



        // elseif($airport_departure_transfer=="bus") {



        //     $airport_departure_emission_factor = 5;



        // }



        // elseif($airport_departure_transfer=="car") {



        //     $query = $db->query("select v.id as vid,v.vehicle_name,v.status,td.vehicle_id,td.ghg_factor_id,td.from_distance,td.to_distance,gf.id,gf.emission_factor from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id where v.vehicle_name='Cars' and v.status=1 and td.type='".$airport_transfer_departure_fuel."'");



        //     $emission_factor_arr = $query->getResultArray();



        //     if($emission_factor_arr) {



        //         $emission_factor = $emission_factor_arr[0]['emission_factor'];



        //     }



        // }



        // echo $emission_factor;



        // die();



        if ($ghg_assessment) {



            foreach ($ghg_assessment as $ga) {



                if ($ga['unit'] == 'Kg') {



                    $emission += ($ga['quantity'] / 1000) * $distance * $emission_factor;
                } elseif ($ga['unit'] == 'gm') {



                    $emission += ($ga['quantity'] / 1000000) * $distance * $emission_factor;
                }
            }
        }



        $arr['distance'] = $distance;



        $arr['emission'] = $emission;



        echo json_encode($arr);
    }







    public function find_emission_for_land_vehicle()
    {



        $db = \Config\Database::connect();



        $location_from = $this->request->getVar("location_from");



        $location_to = $this->request->getVar("location_to");



        $assessment_id = $this->request->getVar("ghg_assessment_id");



        $vehicle = $this->request->getVar("vehicle");



        $vehicle_for_land = $this->request->getVar("vehicle_for_land");



        $emission_factor = 0;



        $arr = [];



        $distance = $this->getDistanceproduct($location_from, $location_to, "K");



        $query = $db->query("select quantity,unit from ghg_assessment where supplier_assessment_id='" . $assessment_id . "' and ghg_id=21");



        $ghg_assessment = $query->getResultArray();



        $emission = 0;



        // $query = $db->query("select v.id as vid,v.vehicle_name,v.status,td.vehicle_id,td.ghg_factor_id,td.from_distance,td.to_distance,gf.id,gf.emission_factor from vehicle as v join transportation_detail as td on v.id=td.vehicle_id join ghg_factor as gf on gf.id=td.ghg_factor_id where v.id='".$vehicle_for_land."' and v.ghg_factor_id='".$vehicle."' and v.status=1");



        $query = $db->query("select td.ghg_factor_id,gf.emission_factor from transportation_detail as td join ghg_factor as gf on gf.id=td.ghg_factor_id where td.vehicle_id='" . $vehicle_for_land . "' and td.ghg_factor_id='" . $vehicle . "' and td.status=1");



        $emission_factor_arr = $query->getResultArray();



        if ($emission_factor_arr) {



            $emission_factor = $emission_factor_arr[0]['emission_factor'];
        }



        if ($ghg_assessment) {



            foreach ($ghg_assessment as $ga) {



                if ($ga['unit'] == 'Kg') {



                    $emission += ($ga['quantity'] / 1000) * $distance * $emission_factor;
                } elseif ($ga['unit'] == 'gm') {



                    $emission += ($ga['quantity'] / 1000000) * $distance * $emission_factor;
                }
            }
        }



        $arr['distance'] = $distance;



        $arr['emission'] = $emission;



        echo json_encode($arr);
    }



    public function getDistanceproduct($addressFrom, $addressTo, $unit = '')
    {



        // Google API key



        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';



        // Change address format



        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);



        $formattedAddrTo     = str_replace(' ', '+', $addressTo);



        // Geocoding API request with start address



        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);



        $outputFrom = json_decode($geocodeFrom);



        if (!empty($outputFrom->error_message)) {



            return $outputFrom->error_message;
        }







        // Geocoding API request with end address



        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);



        $outputTo = json_decode($geocodeTo);



        if (!empty($outputTo->error_message)) {



            return $outputTo->error_message;
        }



        // Get latitude and longitude from the geodata



        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;



        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;



        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;



        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;







        // Calculate distance between latitude and longitude



        $theta    = $longitudeFrom - $longitudeTo;



        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));



        $dist    = acos($dist);



        $dist    = rad2deg($dist);



        $miles    = $dist * 60 * 1.1515;



        // Convert unit and return distance



        $unit = strtoupper($unit);



        if ($unit == "K") {



            return ($miles * 1.609344);
        } elseif ($unit == "M") {



            return ($miles * 1609.344) . ' meters';
        } else {



            return $miles . ' miles';
        }
    }

    public function getstatefromaddress($addressFrom, $unit = '')
    {

        $db = \Config\Database::connect();

        $county_model = new CountryModel();

        $state_model = new StateModel();

        // Google API key

        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

        // Change address format

        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);

        // Geocoding API request with start address

        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);

        $outputFrom = json_decode($geocodeFrom);

        // print_r($outputFrom);

        if (!empty($outputFrom->error_message)) {

            return $outputFrom->error_message;
        }

        $addresscomponent    = $outputFrom->results[0]->address_components;

        foreach ($addresscomponent as $key => $addCompVal) {

            if ($addCompVal->types[0] == 'postal_code') {

                $pincode = $addCompVal->long_name;
            }
            if ($addCompVal->types[0] == 'country') {

                $country = $addCompVal->long_name;

                $query = $county_model->where('name', $country)->where('status', 1)->first();

                $countryId = $query['id'];
            }
            if ($addCompVal->types[0] == 'administrative_area_level_1') {

                $state = $addCompVal->long_name;

                $query = $state_model->where('name', $state)->where('status', 1)->first();

                $stateId = $query['id'];
            }
            if ($addCompVal->types[0] == 'locality') {

                $city = $addCompVal->long_name;
            }
        }
    }





    public function getVehicleFactor()
    {



        $db = \Config\Database::connect();



        $vehicle_id = $this->request->getVar("vehicle_id");



        $query = $db->query("select td.ghg_factor_id,gf.name,f.factor_name from transportation_detail as td join ghg_factor as gf on td.ghg_factor_id=gf.id join factor as f on f.id=gf.name where td.vehicle_id='" . $vehicle_id . "' and td.status=1");



        // echo $db->getlastquery($query);

        $vehicle_factor = $query->getResultArray();



        $data = '<option value="0">Select Factor</option>';



        if ($vehicle_factor) {



            foreach ($vehicle_factor as $vf) {



                $data .= '<option value="' . $vf['ghg_factor_id'] . '" data-title="' . $vf['factor_name'] . '">' . $vf['factor_name'] . '</option>';
            }
        }



        $arr = [];



        $arr['res'] = $data;



        echo json_encode($arr);
    }







    public function notification()
    {



        echo '<center><h1>Coming Soon</h1></center>';
    }







    public function getProductFactorForMobileFuelfinance()
    {



        $db = \Config\Database::connect();



        // $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1");



        $queryghg = $db->query("select * from factor where status=1 AND ghg_id=27 ");

        $ghg_factor = $queryghg->getResultArray();

        $query1 = $db->query("select * from finance where status=1  ");

        $fiance = $query1->getResultArray();







        $product_fiance = '<option value="0">Select Finance </option>';

        $product_Sub_Finance = '<option value="0">Select Sub Finance </option>';



        $product_finance_ghg = '<option value="0">Select GHG FACTOR</option>';



        $fact_unit = '<option value="0">Select Unit</option>';



        if ($fiance) {



            foreach ($fiance as $pf) {

                $product_fiance .= '<option value="' . $pf['id'] . '">' . $pf['finance_name'] . '</option>';
            }
        }



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 27) {



                    $product_finance_ghg .= '<option value="' . $gf['id'] . '">' . $gf['factor_name'] . '</option>';
                }
            }
        }



        $arr = [];



        $arr['res'] = '';



        if ($product_fiance) {



            $arr['res'] = '

            <div class="step_inner append_row">

            <div class="theme_field step_label">

    <select class="form-control label_select" id="financeCat" name="financeCat[]" onchange="setSubCat(this)">' . $product_fiance . '</select>

        </div>

    <div class="theme_field step_label">

    <select id="SubfinanceCata" class="form-control" name="data[]" required="">' . $product_Sub_Finance . '</select>

        </div>

    <div class="theme_field step_label">

    <select class="form-control label_select" id="ghg_factor" name="ghg_factor[]" onchange="setUnit(this)">' . $product_finance_ghg . '</select>

        </div>

    <div class="theme_field step_label">

    <input type="number" placeholder="Enter number" name="mf_qty[]">

        </div>

    <div class="theme_field step_label">

    <select class="form-control" name="mf_unit[]">

        </select>

        </div>

    <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()">

<span aria-hidden="true">+</span></button>&nbsp;<button type="button" class="remove_factor_block btn btn-danger" ><i class="fa fa-trash"></i></button>

</div>';
        }



        echo json_encode($arr);
    }



    public function getProductFactorForMobileFuel()
    {



        $db = \Config\Database::connect();



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=1");



        $ghg_factor = $query->getResultArray();



        $product_factor = '<option value="0">Select Material</option>';



        $fact_unit = '<option value="0">Select Unit</option>';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 20) {



                    $product_factor .= '<option value="' . $gf['id'] . '">' . $gf['factor_name'] . '</option>';
                }
            }
        }



        $arr = [];



        $arr['res'] = '';



        if ($product_factor) {



            $arr['res'] = '<div class="step_inner append_row"><div class="theme_field step_label"><select class="form-control label_select" id="exampleFormControlSelect1" name="mf_factor[]" onchange="setUnit(this)">' . $product_factor . '</select></div><div class="step_field"><div class="theme_field step_three_column"><div class="stc_left"><input type="number" placeholder="Enter number" name="mf_qty[]" value=""></div><div class="stc_center"></div><div class="stc_right"><select class="form-control" id="exampleFormControlSelect1" name="mf_unit[]">' . $fact_unit . '</select></div></div></div><button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreFactor()"><span aria-hidden="true">+</span></button>&nbsp;<button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button></div>';
        }



        echo json_encode($arr);
    }





    public function getUnitForMobileFuel($factor_id)
    {



        $db = \Config\Database::connect();









        $query = $db->query("select f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.name=" . $factor_id . " || gf.id=" . $factor_id);



        // echo $db->getlastquery($query);





        $factor_unit_arr = $query->getResultArray();



        $data = '<option value="0">Select Unit</option>';



        if ($factor_unit_arr) {



            $data .= '<option>' . $factor_unit_arr[0]['unit_name'] . '</option>';



            if ($factor_unit_arr[0]['factor_unit']) {



                $query = $db->query("select * from sub_units where unit_id=" . $factor_unit_arr[0]['factor_unit'] . " and status=1");



                $sub_units = $query->getResultArray();



                if ($sub_units) {



                    foreach ($sub_units as $sub_unit) {



                        $data .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }



        echo $data;
    }



    public function getConsSubCat($subCons_id)
    {



        $db = \Config\Database::connect();



        $query = $db->query("SELECT * FROM `Consumption_Sub_Category` WHERE consumption_category_id=" . $subCons_id);



        $subcon = $query->getResultArray();



        $data = '<option value="0">Select Consumption Sub Category</option>';



        if ($subcon) {



            foreach ($subcon as $sub_c) {



                $data .= '<option value="' . $sub_c['id'] . '">' . $sub_c['sub_category'] . '</option>';
            }
        }





        echo $data;
    }



    // public function getConsSubCat(){

    //     $db = \Config\Database::connect();

    //     $data = $this->request->getVar();



    //     $query = $db->query("SELECT * FROM `Consumption_Sub_Category` WHERE consumption_category_id=".$data['consm_id']);



    //     $subcon = $query->getResultArray();







    //     echo '<option value="" >Select</option>';



    //     foreach($subcon as $sub_c){



    //         echo "<option value=".$sub_c['id'].">".$sub_c['sub_category']."</option><br/>";



    //     }



    // }



    public function getUnitCons($factor_id)
    {



        $db = \Config\Database::connect();

        //$data = $this->request->getVar();

        $query = $db->query("SELECT csc.id, gf.emission_factor, f.factor_name, f.factor_unit, u.unit_name FROM Consumption_Sub_Category AS csc LEFT JOIN factor AS f ON f.id = csc.factor_id LEFT JOIN unit AS u ON f.factor_unit = u.id LEFT JOIN ghg_factor AS gf ON gf.name = csc.factor_id WHERE csc.status=1 and csc.id=" . $factor_id);

        echo $db->getLastquery($query);

        $factor_unit_arr = $query->getResultArray();



        $data = '<option value="0">Select Unit</option>';



        if ($factor_unit_arr) {



            $data .= '<option>' . $factor_unit_arr[0]['unit_name'] . '</option>';



            if ($factor_unit_arr[0]['factor_unit']) {



                $query = $db->query("select * from sub_units where unit_id=" . $factor_unit_arr[0]['factor_unit'] . " and status=1");

                echo $db->getLastquery($query);

                $sub_units = $query->getResultArray();



                if ($sub_units) {



                    foreach ($sub_units as $sub_unit) {



                        $data .= '<option value="' . $sub_unit['id'] . '">' . $sub_unit['sub_unit_name'] . '</option>';
                    }
                }
            }
        }



        echo $data;
    }



    public function getConsum()
    {



        $db = \Config\Database::connect();



        //$prod_factor_arr = $this->request->getVar("prod_factor");



        $session = session();



        $supplier_info = $session->get('supplier_info');





        if ($supplier_info) {



            $query = $db->query("select * from supplier where id=" . $supplier_info['supplier_id']);



            $supplier = $query->getResultArray();



            if ($supplier) {



                $industry_id = $supplier[0]['industry_id'];



                $country_id = $supplier[0]['country_id'];
            }
        }





        //$prod_factors = implode(",",$prod_factor_arr);

        $query = $db->query("SELECT * FROM `consumption` where status=1");



        $query = $db->query("SELECT * FROM `consumption` where status=1");

        // $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2");



        $ghg_factor = $query->getResultArray();



        echo $product_factor = "";



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {

                $product_factor .= '<option value="' . $gf['id'] . '">' . $gf['consumption_name'] . '</option>';
            }
        }

        $arr = [];



        $arr['res'] = '';



        if ($product_factor) {



            $arr['res'] = '<div class="step_inner append_row">

            <div class="theme_field step_label">

            <select class="form-control label_select" id="exampleFormControlSelect1" name="consumption_id[]" onchange="getConsSub(this)">' . $product_factor . '</select>

                </div>

            <div class="theme_field step_label">

            <select class="form-control label_select" id="sub_consm" name="sub_cons[]" onchange="setUnitCons(this)">

                <option value="">Select Consumption Sub Category</option>

                    </select>

                </div>

            <div class="step_field">

            <div class="theme_field step_three_column">

                <div class="stc_left">

                    <input type="number" placeholder="Enter Quantity" name="qty[]" value=""></div>

                        <div class="stc_center"></div>

            <div class="stc_right">

                <select class="form-control" id="exampleFormControlSelect1" name="cons_unit[]"></select>

                    </div>

                </div>

                </div>

            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more" onclick="addMoreConsum()"><span aria-hidden="true">+</span></button>&nbsp;

            <button class="remove_factor_block btn btn-danger"><i class="fa fa-trash"></i></button>

            </div>';
        }



        echo json_encode($arr);
    }



    public function companyConsumableAssessmentSubmit()
    {

        //echo 'test';



        //         $db = \Config\Database::connect();



        //         $ghg_assessment_model = new GhgAssessmentModel();



        //         $session = session();



        //         $supplier_info = $session->get('supplier_info');



        //         $ghg_id = $this->request->getVar('ghg_id');



        //         $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



        //         $factor_arr = $this->request->getVar('prod_factor');



        //         $qty_arr = $this->request->getVar('qty');



        //         $unit_arr = $this->request->getVar('unit');



        //         // $emission_factor_arr = $this->request->getVar('emission_factor');



        //         $estimate = 0;



        //         $total_footprint = 0;



        //         if($qty_arr) {



        //             foreach($qty_arr as $key=>$qty) {



        //                 if(!empty($qty)) {



        //                     $query = $db->query("select emission_factor from ghg_factor where id=".$factor_arr[$key]);



        //                     $emission_factor_arr = $query->getResultArray();



        //                     if($emission_factor_arr) {



        //                     $estimate = ($qty * $emission_factor_arr[0]['emission_factor']);



        //                     $total_footprint = $total_footprint + $estimate;



        //                     $query = $db->query("select * from ghg_assessment where supplier_assessment_id=".$ghg_assessment_id." and ghg_id=".$ghg_id." and factor_id=".$factor_arr[$key]);



        //                     $ava = $query->getResultArray();



        //                     if(empty($ava)) {



        //                         $ghg_assessment_detail = $db->query("insert into ghg_assessment(supplier_id,supplier_assessment_id,ghg_id,factor_id,unit,quantity,estimate)values(".$supplier_info['supplier_id'].",".$ghg_assessment_id.",".$ghg_id.",".$factor_arr[$key].",'".$unit_arr[$key]."',".$qty.",".$estimate.")");



        //                     }



        //                     else {



        //                         $db->query("update ghg_assessment set quantity=".$qty.",estimate=".$estimate." where id=".$ava[0]['id']);



        //                     }



        //                     }



        //                 }



        //             }



        //         }







        // //        $ghg_assessment_model->where(['id' => $ghg_assessment_id])->set(['total_footprint' => $total_footprint])->update();



        //         $db->query("update supplier_assessment set total_footprint=".$total_footprint." where id=".$ghg_assessment_id);



        //         echo 'success';



        $db = \Config\Database::connect();



        $ghg_assessment_model = new GhgAssessmentModel();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        if (!empty($this->request->getVar())) {



            $ghg_id = $this->request->getVar('ghg_id');



            $ghg_assessment_id = $this->request->getVar('ghg_assessment_id');



            $consumption_id = $this->request->getVar('consumption_id');



            $consumption_sub_id = $this->request->getVar('sub_cons');



            //$factor_arr = $this->request->getVar('prod_factor');



            $qty_arr = $this->request->getVar('qty');



            $unit_arr = $this->request->getVar('cons_unit');



            //$supplier_location = $this->request->getVar("supplier_location");



            // $emission_factor_arr = $this->request->getVar('emission_factor');



            $estimate = 0;



            $total_footprint = 0;



            if ($qty_arr) {



                foreach ($qty_arr as $key => $qty) {



                    if (!empty($qty) || $qty == 0) {



                        $emission_factor = 0;



                        $emission_factor_arr = $db->query("SELECT csc.id, gf.emission_factor,csc.factor_id as factj FROM Consumption_Sub_Category AS csc LEFT JOIN ghg_factor AS gf ON gf.name = csc.factor_id WHERE csc.status = 1 AND csc.id=" . $consumption_sub_id[$key])->getResultArray();

                        // echo $db->getLastquery($emission_factor_arr);

                        //print_r($emission_factor_arr);

                        if ($emission_factor_arr) {



                            $emission_factor = $emission_factor_arr[0]['emission_factor'];

                            $fct = $emission_factor_arr[0]['factj'];
                        }



                        $estimate = ($qty * $emission_factor);



                        $unit_nm = "";



                        if ($unit_arr[$key]) {



                            $query = $db->query("select * from sub_units where id='" . $unit_arr[$key] . "' and status=1");



                            $unit_nm = $unit_arr[$key];



                            $sub_unit = $query->getResultArray();



                            if ($sub_unit) {



                                $estimate = $estimate . '' . $sub_unit[0]['conversion_symbol'] . '' . $sub_unit[0]['conversion_value'];



                                $estimate = eval('return ' . $estimate . ';');



                                $unit_nm = $sub_unit[0]['sub_unit_name'];
                            }
                        }



                        $total_footprint = $total_footprint + $estimate;



                        $query = $db->query("select * from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=" . $ghg_id . " and factor_id=" . $fct);



                        $ava = $query->getResultArray();

                        //echo $db->getlastquery($ava);                    

                        if (empty($ava)) {



                            $ghg_assessment_detail = $db->query("insert into ghg_assessment(`supplier_id`, `supplier_assessment_id`, `ghg_id`, `factor_id`, `consumption_id`, 

                            `consumption_sub_id`, `unit`, `quantity`, `estimate`) values(" . $supplier_info['supplier_id'] . "," . $ghg_assessment_id . "," . $ghg_id . ",'" . $fct . "'," . $consumption_id[$key] . ",

                    '" . $consumption_sub_id[$key] . "','" . $unit_nm . "','" . $qty . "'," . $estimate . ")");



                            //echo $db->getlastquery($ghg_assessment_detail);        

                            //print_r($ghg_assessment_detail);

                        } else {



                            $db->query("update ghg_assessment set consumption_id=" . $consumption_id[$key] . ",unit='" . $unit_nm . "',quantity='" . $qty . "',estimate=" . $estimate . " where id=" . $ava[0]['id'] . " and consumption_sub_id='" . $consumption_sub_id[$key] . "'");
                        }
                    }
                }
            }



            $db->query("update supplier_assessment set total_footprint=" . $total_footprint . " where id=" . $ghg_assessment_id);
        } else {



            //     $query = $db->query("select country_id,no_of_employee from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=11");



            //     $supp_ass = $query->getResultArray();



            //     if($supp_ass) {



            //         $query = $db->query("select emission_factor from countries where id=".$supp_ass[0]['country_id']);



            //         $country_emission_factor_arr = $query->getResultArray();



            //         if($country_emission_factor_arr) {



            //             $total_footprint=$country_emission_factor_arr[0]['emission_factor']*$supp_ass[0]['no_of_employee'];



            //         }                    



            //     }



            // $db->query("update supplier_assessment set total_footprint=".$total_footprint." where supplier_id=".$supplier_info['supplier_id']." and assessment_id=10");



        }



        // echo 'success';



        $query = $db->query("select gf.*,f.factor_name,f.factor_unit,u.unit_name from ghg_factor as gf join factor as f on gf.name=f.id join unit as u on f.factor_unit=u.id where gf.status=1 and gf.type=2");



        $ghg_factor = $query->getResultArray();

        $db->getLastquery($ghg_factor);



        $query = $db->query("select * from ghg_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and supplier_assessment_id=" . $ghg_assessment_id);



        $ghg_assessment_detail = $query->getResultArray();



        $data = '';



        if ($ghg_factor) {



            foreach ($ghg_factor as $gf) {



                if ($gf['ghg_id'] == 29) {



                    if ($ghg_assessment_detail) {



                        foreach ($ghg_assessment_detail as $gd) {



                            if ($gf['name'] == $gd['factor_id']) {



                                $rs_conversion = "";



                                if ($gd['estimate'] < 1000) {



                                    $rs_conversion = (number_format($gd['estimate'], 4)) . " kgs ";
                                } else {



                                    $rs_conversion = ($gd['estimate'] / 1000) . " tonnes ";
                                }



                                $data .= '<div class="alert alert-success custom_alert" role="alert">
                                
                                

                                <span>' . $rs_conversion . '
                                
                                

                                </span> CO2e :' . $gd['quantity'] . ' ' . $gd['unit'] . ' of ' . $gf['factor_name'] . '<button class="close" type="button" data-dismiss="alert" aria-label="Close" onclick="removeBuildingFactor(' . $gd['id'] . ',' . $gf['id'] . ',' . $gd['supplier_assessment_id'] . ')"><span aria-hidden="true">×</span></button>
                                
                                

                                </div>';
                            }
                        }
                    }
                }
            }
        }



        $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id=" . $ghg_assessment_id . " and ghg_id=29");



        $total_building_c_footprint_arr = $query->getResultArray();

        //  $data['total_consumable_footprint_arr']=$total_building_c_footprint_arr;



        $arr = [];



        $arr['res'] = $data;



        if ($total_building_c_footprint_arr) {



            $arr['tot'] = $total_building_c_footprint_arr[0]['tot'];
        }



        echo json_encode($arr);



        //die();



        // echo $data;



    }



    public function manage_organization()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Quick Start';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $footprint_type_model = new FootprintTypeModel();

        $rs = $supplier_model->select("supplier_plan_id,country_id, industry_id,brand_name,website,description")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        $supp_assess = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=12 order by id desc")->getRowArray();
        $data['supp_assess'] = $supp_assess;
        $session = session();
        $find = new QuickStartModel();
        $supplier_model = new SupplierModel();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
            $supplier_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $make = $supplier_model->where('id', $u_id)->first();
            $supplier_id = $make['owner_id'];
            $o_id = $make['owner_id'];
        }
        $data['operationsInfo'] = $find->where('owner_id', $o_id)->where('status', 1)->first();


        $query = $db->query("select * from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12  ");

        $ava_assessment = $query->getResultArray();

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



        $data['type'] = $footprint_type_model->where(['footprint_id' => 1, 'status' => 1])->findAll();



        $data['list'] = $db->query("SELECT
        
            sa.*,
    
        ft.type_name,
    
        
    
        c.name AS country_name,
    
        indus.industry_name as indus_name
    
        
    
      FROM

     supplier_assessment AS sa
    
     LEFT JOIN footprint_type AS ft

         ON

     sa.cp_type_id = ft.id
    
      LEFT JOIN countries AS c
 
      ON

      sa.country_id = c.id
    
      LEFT JOIN industry AS indus

      ON

          indus.id = sa.industry_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12 order by sa.id asc")->getResultArray();

        // $data['list'] = $db->query("SELECT * FROM `supplier` WHERE id=".$supplier_info['supplier_id'])->getResultArray();

        //  echo $db->getLastquery($data['list']);

        $query = $db->query("select * from countries where status=1 ");
        $data['country'] = $query->getResultArray();

        $model = new SupplierModel();
        $data['supplier'] = $model->where('id', $supplier_id)->first();
        $supplier_role_model = new SupplierRoleModel();
        $data["role"] = $supplier_role_model->where('status', 1)->findAll();
        // print_r($data['role']);
        // die();

        $supplier_plan = new SupplierPlanModel();

        $company = new CompanyModel();

        $activitie = new SubSubIndustryModel();

        $ssd = new SupplierSubsidiaryModel();

        $policy = new DocumentSubTypeModel();

        $s_data = $model->where('id', session()->supplier_info['supplier_id'])->first();

        $data['ssd_data'] = $ssd->where('supplier_id', session()->supplier_info['supplier_id'])->first();

        $indi = new IndustryModel();

        $indi_cate = new IndustryCategoryModel();

        $ik = $data['industry'] = $indi->where('id', $s_data['industry_id'])->first();
        $data['industry_cate'] = $indi_cate->where('id', $ik['industry_category_id'])->first();

        $data['activities'] = $activitie->where('industry', $ik['id'])->findAll();

        $sp = $data['supplier_plan'] = $supplier_plan->where('id', $s_data['supplier_plan_id'])->first();

        $data['size'] = $company->where('id', $sp['company_id'])->first();
        $o = new EmployeeDetails();

        $data['employee_details'] = $o->where('status', 1)->where('admin_id', $supplier_id)->findAll();

        $country = new CountryModel();
        $quick = new QuickStartModel();
        $quickStart = $quick->where('owner_id', $supplier_id)->first();
        $data['company_profile'] = $quick->where('owner_id', $supplier_id)->first();

        $differently_per = json_decode($quickStart['differently_per']);
        $differently_total = json_decode($quickStart['differently_total']);
        $employee_per = json_decode($quickStart['employee_per']);
        $employee_total = json_decode($quickStart['employee_total']);

        // permanent total
        if ($differently_per) {
            $sum = 0;

            foreach ($differently_per as $key => $valuee) {
                if ($valuee == 1) {

                    if ($differently_total[$key]) {

                        $sum += $differently_total[$key];
                    }
                }
            }
        }



        if ($employee_per) {
            $summ = 0;
            foreach ($employee_per as $key => $valuee) {
                if ($valuee == 1) {

                    if ($employee_total[$key]) {

                        $summ += $employee_total[$key];
                    }
                }
            }
        }

        $data['difable'] = $summ;

        $t = $sum;
        $data['parmanent'] = $t;
        // end 
        // Non permanent 
        if ($differently_per) {
            $sumNon = 0;

            foreach ($differently_per as $key => $valuee) {
                if ($valuee == 2) {

                    if ($differently_total[$key]) {
                        $sumNon += $differently_total[$key];
                    }
                }
            }
        }

        if ($employee_per) {
            $summNon = 0;
            foreach ($employee_per as $key => $valuee) {
                if ($valuee == 2) {

                    if ($employee_total[$key]) {

                        $summNon += $employee_total[$key];
                    }
                }
            }
        }
        $data['difableNo'] = $summNon;

        $tNon = $sumNon;
        $data['Nonparmanent'] = $tNon;

        $total = $data['difable'] + $data['difableNo'];
        if (empty($total)) {
            $total = '1';
        }

        $data['p_per'] = $data['difable'] / $total * 100;
        $data['n_per'] = $data['difableNo'] / $total * 100;



        $data['location'] = json_decode($quickStart['location']);
        $location = json_decode($quickStart['location']);
        $data['plants'] = json_decode($quickStart['plants']);
        $plants = json_decode($quickStart['plants']);
        $data['offices'] = json_decode($quickStart['offices']);
        $offices = json_decode($quickStart['offices']);


        if ($location) {
            foreach ($location as $key => $row) {
                if ($row == 1) {
                    if ($offices[$key]) {
                        $na_office = $offices[$key];
                    }
                }
            }
        }

        if ($location) {
            foreach ($location as $key => $row) {
                if ($row == 2) {
                    if ($offices[$key]) {
                        $inter_office = $offices[$key];
                    }
                }
            }
        }

        $data['office_total'] = $na_office + $inter_office;
        $office_total = $na_office + $inter_office;


        if (empty($office_total)) {
            $office_total  = '1';
        }
        $data['off_per_na'] = $na_office / $office_total * 100;
        $data['off_per_in'] = $inter_office / $office_total * 100;


        if ($location) {
            foreach ($location as $key => $row) {
                if ($row == 1) {
                    if ($plants[$key]) {
                        $na_plan = $plants[$key];
                    }
                }
            }
        }

        if ($location) {
            foreach ($location as $key => $row) {
                if ($row == 2) {
                    if ($plants[$key]) {
                        $inter_plan = $plants[$key];
                    }
                }
            }
        }

        $data['plan_total'] = $na_plan + $inter_plan;
        $plan_total = $na_plan + $inter_plan;

        if (empty($plan_total)) {
            $plan_total  = '1';
        }

        $data['pla_per_na'] = $na_plan / $plan_total * 100;
        $data['pla_per_in'] = $inter_plan / $plan_total * 100;

        $employee = json_decode($quickStart['employee_wor']);
        $employ_gen = json_decode($quickStart['employee_gen']);
        $employee_total = json_decode($quickStart['employee_total']);


        $data['employee_perr'] = json_decode($quickStart['employee_per']);
        $data['employee_wor'] = json_decode($quickStart['employee_wor']);
        $data['employee_gen'] = json_decode($quickStart['employee_gen']);
        $data['employee_total'] = json_decode($quickStart['employee_total']);

        $employee_perr = json_decode($quickStart['employee_per']);
        $employee_wor = json_decode($quickStart['employee_wor']);
        $employee_gen = json_decode($quickStart['employee_gen']);
        $employee_total = json_decode($quickStart['employee_total']);




        if ($employee_perr) {
            $emp_male_total = 0;
            foreach ($employee_perr as $key => $row) {

                if ($employee_wor[$key] == 1) {
                    if ($employee_gen[$key] == 'male') {
                        $emp_male_total += $employee_total[$key];
                    }
                }
            }
        }

        if ($emp_male_total) {
            $data['emp_male_total'] = $emp_male_total;
        } else {
            $data['emp_male_total'] = 0;
        }



        if ($employee_perr) {
            $wor_male_total = 0;
            foreach ($employee_perr as $key => $row) {
                if ($employee_wor[$key] == 2) {
                    if ($employee_gen[$key] == 'male') {
                        $wor_male_total += $employee_total[$key];
                    }
                }
            }
        }

        if ($wor_male_total) {
            $data['wor_male_total'] = $wor_male_total;
        } else {
            $data['wor_male_total'] = 0;
        }

        // die();


        if ($employee_perr) {
            $emp_femal_total = 0;
            foreach ($employee_perr as $key => $row) {
                if ($employee_wor[$key] == 1) {
                    if ($employee_gen[$key] == 'female') {
                        $emp_femal_total += $employee_total[$key];
                    }
                }
            }
        }

        if ($emp_femal_total) {
            $data['emp_femal_total'] = $emp_femal_total;
        } else {
            $data['emp_femal_total'] = 0;
        }


        if ($employee_perr) {
            $wor_femal_total = 0;
            foreach ($employee_perr as $key => $row) {
                if ($employee_wor[$key] == 2) {
                    if ($employee_gen[$key] == 'female') {
                        $wor_femal_total += $employee_total[$key];
                    }
                }
            }
        }
        if ($wor_femal_total) {
            $data['wor_femal_total'] = $wor_femal_total;
        } else {
            $data['wor_femal_total'] = 0;
        }

        if ($employee_perr) {
            $emp_other_total = 0;
            foreach ($employee_perr as $key => $row) {
                if ($employee_wor[$key] == 1) {
                    if ($employee_gen[$key] == 'other') {
                        $emp_other_total += $employee_total[$key];
                    }
                }
            }
        }
        if ($emp_other_total) {
            $data['emp_other_total'] = $emp_other_total;
        } else {
            $data['emp_other_total'] = 0;
        }

        if ($employee_perr) {
            $wor_other_total = 0;
            foreach ($employee_perr as $key => $row) {
                if ($employee_wor[$key] == 2) {
                    if ($employee_gen[$key] == 'other') {
                        $wor_other_total += $employee_total[$key];
                    }
                }
            }
        }
        if ($wor_other_total) {
            $data['wor_other_total'] = $wor_other_total;
        } else {
            $data['wor_other_total'] = 0;
        }

        $women_bord = json_decode($quickStart['women_bord']);
        $women_gen = json_decode($quickStart['women_gen']);
        $women_total = json_decode($quickStart['women_total']);



        if ($women_bord) {
            foreach ($women_bord as $key => $row) {

                if ($row == '1') {
                    if ($women_gen[$key] == 'male') {
                        $male_total_bod[] = $women_total[$key];
                    }
                }
            }
        }

        if ($male_total_bod) {
            $data['male_total_bod'] = $male_total_bod;
        } else {
            $b[] = 0;
            $data['male_total_bod'] = $b;
        }

        // KEy Total male
        if ($women_bord) {
            foreach ($women_bord as $key => $row) {
                if ($row == '2') {
                    if ($women_gen[$key] == 'male') {

                        $male_total_key[] = $women_total[$key];
                    }
                }
            }
        }

        if ($male_total_key) {
            $data['male_total_key'] = $male_total_key;
        } else {
            $l[] = 0;
            $data['male_total_key'] = $l;
        }
        // print_r($data['male_total_key']);
        // die();
        // female total bod
        if ($women_bord) {
            foreach ($women_bord as $key => $row1) {
                if ($row1 == '1') {
                    if ($women_gen[$key] == 'female') {

                        $femal_total_bod[] = $women_total[$key];
                    }
                }
            }
        }

        if ($femal_total_bod) {
            $data['femal_total_bod'] = $femal_total_bod;
        } else {
            $m[] = 0;

            $data['femal_total_bod'] = $m;
        }

        // female total key
        if ($women_bord) {
            foreach ($women_bord as $key => $row) {
                if ($row == '2') {
                    if ($women_gen[$key] == 'female') {

                        $femal_total_key[] = $women_total[$key];
                    }
                }
            }
        }

        if ($femal_total_key) {
            $data['femal_total_key'] = $femal_total_key;
        } else {
            $f[] = 0;

            $data['femal_total_key'] = $f;
        }
        // other total BOD
        if ($women_bord) {
            foreach ($women_bord as $key4 => $row4) {
                if ($row4 == '1') {
                    if ($women_gen[$key4] == 'other') {

                        $other_total_bod[] = $women_total[$key4];
                    }
                }
            }
        }
        if ($other_total_bod) {
            $data['other_total_bod'] = $other_total_bod;
        } else {
            $g[] = 0;

            $data['other_total_bod'] = $g;
        }

        //  other total key
        if ($women_bord) {
            foreach ($women_bord as $key => $row) {
                if ($row == '2') {
                    if ($women_gen[$key] == 'other') {

                        $other_total_key[] = $women_total[$key];
                    }
                }
            }
        }

        if ($other_total_key) {
            $data['other_total_key'] = $other_total_key;
        } else {
            $u[] = 0;
            $data['other_total_key'] = $u;
        }



        $country_id = json_decode($quickStart['international']);
        $supplier_data = $model->where('id', $supplier_id)->first();
        $base_country = [$supplier_data['country_id']];
        if ($country_id) {
            $combine_base_country = array_merge($base_country, $country_id);
        } else {
            $combine_base_country = [$supplier_data['country_id']];
        }

        $data['country'] = $country->where('status', 1)->findAll();

        if ($combine_base_country) {
            foreach ($data['country'] as $cnt) {
                if (in_array($cnt['id'], $combine_base_country)) {
                    $countrylk[] = $cnt;
                    // print_r($cnt);
                }
            }
        }
        $data['countryRohit'] = $countrylk;
        // print_r($u_id);
        // die;
        $data['country_lat_long'] = $country->where('status', 1)->where('lng', null)->where('lat', null)->findAll();
        $supp_ass = new Supplier_assessment();
        $data['cp_name'] = $supp_ass->select('cp_name,cp_address,id')->where('supplier_id', $u_id)->orwhere('owner_id', $o_id)->where('assessment_id', 12)->findAll(10);
        // print_r($data['cp_name']);
        // die;
        // $suppliertype =  new SupplierType();
        $model =  new SupplierModel();
        $data['all_supplier'] = $model->where('role', 0)->Orwhere('role', 11)->findAll();
        // print_r($data['all_supplier']);

        $data['list'] = $model->select('*')->join('supplier_type', 'supplier_type.email=supplier.email', 'LEFT')->where('supplier.id', $u_id)->orwhere('supplier.id', $o_id)->where('supplier_type.status', 1)->findAll();
        foreach ($data['cp_name'] as $key => $value) {

            $address = $value['cp_address'];
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);

            $response_a = json_decode($response);
            // print_r($response_a);
            $lat[] = $response_a->results[0]->geometry->location;
            $lng = $response_a->results[0]->geometry->location;
            // print_r($lat);
        }
        $data['lat_lng'] = $lat;
        // print_r($data['lat_lng']);
        // die;
        $data['products'] = $db->query("select sa.*,ft.type_name,u.unit_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join unit as u on sa.unit_id=u.id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11 order by sa.id asc")->getResultArray();
        // return view('brand/manage_organization_table', $data);
        return view('brand/latestcontent', $data);
    }


    public function get_product($id)
    {
        $db = \Config\Database::connect();
        return json_encode($db->query("select sa.*,ft.type_name,u.unit_name from supplier_assessment as sa left join footprint_type as ft on sa.cp_type_id=ft.id left join unit as u on sa.unit_id=u.id where sa.id=$id")->getRow());
    }

    public function policy()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }

        $db = \Config\Database::connect();



        $policy = new DocumentSubTypeModel();

        $policy_brand = new PolicyBrandModel();

        if (session()->supplier_info['role'] == 0) {

            $o_id = session()->supplier_info['supplier_id'];

            $find = $policy_brand->where('status', 1)->findAll();

            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=" . $o_id);

            $find = $ok->getResultArray();

            // print_r($okk);

            //     die();



        }



        $data['pg_nm'] = 'Policy';



        $session = session();



        $supplier_info = $session->get('supplier_info');



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







        $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=" . $supplier_info['supplier_id'] . " group by assessment_id order by assessment_id");



        $level = $query->getResultArray();





        $total_level = 0;



        $level_name = '';



        if (!empty($level)) {



            foreach ($level as $l) {



                $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='" . $l['assessment_id'] . "' ");



                $t = $query->getResultArray();



                $total_level = $total_level + (($l['tot'] / 100) * $t[0]['weight_percentage']);
            }
        }



        if ($total_level >= 0 && $total_level <= 20) {



            $level_name = "Dorment";
        }



        if ($total_level >= 21 && $total_level <= 40) {



            $level_name = "Active";
        }



        if ($total_level >= 41 && $total_level <= 60) {



            $level_name = "Positive";
        }



        if ($total_level >= 81 && $total_level <= 100) {



            $level_name = "Green";
        }



        $data['level'] = array("level_name" => $level_name, "level_per" => $total_level);





        $ghg_cat_arr = [];



        if ($supplier_info['supplier_id']) {



            $query = $db->query("select * from ghg_category where status=1");



            $ghg_category_arr = $query->getResultArray();



            if ($ghg_category_arr) {



                foreach ($ghg_category_arr as $ghg_category) {



                    $temp = [];



                    $query = $db->query("select sum(ga.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from ghg_assessment as ga join ghg as g on g.id=ga.ghg_id join supplier_assessment as sa on sa.id=ga.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $ghg_assessment_arr = $query->getResultArray();



                    $total_estimate = 0;



                    if ($ghg_assessment_arr) {



                        $total_estimate = $ghg_assessment_arr[0]['tot_estimate'];
                    }



                    $query = $db->query("select sum(smp.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from supplier_manufacturing_process as smp join ghg as g on g.id=smp.ghg_id join supplier_assessment as sa on sa.id=smp.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $supplier_manufacturing_process_arr = $query->getResultArray();



                    if ($supplier_manufacturing_process_arr) {



                        $total_estimate += $supplier_manufacturing_process_arr[0]['tot_estimate'];
                    }



                    $temp['ghg_category_name'] = $ghg_category['ghg_category_name'];



                    $temp['total_emission'] = $total_estimate;



                    $ghg_cat_arr[] = $temp;
                }
            }
        }



        $data['ghg_cat_arr'] = $ghg_cat_arr;

        if (session()->supplier_info['role'] == 0) {
            $id = session()->supplier_info['supplier_id'];

            $o_id = session()->supplier_info['supplier_id'];
        } else {

            $id = session()->supplier_info['supplier_id'];

            $a_id = $supplier_model->where('id', $id)->first();

            $o_id = $a_id['owner_id'];
        }



        $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=" . $o_id);

        $find = $ok->getResultArray();


        // print_r($find);
        // die();

        if (session()->supplier_info['role'] == 11) {

            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And (policy_status=1 or policy_status=2) And owner_id=" . $o_id);

            $find = $ok->getResultArray();
        }
        //             print_r($o_id);
        // die();
        // print_r($id);
        // die();
        //      $policy_brand = new PolicyBrandModel();
        // $data['policy']  = $policy_brand->where('status',1)->where('owner_id',$o_id)->findAll();

        $data['policy'] = $find;


        // print_r($data['policy']);

        // die();


        return view('brand/policy', $data);
    }

    public function approve_policy()



    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }

        $db = \Config\Database::connect();



        $policy = new DocumentSubTypeModel();

        $policy_brand = new PolicyBrandModel();

        if (session()->supplier_info['role'] == 0) {

            $o_id = session()->supplier_info['supplier_id'];

            $find = $policy_brand->where('status', 1)->findAll();

            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And owner_id=" . $o_id);

            $find = $ok->getResultArray();

            // print_r($okk);

            //     die();



        }



        $data['pg_nm'] = 'Policy';



        $session = session();



        $supplier_info = $session->get('supplier_info');



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







        $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id in(1,2) and a.`supplier_id`=" . $supplier_info['supplier_id'] . " group by assessment_id order by assessment_id");



        $level = $query->getResultArray();





        $total_level = 0;



        $level_name = '';



        if (!empty($level)) {



            foreach ($level as $l) {



                $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='" . $l['assessment_id'] . "' ");



                $t = $query->getResultArray();



                $total_level = $total_level + (($l['tot'] / 100) * $t[0]['weight_percentage']);
            }
        }



        if ($total_level >= 0 && $total_level <= 20) {



            $level_name = "Dorment";
        }



        if ($total_level >= 21 && $total_level <= 40) {



            $level_name = "Active";
        }



        if ($total_level >= 41 && $total_level <= 60) {



            $level_name = "Positive";
        }



        if ($total_level >= 81 && $total_level <= 100) {



            $level_name = "Green";
        }



        $data['level'] = array("level_name" => $level_name, "level_per" => $total_level);





        $ghg_cat_arr = [];



        if ($supplier_info['supplier_id']) {



            $query = $db->query("select * from ghg_category where status=1");



            $ghg_category_arr = $query->getResultArray();



            if ($ghg_category_arr) {



                foreach ($ghg_category_arr as $ghg_category) {



                    $temp = [];



                    $query = $db->query("select sum(ga.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from ghg_assessment as ga join ghg as g on g.id=ga.ghg_id join supplier_assessment as sa on sa.id=ga.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $ghg_assessment_arr = $query->getResultArray();



                    $total_estimate = 0;



                    if ($ghg_assessment_arr) {



                        $total_estimate = $ghg_assessment_arr[0]['tot_estimate'];
                    }



                    $query = $db->query("select sum(smp.estimate) as tot_estimate,g.id as gid,sa.id as said,gc.id as gcid from supplier_manufacturing_process as smp join ghg as g on g.id=smp.ghg_id join supplier_assessment as sa on sa.id=smp.supplier_assessment_id join ghg_category as gc on gc.id=g.ghg_category_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and sa.is_submit=1 and g.ghg_category_id=" . $ghg_category['id']);



                    $supplier_manufacturing_process_arr = $query->getResultArray();



                    if ($supplier_manufacturing_process_arr) {



                        $total_estimate += $supplier_manufacturing_process_arr[0]['tot_estimate'];
                    }



                    $temp['ghg_category_name'] = $ghg_category['ghg_category_name'];



                    $temp['total_emission'] = $total_estimate;



                    $ghg_cat_arr[] = $temp;
                }
            }
        }



        $data['ghg_cat_arr'] = $ghg_cat_arr;

        if (session()->supplier_info['role'] == 0) {
            $id = session()->supplier_info['supplier_id'];

            $o_id = session()->supplier_info['supplier_id'];
        } else {

            $id = session()->supplier_info['supplier_id'];

            $a_id = $supplier_model->where('id', $id)->first();

            $o_id = $a_id['owner_id'];
        }



        $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And  policy_status = '1' and  owner_id=" . $o_id);

        $find = $ok->getResultArray();


        // print_r($find);
        // die();

        if (session()->supplier_info['role'] == 11) {



            $ok = $db->query("SELECT * FROM `policy_brand` WHERE status=1 And policy_status=1 or policy_status=2 And owner_id=" . $o_id);

            $find = $ok->getResultArray();
        }

        $data['policy'] = $find;
        return view('brand/approve_policy', $data);
    }


    public function approvePolicy($id, $version)
    {

        $db = \Config\Database::connect();

        $o_id = session()->supplier_info['supplier_id'];



        $date = date("d/m/Y");

        $v = 2;



        $db->query("UPDATE `policy_brand` SET policy_status = 1,  versions = '" . $v . "',approved_on = '" . $date . "',approved_by = " . $o_id . "   WHERE status=1 And id=" . $id);



        return $version;
    }

    public function editPolicy($id)
    {

        $db = \Config\Database::connect();

        $ok = $db->query("SELECT * from `policy_brand` WHERE status=1 And id=" . $id);

        $data = $ok->getResultArray();

        $response = [

            'success' => true,

            'id'             => $data[0]['id'],

            'policy_name'    => $data[0]['policy_name'],

            'policy_details' => $data[0]['policy_details'],

            'versions'       => $data[0]['versions'],

            'msg' => "Image successfully uploaded"

        ];

        // print_r($data);

        return $this->response->setJSON($response);
    }

    public function updatePolicy()
    {



        $name = $this->request->getVar('policy_name');

        $detail = $this->request->getVar('policy_details');

        $id =  $this->request->getVar('id');

        $versions =  $this->request->getVar('versions');

        $db = \Config\Database::connect();

        $o_id = session()->supplier_info['supplier_id'];



        // $date = date("d/m/Y");

        $v = $versions + 0.1;



        $up = $db->query("UPDATE `policy_brand` SET versions = '" . $v . "' ,  policy_details = '" . $detail . "'  WHERE status=1 And id=" . $id);

        $session = session();

        if ($up) {

            $s_date = ['success' => 'Policy Update SuccessFully'];

            $session->setFlashdata($s_date);
        } else {

            $s_date = ['error' => 'Policy not update'];

            $session->setFlashdata($s_date);
        }



        return redirect()->back();
    }

    public function acknowledgePolicy()
    {

        $session = session();

        $id =  $this->request->getVar('id');

        $db = \Config\Database::connect();

        $o_id = session()->supplier_info['supplier_id'];

        $acknowledge_by = [];
        $acknowledge_date = [];


        // print_r($id);
        // die();
        $ok = $db->query("SELECT * from `policy_brand` WHERE status=1 And id=" . $id);

        $data = $ok->getResultArray();

        $acknowledge_by = json_decode($data[0]['acknowledge_by']);
        $acknowledge_date = json_decode($data[0]['acknowledge_date']);

        $m_id = session()->supplier_info['supplier_id'];
        $m_dat = date("l jS \of F Y h:i:s A");

        // print_r($acknowledge_by);

        // die();



        if ($acknowledge_by == '') {

            $ank = array($m_id);

            $ak = json_encode($ank);

            $ank = array($m_dat);

            $akk = json_encode($ank);

            // print_r($ak);

            // die();

        } else {

            // $dataa = json_decode($acknowledge_by);

            foreach ($acknowledge_by as $a) {

                if ($a == session()->supplier_info['supplier_id']) {

                    $s_date = ['success' => 'Policy allreddy acknowledge by you'];

                    $session->setFlashdata($s_date);

                    return redirect()->back();
                }
            }
            foreach ($acknowledge_date as $a) {

                if ($a == date("l jS \of F Y h:i:s A")) {

                    $s_date = ['success' => 'Policy allreddy acknowledge by you'];

                    $session->setFlashdata($s_date);

                    return redirect()->back();
                }
            }

            array_push($acknowledge_date, $m_dat);

            $akk = json_encode($acknowledge_date);

            array_push($acknowledge_by, $m_id);

            $ak = json_encode($acknowledge_by);
        }
        // if($acknowledge_date == ''){

        //     $ank= array($m_dat);

        //     $akk = json_encode($ank);

        //     // print_r($akk);

        //     // die();

        // }

        // else{

        //     // $dataa = json_decode($acknowledge_by);

        //     foreach($acknowledge_date as $a){

        //         if($a == date("l jS \of F Y h:i:s A")){

        //             $s_date = ['success' => 'Policy allreddy acknowledge by you'];

        //             $session->setFlashdata($s_date);

        //             return redirect()->back();

        //         }

        //     }

        //     array_push($acknowledge_date, $m_dat);

        //     $akk = json_encode($acknowledge_date);

        // }

        // print_r($ok);

        // die();







        // $date = date("d/m/Y");



        $up = $db->query("UPDATE `policy_brand` SET acknowledge_by = '" . $ak . "'  WHERE status=1 And id=" . $id);
        $up = $db->query("UPDATE `policy_brand` SET acknowledge_date = '" . $akk . "'  WHERE status=1 And id=" . $id);

        if ($up) {

            $s_date = ['success' => 'Policy acknowledge SuccessFully'];

            $session->setFlashdata($s_date);
        } else {

            $s_date = ['error' => 'Policy not acknowledge'];

            $session->setFlashdata($s_date);
        }



        return redirect()->back();
    }

    public function addPolicy()
    {

        $session = session();

        $name = $this->request->getVar('policy_name');

        $filee = $this->request->getFile('file');

        $policy_brand = new PolicyBrandModel();

        $supplier = new SupplierModel();

        $noti = new UserNotification();









        if ($filee->isValid()) {



            $ext = $filee->getClientExtension();



            $ava_ext = array("png",  "gif", "pdf", "doc", "docx");



            if (in_array($ext, $ava_ext)) {





                $time = time();

                $f_name = $filee->getClientName();

                $file = '' . $time . '-' . $f_name . '';



                if ($filee->move('public/uploads/policy_file', $file)) {





                    if (session()->supplier_info['role'] == 0) {

                        $o_id = session()->supplier_info['supplier_id'];
                    } else {

                        $sid = session()->supplier_info['supplier_id'];

                        $ok = $supplier->where('id', $sid)->first();

                        $o_id = $ok['owner_id'];
                    }

                    $id = session()->supplier_info['supplier_id'];

                    if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10) {

                        $data = [

                            'policy_name'    => $name,

                            'owner_id'       => $o_id,

                            'file'           => $file,

                            'created_by'     => $id,

                            'policy_status'  => 1,

                            'approved_by'    => $id,

                            'approved_on'    => date("d/m/Y")

                        ];
                    } else {

                        $data = [

                            'policy_name'    => $name,

                            'owner_id'       => $o_id,

                            'file'       => $file,

                            'created_by' => $id,

                            'policy_status' => 2,

                        ];
                    }

                    $if = $policy_brand->insert($data);

                    if (session()->supplier_info['role'] == 0) {

                        $o_id = session()->supplier_info['supplier_id'];

                        $u_id = session()->supplier_info['supplier_id'];

                        $msg = "Please acknowledge new policy";

                        $for = 2;
                    } elseif (session()->supplier_info['role'] == 10) {

                        $u_id = session()->supplier_info['supplier_id'];

                        $id_o = $supplier->where('id', $u_id)->first();

                        $o_id = $id_o['owner_id'];

                        $msg = "Please acknowledge new policy";

                        $for = 2;
                    } else {

                        $u_id = session()->supplier_info['supplier_id'];

                        $id_o = $supplier->where('id', $u_id)->first();

                        $o_id = $id_o['owner_id'];

                        $msg = "Please approve this policy";

                        $for = 1;
                    }

                    if ($if) {

                        $data = [

                            'owner_id' => $o_id,

                            'created_by' => $u_id,

                            'msg' => $msg,

                            'link' => 'Brand/policy',

                            'for_y' => $for

                        ];

                        $noti->insert($data);



                        $s_date = ['success' => 'Policy added successfuly'];

                        $session->setFlashdata($s_date);

                        return redirect()->back();
                    }

                    $s_date = ['error' => 'Policy not add'];

                    $session->setFlashdata($s_date);

                    return redirect()->back();
                }
            } else {



                $session->setFlashdata('error', 'Please select a valid file like pdf,image');
            }
        } else {

            $session->setFlashdata('error', 'Please select a valid file like pdf,image');
        }

        return redirect()->back();
    }
    // $ext = $filee->getClientExtension();

    // $time = time();

    // $f_name = $filee->getClientName();

    // $file = ''.$time.'-'.$f_name.'';

    // $filee->move('public/uploads/policy_file', $file);

    // print_r($file);

    // die();

    // if(session()->supplier_info['role'] == 0){

    //     $o_id = session()->supplier_info['supplier_id'];

    // }

    // else{

    //     $sid = session()->supplier_info['supplier_id'];

    //     $ok = $supplier->where('id', $sid)->first();

    //     $o_id = $ok['owner_id'];

    // }

    // $id = session()->supplier_info['supplier_id'];

    //     if(session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 10){

    //         $data = [

    //             'policy_name'    => $name,

    //             'owner_id'       => $o_id,

    //             'file'           => $file,

    //             'created_by'     => $id,

    //             'policy_status'  => 1,

    //             'approved_by'    => $id,

    //             'approved_on'    => date("d/m/Y")

    //         ];

    //     }else{

    //         $data = [

    //             'policy_name'    => $name,

    //             'owner_id'       => $o_id,

    //             'file'       => $file,

    //             'created_by' => $id,

    //             'policy_status' => 2,

    //         ];

    //     }

    //     $if = $policy_brand->insert($data);

    //     if($if){

    //         $s_date = ['success' => 'Policy added successfuly'];

    //                 $session->setFlashdata($s_date);

    //                 return redirect()->back();

    //     }

    //     $s_date = ['error' => 'Policy not add'];

    //                 $session->setFlashdata($s_date);

    //                 return redirect()->back();



    // }

    public function deletePolicy($id)
    {

        $session = session();

        $policy_brand = new PolicyBrandModel();

        $if = $policy_brand->where('id', $id)->first();

        if ($if['created_by'] == 0) {

            $s_date = ['error' => 'Baap ko mt sikha'];

            $session->setFlashdata($s_date);

            return redirect()->back();
        }

        $data = [

            'status' => 0

        ];

        $policy_brand->update($id, $data);

        $s_date = ['success' => 'Policy deleted successfully'];

        $session->setFlashdata($s_date);

        return redirect()->back();
    }

    public function importCsvToDb()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();

        $footprint_type_model = new FootprintTypeModel();
        $county_model = new CountryModel();
        $state_model = new StateModel();
        $unit_model = new UnitModel();

        $supplier_info = $session->get('supplier_info');
        $id = $supplier_info['supplier_id'];
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $session->setFlashdata('error', 'Please csv file upload');
            return redirect()->back();
        }

        if ($file = $this->request->getFile('file')) {

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(".../public/sitecsv", $newName);
                $open = fopen(".../public/sitecsv/" . $newName, "r");
                $i = 0;
                $csvArr = array();
                $filedata = fgetcsv($open, 1000, ",");

                while (($filedata = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $querySiteType = $footprint_type_model->where('type_name', $filedata[1])->where('status', 1)->first();
                    $query = $county_model->where('name', $filedata[3])->where('status', 1)->first();
                    $queryState = $state_model->where('name', $filedata[4])->where('country_id', $query['id'])->first();


                    $country_id = $query['id'];
                    $state_id = $queryState['id'];
                    $site_id = $querySiteType['id'];

                    $model = new Supplier_assessment();
                    $same_site =  $model->where('supplier_id', $id)->where('cp_name', $filedata[0])->first();



                    if ($filedata[2] == 'lease') {
                        $filedata[2] = 'Lease';
                    }

                    if ($filedata[2] == 'owned') {
                        $filedata[2] = 'Owned';
                    }



                    if (!$same_site) {

                        if (!$filedata[0] == "") {

                            // print_r($filedata);


                            $data =
                                [
                                    'is_submit' => '1',
                                    'assessment_id' => '12',
                                    'supplier_id' => $supplier_info['supplier_id'],
                                    'cp_name' => $filedata[0],
                                    'state_id' => $state_id,
                                    'lease_owned' => $filedata[2],
                                    'unit_id' => '23',
                                    'cp_type_id' => $site_id,
                                    'cp_address' => $filedata[5],
                                    'country_id' => $country_id,
                                    'date_from' => date('Y-m-d'),
                                    'date_to' => date('Y-m-d'),

                                ];

                            $model->insert($data);
                            session()->setFlashdata('success', ' Rows successfully added.');
                        }
                    }
                }
                // die();

                fclose($open);
            } else {
                session()->setFlashdata('error', 'CSV file coud not be imported.');
                session()->setFlashdata('error', 'alert-danger');
            }
        }

        return redirect()->back();
    }

    public function session()
    {

        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();

        session()->setFlashdata('error', 'Please Complete Your Profile');


        return redirect()->back();
    }
    public function policy_uu($id)
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $idd = $supplier_info['supplier_id'];

        $policy_brand = new PolicyBrandModel();
        $supplier_model = new SupplierModel();
        $supplier = $supplier_model->where('id', $idd)->first();
        $supplierdetail = $supplier_model->where('added_by', $idd)->findall();
        if ($supplier['role'] == 10 || $supplier['role'] == 0) {

            $model = $policy_brand->where('id', $id)->where('created_by', $idd)->first();
        }


        if ($model) {
            $ack = json_decode($model['acknowledge_by']);
            $ackd = json_decode($model['acknowledge_date']);
            $data = '';
            $data .= '<div class="container"><div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0"><div class="m-1"><h4>Policy Name:</h4><h5>';
            $data .= $model['policy_name'] . '</h5></div><div class="m-1"> <h4>Created By:</h4> <h5>' . $supplier['supplier_name'] . ' + ' . $model['created_at'] . '</h5></div></div></div>';
            // $data.= '<div>Policy Name : <b>'.$model['policy_name'].'</b> Created By : <b>'.$supplier['supplier_name'].'</b> &nbsp;'.$model['created_at'].'';
            $data .= "  <table class='table table-bordered' id='example'>";
            $data .= "<tr>";
            $data .= "<th>#</th>";
            $data .= "<th>User</th>";
            $data .= "<th>Role</th>";
            $data .= "<th>Status</th>";
            $data .= "</tr>";
            $s = 1;
            $aackid = array();
            foreach ($ack as $key => $ackkca) {
                array_push($aackid, $ackkca);
                $supplierack = $supplier_model->where('id', $ackkca)->first();
                $data .= "<tr>";
                $data .= "<td>" . $s . "</td>";
                $data .= "<td>" . $supplierack['supplier_name'] . "</td>";
                $data .= "<td>Manager</td>";
                $data .= "<td> Acknowledge<br><br><b>" . $ackd[$key] . "<b></td>";
                $data .= "</tr>";
                $s++;
            }

            foreach ($supplierdetail as $surdeta) {
                if (!in_array($surdeta['id'], $aackid)) {
                    $supack = $supplier_model->where('id', $surdeta['id'])->first();
                    $data .= "<tr>";
                    $data .= "<td>" . $s . "</td>";
                    $data .= "<td>" . $supack['supplier_name'] . "</td>";
                    $data .= "<td>Manager</td>";
                    $data .= "<td>Pending <form action='" . base_url('/Brand/policy_noti/') . "' method='post'>
                    <input type='hidden' id='all_data' name='id' value='" . $supack['id'] . "'>
                    <input type='hidden' id='all_data' name='name' value='" . $supack['supplier_name'] . "'>";
                    $data .= "<button class='btn btn-primary' type='submit'>Send Remainder</button></form></td>";
                    $data .= "</tr>";
                }
            }

            $data .= "</table>";
            echo $data;
        }
    }
    public function bannerImage()
    {

        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_model = new SupplierModel();



        $id = $this->request->getVar("proide");

        $file = $this->request->getFile('image');


        $old = $this->request->getVar('old_image');

        // print_r($file);
        // die();
        $validated = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4096]',
            ],
        ]);

        if (!$validated) {
            $session->setFlashdata('error', 'Please upload file jpg,jpeg,png');
            return redirect()->to('brand/account');
        }


        if ($file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();

            $file->move('public/bannerImage/', $newName);
            $msg = "BannerImage upload successfully";
            $session->setFlashdata('success', $msg);
        } else {

            // echo "else";

            $msg = "Profile Not updated";

            $newName = $old;
            $session->setFlashdata('error', $msg);
        }

        $data = [



            'bannerImage' => $newName,

        ];

        $supplier_model->update($id, $data);
        $prof_id = $this->request->getVar("prof_id");


        if ($prof_id == '11') {
            return redirect()->to('brand/manage_organization');
        } else {
            return redirect()->to('brand/account');
        }
    }

    public function policy_noti()
    {



        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $idd = $supplier_info['supplier_id'];

        $policy_brand = new PolicyBrandModel();
        $supplier_model = new SupplierModel();




        $id = $this->request->getVar('id');
        $policy_name = $this->request->getVar('name');
        // print_r($policy_name);
        // die();
        $notification = new UserNotification();

        $data = [
            'owner_id' => $idd,
            'created_by' => $supplier_info['supplier_id'],
            'msg' => 'Please Acknowledge Your Policy',
            'link' => 'brand/approve_policy',
            'for_y' => $id
        ];


        $noti = $notification->insert($data);
        if ($noti) {

            $session->setFlashdata('success', 'Notification SuccessFully send');
        } else {
            $session->setFlashdata('error', ' Not update');
        }

        return redirect()->back();
    }
}
