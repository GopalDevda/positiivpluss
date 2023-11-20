<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Finance Sub-Category Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Finance Sub-Category  </li>
          </ol>
        </div>
      </div>
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
                      <h3 class="card-title">Add New Finance Sub-Category </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/addFinanceSubCategory">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Industry </label>
                          <select name="industry_id" id="" required="required" class="form-control">
                            <option value="">Select Industry </option>
                            <!--<option value="0">All</option>-->
                            <?php if(!empty($industry)){
                            foreach($industry as $r){?>
                            <option value="<?php echo $r['id'];?>"><?php echo $r['industry_name'];?></option>
                            <?php  }
                            }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select  Finance Category </label>
                          <select name="Category_id" id="" required="required" class="form-control">
                            <option value="">Select Finance Category </option>
                            <!--<option value="0">All</option>-->
                            <?php
                            if($SubCategory) {
                            foreach($SubCategory as $c) {
                            ?>
                            <option value="<?php echo $c['id'] ?>"><?php echo $c['finance_name'] ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Finance Sub-Category </label>
                          <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="FinanceSubCategory">
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
                      <h3 class="card-title">Finance Subcategory List</h3>
                    </div>
                    
                    <div class="card-body">
                      <?php
                      if(!empty($subfinance)){?>
                      <table class="table table-bordered table-hover" id="datatables">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Industry</th>
                              <th>Finance Category</th>
                              <th>Finance Subcategory</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <?php $s=1;
                        foreach($subfinance as $sf){?>
                        <tr>
                            <td><?php echo $s;?></td>
                            <td><?php echo $sf['industry_name'];?></td>
                            <td><?php echo $sf['finance_name'];?></td>
                            <td><?php echo $sf['sub_category'];?></td>
                        <td>
                          <a class="btn btn-primary" href="javascript:void(0);" onclick="editfinancesub(this);" data-industry='<?php echo $sf['insid'];?>' data-finance='<?php echo $sf['fid'];?>' data-financesub='<?php echo $sf['sub_category'];?>' data-id='<?php echo $sf['id'];?>'><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deletesubfinance/<?php echo $sf['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
                  <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/assessment/updatefinaneSub" enctype='multipart/form-data'>
                    <input type="hidden" name="id" id="f_id" value="" required="required">
                    <div class="modal-body">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Update Finance Subcategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
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
                              <label for="exampleInputEmail1">Select  Finance Category </label>
                              <select name="Category_id" id="finance_category_id" required="required" class="form-control">
                                <option value="">Select Finance Category </option>
                                <?php
                                if($SubCategory) {
                                foreach($SubCategory as $c) {
                                ?>
                                <option value="<?php echo $c['id'] ?>"><?php echo $c['finance_name'] ?></option>
                                <?php
                                }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Finance Sub-Category </label>
                              <input type="text" class="form-control" id="financeSubCategory" required="required" name="FinanceSubCategory">
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
          
          function editfinancesub(that) {
            var id = $(that).attr('data-id');
            var industry = $(that).attr('data-industry');
            var financCategory  = $(that).attr('data-finance');
            var financSubCategory  = $(that).attr('data-financesub');
            $('#f_id').val(id);
            $('#industry_id').val(industry);
            $('#finance_category_id').val(financCategory);
            $('#financeSubCategory').val(financSubCategory);
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