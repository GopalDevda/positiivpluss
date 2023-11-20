<?php

	namespace App\Controllers;



	use App\Controllers\BaseController;

	use CodeIgniter\Controller;

	use App\Models\AboutModel;

	use App\Models\FaqCategoryModel;

	use App\Models\FaqModel;

	use App\Models\ModuleModel;

	use App\Models\IndustryModel;

	use App\Models\ModuleItemModel;



class Cms extends BaseController{



	public function __construct(){

		helper(['form', 'url','html']);

		$session = \Config\Services::session();

		$db = \Config\Database::connect();

	}



	public function index(){

       $db = \Config\Database::connect();

		$session = session();

 $user_info = $session->get('user_info');
        
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		$query = $db->query("select * from cms where id=1");

		$data['cms'] = $query->getResultArray();
		echo view('admin/dashboard',$data);

	}



	// Update Abouot Us Page

	public function aboutus(){

		$db = \Config\Database::connect();

		$session = session();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		$query = $db->query("select * from cms where id=1");

		$data['cms'] = $query->getResultArray();

		echo  view('admin/about-us',$data);

	}



	//Update Privacy-Policy Page

	public function policy(){

		$db = \Config\Database::connect();

		$session = session();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 

		$query = $db->query("select * from cms where id=2");

		$data['cms'] = $query->getResultArray();

		echo  view('admin/privacy-police',$data);

	}



	// Update Terms & Condition Page

	public function terms(){

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		$query = $db->query("select * from cms where id=3");

		$data['cms'] = $query->getResultArray();

		echo  view('admin/terms',$data);

	} 



	// Update Faq Page

	public function faq(){

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		$query = $db->query("select * from cms where id=4");

		$data['cms'] = $query->getResultArray();

		echo view('admin/faq',$data);

	}



	// Update Contact  Page

	public function contactus(){

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 

		$session = session();

		$query = $db->query("select * from cms where id=6");

		$data['cms'] = $query->getResultArray();

		

		redirect('admin/contact-us',$data);

	}



	// Update Plan  Page

	public function plan(){

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 

		$session = session();

		$query = $db->query("select * from cms where id=5");

		$data['cms'] = $query->getResultArray();

		echo view('admin/plan',$data);

	}



	public function cmsupdate($id){

		$db = \Config\Database::connect();

		$session = session();

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 	

		$title = $this->request->getVar('title');

		$description = $this->request->getVar('description');

		$id = $this->request->getVar('id');

		$updated_data = [

		"id" => $id,

		"title" => $title,

		"description" => $description

		];

		if($aboutModel->where(['id' => $id])->set($updated_data)->update()){

		$session->setFlashdata('success','CMS has been updated successfully');

		}else{

		$session->setFlashdata('error','CMS Not Updated');

		}          

		return redirect()->to('cms/aboutus');

	}	



	// Faq Category

	public function faqcategory(){

		 $db = \Config\Database::connect();

		 $session = session();

		 $faqModel = new FaqCategoryModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		 $data['title'] = 'Faq Category';

		 $query = $db->query("select * from faq_category where status=1");

		 $data['list'] = $query->getResultArray();

		echo view('admin/faq-category',$data);

	}



	public function addfaqcategory(){

		

		$db = \Config\Database::connect();

       	$session = session();

		$faqModel = new FaqCategoryModel();

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 

	    $faq_category_name = $this->request->getVar('faq_category_name');

	    $ava = $db->query("select * from faq_category where faq_category_name='".$faq_category_name."' and status=1");

	    $ava = $ava->getResultArray();

        if(empty($ava)){

      	if( $faqModel->insert(['faq_category_name'=>$faq_category_name,

             	'status'=>1,

             	'user_id'=>1])){

      		

			$session->setFlashdata('success','faq Category has been saved successfully');

				} else {

			 $session->setFlashdata('error','faq Category  Not Save');

			}

		}else{



         $session->setFlashdata('error','Faq Category Name '.$faq_category_name.' already exist!');



        }

		return redirect()->to('cms/faqcategory');

	}



	public function editFaqCategory(){

      	$db = \Config\Database::connect();

      	$session = session();



      	$faqCategoryModel = new FaqCategoryModel(); 

      	$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

      	$faq_category_name = $this->request->getVar('faq_category_name');

      	$id = $this->request->getVar('id');

      	$ava = $db->query("select * from faq_category where faq_category_name='".$faq_category_name."' and status=1 and id!=".$id);

      	$ava = $ava->getResultArray();

        if(empty($ava)){

            $updated_data = [

                "faq_category_name" => $faq_category_name

            ];

            if($faqCategoryModel->where(['id' => $id])->set($updated_data)->update()){

               $session->setFlashdata('success','Faq category name has been updated successfully');

            }else{

                $session->setFlashdata('error','Faq Category Not Updated');

            }          

        }else{

         $session->setFlashdata('error','Faq Category Name '.$faq_category_name.' already exist!');

        }



        return redirect()->to('cms/faqcategory');



    }



	public function deletefaqcategory($id){

		$db = \Config\Database::connect();

		$session = session();

		$faqModel = new FaqCategoryModel(); 

		if($faqModel->update($id, ['status'=>0])){

		$session->setFlashdata('success','Faq category has been delete successfully');

		}else{

		$session->setFlashdata('error','Faq category not deleted');

		}     

		return redirect()->to('cms/faqcategory');

	}



	// Faq Category

	public function faqquestion(){

		$db = \Config\Database::connect();

        $session = session();

        $aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $data['title'] = 'FAQ Questions';

        $query = $db->query("select * from faq where status=1 ");

        $data['faq'] = $query->getResultArray();

        $query = $db->query("select * from faq_category where status=1 ");

        $data['faq_category'] = $query->getResultArray();

        echo view('admin/faqs',$data);

		

	}



	public function addfaqquestion(){

		$db = \Config\Database::connect();

      	$session = session();

      	$model = new FaqModel(); 

      	$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $faq_category_id = $this->request->getVar('faq_category_id');

        $title = $this->request->getVar('title');

        $description = $this->request->getVar('description');

      	$ava = $db->query("select * from faq where title='".$title."' and description='".$description."' and faq_category_id='".$faq_category_id."' and status=1");

      	$ava = $ava->getResultArray();

        if(empty($ava)){

      	if( $model->insert([

      		'faq_category_id'=>$faq_category_id,

      		'title'=>$title,

      		'description'=>$description,

            'status'=>1,

            'user_id'=>1])){      		

		$session->setFlashdata('success','faq  has been saved successfully');

				} else {

			 $session->setFlashdata('error','faq   Not Save');

			}

		}else{

         $session->setFlashdata('error','Faq  '.$title.' already exist!');

        }

        echo "heloo";

            return redirect()->to('cms/viewfaqs');

		}



	public function viewfaqs(){

		$db = \Config\Database::connect();

        $session = session();

        $aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

        $data['title'] = 'FAQ Questions';

        $query = $db->query("select * from faq where status=1 ");

        $data['list'] = $query->getResultArray();

       	echo view('admin/view-faq',$data);

    }



    public function editfaq($id)

    {	

    	$db = \Config\Database::connect();

        $query = $db->query("select * from faq_category where status=1 ");

        $data['faq_category'] = $query->getResultArray();

        $query = $db->query("select * from faq where status=1 and id=".$id);

        $data['list'] = $query->getRow();

        // echo '<pre>';

        // print_r($data['list']);

        // die();

    	echo view('admin/edit-faq',$data);

    }



    public function updatefaq(){

      	$db = \Config\Database::connect();

      	$session = session();

      	$faqModel = new FaqModel(); 

      	$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

      	$faq_category_id = $this->request->getVar('faq_category_id');

      	$title = $this->request->getVar('title');

      	$description = $this->request->getVar('description');

      	$id = $this->request->getVar('id');

      	

            $updated_data = [

                "faq_category_id" => $faq_category_id,

                "title" => $title,

                "description" => $description

            ];

            if($faqModel->where(['id' => $id])->set($updated_data)->update()){

               $session->setFlashdata('success','Faq category name has been updated successfully');

            }else{

                $session->setFlashdata('error','Faq Category Not Updated');

            }          



        return redirect()->to('cms/viewfaqs');



    }



    public function deletefaq($id){

		$db = \Config\Database::connect();

		$session = session();

		$faqModel = new FaqModel(); 

		$aboutModel = new AboutModel(); 

		$module_model = new ModuleModel();

        $industry_model = new IndustryModel();

        $module_item_model = new ModuleItemModel();

        $data['menu'] = $module_model->select("*")->where('status',1)->findAll();

        $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();

        $data['mod_item'] = $module_item_model->where('status',1)->findAll();

		if($faqModel->update($id, ['status'=>0])){

		$session->setFlashdata('success','Faq category has been delete successfully');

		}else{

		$session->setFlashdata('error','Faq category not deleted');

		}     

		return redirect()->to('cms/viewfaqs');

	}

  }
   ?>