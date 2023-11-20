<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SubClassificationModel;
use App\Models\SdgModel;
use App\Models\FinanceModel;
use App\Models\SupplierModuleItemModel;
use App\Models\GroupModel;
use App\Models\ImpactModel;
use App\Models\SubSubIndustryModel;
use App\Models\RawMaterialProcessDetailModel;
use App\Models\RawmaterialDetailModel;
use App\Models\Finance_Sub_Category_Model;
use App\Models\IndustryModel;
use App\Models\IndicatorCategoryModel;
use App\Models\DocumentTypeModel;
use App\Models\ConsumptionModel;
use App\Models\Consumption_Sub_Category_Model;
use App\Models\IndicatorModel;
use App\Models\IndustryCategoryModel;
use App\Models\AssessmentModel;
use App\Models\AssessmentAnswerModel;
use App\Models\SupplierPlanModel;
use App\Models\CompanyModel;
use App\Models\DegreeModel;
use App\Models\Assessment;
use App\Models\ModuleModel;
use App\Models\SupplierModel;
use App\Models\GhgCategoryModel;
use App\Models\GhgModel;
use App\Models\DisclosureCategoryModel;
use App\Models\DisclosureModel;
use App\Models\GhgFactorModel;
use App\Models\CountryModel;
use App\Models\ModuleItemModel;
use App\Models\FootprintModel;
use App\Models\GhgQuestionModel;
use App\Models\StandardModel;
use App\Models\ClassificationModel;
use App\Models\FactorModel;
use App\Models\FlightDetailModel;
use App\Models\CompanyVehicleDetailModel;
use App\Models\VehicleModel;
use App\Models\AssessmentOffsetModel;
use App\Models\SupplierPlanAssessmentDetailsModel;
use App\Models\SupplierPlanAssessmentGhgDetailsModel;
use App\Models\SdgTargetModel;
use App\Models\UnitModel;
use App\Models\SubUnitModel;
use App\Models\StakeholderModel;
use App\Models\InitiativeModel;
use App\Models\FootprintTypeModel;
use App\Models\BadgeModel;
use App\Models\TransportationDetailModel;
use App\Models\HotelStayModel;
use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;
use App\Models\SubDisclosure;
use App\Models\MasterSubDis;
use App\Models\UserNotification;
use App\Models\DocumentStorage;

class Master extends BaseController
{
    private $helperData = array();
    public function __construct()
    {
        helper(['form', 'url', 'html', 'menu']);
        $session = \Config\Services::session();
        // $this->user_info = $this->session->get_userdata();
        $this->helperData = commonData();
    }
    public function index()
    {
        echo view('login');
    }
    public function sdg()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $data['title'] = 'SDGs Management';
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        echo view('admin/sdg', $data);
    }
    public function consumption()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Consumption Management';
        $query = $db->query("select * from consumption where status=1 ");
        $data['consumption'] = $query->getResultArray();
        echo view('admin/consumption', $data);
    }
    public function finance()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Finance Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from finance where status=1 ");
        $data['finance'] = $query->getResultArray();
        echo view('admin/finance', $data);
    }
    public function addfinance()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $financeModel = new FinanceModel();

        $finance = $this->request->getVar('finance_name');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from finance where finance_name='" . $finance . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $newName = "none.phg";
            if ($financeModel->insert(['finance_name' => $finance, 'image' => $newName, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                $session->setFlashdata('success', 'Finance Category has been saved successfully');
            } else {
                $session->setFlashdata('error', 'Finance Category Not Save');
            }
        } else {
            $session->setFlashdata('error', 'finance name ' . $finance . ' already exist!');
        }
        return redirect()->to('master/finance');
    }
    public function read_notification($id = null)
    {
        $db = \Config\Database::connect();
        $model = new UserNotification();
        $u_id = session()->supplier_info['supplier_id'];
        // print_r($u_id);
        // die;
        if ($id == null) {
            $db->query("UPDATE user_notification SET noti_read=1 where for_y=$u_id");
            return true;
        } else {
            $readed = ($model->where('id', $id)->first())['noti_read'];
            $db->query("UPDATE user_notification SET noti_read=1 where id=$id");
            echo $readed;
        }
    }

    public function addconsumption()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $consumptionModel = new ConsumptionModel();

        $consumption = $this->request->getVar('consumption_name');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from consumption where consumption_name='" . $consumption . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $newName = "none.phg";
            if ($consumptionModel->insert(['consumption_name' => $consumption, 'image' => $newName, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                $session->setFlashdata('success', 'Consumption Category has been saved successfully');
            } else {
                $session->setFlashdata('error', 'Consumption Category Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Consumption name ' . $consumption . ' already exist!');
        }
        return redirect()->to('master/consumption');
    }
    public function addsdg()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sdgModel = new SdgModel();

        $sdg = $this->request->getVar('sdg_name');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from sdg where sdg_name='" . $sdg . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/sdg', $newName)) {
                        if ($sdgModel->insert(['sdg_name' => $sdg, 'image' => $newName, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                            $session->setFlashdata('success', 'Sdg has been saved successfully');
                        } else {
                            $session->setFlashdata('error', 'Sdg Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid icon');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid icon');
                }
            }
        } else {
            $session->setFlashdata('error', 'Sdg name ' . $sdg . ' already exist!');
        }
        return redirect()->to('master/sdg');
    }
    public function editfinance()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $financeModel = new FinanceModel();

        $finance = $this->request->getVar('finance_name');
        $id = $this->request->getVar('id');
        //   $file = $this->request->getFile('file');
        $ava = $db->query("select * from finance where finance_name='" . $finance . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "finance_name" => $finance
            ];
            if ($financeModel->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Finance has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Sdg Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'finance name ' . $finance . ' already exist!');
        }
        return redirect()->to('master/finance');
    }
    public function editconsumption()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $consumptionModel = new ConsumptionModel();

        $consumption = $this->request->getVar('consumption_name');
        $id = $this->request->getVar('id');
        //   $file = $this->request->getFile('file');
        $ava = $db->query("select * from consumption where consumption_name='" . $consumption . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "consumption_name" => $consumption
            ];
            if ($consumptionModel->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Consumption has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Consumption Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Consumption name ' . $finance . ' already exist!');
        }
        return redirect()->to('master/consumption');
    }
    public function editSdg()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sdgModel = new SdgModel();

        $sdg = $this->request->getVar('sdg_name');
        $id = $this->request->getVar('id');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from sdg where sdg_name='" . $sdg . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/sdg', $newName)) {
                        $updated_data = [
                            "sdg_name" => $sdg,
                            "image" => $newName
                        ];
                        if ($sdgModel->where(['id' => $id])->set($updated_data)->update()) {
                            $session->setFlashdata('success', 'Sdg has been updated successfully');
                        } else {
                            $session->setFlashdata('error', 'Sdg Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid icon');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid icon');
                }
            } else {
                $updated_data = [
                    "sdg_name" => $sdg
                ];
                if ($sdgModel->where(['id' => $id])->set($updated_data)->update()) {
                    $session->setFlashdata('success', 'Sdg has been updated successfully');
                } else {
                    $session->setFlashdata('error', 'Sdg Not Updated');
                }
            }
        } else {
            $session->setFlashdata('error', 'Sdg name ' . $sdg . ' already exist!');
        }
        return redirect()->to('master/sdg');
    }






    // for category Page
    public function add_category()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {
            return redirect()->to('auth/logout');
        }

        $data['title'] = 'Category Manegment';
        $query = $db->query("select * from category_unit where status=1 ");
        $data['list'] = $query->getResultArray();
        // echo "<pre>";
        // print_r($data['category_unit']);
        // die;
        echo view('admin/category_show', $data);
    }

    //start safal code for unit category
    public function addUnitCategory()
    {
        $db = \Config\Database::connect();
        $categoryName = $this->request->getVar('unitcategory_name');
        $db->query("insert into category_unit(category_name)values('" . $categoryName . "')");

        return redirect()->to($this->request->getVar('url'));
    }
    //end safal code for unit category

    public function update_category()
    {
        $db = \Config\Database::connect();
        $db->query("UPDATE category_unit SET category_name='" . $this->request->getVar('up_cat') . "' WHERE id=" . $this->request->getVar('id'));
        return redirect()->to("Master/add_category");
    }
    public function delete_category($id)
    {
        $db = \Config\Database::connect();
        $db->query("UPDATE category_unit SET status='0' WHERE id=" . $id);
        return redirect()->to("master/add_category");
    }


    // For Category Unit  End -/-/-/

    public function deletebulkclassificationdata()
    {
        $classification_model = new ClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar('data');
        foreach ($id  as $idvalue) {
            if ($classification_model->where('id', $idvalue)->set(['status' => 0])->update()) {
                $msg = true;
            } else {
                $msg = false;
            }
        }
        echo $msg;
    }
    public function deletebulkvehicaldata()
    {
        $company_vehicle_detail_model = new CompanyVehicleDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar('data');

        foreach ($id  as $idvalue) {
            if ($company_vehicle_detail_model->where('id', $idvalue)->set(['status' => 0])->update()) {
                $msg = true;
            } else {
                $msg = false;
            }
        }
        echo $msg;
    }
    public function deletefinance($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $financeModel = new FinanceModel();
        if ($financeModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Finance has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Finance not deleted');
        }
        return redirect()->to('master/finance');
    }

    public function deletesubfinance($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $financeSubModel = new Finance_Sub_Category_Model();
        if ($financeSubModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Finance Sub has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Finance Sub not deleted');
        }
        return redirect()->to('assessment/FinanceSubCategory');
    }
    public function deleteconsumption($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $consumptionModel = new ConsumptionModel();
        if ($consumptionModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Consumption has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Consumption not deleted');
        }
        return redirect()->to('master/consumption');
    }
    public function deleteconsumptionsub($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $consumptionSubModel = new Consumption_Sub_Category_Model();
        if ($consumptionSubModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Consumption Sub has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Consumption Sub not deleted');
        }
        return redirect()->to('assessment/ConsumptionSubCategory');
    }
    public function deletesdg($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sdgModel = new SdgModel();
        if ($sdgModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Sdg has been delete successfully');
        } else {
            $session->setFlashdata('error', 'sdg not deleted');
        }
        return redirect()->to('master/sdg');
    }
    public function Impact()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Impact Details Management';
        $impact_model = new ImpactModel();


        $unit_model = new UnitModel();

        $data['unit'] = $unit_model->where('status', 1)->findAll();
        $query = $db->query("select ipt.*,u.unit_name  from nImpact as ipt join unit as u on u.id=ipt.impact_unit where ipt.status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/view-Impact-name', $data);
    }

    public function addimpactname()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $impact_model = new ImpactModel();
        $impact_name = $this->request->getVar('impact_name');


        $impact_unit = $this->request->getVar('impact_unit');

        $remark = $this->request->getVar('remark');
        $remark = "No Remark added sir not said to us";
        $ava = $db->query("select * from nImpact where impact_name='" . $impact_name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($impact_model->insert(['impact_name' => $impact_name, 'impact_unit' => $impact_unit, 'remark' => $remark, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                $session->setFlashdata('success', 'Impact name has been saved successfully');
            } else {
                $session->setFlashdata('error', 'Impact Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Impact Name ' . $industry_category_name . ' already exist!');
        }
        return redirect()->to('master/Impact');
    }



    public function editImpactName()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $impact_model = new ImpactModel();
        $impact_name = $this->request->getVar('impact_name');


        $impact_unit = $this->request->getVar('impact_unit');
        $id = $this->request->getVar('id');

        //   $ava = $db->query("select * from nImpact where impact_name='".$impact_name."' and impact_unit='".$impact_unit."' and status=1");
        $ava = $db->query("select * from nImpact where impact_name='" . $impact_name . "'  and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "impact_name" => $impact_name,

                "impact_unit" => $impact_unit
            ];
            if ($impact_model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Impact name has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Impact Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Impact Name ' . $impact_name . ' already exist!');
        }
        return redirect()->to('master/Impact');
    }

    public function deleteimpactdetails($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $industryModel = new IndustryModel();
        $impact_model = new ImpactModel();
        if ($impact_model->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Impact Deatils has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Impact Details not deleted');
        }
        return redirect()->to('master/Impact');
    }

    public function document_storage()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Indicator Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from supplier  where (role =0 OR role =11)");
        $data['supplier'] = $query->getResultArray();


        $query = $db->query("select * from document_Storage where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/document_storage', $data);
    }

    public function delete_doc_model($id)
    {
        $disclosure_model = new DocumentStorage();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {
            return redirect()->to('auth/logout');
        }
        if ($disclosure_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Disclosure has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/document_storage');
    }
    public function editlimitdocument()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {
            return redirect()->to('auth/logout');
        }
        $impact_model = new DocumentStorage();
        $user_name = $this->request->getVar('edit_user_name');
        $limit = $this->request->getVar('edit_limit');
        $unit = $this->request->getVar('edit_unit');

        $data = [
            "limit" => $limit,
            "unit" => $unit
        ];
        $update = $impact_model->update($this->request->getVar('user_ids'), $data);

        if ($update) {
            $session->setFlashdata('success', 'Limit has been successfully Updated');
        } else {
            $session->setFlashdata('error', 'Limit Not Updated');
        }

        return redirect()->to('master/document_storage');
    }

    public function addlimitdocument()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $impact_model = new DocumentStorage();
        $user_name = $this->request->getVar('user_name');


        $limit = $this->request->getVar('limit');
        $unit = $this->request->getVar('unit');

        //   $ava = $db->query("select * from nImpact where impact_name='".$impact_name."' and impact_unit='".$impact_unit."' and status=1");
        $alreadyUser = $impact_model->where('user_id', $user_name)->where('status', 1)->findAll();
        if ($alreadyUser) {
            $session->setFlashdata('error', 'User Exists');
        } else {
            $data = [
                "limit" => $limit,
                "user_id" => $user_name,
                "unit" => $unit
            ];
            $insert = $impact_model->insert($data);
        }

        if ($insert) {
            $session->setFlashdata('success', 'Limit has been successfully insert');
        } else {
            $session->setFlashdata('error', 'Limit Not Insert');
        }

        return redirect()->to('master/document_storage');
    }

    public function industrycategory()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        //$industryModel = new IndustryModel();
        //$module_item_model = new ModuleItemModel();
        $data['title'] = 'Industry Category Management';
        //$module_model = new ModuleModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industryModel->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from industry_category where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/industry-category', $data);
    }
    public function addindustrycategory()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $industryModel = new IndustryModel();
        $industryModel = new IndustryCategoryModel();
        $industry_category_name = $this->request->getVar('category_name');
        $ava = $db->query("select * from industry_category where industry_category_name='" . $industry_category_name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($industryModel->insert(['industry_category_name' => $industry_category_name, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                $session->setFlashdata('success', 'Industry category name has been saved successfully');
            } else {
                $session->setFlashdata('error', 'Sdg Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Industry Category Name ' . $industry_category_name . ' already exist!');
        }
        return redirect()->to('master/industrycategory');
    }
    public function editIndustryCategory()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryCategoryModel = new IndustryCategoryModel();
        $industry_category_name = $this->request->getVar('category_name');
        $id = $this->request->getVar('id');
        $ava = $db->query("select * from industry_category where industry_category_name='" . $industry_category_name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "industry_category_name" => $industry_category_name
            ];
            if ($industryCategoryModel->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Industry category name has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Industry Category Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Industry Category Name ' . $industry_category_name . ' already exist!');
        }
        return redirect()->to('master/industrycategory');
    }
    public function deleteindustrycategory($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $industryModel = new IndustryModel();
        $industryModel = new IndustryCategoryModel();
        if ($industryModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Industry category has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Industry category not deleted');
        }
        return redirect()->to('master/industrycategory');
    }
    public function deleteindustry($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryModel = new IndustryModel();
        if ($industryModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Industry category has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Industry category not deleted');
        }
        return redirect()->to('master/viewindustry');
    }
    public function indicatorcategory()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Indicator Category Management';
        //$module_model = new ModuleModel();
        //$industry_model = new IndustryModel();
        //$module_item_model = new ModuleItemModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/indicator-category', $data);
    }
    public function addindicatorcategory()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryModel = new IndicatorCategoryModel();
        $industry_description = $this->request->getVar('description');
        $industry_category_name = $this->request->getVar('category_name');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from indicator_category where indicator_category_name='" . $industry_category_name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/sdg', $newName)) {
                        if ($industryModel->insert(['indicator_category_name' => $industry_category_name, 'description' => $industry_description, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'image' => $newName])) {
                            $session->setFlashdata('success', 'Indicator category name has been saved successfully');
                        } else {
                            $session->setFlashdata('error', 'Sdg Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid icon');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid icon');
                }
            } else {
                $session->setFlashdata('error', 'Please select a valid icon');
            }
        } else {
            $session->setFlashdata('error', 'Indicator Category Name ' . $industry_category_name . ' already exist!');
        }
        return redirect()->to('master/indicatorcategory');
    }
    public function editIndicatorCategory()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryModel = new IndicatorCategoryModel();
        $id = $this->request->getVar('id');
        $industry_description = $this->request->getVar('description');
        $industry_category_name = $this->request->getVar('category_name');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from indicator_category where indicator_category_name='" . $industry_category_name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    $file->move('public/uploads/sdg', $newName);
                    $updated_data = [
                        "indicator_category_name" => $industry_category_name,
                        "description" => $industry_description,
                        "image" => $newName
                    ];
                } else {
                    $session->setFlashdata('error', 'Please upload a valid icon');
                }
            } else {
                echo 'c';
                $updated_data = [
                    "indicator_category_name" => $industry_category_name,
                    "description" => $industry_description
                ];
            }
            if ($industryModel->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Indicator category name has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Indicator Category Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Indicator Category Name ' . $industry_category_name . ' already exist!');
        }
        return redirect()->to('master/indicatorcategory');
    }
    public function deleteindicatorcategory($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryModel = new IndicatorCategoryModel();
        if ($industryModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Indicator category has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Indicator category not deleted');
        }
        return redirect()->to('master/indicatorcategory');
    }
    public function deleteIndicator($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industryModel = new IndicatorModel();
        if ($industryModel->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Indicator has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Indicator not deleted');
        }
        return redirect()->to('master/viewindicator');
    }
    public function documenttype()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Document Type Management';
        $query = $db->query("select * from document_type where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/document-type', $data);
    }
    public function adddocumenttype()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new DocumentTypeModel();
        $name = $this->request->getVar('name');



        $description = $this->request->getPost('description');
        $ava = $db->query("select * from document_type where document_type_name='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($model->insert(['document_type_name' => $name, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')])) {
                $session->setFlashdata('success', 'Document Type has been saved successfully');
            } else {
                $session->setFlashdata('error', ' Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Document Type ' . $name . ' already exist!');
        }
        return redirect()->to('master/documenttype');
    }
    public function editDocumentType()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new DocumentTypeModel();
        $name = $this->request->getVar('name');
        $id = $this->request->getVar("id");



        $description = $this->request->getPost('description');
        $ava = $db->query("select * from document_type where document_type_name='" . $name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "document_type_name" => $name

            ];
            if ($model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Document Type has been updated successfully');
            } else {
                $session->setFlashdata('error', ' Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Document Type ' . $name . ' already exist!');
        }
        return redirect()->to('master/documenttype');
    }
    public function deleteDocumentType($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new DocumentTypeModel();
        if ($model->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Document Type  has been delete successfully');
        } else {
            $session->setFlashdata('error', 'Document Type not deleted');
        }
        return redirect()->to('master/documenttype');
    }
    public function indicator()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Indicator Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        echo view('admin/indicator', $data);
    }
    public function addIndicator()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new IndicatorModel();
        $indicator_category_id = $this->request->getVar('indicator_category_id');
        $name = $this->request->getVar('name');
        $sdg_id = $this->request->getVar('sdg_id');


        $description = $this->request->getVar('description');
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from indicator where indicator_name='" . $name . "' and indicator_category_id='" . $indicator_category_id . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/sdg', $newName)) {
                        $indicator_id = $model->insert(['description' => $description, 'indicator_category_id' => $indicator_category_id, 'indicator_name' => $name, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'image' => $newName]);
                        if ($indicator_id) {
                            if (!empty($sdg_id)) {
                                foreach ($sdg_id as $d) {
                                    $db->query("insert into indicator_sdg(indicator_id,description,sdg_id,user_id,status,created_at)values('" . $indicator_id . "','" . $description . "','" . $d . "',1,1,'" . date('Y-m-d H:i:s') . "' )");
                                }
                            }
                            $session->setFlashdata('success', 'Indicator has been saved successfully');
                        } else {
                            $session->setFlashdata('error', ' Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Icon not upload');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select valid icon');
                }
            } else {
                // echo 'b';
                $session->setFlashdata('error', 'Please select valid icon');
            }
        } else {
            $session->setFlashdata('error', 'Indicator ' . $name . ' already exist!');
        }
        return redirect()->to('master/viewindicator');
    }
    public function viewindicator()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Indicator Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from indicator where status=1 order by id");
        $rs = $query->getResultArray();
        $list = array();
        if (!empty($rs)) {
            foreach ($rs as $r) {
                $query = $db->query("select * from indicator_category where status=1 and id='" . $r['indicator_category_id'] . "' ");
                $cat = $query->getResultArray();
                if (!empty($cat)) {
                    $category_name = $cat[0]['indicator_category_name'];
                } else {
                    $category_name = 0;
                }
                $query = $db->query("select *,s.id as indicator_sdg_id  from indicator_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.indicator_id='" . $r['id'] . "' and b.status=1 ");
                $sdg = $query->getResultArray();
                $list[] = array('description' => $r['description'], 'indicator_id' => $r['id'], 'indicator_name' => $r['indicator_name'], 'indicator_category_name' => $category_name, 'image' => $r['image'], 'sdg' => $sdg);
            }
        }
        $data['list'] = $list;
        echo view('admin/view-indicator', $data);
    }
    public function editIndicator($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Indicator Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();
        $query = $db->query("select * from indicator where status=1 and id=" . $id);
        $data['list'] = $query->getRow();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        $query = $db->query("select sdg_id from indicator_sdg where indicator_id=" . $id . " and status=1");
        $data['indicator_sdg'] = $query->getResultArray();
        echo view('admin/edit-indicator', $data);
    }
    public function updateIndicator()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new IndicatorModel();
        $name = $this->request->getVar('name');
        $id = $this->request->getVar("id");


        $description = $this->request->getVar("description");
        $file = $this->request->getFile('file');
        $sdg_id_arr = $this->request->getVar("sdg_id");
        $indicator_category_id = $this->request->getVar("indicator_category_id");
        $ava = $db->query("select * from indicator where indicator_name='" . $name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    $file->move('public/uploads/sdg', $newName);
                    $updated_data = [
                        "indicator_name" => $name,

                        "description" => $description,
                        "indicator_category_id" => $indicator_category_id,
                        "image" => $newName
                    ];
                } else {
                    $session->setFlashdata('error', 'Please upload a valid icon');
                }
            } else {
                $updated_data = [
                    "indicator_name" => $name,

                    "description" => $description,
                    "indicator_category_id" => $indicator_category_id
                ];
            }
            if ($model->where(['id' => $id])->set($updated_data)->update()) {
                // $db->query("update indicator_sdg set status=0 where indicator_id=".$id);
                if (!empty($sdg_id_arr)) {
                    // echo '<pre>';
                    foreach ($sdg_id_arr as $sdg_id) {
                        $indi_sdg = $db->query("select * from indicator_sdg where indicator_id='" . $id . "' and sdg_id=" . $sdg_id);
                        $indi_sdg = $indi_sdg->getRow();
                        if (empty($indi_sdg)) {
                            $db->query("insert into indicator_sdg(indicator_id,sdg_id,user_id,status,created_at)values('" . $id . "','" . $sdg_id . "',1,1,'" . date('Y-m-d H:i:s') . "' )");
                        } else {
                            $db->query("update indicator_sdg set status=1 where id=" . $indi_sdg->id);
                        }
                    }
                }
                $session->setFlashdata('success', 'Indicator has been updated successfully');
            } else {
                $session->setFlashdata('error', ' Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Indicator ' . $name . ' already exist!');
        }
        return redirect()->to('master/viewindicator');
    }
    public function deleteIndicatorSdg($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $query = $db->query("update indicator_sdg set status=0 where id='" . $id . "'");
        $session->setFlashdata('success', 'SDG has beed successfully remove with indicator');
        return redirect()->to('master/viewindicator');
    }
    public function industry()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $data['title'] = 'Industry Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from industry_category where status=1 ");
        $data['industry_category'] = $query->getResultArray();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        echo view('admin/industry', $data);
    }
    public function addIndustry()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new IndustryModel();
        $industry_category_id = $this->request->getVar('industry_category_id');
        $name = $this->request->getVar('name');
        $sdg_id = $this->request->getVar('sdg_id');
        $ava = $db->query("select * from industry where industry_name='" . $name . "' and industry_category_id='" . $industry_category_id . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $industry_id = $model->insert(['industry_category_id' => $industry_category_id, 'industry_name' => $name, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')]);
            if ($industry_id) {
                if (!empty($sdg_id)) {
                    foreach ($sdg_id as $d) {
                        $db->query("insert into industry_sdg(industry_id,sdg_id,user_id,status,created_at)values('" . $industry_id . "','" . $d . "',1,1,'" . date('Y-m-d H:i:s') . "' )");
                    }
                }
                $session->setFlashdata('success', 'Industry has been saved successfully');
            } else {
                $session->setFlashdata('error', ' Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Industry ' . $name . ' already exist!');
        }
        return redirect()->to('master/viewindustry');
    }
    public function viewindustry()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Industry Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();        
        $query = $db->query("select * from industry where status=1 order by id");
        $rs = $query->getResultArray();
        $list = array();
        if (!empty($rs)) {
            foreach ($rs as $r) {
                $query = $db->query("select * from industry_category where status=1 and id='" . $r['industry_category_id'] . "' ");
                $cat = $query->getResultArray();
                if (!empty($cat)) {
                    $category_name = $cat[0]['industry_category_name'];
                } else {
                    $category_name = 0;
                }
                $query = $db->query("select *,s.id as industry_sdg_id  from industry_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.industry_id='" . $r['id'] . "' and b.status=1 ");
                $sdg = $query->getResultArray();
                $list[] = array('industry_id' => $r['id'], 'industry_name' => $r['industry_name'], 'industry_category_name' => $category_name, 'sdg' => $sdg);
            }
        }
        $data['list'] = $list;
        $data['degree'] = $db->query("select * from degree where status=1")->getResultArray();
        echo view('admin/view-industry', $data);
    }
    public function deleteIndustrySdg($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $query = $db->query("update industry_sdg set status=0 where id='" . $id . "'");
        $session->setFlashdata('success', 'SDG has beed successfully remove with industry');
        return redirect()->to('admin/viewindustry');
    }
    public function viewAssessment()
    {
        $db = \Config\Database::connect();
        $data['title'] = 'Assessment Questions Management';
        // $assessment = $db->query("select * from base_assessment_question where status=1");
        // $data['list'] = $assessment->getResultArray();
        // echo '<pre>';
        // print_r($data['list']);die;
        $query = $db->query("select * from base_assessment_question where status=1");
        $rs = $query->getResultArray();
        $list = array();
        if (!empty($rs)) {
            foreach ($rs as $r) {
                $query = $db->query("select * from industry where status=1 and id='" . $r['industry_id'] . "' ");
                $industry = $query->getResultArray();
                if (!empty($industry)) {
                    $industry_name = $industry[0]['industry_name'];
                } else {
                    $industry_name = 0;
                }
                $query = $db->query("select * from indicator where status=1 and id='" . $r['indicator_id'] . "' ");
                $indicator = $query->getResultArray();
                if (!empty($indicator)) {
                    $indicator_name = $indicator[0]['indicator_name'];
                } else {
                    $indicator_name = 0;
                }
                $query = $db->query("select * from indicator_category where status=1 and id='" . $r['indicator_category_id'] . "' ");
                $indicator_category = $query->getResultArray();
                if (!empty($indicator_category)) {
                    $indicator_category_name = $indicator_category[0]['indicator_category_name'];
                } else {
                    $indicatory_category_name = 0;
                }
                // $query = $db->query("select *,s.id as industry_sdg_id  from industry_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.industry_id='".$r['id']."' and b.status=1 ");
                // $sdg = $query->getResultArray();
                $list[] = array('assessment_id' => $r['id'], 'industry_name' => $industry_name, 'indicator_name' => $indicator_name, 'indicator_category_name' => $indicator_category_name, 'question' => $r['question'], 'choice' => $r['choice'], 'remark' => $r['remark']);
            }
        }
        $data['list'] = $list;
        // echo '<pre>';
        // print_r($data['list']);
        // die();
        return view('admin/view-assessment', $data);
    }
    public function editAssessmentQuestion($id)
    {
        $db = \Config\Database::connect();
        // $rs=$db->query("select *,base_assessment_answer.answer,base_assessment_answer.marks,base_assessment_answer.degree_id from base_assessment_question left join base_assessment_answer on base_assessment_question.id=base_assessment_answer.base_assessment_question_id");
        // $rs = $rs->getResultArray();
        $rs = $db->query("select * from base_assessment_question where id=" . $id);
        $data['rs'] = $rs->getRow();
        // echo '<pre>';
        // print_r($data['rs']);
        // die();
        $query = $db->query("select * from industry where status=1 ");
        $data['industry'] = $query->getResultArray();
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();
        $query = $db->query("select * from indicator where indicator_category_id=" . $data['rs']->indicator_category_id . " and status=1");
        $data['indicator'] = $query->getResultArray();
        // echo '<pre>';
        // print_r($data['indicator']);
        // die();
        return view('admin/edit-assessment-question.php', $data);
    }
    public function updateAssessmentQuestion()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new AssessmentModel();
        $answer_model = new AssessmentAnswerModel();
        $id = $this->request->getVar("id");
        $industry_id = $this->request->getVar('industry_id');
        $indicator_category_id = $this->request->getVar('indicator_category_id');
        $indicator_id = $this->request->getVar('indicator_id');
        $question = $this->request->getVar('question');
        $choice = $this->request->getVar('choice');
        $remark = $this->request->getVar('remark');
        $answer = $this->request->getVar('answer');
        // echo '<pre>';
        // print_r(count($answer));
        // die();
        $mark = $this->request->getVar('marks');
        $degree = $this->request->getVar('degree_id');
        $updated_data = [
            'industry_id' => $industry_id,
            'indicator_category_id' => $indicator_category_id,
            'indicator_id' => $indicator_id,
            'question' => $question,
            'choice' => $choice,
            'status' => 1,
            'user_id' => 1,
            'remark' => $remark
        ];
        $questionId = $model->where(['id' => $id])->set($updated_data)->update();
        if ($questionId) {
            if ($answer[0] != "") {
                foreach ($answer as $key => $r) {
                    $answer_id = $answer_model->insert(['base_assessment_question_id' => $id, 'answer' => $r, "marks" => $mark[$key], "degree_id" => $degree[$key], "status" => 1, "user_id" => 1, "created_at" => date('Y-m-d H:i:s')]);
                }
            }
        }
        if ($questionId) {
            $session->setFlashdata('success', 'Assessment Question has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Not Saved');
        }
        return redirect()->to('master/viewAssessment');
    }
    public function getAnswers($id)
    {
        $db = \Config\Database::connect();
        $data = '';
        $query = $db->query("select * from base_assessment_answer where status=1 and base_assessment_question_id='" . $id . "' ");
        $answers = $query->getResultArray();
        $data .= "<table class='table table-bordered table-hover'>";
        $data .= "<tr>";
        $data .= "<th>#</th>";
        $data .= "<th>Answer</th>";
        $data .= "<th>Marks</th>";
        $data .= "<th>Degree</th>";
        $data .= "<th>Action</th>";
        $data .= "</tr>";
        if (!empty($answers)) {
            $s = 1;
            foreach ($answers as $key => $ans) {
                $data .= "<tr>";
                $data .= "<td>" . $s . "</td>";
                $data .= "<td>";
                $data .= $ans['answer'];
                $data .= "</td>";
                $data .= "<td>";
                $data .= $ans['marks'];
                $data .= "</td>";
                $data .= "<td>";
                $data .= $ans["degree_id"];
                $data .= "</td>";
                $data .= "<td>";
                $data .= "<a class='btn btn-primary' href='#' onclick='editSdg(this)' data-id='" . $ans['id'] . "' data-answer='" . $ans['answer'] . "' data-marks='" . $ans['marks'] . "' data-degree='" . $ans['degree_id'] . "' ><i class='fa fa-pencil'></i></a>";
                $data .= "<a class='btn btn-danger' href='" . base_url() . "/master/deleteAnswer/" . $ans['id'] . "' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>";
                $data .= "</td>";
                $data .= "</tr>";
                $s++;
            }
        }
        $data .= "</table>";
        return $data;
    }
    public function editAnswer()
    {
        $answer_model = new AssessmentAnswerModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $answer = $this->request->getVar("answer");
        $marks = $this->request->getVar("marks");
        $degree_id = $this->request->getVar("degree_id");
        $updated_data = [
            "answer" => $answer,
            "marks" => $marks,
            "degree_id" => $degree_id
        ];
        if ($answer_model->where(['id' => $id])->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Answer has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update answer');
        }
        return redirect()->to('master/viewAssessment');
    }
    public function deleteAnswer($id)
    {
        $answer_model = new AssessmentAnswerModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($answer_model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Answer has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete answer');
        }
        return redirect()->to('master/viewAssessment');
    }
    public function deleteAssessmentQuestion($id)
    {
        $assessment_model = new AssessmentModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($assessment_model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Assessment Question has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete assessment question');
        }
        return redirect()->to('master/viewAssessment');
    }
    public function supplierPlan()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $data['title'] = 'View Supplier Plan';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from supplier_plan where status=1 order by id");
        $data['list'] = $query->getResultArray();
        echo view('admin/supplier-plan', $data);
    }
    public function addSupplierPlan()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $data['title'] = 'Add Supplier Plan';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from company where status=1 ");
        $data['company'] = $query->getResultArray();
        echo view('admin/add-supplier-plan', $data);
    }
    public function addSupplierPlanSubmit()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new SupplierPlanModel();

        $company_id = $this->request->getVar('company_id');
        $plan_name = $this->request->getVar('plan_name');
        $plan_price = $this->request->getVar('plan_price');

        $admin_num = $this->request->getVar('admin_num');

        $employee_num = $this->request->getVar('employee_num');

        $manager_num = $this->request->getVar('manager_num');
        $plan_validity = $this->request->getVar('plan_validity');
        $plan_validity_time = $this->request->getVar('plan_validity_time');
        $description = $this->request->getVar('description');
        $no_of_user = $this->request->getVar('no_of_user');

        $ava = $db->query("select * from supplier_plan where plan_name='" . $plan_name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $plan_id = $model->insert(['company_id' => $company_id, 'plan_name' => $plan_name, 'manager_num' => $manager_num, 'employee_num' => $employee_num, 'admin_num' => $admin_num, 'plan_price' => $plan_price, 'plan_validity' => $plan_validity, 'plan_validity_time' => $plan_validity_time, 'description' => json_encode($description), 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'no_of_user' => $no_of_user]);
            if ($plan_id) {
                $url = "https://api.stripe.com/v1/products";
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $headers = array(
                    "Content-Type: application/x-www-form-urlencoded",
                    'Authorization: Bearer ' . stripe_secret_key
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                $data = "name=" . $plan_name . "";
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $resp = curl_exec($curl);
                curl_close($curl);
                $product = json_decode($resp);
                $update_product = $db->query("update supplier_plan set stripe_product_id='" . $product->id . "' where id='" . $plan_id . "' ");
                $url = "https://api.stripe.com/v1/prices";
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $headers = array(
                    "Content-Type: application/x-www-form-urlencoded",
                    'Authorization: Bearer ' . stripe_secret_key
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                $data = "unit_amount=" . $plan_price . "&currency=inr&recurring[interval]=" . $plan_validity . "&recurring[interval_count]=" . $plan_validity_time . "&product=" . $product->id;
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $resp = curl_exec($curl);
                curl_close($curl);
                $price = json_decode($resp);
                $update_product = $db->query("update supplier_plan set stripe_price_id='" . $price->id . "' where id='" . $plan_id . "' ");
                $session->setFlashdata('success', 'Supplier Plan has been saved successfully');
            } else {
                $session->setFlashdata('error', ' Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Plan name ' . $plan_name . ' already exist!');
        }
        return redirect()->to('master/supplierplan');
    }
    public function company()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $data['title'] = 'Company Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from company where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/company', $data);
    }
    public function addCompanySize()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new CompanyModel();
        $name = $this->request->getVar('name');
        $ava = $db->query("select * from company where company_size='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $industry_id = $model->insert(['company_size' => $name, 'status' => 1, 'user_id' => 1, 'created_at' => date('Y-m-d H:i:s')]);
            if ($industry_id) {
                $session->setFlashdata('success', 'Company Size has been saved successfully');
            } else {
                $session->setFlashdata('error', ' Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Company Size ' . $name . ' already exist!');
        }
        return redirect()->to('master/company');
    }
    public function deleteCompanySize($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new CompanyModel();
        if ($model->update($id, ['status' => 0])) {
            $session->setFlashdata('success', 'Company has been delete successfully');
        } else {
            $session->setFlashdata('error', 'sdg not deleted');
        }
        return redirect()->to('master/company');
    }
    public function editCompanySize()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new CompanyModel();
        $name = $this->request->getVar('name');
        $id = $this->request->getVar('id');
        $ava = $db->query("select * from company where company_size='" . $name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "company_size" => $name
            ];
            if ($model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Company Size has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Company Size Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Company Size ' . $name . ' already exist!');
        }
        return redirect()->to('master/company');
    }
    public function editIndustry($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Industry Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from industry_category where status=1 ");
        $data['industry_category'] = $query->getResultArray();
        $query = $db->query("select * from industry where status=1 and id=" . $id);
        $data['list'] = $query->getRow();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        $query = $db->query("select sdg_id from industry_sdg where industry_id=" . $id . " and status=1");
        $data['industry_sdg'] = $query->getResultArray();
        // echo '<pre>';
        // print_r($data['industry_category']);
        // print_r($data['list']);
        // print_r($data['industry_sdg']);
        // die();
        echo view('admin/edit-industry', $data);
    }
    public function updateIndustry()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new IndustryModel();
        $name = $this->request->getVar('name');
        $id = $this->request->getVar("id");
        $sdg_id_arr = $this->request->getVar("sdg_id");
        $industry_category_id = $this->request->getVar("industry_category_id");
        $ava = $db->query("select * from industry where industry_name='" . $name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "industry_name" => $name,
                "industry_category_id" => $industry_category_id
            ];
            if ($model->where(['id' => $id])->set($updated_data)->update()) {
                $db->query("update industry_sdg set status=0 where industry_id=" . $id);
                if (!empty($sdg_id_arr)) {
                    // echo '<pre>';
                    foreach ($sdg_id_arr as $sdg_id) {
                        $indi_sdg = $db->query("select * from industry_sdg where industry_id='" . $id . "' and sdg_id=" . $sdg_id);
                        $indi_sdg = $indi_sdg->getRow();
                        // print_r($indi_sdg);
                        if (empty($indi_sdg)) {
                            $db->query("insert into industry_sdg(industry_id,sdg_id,user_id,status,created_at)values('" . $id . "','" . $sdg_id . "',1,1,'" . date('Y-m-d H:i:s') . "' )");
                        } else {
                            $db->query("update industry_sdg set status=1 where id=" . $indi_sdg->id);
                        }
                    }
                    // die();
                }
                $session->setFlashdata('success', 'Industry has been updated successfully');
            } else {
                $session->setFlashdata('error', ' Not Updated');
            }
        } else {
            $session->setFlashdata('error', 'Industry ' . $name . ' already exist!');
        }
        return redirect()->to('master/viewindustry');
    }
    public function deleteSupplierPlan($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new SupplierPlanModel();
        if ($model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Supplier plan has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/supplierPlan');
    }
    public function editSupplierPlan($id)
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $company_model = new CompanyModel();
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data["company"] = $company_model->select("*")->where('status', 1)->findAll();
        $supplier_plan_model = new SupplierPlanModel();
        $data["supplier_plan"] = $supplier_plan_model->select("*")->where('id', $id)->first();
        return view("admin/edit-supplier-plan", $data);
    }
    public function updateSupplierPlan()
    {
        $model = new SupplierPlanModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $company_id = $this->request->getVar("company_id");
        $plan_name = $this->request->getVar("plan_name");
        $plan_price = $this->request->getVar("plan_price");
        $no_of_user = $this->request->getVar("no_of_user");
        $plan_validity = $this->request->getVar("plan_validity");
        $plan_validity_time = $this->request->getVar("plan_validity_time");
        $description = $this->request->getVar("description");
        $ava = $db->query("select * from supplier_plan where plan_name='" . $plan_name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        $updated_data = [
            "company_id" => $company_id,
            "plan_name" => $plan_name,
            "plan_price" => $plan_price,
            "description" => json_encode($description),
            "plan_validity" => $plan_validity,
            "plan_validity_time" => $plan_validity_time,
            "no_of_user" => $no_of_user,
        ];
        if (empty($ava)) {
            if ($model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata("success", "Supplier plan has been successfully updated");
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata('error', 'Plan name ' . $plan_name . ' already exist!');
        }
        return redirect()->to('master/supplierplan');
    }
    public function degree()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $model = new DegreeModel();
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data["list"] = $model->select("*")->where('status', 1)->findAll();
        return view('admin/degree.php', $data);
    }
    public function addDegree()
    {
        $db = \Config\Database::connect();
        $model = new DegreeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar("name");
        $ava = $db->query("select * from degree where name='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        $data = [
            "name" => $name,
            "status" => 1
        ];
        if (empty($ava)) {
            if ($model->insert($data)) {
                $session->setFlashdata("success", "Degree has been successfully saved");
            } else {
                $session->setFlashdata("error", "Error to save");
            }
        } else {
            $session->setFlashdata("error", "Degree name " . $name . " already exists");
        }
        return redirect()->to('master/degree');
    }
    public function deleteDegree($id)
    {
        $model = new DegreeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Degree has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/degree');
    }
    public function editDegree()
    {
        $db = \Config\Database::connect();
        $model = new DegreeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $data = [
            "name" => $name
        ];
        $ava = $db->query("select * from degree where name='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($model->where(['id' => $id])->set($data)->update()) {
                $session->setFlashdata("success", "Degree has been successfully updated");
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata("error", "Degree name " . $name . " already exists");
        }
        return redirect()->to('master/degree');
    }
    public function getIndicatorByIndicatorCategorymaster($id)
    {
        $db = \Config\Database::connect();
        $data = '';
        $query = $db->query("select * from indicator where status=1 and indicator_category_id='" . $id . "' ");
        $cat = $query->getResultArray();
        $data .= "<option value=''>Select Indicator</option>";
        if (!empty($cat)) {
            foreach ($cat as $c) {
                $data .= "<option value=" . $c['id'] . ">" . $c['indicator_name'] . "</option>";
            }
        }
        return $data;
    }
    public function addAssessment()
    {
        $data = $this->helperData;

        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_model = new IndustryModel();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();

        $data['industry'] = $industry_model->select("*")->where('status', 1)->findAll();

        $query = $db->query("select * from countries");
        $data['country'] = $query->getResultArray();


        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();


        $query = $db->query("select * from company where status=1 ");
        $data['company'] = $query->getResultArray();
        return view('admin/add-assessment.php', $data);
    }
    public function addAssessmentSubmit()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $assessment_model = new Assessment();

        $name = $this->request->getVar('name');
        $title = $this->request->getVar('title');
        // $weight_percentage = $this->request->getVar('weight_percentage');
        $description = $this->request->getVar('description');
        $file = $this->request->getFile('file');




        $industry_id = $this->request->getVar('industry_id');
        $location_id = $this->request->getVar('location_id');
        $company_size = $this->request->getVar('company_size');


        //   $indicator_category_id = $this->request->getVar('indicator_category_id');
        $indicator_category_id = $this->request->getVar('indicator_category_id');



        $indicator_id = $this->request->getVar('indicator_id');
        //   $indicator_id = $this->request->getVar('indicator_id');


        $boundary = $this->request->getVar('boundary');



        $ava = $db->query("select * from assessment where assessment_name='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();

                    if ($file->move(WRITEPATH . 'public/uploads/assessment', $newName)) {


                        $data = [
                            "assessment_name" => $name,
                            "title" => $title,
                            "description" => $description,
                            "indicator_id" => $indicator_id,
                            "indicator_category_id" => $indicator_category_id,
                            "industry_id" => $industry_id,
                            "location_id" => $location_id,


                            "company_size" => $company_size,
                            "boundary" => '43',

                            "image" => $newName,
                            "user_id" => 1,
                            "status" => 1
                        ];
                        // print_r($data);
                        // die();
                        if ($assessment_model->insert($data)) {
                            $session->setFlashdata('success', 'Assessment has been saved successfully');
                        } else {
                            $session->setFlashdata('error', 'Assessment Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid icon');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid icon');
                }
            }
        } else {
            $session->setFlashdata('error', 'Assessment name ' . $name . ' already exist!');
        }
        return redirect()->to('master/assessment');
    }
    public function assessment()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $assessment_model = new Assessment();
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();        
        $data['list'] = $assessment_model->select("*")->where('status', 1)->findAll();
        return view('admin/assessment.php', $data);
    }
    public function deleteAssessment($id)
    {
        $assessment_model = new Assessment();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($assessment_model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Assessment has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/assessment');
    }
    public function editAssessment($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $industry_model = new IndustryModel();
        if (!$session->get('user_info')) return redirect()->to('auth/logout');
        $assessment_model = new Assessment();
        $data['assessment'] = $assessment_model->where('id', $id)->first();
        // echo "<pre>";
        // print_r($data['assessment']);die;
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();
        $query1 = $db->query("select * from indicator where status=1 and indicator_category_id= '" . $data['assessment']['indicator_category_id'] . "' "); //safal code
        $data['indicator'] = $query1->getResultArray(); //safal code
        $data['industry'] = $industry_model->select("*")->where('status', 1)->findAll();
        $data['country'] = $db->query("select * from countries")->getResultArray();
        $data['company'] = $db->query("select * from company where status=1 ")->getResultArray();
        $data['boundary_item'] = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ")->getResultArray();
        $data['indicator_category'] = $db->query("select * from indicator_category where status=1 ")->getResultArray();
        return view('admin/edit-assessment', $data);
    }
    public function updateAssessment()
    {
        $db = \Config\Database::connect();
        $session = session();
        if (!$session->get('user_info')) return redirect()->to('auth/logout');
        $assessment_model = new Assessment();
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $title = $this->request->getVar("title");
        $industry_id = $this->request->getVar('industry_id');
        $location_id = $this->request->getVar('location_id');
        $company_size = $this->request->getVar('company_size');
        $boundary = $this->request->getVar('boundary');
        $weight_percentage = $this->request->getVar("weight_percentage");
        $indicator_category_id = $this->request->getVar('indicator_category_id'); //safal code
        $indicator_id = $this->request->getVar('indicator_id'); // safal code
        $description = $this->request->getVar("description");
        $file = $this->request->getFile('file');
        $ava = $db->query("select * from assessment where assessment_name='" . $name . "' and status=1 and id!=" . $id)->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/assessment', $newName)) {
                        $data = [
                            "assessment_name" => $name,
                            "title" => $title,
                            "description" => $description,
                            "indicator_id" => $indicator_id,
                            "indicator_category_id" => $indicator_category_id,
                            "industry_id" => $industry_id,
                            "location_id" => $location_id,

                            "company_size" => $company_size,
                            "boundary" => $boundary,
                            "image" => $newName,
                            "user_id" => 1,
                            "status" => 1
                        ];
                        if ($assessment_model->where(['id' => $id])->set($data)->update()) {
                            $session->setFlashdata('success', 'Assessment has been saved successfully');
                        } else $session->setFlashdata('error', 'Assessment Not Save');
                    } else $session->setFlashdata('error', 'Please select a valid icon');
                } else $session->setFlashdata('error', 'Please select a valid icon');
            } else {
                $data = [
                    "assessment_name" => $name,
                    "title" => $title,
                    "description" => $description,
                    "indicator_id" => $indicator_id,
                    "indicator_category_id" => $indicator_category_id,
                    "industry_id" => $industry_id,
                    "location_id" => $location_id,
                    "company_size" => $company_size,
                    "boundary" => $boundary,
                    "user_id" => 1,
                    "status" => 1
                ];
                if ($assessment_model->where('id', $id)->set($data)->update()) {
                    $session->setFlashdata("success", "Assessment has been successfully updated");
                } else {
                    $session->setFlashdata("error", "Error to update");
                }
            }
        } else {
            $session->setFlashdata('error', 'Assessment name ' . $name . ' already exist!');
        }
        return redirect()->to('master/assessment');
    }

    public function supplier($industry_id)
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $supplier_model = new SupplierModel();
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $supplier_model->where(['status' => 1, 'industry_id' => $industry_id])->findAll();
        return view('admin/view-supplier', $data);
    }
    public function ghgcategory()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        $ghg_category_model = new GhgCategoryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $ghg_category_model->where('status', 1)->findAll();
        return view('admin/view-ghg-category.php', $data);
    }
    public function addGhgCategory()
    {
        $ghg_category_model = new GhgCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar('name');
        $data = [
            'ghg_category_name' => $name,
            'user_id' => 1,
            'status' => 1
        ];
        if ($ghg_category_model->insert($data)) {
            $session->setFlashdata('success', 'Ghg Category has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/ghgcategory');
    }
    public function editGhgCategory()
    {
        $ghg_category_model = new GhgCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $updated_data = [
            'ghg_category_name' => $name
        ];
        if ($ghg_category_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Ghg Category has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        return redirect()->to('master/ghgcategory');
    }
    public function deleteGhgCategory($id)
    {
        $ghg_category_model = new GhgCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($ghg_category_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Ghg category has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/ghgcategory');
    }
    public function ghg()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        $ghg_category_model = new GhgCategoryModel();
        // $module_item_model = new ModuleItemModel();
        $boundaries_id_model = new SupplierModuleItemModel();
        $footprint_model = new FootprintModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['ghg_category'] = $ghg_category_model->where('status', 1)->findAll();
        $data['boundaries'] = $boundaries_id_model->where('status', 1)->where('supplier_module_id', '45')->findAll();
        $data['footprint'] = $footprint_model->where('status', 1)->findAll();
        // $data['list'] = $db->query("select ghg.*,ghg_category.ghg_category_name,footprint.footprint_name from ghg left join ghg_category on ghg.ghg_category_id=ghg_category.id left join footprint on ghg.footprint_id=footprint.id where ghg.status=1")->getResultArray();
        $data['list'] = $db->query("SELECT ghg.*, ghg_category.ghg_category_name, supplier_module_item.item_name FROM ghg LEFT JOIN ghg_category ON ghg.ghg_category_id = ghg_category.id LEFT JOIN supplier_module_item ON ghg.boundary_id = supplier_module_item.id WHERE ghg.status = 1")->getResultArray();
        return view('admin/view-ghg.php', $data);
    }
    public function addGhg()
    {
        $ghg_model = new GhgModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar("name");
        $category_id = $this->request->getVar("category_id");
        $footprint_id = $this->request->getVar("footprint_id");
        $item_allowed = $this->request->getVar("item_allowed");

        $boundaries_id = $this->request->getVar("boundaries_id");
        $data = [
            "ghg_name" => $name,
            "ghg_category_id" => $category_id,
            "footprint_id" => $footprint_id,

            "boundary_id" => $boundaries_id,
            "user_id" => 1,
            "item_allowed" => '10
                                            ',
            "item_allowed" => '10',
            "status" => 1
        ];
        if ($ghg_model->insert($data)) {
            $session->setFlashdata('success', 'Ghg has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/ghg');
    }
    public function deleteGhg($id)
    {
        $ghg_model = new GhgModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($ghg_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Ghg has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/ghg');
    }
    public function editGhg()
    {
        $ghg_model = new GhgModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $category_id = $this->request->getVar("category_id");
        $footprint_id = $this->request->getVar("footprint_id");

        $boundaries_id = $this->request->getVar("boundaries_id");
        $item_allowed = $this->request->getVar("item_allowed");
        $updated_data = [
            "ghg_name" => $name,
            "ghg_category_id" => $category_id,
            "footprint_id" => $footprint_id,

            "boundary_id" => $boundaries_id,
            "item_allowed" => $item_allowed
        ];
        if ($ghg_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Ghg has been successfully deleted');
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/ghg');
    }
    public function disclosurecategory()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $disclosure_category_model = new DisclosureCategoryModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $disclosure_category_model->where('status', 1)->findAll();
        return view('admin/view-disclosure-category.php', $data);
    }
    public function addDisclosureCategory()
    {
        $ghg_category_model = new DisclosureCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar('name');
        $indicator = $this->request->getVar('indicator');
        $data = [
            'disclosure_category_name' => $name,

            'user_id' => 1,
            'status' => 1
        ];
        if ($ghg_category_model->insert($data)) {
            $session->setFlashdata('success', 'Disclosure Category has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/disclosurecategory');
    }
    public function editDisclosureCategory()
    {
        $disclosure_category_model = new DisclosureCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $updated_data = [
            'disclosure_category_name' => $name
        ];
        if ($disclosure_category_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Disclosure Category has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        return redirect()->to('master/disclosurecategory');
    }
    public function deleteDisclosureCategory($id)
    {
        $disclosure_category_model = new DisclosureCategoryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($disclosure_category_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Disclosure category has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/disclosurecategory');
    }
    public function deleteMasterDis($id)
    {

        $Master_SubDisclosure_model = new MasterSubDis();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($Master_SubDisclosure_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'SubDisclosure Master has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->back();
    }
    public function disclosure()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $disclosure_category_model = new DisclosureCategoryModel();
        $unit_model = new UnitModel();
        $standard_model = new StandardModel();
        $model = new IndicatorModel();
        $data['aa'] = $model->where('status', 1)->findAll();
        $classification_sub_model = new SubClassificationModel();
        $data['disclosure_category'] = $disclosure_category_model->where('status', 1)->findAll();

        $data['list'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();
        // print_r($data['list']);
        // die();
        $data['unit'] = $unit_model->where('status', 1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();

        $data['subclassification'] = $classification_sub_model->where('status', 1)->findAll();
        return view('admin/view-disclosure.php', $data);
    }
    public function addDisclosure()
    {
        $disclosure_model = new DisclosureModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar("name");
        $builder = $db->table('disclosure');
        $category_id = $this->request->getVar("category_id");

        $indicator = $this->request->getVar('indicator');
        // print_r($indicator);
        // die();
        $standard_id = $this->request->getVar("standard_id");
        $classification_id = $this->request->getVar("classification_id");
        $unit_id = $this->request->getVar("unit_id");

        $standard_arr = $this->request->getVar('standard');

        $classfication_arr = $this->request->getVar('classification');
        if ($this->request->getVar('standard')) {

            foreach ($this->request->getVar('standard') as $key => $r) {
                $sub_classfication_arr = $this->request->getVar('sub_classification_name' . $key);

                $data = [
                    "disclosure_name" => $name,
                    "disclosure_category_id" => $category_id,
                    "indicator_id"  => $indicator,
                    "standard_id" => $r,
                    "classification_id" => $classfication_arr[$key],
                    "sub_classification_id" => json_encode($sub_classfication_arr),
                    "unit_id" => 0,
                    "user_id" => 1,
                    "status" => 1
                ];

                $save = $builder->insert($data);
                $msg = 'Files has been uploaded';
            }
        }

        if ($save) {
            $session->setFlashdata('success', 'Disclosure has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/disclosure');
    }
    public function deleteDisclosure($id)
    {
        $disclosure_model = new DisclosureModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($disclosure_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Disclosure has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/disclosure');
    }
    public function subdis_managment()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $disclosure_category_model = new DisclosureCategoryModel();
        $unit_model = new UnitModel();
        $standard_model = new StandardModel();
        $model = new IndicatorModel();
        $data['aa'] = $model->where('status', 1)->findAll();
        $classification_sub_model = new SubClassificationModel();
        $data['disclosure_category'] = $disclosure_category_model->where('status', 1)->findAll();

        $data['list'] = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 group by disclosure.disclosure_name")->getResultArray();
        $data['unit'] = $unit_model->where('status', 1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['subclassification'] = $classification_sub_model->where('status', 1)->findAll();

        return view('admin/view-disclosure.php', $data);
    }
    public function editDisclosure()
    {
        $disclosure_model = new DisclosureModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');


        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $idDis = $this->request->getVar("idDis[]");
        $name = $this->request->getVar("name");
        $indicator = $this->request->getVar("indicator");
        $category_id = $this->request->getVar("category_id");
        $standardstand = $this->request->getVar("standardstand[]");
        print_r($standardstand);

        $classificationclass = $this->request->getVar("classificationclass[]");

        foreach ($this->request->getVar('idDis[]') as $key => $r) {
            $sub_classfication_sub_arr = $this->request->getVar('sub_classification_namesub' . $key);

            $updated_data = [
                "disclosure_name" => $name,
                "disclosure_category_id" => $category_id,
                "indicator_id" => $indicator,
                "standard_id" => $standardstand[$key],
                "classification_id" => $classificationclass[$key],
                "sub_classification_id" => json_encode($sub_classfication_sub_arr)
            ];
            $save = $disclosure_model->update($r, $updated_data);
        }

        $builder = $db->table('disclosure');
        $standard_id = $this->request->getVar("standard_id");
        $classification_id = $this->request->getVar("classification_id");
        $unit_id = $this->request->getVar("unit_id");

        $standard_arr = $this->request->getVar('standard_id');
        // print_r($standard_arr);
        // die();

        $classfication_arr = $this->request->getVar('classification');
        if ($this->request->getVar('standard_id')) {
            $ii = count($standardstand);


            foreach ($this->request->getVar('standard_id') as $key => $r) {


                $sub_classfication_arr = $this->request->getVar('sub_classification_id' . $ii);


                $data =
                    [
                        "disclosure_name" => $name,
                        "disclosure_category_id" => $category_id,
                        "indicator_id"  => $indicator,
                        "standard_id" => $r,
                        "classification_id" => $classification_id[$key],
                        "sub_classification_id" => json_encode($sub_classfication_arr),
                        "unit_id" => 0,
                        "user_id" => 1,
                        "status" => 1
                    ];
                $save = $builder->insert($data);
                $msg = 'Files has been uploaded';
                $ii++;
            }
        }

        if ($save) {
            $session->setFlashdata('success', 'Disclosure has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }

        return redirect()->to('master/disclosure');
    }
    public function addGhgFactor()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        $industry_model = new IndustryModel();
        $ghg_category_model = new GhgCategoryModel();
        $ghg_model = new GhgModel();

        $grp_model = new GroupModel();
        $country_model = new CountryModel();
        // $module_item_model = new ModuleItemModel();
        $factor_model = new FactorModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();        
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['industry'] = $industry_model->select("*")->where('status', 1)->findAll();
        $data['ghg_category'] = $ghg_category_model->select("*")->where('status', 1)->findAll();
        $data["country"] = $country_model->where('status', 1)->findAll();
        $data["Africa"] = $country_model->where('status', 1)->where('continents', 1)->findAll();
        $data["Antarctica"] = $country_model->where('status', 1)->where('continents', 2)->findAll();
        $data["Asia"] = $country_model->where('status', 1)->where('continents', 3)->findAll();
        $data["Europe"] = $country_model->where('status', 1)->where('continents', 4)->findAll();
        $data["North_America"] = $country_model->where('status', 1)->where('continents', 5)->findAll();
        $data["Oceania"] = $country_model->where('status', 1)->where('continents', 6)->findAll();
        $data["South_America"] = $country_model->where('status', 1)->where('continents', 7)->findAll();

        $data["group"] = $grp_model->where(['status' => 1])->findAll();



        $query = $db->query("select ipt.*, u.unit_name from nImpact as ipt join unit as u on u.id=ipt.impact_unit where ipt.status=1 ");
        $data['nImpact'] = $query->getResultArray();
        $data['trImpact'] = $query->getResultArray();
        // $data['factor'] = $factor_model->where(['status' => 1])->findAll();
        return view('admin/add-ghg-factor.php', $data);
    }


    public function addGhgFactorSubmit()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $db = \Config\Database::connect();
        $ghg_factor_model = new GhgFactorModel();
        $type_id = $this->request->getVar('type_id');
        $industry_id = $this->request->getVar('industry_id');
        $ghg_category_id = $this->request->getVar('ghg_category_id');
        $ghg_id = $this->request->getVar('ghg_id');
        $country_id = $this->request->getVar('country_id');


        $group_id = $this->request->getVar('group_id');
        $name = $this->request->getVar('name');
        $unit = $this->request->getVar('unit');
        $emission_factor = $this->request->getVar('emission_factor');
        $source = $this->request->getVar('source');
        $ava = $ghg_factor_model->where(['ghg_id' => $ghg_id, 'name' => $name, 'country_id' => json_encode($country_id), 'type' => $type_id, 'status' => 1])->first();


        $data = [
            'type' => $type_id,
            'industry_id' => $industry_id,
            'ghg_category_id' => $ghg_category_id,
            'ghg_id' => $ghg_id,
            'country_id' => json_encode($country_id),
            'name' => $name,


            'impact' => json_encode($unit),
            'emission_factor' => json_encode($emission_factor),


            'group_id' => "GRP-" . uniqid(),
            'user_id' => 1,
            'status' => 1,
            'source' => json_encode($source)
        ];
        if (empty($ava)) {
            $t = $ghg_factor_model->insert($data);



            if ($group_id == "" || $group_id == "0") {

                $data = [

                    'group_id' => "GRP-" . $t
                ];
            } else {

                $data = [

                    'group_id' => $group_id
                ];
            }
            $ghg_factor_model->where(['id' => $t])->set($data)->update();
            $session->setFlashdata('success', 'Ghg Factor has been successfully saved');
        } else {
            $session->setFlashdata('success', 'Ghg Fac5tor ' . $name . ' already exists');
        }
        return redirect()->to('master/ghgfactor');
    }
    public function getGhgByGhgCategory($id)
    {
        $db = \Config\Database::connect();
        $data = '';
        $ghg_model = new GhgModel();
        $ghg = $ghg_model->where(['ghg_category_id' => $id, 'status' => 1])->findAll();
        $data .= "<option value=''>Select Ghg</option>";
        if (!empty($ghg)) {
            foreach ($ghg as $s) {
                $data .= "<option value=" . $s['id'] . ">" . $s['ghg_name'] . "</option>";
            }
        }
        return $data;
    }


    // for getting factors on ghg selection
    public function getFactorsByGhg($id)
    {
        $db = \Config\Database::connect();
        $data = '';
        $factor_model = new FactorModel();
        $ghg_model = new GhgModel();
        // $factors_by_ghg = $factor_model->where(['ghg_id' => $id, 'status' => 1])->findAll();
        $factors_by_ghg = $db->query("select * from factor where ghg_id=" . $id . " and status=1")->getResultArray();
        $data .= "<option value=''>Select Factor</option>";
        if (!empty($factors_by_ghg)) {
            foreach ($factors_by_ghg as $f) {
                $data .= "<option value=" . $f['id'] . ">" . $f['factor_name'] . "</option>";
            }
        }
        return $data;
    }

    public function getimpact($id, $name)
    {

        $db = \Config\Database::connect();
        $ghg_factor_model = new GhgFactorModel();
        $data["ghg_factor"] = $ghg_factor_model->where(['id' => $id, 'status' => 1])->first();

        // echo $db->getlastquery($data["ghg_factor"]);
        // dd($data["ghg_factor"]);
        // print_r($data["ghg_factor"] );
        $impact_model = new ImpactModel();
        $query = $db->query("select ipt.*,u.unit_name  from nImpact as ipt join unit as u on u.id=ipt.impact_unit where ipt.status=1 ");
        $impact = $query->getResultArray();


        if ($data["ghg_factor"]['impact']) {


            $impactdata = json_decode($data["ghg_factor"]['impact']);
            $emission = json_decode($data["ghg_factor"]['emission_factor']);
            $source = json_decode($data["ghg_factor"]['source']);


            $data = '';

            if ($impact) {

                $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Impact</th><th>emission factor</th><th>Source</th></tr>';
                $i = 0;

                foreach ($impactdata as $key => $desc) {

                    $sno = 1;
                    foreach ($impact as $impacta) {
                        $data .= '<tr>';
                        if ($impacta["id"] == $impactdata[$i]) {
                            $data .= '<td>' . $sno . '</td>';
                            $data .= '<td>' . $impacta["impact_name"] . '</td>';
                            $data .= '<td>' . $emission[$i] . '</td>';
                            $data .= '<td>' . $source[$i] . '</td>';
                        }

                        $data .= '</tr>';
                        $sno++;
                    }
                    $i++;
                }
            }
        }
        echo $data;
    }
    public function getdocumentdetails($id)
    {

        $db = \Config\Database::connect();

        $ava = $db->query("select * from document_type where id='" . $id . "' and status=1");
        $ava = $ava->getResultArray();


        if ($ava) {
            $data = '';

            foreach ($ava as $key => $desc) {
                $data .= '<div class="summernotedit">';

                $data .= '<textarea  name="description"  >' . $desc['details'] . '</textarea>';

                $data .= '</div>';
            }
        }
        echo $data;
    }


    public function group_id()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Country Group  Management';
        $db = \Config\Database::connect();

        $query = $db->query("select * from group_name as gf  where gf.status=1");

        $grp_name = $query->getResultArray();

        $data["grp_name"] = $grp_name;
        echo view('admin/group_id', $data);
    }

    public function addGroup()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $country_model = new CountryModel();
        $data['title'] = 'Country Group  Management';
        $db = \Config\Database::connect();

        $query = $db->query("select * from ghg_factor as gf  where gf.status=1");

        $ghg_factor = $query->getResultArray();

        $data["ghg_factor"] = $ghg_factor;
        $data["Africa"] = $country_model->where('status', 1)->where('continents', 1)->findAll();
        $data["Antarctica"] = $country_model->where('status', 1)->where('continents', 2)->findAll();
        $data["Asia"] = $country_model->where('status', 1)->where('continents', 3)->findAll();
        $data["Europe"] = $country_model->where('status', 1)->where('continents', 4)->findAll();
        $data["North_America"] = $country_model->where('status', 1)->where('continents', 5)->findAll();
        $data["Oceania"] = $country_model->where('status', 1)->where('continents', 6)->findAll();
        $data["South_America"] = $country_model->where('status', 1)->where('continents', 7)->findAll();
        echo view('admin/add-group', $data);
    }


    public function addGroupname()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $db = \Config\Database::connect();
        $grp_model = new GroupModel();


        $country_id = $this->request->getVar('country_id');


        $group_id = $this->request->getVar('group_id');

        if (empty($country_id)) {

            $country_id = ["0"];
        }
        $ava = $grp_model->where(['group_id' => $group_id, 'country_id' => json_encode($country_id), 'status' => 1])->first();


        $data = [
            'country_id' => json_encode($country_id),
            'group_id' => "GRP-" . uniqid(),
            'status' => 1,
        ];
        if (empty($ava)) {
            $t = $grp_model->insert($data);



            if ($group_id == "" || $group_id == "0") {

                $data = [

                    'group_id' => "GRP-" . $t
                ];
            } else {

                $data = [

                    'group_id' => $group_id
                ];
            }
            $grp_model->where(['id' => $t])->set($data)->update();
            $session->setFlashdata('success', 'GRoup created successfully');
        } else {
            $session->setFlashdata('success', 'Group ' . $name . ' already exists');
        }
        return redirect()->to('master/group_id');
    }

    public function deletegrpname($id, $group_id)
    {
        $grp_model = new GroupModel();

        $ghg_factor_model = new GhgFactorModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($grp_model->where(['id' => $id])->set(['status' => 0])->update()) {

            if ($ghg_factor_model->where('group_id', $group_id)->set(['status' => 0])->update()) {
                $session->setFlashdata('success', 'Group successfully deleted');
            }
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/group_id');
    }
    public function edit_group_id_name()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $grp_model = new GroupModel();


        $group_name = $this->request->getVar('group_id');
        $id = $this->request->getVar('id');
        $ava = $db->query("select * from group_name  where group_id='" . $group_name . "' and status=1 ");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "group_id" => $group_name,
            ];
            if ($grp_model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Group Name  has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Group Name Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Group Name  ' . $group_name . ' already exist!');
        }
        return redirect()->to('master/group_id');
    }



    public function showcountryforedit($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $country_model = new CountryModel();
        $factor_model = new FactorModel();
        $grp_model = new GroupModel();



        $data["country"] = $country_model->findAll();
        $data["grp_country"] = $grp_model->where(['id' => $id, 'status' => 1])->first();

        $data["country"] = $country_model->where('status', 1)->findAll();
        $data["Africa"] = $country_model->where('status', 1)->where('continents', 1)->findAll();
        $data["Antarctica"] = $country_model->where('status', 1)->where('continents', 2)->findAll();
        $data["Asia"] = $country_model->where('status', 1)->where('continents', 3)->findAll();
        $data["Europe"] = $country_model->where('status', 1)->where('continents', 4)->findAll();
        $data["North_America"] = $country_model->where('status', 1)->where('continents', 5)->findAll();
        $data["Oceania"] = $country_model->where('status', 1)->where('continents', 6)->findAll();
        $data["South_America"] = $country_model->where('status', 1)->where('continents', 7)->findAll();

        $data["group_id_detail"] = json_decode($data["grp_country"]['country_id']);

        return view('admin/edit-grp-country', $data);
    }

    public function updateGroupName()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $db = \Config\Database::connect();
        $grp_model = new GroupModel();
        $id = $this->request->getVar('id');
        $group_id = $this->request->getVar('group_id');
        $country_id = $this->request->getVar('country_id');

        $data = [
            'country_id' => json_encode($country_id),
            'group_id' => $group_id,
            'user_id' => 1,
            'status' => 1,

        ];
        //  $ava = $db->query("select * from group_name  where group_id='".$group_id."' and status=1 ")->getResultArray();

        //       if(empty($ava)){
        if ($grp_model->where(['id' => $id])->set($data)->update()) {
            $session->setFlashdata('success', 'Group Country  has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        // }else{
        //         $session->setFlashdata('error','Gruop Name Alraedy Exists');

        // }
        return redirect()->to('master/group_id');
    }
    public function getcountrygro($id)
    {

        $db = \Config\Database::connect();

        $grp_model = new GroupModel();

        $data["ghg_factor"] = $grp_model->where(['id' => $id, 'status' => 1])->first();

        $country_model_not_used = new CountryModel();

        $query = $db->query("select cntry.*,cont.name as conti_name ,cont.id as conti_id from countries as cntry join continents as cont on cont.id=cntry.continents where cntry.status=1");

        $country_model = $query->getResultArray();

        if ($data["ghg_factor"]['country_id']) {


            $countrydata = json_decode($data["ghg_factor"]['country_id']);


            $data = '';

            if ($country_model) {

                $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Country Name</th><th>Continent Name</th></tr>';
                $i = 0;


                foreach ($country_model as $country) {

                    $sno = 1;
                    foreach ($countrydata as $key => $desc) {

                        if ($country["id"] == $desc) {
                            $data .= '<tr>';
                            $data .= '<td>' . $sno . '</td>';
                            // $data.='<td>'.$country["id"].'</td>';
                            $data .= '<td>' . $country["name"] . '</td>';
                            $data .= '<td>' . $country["conti_name"] . '</td>';
                            $data .= '</tr>';
                        }



                        $sno++;
                    }
                    $i++;
                }
            }
        }
        echo $data;
    }


    public function getconnectedghg($id, $name)
    {

        $db = \Config\Database::connect();

        $grp_model = new GroupModel();

        $ghg_factor_model = new GhgFactorModel();

        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $ghg_factor = $ghg_factor_model->select("name")->where(['group_id' => $name, 'status' => 1])->findAll();
        foreach ($ghg_factor as $ghgid) {

            $factor[] = $db->query("select factor_name from factor where id=" . $ghgid['name'])->getResultArray();
        }






        if ($ghg_factor) {

            $data = '';

            $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Connected GHGs</th></tr>';

            $sno = 1;

            foreach ($factor as $key => $desc) {

                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';

                $data .= '<td>' . $desc[0]['factor_name'] . '</td>';

                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data = 'Connect-it first To See It';
        }
        echo $data;
    }


    // for getting factors on ghg selection
    public function edit_group_id()
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $ghg_factor_model = new GhgFactorModel();


        $group_name = $this->request->getVar('group_id');
        $id = $this->request->getVar('id');
        $ava = $db->query("select * from ghg_factor where group_id='" . $group_name . "' and status=1 ");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            $updated_data = [
                "group_id" => $group_name,
            ];
            if ($ghg_factor_model->where(['id' => $id])->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Group Name  has been updated successfully');
            } else {
                $session->setFlashdata('error', 'Group Name Not Save');
            }
        } else {
            $session->setFlashdata('error', 'Group Name  ' . $group_name . ' already exist!');
        }
        return redirect()->to('master/group_id');
    }
    public function getcountry($id, $group_id)
    {

        $db = \Config\Database::connect();

        // $ghg_factor_model = new GhgFactorModel();

        // $data["ghg_group"] = $ghg_factor_model->where(['id' => $id, 'status' => 1])->first();

        $grp_model = new GroupModel();

        $data["ghg_factor"] = $grp_model->where(['group_id' => $group_id, 'status' => 1])->first();

        $country_model_not_used = new CountryModel();

        $query = $db->query("select cntry.*,cont.name as conti_name ,cont.id as conti_id from countries as cntry join continents as cont on cont.id=cntry.continents where cntry.status=1");

        $country_model = $query->getResultArray();



        if ($data["ghg_factor"]['country_id']) {


            $countrydata = json_decode($data["ghg_factor"]['country_id']);


            $data = '';

            if ($country_model) {

                $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Country Name</th><th>Continent Name</th></tr>';
                $i = 0;


                foreach ($country_model as $country) {

                    $sno = 1;
                    foreach ($countrydata as $key => $desc) {

                        if ($country["id"] == $desc) {
                            $data .= '<tr>';
                            $data .= '<td>' . $sno . '</td>';
                            // $data.='<td>'.$country["id"].'</td>';
                            $data .= '<td>' . $country["name"] . '</td>';
                            $data .= '<td>' . $country["conti_name"] . '</td>';
                            $data .= '</tr>';
                        }



                        $sno++;
                    }
                    $i++;
                }
            }
        }
        echo $data;
    }


    public function getmanuprocess($id, $ghgfactor)
    {

        $db = \Config\Database::connect();


        $query = $db->query("SELECT mpd.process_name FROM `ghg_factor` AS gf JOIN manufacturing_detail AS md ON md.ghg_factor_id = gf.id JOIN manufacturing_process_detail AS mpd ON mpd.id = md.process_id WHERE gf.id = $id");

        $manuprocess = $query->getResultArray();
        //  print_r($manuprocess);
        //  die();

        $data = '';




        if ($manuprocess) {



            $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Manufacturing Process Name</th></tr>';
            $sno = 1;
            foreach ($manuprocess as $key => $desc) {



                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';

                $data .= '<td>' . $desc['process_name'] . '</td>';

                $data .= '</tr>';
                $sno++;
            }



            $data .= '</table>';
        } else {

            $data .= '<table>';
            $data .= '<tr>';
            $data .= '<td>NO Process is connected  </td>';

            $data .= '</tr>';


            $data .= '</table>';
        }


        echo $data;
    }
    public function getrawmanuprocess($id, $ghgfactor)
    {

        $db = \Config\Database::connect();


        $query = $db->query("SELECT rmpd.process_name FROM `ghg_factor` AS gf JOIN raw_material_detail AS rmd ON rmd.ghg_factor_id = gf.id JOIN raw_material_process_detail AS rmpd ON rmpd.id = rmd.process_id WHERE gf.id = $id");

        $rawprocess = $query->getResultArray();
        //  print_r($rawprocess);
        //  die();

        $data = '';



        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Raw Process Name</th></tr>';
        if ($rawprocess) {




            $sno = 1;
            foreach ($rawprocess as $key => $desc) {



                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';

                $data .= '<td>' . $desc['process_name'] . '</td>';

                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';

            $data .= 'NO Process is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }
    // for getting factors on ghg selection

    public function ghgFactor()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        //$module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_model = new IndustryModel();
        $ghg_category_model = new GhgCategoryModel();
        $ghg_factor_model = new GhgFactorModel();
        $ghg_model = new GhgModel();
        $country_model = new CountryModel();
        //$module_item_model = new ModuleItemModel();
        $factor_model = new FactorModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();
        // $rs = $ghg_factor_model->where('status',1)->findAll();        
        $rs = $db->query("select * from ghg_factor where status=1")->getResultArray();
        $industry_name = "";
        $ghg_category_name = "";
        $ghg_name = "";
        $country_name = "";
        $list = [];
        if ($rs) {
            foreach ($rs as $r) {
                $industry = $industry_model->where('id', $r['industry_id'])->first();
                if ($industry) {
                    $industry_name = $industry["industry_name"];
                } else {
                    $industry_name = 0;
                }
                $ghg_category = $ghg_category_model->where('id', $r['ghg_category_id'])->first();
                if ($ghg_category) {
                    $ghg_category_name = $ghg_category["ghg_category_name"];
                } else {
                    $ghg_category_name = 0;
                }
                $ghg = $ghg_model->where('id', $r['ghg_id'])->first();
                if ($ghg) {
                    $ghg_name = $ghg["ghg_name"];
                } else {
                    $ghg_name = 0;
                }
                $country = $country_model->where('id', $r['country_id'])->first();
                if ($country) {
                    $country_name = $country["name"];
                } else {
                    $country_name = 0;
                }
                // $factor = $factor_model->where('id', $r['name'])->findAll();
                $factor = $db->query("select * from factor where id=" . $r['name'])->getResultArray();
                if ($factor) {
                    $factor_name = $factor[0]["factor_name"];
                } else {
                    $factor_name = $r['name'];
                }
                $list[] = array("id" => $r["id"], "type" => $r["type"], "industry_name" => $industry_name, "ghg_category_name" => $ghg_category_name, "ghg_name" => $ghg_name, "country_id" => $r["country_id"], "name" => $r["name"],  "group_id" => $r["group_id"], "emission_factor" => $r["emission_factor"], "impact" => $r["impact"], "country_name" => $country_name, "factor_name" => $factor_name);
            }
        }
        $data['list'] = $list;
        // echo '<pre>';
        // print_r($data['list']);
        // die();
        return view('admin/view-ghg-factor.php', $data);
    }
    public function editGhgFactor($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        //$module_model = new ModuleModel();
        $industry_model = new IndustryModel();
        $ghg_category_model = new GhgCategoryModel();
        $ghg_factor_model = new GhgFactorModel();
        $ghg_model = new GhgModel();
        $country_model = new CountryModel();
        //$module_item_model = new ModuleItemModel();
        $factor_model = new FactorModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $impact_model = new ImpactModel();
        $query = $db->query("select ipt.*,u.unit_name  from nImpact as ipt join unit as u on u.id=ipt.impact_unit where ipt.status=1 ");
        $data['impact'] = $query->getResultArray();


        $data['industry'] = $industry_model->select("*")->where('status', 1)->findAll();
        $data['ghg_category'] = $ghg_category_model->select("*")->where('status', 1)->findAll();
        $data["country"] = $country_model->findAll();
        $data["ghg_factor"] = $ghg_factor_model->where(['id' => $id, 'status' => 1])->first();
        $data["ghg"] = $ghg_model->where(['ghg_category_id' => $data['ghg_factor']['ghg_category_id'], 'status' => 1])->findAll();
        $data['factor'] = [];
        if ($data["ghg_factor"]) {
            // $data['factor'] = $factor_model->where(['ghg_id' => $data["ghg_factor"]['ghg_id'],'status' => 1])->findAll();    
            $data['factor'] = $db->query("select * from factor where ghg_id=" . $data['ghg_factor']['ghg_id'] . " and status=1")->getResultArray();
        }


        $data["country"] = $country_model->where('status', 1)->findAll();
        $data["Africa"] = $country_model->where('status', 1)->where('continents', 1)->findAll();
        $data["Antarctica"] = $country_model->where('status', 1)->where('continents', 2)->findAll();
        $data["Asia"] = $country_model->where('status', 1)->where('continents', 3)->findAll();
        $data["Europe"] = $country_model->where('status', 1)->where('continents', 4)->findAll();
        $data["North_America"] = $country_model->where('status', 1)->where('continents', 5)->findAll();
        $data["Oceania"] = $country_model->where('status', 1)->where('continents', 6)->findAll();
        $data["South_America"] = $country_model->where('status', 1)->where('continents', 7)->findAll();
        $ava = $db->query("select * from ghg_factor where status=1 GROUP by group_id");
        $grp = $ava->getResultArray();
        $data['group'] = $grp;

        $data["group_id_detail"] = json_decode($data["ghg_factor"]['country_id']);
        return view('admin/edit-ghg-factor.php', $data);
    }
    public function updateGhgFactor()
    {
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $ghg_factor_model = new GhgFactorModel();
        $id = $this->request->getVar('id');
        $type_id = $this->request->getVar('type_id');
        $industry_id = $this->request->getVar('industry_id');
        $ghg_category_id = $this->request->getVar('ghg_category_id');
        $ghg_id = $this->request->getVar('ghg_id');
        $country_id = $this->request->getVar('country_id');


        $group_id = $this->request->getVar('group_id');
        $name = $this->request->getVar('name');
        $impact = $this->request->getVar('unit');
        $emission_factor = $this->request->getVar('emission_factor');
        $source = $this->request->getVar('source');

        $data = [
            'type' => $type_id,
            'industry_id' => $industry_id,
            'ghg_category_id' => $ghg_category_id,
            'ghg_id' => $ghg_id,
            'country_id' => json_encode($country_id),
            'name' => $name,


            'impact' => json_encode($impact),
            'emission_factor' => json_encode($emission_factor),


            'group_id' => $group_id,
            'user_id' => 1,
            'status' => 1,
            'source' => json_encode($source)
        ];
        if ($ghg_factor_model->where(['id' => $id])->set($data)->update()) {
            $session->setFlashdata('success', 'Ghg Factor has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        return redirect()->to('master/ghgfactor');
    }
    public function deleteGhgFactor($id)
    {
        $ghg_factor_model = new GhgFactorModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($ghg_factor_model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Ghg Factor has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/ghgfactor');
    }
    public function footprint()
    {
        $data = $this->helperData;
        //$module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        //$industry_model = new IndustryModel();
        $footprint_model = new FootprintModel();
        //$module_item_model = new ModuleItemModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $footprint_model->where('status', 1)->findAll();
        return view('admin/view-footprint.php', $data);
    }
    public function addFootprint()
    {
        $footprint_model = new FootprintModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar('name');
        $data = [
            'footprint_name' => $name,
            'user_id' => 1,
            'status' => 1
        ];
        if ($footprint_model->insert($data)) {
            $session->setFlashdata('success', 'Footprint has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/footprint');
    }
    public function editFootprint()
    {
        $footprint_model = new FootprintModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $updated_data = [
            'footprint_name' => $name
        ];
        if ($footprint_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Footprint has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        return redirect()->to('master/footprint');
    }
    public function deleteFootprint($id)
    {
        $footprint_model = new FootprintModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($footprint_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Footprint has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/footprint');
    }
    public function addGhgQuestion()
    {
        $data = $this->helperData;
        //$module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_model = new IndustryModel();
        $footprint_model = new FootprintModel();
        //$module_item_model = new ModuleItemModel();
        $indicator_model = new IndicatorModel();
        $ghg_factor_model = new GhgFactorModel();
        //$data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        //$data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        //$data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['industry'] = $industry_model->where('status', 1)->findAll();
        $data['indicator'] = $indicator_model->where('status', 1)->findAll();
        $data['footprint'] = $footprint_model->where('status', 1)->findAll();
        $data['ghg_factor'] = $ghg_factor_model->where('status', 1)->findAll();
        return view('admin/add-ghg-question.php', $data);
    }
    public function getGhgByFootprint($id)
    {
        $db = \Config\Database::connect();
        $data = '';
        $query = $db->query("select * from ghg where status=1 and footprint_id='" . $id . "' ");
        $cat = $query->getResultArray();
        $data .= "<option value=''>Select Ghg</option>";
        if (!empty($cat)) {
            foreach ($cat as $c) {
                $data .= "<option value=" . $c['id'] . ">" . $c['ghg_name'] . "</option>";
            }
        }
        return $data;
    }
    public function addGhgQuestionSubmit()
    {
        $ghg_question_model = new GhgQuestionModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_id = $this->request->getVar('industry_id');
        $indicator_id = $this->request->getVar('indicator_id');
        $footprint_id = $this->request->getVar('footprint_id');
        $ghg_id = $this->request->getVar('ghg_id');
        $ghg_factor_id = $this->request->getVar('ghg_factor_id');
        $question = $this->request->getVar('question');
        $remark = $this->request->getVar('remark');
        $data = [
            'industry_id' => $industry_id,
            'indicator_id' => $indicator_id,
            'footprint_id' => $footprint_id,
            'ghg_id' => $ghg_id,
            'ghg_factor_id' => $ghg_factor_id,
            'question' => $question,
            'remark' => $remark,
            'user_id' => 1,
            'status' => 1
        ];
        if ($ghg_question_model->insert($data)) {
            $session->setFlashdata('success', 'Ghg Question has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/viewGhgQuestion');
    }
    public function viewGhgQuestion()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $data['title'] = 'Ghg Questions Management';
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $query = $db->query("select * from ghg_question where status=1");
        $rs = $query->getResultArray();
        $list = array();
        if (!empty($rs)) {
            foreach ($rs as $r) {
                $query = $db->query("select * from industry where status=1 and id='" . $r['industry_id'] . "' ");
                $industry = $query->getResultArray();
                if (!empty($industry)) {
                    $industry_name = $industry[0]['industry_name'];
                } else {
                    $industry_name = 0;
                }
                $query = $db->query("select * from indicator where status=1 and id='" . $r['indicator_id'] . "' ");
                $indicator = $query->getResultArray();
                if (!empty($indicator)) {
                    $indicator_name = $indicator[0]['indicator_name'];
                } else {
                    $indicator_name = 0;
                }
                $query = $db->query("select * from footprint where status=1 and id='" . $r['footprint_id'] . "' ");
                $footprint = $query->getResultArray();
                if (!empty($footprint)) {
                    $footprint_name = $footprint[0]['footprint_name'];
                } else {
                    $footprint_name = 0;
                }
                $query = $db->query("select * from ghg where status=1 and id='" . $r['ghg_id'] . "' ");
                $ghg = $query->getResultArray();
                if (!empty($ghg)) {
                    $ghg_name = $ghg[0]['ghg_name'];
                } else {
                    $ghg_name = 0;
                }
                $query = $db->query("select * from ghg_factor where status=1 and id='" . $r['ghg_factor_id'] . "' ");
                $ghg_factor = $query->getResultArray();
                if (!empty($ghg_factor)) {
                    $ghg_factor_name = $ghg_factor[0]['name'];
                } else {
                    $ghg_factor_name = 0;
                }
                $list[] = array('ghg_question_id' => $r['id'], 'industry_name' => $industry_name, 'indicator_name' => $indicator_name, 'footprint_name' => $footprint_name, 'ghg_name' => $ghg_name, 'ghg_factor_name' => $ghg_factor_name, 'question' => $r['question'], 'remark' => $r['remark']);
            }
        }
        $data['list'] = $list;
        return view('admin/view-ghg-question', $data);
    }
    public function editGhgQuestion($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        //$module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sdg_model = new SdgModel();
        $indicator_model = new IndicatorModel();
        //$industry_model = new IndustryModel();
        //$module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $rs = $db->query("select * from ghg_question where id=" . $id);
        $data['rs'] = $rs->getRow();
        $query = $db->query("select * from industry where status=1");
        $data['industry'] = $query->getResultArray();
        $query = $db->query("select * from indicator where status=1");
        $data['indicator'] = $query->getResultArray();
        $query = $db->query("select * from footprint where status=1");
        $data['footprint'] = $query->getResultArray();
        $query = $db->query("select * from ghg where status=1 and footprint_id='" . $data['rs']->footprint_id . "'");
        $data['ghg'] = $query->getResultArray();
        $query = $db->query("select * from ghg_factor where status=1");
        $data['ghg_factor'] = $query->getResultArray();
        return view('admin/edit-ghg-question.php', $data);
    }
    public function updateGhgQuestion()
    {
        $ghg_question_model = new GhgQuestionModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar('id');
        $industry_id = $this->request->getVar('industry_id');
        $indicator_id = $this->request->getVar('indicator_id');
        $footprint_id = $this->request->getVar('footprint_id');
        $ghg_id = $this->request->getVar('ghg_id');
        $ghg_factor_id = $this->request->getVar('ghg_factor_id');
        $question = $this->request->getVar('question');
        $remark = $this->request->getVar('remark');
        $data = [
            'industry_id' => $industry_id,
            'indicator_id' => $indicator_id,
            'footprint_id' => $footprint_id,
            'ghg_id' => $ghg_id,
            'ghg_factor_id' => $ghg_factor_id,
            'question' => $question,
            'remark' => $remark,
        ];
        if ($ghg_question_model->where(['id' => $id])->set($data)->update()) {
            $session->setFlashdata('success', 'Ghg Question has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to updated');
        }
        return redirect()->to('master/viewGhgQuestion');
    }
    public function deleteGhgQuestion($id)
    {
        $ghg_question_model = new GhgQuestionModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($ghg_question_model->where(['id' => $id])->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Ghg Question has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/viewGhgQuestion');
    }
    public function supplierAssessment($supplier_assessment_id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $degree_model = new DegreeModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['degree'] = $degree_model->where('status', 1)->findAll();
        $supplier_assessment = $db->query("select * from supplier_assessment where id=" . $supplier_assessment_id . " order by id desc")->getRow();
        $list = [];
        if ($supplier_assessment->is_verify == 1) {
            $supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=" . $supplier_assessment->id)->getResultArray();
            if ($supplier_base_assessment) {
                foreach ($supplier_base_assessment as $sba) {
                    $temp_arr = [];
                    $question = $db->query("select base_assessment_question.question,indicator_category.indicator_category_name,indicator.indicator_name from base_assessment_question join indicator_category on base_assessment_question.indicator_category_id=indicator_category.id join indicator on base_assessment_question.indicator_id=indicator.id  where base_assessment_question.id=" . $sba['base_assessment_question_id'])->getRowArray();
                    $answer = $db->query("select answer,marks from base_assessment_answer where base_assessment_answer.id=" . $sba['base_assessment_answer_id'])->getRowArray();
                    // $connected_doc = $db->query("select document_connection.document_id,supplier_document.image from document_connection join supplier_document on document_connection.document_id=supplier_document.id where document_connection.supplier_assessment_id=".$sba["supplier_assessment_id"]." and document_connection.question_id=".$sba["base_assessment_question_id"])->getResultArray();
                    $temp_arr["supplier_base_assessment"] = $sba;
                    $temp_arr["question"] = $question;
                    $temp_arr["answer"] = $answer;
                    // $temp_arr["connected_doc"] = $connected_doc;
                    $list[] = $temp_arr;
                }
            }
        }
        $data['list'] = $list;
        return view('admin/view-supplier-assessment.php', $data);
    }
    public function setDegree($said, $baqid, $remark, $degree_id)
    {
        $db = \Config\Database::connect();
        $rs = $db->query("update supplier_base_assessment set degree_id=" . $degree_id . ",admin_remark='" . $remark . "' where supplier_assessment_id=" . $said . " and base_assessment_question_id=" . $baqid);
        echo $rs;
    }
    public function getDocument($supplier_assessment_id, $base_assessment_question_id)
    {
        $db = \Config\Database::connect();
        $connected_doc = $db->query("select document_connection.document_id,supplier_document.image from document_connection join supplier_document on document_connection.document_id=supplier_document.id where document_connection.supplier_assessment_id=" . $supplier_assessment_id . " and document_connection.question_id=" . $base_assessment_question_id)->getResultArray();
        $data = '<table class="table table-bordered table-hover"><tbody><tr><th>#</th><th>Document</th></tr>';
        if ($connected_doc) {
            $s = 1;
            foreach ($connected_doc as $cdoc) {
                $doc_name_arr = explode('.', $cdoc['image']);
                $data .= '<tr>';
                $data .= '<td>';
                $data .= $s;
                $data .= '</td>';
                $data .= '<td>';
                if ($doc_name_arr[1] == 'jpg' || $doc_name_arr[1] == 'jpeg' || $doc_name_arr[1] == 'png') {
                    $data .= '<img src="' . base_url() . '/public/uploads/supplier_document/' . $cdoc['image'] . '" style="width:390px;" />';
                } else {
                    $data .= '<p style="font-size:36px;"><a href="' . base_url() . '/public/uploads/supplier_document/' . $cdoc['image'] . '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                </a></p>';
                }
                $data .= '</td>';
                $data .= '</tr>';
                $s++;
            }
        }
        $data .= '</tbody></table>';
        return $data;
    }
    public function viewSupplierAssessmentList($supplier_id)
    {
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $degree_model = new DegreeModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        // $rs = $db->query("select * from supplier_assessment where supplier_id=".$supplier_id." order by id desc")->getResultArray();
        $data['list'] = $db->query("select sa.*,a.assessment_name,s.supplier_name from supplier_assessment as sa join assessment as a on sa.assessment_id=a.id join supplier as s on sa.supplier_id=s.id where sa.supplier_id=" . $supplier_id . " order by sa.id desc")->getResultArray();
        return view('admin/view-supplier-assessment-list.php', $data);
    }
    public function supplierAdvanceAssessment($supplier_assessment_id)
    {
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $degree_model = new DegreeModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['degree'] = $degree_model->where('status', 1)->findAll();
        $supplier_assessment = $db->query("select * from supplier_assessment where id=" . $supplier_assessment_id . " order by id desc")->getRow();
        $list = [];
        if ($supplier_assessment->is_verify == 1) {
            $supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=" . $supplier_assessment->id)->getResultArray();
            if ($supplier_base_assessment) {
                foreach ($supplier_base_assessment as $sba) {
                    $temp_arr = [];
                    $question = $db->query("select sdg_assessment_question.question,sdg.sdg_name,indicator.indicator_name from sdg_assessment_question join sdg on sdg_assessment_question.sdg_id=sdg.id join indicator on sdg_assessment_question.indicator_id=indicator.id  where sdg_assessment_question.id=" . $sba['base_assessment_question_id'])->getRowArray();
                    $answer = $db->query("select answer,marks from sdg_assessment_answer where sdg_assessment_answer.id=" . $sba['base_assessment_answer_id'])->getRowArray();
                    // $connected_doc = $db->query("select document_connection.document_id,supplier_document.image from document_connection join supplier_document on document_connection.document_id=supplier_document.id where document_connection.supplier_assessment_id=".$sba["supplier_assessment_id"]." and document_connection.question_id=".$sba["base_assessment_question_id"])->getResultArray();
                    $temp_arr["supplier_base_assessment"] = $sba;
                    $temp_arr["question"] = $question;
                    $temp_arr["answer"] = $answer;
                    // $temp_arr["connected_doc"] = $connected_doc;
                    $list[] = $temp_arr;
                }
            }
        }
        $data['list'] = $list;
        return view('admin/view-supplier-assessment.php', $data);
    }
    public function standard()
    {
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $standard_model->where('status', 1)->findAll();
        return view('admin/view-standard.php', $data);
    }
    public function addStandard()
    {
        $standard_model = new StandardModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar('name');
        $data = [
            'standard_name' => $name,
            'user_id' => 1,
            'status' => 1
        ];
        if ($standard_model->insert($data)) {
            $session->setFlashdata('success', 'Standard has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/standard');
    }
    public function editStandard()
    {
        $standard_model = new StandardModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $updated_data = [
            'standard_name' => $name
        ];
        if ($standard_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Standard has been successfully updated');
        } else {
            $session->setFlashdata('error', 'Error to update');
        }
        return redirect()->to('master/standard');
    }
    public function deleteStandard($id)
    {
        $standard_model = new StandardModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($standard_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Standard has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/standard');
    }
    public function classification()
    {
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select classification.*,standard.standard_name from classification left join standard on classification.standard_id=standard.id where classification.status=1")->getResultArray();
        return view('admin/view-classification.php', $data);
    }
    public function addClassification()
    {
        $classification_model = new ClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar("name");
        $standard_id = $this->request->getVar("standard_id");
        $data = [
            "classification_name" => $name,
            "standard_id" => $standard_id,
            "user_id" => 1,
            "status" => 1
        ];
        if ($classification_model->insert($data)) {
            $session->setFlashdata('success', 'Classification has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/classification');
    }
    public function deleteClassification($id)
    {
        $classification_model = new ClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($classification_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Classification has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/classification');
    }
    public function editClassification()
    {
        $classification_model = new ClassificationModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $standard_id = $this->request->getVar("standard_id");
        $updated_data = [
            "classification_name" => $name,
            "standard_id" => $standard_id
        ];
        if ($classification_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Classification has been successfully deleted');
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/classification');
    }
    public function setDashboardAccess($supplier_id, $dashboard_access)
    {
        $supplier_model = new SupplierModel();
        if ($supplier_model->where(['id' => $supplier_id])->set(['dashboard_access' => $dashboard_access])->update()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    public function setassessmemntaccess($assessment_id, $assessmemntaccess)
    {
        $assessment_model = new Assessment();
        if ($assessment_model->where(['id' => $assessment_id])->set(['assessmemnt_access' => $assessmemntaccess])->update()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    public function supplierCompanyAssessment($supplier_id)
    {
        $data = $this->helperData;
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $degree_model = new DegreeModel();
        $ghg_model = new GhgModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        //        $data['list'] = $db->query("select sa.*,ga.*,g.ghg_name,gf.name as ghg_factor_name from supplier_assessment as sa join ghg_assessment as ga on sa.id=ga.supplier_assessment_id left join ghg  as g on ga.ghg_id=g.id left join ghg_factor as gf on gf.id=ga.factor_id where sa.id=".$supplier_id." and sa.assessment_id=10 order by ga.id asc")->getResultArray();
        $data['list'] = $db->query("select sa.*,ga.*,g.ghg_name,gf.name,f.factor_name as ghg_factor_name from supplier_assessment as sa join ghg_assessment as ga on sa.id=ga.supplier_assessment_id left join ghg  as g on ga.ghg_id=g.id left join ghg_factor as gf on gf.id=ga.factor_id left join factor as f on gf.name=f.id where sa.id=" . $supplier_id . " and sa.assessment_id=10 order by ga.id asc")->getResultArray();
        // echo '<pre>';
        // print_r($data['list']);
        // die();
        $data['ghg'] = $ghg_model->where(['footprint_id' => 1, 'status' => 1])->findAll();
        $data['degree'] = $db->query("select * from degree where status=1")->getResultArray();
        return view('admin/view-supplier-company-assessment.php', $data);
    }
    public function SupplierProductAssessment($supplier_id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $degree_model = new DegreeModel();
        $ghg_model = new GhgModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $db->query("select sa.*,ga.*,g.ghg_name,gf.name,f.factor_name as ghg_factor_name from supplier_assessment as sa join ghg_assessment as ga on sa.id=ga.supplier_assessment_id left join ghg  as g on ga.ghg_id=g.id left join ghg_factor as gf on gf.id=ga.factor_id left join factor as f on gf.name=f.id where sa.id=" . $supplier_id . " and sa.assessment_id=11 order by ga.id asc")->getResultArray();
        $data['ghg'] = $ghg_model->where(['footprint_id' => 2, 'status' => 1])->findAll();
        $data['degree'] = $db->query("select * from degree where status=1")->getResultArray();
        $data['supplier_manufacturing_process'] = $db->query("select smp.*,gf.name,f.factor_name from supplier_manufacturing_process as smp join ghg_factor as gf on smp.raw_material_id=gf.id join factor as f on gf.name=f.id where smp.supplier_assessment_id=" . $supplier_id . " and smp.status=1")->getResultArray();
        return view('admin/view-supplier-product-assessment.php', $data);
    }
    public function factor()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        $factor_model = new FactorModel();
        // $module_item_model = new ModuleItemModel();
        $unit_model = new UnitModel();
        $ghg_model = new GhgModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        // $data['list'] = $factor_model->where('status',1)->findAll();
        $data['unit'] = $unit_model->where('status', 1)->findAll();
        $data['ghg'] = $ghg_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select fa.*,u.unit_name,g.ghg_name from factor as fa left join unit as u on fa.factor_unit=u.id left join ghg as g on fa.ghg_id=g.id where fa.status=1")->getResultArray();
        return view('admin/view-factor.php', $data);
    }
    public function addFactor()
    {
        $factor_model = new FactorModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $ghg = $this->request->getVar('ghg');
        $name = $this->request->getVar('name');

        $unit = $this->request->getVar('unit');
        $remark = $this->request->getVar('remark');


        $data = [
            'ghg_id' => $ghg,
            'factor_name' => $name,
            'factor_unit' => $unit,
            'user_id' => 1,

            'remark' => $remark,
            'status' => 1
        ];
        $ava = $factor_model->where(['ghg_id' => $ghg, 'factor_name' => $name, 'status' => 1])->findAll();
        if (empty($ava)) {
            if ($factor_model->insert($data)) {
                $session->setFlashdata('success', 'Factor has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', 'Factor ' . $name . ' already exists');
        }
        return redirect()->to('master/factor');
    }
    public function editFactor()
    {
        $db = \Config\Database::connect();
        $factor_model = new FactorModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $unit = $this->request->getVar("unit");
        $ghg = $this->request->getVar("ghg");

        $remark = $this->request->getVar("remark");
        $updated_data = [
            'ghg_id' => $ghg,
            'factor_name' => $name,
            'factor_unit' => $unit,

            'remark' => $remark,
        ];
        // $ava = $factor_model->where(['factor_name' => $name, 'status' => 1])->findAll();
        $ava = $db->query("select * from factor where ghg_id=" . $ghg . " and factor_name='" . $name . "' and status=1 and id!='" . $id . "'")->getResultArray();
        if (empty($ava)) {
            if ($factor_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Factor has been successfully updated');
            } else {
                $session->setFlashdata('error', 'Error to update');
            }
        } else {
            $session->setFlashdata("error", "Factor " . $name . " already exists");
        }
        return redirect()->to('master/factor');
    }
    public function deleteFactor($id, $factor_name)
    {
        $factor_model = new FactorModel();

        $ghg_factor_model = new GhgFactorModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // echo $factor_name;

        if ($factor_model->where('id', $id)->set(['status' => 0])->update()) {
            if ($ghg_factor_model->where('name', $id)->set(['status' => 0])->update()) {
                $session->setFlashdata('success', 'Factor has been successfully deleted');
            }
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/factor');
    }
    public function country()
    {
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        $country_model = new CountryModel();
        // $module_item_model = new ModuleItemModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $country_model->where('status', 1)->findAll();
        return view('admin/view-country.php', $data);
    }
    public function addCountry()
    {
        $country_model = new CountryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sortname = $this->request->getVar('sortname');
        $name = $this->request->getVar('name');
        $phonecode = $this->request->getVar('phonecode');
        $emission_factor = $this->request->getVar('emission_factor');
        $data = [
            'sortname' => $sortname,
            'name' => $name,
            'phonecode' => $phonecode,
            'emission_factor' => $emission_factor,
            'status' => 1
        ];
        $ava = $country_model->where(['name' => $name, 'status' => 1])->findAll();
        if (empty($ava)) {
            if ($country_model->insert($data)) {
                $session->setFlashdata('success', 'Country has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', 'Country ' . $name . ' already exists');
        }
        return redirect()->to('master/country');
    }
    public function editCountry()
    {
        $country_model = new CountryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $sortname = $this->request->getVar("sortname");
        $name = $this->request->getVar("name");
        $phonecode = $this->request->getVar("phonecode");
        $emission_factor = $this->request->getVar("emission_factor");
        $updated_data = [
            'sortname' => $sortname,
            'name' => $name,
            'phonecode' => $phonecode,
            'emission_factor' => $emission_factor
        ];
        $ava = $country_model->where(['name' => $name, 'status' => 1])->findAll();
        if (empty($ava)) {
            if ($country_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Country has been successfully updated');
            } else {
                $session->setFlashdata('error', 'Error to update');
            }
        } else {
            $session->setFlashdata("error", "Country " . $name . " already exists");
        }
        return redirect()->to('master/country');
    }
    public function deleteCountry($id)
    {
        $country_model = new CountryModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($country_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Country has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/country');
    }
    public function baseAssessmentVerify($id, $admin_verify)
    {
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $rs = $db->query("update supplier_assessment set admin_verify=" . $admin_verify . ",admin_verify_by=1,admin_verify_date='" . date('Y-m-d H:i:s') . "' where id=" . $id);
        echo $rs;
    }
    public function Flight()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select f.factor_name, gf.id as ghg_factor_id , fd.* from flight_detail as fd left join ghg_factor as gf on fd.ghg_factor_id=gf.id left join factor as f on gf.name=f.id where f.ghg_id=31 and fd.status=1")->getResultArray();

        $data['factor_list'] = $db->query("select  f.factor_name, gf.id as ghg_factor_id from  factor as f join ghg_factor as gf on gf.name=f.id where f.ghg_id=31 and f.status=1 and gf.status=1")->getResultArray();
        // print_r($data['factor_list']);
        // die;
        return view('admin/view-flight.php', $data);
    }
    public function addFlight()
    {
        $flight_detail_model = new FlightDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $flight_class = $this->request->getVar("flight_class");
        $from_distance = $this->request->getVar("from_distance");
        $to_distance = $this->request->getVar("to_distance");
        // $emission_factor = $this->request->getVar("emission_factor");
        $ghg_factor_id = $this->request->getVar("ghg_factor_id");
        $data = [
            "flight_class" => $flight_class,
            "from_distance" => $from_distance,
            "to_distance" => $to_distance,
            // "emission_factor" => $emission_factor,
            "ghg_factor_id" => $ghg_factor_id,
            "user_id" => 1,
            "status" => 1
        ];
        if ($flight_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Flight Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/flight');
    }
    public function deleteFlight($id)
    {
        $flight_detail_model = new FlightDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($flight_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Flight Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/flight');
    }
    public function editFlight()
    {
        $flight_detail_model = new FlightDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $flight_class = $this->request->getVar("flight_class");
        $from_distance = $this->request->getVar("from_distance");
        $to_distance = $this->request->getVar("to_distance");
        $ghg_factor_id = $this->request->getVar("ghg_factor_id");
        $updated_data = [
            "flight_class" => $flight_class,
            "from_distance" => $from_distance,
            "to_distance" => $to_distance,
            "ghg_factor_id" => $ghg_factor_id
        ];
        if ($flight_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Flight Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/flight');
    }
    public function companyVehicle()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $deletebulkvehicaldata->where('status',1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        // $data['list'] = $db->query("select * from company_vehicle_detail where status=1")->getResultArray();
        $data['list'] = $db->query("select cvd.*,v.vehicle_name,gf.name,f.factor_name from company_vehicle_detail as cvd left join vehicle as v on cvd.vehicle=v.id left join ghg_factor as gf on gf.id=cvd.ghg_factor_id left join factor as f on gf.name=f.id where cvd.status=1")->getResultArray();

        // status removed start
        $data['vehicle'] = $db->query("select * from vehicle where status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        // $data['vehicle'] = $db->query("select * from vehicle where status=0||status=1 and footprint_id=1||footprint_id=2||footprint_id=5 ")->getResultArray();
        // status removed end

        $data['ghg_factor'] = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on gf.name=f.id where gf.ghg_id=19")->getResultArray();
        // print_r($data['ghg_factor']);
        // die;
        return view('admin/view-company-vehicle.php', $data);
    }
    public function addCompanyVehicle()
    {
        $company_vehicle_detail_model = new CompanyVehicleDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $vehicle = $this->request->getVar("vehicle");
        $year = $this->request->getVar("year");
        $type = $this->request->getVar("type");
        $model = $this->request->getVar("model");
        $ghg_factor = $this->request->getVar("ghg_factor");
        // $derivative = $this->request->getVar("derivative");
        // $efficiency = $this->request->getVar("efficiency");
        // $emission_factor = $this->request->getVar("emission_factor");
        $data = [
            "vehicle" => $vehicle,
            "year" => $year,
            "type" => $type,
            "model" => $model,
            "user_id" => 1,
            "status" => 1,
            "ghg_factor_id" => $ghg_factor
        ];
        if ($company_vehicle_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Company Vehicle Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/companyvehicle');
    }
    public function deleteCompanyVehicle($id)
    {
        $company_vehicle_detail_model = new CompanyVehicleDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($company_vehicle_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Company Vehicle Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/companyvehicle');
    }
    public function editCompanyVehicle()
    {
        $company_vehicle_detail_model = new CompanyVehicleDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $vehicle = $this->request->getVar("vehicle");
        $year = $this->request->getVar("year");
        $type = $this->request->getVar("type");
        $model = $this->request->getVar("model");
        $ghg_factor = $this->request->getVar("ghg_factor");
        // $derivative = $this->request->getVar("derivative");
        // $efficiency = $this->request->getVar("efficiency");
        // $emission_factor = $this->request->getVar("emission_factor");
        $updated_data = [
            "vehicle" => $vehicle,
            "year" => $year,
            "type" => $type,
            "model" => $model,
            "ghg_factor_id" => $ghg_factor
        ];
        if ($company_vehicle_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Company Vehicle Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/companyvehicle');
    }
    public function vehicle()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        $industry_model = new IndustryModel();
        $sub_industry_model = new SubSubIndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select v.*,f.footprint_name,f.id as foot_id,ssi.subsubindustry,i.industry_name as in_id from vehicle as v left join footprint as f on f.id=v.footprint_id left join SubSubIndustry as ssi on ssi.id =v.sub_industry_id left join industry as i on i.id =v.industry_id where v.status=1")->getResultArray();
        $query = $db->query("select * from footprint where status=1");
        $footprint_arr = $query->getResultArray();
        $data['footprint'] = $footprint_arr;

        $data['industry'] = $industry_model->select("*")->where('status', 1)->findAll();
        $data['sub_industry'] = $sub_industry_model->select("*")->where('status', 1)->findAll();
        //   print_r($data['sub_industry']);
        return view('admin/view-vehicle.php', $data);
    }
    public function addVehicle()
    {
        $vehicle_model = new VehicleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $vehicle_name = $this->request->getVar("vehicle_name");
        $industry_id = $this->request->getVar("industry_id");
        $sub_industry_id = $this->request->getVar("sub_industry_name");
        $footprint_id = $this->request->getVar("footprint");
        $data = [
            "vehicle_name" => $vehicle_name,
            "industry_id" => $industry_id,
            "sub_industry_id" => $sub_industry_id,
            "user_id" => 1,
            "status" => 1,
            "footprint_id" => $footprint_id
        ];
        if ($vehicle_model->insert($data)) {
            $session->setFlashdata('success', 'Vehicle has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/vehicle');
    }
    public function deleteVehicle($id)
    {
        $vehicle_model = new VehicleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($vehicle_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Vehicle has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/vehicle');
    }
    public function editVehicle()
    {
        $vehicle_model = new VehicleModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $industry_idd = $this->request->getVar("industry_idd");
        $sub_industry_name = $this->request->getVar("sub_industry_name");
        $vehicle_name = $this->request->getVar("vehicle_name");
        $footprint_id = $this->request->getVar("footprint");
        $updated_data = [
            "vehicle_name" => $vehicle_name,
            "footprint_id" => $footprint_id,
            "industry_id" => $industry_idd,
            "sub_industry_id" => $sub_industry_name
        ];
        if ($vehicle_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Vehicle has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/vehicle');
    }
    public function offset()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $standard_model = new StandardModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select * from assessment_offset where status=1")->getResultArray();
        return view('admin/view-offset.php', $data);
    }
    public function addOffset()
    {
        $db = \Config\Database::connect();
        $assessment_offset_model = new AssessmentOffsetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $name = $this->request->getVar("name");
        $description = $this->request->getVar("description");
        $price = $this->request->getVar("price");
        $file = $this->request->getFile('photo');
        $ava = $db->query("select * from assessment_offset where name='" . $name . "' and status=1");
        $ava = $ava->getResultArray();
        $url = "https://api.stripe.com/v1/products";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Content-Type: application/x-www-form-urlencoded",
            'Authorization: Bearer sk_test_51JJE0hSCiFTqq5nyyrQzOJ2avuneiYqRRs4UUNVjqXWcoC5kSGaMNnifnaAwDR1K6Yds8S8uDKJ1wIDpGpEj8kUV00u7HfW1Jk'
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = "name=" . $name;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        echo $resp = curl_exec($curl);
        curl_close($curl);
        $product = json_decode($resp);
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/offset', $newName)) {
                        if ($assessment_offset_model->insert(['name' => $name, 'photo' => $newName, 'status' => 1, 'user_id' => 1, 'description' => $description, 'price' => $price, 'stripe_product_id' => $product->id])) {
                            $session->setFlashdata('success', 'Offset has been saved successfully');
                        } else {
                            $session->setFlashdata('error', 'Offset Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid image');
                }
            }
        } else {
            $session->setFlashdata('error', 'Offset name ' . $name . ' already exist!');
        }
        return redirect()->to('master/offset');
    }
    public function deleteOffset($id)
    {
        $assessment_offset_model = new AssessmentOffsetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($assessment_offset_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Offset has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/offset');
    }
    public function editOffset()
    {
        $db = \Config\Database::connect();
        $assessment_offset_model = new AssessmentOffsetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $description = $this->request->getVar("description");
        $price = $this->request->getVar("price");
        $file = $this->request->getFile('photo');
        $ava = $db->query("select * from assessment_offset where name='" . $name . "' and status=1 and id!=" . $id);
        $ava = $ava->getResultArray();
        $url = "https://api.stripe.com/v1/products";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Content-Type: application/x-www-form-urlencoded",
            'Authorization: Bearer sk_test_51JJE0hSCiFTqq5nyyrQzOJ2avuneiYqRRs4UUNVjqXWcoC5kSGaMNnifnaAwDR1K6Yds8S8uDKJ1wIDpGpEj8kUV00u7HfW1Jk'
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = "name=" . $name;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        echo $resp = curl_exec($curl);
        curl_close($curl);
        $product = json_decode($resp);
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/offset', $newName)) {
                        $updated_data = [
                            "name" => $name,
                            "description" => $description,
                            "price" => $price,
                            "photo" => $newName,
                            "stripe_product_id" => $product->id
                        ];
                        if ($assessment_offset_model->where(['id' => $id])->set($updated_data)->update()) {
                            $session->setFlashdata('success', 'offset has been updated successfully');
                        } else {
                            $session->setFlashdata('error', 'Offset Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid image');
                }
            } else {
                $updated_data = [
                    "name" => $name,
                    "description" => $description,
                    "price" => $price,
                    "stripe_product_id" => $product->id
                ];
                if ($assessment_offset_model->where(['id' => $id])->set($updated_data)->update()) {
                    $session->setFlashdata('success', 'Offset has been updated successfully');
                } else {
                    $session->setFlashdata('error', 'Offset Not Updated');
                }
            }
        } else {
            $session->setFlashdata('error', 'Offset name ' . $name . ' already exist!');
        }
        // $updated_data = [
        //     "vehicle_name" => $vehicle_name,
        // ];
        // if($vehicle_model->where('id',$id)->set($updated_data)->update()) {
        //     $session->setFlashdata('success','Vehicle has been successfully updated');
        // }
        // else {
        //     $session->setFlashdata("error","Error to update");
        // }
        return redirect()->to('master/offset');
    }
    public function setGhgAssessmentDegree($said, $gaid, $remark, $degree_id, $ghg_id)
    {
        $db = \Config\Database::connect();
        if ($ghg_id = 23) {
            $rs = $db->query("update supplier_manufacturing_process set degree_id=" . $degree_id . ",remark='" . $remark . "' where supplier_assessment_id=" . $said . " and id=" . $gaid);
        } else {
            $rs = $db->query("update ghg_assessment set degree_id=" . $degree_id . ",remark='" . $remark . "' where supplier_assessment_id=" . $said . " and id=" . $gaid);
        }
        echo $rs;
    }
    public function supplierPlanAssessmentDetails()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $supplier_plan_assessment_details_model = new SupplierPlanAssessmentDetailsModel();
        $company_model = new CompanyModel();
        $assessment = new Assessment();
        $supplier_plan_model = new SupplierPlanModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['company_list'] = $company_model->where('status', 1)->findAll();
        $data['assessment_list'] = $assessment->where('status', 1)->findAll();
        $query = $db->query("select sp.*,c.company_size from supplier_plan as sp join company as c on c.id=sp.company_id where sp.status = 1 and c.status = 1");
        $data['plans'] = $query->getResultArray();
        //$data['plans'] = $supplier_plan_model->where('status',1)->findAll();
        $data['supplier_plan_assessment_details'] = $supplier_plan_assessment_details_model->where('status', 1)->findAll();
        return view('admin/view-supplier-plan-assessment-details.php', $data);
    }
    public function addSupplierPlanAssessmentDetails()
    {
        if ($this->request->getMethod() == "post") {
            $supplier_plan_assessment_details_model = new SupplierPlanAssessmentDetailsModel();
            $session = session();
            $user_info = $session->get('user_info');
            if (!$user_info) {

                return redirect()->to('auth/logout');
            }
            $data = [
                "supplier_plan_id" => $this->request->getVar("supplier_plan_id"),
                "assessment_id" => $this->request->getVar("assessment_id"),
                "no_of_entry" => $this->request->getVar("no_of_entry"),
                "user_id" => 1,
                "status" => 1
            ];
            if ($supplier_plan_assessment_details_model->insert($data)) {
                $session->setFlashdata('success', 'Supplier Plan Assessment Detail has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        }
        return redirect()->to('master/supplierPlanAssessmentDetails');
    }
    public function editSupplierPlanAssessmentDetails()
    {
        $supplier_plan_assessment_details_model = new SupplierPlanAssessmentDetailsModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        echo $id = $this->request->getVar("supPlanAssId");
        $updated_data = [
            "supplier_plan_id" => $this->request->getVar("supplier_plan_id"),
            "assessment_id" => $this->request->getVar("assessment_id"),
            "no_of_entry" => $this->request->getVar("edit_no_of_entry")
        ];
        $record = $supplier_plan_assessment_details_model->where(['id' => $id, 'status' => 1])->findAll();
        if (!empty($record)) {
            if ($supplier_plan_assessment_details_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Supplier Plan Assessment Detail has been successfully updated');
            } else {
                $session->setFlashdata('error', 'Error to update');
            }
        } else {
            $session->setFlashdata("error", "This Supplier Plan Assessment Detail do not exists in records");
        }
        return redirect()->to('master/supplierPlanAssessmentDetails');
    }
    public function deleteSupplierPlanAssessmentDetails($id)
    {
        $supplier_plan_assessment_details_model = new SupplierPlanAssessmentDetailsModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($supplier_plan_assessment_details_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Supplier Plan has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/supplierPlanAssessmentDetails');
    }
    public function getSuplierPlane()
    {
        $data = $this->request->getVar();
        $supplier_plan_model = new SupplierPlanModel();
        $plans = $supplier_plan_model->where('status', 1)->where('company_id', $data['company_id'])->findAll();

        echo '<option value="" >Select Company Plans</option>';
        foreach ($plans as $plan) {
            echo "<option value=" . $plan['id'] . ">" . $plan['plan_name'] . "</option><br/>";
        }
    }
    public function supplierPlanAssessmentGhgDetails()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();

        $supplier_plan_model = new SupplierPlanModel(); // for company plan
        $company_model = new CompanyModel(); //for supplier id and name
        $assessment = new Assessment(); //for assessment id and name
        $ghg_model = new GhgModel();
        $supplier_plan_assessment_ghg_details_model = new SupplierPlanAssessmentGhgDetailsModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        //$data['plans'] = $supplier_plan_model->where('status',1)->findAll();
        $data['company_list'] = $company_model->where('status', 1)->findAll();
        $data['assessment_list'] = $assessment->where('status', 1)->findAll();
        $data['ghg_list'] = $ghg_model->where('status', 1)->findAll();
        $query = $db->query("select sp.*,c.company_size from supplier_plan as sp join company as c on c.id=sp.company_id where sp.status = 1 and c.status = 1");
        $data['plans'] = $query->getResultArray();

        $data['supplier_plan_assessment_ghg_details_model'] = $supplier_plan_assessment_ghg_details_model->where('status', 1)->findAll();
        // echo "<pre>";
        // print_r($data['plans']);
        // print_r($data['supplier_plan_assessment_ghg_details_model']);
        // die;
        return view('admin/view-supplier-plan-assessment-ghg-details.php', $data);
    }
    public function addSupplierPlanAssessmentGhgDetails()
    {
        if ($this->request->getMethod() == "post") {
            $supplier_plan_assessment_ghg_details_model = new SupplierPlanAssessmentGhgDetailsModel();
            $session = session();
            $user_info = $session->get('user_info');
            if (!$user_info) {

                return redirect()->to('auth/logout');
            }
            $data = [
                "supplier_plan_id" => $this->request->getVar("supplier_plan_id"),
                "assessment_id" => $this->request->getVar("assessment_id"),
                "ghg_id" => $this->request->getVar("ghg_id"),
                "no_of_entry" => $this->request->getVar("no_of_entry"),
                "user_id" => 1,
                "status" => 1
            ];
            if ($supplier_plan_assessment_ghg_details_model->insert($data)) {
                $session->setFlashdata('success', 'Supplier Plan Assessment Ghg Detail has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        }
        return redirect()->to('master/supplierPlanAssessmentGhgDetails');
    }
    public function editSupplierPlanAssessmentGhgDetails()
    {
        $supplier_plan_assessment_ghg_details_model = new SupplierPlanAssessmentGhgDetailsModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        echo $id = $this->request->getVar("supPlanAssGhgId");
        $updated_data = [
            "supplier_plan_id" => $this->request->getVar("supplier_plan_id"),
            "assessment_id" => $this->request->getVar("assessment_id"),
            "ghg_id" => $this->request->getVar("ghg_id"),
            "no_of_entry" => $this->request->getVar("no_of_entry")
        ];
        $record = $supplier_plan_assessment_ghg_details_model->where(['id' => $id, 'status' => 1])->findAll();
        if (!empty($record)) {
            if ($supplier_plan_assessment_ghg_details_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Supplier Plan Assessment Detail has been successfully updated');
            } else {
                $session->setFlashdata('error', 'Error to update');
            }
        } else {
            $session->setFlashdata("error", "This Supplier Plan Assessment Detail do not exists in records");
        }
        return redirect()->to('master/supplierPlanAssessmentGhgDetails');
    }
    public function deleteSupplierPlanAssessmentGhgDetails($id)
    {
        $supplier_plan_assessment_ghg_details_model = new SupplierPlanAssessmentGhgDetailsModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($supplier_plan_assessment_ghg_details_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Supplier Plan Assessment Ghg has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to delete');
        }
        return redirect()->to('master/supplierPlanAssessmentGhgDetails');
    }
    public function getGhgByAssessment($assessment_id)
    {
        $db = \Config\Database::connect();
        $ghg = [];
        $data = "<option value=''>Select Ghg</option>";
        if ($assessment_id == 10) {
            $ghg = $db->query("select * from ghg where footprint_id=1 and status=1")->getResultArray();
        }
        if ($assessment_id == 12) {
            $ghg = $db->query("select * from ghg where footprint_id=5 and status=1")->getResultArray();
        }
        if ($assessment_id == 11) {
            $ghg = $db->query("select * from ghg where footprint_id=2 and status=1")->getResultArray();
        }
        if ($ghg) {
            foreach ($ghg as $g) {
                $data .= '<option value="' . $g['id'] . '">' . $g['ghg_name'] . '</option>';
            }
        }
        echo $data;
    }
    public function sdgTarget()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $sdg_model = new SdgModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['sdg'] = $sdg_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select gt.*,s.sdg_name from goal_target as gt left join sdg as s on gt.sdg_id=s.id where gt.status=1")->getResultArray();
        return view('admin/view-goal-target.php', $data);
    }
    public function addSdgTarget()
    {
        $sdg_target_model = new SdgTargetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $target_name = $this->request->getVar("target_name");
        $sdg_id = $this->request->getVar("sdg_id");
        $data = [
            "target_name" => $target_name,
            "sdg_id" => $sdg_id,
            "user_id" => 1,
            "status" => 1
        ];
        if ($sdg_target_model->insert($data)) {
            $session->setFlashdata('success', 'Target has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/sdgTarget');
    }
    public function deleteSdgTarget($id)
    {
        $sdg_target_model = new SdgTargetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($sdg_target_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Target has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/sdgTarget');
    }
    public function editSdgTarget()
    {
        $sdg_taget_model = new SdgTargetModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $target_name = $this->request->getVar("target_name");
        $sdg_id = $this->request->getVar("sdg_id");
        $updated_data = [
            "target_name" => $target_name,
            "sdg_id" => $sdg_id
        ];
        if ($sdg_taget_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Target has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/sdgTarget');
    }
    // public function addUnitCategory(){
    //     $db = \Config\Database::connect();
    //     $categoryName = $this->request->getVar('unitcategory_name');
    //       $session = session();
    //   $insert =  $db->query("insert into category_unit(category_name)values('".$categoryName."')");

    //    if($insert) {
    //         $session->setFlashdata('success','Category successfully insert');
    //     }
    //     else {
    //         $session->setFlashdata("error","Category Not added");
    //     }
    //     return redirect()->to('master/unit');
    // }

    public function unit()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $unit_model = new UnitModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $db->query("select * from unit where status=1")->getResultArray();
        $data['category_unit'] = $db->query("select * from category_unit where status=1")->getResultArray();
        return view('admin/view-unit.php', $data);
    }
    public function subUnit()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $unit_model = new SubUnitModel();


        $data['units'] = $db->query("select * from unit where status=1")->getResultArray();
        $data['category_unit'] = $db->query("select * from category_unit where status=1")->getResultArray();

        $data['list'] = $db->query("SELECT unit.unit_name,sub_units.* FROM sub_units JOIN unit ON unit.id = sub_units.unit_id WHERE sub_units.status = 1")->getResultArray();
        return view('admin/view-sub-unit.php', $data);
    }
    public function category_unit($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');

        $unit_model = new UnitModel();

        $data['units'] = $db->query("select * from unit where status=1")->getResultArray();
        $data['category_unit'] = $db->query("select * from category_unit where status=1")->getResultArray();
        $response = $unit_model->where('status', 1)->where('unit_category', $id)->findAll();

        $data .= "";
        $data .= '<option>Select from list</option>';

        foreach ($response as $jj) {

            $data .= '
                                              <option value="' . $jj['id'] . '">' . $jj['unit_name'] . '</option>';
        }
        echo $data;
    }
    public function addSubUnit()
    {
        $sub_unit_model = new SubUnitModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $unit_id = $this->request->getVar("unit_id");
        $subunit_name = $this->request->getVar("sub_unit_name");
        $subunit_value = $this->request->getVar("sub_unit_value");
        $subunit_symbol = $this->request->getVar("sub_unit_symbol");
        $data = [
            "unit_id" => $unit_id,
            "sub_unit_name" => $subunit_name,
            "unit_category" => $this->request->getVar("unit_category"),
            "conversion_value" => $subunit_value,
            "conversion_symbol" => $subunit_symbol,
            "user_id" => 1,
            "status" => 1
        ];
        $ava = $db->query("select * from sub_units where sub_unit_name='" . $subunit_name . "' and status=1")->getResultArray();
        if (empty($ava)) {
            if ($sub_unit_model->insert($data)) {
                $session->setFlashdata('success', 'Sub Unit has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', ' Sub Unit name ' . $subunit_name . ' already exists');
        }
        return redirect()->to('master/subUnit');
    }
    public function deleteSubUnit($id)
    {
        $sub_unit_model = new SubUnitModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($sub_unit_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Sub Unit has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/subUnit');
    }
    public function editSubUnit()
    {
        $db = \Config\Database::connect();
        $sub_unit_model = new SubUnitModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $unit_id = $this->request->getVar("unit_id");
        $subunit_name = $this->request->getVar("sub_unit_name");
        $subunit_value = $this->request->getVar("sub_unit_value");
        $subunit_symbol = $this->request->getVar("sub_unit_symbol");
        $updated_data = [
            "unit_id" => $unit_id,
            "sub_unit_name" => $subunit_name,
            "conversion_value" => $subunit_value,
            "conversion_symbol" => $subunit_symbol,
            "user_id" => 1,
            "status" => 1
        ];
        $ava = $db->query("select * from sub_units where sub_unit_name='" . $subunit_name . "' and status=1 and id!=" . $id . " and unit_id=" . $unit_id)->getResultArray();
        if (empty($ava)) {
            if ($sub_unit_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Sub Unit has been successfully updated');
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata("error", "Unit name " . $subunit_name . " already exists");
        }
        return redirect()->to('master/subUnit');
    }
    public function addUnit()
    {
        $unit_model = new UnitModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $unit_name = $this->request->getVar("unit_name");
        $data = [
            "unit_name" => $unit_name,
            "unit_category" => $this->request->getVar("unit_category"),
            "user_id" => 1,
            "status" => 1
        ];
        $ava = $db->query("select * from unit where unit_name='" . $unit_name . "' and status=1")->getResultArray();
        if (empty($ava)) {
            if ($unit_model->insert($data)) {
                $session->setFlashdata('success', 'Unit has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', 'Unit name ' . $unit_name . ' already exists');
        }
        return redirect()->to('master/unit');
    }
    public function deleteUnit($id)
    {
        $unit_model = new UnitModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($unit_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Unit has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/unit');
    }
    public function editUnit()
    {
        $db = \Config\Database::connect();
        $unit_model = new UnitModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $unit_name = $this->request->getVar("unit_name");
        $updated_data = [
            "unit_name" => $unit_name,
            "unit_category" => $this->request->getVar("unit_category"),
        ];
        $ava = $db->query("select * from unit where unit_name='" . $unit_name . "' and status=1 and id!=" . $id)->getResultArray();
        if (empty($ava)) {
            if ($unit_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Unit has been successfully updated');
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata("error", "Unit name " . $unit_name . " already exists");
        }
        return redirect()->to('master/unit');
    }
    public function stakeholder()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        // $stakeholder_model = new StakeholderModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['list'] = $db->query("select * from stakeholder where status=1")->getResultArray();
        return view('admin/view-stakeholder.php', $data);
    }
    public function addStakeholder()
    {
        $stakeholder_model = new StakeholderModel();
        $db = \Config\Database::connect();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $stakeholder_name = $this->request->getVar("stakeholder_name");
        $data = [
            "stakeholder_name" => $stakeholder_name,
            "user_id" => 1,
            "status" => 1
        ];
        $ava = $db->query("select * from stakeholder where stakeholder_name='" . $stakeholder_name . "' and status=1")->getResultArray();
        if (empty($ava)) {
            if ($stakeholder_model->insert($data)) {
                $session->setFlashdata('success', 'Stakeholder has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', 'Stakeholder name ' . $stakeholder_name . ' already exists');
        }
        return redirect()->to('master/stakeholder');
    }
    public function deleteStakeholder($id)
    {
        $stakeholder_model = new StakeholderModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($stakeholder_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Stakeholder has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/stakeholder');
    }
    public function editStakeholder()
    {
        $db = \Config\Database::connect();
        $stakeholder_model = new StakeholderModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $stakeholder_name = $this->request->getVar("stakeholder_name");
        $updated_data = [
            "stakeholder_name" => $stakeholder_name,
        ];
        $ava = $db->query("select * from stakeholder where stakeholder_name='" . $stakeholder_name . "' and status=1 and id!=" . $id)->getResultArray();
        if (empty($ava)) {
            if ($stakeholder_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Stakeholder has been successfully updated');
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata("error", "Stakeholder name " . $stakeholder_name . " already exists");
        }
        return redirect()->to('master/stakeholder');
    }
    public function initiative()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $sdg_model = new SdgModel();
        $stakeholder_model = new StakeholderModel();
        $disclosure_model = new DisclosureModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['sdg'] = $sdg_model->where('status', 1)->findAll();
        $data['stakeholder'] = $stakeholder_model->where('status', 1)->findAll();
        $data['disclosure'] = $disclosure_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select i.*,s.sdg_name,sh.stakeholder_name,d.disclosure_name,gt.target_name  from initiative as i join sdg as s on i.sdg_id=s.id join stakeholder as sh on i.stakeholder_id=sh.id join disclosure as d on i.disclosure_id=d.id join goal_target as gt on i.goal_target_id=gt.id where i.status=1")->getResultArray();
        return view('admin/view-initiative.php', $data);
    }
    public function addInitiative()
    {
        $initiative_model = new InitiativeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $target_name = $this->request->getVar("target_name");
        $sdg_id = $this->request->getVar("sdg_id");
        $goal_target_id = $this->request->getVar("goal_target_id");
        $stakeholder_id = $this->request->getVar("stakeholder_id");
        $disclosure_id = $this->request->getVar("disclosure_id");
        $initiative_name = $this->request->getVar("initiative_name");
        $data = [
            "initiative_name" => $initiative_name,
            "sdg_id" => $sdg_id,
            "goal_target_id" => $goal_target_id,
            "stakeholder_id" => $stakeholder_id,
            "disclosure_id" => $disclosure_id,
            "user_id" => 1,
            "status" => 1
        ];
        if ($initiative_model->insert($data)) {
            $session->setFlashdata('success', 'Initiative has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/initiative');
    }
    public function deleteInitiative($id)
    {
        $initiative_model = new InitiativeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($initiative_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Initiative has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/initiative');
    }
    public function editInitiative()
    {
        $initiative_model = new InitiativeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $initiative_name = $this->request->getVar("initiative_name");
        $sdg_id = $this->request->getVar("sdg_id");
        $goal_target_id = $this->request->getVar("goal_target_id");
        $stakeholder_id = $this->request->getVar("stakeholder_id");
        $disclosure_id = $this->request->getVar("disclosure_id");
        $updated_data = [
            "initiative_name" => $initiative_name,
            "sdg_id" => $sdg_id,
            "goal_target_id" => $goal_target_id,
            "stakeholder_id" => $stakeholder_id,
            "disclosure_id" => $disclosure_id
        ];
        if ($initiative_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Initiative has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/initiative');
    }
    public function getTargetBySdg($sdg_id)
    {
        $db = \Config\Database::connect();
        $target = $db->query("select * from goal_target where sdg_id=" . $sdg_id . " and status=1")->getResultArray();
        $data = '<option value="">Select Target</option>';
        if ($target) {
            foreach ($target as $t) {
                $data .= '<option value="' . $t['id'] . '">' . $t['target_name'] . '</option>';
            }
        }
        echo $data;
    }
    public function getClassificationByStandard($standard_id)
    {
        $db = \Config\Database::connect();
        $target = $db->query("select * from classification where standard_id=" . $standard_id . " and status=1")->getResultArray();
        $data = '<option value="">Select Classification</option>';
        if ($target) {
            foreach ($target as $t) {
                $data .= '<option value="' . $t['id'] . '">' . $t['classification_name'] . '</option>';
            }
        }
        echo $data;
    }
    public function geteditClassification($dis_name_id)
    {
        $db = \Config\Database::connect();

        $target = $db->query("select * from disclosure where id='" . $dis_name_id . "' and status=1")->getResultArray();
        $standard_model = new StandardModel();
        $standard = $standard_model->where('status', 1)->findAll();
        $classification_model = new ClassificationModel();
        $classification = $classification_model->where('status', 1)->findAll();
        $classification_sub_model = new SubClassificationModel();
        $classification_sub = $classification_sub_model->where('status', 1)->findAll();


        $data = '';


        if ($target) {
            foreach ($target as $ki => $t) {

                $data .= ' <div class="form-group"> <div class="row"><div class="col-md-3" style="float: left;">  <label for="exampleInputEmail1">Standard</label>
                                                    <input type="hidden" value="' . $t['id'] . '" name="idDis[]">
                                                                <select name="standardstand[]" id="standard[]" class="form-control" onchange="getClassification(this.value,' . $ki . ');">
                                                                                        <option value="">Select Standard</option>';

                $stand_opt = "";
                if (!empty($standard)) {
                    foreach ($standard as $stand) {
                        if ($stand['id'] == $t['standard_id']) {
                            $data .= '<option value="' . $stand['id'] . '" selected>' . $stand['standard_name'] . '</option>';
                        } else {
                            $data .= '<option value="' . $stand['id'] . '" >' . $stand['standard_name'] . '</option>';
                        }
                    }
                }
                $data .= '    </select> </div>';
                $data .= ' <div class="col-md-3" style="float: left;"> <label for="exampleInputEmail1">Classification</label>
                                                                    <select name="classificationclass[]" onchange="getSubClassification(this.value,' . $ki . ');" id="classificationDiv_' . $ki . '" class="form-control">
                                                                                                    <option value="">Select Classification</option>';
                if (!empty($classification)) {
                    foreach ($classification as $class) {
                        if ($class['id'] == $t['classification_id']) {
                            $data .= '<option value="' . $class['id'] . '" selected>' . $class['classification_name'] . '</option>';
                        } else {
                            $data .= '<option value="' . $class['id'] . '">' . $class['classification_name'] . '</option>';
                        }
                    }
                }
                $data .= '    </select> </div>';

                $data .= '<div class="col-md-4" style="float: left;"> <label for="exampleInputEmail1">Sub Classify</label>
                                                                <select name="sub_classification_namesub' . $ki . '[]" id="sub_classification_name_' . $ki . '" class="form-control select2" multiple="multiple">
                                                                                     <option value="">Select Sub Classification name</option>';
                if (!empty($classification_sub)) {
                    foreach ($classification_sub as $class_sub) {
                        $subfition = json_decode($t['sub_classification_id']);
                        if (in_array($class_sub['id'], $subfition)) {
                            $data .= '<option value="' . $class_sub['id'] . '" selected>' . $class_sub['sub_classification_name'] . '</option>';
                        } else {
                            $data .= '<option value="' . $class_sub['id'] . '" >' . $class_sub['sub_classification_name'] . '</option>';
                        }
                    }
                }
                $data .= '    </select> </div>
                                                                 <div class="col-md-1" style="float: left;">
                                                                                                <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                                                                <button type="button" class="btn btn-primary" onclick="addStandAndClassific()"><i
                                                                                                class="fa fa-plus"></i></button>
                                                                                        </div>
                                                            </div><br>';
            }
        }
        echo $data;
    }
    public function getSubClassificationByClassification($classification_id)
    {
        $db = \Config\Database::connect();
        $targetd = $db->query("select * from sub_classification where classification_name=" . $classification_id . " and status=1")->getResultArray();
        $data = '<option value="">Select Sub Classification</option>';
        if ($targetd) {
            foreach ($targetd as $td) {
                $data .= '<option value="' . $td['id'] . '">' . $td['sub_classification_name'] . '</option>';
            }
        }
        echo $data;
    }
    public function type()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $footprint_model = new FootprintModel();
        $industry_model = new IndustryModel();
        // $data['menu'] = $module_model->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['footprint'] = $footprint_model->where('status', 1)->findAll();
        $data['industry'] = $industry_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select ft.*,f.footprint_name,i.industry_name 
                                                                    from footprint_type as ft 
                                                                    left join footprint as f on ft.footprint_id=f.id
                                                                    left join industry as i on ft.industry_id=i.id
                                                                    where ft.status=1")->getResultArray();
        return view('admin/view-footprint-type.php', $data);
    }
    public function addType()
    {
        $db = \Config\Database::connect();
        $footprint_type_model = new FootprintTypeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $type_name = $this->request->getVar("type_name");
        $footprint_id = $this->request->getVar("footprint_id");
        $industry_id = $this->request->getVar("industry_id");
        $data = [
            "type_name" => $type_name,
            "footprint_id" => $footprint_id,
            "industry_id" => $industry_id,
            "user_id" => 1,
            "status" => 1
        ];
        // echo "<pre>";
        // print_r($data);
        // die;
        $ava = $db->query("select * from footprint_type where footprint_id=" . $footprint_id . " and type_name='" . $type_name . "' and industry_id='" . $industry_id . "' and status=1")->getResultArray();
        if (empty($ava)) {
            if ($footprint_type_model->insert($data)) {
                $session->setFlashdata('success', 'Type has been successfully saved');
            } else {
                $session->setFlashdata('error', 'Error to save');
            }
        } else {
            $session->setFlashdata('error', 'Type Name ' . $type_name . ' already exists');
        }
        return redirect()->to('master/type');
    }
    public function deleteType($id)
    {
        $footprint_type_model = new FootprintTypeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($footprint_type_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Type has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/type');
    }
    public function editType()
    {
        $db = \Config\Database::connect();
        $footprint_type_model = new FootprintTypeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $type_name = $this->request->getVar("type_name");
        $footprint_id = $this->request->getVar("footprint_id");
        $industry_id = $this->request->getVar("industry_id");
        $updated_data = [
            "type_name" => $type_name,
            "footprint_id" => $footprint_id,
            "industry_id" => $industry_id
        ];
        $ava = $db->query("select * from footprint_type where footprint_id=" . $footprint_id . " and type_name='" . $type_name . "' and industry_id='" . $industry_id . "' and status=1 and id!=" . $id)->getResultArray();
        if (empty($ava)) {
            if ($footprint_type_model->where('id', $id)->set($updated_data)->update()) {
                $session->setFlashdata('success', 'Type has been successfully updated');
            } else {
                $session->setFlashdata("error", "Error to update");
            }
        } else {
            $session->setFlashdata('error', 'Type Name ' . $type_name . ' already exists');
        }
        return redirect()->to('master/type');
    }
    public function Badge()
    {
        // defalt values start //
        $db = \Config\Database::connect();
        $data = $this->helperData;
        // $module_model = new ModuleModel();
        // $industry_model = new IndustryModel();
        // $module_item_model = new ModuleItemModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $company_model = new CompanyModel();
        $assessment = new Assessment();
        $supplier_plan_model = new SupplierPlanModel();
        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();
        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();
        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();
        $data['company_list'] = $company_model->where('status', 1)->findAll();
        $data['assessment_list'] = $assessment->where('status', 1)->findAll();
        $query = $db->query("select sp.*,c.company_size from supplier_plan as sp join company as c on c.id=sp.company_id where sp.status = 1 and c.status = 1");
        $data['plans'] = $query->getResultArray();
        // defalt values end //
        $bedge_model = new BadgeModel();
        $data['badges_details'] = $bedge_model->where('status', 1)->findAll();
        echo view('admin/badge', $data);
    }
    public function addBadges()
    {
        $db = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {
            $bedge_model = new BadgeModel();
            $session = session();
            $user_info = $session->get('user_info');
            if (!$user_info) {

                return redirect()->to('auth/logout');
            }
            $badge = $this->request->getVar('badge_name');
            $file = $this->request->getFile('file');
            $ava = $db->query("select * from badge where badge_name='" . $badge . "' and status=1");
            $ava = $ava->getResultArray();
            if (empty($ava)) {
                if ($file->isValid()) {
                    $ext = $file->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $newName = $file->getRandomName();
                        if ($file->move('public/uploads/badges', $newName)) {
                            $data = [
                                "badge_name" => $this->request->getVar("badge_name"),
                                "badge_image" => $newName,
                                "badge_description" => $this->request->getVar("badge_description"),
                                "badge_no_of_question" => $this->request->getVar("badge_no_of_question"),
                                "user_id" => 1,
                                "status" => 1
                            ];
                            if ($bedge_model->insert($data)) {
                                $session->setFlashdata('success', 'Badge has been saved successfully');
                            } else {
                                $session->setFlashdata('error', 'Badge Not Save');
                            }
                        } else {
                            $session->setFlashdata('error', 'Please select a valid badge Image');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid badge Image');
                    }
                }
            } else {
                $session->setFlashdata('error', 'badge name ' . $badge . ' already exist!');
            }
            return redirect()->to('master/badge');
        }
    }
    public function editBadgesDetails()
    {
        $db = \Config\Database::connect();
        $badge_model = new BadgeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("editbadgeId");
        $file = $this->request->getFile('editfile');
        $badge = $this->request->getVar("badge_name");
        $ava = $db->query("select * from badge where badge_name='" . $badge . "' and status=1");
        $ava = $ava->getResultArray();
        if (empty($ava)) {
            if ($file->isValid()) {
                $ext = $file->getClientExtension();
                $ava_ext = array("png", "jpg", "jpeg", "gif");
                if (in_array($ext, $ava_ext)) {
                    $newName = $file->getRandomName();
                    if ($file->move('public/uploads/badges', $newName)) {
                        $updated_data = [
                            "badge_name" => $this->request->getVar("badge_name"),
                            "badge_description" => $this->request->getVar("badge_description"),
                            "badge_no_of_question" => $this->request->getVar("badge_no_of_question"),
                            "badge_image" => $newName
                        ];
                        if ($badge_model->where(['id' => $id])->set($updated_data)->update()) {
                            $session->setFlashdata('success', 'Badge has been updated successfully');
                        } else {
                            $session->setFlashdata('error', 'Badge Not Save');
                        }
                    } else {
                        $session->setFlashdata('error', 'Please select a valid Image');
                    }
                } else {
                    $session->setFlashdata('error', 'Please select a valid Image');
                }
            } else {
                $updated_data = [
                    "badge_name" => $this->request->getVar("badge_name"),
                    "badge_description" => $this->request->getVar("badge_description"),
                    "badge_no_of_question" => $this->request->getVar("badge_no_of_question")
                ];
                if ($badge_model->where(['id' => $id])->set($updated_data)->update()) {
                    $session->setFlashdata('success', 'Badge has been updated successfully');
                } else {
                    $session->setFlashdata('error', 'Badge Not Updated');
                }
            }
        } else {
            $session->setFlashdata('error', 'badge name already exist!');
        }
        return redirect()->to('master/badge');
    }
    public function deleteBages($id)
    {
        $badge_model = new BadgeModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($badge_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata('success', 'Badge has been successfully deleted');
        } else {
            $session->setFlashdata('error', 'Error to Badge');
        }
        return redirect()->to('master/badge');
    }
    public function getBadge()
    {
        $b_id = $this->request->getVar('badge_id');
        $badge_model = new BadgeModel();
        $data = [];
        $badge = $badge_model->where('status', 1)->where('id', $b_id)->first();
        if ($badge) {
            $data['id'] = $badge['id'];
            $data['badge_name'] = $badge['badge_name'];
            $data['badge_image'] = $badge['badge_image'];
            $data['badge_description'] = $badge['badge_description'];
            $data['badge_no_of_question'] = $badge['badge_no_of_question'];
        }
        echo json_encode($data);
    }
    public function setDegreeToIndustrySdg()
    {
        $db = \Config\Database::connect();
        $industry_id = $this->request->getVar("industry_id");
        $sdg_id = $this->request->getVar("sdg_id");
        $degree_id = $this->request->getVar("degree_id");
        $rs = $db->query("update industry_sdg set degree_id=" . $degree_id . " where industry_id=" . $industry_id . " and sdg_id=" . $sdg_id);
        echo $rs;
    }

    public function transportation()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $data['list'] = $db->query("select cvd.*,v.vehicle_name,gf.name,f.factor_name,foot.footprint_name from transportation_detail as cvd left join vehicle as v on cvd.vehicle_id=v.id left join ghg_factor as gf on gf.id=cvd.ghg_factor_id left join factor as f on gf.name=f.id left join footprint as foot on foot.id=cvd.footprint_id where cvd.status=1")->getResultArray();
        $data['vehicle'] = $db->query("select * from vehicle where status=1")->getResultArray();
        $data['ghg_factor'] = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on gf.name=f.id where gf.ghg_id=22")->getResultArray();
        $query = $db->query("select * from footprint where status=1");
        $footprint_arr = $query->getResultArray();
        $data['footprint'] = $footprint_arr;
        return view('admin/view-transportation.php', $data);
    }
    public function addTransportation()
    {
        $transportation_detail_model = new TransportationDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $vehicle = $this->request->getVar("vehicle");
        $year = $this->request->getVar("year");
        $type = $this->request->getVar("type");
        $model = $this->request->getVar("model");
        $ghg_factor = $this->request->getVar("ghg_factor");
        $from_distance = $this->request->getVar("from_distance");
        $to_distance = $this->request->getVar("to_distance");
        $footprint_id = $this->request->getVar("footprint_id");
        $data = [
            "vehicle_id" => $vehicle,
            "year" => $year,
            "type" => $type,
            "model" => $model,
            "user_id" => 1,
            "status" => 1,
            "ghg_factor_id" => $ghg_factor,
            "from_distance" => $from_distance,
            "to_distance" => $to_distance,
            "footprint_id" => $footprint_id
        ];
        if ($transportation_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Transportation Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/transportation');
    }
    public function deleteTransportation($id)
    {
        $transportation_detail_model = new TransportationDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($transportation_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Transportation Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/transportation');
    }
    public function editTransportation()
    {
        $transportation_detail_model = new TransportationDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $vehicle = $this->request->getVar("vehicle");
        $year = $this->request->getVar("year");
        $type = $this->request->getVar("type");
        $model = $this->request->getVar("model");
        $from_distance = $this->request->getVar("from_distance");
        $to_distance = $this->request->getVar("to_distance");
        $ghg_factor = $this->request->getVar("ghg_factor");
        $footprint_id = $this->request->getVar("footprint");
        $updated_data = [
            "vehicle_id" => $vehicle,
            "year" => $year,
            "type" => $type,
            "model" => $model,
            "from_distance" => $from_distance,
            "to_distance" => $to_distance,
            "ghg_factor_id" => $ghg_factor,
            "footprint_id" => $footprint_id
        ];
        if ($transportation_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Transportation Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/transportation');
    }
    public function getVehicleByFootprint()
    {
        $db = \Config\Database::connect();
        $footprint_id = $this->request->getVar("footprint_id");
        $query = $db->query("select * from vehicle where footprint_id='" . $footprint_id . "' and status=1");

        $vehicle_arr = $query->getResultArray();
        $vehicle_data = '<option value="">Select Vehicle</option>';
        $ghg_factor_data = '<option value="">Select Ghg Factor</option>';
        if ($vehicle_arr) {
            foreach ($vehicle_arr as $vehicle) {
                $vehicle_data .= '<option value="' . $vehicle['id'] . '">' . $vehicle['vehicle_name'] . '</option>';
            }
        }
        if ($footprint_id == 1) {
            $query = $db->query("select gf.id,f.factor_name from ghg_factor as gf join factor as f on f.id=gf.name where gf.ghg_id=18");
            $ghg_factor_arr = $query->getResultArray();
            if ($ghg_factor_arr) {
                foreach ($ghg_factor_arr  as $ghg_factor) {
                    $ghg_factor_data .= '<option value="' . $ghg_factor['id'] . '">' . $ghg_factor['factor_name'] . '</option>';
                }
            }
        } elseif ($footprint_id == 2) {
            $query = $db->query("select gf.id,f.factor_name from ghg_factor as gf join factor as f on f.id=gf.name where gf.ghg_id=22");
            $ghg_factor_arr = $query->getResultArray();
            if ($ghg_factor_arr) {
                foreach ($ghg_factor_arr  as $ghg_factor) {
                    $ghg_factor_data .= '<option value="' . $ghg_factor['id'] . '">' . $ghg_factor['factor_name'] . '</option>';
                }
            }
        } elseif ($footprint_id == 5) {
            $query = $db->query("select gf.id,f.factor_name from ghg_factor as gf join factor as f on f.id=gf.name where gf.ghg_id=18");
            $ghg_factor_arr = $query->getResultArray();
            if ($ghg_factor_arr) {
                foreach ($ghg_factor_arr  as $ghg_factor) {
                    $ghg_factor_data .= '<option value="' . $ghg_factor['id'] . '">' . $ghg_factor['factor_name'] . '</option>';
                }
            }
        }
        $res = [];
        $res['vehicle_data'] = $vehicle_data;
        $res['ghg_factor_data'] = $ghg_factor_data;
        echo json_encode($res);
    }
    public function hotel_stay()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $query = $db->query("select hsd.*,c.name from hotel_stay_detail as hsd join countries as c on hsd.country_id=c.id where hsd.status=1");
        $data['list'] = $query->getResultArray();
        $query = $db->query("select * from countries where status=1");
        $data['countries'] = $query->getResultArray();
        return view('admin/view-hotel-stay.php', $data);
    }
    public function addHotelStay()
    {
        $hotel_stay_model = new HotelStayModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $country_id = $this->request->getVar("country_id");
        $no_of_person = $this->request->getVar("no_of_person");
        $no_of_night = $this->request->getVar("no_of_night");
        $emission = $this->request->getVar("emission");
        $data = [
            "country_id" => $country_id,
            "no_of_person" => $no_of_person,
            "no_of_night" => $no_of_night,
            "emission" => $emission,
            "status" => 1,
        ];
        if ($hotel_stay_model->insert($data)) {
            $session->setFlashdata('success', 'Hotel Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/hotel_stay');
    }
    public function editHotelStay()
    {
        $hotel_stay_model = new HotelStayModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $country = $this->request->getVar("country");
        $no_of_person = $this->request->getVar("no_of_person");
        $no_of_night = $this->request->getVar("no_of_night");
        $emission = $this->request->getVar("emission");
        $updated_data = [
            "country_id" => $country,
            "no_of_person" => $no_of_person,
            "no_of_night" => $no_of_night,
            "emission" => $emission,
        ];
        if ($hotel_stay_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Hotel Stay Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/hotel_stay');
    }
    public function deleteHotelStay($id)
    {
        $hotel_stay_model = new HotelStayModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($hotel_stay_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Hotel Stay has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/hotel_stay');
    }

    public function raw_material_process_detail()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $sub_industry_model = new SubSubIndustryModel();

        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $query = $db->query("select *,raw_material_process_detail.id as mpdid ,ssi.subsubindustry as subindus from raw_material_process_detail LEFT JOIN industry ON raw_material_process_detail.industry_id=industry.id LEFT JOIN unit ON raw_material_process_detail.unit_id=unit.id  LEFT join SubSubIndustry as ssi on ssi.id=raw_material_process_detail.sub_industry_name  where raw_material_process_detail.status=1");
        //echo $db->getLastquery($query);
        $data['list'] = $query->getResultArray();
        $data['sub_industry'] = $sub_industry_model->select("*")->where('status', 1)->findAll();
        return view('admin/view-raw-material-process-detail.php', $data);
    }
    public function addRawmaterialProcessDetail()
    {
        $rawmaterial_process_detail_model = new RawMaterialProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $process_name = $this->request->getVar("name");
        $industry_id = $this->request->getVar("industry_id");
        $sub_industry_name = $this->request->getVar("sub_industry_name");

        $unit_id = $this->request->getVar("unit_id");
        $remark = $this->request->getVar("remark");
        $data = [
            "process_name" => $process_name,
            "status" => 1,
            "sub_industry_name" => $sub_industry_name,
            "industry_id" => $industry_id,
            "unit_id" => $unit_id,
            "remark" => $remark,
        ];
        if ($rawmaterial_process_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Raw Material  Process Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/raw_material_process_detail');
    }

    public function editRawmaterialProcessDetail()
    {
        $rawmaterial_process_detail_model = new RawMaterialProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $process_name = $this->request->getVar("name");
        $sub_industry_name = $this->request->getVar("sub_industry_name");
        $industry_id = $this->request->getVar("industry_id");
        $unit_id = $this->request->getVar("unit_id");
        $remark = $this->request->getVar("remark");
        $updated_data = [
            "process_name" => $process_name,
            "industry_id" => $industry_id,
            "sub_industry_name" => $sub_industry_name,
            "unit_id" => $unit_id,
            "remark" => $remark
        ];
        if ($rawmaterial_process_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Raw Material Process Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/raw_material_process_detail');
    }

    public function deleteRawmaterialProcessDetail($id)
    {
        $rawmaterial_process_detail_model = new RawMaterialProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($rawmaterial_process_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Raw Material Process Detail has been deleted successfully ");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/raw_material_process_detail');
    }
    public function manufacturing_process_detail()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $sub_industry_model = new SubSubIndustryModel();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $query = $db->query("select *,manufacturing_process_detail.id as mpdid, ssi.subsubindustry as ssid from manufacturing_process_detail LEFT JOIN industry ON manufacturing_process_detail.industry_id=industry.id LEFT JOIN unit ON manufacturing_process_detail.unit_id=unit.id left join SubSubIndustry as ssi on ssi.id=manufacturing_process_detail.sub_industry_name where manufacturing_process_detail.status=1
                                    ");
        //echo $db->getLastquery($query);
        $data['list'] = $query->getResultArray();
        $data['sub_industry'] = $sub_industry_model->select("*")->where('status', 1)->findAll();
        return view('admin/view-manufacturing-process-detail.php', $data);
    }
    public function addManufacturingProcessDetail()
    {
        $manufacturing_process_detail_model = new ManufacturingProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $process_name = $this->request->getVar("name");
        $industry_id = $this->request->getVar("industry_id");
        $sub_in = $this->request->getVar("sub_industry_name");
        $unit_id = $this->request->getVar("unit_id");
        $remark = $this->request->getVar("remark");
        $data = [
            "process_name" => $process_name,
            "status" => 1,
            "industry_id" => $industry_id,
            "sub_industry_name" => $sub_in,
            "unit_id" => $unit_id,
            "remark" => $remark,
        ];
        if ($manufacturing_process_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Manufacturing Process Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/manufacturing_process_detail');
    }
    public function editManufacturingProcessDetail()
    {
        $manufacturing_process_detail_model = new ManufacturingProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $process_name = $this->request->getVar("name");
        $industry_id = $this->request->getVar("industry_id");
        $sub_industry_id = $this->request->getVar("sub_industry_id");
        $unit_id = $this->request->getVar("unit_id");
        $remark = $this->request->getVar("remark");
        $updated_data = [
            "process_name" => $process_name,
            "industry_id" => $industry_id,
            "sub_industry_name" => $sub_industry_id,
            "unit_id" => $unit_id,
            "remark" => $remark
        ];
        if ($manufacturing_process_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Manufacturing Process Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/manufacturing_process_detail');
    }
    public function deleteManufacturingProcessDetail($id)
    {
        $manufacturing_process_detail_model = new ManufacturingProcessDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($manufacturing_process_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Manufacturing Process Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/manufacturing_process_detail');
    }
    public function raw_material_detail()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $sub_industry_model = new SubSubIndustryModel();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $query = $db->query("select * from industry where status=1");
        $data['industry'] = $query->getResultArray();
        $query = $db->query("select * from ghg where status=1");
        $data['ghg'] = $query->getResultArray();
        $query = $db->query("select * from raw_material_process_detail where status=1");
        $data['Rawmaterial_process'] = $query->getResultArray();
        $query = $db->query("select * from unit where status=1");
        $data['unit'] = $query->getResultArray();
        $query = $db->query("select md.*,i.industry_name,g.ghg_name,mpd.process_name,gf.name as fact_id,f.factor_name,u.unit_name,ssi.subsubindustry as subindus from raw_material_detail as md join industry as i on i.id=md.industry_id join ghg as g on g.id=md.ghg_id join raw_material_process_detail as mpd on mpd.id=md.process_id join ghg_factor as gf on gf.id=md.ghg_factor_id join factor as f on f.id=gf.name join unit as u on u.id=md.unit_id LEFT join SubSubIndustry as ssi on ssi.id=md.sub_industry_name where md.status=1");
        $data['list'] = $query->getResultArray();
        $data['sub_industry'] = $sub_industry_model->select("*")->where('status', 1)->findAll();
        // echo '<pre>';
        // print_r($data['list']);
        // die();
        return view('admin/view-raw-material-detail.php', $data);
    }
    public function addRawmaterialDetail()
    {
        $rawmaterial_detail_model = new RawmaterialDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_id = $this->request->getVar("industry");
        $ghg_id = $this->request->getVar("ghg");
        $process_id = $this->request->getVar("process");

        $sub_industry_name = $this->request->getVar("sub_industry_name");
        $ghg_factor_id = $this->request->getVar("ghg_factor");
        $per_quantity_val = $this->request->getVar("per_quantity_val");
        $per_quantity_amt = $this->request->getVar("per_quantity_amt");
        $unit_id = $this->request->getVar("unit_id");
        $inputOutput = $this->request->getVar("inputOutput");
        $process_radio = $this->request->getVar("process_radio");

        $data = [
            "industry_id" => $industry_id,
            "ghg_id" => $ghg_id,
            "process_id" => $process_id,
            "sub_industry_name" => $sub_industry_name,
            "ghg_factor_id" => $ghg_factor_id,
            "status" => 1,
            "per_quantity_val" => $per_quantity_val,
            "per_quantity_amt" => $per_quantity_amt,
            "inputOutput" => $inputOutput,
            "unit_id" => $unit_id,
            "processradio_id" => $process_radio,
        ];
        if ($rawmaterial_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Rawmaterial Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/raw_material_detail');
    }

    public function editRawmaterialDetail()
    {
        $RawmaterialDetailModel_detail_model = new RawmaterialDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $industry_id = $this->request->getVar("industry");
        $ghg_id = $this->request->getVar("ghg");
        $process_id = $this->request->getVar("process");
        $ghg_factor_id = $this->request->getVar("ghg_factor");
        $per_quantity_val = $this->request->getVar("per_quantity_val");
        $sub_industry_name = $this->request->getVar("sub_industry_name");
        $per_quantity_amt = $this->request->getVar("per_quantity_amt");
        $unit_id = $this->request->getVar("unit_id");
        $inputOutput = $this->request->getVar("inputOutput");
        $updated_data = [
            "industry_id" => $industry_id,
            "ghg_id" => $ghg_id,
            "sub_industry_name" => $sub_industry_name,
            "process_id" => $process_id,
            "ghg_factor_id" => $ghg_factor_id,
            "per_quantity_val" => $per_quantity_val,
            "per_quantity_amt" => $per_quantity_amt,
            "inputOutput" => $inputOutput,
            "unit_id" => $unit_id
        ];
        if ($RawmaterialDetailModel_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Raw Material Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/raw_material_detail');
    }
    public function deleteRawmaterialDetail($id)
    {
        $RawmaterialDetailModel_detail_model = new RawmaterialDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($RawmaterialDetailModel_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Raw Material Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/raw_material_detail');
    }
    public function manufacturing_detail()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $standard_model = new StandardModel();
        $data['standard'] = $standard_model->where('status', 1)->findAll();
        $query = $db->query("select * from industry where status=1");
        $data['industry'] = $query->getResultArray();
        $query = $db->query("select * from ghg where status=1");
        $data['ghg'] = $query->getResultArray();
        $query = $db->query("select * from manufacturing_process_detail where status=1");
        $data['manufacturing_process'] = $query->getResultArray();
        $query = $db->query("select * from unit where status=1");
        $data['unit'] = $query->getResultArray();
        $query = $db->query("select md.*,i.industry_name,g.ghg_name,mpd.process_name,gf.name as fact_id,f.factor_name,u.unit_name from manufacturing_detail as md join industry as i on i.id=md.industry_id join ghg as g on g.id=md.ghg_id join manufacturing_process_detail as mpd on mpd.id=md.process_id join ghg_factor as gf on gf.id=md.ghg_factor_id join factor as f on f.id=gf.name join unit as u on u.id=md.unit_id where md.status=1");
        $data['list'] = $query->getResultArray();
        // echo '<pre>';
        // print_r($data['list']);
        // die();
        return view('admin/view-manufacturing-detail.php', $data);
    }
    public function getProcess($industry_id)
    {
        $db = \Config\Database::connect();
        $queryp = $db->query("SELECT `process_name`,`id` FROM `manufacturing_process_detail` WHERE status=1 and `industry_id`='" . $industry_id . "'");
        $ghg_process = $queryp->getResultArray();


        $data1 = '<option value="">Select Process</option>';

        if ($ghg_process) {
            foreach ($ghg_process as $factor1) {
                $data1 .= '<option value="' . $factor1['id'] . '">' . $factor1['process_name'] . '</option>';
            }
        }


        echo $data1;
    }
    public function getghgfactogropup($factor_id)
    {
        $db = \Config\Database::connect();

        $queryp = $db->query("SELECT gffact.group_id from factor as fact join ghg_factor as gffact on gffact.name=fact.id where fact.status=1 and gffact.status=1 and gffact.name='" . $factor_id . "'");
        $ghg_grpname = $queryp->getResultArray();
        $data = '';
        if ($ghg_grpname) {
            $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Group Name</th></tr>';
            $sno = 1;
            foreach ($ghg_grpname as $key => $desc) {
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>' . $desc['group_id'] . '</td>';
                $data .= '</tr>';
                $sno++;
            }
            $data .= '</table>';
        } else {
            $data .= '<table>';
            $data .= '<tr>';
            $data .= '<td>NO GHG Fctor is connected is connected  </td>';
            $data .= '</tr>';
            $data .= '</table>';
        }

        echo $data;
    }
    public function getrawProcess($industry_id)
    {
        $db = \Config\Database::connect();
        $queryp = $db->query("SELECT `process_name`,`id` FROM `raw_material_process_detail` WHERE status=1 and `industry_id`='" . $industry_id . "'");
        $ghg_process = $queryp->getResultArray();


        $data1 = '<option value="">Select Process</option>';

        if ($ghg_process) {
            foreach ($ghg_process as $factor1) {
                $data1 .= '<option value="' . $factor1['id'] . '">' . $factor1['process_name'] . '</option>';
            }
        }


        echo $data1;
    }

    public function getGhgFactor($industry_id, $ghg_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select gf.*,f.factor_name from ghg_factor as gf join factor as f on f.id=gf.name where gf.status=1 and gf.ghg_id='" . $ghg_id . "' and (gf.industry_id='" . $industry_id . "'||(gf.industry_id=0)) group by f.factor_name");

        // echo $db->getLastQuery('$query');
        $ghg_factors = $query->getResultArray();

        $data = '<option value="">Select Ghg Factor</option>';

        if ($ghg_factors) {
            foreach ($ghg_factors as $factor) {
                $data .= '<option value="' . $factor['id'] . '">' . $factor['factor_name'] . '</option>';
            }
        }
        echo $data;
    }
    public function addManufacturingDetail()
    {
        $manufacturing_detail_model = new ManufacturingDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $industry_id = $this->request->getVar("industry");
        $ghg_id = $this->request->getVar("ghg");
        $process_id = $this->request->getVar("process");
        $ghg_factor_id = $this->request->getVar("ghg_factor");
        $per_quantity_val = $this->request->getVar("per_quantity_val");
        $per_quantity_amt = $this->request->getVar("per_quantity_amt");
        $unit_id = $this->request->getVar("unit_id");
        $inputOutput = $this->request->getVar("inputOutput");
        $ghg_processradio_id = $this->request->getVar("ghg_processradio");
        $data = [
            "industry_id" => $industry_id,
            "ghg_id" => $ghg_id,
            "process_id" => $process_id,
            "ghg_factor_id" => $ghg_factor_id,
            "status" => 1,
            "per_quantity_val" => $per_quantity_val,
            "per_quantity_amt" => $per_quantity_amt,
            "inputOutput" => $inputOutput,
            "unit_id" => $unit_id,
            "ghg_processradio_id" => $ghg_processradio_id,
        ];
        if ($manufacturing_detail_model->insert($data)) {
            $session->setFlashdata('success', 'Manufacturing Detail has been successfully saved');
        } else {
            $session->setFlashdata('error', 'Error to save');
        }
        return redirect()->to('master/manufacturing_detail');
    }
    public function editManufacturingDetail()
    {
        $manufacturing_detail_model = new ManufacturingDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $id = $this->request->getVar("id");
        $industry_id = $this->request->getVar("industry");
        $ghg_id = $this->request->getVar("ghg");
        $process_id = $this->request->getVar("process");
        $ghg_factor_id = $this->request->getVar("ghg_factor");
        $per_quantity_val = $this->request->getVar("per_quantity_val");
        $per_quantity_amt = $this->request->getVar("per_quantity_amt");
        $unit_id = $this->request->getVar("unit_id");
        $inputOutput = $this->request->getVar("inputOutput");
        $updated_data = [
            "industry_id" => $industry_id,
            "ghg_id" => $ghg_id,
            "process_id" => $process_id,
            "ghg_factor_id" => $ghg_factor_id,
            "per_quantity_val" => $per_quantity_val,
            "per_quantity_amt" => $per_quantity_amt,
            "inputOutput" => $inputOutput,
            "unit_id" => $unit_id
        ];
        if ($manufacturing_detail_model->where('id', $id)->set($updated_data)->update()) {
            $session->setFlashdata('success', 'Manufacturing Detail has been successfully updated');
        } else {
            $session->setFlashdata("error", "Error to update");
        }
        return redirect()->to('master/manufacturing_detail');
    }
    public function deleteManufacturingDetail($id)
    {
        $manufacturing_detail_model = new ManufacturingDetailModel();
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        if ($manufacturing_detail_model->where('id', $id)->set(['status' => 0])->update()) {
            $session->setFlashdata("success", "Manufacturing Detail has been successfully deleted");
        } else {
            $session->setFlashdata("error", "Error to delete");
        }
        return redirect()->to('master/manufacturing_detail');
    }
    // Standard for disclouser function Info start    
    public function getstandardoninfoprocess($namee)
    {

        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='" . $name . "' ")->getResultArray();

        //   print_r($name);
        //   print_r($strandardClassification);
        //  die();
        $data = '';
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Standard</th></tr>';
        if ($strandardClassification) {
            $sno = 1;
            foreach ($strandardClassification as $key => $desc) {
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>' . $desc['standard_name'] . '</td>';
                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO Standard  is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }

    // Classification for disclouser function Info start 
    public function getClassidficationoninfoprocess($namee)
    {

        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='" . $name . "' ")->getResultArray();

        //  print_r($strandardClassification);
        // die();
        $data = '';
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Classification Name</th></tr>';
        if ($strandardClassification) {
            $sno = 1;
            foreach ($strandardClassification as $key => $desc) {
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>' . $desc['classification_name'] . '</td>';
                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO  Classification  is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }


    // Sub Classification for disclouser function Info start 
    public function getSubClassidficationoninfoprocess($namee)
    {

        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='" . $name . "' ")->getResultArray();
        $classification_sub_model = new SubClassificationModel();
        $subclassification = $classification_sub_model->where('status', 1)->findAll();
        //  print_r($rawprocess);
        //  die();
        $data = '';
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Sub Classification </th></tr>';

        if ($strandardClassification) {
            $sno = 1;
            foreach ($strandardClassification as $key => $desc) {
                $sub_clasii = json_decode($desc['sub_classification_id']);
                $si = 1;
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>';
                foreach ($subclassification as $subcla) {
                    if (in_array($subcla['id'], $sub_clasii)) {
                        // echo "<b>".$si++.")</b> ".$subcla['sub_classification_name']."<br>";
                        $data .= "<b>" . $si++ . ")</b> " . $subcla['sub_classification_name'] . "<br>";
                    }
                }

                $data .= '</td>';
                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO Sub Classification  is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }

    // Sub Disclousre with Sub classification Info start 
    public function getSubDisclosureinfoprocess($namee)
    {

        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='" . $name . "' ")->getResultArray();
        $classification_sub_model = new SubClassificationModel();
        $subclassification = $classification_sub_model->where('status', 1)->findAll();
        //  print_r($rawprocess);
        //  die();
        $data = '';
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Sub Classification </th></tr>';

        if ($strandardClassification) {
            $sno = 1;
            foreach ($strandardClassification as $key => $desc) {
                $sub_clasii = json_decode($desc['sub_classification_id']);
                $si = 1;
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>';
                $data .= "<input type='hidden' name='disclouserIdfirSubDis[]' value='" . $desc['id'] . "'>";
                foreach ($subclassification as $subcla) {
                    if (in_array($subcla['id'], $sub_clasii)) {


                        $data .= "<input type='checkbox' name='subdissubclassidfication" . $key . "[]'id='subdissubclassidficationId' value='" . $subcla['id'] . "'> <label for='subdissubclassidficationId'>" . $subcla['sub_classification_name'] . "</label><br>";
                    }
                }

                $data .= '</td>';
                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO Sub Classification  is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }


    public  function subdisedit($namee, $id)
    {
        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='" . $name . "' ")->getResultArray();
        $classification_sub_model = new SubClassificationModel();
        $subclassification = $classification_sub_model->where('status', 1)->findAll();
        //  print_r($rawprocess);
        //  die();
        $SubDisclosure_id = $db->query("select * from sub_disclosure  where status=1 and id='" . $id . "'")->getResultArray();
        // print_r($SubDisclosure_id);
        $SubDisclosure_id_data = $db->query("select * from sub_disclosure  where status=1 and sub_disclosure='" . $SubDisclosure_id[0]['sub_disclosure'] . "' ")->getResultArray();
        // print_r($SubDisclosure_id_data);

        foreach ($SubDisclosure_id_data as $k) {
            $l = json_decode($k['sub_clasification']);
            foreach ($l as $m) {
                $kpo[] = $m;
            }
        }
        $data = '';
        $data .= "<div class='form-group'>
                 <label for='sub_disclosure_name'>Sub Disclosure Name</label>
                  <input type='text' required='required' class='form-control'
                     placeholder='Enter Sub Disclosure Name' name='sub_disclosure_name' id='edit_sub_disclosure_name' value='" . $SubDisclosure_id[0]['sub_disclosure'] . "'>
                   </div>";
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Sub Classification </th></tr>';

        if ($strandardClassification) {
            $sno = 1;
            foreach ($strandardClassification as $key => $desc) {
                $sub_clasii = json_decode($desc['sub_classification_id']);
                $si = 1;
                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>';
                $data .= "<input type='hidden' name='disclouserIdfirSubDis[]' value='" . $desc['id'] . "'>";
                foreach ($subclassification as $subcla) {
                    if (in_array($subcla['id'], $sub_clasii)) {


                        if (in_array($subcla['id'], $kpo)) {
                            $data .= "<input type='checkbox' checked name='subdissubclassidfication" . $key . "[]'id='subdissubclassidficationId' value='" . $subcla['id'] . "'> <label for='subdissubclassidficationId'>" . $subcla['sub_classification_name'] . "</label><br>";
                        } else {
                            $data .= "<input type='checkbox' name='subdissubclassidfication" . $key . "[]'id='subdissubclassidficationId' value='" . $subcla['id'] . "'> <label for='subdissubclassidficationId'>" . $subcla['sub_classification_name'] . "</label><br>";
                        }



                        // $data.="<input type='checkbox' name='subdissubclassidfication".$key."[]'id='subdissubclassidficationId' value='".$subcla['id']."'> <label for='subdissubclassidficationId'>".$subcla['sub_classification_name']."</label><br>";


                    }
                }

                $data .= '</td>';
                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO Sub Classification  is connected ';
            $data .= '</tr>';
        }
        echo $data;

        //  $db = \Config\Database::connect();   
        //              $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='".$namee."' ")->getResultArray();
        //             $name=$strandardClassification7[0]['disclosure_name'];
        //             $strandardClassification = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.disclosure_name='".$name."' ")->getResultArray();
        //             $classification_sub_model = new SubClassificationModel();
        //             $SubDisclosure = new SubDisclosure();
        //             // print_r($classification_sub_model);
        //             // print_r($id);
        //             $subclassification = $classification_sub_model->where('status',1)->findAll();
        //             $SubDisclosure_id = $db->query("select * from sub_disclosure  where status=1 and id='".$id."'")->getResultArray();
        //             // print_r($SubDisclosure_id);
        //           foreach ($SubDisclosure_id as $key => $value) {

        //                 }     
        //              $sub = $value['sub_disclosure'];


        //             $SubDisclosure_id_data = $db->query("select * from sub_disclosure  where status=1 and sub_disclosure='".$sub."' ")->getResultArray();

        //           // print_r($SubDisclosure_id_data);

        //             $data='';
        //              $data.="<div class='form-group'>
        //                 <label for='sub_disclosure_name'>Sub Disclosure Name</label>
        //                  <input type='text' required='required' class='form-control'
        //                     placeholder='Enter Sub Disclosure Name' name='sub_disclosure_name' id='edit_sub_disclosure_name' value='".$sub."'>
        //                     </div>";

        //             $data.='<table class="table table-bordered"><tr><th>Sno </th><th>Sub Classification </th></tr>';  

        //             if($strandardClassification) {
        //                 $sno=1;

        //                  	 // print_r($k);

        //                     foreach($strandardClassification as $key=>$desc){
        //                                 $sub_clasii= json_decode($desc['sub_classification_id']);
        //                                 $si=1;
        //                                 $data.='<tr>';
        //                                 $data.='<td>'.$sno++.'</td>';
        //                                 $data.='<td>';
        //                                 $data.="<input type='text' name='disclouserIdfirSubDis[]' value='".$desc['id']."'>";



        //                                                 // print_r($subcla['id']);
        //                                                 // die();
        //                                 foreach($subclassification as $subcla){
        //                                     //  print_r($sub_clasii);
        //                                     //             die();
        //                                       if(in_array($subcla['id'],$sub_clasii)){

        //                                         	foreach($SubDisclosure_id_data as $k){
        //                                         		$l = json_decode($k['sub_clasification']);
        //                                                 foreach($l as $m){
        //                                                 	print_r($m);
        //                                                 }
        //                                              if(in_array($subcla['id'],$l)){

        //                               $data.="<input type='checkbox' name='subdissubclassidfication".$key."[]'id='subdissubclassidficationId' value='".$subcla['id']."' checked> <label for='subdissubclassidficationId'>".$subcla['sub_classification_name']."</label><br>";

        //                                                       }
        //                                                   else{
        //                                                       	$data.="<input type='checkbox' name='subdissubclassidfication".$key."[]'id='subdissubclassidficationId' value='".$subcla['id']."'> <label for='subdissubclassidficationId'>".$subcla['sub_classification_name']."</label><br>";
        //                                                       }


        //                                                   }
        //                                                 }

        //                                                  }

        //                         }
        //                                 $data.='</td>';
        //                                 $data.='</tr>';
        //                                 $sno++;

        //                                 }else{
        //                                     $data.='<tr>';
        //                                     $data.='NO Sub Classification  is connected ';
        //                                     $data.='</tr>'; 
        //                                     }
        //                     echo $data;
    }
    // 

    // Sub Disclousre with Sub classification Info start 
    public function getSubDisclosureoninfoprocess($namee)
    {

        $db = \Config\Database::connect();
        $strandardClassification7 = $db->query("select disclosure.*,disclosure_category.disclosure_category_name,s.standard_name,c.classification_name,subc.sub_classification_name,u.unit_name from disclosure left join disclosure_category on disclosure.disclosure_category_id=disclosure_category.id left join standard as s on s.id=disclosure.standard_id left join classification as c on c.id=disclosure.classification_id left join sub_classification as subc on subc.id=disclosure.sub_classification_id left join unit as u on u.id=disclosure.unit_id where disclosure.status=1 and  disclosure.id='" . $namee . "' ")->getResultArray();
        $name = $strandardClassification7[0]['disclosure_name'];
        $strandardClassification = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 and  sd.disclosure_name='" . $name . "' group by sd.sub_disclosure  ORDER BY sd.id ASC ")->getResultArray();

        $classification_sub_model = new SubClassificationModel();
        $subclassification = $classification_sub_model->where('status', 1)->findAll();
        $disarray = array();

        $data = '';
        $data .= '<table class="table table-bordered"><tr><th>Sno </th><th>Sub Disclosure </th><th>Sub Classification </th><th>Action</th></tr>';

        if ($strandardClassification) {
            $sno = 1;
            // print_r($strandardClassification);
            foreach ($strandardClassification as $key => $desc) {

                $si = 1;

                $data .= '<tr>';
                $data .= '<td>' . $sno . '</td>';
                $data .= '<td>' . $desc['sub_disclosure'] . '</td>';
                $data .= '<td>';

                $data .= "<input type='hidden' name='disclouserIdfirSubDis[]' value='" . $desc['id'] . "'>";
                // $strandardClassification1 = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 and  sd.disclosure_name='".$name."' group by sd.sub_disclosure")->getResultArray();
                $strandardClassification1 = $db->query("select sd.* from sub_disclosure as sd  where sd.status=1 and  sd.disclosure_name='" . $name . "' and sd.sub_disclosure='" . $desc['sub_disclosure'] . "' group by sd.sub_clasification")->getResultArray();


                foreach ($strandardClassification1 as $key => $desc1) {
                    $sub_clasii = json_decode($desc1['sub_clasification']);
                    $sub =  $desc['sub_disclosure'];

                    // print_r($desc1['id']);
                    // echo "<pre>";
                    //  die();


                    foreach ($subclassification as $subcla) {
                        if (in_array($subcla['id'], $sub_clasii)) {



                            $data .= "<b>" . $si++ . ")</b> <label for='subdissubclassidficationId'>" . $subcla['sub_classification_name'] . "</label><br>";
                        }
                    }
                }
                $data .= '</td>';
                $data .= '<td>';
                $data .= "<button class='btn btn-primary' onclick='subDisclousedit(" . $namee . "," . $desc1['id'] . ")'><i class='fa fa-pencil'></i></button>";
                $data .= "<a class='btn btn-success' href='" . base_url() . '/master/sub_disclosure_master/' . $desc1['id'] . "' ><i class='fa fa-plus'></i></a>";
                $data .= '</td>';


                $data .= '</tr>';
                $sno++;
            }
        } else {
            $data .= '<tr>';
            $data .= 'NO Sub Classification  is connected ';
            $data .= '</tr>';
        }
        echo $data;
    }

    public function addSubDisclosureName()
    {

        $SubDisclosure = new SubDisclosure();
        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $disclosure_id = $this->request->getVar("disclouserIdfirSubDis");
        $name = $this->request->getVar("name");

        $sub_disclosure_name = $this->request->getVar("sub_disclosure_name");
        $subdissubclassidfication = $this->request->getVar("subdissubclassidfication");

        foreach ($disclosure_id as $key => $Id) {
            $ava = $db->query("select * from sub_disclosure where disclosure_id='" . $Id . "' and sub_disclosure='" . $sub_disclosure_name . "' and status=1");
            $ava = $ava->getResultArray();
            if (empty($ava)) {

                if ($this->request->getVar("subdissubclassidfication" . $key)) {
                    $sub = $this->request->getVar("subdissubclassidfication" . $key);
                    $updated_data = [
                        "disclosure_id" => $Id,
                        "disclosure_name" => $name,
                        "sub_disclosure" => $sub_disclosure_name,
                        "sub_clasification" => json_encode($sub),

                    ];
                    $insert = $SubDisclosure->insert($updated_data);
                } else {
                    echo $key;
                }
            }
        }


        if ($insert) {
            $session->setFlashdata('success', 'SubDisclosure successfully added');
        } else {
            $session->setFlashdata("error", "SubDisclosure not added");
        }


        return redirect()->back();
    }
    public function editSubDisclosureName()
    {

        $SubDisclosure = new SubDisclosure();
        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $disclosure_id = $this->request->getVar("disclouserIdfirSubDis");


        $sub_disclosure_name = $this->request->getVar("sub_disclosure_name");

        $sub_disclosure_id = $this->request->getVar("sub_disclosure_edit");
        $sub_fetch = $db->query("select * from sub_disclosure where id='" . $sub_disclosure_id . "' and status=1")->getResultArray();
        // print_r($sub_disclosure_name);
        // die();
        foreach ($sub_fetch as $sub_dis_name) {
        }
        $subDis = $sub_dis_name['sub_disclosure'];
        $name = $sub_dis_name['disclosure_name'];
        $sub_fetch_data = $db->query("select * from sub_disclosure where sub_disclosure='" . $subDis . "' and status=1")->getResultArray();

        $subdissubclassidfication = $this->request->getVar("subdissubclassidfication");
        foreach ($sub_fetch_data as $key1  => $sub_data_id) {


            // print_r($Id);
            // die();
            $up_id = $sub_data_id['id'];
            $Id = $sub_data_id['disclosure_id'];
            // print_r($up_id);
            // print_r($Id);
            // $ava = $db->query("select * from sub_disclosure where disclosure_id='".$Id."' and sub_disclosure='".$sub_disclosure_name."' and status=1");
            // 	$avaa = $ava->getResultArray();

            // if(empty($avaa)){

            if ($this->request->getVar("subdissubclassidfication" . $key1)) {
                $sub = $this->request->getVar("subdissubclassidfication" . $key1);

                $updated_data = [
                    "disclosure_id" => $Id,
                    "disclosure_name" => $name,
                    "sub_disclosure" => $sub_disclosure_name,
                    "sub_clasification" => json_encode($sub),

                ];

                $insert = $SubDisclosure->update($up_id, $updated_data);
            }
        }
        // die();

        if ($insert) {
            $session->setFlashdata('success', 'SubDisclosure successfully update');
        } else {
            $session->setFlashdata("error", "SubDisclosure not update");
        }


        return redirect()->back();
    }


    public function sub_disclosure_master($id)
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }
        $disclosure_category_model = new DisclosureCategoryModel();
        $sub_disclosure_model = new SubDisclosure();
        $unit_model = new UnitModel();
        $standard_model = new StandardModel();
        $model = new IndicatorModel();
        $data['aa'] = $model->where('status', 1)->findAll();
        $classification_sub_model = new SubClassificationModel();
        $data['sub_clasii'] = $classification_sub_model->where('status', 1)->findAll();
        $data['sub_clasii_id'] = $classification_sub_model->where('status', 1)->findAll();

        // print_r($data['sub_clasii']);
        // die();
        $data['disclosure_category'] = $disclosure_category_model->where('status', 1)->findAll();


        $MasterAddtion = new MasterSubDis();
        $data['list']  =  $MasterAddtion->where('status', 1)->where('sub_disclosure_id', $id)->findAll();

        $sub_fetch = $db->query("select * from sub_disclosure where id='" . $id . "' and status=1")->getResultArray();
        foreach ($sub_fetch as $key => $value) {
        }
        $sub_disclosure = $value['sub_disclosure'];
        $data['sub_classification'] = $db->query("select * from sub_disclosure where sub_disclosure='" . $sub_disclosure . "' and status=1")->getResultArray();
        $data['option_answer'] = $db->query("select * from option_Answer where  status=1")->getResultArray();



        $data['unit'] = $unit_model->where('status', 1)->findAll();
        $data['standard'] = $standard_model->where('status', 1)->findAll();



        $data['subclassification'] = $classification_sub_model->where('status', 1)->findAll();
        $data['id'] = $id;
        echo view('admin/add-subdisclosure-master', $data);
    }

    public function master_addtion_subDiss()
    {

        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $subDis_addtion = new MasterSubDis();


        $sub_disclosure_id = $this->request->getVar('id');
        // $Disclosure = new SubDisclosure();
        // print_r($sub_disclosure_id);

        $Disclosure_id = $db->query("select * from sub_disclosure where id='" . $sub_disclosure_id . "' and status=1")->getResultArray();
        $Disclosure_id1 = $db->query("select * from disclosure where id='" . $Disclosure_id[0]['disclosure_id'] . "' and status=1")->getResultArray();
        $Disclosure_id2 = $db->query("select * from disclosure where disclosure_name='" . $Disclosure_id1[0]['disclosure_name'] . "' and status=1 Group By disclosure_name")->getResultArray();
        $dis_id = $Disclosure_id2[0]['id'];
        // print_r($dis_id);
        // die();

        $boundary_id = json_encode($this->request->getVar('boundary_id'));
        $answer_option = json_encode($this->request->getVar('answer_option'));
        $sub_clasifiction = json_encode($this->request->getVar('sub_classifiction'));
        $opreator = json_encode($this->request->getVar('opreator'));
        $subClasii_2 = json_encode($this->request->getVar('subClasii_2'));
        $type = json_encode($this->request->getVar('type'));


        $data = [
            'title' => $this->request->getVar('name'),
            'disclosure_id' => $dis_id,
            'sub_disclosure_id' => $this->request->getVar('id'),
            'sub_clasifiction' => $sub_clasifiction,
            'action' => $this->request->getVar('sub_action'),
            'boundary_select' => $this->request->getVar('boundary_select'),
            'boundary_id' => $boundary_id,
            'answer_option' => $answer_option,
            'type_option' => $type,
            'date_option' => $this->request->getVar('date_period'),
            'sub_classifiction_1' => $this->request->getVar('subClasii_1'),
            'total_value' => $this->request->getVar('total_value'),
            'opreator' => $opreator,
            'sub_classifiction_2' => $subClasii_2
        ];

        // print_r($data);
        // die();

        $insert = $subDis_addtion->insert($data);


        if ($insert) {
            $session->setFlashdata('success', 'SubDisclosure successfully added');
        } else {
            $session->setFlashdata("error", "SubDisclosure not added");
        }


        return redirect()->back();
    }

    public function master_edit_subDiss()
    {

        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $subDis_addtion = new MasterSubDis();

        $id = $this->request->getVar('edit_id');

        $boundary_id = json_encode($this->request->getVar('boundary_id'));
        $answer_option = json_encode($this->request->getVar('answer_option'));
        $sub_clasifiction = json_encode($this->request->getVar('sub_classifiction'));
        $opreator = json_encode($this->request->getVar('opreator'));
        $subClasii_2 = json_encode($this->request->getVar('subClasii_2'));
        $type = json_encode($this->request->getVar('type'));
        // print_r($answer_option);
        // print_r($type);
        // die();
        if ($subClasii_2 == 'null') {
            $subClasii_2 = '[""]';
        }
        if ($opreator == 'null') {
            $opreator = '[""]';
        }

        $data = [
            'title' => $this->request->getVar('name'),
            'sub_disclosure_id' => $this->request->getVar('id'),
            'sub_clasifiction' => $sub_clasifiction,
            'action' => $this->request->getVar('sub_action'),
            'boundary_select' => $this->request->getVar('boundary_select'),
            'boundary_id' => $boundary_id,
            'answer_option' => $answer_option,
            'type_option' => $type,
            'date_option' => $this->request->getVar('date_period_edit'),
            'sub_classifiction_1' => $this->request->getVar('subClasii_1'),
            'total_value' => $this->request->getVar('total_value_edit'),
            'opreator' => $opreator,
            'sub_classifiction_2' => $subClasii_2
        ];
        // print_r($data);
        // die();
        $insert = $subDis_addtion->update($id, $data);


        if ($insert) {
            $session->setFlashdata('success', 'SubDisclosure successfully Update');
        } else {
            $session->setFlashdata("error", "SubDisclosure not Update");
        }


        return redirect()->back();
    }


    public function master_data_view($value)
    {

        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $subDis_addtion = new MasterSubDis();
        $classification_sub_model = new SubClassificationModel();
        $sub_clasii = $classification_sub_model->where('status', 1)->findAll();
        $option_query = $db->query("select * from option_Answer where  status=1")->getResultArray();
        $model = $subDis_addtion->where('id', $value)->first();
        $action = $model['action'];
        $type_option_data = json_decode($model['type_option']);
        $answer_option = json_decode($model['answer_option']);

        $boundary_data = $model['boundary_select'];
        $date_option = $model['date_option'];
        $total_value = $model['total_value'];

        if ($total_value == 1) {
            $totalvalue = 'Yes';
        }
        if ($total_value == 2) {
            $totalvalue = 'No';
        }

        $boundary_id = json_decode($model['boundary_id']);

        if ($date_option == 1) {
            $date = 'Yes';
        }
        if ($date_option == 2) {
            $date = 'No';
        }

        if ($boundary_data == 1) {
            $boundary_view = 'Yes';
        }
        if ($boundary_data == 2) {
            $boundary_view = 'No';
        }


        // if($type_option_data == 1){
        // 	$type_option = 'Listing';
        // } 
        // if($type_option_data == 2){
        // 	$type_option = 'MultiSelect';
        // }

        $sub_classification = $model['sub_classifiction_1'];
        $sub_classification2 = json_decode($model['sub_classifiction_2']);

        if ($action == 1) {

            $data = "";
            $data .= '<table class="table table-bordered table-hover"><tr><th>Sno </th><th>Sub Classification 1</th><th>Opreator</th><th>Sub Classification 2</th></tr>';
            $sno = 1;

            $data .= '<tr>';
            $data .= '<td>' . $sno++ . '</td>';
            $data .= '<td>';
            foreach ($sub_clasii as $sub_clasii_id) {
                if ($sub_clasii_id['id'] == $sub_classification) {
                    $data .= '' . $sub_clasii_id['sub_classification_name'] . ' ';
                }
            }
            $data .= '</td>';

            $data .= '<td>' . $model["opreator"] . '</td>';
            $data .= '<td>';

            foreach ($sub_clasii as $sub_clasii_id) {
                if (in_array($sub_clasii_id['id'], $sub_classification2)) {
                    $data .= '' . $sub_clasii_id['sub_classification_name'] . '<br>';
                }
            }
            $data .= '</td>';
            $data .= '</tr>';
        }
        if ($action == 2) {

            $data = "";
            $data .= '<table class="table table-bordered table-hover"><tr><th>Sno </th><th>Type</th><th>Answer</th><th>Boundary</th><th>Date</th><th>Total Value</th></tr>';
            $sno = 1;

            $data .= '<tr>';
            $data .= '<td>' . $sno++ . '</td>';
            $data .= '<td>';
            foreach ($type_option_data as $type_option) {
                if ($type_option == 1) {
                    $data .= '' . 'Listing' . ', ';
                }
                if ($type_option == 2) {
                    $data .= '' . 'Multiselect' . ', ';
                }
                if ($type_option == 3) {
                    $data .= '' . 'Comment' . ', ';
                }
                if ($type_option == 4) {
                    $data .= '' . 'Value' . ', ';
                }
            }
            $data .= '</td>';
            $data .= '<td>';
            foreach ($option_query as $option) {
                if (in_array($option['id'], $answer_option)) {
                    $data .= '' . $option['answer_name'] . ', ';
                }
            }
            $data .= '</td>';

            // $data.='<td>'.$boundary_view. '</td>';

            $data .= '<td>';
            foreach ($boundary_id as $boundary_data) {
                if ($boundary_data == 1) {
                    $data .= '' . 'Sites' . ', ';
                }
                if ($boundary_data == 2) {
                    $data .= '' . 'Supplier' . ', ';
                }
                if ($boundary_data == 3) {
                    $data .= '' . 'Products' . ', ';
                }
                if ($boundary_data == 4) {
                    $data .= '' . 'Projects' . ', ';
                }
            }
            $data .= '</td>';

            $data .= '<td>' . $date . '</td>';
            $data .= '<td>' . $totalvalue . '</td>';

            $data .= '</tr>';
        }
        echo $data;
    }

    public function edit_type_answeroption($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $subDis_addtion = new MasterSubDis();
        $classification_sub_model = new SubClassificationModel();
        $sub_clasii = $classification_sub_model->where('status', 1)->findAll();
        $option_query = $db->query("select * from option_Answer where  status=1")->getResultArray();
        $model = $subDis_addtion->where('id', $id)->first();
        $action_type = $model['action'];
        $id = $model['sub_disclosure_id'];
        $answer_option = json_decode($model['answer_option']);
        $type_option = json_decode($model['type_option']);
        $opreator = json_decode($model['opreator']);
        $sub_clasiification_2 = json_decode($model['sub_classifiction_2']);
        // print_r($answer_option);
        // print_r($type_option);
        // print_r($opreator);
        // print_r($sub_clasiification_2);
        $sub_fetch = $db->query("select * from sub_disclosure where id='" . $id . "' and status=1")->getResultArray();
        foreach ($sub_fetch as $key => $value) {
        }
        $sub_disclosure = $value['sub_disclosure'];
        $sub_classifiction = json_decode($model['sub_classifiction_2']);
        $sub_classification_data = $db->query("select * from sub_disclosure where sub_disclosure='" . $sub_disclosure . "' and status=1")->getResultArray();

        // print_r($sub_classification_data);
        // die();
        $data = "";

        foreach ($opreator as $key => $type_show) {
            foreach ($sub_clasiification_2 as  $key1 => $answer_show) {
                if ($key == $key1) {
                    $data .= '<div class="form-group">
       <label for="ghg_name">Opreator</label>
     <select class="form-control" name="opreator[]">
        <option value="">Select Opreator</option>';
                    if ($type_show == '-') {


                        $data .= '<option  value="-" selected >-</option>';
                    } else {
                        $data .= '<option  value="-" >-</option>';
                    }
                    if ($type_show == '+') {

                        $data .= '<option  value="+" selected > + </option>';
                    } else {
                        // print_r($type_show);
                        $data .= '<option  value="+"> + </option>';
                    }
                    if ($type_show == '*') {

                        $data .= '<option  value="*" selected > * </option>';
                    } else {
                        $data .= '<option  value="*" > * </option>';
                    }
                    if ($type_show == '/') {
                        $data .= '<option  value="/" selected> / </option>';
                    } else {
                        $data .= '<option  value="/" > / </option>';
                    }
                    $data .= '</select></div>';
                    $data .= '<div class="form-group">
        <label for="ghg_name">Sub clasification-2</label>
        <select class="form-control" name="subClasii_2[]">
        <option value="">Select sub-clasification</option>';
                    foreach ($sub_clasii as $key => $value) {
                        foreach ($sub_classification_data as $key => $sub_classification_id) {
                            $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                            if (in_array($value['id'], $sub_cla)) {


                                if ($value['id'] == $answer_show) {
                                    $data .= '<option value="' . $value['id'] . '" selected>' . $value['sub_classification_name'] . '</option>';
                                } else {
                                    $data .= '<option value="' . $value['id'] . '">' . $value['sub_classification_name'] . '</option>';
                                }
                            }
                        }
                    }



                    $data .= '</select>                                                   
            </div>';
                }
            }
        }


        echo $data;
    }
    public function edit_type_answeroption_dd($id)
    {
        $session = session();
        $user_info = $session->get('user_info');
        $db = \Config\Database::connect();
        if (!$user_info) {

            return redirect()->to('auth/logout');
        }

        $subDis_addtion = new MasterSubDis();
        $classification_sub_model = new SubClassificationModel();
        $sub_clasii = $classification_sub_model->where('status', 1)->findAll();
        $option_query = $db->query("select * from option_Answer where  status=1")->getResultArray();
        $model = $subDis_addtion->where('id', $id)->first();
        $action_type = $model['action'];
        $id = $model['sub_disclosure_id'];
        $answer_option = json_decode($model['answer_option']);
        $type_option = json_decode($model['type_option']);
        $opreator = json_decode($model['opreator']);
        $sub_fetch = $db->query("select * from sub_disclosure where id='" . $id . "' and status=1")->getResultArray();
        foreach ($sub_fetch as $key => $value) {
        }
        $sub_disclosure = $value['sub_disclosure'];
        // die();
        $sub_classifiction = json_decode($model['sub_classifiction_2']);
        $sub_classification_data = $db->query("select * from sub_disclosure where sub_disclosure='" . $sub_disclosure . "' and status=1")->getResultArray();
        // print_r($sub_classification_data);
        $data = "";

        foreach ($type_option as $key => $type_show) {
            foreach ($answer_option as  $key1 => $answer_show) {
                if ($key == $key1) {

                    $data .= '<div class="form-group">
      <label for="ghg_name">Type</label>
      <select class="form-control edittype" name="type[]">
        <option >Select type</option>';
                    if ($type_show == 1) {
                        $data .= '<option  value="1" selected >listing</option>';
                    } else {
                        $data .= '<option  value="1" >listing</option>';
                    }
                    if ($type_show == 2) {
                        $data .= '<option  value="2" selected > Multiselect </option>';
                    } else {
                        $data .= '<option  value="2"> Multiselect </option>';
                    }
                    if ($type_show == 3) {

                        $data .= '<option  value="3" selected > Comment </option>';
                    } else {
                        $data .= '<option  value="3" > Comment </option>';
                    }
                    if ($type_show == 4) {
                        $data .= '<option  value="4" selected> Value </option>';
                    } else {
                        $data .= '<option  value="4" > Value </option>';
                    }
                    $data .= '</select></div>';
                    $data .= '<div class="form-group">
        <label for="ghg_name">Answer option</label>
        <select class="form-control editAnsweroption"  name="answer_option[]" >
        <option value="">Select type</option>';
                    foreach ($option_query as $key => $value) {
                        if ($value['id'] == $answer_show) {
                            $data .= '<option value="' . $value['id'] . '" selected>' . $value['answer_name'] . '</option>';
                        } else {
                            $data .= '<option value="' . $value['id'] . '">' . $value['answer_name'] . '</option>';
                        }
                    }



                    $data .= '</select>                                                   
            </div>';
                }
            }
        }


        echo $data;
    }
}
