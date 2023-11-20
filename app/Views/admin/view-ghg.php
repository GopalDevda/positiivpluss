<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ghg Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#" onclick="addGhg()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Ghg</a> </li>
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
    <tr><th>#</th><th>Ghg Name </th><th>Ghg Category</th><th>Boundary Name</th>
    <!--<th>Footprint</th><th>Item Allowed</th>-->
    <th>Action</th></tr>
    </thead>
    <tbody>
    <?php $s=1;
    foreach($list as $d){?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['ghg_name'] ?></td>
        <td><?php echo $d['ghg_category_name'];?></td>
        <td><?php echo $d['item_name'];?></td>
        <!--<td><?php echo $d['item_allowed'];?></td>-->
           <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editSdg(this)" data-name='<?php echo $d['ghg_name'];?>' data-number='<?php echo $d['id'];?>' data-category='<?php echo $d['ghg_category_id']; ?>' data-item_id='<?php echo $d['boundary_id']; ?>' data-footprint='<?php echo $d['footprint_id']; ?>' data-limit='<?php echo $d['item_allowed']; ?>' ><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteGhg/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
     <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form method="post" name="ghg-form" id="ghg-form" action="<?php echo base_url();?>/master/editGhg">
              <input type="hidden" name="id" id="ghg_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Ghg</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ghg Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Ghg Name" name="name" id="ghg_name">
                  </div>
                  <div class="form-group">
                   <label for="exampleInputEmail1">Select Ghg Category</label>
                   <select name="category_id" id="ghg_category_id" required="required" class="form-control">
                        <option value="">Select Category </option>
                        <?php 
                          if($ghg_category) {
                            foreach($ghg_category as $cat) {
                        ?>
                        <option id="ghg_cat_<?php echo $cat['id'] ?>" value="<?php echo $cat['id'] ?>"><?php echo $cat['ghg_category_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Boundaries</label>
                    <select name="boundaries_id" id="boundaries_id" required="required" class="form-control">
                        <option value="">Select Boundaries </option>
                       <?php 
                          if($boundaries) {
                            foreach($boundaries as $bda) {
                        ?>
                        <option id="boundaries_id_<?php echo $bda['id'] ?>" value="<?php echo $bda['id'] ?>"><?php echo $bda['item_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group" style="display:none;">
                    <label for="exampleInputEmail1">Select Footprint</label>
                    <select name="footprint_id" id="footprint_id" required="required" class="form-control">
                        <option value="">Select Footprint </option>
                       <?php 
                          if($footprint) {
                            foreach($footprint as $fp) {
                        ?>
                        <option id="footprint_<?php echo $fp['id'] ?>" value="<?php echo $fp['id'] ?>"><?php echo $fp['footprint_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <!--<div class="form-group" style="display:none;">-->
                  <!--  <label for="ghg_name">Item Allowed</label>-->
                  <!--  <input type="text" required="required" class="form-control"  placeholder="Enter item allowed" name="item_allowed" id="item_allowed">-->
                  <!--</div>-->

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
              <form method="post" name="ghg-form" id="ghg-form" action="<?php echo base_url();?>/master/addGhg">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Ghg</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="ghg_name">Ghg Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Ghg Name" name="name" id="ghg_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Category</label>
                    <select name="category_id" id="ghg_category_id" required="required" class="form-control">
                        <option value="">Select Category </option>
                       <?php 
                          if($ghg_category) {
                            foreach($ghg_category as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['ghg_category_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Select Boundaries</label>
                    <select name="boundaries_id" id="boundaries_id" required="required" class="form-control">
                        <option value="">Select Boundaries </option>
                       <?php 
                          if($boundaries) {
                            foreach($boundaries as $bda) {
                        ?>
                        <option id="boundaries_id_<?php echo $bda['id'] ?>" value="<?php echo $bda['id'] ?>"><?php echo $bda['item_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  
                  <div class="form-group" style="display:none;">
                    <label for="exampleInputEmail1">Select Footprint</label>
                    <select name="footprint_id" id="footprint_id"  class="form-control">
                        <option value="">Select Footprint </option>
                        <?php 
                          if($footprint) {
                            foreach($footprint as $fp) {
                        ?>
                        <option value="<?php echo $fp['id'] ?>"><?php echo $fp['footprint_name'] ?></option>
                        <?php
                           }
                          }
                        ?>
                    </select>
                  </div>

                  <!--<div class="form-group">-->
                  <!--  <label for="ghg_name">Item Allowed</label>-->
                  <!--  <input type="text" required="required" class="form-control"  placeholder="Enter item allowed" name="item_allowed" id="item_allowed">-->
                  <!--</div>-->

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
   function editSdg(that) {
        var num = $(that).attr('data-number');
        var name = $(that).attr('data-name');
        var category = $(that).attr('data-category');
        var footprint = $(that).attr('data-footprint');
        var item_id = $(that).attr('data-item_id');
        var l = $(that).attr('data-limit');
        $('#ghg_id').val(num);
        $('#ghg_name').val(name);
        $('#ghg_limit').val(l);
        $("#ghg_cat_"+category).attr("selected","selected");
        $("#boundaries_id_"+item_id).attr("selected","selected");        
        $("#footprint_"+footprint).attr("selected","selected");        
        $('#modal-edit').modal('show');
    }
     function addGhg() {
        $('#modal-add').modal('show');
    }
</script>
<?php include('include/footer.php');?>