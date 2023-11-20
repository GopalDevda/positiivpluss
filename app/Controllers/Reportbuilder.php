<?php

namespace App\Controllers;

use App\Models\ReportbuilerModel;
use App\Models\DisclosureModel;
use App\Models\SubDisclosure;
use App\Models\Energy_managment;
use App\Models\MasterSubDis;
use App\Models\ClassificationModel;
use App\Models\SupplierModel;
use App\Models\Qualitative_assessment_step;

class ReportBuilder extends BaseController

{
    public function step_submit_1()
    {
        $report_model = new ReportbuilerModel();
        $discloser_model = new DisclosureModel();
        $ClassificationModel = new ClassificationModel();
        $standard = $this->request->getPost('standard');
    //  $dis =
    //   $discloser_model->join('indicator','indicator.id=disclosure.indicator_id')->where('disclosure.standard_id', $standard)->where('disclosure.status', 1)->groupBy('disclosure.indicator_id')->findAll();
    //   print_r($dis);

        // print_r($data);
       // die;
    $dis = $ClassificationModel->where('standard_id', $standard)->findAll();
    
        $data = [
            "name" => $this->request->getPost('name'),
            "start_date" => $this->request->getPost('start_date'),
            "end_date" => $this->request->getPost('end_date'),
            "standard_id" => $standard,
        ];
        $insert = $report_model->insert($data);
        $id = $report_model->getInsertID();
        if ($insert) {
            $data = [
                "data" => $dis,
                "id" => $id,
                "standard" =>$standard,
            ];
            echo json_encode($data);
        } else echo "fail";
    }

    public function step_submit_2()
    {
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');

        $sub_disclosure = new SubDisclosure();
        $report_model = new ReportbuilerModel();
        $id = $this->request->getPost('id');
        $disclosure = $this->request->getPost('indicators');
        $standard = $this->request->getPost('standarad_id');
        // print_r($standard);
        // die;2
        $discloser_model = new DisclosureModel();
        $update = $report_model->update($id, ['indicator_id' => json_encode($disclosure)]);
        $energy_managment = new MasterSubDis();
        
        if ($update) 
    {
        // print_r($value);
            $html='';

            
            foreach ($disclosure as  $value) 
        {

                $data = $discloser_model->where('classification_id',$value)->where('status',1)->where('standard_id',$standard)->findAll();
              
                //  print_r($data);
              
                foreach ($data as  $dis_id) 
              {
                 $disClo_id =  $energy_managment->where('disclosure_id',$dis_id['id'])->first();
                
               $subClasii = json_decode($dis_id['sub_classification_id']);
                
                if($disClo_id['disclosure_id'] == $dis_id['id']){                                                
               $html.='<div class="col-md-6"><div class="card"><div class="card-header">
                    <h4 class="card-title">'.$dis_id['disclosure_name'] . '</h4></div>
                    <div class="card-body">';
               }
              
                
                    $test_arr = [];
               foreach($subClasii as $subClasii_id)
               {
                $subClas = '"'.$subClasii_id.'"';
                    // print_r($subClas);
                $subn_dis = $energy_managment->like('sub_clasifiction',$subClas)->where('status',1)->findAll();
                $k = $subn_dis[0];

                    if (in_array($k['id'], $test_arr))
                    {
                        continue;
                    } else {
                        $test_arr[] = $k['id'];
                        $new_arr = [$k];
  
                 foreach ($new_arr as $key => $values) {
                     if(!empty($values)){
                    $html.='<div class="mb-1"><div class="form-check">
                            <input type="checkbox" class="form-check-input" name="subdischeck[]" id="' . $values['id'] . '"  value="' . $values['id']. '/1" />
                            <label class="form-check-label" for="' .$values['id'].'">' . $values['title'] . '.</label></div></div>';
                

            }
        }
        }
    }
   
            $html.='</div></div></div>';

    }
     

        $assessment_question = $db->query("select * from all_assessment_question where clasification='".$value."' and standard='".$standard."'  and status=1" )->getResultArray();
        
        $html.='<div class="col-md-6"><div class="card"><div class="card-header">
        <h4 class="card-title">Assessment</h4></div>
        <div class="card-body">';
       
                           
        foreach ($assessment_question as $values) 
       {

        $html.='<div class="mb-1"><div class="form-check">
                <input type="checkbox" class="form-check-input" name="subdischeck[]"  id="' . $values['id'] . '"  value="' . $values['id'] . '/2" />
                <label class="form-check-label" for="' .$values['id'].'">' . $values['question'] . '.</label></div></div>';
       }



  $html.='</div></div></div>';

        
    }
}
        // die;
   


            echo $html;
        
    
    }


    public function step_submit_3()
    {
           $db = \Config\Database::connect();
           $session = session();
           $supplier_info = $session->get('supplier_info');
           $report_model = new ReportbuilerModel();
           $discloser_model = new DisclosureModel();
           $energy_managment = new MasterSubDis();
           $supplier = new SupplierModel();
           $Energy_managment = new Energy_managment();
           
           if(session()->supplier_info['role'] == 0){
            $o_id = session()->supplier_info['supplier_id'];
            $u_id = session()->supplier_info['supplier_id'];
            
            }
            elseif(session()->supplier_info['role'] == 10){
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id'];
            
            }
            else{
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id',$u_id)->first();
            $o_id = $id_o['owner_id'];
            
            }
           $Qualitative_assessment_step =  new Qualitative_assessment_step();

           $sub_disclosure = $this->request->getvar('sub_dis');
            
       
           $data="";
           $test_arr = [];
           foreach($sub_disclosure as $sub_disclosure_id)
           {
           $var = explode("/",$sub_disclosure_id);
           $sub_id = $var[0];
           $main_id = $var[1];
      
          
        if($main_id == 2){
        $energy_query = $Qualitative_assessment_step->join('control_assessment','control_assessment.id=Qualitative_assessment_step.control_assessment_id')->join('supplier_assessment','supplier_assessment.id=control_assessment.sub_boundary')->where('Qualitative_assessment_step.select_question_id',$sub_id)->where('Qualitative_assessment_step.supplier_id',$u_id)->where('Qualitative_assessment_step.status',1)->findAll();
          $en_id = $energy_query[0];
          if (in_array($en_id['id'], $test_arr)) 
          {
              continue;
          } else {
          $test_arr[] = $en_id['id'];

            foreach($energy_query as $energy)
            {

            $data.=' 
            <div class="mb-1"><div class="form-check">
              <input type="checkbox" class="form-check-input" name="sitescheck[]"  id="' . $energy['id'] . '"  value="' . $energy['id'] . '" />
              <label class="form-check-label" for="' .$energy['id'].'">' . $energy['cp_name'] . '.</label></div></div>';

         }
      }
        }else{
            
          $Energy_managment_query = $Energy_managment->join('supplier_assessment','supplier_assessment.id=energy_managment.site_id')->where('energy_managment.supplier_id',$u_id)->where('energy_managment.data_id',$sub_id)->where('energy_managment.status',1)->findAll();
          $en_id = $Energy_managment_query[0];
          if (in_array($en_id['id'], $test_arr)) 
          {
              continue;
          } else {
          $test_arr[] = $en_id['id'];

            foreach($Energy_managment_query as $energy1)
            {

            $data.=' 
            <div class="mb-1"><div class="form-check">
              <input type="checkbox" class="form-check-input" name="sitescheck[]"  id="' . $energy1['id'] . '"  value="' . $energy1['id'] . '" />
              <label class="form-check-label" for="' .$energy1['id'].'">' . $energy1['cp_name'] . '.</label></div></div>';

         }
      }
       
        }
    
            // print_r($en_id); 
          
    }
     
    echo $data;
           

         
    }
    public function step_4()
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $report_model = new ReportbuilerModel();
        $discloser_model = new DisclosureModel();
        $energy_managment = new MasterSubDis();
        $supplier = new SupplierModel();
        $Energy_managment = new Energy_managment();
        $Qualitative_assessment_step =  new Qualitative_assessment_step();

        if(session()->supplier_info['role'] == 0)
         {
         $o_id = session()->supplier_info['supplier_id'];
         $u_id = session()->supplier_info['supplier_id'];
         
         }
         elseif(session()->supplier_info['role'] == 10)
         {
         $u_id = session()->supplier_info['supplier_id'];
         $id_o = $supplier->where('id',$u_id)->first();
         $o_id = $id_o['owner_id'];
         }
         else
         {
         $u_id = session()->supplier_info['supplier_id'];
         $id_o = $supplier->where('id',$u_id)->first();
         $o_id = $id_o['owner_id'];
         }

         $sites = $this->request->getVar('sites');
         $standard = $this->request->getVar('standarad_id');
         
         $Disclosure_model = $discloser_model->where('status',1)->where('standard_id',$standard)->findAll();
         $unit_id = $db->query("select * from unit  where status=1")->getResultArray();
         $site_query = $db->query("select * from supplier_assessment  where is_submit=1")->getResultArray();
        
         $sub_disclosure = $this->request->getvar('sub_dis1');

        //  print_r($sub_disclosure);
        //  die;
      

       $Energy_managment = new Energy_managment();
       $data= "";
       $data.='<div class="card-datatable">
       <table class="table table-bordered" id="example">
         <thead>
           <tr>
             <th>S.No</th>
             <th>Sub Classification</th>
             <th>Unit</th>
             <th>Value</th>
             <th>Boundary</th>
             <th>Document</th>
           </tr>
           
         </thead>
        ';
       foreach($Disclosure_model as $dis_id)
      {
        $subClasii = json_decode($dis_id['sub_classification_id']);
        foreach($subClasii as $subClasii_id){
           $subClas = '"'.$subClasii_id.'"';
           foreach($sites as $site_id)
           {

            foreach($sub_disclosure as $sub_disclosure_id)
            {
            $var = explode("/",$sub_disclosure_id);
           
            $sub_id = $var[0];
            $main_id = $var[1];
         
           if($main_id == '1'){
            $energy_query = $Energy_managment->join('master_addtion_subdisclosure','master_addtion_subdisclosure.id=energy_managment.data_id')->where('energy_managment.site_id',$site_id)->where('master_addtion_subdisclosure.id',$sub_id)->where('energy_managment.status',1)->where('energy_managment.supplier_id',$u_id)->like('master_addtion_subdisclosure.sub_clasifiction',$subClas)->findAll();
          
           }else{
       $energy_query = $Qualitative_assessment_step->select('*')->join('control_assessment','control_assessment.id=Qualitative_assessment_step.control_assessment_id')->join('all_assessment_question','all_assessment_question.id=Qualitative_assessment_step.select_question_id')->join('brand_qualitative_answer','brand_qualitative_answer.question_id=Qualitative_assessment_step.select_question_id')->where('control_assessment.supplier_id',$u_id)->where('all_assessment_question.id',$sub_id)->where('control_assessment.sub_boundary',$site_id)->where('control_assessment.status',1)->like('all_assessment_question.sub_clasification',$subClas)->findAll();
          }
      //  print_r($assessment_query);
              
      
            if(!empty($energy_query))
      {
          
            $subClassification = $db->query("select * from sub_classification  where id=$subClasii_id and status=1")->getResultArray();
            $$ike = 0;
            $key = 0;
            foreach($energy_query as $energy_query_id){
          foreach($subClassification as $key=> $subClassification_name){     
            $ike += ++$key;
            $data.=' <tbody><td>'.$ike.'</td>
              <td>'.$subClassification_name['sub_classification_name'].'</td>';
               
              foreach($unit_id as $unit){ 
                if($subClassification_name['unit_id'] == $unit['id']){
              $data.='<td>'.$unit['unit_name'].'</td>';
                 }
                }
                if($main_id == 1){
              $data.='<td>'.$energy_query_id['value'].'</td>';
                }else{
                  $data.='<td>'.$energy_query_id['answer'].'</td>';
                }

               foreach($site_query as $siteID)
            {
                if($siteID['id'] == $site_id){
              $data.='<td>'.$siteID['cp_name'].'</td>';
               }
            }

            if($main_id == 1){
              $data.='<td><img src="'.base_url("/").'/public/energy_img/'.$energy_query_id['image'].'" alt="avatar" width="80px"></td>';
                }else{
                  $data.='<td><img src="'.base_url("/").'/public/uploads/ans_question/'.$energy_query_id['media'].'" alt="avatar" width="80px"></td></td>';
                }
                $data.='</tbody>';

              
          }

            }
      }


           }

        }
      }
      }
      // die;
      $data.='
      </table>
    </div>';

      
       echo $data;
        
       
    }

    
}

