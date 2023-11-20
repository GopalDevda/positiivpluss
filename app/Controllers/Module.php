<?php







namespace App\Controllers;







use App\Controllers\BaseController;



use CodeIgniter\Controller;



use App\Models\ModuleModel;



use App\Models\ModuleRoleModel;



use App\Models\ModuleItemModel;



use App\Models\ModuleRoleRelationModel;



use App\Models\UserModel;



use App\Models\IndustryModel;







class Module extends BaseController {


    private $helperData=array();
    public function __construct(){
        helper(['form', 'url','html','menu']);
        $session = \Config\Services::session();

        $this->helperData=commonData();

    }







    public function viewModule() {

        $data=$this->helperData;

        $module_model = new ModuleModel();

$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data['list'] = $module_model->select("*")->where('status',1)->findAll();



        return view('admin/view-module.php',$data);



    }







    public function addModule() {

        $data=$this->helperData;

        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



    	return view('admin/add-module',$data);



    }







    public function addModuleSubmit() {



	    $db = \Config\Database::connect();



    	$module_model = new ModuleModel();



    	$session = Session();



    	$name = $this->request->getVar("name");



    	$link = $this->request->getVar("link"); 



    	$icon = $this->request->getVar("icon");



	    $ava = $db->query("select * from module where module_name='".$name."' and status=1");



        $ava = $ava->getResultArray();



        if(empty($ava)){



            $data = [



            "module_name" => $name,



            "link" => $link,



            "icon" => $icon,



            "user_id" => 1,



            "status" => 1



            ];



            if($module_model->insert($data)){



                $session->setFlashdata('success','Module has been saved successfully');



            }else{



                $session->setFlashdata('error','Module Not Save');



            }



        }else{



          $session->setFlashdata('error','Module name '.$name.' already exist!');



        }



         return redirect()->to('module/viewModule');



    }







    public function deleteModule($id) {



        $module_model = new ModuleModel();



        $session = Session();



        if($module_model->where(['id' => $id])->set(['status' => 0])->update()){



            $session->setFlashdata("success","Module has been successfully deleted");



        }



        else {



            $session->setFlashdata("error","Error to delete");



        }



        return redirect()->to('module/viewModule');



    }







    public function editModule() {



        $db = \Config\Database::connect();



        $session = session();



        $module_model = new ModuleModel(); 



        $id = $this->request->getVar("id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $icon = $this->request->getVar('icon');



      $ava = $db->query("select * from module where module_name='".$name."' and status=1 and id!=".$id);



      $ava = $ava->getResultArray();



      if(empty($ava)){



            $data = [



            "module_name" => $name,



            "link" => $link,



            "icon" => $icon,



            ];



            if($module_model->where(['id' => $id])->set($data)->update()){



                $session->setFlashdata('success','Module has been updated successfully');



            }else{



                $session->setFlashdata('error','Module Not Updated');



            }



        }else{



          $session->setFlashdata('error','Module name '.$name.' already exist!');



        }



         return redirect()->to('module/viewModule');    	



    }







    public function moduleRole() {

        $data=$this->helperData;
        $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        $module_role_model = new ModuleRoleModel();



        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["list"] = $module_role_model->select("*")->where('status',1)->findAll();



        return view('admin/module-role.php',$data);



    }







    public function addModuleRole() {


        $data=$this->helperData;
        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        return view('admin/add-module-role.php',$data);



    }







    public function addModuleRoleSubmit() {



        $db = \Config\Database::connect();



        $module_role_model = new ModuleRoleModel();



        $name = $this->request->getVar('name');



        $session = Session();



        $ava = $db->query("select * from module_role where role_name='".$name."' and status=1");



        $ava = $ava->getResultArray();



        if(empty($ava)) {



            $data=[



                "role_name" => $name,



                "status" => 1



            ];



            if($module_role_model->insert($data)) {







                $session->setFlashdata("success","Module Role has been successfully saved");



            }



            else {



                $session->setFlashdata("error","Error to save");



            }



        }



        else {



            $session->setFlashdata("error","Role Name ".$name." already exists");



        }



        return redirect()->to('module/moduleRole');



    }







    public function deleteModuleRole($id) {



        $module_role_model = new ModuleRoleModel();



        $session = Session();



        if($module_role_model->where(['id' => $id])->set(['status' => 0])->update()){



            $session->setFlashdata("success","Module role has been successfully deleted");



        }



        else {



            $session->setFlashdata("error","Error to delete");



        }



        return redirect()->to('module/moduleRole');



    }







    public function editModuleRole() {



        $db = \Config\Database::connect();



        $session = session();



        $module_role_model = new ModuleRoleModel(); 



        $id = $this->request->getVar("id");



        $name = $this->request->getVar("name");



      $ava = $db->query("select * from module_role where role_name='".$name."' and status=1 and id!=".$id);



      $ava = $ava->getResultArray();



      if(empty($ava)){



        $data = [



            "role_name" => $name



        ];



        if($module_role_model->where(['id' => $id])->set($data)->update()) {



            $session->setFlashdata("success","Module Role name has been successfully deleted");



        }



        else {



            $session->setFlashdata("error","Error to update");



        }



      }else{



          $session->setFlashdata('error','Module Role name '.$name.' already exist!');



        }



         return redirect()->to('module/moduleRole');                



    }







    public function moduleItem() {

        $data=$this->helperData;

        // $module_item_model = new ModuleItemModel();


 $session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }
        // $industry_model = new IndustryModel();



        $module_item_model = new ModuleItemModel();



        $rs = $module_item_model->where('status',1)->findAll();



        $db = \Config\Database::connect();



        $data['title'] = 'Module Item Management';



        // $module_model = new ModuleModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $list=array();



        if(!empty($rs)){



            foreach($rs as $r){



                $query = $db->query("select * from module where status=1 and id='".$r['module_id']."' ");



                $mod = $query->getResultArray();



                if(!empty($mod)){$module_name =$mod[0]['module_name']; }else{$module_name=0;}



                $list[]=array('id'=>$r['id'],'item_name'=>$r['item_name'],'module_name'=>$module_name,'icon'=>$r['icon'],'link'=>$r['link']);   



            }



        }



       $data['list']=$list;



        return view('admin/module-item.php',$data);



    }







    public function addModuleItem() {

        $data=$this->helperData;

        // $module_item_model = new ModuleItemModel();



        $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["module"] = $module_model->where('status',1)->findAll();



        return view('admin/add-module-item.php',$data);



    }







    public function addModuleItemSubmit() {



        $db = \Config\Database::connect();



        $module_item_model = new ModuleItemModel();



        $session = Session();



        $module_id = $this->request->getVar("module_id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link"); 



        $file = $this->request->getFile("file");



        $ava = $db->query("select * from module_item where module_id=".$module_id." and item_name='".$name."' and status=1");



        $ava = $ava->getResultArray();



      if(empty($ava)){



          if($file->isValid()){



            $ext = $file->getClientExtension();



            $ava_ext = array("png", "jpg", "jpeg", "gif");



                if(in_array($ext,$ava_ext)){



                     $newName = $file->getRandomName();



                    if($file->move('public/uploads/module',$newName)){



                        $data = [



                        "module_id" => $module_id,



                        "item_name" => $name,



                        "link" => $link,



                        "icon" => $newName,



                        "user_id" => 1,



                        "status" => 1



                      ];



                        if($module_item_model->insert($data)){



                            $session->setFlashdata('success','Module Item has been saved successfully');



                        }else{



                            $session->setFlashdata('error','Module Item Not Save');



                        }



                    }else{



                         $session->setFlashdata('error','Please select a valid icon');



                    }



                }else{



                        $session->setFlashdata('error','Please select a valid icon');



                }



              }



        }else{



          $session->setFlashdata('error','Module Item name '.$name.' already exist!');



        }



         return redirect()->to('module/moduleItem');



    }







    public function editModuleItem($id) {

        $data=$this->helperData;

        $module_model = new ModuleModel();



        // $module_item_model = new ModuleItemModel();        



        // $industry_model = new IndustryModel();



        $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["module"] = $module_model->where('status',1)->findAll();



        $data["module_item"] = $module_item_model->where('id',$id)->first();



        return view("admin/edit-module-item",$data);



    }







    public function deleteModuleItem($id) {



        $module_item_model = new ModuleItemModel();



        $session = Session();



        if($module_item_model->where(['id' => $id])->set(['status' => 0])->update()) {



            $session->setFlashdata("success","Module Item has been successfully deleted");



        }



        else {



            $session->setFlashdata("error","Error to delete");



        }



        return redirect()->to('module/moduleItem');



    }







    public function updateModuleItem() {



        $db = \Config\Database::connect();



        $session = session();



        $module_item_model = new ModuleItemModel(); 



        $id = $this->request->getVar("id");



        $module_id = $this->request->getVar("module_id");



        $name = $this->request->getVar("name");



        $link = $this->request->getVar("link");



        $file = $this->request->getFile('file');



      $ava = $db->query("select * from module_item where module_id=".$module_id." and item_name='".$name."' and status=1 and id!=".$id);



      $ava = $ava->getResultArray();



      if(empty($ava)){



          if($file->isValid()){



            $ext = $file->getClientExtension();



            $ava_ext = array("png", "jpg", "jpeg", "gif");



                if(in_array($ext,$ava_ext)){



                     $newName = $file->getRandomName();



                    if($file->move('public/uploads/module',$newName)){



                        $data = [



                        "module_id" => $module_id,



                        "item_name" => $name,



                        "link" => $link,



                        "icon" => $newName,



                      ];



                        if($module_item_model->where(['id' => $id])->set($data)->update()){



                            $session->setFlashdata('success','Module Item has been updated successfully');



                        }else{



                            $session->setFlashdata('error','Module Item Not Updated');



                        }



                    }else{



                         $session->setFlashdata('error','Please select a valid icon');



                    }



                }else{



                        $session->setFlashdata('error','Please select a valid icon');



                }



              }



              else {



                $data = [



                "module_id" => $module_id,



                "item_name" => $name,



                "link" => $link,



                ];                



                if($module_item_model->where(['id' => $id])->set($data)->update()) {



                    $session->setFlashdata("success","Module Item has been successfully updated");



                }



                else{



                    $session->setFlashdata("error","Error to update");



                }



              }



        }else{



          $session->setFlashdata('error','Module Item name '.$name.' already exist!');



        }



         return redirect()->to('module/moduleItem');        







    }







    public function moduleRoleRelation() {







    }







    public function addModuleRoleRelation() {

        $data=$this->helperData;

        $db = \Config\Database::connect();
$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }


        $module_role_model = new ModuleRoleModel();



        $module_model = new ModuleModel();



        $module_item_model = new ModuleItemModel();



        // $industry_model = new IndustryModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["role"] = $module_role_model->where('status',1)->findAll();



        $data["module"]=[];



        $module = $module_model->where('status',1)->findAll();



        $list = [];



        if($module) {



            foreach($module as $mod) {



                $temp_arr = [];



                $item = $module_item_model->where('module_id',$mod['id'])->findAll();



                $temp_arr["module"]=$mod;



                $temp_arr["item"]=$item;



                $list[] = $temp_arr;



            }



        }



        $data["list"] = $list;



        return view('admin/add-module-role-relation.php',$data);



    }







    public function addModuleRoleRelationSubmit() {



        $db = \Config\Database::connect();



        $session = Session();



        $module_role_relation_model = new ModuleRoleRelationModel();



        $role_id = $this->request->getVar("role_id");



        $item_arr = $this->request->getVar("item_id");



        $rs = $module_role_relation_model->where(['role_id' => $role_id])->set(['status' => 0])->update();



        if($item_arr) {



            foreach($item_arr as $item) {



                $arr = explode(",",$item);



                $module_id = $arr[0];



                $item_id = $arr[1];



                $ava = $db->query("select * from module_role_relations where role_id='".$role_id."' and module_id='".$module_id."' and module_item_id='".$item_id."'");



                $ava = $ava->getResultArray();



                if(empty($ava)) {



                    $data=[



                        "role_id" => $role_id,



                        "module_id" => $module_id,



                        "module_item_id" => $item_id,



                        "status" => 1



                    ];



                    $rs = $module_role_relation_model->insert($data);



                }



                else {



                    $rs = $module_role_relation_model->where(['role_id' => $role_id, 'module_id' => $module_id, 'module_item_id' => $item_id])->set(['status' => 1])->update();



                }



            }            



        }



        return redirect()->to('module/addModuleRoleRelation');



    }







    public function editModuleRoleRelation() {







    }







    public function deleteModuleRoleRelation() {







    }







    public function getItemByModule($id) {



        $db = \Config\Database::connect();



        $data= '';



        $query = $db->query("select * from module_item where status=1 and module_id='".$id."' ");



        $item = $query->getResultArray();



        $data.="<option value=''>Select Indicator</option>";



        if(!empty($item)){



            foreach($item as $c){



                $data.="<option value=".$c['id'].">".$c['item_name']."</option>";



             }



        }



        return $data;



    }







    public function getModuleItemByRole($id) {



        $module_role_relation_model = new ModuleRoleRelationModel();



        $module_model = new ModuleModel();



        $module_item_model = new ModuleItemModel();



        $rs = $module_role_relation_model->where(['role_id' => $id, 'status' => 1])->findAll();



        $item_id_arr = [];



        if($rs) {



            foreach($rs as $r) {



                $item_id_arr[] = $r["module_item_id"];



            }            



        }



        $module = $module_model->where('status',1)->findAll();



        $list = [];



        if($module) {



            foreach($module as $mod) {



                $temp_arr = [];



                $item = $module_item_model->where('module_id',$mod['id'])->findAll();



                $temp_arr["module"]=$mod;



                $temp_arr["item"]=$item;



                $list[] = $temp_arr;



            }



        }



        $rs="";



        if($list) {



            foreach($list as $li) {



                $rs.='<div class="col-md-3" style="top:0px;margin:10px;">



                      <input type="checkbox" name="module_id[]" value="'.$li["module"]["id"].'"> ';



                $rs.=$li["module"]["module_name"];



                $rs.='</div>';



                if(!empty($li["item"])) {



                    $rs.='<div class="row">';



                    foreach($li["item"] as $itm) {



                        $rs.='<div class="col-md-3" style="float:left;left:45px;top:0px;margin:5px;">';



                        $rs.='<button style="background: peru;color: white;border: 0px;height: 35px;border-radius: 9px;">';



                      $rs.='<input type="checkbox" name="item_id[]" value="'.$li["module"]["id"].','.$itm["id"].'"';



                      if(in_array($itm['id'],$item_id_arr)) {



                        $rs.='checked=checked ';



                      }



                      $rs.='> ';



                      $rs.=$itm["item_name"];



                      $rs.='</button>';



                      $rs.='</div>';



                    }



                    $rs.='</div>';



                }



            }



        }



        return $rs;



    }







    public function addUser() {

        $data=$this->helperData;

        $module_role_model = new ModuleRoleModel();

$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();        



        $data["role"] = $module_role_model->where('status',1)->findAll();



        return view('admin/add_user.php',$data);



    }







    public function addUserSubmit() {



        $db = \Config\Database::connect();



        $user_model = new UserModel();



        $session = Session();



        $role_id = $this->request->getVar("role_id");



        $name = $this->request->getVar("name");



        $email = $this->request->getVar("email");



        $address = $this->request->getVar("address");



        $zipcode = $this->request->getVar("zipcode");



        $phone = $this->request->getVar("phone");



        $password = $this->request->getVar("password");



        $confirm_password = $this->request->getVar("confirm_password");



        $file = $this->request->getFile("file");



        $ava = $db->query("select * from admin where email='".$email."' and status=1");



        $ava = $ava->getResultArray();



    if($password == $confirm_password) {



      if(empty($ava)){



          if($file->isValid()){



            $ext = $file->getClientExtension();



            $ava_ext = array("png", "jpg", "jpeg", "gif");



                if(in_array($ext,$ava_ext)){



                     $newName = $file->getRandomName();



                    if($file->move('public/uploads/user',$newName)){



                        $data = [



                        "user_role" => $role_id,



                        "name" => $name,



                        "email" => $email,



                        "address" => $address,



                        "zipcode" => $zipcode,



                        "phone" => $phone,



                        "profile_pic" => $newName,



                        "password" => password_hash($password, PASSWORD_DEFAULT),



                        "status" => 1



                      ];



                        if($user_model->insert($data)){



                            $session->setFlashdata('success','User has been added successfully');



                        }else{



                            $session->setFlashdata('error','User Not add');



                        }



                    }else{



                         $session->setFlashdata('error','Please select a valid icon');



                    }



                }else{



                        $session->setFlashdata('error','Please select a valid icon');



                }



              }



        }else{



          $session->setFlashdata('error','Email '.$email.' already exist!');



        }



    }



    else {



        $session->setFlashdata("error","Password not match");



    } 



         return redirect()->to('module/viewUser');



    }







    public function viewUser() {



        $db = \Config\Database::connect();
        $data=$this->helperData;



        $user_model = new UserModel();



        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();
// 


        // $module_item_model = new ModuleItemModel();



        $module_role_relation_model = new ModuleRoleRelationModel();



        $mod_role_relation = $module_role_relation_model->where(['role_id' => 4, 'status' => 1])->findAll();



        $mod_rol_items = [];



        if($mod_role_relation) {



            foreach($mod_role_relation as $mrr) {



                $mod_rol_items[] = $mrr['module_item_id'];



            }



        }



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->whereIn('id',$mod_rol_items)->where('status',1)->findAll();



        // $data['list'] = $user_model->where("status",1)->findAll();



        $data['list'] = $db->query("select admin.*,module_role.role_name from admin left join module_role on admin.user_role=module_role.id where admin.status=1")->getResultArray();



        return view('admin/view-user',$data);



    }







    public function deleteUser($id) {



        $user_model = new UserModel();



        $session = Session();



        if($user_model->where(['id' => $id])->set(['status' => 0])->update()) {



            $session->setFlashdata("success","User has been successfully deleted");



        }



        else {



            $session->setFlashdata("error","Error to delete");



        }



        return redirect()->to('module/viewUser');



    }







    public function editUser($id) {

        $data=$this->helperData;

        $user_model = new UserModel();

$session = session();
        $user_info = $session->get('user_info');
        if(!$user_info){
        
            return redirect()->to('auth/logout');

        }

        $module_role_model = new ModuleRoleModel();



        // $module_model = new ModuleModel();



        // $industry_model = new IndustryModel();



        // $module_item_model = new ModuleItemModel();



        // $data['menu'] = $module_model->select("*")->where('status',1)->findAll();



        // $data['supplier_management_menu'] = $industry_model->select("*")->where('status',1)->findAll();



        // $data['mod_item'] = $module_item_model->where('status',1)->findAll();



        $data["module_role"] = $module_role_model->where('status',1)->findAll();



        $data['user'] = $user_model->where('id',$id)->first();



        return view('admin/edit-user.php',$data);



    }







    public function updateUser() {



        $db = \Config\Database::connect();



        $user_model = new UserModel();



        $session = Session();



        $id = $this->request->getVar("id");



        $role_id = $this->request->getVar("role_id");



        $name = $this->request->getVar("name");



        $email = $this->request->getVar("email");



        $address = $this->request->getVar("address");



        $zipcode = $this->request->getVar("zipcode");



        $phone = $this->request->getVar("phone");



        $file = $this->request->getFile("file");



        $ava = $db->query("select * from admin where email='".$email."' and status=1 and id!=".$id);



        $ava = $ava->getResultArray();



      if(empty($ava)){



          if($file->isValid()){



            $ext = $file->getClientExtension();



            $ava_ext = array("png", "jpg", "jpeg", "gif");



                if(in_array($ext,$ava_ext)){



                     $newName = $file->getRandomName();



                    if($file->move('public/uploads/user',$newName)){



                        $data = [



                        "user_role" => $role_id,



                        "name" => $name,



                        "email" => $email,



                        "address" => $address,



                        "zipcode" => $zipcode,



                        "phone" => $phone,



                        "profile_pic" => $newName,



                      ];



                        if($user_model->where('id',$id)->set($data)->update()){



                            $session->setFlashdata('success','User has been successfully updated');



                        }else{



                            $session->setFlashdata('error','User Not updated');



                        }



                    }else{



                         $session->setFlashdata('error','Please select a valid icon');



                    }



                }else{



                        $session->setFlashdata('error','Please select a valid icon');



                }



              }



              else {



                $data = [



                "user_role" => $role_id,



                "name" => $name,



                "email" => $email,



                "address" => $address,



                "zipcode" => $zipcode,



                "phone" => $phone,



                ];



                if($user_model->where('id',$id)->set($data)->update()){



                    $session->setFlashdata('success','User has been successfully updated');



                }else{



                    $session->setFlashdata('error','User Not updated');



                }                



              }



        }else{



          $session->setFlashdata('error','Email '.$email.' already exist!');



        }



         return redirect()->to('module/viewUser');



    }



}