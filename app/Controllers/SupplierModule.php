<?php







namespace App\Controllers;







use App\Controllers\BaseController;



use CodeIgniter\Controller;




use App\Models\BrandModel;



use App\Models\SupplierModel;



use App\Models\ModuleRoleModel;
use App\Models\SupplierModuleModel;



use App\Models\SupplierModuleItemModel;



use App\Models\SupplierRoleModel;



use App\Models\SupplierModuleItemRelationModel;



use App\Models\SupplierPlanModel;







class SupplierModule extends BaseController
{


    private $helperData = array();
    public function __construct()
    {



        helper(['form', 'url', 'html', 'menu']);



        $session = \Config\Services::session();
        $this->helperData = commonData();
    }







    public function viewSupplierModule()
    {


        $data = $this->helperData;
        // $module_model = new ModuleModel();

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }





        $supplier_module_model = new SupplierModuleModel();




        $data['list'] = $supplier_module_model->select("*")->where('status', 1)->findAll();



        return view('admin/view-supplier-module.php', $data);
    }







    public function addSupplierModule()
    {

        $data = $this->helperData;


        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        return view('admin/add-supplier-module', $data);
    }











    public function addSupplierModuleSubmit()
    {



        $db = \Config\Database::connect();



        $supplier_module_model = new SupplierModuleModel();



        $session = Session();



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $icon = $this->request->getVar("icon");



        $ava = $db->query("select * from supplier_module where supplier_module_name='" . $name . "' and status=1");



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_module_name" => $name,



                "link" => $link,



                "icon" => $icon,



                "user_id" => 1,



                "status" => 1



            ];



            if ($supplier_module_model->insert($data)) {



                $session->setFlashdata('success', 'Supplier Module has been saved successfully');
            } else {



                $session->setFlashdata('error', 'Supplier Module Not Save');
            }
        } else {



            $session->setFlashdata('error', 'Supplier Module name ' . $name . ' already exist!');
        }



        return redirect()->to('SupplierModule/viewSupplierModule');
    }







    public function deleteSupplierModule($id)
    {



        $supplier_module_model = new SupplierModuleModel();



        $session = Session();



        if ($supplier_module_model->where(['id' => $id])->set(['status' => 0])->update()) {



            $session->setFlashdata("success", "Supplier Module has been successfully deleted");
        } else {



            $session->setFlashdata("error", "Error to delete");
        }



        return redirect()->to('SupplierModule/viewSupplierModule');
    }







    public function editSupplierModule()
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_module_model = new SupplierModuleModel();



        $id = $this->request->getVar("id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $icon = $this->request->getVar('icon');



        $ava = $db->query("select * from supplier_module where supplier_module_name='" . $name . "' and status=1 and id!=" . $id);



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_module_name" => $name,



                "link" => $link,



                "icon" => $icon,



            ];



            if ($supplier_module_model->where(['id' => $id])->set($data)->update()) {



                $session->setFlashdata('success', 'Supplier Module has been updated successfully');
            } else {



                $session->setFlashdata('error', 'Supplier Module Not Updated');
            }
        } else {



            $session->setFlashdata('error', 'Supplier Module name ' . $name . ' already exist!');
        }



        return redirect()->to('SupplierModule/viewSupplierModule');
    }







    public function supplierRole()
    {

        $data = $this->helperData;

        $module_role_model = new ModuleRoleModel();

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        $supplier_role_model = new SupplierRoleModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["list"] = $supplier_role_model->select("*")->where('status', 1)->findAll();



        return view('admin/supplier-role.php', $data);
    }







    public function addSupplierRole()
    {

        $data = $this->helperData;

        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        return view('admin/add-supplier-role.php', $data);
    }







    public function addSupplierRoleSubmit()
    {



        $db = \Config\Database::connect();



        $supplier_role_model = new SupplierRoleModel();



        $name = $this->request->getVar('name');



        $session = Session();



        $ava = $db->query("select * from supplier_role where supplier_role_name='" . $name . "' and status=1");



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_role_name" => $name,



                "status" => 1



            ];



            if ($supplier_role_model->insert($data)) {







                $session->setFlashdata("success", "Supplier Role has been successfully saved");
            } else {



                $session->setFlashdata("error", "Error to save");
            }
        } else {



            $session->setFlashdata("error", "Supplier Role Name " . $name . " already exists");
        }



        return redirect()->to('SupplierModule/supplierRole');
    }







    public function deleteSupplierRole($id)
    {



        $supplier_role_model = new SupplierRoleModel();



        $session = Session();



        if ($supplier_role_model->where(['id' => $id])->set(['status' => 0])->update()) {



            $session->setFlashdata("success", "Supplier role has been successfully deleted");
        } else {



            $session->setFlashdata("error", "Error to delete");
        }



        return redirect()->to('SupplierModule/supplierRole');
    }







    public function editSupplierRole()
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_role_model = new SupplierRoleModel();



        $id = $this->request->getVar("id");



        $name = $this->request->getVar("name");



        $ava = $db->query("select * from supplier_role where supplier_role_name='" . $name . "' and status=1 and id!=" . $id);



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_role_name" => $name



            ];



            if ($supplier_role_model->where(['id' => $id])->set($data)->update()) {



                $session->setFlashdata("success", "Supplier Role name has been successfully deleted");
            } else {



                $session->setFlashdata("error", "Error to update");
            }
        } else {



            $session->setFlashdata('error', 'Supplier Role name ' . $name . ' already exist!');
        }



        return redirect()->to('SupplierModule/supplierRole');
    }







    public function supplierModuleItem()
    {

        $data = $this->helperData;

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_item_model = new ModuleItemModel();



        // $industry_model = new IndustryModel();



        $supplier_module_item_model = new supplierModuleItemModel();



        $rs = $supplier_module_item_model->where('status', 1)->findAll();



        $db = \Config\Database::connect();



        $data['title'] = 'Supplier Module Item Management';



        // $module_model = new ModuleModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $list = array();



        if (!empty($rs)) {



            foreach ($rs as $r) {



                $query = $db->query("select * from supplier_module where status=1 and id='" . $r['supplier_module_id'] . "' ");



                $mod = $query->getResultArray();



                if (!empty($mod)) {
                    $supplier_module_name = $mod[0]['supplier_module_name'];
                } else {
                    $supplier_module_name = 0;
                }



                $list[] = array('id' => $r['id'], 'item_name' => $r['item_name'], 'supplier_module_name' => $supplier_module_name, 'icon' => $r['icon'], 'link' => $r['link']);
            }
        }



        $data['list'] = $list;



        return view('admin/supplier-module-item.php', $data);
    }







    public function addSupplierModuleItem()
    {

        $data = $this->helperData;

        // $module_item_model = new ModuleItemModel();



        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        $supplier_module_model = new SupplierModuleModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["supplier_module"] = $supplier_module_model->where('status', 1)->findAll();



        return view('admin/add-supplier-module-item.php', $data);
    }







    public function addSupplierModuleItemSubmit()
    {



        $db = \Config\Database::connect();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $session = Session();



        $supplier_module_id = $this->request->getVar("supplier_module_id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $icon = $this->request->getVar("icon");



        $ava = $db->query("select * from supplier_module_item where supplier_module_id=" . $supplier_module_id . " and item_name='" . $name . "' and status=1");



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_module_id" => $supplier_module_id,



                "item_name" => $name,



                "link" => $link,



                "icon" => $icon,



                "user_id" => 1,



                "status" => 1



            ];



            if ($supplier_module_item_model->insert($data)) {



                $session->setFlashdata('success', 'Supplier Module Item has been successfully saved');
            } else {



                $session->setFlashdata('error', 'Supplier Module Item name ' . $name . ' already exist!');
            }
        } else {



            $session->setFlashdata('error', 'Supplier Module Item name ' . $name . ' already exist!');
        }



        return redirect()->to('SupplierModule/supplierModuleItem');
    }







    public function editSupplierModuleItem($id)
    {

        $data = $this->helperData;

        // $module_model = new ModuleModel();



        // $module_item_model = new ModuleItemModel();        



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["supplier_module"] = $supplier_module_model->where('status', 1)->findAll();



        $data["supplier_module_item"] = $supplier_module_item_model->where('id', $id)->first();



        return view("admin/edit-supplier-module-item", $data);
    }







    public function deleteSupplierModuleItem($id)
    {



        $supplier_module_item_model = new SupplierModuleItemModel();



        $session = Session();



        if ($supplier_module_item_model->where(['id' => $id])->set(['status' => 0])->update()) {



            $session->setFlashdata("success", "Supplier Module Item has been successfully deleted");
        } else {



            $session->setFlashdata("error", "Error to delete");
        }



        return redirect()->to('SupplierModule/supplierModuleItem');
    }







    public function updateSupplierModuleItem()
    {



        $db = \Config\Database::connect();



        $session = session();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $id = $this->request->getVar("id");



        $supplier_module_id = $this->request->getVar("supplier_module_id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $icon = $this->request->getVar('icon');



        $ava = $db->query("select * from supplier_module_item where supplier_module_id=" . $supplier_module_id . " and item_name='" . $name . "' and status=1 and id!=" . $id);



        $ava = $ava->getResultArray();



        if (empty($ava)) {



            $data = [



                "supplier_module_id" => $supplier_module_id,



                "item_name" => $name,



                "icon" => $icon,



                "link" => $link



            ];



            if ($supplier_module_item_model->where(['id' => $id])->set($data)->update()) {



                $session->setFlashdata("success", "Supplier Module Item has been successfully updated");
            } else {



                $session->setFlashdata("error", "Error to update");
            }
        } else {



            $session->setFlashdata('error', 'Supplier Module Item name ' . $name . ' already exist!');
        }



        return redirect()->to('SupplierModule/supplierModuleItem');
    }







    public function moduleRoleRelation()
    {
    }




    // brand Controll
    public function brandControl()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $rs = check_session();
        // if(!$rs) {
        //     return redirect()->to('home/user_login');
        // }
        $data['pg_nm'] = 'Dashboard';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        // print_r($supplier_info);
        // die;
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $rs = $supplier_model->select("supplier_plan_id")->where('id', '5')->first();
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
        // print_r($supplier_mod);
        // die;
        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();

        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();
        // $db = \Config\Database::connect();
        $supplier_role_model = new SupplierRoleModel();
        // $module_model = new ModuleModel();
        // $module_item_model = new ModuleItemModel();
        // $industry_model = new IndustryModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $supplier_plan_model = new SupplierPlanModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data["role"] = $supplier_role_model->where('status', 1)->findAll();
        $data["supplier_plan"] = $supplier_plan_model->where('status', 1)->findAll();
        $data["supplier_module"] = [];
        $supplier_module = $supplier_module_model->where('status', 1)->findAll();
        $list = [];
        if ($supplier_module) {
            foreach ($supplier_module as $mod) {
                $temp_arr = [];
                $item = $supplier_module_item_model->where('supplier_module_id', $mod['id'])->findAll();
                $temp_arr["supplier_module"] = $mod;
                $temp_arr["item"] = $item;
                $list[] = $temp_arr;
            }
        }
        $data["list"] = $list;
        return view('admin/add-supplier-module-brand-control-relation.php', $data);
    }
    public function addSupplierModuleBrandItemRelationSubmit()
    {
        // print_r($this->request->getVar('edit[]'));
        // die();
        $session = session();
        $insert = new BrandModel();
        $brand = $this->request->getVar('brand_id[]');
        $id = $this->request->getVar('id[]');
        // print_r($id);
        // die();
        if ($id) {
            foreach ($id as $key => $row) {
                $data = [
                    'brand_name' => $this->request->getVar('brand_name[' . $key . ']'),
                    'brand_id' => $this->request->getVar('brand_id[' . $key . ']'),
                    'plan_id' => $this->request->getVar('supplier_plan_id'),
                    'role_id' => $this->request->getVar('supplier_role_id'),
                    'add' => $this->request->getVar('add[' . $key . ']'),
                    'edit' => $this->request->getVar('edit[' . $key . ']'),
                    'view' => $this->request->getVar('view[' . $key . ']'),
                    'delete' => $this->request->getVar('delete[' . $key . ']'),
                ];

                $insert->update($row, $data);
            }
            $s_date = ['success' => 'Data update SuccessFully'];
            $session->setFlashdata($s_date);
            return redirect()->back();
        } else {

            // PRINT_R($brand);            die();
            if (!empty($brand)) {
                foreach ($brand as $key => $row) {
                    $data = [
                        'brand_name' => $this->request->getVar('brand_name[' . $key . ']'),
                        'brand_id' => $this->request->getVar('brand_id[' . $key . ']'),
                        'plan_id' => $this->request->getVar('supplier_plan_id'),
                        'role_id' => $this->request->getVar('supplier_role_id'),
                        'add' => $this->request->getVar('add[' . $key . ']'),
                        'edit' => $this->request->getVar('edit[' . $key . ']'),
                        'view' => $this->request->getVar('view[' . $key . ']'),
                        'delete' => $this->request->getVar('delete[' . $key . ']'),
                    ];

                    $insert->insert($data);
                }
            } else {
                $s_date = ['error' => 'Issue occured Please Check or contact to admin'];
                $session->setFlashdata($s_date);
                return redirect()->back();
            }
            $s_date = ['success' => 'Data insert SuccessFully'];
            $session->setFlashdata($s_date);
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function getSupplierModuleBrandItemByRole($supplier_role_idd = 0, $supplier_plan_idd = 0)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');

        $id = $supplier_info['supplier_id'];
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();

        $rs = $supplier_model->select("supplier_plan_id")->where('id', $id)->first();
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
        $supplier_mod = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();
        $supplier_mod_item = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();
        $brand = new BrandModel();
        $res = $brand->where(['role_id' => $supplier_role_idd, 'plan_id' => $supplier_plan_idd, 'status' => 1])->findAll();

        // print_r($res);
        // die();
        $rs = "";
        if ($res) {
            $ky = 1;
            $i = 0;
            $rs .= '<div class="row">';
            $rs .= '<table class="table">
                              <thead>
                                 <tr>
                                    <th scope="col">sno.</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Add</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                 </tr>
                              </thead>
                              <tbody>';
            foreach ($res as $r) {
                $rs .= '<tr>';
                $rs .= '<td>' . $ky++ . '</td>';
                $rs .= '<td>' . $r["brand_name"] . '<input type="hidden" name="brand_name[]" value="' . $r["brand_name"] . '">
                            <input type="hidden" name="brand_id[]" value="' . $r["brand_id"] . '">
                            <input type="hidden" name="id[' . $i . ']" value="' . $r["id"] . '">
                        </td>';
                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                            <input type="checkbox" name="add[' . $i . ']" value="1"';
                if ($r['add'] == 1) {
                    $rs .= 'checked=checked ';
                }
                $rs .= '>
                            </button>
                        </td>';
                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                            <input type="checkbox" name="edit[' . $i . ']" value="1"';
                if ($r['edit'] == 1) {
                    $rs .= 'checked=checked ';
                }
                $rs .= '>
                            </button>
                        </td>';
                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                            <input type="checkbox" name="view[' . $i . ']" value="1"';
                if ($r['view'] == 1) {
                    $rs .= 'checked=checked ';
                }
                $rs .= '>
                            </button>
                        </td>';
                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                            <input type="checkbox" name="delete[' . $i . ']" value="1"';
                if ($r['delete'] == 1) {
                    $rs .= 'checked=checked ';
                }
                $rs .= '>
                            </button>
                        </td>';
                $rs .= '</tr>';

                $i++;
            }
            $rs .= '</tbody>';
            $rs .= '</table>';
            $rs .= '</div>';
        } else {
            if ($supplier_mod) {
                $kyi = 1;
                $ii = 0;
                $rs .= '<div class="row">';
                $rs .= '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">sno.</th>
                                <th scope="col">name</th>
                                <th scope="col">Add</th>
                                <th scope="col">Edit</th>
                                <th scope="col">View</th>
                                 <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach ($supplier_mod as $sm) {
                    if ($supplier_mod_item) {
                        foreach ($supplier_mod_item as  $smi) {
                            if ($smi["supplier_module_id"] == $sm["id"]) {
                                $rs .= '<tr>';
                                $rs .= '<td>' . $kyi++ . '</td>';
                                $rs .= '<td>' . $smi["item_name"] . '<input type="hidden" name="brand_name[]" value="' . $smi["item_name"] . '">
                                                  <input type="hidden" name="brand_id[]" value="' . $smi["id"] . '">
                                              </td>';
                                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                                <input type="checkbox" name="add[' . $ii . ']" value="1"';
                                $rs .= '>
                                            </button>
                                             </td>';
                                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                            <input type="checkbox" name="edit[' . $ii . ']" value="1"';
                                $rs .= '>
                                            </button>
                                            </td>';
                                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                                <input type="checkbox" name="view[' . $ii . ']" value="1"';
                                $rs .= '>
                                            </button>
                                            </td>';
                                $rs .= '<td><button type="button" class="btn btn-primary" style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                                <input type="checkbox" name="delete[' . $ii . ']" value="1"';
                                $rs .= '>
                                            </button>
                                            </td>';
                                $rs .= '</tr>';
                                $ii++;
                            }
                        }
                    }
                }
                $rs .= '</tbody>';
                $rs .= '</table>';
                $rs .= '</div>';
            }
        }
        return $rs;
    }








    public function addSupplierModuleItemRelation()
    {

        $data = $this->helperData;

        $db = \Config\Database::connect();

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $supplier_role_model = new SupplierRoleModel();



        // $module_model = new ModuleModel();



        // $module_item_model = new ModuleItemModel();



        // $industry_model = new IndustryModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $supplier_plan_model = new SupplierPlanModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["role"] = $supplier_role_model->where('status', 1)->findAll();



        $data["supplier_plan"] = $supplier_plan_model->where('status', 1)->findAll();



        $data["supplier_module"] = [];



        $supplier_module = $supplier_module_model->where('status', 1)->findAll();



        $list = [];



        if ($supplier_module) {



            foreach ($supplier_module as $mod) {



                $temp_arr = [];



                $item = $supplier_module_item_model->where('supplier_module_id', $mod['id'])->findAll();



                $temp_arr["supplier_module"] = $mod;



                $temp_arr["item"] = $item;



                $list[] = $temp_arr;
            }
        }



        $data["list"] = $list;



        return view('admin/add-supplier-module-item-relation.php', $data);
    }







    public function addSupplierModuleItemRelationSubmit()
    {



        $db = \Config\Database::connect();



        $session = Session();



        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



        $supplier_role_id = $this->request->getVar("supplier_role_id");



        $supplier_plan_id = $this->request->getVar("supplier_plan_id");



        $item_arr = $this->request->getVar("item_id");



        $rs = $supplier_module_item_relation_model->where(['supplier_role_id' => $supplier_role_id, 'supplier_plan_id' => $supplier_plan_id])->set(['status' => 0])->update();



        if ($item_arr) {



            foreach ($item_arr as $item) {



                $arr = explode(",", $item);



                $supplier_module_id = $arr[0];



                $item_id = $arr[1];



                $ava = $db->query("select * from supplier_module_item_relations where supplier_role_id='" . $supplier_role_id . "' and supplier_module_id='" . $supplier_module_id . "' and supplier_module_item_id='" . $item_id . "' and supplier_plan_id='" . $supplier_plan_id . "'");



                $ava = $ava->getResultArray();



                if (empty($ava)) {



                    $data = [



                        "supplier_role_id" => $supplier_role_id,



                        "supplier_module_id" => $supplier_module_id,



                        "supplier_module_item_id" => $item_id,



                        "supplier_plan_id" => $supplier_plan_id,



                        "status" => 1



                    ];



                    $rs = $supplier_module_item_relation_model->insert($data);
                } else {



                    $rs = $supplier_module_item_relation_model->where(['supplier_role_id' => $supplier_role_id, 'supplier_module_id' => $supplier_module_id, 'supplier_module_item_id' => $item_id, 'supplier_plan_id' => $supplier_plan_id])->set(['status' => 1])->update();
                }
            }
        }



        return redirect()->to('SupplierModule/addSupplierModuleItemRelation');
    }







    public function editModuleRoleRelation()
    {
    }







    public function deleteModuleRoleRelation()
    {
    }







    public function getItemByModule($id)
    {



        $db = \Config\Database::connect();



        $data = '';



        $query = $db->query("select * from module_item where status=1 and module_id='" . $id . "' ");



        $item = $query->getResultArray();



        $data .= "<option value=''>Select Indicator</option>";



        if (!empty($item)) {



            foreach ($item as $c) {



                $data .= "<option value=" . $c['id'] . ">" . $c['item_name'] . "</option>";
            }
        }



        return $data;
    }







    public function getSupplierModuleItemByRole($supplier_role_id = 0, $supplier_plan_id = 0)
    {



        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $rs = $supplier_module_item_relation_model->where(['supplier_role_id' => $supplier_role_id, 'supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();



        $item_id_arr = [];



        if ($rs) {



            foreach ($rs as $r) {



                $item_id_arr[] = $r["supplier_module_item_id"];
            }
        }



        $supplier_module = $supplier_module_model->where('status', 1)->findAll();



        $list = [];



        if ($supplier_module) {



            foreach ($supplier_module as $mod) {



                $temp_arr = [];



                $item = $supplier_module_item_model->where('supplier_module_id', $mod['id'])->findAll();



                $temp_arr["supplier_module"] = $mod;



                $temp_arr["item"] = $item;



                $list[] = $temp_arr;
            }
        }



        $rs = "";



        if ($list) {



            foreach ($list as $li) {



                $rs .= '<div class="col-md-3" style="top:0px;margin:10px;">



                      <input type="checkbox" name="supplier_module_id[]" value="' . $li["supplier_module"]["id"] . '"> ';



                $rs .= $li["supplier_module"]["supplier_module_name"];



                $rs .= '</div>';



                if (!empty($li["item"])) {



                    $rs .= '<div class="row">';



                    foreach ($li["item"] as $itm) {



                        $rs .= '<div class="col-md-3" style="float:left;left:45px;top:0px;margin:5px;">';



                        $rs .= '<button type="button" style="background: peru;color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">';



                        $rs .= '<input type="checkbox" name="item_id[]" value="' . $li["supplier_module"]["id"] . ',' . $itm["id"] . '"';



                        if (in_array($itm['id'], $item_id_arr)) {



                            $rs .= 'checked=checked ';
                        }



                        $rs .= '> ';



                        $rs .= $itm["item_name"];



                        $rs .= '</button>';



                        $rs .= '</div>';
                    }



                    $rs .= '</div>';
                }
            }
        }



        return $rs;
    }
}
