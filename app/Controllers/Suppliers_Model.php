<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\SupplierType;
use App\Models\Control_assessment;
use App\Models\SupplierModel;
use App\Models\SupplierModuleModel;
use App\Models\QuickStartModel;
use App\Models\CountryModel;
use App\Models\FootprintTypeModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\SubSubIndustryModel;
use App\Models\SupplierSubsidiaryModel;
use App\Models\IndustryModel;
use App\Models\IndustryCategoryModel;
use App\Models\EmployeeDetails;
use App\Models\SupplierRoleModel;

class Suppliers_Model extends BaseController
{
    public function __construct()
    {

        helper(['form', 'url', 'html', 'menu']);


        $session = \Config\Services::session();
    }


    public function index()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }


        $data['pg_nm'] = 'Supplier';
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

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'DESC')->findAll();

        $per = 0;

        $total_per = 0;

        $query = $db->query("select * from assessment where status=1 order by id");

        $rs = $query->getResultArray();

        if (!empty($rs)) {

            foreach ($rs as $r) {

                $query = $db->query("select * from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and is_verify=1 and is_submit=1 and assessment_id='" . $r['id'] . "' ");

                $p = $query->getResultArray();


                if (!empty($p)) {


                    $per = ($p[0]['assessment_per'] / 100) * $r['weight_percentage'];

                    $total_per = $per + $per;
                }
            }
        }

        $ghg = array();

        $query = $db->query("select * from assessment where  id=10 order by id");

        $rs = $query->getResultArray();

        $query = $db->query("select * from supplier_assessment where is_submit=1 and assessment_id='" . $rs[0]['id'] . "' and supplier_id='" . $supplier_info['supplier_id'] . "'");

        $s = $query->getResultArray();

        $total_company_footprint = 0;

        $total_building_footprint = 0;

        $total_travel_footprint = 0;

        $total_company_vehicle_footprint = 0;

        $total_mobile_fuel_footprint = 0;

        if ($s) {

            foreach ($s as $rs) {


                $total_company_footprint = $total_company_footprint + $rs['total_footprint'];

                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $rs['id'] . "' and ghg_id=17");
                $building_footprint = $query->getResultArray();

                if ($building_footprint) {

                    $total_building_footprint = $total_building_footprint + $building_footprint[0]['tot'];
                }

                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $rs['id'] . "' and ghg_id=18");

                $travel_footprint = $query->getResultArray();

                if ($travel_footprint) {


                    $total_travel_footprint = $total_travel_footprint + $travel_footprint[0]['tot'];
                }


                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $rs['id'] . "' and ghg_id=19");

                $company_vehicle_footprint = $query->getResultArray();

                if ($company_vehicle_footprint) {


                    $total_company_vehicle_footprint = $total_company_vehicle_footprint + $company_vehicle_footprint[0]['tot'];
                }


                $query = $db->query("select sum(estimate) as tot from ghg_assessment where supplier_assessment_id='" . $rs['id'] . "' and ghg_id=20");

                $mobile_fuel_footprint = $query->getResultArray();


                if ($mobile_fuel_footprint) {

                    $total_mobile_fuel_footprint = $total_mobile_fuel_footprint + $mobile_fuel_footprint[0]['tot'];
                }
            }
        }


        if (!empty($s)) {


            $query = $db->query("select SUM(estimate)as tot,ghg_id from ghg_assessment where  supplier_assessment_id='" . $s[0]['id'] . "' and supplier_id='" . $supplier_info['supplier_id'] . "' group by ghg_id");


            $rs = $query->getResultArray();
        }
        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id =  session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }

        $footprint_type_model = new FootprintTypeModel();

        $data['type'] = $footprint_type_model->where(['footprint_id' => 3, 'status' => 1])->findAll();

        $query = $db->query("select * from states");

        $data['stateee'] = $query->getResultArray();

        $query = $db->query("select * from countries where status=1 ");

        $data['country'] = $query->getResultArray();

        $model =  new SupplierType();
        if (session()->supplier_info['role'] == 0) {
            $data['supplier_state'] = $model->select('states.name')->join('states', 'states.id=supplier_type.state')->where('supplier_type.owner_id', $o_id)->where('supplier_type.status', 1)->groupBy('supplier_type.state')->findAll();

            $data['list'] = $model->select('*,supplier_type.id as sup_id,supplier_type.email as sup_email')->join('supplier', 'supplier.email=supplier_type.email', 'LEFT')->where('supplier_type.owner_id', $o_id)->where('supplier_type.status', 1)->findAll();
        } else {
            $data['supplier_state'] = $model->select('states.name')->join('states', 'states.id=supplier_type.state')->where('supplier_type.owner_id', $o_id)->where('supplier_type.status', 1)->groupBy('supplier_type.state')->findAll();

            $data['list'] = $model->select('*,supplier_type.id as sup_id,supplier_type.email as sup_email')->join('supplier', 'supplier.email=supplier_type.email', 'LEFT')->where('supplier_type.supplier_id', $u_id)->where('supplier_type.status', 1)->findAll();
        }
        $industary_model = new IndustryModel();
        $data['industary'] = $industary_model->where('status', 1)->OrderBy('industry_name')->findAll();




        // print_r($data['supplier_state']);
        // die;
        echo view('brand/add_supplier', $data);
    }


    public function createSupplier()
    {


        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Building';

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $model =  new SupplierType();
        $name = $this->request->getVar('name');
        $country_id = $this->request->getVar('country_idd');
        $state_id = $this->request->getVar('state_id');
        $pincode = $this->request->getVar('add_pincode');
        $email = $this->request->getVar('email');
        // print_r($email);
        // die();
        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $u_id)->first();
            $o_id = $ok['owner_id'];
        }
        $data = [
            'supplier_id' => $u_id,
            'owner_id' => $o_id,
            'name' => $this->request->getVar('name'),
            'supplier_code' => $this->request->getVar('supplier_code'),
            'supplier_type' => $this->request->getVar('supplier_type'),
            'supplier_address' => $this->request->getVar('supplier_address'),
            'state' => $state_id,
            'country' => $country_id,
            'supplier_industry' => $this->request->getVar('supplier_industry'),
            'pincode' => $pincode,
            'email' => $email,
            'company_name' => $this->request->getVar('company_name'),
        ];

        $insert = $model->insert($data);
        if ($insert) {
            $s_date = ['success' => 'Supplier Insert SuccessFully'];

            $session->setFlashdata($s_date);

            // Gopal Email Code start --
            $supplier = new SupplierModel();
            $o_id = session()->supplier_info['supplier_id'];
            $admin = $supplier->where('id', $o_id)->first();
            $admin_id = $o_id;
            // if ($admin['role'] == 0) {
            //     $admin_id = $o_id;
            // } elseif ($admin['role'] == 10) {
            //     $admin_id = $o_id;
            // } else {
            //     $admin_id = $admin['added_by'];
            // }
            $supplier_info = $session->get('supplier_info');
            $supp_id = $supplier_info['supplier_id'];
            $supplier_info = $db->query("SELECT * FROM `supplier` where id=$supp_id")->getResultArray();
            $department = $supplier_info[0]['department'];
            if ($department == "") {
                $department = "Positiivplus";
            }

            $detail = $supplier->where('id', $admin_id)->first();
            $imag = $detail['image'];
            $s_name = $detail['supplier_name'];
            $role = $detail['role'];
            if ($role == '10' || $role == '0') {
                $role_name = 'Admin';
            }
            if ($role == '11') {
                $role_name = 'Manager';
            }
            if ($role == '12') {
                $role_name = 'Employee';
            }
            if ($role == '13') {
                $role_name = 'Supplier';
            }
            if ($imag) {
                $image = $imag;
            } else {
                $image = 'defaultimage.jpg';
            }
            // $image = 'defaultimage.jpg';

            $mail = \Config\Services::email();
            $subject = 'SUB: You have an invitation for POSITIIVPLUS';
            $t = time();
            $time_date1 = date("d-m-Y H:i:s", $t);
            $time_date2 = date("Y", $t);
            $user_message = '';
            $user_message .= '<html><body>';
            $user_message .= '<div style="margin: 0 auto;width: 600px;">
            <div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;">
            <img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png">
            </div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;">
            <h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $name . ',</h3>
            <p  style="margin-bottom:13px; margin-top:13px;">You have been invited  to join  on<b style="font-size:15px;"> POSITIIVPLUS</b> as Supplier of the <b>' . ($detail['brand_name']) . '</b></p>
            <hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;">
            
            <img style="height:50px; width:50px; border-radius:10px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/>
            <p style="margin-bottom:0px; margin-top:13px;">' . $s_name . '</p>
            <p style="margin-bottom:0px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p>
          
            <a href="https://positiivplus.com/home/signup?csrf_token=4c9da4ae7abf4ce3f15bc50bc2fd30cb&plan_id=MQ==" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">JOIN</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png"></a></div></div></div>';
            $user_message .= '</body></html>';

            // print_r($user_message);
            // die;
            $mail = \Config\Services::email();
            $mail->setTo($email);
            $mail->setFrom('info@positiivplus.com', 'PositiivPlus Verification');
            $mail->setSubject('SUB: POSITIIVPLUS Login code');
            $mail->setMessage($user_message);
            $a = $mail->send();


            // print_r($a); die();

        }
        return redirect()->back();
    }
    public function deleteSupplier()
    {

        $id = $this->request->getVar('company_id');
        $session = session();
        $model =  new SupplierType();
        $data = [

            'status' => '0',
        ];

        $insert = $model->update($id, $data);
        if ($insert) {
            $s_date = ['error' => 'Supplier Delete SuccessFully'];

            $session->setFlashdata($s_date);
        }
        return redirect()->back();
    }

    public function editSupplier()
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
        $model =  new SupplierType();
        $country_id = $this->request->getVar('country_idd');

        $state_id = $this->request->getVar('state_id');

        $id = $this->request->getVar('supplier_id');
        $pincode = $this->request->getVar('edit_pincode');
        $city = "No google Extraction";



        $data = [
            'supplier_id' => $supplier_id,
            'owner_id' => $supplier_id,
            'name' => $this->request->getVar('name'),
            'supplier_code' => $this->request->getVar('supplier_code'),
            'supplier_type' => $this->request->getVar('supplier_type'),
            'supplier_address' => $this->request->getVar('supplier_address'),
            'state' => $state_id,
            'country' => $country_id,
            'city' => $city,
            'supplier_industry' => $this->request->getVar('supplier_industry'),
            'pincode' => $pincode,
            'company_name' => $this->request->getVar('company_name'),
        ];
        // print_r($data);
        // die;
        $insert = $model->update($id, $data);
        if ($insert) {
            $s_date = ['success' => 'Supplier update SuccessFully'];

            $session->setFlashdata($s_date);
        }
        return redirect()->back();
    }
    public function supplier_view_profile($id)
    {
        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }


        $data['pg_nm'] = 'Supplier';
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        // $supplier_id = $supplier_info['supplier_id'];

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();
        $SupplierType = new SupplierType();

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
        $SupplierType = new SupplierType();
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();

        $o_id = $SupplierType->join('supplier', 'supplier.email=supplier_type.email')->where('supplier.id', $id)->where('supplier_type.status', 1)->first()['id'];
        // print_r($supplier_join);
        // die;
        $supplier_info['supplier_id'] = $o_id;
        $supplier_id = $o_id;
        $rs = $supplier_model->select("supplier_plan_id,country_id, industry_id,brand_name,website,description")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        $supp_assess = $db->query("select * from supplier_assessment where supplier_id=" . $supplier_info['supplier_id'] . " and assessment_id=12 order by id desc")->getRowArray();
        $data['supp_assess'] = $supp_assess;
        $session = session();
        $find = new QuickStartModel();
        $supplier_model = new SupplierModel();
        // if (session()->supplier_info['role'] == 0) {
        //     $o_id = session()->supplier_info['supplier_id'];
        // } else {
        //     $u_id = session()->supplier_info['supplier_id'];
        //     $make = $supplier_model->where('id', $u_id)->first();
        //     $o_id = $make['owner_id'];
        // }
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



        // $data['type'] = $footprint_type_model->where(['footprint_id' => 1, 'status' => 1])->findAll();



        $data['list'] = $db->query("SELECT sa.*,  ft.type_name,c.name AS country_name, indus.industry_name as indus_name FROM supplier_assessment AS sa LEFT JOIN footprint_type AS ft
ON sa.cp_type_id = ft.id LEFT JOIN countries AS c ON sa.country_id = c.id LEFT JOIN industry AS indus ON indus.id = sa.industry_id where sa.supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12 order by sa.id asc")->getResultArray();
        $query = $db->query("select * from countries where status=1 ");



        $data['country'] = $query->getResultArray();

        $model = new SupplierModel();
        $data['supplier'] = $model->where('id', $o_id)->first();


        $supplier_role_model = new SupplierRoleModel();

        $data["role"] = $supplier_role_model->where('status', 1)->findAll();
        // print_r($data['supplier']);
        // die();

        $supplier_plan = new SupplierPlanModel();

        $company = new CompanyModel();

        $activitie = new SubSubIndustryModel();

        $ssd = new SupplierSubsidiaryModel();

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
        $data['data_show'] = $supplier_model->select('supplier_access')->where('id', $id)->first()['supplier_access'];
        // print_r($data['data_show']);
        // die;
        $data['id'] = $id;
        $data['country_lat_long'] = $country->where('status', 1)->where('lng', null)->where('lat', null)->findAll();
        return view('brand/supplier_profileview', $data);
    }
    public function accessifier()
    {
        $model = new SupplierModel();
        $update = $model->update($this->request->getPost('id'), ['supplier_access' => $this->request->getPost('num')]);
        if ($update)
            echo "Changes saved";
        else
            echo "Changes not saved";
    }
    public function test_view()
    {
        /* Creating Models */
        $supplier = new SupplierModel();
        $contr_ass = new Control_assessment();
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }
        /* Variables defining */
        $id = $this->request->getPost('id');
        $uniq_spl = $this->request->getPost('uniq_spl');
        $db = \Config\Database::connect();
        if (!$uniq_spl) {
            $id_assessment = $db->query("SELECT * FROM `qualitative_timeline_answer` WHERE status=1 and assigned_to=$o_id")->getResultArray()[0];
            $roit = $id_assessment['control_assessment_id'];
            $wei_uniq_id = $db->query("SELECT ed.* FROM `control_assessment` as ed where ed.id=$roit")->getResultArray()[0];
            $uniq_spl = $wei_uniq_id['supplier_uniq'];
            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $sid = session()->supplier_info['supplier_id'];
                $control_assessment = $contr_ass->where("supplier_uniq='$uniq_spl' and copy!=1 and num_show=1 and (assigned_to =$sid or owner_id= $o_id)")->findAll();
            } elseif (session()->supplier_info['role'] == 10) {
                $sid = session()->supplier_info['supplier_id'];
                $o_id = $supplier->where('id', $sid)->first()['owner_id'];
                $control_assessment = $contr_ass->where("supplier_uniq='$uniq_spl' and copy!=1 and num_show=1 and owner_id", $o_id)->findAll();
            } else {
                $sid = session()->supplier_info['supplier_id'];
                $ok = $supplier->where('id', $sid)->first();
                $o_id = $ok['owner_id'];
                $control_assessment = $contr_ass->where("supplier_uniq ='$uniq_spl' and copy!=1 and num_show=1 and (assigned_to = $sid or supplier_id = $sid) and owner_id=$o_id ")->findAll();
            }
        } else $control_assessment = $contr_ass->where('uniq_spl', $uniq_spl)->where('copy!=1 and num_show=1')->findAll();


        $arr['indi_Environment'] = $arr['Environment'] = $arr['indi_Social'] = $arr['Social'] = $arr['indi_Governance'] = $arr['Governance'] = array();
        $percentile  = 0;
        foreach ($control_assessment as $value) {
            $weitage_per = json_decode($value['weightage_per']);
            foreach ($weitage_per as $keys => $weitage) {
                if (!isset($result_array)) $result_array = 0;
                $result_array++;
                $total_mark = $marka = [];
                $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array ,  bqa.indicator_id AS indicator ,amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=2 and aaq.status = 1 AND bqa.control_assesment_id= " . $value['id'] . " AND bqa.indicator_id= $keys ")->getResultArray();
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
                $adc = $test;
                if ($keys == 8) {
                    $arr['indi_Environment'][] = $test;
                    $arr['Environment'][] = $adc;
                } else if ($keys == 9) {
                    $arr['indi_Social'][] = $test;
                    $arr['Social'][] = $adc;
                } else if ($keys == 11) {
                    $arr['indi_Governance'][] = $test;
                    $arr['Governance'][] = $adc;
                }
            }
        }
        $uniq_spl_data = $contr_ass->where('status', 1)->where('supplier_uniq', $control_assessment[0]['supplier_uniq'])->where("owner_id=$o_id or assigned_to=$o_id")->where('copy!=1 and num_show=1')->findAll();
        $html = '<select name="" id="uniq_spl" class="form-control" onchange="uniq_spl($(this),' . $id . ')"><option value="' . $uniq_spl_data[0]['supplier_uniq'] . '" ';
        if (!$uniq_spl)
            $html .= 'selected';
        $html .= '>All</option>';
        foreach ($uniq_spl_data as $key => $value) {
            $html .= '<option value="' . $value['uniq_spl'] . '"';
            if ($uniq_spl == $value['uniq_spl']) $html .= "selected";
            $html .= '>' . $value['uniq_spl'] . '</option>';
        }
        $html .= '</select>';
        $data['uniq_spl'] = $html;
        $data['id'] = $id;
        $Environment = $Social = $Governance = $indi_Environment = $indi_Social = $indi_Governance = 0;

        if (!empty($arr['Environment'])) $Environment = number_format(array_sum($arr['Environment']) / sizeof($arr['Environment']), 2);

        if (!empty($arr['Social'])) $Social = number_format(array_sum($arr['Social']) / sizeof($arr['Social']), 2);
        if (!empty($arr['Governance'])) $Governance = number_format(array_sum($arr['Governance']) / sizeof($arr['Governance']), 2);
        if (!empty($arr['indi_Environment'])) $indi_Environment = number_format(array_sum($arr['indi_Environment']) / sizeof($arr['indi_Environment']), 2);
        if (!empty($arr['indi_Social'])) $indi_Social = number_format(array_sum($arr['indi_Social']) / sizeof($arr['indi_Social']), 2);
        if (!empty($arr['indi_Governance'])) $indi_Governance = number_format(array_sum($arr['indi_Governance']) / sizeof($arr['indi_Governance']), 2);

        $data['graph_val'] = ["Environment" => number_format($Environment / $result_array, 2), "Social" => number_format($Social / $result_array, 2), "Governance" => number_format($Governance / $result_array, 2)];
        $data['individual'] = ["indi_Environment" => $indi_Environment, "indi_Social" => $indi_Social, "indi_Governance" => $indi_Governance];

        echo view('brand/supplier_graph', $data);
    }
}
