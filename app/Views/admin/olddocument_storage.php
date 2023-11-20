<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Document Storage</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#" onclick="addDisclosure()"
                            class='btn btn-primary'><i class="fa fa-plus"></i> Add User Document limit</a> </li>
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
                                            <h3 class="card-title">User Document Storage List</h3>
                                        </div>
                                        <?php
                                        if(!empty($list)){?>
                                        <table class="table table-bordered table-hover" id="datatables">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User Name </th>
                                                    <th>Limit</th>
                                                    <th>Unit</th>
                                                   
                                                    <!-- <th>Unit</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $s=1;
                                                foreach($list as $d){?>
                                                <tr>
                                                    <td><?php echo $s;?></td>
                                                    <td><?php foreach($supplier as $supplier_id){
                                                        if($supplier_id['id'] == $d['user_id'])
                                                        {
                                                            // print_r('dcghfh');
                                                            echo $supplier_id['supplier_name'];
                                                        }
                                                        }
                                                        ?></td>
                                                    <td><?php echo $d['limit'];?></td>
                                                    <td><?php if($d['unit'] == '1'){echo 'KB';}elseif($d['unit'] == '2'){echo 'MB';}else{echo 'GB';} ?></td>
                                                   
                                        
                                                    <!-- <td><?php echo $d['unit_name'];?></td> -->
                                                    <td>
                                                        <a class="btn btn-primary"   href="javascript:void(0);"
                                                            onclick="editDisclosure(this)"
                                                            data-name='<?php echo $d['disclosure_name'];?>'
                                                            data-number='<?php echo $d['id'];?>'
                                                            ><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-danger"
                                                            href="<?php echo base_url()?>/master/deleteDisclosure/<?php echo $d['id'];?>"
                                                            onclick="return confirm('Do you want to delete?');"><i
                                                        class="fa fa-trash"></i>
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
                    
                   
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="disclosure-form" id="disclosure-form"
                                    action="<?php echo base_url();?>/master/addlimitdocument">
                                    <div class="modal-body">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Limit</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <div class="card-body">
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select User</label>
                                                    <select name="user_name" id="disclosure_category_id" 
                                                        required="required" class="form-control">
                                                        <option value="">Select User </option>
                                                        <?php foreach($supplier as $supplier_id){?>
                                                        <option value="<?= $supplier_id['id'] ?>"><?= $supplier_id['supplier_name'] ?></option>
                                                        <?php
                                                    }?>
                                                       
                                                    </select>
                                                </div>
                                               
                                                <!--End-->
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Limit</label>
                                                    <div class="input-group mb-3">
                        <input type="number" placeholder="Enter Site Area" name="limit" class="form-control">
                        <div class="input-group-text p-0" style="width:150px;">
                                                      <select class="form-group shadow-none bg-light border-0" name="unit" required="">
                              <option>Select Unit</option>
                                                            <option value="1">KB</option>
                                                            <option value="2" selected="">MB</option>
                                                            <option value="3">GB</option>
                                                         </select>
                        </div>
                     </div>
                                                       
                                                    
                                                </div>
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


