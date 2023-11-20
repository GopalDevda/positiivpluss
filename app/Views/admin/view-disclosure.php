<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Disclosure Management</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#" onclick="addDisclosure()"
                            class='btn btn-primary'><i class="fa fa-plus"></i> Add Disclosure</a> </li>
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
                                                    <th>Disclosure Name </th>
                                                    <th>Disclosure Category</th>
                                                    <th>Standard Name</th>
                                                    <th>Classification Name</th>
                                                    <th>Sub Classification </th>
                                                    <th>Sub Disclosure</th>
                                                    <!-- <th>Unit</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $s=1;
                                                foreach($list as $d){?>
                                                <tr>
                                                    <td><?php echo $s;?></td>
                                                    <td><?= $d['disclosure_name'] ?></td>
                                                    <td><?php echo $d['disclosure_category_name'];?></td>
                                                    <td><a class="btn btn-primary" href="javascript:void(0);" button 
                                                        onclick="getstandardoninfoprocess('<?php echo $d['id']; ?>')" ><i class="fa fa-info"></i></a></td>
                                                    <td><a class="btn btn-primary" href="javascript:void(0);" button 
                                                        onclick="getClassidficationoninfoprocess('<?php echo $d['id']; ?>')" ><i class="fa fa-info"></i></a></td>
                                                    <td><a class="btn btn-primary" href="javascript:void(0);" button 
                                                        onclick="getSubClassidficationoninfoprocess('<?php echo $d['id']; ?>')" >Sub Classification</a></td>
                                                    <td><a class="btn btn-primary" href="javascript:void(0);" button 
                                                        onclick="getSubDisclosureoninfoprocess('<?php echo $d['id']; ?>')" >Sub Disclosure</a></td>
                                        
                                                    <!-- <td><?php echo $d['unit_name'];?></td> -->
                                                    <td>
                                                        <a class="btn btn-primary"   href="javascript:void(0);"
                                                            onclick="editDisclosure(this)"
                                                            data-name='<?php echo $d['disclosure_name'];?>'
                                                            data-number='<?php echo $d['id'];?>'
                                                            data-category='<?php echo $d['disclosure_category_id']; ?>'
                                                            data-standard_id='<?php echo $d['standard_id']; ?>'
                                                            data-classification_id='<?php echo $d['classification_id']; ?>'
                                                            data-sub-classification_id='<?php echo $d['sub_classification_id']; ?>'
                                                        data-unit_id='<?php echo $d['unit_id']; ?>'><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-danger"
                                                            href="<?php echo base_url()?>/master/deleteDisclosure/<?php echo $d['id'];?>"
                                                            onclick="return confirm('Do you want to delete?');"><i
                                                        class="fa fa-trash"></i>
                                                        </a>
                                                        <a class="btn btn-success" href="javascript:void(0);" onclick="subDisclouser('<?php echo $d['disclosure_name']; ?>','<?php echo $d['id']; ?>')">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                       <!--  <a class="btn btn-warning" href="<?php echo base_url();?>/master/subdis_managment">
                                                            <i class="fa fa-plus"></i>
                                                        </a> -->
                                   
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
                    
                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="disclosure-form" id="disclosure-form"
                                    action="<?php echo base_url();?>/master/editDisclosure">
                                    <input type="hidden" name="id" id="disclosure_id" value="" required="required">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Update Disclosure</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Disclosure Name</label>
                                                    <input type="text" required="required" class="form-control"
                                                    placeholder="Enter Disclosure Name" name="name" id="disclosure_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Disclosure Category</label>
                                                    <select name="category_id" id="disclosure_category_id" required="required"
                                                        class="form-control">
                                                        <option value="">Select Category </option>
                                                        <?php
                                                        if($disclosure_category) {
                                                        foreach($disclosure_category as $cat) {
                                                        ?>
                                                        <option id="disclosure_cat_<?php echo $cat['id'] ?>"
                                                            value="<?php echo $cat['id'] ?>"><?php echo $cat['disclosure_category_name'] ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                              
                                               
                                                   <div id="labeledit"></div>
                                               
                                                <div class="col-md-2 d-none" style="float: left;">
                                                        <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                        <button type="button" class="btn btn-primary" onclick="addStandAndClassific()"><i
                                                        class="fa fa-plus"></i></button>

                                                    </div>
                                                <span class="stand_and_classific"></span>

                                               
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
                    
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="disclosure-form" id="disclosure-form"
                                    action="<?php echo base_url();?>/master/addDisclosure">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Disclosure</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="ghg_name">Disclosure Name</label>
                                                    <input type="text" required="required" class="form-control"
                                                    placeholder="Enter Disclosure Name" name="name" id="disclosure_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Disclosure Category</label>
                                                    <select name="category_id" id="disclosure_category_id" onchange="showdata(this);"
                                                        required="required" class="form-control">
                                                        <option value="">Select Category </option>
                                                        <?php
                                                        if($disclosure_category) {
                                                        foreach($disclosure_category as $cat) {
                                                        ?>
                                                        <option value="<?php echo $cat['id'] ?>">
                                                        <?php echo $cat['disclosure_category_name'] ?></option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div style="display:none;" class="form-group ttt">
                                                    <label for="exampleInputEmail1">Indicator Name</label>
                                                    <select id="indicator" name="indicator" required="required" class="form-control">
                                                        <option value="null">Select Indicator </option>
                                                        <?php
                                                        foreach($aa as $d){?>
                                                        <option value="<?php echo $d['id'];?>"><?php echo $d['indicator_name'];?></option>
                                                        <?php   }?>
                                                    </select>
                                                </div>
                                                <?php
                                                ?>
                                                <?php
                                                ?>
                                                <div class="form-group">
                                                    <div class="col-md-3" style="float: left;">
                                                        <label for="exampleInputEmail1">Standard</label>
                                                        <select name="standard[]" id="standard[]" class="form-control"
                                                            onchange="getClassification(this.value,0);">
                                                            <option value="">Select Standard</option>
                                                            <?php
                                                            $stand_opt = "";
                                                            if(!empty($standard)) {
                                                            foreach($standard as $stand) {
                                                            $stand_opt.='<option value="'.$stand['id'].'">'.$stand['standard_name'].'</option>';
                                                            ?>
                                                            <?php
                                                            }
                                                            }
                                                            echo $stand_opt;
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3" style="float: left;">
                                                        <label for="exampleInputEmail1">Classification</label>
                                                        <select name="classification[]" onchange="getSubClassification(this.value,0);" id="classificationDiv_0" class="form-control">
                                                            <option value="">Select Classification</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-md-3" style="float: left;">
                                                        <label for="exampleInputEmail1">Sub Classify</label>
                                                        <select name="sub_classification_name0[]" id="sub_classification_name_0" class="form-control select2" multiple="multiple">
                                                            <option value="">Select Sub Classification name</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-2" style="float: left;">
                                                        <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                                                        <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()"><i
                                                        class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <span class="stand_and_classific_div"></span>
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
                    
                    <div class="modal fade" id="modal-addDisclosure">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="disclosure-form" id="disclosure-form"
                                    action="<?php echo base_url();?>/master/addSubDisclosureName">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Sub Disclosure</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="ghg_name">Disclosure Name</label>
                                                    <input type="text" required="required" readonly class="form-control"
                                                    placeholder="Enter Disclosure Name" name="name" id="disclosure_name_sub">
                                                </div>  
                                                <div class="form-group">
                                                    <label for="sub_disclosure_name">Sub Disclosure Name</label>
                                                    <input type="text" required="required" class="form-control"
                                                    placeholder="Enter Sub Disclosure Name" name="sub_disclosure_name" id="sub_disclosure_name">
                                                </div>
                                                <div id="subdisclosurelabel"></div>
                                              
                                               
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

                    <div class="modal fade" id="modal-editDisclosure">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="disclosure-form" id="disclosure-form"
                                    action="<?php echo base_url();?>/master/editSubDisclosureName">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Edit Sub Disclosure</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                
                                                <div class="form-group">
                                                   <!--  <label for="sub_disclosure_name">Sub Disclosure Name</label> -->
                                                    <input type="hidden" required="required" class="form-control"
                                                    placeholder="Enter Sub Disclosure Name" name="sub_disclosure_edit"  id="edit_sub_disclosure_name">
                                                </div>
                                                <div id="editsubdisclos"></div>
                                              
                                               
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
                    var num = $(that).attr('data-number');
                    var name = $(that).attr('data-name');
                    var category = $(that).attr('data-category');
                    var standard_id = $(that).attr('data-standard_id');
                    var classification_id = $(that).attr('data-classification_id');
                    var sub_classification_id = $(that).attr('data-sub-classification_id');
                    var myArr = JSON.parse(sub_classification_id);
                    var unit_id = $(that).attr('data-unit_id');
                   
                    $.ajax({
                    url: "<?php echo base_url()?>/master/getClassificationByStandard/" + standard_id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {

                    $("#classification_id").html(data);
                    $("#classification_id").val(classification_id);
                    },
                    error: function(xhr, status, error) {
                    }
                    });
                    
                    $.ajax({
                    url: "<?php echo base_url()?>/master/getSubClassificationByClassification/" + classification_id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {

                    $("#sub_classification_id").html(data);
                    $("#sub_classification_id").val(myArr);
                    },
                    error: function(xhr, status, error) 
                    {
                    }
                    });
                    
                     $.ajax({
                                url : "<?php echo base_url()?>/master/geteditClassification/"+num,
                                type: "GET",
                                success: function(data){
                                // alert(data);
                                $("#labeledit").html(data);
                               
                                },
                                error: function(xhr, status, error){
                                // alert('error');
                                }
                        });
                    $('#disclosure_id').val(num);
                    $('#disclosure_name').val(name);
                    $('#disclosure_category_id').val(category);
                    $('#standard_id').val(standard_id);
                    $('#unit_id').val(unit_id);
                    // $("#disclosure_cat_"+category).attr("selected","selected");
                    $('#modal-edit').modal('show');
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


