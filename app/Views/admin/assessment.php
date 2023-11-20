<?php include('include/header.php'); ?><?php include('include/menu.php');?>  <!-- Content Wrapper. Contains page content -->  <div class="content-wrapper">    <!-- Content Header (Page header) -->    <div class="content-header">      <div class="container-fluid">        <div class="row mb-2">          <div class="col-sm-6">            <h1 class="m-0">Assessment Management</h1>          </div><!-- /.col -->          <div class="col-sm-6">            <ol class="breadcrumb float-sm-right">                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/master/addAssessment" class='btn btn-primary'><i class="fa fa-plus"></i> Add Assessment</a> </li>            </ol>          </div><!-- /.col -->        </div><!-- /.row -->      </div><!-- /.container-fluid -->    </div>    <!-- /.content-header -->    <!-- Main content -->  <section class="content">      <div class="container-fluid"><?php if($session->get('success')){?>  <div class="alert alert-success alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>   <?php echo $session->get('success');?>  </div> <?php } ?><?php if($session->get('error')){?>  <div class="alert alert-danger alert-dismissible">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>   <?php echo $session->get('error');?>  </div> <?php } ?>        <div class="row">          <!-- left column -->         <div class="col-md-12">            <!-- general form elements -->            <div class="card card-primary">              <div class="card-header">                <h3 class="card-title">Assessment List</h3>              </div>            <?php     if(!empty($list)){?>    <table class="table table-bordered table-hover" id="datatables">    <thead>    <tr><th>#</th><th>Assessment Name </th><th>Assessment Title </th><th>Description </th><th>Icon</th><th>Status</th><th>Action</th></tr>    </thead>    <tbody>    <?php $s=1;    foreach($list as $d){?>      <tr>        <td><?php echo $s;?></td>        <td><?php echo $d['assessment_name'];?></td>        <td><?php echo $d['title'];?></td>        <!-- <td><?php echo $d['weight_percentage'];?></td> -->        <td><?php echo $d['description'] ?></td>        <td>          <img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $d['image'];?>" style="width: 100px;">                  </td>                  <td>          <select class="btn btn-primary" id="degree_1" onchange="return set_assessmemnt_access(this,<?php echo $d['id'] ?>)">            <option value="0" <?= $d['assessmemnt_access']==0?'selected':'' ?>>Deactive</option>            <option value="1" <?= $d['assessmemnt_access']==1?'selected':'' ?>>Active</option>        </select>        </td>           <td>            <a class="btn btn-primary" href="<?php echo base_url() ?>/master/editAssessment/<?php echo $d['id'] ?>" onclick="" data-name='<?php echo $d['assessment_name'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>            <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteAssessment/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>                      <a class="btn btn-warning" href="<?php echo base_url()?>/<?php echo $d['viewassessment'].'/'. $d['id'];?>" ><i class="fa fa-eye"></i></a>        </td>                <!--<td>-->        <!--  <a class="btn btn-warming" href="<?php echo base_url() ?>/<?php echo $d['addquestion'] ?>" ><i class="fa fa-folder-open"></i></a>-->        <!--  <a class="btn btn-danger" href="<?php echo base_url()?>/<?php echo $d['viewassessment'];?>" ><i class="fa fa-eye"></i></a>-->        <!--</td>-->      </tr>    <?php $s++;}?></tbody>    </table>  <?php } ?>            </div>          </div>        </div>      </div><!-- /.container-fluid -->    </section>  </div><?php include('include/footer.php');?><script>  function set_assessmemnt_access(obj,assessment_id) {    var dashboard_access=$(obj).val();      $.ajax({        url : "<?php echo base_url()?>/master/setassessmemntaccess/"+assessment_id+"/"+dashboard_access,        //type: "POST",        //dataType: "JSON",        success: function(data){           alert('success');        },        error: function(xhr, status, error){          // alert('error');        }      });  }</script>