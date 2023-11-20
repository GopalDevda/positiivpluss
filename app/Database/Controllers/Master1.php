<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SdgModel;
use App\Models\IndustryModel;
use App\Models\IndicatorCategoryModel;
use App\Models\DocumentTypeModel;
use App\Models\IndicatorModel;

class Master extends BaseController
{
    public function __construct(){
        helper(['form', 'url','html']);
        $session = \Config\Services::session();
       // $this->user_info = $this->session->get_userdata();
    }
    
    public function index(){
        echo view('login');
    }

    public function sdg(){
        $db = \Config\Database::connect();
        $data['title'] = 'SDGs Management';
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        echo view('admin/sdg',$data);
    }

    public function addsdg(){
      $db = \Config\Database::connect();
      $session = session();
      $sdgModel = new SdgModel(); 
     
      $sdg = $this->request->getVar('sdg_name');
      $file = $this->request->getFile('file');

      $ava = $db->query("select * from sdg where sdg_name='".$sdg."' and status=1");
      $ava = $ava->getResultArray();
      if(empty($ava)){
          if($file->isValid()){
            $ext = $file->getClientExtension();
            $ava_ext = array("png", "jpg", "jpeg", "gif");
                if(in_array($ext,$ava_ext)){
                     $newName = $file->getRandomName();
                    if($file->move('public/uploads/sdg',$newName)){
                        if($sdgModel->insert(['sdg_name'=>$sdg,'image'=>$newName,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){
                            $session->setFlashdata('success','Sdg has been saved successfully');
                        }else{
                            $session->setFlashdata('error','Sdg Not Save');
                        }
                    }else{
                         $session->setFlashdata('error','Please select a valid icon');
                    }
                }else{
                        $session->setFlashdata('error','Please select a valid icon');
                }
              }
        }else{
          $session->setFlashdata('error','Sdg name '.$sdg.' already exist!');
        }
         return redirect()->to('master/sdg');
    }

    public function deletesdg($id){
        $session = session();
        $sdgModel = new SdgModel(); 
        if($sdgModel->update($id, ['status'=>0])){
             $session->setFlashdata('success','Sdg has been delete successfully');
        }else{
             $session->setFlashdata('error','sdg not deleted');
        }     
         return redirect()->to('master/sdg');
    }

    public function industrycategory(){
        $db = \Config\Database::connect();
        $session = session();
        $industryModel = new IndustryModel(); 
        $data['title'] = 'Industry Category Management';
        $query = $db->query("select * from industry_category where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/industry-category',$data);
    }

   public function addindustrycategory(){
      $db = \Config\Database::connect();
      $session = session();
      $industryModel = new IndustryModel(); 
      $industry_category_name = $this->request->getVar('category_name');
      $ava = $db->query("select * from industry_category where industry_category_name='".$industry_category_name."' and status=1");
      $ava = $ava->getResultArray();
        if(empty($ava)){
            if($industryModel->insert(['industry_category_name'=>$industry_category_name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){
               $session->setFlashdata('success','Industry category name has been saved successfully');
            }else{
                $session->setFlashdata('error','Sdg Not Save');
            }          
        }else{
         $session->setFlashdata('error','Industry Category Name '.$industry_category_name.' already exist!');
        }
        return redirect()->to('master/industrycategory');
    }
    public function deleteindustrycategory($id){
      $db = \Config\Database::connect();
      $session = session();
      $industryModel = new IndustryModel(); 
        if($industryModel->update($id, ['status'=>0])){
             $session->setFlashdata('success','Industry category has been delete successfully');
        }else{
             $session->setFlashdata('error','Industry category not deleted');
        }     
         return redirect()->to('master/industrycategory');
    }

    public function indicatorcategory(){
        $db = \Config\Database::connect();
        $session = session();
        $data['title'] = 'Indicator Category Management';
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/indicator-category',$data);
    }

   public function addindicatorcategory(){
      $db = \Config\Database::connect();
      $session = session();
      $industryModel = new IndicatorCategoryModel(); 
      $industry_category_name = $this->request->getVar('category_name');
      $ava = $db->query("select * from indicator_category where indicator_category_name='".$industry_category_name."' and status=1");
      $ava = $ava->getResultArray();
        if(empty($ava)){
            if($industryModel->insert(['indicator_category_name'=>$industry_category_name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){
               $session->setFlashdata('success','Indicator category name has been saved successfully');
            }else{
                $session->setFlashdata('error','Sdg Not Save');
            }          
        }else{
         $session->setFlashdata('error','Indicator Category Name '.$industry_category_name.' already exist!');
        }
        return redirect()->to('master/indicatorcategory');
    }

    public function deleteindicatorcategory($id){
      $db = \Config\Database::connect();
      $session = session();
      $industryModel = new IndicatorCategoryModel(); 
        if($industryModel->update($id, ['status'=>0])){
             $session->setFlashdata('success','Indicator category has been delete successfully');
        }else{
             $session->setFlashdata('error','Indicator category not deleted');
        }     
         return redirect()->to('master/indicatorcategory');
    }



    public function documenttype(){
        $db = \Config\Database::connect();
        $session = session();
        $data['title'] = 'Document Type Management';
        $query = $db->query("select * from document_type where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/document-type',$data);
    }

   public function adddocumenttype(){
      $db = \Config\Database::connect();
      $session = session();
      $model = new DocumentTypeModel(); 
      $name = $this->request->getVar('name');
      $ava = $db->query("select * from document_type where document_type_name='".$name."' and status=1");
      $ava = $ava->getResultArray();
        if(empty($ava)){
            if($model->insert(['document_type_name'=>$name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')])){
               $session->setFlashdata('success','Document Type has been saved successfully');
            }else{
                $session->setFlashdata('error',' Not Save');
            }          
        }else{
         $session->setFlashdata('error','Document Type '.$name.' already exist!');
        }
        return redirect()->to('master/documenttype');
    }

    public function deleteDocumentType($id){
      $db = \Config\Database::connect();
      $session = session();
      $model = new DocumentTypeModel(); 
        if($model->update($id, ['status'=>0])){
             $session->setFlashdata('success','Document Type  has been delete successfully');
        }else{
             $session->setFlashdata('error','Document Type not deleted');
        }     
         return redirect()->to('master/documenttype');
    }

    public function indicator(){
        $db = \Config\Database::connect();
        $session = session();
        $data['title'] = 'Indicator Management';
        $query = $db->query("select * from indicator_category where status=1 ");
        $data['indicator_category'] = $query->getResultArray();
        $query = $db->query("select * from sdg where status=1 ");
        $data['sdg'] = $query->getResultArray();
        echo view('admin/indicator',$data);
    }

   public function addIndicator(){
      $db = \Config\Database::connect();
      $session = session();
      $model = new IndicatorModel(); 
        $indicator_category_id = $this->request->getVar('indicator_category_id');
        $name = $this->request->getVar('name');
        $sdg_id = $this->request->getVar('sdg_id');
      $ava = $db->query("select * from indicator where indicator_name='".$name."' and indicator_category_id='".$indicator_category_id."' and status=1");
      $ava = $ava->getResultArray();
        if(empty($ava)){
            $indicator_id = $model->insert(['indicator_category_id'=>$indicator_category_id,'indicator_name'=>$name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')]);
            if($indicator_id){
                if(!empty($sdg_id)){
                   foreach($sdg_id as $d){
                        $db->query("insert into indicator_sdg(indicator_id,sdg_id,user_id,status,created_at)values('".$indicator_id."','".$d."',1,1,'".date('Y-m-d H:i:s')."' )");
                   }     
                }
                $session->setFlashdata('success','Indicator has been saved successfully');
            }else{
                $session->setFlashdata('error',' Not Save');
            }          
        }else{
         $session->setFlashdata('error','Indicator '.$name.' already exist!');
        }
        return redirect()->to('master/indicator');
    }
    public function viewindicator(){
        $db = \Config\Database::connect();
        $data['title'] = 'Indicator Management';
        $query = $db->query("select * from indicator where status=1 ");
        $data['list'] = $query->getResultArray();
        echo view('admin/view-indicator',$data);
    }
}