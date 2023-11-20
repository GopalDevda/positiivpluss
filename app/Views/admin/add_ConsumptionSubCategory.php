<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Consumption Sub-Category Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Consumption Sub-Category  </li>
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
                <div class="col-md-5">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add New Consumption Sub-Category </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/addConsumptionSubCategory">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Industry </label>
                          <select name="industry_id" id="industry_id" required="required" class="form-control">
                            <option value="">Select Industry </option>
                            <?php if(!empty($industry)){
                            foreach($industry as $r){?>
                            <option value="<?php echo $r['id'];?>"><?php echo $r['industry_name'];?></option>
                            <?php  }
                            }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select  Consumption Category </label>
                          <select name="Category_id" id="Category_id" required="required" class="form-control">
                            <option value="">Select Consumption Category </option>
                            <!--<option value="0">All</option>-->
                            <?php
                            if($SubCategory) {
                            foreach($SubCategory as $c) {
                            ?>
                            <option value="<?php echo $c['id'] ?>"><?php echo $c['consumption_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Ghg Consumption Factor </label>
                          <select name="Factor_id" id="Factor_id" required="required" class="form-control">
                            <option value="">Select Ghg Consumption Factor </option>
                            <!--<option value="0">All</option>-->
                            <?php
                            if($GhgConsumptionFactor) {
                            foreach($GhgConsumptionFactor as $gf) {
                            ?>
                            <option value="<?php echo $gf['id'] ?>"><?php echo $gf['factor_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Consumption Sub-Category </label>
                          <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="ConsumptionSubCategory">
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
                <div class="col-md-7">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Consumption Subcategory List</h3>
                    </div>
                    
                    <div class="card-body">
                      <?php
                      if(!empty($subconsu)){?>
                      <table class="table table-bordered table-hover" id="datatables">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Industry</th>
                              <th>Consumption Category</th>
                              <th>Consumption Subcategory</th>
                              <th>Factor</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <?php $s=1;
                        foreach($subconsu as $subc){?>
                        <tr>
                            <td><?php echo $s;?></td>
                            <td><?php echo $subc['industry_name'];?></td>
                            <td><?php echo $subc['consumption_name'];?></td>
                            <td><?php echo $subc['sub_category'];?></td>
                            <td><?php echo $subc['factor_name'];?></td>
                        <td>
                           <a class="btn btn-primary" href="javascript:void(0);" onclick="editconsumptionsub(this);" data-industy='<?php echo $subc['insId'];?>'data-ghg='<?php echo $subc['fid'];?>' data-cons='<?php echo $subc['conId'];?>' data-consub='<?php echo $subc['sub_category'];?>' data-id='<?php echo $subc['id'];?>'><i class="fa fa-pencil"></i></a>
                         
                          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteconsumptionsub/<?php echo $subc['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $s++; }?>
                    </table>
                    <?php } ?>
                  </div>
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
                  <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/assessment/updateConsumptionSubCategory" enctype='multipart/form-data'>
                    <input type="hidden" name="id" id="f_id" value="" required="required">
                    <div class="modal-body">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Update Consumption SubCategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                          <label for="exampleInputEmail1">Select Industry </label>
                          <select   name="industy_id" id="industy_id" required="required" class="form-control">
                            <option value="">Select Industry </option>
                            <?php if(!empty($industry)){
                            foreach($industry as $r){?>
                            <option value="<?php echo $r['id'];?>"><?php echo $r['industry_name'];?></option>
                            <?php  }
                            }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select  Consumption Category </label>
                          <select name="Consumption_category_id" id="Consumption_category_id" required="required" class="form-control">
                            <option value="">Select Consumption Category </option>
                            <!--<option value="0">All</option>-->
                            <?php
                            if($SubCategory) {
                            foreach($SubCategory as $c) {
                            ?>
                            <option value="<?php echo $c['id'] ?>"><?php echo $c['consumption_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Ghg Consumption Factor </label>
                          <select name="ghgId" id="ghgId" required="required" class="form-control">
                            <option value="">Select Ghg Consumption Factor </option>
                            <!--<option value="0">All</option>-->
                            <?php
                            if($GhgConsumptionFactor) {
                            foreach($GhgConsumptionFactor as $gf) {
                            ?>
                            <option value="<?php echo $gf['id'] ?>"><?php echo $gf['factor_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Consumption Sub-Category </label>
                          <input type="text"  class="form-control" id="ConsumptionSubCategory" value=""required="required" name="ConsumptionSubCategory">
                          
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
          
          
            function editconsumptionsub(that) {
            var id = $(that).attr('data-id');
            var industryId = $(that).attr('data-industy');
            var consId  = $(that).attr('data-cons');
            var consub  = $(that).attr('data-consub');
            var ghgId  = $(that).attr('data-ghg');
            $('#f_id').val(id);
            $('#industy_id').val(industryId);
            $('#Consumption_category_id').val(consId);
            $('#ConsumptionSubCategory').val(consub);
            $('#ghgId').val(ghgId);
            $('#modal-edit').modal('show');
    
        }
        
          function getIndicatorAjax(id=1){
          $.ajax({
          url : "<?php echo base_url()?>/assessment/getIndicatorByIndicatorCategory/"+id,
          type: "POST",
          //dataType: "JSON",
          success: function(data){
          $('#indicatorDiv').html(data);
          },
          });
          }
          </script>