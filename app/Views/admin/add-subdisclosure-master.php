<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Sub Disclosure</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#" onclick="addDisclosure()"
                            class='btn btn-primary'><i class="fa fa-plus"></i> Add Master</a> </li>
                        </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <?php
                            if($session->get('success')){?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $session->get('success');?>
                            </div>
                            <?php } ?>
                            <?php
                            if($session->get('error')){?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $session->get('error');?>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Module List</h3>
                                        </div>
                                       <?php
                                        if(!empty($list)){?>
                                        <table class="table table-bordered table-hover" id="datatables">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                   
                                                    
                                                    <th>Title</th>
                                                    <th>Sub Clasification</th>
                                                    <th>Formula/answer</th> 
                                                    <th>Action</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $s=1;
                                                foreach($list as $d){?>
                                                
                                                    <td><?php echo $s;?></td>
                                                  

                                                    <td><?php echo $d['title'];?></td>
                                                     <td><?php  foreach ($sub_clasii as $key => $value) 
                                                    {
                                                        $sub_classifiction =  json_decode($d['sub_clasifiction']);
                                                     if(in_array($value['id'],$sub_classifiction))
                                                     {
                                                        echo $value['sub_classification_name'];
                                                        echo '<br>';
                                                     }  
                                                    }  

                                                ?></td>
                                                  <!--   <td><?php $boundary =  json_decode($d['boundary_id']);
                                                               if($boundary){ 
                                                               foreach($boundary as $boundary_id)
                                                               {
                                                                if($boundary_id == '1'){
                                                                    echo 'Sites,';
                                                                }if($boundary_id == '2'){
                                                                    echo 'Supplier,';
                                                                }if($boundary_id == '3'){
                                                                    echo 'Products,';
                                                                }if($boundary_id == '4'){
                                                                    echo 'Projects';
                                                                }
                                                               }
                                                           }
                                                ?></td> -->
                                                    <td><?php if($d['action'] == '1'){echo 'Formula';}if($d['action'] == '2'){echo 'Answer';}?></td>
                                                   <!--  <td><?php if($d['type_option'] == '1'){echo 'Listing';}if($d['type_option'] == '2'){echo 'Multiselect';}?></td> -->
                                                    <!-- <td><?php echo $d['answer_option'];?></td> -->
                                                 <!--    <td><?php  foreach ($sub_clasii as $key => $value) 
                                                    {
                                                     if($value['id'] == $d['sub_classifiction_1'])
                                                     {
                                                        echo $value['sub_classification_name'];
                                                     }  
                                                    }  

                                                ?></td> -->
                                                    <!-- <td><?php echo $d['opreator'];?></td> -->
                                                <!--     <td>
                                               <?php  foreach ($sub_clasii_id as $key => $sub_clasii_i) 
                                                    {
                                                      $k =  json_decode($d['sub_classifiction_2']);
                                                    if(in_array($sub_clasii_i['id'], $k))
                                                     {
                                                        echo $sub_clasii_i['sub_classification_name'];
                                                        echo '<br>';
                                                     }  
                                                    }  

                                                ?>
                                                   </td> -->
                                                                                                 
                                        
                                                   
                                                    <td>
                                                        <a class="btn btn-primary"   href="javascript:void(0);"
                                                            onclick="editDisclosure(this)"
                                                            data-name='<?php echo $d['title'];?>'
                                                            data-id='<?php echo $d['id'];?>'
                                                            data-action_id='<?php echo $d['action'];?>'
                                                            data-boundary_id='<?php echo $d['boundary_select'];?>'
                                                            data-subclassifiction='<?php echo $d['sub_clasifiction'];?>'
                                                            data-boundary='<?php echo $d['boundary_id'];?>'
                                                            data-dateoption='<?php echo $d['date_option']; ?>'
                                                            data-typeoption='<?php echo $d['type_option']; ?>'
                                                            data-value='<?php echo $d['total_value']; ?>'
                                                            data-answeroption='<?php echo $d['answer_option']; ?>'
                                                            data-subclassifiction_1='<?php echo $d['sub_classifiction_1']; ?>'
                                                            data-subclassifiction_2='<?php echo $d['sub_classifiction_2']; ?>'
                                                        data-opreator='<?php echo $d['opreator']; ?>'><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-danger"
                                                            href="<?php echo base_url()?>/master/deleteMasterDis/<?php echo $d['id'];?>"
                                                            onclick="return confirm('Do you want to delete?');"><i
                                                        class="fa fa-trash"></i>
                                                        </a> 
                                                        <a class="btn btn-success"  onclick="master_view(this)" data-name="<?php echo $d['id'];?>"><i
                                                        class="fa fa-eye"></i>
                                                        </a>
                                                       
                                   
                                                    </td>
                                                </tr>
                                                 <?php $s++;}?>  
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    </div>
                    <div id="master_data_view"></div>
                    <!--Standard Model info Start-->
                    <div class="modal fade" id="modal-standard">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              <div id="labelstandard"></div>
                                 <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--Standard Model info End-->
                    
                    <!--Classification Model Info start-->
                    <div class="modal fade" id="modal-classification">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              <div id="labelclassification"></div>
                                 <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--Classification Model Info End-->
                    
                     <!--Sub Classification Model Info start-->
                    <div class="modal fade" id="modal-sub-classification">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              <div id="labelsubclassification"></div>
                                 <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--Sub Classification Model Info End-->
                    
                    <!--Sub Disclosure Model Info start-->
                    <div class="modal fade" id="modal-sub-disclosure">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              <div id="labelsubdisclosure"></div>
                                 <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <!--Sub Disclosure Model Info End-->
                   
                     <div class="modal fade" id="modal-sub-disclosure" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                                   <div class="modal-dialog modal-dialog-centered modal-xl">
                                                      <div class="modal-content">
                                                         <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                         </div>
                                                         <div id="labelsubdisclosure"></div>
                                                         <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                         </div>
                                                      </div>
                                                      <!-- /.modal-content -->
                                                   </div>
                                                   <!-- /.modal-dialog -->
                      </div>
                                                
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" 
                                    action="<?php echo base_url();?>/master/master_addtion_subDiss">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Master</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    
                                                    <label for="ghg_name">Title Name</label>
                                                    <input type="text" required="required" class="form-control"
                                                    placeholder="Enter Title Name" name="name" id="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Action</label>
                                                    <select class="form-control" name="sub_action" onchange="action_dtaat(value);">
                                                    <option value="">Select type</option>
                                                    <option value="1">Formula</option>
                                                    <option value="2">Answer</option>
                                                    </select>
                                                    
                                                </div> 

                                                <div class="form-group">
                                                    <label for="ghg_name">Sub clasification</label>
                                                    <select class="form-control select2" name="sub_classifiction[]" multiple="multiple" id="sub" required>
                                                    <option value="">Select sub-clasification</option>
                                                    <?php foreach ($sub_clasii as $key => $value) {
                                                     foreach ($sub_classification as $key => $sub_classification_id) {
                                                               $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                                                               if(in_array($value['id'],$sub_cla)){

                                                               ?>
                                                  
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option>
                                                <?php 
                                               }
                                             }
                                            }
                                               ?>
                                                    
                                                    </select>
                                                   
                                                </div>
                                            <div class="answer_div" style="display:none;">
                                                <div class="form-group">
                                                    <label for="ghg_name">Type</label>
                                                    <select class="form-control" name="type[]">
                                                    <option value="">Select type</option>
                                                    <option value="1">listing</option>
                                                    <option value="2">multiselect</option>
                                                    <option value="3">Comment</option>
                                                    <option value="4">Value</option>
                                                    </select>
                                                    
                                                </div> 
                                            
                                                <div class="form-group">
                                                    <label for="ghg_name">Answer option</label>
                                                    <select class="form-control"  name="answer_option[]">
                                                    <option value="">Select type</option>
                                                    <?php foreach ($option_answer as $key => $value) {?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['answer_name'];?></option>
                                                    <?php
                                                }
                                                ?>    
                                                    </select>                                                   
                                                </div>
                                                <div>
                                                 <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDivkK()" ><i class="fa fa-plus"></i></button>     
                                     </div>
                                      <span class="stand_and_classific_divKK"></span>

                                               <div class="form-group">
                                                    <label for="ghg_name">Boundary</label>
                                                    <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input class="px-3" type="checkbox"  value="1"  name="boundary_select" id="l" onclick="typeId(this)">
                                                    <label class="px-3" >No</label>
                                                    <input class="px-3" type="checkbox" value="2"  name="boundary_select" id="ll" onclick="typeId(this)" checked> 
                                                    </div>
                                                </div>

                                                 <div class="form-group" id="typeshow" style="display: none;">
                                                    <select class="form-control select2" name="boundary_id[]" id="boundary" multiple="multiple">
                                                    <option value="">Select Boundary</option>
                                                    <option value="1">Site</option>
                                                    <option value="2">Supplier</option>
                                                    <option value="3">Products</option>
                                                    <option value="4">projects</option>
                                                    </select>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="ghg_name">Date</label>
                                                    <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input class="px-3" type="checkbox" id="date1"  value="1"  name="date_period" >
                                                    <label class="px-3" >No</label>
                                                    <input class="px-3" type="checkbox" id="date2" value="2"  name="date_period" > 
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Total value</label>
                                                <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input  type="checkbox"  id="inlineRadio1"  name="total_value" value="1"/>
                                                    <label class="px-3" >No</label>
                                                    <input  type="checkbox"   id="inlineRadio2" name="total_value" value="2"/> 
                                                </div>

                                                </div>
                                            </div>

                                            <div class="formula_div" style="display:none;">  
                                                 <div class="form-group">
                                                    <label for="ghg_name">Sub clasification-1</label>
                                                    <select class="form-control" name="subClasii_1">
                                                    <option value="">Select sub-clasification</option>
                                                    <?php foreach ($sub_clasii as $key => $value) {
                                                     foreach ($sub_classification as $key => $sub_classification_id) {
                                                               $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                                                               if(in_array($value['id'],$sub_cla)){

                                                               ?>
                                                  
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option>
                                               <?php 
                                           }
                                       }
                                       }
                                               ?>
                                                    
                                                    </select>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Opreator</label>
                                                    <select class="form-control" name="opreator[]">
                                                    <option value="">Select Opreator</option>
                                                    <option value="-">-</option>
                                                    <option value="+">+</option>
                                                    <option value="*">*</option>
                                                    <option value="/">/</option>
                                                    </select>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Sub clasification-2</label>
                                                    <select class="form-control" name="subClasii_2[]">
                                                    <option value="">Select sub-clasification</option>
                                                    <?php foreach ($sub_clasii as $key => $value) {
                                                     foreach ($sub_classification as $key => $sub_classification_id) {
                                                               $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                                                               if(in_array($value['id'],$sub_cla)){

                                                               ?>
                                                  
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option>
                                               <?php 
                                           }
                                       }
                                       }
                                               ?>
                                                    </select>
                                                   
                                                </div>
                                             
                                            <div>
                                                 <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDivk()" ><i class="fa fa-plus"></i></button>     
                                     </div></div>
                                          
                                                <span class="stand_and_classific_divK"></span>
                                                <!--End-->
                                                <!-- <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Unit</label>
                                                    <select name="unit_id" required="required" class="form-control">
                                                        <option value="">Select Unit </option>
                                                        <?php
                                                        if($unit) {
                                                        foreach($unit as $cat) {
                                                        ?>
                                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['unit_name'] ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div> -->
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    
                     <!--Sub Disclousre Add Form Start-->
                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" 
                                    action="<?php echo base_url();?>/master/master_edit_subDiss">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Edit Master</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="edit_id" id="edit_id">
                                                    
                                                    <label for="ghg_name">Title Name</label>
                                                    <input type="text" required="required" class="form-control"
                                                    placeholder="Enter Title Name" name="name" id="edit_title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Action</label>
                                                    <select class="form-control" name="sub_action" id="action_id" onchange="action_dtaat(value);">
                                                    <option value="">Select type</option>
                                                    <option value="1">Formula</option>
                                                    <option value="2">Answer</option>
                                                    </select>   
                                                </div> 

                                                <div class="form-group">
                                                    <label for="ghg_name">Sub clasification</label>
                                                    <select class="form-control select2" name="sub_classifiction[]" multiple="multiple" id="sub_classifiction_select" required>
                                                    <option value="">Select sub-clasification</option>
                                                    <?php foreach ($sub_clasii as $key => $value) {
                                                     foreach ($sub_classification as $key => $sub_classification_id) {
                                                               $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                                                               if(in_array($value['id'],$sub_cla)){

                                                               ?>
                                                  
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option>
                                                <?php 
                                               }
                                             }
                                            }
                                               ?>
                                                
                                                    </select>
                                                   
                                                </div>
                                            <div class="answer_div" style="display:none;">
                                               <div id="show_type_optionanswer"></div>
                                                <div>
                                                 <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDivkK()" ><i class="fa fa-plus"></i></button>     
                                     </div>
                                      <span class="stand_and_classific_divKK"></span>

                                               <div class="form-group">
                                                    <label for="ghg_name">Boundary</label>
                                                    <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input class="px-3" type="checkbox"  value="1"  name="boundary_select" id="boundary_editYes" onclick="show_boundary(this)">
                                                    <label class="px-3" >No</label>
                                                    <input class="px-3" type="checkbox" value="2"  name="boundary_select" id="boundary_editNo" onclick="show_boundary(this)" > 
                                                    </div>
                                                </div>

                                                 <div class="form-group" id="typeshow_boundary" style="display: none;">
                                                    <select class="form-control select2" name="boundary_id[]" id="boundary_edit" multiple="multiple">
                                                    <option value="">Select Boundary</option>
                                                    <option value="1">Site</option>
                                                    <option value="2">Supplier</option>
                                                    <option value="3">Products</option>
                                                    <option value="4">projects</option>
                                                    </select>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="ghg_name">Date</label>
                                                    <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input class="px-3" type="checkbox" id="date1_edit"  value="1"  name="date_period_edit" >
                                                    <label class="px-3" >No</label>
                                                    <input class="px-3" type="checkbox" id="date2_edit" value="2"  name="date_period_edit" > 
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ghg_name">Total value</label>
                                                <div class="form-group">
                                                     <label class="px-3">Yes</label>
                                                    <input  type="checkbox"  id="edit_value1"  name="total_value_edit" value="1"/>
                                                    <label class="px-3" >No</label>
                                                    <input  type="checkbox"   id="edit_value2" name="total_value_edit" value="2"/> 
                                                </div>

                                                </div>
                                            </div>

                                            <div class="formula_div" style="display:none;">  
                                                 <div class="form-group">
                                                    <label for="ghg_name">Sub clasification-1</label>
                                                    <select class="form-control" name="subClasii_1" id="subclassi_edit">
                                                    <option value="">Select sub-clasification</option>
                                                    <?php foreach ($sub_clasii as $key => $value) {
                                                     foreach ($sub_classification as $key => $sub_classification_id) {
                                                               $sub_cla = json_decode($sub_classification_id['sub_clasification']);
                                                               if(in_array($value['id'],$sub_cla)){

                                                               ?>
                                                  
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option>
                                               <?php 
                                           }
                                       }
                                       }
                                               ?>
                                                    
                                                    </select>
                                                   
                                                </div>
                                                <div id="opreator_answer_show"></div>
                                             
                                            <div>
                                                 <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDivk()" ><i class="fa fa-plus"></i></button>     
                                     </div></div>
                                          
                                                <span class="stand_and_classific_divK"></span>
                                                <!--End-->
                                                <!-- <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Unit</label>
                                                    <select name="unit_id" required="required" class="form-control">
                                                        <option value="">Select Unit </option>
                                                        <?php
                                                        if($unit) {
                                                        foreach($unit as $cat) {
                                                        ?>
                                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['unit_name'] ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div> -->
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    
                   

                    
                     <!--Sub Disclousre Add Form End-->
                    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
                    crossorigin="anonymous"></script>
                    <script>
  function addStandAndClassificDivkK(){
      $('.stand_and_classific_divKK').append('<div class="SstandDivv"> <div class="form-group"><label for="ghg_name">Type</label>     <select class="form-control" name="type[]"><option value="">Select type</option> <option value="1">listing</option> <option value="2">multiselect</option><option value="3">Comment</option><option value="4">Value</option> </select> </div>  <div class="form-group"> <label for="ghg_name">Answer option</label> <select class="form-control"  name="answer_option[]"> <option value="">Select type</option> <?php foreach ($option_answer as $key => $value) {?> <option value="<?php echo $value['id'];?>"><?php echo $value['answer_name'];?></option> <?php } ?>  </select> </div> <div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDivkK()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.SstandDivv').remove();



  });  
</script>
<script>
  function addStandAndClassificDivk(){
      $('.stand_and_classific_divK').append('<div class="standDiv"><div class="form-group"> <div class="form-group"><label for="ghg_name">Opreator</label><select class="form-control" name="opreator[]"> <option value="">Select Opreator</option><option value="-">-</option><option value="+">+</option><option value="*">*</option><option value="/">/</option></select> </div><div class="form-group"><label for="ghg_name">Sub clasification-2</label><select class="form-control" name="subClasii_2[]"><option value="">Select sub-clasification</option> <?php foreach ($sub_clasii as $key => $value) { foreach ($sub_classification as $key => $sub_classification_id) { $sub_cla = json_decode($sub_classification_id['sub_clasification']); if(in_array($value['id'],$sub_cla)){ ?> <option value="<?php echo $value['id']; ?>"><?php echo $value['sub_classification_name']; ?></option> <?php } } } ?></select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDivk()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(document).ready(function($) {
  $("input[name='total_value']").click(function() {
   var id =   $(this).val();
 if (id == 1) {
    $("#inlineRadio2").prop('checked',false);
    $("#inlineRadio1").prop('checked',true);
 }
 if (id == 2) {
    $("#inlineRadio2").prop('checked',true);
    $("#inlineRadio1").prop('checked',false);

 }
        
  });
});
</script>
<script>

$(document).ready(function($) {
  $("input[name='date_period']").click(function() {
   var id =   $(this).val();
 if (id == 1) {
    $("#date2").prop('checked',false);
    $("#date1").prop('checked',true);
 }
 if (id == 2) {
    $("#date2").prop('checked',true);
    $("#date1").prop('checked',false);

 }
        
  });
});
</script>
<script>

$(document).ready(function($) {
  $("input[name='date_period_edit']").click(function() {
   var id =   $(this).val();
 if (id == 1) {
    $("#date2_edit").prop('checked',false);
    $("#date1_edit").prop('checked',true);
 }
 if (id == 2) {
    $("#date2_edit").prop('checked',true);
    $("#date1_edit").prop('checked',false);

 }
        
  });
});
</script>
<script>

$(document).ready(function($) {
  $("input[name='total_value_edit']").click(function() {
   var id =   $(this).val();
 if (id == 1) {
    $("#edit_value2").prop('checked',false);
    $("#edit_value1").prop('checked',true);
 }
 if (id == 2) {
    $("#edit_value1").prop('checked',false);
    $("#edit_value2").prop('checked',true);

 }
        
  });
});
</script>

                    <script type="text/javascript">
            
    function getclassification(id,name) {
        
        var product_id=$("#id").val(id);
        $.ajax({
            url : "<?php echo base_url()?>/master/getmanuprocess/"+id+"/"+name,
            type: "GET",
            success: function(data){
                // alert(data);
                $("#labelcountry").html(data);
                $("#getcountry").modal('show');
            },
            error: function(xhr, status, error){
                // alert('error');

            }
        });
    } 
    
    // Standard Function Info start    
    function getstandardoninfoprocess(name) {
        
        $.ajax({

            url : "<?php echo base_url()?>/master/getstandardoninfoprocess/"+name,

            type: "GET",

            success: function(data){

            $("#labelstandard").html(data);

            $("#modal-standard").modal('show');

            },
        error: function(xhr, status, error){

            }

        });

    }
    
    // Classification Function Info start    
    function getClassidficationoninfoprocess(name) {
        
        $.ajax({

            url : "<?php echo base_url()?>/master/getClassidficationoninfoprocess/"+name,

            type: "GET",

            success: function(data){

            $("#labelclassification").html(data);

            $("#modal-classification").modal('show');

            },
        error: function(xhr, status, error){

            }

        });

    }
    
    // Sub Classification Function Info start    
    function getSubClassidficationoninfoprocess(name) {
        
        $.ajax({

            url : "<?php echo base_url()?>/master/getSubClassidficationoninfoprocess/"+name,

            type: "GET",

            success: function(data){

            $("#labelsubclassification").html(data);

            $("#modal-sub-classification").modal('show');

            },
        error: function(xhr, status, error){

            }

        });

    }
    
    // Sub  Disclosure Function Info start    
    function getSubDisclosureoninfoprocess(name) {
        
        $.ajax({

            url : "<?php echo base_url()?>/master/getSubDisclosureoninfoprocess/"+name,

            type: "GET",

            success: function(data){

            $("#labelsubdisclosure").html(data);

            $("#modal-sub-disclosure").modal('show');

            },
        error: function(xhr, status, error){

            }

        });

    }
                
                    
                    function editDisclosure(that) {
                   

                        
                    var boundary = $(that).attr('data-boundary');
                    var id = $(that).attr('data-id');
                    var name = $(that).attr('data-name');
                    var action = $(that).attr('data-action_id');
                    var boundary_id = $(that).attr('data-boundary_id');
                    var subclassifiction = $(that).attr('data-subclassifiction');
                    var dateoption = $(that).attr('data-dateoption');
                    var typeoption = $(that).attr('data-typeoption');
                    var answer = $(that).attr('data-answeroption');

                    var subClass1 = $(that).attr('data-subclassifiction_1');
                    // var myArr = JSON.parse(sub_classification_id);
                    var subClass2 = $(that).attr('data-subclassifiction_2');
                    var opreator = $(that).attr('data-opreator');
                    var value = $(that).attr('data-value');
                   
                    var subclassifiction_decode = $.parseJSON(subclassifiction);
                    var boundary_decode = $.parseJSON(boundary);
                    var answer_decode = $.parseJSON(answer);
                    var typeoption_decode = $.parseJSON(typeoption);
                    if(action == 1){
                    $.ajax({

                    url: "<?php echo base_url()?>/master/edit_type_answeroption/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                        // alert(data);
                    // $("#show_type_optionanswer").html(data);
                    $("#opreator_answer_show").html(data);

                    },
                    error: function(xhr, status, error) {
                    }

                    });
                 } 
                 if(action == 2){
                    $.ajax({

                    url: "<?php echo base_url()?>/master/edit_type_answeroption_dd/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                        // alert(data);
                    $("#show_type_optionanswer").html(data);
                    // $("#opreator_answer_show").html(data);

                    },
                    error: function(xhr, status, error) {
                    }

                    });
                 }

                    $('#type_option').val(typeoption);
                 
                    if(value == 1)
                    {
                    $('#edit_value1').prop('checked',true);   
                    } if(value == 2)
                    {
                    $('#edit_value2').prop('checked',true);   
                    }

                    if(dateoption == 1)
                    {
                    $('#date1_edit').prop('checked',true);   
                    } if(dateoption == 2)
                    {
                    $('#date2_edit').prop('checked',true);   
                    }

                    if(action == 1){
                    $('.formula_div').show();
                    $('.answer_div').hide();      
                    } 
                    if(action == 2)
                    {
                    $('.answer_div').show();
                    $('.formula_div').hide();
                    }


                    if(boundary_id == 1){
                    $('#boundary_editYes').prop('checked',true);   
                    $('#typeshow_boundary').show();
                    } 
                    if(boundary_id == 2){
                    $('#boundary_editNo').prop('checked',true);   

                    }

                    
                   
                    $('#edit_title').val(name);
                    $('#action_id').val(action);
                    $('#edit_id').val(id);
                    $('#sub_classifiction_select').val(subclassifiction_decode);
                    $('#boundary_edit').val(boundary_decode);
                    $('#subclassi_edit').val(subClass1);
                    $('#subclassi2').val(subClass2);
                    $('#opreator').val(opreator);
                    // $("#disclosure_cat_"+category).attr("selected","selected");
                       // $('select').select2();
                    $('#modal-edit').modal('show');

                    }

                     function master_view(that) {
                     var id = $(that).attr('data-name');
           // alert(id);
                    $.ajax({
                    url: "<?php echo base_url()?>/master/master_data_view/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $("#labelsubdisclosure").html(data);
         $("#modal-sub-disclosure").modal('show');
                    },
                    error: function(xhr, status, error) {
                    }
                    });
                    }

                    function addDisclosure() {
                    $('#modal-add').modal('show');
                    }

                    function getClassificationByStandard(that) {
                    var standard_id = $(that).val();
                    $.ajax({
                    url: "<?php echo base_url()?>/master/getClassificationByStandard/" + standard_id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $("#classification").html(data);
                    },
                    error: function(xhr, status, error) {
                    }
                    });
                    }

                    function getClassificationByStandardForEdit(that) {
                    var standard_id = $(that).val();
                    $.ajax({
                    url: "<?php echo base_url()?>/master/getClassificationByStandard/" + standard_id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $("#classification_id").html(data);
                    },
                    error: function(xhr, status, error) {
                    }
                    });
                    }
                    function getsubClassificationByClassificationForEdit(that) {
                    var classification_id = $(that).val();
                    $.ajax({
                    url: "<?php echo base_url()?>/master/getSubClassificationByClassification/" + classification_id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $("#sub_classification_id").html(data);
                    },
                    error: function(xhr, status, error) {
                    }
                    });
                    }
                    function getClassification(id, i) {
                    $.ajax({
                    url: "<?php echo base_url()?>/assessment/getClassification/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $('#classificationDiv_' + i).html(data);
                    },
                    error: function(xhr, status, error) {
                    $('#classificationDiv_' + i).html('<option value="">Select Classification</option>');
                    }
                    });
                    } 
                    function subDisclouser(name,id) {
                        
                        $.ajax({
                                url : "<?php echo base_url()?>/master/getSubDisclosureinfoprocess/"+id,
                                type: "GET",
                                success: function(data){
                                // alert(data);
                                $("#subdisclosurelabel").html(data);
                               
                                },
                                error: function(xhr, status, error){
                                // alert('error');
                                }
                        });
                        
                        $('#disclosure_name_sub').val(name);
                        $('#modal-addDisclosure').modal('show');
                   
                    } 

                    function subDisclousedit(name,id) {
                    
                     // $("#modal-sub-disclosure").modal('hide');
                     
                        $.ajax({
                                url : "<?php echo base_url()?>/master/subdisedit/"+name+"/"+id,
                                type: "GET",
                                success: function(data){
                                   
                                $("#editsubdisclos").html(data);
                               
                                },
                                error: function(xhr, status, error){
                                // alert('error');
                                }
                        });
                        
                        $('#edit_sub_disclosure_name').val(id);
                        $('#modal-editDisclosure').modal('show');
                   
                    }

                    function getSubClassification(id, i) {
                    $.ajax({
                    url: "<?php echo base_url()?>/assessment/getSubClassification/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $('#sub_classification_name_' + i).html(data);
                    },
                    error: function(xhr, status, error) {
                    $('#sub_classification_name_' + i).html('<option value="">Select Sub Classification</option>');
                    }
                    });
                    }
                    var i = 1;
                    
                    function showdata(that) {
                    var id = $(that).val();
                    if (id == 11) {
                    $('.ttt').show();
                    // $('#showPlus').show();
                    // $('#singleTypeAnswer').hide();
                    // $('#multitypeanser').show();
                    } else {
                    $('.ttt').hide();
                    }
                    // else
                    // {
                    //      $('#showoption').hide();
                    //      $('#showPlus').hide();
                    //      $('#multitypeanser').hide();
                    //      $('#singleTypeAnswer').show();
                    // }
                    }
                    function typeId(that) {
                    var id = $(that).val();
                   
                    if (id == 1) {
                        
                    $('#typeshow').show();
                    $('#l').prop('checked',true);
                    $('#ll').prop('checked',false);

                   
                    }
                     else 
                     {
                    $('#typeshow').hide();
                    $('#ll').prop('checked',true);
                    $('#l').prop('checked',false);


                    }
                    
                    } 
                    function show_boundary(that) {
                    var id = $(that).val();
                   
                    if (id == 1) {
                        
                    $('#typeshow_boundary').show();
                    $('#boundary_editYes').prop('checked',true);
                    $('#boundary_editNo').prop('checked',false);

                   
                    }
                     else 
                     {
                    $('#typeshow_boundary').hide();
                    $('#boundary_editNo').prop('checked',true);
                    $('#boundary_editYes').prop('checked',false);


                    }
                    
                    }
                    function action_dtaat(that) {
                   
                  
                    if (that == 1) {
                        
                    $('.formula_div').show();
                    $('.answer_div').hide();

                   
                   
                    } 
                    if (that == 2) {
                        
                    $('.answer_div').show();
                    $('.formula_div').hide();

                   
                    }
                   
                    
                    }

                    function addStandAndClassificDiv() {
                    stand_opt = '<?php echo $stand_opt ?>';
                    
                    $('.stand_and_classific_div').append(
                    '<div class="standDiv"><div class="form-group"><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Standard</label><select name="standard[]" id="standard[]" required="required" class="form-control" onchange="getClassification(this.value,' +
                    i + ');"><option value="">Select Standard</option>' + stand_opt +
                    '</select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="classification[]" id="classificationDiv_' +
                    i +
                    '" required="required" class="form-control"onchange="getSubClassification(this.value,' +i + ');"><option value="">Select Classification</option></select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Sub Classification</label><select name="sub_classification_name'+i+'[]" id="sub_classification_name_' +
                    i +
                    '" required="required" class="form-control select2" multiple="multiple" ><option value="">Select Sub Classification</option></select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div><br>'
                    );
                    i += 1;
                    }
                    function addStandAndClassific() {
                    stand_opt = '<?php echo $stand_opt ?>';
                    
                    $('.stand_and_classific').append(
                    '<div class="standDiv"><div class="form-group"><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Standard</label><select name="standard_id[]" id="standard[]" required="required" class="form-control" onchange="getClassification(this.value,' +
                    i + ');"><option value="">Select Standard</option>' + stand_opt +
                    '</select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="classification_id[]" id="classificationDiv_' +
                    i +
                    '" required="required" class="form-control"onchange="getSubClassification(this.value,' +i + ');"><option value="">Select Classification</option></select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Sub Classification</label><select name="sub_classification_id'+i+'[]" id="sub_classification_name_' +
                    i +
                    '" required="required" class="form-control select2" multiple="multiple" ><option value="">Select Sub Classification</option></select></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassific()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div><br>'
                    );
                    i += 1;
                    }
                    
                    $(document).on('click', '.remove_stand_and_classific_block', function() {
                    $(this).closest('.standDiv').remove();
                    });
                    </script>
                    <?php include('include/footer.php');?>
             
