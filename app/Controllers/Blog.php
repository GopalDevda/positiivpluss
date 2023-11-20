<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;


use App\Models\IndustryModel;


use App\Models\ModuleModel;

use App\Models\ModuleItemModel;

use App\Models\BlogModel;
use App\Models\SupplierModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;



class Blog extends BaseController

{

    private $helperData = array();

    public function __construct()
    {

        helper(['form', 'url', 'html', 'menu']);

        $session = \Config\Services::session();

        error_reporting(E_ALL);

        // $this->user_info = $this->session->get_userdata();

        $this->helperData = commonData();
    }





    public function addBlog()
    {

        $db = \Config\Database::connect();

        $data = $this->helperData;

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $module_model = new ModuleModel();

        // $industry_model = new IndustryModel();

        // $module_item_model = new ModuleItemModel();

        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        echo view('admin/add-blog', $data);
    }



    // Add Blog

    public function addBlogSub()
    {

        $db = \Config\Database::connect();

        $blog = new BlogModel();

        $session = Session();

        if ($_FILES['report']['name'] != '') {

            $file = $this->request->getFile('report');

            if ($file->isValid() && !$file->hasMoved()) {

                $reportName = $file->getRandomName();

                $file->move('public/uploads/blog', $reportName);
            }
        } else {
            $reportName = '';
        }



        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {

            $imageName = $file->getRandomName();

            $file->move('public/uploads/blog', $imageName);
        }



        $type = $this->request->getPost('type');

        $heading = $this->request->getPost('heading');

        $url = $this->request->getPost('url');

        $description = $this->request->getPost('description');

        // echo $heading;

        // die();

        $data = [

            'type' => $type,

            'heading' => $heading,

            'url' => $url,

            'report' => $reportName,

            'image' => $imageName,

            'description' => $description,

            "status" => 1

        ];



        if ($blog->insert($data)) {

            $session->setFlashdata('success', 'Blog has been added successfully');
        } else {

            $session->setFlashdata('error', 'Blog Not add');
        }

        return redirect()->to('blog/addBlog');
    }



    // view Bolg

    public function viewBlog()
    {

        $db = \Config\Database::connect();

        $blog = new BlogModel();

        $module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status', 1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status', 1)->findAll();

        $data['mod_item'] = $module_item_model->where('status', 1)->findAll();

        $query = $db->query("select * from blog where status=1 ");

        $data['list'] = $query->getResultArray();

        echo view('admin/view-blog', $data);
    }



    // editBlog

    public function editBlog($id)
    {

        $blog_model = new BlogModel();

        $module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status', 1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status', 1)->findAll();

        $data['mod_item'] = $module_item_model->where('status', 1)->findAll();



        $data['blog'] = $blog_model->where('id', $id)->first();

        return view('admin/edit-blog.php', $data);
    }



    // deleteBlog

    public function deleteBlog($id)
    {

        $session = session();

        $blogModel = new BlogModel();

        if ($blogModel->update($id, ['status' => 0])) {

            $session->setFlashdata('success', 'Blog has been delete successfully');
        } else {

            $session->setFlashdata('error', 'Blog not deleted');
        }

        return redirect()->to('blog/viewBlog');
    }



    // updateBlog

    public function updateBlog()
    {

        $blog_model = new blogModel();

        $session = Session();



        $id = $this->request->getVar("id");

        $type = $this->request->getVar("type");

        $url = $this->request->getVar("url");

        $heading = $this->request->getVar("heading");

        $description = $this->request->getVar("description");



        if ($_FILES['report']['name'] != '') {

            if ($_FILES['report']['name'] != '') {

                $file = $this->request->getFile('report');

                if ($file->isValid() && !$file->hasMoved()) {

                    $reportName = $file->getRandomName();

                    $file->move('public/uploads/blog', $reportName);
                }
            } else {
                $reportName = '';
            }
        } else {
            $reportName = '';
        }



        if ($_FILES['image']['name'] != '') {

            $file = $this->request->getFile('image');

            if ($file->isValid() && !$file->hasMoved()) {

                $imageName = $file->getRandomName();

                $file->move('public/uploads/blog', $imageName);
            }
        }



        $updated_data = [

            "type" => $type,

            "url" => $url,

            "heading" => $heading,

            "description" => $description,

            "image" => $imageName,

            "report" => $reportName

        ];

        if ($blog_model->where('id', $id)->set($updated_data)->update()) {

            $session->setFlashdata('success', 'Blog has been successfully deleted');
        } else {

            $session->setFlashdata("error", "Error to Blog");
        }

        return redirect()->to('blog/viewBlog');
    }
    public function guides()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Guides';
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
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();
        $blog_model = new blogModel();
        // print_r($data['supplier_mod_item']);
        // die;
        $data['blog'] = $blog_model->where('status', 1)->findAll();
        // print_r($data['blog']);
        // die;
        echo view('brand/guides', $data);
    }
    public function guides_view($id)
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Guides';
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
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();

        $blog_model = new blogModel();
        $data['blog_view'] = $blog_model->where('status', 1)->where('id', $id)->first();
        // print_r($data['blog_view']);
        // die;
        echo view('brand/guides_view', $data);
    }
    public function glossary()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Glossary';
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
        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->orderBy('sequence', 'ASC')->findAll();


        echo view('brand/glossary', $data);
    }
}
