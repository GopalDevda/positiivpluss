<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

use App\Models\AboutModel;

use App\Models\InquiryModel;

use App\Models\linkModel;





class Home extends BaseController

{

	public function __construct(){

        helper(['form', 'url','html']);

        $session = \Config\Services::session();

    }



	public function index(){

 return redirect()->to('https://www.utopiic.com');
 
	}



// 	public function signup(){
// 		//$data['list'] = array('plan_id'=>$plan_id);
		
// 		echo view('front/signup');
// 	}
	
		public function signup(){
	  
	  	$db = \Config\Database::connect();
	  $plan_id = $this->request->getVar('plan_id');  
	  // print_r($plan_id);
	  // die();
	  $token = $this->request->getVar('csrf_token'); 
	  $time = date('Y-m-d H:i',strtotime("+1 min"));
	  	$c = $db->query("select * from link_expire where status=1  and csrf_token='".$token."'");
		$csrf= $c->getResultArray();
	  $ty=$csrf[0]['time'];
	  

	  if ($time > $ty) {
  
	      return view('front/expired');
}
	  if(empty($csrf)){
	      
	      echo "blank";	
	      return view('front/expired');
	  }else{
	      
	      echo view('front/signup');
	  }
	 

	}
	
	public function signupp(){
		//$data['list'] = array('plan_id'=>$plan_id);
		
		echo view('front/signupp');
	}


	public function signupexper(){
	  
	  
	  $plan_id = $this->request->getVar('plan_id');  
	  $token = $this->request->getVar('csrf_token'); 
	  $time = date('Y-m-d H:i',strtotime("+48 hours"));
	  $linkModel = new linkModel(); 
      
	 

if($linkModel->insert([ 'csrf_token' => $token,'planid' => $plan_id,'time' =>$time, ]))
        {
            return view('admin/ok');
	    }
	}



	public function user_login() {

		return view('front/user_login');

	}



	// Users Login

	public function login(){

		return view('front/login');

	}

	public function forgotPassword(){

		return view('front/forgot_password');

	}



	// Positive Mark

	public function positivemark(){

		return view('front/positive_mark');

	}

	public function pricing($supplier_id=''){
		$db = \Config\Database::connect();
		$data['supplier'] = array('supplier_id'=>$supplier_id);
		$c = $db->query('select * from company where status=1 order by id asc');
		$data['plan'] = $c->getResultArray();
		$c = $db->query('select * from cms where id=5');
		$data['list'] = $c->getResultArray();	
        //return redirect()->to('supplier/subscribe/'.$supplier_id);

         $session->setFlashdata('success','Your Account is created please check your email.');
         
         return redirect()->to('home/user_login');

		 // echo view('front/plan',$data);
	}

	public function insights(){
		$db = \Config\Database::connect();
		$c = $db->query("SELECT * FROM blog WHERE status = 1 order by id asc");
		//$p = $db->query("SELECT * FROM cms WHERE sulg = 'insights' LIMIT 1");
		//$par = $p->getResultArray();
		$blog = $c->getResultArray();

		return view('front/insight',['blog'=>$blog]);

	}



	//Abouts Works 

	public function abouts(){	

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

        $session = session();

        $query = $db->query("select * from cms where id=1");

	    $data['list'] = $query->getResultArray();

		return view('front/about_us',$data);

	}



	//Privacy-Police 

	public function privacypolicy()

	{	

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

        $session = session();

        $query = $db->query("select * from cms where id=2");

	    $data['list'] = $query->getResultArray();

		return view('front/privacy_policy',$data);

	}



	//Terms & Conditions

	public function termscondtions()

	{	

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

        $session = session();

        $query = $db->query("select * from cms where id=3");

	    $data['list'] = $query->getResultArray();

		return view('front/terms',$data);

	}



	//FAQ

	public function faq()

	{	

		$db = \Config\Database::connect();

		$aboutModel = new AboutModel(); 

        $session = session();

        $query = $db->query("select * from cms where id=4");

	    $data['cms'] = $query->getResultArray();

	    $query = $db->query("select * from faq where status=1");

	    $data['list'] = $query->getResultArray();

		return view('front/faq',$data);

	}





	//Contact Us

	public function contactus(){

		return view('front/contact');

	}



	public function addinquiry(){	

		$db = \Config\Database::connect();

       	$session = session();

		$inquiryModel = new InquiryModel(); 

	    $fname = $this->request->getVar('fname');

      	$lname = $this->request->getVar('lname');

      	$email = $this->request->getVar('email');

      	$subject = $this->request->getVar('subject');

       	$description = $this->request->getVar('description');



             if( $inquiryModel->insert([

             	'fname'=>$fname,

             	'lname'=>$lname,

             	'email'=>$email,

             	'subject'=>$subject,

            	'description'=>$description,

             	'user_id'=>1

             	]))

             {



               $session->setFlashdata('success','Inquiry has been saved successfully');



             } else {



                $session->setFlashdata('error','Inquiry  Not Save');



             }          

 	 	echo view('front/contact');

	 }



    public function getPlanByCompanySize($company_id,$supplier_id){
        $db = \Config\Database::connect();
        $data= array();
        $query = $db->query("select * from company where status=1 and id='".$company_id."' ");
        $data['company'] = $query->getResultArray();
        $query = $db->query("select * from supplier_plan where status=1 and company_id='".$company_id."' order by plan_price");
        $data['list'] = $query->getResultArray();
        $data['supplier'] = array('supplier_id'=>$supplier_id);
        echo view('ajax/get-supplier-plan',$data);
    }

	public function demo(){
 	 	echo view('front/demo');
	}
	
}

