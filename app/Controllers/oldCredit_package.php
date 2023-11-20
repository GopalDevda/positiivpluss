<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Credit_packagemodel;

class Credit_package extends BaseController
{
    private $db;
    private $credit_package;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->credit_package = new Credit_packagemodel();
        helper(['form', 'url', 'html', 'menu']);
    }
    public function index()
    {
        $data = commonData();
        $data['list'] = $this->credit_package->where('status', 1)->findAll();
        echo view('admin/credit_package', $data);
    }
    public function insert()
    {
        $this->credit_package->insert([
            'package_plan' => $this->request->getVar('package_plan'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
        ]);
        return redirect()->back()->with('success', 'Data inserted Successfully');
    }
    public function Edit_package()
    {
        $this->credit_package->update($this->request->getVar('id'), [
            'package_plan' => $this->request->getVar('package_plan'),
            'price' => $this->request->getVar('price'),
            'description' => $this->request->getVar('description'),
        ]);
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

    // Delete Site
    public function package_delete()
    {
        $this->credit_package->update($this->request->getVar('id'), ['status' => 0]);
        session()->setFlashdata('success', 'Data has been successfully deleted');
        return redirect()->back();
    }
}
