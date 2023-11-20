<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Unit Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#" onclick="addCategory()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Category</a> </li>
              <li class="breadcrumb-item active"><a href="#" onclick="addUnit()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Unit</a> </li>
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
                      <h3 class="card-title">Unit List</h3>
                    </div>
                    
                    <?php
                    if(!empty($list)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr><th>#</th><th>Unit category</th><th>Unit Name </th><th>Action</th></tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        foreach($list as $d){?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <td>
                             <?php foreach ($category_unit as $key => $value) {
                                     if($value['id'] == $d['unit_category']){
                                      echo $value['category_name'];
                                     }
                              ?>
                                           
                              <?php
                            }?>
                            
                              
                            </td>
                          <td><?php echo $d['unit_name'] ?></td>
                          <td>
                            <a class="btn btn-primary" href="javascript:void(0);" onclick="editUnit(this)" data-unit_name='<?php echo $d['unit_name'];?>'
                              data-unit_category='<?php echo $d['unit_category'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteUnit/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
                <form method="post" name="unit-form" id="unit-form" action="<?php echo base_url();?>/master/editUnit">
                  <input type="hidden" name="id" id="unit_id" value="" required="required">
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Update Unit</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Unit Category</label>
                           <select class="form-control" name="unit_category" id="unit_category">
                            <option>Select from list</option>
                            <?php foreach ($category_unit as $key => $value) {?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>        

                            <?php
                          }?>
                          </select>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Unit Name</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Unit Name" name="unit_name" id="unit_name">
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
          <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" name="unit-form" id="unit-form" action="<?php echo base_url();?>/master/addUnit">
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Unit</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="unit_name">Category</label>
                          <select class="form-control" name="unit_category">
                            <option>Select from list</option>
                            <?php foreach ($category_unit as $key => $value) {?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>        

                            <?php
                          }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Unit Name</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Unit Name" name="unit_name">
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

          <!-- start safal code for unit category -->
          <div class="modal fade" id="unitcategorymodal-add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" name="unitcategory-form" id="unitcategory-form" action="<?php echo base_url();?>/master/addUnitCategory">
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="unit_name">Category Name</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Category Name" name="unitcategory_name">
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- end safal code for unit category -->


          <script type="text/javascript">
          function editUnit(that) {
          var num = $(that).attr('data-number');
          var name = $(that).attr('data-unit_name');
          var unit_category = $(that).attr('data-unit_category');
          // alert(unit_category);
          $('#unit_id').val(num);
          $('#unit_name').val(name);
          $('#unit_category').val(unit_category);
          $('#modal-edit').modal('show');
          }
          function addUnit() {
          $('#modal-add').modal('show');
          }
          </script>

          <script>
          //start safal code for add unit category
            function addCategory() {
              $('#unitcategorymodal-add').modal('show');
            }
          //end safal code for add unit category
          </script>

          <?php include('include/footer.php');?>