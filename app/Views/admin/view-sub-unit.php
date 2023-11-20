<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sub Unit Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active"><a href="#" onclick="addSubUnit()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Sub Unit</a> </li>
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
                      <h3 class="card-title">Sub Unit List</h3>
                    </div>
                    
                    <?php
                    if(!empty($list)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr><th>#</th><th>Unit Name </th><th>Sub Unit Name </th><th>Sub Unit Value </th><th>Sub Unit Symbol </th><th>Action</th></tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        foreach($list as $d){?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <td><?php echo $d['unit_name'] ?></td>
                          <td><?php echo $d['sub_unit_name'] ?></td>
                          <td><?php echo $d['conversion_value'] ?></td>
                          <td><?php echo $d['conversion_symbol'] ?></td>
                          <td>
                            <a class="btn btn-primary" href="javascript:void(0);" onclick="editUnit(this)" data-number='<?php echo $d['id'];?>'
                             data-unit_id='<?php echo $d['unit_id'];?>'
                             data-unit_category='<?php echo $d['unit_category'];?>' data-unit_name='<?php echo $d['unit_name'];?>' data-sub_unit_name='<?php echo $d['sub_unit_name'];?>' data-conversion_value='<?php echo $d['conversion_value'];?>' data-conversion_symbol='<?php echo $d['conversion_symbol'];?>'><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteSubUnit/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
                <form method="post" name="unit-form" id="unit-form" action="<?php echo base_url();?>/master/editSubUnit">
                  <input type="hidden" name="id" id="id" value="" required="required">
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Update Sub Unit</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                         <div class="form-group">
                          <label for="unit_name">Unit Category</label>
                          <select required="required" class="form-control" name="unit_category" id="unit_category_id" onchange="category_unit(value)">
                            <option>Select category Name</option>
                            <?php 
                            foreach($category_unit as $category){ ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                            <?php 
                            }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Unit Name</label>
                          <select required="required" class="form-control" name="unit_id" id="unit_id_edit">
                            <option>Select Unit Name</option>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Name</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Unit Name" name="sub_unit_name" id="sub-unit-name">
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Value</label>
                          <input type="number" required="required" class="form-control"  placeholder="Enter Sub Unit Value" name="sub_unit_value" id="sub-unit-value">
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Symbol</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Sub Unit Symbol" name="sub_unit_symbol" id="sub-unit-symbol">
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
                <form method="post" name="unit-form" id="unit-form" action="<?php echo base_url();?>/master/addSubUnit">
                  <!-- for user id <input type="hidden" name="sub_unit_userid" value=""> -->
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add Sub Unit</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="unit_name">Unit Category</label>
                          <select required="required" class="form-control" name="unit_category" onchange="category_unit(value)">
                            <option>Select category Name</option>
                            <?php 
                            foreach($category_unit as $category){ ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                            <?php 
                            }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Unit Name</label>
                          <select required="required" class="form-control" name="unit_id" id="unit_category">
                            <option>Select Unit Name</option>
                           
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Name</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Unit Name" name="sub_unit_name">
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Value</label>
                          <input type="number" required="required" class="form-control"  placeholder="Enter Sub Unit Value" name="sub_unit_value">
                        </div>
                        <div class="form-group">
                          <label for="unit_name">Sub Unit Symbol</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Sub Unit Symbol" name="sub_unit_symbol">
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
           
          </script>
          <script type="text/javascript">
          function editUnit(that) {
          var num = $(that).attr('data-number');
          var unit_name = $(that).attr('data-unit_id');
          var sub_unit_name = $(that).attr('data-sub_unit_name');
          var unit_category = $(that).attr('data-unit_category');
          // alert(unit_category);
          var conversion_value = $(that).attr('data-conversion_value');
          var conversion_symbol = $(that).attr('data-conversion_symbol');
           $.ajax({


        url : "<?php echo base_url()?>/Master/category_unit/"+unit_name,

        type: "POST",


        success: function(data){

          $('#unit_id_edit').html(data);
          
          $('#id').val(num);
          $('#unit_id_edit').val(unit_name);
          $('#unit_category_id').val(unit_category);
          $('#sub-unit-name').val(sub_unit_name);
          $('#sub-unit-value').val(conversion_value);
          $('#sub-unit-symbol').val(conversion_symbol);
          $('#modal-edit').modal('show');

        },

    });

          

          
          }

          function addSubUnit()
          {
          $('#modal-add').modal('show');
          }


          function category_unit(that) {
         
          $.ajax({


        url : "<?php echo base_url()?>/Master/category_unit/"+that,

        type: "POST",


        success: function(data){

          $('#unit_category').html(data);

        },

    });
          }


          </script>
          <?php include('include/footer.php');?>