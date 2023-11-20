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
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Supplier Module Item Relation </li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
                  <form name="frm-industry" id="module_item" method="post" action="<?php echo base_url();?>/SupplierModule/addSupplierModuleBrandItemRelationSubmit">
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
                        <div class='container-fluid'>
                        <div id="itemDiv">
                          <div class='row'>
                           <a href="https://user.positiivplus.io/SupplierModule/getSupplierModuleBrandItemByRole/11/247">ok</a>
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th scope="col">sno.</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Add</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                                      <?php 
                                        if($supplier_mod) {
                                          $ky=1;
                                          $i = 0;
                                            foreach($supplier_mod as $sm) {
                                        ?>
                                      <?php 
                                        if($supplier_mod_item) {
                                            foreach($supplier_mod_item as  $smi) {
                                                if($smi["supplier_module_id"]==$sm["id"]){
                                        ?>
                                      <tr>
                                        <td><?php echo  $ky++;?>
                                        </td>
                                        <td><?php echo $smi["item_name"] ?>
                                          <input type="hidden" name='brand_name[]' value="<?php echo $smi["item_name"] ?>">
                                            <input type="hidden" name='brand_id[]' value='<?php echo $smi["id"] ?>'>
                                        </td>
                                        <td><button type="button" class='btn btn-primary' style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                            <input type="checkbox" name="add[<?= $i;?>]" value="1">
                                            </button>
                                        </td>
                                        <td><button type="button" class='btn btn-primary' style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                            <input type="checkbox" name="edit[<?= $i;?>]" value="1">
                                            </button>
                                        </td>
                                        <td><button type="button" class='btn btn-primary' style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                            <input type="checkbox" name="view[<?= $i;?>]" value="1">
                                            </button>
                                        </td>
                                        <td><button type="button" class='btn btn-primary' style="color: white;border: 0px;height: 35px;border-radius: 9px;padding-left:10px;padding-right:10px;">
                                            <input type="checkbox" name="delete[<?= $i;?>]" value="1">
                                            </button>
                                        </td>
                                      </tr>
                                      <?php
                                        $i++;
                                        
                                        }
                                        }
                                        }
                                        ?>
                                      <?php                            
                                        }
                                        }
                                        ?>
                                    
                              </tbody>
                           </table>
                           </div>
                          </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- <a href="<?php echo base_url()?>/SupplierModule/getSupplierModuleBrandItemByRole/1/247">ok</a> -->
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
<script>
   function getIndicatorAjax(id=1){
   
   
     supplier_role_id = $("#supplier_role_id").val();
   
   
     supplier_plan_id = $("#supplier_plan_id").val();
   
   if(supplier_plan_id){
     $.ajax({
   
   
           url : "<?php echo base_url()?>/SupplierModule/getSupplierModuleBrandItemByRole/"+supplier_role_id+"/"+supplier_plan_id,
   
   
           type: "POST",
   
   
           //dataType: "JSON",
   
   
           success: function(data){
   
   
             $('#itemDiv').html(data);
   
   
           },
   
   
       });
     }
   
   
   }    
   
   
</script>
<?php include('include/footer.php');?>