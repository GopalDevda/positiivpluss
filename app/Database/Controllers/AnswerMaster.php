<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SubClassificationModel;
use App\Models\OptionAnswerModel;
use App\Models\FinanceModel;
use App\Models\SupplierModuleItemModel;
use App\Models\GroupModel;
use App\Models\ImpactModel;
use App\Models\TransportationDetailModel;
use App\Models\HotelStayModel;
use App\Models\ManufacturingProcessDetailModel;
use App\Models\ManufacturingDetailModel;
use App\Models\SubDisclosure;
class AnswerMaster extends BaseController
{
private $helperData=array();
public function __construct(){
helper(['form', 'url','html','menu']);
$session = \Config\Services::session();
// $this->user_info = $this->session->get_userdata();
$this->helperData=commonData();
}
public function index(){
echo view('login');
}

                              public function addMasterAnswer(){
                                $session = session();
                                $user_info = $session->get('user_info');
                                if(!$user_info){
                                
                                    return redirect()->to('auth/logout');
                                }
                                $data=$this->helperData;
                                $db = \Config\Database::connect();
                                $data['title'] = 'Add Master Answer';
                                $model = new OptionAnswerModel(); 
                                $data['list'] = $model->where('status',1)->findAll();
                                // print_r($data['list']);
                                // die();
                               
                                echo view('admin/add-Master-Answer',$data);
                            }

public function addMasterAnswerSubmit(){
                              $db = \Config\Database::connect();
                              $session = session();
                                $user_info = $session->get('user_info');
                                if(!$user_info){
                                
                                    return redirect()->to('auth/logout');
                                }
                                
                            $model = new OptionAnswerModel(); 
                           
                            $answer_name = $this->request->getVar('answer_name');
                            $optionAnswer = $this->request->getVar('optionAnswer');
                            
                              $ava = $db->query("select * from option_Answer where answer_name='".$answer_name."' and status=1");
                              $ava = $ava->getResultArray();
                                if(empty($ava)){
                                    $plan_id = $model->insert(['answer_name'=>$answer_name,'optionAnswer'=>json_encode($optionAnswer),'status'=>1,'user_id'=>1,'created_at'=>date('Y-m-d H:i:s')]);
                                    if($plan_id){
                               
                               
                                        $session->setFlashdata('success','Answer has been saved successfully');
                                    }else{
                                        $session->setFlashdata('error',' Not Save');
                                    }          
                                }else{
                                         $session->setFlashdata('error','Answer '.$answer_name.' already exist!');
                                }
                                return redirect()->to('AnswerMaster/addMasterAnswer');
                            }

public function editMasterAnswerSubmit(){
                              $db = \Config\Database::connect();
                              $session = session();
                                $user_info = $session->get('user_info');
                                if(!$user_info){
                                
                                    return redirect()->to('auth/logout');
                                }
                                
                            $model = new OptionAnswerModel(); 
                            $id = $this->request->getVar('answerid');
                           
                            $answer_name = $this->request->getVar('answer_name');
                            $optionAnswer = $this->request->getVar('optionAnswer');
                            $data= [
                             'answer_name'=>$answer_name,
                            'optionAnswer'=>json_encode($optionAnswer),
                            ];
                        $update =  $model->update($id,$data);
                         if($update){
                               
                               
                             $session->setFlashdata('success','Answer has been update successfully');
                                    }else{
                                        $session->setFlashdata('error',' Not update');
                                    }   
                             
                                
                                return redirect()->to('AnswerMaster/addMasterAnswer');
                            }

                public function option_answer_show($id)
                {


                            $db = \Config\Database::connect();
                              $session = session();
                                $user_info = $session->get('user_info');
                                if(!$user_info){
                                
                                    return redirect()->to('auth/logout');
                                }
                                
                            $model = new OptionAnswerModel(); 

            $show_option = $model->where('id',$id)->first();
             $option = json_decode($show_option['optionAnswer']);
    foreach ($option as $key => $value) 
            {
                 $data.='<div class="form-group">
       <label for="ghg_name">Option Answer</label>
     <input type="text" class="form-control" name="optionAnswer[]" value="'.$value.'">';

             } 
           
        
        echo $data;

                }

    public function deletemaster($id)

    {

    $db = \Config\Database::connect();
                              $session = session();
                                $user_info = $session->get('user_info');
                                if(!$user_info){
                                
                                    return redirect()->to('auth/logout');
                                }
                                
       $model = new OptionAnswerModel();
       $data=['status'=>0];
       $delete = $model->update($id,$data);
       if($delete){
         $session->setFlashdata('error','Answer successfully delete');
       }else{
         $session->setFlashdata('error','Answer not delete');

       }
     return redirect()->to('AnswerMaster/addMasterAnswer');

 }


}