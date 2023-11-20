<?php include('include/header.php'); ?><?php include('include/menu.php');?>  <!-- Content Wrapper. Contains page content -->  <div class="content-wrapper">    <!-- Content Header (Page header) -->    <div class="content-header">      <div class="container-fluid">        <div class="row mb-2">          <div class="col-sm-6">            <h1 class="m-0">Indicator Management</h1>          </div><!-- /.col -->          <div class="col-sm-6">            <ol class="breadcrumb float-sm-right">              <li class="breadcrumb-item"><a href="<?php echo base_url();?>/master/viewindicator" class='btn btn-primary'><i class="fa fa-view"></i> View Indicator</a> </li>            </ol>          </div><!-- /.col -->        </div><!-- /.row -->      </div><!-- /.container-fluid -->    </div>    <!-- /.content-header -->    <!-- Main content --><section class="content">      <div class="container-fluid">        <div class="row">          <!-- left column -->          <div class="col-md-12">            <!-- general form elements -->            <div class="card card-primary">              <div class="card-header">                <h3 class="card-title">Add New Indicator </h3>              </div>              <!-- /.card-header -->              <!-- form start -->              <form name="indicator" id="indicator" method="post" action="<?php echo base_url();?>/master/addIndicator" enctype='multipart/form-data'>                <div class="card-body">                  <div class="form-group">                    <label for="exampleInputEmail1">Indicator Category</label>                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control">                        <option value="">Select Indicator Cateory</option>                        <?php if(!empty($indicator_category)){                          foreach($indicator_category as $r){?>                        <option value="<?php echo $r['id'];?>"><?php echo $r['indicator_category_name'];?></option>                       <?php  }                        }?>                    </select>                  </div>                  <div class="form-group">                    <label for="exampleInputEmail1">Indicator Name</label>                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Indicator Name" required="required" name="name">                  </div>                                    <div class="form-group">                    <label for="exampleInputEmail1">Description </label>                    <textarea class="form-control" required="required" name="description" id="exampleInputEmail1"></textarea>                                     </div>                                  <div class="form-group">                    <label for="exampleInputEmail1" style="width: 100%;">Select Icon</label>                    <input type="file"  id="image" required="required" name="file" >                  </div><div class="form-group"><label for="exampleInputEmail1">Select SDGs</label></div><?php if(!empty($sdg)){  foreach($sdg as $r){?>  <div class="col-md-3" style="float: left;">    <input type="checkbox" name="sdg_id[]"  value="<?php echo $r['id']?>" /> <?php echo $r['sdg_name']?>  </div><?php } } ?>                                                 </div>                <!-- /.card-body -->                <div class="card-footer">                  <button type="submit" class="btn btn-primary">Submit</button>                </div>              </form>            </div>            <!-- /.card -->          </div>        </div>      </div><!-- /.container-fluid -->    </section>  </div><?php include('include/footer.php');?>