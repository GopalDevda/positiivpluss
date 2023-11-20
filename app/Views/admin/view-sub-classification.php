<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sub Classification Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Classification</li>
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
                <div class="col-md-4">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add New Sub Classification</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="from" id="form" method="post" action="<?php echo base_url();?>/Subclassification/addsubclassification">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Standard</label>
                          <select name="standard_id" id="standard_id" required="required" class="form-control"
                            onchange="getClassificationByStandardForEdit(this)">
                            <option value="">Select Standard </option>
                            <?php
                            if($standard) {
                            foreach($standard as $cat) {
                            
                            ?>
                            
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['standard_name'] ?>
                            </option>
                            
                            <?php
                            
                            }
                            
                            }
                            
                            ?>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Classification</label>
                          <select name="classification_id" id="classification_id" required="required"
                            class="form-control">
                            <option value="">Select Classification </option>
                          </select>
                        </div>
                        
                        
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sub Classification Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Classification  Name" required="required" name="subclassification">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Unit</label>
                          <select name="unit_id" id="unit_id" required="required" class="form-control">
                            <option value="">Select Unit </option>
                            <?php
                            if($unit) {
                            foreach($unit as $cat) {?>
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['unit_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Guidelines</label>
                          <textarea class="form-control" name="add_guidelines" type="text" placeholder="Enter Guidelines" required></textarea>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                  
                  
                </div>
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title"><?php echo $title;?></h3></h3>
                    </div>
                    
                    <?php
                    // print_r($list);
                    if(!empty($list)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr><th>#</th><th>Standard Name</th><th>Classification Name</th><th>Sub Classification Name</th><th>Unit Id</th><th>Guidelines</th><th>Action</th></tr>
                      </thead>
                      <?php $s=1;
                      foreach($list as $d){?>
                      <tr><td><?php echo $s;?></td><td><?php echo $d['standard_name'];?></td><td><?php echo $d['classification_name'];?></td><td><?php echo $d['sub_classification_name'];?></td>
                      <td>
                        <?php foreach ($unit as $key => $value) {?>
                        <?php if($value['id'] == $d['unit_id']){?>
                        <?php echo $value['unit_name'];?>
                        
                        <?php
                        }}?>
                        
                        
                      </td>
                      <td> 
                        <?php echo $d['guidelines'];?>
                      </td> 
                      <td>
                        <a class="btn btn-primary" href="javascript:void(0);"
                          onclick="editSubClassification(this)"
                          data-name='<?php echo $d['sub_classification_name'];?>'
                          data-number='<?php echo $d['id'];?>'
                          data-standard_id='<?php echo $d['standard_id']; ?>'
                          data-classification_id='<?php echo $d['scaId']; ?>'
                          data-guidelines_id='<?php echo $d['guidelines']; ?>'
                        data-unit_id='<?php echo $d['unit_id']; ?>'><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="<?php echo base_url()?>/Subclassification/deleteClassification/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $s++;}?>
                  </table>
                  <?php } ?>
                </div>
              </div>
            </div>
            </div><!-- /.container-fluid -->
          </section>
        </div>
        <?php include('include/footer.php');?>
        
        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" name="disclosure-form" id="disclosure-form"
                action="<?php echo base_url();?>/Subclassification/editSubClassification">
                <input type="hidden" name="sub_id" id="sub_Classi_id" value="" required="required">
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Update Sub Classification</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Standard</label>
                        <select name="standard_id" id="sub_Classistandard_id" required="required" class="form-control"
                          onchange="getClassificationByStatndartForEdit(this)">
                          <option value="">Select Standard </option>
                          <?php
                          if($standard) {
                          foreach($standard as $cat) {
                          ?>
                          <option value="<?php echo $cat['id'] ?>"><?php echo $cat['standard_name'] ?>
                          </option>
                          <?php
                          }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Classification</label>
                        <select name="classification_id" id="classification_id_edit" required="required"
                          class="form-control" >
                          <option value="">Select Classification </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Sub  Classification</label>
                        <input type="text" required="required" class="form-control"
                        placeholder="Enter Disclosure Name" name="subclassification" id="sub_Classi_name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Unit</label>
                        <select name="unit_id" id="sub_Classiunit_id" required="required" class="form-control">
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
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Guidelines</label>
                        <textarea class="form-control" name="edit_guidelines" id="edit_guidelines" type="text" placeholder="Enter Guidelines" required></textarea>
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
        <script type="text/javascript">
        
        
        function editSubClassification(that) {
        
        
        var num = $(that).attr('data-number');
        var name = $(that).attr('data-name');
        var standard_id = $(that).attr('data-standard_id');
        var classification_id = $(that).attr('data-classification_id');
        var guidelines_id = $(that).attr('data-guidelines_id');

        var unit_id = $(that).attr('data-unit_id');
        $.ajax({
        url: "<?php echo base_url()?>/master/getClassificationByStandard/" + standard_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {
        $("#classification_id_edit").html(data);
        $("#classification_id_edit").val(classification_id);
        },
        error: function(xhr, status, error) {
        }
        });
        
        $('#sub_Classi_id').val(num);
        $('#edit_guidelines').val(guidelines_id);

        $('#sub_Classi_name').val(name);
        $('#sub_Classistandard_id').val(standard_id);
        $('#sub_Classiunit_id').val(unit_id);
        $('#modal-edit').modal('show');
        }
        
        
        function editFunction(that) {
        
        var num = $(that).attr('data-number'); // Sub Sub Industry Id
        
        var ind_cat_name = $(that).attr('data-ind_cat_name'); // industry category name
        
        var ind_name = $(that).attr('data-ind_name'); //industry name
        
        var sub_sub = $(that).attr('data-sub_sub'); //Sub Sub industry name
        
        
        $.ajax({
        url : "<?php echo base_url()?>/documenttype/getsubdocumentdetails/"+num,
        
        type: "GET",
        
        success: function(data){
        
        $('#sub_sub_id').val(num);
        
        $('#ind_cat_name').val(ind_cat_name);
        
        $('#ind_name').val(ind_name);
        
        $('#sub_sub').val(sub_sub);
        
        $('#modal-edit').modal('show');
        
        
        },
        error: function(xhr, status, error){
        }
        });
        }
        
        
        function getClassificationByStatndartForEdit(that) {
        var standard_id = $(that).val();
        $.ajax({
        url: "<?php echo base_url()?>/master/getClassificationByStandard/" + standard_id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {
        $("#classification_id_edit").html(data);
        },
        error: function(xhr, status, error) {
        }
        });
        }
        
        function getIndustryAjax(id=1){
        $.ajax({
        url : "<?php echo base_url()?>/SubSubIndustry/getIndustryByIndustryCategory/"+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
        $('#IndustryDiv').html(data);
        },
        error: function(xhr, status, error){
        $('#IndustryDiv').html('<option value="">Select Industry </option>');
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
        </script>