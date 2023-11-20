<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier Module Item Relation Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier Module Item Relation </li>
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
                <h3 class="card-title">Add New Supplier Module Item Relation </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frm-industry" id="module_item" method="post" action="<?php echo base_url();?>/SupplierModule/addSupplierModuleItemRelationSubmit">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="supplier_role_id" id="supplier_role_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">
                        <option value="">Select Role</option>
                        <?php 
                          if($role) {
                            foreach($role as $rol) {
                        ?>
                          <option value="<?php echo $rol["id"] ?>"><?php echo $rol["supplier_role_name"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Supplier Plan</label>
                    <select name="supplier_plan_id" id="supplier_plan_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">
                        <option value="">Select Supplier Plan</option>
                        <?php 
                          if($supplier_plan) {
                            foreach($supplier_plan as $rol) {
                        ?>
                          <option value="<?php echo $rol["id"] ?>"><?php echo $rol["plan_name"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Supplier Module</label>
                  </div>
                  <div id="itemDiv">
                    <?php 
                      if($list) {

                        foreach($list as $li) {
                    ?>
                     <div class="col-md-3" style="margin:10px;">
                      <input type="checkbox" name="supplier_module_id[]" value="<?php echo $li["supplier_module"]["id"] ?>">
                      <?php  echo $li["supplier_module"]["supplier_module_name"] ?>
                     </div>
                    <?php 
                      if(!empty($li["item"])) {
                    ?>
                    <div class="row">
                    <?php
                        foreach($li["item"] as $itm) {
                    ?>

                     <div class="col-md-3" style="float:left;left:45px;top:0px;margin:5px;">
                      <button type="button" style="background: peru;color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                      <input type="checkbox" name="item_id[]" value="<?php echo $li["supplier_module"]["id"] ?>,<?php echo $itm["id"] ?>">
                      <?php  echo $itm["item_name"] ?>
                    </button>
                     </div>
                    <?php                          
                        }
                    ?>
                  </div>
                    <?php
                      }
                    ?>
                    <?php
                        }
                      }
                    ?>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script>
  function getIndicatorAjax(id=1){
    supplier_role_id = $("#supplier_role_id").val();
    supplier_plan_id = $("#supplier_plan_id").val();
    $.ajax({
          url : "<?php echo base_url()?>/SupplierModule/getSupplierModuleItemByRole/"+supplier_role_id+"/"+supplier_plan_id,
          type: "POST",
          //dataType: "JSON",
          success: function(data){
            $('#itemDiv').html(data);
          },
      });
  }    
  </script>
<?php include('include/footer.php');?>

