<?php
   namespace App\Controllers;
   use App\Controllers\BaseController;
   use App\Models\Universal;
   use App\Models\IndustryModel;
   use App\Models\SupplierPlanModel;
   use App\Models\CompanyModel;
   use App\Models\ModuleModel;
   use App\Models\ModuleItemModel;
   use App\Models\SupplierModuleModel;
   use App\Models\SupplierModuleItemModel;
   use App\Models\SupplierModuleItemRelationModel;
   use App\Models\SupplierModel;
   use App\Models\DegreeModel;
   class Admin extends BaseController
   {    private $helperData=array();    
   	public function __construct()
   	{        
   		helper(['form', 'url','html','menu']);       
   		 $session = \Config\Services::session();        
   		 $this->userInfo = $this->user_info = $session->get('user_info');  
   		 $this->helperData=commonData();   
   		 } 
   	public function index()
   	{        
   		echo view('admin/login');    
   	}    
   	public function home()
   	{ $session = session();        
   		$module_model = new ModuleModel();        
   		$data=$this->helperData;       
   		 // $industry_model = new IndustryModel();        
   		 // $module_item_model = new ModuleItemModel();       
   		  // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();        
   		  // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();     
   		     // $data['mod_item'] = $module_item_model->where('status',1)->findAll(); 
   	echo view('admin/dashboard',$data);    
   	}  
   	 public function sdg()
   	 {        echo view('admin/sdg');    
   	}      
   	 public function industrycategory()
   	 {        echo view('admin/industry-category');    
   	}       
   	public function indicatorcategory(){ 
   
   		echo view('admin/indicator-category');    
   	} 
   	public function indicator()
   	{        echo view('admin/indicator');    
       }       
      public function documenttype(){  
         echo view('admin/document-type');   
       }       
       public function industry(){  
             $session = session();    
                 $db = \Config\Database::connect();
                 $data['title'] = 'Industry Management';  
                 $query = $db->query("select * from industry_category where status=1 ");    
                 $data['industry_category'] = $query->getResultArray();  
                 $query = $db->query("select * from sdg where status=1 "); 
                 $data['sdg'] = $query->getResultArray(); 
                 echo view('admin/industry',$data);   
                  }   
       public function addIndustry()
       {    
             
        $db = \Config\Database::connect();  
        $session = session();    
        $model = new IndustryModel();
   
        $industry_category_id = $this->request->getVar('industry_category_id');  
        $name = $this->request->getVar('name');  
        $sdg_id = $this->request->getVar('sdg_id');
        $ava = $db->query("select * from industry where industry_name='".$name."' and industry_category_id='".$industry_category_id."' and status=1");      $ava = $ava->getResultArray();
        if(empty($ava)){          
          $industry_id = $model->insert(['industry_category_id'=>$industry_category_id,'industry_name'=>$name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')]);           
           if($industry_id){               
            if(!empty($sdg_id))
            	{    
            	foreach($sdg_id as $d){     
            	$db->query("insert into industry_sdg(industry_id,sdg_id,user_id,status,created_at)values('".$industry_id."','".$d."',1,1,'".date('Y-m-d H:i:s')."' )");        
            	}                    
            	 }    
            	  $session->setFlashdata('success','Industry has been saved successfully');        
            	      }
            	 else{                
            	 $session->setFlashdata('error',' Not Save');     
            	         }                 
            	}else{
            	       $session->setFlashdata('error','Industry '.$name.' already exist!');    
            	       }  
            	                                  
           return redirect()->to('admin/industry');   
         }   
     public function viewindustry()
     {   

      $db = \Config\Database::connect();  
      $data['title'] = 'Industry Management'; 
      $query = $db->query("select * from industry where status=1 order by id");

       $rs = $query->getResultArray();   
       $list=array();      
        if(!empty($rs)){     
        foreach($rs as $r){    
        $query = $db->query("select * from industry_category where status=1 and id='".$r['industry_category_id']."' ");                $cat = $query->getResultArray();                
        if(!empty($cat)){$category_name =$cat[0]['industry_category_name']; 
            	                              
         }
         else
         	{
         		$category_name=0;
         	}       
        $query = $db->query("select *,s.id as industry_sdg_id  from industry_sdg as s join sdg as b on s.sdg_id=b.id where s.status=1 and s.industry_id='".$r['id']."' and b.status=1 ");               
         $sdg = $query->getResultArray();                
         $list[]=array('industry_id'=>$r['id'],'industry_name'=>$r['industry_name'],'industry_category_name'=>$category_name,'sdg'=>$sdg);                       }        }

        $data['list']=$list;      
         echo view('admin/view-industry',$data);    
     } 
            	                                         
     public function deleteIndustrySdg($id){ 

     $db = \Config\Database::connect();  
     $session = session();    
     $query = $db->query("update industry_sdg set status=0 where id='".$id."'");   
     $session->setFlashdata('success','SDG has beed successfully remove with industry'); 
     return redirect()->to('admin/viewindustry');  

      } 


     public function supplierPlan(){ 
            	                                                
       $session = session();       
        $db = \Config\Database::connect();   
            $data['title'] = 'View Supplier Plan'; 
            $query = $db->query("select * from supplier_plan where status=1 order by id");  
            $data['list'] = $query->getResultArray();
            echo view('admin/supplier-plan',$data);    
        }

     public function addSupplierPlan(){ 
        $session = session();      
          $db = \Config\Database::connect();    
              $data['title'] = 'Add Supplier Plan'; 
              $query = $db->query("select * from company where status=1 "); 

            $data['company'] = $query->getResultArray();  

            echo view('admin/add-supplier-plan',$data);  

            } 

         public function addSupplierPlanSubmit()
         {

         $db = \Config\Database::connect();      
         $session = session();     
          $model = new SupplierPlanModel();         
          $company_id = $this->request->getVar('company_id');    
          $plan_name = $this->request->getVar('plan_name');    
          $plan_price = $this->request->getVar('plan_price');    
          $plan_validity = $this->request->getVar('plan_validity');    
          $plan_validity_time = $this->request->getVar('plan_validity_time');   
           $description = $this->request->getVar('description');    
           $no_of_user = $this->request->getVar('no_of_user');          
           $ava = $db->query("select * from supplier_plan where plan_name='".$plan_name."' and status=1");      
           $ava = $ava->getResultArray();        
           if(empty($ava)){           
            $plan_id = $model->insert(['company_id'=>$company_id,'plan_name'=>$plan_name,'plan_price'=>$plan_price,'plan_validity'=>$plan_validity,'plan_validity_time'=>$plan_validity_time,'description'=>$description,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s'),'no_of_user'=>$no_of_user]);            
            if($plan_id){                
            	$session->setFlashdata('success','Supplier Plan has been saved successfully');           
            	 }
            	else
            	{               
            	$session->setFlashdata('error',' Not Save');           
            	 }                  }
            	 else{                 
            	 	$session->setFlashdata('error','Plan name '.$plan_name.' already exist!');        
            	 }  
            	return redirect()->to('admin/supplierplan');    
            } 
     
     public function company()
      {       
           $session = session();        
           $db = \Config\Database::connect();        
           $data['title'] = 'Company Management';        
           $query = $db->query("select * from company where status=1 ");        
           $data['list'] = $query->getResultArray();       
            echo view('admin/company',$data);   

      }    

      public function addCompanySize(){ 
                 $db = \Config\Database::connect();     
                  $session = session();      
                  $model = new CompanyModel();       
                  $name = $this->request->getVar('name');      
                  $ava = $db->query("select * from company where company_size='".$name."' and status=1");      
                  $ava = $ava->getResultArray();        
                  if(empty($ava)){            
                  	$industry_id = $model->insert(['company_size'=>$name,'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')]);

            	   if($industry_id){  

            	 $session->setFlashdata('success','Company Size has been saved successfully');      
            	}
            	else{            
            	   $session->setFlashdata('error',' Not Save');        
            	       }   
            	        }else{     
            	$session->setFlashdata('error','Company Size '.$name.' already exist!');     
            	   }       
            	    return redirect()->to('admin/company');    
            	} 

      public function deleteCompanySize($id){ 
        $session = session();       
         $model = new CompanyModel();         
         if($model->update($id, ['status'=>0])){            
          $session->setFlashdata('success','Company has been delete successfully');      
            }else{            
             $session->setFlashdata('error','sdg not deleted');    
                 }             
       return redirect()->to('admin/company');    
             }  

        public function editCompanySize(){   
           $db = \Config\Database::connect();      $session = session();     
            $model = new CompanyModel();       $name = $this->request->getVar('name');  
            $id = $this->request->getVar('id');   
            $ava = $db->query("select * from company where company_size='".$name."' and status=1 and id!=".$id);    
            $ava = $ava->getResultArray();       
            if(empty($ava)){    
                    $updated_data = [                "company_size" => $name            ];          
            if($model->where(['id' => $id])->set($updated_data)->update())
            {   
            $session->setFlashdata('success','Company Size has been updated successfully');   
            }else
            {  
             $session->setFlashdata('error','Company Size Not Updated');          
              }

               }
               else
               { 

             $session->setFlashdata('error','Company Size '.$name.' already exist!');        
         }        
         return redirect()->to('admin/company');    
     }   
      public function advanceAssessment()
      {        
      	$rs = check_session();        if(!$rs) 
      	{   
      	return redirect()->to('home/user_login');       
      	}

      	$data['pg_nm'] = 'Advanced';   
      	    $db = \Config\Database::connect();      
      	    $session = session();       
      	    $supplier_info = $session->get('supplier_info');    
      	    $query = $db->query("select * from assessment where id=2 order by id ");     
      	    $data['assessment'] = $query->getResultArray();       
      	    $from_date = ''; $to_date =''; $is_submit =0; $assessment_per =0;  $assessment_id = 0;       
      	     $supplier_model = new SupplierModel();    
      	     $supplier_module_model = new SupplierModuleModel();  
      	     $supplier_module_item_model = new SupplierModuleItemModel();
      	     $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=2 order by id desc")->getRowArray(); 
      	     $data['supp_assess'] = $supp_assess;        
      	     $rs = $supplier_model->select("supplier_plan_id")->where('id',$supplier_info['supplier_id'])->first();       
      	      $supplier_plan_id = $rs['supplier_plan_id'];        
      	      $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();        
      	      $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();        
      	      $supplier_mod = [];        
      	      $supplier_mod_item = [];        
      	      if($sup_mod_item_relation) {            
      	      	foreach($sup_mod_item_relation as $smir) 
      	      		{                
      	      	$supplier_mod[] = $smir["supplier_module_id"];
      	      	                $supplier_mod_item[] = $smir["supplier_module_item_id"]; 
      	      	                           }        }        
      	      	$data['supplier_mod'] = $supplier_module_model->whereIn('id',$supplier_mod)->where('status',1)->findAll();
      	      	$data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id',$supplier_mod_item)->where('status',1)->findAll(); 
      	      	$query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=2 and is_verify=0  ");       
      	      	 $ava_assessment = $query->getResultArray(); 
      	      	if(!empty($ava_assessment)){ 
      	      	$assessment_id = $ava_assessment[0]['id'];
      	      	$from_date = $ava_assessment[0]['date_from']; 
      	      	$to_date =$ava_assessment[0]['date_to'];            
      	      	$is_submit =$ava_assessment[0]['is_submit'];;                    
      	      	$assessment_per =$ava_assessment[0]['assessment_per'];;                
      	      }
      	      elseif(empty($ava_assessment)){            
      	      	if($supp_assess) {                
      	      	if($supp_assess['is_verify']==0) {  
      	      	$assessment_id = $db->query("insert into supplier_assessment(assessment_id,supplier_id,date,datetime)values(2,'".$supplier_info['supplier_id']."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");                   
      	      	 $assessment_id = $db->insertID();                                    
      	      	}   }            
      	      	else {
      	      	$assessment_id = $db->query("insert into supplier_assessment(assessment_id,supplier_id,date,datetime)values(2,'".$supplier_info['supplier_id']."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");            $assessment_id = $db->insertID();
      	      	            }        }

      	      	$data['assessment_id'] = array('assessment_id'=>$assessment_id);//echo "select s.sdg_id from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id where (industry_id='".$supplier_info['industry_id']."' or industry_id=0) group by sdg_id";        
      	      	$query = $db->query("select s.sdg_id,s.degree_id,indicator_id from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id where b.status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) group by sdg_id");        $sdg = $query->getResultArray();  
      	      	      //echo $db->getLastquery($sdg);
      	      	    $total_question=0; 
      	      	    $total_attempt = 0; 
      	      	    $array=array(); 
      	      	    $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=2 order by id desc")->getRowArray(); 
      	      	           //echo 
      	      	    $db->getLastquery($supp_assess);  
      	      	                 if($supp_assess) {   

      	      	      $assessment_id = $supp_assess['id'];      
      	      	     }

      	      	if(!empty($sdg)){     
      	      	foreach($sdg as $d){ 
      	      	$query = $db->query("select * from sdg where status=1 and id='".$d['sdg_id']."' " );
      	      	$sdg_name = $query->getResultArray();
      	      	//echo $db->getLastquery($sdg_name);                    
      	      	$query = $db->query("select * from indicator_sdg where status=1 and sdg_id='".$d['sdg_id']."' " ); 
      	      	$c = $query->getResultArray();  
      	      	                  //echo $db->getLastquery($c);//echo "select * from indicator where status=1 and id='".$c[0]['indicator_id']."' <br>";                     
      	      	$query = $db->query("select * from indicator where status=1 and id='".$c[0]['indicator_id']."' " );                   
      	      	 $i = $query->getResultArray();  //   rint_r($i)."<br>";if(!empty($i)){//                          
      	      	   $query = $db->query("select * from indicator_category where id='".$i[0]['indicator_category_id']."' order by id ");          
      	      	   $query = $db->query("select * from indicator_category where id='".$i[0]['indicator_category_id']."' order by id ");
      	      	   $cat = $query->getResultArray();
      	      	   $query = $db->query("select * from sdg_assessment_question where  sdg_id='".$d['sdg_id']."' and status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id ");                            $question = $query->getResultArray();
      	      	    $question_array = array(); 
      	      	    if(!empty($question)){       
      	      	    foreach($question as $q){
      	      	    $answer_insert_id=0;
      	      	    $remark='';                                    
      	      	    $query = $db->query("select * from sdg_assessment_answer where sdg_assessment_question_id='".$q['id']."' and status=1 order by id ");                                    
      	      	    $answer = $query->getResultArray();
      	      	     $answer_array = array(); 
      	      	    if(!empty($answer)){ 
      	      	    foreach($answer as $a){                                    
      	      	    	$ava_status =0;                                    
      	      	    	$query = $db->query("select * from supplier_base_assessment where base_assessment_question_id='".$q['id']."' and supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and base_assessment_answer_id='".$a['id']."' and status=1 order by id ");                                    $ava = $query->getResultArray();                                    
      	      	    	if(!empty($ava)){$ava_status=1;$answer_insert_id=$ava[0]['id'];$remark=$ava[0]['remark'];}                                         $answer_array[] = array('answer_id'=>$a['id'],'answer'=>$a['answer'],'marks'=>$a['marks'],'choice'=>$q['choice'],'ava_status'=>$ava_status);                                        }  
      	      	    	                                  } 
      	    $question_array[] = array('question_id'=>$q['id'],'question'=>$q['question'],'choice'=>$q['choice'],'remark'=>$q['remark'],'answer'=>$answer_array,'answer_insert_id'=>$answer_insert_id,'remark'=>$remark, 'question_title' => $q['question_title']);
      	}            
      	     
      	 $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where sdg_id='".$d['sdg_id']."' and s.supplier_id='".$supplier_info['supplier_id']."' and s.supplier_assessment_id='".$assessment_id."' ");                
      	 $question_attempt = $query->getResultArray();               
      	  $total_attempt = $total_attempt+$question_attempt[0]['tot'];               
      	   $total_question = $total_question+count($question_array);                
      	   $array[] = array('id'=>$d['sdg_id'],'indicator_name'=>$sdg_name[0]['sdg_name'],'image'=>$sdg_name[0]['image'],'indicator_category_name'=>$cat[0]['indicator_category_name'],'question'=>$question_array,'question_attempt'=>$question_attempt[0]['tot'],'from_date'=>$from_date,'to_date'=>$to_date,'is_submit'=>$is_submit);                   
      	    }               
      	     }            
      	 }


      	    $data['detail'] = array('total_question'=>$total_question,'total_attempt'=>$total_attempt,'percent'=>$assessment_per);        
      	    $data['indicator'] = $array;      
      	      //echo $db->getLastquery($data['indicator']);  
      	            // echo '<pre>';        // print_r($array);  
      	        $data['supplier_info'] = array('supplier_id'=>$supplier_info['supplier_id'],'brand_name'=>$supplier_info['brand_name']); 
      	        $list = [];            
      	        $degree_model = new DegreeModel(); 
      	        $data['degree'] = $degree_model->where('status',1)->findAll(); 
      	         $supplier_base_assessment = []; 
      	         if($data['supp_assess']) {    
      	         $supplier_base_assessment = $db->query("select * from supplier_base_assessment where supplier_assessment_id=".$data['supp_assess']['id'])->getResultArray();
      	         }
      	    if($supplier_base_assessment) { 
      	    foreach($supplier_base_assessment as $sba) {    
      	    $temp_arr = [];   
      	    $question = $db->query("select sdg_assessment_question.question,sdg.sdg_name,indicator.indicator_name from sdg_assessment_question join sdg on sdg_assessment_question.sdg_id=sdg.id join indicator on sdg_assessment_question.indicator_id=indicator.id  where sdg_assessment_question.id=".$sba['base_assessment_question_id'])->getRowArray(); 
      	    $answer = $db->query("select answer,marks from sdg_assessment_answer where sdg_assessment_answer.id=".$sba['base_assessment_answer_id'])->getRowArray(); 
      	    $temp_arr["supplier_base_assessment"] = $sba;  
      	    $temp_arr["question"] = $question;       
      	    $temp_arr["answer"] = $answer;   
      	    $list[] = $temp_arr;              
      	      }           
      	       }        
      	    $data['supplier_base_assessment_list'] = $list; 
      	    $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=2 order by id desc")->getRowArray();  
      	    $data['supp_assess'] = $supp_assess;  
      	          $total_level =''; 
      	                 $level_name ='';  
      	    $query = $db->query("SELECT SUM(mark) as tot,assessment_id FROM `supplier_base_assessment` as a join supplier_assessment as b on a.supplier_assessment_id=b.id WHERE a.status=1 and  assessment_id=2 and a.`supplier_id`=".$supplier_info['supplier_id']." order by assessment_id");  
      	         $level = $query->getResultArray(); 
      	               $total_level = 0; 
      	                     $level_name =''; 
       if(!empty($level)){ 
      	        $query = $db->query("SELECT * FROM assessment WHERE status=1 and id='".$level[0]['assessment_id']."' ");               $t = $query->getResultArray();              
      	         if(!empty($t))
      	          {                   
       $total_level = (($level[0]['tot']/100)*$t[0]['weight_percentage']); 
                      }

                 }     
         if($total_level>=0 && $total_level<=20)
         {  
            $level_name = "Dorment";      
         }  

            if($total_level>=21 && $total_level<=40)
            {  

                 $level_name = "Active";      
            }       
                 
        if($total_level>=41 && $total_level<=60)
        { 
                    $level_name = "Positive";     
        }    

          if($total_level>=81 && $total_level<=100){   

         $level_name = "Green";      
          }       
          $data['level'] = array("level_name"=>$level_name,"level_per"=>$total_level); 
                $series_arr = [];       
                if($data['supp_assess']) {  

          	if($sdg) 
          		{        
          		foreach($sdg as $d) {
          		if(!empty($d['degree_id'])) { 
          		$query = $db->query("select degree_num from degree where id=".$d['degree_id']);
          		$industry_sdg_degree_num_arr = $query->getResultArray();
          		if($industry_sdg_degree_num_arr) { 
          		$industry_sdg_degree_num = $industry_sdg_degree_num_arr[0]['degree_num'];    
          	}                   
          		 $query = $db->query("select * from sdg where status=1 and id='".$d['sdg_id']."' " );  
          		 $sdg_name = $query->getResultArray(); 
          		  $query = $db->query("select * from indicator_sdg where status=1 and sdg_id='".$d['sdg_id']."' " );                    $c = $query->getResultArray(); 
          		   $query = $db->query("select * from indicator where status=1 and id='".$c[0]['indicator_id']."' " );                    $i = $query->getResultArray(); 

          		if(!empty($i)){  
          		 $query = $db->query("select * from indicator_category where id='".$i[0]['indicator_category_id']."' order by id ");                $cat = $query->getResultArray();

          		  $query = $db->query("select id from sdg_assessment_question where  sdg_id='".$d['sdg_id']."' and status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id ");

          		 $question = $query->getResultArray();

          		$tot_degree_num = 0; 
          		$avg_degree_num = 0;  
          		if($question) {    
          		 {   
          		$query = $db->query("select sba.base_assessment_answer_id,saa.degree_id from supplier_base_assessment as sba join sdg_assessment_answer as saa on sba.base_assessment_answer_id=saa.id where sba.base_assessment_question_id=".$qs['id']." and supplier_assessment_id=".$data['supp_assess']['id']);  

          		 $ans_degree = $query->getResultArray();
          		                         //echo $db->getLastquery($ans_degree);                        


          	if($ans_degree) {    
          	 $query = $db->query("select degree_num from degree where id=".$ans_degree[0]['degree_id']);    
          	  $degree_num_arr = $query->getResultArray(); 
          	    if($degree_num_arr) 

          	    { 
          	    $tot_degree_num = $tot_degree_num + $degree_num_arr[0]['degree_num'];  } 
          	                           }     }  


          	     $avg_degree_num = round($tot_degree_num/count($question));
          	      }          } 


          	     $spec_series = []; 
          	            $temp = [];
          	           $points_arr = []; 
          	           $spec_series['name'] = $sdg_name[0]['sdg_name']; 
          	            $points_arr[] = $avg_degree_num;  
          	            $points_arr[] = (int)$industry_sdg_degree_num; 
          	            $temp[] = $points_arr;   
          	            $spec_series['data']=$temp; 
          	            $series_arr[] = $spec_series;     
          	                   }  
          	                         }   
          	                             }    
          	         }       
          	         $data['series_arr'] = $series_arr;  
          	              // echo '<pre>';       // print_r(json_encode($data['series_arr']));       // die();      
          	echo view('brand/advance-assessment',$data);    }   


    public function submitSdgAssessmentQuestion($assessment_id,$qid,$answer,$remark,$indicator,$choice,$answer_insert_id)
    { 

           if($remark=='0'){$remark='';} 

     $db = \Config\Database::connect();  
         $session = session();
                $supplier_info = $session->get('supplier_info');
                       if($choice=='Multi'){ 
                if($answer!=''){
                $query = $db->query("delete from supplier_base_assessment where status=1 and base_assessment_question_id='".$qid."' and supplier_id='".$supplier_info['supplier_id']."' and supplier_assessment_id='".$assessment_id."'  order by id asc");                $answer = explode(",",$answer);

                 foreach($answer as $a){
                     $query = $db->query("select * from sdg_assessment_answer where status=1 and id='".$a."' order by id asc");                  
                      $marks = $query->getResultArray();                  
                      $query = $db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$a."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");                         $answer_insert_id = $db->insertID(); 



                     }          
                       }      
                        }
                        else
                        {           

        $query = $db->query("select * from sdg_assessment_answer where status=1 and id='".$answer."' order by id asc");            $marks = $query->getResultArray();

                    if($answer_insert_id=='0'){ 
                    $query =$db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$answer."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");                      $answer_insert_id = $db->insertID();

                    }
                    else{               
            $query =$db->query("update supplier_base_assessment set base_assessment_answer_id='".$answer."',mark='".$marks[0]['marks']."',remark='".$remark."',updated_at='".date('Y-m-d H:i:s')."' where id='".$answer_insert_id."' ");               }       }       $query = $db->query("select count('id') tot from sdg_assessment_question where status=1 and sdg_id='".$indicator."' and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id asc");       
            $a = $query->getResultArray();

                   $AllQuestions = $a[0]['tot']; 

                   $query = $db->query("select count(distinct(s.base_assessment_question_id)) as tot from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where b.sdg_id='".$indicator."'  and s.supplier_id='".$supplier_info['supplier_id']."'  ");
                       $b = $query->getResultArray();

                $query = $db->query("select count(distinct(s.base_assessment_question_id)) as tot from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where s.supplier_id='".$supplier_info['supplier_id']."'  ");        $t = $query->getResultArray();

            echo json_encode(array("status"=>1,'tot_q'=>$AllQuestions,'tot_ans'=>$b[0]['tot'],'insert_id'=>$answer_insert_id,'total_q'=>$t[0]['tot']));    

                    }  


            function submitAdvanceAssessment(){ 


               $db = \Config\Database::connect(); 

                  $session = session();   
                   $supplier_info = $session->get('supplier_info');   
                    $assessment_id = $this->request->getVar('supplier_assessment_id'); 
                    $from = $this->request->getVar('from');          
                    $to = $this->request->getVar('to');           
                    $query = $db->query("SELECT count(b.id) as tot FROM `indicator` as s join sdg_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1");       
                    $r = $query->getResultArray();      

                     $totalQuestionAnswered = $r[0]['tot'];       
                     $query = $db->query("SELECT * FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1  group by base_assessment_question_id ");       
                     $b = $query->getResultArray();       
                     $total_answer = count($b);       
                     if(!empty($b))
                     	{echo $b = count($b);}else{$b=0;} 

                     $percent = ($totalQuestionAnswered/$b)*100;       

                     $query = $db->query("SELECT SUM(mark) as tot FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1 ");       
                     $m = $query->getResultArray();
                            $marks = $m[0]['tot'];            

                     $u = $db->query("update supplier_assessment set total_question='".$totalQuestionAnswered."',total_answer='".$total_answer."',assessment_per='".$percent."',is_submit=1,submit_datetime='".date('Y-m-d H:i:s')."',date_from='".$from."',date_to='".$to."' where id='".$assessment_id."' ");        $session->setFlashdata('success','Assessment has been successfully submitted');        



                    return redirect()->to('admin/advanceAssessment');    
                }    




                    public function undoadvanceAssessment($assessment_id)
                    { 


                    $db = \Config\Database::connect();    

                    $session = session(); 
                    $u = $db->query("update supplier_assessment set is_submit=0,updated_at='".date('Y-m-d H:i:s')."' where id='".$assessment_id."' ");$session->set('success','Assessment has been successfully und0');  

                          return redirect()->to('admin/advanceAssessment');    

                      }   


                     public function verifyAdvanceAssessment() { 

                   $db = \Config\Database::connect(); 
                    $session = Session();  
                     $supplier_info = $session->get('supplier_info');
                     $msg = "";        
                     if($supplier_info['supplier_id']) {   
                              // $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=2 and supplier_id=".$supplier_info['supplier_id']);            
                              $supplier_assessment = $db->query("select * from supplier_assessment where assessment_id=2 and supplier_id=".$supplier_info['supplier_id']." order by id desc")->getRow(); 
                                         // $supplier_base_assessment = $db->query("select count(*) as cnt from supplier_base_assessment where supplier_assessment_id=".$supplier_assessment->id." and need_document=1")->getRow();            
                                         // $supplier_base_assessment = $db->query("select sba.base_assessment_question_id,baq.id as qid from supplier_base_assessment as sba join base_assessment_question as baq on sba.base_assessment_question_id=baq.id where sba.supplier_assessment_id=".$supplier_assessment->id." and baq.is_document_needed=1")->getResultArray();


           $supplier_base_assessment = $db->query("select distinct(sba.base_assessment_question_id), sba.base_assessment_question_id,baq.id as qid from supplier_base_assessment as sba join sdg_assessment_question as baq on sba.base_assessment_question_id=baq.id where sba.supplier_assessment_id=".$supplier_assessment->id." and baq.is_document_needed=1")->getResultArray();


            $connected_document = $db->query("select count(*) as doc_cnt from document_connection where supplier_assessment_id=".$supplier_assessment->id)->getRow();

            if($supplier_base_assessment) {

                $msg = $connected_document->doc_cnt." out of ".count($supplier_base_assessment)." document connected, need to connect remaining documents";  
            }            

                if($connected_document->doc_cnt==count($supplier_base_assessment)) {

                   $id = $db->query("update supplier_assessment set is_verify=1 where assessment_id=2 and supplier_id=".$supplier_info['supplier_id']);                return "";                               
                   }        }        
                   return $msg;   
                    }  


    public function checkQuestionCompletion() {  

            $db = \Config\Database::connect();       
             $session = session();        
             $supplier_info = $session->get('supplier_info');     
            $assessment_id = 0;        
            $supp_assess = $db->query("select * from supplier_assessment where supplier_id=".$supplier_info['supplier_id']." and assessment_id=2 order by id desc")->getRowArray();        
            if($supp_assess) {            
            $assessment_id = $supp_assess['id'];        
            }              
            $query = $db->query("select s.sdg_id,indicator_id from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id where (industry_id='".$supplier_info['industry_id']."' or industry_id=0) group by sdg_id");        $sdg = $query->getResultArray();        $total_question=0;        $total_attempt = 0;        
            if(!empty($sdg)){           
            foreach($sdg as $d){                    
            $query = $db->query("select * from sdg where status=1 and id='".$d['sdg_id']."' " );                    

            $sdg_name = $query->getResultArray();                    //echo $db->getLastquery($sdg_name);
            $query = $db->query("select * from indicator_sdg where status=1 and sdg_id='".$d['sdg_id']."' " );                   
             $c = $query->getResultArray();                    //echo $db->getLastquery($c);//echo "select * from indicator where status=1 and id='".$c[0]['indicator_id']."' <br>";                     
             $query = $db->query("select * from indicator where status=1 and id='".$c[0]['indicator_id']."' " );                    
             $i = $query->getResultArray();  //                  print_r($i)."<br>";if(!empty($i)){//                            
             $query = $db->query("select * from indicator_category where id='".$i[0]['indicator_category_id']."' order by id ");                            
             $query = $db->query("select * from indicator_category where id='".$i[0]['indicator_category_id']."' order by id ");                           
              $cat = $query->getResultArray();                            
              $query = $db->query("select * from sdg_assessment_question where  sdg_id='".$d['sdg_id']."' and status=1 and (industry_id='".$supplier_info['industry_id']."' or industry_id=0) order by id ");                            
              $question = $query->getResultArray();                            
              $question_array = array();                            
              if(!empty($question)){                                
              foreach($question as $q){                                    
              $answer_insert_id=0;                                    
              $remark='';                                    
              $query = $db->query("select * from sdg_assessment_answer where sdg_assessment_question_id='".$q['id']."' and status=1 order by id ");                                    
              $answer = $query->getResultArray();                                    
              $answer_array = array();                            
              if(!empty($answer)){                                
              foreach($answer as $a){                                    
              $ava_status =0;                                    

              $query = $db->query("select * from supplier_base_assessment where base_assessment_question_id='".$q['id']."' and supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and base_assessment_answer_id='".$a['id']."' and status=1 order by id ");                                    
              $ava = $query->getResultArray();                                    
              if(!empty($ava)){

              	$ava_status=1;$answer_insert_id=$ava[0]['id'];$remark=$ava[0]['remark'];
          }                                        
           $answer_array[] = array('answer_id'=>$a['id'],'answer'=>$a['answer'],'marks'=>$a['marks'],'choice'=>$q['choice'],'ava_status'=>$ava_status);
       } 

       }                                   
       $question_array[] = 
       array('question_id'=>$q['id'],'question'=>$q['question'],'choice'=>$q['choice'],'remark'=>$q['remark'],'answer'=>$answer_array,'answer_insert_id'=>$answer_insert_id,'remark'=>$remark, 'question_title' => $q['question_title']); 
              } 
                                                 
        $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where sdg_id='".$d['sdg_id']."' and s.supplier_id='".$supplier_info['supplier_id']."' and s.supplier_assessment_id='".$assessment_id."' "); 

            $question_attempt = $query->getResultArray(); 

            $total_attempt = $total_attempt+$question_attempt[0]['tot'];
            $total_question = $total_question+count($question_array);  

             $array[] = array('id'=>$d['sdg_id'],'indicator_name'=>$sdg_name[0]['sdg_name'],'image'=>$sdg_name[0]['image'],'indicator_category_name'=>$cat[0]['indicator_category_name'],'question'=>$question_array,'question_attempt'=>$question_attempt[0]['tot']);  


                               }                }            }                
              // if(!empty($indicator)) {       
               //     foreach($indicator as $i) {    
                   //         $query = $db->query("select count(id) as cnt from sdg_assessment_question where indicator_id='".$i['id']."' and status=1 and industry_id='".$supplier_info['industry_id']."' order by id "); 
                          //     $question = $query->getResultArray();       
                           //         if($question) {      
                             //             
              $total_question = $total_question+$question[0]['cnt'];   
                                            //  }        //  
                                            $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join sdg_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$i['id']."'  and s.supplier_id='".$supplier_info['supplier_id']."' and s.supplier_assessment_id='".$assessment_id."' ");        
                                            //         
                                            $question_attempt = $query->getResultArray();        //         
                                            $total_attempt = $total_attempt+$question_attempt[0]['tot'];        //     }        // }        
              echo json_encode(array("total_question" => $total_question, "total_attempt" => $total_attempt));  
            	                                                                                     }}?>