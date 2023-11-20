<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

use App\Models\SupplierModel;

use App\Models\DocumentModel;

use App\Models\Assessment;

use App\Models\IndicatorModel;



class Supplier extends BaseController{

    public function __construct(){

        helper(['form', 'url','html']);

    }



    public function index(){

    }



    public function baseAssessmentTime(){

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $query = $db->query("select * from assessment where id=1 order by id ");

        $data['assessment'] = $query->getResultArray();

        echo view('brand/base-assessment-time',$data);

    }



    public function baseAssessment(){

        $db = \Config\Database::connect();

        $session = session();

        $supplier_info = $session->get('supplier_info');

        $query = $db->query("select * from assessment where id=1 order by id ");

        $data['assessment'] = $query->getResultArray();

        $from_date = '';

        $to_date ='';        

        $is_submit =0;        

        $assessment_per =0;        



        $query = $db->query("select * from supplier_assessment where supplier_id='".$supplier_info['supplier_id']."' and assessment_id=1 and is_verify=0  ");

        $ava_assessment = $query->getResultArray();

        //print_r($ava_assessment);

        if(!empty($ava_assessment)){

            $assessment_id = $ava_assessment[0]['id'];

            $from_date = $ava_assessment[0]['date_from'];

            $to_date =$ava_assessment[0]['date_to'];

            $is_submit =$ava_assessment[0]['is_submit'];;        

            $assessment_per =$ava_assessment[0]['assessment_per'];;        

        }else{                

            $assessment_id = $db->query("insert into supplier_assessment(assessment_id,supplier_id,date,datetime)values(1,'".$supplier_info['supplier_id']."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");

            $assessment_id = $db->insertID();

        }



        $data['assessment_id'] = array('assessment_id'=>$assessment_id);

        $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 group by b.indicator_id order by s.id" );

        $indicator = $query->getResultArray();

        $total_question=0;

        $total_attempt = 0;

        $array=array();

        if(!empty($indicator)){

            foreach($indicator as $i){

                $query = $db->query("select * from indicator_category where id='".$i['indicator_category_id']."' order by id ");

                $cat = $query->getResultArray();



                $query = $db->query("select * from base_assessment_question where indicator_id='".$i['id']."' and status=1 order by id ");

                $question = $query->getResultArray();



                $question_array = array();

                if(!empty($question)){

                    foreach($question as $q){

                        $answer_insert_id=0;

                        $remark='';

                        $query = $db->query("select * from base_assessment_answer where base_assessment_question_id='".$q['id']."' and status=1 order by id ");

                        $answer = $query->getResultArray();

                        $answer_array = array();

                        if(!empty($answer)){

                            foreach($answer as $a){

                                $ava_status =0;

                                $query = $db->query("select * from supplier_base_assessment where base_assessment_question_id='".$q['id']."' and supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and base_assessment_answer_id='".$a['id']."' and status=1 order by id ");

                                $ava = $query->getResultArray();

                                if(!empty($ava)){$ava_status=1;$answer_insert_id=$ava[0]['id'];$remark=$ava[0]['remark'];}    

                                 $answer_array[] = array('answer_id'=>$a['id'],'answer'=>$a['answer'],'marks'=>$a['marks'],'choice'=>$q['choice'],'ava_status'=>$ava_status);

                            }

                        }                        

//die;

                        $question_array[] = array('question_id'=>$q['id'],'question'=>$q['question'],'choice'=>$q['choice'],'remark'=>$q['remark'],'answer'=>$answer_array,'answer_insert_id'=>$answer_insert_id,'remark'=>$remark);



                    }

                }

            $query = $db->query("select count(distinct( s.base_assessment_question_id))as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$i['id']."'  and s.supplier_id='".$supplier_info['supplier_id']."' ");

            $question_attempt = $query->getResultArray();



                $total_attempt = $total_attempt+$question_attempt[0]['tot'];

                $total_question = $total_question+count($question_array);



            $array[] = array('id'=>$i['id'],'indicator_name'=>$i['indicator_name'],'image'=>$i['image'],'indicator_category_name'=>$cat[0]['indicator_category_name'],'question'=>$question_array,'question_attempt'=>$question_attempt[0]['tot'],'from_date'=>$from_date,'to_date'=>$to_date,'is_submit'=>$is_submit);



           }

        }

        $data['detail'] = array('total_question'=>$total_question,'total_attempt'=>$total_attempt,'percent'=>$assessment_per);

        $data['indicator'] = $array;

        $data['supplier_info'] = array('supplier_id'=>$supplier_info['supplier_id'],'brand_name'=>$supplier_info['brand_name']);

        //print_r($data);

       echo view('brand/base-assessment',$data);

    }

    public function signupstep($supplier_id){

        $db = \Config\Database::connect();

        $data['supplier'] = array('supplier_id'=>$supplier_id);

        $query = $db->query('select * from industry where status=1 order by id asc');

        $data['industry'] = $query->getResultArray();

        echo view('front/signupstep',$data);

    } 

    public function signupStepSubmit(){

         $session = session();

         $db = \Config\Database::connect();

         $model = new SupplierModel();

         $supplier_id = $this->request->getVar('supplier_id');

         $brand_name = $this->request->getVar('brand_name');

         $website = $this->request->getVar('website');

         $description = $this->request->getVar('description');

         $insert= $db->query("update supplier set brand_name='".$brand_name."',website='".$website."',description='".$description."' where id='".$supplier_id."' ");

         if($insert){

            $query = $db->query("select * from supplier where  id='".$supplier_id."' order by id asc");

            $supplier = $query->getResultArray();

            $ses_data = ['supplier_id'=> $supplier[0]['id'],'supplier_name'=> $supplier[0]['supplier_name'],'brand_name'=> $supplier[0]['brand_name']];

            $session->set('supplier_info',$ses_data);



            $session->setFlashdata('success','Data has been successfully saved');

            return redirect()->to('supplier/baseAssessment');

         }else{

           $session->setFlashdata('error','Data Not Saved');

          return redirect()->to('supplier/signupstep/'.$supplier_id);

         }

    } 



    public function submitBaseAssessmentQuestion($assessment_id,$qid,$answer,$remark,$indicator,$choice,$answer_insert_id){

        if($remark=='0'){$remark='';}

       $db = \Config\Database::connect();

       $session = session();

       $supplier_info = $session->get('supplier_info');

       if($choice=='Multi'){

            if($answer!=''){

                $query = $db->query("delete from supplier_base_assessment where status=1 and base_assessment_question_id='".$qid."' and supplier_id='".$supplier_info['supplier_id']."' and supplier_assessment_id='".$assessment_id."'  order by id asc");

                $answer = explode(",",$answer);

                foreach($answer as $a){

                   $query = $db->query("select * from base_assessment_answer where status=1 and id='".$a."' order by id asc");

                   $marks = $query->getResultArray();



                  $query = $db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$a."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");      

                   $answer_insert_id = $db->insertID();

                }

            }

       }else{

            $query = $db->query("select * from base_assessment_answer where status=1 and id='".$answer."' order by id asc");

            $marks = $query->getResultArray();



            if($answer_insert_id=='0'){

                $query =$db->query("insert into supplier_base_assessment(supplier_id,supplier_assessment_id,base_assessment_question_id,base_assessment_answer_id,mark,remark,status,assessment_number,created_at,date)values('".$supplier_info['supplier_id']."','".$assessment_id."','".$qid."','".$answer."','".$marks[0]['marks']."','".$remark."',1,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");      

                $answer_insert_id = $db->insertID();

            }else{

                $query =$db->query("update supplier_base_assessment set base_assessment_answer_id='".$answer."',mark='".$marks[0]['marks']."',remark='".$remark."',updated_at='".date('Y-m-d H:i:s')."' where id='".$answer_insert_id."' ");   

            }

       }



       $query = $db->query("select count('id') tot from base_assessment_question where status=1 and indicator_id='".$indicator."' order by id asc");

       $a = $query->getResultArray();

       $AllQuestions = $a[0]['tot'];

        

       $query = $db->query("select count(distinct(s.base_assessment_question_id)) as tot from supplier_base_assessment as s join base_assessment_question as b on s.base_assessment_question_id=b.id where b.indicator_id='".$indicator."'  and s.supplier_id='".$supplier_info['supplier_id']."'  ");

        $b = $query->getResultArray();

        echo json_encode(array("status"=>1,'tot_q'=>$AllQuestions,'tot_ans'=>$b[0]['tot'],'insert_id'=>$answer_insert_id));

    }





  function submitAssessment(){

    $db = \Config\Database::connect();

    $session = session();

    $supplier_info = $session->get('supplier_info');

    $assessment_id = $this->request->getVar('supplier_assessment_id');      

    $from = $this->request->getVar('from');      

    $to = $this->request->getVar('to');      



       $query = $db->query("SELECT count(b.id) as tot FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1");

       $r = $query->getResultArray();

       $totalQuestionAnswered = $r[0]['tot'];



       $query = $db->query("SELECT * FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1  group by base_assessment_question_id ");

       $b = $query->getResultArray();

       

        $total_answer = count($b);

       if(!empty($b)){echo $b = count($b);}else{$b=0;}

       $percent = ($totalQuestionAnswered/$b)*100;



       $query = $db->query("SELECT SUM(mark) as tot FROM supplier_base_assessment where supplier_assessment_id='".$assessment_id."' and supplier_id='".$supplier_info['supplier_id']."' and status=1 ");

       $m = $query->getResultArray();

       $marks = $m[0]['tot'];

       

       $u = $db->query("update supplier_assessment set total_question='".$totalQuestionAnswered."',total_answer='".$total_answer."',assessment_per='".$percent."',is_submit=1,submit_datetime='".date('Y-m-d H:i:s')."',date_from='".$from."',date_to='".$to."' where id='".$assessment_id."' ");

        $session->setFlashdata('success','Assessment has been successfully submitted');

        return redirect()->to('supplier/baseAssessment');

    }



    public function undoBaseAssessment($assessment_id){

        $db = \Config\Database::connect();

        $session = session();

        $u = $db->query("update supplier_assessment set is_submit=0,updated_at='".date('Y-m-d H:i:s')."' where id='".$assessment_id."' ");

        $session->set('success','Assessment has been successfully und0');

        return redirect()->to('supplier/baseAssessment');

    }



    public function document(){

        $supplier_doc=array();

        $db = \Config\Database::connect();

        $session = session();

        $assessment_model = new Assessment(); 

        $data['assessment'] = $assessment_model->where('status',1)->findAll();

        $indicator_model = new IndicatorModel();

        $data['indicator'] = $indicator_model->where('status',1)->findAll();

        $supplier_info = $session->get('supplier_info');

        $query = $db->query("select * from document_type where status=1 order by id asc");

        $data['document'] = $query->getResultArray();

        $query = $db->query("select * from supplier_document where supplier_id='".$supplier_info['supplier_id']."' and status=1 order by id asc");

        $doc = $query->getResultArray();

        if(!empty($doc)){

            foreach($doc as $r){

                $query = $db->query("select * from document_type where id='".$r['document_type_id']."'");

                $type = $query->getResultArray();



                $supplier_doc[]=array('id'=>$r['id'],'document_name'=>$r['document_name'],'document_type'=>$type[0]['document_type_name'],'file_size'=>$r['file_size'],'image'=>$r['image'],'document_type_id'=>$r['document_type_id'],'date'=>$r['date']);

            }

        }

        $data['supplier_doc'] = $supplier_doc;

    //print_r($data);

        echo view('brand/document',$data);

    }

    public function addDocument(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new DocumentModel();

        $type_id = $this->request->getVar('document_type_id');

        $doc_name = $this->request->getVar('doc_name');

        $file = $this->request->getFile('file');

        $supplier_info = $session->get('supplier_info');



      if($file->isValid()){

        $ext = $file->getClientExtension();

        $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");

            if(in_array($ext,$ava_ext)){

                $newName = $file->getRandomName();

                $file_size = $file->getSizeByUnit('mb'); 

                if($file->move('public/uploads/supplier_document',$newName)){

                    if($model->insert(['supplier_id'=>$supplier_info['supplier_id'],'image'=>$newName,'status'=>1,'document_type_id'=>$type_id,'document_name'=>$doc_name,'file_size'=>$file_size,'date'=>date('Y-m-d')])){

                        $session->setFlashdata('success','Document has been successfully upload');

                    }else{

                        $session->setFlashdata('error','Document not upload');

                    }

                }else{

                    $session->setFlashdata('error','Please select a valid file like pdf,image');

                }

            }else{

                $session->setFlashdata('error','Please select a valid file like pdf,image');

            }

        }else{

                $session->setFlashdata('error','Please select a valid file like pdf,image');

        }

        return redirect()->to('supplier/document');

    }



    public function editDocument(){

        $db = \Config\Database::connect();

        $session = session();

        $model = new DocumentModel();

        $type_id = $this->request->getVar('document_type_id');

        $doc_name = $this->request->getVar('doc_name');

        $id = $this->request->getVar('id');

        $file = $this->request->getFile('file');

        $supplier_info = $session->get('supplier_info');



        if($file->isValid()){

        $ext = $file->getClientExtension();

        $ava_ext = array("png", "jpg", "jpeg", "gif","pdf","doc","docx");

            if(in_array($ext,$ava_ext)){

                $newName = $file->getRandomName();

                $file_size = $file->getSizeByUnit('mb'); 

                $file->move('public/uploads/supplier_document',$newName);

                $array = ['supplier_id'=>$supplier_info['supplier_id'],'image'=>$newName,'document_type_id'=>$type_id,'document_name'=>$doc_name,'file_size'=>$file_size];

            }else{

                $session->setFlashdata('error','Please select a valid file like pdf,image');

            }

        }else{

            $array = ['supplier_id'=>$supplier_info['supplier_id'],'document_type_id'=>$type_id,'document_name'=>$doc_name];

        }



        $u = $model->where(['id' => $id])->set($array)->update();

        if($u){

            $session->setFlashdata('success','Document has been successfully deleted');

        }else{

            $session->setFlashdata('error','Document not delete');

        }

        return redirect()->to('supplier/document');

    }





    public function deleteDocument($id){

        $db = \Config\Database::connect();

        $session = session();

        $model = new DocumentModel();

        $u = $model->where(['id' => $id])->set(['status'=>0])->update();

        if($u){

            $session->setFlashdata('success','Document has been successfully deleted');

        }else{

            $session->setFlashdata('error','Document not delete');

        }

        return redirect()->to('supplier/document');

    }

} 