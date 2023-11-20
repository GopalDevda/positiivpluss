<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\Control_assessment;
use App\Models\BrandModel;
use App\Models\SupplierModuleModel;
use App\Models\SupplierModuleItemModel;
use App\Models\IndicatorCategoryModel;
use App\Models\IndicatorModel;
use App\Models\QualitativeTimelineAnswerModel;
use App\Models\ActionCenterModel;
use App\Models\BrandQualitativeAnswerModel;
use App\Models\UserNotification;
use App\Models\Assessment;
use App\Models\SupplierModel;
use App\Models\SupplierModuleItemRelationModel;
use App\Models\FootprintTypeModel;
use App\Models\SupplierType;
use App\Models\Qualitative_assessment_step;
use App\Models\DocumentModel;
use App\Models\AllAssessmentModel;


class Controlwork extends BaseController
{
    private $helperData = array();
    public function __construct()
    {
        helper(['form', 'url', 'html', 'menu']);
        $session = \Config\Services::session();
        $this->helperData = commonData();
    }
    public function gettimeline($timelineId = 0)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_model = new SupplierModel();
        $action_center_model = new ActionCenterModel();

        $timeline_action_data = $query = $db->query("SELECT s.supplier_name , s.role , t.* FROM `timeline_action_center` as t join `supplier` as s on s.id=t.supplier_id  WHERE t.action_center_id = $timelineId")->getResultArray();
        $centre_dataa = $action_center_model->where(['id' => $timelineId, 'status' => 1])->findAll();
        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        if ($centre_dataa) {
            $centre_data = $centre_dataa;
        } else {
            $centre_data = $action_center_model->where(['id' => $timelineId])->findAll();
        }
        $action_center_id = $centre_data[0]['id'];
        $priority = $centre_data[0]['priority'];
        $employee_details = $query->getResultArray();
        $user_data = $supplier_model->select("*")->where('id', $centre_data[0]['supplier_id'])->first();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $user_new_data = $supplier_model->where('owner_id', $o_id)->findAll();
        $Creater_name = $user_data['supplier_name'];
        $task_report = $centre_data[0]['status'];
        $deadline = $centre_data[0]['due_date'];
        $assignedarray = json_decode($centre_data[0]['assignee']);
        $creater_image = $user_data['image'];

        if ($user_data["role"] == 0) {
            $designation_name = "Owner";
        }

        if ($user_data["role"] == 10) {
            $designation_name = "Admin";
        }

        if ($user_data["role"] == 11) {
            $designation_name = "Manager";
        }

        if ($user_data["role"] == 12) {
            $designation_name = "Employee";
        }

        if ($user_data["role"] == 13) {
            $designation_name = "Supplier";
        }

        $statuspic = array(
            array("id" => "1", "name" => "pending"),
            array("id" => "2", "name" => "In progress"),
            array("id" => "3", "name" => "Completed"),
        );

        $rs = "";
        if ($centre_data) {
            $ky = 1;
            $i = 0;
            $rs .= '<div class="card-body">';
            $rs .= ' <ul class="timeline">';
            $rs .= ' <li class="timeline-item">
        <span class="timeline-point timeline-point-indicator"></span>
        <div class="timeline-event">
        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
        <h6 class="mb-1">' . $centre_data[0]['description'] . '</h6>

        </div>
        <div class="d-flex flex-row align-items-center">
        <div class="avatar">';
            if ($creater_image == '') {
                $rs .= '<img src="' . base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') . '" alt="avatar" height="38" width="38">';
            } else {
                $rs .= '<img src="' . base_url('public/brand/assets/app-assets/images/avatars/' . $creater_image . '') . '" alt="avatar" height="38" width="38">';
            }
            $rs .= '</div>
        <div class="ms-50" style="margin-right: 137px;">
        <h6 class="mb-0">' . $Creater_name . ' </h6>
        <span>' . $designation_name . '</span>
        </div>
        <span class="timeline-event-time"><i class="fa-solid fa-calendar-days"></i> ' . substr($centre_data[0]['created_at'], 0, 10) . '<br><i class="fa-solid fa-clock"></i> ' . substr($centre_data[0]['created_at'], 10) . '</span>
        </div>';
            $rs .= '<hr>';
            $rs .= ' <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column mt-1">
        <div>
        <p class="text-dark mb-50" style="font-weight:500">Assign</p>
        <div class="d-flex align-items-center">';



            foreach ($assignedarray as $key => $assigned) {
                $rs .= '<div class="avatar-group">';
                foreach ($user_new_data as $dt) {
                    if ($dt['id'] == $assigned) {
                        $rs .= '<div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="' . $dt["supplier_name"] . '" class="avatar pull-up" data-bs-original-title="Vinnie Mostowy">
        <img src="' . base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg") . '" alt="Avatar" height="30" width="30">
        </div>';
                    }
                }
                $rs .= '</div>';
            }
            $rs .= '</div></div>
        <div class="mt-sm-0 mt-1">
        <p class="text-dark mb-50" style="font-weight:500">Deadline</p>
        <p class="mb-0">' . $deadline . '</p>
        </div>
        <div class="mt-sm-0 mt-1">
        <p class="text-dark mb-50" style="font-weight:500">Priority</p>';
            if ($priority == "High") {
                $color = "danger";
            }
            if ($priority == "Medium") {
                $color = "warning";
            }
            if ($priority == "Low") {
                $color = "success";
            }
            $rs .= '<span class="mb-0 badge rounded-pill badge-light-' . $color . '">' . $priority . '</span>
        </div>
        </div>
        </div>
        </li>';

            foreach ($timeline_action_data as $key => $timactdat) {

                $rs .= '      <li class="timeline-item">';
                if ($timactdat['status'] == "1") {
                    $rs .= '<span class="timeline-point timeline-point-warning timeline-point-indicator"></span>';
                }
                if ($timactdat['status'] == "2") {
                    $rs .= '<span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>';
                }
                if ($timactdat['status'] == "3") {
                    $rs .= '<span class="timeline-point timeline-point-success timeline-point-indicator"></span>';
                }


                $rs .= '<div class="timeline-event">
        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-2">
        <h6 class="mb-1">' . $timactdat['description'] . '</h6>

        </div>

        <div class="d-flex flex-row align-items-center">
        <div class="avatar">
        <img src="' . base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') . '" alt="avatar" height="38" width="38" />
        </div>
        <div class="ms-50" style="margin-right: 137px;">
        <h6 class="mb-0">' . $timactdat['supplier_name'] . '</h6>
        <span>';
                if ($timactdat['role'] == 0) {
                    $rs .= 'owner';
                } elseif ($timactdat['role'] == 10) {
                    $rs .= 'admin';
                } elseif ($timactdat['role'] == 11) {
                    $rs .= 'manager';
                } elseif ($timactdat['role'] == 12) {
                    $rs .= 'employee';
                } elseif ($timactdat['role'] == 13) {
                    $rs .= 'supplier';
                }
                $rs .= '</span>
        </div>
        <span class="timeline-event-time">45 min ago</span>
        </div>';
                $rs .= '<hr>';
                $rs .= ' <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
        <div>
        <p class="text-dark mb-50" style="font-weight:500" id="asss">Assign</p>
        <div class="d-flex align-items-center">';



                $rs .= '<div class="avatar-group">';
                $u_n = json_decode($timactdat['assigned']);
                foreach ($user_new_data as $dt) {
                    if (in_array($dt['id'], $u_n)) {

                        $rs .= '<div data-bs-toggle="tooltip" data-popup="tooltip-custom" id="sss" data-bs-placement="bottom" title="' . $dt["supplier_name"] . '" aria-describedby="tooltip610702" class="avatar pull-up" data-bs-original-title="Vinnie Mostowy">';
                        if ($dt['image'] == '') {
                            $rs .= '<img src="' . base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg") . '" alt="Avatar" height="30" width="30">';
                        } else {
                            $rs .= '<img src="' . base_url("public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg") . '" alt="Avatar" height="30" width="30">';
                        }
                        $rs .= '</div>';
                    }
                }
                $rs .= '</div>';


                $rs .= '</div></div>
        <div class="mt-sm-0 mt-1">
        <p class="text-dark mb-50" style="font-weight:500">Deadline</p>
        <p class="mb-0">' . $deadline . '</p>
        </div>
        <div class="mt-sm-0 mt-1">
        <p class="text-dark mb-50" style="font-weight:500">Priority</p>

        <span class="mb-0 badge rounded-pill badge-light-' . $color . '">' . $priority . '</span>
        </div>
        </div>

        </div>
        </li>';
            }


            $rs .= '      ';
            $rs .= '</li> </ul> </div>';
            if ($task_report != '4' and $task_report != '0') {
                $rs .= '<div class="my-1 mx-3">
        <button class="btn btn-primary waves-effect waves-float waves-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
        Take Further action
        </button>

        <button type="button" class="btn btn-outline-danger update-btn waves-effect" data-bs-dismiss="modal">
        Close
        </button>


        </div>';
                $rs .= '<div class="collapse" id="collapseExample">
        <form id="form-modal-todo" class="todo-modal needs-validation" method="post">
        <ul class="list-group list-group-flush mt-1">
        <li class="list-group-item d-flex justify-content-between flex-wrap" style="display:none;">

        <li class="list-group-item d-flex justify-content-between flex-wrap" id="yyy" style="display:none;">
        <span><span class="fw-bold" id="descript" style="display:none;">Description</span><textarea id="description" class="form-control" style="display:none;" name="description" rows="4" cols="50"></textarea></span>
        </li>
        <input type="hidden" name="action_center_id" id="action_center_id" value="' . $action_center_id . '">
        <input type="hidden" name="deadline" id="deadline" value="' . $deadline . '">';


                $rs .= '</select> </li>';
                $rs .= '<li class="list-group-item d-flex justify-content-between flex-wrap">
        <span class="fw-bold" style="display:none;" id="task-assig">Assigne</span> <select style="display:none;"  class="select2 form-select select2-show-accessible" id="task-assigned" name="task-assigned[]"  multiple="multiple" >';

                foreach ($user_new_data as $ed) {

                    $rs .= '<option value="' . $ed['id'] . '">' . $ed['supplier_name'] . '</option> ';
                }

                $rs .= '</select> </li>';
                $rs .= '<li class="list-group-item d-flex justify-content-between flex-wrap">
        <span class="fw-bold" style="display:none;" id="chhhh">Change Status</span> <select style="display:none;" class="select2 form-select" id="task-status" name="task-status">';

                foreach ($statuspic as $std) {

                    $rs .= '<option value="' . $std['id'] . '">' . $std['name'] . '</option> ';
                }
                $rs .= '</select> </li>';
                $rs .= '<li class="list-group-item d-flex justify-content-between flex-wrap">
        <span class="fw-bold" style="display:none;" id="imageee">Image</span>
        <input type="file" name="image" id="image" style="display:none;">
        <input type="file" name="image_old" id="image_old" style="display:none;">

        </li>';
                $rs .= '<li class="list-group-item d-flex justify-content-between flex-wrap id="r">
        <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="r"> Add Update</p>

        <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="roo">assign</p>

        <p  class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light"  id="attach">Attach media</p>

        <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light" id="changeee">Change</p>
        <p class="btn btn-primary update-btn update-todo-item me-1 waves-effect waves-float waves-light attachhe" id="changeee">Update</p></li>

        </ul>
        </form>
        </div>';
                $rs .= '<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>';
                $rs .= '
        <script>
        $(document).ready(function() {
        $("#r").click(function(e) {
        e.preventDefault();
$("#description").show();
        $("#descript").show();
        $("#task-assig").hide();
        $("#task-assigned").hide();
        $("#task-status").hide();
        $("#chhhh").hide();
        $("#imageee").hide();
        $("#image").hide();
        })
        });
        </script>';
                $rs .= '
        <script>
        $(document).ready(function() {
        $("#roo").click(function(e) {
        e.preventDefault();
        $("#task-assig").show();
        $("#task-assigned").show();
        $("#description").hide();
        $("#descript").hide();
        $("#task-status").hide();
        $("#chhhh").hide();
        $("#imageee").hide();
        $("#image").hide();

        })
        });
        </script>';
                $rs .= '
        <script>
        $(document).ready(function() {
        $("#changeee").click(function(e) {
        e.preventDefault();
        $("#task-status").show();
        $("#chhhh").show();
        $("#task-assig").hide();
        $("#task-assigned").hide();
        $("#description").hide();
        $("#descript").hide();
        $("#imageee").hide();
        $("#image").hide();

        })
        });
        </script>';
                $rs .= '
        <script>
        $(document).ready(function() {
        $("#attach").click(function(e) {
        e.preventDefault();
        $("#task-status").hide();
        $("#chhhh").hide();
        $("#task-assig").hide();
        $("#task-assigned").hide();
        $("#description").hide();
        $("#descript").hide();
        $("#imageee").show();
        $("#image").show();

        })
        });
        </script>';
                $rs .= '
        <script>
        $(document).ready(function() {
        $(".attachhe").click(function(e) {
        e.preventDefault();
        var description  =  $("#description").val();
        var task_change =  $("#task-status").val();
        var task_assigned  = $("#task-assigned").val();
        var image          =  $("#image").val();
        var action_center_id = $("#action_center_id").val();
        var deadline = $("#deadline").val();
$.ajax({
        url : " ' . base_url('/Controlwork/UpdateAction/') . '",
        type: "POST",
        data: {
        description:description,
        task_change:task_change,
        task_assigned:task_assigned,
        image:image,
        action_center_id:action_center_id,
        deadline:deadline,
        },
        success: function(data){

        location.reload();
        }

        })
        })
        });
        </script>';
            }
        }
        return $rs;
    }

    public function assessment()
    {

        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }


        $data['pg_nm'] = "Assessment";
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $assessment = new Assessment();
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

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.id=43 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();

        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();

        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = $ok['role'];
        }
        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $sid = session()->supplier_info['supplier_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where (assigned_to =$sid  or owner_id='" . $o_id . "')and status=1 and (complete=0 or copy!=0) and step3_complete=1 group by supplier_uniq order by id desc")->getResultArray();
            $control_assessment_complete = $db->query("SELECT * from control_assessment where complete !=0  and owner_id='" . $o_id . "' and status=1 and num_show=1  group by supplier_uniq order by id desc")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];

            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete=0 and step3_complete=1 group by supplier_uniq order by id desc")->getResultArray();

            $control_assessment_complete = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete!=0 and copy=0 group by supplier_uniq order by id desc")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {

            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and (complete=0 or copy!=0) and ( assigned_to = $sid or supplier_id = $sid ) and step3_complete=1 group by supplier_uniq order by id desc")->getResultArray();
            $control_assessment_complete = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and complete!=0 and copy=0 and ( assigned_to = $sid or supplier_id = $sid ) group by supplier_uniq order by id desc ")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }
        $supplier_id = $supplier_model->where('id', $sid)->first()['supplier_paid'];
        if ($supplier_id == '1') {
            return redirect()->to('Controlwork/assessment_view_supplier');
        }

        $data['assessment'] = $assessment->findAll();
        $find = $db->query("SELECT * from control_assessment where status = 1 and num_show=0 and owner_id = $o_id")->getResultArray();
        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
        }


        $sppArr = [];


        if (session()->supplier_info['role'] == 0) {
            $assQue = $db->query("SELECT * FROM `control_assessment` WHERE (owner_id = $o_id) AND status=1 AND step3_complete=1 AND ass_que_count=1")->getResultArray();
            $query = $db->query("SELECT * FROM `control_assessment` WHERE owner_id = $o_id AND status=1 AND step3_complete=1")->getResultArray();
        } else {
            $assQue = $db->query("SELECT * FROM `control_assessment` WHERE (supplier_id = $sid) AND status=1 AND step3_complete=1 AND ass_que_count=1")->getResultArray();
            $query = $db->query("SELECT * FROM `control_assessment` WHERE supplier_id = $sid AND status=1 AND step3_complete=1")->getResultArray();
        }

        $queCount = $totalQue = 0;
        foreach ($assQue as $frq) {
            if ($frq['frequency'] == 'Monthly') {
                $queCount = 12;
            } else if ($frq['frequency'] == 'Quarterly') {
                $queCount = 4;
            } else if ($frq['frequency'] == 'Half yearly') {
                $queCount = 2;
            } else if ($frq['frequency'] == 'Yearly') {
                $queCount = 1;
            }
            $totalQue += $queCount;
        }
        $total_panding = $success = $g = 0;
        foreach ($query as $row) {

            $ok = $total_panding += number_format($row['complete'] / 2);
            if ($ok) {
                $find = new QualitativeTimelineAnswerModel();
                $need = $find->where('control_assessment_id', $row['id'])->where('status', 1)->findAll();
                foreach ($need as $nd)
                    if ($nd['percentile'] >= 50)
                        $success++;
            }

            if ($row['num_show'] == 1) $g += 1;
            else {
                if ($row['frequency'] == 'Monthly') {
                    $coms = $row['complete'];
                    if ($coms == 0) $g += 12;
                    else if ($coms == 1) $g += 11;
                    else if ($coms == 2) $g += 10;
                    else if ($coms == 3) $g += 9;
                    else if ($coms == 4) $g += 8;
                    else if ($coms == 5) $g += 7;
                    else if ($coms == 6) $g += 6;
                    else if ($coms == 7) $g += 5;
                    else if ($coms == 8) $g += 4;
                    else if ($coms == 9) $g += 3;
                    else if ($coms == 10) $g += 2;
                    else if ($coms == 11) $g += 1;
                } elseif ($row['frequency'] == 'Quarterly') {
                    $coms = $row['complete'];
                    if ($coms == 3) $g += 3;
                    else if ($coms == 6) $g += 2;
                    else if ($coms == 9) $g += 1;
                } elseif ($row['frequency'] == 'Half yearly') {
                    $g += 2;
                } elseif ($row['frequency'] == 'Yearly') {
                    $g += 1;
                }
            }
        }

        $data['total_assessment'] = $totalQue; //safal code
        $data['total_panding'] = $success;
        $data['success'] = $success;
        $successCount = 0;
        $failCount = 0;
        $caArr = [];
        foreach ($query as $qd) {
            $caArr[] = $qd['id'];
        }
        $passfailData =  $db->query("SELECT * FROM `qualitative_timeline_answer` WHERE status=1 ")->getResultArray();

        foreach ($passfailData as $pdDAta) {
            if (in_array($pdDAta['control_assessment_id'], $caArr)) {
                if ($pdDAta['passfail_status'] == 1) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }
        }

        $data['pfSuccess'] = $successCount;
        $data['pfFail'] = $failCount;
        $data['supplier'] = $supplier_model->findAll();
        $supplier_compare = $supplier_model->where('status!=0')->findAll();
        $indicator_model = new IndicatorModel();
        $noti = new UserNotification();

        $data['control_assessment_pen'] =  $db->query("SELECT supplier_uniq from control_assessment where owner_id='" . $o_id . "' and status=1 and (complete=0 or copy!=0) and step3_complete=1 and num_show =0 group by supplier_uniq")->getResultArray();

        foreach ($control_assessment_complete as $lk) {
            if (empty($data['control_assessment_pen'])) {
                foreach ($data['control_assessment_pen'] as $kl) {
                    if ($kl['supplier_uniq'] == $lk['supplier_uniq']) {
                        continue;
                    }
                }
                $control_assessment_penggg[] =  $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "' and status=1 and num_show=1 and supplier_uniq ='" . $lk['supplier_uniq'] . "' group by supplier_uniq")->getResultArray();
            } else {

                $control_assessment_penggg[] =  $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "' and status=1 and num_show=1 and supplier_uniq ='" . $lk['supplier_uniq'] . "' group by supplier_uniq")->getResultArray();
            }
        }
        $data['o_id'] = $o_id;

        $control_ass = new Control_assessment();
        $sumper = 0;
        foreach ($control_assessment_complete as $u) {
            $supp_spl = $u['supplier_uniq'];
            $spd = $control_ass->where('status', 1)->where('supplier_uniq', $u['supplier_uniq'])->groupBy('addsupplier_id')->findAll();
            $tot_sup = count($spd);
            $freq = $spd['frequency'];
            if ($u['frequency'] == 'Monthly') {
                $queCount = 12;
            } else if ($u['frequency'] == 'Quarterly') {
                $queCount = 4;
            } else if ($u['frequency'] == 'Half yearly') {
                $queCount = 2;
            } else if ($u['frequency'] == 'Yearly') {
                $queCount = 1;
            }
            $per = $control_ass->where('status', 1)->where('supplier_uniq', $u['supplier_uniq'])->findAll();
            foreach ($per as $l) {
                $sumper += $l['per_overall'];
            }
            $totacount = $sumper / ($tot_sup * $queCount * 100) * 100;
        }
        $data['control_assessment_complete'] = $control_assessment_complete;
        $model = new Control_assessment();
        $pending_notifyd = $model->where('owner_id', $o_id)->where('status', 1)->groupBy('supplier_uniq')->Orwhere('assigned_to', $sid)->where('status', 1)->groupBy('supplier_uniq')->findAll();
        foreach ($pending_notifyd as $key => $value)
            if (sizeof($model->where('supplier_uniq', $value['supplier_uniq'])->where('complete', 12)->groupBy('assigned_to', 'ASC')->findAll()) == sizeof($model->where('supplier_uniq', $value['supplier_uniq'])->groupBy('assigned_to')->findAll()))
                $data['final_data'][] = $value;
        foreach ($pending_notify as $key => $value) {
            $unqsql = $value['supplier_uniq'];
            $supData = $db->query("SELECT * FROM `control_assessment` WHERE ass_que_count=1 AND status=1 AND supplier_uniq='$unqsql' AND (assigned_to=$sid or supplier_id=$o_id or owner_id=$o_id)")->getResultArray();

            $supCount = count($supData);

            $supFreq = 1;
            $supFreqData = $supData[0]['frequency'];
            if ($supFreqData == "Monthly") {
                $supFreq = 12;
            } else if ($supFreqData == "Quarterly") {
                $supFreq = 4;
            } else if ($supFreqData == "Half yearly") {
                $supFreq = 2;
            } else if ($supFreqData == "Yearly") {
                $supFreq = 1;
            }





            $ansData = $db->query("SELECT * FROM `control_assessment` WHERE ass_que_count=0 AND status=1 AND supplier_uniq='$unqsql' AND (assigned_to=$sid or supplier_id=$o_id)")->getResultArray();
            $ansCount = count($ansData);

            $supTotalque = $supFreq * $supCount;
            $supProgressPer = ($ansCount / $supTotalque) * 100;
            $sppArr[$unqsql] = $supProgressPer;

            $g = [];
            $d_a = $control_ass->where('supplier_uniq', $value['supplier_uniq'])->where('status', 1)->findAll();
            foreach ($d_a as $key_1 => $value_1) {
                $a_id = $value_1['id'];
                $total_questions = $db->query("SELECT COUNT(alq.indicator_id) as total_Q from Qualitative_assessment_step as alq where alq.status=1 and alq.control_assessment_id = " . $value_1['id'] . "")->getResultArray()[0]['total_Q'];
                $answer_count = $db->query("SELECT COUNT(alq.indicator_id) as total_a from Qualitative_assessment_step as alq JOIN brand_qualitative_answer as bqa on alq.select_question_id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = " . $value_1['id'] . " and alq.status=1 and alq.control_assessment_id =$a_id")->getResultArray()[0]['total_a'];
                $g[] = ($answer_count / $total_questions) * 100;
            }

            $pending_notify[$key]['progress_bar'] = number_format(array_sum($g) / count($g), 2);




            foreach ($supplier_compare as $compare) {
                $indicator_show = '';
                if ((!$value['reminder_send']) && ($compare['id'] == $value['assigned_to'])) {
                    $today = date('d-m-Y', time());
                    $expiry_date = $value['due_date'];





                    $exp = date('d-m-Y', strtotime($expiry_date));

                    if ($today >= $exp) {


                        $indicators = json_decode($value['indicator']);
                        $item = $indicator_model->whereIn('id', $indicators)->findAll();
                        foreach ($item as $key => $val) {
                            if ($key == 0) {
                                $indicator_show .= $val['indicator_name'];
                            } else {
                                $indicator_show .= ', ' . $val['indicator_name'];
                            }
                        }
                        $msg = "Reminder: You have assigned task $indicator_show awaiting completion. Please take necessary action.";
                        $g = [
                            'owner_id' => $o_id,
                            'created_by' => $supplier_info['supplier_id'],
                            'msg' => $msg,
                            'link' => 'Controlwork/assessment',
                            'for_y' => $value['assigned_to']
                        ];
                        $noti->insert($g);
                        $db->query("UPDATE control_assessment SET reminder_send=1 WHERE id=" . $value['id']);
                        $t = time();
                        $time_date1 = date("d-m-Y H:i:s", $t);
                        $time_date2 = date("Y", $t);
                        $user_message = '';
                        $user_message .= '<html><body>';
                        $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $compare['supplier_name'] . ',</h3><p><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $compare['image'] . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p  style="margin-bottom:13px; margin-top:13px;">Reminder: You have assigned task ' . $indicator_show . ' awaiting completion. Please take necessary action.</p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
                        $user_message .= '</body></html>';
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.com', 'Assigned Task');
                        $email->setTo($compare['email']);
                        $email->setSubject('Task');
                        $email->setMessage($user_message);
                        $a = $email->send();
                    }
                }
            }
        }
        $data['control_assessment_pending'] = $pending_notify;
        $footprint_type_model = new FootprintTypeModel();
        $data['type'] = $footprint_type_model->where(['footprint_id' => 3, 'status' => 1])->findAll();
        $data['supProgressPer'] = $sppArr;

        echo view('brand/view-user-assessment', $data);
    }
    public function assessment_view_supplier()
    {

        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Assessment';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $assessment = new Assessment();
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

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();


        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = $ok['role'];
        }
        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $sid = session()->supplier_info['supplier_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where (assigned_to=$sid or owner_id='" . $o_id . "')and status=1 and (complete=0 or copy!=0) and step3_complete=1 ")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where complete !=0  and (assigned_to=$sid or owner_id='" . $o_id . "') and status=1 and copy=0 ")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];

            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete=0 and step3_complete=1 ")->getResultArray();

            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete!=0 and copy=0 ")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and (complete=0 or copy!=0) and ( assigned_to = $sid or supplier_id = $sid ) and step3_complete=1 ")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and complete!=0 and copy=0 and ( assigned_to = $sid or supplier_id = $sid ) ")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }
        $SupplierType = new SupplierType();
        $data['supplierType'] = $SupplierType->where('status', 1)->findAll();
        $data['supplier_industry'] = $SupplierType->select('supplier_type.id as id,industry.industry_name as industry_name')->join('industry', 'industry.id=supplier_type.supplier_industry')->where('supplier_type.status', 1)->findAll();
        $data['assessment'] = $assessment->findAll();
        $find = $db->query("SELECT * from control_assessment where status = 1 and num_show=0 and (assigned_to=$sid or owner_id = $o_id)")->getResultArray();
        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
        }

        $ass_model = new Control_assessment();
        $query = $db->query("SELECT * FROM `control_assessment` WHERE (assigned_to=$sid or owner_id='" . $o_id . "') AND status=1 AND step3_complete=1 ")->getResultArray();
        $assQue = $db->query("SELECT * FROM `control_assessment` WHERE (assigned_to=$sid or owner_id='" . $o_id . "') AND status=1 AND step3_complete=1 AND ass_que_count=1 ")->getResultArray();
        $queCount = $totalQue = 0;
        foreach ($assQue as $frq) {
            if ($frq['frequency'] == 'Monthly') {
                $queCount = 12;
            } else if ($frq['frequency'] == 'Quarterly') {
                $queCount = 4;
            } else if ($frq['frequency'] == 'Half yearly') {
                $queCount = 2;
            } else if ($frq['frequency'] == 'Yearly') {
                $queCount = 1;
            }
            $totalQue += $queCount;
        }
        $total_panding = $success = $g = 0;
        foreach ($query as $row) {

            $ok = $total_panding += number_format($row['complete'] / 2);
            if ($ok) {
                $find = new QualitativeTimelineAnswerModel();
                $need = $find->where('control_assessment_id', $row['id'])->where('status', 1)->findAll();
                foreach ($need as $nd)
                    if ($nd['percentile'] >= 50)
                        $success++;
            }

            if ($row['num_show'] == 1) $g += 1;
            else {
                if ($row['frequency'] == 'Monthly') {
                    $coms = $row['complete'];
                    if ($coms == 0) $g += 12;
                    else if ($coms == 1) $g += 11;
                    else if ($coms == 2) $g += 10;
                    else if ($coms == 3) $g += 9;
                    else if ($coms == 4) $g += 8;
                    else if ($coms == 5) $g += 7;
                    else if ($coms == 6) $g += 6;
                    else if ($coms == 7) $g += 5;
                    else if ($coms == 8) $g += 4;
                    else if ($coms == 9) $g += 3;
                    else if ($coms == 10) $g += 2;
                    else if ($coms == 11) $g += 1;
                } elseif ($row['frequency'] == 'Quarterly') {
                    $coms = $row['complete'];
                    if ($coms == 3) $g += 3;
                    else if ($coms == 6) $g += 2;
                    else if ($coms == 9) $g += 1;
                } elseif ($row['frequency'] == 'Half yearly') {
                    $g += 2;
                } elseif ($row['frequency'] == 'Yearly') {
                    $g += 1;
                }
            }
        }

        $data['total_assessment'] = $totalQue; //safal code
        $data['total_panding'] = $success;
        $data['success'] = $success;

        $successCount = 0;
        $failCount = 0;
        $caArr = [];
        foreach ($query as $qd) {
            $caArr[] = $qd['id'];
        }
        $passfailData =  $db->query("SELECT * FROM `qualitative_timeline_answer` WHERE status=1")->getResultArray();
        foreach ($passfailData as $pdDAta) {
            if (in_array($pdDAta['control_assessment_id'], $caArr)) {
                if ($pdDAta['passfail_status'] == 1) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }
        }
        $data['pfSuccess'] = $successCount;
        $data['pfFail'] = $failCount;




        $data['supplier'] = $supplier_model->findAll();
        $supplier_compare = $supplier_model->where('status!=0')->findAll();
        $indicator_model = new IndicatorModel();
        $noti = new UserNotification();
        foreach ($pending_notify as $key => $value) {
            $a_id = $value['id'];
            $total_questions = $db->query("SELECT COUNT(alq.indicator_id) as total_Q from Qualitative_assessment_step as alq where alq.status=1 and alq.control_assessment_id = $a_id")->getResultArray()[0]['total_Q'];
            $answer_count = $db->query("SELECT COUNT(alq.indicator_id) as total_a from Qualitative_assessment_step as alq JOIN brand_qualitative_answer as bqa on alq.select_question_id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = $a_id  AND alq.status=1 and alq.control_assessment_id =$a_id")->getResultArray()[0]['total_a'];
            $pending_notify[$key]['progress_bar'] = number_format(($answer_count / $total_questions) * 100, 2);



            foreach ($supplier_compare as $compare) {
                $indicator_show = '';
                if ((!$value['reminder_send']) && ($compare['id'] == $value['assigned_to'])) {

                    $today = date('d-m-Y', time());
                    $expiry_date = $value['due_date'];
                    $exp = date('d-m-Y', strtotime($expiry_date));

                    if ($today >= $exp) {


                        $indicators = json_decode($value['indicator']);
                        $item = $indicator_model->whereIn('id', $indicators)->findAll();
                        foreach ($item as $key => $val) {
                            if ($key == 0) {
                                $indicator_show .= $val['indicator_name'];
                            } else {
                                $indicator_show .= ', ' . $val['indicator_name'];
                            }
                        }
                        $msg = "Reminder: You have assigned task $indicator_show awaiting completion. Please take necessary action.";
                        $g = [
                            'owner_id' => $o_id,
                            'created_by' => $supplier_info['supplier_id'],
                            'msg' => $msg,
                            'link' => 'Controlwork/assessment',
                            'for_y' => $value['assigned_to']
                        ];
                        $noti->insert($g);
                        $db->query("UPDATE control_assessment SET reminder_send=1 WHERE id=" . $value['id']);
                        $t = time();
                        $time_date1 = date("d-m-Y H:i:s", $t);
                        $time_date2 = date("Y", $t);
                        $user_message = '';
                        $user_message .= '<html><body>';
                        $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $compare['supplier_name'] . ',</h3><p><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $compare['image'] . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p  style="margin-bottom:13px; margin-top:13px;">Reminder: You have assigned task ' . $indicator_show . ' awaiting completion. Please take necessary action.</p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
                        $user_message .= '</body></html>';
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.com', 'Assigned Task');
                        $email->setTo($compare['email']);
                        $email->setSubject('Task');
                        $email->setMessage($user_message);
                        $a = $email->send();
                    }
                }
            }
        }
        $data['control_assessment_pending'] = $pending_notify;
        $data['supplier_permission'] = '1';

        $data['can_view'] = 1;
        $data['can_delete'] = 0;
        if (
            $sid == $pending_notify[0]['supplier_id']
        ) {
            $data['can_delete'] = 1;
            $data['can_view'] = 0;
        } elseif ($sid == $pending_notify[0]['owner_id']) {
            $data['can_delete'] = 1;
            $data['can_view'] = 0;
        }
        echo view('brand/assessment-view', $data);
    }

    public function assessment_view($id)
    {

        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Assessment';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $assessment = new Assessment();
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

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();


        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();
        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = $ok['role'];
        }
        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();
        $supplier_uniq = $db->query("SELECT * from control_assessment where id='" . $id . "'and status=1 ")->getResultArray()[0]['supplier_uniq'];
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $sid = session()->supplier_info['supplier_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where (assigned_to=$sid or owner_id='" . $o_id . "')and status=1 and (complete=0 or copy!=0) and step3_complete=1 and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where complete !=0  and (assigned_to=$sid or owner_id='" . $o_id . "') and status=1 and copy=0 and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } elseif (session()->supplier_info['role'] == 10) {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];

            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete=0 and step3_complete=1 and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();

            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1 and complete!=0 and copy=0 and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();
            $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
            $data['control_assessment_pending'] = $pending_notify = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and (complete=0 or copy!=0) and ( assigned_to = $sid or supplier_id = $sid ) and step3_complete=1 and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();
            $data['control_assessment_complete'] = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'   and status=1 and complete!=0 and copy=0 and ( assigned_to = $sid or supplier_id = $sid ) and supplier_uniq='" . $supplier_uniq . "'")->getResultArray();
            if (session()->supplier_info['role'] == 11) {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and role = 12 Or role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            } else {
                $query = $db->query("SELECT * FROM supplier where owner_id = $o_id and  role = 13 and status=1 ");
                $data['employee_details'] = $query->getResultArray();
            }
        }
        $SupplierType = new SupplierType();
        $data['supplierType'] = $SupplierType->where('status', 1)->findAll();
        $data['supplier_industry'] = $SupplierType->select('supplier_type.id as id,industry.industry_name as industry_name')->join('industry', 'industry.id=supplier_type.supplier_industry')->where('supplier_type.status', 1)->findAll();


        // print_r($data['supplier_industry']);
        // die;
        $data['assessment'] = $assessment->findAll();
        $find = $db->query("SELECT * from control_assessment where status = 1 and num_show=0 and (assigned_to=$sid or owner_id = $o_id)")->getResultArray();
        foreach ($find as $key => $row) {
            if ($row['frequency'] == "Yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day >= 365) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 years'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 years'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Half yearly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 182) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 6 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 6 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Quarterly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 90) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 3 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 3 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
            if ($row['frequency'] == "Monthly") {
                $time = $row['start_date'];
                $diff = strtotime($time) - strtotime(date("Y-m-d"));
                $day =  abs(round($diff / 86400));
                if ($day > 30) {
                    if ($row['complete'] % 2 != 0) {
                        $f_id = $row['id'];
                        $s_date = $row['start_date'];
                        $d_date = $row['due_date'];
                        $new_s_date = date('Y-m-d', strtotime($s_date . ' + 1 months'));
                        $new_d_date = date('Y-m-d', strtotime($d_date . ' + 1 months'));
                        $com = $row['complete'];
                        $complete = $com + 1;
                        $update = $db->query("UPDATE control_assessment SET complete = $complete , start_date = '" . $new_s_date . "' , due_date = '" . $new_d_date . "' where status = 1 and id = $f_id");
                    }
                }
            }
        }

        $ass_model = new Control_assessment();
        $uniq_ids = $ass_model->select('supplier_uniq as uniq')->where('id', $id)->first()['uniq'];
        $query = $db->query("SELECT * FROM `control_assessment` WHERE (assigned_to=$sid or owner_id='" . $o_id . "') AND status=1 AND step3_complete=1 AND supplier_uniq='$uniq_ids'")->getResultArray();
        $assQue = $db->query("SELECT * FROM `control_assessment` WHERE (assigned_to=$sid or owner_id='" . $o_id . "') AND status=1 AND step3_complete=1 AND ass_que_count=1 AND supplier_uniq='$uniq_ids'")->getResultArray();
        $queCount = $totalQue = 0;
        foreach ($assQue as $frq) {
            if ($frq['frequency'] == 'Monthly') {
                $queCount = 12;
            } else if ($frq['frequency'] == 'Quarterly') {
                $queCount = 4;
            } else if ($frq['frequency'] == 'Half yearly') {
                $queCount = 2;
            } else if ($frq['frequency'] == 'Yearly') {
                $queCount = 1;
            }
            $totalQue += $queCount;
        }
        $total_panding = $success = $g = 0;
        foreach ($query as $row) {

            $ok = $total_panding += number_format($row['complete'] / 2);
            if ($ok) {
                $find = new QualitativeTimelineAnswerModel();
                $need = $find->where('control_assessment_id', $row['id'])->where('status', 1)->findAll();
                foreach ($need as $nd)
                    if ($nd['percentile'] >= 50)
                        $success++;
            }

            if ($row['num_show'] == 1) $g += 1;
            else {
                if ($row['frequency'] == 'Monthly') {
                    $coms = $row['complete'];
                    if ($coms == 0) $g += 12;
                    else if ($coms == 1) $g += 11;
                    else if ($coms == 2) $g += 10;
                    else if ($coms == 3) $g += 9;
                    else if ($coms == 4) $g += 8;
                    else if ($coms == 5) $g += 7;
                    else if ($coms == 6) $g += 6;
                    else if ($coms == 7) $g += 5;
                    else if ($coms == 8) $g += 4;
                    else if ($coms == 9) $g += 3;
                    else if ($coms == 10) $g += 2;
                    else if ($coms == 11) $g += 1;
                } elseif ($row['frequency'] == 'Quarterly') {
                    $coms = $row['complete'];
                    if ($coms == 3) $g += 3;
                    else if ($coms == 6) $g += 2;
                    else if ($coms == 9) $g += 1;
                } elseif ($row['frequency'] == 'Half yearly') {
                    $g += 2;
                } elseif ($row['frequency'] == 'Yearly') {
                    $g += 1;
                }
            }
        }

        $data['total_assessment'] = $totalQue; //safal code
        $data['total_panding'] = $success;
        $data['success'] = $success;

        $successCount = 0;
        $failCount = 0;
        $caArr = [];
        foreach ($query as $qd) {
            $caArr[] = $qd['id'];
        }
        $passfailData =  $db->query("SELECT * FROM `qualitative_timeline_answer` WHERE status=1")->getResultArray();
        foreach ($passfailData as $pdDAta) {
            if (in_array($pdDAta['control_assessment_id'], $caArr)) {
                if ($pdDAta['passfail_status'] == 1) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }
        }
        $data['pfSuccess'] = $successCount;
        $data['pfFail'] = $failCount;




        $data['supplier'] = $supplier_model->findAll();
        $supplier_compare = $supplier_model->where('status!=0')->findAll();
        $indicator_model = new IndicatorModel();
        $noti = new UserNotification();
        foreach ($pending_notify as $key => $value) {
            $a_id = $value['id'];
            $total_questions = $db->query("SELECT COUNT(alq.indicator_id) as total_Q from Qualitative_assessment_step as alq where alq.status=1 and alq.control_assessment_id = $a_id")->getResultArray()[0]['total_Q'];
            $answer_count = $db->query("SELECT COUNT(alq.indicator_id) as total_a from Qualitative_assessment_step as alq JOIN brand_qualitative_answer as bqa on alq.select_question_id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = $a_id  AND alq.status=1 and alq.control_assessment_id =$a_id")->getResultArray()[0]['total_a'];
            $pending_notify[$key]['progress_bar'] = number_format(($answer_count / $total_questions) * 100, 2);


            foreach ($supplier_compare as $compare) {
                $indicator_show = '';
                if ((!$value['reminder_send']) && ($compare['id'] == $value['assigned_to'])) {

                    $today = date('d-m-Y', time());
                    $expiry_date = $value['due_date'];
                    $exp = date('d-m-Y', strtotime($expiry_date));

                    if ($today >= $exp) {


                        $indicators = json_decode($value['indicator']);
                        $item = $indicator_model->whereIn('id', $indicators)->findAll();
                        foreach ($item as $key => $val) {
                            if ($key == 0) {
                                $indicator_show .= $val['indicator_name'];
                            } else {
                                $indicator_show .= ', ' . $val['indicator_name'];
                            }
                        }
                        $msg = "Reminder: You have assigned task $indicator_show awaiting completion. Please take necessary action.";
                        $g = [
                            'owner_id' => $o_id,
                            'created_by' => $supplier_info['supplier_id'],
                            'msg' => $msg,
                            'link' => 'Controlwork/assessment',
                            'for_y' => $value['assigned_to']
                        ];
                        $noti->insert($g);
                        $db->query("UPDATE control_assessment SET reminder_send=1 WHERE id=" . $value['id']);
                        $t = time();
                        $time_date1 = date("d-m-Y H:i:s", $t);
                        $time_date2 = date("Y", $t);
                        $user_message = '';
                        $user_message .= '<html><body>';
                        $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $compare['supplier_name'] . ',</h3><p><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $compare['image'] . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p  style="margin-bottom:13px; margin-top:13px;">Reminder: You have assigned task ' . $indicator_show . ' awaiting completion. Please take necessary action.</p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
                        $user_message .= '</body></html>';
                        $email = \Config\Services::email();
                        $email->setFrom('info@positiivplus.com', 'Assigned Task');
                        $email->setTo($compare['email']);
                        $email->setSubject('Task');
                        $email->setMessage($user_message);
                        $a = $email->send();
                    }
                }
            }
        }
        $data['control_assessment_pending'] = $pending_notify;
        $footprint_type_model = new FootprintTypeModel();
        $data['type'] = $footprint_type_model->where(['footprint_id' => 3, 'status' => 1])->findAll();
        $supplier = new SupplierModel();
        $control_assessment = new Control_assessment();
        $where = ['status' => 1, 'num_show!=' => 0, 'supplier_uniq' => $supplier_uniq];
        $g = $control_assessment->where($where)->orderby('assigned_to')->findAll();
        $u_id = $session->supplier_info['supplier_id'];
        $gaa = $arr_g = array();
        $avarage = 0;
        $ab = null;
        $sizea = sizeof($g);
        foreach ($g as $ac => $value) {
            $percentile = 0;
            $gg = json_decode($value['weightage_per']);
            foreach ($gg as $keys => $weitage) {
                $total_mark = $marka = [];
                $query_total_Marks = $db->query("SELECT bqa.answer AS submited_array , bqa.indicator_id AS indicator ,amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=2 and aaq.status = 1 AND bqa.control_assesment_id= " . $value['id'] . " AND bqa.indicator_id= $keys ")->getResultArray();
                foreach ($query_total_Marks as $first => $firsts) {
                    $submited_answer = json_decode($firsts['submited_array']);
                    $marks_array = json_decode($firsts['marks_aray']);
                    $answer_array = $firsts['answer_array'];
                    $choice = $firsts['choice'];
                    if (($choice == 'Single' && $answer_array == 'Text') || $answer_array == "Date and Time" || $answer_array == "Media upload" || $answer_array == "Numbers") {
                        $total_mark[] = 1;
                        continue;
                    } else if ($choice == 'Single') $b = array($answer_array);
                    else $b = json_decode($answer_array);

                    if (is_array($submited_answer)) {
                        $sybmited_answer = $submited_answer;
                        foreach ($b as $key => $ans_arry) if (in_array($ans_arry, $sybmited_answer)) {
                            $r = count($sybmited_answer);
                            $marka[] = $marks_array[$key];
                        }

                        $sybmited_answer = [];
                        $total_mark[] = array_sum($marka) / $r;
                    } else {
                        $sybmited_answerH = [$submited_answer];
                        foreach ($b as $key => $ans_arry) if (in_array($ans_arry, $sybmited_answerH)) {
                            $r = count($sybmited_answerH);
                            $total_mark[] = $marks_array[$key] / $r;
                            $sybmited_answerH = [];
                        }
                    }
                }
                $divider = sizeof($query_total_Marks);
                if ($divider) $percentile += (array_sum($total_mark) / $divider) * $weitage;
            }


            $ab = $value['assigned_to'];
            $arr_g[] = $percentile;
            if (
                $ac == ($sizea - 1) || $ab != $g[($ac + 1)]['assigned_to']
            ) {
                $avarage += $per_sum = array_sum($arr_g) / sizeof($arr_g);
                $gaa[] = [$supplier->select('brand_name')->where('id', $ab)->first()['brand_name'], $per_sum];
                $arr_g = array();
            }
        }
        if (!empty($gaa)) {
            usort(
                $gaa,
                fn ($a, $b) => $b['1'] <=> $a['1']
            );
            $data['gaa'] = $gaa;
            $data['avarage'] = number_format($avarage / sizeof($gaa), 2);
            $data['g_siz'] = sizeof($gaa);
        }
        $data['can_view'] = 1;
        $data['can_delete'] = 0;
        if (
            $sid == $pending_notify[0]['supplier_id']
        ) {
            $data['can_delete'] = 1;
            $data['can_view'] = 0;
        } elseif ($sid == $pending_notify[0]['owner_id']) {
            $data['can_delete'] = 1;
            $data['can_view'] = 0;
        }
        echo view('brand/assessment-view', $data);
    }

    public function delete_assessment()
    {
        $model = new Control_assessment();
        $deletes = $model->where('supplier_uniq', $model->select('supplier_uniq')->where('id', $this->request->getPost('del_assessment'))->first()['supplier_uniq'])->findAll();
        foreach ($deletes as $value) $model->update($value['id'], ['status' => 0]);

        return redirect()->back();
    }

    public function start_assessment($a_id, $main_id)
    {

        $rs = check_session();

        if (!$rs) {

            return redirect()->to('home/user_login');
        }


        $data['pg_nm'] = 'Assessment';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $supplier_module_model = new SupplierModuleModel();
        $supplier_module_item_model = new SupplierModuleItemModel();
        $answer = new BrandQualitativeAnswerModel();
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

        $data['indicator_category'] = $db->query("SELECT * from indicator_category where status = 1")->getResultArray();
        $data['indicator'] = $db->query("SELECT * from indicator where status = 1")->getResultArray();
        $data['total_Ans'] = '1';
        $assess = new Assessment();
        $data['assessment'] = $assess->where('id', $a_id)->first();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }

        $Qualitative_assessment_step =  new Qualitative_assessment_step();
        $site_id = '30';

        $data['a_q'] = $Qualitative_assessment_step->where('status', 1)->where('control_assessment_id', $main_id)->findAll();
        $data['total_Q'] = count($data['a_q']);



        $data['start_assessment'] = $db->query("SELECT COUNT(alq.indicator_id) as total_Q,alq.* from Qualitative_assessment_step as alq where alq.status=1 and alq.control_assessment_id = $a_id  GROUP BY indicator_id ")->getResultArray();
        usort($data['start_assessment'], fn ($a, $b) => $a['indicator_id'] <=> $b['indicator_id']);
        // print_r($data['start_assessment']);
        // die;
        $data['answer_t'] = $answer->where('owner_id', $o_id)->where('status', 1)->findAll();
        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `Qualitative_assessment_step` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.select_question_id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND  aaq.control_assessment_id=$main_id")->getResultArray();
        $data['total_A'] = $query_total_A[0]['total_A'];
        $data['mandatory'] = $db->query("SELECT COUNT(*) as total_m FROM `all_assessment_question` WHERE all_assessment_id =$a_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand'] = $data['mandatory'][0]['total_m'];
        $data['ans_mand'] = $db->query("SELECT COUNT(*) as total_m_a FROM `all_assessment_question` as a JOIN `brand_qualitative_answer` as b on a.id=b.question_id WHERE  a.all_assessment_id =$a_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand_ans'] = $data['ans_mand'][0]['total_m_a'];
        $data['id'] = $main_id;

        $data['answer_count'] = $db->query("SELECT COUNT(alq.indicator_id) as total_a, bqa.indicator_id from Qualitative_assessment_step as alq JOIN brand_qualitative_answer as bqa on alq.select_question_id=bqa.question_id where bqa.status=1 and bqa.control_assesment_id = $main_id and  alq.status=1 and alq.control_assessment_id = $a_id GROUP BY indicator_id")->getResultArray();

        $total_mark = [];
        $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id= $main_id ")->getResultArray();

        foreach ($query_total_Marks as $first => $firsts) {
            $submited_answer = json_decode($firsts['submited_array']);
            $marks_array = json_decode($firsts['marks_aray']);
            $answer_array = $firsts['answer_array'];
            $choice = $firsts['choice'];
            if ($choice == 'Single') {
                $b = array($answer_array);
            } else {
                $b = json_decode($answer_array);
            }


            if (is_array($submited_answer) == 1) {
                $sybmited_answer = $submited_answer;

                foreach ($b as $key => $ans_arry) {
                    if (in_array($ans_arry, $sybmited_answer)) {
                        $r = count($sybmited_answer);
                        $marka[]  = $marks_array[$key];
                        $sybmited_answer = [];
                    }
                }
                $divide = array_sum($marka) / $r;
                array_push($total_mark, $divide);
            } else {


                $sybmited_answerH[] = $submited_answer;
                foreach ($b as $key => $ans_arry) {

                    if (in_array($ans_arry, $sybmited_answerH)) {
                        $r = count($sybmited_answerH);
                        array_push($total_mark, ($marks_array[$key] / $r));
                        $sybmited_answerH = [];
                    }
                }
            }
        }


        $totalsubmited = count($data['a_q']);



        if ($totalsubmited == 0) {
            $totalsubmited = 1;
        }

        $percentile1 = ($data['total_A'] / $totalsubmited) * 100;
        $percentile = number_format(($percentile1), 2);

        $data['percentile1'] = $percentile;

        echo view('brand/start-assessmet', $data);
    }

    public function annotation_image()
    {
        $annotation = $this->request->getVar('file');
        $path = $annotation;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($path);

        $signatureFileName = uniqid() . '.png';
        $signature = str_replace('data:image/png;base64,', '', $base64);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = 'public/annotation/' . $signatureFileName;
        $vv = file_put_contents($file, $data);
        $id = 230;

        $inser = new BrandQualitativeAnswerModel();
        $data = [
            'annotation_image' => $signatureFileName,
        ];
        $inser->update($id, $data);
        return redirect()->back();
    }
    public function sign()
    {
        $y = $this->request->getVar('y');
        $signatureFileName = uniqid() . '.png';
        $signature = str_replace('data:image/png;base64,', '', $y);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = 'public/sign/' . $signatureFileName;
        $vv = file_put_contents($file, $data);

        $id = 230;

        $session = session();

        $inser = new BrandQualitativeAnswerModel();
        $data = [
            'signature' => $signatureFileName,
        ];
        $yyyyy =  $inser->update($id, $data);
        if ($yyyyy) {
            $session->setFlashdata('success', 'signature successfully insert');
        } else {
            $session->setFlashdata('error', ' signature not Save');
        }
        return redirect()->back();
    }

    public function footprints()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }

        $data['pg_nm'] = 'Footprints';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
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

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();

        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();


        echo view('brand/view-user-footprints', $data);
    }
    public function start_footprint()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
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
        echo view('brand/start-footprint', $data);
    }
    public function footprint_report()
    {
        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
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
        echo view('brand/footprint-report', $data);
    }

    public function assessment_report($com, $roit)
    {



        $rs = check_session();
        if (!$rs) {
            return redirect()->to('home/user_login');
        }
        $data['pg_nm'] = 'Footprints ';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $s_id = $supplier_info['supplier_id'];
        $data['s_name'] = $supplier_info['supplier_name'];
        $answer = new BrandQualitativeAnswerModel();

        $supplier_model = new SupplierModel();
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
        $data['com'] = $com;
        $Qualitative_assessment_step =  new Qualitative_assessment_step();
        $site_id = '30';
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }


        $control_assessment = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.id=$roit")->getResultArray();
        $weitage_per = json_decode($control_assessment[0]['weightage_per']);
        $data['a_q'] = $Qualitative_assessment_step->where('status', 1)->where('control_assessment_id', $roit)->findAll();
        $data['total_Q'] = count($data['a_q']);
        $indi_Environment =  $indi_Social =  $indi_Governance = 0;

        $percentile  = 0;
        $counter = 0;

        foreach ($weitage_per as $keys => $weitage) {

            $counter++;



            $total_mark = $marka = [];
            $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array ,  bqa.indicator_id AS indicator ,amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=2 and aaq.status = 1 AND bqa.control_assesment_id= $roit AND bqa.indicator_id= $keys ")->getResultArray();
            foreach ($query_total_Marks as $first => $firsts) {
                $submited_answer = json_decode($firsts['submited_array']);
                $marks_array = json_decode($firsts['marks_aray']);
                $answer_array = $firsts['answer_array'];
                $choice = $firsts['choice'];
                if (($choice == 'Single' && $answer_array == 'Text') || $answer_array == "Date and Time" || $answer_array == "Media upload" || $answer_array == "Numbers") {
                    $total_mark[] = 1;
                    continue;
                } else if ($choice == 'Single') $b = array($answer_array);

                else $b = json_decode($answer_array);

                if (is_array($submited_answer)) {
                    $sybmited_answer = $submited_answer;
                    foreach ($b as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answer)) {
                            $r = count($sybmited_answer);
                            $marka[]  = $marks_array[$key];
                        }
                    }
                    $sybmited_answer = [];
                    $total_mark[] = array_sum($marka) / $r;
                } else {
                    $sybmited_answerH = [$submited_answer];
                    foreach ($b as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answerH)) {
                            $r = count($sybmited_answerH);
                            $total_mark[] = $marks_array[$key] / $r;
                            $sybmited_answerH = [];
                        }
                    }
                }
            }

            $percentile += $test = (array_sum($total_mark) / sizeof($query_total_Marks)) * $weitage;
            $test = number_format($test, 2);
            if ($keys == 8) {
                $indi_Environment = $test;
            } else if ($keys == 9) {
                $indi_Social = $test;
            } else if ($keys == 11) {
                $indi_Governance = $test;
            }
        }
        $total_count = $counter;
        $data['graph_val'] = ["Environment" => $indi_Environment / $total_count, "Social" => $indi_Social / $total_count, "Governance" => $indi_Governance / $total_count,];
        $data['percentile1'] = $percentile;
        $data['individual'] = ["indi_Environment" => $indi_Environment, "indi_Social" => $indi_Social, "indi_Governance" => $indi_Governance,];



        $data['control_assessment'] = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.id=$roit")->getResultArray();

        $insert = new BrandQualitativeAnswerModel();




        $data['assessmentreport_data'] = $insert->where('control_assesment_id', $roit)->orderby('indicator_id')->findAll();

        $question_total = $insert->where('control_assesment_id', $roit)->where('status', 2)->findAll();
        $data['Total_ques']   = count($question_total);
        $db = \Config\Database::connect();
        $data['iv'] = $insert->select('*')

            ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id')
            ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('action_center.status', !0)->findAll();
        $data['yyyyy'] = $insert->select('action_center.title')

            ->join('action_center', 'action_center.question_id = brand_qualitative_answer.question_id')
            ->where('brand_qualitative_answer.control_assesment_id', $roit)->where('brand_qualitative_answer.supplier_id', $s_id)->where('action_center.status', !0)->countAllResults();

        $data['rohit'] = $db->query("SELECT ed.* FROM `all_assessment_question` as ed  where ed.status=1")->getResultArray();

        $data['control_ass'] = $contrrlid = $db->query("SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = $roit")->getResultArray();
        $data['indica'] =  $db->query("SELECT ed.* FROM `indicator` as ed  where ed.status=1")->getResultArray();
        $data['action'] =  $db->query("SELECT ed.* FROM `action_center` as ed ")->getResultArray();
        $boundaryid =   $contrrlid[0]['boundary'];
        $sub_boundaryid =  $contrrlid[0]['sub_boundary'];
        $assign =  $contrrlid[0]['assigned_to'];
        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $boundary_item = $query->getResultArray();
        if ($boundaryid == '30') {
            $data['assessm'] = $db->query("SELECT * FROM  supplier_assessment where is_submit=1 AND assessment_id=12")->getResultArray();
            $data['boundryname'] = 'Site';
        } elseif ($boundaryid == '31') {
            $data['assessm'] = $db->query("SELECT * FROM  supplier_assessment where is_submit=1 AND assessment_id=11")->getResultArray();
            $data['boundryname'] = 'Products';
        } elseif ($boundaryid == '43') {
            $data['assessm1'] = $db->query("SELECT * FROM  footprint_type  where status=1")->getResultArray();
            $ssd = $db->query("SELECT * FROM  supplier  where id=$assign")->getResultArray();
            $k = $ssd[0]['email'];
            $data['loction'] = $db->query("SELECT * FROM supplier_type where status=1 AND email='$k'")->getResultArray();


            $data['boundryname'] = 'Supplier';
        } else {
            $data['assessm12'] = [];
        }

        $data['lll'] =  $db->query("SELECT * FROM `all_master_assessment_answer` where status=1 AND id=56")->getResultArray();
        $data['ind'] = $db->query("SELECT * FROM  indicator where status=1")->getResultArray();
        $v = new ActionCenterModel();
        $data['actio'] = $v->where('owner_id', $s_id)->where('assign_from', 'Qualitative')->countAllResults();
        $assess = new Assessment();
        $data['assessment'] = $assess->where('status', 1)->findAll();

        $data['id'] = $roit;
        $supplier = new SupplierModel();
        $data['inspected'] = $supplier->findAll();
        $SupplierType = new SupplierType();
        $user_email = $supplier_info['email'];


        $typeid = $data['control_ass'][0]['addsupplier_id'];
        $supplier_email = $SupplierType->where('id', $typeid)->first()['email'];
        if ($supplier_email == $user_email) {
            $data['nextbtn'] = '1';
        } else {
            $data['nextbtn'] = '0';
        }

        echo view('brand/assessment-report', $data);
    }


    public function Step3_complate($id)
    {
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');


        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }

        $weightagePer = json_encode($this->request->getVar('weightagePer'));
        $failedVal = $this->request->getVar('failedVal');

        $query = $db->query("select * from control_assessment where id='" . $id . "' and status=1");
        $control_assessment1 = $query->getResultArray();
        $createdUnId = $control_assessment1[0]['supplier_uniq'];


        $query2 = $db->query("select * from control_assessment where supplier_uniq='" . $createdUnId . "' and status=1");
        $control_assessment11 = $query2->getResultArray();

        foreach ($control_assessment11 as $control_ass) {
            $kk = $control_ass['id'];
            $control_assessment = $db->query("UPDATE control_assessment set supplier_id = " . $supplier_info['supplier_id'] . ", step3_complete = '" . '1' . "', weightage_per = '" . $weightagePer . "', failed_per = '" . $failedVal . "', ass_que_count = '" . '1' . "',
        owner_id = '" . $o_id . "' WHERE id = $kk ");
        }
        if ($control_assessment) {
            $response = ['success' => 1];
            return $this->response->setJSON($response);
        }
    }

    public function cardcourses()
    {
        $db = \Config\Database::connect();
        $data = $this->helperData;
        $session = session();
        $data['title'] = 'Module Courses Management';
        $query = $db->query("SELECT tc.courses_name,tcm.modulename,tcm.* FROM `training-courses-module` as tcm join `training-courses` as tc on tcm.course=tc.id  where tcm.status=1 ");
        $data['coursemodulelist'] = $query->getResultArray();
        $query = $db->query("SELECT tcm.* FROM `training-courses-module` as tcm  where tcm.status=1 ");
        $data['coursemodulelist'] = $query->getResultArray();

        echo view('admin/training-courses-card', $data);
    }

    public function getsubboundaryByBoundary($boundary)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $data = '<option value="0">Select Site</option>';
        if ($boundary == 30) {

            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=12 and is_submit=1");
            $indicator = $query->getResultArray();
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '/30">' . $indi['cp_name'] . '</option>';
                }
            }
        }
        if ($boundary == 31) {
            $query = $db->query("select id,cp_name from supplier_assessment where supplier_id='" . $supplier_info['supplier_id'] . "' and assessment_id=11 and is_submit=1");
            $indicator = $query->getResultArray();
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '/31">' . $indi['cp_name'] . '</option>';
                }
            }
        }
        if ($boundary == 43) {
            $query = $db->query("select id,name from supplier_type where supplier_id='" . $supplier_info['supplier_id'] . "' and status=1");
            $indicator = $query->getResultArray();
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '/43">' . $indi['name'] . '</option>';
                }
            }
        }

        echo $data;
    }

    public function UpdateAction()
    {

        $db = \Config\Database::connect();

        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $file = $this->request->getFile('image');
        $assigned_too = $this->request->getVar("task_assigned");
        $assigned_to = json_encode($assigned_too);
        $task_status = $this->request->getVar("task_change");
        $titleAdd = $this->request->getVar("TitleAdd");
        $comment = $this->request->getVar("description");
        $action_center_id = $this->request->getVar("action_center_id");
        $deadline = $this->request->getVar("deadline");
        $assigne_to = '["0000"]';
        $boundary = $this->request->getVar("boundary");
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        } elseif (session()->supplier_info['role'] == 10) {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "A task assign you go and check timeline update";
            $for = $assigned_to;
        }

        if ($assigned_to == 'null') {
            $add_timeline = $db->query("insert into timeline_action_center(supplier_id,TitleAdd,description,status,assigned,action_center_id,deadline,owner_id)
        values(" . $supplier_info['supplier_id'] . ",'" . $titleAdd . "','" . $comment . "','" . $task_status . "','" . $assigne_to . "','" . $action_center_id . "','" . $deadline . "','" . $o_id . "')");
        } else {
            $add_timelin = $db->query("insert into timeline_action_center(supplier_id,TitleAdd,description,status,assigned,action_center_id,deadline,owner_id)
        values(" . $supplier_info['supplier_id'] . ",'" . $titleAdd . "','" . $comment . "','" . $task_status . "','" . $assigned_to . "','" . $action_center_id . "','" . $deadline . "','" . $o_id . "')");
        }
        if ($task_status == 3) {
            $query = $db->query("UPDATE action_center set status = 4 where id =" . $action_center_id);
        }

        if ($add_timelin) {
            $noti = new UserNotification();
            foreach ($assigned_too as $asto) {
                $data = [
                    'owner_id' => $o_id,
                    'created_by' => $supplier_info['supplier_id'],
                    'msg' => $msg,
                    'link' => 'Controlwork/assessment',
                    'for_y' => $asto
                ];
                $noti->insert($data);
            }

            $session->setFlashdata('success', 'TimeLinesaved  has been saved successfully');
        } else {
            $session->setFlashdata('error', ' Not Save');
        }

        return redirect()->to('action/task');
    }

    public function control_assessment_submit()
    {

        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $priority = $this->request->getVar("priority");
        $due_date = $this->request->getVar("due_date");
        $comment = $this->request->getVar("comment");

        $frequency = $this->request->getVar("frequency");
        $assigned_to = $this->request->getVar("assigned_to");
        $indicator = json_encode($this->request->getVar("indicator"));
        $indi = $this->request->getVar("indicator");

        $indicator_show = '';
        $indicator_m = new IndicatorCategoryModel();

        $item = $indicator_m->whereIn('id', $indi)->findAll();
        foreach ($item as $key => $value) {
            if ($key == 0) {
                $indicator_show .= $value['indicator_category_name'];
            } else {
                $indicator_show .= ', ' . $value['indicator_category_name'];
            }
        }
        $sub_boundary = $this->request->getVar("sub_boundary");
        $boundary = $this->request->getVar("boundary");
        $supplier_Type = $this->request->getVar("supplier_Type");
        $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
        $supplier_rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
        $srnum = rand(1000, 999999);
        $supplier_uniq_spl_chr = ucwords('#' . $supplier_rname . '_' . $srnum);
        $for = $assigned_to;
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        if ($u_id != $o_id) {
            $run = $supplier->where('id', $u_id)->first();
            if (!$run['department'] || !$run['employee_code'] || !$run['designation']) return json_encode(['status' => false, 'error' => 'Please Complete  your profile']);
        }
        if ($boundary == '43') {
            $SupplierType = new SupplierType();
            if (session()->supplier_info['role'] == 0) {

                $supplier_type_query = $SupplierType->select('*,supplier_type.id')->join('supplier', 'supplier.email=supplier_type.email')->where('supplier_type.status', 1)->where('supplier_type.owner_id', $o_id)->where('supplier_type.supplier_Type', $supplier_Type)->findAll();
            } else {
                $supplier_type_query = $SupplierType->select('*,supplier_type.id')->join('supplier', 'supplier.email=supplier_type.email')->where('supplier_type.status', 1)->where('supplier_type.supplier_id', $u_id)->where('supplier_type.supplier_Type', $supplier_Type)->findAll();
            }
            foreach ($supplier_type_query as $supplier_typeID) {
                $kk = $supplier_typeID['email'];
                $sid  = $supplier_typeID['id'];
                $avaaa = $db->query("select * from supplier where email='" . $kk . "' ")->getResultArray();
                foreach ($avaaa as $supplierinsert) {
                    $supplierinsertID = $supplierinsert['id'];
                    $rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
                    $rnum = rand(1000, 999999);
                    $uniq_spl_chr = ucwords('#' . $rname . '_' . $rnum);
                    $control_assessment = $db->query("insert into control_assessment(supplier_id,priority,due_date,comment,frequency,assigned_to,uniq_spl,indicator,supplier_uniq,addsupplier_id,sub_boundary,boundary,owner_id,start_date)
        values(" . $supplier_info['supplier_id'] . ",'" . $priority . "','" . $due_date . "','" . $comment . "','" . $frequency . "','" . $supplierinsertID . "','" . $uniq_spl_chr . "','" . $indicator . "','" . $supplier_uniq_spl_chr . "','" . $sid . "','" . $supplier_Type . "',
        '" . $boundary . "','" . $o_id . "','" . date("Y-m-d") . "')");
                    if ($control_assessment) {
                        $adminname = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
                        $indicator_show = '';

                        $indicatorModel = new IndicatorCategoryModel();
                        $indicatorname = $indicatorModel->whereIn('id', json_decode($indicator))->findAll();
                        foreach ($indicatorname as $key => $value) {
                            if ($key == 0) {
                                $indicator_show .= $value['indicator_category_name'];
                            } else {
                                $indicator_show .= ', ' . $value['indicator_category_name'];
                            }
                        }
                        $notimsg = 'New Task ' . $indicator_show . ' assigned to you by admin ' .  $adminname['supplier_name'];
                        $noti = new UserNotification();
                        $data = [
                            'msg' => $notimsg,
                            'created_by' => $supplier_info['supplier_id'],
                            'owner_id' => $supplierinsertID,
                            'for_y' => $supplierinsertID,
                            'link' => 'Controlwork/assessment'
                        ];
                        $noti->insert($data);


                        $session->setFlashdata('success', 'Assessment has been saved successfully');
                    } else {
                        $session->setFlashdata('error', ' Not Save');
                    }

                    $ava = $db->query("select * from supplier where id='" . $supplierinsertID . "' ");
                    $ava = $ava->getResultArray();


                    $receiptemail = $ava[0]['email'];
                    $detail = $supplier->where('id', $u_id)->first();
                    $image = $detail['image'];
                    if ($image == '') {
                        $image = 'defaultimage.jpg';
                    }
                    // print_r($image);
                    // die;
                    $s_name = $ava[0]['supplier_name'];
                    $department = $detail['department'];
                    $supplier_name = $detail['supplier_name']; //admin
                    $role = $detail['role'];
                    if ($role == '10' || $role == '0') {
                        $role_name = 'Admin';
                    }
                    if ($role == '11') {
                        $role_name = 'Manager';
                    }
                    $t = time();
                    $time_date1 = date("d-m-Y H:i:s", $t);
                    $time_date2 = date("Y", $t);
                    $user_message = '';
                    $user_message .= '<html><body>';
                    $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . ',</h3><p>A new data request has been assign from<br><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">' . $supplier_name . '</p><p style="margin-bottom:0px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p><b style="margin-top:19px;"> ' . ($detail['brand_name']) . '</b>
                    <hr><p  style="margin-bottom:13px; margin-top:13px;">
        For ' . $indicator_show . ' Assessment on<b style="font-size:15px;"> POSITIIVPLUS</b> </p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
                    $user_message .= '</body></html>';
                    // print_r($user_message);
                    // die;
                    /*echo $user_message;
        die();
        */
                    $email = \Config\Services::email();
                    $email->setFrom('info@positiivplus.com', 'Assigned Task');
                    $email->setTo($receiptemail);
                    $email->setSubject('Task');
                    $email->setMessage($user_message);
                    $a = $email->send();
                }
            }
        } else {


            $control_assessment = $db->query("insert into control_assessment(supplier_id,priority,due_date,comment,frequency,assigned_to,indicator,sub_boundary,boundary,owner_id,start_date)
        values(" . $supplier_info['supplier_id'] . ",'" . $priority . "','" . $due_date . "','" . $comment . "','" . $frequency . "','" . $assigned_to . "','" . $indicator . "','" . $sub_boundary . "',
        '" . $boundary . "','" . $o_id . "','" . date("Y-m-d") . "')");


            if ($control_assessment) {
                $adminname = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
                $indicator_show = '';

                $indicatorModel = new IndicatorCategoryModel();
                $indicatorname = $indicatorModel->whereIn('id', json_decode($indicator))->findAll();
                foreach ($indicatorname as $key => $value) {
                    if ($key == 0) {
                        $indicator_show .= $value['indicator_category_name'];
                    } else {
                        $indicator_show .= ', ' . $value['indicator_category_name'];
                    }
                }
                $notimsg = 'New Task ' . $indicator_show . ' assigned to you by admin ' .  $adminname['supplier_name'];
                $noti = new UserNotification();
                $data = [
                    'msg' => $notimsg,
                    'created_by' => $supplier_info['supplier_id'],
                    'owner_id' => $o_id,
                    'for_y' => $for,
                    'link' => 'Controlwork/assessment'
                ];
                $noti->insert($data);


                $session->setFlashdata('success', 'Assessment has been saved successfully');
            } else {
                $session->setFlashdata('error', ' Not Save');
            }

            $ava = $db->query("select * from supplier where id='" . $assigned_to . "' ");
            $ava = $ava->getResultArray();


            $receiptemail = $ava[0]['email'];
            $detail = $supplier->where('id', $o_id)->first();
            $image = $detail['image'];
            $s_name = $ava[0]['supplier_name'];
            $department = $detail['department'];
            $supplier_name = $detail['supplier_name']; //admin
            $role = $detail['role'];
            if ($role == '10' || $role == '0') {
                $role_name = 'Admin';
            }
            if ($role == '11') {
                $role_name = 'Manager';
            }


            $t = time();
            $time_date1 = date("d-m-Y H:i:s", $t);
            $time_date2 = date("Y", $t);
            $user_message = '';
            $user_message .= '<html><body>';
            $user_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . ',</h3><p>A new data request has been assign from<br><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">' . $supplier_name . '</p><p style="margin-bottom:0px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p><p  style="margin-bottom:13px; margin-top:13px;">
        For ' . $indicator_show . ' Assessment on<b style="font-size:15px;"> POSITIIVPLUS</b> <b>' . ($detail['brand_name']) . '</b></p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
            $user_message .= '</body></html>';

            $email = \Config\Services::email();
            $email->setFrom('info@positiivplus.com', 'Assigned Task');
            $email->setTo($receiptemail);
            $email->setSubject('Task');
            $email->setMessage($user_message);
        }
        if ($control_assessment) {
            $ava1 = $db->query("select id from control_assessment ORDER BY id DESC LIMIT 1")->getResultArray();
            $lastId = $ava1[0]['id'];
            $query_assessment = $db->query("SELECT * from control_assessment where id='" . $lastId . "' ")->getResultArray();
            $indicator_id = json_decode($query_assessment[0]['indicator']);
            $data_d = "";
            $data = "";

            $g = 1;
            foreach ($indicator_id as $id) {
                $indicatorFetch = $db->query("SELECT * FROM `indicator_category` WHERE id =$id and status =1")->getResultArray();

                foreach ($indicatorFetch as $indi) {
                    if ($g) {
                        $g = 0;
                        $data_d .= '<li class="nav-item mb-2"><a class="nav-link gopal-nav active" id="baseVerticalLeft-tab' . $indi['id'] . '" data-bs-toggle="tab" aria-controls="tabVerticalLeft' . $indi['id'] . '" href="#tabVerticalLeft' . $indi['id'] . '" role="tab" aria-selected="true" data-id="' . $lastId . '" data-indi="' . $indi['id'] . '" onclick="indicatorQuestion(this)">' . $indi['indicator_category_name'] . '</a></li>';
                        $indicators_id = $db->query("SELECT indicator_category_id,id from assessment where indicator_category_id=" . $indi['id'] . " and status=1")->getResultArray();
                        $arr = [];
                        foreach ($indicators_id as $value) {
                            $arr[] = $value['id'];
                        }
                        $assessment_question_model = new AllAssessmentModel();
                        $assessment_question = $assessment_question_model->where('status', 1)->whereIn('all_assessment_id', $arr)->findAll();

                        foreach ($assessment_question as $assessment) {
                            $answers = $db->query("select * from all_master_assessment_answer  where status=1 and id='" . $assessment['answer'] . "'")->getResultArray();
                            foreach ($answers as $answer_name) {

                                if ($answer_name['id'] == $assessment['answer']) {
                                    $data .= '<div class="tab-pane" id="tabVerticalLeft1" role="tabpanel" aria-labelledby="baseVerticalLeft-tab1"><div class="accordion" id="accordionExample">
                <div class="accordion-item mb-1 border-0">
                <div class="row">
                <div class="col-md-11">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionOne' . $assessment['id'] . '" aria-expanded="true" aria-controls="accordionOne">' . $assessment['question_title'] . '
                    <span class="ms-auto me-2"></span></button></h2><div id="accordionOne' . $assessment['id'] . '" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample"
                        >
                        <div class="accordion-body bg-light">
                                    <p>' . $assessment['question'] . '</p>
                                    <label class="form-label fs-6" for="select2-basic">Answer</label>
                                    
                                    <p>' . $answer_name['answer'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 p-0">
                    <div class="form-check form-check-inline  pt-1 pb-1">';

                                    $data .= '<input class="form-check-input gopal-navv" type="checkbox" id="inlineCheckbox' . $assessment['id'] . $lastId . '"
                data-indicator="' . $indi['id'] . '" data-question="' . $assessment['id'] . '" data-control="' . $lastId . '" data-answer="' . $assessment['answer'] . '"  onclick="Question_check(this)"' . ($assessment['is_mandatory_needed'] ? "checked" : '');
                                    $data .=  '>';

                                    $data .=  '</div></div></div></div></div></div>';
                                }
                            }
                        }
                        continue;
                    }
                    $data_d .= '<li class="nav-item mb-2"><a class="nav-link gopal-nav" id="baseVerticalLeft-tab' . $indi['id'] . '" data-bs-toggle="tab" aria-controls="tabVerticalLeft' . $indi['id'] . '" href="#tabVerticalLeft' . $indi['id'] . '" role="tab" aria-selected="false" data-id="' . $lastId . '" data-indi="' . $indi['id'] . '" onclick="indicatorQuestion(this)">' . $indi['indicator_category_name'] . '</a></li>';
                }
            }
        }
        $response = [
            'success' => $data_d,
            'd' => $data,
            'control_id' => $lastId,
        ];
        return $this->response->setJSON($response);
    }
    // public function ug($id, $control_id)
    // {
    //     $db = \Config\Database::connect();
    //     $assessment_question = $db->query("select * from all_assessment_question where indicator_category_id='" . $id . "' and status=1")->getResultArray();
    //     foreach ($assessment_question as $assessment) {
    //         $answers = $db->query("select * from all_master_assessment_answer  where status=1 and id='" . $assessment['answer'] . "'")->getResultArray();
    //         foreach ($answers as $answer_name) if ($answer_name['id'] == $assessment['answer']) if ($assessment['is_mandatory_needed']) $this->AssessmentQuestionCheckind($id, $assessment['id'], $assessment['answer'], $control_id);
    //     }
    // }
    public function AssessmentQuestion($id, $control_id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $indicators_id = $db->query("SELECT indicator_category_id,id from assessment where indicator_category_id=$id and status=1")->getResultArray();
        $arr = [];
        foreach ($indicators_id as $value) {
            $arr[] = $value['id'];
        }
        $assessment_question_model = new AllAssessmentModel();
        $assessment_question = $assessment_question_model->where('status', 1)->whereIn('all_assessment_id', $arr)->findAll();

        // $assessment_question = $db->query("select * from all_assessment_question where indicator_category_id='" . $id . "' and status=1")->getResultArray();
        $data = '<div class="tab-pane" id="tabVerticalLeft1" role="tabpanel" aria-labelledby="baseVerticalLeft-tab1">
        <div class="accordion" id="accordionExample">';
        foreach ($assessment_question as $assessment) {
            $query = $db->query("select * from all_master_assessment_answer  where status=1 and id='" . $assessment['answer'] . "'");
            $answers = $query->getResultArray();
            $isChecked = "";
            if ($assessment['is_mandatory_needed'] == 1) {
                $isChecked = 'checked';
            }
            foreach ($answers as $answer_name) {
                if ($answer_name['id'] == $assessment['answer']) {
                    $data .= '<div class="accordion-item mb-1 border-0">
        <div class="row"><div class="col-md-11">
            <h2 class="accordion-header" id="headingOne">
            <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#accordionOne' . $assessment['id'] . '"
            aria-expanded="true"
            aria-controls="accordionOne"
            >' . $assessment['question_title'] . '
            <span class="ms-auto me-2">
            </span>
            </button>
            </h2>
            <div
                        id="accordionOne' . $assessment['id'] . '"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample"
                        >
                        <div class="accordion-body bg-light">
                                    <p>' . $assessment['question'] . '</p>
                                    <label class="form-label fs-6" for="select2-basic">Answer</label>
                                    
                                    <p>' . $answer_name['answer'] . '</p>
                        </div>
            </div>
        </div>
        <div class="col-md-1 p-0">
            <div class="form-check form-check-inline  pt-1 pb-1">
                        
            <input class="form-check-input gopal-navv" type="checkbox" id="inlineCheckbox' . $assessment['id'] . $control_id . '"
                        data-indicator="' . $id . '" data-question="' . $assessment['id'] . '" data-control="' . $control_id . '" data-answer="' . $assessment['answer'] . '"  onclick="Question_check(this)"'
                        . $isChecked;
                    $data .=  '></div></div></div></div>';
                }
            }
        }
        $data .= '</div></div>';
        echo $data;
    }
    public function AssessmentQuestionCheck($ind_id, $qus_id, $ans_id, $control_id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        $supplier_info = $session->get('supplier_info');
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        $Qualitative_assessment_step =  new Qualitative_assessment_step();

        $contrl_query =  $db->query("SELECT * from control_assessment where id='" . $control_id . "'and status=1")->getResultArray();
        $uniq_sql = $contrl_query[0]['supplier_uniq'];
        $controll_query =  $db->query("SELECT * from control_assessment where supplier_uniq='" . $uniq_sql . "'and status=1")->getResultArray();

        foreach ($controll_query as $mainid) {
            $controlid = $mainid['id'];
            $check_question = $Qualitative_assessment_step->where('supplier_id', $u_id)->where('control_assessment_id', $controlid)->where('indicator_id', $ind_id)->where('question_id', $ans_id)->where('select_question_id', $qus_id)->where('status', 1)->first();
            if ($check_question) {
                $Qualitative_assessment_step->delete($check_question['id']);
            } else {
                $data =
                    [
                        'supplier_id' => $u_id,
                        'owner_id' => $o_id,
                        'control_assessment_id' => $controlid,
                        'indicator_id' => $ind_id,
                        'question_id' => $ans_id,
                        'select_question_id' => $qus_id,
                    ];
                $Qualitative_assessment_step->insert($data);
            }
        }
    }
    public function AssessmentQuestionCheckind($ind_id, $qus_id, $ans_id, $control_id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        $Qualitative_assessment_step =  new Qualitative_assessment_step();

        $contrl_query =  $db->query("SELECT * from control_assessment where id='" . $control_id . "'and status=1")->getResultArray();
        $uniq_sql = $contrl_query[0]['supplier_uniq'];

        $controll_query =  $db->query("SELECT * from control_assessment where supplier_uniq='" . $uniq_sql . "'and status=1")->getResultArray();

        foreach ($controll_query as $mainid) {
            $controlid = $mainid['id'];

            $check_question = $Qualitative_assessment_step->where('control_assessment_id', $controlid)->where('indicator_id', $ind_id)->where('question_id', $ans_id)->where('select_question_id', $qus_id)->where('status', 1)->first();

            if ($check_question) {
                $update_id = $check_question['id'];
                $data =
                    [
                        'status' => 1,
                    ];
                $insert = $Qualitative_assessment_step->update($update_id, $data);
            } else {
                $data =
                    [
                        'supplier_id' => $u_id,
                        'owner_id' => $o_id,
                        'control_assessment_id' => $controlid,
                        'indicator_id' => $ind_id,
                        'question_id' => $ans_id,
                        'select_question_id' => $qus_id,
                    ];
                $insert = $Qualitative_assessment_step->insert($data);
            }
        }
    }
    public function weaitage_indicator($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        $supplier_info = $session->get('supplier_info');
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }
        $Qualitative_assessment_step =  new Qualitative_assessment_step();
        if (session()->supplier_info['role'] == 0) {
            $asessment_step_query =
                $Qualitative_assessment_step->join('indicator_category', 'indicator_category.id=Qualitative_assessment_step.indicator_id')->where('Qualitative_assessment_step.owner_id', $o_id)->where('Qualitative_assessment_step.status', 1)->where('Qualitative_assessment_step.control_assessment_id', $id)->groupBy('Qualitative_assessment_step.indicator_id')->findAll();
        } else {
            $asessment_step_query =
                $Qualitative_assessment_step->join('indicator_category', 'indicator_category.id=Qualitative_assessment_step.indicator_id')->where('Qualitative_assessment_step.supplier_id', $u_id)->where('Qualitative_assessment_step.status', 1)->where('Qualitative_assessment_step.control_assessment_id', $id)->groupBy('Qualitative_assessment_step.indicator_id')->findAll();
        }

        $data = "";
        foreach ($asessment_step_query as $indiactor_name) {

            $data .= '
        <div class="row mt-1">
        <div class="col-md-2">
        <p>' . $indiactor_name['indicator_category_name'] . '</p>
        </div>
        <div class="col-md-8">
        <div class="range-bar">
        <input type="range" min="0" max="100" value="0" class="IndicatorIdData"  id="range-slider-energy' . $indiactor_name['id'] . '" data-id="1"  onchange="updateTextInput($(this))">
        </div>
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control textInputcvxbvg" data-id="' . $indiactor_name['id'] . '" id="textInput' . $indiactor_name['id'] . '" onkeyup="val_show($(this))">
        </div>
        </div>';
        }

        $data .= '
        <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 mt-2"><input type="text" class="float-right form-control AllTotal" placeholder="0 %"  readonly=""></div></div>';
        $data .= '<div class="row mt-1">
        <div class="col-md-2">
        <p> Failed </p>
        </div>
        <div class="col-md-8">
        <div class="range-bar">
        <input type="range" min="0" max="100" value="0" class="" onchange="failedRange()" id="failedrange" data-id="">
        </div>
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control" id="failedtb" onkeyup="failedValue()">
        </div>
        </div>';

        $data .= '<script type="text/javascript">
        function failedRange(){
        let inputRange = $("#failedrange").val();
        $("#failedtb").val(inputRange);
        }

        function failedValue(){
        let inputValue = $("#failedtb").val();
        if($("#failedtb").val() == ""){
        $("#failedrange").val(0);
        }
        else{
        $("#failedrange").val(inputValue);
        if($("#failedtb").val() > 100){
        $("#failedtb").val(100);
        }
        }
        }
        function updateTextInput(that)
        {';

        $data .= '

        let targets = $(".IndicatorIdData"),
        value = 0,
        sum = 0 ,
        target,
        that_val = parseInt($(that).val());
        for (let i = 0; i < targets.length; i++) {
        value += parseInt(targets.eq(i).val());
        }
        if (value > 100){
        $(that).val((100 - (value - that_val)));
        }
        for (let i = 0; i < targets.length; i++)
        {
        target = targets.eq(i);
        target.parent().parent().parent().find(".textInputcvxbvg").val(target.val()+" %");
        sum += parseInt(target.val());

        $(".AllTotal").val(sum+" %");
        if(sum == "100")
        {
        $("#step3Disabled").prop("disabled",false);

        }else{
        $("#step3Disabled").prop("disabled",true); 
        }
        }

        }

        function val_show(that) {
        let targets = $(".textInputcvxbvg"),
        value = 0,
        target,
        that_val = parseInt(that.val()),
        that_parent = that.parent().parent().find(".IndicatorIdData");
        for (let i = 0; i < targets.length; i++) {
        if (targets.eq(i).val() != "")
        value += parseInt(targets.eq(i).val())
        }
        if (value > 100) {
        that_parent.val((100 - (value - that_val)));
        that.text((100 - (value - that_val)));
        that.val((100 - (value - that_val)));

        } else {
        that_parent.val(that_val);
        if (that.val() == "") that_parent.val(0);
        }
        value = 0;
        for (let i = 0; i < targets.length; i++) {
        if (targets.eq(i).val() != "")
        value += parseInt(targets.eq(i).val())
        }
        $(".AllTotal").val(value);
        }
        </script>';






        echo $data;
    }
    public function getIndicatorByboundary($boundary_id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier = new SupplierModel();

        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
        }

        if ($boundary_id == 35450) {

            $query = $db->query("SELECT s.id,s.indicator_name,s.indicator_category_id,s.image FROM `indicator` as s join base_assessment_question as b on s.id=b.indicator_id where s.status=1 and b.status=1 and b.is_document_needed=1 and (b.industry_id='" . $supplier_info['industry_id'] . "' or b.industry_id=0) group by b.indicator_id order by s.id");
            $indicator = $query->getResultArray();
            $data = '';
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '">' . $indi['indicator_name'] . '</option>';
                }
            }
        }


        if ($boundary_id == '43') {
            $supplier_model = new SupplierModel();
            $SupplierType = new SupplierType();
            $footprint_type_model = new FootprintTypeModel();
            $supplier_type = $SupplierType->where('status', 1)->where('supplier_id', $u_id)->Orwhere('owner_id', $o_id)->groupBy('supplier_type')->findAll();
            $data1 = '<option value="0">Select Supplier Type</option>';
            if ($supplier_type)
                foreach ($supplier_type as $supplier_type_id) {
                    $g = [];
                    $supplier_type_g = $SupplierType->select("email")->where('id', $supplier_type_id['id'])->findAll();

                    foreach ($supplier_type_g as $keya => $valuea)
                        $g[] = $valuea['email'];

                    $model = $supplier_model->whereIn('email', $g)->findAll();
                    if (!$model) continue;
                    $type = $footprint_type_model->where(['footprint_id' => 3, 'status' => 1])->where('id', $supplier_type_id['supplier_type'])->findAll();

                    foreach ($type as $type_name)
                        $data1 .= '<option value="' . $type_name['id'] . '">' . $type_name['type_name'] . '</option>';
                }
        }


        $assessment = new Assessment();
        $assess = $assessment->Select('*')->join('indicator_category', 'assessment.indicator_category_id = indicator_category.id')->where('assessment.status', 1)->where('assessment.boundary', $boundary_id)->where('indicator_category.status', 1)->groupBy('assessment.indicator_category_id')->findAll();

        $data = '<option value="0">Select Indicator category</option>';
        if ($assess) {
            foreach ($assess as $asses) {
                $data .= '<option value="' . $asses['id'] . '">' . $asses['indicator_category_name'] . '</option>';
            }
        }


        if ($boundary_id == '2NKJINI') {
            $query = $db->query("select s.sdg_id,b.indicator_id,indi.id,indi.sdg_name,indi.image from industry_sdg as s join indicator_sdg as b on s.sdg_id=b.sdg_id join sdg_assessment_question as saq on saq.sdg_id=s.sdg_id join sdg as indi on indi.id=s.sdg_id where (s.industry_id='" . $supplier_info['industry_id'] . "' or s.industry_id=0) and saq.is_document_needed=1 and (saq.industry_id=0 or saq.industry_id='" . $supplier_info['industry_id'] . "') group by sdg_id");
            $indicator = $query->getResultArray();
            if ($indicator) {
                foreach ($indicator as $indi) {
                    $data .= '<option value="' . $indi['id'] . '">' . $indi['sdg_name'] . '</option>';
                }
            }
        }
        $response =
            [
                'site' => $data,
                'supplier' => $data1,
            ];
        return $this->response->setJSON($response);
    }
    // delete assessment
    public function deleteAssessment()
    {
        $db = \Config\Database::connect();
        $session = session();
        $id = $this->request->getVar('del_assessment');
        $query = $db->query("UPDATE control_assessment set status = 0 where id =" . $id);

        $response =
            [
                'succescc' => '1',

            ];
        return $this->response->setJSON($response);
    }

    public function answerQuestion($a_id, $i_id, $main_id)
    {
        $rs = check_session();
        $data['indicator_id'] = $i_id;
        if (!$rs) {
            return redirect()->to('home/user_login');
        }


        $data['pg_nm'] = 'Assessment';
        $db = \Config\Database::connect();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $supplier_model = new SupplierModel();
        $assessment = new Assessment();
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

        $query = $db->query("SELECT ed.* FROM `employee_details` as ed  where ed.status=1 ");
        $data['employee_details'] = $query->getResultArray();

        $query = $db->query("SELECT gh.* FROM `ghg` as gh  where gh.status=1 ");
        $data['ghg_name'] = $query->getResultArray();


        $query = $db->query("SELECT smi.item_name,smi.id FROM `supplier_module_item`as smi WHERE smi.supplier_module_id=45 and smi. status=1 ");
        $data['boundary_item'] = $query->getResultArray();
        $query = $db->query("select id,cp_name from supplier_assessment where is_submit=1");
        $data['sub_boundary_item'] = $query->getResultArray();

        $brand = new BrandModel();
        $sid = session()->supplier_info['supplier_id'];
        $ok = $supplier_model->where('id', $sid)->first();
        if (session()->supplier_info['role'] == 0) {
            $role = 10;
        } else {
            $role = $ok['role'];
        }
        $data['roleAllow'] = $brand->where('brand_name', $data['pg_nm'])->where('role_id', $role)->where('plan_id', $ok['supplier_plan_id'])->first();

        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
        } else {
            $sid = session()->supplier_info['supplier_id'];
            $ok = $supplier_model->where('id', $sid)->first();
            $o_id = $ok['owner_id'];
        }
        $data['supplier'] = $supplier_model->findAll();
        $data['control_assessment'] =
            $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1")->getResultArray();
        $data['employee_details'] = $supplier_model->where('owner_id', $o_id)->findAll();
        $data['assessment'] = $assessment->findAll();
        $test = $db->query("SELECT * from control_assessment where owner_id='" . $o_id . "'and status=1")->getResultArray();

        // $data['a_q'] = $db->query("SELECT ind.id,ind.remark,ind.is_document_needed,ind.question_title,ind.question,ind.choice,ind.answer,amaa.answeroption,amaa.marks,indi.indicator_category_name,amaa.answer as multi_answer from Qualitative_assessment_step as alq JOIN all_assessment_question as ind on ind.id= alq.select_question_id
        // JOIN all_master_assessment_answer AS amaa ON alq.question_id = amaa.id JOIN indicator_category as indi on indi.id= alq.indicator_id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and
        // alq.control_assessment_id = $main_id  and alq.indicator_id=$i_id ")->getResultArray();

        $data['a_q'] = $db->query(
            "SELECT ind.id,ind.remark,ind.is_document_needed,ind.question_title,ind.question,ind.choice,ind.answer,amaa.answeroption,amaa.marks,indi.indicator_category_name,amaa.answer as multi_answer 
     from Qualitative_assessment_step AS alq 
     JOIN all_assessment_question AS ind ON ind.id= alq.select_question_id 
    JOIN all_master_assessment_answer AS amaa ON alq.question_id = amaa.id 
    JOIN assessment as ass ON ind.all_assessment_id=ass.id
    JOIN indicator_category AS indi ON indi.id= alq.indicator_id where alq.status = 1 AND ass.status=1 AND amaa.status = 1 AND ind.status = 1 AND alq.control_assessment_id = $main_id AND alq.indicator_id=$i_id"
        )->getResultArray();
        // print_r($data['a_q']);
        // die;
        $data['total_Q'] = count($data['a_q']);
        $insert = new BrandQualitativeAnswerModel();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier_model->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $data['qu_an'] = $insert->where('owner_id', $o_id)->where('control_assesment_id', $main_id)->where('status', 1)->findAll();

        $total_mark = [];


        $query_total_Marks =
            $db->query("SELECT bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id AND bqa.supplier_id = $u_id AND bqa.owner_id = $o_id ")->getResultArray();

        foreach ($query_total_Marks as $first => $firsts) {
            $answer_array = $firsts['answer_array'];
            $choice = $firsts['choice'];
            $submited_answer = json_decode($firsts['submited_array']);
            $marks_array = json_decode($firsts['marks_aray']);
            if ($choice == 'Single') {
                $answer_array1 = array($answer_array);
                $answer_array = json_encode($answer_array1);
            }




            if (is_array($submited_answer) == 1) {
                $sybmited_answer = $submited_answer;

                foreach ($answer_array as $key => $ans_arry) {
                    if (in_array($ans_arry, $sybmited_answer)) {
                        $r = count($sybmited_answer);
                        $marka[]  = $marks_array[$key];
                        $sybmited_answer = [];
                    }
                }
                $divide = array_sum($marka) / $r;
                array_push($total_mark, $divide);
            } else {
                $b = json_decode($answer_array);

                $sybmited_answerH[] = $submited_answer;
                foreach ($b as $key => $ans_arry) {
                    if (in_array($ans_arry, $sybmited_answerH)) {
                        $r = count($sybmited_answerH);
                        array_push($total_mark, ($marks_array[$key] / $r));
                        $sybmited_answerH = [];
                    }
                }
            }
        }

        $totalsubmited = count($data['a_q']);

        if ($totalsubmited == 0) {
            $totalsubmited = 1;
        }
        $totalmarkrecievd = array_sum($total_mark);
        $documentmodel = new DocumentModel();
        $data['document'] = $documentmodel->where('supplier_id', $o_id)->where('status', 1)->findAll();




        $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND bqa.indicator_id = $i_id  AND bqa.owner_id = $o_id")->getResultArray();
        $data['total_A'] = $query_total_A[0]['total_A'];
        $percentile1 = ($data['total_A'] / $totalsubmited) * 100;
        $percentile = number_format(($percentile1), 2);
        $data['percentile'] = $percentile;

        $data['mandatory'] = $db->query("SELECT COUNT(*) as total_m FROM `all_assessment_question` WHERE all_assessment_id =$a_id AND indicator_id = $i_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand'] = $data['mandatory'][0]['total_m'];
        $data['ans_mand'] = $db->query("SELECT COUNT(*) as total_m_a FROM `all_assessment_question` as a JOIN `brand_qualitative_answer` as b on a.id=b.question_id WHERE b.owner_id = $o_id AND a.all_assessment_id =$a_id AND a.indicator_id = $i_id AND is_mandatory_needed = 1")->getResultArray();
        $data['mand_ans'] = $data['ans_mand'][0]['total_m_a'];
        $data['id'] = $main_id;
        $data['a_id'] = $a_id;
        $dat = $db->query("SELECT signature from brand_qualitative_answer where id=230")->getResultArray();
        foreach ($dat as $shhhh) {
            $shhhh['signature'];
        }
        $data['signatureeeee'] = $shhhh['signature'];
        $dataa = $db->query("SELECT annotation_image from brand_qualitative_answer where id=230")->getResultArray();
        foreach ($dataa as $bbb) {
            $bbb['annotation_image'];
        }
        $data['annotation_imageeee'] = $bbb['annotation_image'];
        $is_submit = array();
        foreach ($data['qu_an'] as $key => $value) $is_submit[] = $value['question_id'];
        $data['is_submit'] = $is_submit;
        return view('brand/view-user-answer-question', $data);
    }

    public function addAnswerQuestion()
    {


        $insert = new BrandQualitativeAnswerModel();

        $db = \Config\Database::connect();
        $supplier = new SupplierModel();

        $session = session();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }
        $totalSize = 0;
        $documentData = $db->query("select * from supplier_document where supplier_id='" . $u_id . "' and status=1")->getResultArray();
        foreach ($documentData as $key => $docData) {
            $totalSize += $docData['file_size'];
        }
        $query = $db->query("select * from document_Storage where user_id='" . $o_id . "'");
        $user_id = $query->getResultArray()[0];
        $limit = $user_id['limit'];
        $unit = $user_id['unit'];
        if ($unit == '1') {
            $limi = $limit / 1024;
        } elseif ($unit == '2') {
            $limi = $limit;
        } else {
            $limi = $limit * 1024;
        }
        if ($totalSize > $limi) {
            $s_date = ['error' => 'Document Library is full'];
            return $this->response->setJSON($s_date);
        } else {
            $newName = NULL;
            $answer_media = $this->request->getFile('answer_media');
            $answer = $this->request->getVar('answer');
            $indicator_id = $this->request->getVar('indicator_id');
            $i_id = $indicator_id;


            if ($answer == '' &&  $answer_media == '') {
                $session->setFlashdata('error', 'please select answer');
                return redirect()->back();
            }

            $comment = $this->request->getVar('comment');
            $q_id = $this->request->getVar('question_id');
            $answer_id = $this->request->getVar('answer_id');
            $main_id = $this->request->getVar('main_id');
            $a_id = $this->request->getVar('a_id');
            $file = $this->request->getFile('file');
            $fileupload = $this->request->getVar('fileupload');
            $model_doc = new DocumentModel();
            if ($fileupload) {
                $documentname = $model_doc->where('document_name', $fileupload)->where('status', 1)->where('supplier_id', $u_id)->first()['image'];
            }
            if (!($fileupload)) {
                if ($file->isValid()) {
                    $ext = $file->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $newName = $file->getRandomName();
                        $filename = $file->getName();
                        $file_size = $file->getSizeByUnit('mb');
                        $file->move('public/uploads/ans_question', $newName);
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                }
            } else {

                $newname = '12' . $documentname;

                $yxsfj  = copy('public/uploads/supplier_document/' . $documentname, 'public/uploads/ans_question/' . $newname);
            }
            if ($main_id) {
                $data['control_assesment_id'] = $main_id;
            }
            if ($newName) {
                $data['media'] = $newName;
            }
            if ($filename) {
                $data['media_name'] = $filename;
            }
            if ($comment) {
                $data['comment'] = $comment;
            }
            if ($indicator_id) {
                $data['indicator_id'] = $indicator_id;
            }
            if ($answer_id) {
                $data['answer_id'] = $answer_id;
            }
            if ($answer) {
                $data['answer'] = json_encode($answer);
            }
            if ($q_id) {
                $data['question_id'] = $q_id;
            }
            if ($o_id) {
                $data['owner_id'] = $o_id;
            }
            if ($u_id) {
                $data['supplier_id'] = $u_id;
            }
            if ($answer_media) {
                if ($answer_media->isValid()) {
                    $ext = $answer_media->getClientExtension();
                    $ava_ext = array("png", "jpg", "jpeg", "gif");
                    if (in_array($ext, $ava_ext)) {
                        $ans_media = $answer_media->getRandomName();

                        $answer_media->move('public/uploads/answered_question', $ans_media);
                        $data['answer'] = json_encode($ans_media);
                    } else {
                        $session->setFlashdata('error', 'Please select a valid image');
                    }
                }
            }
            $model = new Control_assessment();
            $document_uniq = $model->where('id', $main_id)->first()['uniq_spl'];
            $find = $insert->where('owner_id', $o_id)->where('question_id', $q_id)->where('control_assesment_id', $main_id)->where('status', 1)->first();
            if ($find) {
                $id = $find['id'];
                $ins = $insert->update($id, $data);
            } else {
                $ins = $insert->insert($data);
            }
            $model_doc = new DocumentModel();
            $doc_name = $filename;

            $title = $this->request->getVar('title');

            $img =  $model_doc->insert(['supplier_id' => $u_id, 'action_id' => '1', 'image' => $newName, 'indicator_id' => $document_uniq, 'title' => $title, 'status' => 1, 'document_type_id' => '19', 'document_name' => $doc_name, 'Qualitative_quantitative_id' => '53', 'file_size' => $file_size, 'date' => date('Y-m-d')]);



            $query_total_A = $db->query("SELECT COUNT(*) AS total_A FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND bqa.indicator_id = $i_id ")->getResultArray();
            $total_A = $query_total_A[0]['total_A'];

            $data['a_q'] = $db->query("SELECT ind.id,ind.question_title,ind.question,ind.choice,ind.answer,amaa.answeroption,amaa.marks,indi.indicator_category_name,amaa.answer as multi_answer from Qualitative_assessment_step as alq JOIN all_assessment_question as ind on ind.id= alq.select_question_id
        JOIN all_master_assessment_answer AS amaa ON alq.question_id = amaa.id JOIN indicator_category as indi on indi.id= alq.indicator_id where   alq.status = 1 AND amaa.status = 1 AND ind.status = 1 and
        alq.control_assessment_id = $main_id  and alq.indicator_id=$i_id ")->getResultArray();

            $data['total_Q'] = count($data['a_q']);

            $Qualitative_assessment_step =  new Qualitative_assessment_step();
            $overques = $Qualitative_assessment_step->where('status', 1)->where('control_assessment_id', $main_id)->findAll();
            $over_tot_q = count($overques);

            $overall = $db->query("SELECT COUNT(*) AS total_A FROM  `Qualitative_assessment_step` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.select_question_id WHERE bqa.control_assesment_id = $main_id and bqa.status=1 and aaq.status = 1 AND aaq.control_assessment_id=$main_id")->getResultArray();
            $overtot = $overall[0]['total_A'];

            $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array , amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=1 and aaq.status = 1 AND bqa.control_assesment_id = $main_id AND bqa.indicator_id = $i_id ")->getResultArray();

            $over_percentage = ($overtot / $over_tot_q) * 100;

            $total_mark[] = null;
            foreach ($query_total_Marks as $first => $firsts) {
                $submited_answer = json_decode($firsts['submited_array']);
                $marks_array = json_decode($firsts['marks_aray']);
                $answer_array = json_decode($firsts['answer_array']);
                if ($firsts['choice'] == "Single") {
                    $answer_array = ["Text"];
                    $answer_array = ["Date and Time"];
                    $answer_array = ["Numbers"];
                    $answer_array = ["Date"];
                    $answer_array = ["Time"];
                    $answer_array = ["Signature"];
                }
                $choice = $firsts['choice'];
                if ($choice == 'Single') {
                    $answer_array1 = array($firsts['answer_array']);
                    $answer_array = $answer_array;
                }

                if (is_array($submited_answer) == 1) {
                    $sybmited_answer = $submited_answer;
                    foreach ($answer_array as $key => $ans_arry) {
                        if (in_array($ans_arry, $sybmited_answer)) {
                            $r = count($sybmited_answer);
                            $marka[]  = $marks_array[$key];
                            $sybmited_answer = [];
                        }
                    }
                    $divide = array_sum($marka) / $r;
                    $divided = number_format(($divide), 2);
                    $total_mark[] = $divided;
                } else {

                    $sybmited_answerH[] = $submited_answer;
                    if ($answer_array)

                        foreach ($answer_array as $key => $ans_arry) {

                            if (in_array($ans_arry, $sybmited_answerH) || $ans_arry == "Text" || $ans_arry == "Date and Time" || $ans_arry == "Numbers" || $ans_arry == "Date" || $ans_arry == "Time" || $ans_arry == "Signature") {
                                $r = count($sybmited_answerH);
                                $total_mark[] = number_format(($marks_array[$key] / $r), 2);
                                $sybmited_answerH = [];
                            }
                        }
                }
            }
            $totalsubmited = count($data['a_q']);

            $totalmarkrecievd = array_sum($total_mark);

            $percentile1 = ($total_A / $totalsubmited) * 100;
            $percentile = number_format(($percentile1), 2);



            $model = new Control_assessment();

            $percenumber = [
                'per_overall' => $over_percentage,
            ];

            $model->update($main_id, $percenumber);



            if ($ins) {
                $response = [
                    'success' => true,
                    'data' => 'hm',
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has been saved successfully"
                ];
            } else {
                $response = [
                    'success' => false,
                    'data' => 'hm',
                    'total_A' => $total_A,
                    'percentile' => $percentile,
                    'msg' => "Your answer has not save"
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function addAction()
    {
        $supplier = new SupplierModel();
        $insert = new ActionCenterModel();
        $session = session();
        if (session()->supplier_info['role'] == 0) {
            $o_id = $u_id = session()->supplier_info['supplier_id'];
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $find = $supplier->where('id', $u_id)->first();
            $o_id = $find['owner_id'];
        }

        $tag = json_encode($this->request->getVar('task-tag'));
        $assignee = json_encode($this->request->getVar('task-assigned'));
        $data = [
            'owner_id'    => $o_id,
            'supplier_id' => $u_id,
            'description' => $this->request->getVar('description'),
            'assignee'    => $assignee,
            'priority'    => $this->request->getVar('priority'),
            'tag'         => $tag,
            'due_date'    => $this->request->getVar('task-due-date'),
            'title'       => $this->request->getVar('todoTitleAdd'),
            'audit'       => $this->request->getVar('inlineRadioOptions'),
            'question_id' => $this->request->getVar('q_id'),
            'indicator_id' => $this->request->getVar('i_id'),
            'assessment_id' => $this->request->getVar('a_id'),
            'assign_from' => 'Qualitative'
        ];
        $ins = $insert->insert($data);
        if ($ins) {
            $session->setFlashdata('success', 'Your action has been saved successfully');
            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            } elseif (session()->supplier_info['role'] == 10) {
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id', $u_id)->first();
                $o_id = $id_o['owner_id'];
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            } else {
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id', $u_id)->first();
                $o_id = $id_o['owner_id'];
                $msg = "A action task is assign you go and check";
                $for = $this->request->getVar('task-assigned');
            }
            $noti = new UserNotification();
            print_r($for);
            foreach ($for as $rof) {
                $data = [
                    'owner_id' => $o_id,
                    'created_by' => $u_id,
                    'msg' => $msg,
                    'link' => 'Controlwork/assessment',
                    'for_y' => $rof
                ];
                $noti->insert($data);
            }
        } else {
            $session->setFlashdata('error', 'Your action has not save');
        }

        return redirect()->back();
    }

    public function completeAssessment($id, $total_per)
    {
        $db = \Config\Database::connect();
        $session = session();
        $supplier = new SupplierModel();
        $timeline = new QualitativeTimelineAnswerModel();
        $answer = new BrandQualitativeAnswerModel();
        $find = $db->query("SELECT * from control_assessment where status = 1 and id = $id")->getResultArray();
        $sqp = $db->query("SELECT * from control_assessment where status = 1 and id = $id")->getResultArray();

        $d = $find[0];
        $weitage_per = $d['weightage_per'];
        $failed = $d['failed_per'];
        $d = $find[0];

        $com = $find[0]['complete'];
        if ($d['frequency'] == 'Monthly') {
            $complete = $com + 1;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 1 months'));
        } else if ($d['frequency'] == 'Quarterly') {
            $complete = $com + 3;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 4 months'));
        } else if ($d['frequency'] == 'Half yearly') {
            $complete = $com + 6;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 6 months'));
        } else if ($d['frequency'] == 'Yearly') {
            $complete = $com + 12;
            $d['due_date'] = date('Y-m-d', strtotime($d['completed_at'] . ' + 12 months'));
        }

        $model = new Control_assessment();
        $quali_ass_step_model = new Qualitative_assessment_step();
        $query = $model->update($id, [
            'complete' => $complete,
            'completed_at' => Date('Y-m-d'),
            'copy' => 0,
            'num_show' => 1,
        ]);
        unset($d['id'], $d['created-at'], $d['updated_at'], $d['deleted_at']);

        if ($complete != 12) {
            $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
            $rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
            $rnum = rand(1000, 999999);
            $uniq_spl_chr = ucwords('#' . $rname . '_' . $rnum);
            $d['uniq_spl'] = $uniq_spl_chr;
            $d['copy'] = 1;
            $d['complete'] = $complete;
            $d['ass_que_count'] = 0;
            $d['weightage_per'] = $weitage_per;
            $d['failed_per'] = $failed;
            $d['per_overall'] = 0;
            $model->insert($d);

            $insert_id = $model->getInsertID();
            $q_d = $quali_ass_step_model->where('control_assessment_id', $id)->findAll();
            foreach ($q_d as $key => $value) {
                $q_d[$key]['control_assessment_id'] = $insert_id;
                unset($q_d[$key]['id'], $q_d[$key]['created-at'], $q_d[$key]['updated_at'], $q_d[$key]['deleted_at']);
            }
            $quali_ass_step_model->insertBatch($q_d);
        } else {
            $query = $model->update($id, [
                'overall_submit' => '1',

            ]);
        }

        if ($query) {


            $find_new = $db->query("SELECT * from control_assessment where status = 1 and id = $id")->getResultArray();
            $complete_status =  number_format($find_new[0]['complete'] / 2);
            $ans = $answer->where('control_assesment_id', $id)->findAll();
            $ans_id = [];
            foreach ($ans as $row) {
                array_push($ans_id, $row['id']);
                $data['status'] = 2;
                $data['duration'] = $find['0']['start_date'] . '-' . $find[0]['due_date'];
                $answer->update($row['id'], $data);
            }



            $Qualitative_assessment_step = new Qualitative_assessment_step();
            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
            } else {
                $u_id = session()->supplier_info['supplier_id'];
                $find = $supplier->where('id', $u_id)->first();
                $o_id = $find['owner_id'];
            }

            $control_assessment = $db->query("SELECT ed.* FROM `control_assessment` as ed where ed.id=$id")->getResultArray();
            $weitage_per = json_decode($control_assessment[0]['weightage_per']);
            $failed_per = $control_assessment[0]['failed_per'];
            $data['a_q'] = $Qualitative_assessment_step->where('status', 1)->where('control_assessment_id', $id)->where('supplier_id', $u_id)->where('owner_id', $o_id)->findAll();
            $data['total_Q'] = count($data['a_q']);
            $total_mark = [];
            $weitagef = [];
            $percentile = 0;
            foreach ($weitage_per as $keys => $weitage) {

                $total_mark = $marka = [];
                $query_total_Marks = $db->query("SELECT  bqa.answer AS submited_array ,  bqa.indicator_id AS indicator ,amaa.marks as marks_aray, amaa.answer as answer_array,amaa.choice as choice FROM  `all_assessment_question` AS aaq JOIN brand_qualitative_answer AS bqa ON  bqa.question_id = aaq.id Join all_master_assessment_answer AS amaa ON amaa.id=bqa.answer_id WHERE bqa.status=2 and aaq.status = 1 AND bqa.control_assesment_id= $id AND bqa.indicator_id= $keys AND bqa.supplier_id = $u_id AND bqa.owner_id = $u_id ")->getResultArray();
                foreach ($query_total_Marks as $first => $firsts) {
                    $submited_answer = json_decode($firsts['submited_array']);
                    $marks_array = json_decode($firsts['marks_aray']);
                    $answer_array = $firsts['answer_array'];
                    $choice = $firsts['choice'];
                    if (($choice == 'Single' && $answer_array == 'Text') || $answer_array == "Date and Time" || $answer_array == "Media upload" || $answer_array == "Numbers") {
                        $total_mark[] = 1;
                        continue;
                    } else if ($choice == 'Single') $b = array($answer_array);

                    else $b = json_decode($answer_array);

                    if (is_array($submited_answer)) {
                        $sybmited_answer = $submited_answer;
                        foreach ($b as $key => $ans_arry) {
                            if (in_array($ans_arry, $sybmited_answer)) {
                                $r = count($sybmited_answer);
                                $marka[]  = $marks_array[$key];
                            }
                        }
                        $sybmited_answer = [];
                        $total_mark[] = array_sum($marka) / $r;
                    } else {
                        $sybmited_answerH = [$submited_answer];
                        foreach ($b as $key => $ans_arry) {
                            if (in_array($ans_arry, $sybmited_answerH)) {
                                $r = count($sybmited_answerH);
                                $total_mark[] = $marks_array[$key] / $r;
                                $sybmited_answerH = [];
                            }
                        }
                    }
                }

                $percentile += (array_sum($total_mark) / sizeof($query_total_Marks)) * $weitage;
            }




            if ($percentile >= $failed_per) {
                $passfail = 1;
            } else {
                $passfail = 0;
            }


            $a_data = [
                'answer_id' => json_encode($ans_id),
                'control_assessment_id' => $id,
                'assigned_to' => $find[0]['assigned_to'],
                'due_date' => $find[0]['due_date'],
                'start_date' => $find[0]['start_date'],
                'complete_status' => $complete_status,
                'percentile' => $percentile, //safal code
                'passfail_status' => $passfail //safal code
            ];




            $timeline->insert($a_data);
            if (session()->supplier_info['role'] == 0) {
                $o_id = session()->supplier_info['supplier_id'];
                $u_id = session()->supplier_info['supplier_id'];
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            } elseif (session()->supplier_info['role'] == 10) {
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id', $u_id)->first();
                $o_id = $id_o['owner_id'];
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            } else {
                $u_id = session()->supplier_info['supplier_id'];
                $id_o = $supplier->where('id', $u_id)->first();
                $o_id = $id_o['owner_id'];
                $msg = "The task is compleate you go and check";
                $for = $find[0]['supplier_id'];
            }
            $noti = new UserNotification();
            $empName = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
            $taskData = $find[0]['indicator'];
            $indicator_show = '';
            $indicatorModel = new IndicatorModel();
            $indicatorname = $indicatorModel->whereIn('id', json_decode($taskData))->findAll();
            foreach ($indicatorname as $key => $value) {
                if ($key == 0) {
                    $indicator_show .= $value['indicator_name'];
                } else {
                    $indicator_show .= ', ' . $value['indicator_name'];
                }
            }
            $notiempmsg = $indicator_show . ' Task assigned to ' .  $empName['supplier_name'] . ' has been successfully completed';
            $noti = new UserNotification();
            $data = [
                'msg' => $notiempmsg,
                'created_by' => $u_id,
                'owner_id' => $o_id,
                'for_y' => $for,
                'link' => 'Controlwork/assessment'
            ];
            $noti->insert($data);
            $session->setFlashdata('success', 'Your assessment has been saved successfully');
        } else {
            $session->setFlashdata('error', 'Your assessment has not save');
        }
        $ava = $db->query("select * from supplier where id='" . $for . "' ");
        $ava = $ava->getResultArray();


        $receiptemail = $ava[0]['email'];
        $detail = $supplier->where('id', $u_id)->first();
        $image = $detail['image'];
        $s_name = $ava[0]['supplier_name'];
        $department = $detail['department'];
        $supplier_name = $detail['supplier_name'];
        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        $subject = 'SUB: Task has been completed! ' . date("Y-m-d-h-i-s");;

        $t = time();
        $time_date1 = date("d-m-Y H:i:s", $t);
        $time_date2 = date("Y", $t);
        $admin_message = '';
        $admin_message .= '<html><body>';
        $admin_message .= '<div style="margin: 0 auto;width: 600px;"><div style="background:black;padding:22px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:40px; font-size:18px;border: 1px solid #ddd;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . ',</h3><p>Task has been completed by <br><img style="width:60px; border-radius:10px;margin-top:30px;"src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><hr style="color: #ddd;background: #f1f1f1;height: 1px;border: none;"><p style="margin-bottom:0px; margin-top:13px;">' . $detail['supplier_name'] . '</p><p style="margin-bottom:0px; margin-top:3px; font-size:12px;">' . $role_name . '&nbsp;' . $department . '</p><p  style="margin-bottom:13px; margin-top:13px;">
        For ' . ' Assessment on<b style="font-size:15px;"> POSITIIVPLUS</b> <b>' . ($detail['brand_name']) . '</b></p><a href="https://positiivplus.com/home/user_login" style="padding:8px 30px; color:black; border: 1px solid #caeb5d; border-radius: 5px; background: #defe73;text-decoration: none;display: inline-block;margin-top: 25px;font-size: 15px;">RECORD</a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:20px;"><span style="color:white!important;">Copyright © ' . $time_date2 . ', All Right Reserved UTOPIIC</span><div style="float: right;margin-top: 5px;font-size: 10px;">' . $time_date1 . '</div><hr style="background: #4e4848;border: none;height: 1px;margin-top: 17px;"><div style="text-align: center;margin-top: 10px;"><a href="https://www.facebook.com/Utopiic/" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/facebook.png"  style="width: 17px;"></a><a href="https://www.instagram.com/utopiic.official/?hl=en" style="margin-right: 15px;"><img src="https://positiivplus.com/public/socialicon/instagram.png"></a><a href="https://twitter.com/utopiicofficial"><img src="https://positiivplus.com/public/socialicon/tw.png"></a></div></div></div>';
        $admin_message .= '</body></html>';
        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'Assigned Task');
        $email->setTo($receiptemail);
        $email->setSubject('Task');
        $email->setMessage($admin_message);
        $a = $email->send();
        return redirect()->to('Controlwork/assessment');
    }

    public function control_assessment_update()
    {
        $db = \Config\Database::connect();
        $encrypter = \Config\Services::encrypter();
        $supplier = new SupplierModel();
        $session = session();
        $supplier_info = $session->get('supplier_info');
        $priority = $this->request->getVar("priority");
        $due_date = $this->request->getVar("due_date");
        $comment = $this->request->getVar("comment");
        $id = $this->request->getVar("id");
        $assigned_to = $this->request->getVar("assigned_to");
        $findrand = $supplier->where('id', session()->supplier_info['supplier_id'])->first();
        $rname = substr($findrand['brand_name'] . 'abcdefghijklmnop', -4);
        $rnum = rand(1000, 999999);
        $uniq_spl_chr = ucwords('#' . $rname . '_' . $rnum);
        if (session()->supplier_info['role'] == 0) {
            $o_id = session()->supplier_info['supplier_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        } elseif (session()->supplier_info['role'] == 10) {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        } else {
            $u_id = session()->supplier_info['supplier_id'];
            $id_o = $supplier->where('id', $u_id)->first();
            $o_id = $id_o['owner_id'];
            $msg = "Edit your task assign you go and check";
            $for = $assigned_to;
        }
        $control_assessment = $db->query("UPDATE control_assessment set supplier_id = " . $supplier_info['supplier_id'] . ", priority = '" . $priority . "', due_date = '" . $due_date . "', comment = '" . $comment . "', assigned_to = '" . $assigned_to . "',uniq_spl = '" . $uniq_spl_chr . "',
        owner_id = '" . $o_id . "' WHERE id = $id ");
        if ($control_assessment) {
            $noti = new UserNotification();
            $data = [
                'owner_id' => $o_id,
                'created_by' => $supplier_info['supplier_id'],
                'msg' => $msg,
                'link' => 'Controlwork/assessment',
                'for_y' => $for
            ];
            $noti->insert($data);
            $session->setFlashdata('success', 'Assessment has been update successfully');
        } else {
            $session->setFlashdata('error', ' Not update');
        }
        $ava = $db->query("select * from supplier where id='" . $assigned_to . "' ");
        $ava = $ava->getResultArray();
        $receiptemail = $ava[0]['email'];


        $receiptemail = $ava[0]['email'];
        $detail = $supplier->where('id', $o_id)->first();
        $image = $detail['image'];
        $s_name = $ava[0]['supplier_name'];
        $department = $detail['department'];
        $supplier_name = $detail['supplier_name'];
        $role = $detail['role'];
        if ($role == '10' || $role == '0') {
            $role_name = 'Admin';
        }
        if ($role == '11') {
            $role_name = 'Manager';
        }
        $subject = 'SUB: You have a new task! ' . date("Y-m-d-h-i-s");;

        $qualitative_message = '<html><body>';
        $qualitative_message .= '<div style="background:#f8f8f8; padding:50px;"><div style="box-shadow:0 4px 24px 0 rgb(34 41 47 / 10%);"><div style="background:black;padding:10px;border-top-right-radius:10px;border-top-left-radius:10px;"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png"></div><div style="background:white;"><div style="padding:15px; font-size:20px;"><h3 style="margin-top:0px;margin-bottom:13px;">Hello ' . $s_name . '</h3><h5  style="margin-top:0px;margin-bottom:13px;">A new data request has been assign from</h5><img style="height:50px; width:50px;" src="' . base_url("/") . '/public/profilimg/' . $image . '" alt="Image"/><h5 style="margin-bottom:0px; margin-top:13px;">' . $supplier_name . '</h5><h5 style="margin-bottom:0px; margin-top:13px;">' . $role_name . '&nbsp;' . $department . '</h5><h5 style="margin-bottom:13px; margin-top:13px;">For "Qualitative Task" on<b style="font-size:15px;"> POSITIIVPLUS</b></h5><a href="https://positiivplus.com/Controlwork/assessment"><button style="padding:8px 30px; color:black; border:2px solid #00a000; border-radius:6px; background:white;font-family:serif;">RECORD</button></a></div></div><div style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;background:black; color:white; padding:10px;">Copyright © 2022, All Right Reserved UTOPIIC</div></div></div>';
        $qualitative_message .= '</body></html>';

        $email = \Config\Services::email();
        $email->setFrom('info@positiivplus.com', 'Assigned Task');
        $email->setTo($receiptemail);
        $email->setSubject('Task');
        $email->setMessage($qualitative_message);
        $a = $email->send();
        return redirect()->to('Controlwork/assessment');
    }

    public function findDetails($boundary, $sub_boundary, $indicator)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT item_name FROM `supplier_module_item` WHERE id = $boundary")->getResultArray();
        $data['boundary'] = $query[0]['item_name'];
        $query = $db->query("SELECT cp_name FROM `supplier_assessment` WHERE id = $sub_boundary")->getResultArray();
        $data['sub_boundary'] = $query[0]['cp_name'];
        $query = $db->query("SELECT assessment_name FROM `assessment` WHERE id = $indicator")->getResultArray();
        $data['indicator'] = $query[0]['assessment_name'];
        return $this->response->setJSON($data);
    }

    public function ug($indicator_id, $control_id)
    {
        $db = \Config\Database::connect();
        $supplier_model = new SupplierModel();
        $supp_info = session()->supplier_info;
        $num = 0;
        if ($supp_info['role'] == 0) {
            $u_id = $o_id = $supp_info['supplier_id'];
        } else {
            $u_id = $supp_info['supplier_id'];
            $o_id = $supplier_model->where('id', $u_id)->first()['owner_id'];
        }
        $indicators_id = $db->query("SELECT indicator_category_id,id from assessment where indicator_category_id=$indicator_id and status=1")->getResultArray();
        $arr = [];
        foreach ($indicators_id as $value) $arr[] = $value['id'];

        $assessment_question_model = new AllAssessmentModel();
        $assessment_question = $assessment_question_model->where('status', 1)->whereIn('all_assessment_id', $arr)->findAll();
        $Qualitative_assessment_step = new Qualitative_assessment_step();
        $data = ['supplier_id' => $u_id, 'owner_id' => $o_id, 'indicator_id' => $indicator_id];
        $controll_query = $db->query("SELECT * from control_assessment where supplier_uniq='" . $db->query("SELECT * from control_assessment where id=$control_id and status=1")->getRow()->supplier_uniq . "'and status=1")->getResultArray();
        foreach ($controll_query as $key => $value) {
            $data['control_assessment_id'] = $value['id'];
            foreach ($assessment_question as $assessment) {
                if ($assessment['is_mandatory_needed']) {
                    if (!empty($db->query("select * from all_master_assessment_answer where status=1 and id=" . $assessment['answer'])->getResultArray())) {
                        $data['question_id'] = $assessment['answer'];
                        $data['select_question_id'] = $assessment['id'];
                        $Qualitative_assessment_step->insert($data);
                        $num += 1;
                    }
                }
            }
        }
        echo $num;
    }
}