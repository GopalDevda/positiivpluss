<table class="table table-sm table-bordered" id="example">
                            <thead class="table-light">
                                <tr>
                                    <th>S No.</th>
                                    <th>Issue</th>
                                    <th>Title_issue</th>
                                    <!--<th>description</th>-->
                                    <th>Assign From</th>
                                    <th>Caused</th>
                                    <th>Assigned</th>
                                    <th>Site</th>
                                    <!--<th>Priority</th>-->
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($join as $show) { ?>

         <?php $seperate=explode(',', $show['color']);?>


 
<tr class="btn-<?php echo ($seperate[0] != '') ? $seperate[0] : ''; ?>"<?php if($show['color']!=""){?>style="height:2rem;background-color: #FFFF00;"<?php } ?>> 

    
                   <td><?php echo $i++; ?>
                            <span class="badge rounded-pill badge-light-primary"><?php echo $show['uniq_spl']; ?></span>  
                                    </td>
                                    <td><?php echo $show['issue_name']; ?></td>
                                    <td><?php echo $show['title_issue']; ?></td>
                                    <!--<td><?php echo $show['description']; ?></td>-->
                                    <td>
                                        <div class="media">
                                            <div class="media-aside align-self-center">
                                                <a href="#" class="b-avatar badge-light-info rounded-circle"
                                                    target="_self" style="width: 32px; height: 32px;">
                                                    <span class="b-avatar-img">
                                                        <img src="<?= base_url("/")?>/public/uploads/owner/john.jpg"
                                                            alt="avatar">
                                                    </span>
                                                </a>
                                            </div>
                                                <?php   $supplier_model = new SupplierModel();
                                                        $session = session();
                                                        $sid = session()->supplier_info['supplier_id'];
                                                        $ok = $supplier_model->where('id', $sid)->first();
                                                        $dat = $ok['supplier_name'];
                                                        if(session()->supplier_info['role'] == 0){$role = 11;}else{ $role = $ok['role'];}if($role == 11){$manager = 'Manager';}else if ($role == 10){$manager = 'Admin';}?>
                                                <div class="media-body">
                                                    <a href="#" class="fw-bolder d-block text-nowrap text-dark" target="_self"><?php echo $dat; ?></a>
                                                    <small class="text-muted"><?php echo $manager;?></small>
                                                </div>
                                        </div>
                                    </td>
                                    
                                    <td><?php echo $show['coused']; ?></td>

                                    <td>
                                        <div class="media">
                                            <div class="media-aside align-self-center">
                                                <a href="#" class="b-avatar badge-light-info rounded-circle"
                                                    target="_self" style="width: 32px; height: 32px;">
                                                    <span class="b-avatar-img">
                                                        <img src="<?= base_url("/")?>/public/uploads/owner/john.jpg"
                                                            alt="avatar">
                                                    </span>
                                                    <!---->
                                                </a>
                                            </div>
                                            <div class="media-body">
                                            <a href="#" class="fw-bolder d-block text-nowrap text-dark" target="_self">

                                                <?php echo $show['supplier_name']; ?>
                                            </a>
                                                <small class="text-muted"><?php 
                                       if($show['role'] == 10){
                                         echo "Admin";
                                       }
                                       elseif($show['role'] == 11){
                                         echo "Manager";
                                       }
                                       elseif($show['role'] == 0){
                                        echo "Owner";
                                      }
                                       elseif($show['role'] == 12){
                                         echo "Emploee";
                                       }
                                       else{
                                         echo "Supplier";
                                       }
                                       ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $show['cp_name']; ?></td>
                                    <!--<td><?php echo $show['priority']; ?></td>-->
                                    <td><?php if($show['color']==""){ ?>

                                        <button type="button" data-id="<?php echo $show['id'] ?>" class="btn btn-sm dropdown-toggle hide-arrow py-0 btn-primary rrrr"
                                            >
                                                set rating
                                            </button> <?php }elseif($seperate[0]=='danger'){echo 'Fatal'; }
                                            elseif($seperate[0]=='warning'){echo 'Major';}else{echo 'Minor';}?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    onclick="side_form_open('<?php echo $show['id']; ?>')"
                                                    data-bs-target="#new-add-task-modal"> <i
                                                        class="fa solid fa-eye me-50"></i>Task
                                                </a>
                        
                            <?php if($seperate[0]!=""){?>
                            <a class="dropdown-item" value="<?php echo $show['id'];?>" href="<?php echo base_url('/step1')?>/<?php echo $show['id'];?>"> <i
                                                     
                                                        class="fa solid fa-eye me-50"></i>Open
                                                </a><?php }
                                            ?>
                        


                                                <?php if($edit == 1){?>
                                                <a id="edit" data-id="<?php echo $show['id']; ?>"
                                                    data-issue_type="<?php echo $show['issue_type']; ?>"
                                                    data-title_issue="<?php echo $show['title_issue']; ?>"
                                                    data-description="<?php echo $show['description']; ?>"
                                                    data-coused="<?php echo $show['coused']; ?>"
                                                    data-assign="<?php echo $show['assign']; ?>"
                                                    data-site="<?php echo $show['site']; ?>"
                                                    data-priority="<?php echo $show['priority']; ?>"
                                                    class="dropdown-item editbtn" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <?php }?>
                                                <?php if($delete == 1){ ?>
                                                <a class="dropdown-item ss" data-id="<?php echo $show['id'];?>">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>

                                                <?php } ?>


                                            </div>
                                        </div>
                    </div>
                    </td>
        </tr>
     
        

                    <?php  } ?>

                    </tbody>
                    </table>