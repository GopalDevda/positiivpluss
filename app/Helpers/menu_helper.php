<?php

use App\Models\ModuleModel;
use App\Models\IndustryModel;
use App\Models\ModuleItemModel;
use App\Models\SupplierModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\QuickStartModel;
use App\Models\SupplierModuleItemRelationModel;



if (!function_exists("commonData")) {
    function commonData()
    {
        $db = \Config\Database::connect();
        $session = session();
        $module_model = new ModuleModel();
        $industry_model = new IndustryModel();
        $module_item_model = new ModuleItemModel();
        $user_info = $session->get('user_info');
        $mod = [];
        $mod_item = [];
        if (!empty($user_info)) {
            $query = $db->query("select * from admin where id='" . $user_info['id'] . "'");
            $rs = $query->getResultArray();
            if ($rs) {
                $query = $db->query("select * from module_role_relations where role_id='" . $rs[0]['user_role'] . "' and status=1");
                $module_role_relation = $query->getResultArray();
                if ($module_role_relation) {
                    foreach ($module_role_relation as $smir) {
                        $mod[] = $smir["module_id"];
                        $mod_item[] = $smir["module_item_id"];
                    }
                }
            }
        }
        // echo '<pre>';
        // print_r($mod_item);
        // die();
        $data['menu'] = [];
        $data['mod_item'] = [];
        if ($mod) {
            $data['menu'] = $module_model->select("*")->whereIn('id', $mod)->where('status', 1)->findAll();
        }

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status', 1)->findAll();
        if ($mod_item) {
            $data['mod_item'] = $module_item_model->whereIn('id', $mod_item)->where('status', 1)->findAll();
        }
        return $data;
    }
}

if (!function_exists("check_session")) {
    function check_session()
    {
        $session = session();
        if (empty($session->get('supplier_info'))) {
            return 0;
        }
        return 1;
    }
}
if (!function_exists("SidebarData")) {
    function SidebarData()
    {
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $find = new QuickStartModel();
        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $rs = $supplier_model->select("supplier_plan_id,country_id, industry_id,brand_name,website,description")->where('id', $supplier_info['supplier_id'])->first();
        $supplier_plan_id = $rs['supplier_plan_id'];
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = $supplier_info['supplier_id'];
        } else {
            $u_id = $supplier_info['supplier_id'];
            $o_id = $supplier_model->where('id', $u_id)->first()['owner_id'];
        }
        $data['operationsInfo'] = $find->where('owner_id', $o_id)->where('status', 1)->first();
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
        return $data;
    }
}
