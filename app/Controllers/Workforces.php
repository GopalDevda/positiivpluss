<?php



namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\SupplierModuleItemRelationModel;
use CodeIgniter\Controller;
use App\Models\PolicyBrandModel;
use App\Models\SupplierModel;
use App\Models\SupplierRoleModel;
use App\Models\EmployeeDetails;
use App\Models\TrainingCourse;




class Workforces extends BaseController



{

    private $helperData = array();



    public function __construct()

    {



        helper(['form', 'url', 'html', 'menu']);



        $session = \Config\Services::session();



        $this->helperData = commonData();
    }







    public function employee()
    {



        $rs = check_session();



        if (!$rs) {



            return redirect()->to('home/user_login');
        }



        $data['pg_nm'] = 'Employees';



        $db = \Config\Database::connect();



        $session = session();



        $supplier_info = $session->get('supplier_info');



        $supplier_model = new SupplierModel();



        $supplier_role_model = new SupplierRoleModel();



        $supplier_module_model = new SupplierModuleModel();



        $supplier_module_item_model = new SupplierModuleItemModel();



        $rs = $supplier_model->select("supplier_plan_id")->where('id', $supplier_info['supplier_id'])->first();



        $supplier_plan_id = $rs['supplier_plan_id'];







        $supplier_module_item_relation_model = new SupplierModuleItemRelationModel();



        $sup_mod_item_relation = $supplier_module_item_relation_model->where(['supplier_plan_id' => $supplier_plan_id, 'status' => 1])->findAll();



        $supplier_mod = [];



        $supplier_mod_item = [];



        if ($sup_mod_item_relation) {



            foreach ($sup_mod_item_relation as $smir) {



                $supplier_mod[] = $smir["supplier_module_id"];



                $supplier_mod_item[] = $smir["supplier_module_item_id"];
            }
        }



        $data['supplier_mod'] = $supplier_module_model->whereIn('id', $supplier_mod)->where('status', 1)->findAll();



        $data['supplier_mod_item'] = $supplier_module_item_model->whereIn('id', $supplier_mod_item)->where('status', 1)->findAll();



        $data["role"] = $supplier_role_model->where('status', 1)->findAll();


        // print_r($data['role']);
        // die;












        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");



        // $data['employee_details'] = $query->getResultArray();

        $o = new EmployeeDetails();

        $session_id = session()->supplier_info['supplier_id'];

        $supplier = new SupplierModel();

        $admin = $supplier->where('id', $session_id)->first();

        $owner = $admin['added_by'];

        $secondary = $owner;

        $secondary = '1019';

        if ($admin['role'] == 0) {

            $ad_min = [];

            $admin_id = $o->where('status', 1)->findAll();

            foreach ($admin_id as $row) {

                if ($row['admin_id'] != $session_id) {

                    $user = $supplier->findAll();

                    foreach ($user as $value) {

                        if ($value['employee_id'] == $row['id']) {

                            $users = $supplier->findAll();

                            foreach ($users as $u) {

                                if ($u['id'] == $value['added_by']) {

                                    if ($u['added_by'] == $session_id) {

                                        array_push($ad_min, $value['added_by']);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $where = ['admin_id = ' . $session_id . ''];

            foreach ($ad_min as $row) {

                array_push($where, 'or admin_id = ' . $row . '');
            }

            $ok = implode(" ", $where);

            $there = '(' . $ok . ')';

            // print_r($there);

            // die();

            // $where = '(admin_id ='.$session_id.' or admin_id = '.$secondary.')';

            // print_r($where);

            // die();

            $data['employee_details'] = $o->where('status', 1)->where($there)->findAll();

            // $data['employee_details'] = $o->where('status',1)->where('admin_id',$session_id )->orwhere('status',1)->where('admin_id',$ad_min['0'])->findAll();

        } elseif ($admin['role'] == 10) {

            $owner_id = $supplier->where('id', $session_id)->first();

            $ad_min = [];

            $admin_id = $o->where('status', 1)->findAll();

            foreach ($admin_id as $row) {

                if ($row['admin_id'] != $session_id && $row['admin_id'] != $owner_id['added_by']) {

                    $user = $supplier->findAll();

                    foreach ($user as $value) {

                        if ($value['employee_id'] == $row['id']) {

                            $users = $supplier->findAll();

                            foreach ($users as $u) {

                                if ($u['id'] == $value['added_by']) {

                                    if ($u['added_by'] == $owner_id['added_by']) {

                                        array_push($ad_min, $value['added_by']);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // $where = ['admin_id = '.$session_id.'','or admin_id = '.$owner_id['added_by'].''];
            $where = ['admin_id = ' . $session_id . ''];
            // print_r($where);
            // die();

            foreach ($ad_min as $row) {

                array_push($where, 'or admin_id = ' . $row . '');
            }

            $ok = implode(" ", $where);

            $there = '(' . $ok . ')';

            // print_r($there);

            // die();

            $data['employee_details'] = $o->where('status', 1)->where($there)->findAll();
            // print_r($data['employee_details']);
            // die();

            // $data['employee_details'] = $o->where('status',1)->where('admin_id',$session_id )->orwhere('status',1)->where('admin_id',$owner_id['added_by'])->findAll();

        } elseif ($admin['role'] == 11) {

            $data['employee_details'] = $o->where('status', 1)->where('supplier_info', $session_id)->findAll();
        }

        $data['assign_by'] = $supplier->findAll();




        echo view('brand/view-employee-section', $data);
    }

    public function createemployee()
    {





        $supplier = new SupplierModel();



        $db = \Config\Database::connect();



        $session = session();

        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $check = $this->validate([
            'email'     => 'required|is_unique[supplier.email]',

        ]);

        if (!$check) {

            $data['validation'] = $this->validator;
        }
        $supplier_info = $session->get('supplier_info');



        $Emp_Id = $this->request->getVar("Emp_Id");



        $emp_name = $this->request->getVar("emp_name");



        $pos_name = $this->request->getVar("pos_name");



        $department_name = $this->request->getVar("department_namee");
        if ($department_name == "") {
            $department_name = $this->request->getVar("department_name");
        }



        $role_id = $this->request->getVar("role_id");


        $email_address = $this->request->getVar("email_address");


        $contact_number = $this->request->getVar("contact_number");



        $null = NULL;



        $o_id = session()->supplier_info['supplier_id'];



        $admin = $supplier->where('id', $o_id)->first();

        if ($admin['role'] == 0) {

            $admin_id = $o_id;

            $owner_id = $o_id;
        } elseif ($admin['role'] == 10) {

            $admin_id = $o_id;

            $owner_id = $admin['owner_id'];
        } else {

            $admin_id = $admin['added_by'];

            $owner_id = $admin['owner_id'];
        }



        $t = $db->query("insert into employee_details(name,pos_name,department,email,phone_no,employee_id,supplier_info,role_id,deleted_at,admin_id) values('" . $emp_name . "','" . $pos_name . "','" . $department_name . "','" . $email_address . "','" . $contact_number . "','" . $Emp_Id . "','" . $supplier_info['supplier_id'] . "','" . $role_id . "','" . $null . "','" . $admin_id . "')");

        $emp_id = $db->insertID($t);

        $supp_id = $supplier_info['supplier_id'];

        $supplier_info = $db->query("SELECT * FROM `supplier` where id=$supp_id")->getResultArray();
        $department = $supplier_info[0]['department'];

        if ($department == "") {
            $department = "Positiivplus";
        }

        $supp = $supplier->where('id', $supplier_info[0]['id'])->first();


        $detail = $supplier->where('id', $admin_id)->first();
        $image = $detail['image'];
        //$department = $detail['department'];
        $s_name = $detail['supplier_name'];

        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        if ($role == '12') {
            $role_name = 'Employee';
        }
        if ($role == '13') {
            $role_name = 'Supplier';
        }


        $subject = 'SUB: You have an invitation for POSITIIVPLUS';
        $t = time();
        $time_date1 = date("d-m-Y H:i:s", $t);
        $time_date2 = date("Y", $t);
        $user_message .= '<html><body>';
        $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://user.positiivplus.io/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $emp_name . ',</h3><img style="height:50px; width:50px; border-radius:10px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">' . $s_name . '</p><p style="margin-bottom:10px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p> <span>Username : ' . $email_address . '</span><br><span>Password :123456</span><p  style="margin-bottom:13px; margin-top:13px;">Has invited you to join him on<b style="font-size:15px;"> POSITIIVPLUS</b></p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">JOIN</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.io/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.io/public/socialicon/tw.png"></a></div></div></div>';
        $user_message .= '</body></html>';
        //  print_r($user_message);
        // die();
        $mail = \Config\Services::email();
        $mail->setTo($email_address);
        $mail->setFrom('info@positiivplus.com', 'PositiivPlus');

        $mail->setSubject($subject);
        $mail->setMessage($user_message);
        $status = $mail->send();

        if ($status) {
            echo 'Email successfully sent';
        } else {
            $data = $mail->printDebugger(['headers']);
            // print_r($data);
        }

        $pass = '123456';
        //print_r($email_address);
        //print_r($message);
        //die(); 

        // $email = \Config\Services::email();
        // $email->setFrom('hello@utopiic.com', 'PositiivPlus Login Details');
        // $email->setTo($email_address);
        // $email->setSubject('Your Subject here | tutsmake.com');
        // $email->setMessage($msg);//your message here

        // $email->setCC('another@emailHere');//CC
        // // $email->setBCC('thirdEmail@emialHere');// and BCC
        // // $filename = '/img/yourPhoto.jpg'; //you can use the App patch 
        // // $email->attach($filename);

        // $email->send();
        // $email->printDebugger(['headers']);



        // $msg.="Added By".$supp['id'];

        // $email = \Config\Services::email();
        // $email->setFrom('hello@utopiic.com', 'PositiivPlus Login Details');
        // $email->setTo($email_address);

        // // $email->mailType(html);   

        // $email->setSubject('SUB: You have an invitation for POSITIIVPLUS');
        // $email->setMessage($msg);
        // $a = $email->send();



        $data = [

            'supplier_name'    => $emp_name,

            'mobile'           => $contact_number,

            'email'            => $email_address,

            'country_id'            => $supp['country_id'],

            'password'         => password_hash($pass, PASSWORD_DEFAULT),

            'dashboard_access' => 1,

            'role'             => $role_id,

            'employee_id'      => $emp_id,

            'owner_id'         => $owner_id,

            'added_by'         => $supp['id'],

            'industry_id'      => $supp['industry_id'],

            'brand_name'       => $supp['brand_name'],

            'emp_position_name'       => $pos_name,

            'department'       => $department_name,

            'supplier_plan_id' => $supp['supplier_plan_id']

        ];

        $rs = $supplier->insert($data);
        // print_r($rs);
        // print_r($data);
        // die();



        if ($rs) {



            $session->setFlashdata("success", "successfully created Employee");
        } else {



            $session->setFlashdata("error", "Cannot create more companies,need to upgrade plan");
        }

        // echo view('brand/view-employee-section',$data);

        return redirect()->to('workforces/employee');
    }

    public function yourMethod()
    {

        /*  $to = $this->request->getVar('mailTo');
   $subject='';
   $message='';
        $subject.='SUB: You have an invitation for POSITIIVPLUS';
        $message .= '<html><body>';
        $message .= '<h3>Hello User,</h3><img src="" alt="Invite Request"/><h3>Andrew Simon</h3><h5>Head Sustainability</h5><h5>Has invited you to join him on<b style="font-size:15px;">POSITIIVPLUS</b></h5><a href="https://user.positiivplus.io/home/user_login"><button style="padding:8px 30px; color:green; border-radius: 6px;">JOIN</button></a>';
        $message .= '</body></html>';
        $mail = \Config\Services::email(); 
   

        $mail->setTo('swatikanungomspl@gmail.com');
        $mail->setFrom('swatikanungomspl@gmail.com', 'SUB: You have an invitation for POSITIIVPLUS');
        
        $mail->setSubject($subject);
        $mail->setMessage($message);
        //print_r($mail);
        //die();
        if ($mail->send()) 
        {
            echo 'Email successfully sent';
        } 
        else 
        {
            $data = $mail->printDebugger(['headers']);
            print_r($data);
        }*/

        // $email->printDebugger(['headers']);
    }

    public function deleteemployee()
    {







        $db = \Config\Database::connect();



        $session = session();



        $employee_table_id = $this->request->getVar("employee_table_id");



        $supplier = new SupplierModel();

        $delid = $supplier->where('employee_id', $employee_table_id)->first();



        $supplier->where('id', $delid['id'])->delete($delid['id']);



        $query = $db->query("UPDATE `employee_details` SET `status`= 0 WHERE `employee_details`.`id` =" . $employee_table_id);





        if ($query) {



            $session->setFlashdata("success", "Deleted successfully  Employee");
        } else {



            $session->setFlashdata("error", "Issue ocure");
        }





        return redirect()->to('workforces/employee');
    }



    public function editemployee()
    {



        $db = \Config\Database::connect();



        $supplier = new SupplierModel();



        $session = session();



        $emp_table_id = $this->request->getVar("emp_table_id");



        $employee_emp_id = $this->request->getVar("employee_emp_id");



        $employee_name = $this->request->getVar("employee_name");



        $employee_email = $this->request->getVar("employee_email");



        $role_id = $this->request->getVar("role_id");



        $employee_phone_no = $this->request->getVar("employee_phone_no");



        $pos_name = $this->request->getVar("employee_pos_name");



        $department = $this->request->getVar("department_name");





        $rs = $db->query("update employee_details set pos_name='" . $pos_name . "',department='" . $department . "',name='" . $employee_name . "',email='" . $employee_email . "',role_id='" . $role_id . "',phone_no='" . $employee_phone_no . "',employee_id='" . $employee_emp_id . "' where id=" . $emp_table_id);





        $id = $supplier->where('email', $employee_email)->first();



        $data = [

            'supplier_name'    => $employee_name,

            'mobile'           => $employee_phone_no,

            'email'            => $employee_email,

            // 'password'         => password_hash($pass, PASSWORD_DEFAULT),

            'emp_position_name'       => $pos_name,

            'department'       => $department,

            'dashboard_access' => 1,

            'role'             => $role_id,

            // 'added_by'         => $supp['id'],

            // 'industry_id'      => $supp['industry_id'],

            // 'supplier_plan_id' => $supp['supplier_plan_id']

        ];
        $supplier->where(['id' => $id['id']])->set($data)->update();

        // $supplier->update($id['id'],$data);











        if ($rs) {



            $session->setFlashdata('success', 'Employee details has been updated successfully');
        } else {



            $session->setFlashdata('error', 'Error to update Employee details');
        }





        return redirect()->to('workforces/employee');
    }



    public function index()
    {



        $db = \Config\Database::connect();



        $data = $this->helperData;



        $session = session();



        $data['title'] = 'Training Courses Management';



        $query = $db->query("SELECT tc.* FROM `training-courses` as tc  where tc.status=1 ");



        $data['courselist'] = $query->getResultArray();



        echo view('admin/training-courses', $data);
    }



    public function gettrainingCoursesdetails($id)
    {



        $db = \Config\Database::connect();



        $ava = $db->query("SELECT tc.* FROM `training-courses` as tc where tc.id='" . $id . "' and tc.status=1");



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



    public function addCourseName()
    {







        $db = \Config\Database::connect();







        $session = session();







        $model = new TrainingCourse();







        $course_name = $this->request->getVar('course_name');





        $description = $this->request->getPost('description');







        $ava = $db->query("select * from  `training-courses` where courses_name='" . $course_name . "' and status=1");







        $ava = $ava->getResultArray();







        if (empty($ava)) {





            if ($model->insert(['courses_name' => $course_name, 'details' => $description, 'status' => 1, 'created_at' => date('Y-m-d H:i:s')])) {







                $session->setFlashdata('success', 'Course name has been saved successfully');
            } else {







                $session->setFlashdata('error', ' Not Save');
            }
        } else {







            $session->setFlashdata('error', 'Course  <b>' . $course_name . ' </b< already exist!');
        }

        return redirect()->to('TrainingCourses');
    }





    public function edittrainingCourses()
    {


        $db = \Config\Database::connect();


        $session = session();


        $model = new TrainingCourse();


        $courses_name = $this->request->getVar('course_name');



        $id = $this->request->getVar("courses_id");

        $description = $this->request->getPost('description');


        $ava = $db->query("select * from  `training-courses` where courses_name='" . $courses_name . "' and status=1");


        $ava = $ava->getResultArray();



        if (empty($ava)) {

            $updated_data = [


                "courses_name" => $courses_name,

                "details" => $description


            ];


            if ($model->where(['id' => $id])->set($updated_data)->update()) {


                $session->setFlashdata('success', 'Courses name has been updated successfully');
            } else {


                $session->setFlashdata('error', ' Not Updated');
            }
        } else {


            $session->setFlashdata('error', 'Courses name <b> ' . $courses_name . ' </b> already exist!');
        }

        return redirect()->to('TrainingCourses');
    }


    public function deletetrainingCoursese($id)
    {

        $db = \Config\Database::connect();


        $session = session();


        $model = new TrainingCourse();



        if ($model->update($id, ['status' => 0])) {


            $session->setFlashdata('success', 'Training Coursese  has been delete successfully');
        } else {

            $session->setFlashdata('error', 'Training Courses not deleted');
        }

        return redirect()->to('TrainingCourses');
    }
    public function policy_uu($id)
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = '';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $idd = $supplier_info['supplier_id'];

        $policy_brand = new PolicyBrandModel();
        $supplier_model = new SupplierModel();
        $supplier = $supplier_model->where('id', $idd)->first();
        $supplierdetail = $supplier_model->where('added_by', $idd)->findall();
        if ($supplier['role'] == 10) {

            $model = $policy_brand->where('id', $id)->where('created_by', $idd)->first();
        }

        if ($model) {
            $ack = json_decode($model['acknowledge_by']);
            $data = '';
            $data .= "<table class='table table-bordered table-hover'>";
            $data .= "<tr>";
            $data .= "<th>#</th>";
            $data .= "<th>Name</th>";
            $data .= "<th>Staus</th>";
            $data .= "</tr>";
            $s = 1;
            $aackid = array();
            foreach ($ack as $ackkca) {
                array_push($aackid, $ackkca);
                $supplierack = $supplier_model->where('id', $ackkca)->first();
                $data .= "<tr>";
                $data .= "<td>" . $s . "</td>";
                $data .= "<td>" . $supplierack['supplier_name'] . "</td>";
                $data .= "<td> Acknowledge</td>";
                $data .= "</tr>";
            }

            foreach ($supplierdetail as $surdeta) {
                if (!in_array($surdeta['id'], $aackid)) {
                    $supack = $supplier_model->where('id', $surdeta['id'])->first();
                    $data .= "<tr>";
                    $data .= "<td>" . $s . "</td>";
                    $data .= "<td>" . $supack['supplier_name'] . "</td>";
                    $data .= "<td> Send Remainder</td>";
                    $data .= "</tr>";
                }
            }

            $data .= "</table>";
            echo $data;
        }
    }
}
