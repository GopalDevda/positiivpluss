<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SupplierModel;
use App\Models\TimelineActionCenterModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\StepModel;
use App\Models\SupplierType;
use App\Models\Toolissue;
use App\Models\Victim;
use App\Models\ActionCenterModel;
use App\Models\GhgModel;
use App\Models\BrandModel;
use App\Models\GhgFactorModel;
use App\Models\Weather_alert_model;
use App\Models\SensorModel;
use App\Models\StandardModel;
use App\Models\ElectricityModel;
use App\Models\Automotion_alert;
use App\Models\Data_electricityModel;
use App\Models\Weather;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\Energy_managment;
use App\Models\Energy_managment_data;
use App\Models\Supplier_assessment;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Automotion extends BaseController

{
    private $helperData = array();

    public function __construct()
    {

        helper(['form', 'url', 'html', 'menu']);

        $session = \Config\Services::session();

        $this->helperData = commonData();
    }


    public function index()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];


        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



        $sup_mod_item_relation =
            $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];

        $supplier_mod_item = [];


        if ($sup_mod_item_relation) {

            foreach ($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }


        $data['supplier_mod'] = new SupplierModel();


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $ghg = new GhgModel();

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

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        // $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1");

        $data['boundary_item'] = $query->getResultArray();
        // print_r($data['boundary_item']);
        // die();

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();


        $data['ghg'] = $ghg->findAll();

        $data['supplier'] = $supplier_model->where('owner_id', $o_id)->orwhere('id', $o_id)->findAll();

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = session()->supplier_info['role'];
        }
        $data['pg_nm'] = 'sensor';
        $data['roleAllow'] =
            $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();

        // print_r($data['control_footprints']);
        // print_r($data['ghg']); die();
        $find = $db->query("SELECT * from control_footprints where status = 1 and owner_id = $o_id")->getResultArray();

        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
        }
        $ghg_factor = $db->query("SELECT * FROM `ghg_factor` where status=1")->getResultArray();
        $g_name = $db->query("SELECT * FROM `group_name` WHERE status = 1")->getResultArray();
        $ghg_factor_count = $db->query("SELECT count(*) FROM `ghg_factor` where status=1")->getResultArray();
        $g_name_count = $db->query("SELECT COUNT(id) FROM `group_name` WHERE status = 1")->getResultArray();
        $g_name_array = [];
        foreach ($g_name as $value) {
            array_push($g_name_array, $value['group_id']);
        }
        $ghg_factor_model = new GhgFactorModel();
        $all_ghg_factor = $ghg_factor_model->select('id')->whereIn('group_id', $g_name_array)->where('status', 1)->findAll();
        $g_name_implode = implode('","', $g_name_array);
        // print_r($g_name_implode);die();
        $query = $db->query("SELECT * FROM `control_footprints` WHERE owner_id = $o_id")->getResultArray();
        $total_footprint = 0;
        $total_panding = 0;
        $success = 0;
        foreach ($query as $row) {

            // $ok = $total_panding += number_format($row['complete']/2);
            // if($ok){
            //     $find = new QualitativeTimelineAnswerModel();
            //     $need = $find->where('control_assessment_id',$row['id'])->findAll();
            //     foreach($need as $nd){
            //         if($nd['percentile'] >= 50){
            //             $success++;
            //         }
            //     }
            // }

            if ($row['frequency'] == 'Monthly') {
                $total_footprint += 12;
            } elseif ($row['frequency'] == 'Quarterly') {
                $total_footprint += 4;
            } elseif ($row['frequency'] == 'Half yearly') {
                $total_footprint += 2;
            } elseif ($row['frequency'] == 'Yearly') {
                $total_footprint += 1;
            } else {
                $total_footprint += 1;
            }
            // print_r($total_footprint);
        }
        $data['total_footprint'] = $total_footprint;

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        // print_r($data['boundary_item']);
        // die();
        $query = $db->query("select id,cp_name,cp_address from supplier_assessment where is_submit=1 and supplier_id='" . $u_id . "'");

        $data['sub_boundary_item'] = $query->getResultArray();



        $query1 = $db->query("select * from sub_site where status=1 and supplier_id='" . $u_id . "' ");

        $data['sub_site_view'] = $query1->getResultArray();


        $data['site_id']  = $db->query("SELECT * FROM supplier_assessment WHERE is_submit=1 And  (supplier_id = $u_id or owner_id = $o_id)")->getResultArray();

        $model = new SupplierType();

        $data['supplier_id'] = $model->where('supplier_id', $u_id)->where('status', 1)->findAll();


        $query =
            $db->query("SELECT * FROM sensors where (owner_id = $o_id or supplier_id = $u_id) and status=1 ");



        $data['item'] = $query->getResultArray();


        $sensor = new SensorModel();

        $Data_electricity = new Data_electricityModel();

        $data['electricity_amount'] = $Data_electricity->where('status', 1)->groupBy('electricity_id')->findAll();

        $currentTime11 = strtotime('now');
        $currentTime111 = date('Y-m-d');

        // print_r($currentTime11);
        $dates = array('2015-02-01', '2015-02-02', '2017-02-03');

        // print_r($dates);
        // echo  max($dates);
        // die();
        // print_r($currentTime111);
        // die();


        $query = $db->query("select * from electricity_board where status=1");
        $data['electricity_board'] = $query->getResultArray();

        $data['sensor'] = '0';
        $currentTime11 = strtotime('now');
        $currentTime111 = date('m/d/Y H', $currentTime11);
        if ($currentTime111) {
            $currentTime2 = $currentTime111 . ':30:00';
        }

        $data['weather_ap']  = $db->query("SELECT * FROM Weather WHERE STATUS=1  And timestampRoh >='" . $currentTime2 . "'And (supplier_id = $u_id or owner_id = $o_id) GROUP by city_name")->getResultArray();

        // counting automotion
        $data['all_automation'] = count($sensor->where('supplier_id', $u_id)->where('status', 1)->findAll());

        $data['connect_data'] = count($sensor->where('supplier_id', $u_id)->where('status', 1)->where('current_status', 3)->findAll());

        $data['processing_data'] = count($sensor->where('supplier_id', $u_id)->where('status', 1)->where('current_status', 2)->findAll());

        $data['not_connect'] = count($sensor->where('supplier_id', $u_id)->where('status', 1)->where('current_status', 1)->findAll());

        // print_r($data['processing_data']);
        // print_r($data['not_connect']);
        // die();

        echo view('brand/sensor_view', $data);
    }

    public function sensor_data_view()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();
        $Data_electricity = new Data_electricityModel();


        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = session()->supplier_info['role'];
        }
        $filter = $this->request->getVar('filter');
        $sensor = new SensorModel();

       
        if ($_GET["start"] == 0) {
            $session->set("start", 0);
        }
        $str = $session->get("start");
       
        if ($filter) {

            
            // -------------------------------------------------
            // Query for electricity_board,supplier_assessment and sensors tables filter
            $item = $sensor->join("electricity_board", "sensors.provider_type=electricity_board.id", 'right outer')->join('supplier_assessment', 'sensors.subboundary_id=supplier_assessment.id')->like("supplier_assessment.cp_name", $filter)->orLike("electricity_board.abbrevation", $filter)->where("sensors.owner_id = $o_id or sensors.supplier_id = $u_id")->where("sensors.status", 1)->like("electricity_board.abbrevation", $filter)->findAll();
           
        } else {
            // echo "Not in filter";

            $items = $item = $db->query("SELECT * FROM sensors where (owner_id = $o_id or supplier_id = $u_id) and status=1")->getResultArray();
            // $qry = $db->query("UPDATE sensors SET test_id = id;");
        }
        $session->set("start", ($session->get("start") + 40));
        
        $sub_boundary_item = $db->query("select id,cp_name,cp_address from supplier_assessment where is_submit=1 and supplier_id='" . $u_id . "'")->getResultArray();


        $sub_site_view = $db->query("select * from sub_site where status=1 and supplier_id='" . $u_id . "' ")->getResultArray();

        $site_id = $db->query("SELECT * FROM supplier_assessment WHERE is_submit=1 And  (supplier_id = $u_id or owner_id = $o_id)")->getResultArray();

        $electricity_board = $db->query("select * from electricity_board where status=1")->getResultArray();

        $electricity_amount = [];
        $data = '';
        $i = 0;
        $run = 1;
        
        foreach ($item as $key => $values) {
           
                if ($str > $key) continue;
                if (($str + 40) == $key) break;
           
            $electricity_amount_id = $Data_electricity->where('status', 1)->where('electricity_id', $values['test_id'])->findAll();
           
            if ($electricity_amount_id) {

                $month_name_show = array();
                $arr = 0;

                foreach ($electricity_amount_id as $key => $valuesfff) {

                    $middle_id = strtotime($valuesfff['bill_date']);
                    // $month_id = $valuesfff['monthly_name'];


                    $dkjg =  date('m', $middle_id);
                    $month_name_show[] = $dkjg;
                    $month_name_show[$arr++];
                }


                $jdf =  max($month_name_show);
                $electricity_amount = $Data_electricity->where('status', 1)->where('electricity_id', $values['test_id'])->where('MONTH(bill_date)', $jdf)->findAll();
            }

            // echo sizeof($electricity_amount)." ";
            $data .= '<section id="accordion"><div class="row"><div class="col-sm-12"><div id="accordionWrapa1" role="tablist" aria-multiselectable="true"><div class="card less-margin"><div class="card-body p-1 pb-0  "><div class="row"><div class="col-md-2"><p class="pb-0 mb-0 fs-smaller">';
            if ($values['current_status'] == '3') {
                foreach ($electricity_amount as $bb) {
                    if ($bb['electricity_id'] == $values['test_id']) {
                        $middle = strtotime($bb['currentdatetime']);
                        $data .= '<span>' . date('d-M-Y h:i:s:A', $middle) . '</span>';
                    }
                }
            } else {
                $middle1 = strtotime($values['current_time_date']);
                $data .= '<span>' . date('d-M-Y h:i:s:A', $middle1) . '</span>';
            }
            $data .= '</p><h5 class="fw-bolder"></h5><img src="' . base_url('public/icon/electricity.png') . '" width="50px"></div>';

            $data .= '<div class="col-md-3 pt-2"><h6 class="fw-bolder">Site Name</h6><p class="fs mb-0" data-id="' . $values['id'] . '" onclick="collapase(this)"  class="accordion-button"data-bs-toggle="collapse"role="button"data-bs-target="#faq-payment-1-site' . $values['id'] . '"aria-expanded="true"aria-controls="faq-payment-1' . $values['id'] . '">';

            if (!$values['sub_site'] == 0) {
                foreach ($sub_boundary_item as $bb) {
                    foreach ($sub_site_view as $sub_site_id) {
                        if ($bb['id'] == $values['subboundary_id']) {
                            if ($sub_site_id['id'] == $values['sub_site']) {
                                $data .= '<span>' . $bb['cp_name'] . '</span>';
                                $data .= '<span>' . "<b>|</b>" . '</span>';
                                $data .= '<span>' . $sub_site_id['sub_site_name'] . '</span>';

                                $i = $sub_site_id['sub_site_address'] . "<b>|</b>" . $bb['cp_address'];

                                $data .= '<p class="fs" id="rr' . $values['id'] . '">' . substr_replace($i, "...", 29) . '</p>';
                                $data .= '<input  type="hidden"  id="vali' . $values['id'] . '">';
                            }
                        }
                    }
                }
            } else {
                foreach ($sub_boundary_item as $bb) {

                    if ($bb['id'] == $values['subboundary_id']) {

                        $data .= '<span>' . $bb['cp_name'] . '</span>';
                        $data .= '<span>' . " " . '</span>';

                        $i = $bb['cp_address'];

                        $data .= '<p class="fs" id="rr' . $values['id'] . '">' . substr_replace($i, "...", 29) . '</p>';
                        $data .= '<input  type="hidden"  id="vali' . $values['id'] . '">';
                    }
                }
            }
            $data .= '</p> <div id="faq-payment-1-site' . $values['id'] . '" class="collapse" aria-labelledby="paymentTwo" data-bs-parent="#faq-payment-qna"><div class="fs accordion-body p-0 pb-1">';
            if (!$values['sub_site'] == 0) {
                foreach ($sub_boundary_item as $bb) {
                    foreach ($sub_site_view as $sub_site_id) {
                        if ($bb['id'] == $values['subboundary_id']) {
                            if ($sub_site_id['id'] == $values['sub_site']) {

                                $i = $sub_site_id['sub_site_address'] . " <b>|</b> " . $bb['cp_address'];

                                $data .= '<p class="fs" id="rr' . $values['id'] . '">' . $i . '</p>';
                            }
                        }
                    }
                }
            } else {
                foreach ($sub_boundary_item as $bb) {

                    if ($bb['id'] == $values['subboundary_id']) {


                        $i = $bb['cp_address'];

                        $data .= '<p class="fs" id="rr' . $values['id'] . '">' . $i . '</p>';
                    }
                }
            }

            $data .= '</div>
                    </div>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Provider Name</h6>
                    <p class="fs">';
            foreach ($electricity_board as $ele_id) {
                if ($ele_id['id'] == $values['provider_type']) {
                    $data .= '<span>' . $ele_id['abbrevation'] . '</span>';
                }
            }
            $data .= '</p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Consumed Unit</h6>';
            if ($values['current_status'] == '3') {
                foreach ($electricity_amount as $bb) {
                    if ($bb['electricity_id'] == $values['test_id']) {
                        $data .= '<span>' . $bb['consume_unit'] . '</span>';
                    }
                }
            }
            $data .= '<p class="fs"> </p>
                  </div>
                  <div class="col-md-1 p-0 pt-2">
                    <h6 class="fw-bolder">Amount</h6>';
            if ($values['current_status'] == '3') {
                foreach ($electricity_amount as $bb) {

                    if ($bb['electricity_id'] == $values['test_id']) {
                        $data .= '<span>' . $bb['amount'] . '</span>';
                    }
                }
            }

            $data .= '</div>
                  <div class="col-md-1 pt-2">
                    <h6 class="fw-bolder">Status</h6>';
            if ($values['current_status'] == '1') {
                $data .= '<form class="form" method="post" action="" enctype="multipart/form-data">
                      <input type="hidden" name="status_id" value="' . $values['test_id'] . '">
                      <span class="firstconnect badge badge-light-danger" data-id="' . $values['test_id'] . '">Connect</span>
                    </form>';
            }
            if ($values['current_status'] == '2') {
                $data .= '<span class="badge badge-light-yellow">Processing</span>';
            }
            if ($values['current_status'] == '3') {

                $data .= '<span class="rohit badge badge-light-success"  data-id="' . $values['test_id'] . '">Connected</span>';
            }
            $data .= '</div>';

            $data .= '<div class="col-md-1 pt-2">
                     <div class="dropdown">

                                 <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                 </button>

                        <div class="dropdown-menu dropdown-menu-end">     
                          <a class="dropdown-item d-flex align-items-center" data-id="' . $values['test_id'] . '"
                            data-boundary="' . $values['boundary_id'] . '"
                            data-boardtype="' . $values['board_type'] . '"
                            data-subboundary="' . $values['subboundary_id'] . '"
                            data-subsite="' . $values['sub_site'] . '"
                            data-provider="' . $values['provider_type'] . '"
                            data-username="' . $values['username'] . '"
                            data-password="' . $values['password'] . '"
                            data-knno="' . $values['kn_no'] . '"
                            data-consumerno="' . $values['consumer_no'] . '"
                            data-accountno="' . $values['account_no'] . '"
                            data-mobileno="' . $values['mobile_no'] . '"
                            data-serviceno="' . $values['service_no'] . '"
                            data-cano="' . $values['ca_no'] . '"
                            data-holdername="' . $values['conHolderName'] . '"
                            data-pdf="' . $values['consent_form_file'] . '"
                            onclick="editmodel(this);"><i data-feather="edit-2" class="me-50"></i><span>Update</span></a><a class="dropdown-item d-flex align-items-center" data-id="' . $values['test_id'] . '" onclick="electricity_delete(' . $values['test_id'] . ')" href="#"><i data-feather="trash-2" class="me-50"></i><span>Delete</span></a></div></div></div>';

            $data .= '</div></div></div></div></div></div></section>';
            //         break;
            //     }
            // }
        }

        // print_r($data);
        echo $data;
    }

    public function search($id)
    {
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');


        print_r($id);
    }

    public function boundary_subBoundary($boundary)
    {

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');



        if ($boundary == 30) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12 and is_submit=1");
            $indicator = $query->getResultArray();

            // print_r($indicator);
            //  die();           

            // if($indicator) {

            //      foreach($indicator as $indi) {

            //          $data.='<option value="'.$indi['id'].'/30">'.$indi['cp_name'].'</option>';

            //      }

            //  }

        }

        if ($boundary == 31) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11 and is_submit=1");

            $indicator = $query->getResultArray();
            // print_r($indicator);
            //             die();  
            // if($indicator) {

            //      foreach($indicator as $indi) {

            //          $data.='<option value="'.$indi['id'].'/31">'.$indi['cp_name'].'</option>';

            //      }

            //  }

        }
        if ($boundary == 43) {

            $query = $db->query("select id,name from supplier_type where supplier_id='" . $supplier_info['supplier_id'] . "' and status=1");


            $indicator = $query->getResultArray();
            // print_r($indicator);
            // die();           

            // if($indicator) {

            //      foreach($indicator as $indi) {

            //          $data.='<option value="'.$indi['id'].'/43">'.$indi['name'].'</option>';

            //      }

            //  }

        }


        return $this->response->setJSON(true);
    }

    public function auto_design()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];


        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



        $sup_mod_item_relation =
            $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];

        $supplier_mod_item = [];


        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }


        $data['supplier_mod'] = new SupplierModel();


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $ghg = new GhgModel();

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

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        // $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1");

        $data['boundary_item'] = $query->getResultArray();

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();

        $data['ghg'] = $ghg->findAll();

        $data['supplier'] = $supplier_model->where('owner_id', $o_id)->orwhere('id', $o_id)->findAll();

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = session()->supplier_info['role'];
        }
        $data['pg_nm'] = 'sensor';
        $data['roleAllow'] =
            $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();

        // print_r($data['control_footprints']);
        // print_r($data['ghg']); die();
        $find = $db->query("SELECT * from control_footprints where status = 1 and owner_id = $o_id")->getResultArray();

        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                // print_r($day);die();
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_footprints SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                    //    print_r("ok");die();
                }
            }
        }
        $ghg_factor = $db->query("SELECT * FROM `ghg_factor` where status=1")->getResultArray();
        $g_name = $db->query("SELECT * FROM `group_name` WHERE status = 1")->getResultArray();
        $ghg_factor_count = $db->query("SELECT count(*) FROM `ghg_factor` where status=1")->getResultArray();
        $g_name_count = $db->query("SELECT COUNT(id) FROM `group_name` WHERE status = 1")->getResultArray();
        $g_name_array = [];
        foreach ($g_name as $value) {
            array_push($g_name_array, $value['group_id']);
        }
        $ghg_factor_model = new GhgFactorModel();
        $all_ghg_factor = $ghg_factor_model->select('id')->whereIn('group_id', $g_name_array)->where('status', 1)->findAll();
        $g_name_implode = implode('","', $g_name_array);
        // print_r($g_name_implode);die();
        $query = $db->query("SELECT * FROM `control_footprints` WHERE owner_id = $o_id")->getResultArray();
        $total_footprint = 0;
        $total_panding = 0;
        $success = 0;
        foreach ($query as $row) {

            // $ok = $total_panding += number_format($row['complete']/2);
            // if($ok){
            //     $find = new QualitativeTimelineAnswerModel();
            //     $need = $find->where('control_assessment_id',$row['id'])->findAll();
            //     foreach($need as $nd){
            //         if($nd['percentile'] >= 50){
            //             $success++;
            //         }
            //     }
            // }

            if ($row['frequency'] == 'Monthly') {
                $total_footprint += 12;
            } elseif ($row['frequency'] == 'Quarterly') {
                $total_footprint += 4;
            } elseif ($row['frequency'] == 'Half yearly') {
                $total_footprint += 2;
            } elseif ($row['frequency'] == 'Yearly') {
                $total_footprint += 1;
            } else {
                $total_footprint += 1;
            }
            // print_r($total_footprint);
        }
        $data['total_footprint'] = $total_footprint;

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        // print_r($data['boundary_item']);
        // die();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();

        $data['site_id']  = $db->query("SELECT * FROM supplier_assessment WHERE is_submit=1 And  (supplier_id = $u_id or owner_id = $o_id)")->getResultArray();

        $model = new SupplierType();

        $data['supplier_id'] = $model->where('supplier_id', $u_id)->where('status', 1)->findAll();


        $query =
            $db->query("SELECT id,boundary_id,subboundary_id,board_type,provider_type,current_status,timestamp_date,abbrevation FROM sensors where (owner_id = $o_id or supplier_id = $u_id) and status=1");

        $data['item'] = $query->getResultArray();

        $query = $db->query("select id,name_discom,state from electricity_board");
        $data['electricity_board'] = $query->getResultArray();

        $data['sensor'] = '0';
        $currentTime11 = strtotime('now');
        $currentTime111 = date('m/d/Y H', $currentTime11);
        if ($currentTime111) {
            $currentTime2 = $currentTime111 . ':30:00';
        }

        $data['weather_ap']  = $db->query("SELECT * FROM Weather WHERE STATUS=1  And timestampRoh >='" . $currentTime2 . "'And (supplier_id = $u_id or owner_id = $o_id) GROUP by city_name")->getResultArray();
        // echo $db->getLastQuery($data['weather_ap']);  
        // die();
        echo view('brand/Demo_automation_design', $data);
    }

    public function new($id)
    {
        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';

        $model = new Data_electricityModel();


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();


        $sup_mod_item_relation =
            $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];

        $supplier_mod_item = [];


        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }


        $data['supplier_mod'] = new SupplierModel();


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];
        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $ghg = new GhgModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $data['u_id'] = $u_id;
        $data['o_id'] = $o_id;
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
        $data['sensor_id'] = $id;
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        // $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name,cp_address from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();

        $sensor = new SensorModel();
        $Dataelectricity = new Data_electricityModel();

        // $data['join_model'] = $sensor->select('*')->join('data_electricity','sensors.id = data_electricity.electricity_id')->where('sensors.supplier_id',$u_id)->orwhere('sensors.owner_id',$o_id)->where('sensors.status',1)->where('data_electricity.electricity_id',$id)->findAll();

        $data['join_model'] = 
        $Dataelectricity->where('electricity_id', $id)->where('status', 1)->orderBy('YEAR(bill_date)', 'DESC')->orderBy('MONTH(bill_date)', 'DESC')->findAll();



        // print_r($data['join_model']);
        // die();


        $Automotion_alert = new Automotion_alert();
        $data['Demand_load'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'Demand_load')->findAll();

        $data['consume_unit'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'consume_unit')->findAll();
        // print_r($data['edit']);
        // die();

        $data['senstion'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'senstion')->findAll();
        $data['power_load'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'power_load')->findAll();

        $data['data_fetch'] = $model->where('status', 1)->where('electricity_id', $id)->findAll();

        $first = '2023';
        $second = '2024';

        $electricity_data_fetch =
            $Dataelectricity->where('electricity_id', $id)->where('YEAR(bill_date)', $first)->where('MONTH(bill_date) >', 3)->where('status', 1)->orwhere('YEAR(bill_date)', $second)->where('electricity_id', $id)->where('MONTH(bill_date) <', 3)->where('status', 1)->findAll();

        // print_r($electricity_data_fetch);
        // die();
        $month_names = array("3" => "April", "4" => "May", "5" => "June", "6" => "July", "7" => "August", "8" => "September", "9" => "October", "10" => "November", "11" => "December", "0" => "January", "1" => "February", "2" => "March");
        $month_namesdd = array("April", "May", "June", "July", "August", "September", "October", "November", "December", "January", "February", "March");


        $month_name_show = array();
        $arr = 0;





        $sum = array();
        $power_ii = array();
        $senstion_ii = array();
        $demeand_ii = array();

        foreach ($electricity_data_fetch as $elec_data) {

            $intdate =  json_decode($elec_data['monthly_name']);
            $frequency =  $elec_data['frequency'];
            $power_load =  json_decode($elec_data['power_load']);
            $senstion =  json_decode($elec_data['senstion']);
            $demand =  json_decode($elec_data['demand_load']);
            $consume =  json_decode($elec_data['consume_unit']);
            // print_r($intdate);
            $l = $consume / $frequency;
            $power_value = $power_load;
            $senstion_value = $senstion;
            $demand_value = $demand;
            // print_r($l);

            foreach ($intdate as $key => $value) {

                if (!isset($sum[$value])) {

                    $sum[$value] += $l;
                    $power_ii[$value] += $power_value;
                    $senstion_ii[$value] += $senstion_value;
                    $demeand_ii[$value] += $demand_value;
                    $month_name_show[] = $value;
                    $month_name_show[$arr++];
                } else {
                    $sum[$value] += $l;
                    $power_ii[$value] += $power_value;

                    $senstion_ii[$value] += $senstion_value;
                    $demeand_ii[$value] += $demand_value;
                    $month_name_show[] = $value;
                    $month_name_show[$arr++];
                }
            }
        }






        $sumg = array();

        foreach ($month_name_show as $key => $id_month) {

            foreach ($sum as $key4 => $tota) {
                if ($key4 == $id_month) {

                    foreach ($month_names as $key1 => $data_month) {

                        $index = $key1 + 1;

                        if ($id_month == $index) {
                            $month_name_data[] = $data_month;
                            $totagfg[] = $tota;
                        }
                    }
                }
            }
        }

        // print_r($month_name_data);
        // print_r($totagfg);



        $month_name_value = $month_name_data;
        // $data['power_factor_data'] = json_encode($power_fac_value);

        // $rohit=[];
        // print_r($sum);
        foreach ($month_names as $key => $leap) {
            if (in_array($leap, $month_name_value)) {
                //  print_r($month_name_value);
                // echo $leap;
                // echo $sum[$key];
                $rohit[] = round($sum[$key + 1], 2);
                $power_factor[] = $power_ii[$key + 1];
                $santion_load[] = round($senstion_ii[$key + 1], 2);
                $demand_load[] = round($demeand_ii[$key + 1], 2);

                //  $rohit[]='0';
                // $power_factor[]='0';
                // $santion_load[]='0';
                // $demand_load[]='0';
            } else {
                $rohit[] = '0';
                $power_factor[] = '0';
                $santion_load[] = '0';
                $demand_load[] = '0';
            }
        }




        $data['power_factor_value'] =  json_encode($power_factor);
        $data['santion_load_value'] =  json_encode($santion_load);
        $data['demand_load_value']  =   json_encode($demand_load);
        $data['consume_unit_value'] =  json_encode($rohit);


        $mnt_name = array();
        $consumem_unit = array();
        $consume_unit = array();

        $sanc_consumem_unit = array();
        $sanc_consumem_unist = array();

        $deam_consumem_unit = array();
        $dem_consumem_unist = array();

        $power_consumem_unit = array();
        $powers_consumem_unist = array();




        foreach ($data['data_fetch'] as $mn) {
            $monthff = json_decode($mn['monthly_name']);
            foreach ($monthff as $month) {
                if (in_array($month, $month_names)) {
                    array_push($mnt_name, $month);
                    array_push($consumem_unit, $mn['consume_unit']);
                    array_push($sanc_consumem_unit, $mn['senstion']);
                    array_push($deam_consumem_unit, $mn['demand_load']);
                    array_push($power_consumem_unit, $mn['power_load']);
                }
            }
        }

        $h = count($consumem_unit);

        $k = 0;
        foreach ($month_names as $key => $msn) {

            if (in_array($msn, $mnt_name)) {

                if ($k < $h) {
                    array_push($consume_unit, $consumem_unit[$k]);
                    array_push($sanc_consumem_unist, $sanc_consumem_unit[$k]);
                    array_push($dem_consumem_unist, $deam_consumem_unit[$k]);
                    array_push($powers_consumem_unist, $power_consumem_unit[$k]);
                    $k++;
                }
            } else {
                array_push($sanc_consumem_unist, 0);
                array_push($dem_consumem_unist, 0);
                array_push($powers_consumem_unist, 0);
                array_push($consume_unit, 0);
            }
        }


        $data['data_max'] = max($consume_unit);
        $data['data_min'] = min($consume_unit);
        $data['data_show'] = json_encode($consume_unit);
        $data['data_indicate'] = json_encode($month_namesdd);

        $data['data_show_san'] = json_encode($sanc_consumem_unist);
        $data['data_max_san'] = max($sanc_consumem_unist);
        $data['data_min_dem'] = min($dem_consumem_unist);
        $data['data_show_dem'] = json_encode($dem_consumem_unist);
        $data['data_show_power'] = json_encode($powers_consumem_unist);

        $data['id'] = $id;

        // print_r($data['data_show_power']);
        // die();
        $id = session()->supplier_info['supplier_id'];
        $data['assign'] = $supplier_model->where('owner_id', $id)->findAll();
        $query = $db->query("select * from electricity_board where status=1");
        $data['electricity_board'] = $query->getResultArray();
        $data['financial_year'] = '2023-2024';


        echo view('brand/view_awaited', $data);
    }

    public function financial($id)
    {
        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';

        $model = new Data_electricityModel();


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();


        $sup_mod_item_relation =
            $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
        $supplier_mod = [];

        $supplier_mod_item = [];


        if ($sup_mod_item_relation) {
            foreach ($sup_mod_item_relation as $smir) {

                $supplier_mod[] = $smir["supplier_module_id"];

                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }


        $data['supplier_mod'] = new SupplierModel();


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_id = $supplier_info['supplier_id'];
        $supplier_model = new SupplierModel();

        $supplier_module_model = new SupplierModuleModel();

        $supplier_module_item_model = new SupplierModuleItemModel();

        $ghg = new GhgModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

        $supplier_plan_id = $rs['supplier_plan_id'];

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }

        $data['u_id'] = $u_id;
        $data['o_id'] = $o_id;
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
        $data['sensor_id'] = $id;
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

        // $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name,cp_address from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();

        $sensor = new SensorModel();
        $Dataelectricity = new Data_electricityModel();

        // $data['join_model'] = $sensor->select('*')->join('data_electricity','sensors.id = data_electricity.electricity_id')->where('sensors.supplier_id',$u_id)->orwhere('sensors.owner_id',$o_id)->where('sensors.status',1)->where('data_electricity.electricity_id',$id)->findAll();

        $data['join_model'] = $Dataelectricity->where('electricity_id', $id)->where('status', 1)->orderBy('MONTH(bill_date)', 'DESC')->findAll();



        // print_r($data['join_model']);
        // die();


        $Automotion_alert = new Automotion_alert();
        $data['Demand_load'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'Demand_load')->findAll();

        $data['consume_unit'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'consume_unit')->findAll();
        // print_r($data['edit']);
        // die();

        $data['senstion'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'senstion')->findAll();
        $data['power_load'] = $Automotion_alert->where('automotion_id', $id)->where('supplier_id', $supplier_id)->where('name', 'power_load')->findAll();

        $data['data_fetch'] = $model->where('status', 1)->where('electricity_id', $id)->findAll();
        $financial_year =  $this->request->getVar('finacial_year');
        $data['financial_year'] =  $this->request->getVar('finacial_year');
        $year = explode("-", $financial_year);

        $first = $year[0];
        $second = $year[1];


        $electricity_data_fetch =
            $Dataelectricity->where('electricity_id', $id)->where('YEAR(bill_date)', $first)->where('MONTH(bill_date) >', 3)->where('status', 1)->orwhere('YEAR(bill_date)', $second)->where('electricity_id', $id)->where('MONTH(bill_date) <', 3)->where('status', 1)->findAll();





        // $month_namesss = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $month_names = array("3" => "April", "4" => "May", "5" => "June", "6" => "July", "7" => "August", "8" => "September", "9" => "October", "10" => "November", "11" => "December", "0" => "January", "1" => "February", "2" => "March");

        $month_namesdd = array("April", "May", "June", "July", "August", "September", "October", "November", "December", "January", "February", "March");
        $month_name_show = array();
        $arr = 0;



        if (!$electricity_data_fetch) {

            $session->setFlashdata('financial', 'Data Not Found');

            return redirect()->to('new_page/' . $id);
        }
        // print_r($month_namesd);
        // die();



        $sum = array();
        $power_ii = array();
        $senstion_ii = array();
        $demeand_ii = array();

        foreach ($electricity_data_fetch as $elec_data) {

            $intdate =  json_decode($elec_data['monthly_name']);
            // print_r($intdate);
            $frequency =  $elec_data['frequency'];
            $power_load =  json_decode($elec_data['power_load']);
            $senstion =  json_decode($elec_data['senstion']);
            $demand =  json_decode($elec_data['demand_load']);
            $consume =  json_decode($elec_data['consume_unit']);
            // print_r($intdate);
            $l = $consume / $frequency;
            $power_value = $power_load / $frequency;
            $senstion_value = $senstion / $frequency;
            $demand_value = $demand / $frequency;
            // print_r($l);

            foreach ($intdate as $key => $value) {

                if (!isset($sum[$value])) {

                    $sum[$value] += $l;
                    $power_ii[$value] += $power_value;
                    $senstion_ii[$value] += $senstion_value;
                    $demeand_ii[$value] += $demand_value;
                    $month_name_show[] = $value;
                    $month_name_show[$arr++];
                } else {
                    $sum[$value] += $l;
                    $power_ii[$value] += $power_value;

                    $senstion_ii[$value] += $senstion_value;
                    $demeand_ii[$value] += $demand_value;
                    $month_name_show[] = $value;
                    $month_name_show[$arr++];
                }
            }
        }
        //   print_r($month_name_show); 
        // die();





        $sumg = array();

        foreach ($month_name_show as $key => $id_month) {

            foreach ($sum as $key4 => $tota) {
                if ($key4 == $id_month) {

                    foreach ($month_names as $key1 => $data_month) {

                        $index = $key1 + 1;

                        if ($id_month == $index) {
                            $month_name_data[] = $data_month;
                            $totagfg[] = $tota;
                        }
                    }
                }
            }
        }

        // print_r($month_name_data);
        // die();
        // print_r($totagfg);



        $month_name_value = $month_name_data;
        // $data['power_factor_data'] = json_encode($power_fac_value);

        foreach ($month_names as $key => $leap) {
            if (in_array($leap, $month_name_value)) {
                //  print_r($month_name_value);
                // echo $leap;
                // echo $sum[$key];
                $rohit[] = round($sum[$key + 1], 2);
                $power_factor[] = $power_ii[$key + 1];
                $santion_load[] = round($senstion_ii[$key + 1], 2);
                $demand_load[] = round($demeand_ii[$key + 1], 2);
            } else {
                $rohit[] = '0';
                $power_factor[] = '0';
                $santion_load[] = '0';
                $demand_load[] = '0';
            }
        }

        // print_r($power_factor);
        // print_r($santion_load);
        // print_r($demand_load);
        // die();


        $data['power_factor_value'] =  json_encode($power_factor);
        $data['santion_load_value'] =  json_encode($santion_load);
        $data['demand_load_value']  =   json_encode($demand_load);
        $data['consume_unit_value'] =  json_encode($rohit);


        $mnt_name = array();
        $consumem_unit = array();
        $consume_unit = array();

        $sanc_consumem_unit = array();
        $sanc_consumem_unist = array();

        $deam_consumem_unit = array();
        $dem_consumem_unist = array();

        $power_consumem_unit = array();
        $powers_consumem_unist = array();




        foreach ($data['data_fetch'] as $mn) {
            $monthff = json_decode($mn['monthly_name']);
            foreach ($monthff as $month) {
                if (in_array($month, $month_names)) {
                    array_push($mnt_name, $month);
                    array_push($consumem_unit, $mn['consume_unit']);
                    array_push($sanc_consumem_unit, $mn['senstion']);
                    array_push($deam_consumem_unit, $mn['demand_load']);
                    array_push($power_consumem_unit, $mn['power_load']);
                }
            }
        }

        $h = count($consumem_unit);

        $k = 0;
        foreach ($month_names as $key => $msn) {

            if (in_array($msn, $mnt_name)) {

                if ($k < $h) {
                    array_push($consume_unit, $consumem_unit[$k]);
                    array_push($sanc_consumem_unist, $sanc_consumem_unit[$k]);
                    array_push($dem_consumem_unist, $deam_consumem_unit[$k]);
                    array_push($powers_consumem_unist, $power_consumem_unit[$k]);
                    $k++;
                }
            } else {
                array_push($sanc_consumem_unist, 0);
                array_push($dem_consumem_unist, 0);
                array_push($powers_consumem_unist, 0);
                array_push($consume_unit, 0);
            }
        }


        $data['data_max'] = max($consume_unit);
        $data['data_min'] = min($consume_unit);
        $data['data_show'] = json_encode($consume_unit);
        $data['data_indicate'] = json_encode($month_namesdd);

        $data['data_show_san'] = json_encode($sanc_consumem_unist);
        $data['data_max_san'] = max($sanc_consumem_unist);
        $data['data_min_dem'] = min($dem_consumem_unist);
        $data['data_show_dem'] = json_encode($dem_consumem_unist);
        $data['data_show_power'] = json_encode($powers_consumem_unist);

        $data['id'] = $id;

        // print_r($data['data_show_power']);
        // die();
        $id = session()->supplier_info['supplier_id'];
        $data['assign'] = $supplier_model->where('owner_id', $id)->findAll();
        $query = $db->query("select * from electricity_board where status=1");
        $data['electricity_board'] = $query->getResultArray();

        //  print_r($data['sub_boundary_item']);
        //  die();
        echo view('brand/view_awaited', $data);
    }



    public function indexx()
    {

        $db = \Config\Database::connect();
        $data = $this->helperData;

        $standard_model = new StandardModel();

        $data['standard'] = $standard_model->where('status', 1)->findAll();
        // company_vehicle_detail
        $data['list'] = $db->query("select cvd.*,v.vehicle_name,gf.name,f.factor_name from api_company_vehicle_detail as cvd left join vehicle as v on cvd.vehicle=v.id left join ghg_factor as gf on gf.id=cvd.ghg_factor_id left join factor as f on gf.name=f.id where cvd.status=1")->getResultArray();
        // print_r($data['list']);
        // die();
        // // status removed start
        // $data['vehicle'] = $db->query("select * from vehicle where status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        $data['vehicle'] = $db->query("select * from vehicle where status=0||status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        // status removed end

        $data['ghg_factor'] = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on gf.name=f.id where gf.ghg_id=19")->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();
        // print_r($data['boundary_item']);
        // die();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,boundary_id,subboundary_id,board_type,provider_type from sensors where status=1");
        $data['item'] = $query->getResultArray();

        $query = $db->query("select id,name_discom,state,type,uniq_id from electricity_board");
        $data['electricity_board'] = $query->getResultArray();
        $query = $db->query("select id,name from states");
        $data['state'] = $query->getResultArray();
        echo view('admin/view-sensordata', $data);
    }

    public function adminsensoradd()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');


        $state = $this->request->getVar('state');
        $type = $this->request->getVar('type');
        $provider = $this->request->getVar('provider');
        $username = $this->request->getVar('username[]');
        // print_r($username);
        // die();
        $a = $username;

        // print_r($a);
        // die();
        $random_keys = array_rand($a, 2);
        $u = $a[$random_keys[0]];
        $y = $a[$random_keys[1]];
        $bbb = $u . '' . $y;

        $model = new ElectricityModel();


        $data = [
            'name_discom' => $provider,
            'state' => $state,
            'type' => $type,
            'uniq_id' => $bbb,
        ];

        $insert = $model->insert($data);
        if ($insert) {

            $session->setFlashdata('success', 'Sensor has been saved successfully');
        } else {

            $session->setFlashdata('error', ' Not Save');
        }

        return redirect()->back();
    }


    public function adminsensoredit()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $id = $this->request->getVar('id');
        $state = $this->request->getVar('state');
        $type = $this->request->getVar('type');
        $provider = $this->request->getVar('provider');
        $username = $this->request->getVar('username[]');
        // print_r($username);
        // die();
        $a = $username;

        // print_r($a);
        // die();
        $random_keys = array_rand($a, 2);
        $u = $a[$random_keys[0]];
        $y = $a[$random_keys[1]];
        $bbb = $u . '' . $y;

        $model = new ElectricityModel();


        $data = [
            'name_discom' => $provider,
            'state' => $state,
            'type' => $type,
            'uniq_id' => $bbb,
        ];

        $insert = $model->update($id, $data);
        if ($insert) {

            $session->setFlashdata('success', 'Sensor has been Update successfully');
        } else {

            $session->setFlashdata('error', ' Not Save');
        }

        return redirect()->back();
    }
    public function Rapid_api()
    {


        // $from = $this->request->getVar("trip_from");
        $from = "Indore, Madhya Pradesh, India";


        $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

        $formattedAddrFrom    = str_replace(' ', '+', $from);


        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);


        $outputFrom = json_decode($geocodeFrom);

        $weatherData = [];



        if (!empty($outputFrom->error_message)) {



            return $outputFrom->error_message;
        }


        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;

        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://aerisweather1.p.rapidapi.com/forecasts/" . $from . "?plimit=12&filter=1hr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: aerisweather1.p.rapidapi.com",
                "X-RapidAPI-Key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"
            ],
        ]);

        $responsese = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $responsese;
            $rs = json_decode($responsese);

            $temp_arr = [];
            $rs1 = $rs->response[0];
            // print_r($rs1);
            // die();


            foreach ($rs1->periods as $itm) {



                $arr = [];

                $arr['maxTempC'] = $itm->maxTempC;

                $arr['minTempC'] = $itm->minTempC;

                $arr['tempC'] = $itm->tempC;

                $arr['humidity'] = $itm->humidity;

                $arr['windDir'] = $itm->windDir;

                $arr['windSpeedKPH'] = $itm->windSpeedKPH;

                $arr['weather'] = $itm->weather;

                $arr['windGust80mKPH'] = $itm->windGust80mKPH;

                $arr['windDir80m'] = $itm->windDir80m;

                $arr['timestampRoh'] = $itm->timestamp;



                $temp_arr[] = $arr;
            }

            $weatherData['weather'] = $temp_arr;
        }
        print_r($weatherData);
        echo json_encode($weatherData);
        die();
    }




    public function createSensor()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $supplier_model = $supplier_info['supplier_id'];
        // $owner_id = $supplier_info['supplier_id'];

        $id = $this->request->getVar('type_board');
        $sensor = $this->request->getVar('sub_boundary');

        $input = $this->validate([
            'consent_form' => 'uploaded[consent_form]|max_size[consent_form,2048]|ext_in[consent_form,pdf],'
        ]);

        $pdfFile =  $this->request->getFile('consent_form');
        if ($input) {
            if ($pdfFile->isValid() && !$pdfFile->hasMoved()) {


                $newNameD = $pdfFile->getRandomName();
                $pdfFile->move('public/consent_form', $newNameD);
            }
        } else {

            $session->setFlashdata('error', 'Please Upload Pdf file');
            return redirect()->back();
        }

        if ($id == 'Sensor') {




            $rs = check_session();

            if (!$rs) {

                return redirect()->to('home/user_login');
            }

            $data['pg_nm'] = 'Dashboard';


            $db = \Config\Database::connect();

            $session = session();

            $supplier_info = $session->get('supplier_info');

            $supplier_model = new SupplierModel();

            $supplier_module_model = new SupplierModuleModel();

            $supplier_module_item_model = new SupplierModuleItemModel();

            $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();

            $supplier_plan_id = $rs['supplier_plan_id'];


            $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



            $sup_mod_item_relation =
                $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();
            $supplier_mod = [];

            $supplier_mod_item = [];


            if ($sup_mod_item_relation) {
                foreach ($sup_mod_item_relation as $smir) {

                    $supplier_mod[] = $smir["supplier_module_id"];

                    $supplier_mod_item[] = $smir["supplier_module_item_id"];
                }
            }


            $data['supplier_mod'] = new SupplierModel();

            $rs = check_session();

            if (!$rs) {

                return redirect()->to('home/user_login');
            }

            $data['pg_nm'] = '';


            $db = \Config\Database::connect();

            $session = session();

            $supplier_info = $session->get('supplier_info');

            foreach ($supplier_info as $supplier) {
            }


            // print_r($supplier_info);
            // die();

            $supplier_model = new SupplierModel();

            $supplier_module_model = new SupplierModuleModel();

            $supplier_module_item_model = new SupplierModuleItemModel();

            $ghg = new GhgModel();

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

            $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");

            $data['employee_details'] = $query->getResultArray();

            $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");

            // $data['ghg_name'] = $query->getResultArray();

            $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");



            $data['boundary_item'] = $query->getResultArray();

            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
            } elseif (session()->supplier_info['role'] == 10) {
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $ok = $supplier_model->where('id', $sid)->first();
                $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
                $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
            } else {
                $sid = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $ok = $supplier_model->where('id', $sid)->first();
                $o_id = $ok['owner_id'];
                $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
                if (session()->supplier_info['role'] == 11) {
                    $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                    $data['employee_details'] = $query->getResultArray();
                } else {
                    $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                    $data['employee_details'] = $query->getResultArray();
                }
            }


            $brand = new BrandModel();
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            if (session()->supplier_info['role'] == 0) {
                $role = 10;
            } else {
                $role = $ok['role'];
                // print_r($role);
                // die();
            }
            if (session()->supplier_info['role'] == 10) {
                $role = 10;
            }
            $o['supplier_id'] = $ok['supplier_plan_id'];
            // print_r($o['supplier_id']);
            // die();
            $dat = $brand->where('brand_id', 58)->where('role_id', $role)->where('plan_id', $o['supplier_id'])->first();


            if ($dat) {
                $data['add'] =  $dat['add'];
                $data['view'] =  $dat['view'];
                $data['edit'] =  $dat['edit'];
                $data['delete'] = $dat['delete'];
            } else {

                $data['add']    = '0';
                $data['view']   = '0';
                $data['edit']   = '0';
                $data['delete'] = '0';
            }

            $v = $this->request->getVar('api');

            if (empty($v)) {

                $boundary = $this->request->getVar('boundary');
                if ($boundary == '30') {
                    $city_namefake = explode("/", $this->request->getVar('sub_boundary'));
                    $city_name = $city_namefake[0];
                    $query = $db->query("SELECT * FROM `supplier_assessment` WHERE id=$city_name");
                    $city = $query->getResultArray();

                    foreach ($city as $key => $value) {
                        $value['cp_address'];
                    }

                    $v = $value['cp_address'];
                    //  print_r($v);
                    // die();
                    $site_id = $value['id'];
                }

                if ($boundary == '43') {

                    $idFake = explode("/", $this->request->getVar('sub_boundary'));
                    $id = $idFake[0];
                    $query = $db->query("SELECT * FROM `supplier_type` WHERE id=$id");
                    $city = $query->getResultArray();
                    foreach ($city as $key => $value) {
                        $value['supplier_address'];
                    }

                    $v = $value['supplier_address'];

                    $site_id = $value['id'];
                }
            } else {

                $v = $this->request->getVar('api');
                $site_id = '';
            }


            $county_model = new CountryModel();

            $state_model = new StateModel();

            // Google API key

            $apiKey = 'AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU';

            // Change address format
            $latitude = $this->request->getVar('latitude');
            $longitude = $this->request->getVar('longitude');


            $geocode = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude . '&sensor=false&key=' . $apiKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $geocode);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($response);
            $dataarray = get_object_vars($output);

            if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
                if (isset($dataarray['results'][0]->formatted_address)) {

                    $v = $dataarray['results'][0]->formatted_address;
                } else {
                    $v = 'Not Found';
                }
            } else {
                $v = 'Not Found';
            }

            // send http request


            $formattedAddrFrom    = str_replace(' ', '+', $v);

            // Geocoding API request with start address

            $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);

            $outputFrom = json_decode($geocodeFrom);



            if (!empty($outputFrom->error_message)) {

                return $outputFrom->error_message;
            }

            $addresscomponent    = $outputFrom->results[0]->address_components;
            // print_r($addresscomponent);
            // die();
            foreach ($addresscomponent as $key => $addCompVal) {

                if ($addCompVal->types[0] == 'postal_code') {

                    $pincode = $addCompVal->long_name;
                }
                if ($addCompVal->types[0] == 'country') {

                    $country = $addCompVal->long_name;

                    $query = $county_model->where('name', $country)->where('status', 1)->first();

                    $country_id = $query['id'];
                }
                if ($addCompVal->types[0] == 'administrative_area_level_1') {

                    $state = $addCompVal->long_name;

                    $query = $state_model->where('name', $state)->where('status', 0)->first();

                    $state_id = $query['id'];
                }
                if ($addCompVal->types[0] == 'locality') {

                    $city = $addCompVal->long_name;
                }
            }
            $from = $city . ',' . $state . ',' . $country;
            // print_r($from);
            // die();

            // $from = "Indore, Madhya Pradesh, India";
            // $from = $v;



            $weatherData = [];







            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://aerisweather1.p.rapidapi.com/forecasts/" . $from . "?plimit=24&filter=1hr",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: aerisweather1.p.rapidapi.com",
                    "X-RapidAPI-Key: a00dceed3bmsh70d45e890db4326p1430b7jsn8bb0037b147c"
                ],
            ]);

            $responsese = curl_exec($curl);
            $err = curl_error($curl);
            // print_r($err);
            // die();
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // echo $responsese;
                $rs = json_decode($responsese);

                $temp_arr = [];



                $rs1 = $rs->response[0];
                $long = $rs1->loc->long;
                $lat = $rs1->loc->lat;
                // print_r($long);
                // print_r($lat);
                //  die();
                if ($rs1) {


                    foreach ($rs1->periods as $itm) {

                        $arr = [];

                        $arr['maxTempC'] = $itm->maxTempC;

                        $arr['minTempC'] = $itm->minTempC;

                        $arr['tempC'] = $itm->tempC;

                        $arr['humidity'] = $itm->humidity;

                        $arr['windDir'] = $itm->windDir;

                        $arr['windSpeedKPH'] = $itm->windSpeedKPH;

                        $arr['weather'] = $itm->weather;

                        $arr['windGust80mKPH'] = $itm->windGust80mKPH;

                        $arr['windDir80m'] = $itm->windDir80m;

                        $arr['timestampRoh'] = $itm->timestamp;

                        $temp_arr[] = $arr;
                    }





                    // echo json_encode($weatherData);


                    $weather = new Weather();

                    foreach ($temp_arr as $tarunrohit) {

                        $timestampRoh =  date('m/d/Y H:i:s', $tarunrohit['timestampRoh']);
                        $timestamp_date =  date('m/d/Y', $tarunrohit['timestampRoh']);

                        $insert = [
                            'supplier_id' => $u_id,
                            'owner_id' => $o_id,
                            'site_id' => $site_id,
                            'city_name' => $from,
                            'description' => $tarunrohit['weather'],
                            'temp' => $tarunrohit['tempC'],
                            'temp_min' => $tarunrohit['minTempC'],
                            'temp_max' => $tarunrohit['maxTempC'],
                            'humidity' => $tarunrohit['humidity'],
                            'wind' => $tarunrohit['windSpeedKPH'],
                            'windDir' => $tarunrohit['windDir'],
                            'timestampRoh' => $timestampRoh,
                            'windDir80m' => $tarunrohit['windDir80m'],
                            'wind_gust' => $tarunrohit['windGust80mKPH'],
                            'sunrise' => "rise",
                            'sunset' => 'nset',
                            'boundary_id' => $boundary,
                            'long' => $long,
                            'lat' => $lat,
                            'timestamp_date' => $timestamp_date,

                        ];

                        // print_r($insert);
                        // die();
                        $insert = $weather->insert($insert);
                    }
                } else {
                    $session->setFlashdata('error', 'The requested location was not found.');
                }
            }
            //  echo "end";
            //  die();
            $currentTime = time();
            date_default_timezone_set("Asia/Calcutta");
            $weather_alert = new Weather_alert_model();
            // $data['weather_api'] = $db->query("select * from Weather" )->getResultArray();
            $model = new Weather();
            $data['weather_api'] = $model->where('supplier_id', $u_id)->where('owner_id', $o_id)->findAll();
            $data['alert_noti'] = $weather_alert->where('status', 1)->where('supplier_id', $u_id)->findAll();
            return redirect()->to('automotion');
            // echo view('brand/automotion',$data);



            $data['pg_nm'] = 'Dashboard';


            $db = \Config\Database::connect();
            $session = session();

            $supplier_info = $session->get('supplier_info');
            $supplier_model = new SupplierModel();
            $supplier_id = $supplier_info['supplier_id'];

            $supplier_module_model = new SupplierModuleModel();
            $supplier_module_item_model = new SupplierModuleItemModel();
            $ghg = new GhgModel();

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

            $data['site_name'] =
                $db->query("SELECT * from supplier_assessment where (is_submit = 0 Or is_submit = 1) and (supplier_id=$supplier_id Or owner_id=$supplier_id)")->getResultArray();

            $data['sensor'] = $this->request->getVar('sub_boundary');

            echo view('brand/weather_api', $data);

            // die();
        }



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
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'   and status=1  and ( assigned_to = $sid or supplier_id = $sid )")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }

        $sensor = new SensorModel();

$l = $sensor->where('status',1)->where('supplier_id',$u_id)->findAll();
          foreach($l as $skf){

          }
    $test_id  = $skf['id']+1;
     
        $same_site =
            $sensor->where('supplier_id', $u_id)->where('boundary_id', $this->request->getVar('boundary'))->where('subboundary_id', $this->request->getVar('sub_boundary'))->where('status', 1)->where('sub_site', $this->request->getVar('sub_site'))->findAll();
        if ($same_site) {

            $session->setFlashdata('error', 'Site Already saved');
            return redirect()->back();
        }
        $boundary = $this->request->getVar('boundary');
        $sub_boundary = $this->request->getVar('sub_boundary');
        $type_board = $this->request->getVar('type_board');
        $provider = $this->request->getVar('name_discom');
        // print_r($provider);
        // die();
        $password = $this->request->getVar('password');
        $username = $this->request->getVar('username');
        // print_r($username);
        // print_r($password);
        // die();
        $sub_site = $this->request->getVar('sub_site');
        $t = time();
        $currentdatetime =   date("Y-m-d H:i:s", $t);

          
        $data =
            [
                'supplier_id' => $u_id,
                'owner_id' => $o_id,
                'boundary_id' => $boundary,
                'subboundary_id' => $sub_boundary,
                'board_type' => $type_board,
                'sub_site' => $sub_site,
                'provider_type' => $provider,
                'username' => $username,
                'kn_no' => $this->request->getVar('kn_no'),
                'consumer_no' => $this->request->getVar('consumer_no'),
                'account_no' => $this->request->getVar('account_no'),
                'mobile_no' => $this->request->getVar('mo_no'),
                'service_no' => $this->request->getVar('service_no'),
                'ca_no' => $this->request->getVar('ca_no'),
                'password' => $password,
                'current_status' => '1',
                'consent_form_file' => $newNameD,
                'current_time_date' => $currentdatetime,
                'conHolderName' => $this->request->getVar('conHolName'),
                'test_id' => $test_id,

            ];

        // print_r($data);
        // die();
        $insert = $sensor->insert($data);
        if ($insert) {

            $session->setFlashdata('success', 'Automation  has been created successfully');
        } else {

            $session->setFlashdata('error', ' Not Save');
        }

        // return redirect()->back();
        return redirect()->to('automotion');
    }
    public function editSensor()
    {

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();
        $session = session();

        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $supplier_id = $supplier_info['supplier_id'];

        if (session()->supplier_info['role'] == 0 || session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }

        $input = $this->validate([
            'consent_form' => 'uploaded[consent_form]|max_size[consent_form,2048]|ext_in[consent_form,pdf],'
        ]);

        $pdfFile =  $this->request->getFile('consent_form');
        if ($input) {
            if ($pdfFile->isValid() && !$pdfFile->hasMoved()) {


                $newNameD = $pdfFile->getRandomName();
                $pdfFile->move('public/consent_form', $newNameD);
            }
        } else {
            $id = $this->request->getVar('editid');
            $sensor = new SensorModel();

            $sensor_data = $sensor->where('id', $id)->where('status', 1)->where('supplier_id', $u_id)->first();
            $newNameD = $sensor_data['consent_form_file'];
        }


        $sensor = new SensorModel();

        $boundary = $this->request->getVar('boundary');
        $id = $this->request->getVar('editid');
        $sub_boundary = $this->request->getVar('sub_boundary');
        $type_board = $this->request->getVar('type_board');
        $provider = $this->request->getVar('name_discom_edit');
        // print_r($provider);
        // die();
        $password = $this->request->getVar('password');
        $username = $this->request->getVar('username');
        // print_r($username);
        // print_r($password);
        // die();
        $sub_site = $this->request->getVar('sub_site');

        $data =
            [
                'supplier_id' => $u_id,
                'owner_id' => $o_id,
                'boundary_id' => $boundary,
                'subboundary_id' => $sub_boundary,
                'board_type' => $type_board,
                'sub_site' => $sub_site,
                'provider_type' => $provider,
                'username' => $username,
                'kn_no' => $this->request->getVar('kn_no'),
                'consumer_no' => $this->request->getVar('consumer_no'),
                'account_no' => $this->request->getVar('account_no'),
                'mobile_no' => $this->request->getVar('mo_no'),
                'service_no' => $this->request->getVar('service_no'),
                'ca_no' => $this->request->getVar('ca_no'),
                'password' => $password,
                'conHolderName' => $this->request->getVar('conHolName'),
                'consent_form_file' => $newNameD,

            ];

        // print_r($data);
        // die();
        $insert = $sensor->update($id, $data);
        if ($insert) {
            $session->setFlashdata('success', 'Sensor has been Update successfully');
        } else {
            $session->setFlashdata('error', ' Not update');
        }

        return redirect()->back();
    }


    public function getsubboundaryByBoundary($boundary)
    {
        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');



        if ($boundary == 30) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12 and is_submit=1");

            $indicator = $query->getResultArray();
            // print_r($indicator);
            //  die();  
            return $this->response->setJSON($indicator);
        }

        if ($boundary == 31) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11 and is_submit=1");

            $indicator = $query->getResultArray();
            // print_r($indicator);
            //             die();  
            return $this->response->setJSON($indicator);
        }
        if ($boundary == 43) {

            $query = $db->query("select id,name from supplier_type where supplier_id='" . $supplier_info['supplier_id'] . "' and status=1");


            $indicator = $query->getResultArray();

            return $this->response->setJSON($indicator);
        }
    }
    public function delete($id)
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $sensor = new SensorModel();

        $data = [
            'status' => '0',

        ];

        $delete = $sensor->update($id, $data);
        if ($delete) {

            $session->setFlashdata('error', 'Sensor delete');
        } else {

            $session->setFlashdata('error', ' Not delete');
        }

        return redirect()->back();
    }
    public function billdelete($id)
    {

        $rs = check_session();



        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $sensor = new Data_electricityModel();

        $data = [
            'status' => '0',

        ];

        $delete = $sensor->update($id, $data);
        if ($delete) {

            $session->setFlashdata('error', 'bill delete');
        } else {

            $session->setFlashdata('error', ' Not delete');
        }

        return redirect()->back();
    }
    public function electricity_delete()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $id = $this->request->getVar('electricity_id');
        $sensor = new SensorModel();

        $data = [
            'status' => '0',

        ];

        $delete = $sensor->update($id, $data);
        if ($delete) {

            $session->setFlashdata('error', 'Automation Electricity delete');
        } else {

            $session->setFlashdata('error', ' Not delete');
        }

        return redirect()->back();
    }

    public function update_status()
    {


        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $id = $this->request->getVar('status_id');
        $statusid = $this->request->getVar('statusid');
        // print_r($statusid);
        // die();
        $meth = strtotime('now');
        $date_time = date('d-M-Y h:i:A', $meth);
        // print_r($date_time);
        // die();
        $sensor = new SensorModel();
        $electricity = new Data_electricityModel();
        if ($statusid) {

            $dat =  $electricity->where('status', 1)->where('electricity_id', $statusid)->findAll();
            if ($dat) {
                $data = [
                    'current_status' => '3',

                ];

                $delete = $sensor->update($statusid, $data);
            } else {
                $session->setFlashdata('error', 'Please insert Automation');
                return redirect()->back();
            }
        } else {

            $data = [
                'current_status' => '2',
                'timestamp_date' => $date_time,
            ];

            $delete = $sensor->update($id, $data);
        }


        if ($delete) {

            $session->setFlashdata('success', 'Sensor Update');
        } else {

            $session->setFlashdata('error', ' Not update');
        }

        return redirect()->back();
    }

    public function status_change()
    {
        $data['pg_nm'] = 'Dashboard';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');
        $id = $this->request->getVar('status_name');


        $sensor = new SensorModel();


        $data = [
            'current_status' => '2',

        ];

        $delete = $sensor->update($id, $data);


        if ($delete) {

            $session->setFlashdata('success', 'Status Awaited');
        } else {
            $session->setFlashdata('error', 'status Not change');
        }
        return redirect()->back();
    }
    public function eb_board($id)
    {


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $co = $db->query("SELECT state_id FROM `supplier_assessment` where id =$id and is_submit=1")->getResultArray();

        foreach ($co as $key => $value) {
        }
        $vv = $value['state_id'];


        $que = $db->query("SELECT id, name_discom FROM `electricity_board` where state=$vv")->getResultArray();

        return $this->response->setJSON($que);
    }
    public function site_sub_site($id)
    {


        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');


        $data = $db->query("SELECT * FROM `sub_site` where site_id =$id and status=1")->getResultArray();




        return $this->response->setJSON($data);
    }

    public function user_pass($id)
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = '';


        $db = \Config\Database::connect();

        $session = session();

        $co = $db->query("SELECT uniq_id FROM `electricity_board` where id =$id")->getResultArray();

        foreach ($co as $vvvv) {

            $vvvv['uniq_id'];
        }
        $fff = $vvvv['uniq_id'];

        $response = [

            'success' => $fff
        ];
        // print_r($response);
        // die();

        return $this->response->setJSON($response);
    }

    public function Admin_pa()
    {


        $db = \Config\Database::connect();

        $data = $this->helperData;
        $session = session();

        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $supplier_model = new SupplierModel();

        $data['supplier'] = $supplier_model->where('status', 1)->where('role', 10)->orwhere('role', 0)->where('status', 1)->findAll();

        // $data['supplier'] =$db->query("SELECT * FROM `supplier` where status =1")->getResultArray();

        echo view('admin/newSupplier', $data);
    }

    public function electricity($id)
    {


        $db = \Config\Database::connect();

        $data = $this->helperData;

        $session = session();
        $supplier_model = new SupplierModel();

        $model = new ElectricityModel();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");

        $data['sub_boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,boundary_id,subboundary_id,board_type,provider_type,current_status,timestamp_date from sensors where status=1");
        $data['item'] = $query->getResultArray();

        $query = $db->query("select id,name_discom,state from electricity_board");
        $data['electricity_board'] = $query->getResultArray();
        $rs = $supplier_model->select("supplier_plan_id,owner_id,role,id")->where('id', $id)->first();

        if ($rs['role'] == 0) {
            $o_id = $rs['id'];
            $u_id = $rs['id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            // $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        } elseif ($rs['role'] == 10) {
            $sid = $rs['id'];
            $u_id = $rs['id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            // $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        } else {
            $sid = $rs['id'];
            $u_id = $rs['id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }
        // print_r($o_id);
        // die();

        $sensor = new SensorModel();

        $data['supplier'] = $sensor->where('status', 1)->where('current_status !=', '1')->where('owner_id', $o_id)->findAll();

        $data['electricity_id'] = $id;



        // $curr_time ="1993-12-02";
        //         //Y-M-D
        //         $time = strtotime($curr_time);

        //         $diff    =  time() - $time;
        //         $sec     =  $diff;
        //         $min     =  round($diff / 60 );
        //         $hrs     =  round($diff / 3600);

        //         $days    =  round($diff / 86400 );

        //         $weeks   =  round($diff / 604800);


        //         $mnths   =  round($diff / 2600640 );


        //         $yrs     =   round($diff / 31207680 );
        //         $msg     =   'success msg';


        //         if($sec <= 60) {
        //             echo "$sec  sec ago";
        //             if($sec=='21'){
        //                 echo 'suceess msg';
        //                 }
        //                 else if($sec=='29'){

        //                     echo 'error msg';
        //                 }     
        //             // echo "$msg";
        //         }
        //         else if($min <= 60) {
        //             if($min==1) {
        //                 echo "one minute ago";
        //             }
        //             else {
        //                 echo "$min minutes ago  ";

        //                 if($min=='21'){
        //                 echo 'suceess msg';
        //                 }
        //                 else if($min=='29'){

        //                     echo 'error msg';
        //                 }     
        //        }
        //     }
        //       else if($hrs <= 24) {
        //             if($hrs == 1) { 
        //                 echo "an hour ago";
        //             }
        //             else {
        //                 echo "$hrs hours ago";
        //             }
        //         }


        //         else if($days <= 7) {
        //             if($days == 1) {
        //                 echo "Yesterday";
        //             }
        //             else {
        //                 echo "$days days ago";
        //             }
        //         }

        //         else if($weeks <= 4.3) {
        //             if($weeks == 1) {
        //                 echo "a week ago";
        //             }





        echo view('admin/electricity_view', $data);
    }

    public function electricity_data($id, $idd)
    {

        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $data['id'] = $id;
        $data['electricity_id'] = $idd;
        $supplier_model = new SupplierModel();

        $rs = $supplier_model->select("supplier_plan_id,owner_id,role,id")->where('id', $idd)->first();

        if ($rs['role'] == 0) {
            $o_id = $rs['id'];
            $u_id = $rs['id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            // $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        } elseif ($rs['role'] == 10) {
            $sid = $rs['id'];
            $u_id = $rs['id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_footprints'] = $db->query("SELECT * from control_footprints where owner_id='" . $o_id . "'and status=1")->getResultArray();
            // $data['employee_details'] = $supplier_model->where('owner_id',$o_id)->findAll();

        } else {
            $sid = $rs['id'];
            $u_id = $rs['id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }

        // print_r($o_id); 
        // print_r($id);

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");

        $data['boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();

        $query = $db->query("select * from sub_site where status=1 and supplier_id='" . $u_id . "'");
        $data['sub_site'] = $query->getResultArray();

        $query = $db->query("select * from electricity_board where status=1");
        $data['electricity_board'] = $query->getResultArray();


        $sensor = new SensorModel();

        $data['boundary_subBoundary'] = $sensor->where('status', 1)->where('current_status !=', '1')->where('owner_id', $o_id)->where('id', $id)->first();


        $model = new Data_electricityModel();
        $data['data_fetch'] = $model->where('status', 1)->where('electricity_id', $id)->findAll();
        echo view('admin/add_automotion', $data);
    }

    public function insertAutomotion()
    {

        $db = \Config\Database::connect();

        $data = $this->helperData;

        $session = session();

        $model = new Data_electricityModel();

        $pdfFile =  $this->request->getFile('pdfFile');
        // $input = $this->validate([
        //             'pdfFile' => 'uploaded[pdfFile]|max_size[pdfFile,2048]|ext_in[pdfFile,pdf],'
        //         ]);
        $input = $this->validate([
            'pdfFile' => 'uploaded[pdfFile]|ext_in[pdfFile,pdf],'
        ]);


        $l = $pdfFile->getName();
        $bill_name  = rtrim($l, ".pdf");

        // print_r($input);
        //   die();

        if ($input) {
            if ($pdfFile->isValid() && !$pdfFile->hasMoved()) {


                $newNameD = $pdfFile->getRandomName();
                $pdfFile->move('public/uploads/pdfElectricity', $newNameD);
                // print_r($h);
                // die();

            }
        }

        // else
        // {

        // $session->setFlashdata('error','Please Upload Pdf file');
        // return redirect()->back();

        // }

        $monthly =   json_encode($this->request->getVar('monthly_name'));
        $t = time();
        $currentdatetime =   date("Y-m-d H:i:s", $t);
      
     
        $data = 
        [
            'electricity_id' => $this->request->getVar('id'),
            'bill_no' => $bill_name,
            'bill_date' => $this->request->getVar('bill_date'),
            'consume_unit' => $this->request->getVar('consume_unit'),
            'demand_load' => $this->request->getVar('demand_load'),
            'senstion' => $this->request->getVar('senstion'),
            'power_load' => $this->request->getVar('power_load'),
            'year' => $this->request->getVar('year'),
            'amount' => $this->request->getVar('amount'),
            'frequency' => $this->request->getVar('frequency'),
            'monthly_name' => $monthly,
            'pdf_file' => $newNameD,
            'currentdatetime' => $currentdatetime,
        ];
            
        
        $done = $model->insert($data);

        $electricityData =  $model->where('status', 1)->findAll();

        foreach ($electricityData as $key => $value) 
        {

            $elec_id = $value['electricity_id'];
        }

        $Energy_model = new Energy_managment();
        $Energy_model_data = new Energy_managment_data();
        $Sensor_Model = new SensorModel();
        $Energy = $Energy_model->where('status', 1)->where('connect', 1)->where('sensorId', $elec_id)->first();

        $supplier_id = $Energy['supplier_id'];
        $sub_disclosure_id = $Energy['sub_disclosure_id'];
        $site_id = $Energy['site_id'];
        $title = $Energy['title'];
        $disclosure_id = $Energy['disclosure_id'];

        $Energy_data_id = $Energy_model_data->where('status', 1)->findAll();



        $data = [
            'supplier_id' => $supplier_id,
            'owner_id' => $supplier_id,
            'disclosure_id' => $disclosure_id,
            'sub_disclosure_id' => $sub_disclosure_id,
            'site_id' => $site_id,
            'title' => $title,
            'value' => $this->request->getVar('consume_unit'),
            'connect' => '1',
            'monthly_name' => $monthly,
            'sensorId' => $this->request->getVar('id'),
        ];

        $insert = $Energy_model->insert($data);

        $data1 = [
            'supplier_id' => $supplier_id,
            'owner_id' => $supplier_id,
            'disclosure_id' => $disclosure_id,
            'sub_disclosure_id' => $sub_disclosure_id,
            'site_id' => $site_id,
            'title' => $title,
            'value' => $this->request->getVar('consume_unit'),
            'monthly_name' => $monthly,
            'sensorId' => $this->request->getVar('id'),

        ];

        $Energy_model_data->insert($data1);

           
        


        if ($done) {
            $session->setFlashdata('success', 'Electricity has been saved successfully');
        } else {
            $session->setFlashdata('error', ' Not Save');
        }

        return redirect()->back();
    }

    public function bill_data_view($id)
    {

        $db = \Config\Database::connect();

        $data = $this->helperData;

        $session = session();
        $model = new Data_electricityModel();
        $data_view = $model->where('status', 1)->where('id', $id)->first();
        $k = json_decode($data_view["monthly_name"]);
        $data = '';
        $data .= '<table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                         
                          <th>Bill Name</th>
                          <th>Consumed Unit in KWH</th>
                          <th>Demand Load</th>
                          <th>Bill Date</th>
                          <th>Sanction Load</th>
                          <th>Power factor</th>
                          <th>Year</th>
                          <th>Month</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>
                          <td>' . $data_view["bill_no"] . '</td>
                          <td>' . $data_view["consume_unit"] . '</td>
                          <td>' . $data_view["demand_load"] . '</td>
                          <td>' . $data_view["bill_date"] . '</td>
                          <td>' . $data_view["senstion"] . '</td>
                          <td>' . $data_view["power_load"] . '</td>
                          <td>' . $data_view["year"] . '</td>';

        $data .= '<td>';
        foreach ($k as $da) {
            if ($da == '1') {
                $data .= 'January,';
            } elseif ($da == 2) {
                $data .= 'February,';
            } elseif ($da == 3) {
                $data .= 'March,';
            } elseif ($da == 4) {
                $data .= 'April,';
            } elseif ($da == 5) {
                $data .= 'May,';
            } elseif ($da == 6) {
                $data .= 'June,';
            } elseif ($da == 7) {
                $data .= 'July,';
            } elseif ($da == 8) {
                $data .= 'August,';
            } elseif ($da == 9) {
                $data .= 'September,';
            } elseif ($da == 10) {
                $data .= 'October,';
            } elseif ($da == 11) {
                $data .= 'November,';
            } elseif ($da == 12) {
                $data .= 'December';
            }
        }
        $data .= '</td>';
        $data .= '</tr>
                      </tbody>
                      </table>';
        echo $data;
    }


    public function importCsvToDb()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);
        $id = $this->request->getVar('idee');
        $model = new Data_electricityModel();
        if ($file = $this->request->getFile('file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(".../public/csvfile", $newName);
                // $open = fopen(".../public/csvfile/".$newName,"r");
                $open = fopen(".../public/csvfile/" . $newName, "r");

                $i = 0;
                $csvArr = array();
                $filedata = fgetcsv($open, 1000, ",");
                // print_r($filedata);
                // die();
                while (($filedata = fgetcsv($open, 1000, ",")) !== FALSE) {
                    // print_r($filedata);
                    $data = [

                        // bill_no,bill_date,period_date,to_date,consume_unit,demand_load,senstion,power_load
                        'electricity_id' => $this->request->getVar('idee'),
                        'bill_no' => $filedata[0],
                        'year' => $filedata[1],
                        'bill_date' => $filedata[2],
                        'amount' => $filedata[3],
                        'senstion' => $filedata[4],
                        'consume_unit' => $filedata[5],
                        'demand_load' => $filedata[6],
                        'power_load' => $filedata[7],
                        'monthly_name' => $filedata[8],


                    ];

                    $done = $model->insert($data);
                }

                fclose($open);

                session()->setFlashdata('success', ' rows successfully added.');
            } else {
                session()->setFlashdata('error', 'CSV file coud not be imported.');
                session()->setFlashdata('error', 'alert-danger');
            }
        }
        return redirect()->back();
    }

    public function alert()
    {

        $db = \Config\Database::connect();

        $data = $this->helperData;

        $session = session();
        $supplier_info = $session->get('supplier_info');

        $supplier_id = $supplier_info['supplier_id'];
        $owner_id = $supplier_info['supplier_id'];
        $vv = $this->request->getVar('name');
        $automotion_id = $this->request->getVar('id');

        $model = new Automotion_alert();

        $fetc = $model->where('name', $vv)->where('supplier_id', $supplier_id)->where('automotion_id', $automotion_id)->first();
        // print_r($update_id);
        // die();
        if (!$fetc == "") {
            $update_id = $fetc['id'];

            $data = [
                'supplier_id'   => $supplier_id,
                'owner_id'      => $owner_id,
                'above'         => $this->request->getVar('above'),
                'below'         => $this->request->getVar('below'),
                'automotion_id' => $this->request->getVar('id'),
                'name'          => $vv,
                'assign_to'     => $this->request->getVar('noti_to'),
                'for_longer'    => $this->request->getVar('for_longer'),
            ];

            $model->update($update_id, $data);
        } else {

            $data = [
                'supplier_id'   => $supplier_id,
                'owner_id'      => $owner_id,
                'above'         => $this->request->getVar('above'),
                'below'         => $this->request->getVar('below'),
                'automotion_id' => $this->request->getVar('id'),
                'name'          => $vv,
                'assign_to'     => $this->request->getVar('noti_to'),
                'for_longer'    => $this->request->getVar('for_longer'),
            ];

            $model->insert($data);
        }

        if ($model) {
            session()->setFlashdata('success', 'Automation alert create');
        }
        return redirect()->back();
    }

    public function csvautomotion()
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $id = $supplier_info['supplier_id'];
        // print_r($id);
        // die();
        $model = new SensorModel();

        if ($file = $this->request->getFile('file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(".../public/automotioncsv", $newName);

                $open = fopen(".../public/automotioncsv/" . $newName, "r");
                $i = 0;

                $csvArr = array();
                $filedata = fgetcsv($open, 1000, ",");
                while (($filedata = fgetcsv($open, 1000, ",")) !== FALSE) {

                    $data = [
                        'supplier_id' => $id,
                        'owner_id' => $id,
                        'boundary_id' => $filedata[0],
                        'subboundary_id' => $filedata[1],
                        'board_type' => $filedata[2],
                        'provider_type' => $filedata[3],
                        'username' => 'null',
                        'password' => 'null',
                        'current_status' => '1'
                    ];

                    $done = $model->insert($data);
                }

                fclose($open);

                session()->setFlashdata('success', ' rows successfully added.');
            } else {
                session()->setFlashdata('error', 'CSV file coud not be imported.');
                session()->setFlashdata('error', 'alert-danger');
            }
        }

        return redirect()->back();
    }
}