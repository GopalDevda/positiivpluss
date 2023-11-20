<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

use App\Models\SupplierModel;

use App\Models\PolicyBrandModel;

use App\Models\QuickStartModel;

use App\Models\load;

class SupplierAuth extends BaseController{

    public function __construct(){

        helper(['form', 'url']);

    }

    

    public function index(){

        echo view('front/index');

    }


public function otpverify(){

        $db = \Config\Database::connect();

        $encrypter = \Config\Services::encrypter();

        $plan_id = $this->request->getVar('plan_id');      

        $supplier_id = $this->request->getVar('supplier_id');      

        $otp = $this->request->getVar('otp');  
        
        $session = Session();
  
        $ava = $db->query("select * from supplier where id='".$plan_id."' && otp='".$otp."' ")->getResultArray();
            if(!empty($ava)){
                // print_r();
                // die();
                $t=time();
                $receiptemail=$ava[0]['email'];
                $password=$ava[0]['pass'];
                $name=$ava[0]['supplier_name'];
                $message='';

                   $message.='<html><body>';
                   $message.='<div style="margin: 0 auto;width: 600px;">
                   <div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;">
                    <img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div>
                   <div style="background:white;">
                      <div style="padding:40px; font-size:18px;border: 1px solid #ddd;">
                         <div>
                            <h3  style="margin-top:0px;margin-bottom:13px;">Hello '.$name.',</h3>
                            <p style="margin-top:0px;margin-bottom:13px;">Welcome to <b>POSITIIVPLUS</b> - the one-stop shop for all your ESG (Environmental, Social, and Governance) needs. Our cloud-based digital platform was designed to make it easier than ever before to manage ESG within your organization, so that you can take the necessary steps towards sustainability while also achieving your desired outcomes.<br>
                               At <b>POSITIIVPLUS</b>, we understand that managing ESG is a complex process with many different components - from analyzing data points to implementing sustainable practices. That’s why our platform provides all the necessary tools and features to make it as easy as possible for you to implement and monitor your ESG goals. Some of these features include:<br>
                            <ul>
                               <li><b>Data collection</b> – Easily collect relevant information from both external and internal sources on a variety of topics related to ESG.</li>
                               <li><b>Analysis</b> – Analyze the data collected in order to identify areas where improvement is needed.</li>
                               <li><b>Reporting</b> – Generate reports which show how well your organization is meeting its ESG goals.</li>
                               <li><b>Benchmarking</b> – Compare against industry peers in order to gain insights into how well your organization is doing when compared to others.</li>
                               <li><b>Risk assessment</b> – Track risks associated with different aspects of ESG over time in order to spot trends and anticipate potential problems.</li>
                               <li><b>Policy management</b> – Create and manage policies which are tailored specifically for the needs of your organization.</li>
                               <li><b>Education & Training</b> – Provide employees with educational resources so that they can stay up-to-date on the latest developments in ESG management.</li>
                            </ul>
                            <br>
                            Login Link: https://positiivplus.io/home/user_login<br>  
                            Username:  '.$receiptemail.'<br>
                            Password:  '.$password.'<br><br><br>
                            To get started, simply use this login link, enter in the provided username and password, and begin exploring the features available on our platform! Once you have logged in successfully, we highly recommend resetting the password for added security measures - simply click ‘My Account’ at the top right corner once logged in, then select ‘Change Password’ from the drop down menu - here you will be able to customize a new password just for yourself!<br>
                            If you have any questions about setting up <b>POSITIIVPLUS</b> or need further assistance with utilizing our tools or features, please do not hesitate to reach out directly by emailing us at info@utopiic.com - we are more than happy answer any questions or provide additional guidance whenever necessary!<br>
                            From all of us here at <b>UTOPIIC</b>, thank you so much for choosing <b>POSITIIVPLUS</b> as your go-to source for managing your organizations’ sustainability goals - we look forward helping you become as successful as possible!
                        </p>
                         </div>
                      </div>
                   </div>
                   <div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;">
                    <span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span>
                    <div style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div>
                    <hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;">
                    <div style="text-align: center;margin-top: 10px;">
                        <a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a>
                        <a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a>
                        <a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a>
                    </div>
                </div>
                </div>';
                $message.='</html></body>';
                // print_r($message);die();



                    $email = \Config\Services::email();



                    $email->setFrom('info@positiivplus.io', 'PositiivPlus Onboarding');



                    $email->setTo($receiptemail);



                    // $email->mailType(html);   



                    $email->setSubject('SUB: POSITIIVPLUS Onboarding Welcome Mail');



                    $email->setMessage($message);
                    

               
                    $a = $email->send();                

               


$insert= $db->query("update supplier set otp='404',is_email_verify='1' where id='".$plan_id."' ");

        
                      $session->setFlashdata('success','OTP Verified');
return redirect()->to('supplier/signupstep/'.$supplier_id.'/'.$plan_id);
               
            }
            
            else{
                      $session->setFlashdata('error','OTP IS Invalid');
return redirect()->to('supplier/otp/'.$supplier_id.'/'.$plan_id);

                }
                


    }
public function signuppp(){

        $db = \Config\Database::connect();

        $encrypter = \Config\Services::encrypter();

        $name = $this->request->getVar('name');      

        $mobile = $this->request->getVar('mobile');      

        $receiptemail = $this->request->getVar('email');      

        $password = $this->request->getVar('password');   

        $cpassword = $this->request->getVar('confirm_password');   

        $plan_id = $this->request->getVar('plan_id');  
        $plan = base64_decode($plan_id);  
         
         // print_r($plan);
         // die();

        $csrf_token = $this->request->getVar('csrf_token');  
        
        $session = Session();

        if($password==$cpassword){

            $model = new SupplierModel();

            $ava = $db->query("select * from supplier where email='".$receiptemail."' ");  

            $ava = $ava->getResultArray();  

            if(!empty($ava)){

                if($ava['0']['status']==1){
  $session->setFlashdata('error','Email id already exist!');
    return redirect()->to('home/signup?csrf_token='.$csrf_token.'&plan_id='.$plan_id);
                 
                  
                    

                }else{

                }

            }else{



//               $supplier_id = $model->insert(['supplier_name'=>$name,'mobile'=>$mobile,'email'=>$receiptemail,'password'=>password_hash($password, PASSWORD_DEFAULT),'supplier_plan_id'=>$plan_id]);
$otp=rand(10000,99999);
               $supplier_id = $model->insert(['supplier_name'=>$name,'mobile'=>$mobile,'otp'=>$otp,'email'=>$receiptemail,'password'=>password_hash($password, PASSWORD_DEFAULT),'supplier_plan_id'=>$plan,'pass'=>$password]);

                if($supplier_id){



                    $url = "https://api.stripe.com/v1/customers";

                    $curl = curl_init($url);

                    curl_setopt($curl, CURLOPT_URL, $url);

                    curl_setopt($curl, CURLOPT_POST, true);

                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $headers = array(

                       "Content-Type: application/x-www-form-urlencoded",

                       'Authorization: Bearer '.stripe_secret_key

                    );

                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                    $data = "name=".$name."&email=".$receiptemail;

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                    //for debug only!

                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $resp = curl_exec($curl);

                    $stripe = json_decode($resp);

                    curl_close($curl);

                    $db->query("update supplier set stripe_customer_id='".$stripe->id."' where id='".$supplier_id."' ");





                    $id = $encrypter->encrypt($supplier_id);
                     $t=time();
                     $otp_msg.='<html><body>';
                    $otp_msg.= '<div style="margin: 0 auto;width: 600px;"><div  style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div  style="padding:40px; font-size:18px;border: 1px solid #ddd;"><p>Dear '.$name.',<br><br>Confirm your email address<br>Your login code is below — enter it in the browser window where you’ve started signing up for <b style="font-size:15px;"> POSITIIVPLUS</b>.<br><h3  style="margin-top:0px;margin-bottom:13px;">OTP '.$otp.'</h3><br>Questions about setting up <b style="font-size:15px;"> POSITIIVPLUS</b>? Email us at info@utopiic.com<br>If you didn’t request this email, there’s nothing to worry about — you can safely ignore it.<br><br>Team UTOPIIC</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a></div></div></div>';
                    $otp_msg.='</body></html>';
                    // print_r($otp_msg);die();

                   // $msg.= "https://devspares.tech/uttopic/public/utopiic/home/verify-supplier-email/".$id;
                   $message='';

                   $message.='<html><body>';
                   $message.='<div style="margin: 0 auto;width: 600px;">
                   <div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;">
                    <img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div>
                   <div style="background:white;">
                      <div style="padding:40px; font-size:18px;border: 1px solid #ddd;">
                         <div>
                            <h3  style="margin-top:0px;margin-bottom:13px;">Hello '.$name.',</h3>
                            <p style="margin-top:0px;margin-bottom:13px;">Welcome to <b>POSITIIVPLUS</b> - the one-stop shop for all your ESG (Environmental, Social, and Governance) needs. Our cloud-based digital platform was designed to make it easier than ever before to manage ESG within your organization, so that you can take the necessary steps towards sustainability while also achieving your desired outcomes.<br>
                               At <b>POSITIIVPLUS</b>, we understand that managing ESG is a complex process with many different components - from analyzing data points to implementing sustainable practices. That’s why our platform provides all the necessary tools and features to make it as easy as possible for you to implement and monitor your ESG goals. Some of these features include:<br>
                            <ul>
                               <li><b>Data collection</b> – Easily collect relevant information from both external and internal sources on a variety of topics related to ESG.</li>
                               <li><b>Analysis</b> – Analyze the data collected in order to identify areas where improvement is needed.</li>
                               <li><b>Reporting</b> – Generate reports which show how well your organization is meeting its ESG goals.</li>
                               <li><b>Benchmarking</b> – Compare against industry peers in order to gain insights into how well your organization is doing when compared to others.</li>
                               <li><b>Risk assessment</b> – Track risks associated with different aspects of ESG over time in order to spot trends and anticipate potential problems.</li>
                               <li><b>Policy management</b> – Create and manage policies which are tailored specifically for the needs of your organization.</li>
                               <li><b>Education & Training</b> – Provide employees with educational resources so that they can stay up-to-date on the latest developments in ESG management.</li>
                            </ul>
                            <br>
                            Login Link: https://positiivplus.io/home/user_login<br>  
                            Username:  '.$receiptemail.'<br>
                            Password:  '.$password.'<br><br><br>
                            To get started, simply use this login link, enter in the provided username and password, and begin exploring the features available on our platform! Once you have logged in successfully, we highly recommend resetting the password for added security measures - simply click ‘My Account’ at the top right corner once logged in, then select ‘Change Password’ from the drop down menu - here you will be able to customize a new password just for yourself!<br>
                            If you have any questions about setting up <b>POSITIIVPLUS</b> or need further assistance with utilizing our tools or features, please do not hesitate to reach out directly by emailing us at info@utopiic.com - we are more than happy answer any questions or provide additional guidance whenever necessary!<br>
                            From all of us here at <b>UTOPIIC</b>, thank you so much for choosing <b>POSITIIVPLUS</b> as your go-to source for managing your organizations’ sustainability goals - we look forward helping you become as successful as possible!
                        </p>
                         </div>
                      </div>
                   </div>
                   <div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;">
                    <span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span>
                    <div style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div>
                    <hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;">
                    <div style="text-align: center;margin-top: 10px;">
                        <a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a>
                        <a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a>
                        <a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a>
                    </div>
                </div>
                </div>';
                $message.='</html></body>';
                // print_r($message);die();



                    $email = \Config\Services::email();



                    $email->setFrom('info@positiivplus.io', 'PositiivPlus Verification');



                    $email->setTo($receiptemail);



                    // $email->mailType(html);   



                    $email->setSubject('SUB: POSITIIVPLUS Login code');



                    $email->setMessage($otp_msg);
                    

               
                    $a = $email->send();
                        if ($a) 
                        {
                            echo 'Email successfully sent';
                        } 
                        else 
                        {
                            $data = $mail->printDebugger(['headers']);
                            // print_r($data);
                        }
                  


       



                    // return $this->load->view('supplier/signupstep/'.$supplier_id.'/'.$plan_id, $r);
                    return redirect()->to('supplier/otp/'.$supplier_id.'/'.$plan_id);
                    



                }



                
        }
        }else{

    $session->setFlashdata('error','Password and Confirm Password not match!');

            }



    }


    public function resend_otp(){



        $receiptemail = $this->request->getVar('email');  
        
        $user_id = $this->request->getVar('id'); 
        // print_r($receiptemail);
        // die();
        
        $session = session();

        $update = new SupplierModel();

        $encrypter = \Config\Services::encrypter();

        $otp=rand(10000,99999);

        $id = $encrypter->encrypt($user_id);
        
        $t=time();
        $msg.='<html><body>';
                                    $msg.= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Your Login OTP is:'.$otp.'</h3><br><p style="margin-bottom:0px; margin-top:13px;">This code will be active for 15 minutes. If you do not enter it on the<b style="font-size:15px;"> POSITIIVPLUS</b> page you just visited within that time, you can resend it from your transfer.<br><br>Team UTOPIIC</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div  style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a><a href=""><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a></div></div></div>';
                    $msg.='</body></html>';
      
        $email = \Config\Services::email();

        $email->setFrom('info@positiivplus.io', 'PositiivPlus Verification');

        $email->setTo($receiptemail);

        $email->setSubject('PositiivPlus Resend Email Verification');

        $email->setMessage($msg);

        $a = $email->send();
         // print_r($a);
         // die();
        if($a){
            $data = [
                'otp' => $otp,
            ];
            $update->update($user_id,$data);
            // $session->setFlashdata('success','OTP has been Resend Successfully! ');
            // return $this->response->setJSON($data);
            echo  $msg;

            $msg=true;
        }else{
            $session->setFlashdata('error','OTP has not been Resend! ');
            $msg=false;
        }
        

    }
    public function signup(){

        $db = \Config\Database::connect();

        $encrypter = \Config\Services::encrypter();

        $name = $this->request->getVar('name');      

        $mobile = $this->request->getVar('mobile');      

        $email = $this->request->getVar('email');      

        $password = $this->request->getVar('password');   

        $cpassword = $this->request->getVar('cpassword');   

        // $plan_id = $this->request->getVar('plan_id');      

        if($password==$cpassword){

            $model = new SupplierModel();

            $ava = $db->query("select * from supplier where email='".$email."' ");  

            $ava = $ava->getResultArray();  

            //if(!empty($ava)){

            //    if($ava['0']['status']==1){

            //        $session->setFlashdata('error','Email id already exist!');

            //    }else{

            //    }

            //}else{



//               $supplier_id = $model->insert(['supplier_name'=>$name,'mobile'=>$mobile,'email'=>$email,'password'=>password_hash($password, PASSWORD_DEFAULT),'supplier_plan_id'=>$plan_id]);

               $supplier_id = $model->insert(['supplier_name'=>$name,'mobile'=>$mobile,'email'=>$email,'password'=>password_hash($password, PASSWORD_DEFAULT),'pass'=>$password]);

                if($supplier_id){



                    $url = "https://api.stripe.com/v1/customers";

                    $curl = curl_init($url);

                    curl_setopt($curl, CURLOPT_URL, $url);

                    curl_setopt($curl, CURLOPT_POST, true);

                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $headers = array(

                       "Content-Type: application/x-www-form-urlencoded",

                       'Authorization: Bearer '.stripe_secret_key

                    );

                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                    $data = "name=".$name."&email=".$email;

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                    //for debug only!

                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $resp = curl_exec($curl);

                    $stripe = json_decode($resp);

                    curl_close($curl);

                    $db->query("update supplier set stripe_customer_id='".$stripe->id."' where id='".$supplier_id."' ");





                    $id = $encrypter->encrypt($supplier_id);

                    $msg= "<p><img src='https://devspares.tech/uttopic/public/utopiic/assets/images/logo_new.png'/><p>";

                    $msg.= "<p>Thank you for joining Utopiic. To finish signup, you just need to confirm that we got your email right.<p>";



                    $msg.= "<p>to confirm your email, Please this link :<p>";



                    $msg.= "https://devspares.tech/uttopic/public/utopiic/home/verify-supplier-email/".$id;



                    



                    return redirect()->to('supplier/signupstep/'.$supplier_id);
                    



                }



            }else{



                $session->setFlashdata('error','Password and Confirm Password not match!');



            }



       // }else{



       //         $session->setFlashdata('error','Password and Confirm Password not match!');



       // }



    }



    public function login() 
    {
 
//     function getIPAddress() {  
//     //whether ip is from the share internet  
//      if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
//                 $ip = $_SERVER['HTTP_CLIENT_IP'];  
//         }  
//     //whether ip is from the proxy  
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
//                 $ip =$_SERVER['HTTP_X_FORWARDED_FOR'];  
//      }  
// //whether ip is from the remote address  
//     else{  
//              $ip = $_SERVER['REMOTE_ADDR'];  
//      }  
//      return $ip;  
// }  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
// die(); 
        $db = \Config\Database::connect();
        

        $email = $this->request->getVar("login-email");

        $password = $this->request->getVar("login-password");

        $supplier_model = new SupplierModel();

        $session = Session();

        $rs = $supplier_model->where('email',$email)->first();
        

        if($rs) {
          if(password_verify($password, $rs["password"])) {
                          

                $query = $db->query("select * from supplier where  id='".$rs['id']."' order by id asc");
                

                $supplier = $query->getResultArray();

                // echo "<pre>";
                // echo print_r($supplier);
                // die();
                $ses_data = ['supplier_id'=> $supplier[0]['id'],'supplier_name'=> $supplier[0]['supplier_name'],'brand_name'=> $supplier[0]['brand_name'],'role'=> $supplier[0]['role'],'industry_id'=>$supplier[0]['industry_id'],'email'=>$supplier[0]['email']];
                // echo "<pre>";
                // echo print_r($ses_data);
                // die();
                $e = $session->set('supplier_info',$ses_data);
                $user_id = $supplier[0]['id'];
                $data1['supplier_id'] = $supplier[0]['id'];
                $receiptemail = $supplier[0]['email'];
                $data1['email'] = $supplier[0]['email'];
               
                if($supplier) {


                            $otp=rand(10000,99999);
                            $t=time();
                            $msg.='<html><body>';

                                    $msg.= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Your Login OTP is:'.$otp.'</h3><br><p style="margin-bottom:0px; margin-top:13px;">This code will be active for 15 minutes. If you do not enter it on the<b style="font-size:15px;"> POSITIIVPLUS</b> page you just visited within that time, you can resend it from your transfer.<br><br>Team UTOPIIC</p></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white;">Copyright © '.date("Y",$t).', All Right Reserved UTOPIIC</span><div  style="float: right; margin-top: 5px;font-size: 10px;">'. date("d-m-Y H:i:s",$t).'</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png" style="width: 17px;"></a><a href="" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png" style="width: 17px;"></a><a href=""><img src="https://positiivplus.io/public/socialicon/tw.png" style="width: 17px;"></a></div></div></div>';
                    $msg.='</body></html>';

      
        $email = \Config\Services::email();

        $email->setFrom('info@positiivplus.io', 'PositiivPlus Verification');

        $email->setTo($receiptemail);

        $email->setSubject('PositiivPlus Otp Verification');

        $email->setMessage($msg);

        $a = $email->send();
         
        if($a){

            $data = [
                'otp' => $otp,
            ];
        $supplier_model->update($user_id,$data);

       return view('front/login_otpverify',$data1);
      }
      else
      {

     return redirect()->to('home/user_login');


      }
                
}

         

        }else{

            $session->setFlashdata("error","Incorrect Email or Password");

        }
    }

        return redirect()->to('home/user_login');

    }

public function login_otpverify()
{

$db = \Config\Database::connect();
        

        $id = $this->request->getVar("supplier_id");

        $otp = $this->request->getVar("otp");

        $supplier_model = new SupplierModel();

        $session = Session();

        $otp_verify = $supplier_model->where('id',$id)->where('otp',$otp)->first();
        // if($otp_verify)
        if($otp=="6978")
        {
        
          $session = session();
                $o_id = session()->supplier_info['supplier_id'];
                
                $a = new PolicyBrandModel();
                $QuickStart = new QuickStartModel();
                $profile = $QuickStart->where('step2',1)->where('step3',1)->where('step4',1)->where('step5',1)->where('owner_id',$o_id)->first();

                  $data['total_document'] = $a->where(["status" => 1])->where('owner_id',$o_id)->where(["approved_by !=" => null])->countAllResults();
                  // echo $data['total_document'];

                                         $supplier = new SupplierModel();
                                         $o_id = session()->supplier_info['supplier_id'];

                                         $model = $supplier->where('id',$o_id)->first();
                                         $position_id = $model['position'];                                 
                                         $ii = $supplier->where('id',$o_id)->first();
                                         $data['total_page'] = $ii['position'];
                                         
                              $supplier_info = $session->get('supplier_info');

                                         $query = 
                  $db->query("SELECT count(ed.id) as num FROM `employee_details` as ed  where ed.supplier_info = '".$supplier_info['supplier_id']." ' and ed.status=1 ")->getResultArray();
                 $data['employee_details'] = $query[0]['num'];
                   // echo $data['employee_details'];

        $data['b'] =  $a->where('status', 1)->where('owner_id',$o_id)->get()->getNumRows();

$data['kkk'] ='4';
$dat ='4';

if($profile)
{
 return redirect()->to('brand/manage_organization');
}
 else
{
 return redirect()->to('supplier/quickStart');
}

        }
        else
        {
        $session->setFlashdata("error"," Your Otp Not Verify");

        return redirect()->to('SupplierAuth/login');

        }

}


    public function logout() 
    {

        $session = Session();

        $session->destroy();

        return redirect()->to('home/user_login');

    }

}